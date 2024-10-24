<?php
    include('../../../../conexion.php');

    $query = "TRUNCATE TABLE cart_items";
    $stmt = mysqli_query($conexion, $query);
    header("Location: ../new-sale.php");
?>