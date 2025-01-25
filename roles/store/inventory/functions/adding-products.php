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
            $unit_measure = $_POST['unit-measure'];

            $insertData = "INSERT INTO inventory_products VALUES(null, $id_category, '$name_product', '$supplier', '$purchase_price', '$sale_price', '$quantity_stock', '$product_description', '$unit_measure', CURDATE())";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                echo "Producto agregado";
            } else {
                echo "Error al agregar el producto";
            }
        }
    ?>

</body>
</html>