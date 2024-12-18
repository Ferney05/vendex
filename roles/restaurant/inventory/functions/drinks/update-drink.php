<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bebida actualizada - Vendex</title>
    <link rel="stylesheet" href="../../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../../svg/icon.png" type="image/x-icon">

    <?php
        include("../../../../../conexion.php");

       
    ?>
</head>
<body>


    <?php

        include("../../../../../conexion.php");

        if(isset($_POST['button-update-drink'])) {
            $name_drink = $_POST['name-drink'];
            $purchase_price = $_POST['purchase-price'];
            $sale_price = $_POST['sale-price'];
            $stock = $_POST['stock'];
            
            if(isset($_GET['id'])){
                $id_drink = $_GET['id'];

                $updateData = "UPDATE beverage_inventory SET drink_name = '$name_drink', purchase_price = $purchase_price, sale_price = $sale_price, available_stock = $stock WHERE id = $id_drink";
                $execute = mysqli_query($conexion, $updateData);
    
                if($execute){
                    header("Refresh: 3; url=../../beverage-inventory.php");
    
                    echo "<div class='success'>
                            <div class='back'>
                                <div class='tlt-icon'>
                                    <h2>Bebida actualizada</h2>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                                </div>
    
                                <p class='info-text'>Se actualizó la bebida correctamente.</p>
                            </div>
                          </div>";
                        
                    exit();
                }
            }
        }
    ?>

</body>
</html>