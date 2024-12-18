<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar ingredientes - Vendex</title>
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
            $id_ingredient = $_GET['id']; 
        }

        $queryingredient = "SELECT * FROM ingredients WHERE id = $id_ingredient";
        $result = mysqli_query($conexion, $queryingredient);
        $row = mysqli_fetch_array($result);
    ?>
</head>
<body>

    <main class="main">
        <nav class="nav-dash">
            <a href="../../../dashboard-restaurant.php" class="go-dash">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="m4 10l-.707.707L2.586 10l.707-.707zm17 8a1 1 0 1 1-2 0zM8.293 15.707l-5-5l1.414-1.414l5 5zm-5-6.414l5-5l1.414 1.414l-5 5zM4 9h10v2H4zm17 7v2h-2v-2zm-7-7a7 7 0 0 1 7 7h-2a5 5 0 0 0-5-5z"/></svg>
                <p>Dashboard</p>
            </a>

            <div class="user-modal">
                <div class="username">
                    <img src="../../../../svg/people.svg" alt="">
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
                    <h2 class="tlt-function">Actualizar ingredientes</h2>
                    
                    <a href="../ingredient-inventory.php" class="button-function bg-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5Zm0 3.9a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0 7.9c2 0 6 1.09 6 3.08a7.2 7.2 0 0 1-12 0c0-1.99 4-3.08 6-3.08"/></svg>
                        <p>Administrar inventario de ingredientes</p>
                    </a>
                </div>

                <div class="content-form">
                    <form action="update-ingredients.php?id=<?php echo $id_ingredient ?>" method="POST" class="form-flex">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="name-ingredient">Nombre del ingrediente</label>
                                    <input type="text" name="name-ingredient" class="input-form b-col-fcs-val" placeholder="Nombre del producto" value="<?php echo $row['name_ingredient'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="purchase-price">Precio de compra</label>
                                    <input type="number" name="purchase-price" class="input-form b-col-fcs-val" placeholder="Precio de compra" value="<?php echo $row['purchase_price'] ?>" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="unit">Unidad</label>
                                    <select name="unit" class="select b-col-fcs-val" required>
                                        <?php
                                            if($row['unit'] == 'g'){
                                                echo "<option value='g' selected>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'kg'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg' selected>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'lb'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb' selected>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'oz'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz' selected>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'ml'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml' selected>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'l'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l' selected>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'taza'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza' selected>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'cucharada'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada' selected>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'cucharadita'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita' selected>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'unidad'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad' selected>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'docena'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena' selected>Docena</option>";
                                                echo "<option value='paquete'>Paquete</option>";
                                            } else if ($row['unit'] == 'paquete'){
                                                echo "<option value='g'>Gramos</option>";
                                                echo "<option value='kg'>Kilogramos</option>";
                                                echo "<option value='lb'>Libras</option>";
                                                echo "<option value='oz'>Onzas</option>";
                                                echo "<option value='ml'>Mililitros</option>";
                                                echo "<option value='l'>Litros</option>";
                                                echo "<option value='taza'>Taza</option>";
                                                echo "<option value='cucharada'>Cucharada</option>";
                                                echo "<option value='cucharadita'>Cucharadita</option>";
                                                echo "<option value='unidad'>Unidad</option>";
                                                echo "<option value='docena'>Docena</option>";
                                                echo "<option value='paquete' selected>Paquete</option>";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="id-category">Categoría</label>
                                    <select name="id-category" class="select b-col-fcs-val" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <?php
                                            $getCategory = "SELECT * FROM categories_restaurant";
                                            $result = mysqli_query($conexion, $getCategory);

                                            while($rowCategory = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $rowCategory['id'] . ">" . $rowCategory['category'] . " </option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="label-input">
                                    <label for="minimum-stock">Stock mínimo</label>
                                    <input type="number" name="minimum-stock" class="input-form b-col-fcs-val" placeholder="Stock para alertar" value="<?php echo $row['minimum_stock'] ?>" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="entry-date">Fecha de ingreso</label>
                                    <input type="date" name="entry-date" class="input-form b-col-fcs-val" value="<?php echo $row['entry_date'] ?>" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="quantity-stock">Cantidad en stock</label>
                                    <input type="text" name="quantity-stock" class="input-form b-col-fcs-val" placeholder="Cantidad disponible" value="<?php echo $row['quantity_stock'] ?>" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="ingredient-status">Estado</label>
                                    <select name="ingredient-status" class="select b-col-fcs-val" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <?php
                                            if($row['ingredient_status'] == 'Activo') {
                                                echo "<option value='Activo' selected>Activo</option>";
                                                echo "<option value='Agotado'>Agotado</option>";
                                            } else if($row['ingredient_status'] == 'Agotado') {
                                                echo "<option value='Activo'>Activo</option>";
                                                echo "<option value='Agotado' selected>Agotado</option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="button-submit">
                                    <input type="submit" name="button-update-ingredient" class="btn-form bg-btn" value="Actualizar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="../show-category.js"></script>
    <script src="../../../../js/base-nav-dash.js"></script>

</body>
</html>