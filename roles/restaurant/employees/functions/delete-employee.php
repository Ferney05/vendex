<?php

    include("../../../../conexion.php");

    if(isset($_GET['id'])){
        $id_employee = $_GET['id'];
    }

    $deleteEmployee = "DELETE FROM employees WHERE id = $id_employee";
    $executeDeleteEmployee = mysqli_query($conexion, $deleteEmployee);

    header("Location: ../see-employees.php");
    exit();

?>