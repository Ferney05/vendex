<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido agregado al carrito - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="stylesheet" href="../../../../css/warning.css">
    <link rel="shortcut icon" href="../../../../svg/icon-vendex.svg" type="image/x-icon">
</head>
<body>

    <?php

        include("../../../../conexion.php");

        if(isset($_POST['button-add-recipe-sale'])) {
            $name_recipe = $_POST['name-recipe'];
            $cart_stock = $_POST['cart-stock'];
            $sale_price = $_POST['sale-price'];

            // Verificar si la receta tiene ingredientes
            $checkIngredientsQuery = "SELECT COUNT(*) AS ingredient_count FROM ingredients_of_dish WHERE id_dish = (SELECT id FROM recipes WHERE name_dish = '$name_recipe')";
            $checkIngredientsResult = mysqli_query($conexion, $checkIngredientsQuery);
            $ingredientCount = mysqli_fetch_assoc($checkIngredientsResult)['ingredient_count'];

            // Si no hay ingredientes, mostrar un mensaje de error
            if ($ingredientCount == 0) {
                header("Refresh: 5; url=../new-sales.php");

                echo "<div class='warning'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Error</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24'><path fill='#911919' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/></svg>
                            </div>

                            <p class='info-text'>Por favor, agrega ingredientes a la receta antes de proceder.</p>
                        </div>
                    </div>";
                exit;
            }

            // Continuar con la verificación de stock
            $queryOrder = "SELECT r.name_dish, 
                                  iod.stock_taken, 
                                  i.quantity_stock 
                            FROM recipes AS r 
                            INNER JOIN ingredients_of_dish AS iod ON r.id = iod.id_dish
                            INNER JOIN ingredients AS i ON iod.name_ingredient = i.name_ingredient
                            WHERE r.name_dish = '$name_recipe'";

            $resultOrder = mysqli_query($conexion, $queryOrder);
            $rowOrder = mysqli_fetch_array($resultOrder);
            $check_quantity = $cart_stock * $rowOrder['stock_taken'];

            if($check_quantity < $rowOrder['quantity_stock']) {
                $insertData = "INSERT INTO order_cart VALUES(null, '$name_recipe', '$cart_stock', '$sale_price')";
                $execute = mysqli_query($conexion, $insertData);

                if($execute){
                    header("Refresh: 1; url=../new-sales.php");

                    echo "<div class='success'>
                            <div class='back'>
                                <div class='tlt-icon'>
                                    <h2>Pedido agregado</h2>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                                </div>

                                <p class='info-text'>Se agregó el pedido al carrito.</p>
                            </div>
                        </div>";
                        
                    exit;
                }
            } else {
                header("Refresh: 5; url=../new-sales.php");

                echo "<div class='warning'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>El pedido no se pudo agregar</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24'><path fill='#911919' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/></svg>
                            </div>

                            <p class='info-text'>La cantidad ingresada supera la disponibilidad actual, revisa tu inventario.</p>
                        </div>
                    </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>
