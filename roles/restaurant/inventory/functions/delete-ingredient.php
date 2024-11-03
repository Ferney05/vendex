<?php

    include("../../../../conexion.php");

    if(isset($_GET['id'])){
        $id_dish = $_GET['id'];
    }

    $deleteRecipe = "DELETE FROM ingredients WHERE id = $id_dish";
    $executeDeleteRecipe = mysqli_query($conexion, $deleteRecipe);

    header("Location: ../inventory-ingredients.php");
    exit();

?>