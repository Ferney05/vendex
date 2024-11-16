<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédito creado - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">
</head>
<body>

    <?php

        include("../../../../conexion.php");

        if(isset($_POST['button-create-credit'])) {
            $customer = $_POST['customer'];
            $amount_borrowed = $_POST['amount-borrowed'];
            $creation_date = $_POST['creation-date'];
            $expiration_date = $_POST['expiration-date'];
            $status = $_POST['status'];

            $insertData = "INSERT INTO credits VALUES(null, '$customer', '$amount_borrowed', '$creation_date', '$expiration_date', 0, '$status')";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                header("Refresh: 3; url=../see-credits.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Crédito creado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Se creó correctamente el crédito.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>