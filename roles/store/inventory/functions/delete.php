<?php

    include("../../../../conexion.php");

    if(isset($_GET['id'])) {
        $id_product = $_GET['id'];
    }

    $deleteProduct = "DELETE FROM inventory_products WHERE id = $id_product";
    $executeDelete = mysqli_query($conexion, $deleteProduct);
    header("Location: ../admin-inventory.php");

?>