<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingrediente agregado al inventario - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">
</head>
<body>

    <?php

        include("../../../../conexion.php");

        if(isset($_POST['button-add-ingredient'])) {
            $id_category = $_POST['id-category'];
            $name_ingredient = $_POST['name-ingredient'];
            $purchase_price = $_POST['purchase-price'];
            $unit = $_POST['unit'];
            $min_stock = $_POST['minimum-stock'];
            $entry_date = $_POST['entry-date'];
            $quantity_stock = $_POST['quantity-stock'];
            $ingredient_status = $_POST['ingredient-status'];

            $insertData = "INSERT INTO ingredients VALUES(null, '$id_category', '$name_ingredient', '$quantity_stock', '$purchase_price', '$min_stock', '$ingredient_status', '$unit', '$entry_date')";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                header("Refresh: 3; url=add-ingredients.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Insumo agregado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Insumo añadido al inventario.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>