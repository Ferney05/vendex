<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar productos al inventario - Vendex</title>
    <link rel="stylesheet" href="../../../css/base-form.css">
    <link rel="shortcut icon" href="../../../svg/icon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <?php
        include("../../../conexion.php");

        session_start();

        if (isset($_SESSION['user_id'])) {
            $id_user = $_SESSION['user_id']; 
        } else {
            header("Location: ../../../index.php");
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
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="#04BEFA" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208s208-93.31 208-208S370.69 48 256 48m2 96a72 72 0 1 1-72 72a72 72 0 0 1 72-72m-2 288a175.55 175.55 0 0 1-129.18-56.6C135.66 329.62 215.06 320 256 320s120.34 9.62 129.18 55.39A175.52 175.52 0 0 1 256 432"/></svg>
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

        <section class="content-add-form" id="hidden-modal">
            <div class="add-form">
                <div class="tlt-button">
                    <h2 class="tlt-function">Agregar producto</h2>
                    
                    <div class="create-update">
                        <div class="button-create-category bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M2 20V4h8l2 2h10v14zm12-4h2v-2h2v-2h-2v-2h-2v2h-2v2h2z"/></svg>
                            <p>Crear categoría</p>
                        </div>

                        <a href="admin-inventory.php" class="button-function bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5Zm0 3.9a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0 7.9c2 0 6 1.09 6 3.08a7.2 7.2 0 0 1-12 0c0-1.99 4-3.08 6-3.08"/></svg>
                            <p>Administrar inventario</p>
                        </a>
                    </div>
                </div>

                <div class="content-form">
                    <form id="add-product-form" action="functions/adding-products.php" method="POST" class="form">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="name-product">Nombre del producto</label>
                                    <input type="text" name="name-product" class="input-form b-col-fcs-val" placeholder="Nombre del producto" required>
                                </div>

                                <div class="label-input">
                                    <label for="quantity-stock">Cantidad disponible</label>
                                    <input type="number" name="quantity-stock" class="input-form b-col-fcs-val" placeholder="Cantidad disponible" value="0" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="purchase-price">Costo</label>
                                    <input type="number" name="purchase-price" class="input-form b-col-fcs-val" placeholder="Precio de compra" value="0" required>
                                </div>

                                <div class="label-input">
                                    <label for="sale-price">Precio</label>
                                    <input type="number" name="sale-price" class="input-form b-col-fcs-val" placeholder="Precio de venta" value="0" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="id-category">Categoría</label>
                                    <select name="id-category" class="select b-col-fcs-val" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="Sin categoría">Sin categoría</option>
                                        <?php
                                            $getCategory = "SELECT * FROM categories_store";
                                            $result = mysqli_query($conexion, $getCategory);

                                            while($row = mysqli_fetch_array($result)) {
                                                echo "<option value=" . $row['id'] . ">" . $row['category'] . " </option>";
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="label-input">
                                    <label for="product-description">Descripción</label>
                                    <input type="text" name="product-description" class="input-form b-col-fcs-val" placeholder="Agrega una descripción" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="unit-measure">Unidad de compra</label>
                                    <select name="unit-measure" class="select b-col-fcs-val" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <option value="Sin unidad">Sin unidad</option>
                                        <option value="Unidades">Unidades</option>
                                        <option value="Kilos">Kilos</option>
                                        <option value="Gramos">Gramos</option>
                                        <option value="Miligramos">Miligramos</option>
                                        <option value="Onzas">Onzas</option>
                                        <option value="Libras">Libras</option>
                                        <option value="Litros">Litros</option>
                                    </select>
                                </div>

                                <div class="label-input">
                                    <label for="supplier">Proveedor</label>
                                    <input type="text" name="supplier" class="input-form b-col-fcs-val" placeholder="Proveedor" required>
                                </div>
                            </div>
                        </div>

                        <div class="button-submit">
                            <button type="button" name="button-add-product" class="btn-form bg-btn" id="add-product-button">Agregar producto</button>
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
    <script src="../../../js/base-nav-dash.js"></script>

    <script>
        document.getElementById('add-product-button').addEventListener('click', function() {
            const idCategory = document.querySelector('select[name="id-category"]').value;
            const productName = document.querySelector('input[name="name-product"]').value;
            const supplier = document.querySelector('input[name="supplier"]').value;
            const purchasePrice = document.querySelector('input[name="purchase-price"]').value;
            const salePrice = document.querySelector('input[name="sale-price"]').value;
            const quantityStock = document.querySelector('input[name="quantity-stock"]').value;
            const productDescription = document.querySelector('input[name="product-description"]').value;
            const unitMeasure = document.querySelector('select[name="unit-measure"]').value;

            // Enviar datos al servidor usando AJAX
            fetch('functions/adding-products.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    'id-category': idCategory,
                    'name-product': productName,
                    'supplier': supplier,
                    'purchase-price': purchasePrice,
                    'sale-price': salePrice,
                    'quantity-stock': quantityStock,
                    'product-description': productDescription,
                    'unit-measure': unitMeasure,
                    'button-add-product': true // Asegúrate de que este campo esté presente
                })
            })
            .then(response => response.text())
            .then(data => {
                // Almacenar el mensaje en localStorage basado en la respuesta del servidor
                if (data.includes('Producto agregado')) {
                    localStorage.setItem('toastMessage', 'Producto añadido al inventario.');
                    localStorage.setItem('toastType', 'success');
                } else {
                    localStorage.setItem('toastMessage', 'Error al agregar el producto: ' + data);
                    localStorage.setItem('toastType', 'error');
                }
                // Recargar la página
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                localStorage.setItem('toastMessage', 'Ocurrió un error al agregar el producto.');
                localStorage.setItem('toastType', 'error');
                location.reload();
            });
        });

        // Mostrar el mensaje de Toastify al cargar la página
        window.onload = function() {
            const message = localStorage.getItem('toastMessage');
            const type = localStorage.getItem('toastType');
            if (message) {
                Toastify({
                    text: message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: 'center',
                    backgroundColor: type === 'success' ? "linear-gradient(to right, #4CAF50, #81C784)" : "linear-gradient(to right, #FF5F6D, #FFC371)",
                }).showToast();
                // Limpiar el mensaje después de mostrarlo
                localStorage.removeItem('toastMessage');
                localStorage.removeItem('toastType');
            }
        };
    </script>

</body>
</html>