
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto agregado al carrito - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon-vendex.svg" type="image/x-icon">
</head>
<body>

    <?php

        include("../../../../conexion.php");

        if(isset($_POST['button-add-product-sale'])) {
            $product_name = $_POST['name-product'];
            $cart_stock = $_POST['cart-stock'];
            $sale_price = $_POST['sale-price'];

            $insertData = "INSERT INTO cart_items VALUES(null, '$product_name', '$cart_stock', '$sale_price')";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                header("Refresh: 3; url=../new-sale.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Producto agregado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Se agregó el producto al carrito.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>