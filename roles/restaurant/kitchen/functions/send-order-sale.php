<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Plato agregado - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="stylesheet" href="../../../../css/warning.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">

    <?php
        include("../../../../conexion.php");

        if (isset($_GET['order_number'])) {
            $id_order = $_GET['order_number']; 
        }
    ?>
</head>
<body>

    <?php

        $check_pod = "SELECT COUNT(*) AS count, saucer FROM pending_order_details WHERE order_id = $id_order";
        $result_check = mysqli_query($conexion, $check_pod);
        $row_check = mysqli_fetch_assoc($result_check);
        $saucer = $row_check['saucer'];

        if ($row_check['count'] == 0) {
            header("Refresh: 3; url=../pending-orders.php");

            echo "<div class='warning'>
                    <div class='back'>
                        <div class='tlt-icon'>
                            <h2>La orden está vacía</h2>
                            <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24'><path fill='#911919' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/></svg>
                        </div>

                        <p class='info-text'>Actualmente, no hay platos añadidos a la orden.</p>
                    </div>
                    </div>";
                
            exit;
        } else {

            // verificación de stock
            $getQuantity = "SELECT quantity FROM pending_order_details WHERE order_id = $id_order";

            $resultQuery = mysqli_query($conexion, $getQuantity);
            $row = mysqli_fetch_array($resultQuery);
            $quantity = $row['quantity'];

            $queryOrder = "SELECT r.name_dish, 
                                  iod.stock_taken, 
                                  i.quantity_stock 
                            FROM recipes AS r 
                            INNER JOIN ingredients_of_dish AS iod ON r.id = iod.id_dish
                            INNER JOIN ingredients AS i ON iod.name_ingredient = i.name_ingredient
                            WHERE r.name_dish = '$saucer'";

            $resultOrder = mysqli_query($conexion, $queryOrder);
            $rowOrder = mysqli_fetch_array($resultOrder);
            $check_quantity = $quantity * $rowOrder['stock_taken'];

            if($check_quantity < $rowOrder['quantity_stock']) {
                $query = "SELECT pod.saucer, pod.quantity, r.sale_price
                FROM recipes AS r
                INNER JOIN pending_order_details AS pod ON r.name_dish = pod.saucer
                WHERE pod.order_id = $id_order";

                $resultQuery = mysqli_query($conexion, $query);
                $row = mysqli_fetch_array($resultQuery);
                $saucer = $row['saucer'];
                $quantity = $row['quantity'];
                $sale_price = $row['sale_price'];

                $insertData = "INSERT INTO order_cart VALUES(null, $id_order, '$saucer', $quantity, $sale_price)";
                $executeInsert = mysqli_query($conexion, $insertData);

                $updateTransaction = "UPDATE pending_orders SET transaction = '1' WHERE order_number = $id_order";
                $executeUpdate = mysqli_query($conexion, $updateTransaction);

                if($executeInsert){
                    header("Refresh: 3; url=../../sales/new-sales.php");

                    echo "<div class='success'>
                            <div class='back'>
                                <div class='tlt-icon'>
                                    <h2>Pedido agregado</h2>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                                </div>

                                <p class='info-text'>Se agregó el pedido al carrito.</p>
                            </div>
                        </div>";
                        
                    exit;
                }
            } else {
                header("Refresh: 5; url=../pending-orders.php");

                echo "<div class='warning'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>El pedido no se pudo agregar</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24'><path fill='#911919' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/></svg>
                            </div>

                            <p class='info-text'>La cantidad ingresada supera la disponibilidad actual, revisa tu inventario.</p>
                        </div>
                    </div>";
                    
                exit;
            }
        }

    ?>

</body>
</html>