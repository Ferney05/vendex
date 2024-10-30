<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar productos al inventario - Vendex</title>
    <link rel="stylesheet" href="../../../css/store/add-products.css">
    <link rel="shortcut icon" href="../../../svg/icon-vendex.svg" type="image/x-icon">

    <?php
        include("../../../conexion.php");

        session_start();

        if (isset($_SESSION['user_id'])) {
            $id_user = $_SESSION['user_id']; 
        } else {
            header("Location: ../index.php");
            exit(); 
        }
    ?>
</head>
<body>

    <main class="main">
        <nav class="nav-dash">
            <a href="../../dashboard-store.php" class="go-dash">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="m4 10l-.707.707L2.586 10l.707-.707zm17 8a1 1 0 1 1-2 0zM8.293 15.707l-5-5l1.414-1.414l5 5zm-5-6.414l5-5l1.414 1.414l-5 5zM4 9h10v2H4zm17 7v2h-2v-2zm-7-7a7 7 0 0 1 7 7h-2a5 5 0 0 0-5-5z"/></svg>
                <p>Dashboard</p>
            </a>

            <div class="user-modal">
                <div class="username">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#6bc04e" d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12S6.48 2 12 2M6.023 15.416C7.491 17.606 9.695 19 12.16 19s4.669-1.393 6.136-3.584A8.97 8.97 0 0 0 12.16 13a8.97 8.97 0 0 0-6.137 2.416M12 11a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></svg>
                    <div class="name-down">
                        <?php
                            $queryData = "SELECT name, lastname FROM users WHERE id = $id_user";
                            $result = mysqli_query($conexion, $queryData);
                            $rowData = mysqli_fetch_assoc($result);
                            
                            echo "<p class='name'>" . $rowData['name'] . ' ' . substr($rowData['lastname'], 0, 3) . ".</p>";
                        ?>
                        <img src="../../../svg/down-arrow.svg" alt="">
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
                                <a href="../../../app/users/logout.php">
                                    <p>Salir</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#eee" d="M16 18H6V8h3v4.77L15.98 6L18 8.03L11.15 15H16z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <section class="add-products-form" id="hidden-modal">
            <div class="add-form">
                <div class="tlt-button">
                    <h2 class="tlt-function">Agregar producto</h2>
                    
                    <div class="create-update">
                        <div class="button-create-category">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M2 20V4h8l2 2h10v14zm12-4h2v-2h2v-2h-2v-2h-2v2h-2v2h2z"/></svg>
                            <p>Crear categoría</p>
                        </div>

                        <a href="admin-inventory.php" class="button-function">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5Zm0 3.9a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0 7.9c2 0 6 1.09 6 3.08a7.2 7.2 0 0 1-12 0c0-1.99 4-3.08 6-3.08"/></svg>
                            <p>Administrar inventario</p>
                        </a>
                    </div>
                </div>

                <div class="content-form">
                    <form action="functions/adding-products.php" method="POST" class="form">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="name-product">Nombre del producto</label>
                                    <input type="text" name="name-product" class="input-form" placeholder="Nombre del producto" required>
                                </div>

                                <div class="label-input">
                                    <label for="purchase-price">Precio de compra</label>
                                    <input type="number" name="purchase-price" class="input-form" placeholder="Precio de compra" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="product-description">Descripción del producto</label>
                                    <input type="text" name="product-description" class="input-form" placeholder="Descripción" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="id-category">Categoría</label>
                                    <select name="id-category" class="select" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <?php
                                            $getCategory = "SELECT * FROM categories";
                                            $result = mysqli_query($conexion, $getCategory);

                                            while($row = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $row['id'] . ">" . $row['category'] . " </option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="label-input">
                                    <label for="sale-price">Precio de venta</label>
                                    <input type="number" name="sale-price" class="input-form" placeholder="Precio de venta" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="entry-date">Fecha de ingreso</label>
                                    <input type="date" name="entry-date" class="input-form" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="supplier">Proveedor</label>
                                    <input type="text" name="supplier" class="input-form" placeholder="Proveedor" required>
                                </div>

                                <div class="label-input">
                                    <label for="quantity-stock">Cantidad en stock</label>
                                    <input type="text" name="quantity-stock" class="input-form" placeholder="Cantidad disponible" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="product-status">Estado del producto</label>
                                    <select name="product-status" class="select" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="Activo">Activo</option>
                                        <option value="Agotado">Agotado</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="button-submit">
                            <input type="submit" name="button-add-product" class="btn-form" value="Agregar">
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

                    <form action="functions/create-category.php" method="POST" class="form-modal">
                        <div class="label-input">
                            <label for="name-category" class="label-modal">Nombre de la categoría</label>
                            <input type="text" name="name-category" class="input-form border-input" placeholder="Categoría" required>
                        </div>

                        <div class="label-input">
                            <input type="submit" name="button-create-category" class="btn-form-modal" value="Crear">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="show-category.js"></script>
    <script src="../../../js/base-nav-dash.js"></script>

</body>
</html>