<?php
    include("../../../../conexion.php");

    if (isset($_GET['id'])) {
        $id_order = $_GET['id']; 
    }

    if(isset($_POST['ready'])) {
        $status = $_POST['status'];

        $updateData = "UPDATE pending_orders SET order_status = 'Lista' WHERE id = $id_order";
        $execute = mysqli_query($conexion, $updateData);
        header("Location: ../../../dashboard-restaurant.php");
        exit();
    }
?>