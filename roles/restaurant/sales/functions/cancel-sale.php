<?php
    include('../../../../conexion.php');

    function cancelarVenta($conexion) {
        try {
            $check_cart = "SELECT COUNT(*) as count FROM order_cart";
            $result_check = mysqli_query($conexion, $check_cart);
            $row_check = mysqli_fetch_assoc($result_check);
                
            if ($row_check['count'] == 0) {
                throw new Exception("El carrito está vacío");
            }
    
            $query = "SELECT order_id FROM order_cart";
            $resultQuery = mysqli_query($conexion, $query);
            $rowCart = mysqli_fetch_array($resultQuery);
            $id_order = $rowCart['order_id'];
    
            $updateTransaction = "UPDATE pending_orders SET transaction = '0' WHERE order_number = $id_order";
            $executeUpdate = mysqli_query($conexion, $updateTransaction);
    
            $cleanCart = "TRUNCATE TABLE order_cart";
            $stmt = mysqli_query($conexion, $cleanCart);
            
        } catch (Exception $e){
            mysqli_rollback($conexion);
            error_log("Error en cancelarVenta: " . $e->getMessage());
            throw $e;
        }

    }
    
    if (True) {
        try {
            if (cancelarVenta($conexion)) {
                header("Location: ../new-sales.php?message=Venta cancelada&message_type=error");
            } else {
                header("Location: ../new-sales.php?message=El carrito está vacio&message_type=error");
            }
        } catch (Exception $e) {
            header("Location: ../new-sales.php?message=" . urlencode($e->getMessage()) . "&message_type=error");
        }
        exit;
    }
?>