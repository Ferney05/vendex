<?php

    include("../../../../conexion.php");

    if(isset($_GET['id'])){
        $id_order = $_GET['id'];
    }

    $deleteCredit = "DELETE FROM credits WHERE id = $id_order";
    $executeDeleteCredit = mysqli_query($conexion, $deleteCredit);

    header("Location: ../see-credits.php");
    exit();

?>