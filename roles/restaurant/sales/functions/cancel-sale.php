<?php
    include('../../../../conexion.php');

    $query = "SELECT order_id FROM order_cart";
    $resultQuery = mysqli_query($conexion, $query);
    $rowCart = mysqli_fetch_array($resultQuery);
    $id_order = $rowCart['order_id'];

    $updateTransaction = "UPDATE pending_orders SET transaction = '0' WHERE order_number = $id_order";
    $executeUpdate = mysqli_query($conexion, $updateTransaction);

    $cleanCart = "TRUNCATE TABLE order_cart";
    $stmt = mysqli_query($conexion, $cleanCart);

    header("Location: ../new-sales.php?message=Venta cancelada&message_type=error");
?>