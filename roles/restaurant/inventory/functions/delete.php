<?php

    include("../../../../conexion.php");

    if(isset($_GET['id'])){
        $id_dish = $_GET['id'];
    }

    $deleteRecipe = "DELETE FROM recipes WHERE id = $id_dish";
    $executeDeleteRecipe = mysqli_query($conexion, $deleteRecipe);

    $deleteIngredients = "DELETE FROM ingredients_of_dish WHERE id_dish = $id_dish";
    $executeDeleteIngredients = mysqli_query($conexion, $deleteIngredients);

    header("Location: ../admin-inventory.php");
    exit();

?>