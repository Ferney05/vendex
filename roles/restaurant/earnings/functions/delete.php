<?php

    include("../../../../conexion.php");

    if(isset($_GET['id'])){
        $id_staff = $_GET['id'];
    }

    $deleteStaff = "DELETE FROM staff_costs WHERE id = $id_staff";
    $executeDeleteStaff = mysqli_query($conexion, $deleteStaff);

    header("Location: ../personnel-costs.php");
    exit();

?>