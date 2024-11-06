<?php

    include("../../../../conexion.php");

    if(isset($_GET['id'])){
        $id_order = $_GET['id'];
    }

    $deleteRecipe = "DELETE FROM pending_orders WHERE id = $id_order";
    $executeDeleteRecipe = mysqli_query($conexion, $deleteRecipe);

    header("Location: ../pending-orders.php");
    exit();

?>