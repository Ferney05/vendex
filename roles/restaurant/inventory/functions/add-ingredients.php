<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar insumos al inventario - Vendex</title>
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
                    <h2 class="tlt-function">Agregar insumos / ingredientes</h2>
                    
                    <div class="create-update">
                        <div class="button-create-category bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M2 20V4h8l2 2h10v14zm12-4h2v-2h2v-2h-2v-2h-2v2h-2v2h2z"/></svg>
                            <p>Crear categoría</p>
                        </div>

                        <a href="../ingredient-inventory.php" class="button-function bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5Zm0 3.9a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0 7.9c2 0 6 1.09 6 3.08a7.2 7.2 0 0 1-12 0c0-1.99 4-3.08 6-3.08"/></svg>
                            <p>Administrar inventario de ingredientes</p>
                        </a>
                    </div>
                </div>

                <div class="content-form">
                    <form action="adding-ingredients.php" method="POST" class="form-flex">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="name-ingredient">Nombre del ingrediente</label>
                                    <input type="text" name="name-ingredient" class="input-form b-col-fcs-val" placeholder="Nombre del producto" required>
                                </div>

                                <div class="label-input">
                                    <label for="purchase-price">Precio de compra</label>
                                    <input type="number" name="purchase-price" class="input-form b-col-fcs-val" placeholder="Precio de compra" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="unit">Unidad</label>
                                    <select name="unit" class="select b-col-fcs-val" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="g">Gramos</option>
                                        <option value="kg">Kilogramos</option>
                                        <option value="lb">Libras</option>
                                        <option value="oz">Onzas</option>
                                        <option value="ml">Mililitros</option>
                                        <option value="l">Litros</option>
                                        <option value="taza">Taza</option>
                                        <option value="cucharada">Cucharada</option>
                                        <option value="cucharadita">Cucharadita</option>
                                        <option value="unidad">Unidad</option>
                                        <option value="docena">Docena</option>
                                        <option value="paquete">Paquete</option>
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

                                            while($row = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $row['id'] . ">" . $row['category'] . " </option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="label-input">
                                    <label for="minimum-stock">Stock mínimo</label>
                                    <input type="number" name="minimum-stock" class="input-form b-col-fcs-val" placeholder="Stock para alertar" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="entry-date">Fecha de ingreso</label>
                                    <input type="date" name="entry-date" class="input-form b-col-fcs-val" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="quantity-stock">Cantidad en stock</label>
                                    <input type="text" name="quantity-stock" class="input-form b-col-fcs-val" placeholder="Cantidad disponible" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="ingredient-status">Estado</label>
                                    <select name="ingredient-status" class="select b-col-fcs-val" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Agotado">Agotado</option>
                                    </select>
                                </div>

                                <div class="button-submit">
                                    <input type="submit" name="button-add-ingredient" class="btn-form bg-btn" value="Agregar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        <section class="modal-category">
            <div class="flex-modal">
                <div class="tlt-form">
                    <div class="tlt-close">
                        <h2 class="tlt">Crear categoría</h2>
                        <svg class="close-modal" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 304 384"><path fill="#ffffff" d="M299 73L179 192l120 119l-30 30l-120-119L30 341L0 311l119-119L0 73l30-30l119 119L269 43z"/></svg>
                    </div>

                    <form action="create-category.php" method="POST" class="form-modal">
                        <div class="label-input">
                            <label for="name-category" class="label-modal">Nombre de la categoría</label>
                            <input type="text" name="name-category" class="input-form border-input b-col-fcs-val" placeholder="Categoría" required>
                        </div>

                        <div class="label-input">
                            <input type="submit" name="button-create-category" class="btn-form-modal bg-btn" value="Crear">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="show-category.js"></script>
    <script src="../../../../js/base-nav-dash.js"></script>

</body>
</html>