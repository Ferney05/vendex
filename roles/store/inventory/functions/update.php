<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Producto actualizado - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">

    <?php
        include("../../../../conexion.php");

        if (isset($_GET['id'])) {
            $id_product = $_GET['id']; 
        }
    ?>
</head>
<body>

    <?php
        if(isset($_POST['button-update-product'])){
            $id_product = $_GET['id']; 

            $id_category = $_POST['id-category'];
            $name_product = $_POST['name-product'];
            $supplier = $_POST['supplier'];
            $purchase_price = $_POST['purchase-price'];
            $sale_price = $_POST['sale-price'];
            $quantity_stock = $_POST['quantity-stock'];
            $product_description = $_POST['product-description'];

            $insertData = "UPDATE inventory_products SET id_category = $id_category, product_name = '$name_product', supplier = '$supplier', purchase_price = $purchase_price, sale_price = $sale_price, stock_quantity = $quantity_stock, product_description = '$product_description', entry_date = CURDATE() WHERE id = $id_product";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                header("Refresh: 3; url= ../admin-inventory.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Producto actualizado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Se actualizó correctamente el producto.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>