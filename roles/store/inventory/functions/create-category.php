<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoría creada - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon-vendex.svg" type="image/x-icon">

    <?php
        include("../../../../conexion.php");
    ?>
</head>
<body>

    <?php
        if(isset($_POST['button-create-category'])){
            $name_category = $_POST['name-category'];

            $insertCategory = "INSERT INTO categories VALUES(null, '$name_category')";
            $execute = mysqli_query($conexion, $insertCategory);

            if($execute){
                header("Refresh: 3; url= ../add-products.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Categoría creada</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Se creó la categoría correctamente.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>