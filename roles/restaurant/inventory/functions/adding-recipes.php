<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta agregada al inventario - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">
</head>
<body>

    <?php

        include("../../../../conexion.php");

        if(isset($_POST['button-add-recipe'])) {
            $name_dish = $_POST['name-dish'];
            $sale_price = $_POST['sale-price'];
            $time = $_POST['prepared-time'];

            $insertData = "INSERT INTO recipes VALUES(null, '$name_dish', '$sale_price', '$time')";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                header("Refresh: 3; url= add-recipes.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Receta agregada</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Receta añadida al inventario.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>