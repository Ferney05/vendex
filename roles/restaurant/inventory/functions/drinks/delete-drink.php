<?php

    include("../../../../../conexion.php");

    if(isset($_GET['id'])){
        $id_drink = $_GET['id'];
    }

    $deleteDrink = "DELETE FROM beverage_inventory WHERE id = $id_drink";
    $executeDeleteDrink = mysqli_query($conexion, $deleteDrink);

    header("Location: ../../beverage-inventory.php");
    exit();

?>