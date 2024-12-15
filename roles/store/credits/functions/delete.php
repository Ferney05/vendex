<?php

    include("../../../../conexion.php");

    if(isset($_GET['id'])){
        $id_credit = $_GET['id'];
    }

    $getID = "SELECT customer FROM credits WHERE id = $id_credit";
    $result_customer = mysqli_query($conexion, $getID);
    $row_customer = mysqli_fetch_array($result_customer);
    $customer = $row_customer['customer'];

    $getDetails = "SELECT sale_id FROM sale_details WHERE client = '$customer' AND payment_method = 'A crédito'";
    $result_details = mysqli_query($conexion, $getDetails);
    $row_details = mysqli_fetch_array($result_details);
    $sale_id = $row_details['sale_id'];

    $deleteSale = "DELETE FROM sales WHERE id = $sale_id";
    $execute_delete_sale = mysqli_query($conexion, $deleteSale);

    $deleteSaleDetails = "DELETE FROM sale_details WHERE client = '$customer' AND payment_method = 'A crédito'";
    $execute_delete_sd = mysqli_query($conexion, $deleteSaleDetails);

    $deleteCredit = "DELETE FROM credits WHERE id = $id_credit";
    $executeDeleteCredit = mysqli_query($conexion, $deleteCredit);

    header("Location: ../see-credits.php");
    exit();

?>