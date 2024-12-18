<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar productos - Vendex</title>
    <link rel="stylesheet" href="../../../../css/base-form.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">

    <?php
        include("../../../../conexion.php");

        session_start();

        if (isset($_SESSION['user_id'])) {
            $id_user = $_SESSION['user_id']; 
        } else {
            header("Location: ../../../../index.php");
            exit(); 
        }

        if (isset($_GET['id'])) {
            $id_product = $_GET['id']; 
        }

        $queryProduct = "SELECT * FROM inventory_products WHERE id = $id_product";
        $result = mysqli_query($conexion, $queryProduct);
        $row = mysqli_fetch_array($result);
        $id_category = $row['id_category'];
    ?>
</head>
<body>

    <main class="main">
        <nav class="nav-dash">
            <a href="../../../dashboard-store.php" class="go-dash">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="m4 10l-.707.707L2.586 10l.707-.707zm17 8a1 1 0 1 1-2 0zM8.293 15.707l-5-5l1.414-1.414l5 5zm-5-6.414l5-5l1.414 1.414l-5 5zM4 9h10v2H4zm17 7v2h-2v-2zm-7-7a7 7 0 0 1 7 7h-2a5 5 0 0 0-5-5z"/></svg>
                <p>Dashboard</p>
            </a>

            <div class="user-modal">
                <div class="username">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="#04BEFA" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208s208-93.31 208-208S370.69 48 256 48m2 96a72 72 0 1 1-72 72a72 72 0 0 1 72-72m-2 288a175.55 175.55 0 0 1-129.18-56.6C135.66 329.62 215.06 320 256 320s120.34 9.62 129.18 55.39A175.52 175.52 0 0 1 256 432"/></svg>
                    <div class="name-down">
                        <?php
                            $queryData = "SELECT name, lastname FROM users WHERE id = $id_user";
                            $result = mysqli_query($conexion, $queryData);
                            $rowData = mysqli_fetch_assoc($result);
                            
                            echo "<p class='name'>" . $rowData['name'] . ' ' . substr($rowData['lastname'], 0, 3) . ".</p>";
                        ?>
                        <img src="../../../../svg/down-arrow.svg" alt="">
                    </div>
                </div>

                <div class="modal-dash">
                    <div class="border-modal">
                        <div class="name-logout">
                            <div class="myself">
                                <?php
                                    $queryData = "SELECT name, lastname, role FROM users WHERE id = $id_user";
                                    $result = mysqli_query($conexion, $queryData);
                                    $rowData = mysqli_fetch_assoc($result);
                                    
                                    echo "<p class='name'>" . $rowData['name'] . ' ' . substr($rowData['lastname'], 0, 3) . ".</p>";
                                    echo "<p class='rol'>" . $rowData['role'] . "</p>"
                                ?>
                            </div>

                            <div class="options-modal">
                                <a href="../../../../app/users/logout.php">
                                    <p>Salir</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#eee" d="M16 18H6V8h3v4.77L15.98 6L18 8.03L11.15 15H16z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <section class="content-add-form" id="hidden-modal">
            <div class="add-form">
                <div class="tlt-button">
                    <h2 class="tlt-function">Actualizar producto</h2>
                    
                    <a href="../admin-inventory.php" class="button-function bg-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5Zm0 3.9a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0 7.9c2 0 6 1.09 6 3.08a7.2 7.2 0 0 1-12 0c0-1.99 4-3.08 6-3.08"/></svg>
                        <p>Administrar inventario</p>
                    </a>
                </div>

                <div class="content-form">
                    <form action="update.php?id=<?php echo $id_product ?>" method="POST" class="form">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="name-product">Nombre del producto</label>
                                    <input type="text" name="name-product" class="input-form b-col-fcs-val" placeholder="Nombre del producto" value="<?php echo $row['product_name'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="quantity-stock">Cantidad disponible</label>
                                    <input type="text" name="quantity-stock" class="input-form b-col-fcs-val" placeholder="Cantidad disponible" value="<?php echo $row['stock_quantity'] ?>" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="purchase-price">Costo</label>
                                    <input type="number" name="purchase-price" class="input-form b-col-fcs-val" placeholder="Precio de compra" value="<?php echo $row['purchase_price'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="sale-price">Precio</label>
                                    <input type="number" name="sale-price" class="input-form b-col-fcs-val" placeholder="Precio de venta" value="<?php echo $row['sale_price'] ?>" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="id-category">Categoría</label>
                                    <select name="id-category" class="select b-col-fcs-val" required>
                                        <?php
                                            $getCategory = "SELECT id, category FROM categories_store WHERE id = $id_category";
                                            $result = mysqli_query($conexion, $getCategory);
                                            $rowCat = mysqli_fetch_array($result);

                                            $selected = ($rowCat['id'] == $id_category) ? 'selected' : '';
                                            echo "<option value='" . $rowCat['id'] . "' $selected>" . $rowCat['category'] . " </option>";
                                        ?>
                                    </select>
                                </div>

                                <div class="label-input">
                                    <label for="product-description">Descripción</label>
                                    <input type="text" name="product-description" class="input-form b-col-fcs-val" placeholder="Agrega una descripción" value="<?php echo $row['product_description'] ?>" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="unit-measure">Unidad de compra</label>
                                    <select name="unit-measure" class="select b-col-fcs-val" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <?php
                                            if($row['unit_measure'] == 'Sin unidad'){
                                                echo "<option value='Sin unidad' selected>Sin unidad</option>";
                                                echo "<option value='Unidades'>Unidades</option>";
                                                echo "<option value='Kilos'>Kilos</option>";
                                                echo "<option value='Gramos'>Gramos</option>";
                                                echo "<option value='Miligramos'>Miligramos</option>";
                                                echo "<option value='Onzas'>Onzas</option>";
                                                echo "<option value='Libras'>Libras</option>";
                                                echo "<option value='Litros'>Litros</option>";
                                            } else if($row['unit_measure'] == 'Unidades'){
                                                echo "<option value='Sin unidad'>Sin unidad</option>";
                                                echo "<option value='Unidades' selected>Unidades</option>";
                                                echo "<option value='Kilos'>Kilos</option>";
                                                echo "<option value='Gramos'>Gramos</option>";
                                                echo "<option value='Miligramos'>Miligramos</option>";
                                                echo "<option value='Onzas'>Onzas</option>";
                                                echo "<option value='Libras'>Libras</option>";
                                                echo "<option value='Litros'>Litros</option>";
                                            } else if($row['unit_measure'] == 'Kilos'){
                                                echo "<option value='Sin unidad'>Sin unidad</option>";
                                                echo "<option value='Unidades'>Unidades</option>";
                                                echo "<option value='Kilos' selected>Kilos</option>";
                                                echo "<option value='Gramos'>Gramos</option>";
                                                echo "<option value='Miligramos'>Miligramos</option>";
                                                echo "<option value='Onzas'>Onzas</option>";
                                                echo "<option value='Libras'>Libras</option>";
                                                echo "<option value='Litros'>Litros</option>";
                                            } else if($row['unit_measure'] == 'Gramos'){
                                                echo "<option value='Sin unidad'>Sin unidad</option>";
                                                echo "<option value='Unidades'>Unidades</option>";
                                                echo "<option value='Kilos'>Kilos</option>";
                                                echo "<option value='Gramos' selected>Gramos</option>";
                                                echo "<option value='Miligramos'>Miligramos</option>";
                                                echo "<option value='Onzas'>Onzas</option>";
                                                echo "<option value='Libras'>Libras</option>";
                                                echo "<option value='Litros'>Litros</option>";
                                            } else if($row['unit_measure'] == 'Miligramos'){
                                                echo "<option value='Sin unidad'>Sin unidad</option>";
                                                echo "<option value='Unidades'>Unidades</option>";
                                                echo "<option value='Kilos'>Kilos</option>";
                                                echo "<option value='Gramos'>Gramos</option>";
                                                echo "<option value='Miligramos' selected>Miligramos</option>";
                                                echo "<option value='Onzas'>Onzas</option>";
                                                echo "<option value='Libras'>Libras</option>";
                                                echo "<option value='Litros'>Litros</option>";
                                            } else if($row['unit_measure'] == 'Onzas'){
                                                echo "<option value='Sin unidad'>Sin unidad</option>";
                                                echo "<option value='Unidades'>Unidades</option>";
                                                echo "<option value='Kilos'>Kilos</option>";
                                                echo "<option value='Gramos'>Gramos</option>";
                                                echo "<option value='Miligramos'>Miligramos</option>";
                                                echo "<option value='Onzas' selected>Onzas</option>";
                                                echo "<option value='Libras'>Libras</option>";
                                                echo "<option value='Litros'>Litros</option>";
                                            } else if($row['unit_measure'] == 'Libras'){
                                                echo "<option value='Sin unidad'>Sin unidad</option>";
                                                echo "<option value='Unidades'>Unidades</option>";
                                                echo "<option value='Kilos'>Kilos</option>";
                                                echo "<option value='Gramos'>Gramos</option>";
                                                echo "<option value='Miligramos'>Miligramos</option>";
                                                echo "<option value='Onzas'>Onzas</option>";
                                                echo "<option value='Libras' selected>Libras</option>";
                                                echo "<option value='Litros'>Litros</option>";
                                            } else if($row['unit_measure'] == 'Litros'){
                                                echo "<option value='Sin unidad'>Sin unidad</option>";
                                                echo "<option value='Unidades'>Unidades</option>";
                                                echo "<option value='Kilos'>Kilos</option>";
                                                echo "<option value='Gramos'>Gramos</option>";
                                                echo "<option value='Miligramos'>Miligramos</option>";
                                                echo "<option value='Onzas'>Onzas</option>";
                                                echo "<option value='Libras'>Libras</option>";
                                                echo "<option value='Litros' selected>Litros</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="label-input">
                                    <label for="supplier">Proveedor</label>
                                    <input type="text" name="supplier" class="input-form b-col-fcs-val" placeholder="Proveedor" value="<?php echo $row['supplier'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="button-submit">
                            <input type="submit" name="button-update-product" class="btn-form bg-btn" value="Actualizar producto">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="../../../../js/base-nav-dash.js"></script>
</body>
</html>