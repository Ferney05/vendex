<?php
    include('../../../../conexion.php');

    function generarVenta($conexion) {
        mysqli_begin_transaction($conexion);
        
        try {
            // 1. Verificamos si hay productos en el carrito
            $check_cart = "SELECT COUNT(*) as count FROM cart_store";
            $result_check = mysqli_query($conexion, $check_cart);
            $row_check = mysqli_fetch_assoc($result_check);
                
            if ($row_check['count'] == 0) {
                throw new Exception("El carrito está vacío");
            }

            // 2. Obtenemos el total y los detalles del carrito
            $query_items = "SELECT product_name, cart_stock, sale_price, (cart_stock * sale_price) as subtotal 
                            FROM cart_store";
            $result_items = mysqli_query($conexion, $query_items);
            
            if (!$result_items) {
                throw new Exception("Error al obtener items del carrito");
            }

            // 3. Calculamos el total de la venta
            $query_total = "SELECT SUM(cart_stock * sale_price) as total FROM cart_store";
            $result_total = mysqli_query($conexion, $query_total);
            $row_total = mysqli_fetch_assoc($result_total);
            $total_sale = $row_total['total'];

            // 4. Insertamos la venta principal
            $query_sale = "INSERT INTO sales (total_amount, sale_date) VALUES ($total_sale, CURDATE())";
            if (!mysqli_query($conexion, $query_sale)) {
                throw new Exception("Error al crear la venta");
            }
            
            $sale_id = mysqli_insert_id($conexion);

            // 5. Insertamos los detalles de la venta
            while ($item = mysqli_fetch_assoc($result_items)) {
                $product_name = $item['product_name'];
                $quantity = $item['cart_stock'];
                $unit_price = $item['sale_price'];
                $subtotal = $item['subtotal'];

                $query_details = "INSERT INTO sale_details 
                                (sale_id, product_name, quantity, unit_price, subtotal) 
                                VALUES 
                                ($sale_id, '$product_name', $quantity, $unit_price, $subtotal)";
                
                if (!mysqli_query($conexion, $query_details)) {
                    throw new Exception("Error al insertar detalles de la venta");
                }
            }

            // 6. Actualizamos el inventario
            $query_update_inventory = "UPDATE inventory_products ip
                                    INNER JOIN cart_store ci ON ip.product_name = ci.product_name
                                    SET ip.stock_quantity = ip.stock_quantity - ci.cart_stock";
            
            if (!mysqli_query($conexion, $query_update_inventory)) {
                throw new Exception("Error al actualizar el inventario");
            }

            // 7. Limpiamos el carrito
            $query_clear = "TRUNCATE TABLE cart_store";
            if (!mysqli_query($conexion, $query_clear)) {
                throw new Exception("Error al limpiar el carrito");
            }

            // Confirmamos la transacción
            mysqli_commit($conexion);

            return true; // Venta generada con éxito

        } catch (Exception $e) {
            mysqli_rollback($conexion);
            return false; // Error durante el proceso
        }
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (generarVenta($conexion)) {
            header("Location: ../new-sale.php?message=Venta generada&message_type=success");
        } else {
            header("Location: ../new-sale.php?message=El carrito está vacío&message_type=error");
        }
        exit;
    }
?>
