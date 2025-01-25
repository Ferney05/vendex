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
                $insertData = "INSERT INTO cart_store VALUES(null, '$product_name', '$cart_stock', '$sale_price')";
                $execute = mysqli_query($conexion, $insertData);

                if($execute){
                    echo "Producto agregado";
                    exit;
                }
            } else {
                echo "La cantidad ingresada supera la disponibilidad actual";
                exit;
            }
        }
    ?>

</body>
</html>