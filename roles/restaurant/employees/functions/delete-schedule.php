<?php

    include("../../../../conexion.php");

    if(isset($_GET['id'])){
        $id_schedule = $_GET['id'];
    }

    $deleteSchedule = "DELETE FROM schedule WHERE id = $id_schedule";
    $executeDeleteSchedule = mysqli_query($conexion, $deleteSchedule);

    header("Location: ../horary.php");
    exit();

?>