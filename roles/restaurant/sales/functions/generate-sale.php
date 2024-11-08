<?php
include('../../../../conexion.php');

function generarVenta($conexion) {
    mysqli_begin_transaction($conexion);
    
    try {
        // 1. Verificamos que existan items en el carrito
        $check_cart = "SELECT COUNT(*) as count FROM order_cart";
        $result_check = mysqli_query($conexion, $check_cart);
        $row_check = mysqli_fetch_assoc($result_check);
        
        if ($row_check['count'] == 0) {
            throw new Exception("El carrito está vacío");
        }

        // 2. Obtenemos los detalles del carrito
        $query_items = "SELECT order_name, cart_stock, sale_price, (cart_stock * sale_price) AS subtotal 
                       FROM order_cart";
        $result_items = mysqli_query($conexion, $query_items);
        
        if (!$result_items) {
            throw new Exception("Error al obtener items del carrito: " . mysqli_error($conexion));
        }

        // 3. Calculamos el total de la venta
        $query_total = "SELECT ROUND(SUM(cart_stock * sale_price), 2) AS total FROM order_cart";
        $result_total = mysqli_query($conexion, $query_total);
        
        if (!$result_total) {
            throw new Exception("Error al calcular el total: " . mysqli_error($conexion));
        }
        
        $row_total = mysqli_fetch_assoc($result_total);
        $total_sale = $row_total['total'];

        // 4. Verificamos que el total no sea cero o negativo
        if ($total_sale <= 0) {
            throw new Exception("El total de la venta debe ser mayor a cero");
        }

        // 5. Insertamos la venta principal
        $query_sale = "INSERT INTO order_sales (total_amount, sale_date) 
                      VALUES (?, CURDATE())";
        $stmt = mysqli_prepare($conexion, $query_sale);
        mysqli_stmt_bind_param($stmt, "d", $total_sale);
        
        if (!mysqli_stmt_execute($stmt)) {
            throw new Exception("Error al crear la venta: " . mysqli_error($conexion));
        }
        
        $sale_id = mysqli_insert_id($conexion);
        mysqli_stmt_close($stmt);

        // Inserto el ID de la venta junto con el nombre del empleado que gestionó el pedido o atendió al cliente.
        $name_employee = $_POST['name-employee'];
        $insertIdEmployee = "INSERT INTO sales_employees VALUES(null, $sale_id, '$name_employee')";
        $executeIdEmployee = mysqli_query($conexion, $insertIdEmployee);

        // 6. Insertamos los detalles de la venta usando una consulta directa
        // Guardamos los items en un array
        $items = [];
        while ($item = mysqli_fetch_assoc($result_items)) {
            $items[] = $item;
        }

        foreach ($items as $item) {
            $detail_order_name = mysqli_real_escape_string($conexion, $item['order_name']);
            $detail_quantity = (int)$item['cart_stock'];
            $detail_unit_price = (float)$item['sale_price'];
            $detail_subtotal = (float)$item['subtotal'];

            $query_details = "INSERT INTO order_sales_details 
                            (sale_id, order_name, quantity, unit_price, subtotal) 
                            VALUES 
                            ($sale_id, '$detail_order_name', $detail_quantity, $detail_unit_price, $detail_subtotal)";
            
            if (!mysqli_query($conexion, $query_details)) {
                throw new Exception("Error al insertar detalles de la venta: " . mysqli_error($conexion));
            }
        }

        // 7. Verificamos el stock disponible antes de actualizar
        $check_stock = "
            SELECT i.name_ingredient, 
                   i.quantity_stock,
                   (oc.cart_stock * iod.stock_taken) as needed_stock
            FROM ingredients i
            INNER JOIN ingredients_of_dish iod ON i.name_ingredient = iod.name_ingredient
            INNER JOIN recipes r ON iod.id_dish = r.id
            INNER JOIN order_cart oc ON r.name_dish = oc.order_name
            HAVING i.quantity_stock < needed_stock";
        
        $result_stock = mysqli_query($conexion, $check_stock);
        
        if (mysqli_num_rows($result_stock) > 0) {
            $insufficient = [];
            while ($row = mysqli_fetch_assoc($result_stock)) {
                $insufficient[] = $row['name_ingredient'];
            }
            throw new Exception("Stock insuficiente para los ingredientes: " . implode(", ", $insufficient));
        }

        // 8. Actualizamos el inventario
        $query_update_inventory = "
            UPDATE ingredients i
            INNER JOIN ingredients_of_dish iod ON i.name_ingredient = iod.name_ingredient
            INNER JOIN recipes r ON iod.id_dish = r.id
            INNER JOIN order_cart oc ON r.name_dish = oc.order_name
            SET i.quantity_stock = i.quantity_stock - (oc.cart_stock * iod.stock_taken)
            WHERE EXISTS (
                SELECT 1 
                FROM order_cart oc2 
                JOIN recipes r2 ON oc2.order_name = r2.name_dish
                JOIN ingredients_of_dish iod2 ON r2.id = iod2.id_dish
                WHERE iod2.name_ingredient = i.name_ingredient
            )";
        
        if (!mysqli_query($conexion, $query_update_inventory)) {
            throw new Exception("Error al actualizar el inventario: " . mysqli_error($conexion));
        }

        // 9. Verificación de stock negativo después de la actualización
        $check_negative_stock = "
            SELECT name_ingredient, quantity_stock 
            FROM ingredients 
            WHERE quantity_stock < 0";
        
        $result_check = mysqli_query($conexion, $check_negative_stock);
        if (mysqli_num_rows($result_check) > 0) {
            throw new Exception("La operación resultaría en stock negativo para algunos ingredientes");
        }

        // 10. Limpiamos el carrito
        $query_clear = "TRUNCATE TABLE order_cart";
        if (!mysqli_query($conexion, $query_clear)) {
            throw new Exception("Error al limpiar el carrito: " . mysqli_error($conexion));
        }

        // Confirmamos la transacción
        mysqli_commit($conexion);
        return true;

    } catch (Exception $e) {
        mysqli_rollback($conexion);
        error_log("Error en generarVenta: " . $e->getMessage());
        throw $e;
    }
}

// Procesamiento de la solicitud
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        if (generarVenta($conexion)) {
            // Si la venta se genera correctamente, redirigimos con un mensaje de éxito
            header("Location: ../new-sales.php?message=Venta generada&message_type=success");
        } else {
            // Si hay un error desconocido, redirigimos con un mensaje de error
            header("Location: ../new-sales.php?message=Error desconocido&message_type=error");
        }
    } catch (Exception $e) {
        // Si ocurre una excepción, redirigimos con el mensaje de error correspondiente
        header("Location: ../new-sales.php?message=" . urlencode($e->getMessage()) . "&message_type=error");
    }
    exit;
}

?>