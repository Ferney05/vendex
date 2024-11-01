<?php
    include('../../../../conexion.php');

    $query = "TRUNCATE TABLE order_cart";
    $stmt = mysqli_query($conexion, $query);
    header("Location: ../new-sales.php");
?>