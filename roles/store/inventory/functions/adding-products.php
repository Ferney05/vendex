<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto agregado al inventario - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">
</head>
<body>

    <?php

        include("../../../../conexion.php");

        if(isset($_POST['button-add-product'])) {
            $id_category = $_POST['id-category'];
            $name_product = $_POST['name-product'];
            $supplier = $_POST['supplier'];
            $purchase_price = $_POST['purchase-price'];
            $sale_price = $_POST['sale-price'];
            $quantity_stock = $_POST['quantity-stock'];
            $product_description = $_POST['product-description'];
            $entry_date = $_POST['entry-date'];
            $product_status = $_POST['product-status'];

            $insertData = "INSERT INTO inventory_products VALUES(null, '$id_category', '$name_product', '$supplier', '$purchase_price', '$sale_price', '$quantity_stock', '$product_description', '$entry_date', '$product_status')";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                header("Refresh: 3; url=../add-products.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Producto agregado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Producto añadido al inventario.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>