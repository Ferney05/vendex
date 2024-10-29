<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receta actualizada - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon-vendex.svg" type="image/x-icon">

    <?php
        include("../../../../conexion.php");

        if (isset($_GET['id'])) {
            $id_recipe = $_GET['id']; 
        }
    ?>
</head>
<body>

    <?php
        if(isset($_POST['button-update-recipes'])){
            $id_recipe = $_GET['id']; 

            $name_dish = $_POST['name-dish'];
            $sale_price = $_POST['sale-price'];
            $time = $_POST['prepared-time'];

            $insertData = "UPDATE recipes SET name_dish = '$name_dish', sale_price = '$sale_price', prepared_time = '$time' WHERE id = $id_recipe";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                header("Refresh: 3; url= ../admin-inventory.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Receta actualizada</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Se actualizó correctamente la receta.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>