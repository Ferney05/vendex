<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar ingredientes - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon-vendex.svg" type="image/x-icon">

    <?php

        if(isset($_GET['id'])){
            $id_ingredient = $_GET['id'];
        }

    ?>
</head>
<body>

    <?php

        include("../../../../conexion.php");

        if(isset($_POST['button-update-ingredient'])) {
            $id_category = $_POST['id-category'];
            $name_ingredient = $_POST['name-ingredient'];
            $purchase_price = $_POST['purchase-price'];
            $unit = $_POST['unit'];
            $min_stock = $_POST['minimum-stock'];
            $entry_date = $_POST['entry-date'];
            $quantity_stock = $_POST['quantity-stock'];
            $ingredient_status = $_POST['ingredient-status'];

            $updateData = "UPDATE ingredients SET id_category = '$id_category', name_ingredient = '$name_ingredient', quantity_stock = '$quantity_stock', purchase_price = '$purchase_price', minimum_stock = '$min_stock', ingredient_status = '$ingredient_status', unit = '$unit', entry_date = '$entry_date' WHERE id = $id_ingredient";
            $execute = mysqli_query($conexion, $updateData);

            if($execute){
                header("Refresh: 3; url=../inventory-ingredients.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Ingrediente actualizado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Se actualizó correctamente el ingrediente.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>