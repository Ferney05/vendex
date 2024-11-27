<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orden agregada - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">
</head>
<body>

    <?php
        include("../../../../conexion.php");

        if (isset($_GET['id'])) {
            $id_order = $_GET['id']; 
        }

        if(isset($_POST['button-update-orders'])) {
            $order_number = $_POST['order-number'];
            $customer = $_POST['customer'];
            $status = $_POST['status'];
            $date = $_POST['date'];
            $type_service = $_POST['type-service'];

            $updateData = "UPDATE pending_orders SET order_number = $order_number, customer = '$customer', order_date = '$date', order_status = '$status', type_service = '$type_service' WHERE id = $id_order";
            $execute = mysqli_query($conexion, $updateData);

            if($execute){
                header("Refresh: 3; url=../pending-orders.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Orden actualizada</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Se actualizó la orden correctamente.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>