
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto agregado al carrito - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="stylesheet" href="../../../../css/warning.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">
</head>
<body>

    <?php

        include("../../../../conexion.php");

        if(isset($_POST['button-add-product-sale'])) {
            $product_name = $_POST['name-product'];
            $cart_stock = $_POST['cart-stock'];
            $sale_price = $_POST['sale-price'];

            $queryProducts = "SELECT stock_quantity FROM inventory_products WHERE product_name = '$product_name'";
            $resultProducts = mysqli_query($conexion, $queryProducts);
            $rowProducts = mysqli_fetch_array($resultProducts);

            if($cart_stock < $rowProducts['stock_quantity']) {
                $insertData = "INSERT INTO cart_items VALUES(null, '$product_name', '$cart_stock', '$sale_price')";
                $execute = mysqli_query($conexion, $insertData);

                if($execute){
                    header("Refresh: 1; url=../new-sale.php");

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
            } else {
                header("Refresh: 3; url=../new-sale.php");

                    echo "<div class='warning'>
                            <div class='back'>
                                <div class='tlt-icon'>
                                    <h2>El producto no se pudo agregar</h2>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24'><path fill='#911919' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/></svg>
                                </div>

                                <p class='info-text'>La cantidad ingresada supera la disponibilidad actual.</p>
                            </div>
                        </div>";
                        
                    exit;
            }
        }
    ?>

</body>
</html>