<?php

    include("../../../../conexion.php");

    if(isset($_GET['id'])){
        $id_order = $_GET['id'];
    }

    $orderNumber = "SELECT order_number FROM pending_orders WHERE id = $id_order";
    $result = mysqli_query($conexion, $orderNumber);
    $row = mysqli_fetch_array($result);
    $numberOrder = $row['order_number']; 

    $deleteDishes = "DELETE FROM pending_order_details WHERE order_id = $numberOrder";
    $executeDish = mysqli_query($conexion, $deleteDishes);

    $deleteOrder = "DELETE FROM pending_orders WHERE id = $id_order";
    $executeDeleteOrder = mysqli_query($conexion, $deleteOrder);

    header("Location: ../pending-orders.php");
    exit();

?>