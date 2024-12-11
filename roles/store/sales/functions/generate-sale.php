<?php
    include('../../../../conexion.php');

    function generarVenta($conexion) {
        mysqli_begin_transaction($conexion);
    
        try {
            // 1. Verificamos si hay productos en el carrito
            $check_cart = "SELECT COUNT(*) AS count FROM cart_store";
            $result_check = mysqli_query($conexion, $check_cart);
            $row_check = mysqli_fetch_assoc($result_check);
    
            if ($row_check['count'] == 0) {
                throw new Exception("El carrito está vacío");
            }
    
            // 2. Obtenemos los detalles del carrito y los almacenamos en un array
            $query_items = "SELECT product_name, cart_stock, sale_price, (cart_stock * sale_price) as subtotal FROM cart_store";
            $result_items = mysqli_query($conexion, $query_items);
            
            if (!$result_items) {
                throw new Exception("Error al obtener items del carrito");
            }
    
            $cart_items = []; // Array temporal para almacenar los datos del carrito
            while ($item = mysqli_fetch_assoc($result_items)) {
                $cart_items[] = $item;
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
            foreach ($cart_items as $item) {
                $product_name = $item['product_name'];
                $quantity = $item['cart_stock'];
                $unit_price = $item['sale_price'];
                $subtotal = $item['subtotal'];
    
                $client = isset($_POST['client']) ? mysqli_real_escape_string($conexion, $_POST['client']) : 'Cliente genérico';
                $payment_method = isset($_POST['payment-method']) ? mysqli_real_escape_string($conexion, $_POST['payment-method']) : 'A crédito';
    
                $query_details = "INSERT INTO sale_details 
                                (sale_id, product_name, quantity, unit_price, client, payment_method, subtotal) 
                                VALUES 
                                ($sale_id, '$product_name', $quantity, $unit_price, '$client', '$payment_method', $subtotal)";
    
                if (!mysqli_query($conexion, $query_details)) {
                    throw new Exception("Error al insertar detalles de la venta");
                }
            }

            // 6. Transferimos los datos de sale_details a credits solo si contiene el método de pago 'A crédito'
            $querySaleDetails = "SELECT *, SUM(subtotal) AS total_credit FROM sale_details WHERE payment_method = 'A crédito' GROUP BY client";
            $result_payment = mysqli_query($conexion, $querySaleDetails);

            if($result_payment -> num_rows > 0) {
                foreach ($result_payment AS $item){
                    $customer = $item['client'];
                    $amount_borrowed = $item['total_credit'];

                    $insertDataCredits = "INSERT INTO credits VALUES(null, '$customer', '$amount_borrowed', CURDATE(), 0, 'Pendiente')";
                    $execute = mysqli_query($conexion, $insertDataCredits);
                }
            } 

            // 7. Actualizamos el inventario
            $query_update_inventory = "UPDATE inventory_products ip
                                        INNER JOIN cart_store ci ON ip.product_name = ci.product_name
                                        SET ip.stock_quantity = ip.stock_quantity - ci.cart_stock";
            if (!mysqli_query($conexion, $query_update_inventory)) {
                throw new Exception("Error al actualizar el inventario");
            }
    
            // 8. Limpiamos el carrito
            $query_clear = "TRUNCATE TABLE cart_store";
            if (!mysqli_query($conexion, $query_clear)) {
                throw new Exception("Error al limpiar el carrito");
            }
    
            // Confirmamos la transacción
            mysqli_commit($conexion);
    
            return true; // Venta generada con éxito
        } catch (Exception $e) {
            mysqli_rollback($conexion);
            echo "Error: " . $e->getMessage(); // Mostramos el error para depuración
            return false;
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
