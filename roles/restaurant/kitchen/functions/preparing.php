<?php
    include("../../../../conexion.php");

    if (isset($_GET['id'])) {
        $id_order = $_GET['id']; 
    }

    if(isset($_POST['preparation'])) {
        $status = $_POST['status'];

        $updateData = "UPDATE pending_orders SET order_status = 'En preparación' WHERE id = $id_order";
        $execute = mysqli_query($conexion, $updateData);
        header("Location: ../../../dashboard-restaurant.php");
        exit();
    }
?>