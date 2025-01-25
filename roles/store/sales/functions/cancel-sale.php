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
            return mysqli_query($conexion, $query);
            
        } catch (Exception $e){
            mysqli_rollback($conexion);
            error_log("Error en cancelarVenta: " . $e->getMessage());
            throw $e;
        }
    }
    
    if (true) {
        try {
            if (cancelarVenta($conexion)) {
                // Almacenar el mensaje en localStorage antes de redirigir
                echo "<script>
                        localStorage.setItem('toastMessage', 'Venta cancelada');
                        localStorage.setItem('toastType', 'error');
                        window.location.href = '../new-sale.php';
                      </script>";
            } else {
                // Almacenar el mensaje en localStorage antes de redirigir
                echo "<script>
                        localStorage.setItem('toastMessage', 'El carrito está vacío');
                        localStorage.setItem('toastType', 'error');
                        window.location.href = '../new-sale.php';
                      </script>";
            }
        } catch (Exception $e) {
            // Almacenar el mensaje en localStorage antes de redirigir
            echo "<script>
                    localStorage.setItem('toastMessage', '" . addslashes($e->getMessage()) . "');
                    localStorage.setItem('toastType', 'error');
                    window.location.href = '../new-sale.php';
                  </script>";
        }
        exit;
    }
?>