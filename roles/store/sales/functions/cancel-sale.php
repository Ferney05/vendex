<?php
    include('../../../../conexion.php');

    function cancelarVenta($conexion) {
        try {
            $check_cart = "SELECT COUNT(*) as count FROM cart_store";
            $result_check = mysqli_query($conexion, $check_cart);
            $row_check = mysqli_fetch_assoc($result_check);
                
            if ($row_check['count'] == 0) {
                throw new Exception("El carrito está vacío");
            }
    
            $query = "TRUNCATE TABLE cart_store";
            $stmt = mysqli_query($conexion, $query);
            
        } catch (Exception $e){
            mysqli_rollback($conexion);
            error_log("Error en cancelarVenta: " . $e->getMessage());
            throw $e;
        }
    }
    
    if (True) {
        try {
            if (cancelarVenta($conexion)) {
                header("Location: ../new-sale.php?message=El carrito está vacio&message_type=error");
            } else {
                header("Location: ../new-sale.php?message=Venta cancelada&message_type=error");
            }
        } catch (Exception $e) {
            header("Location: ../new-sale.php?message=" . urlencode($e->getMessage()) . "&message_type=error");
        }
        exit;
    }
?>