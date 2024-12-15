<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar nueva venta - Vendex</title>
    <link rel="stylesheet" href="../../../css/store/new-sale.css">
    <link rel="stylesheet" href="../../../css/base-premium.css">
    <link rel="stylesheet" href="../../../css/store/base-autocomplete.css">
    <link rel="shortcut icon" href="../../../svg/icon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>

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
                                <a href="../../..//app/users/logout.php">
                                    <p>Salir</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#eee" d="M16 18H6V8h3v4.77L15.98 6L18 8.03L11.15 15H16z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <section class="new-sale-products" id="hidden-modal">
            <div class="new-sale">
                <div class="tlt-button">
                    <h2 class="tlt-function">Nueva venta</h2>
                    
                    <div class="add-see">
                        <div class="button-add-product-sale bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                            <p>Agregar producto a la venta</p>
                        </div>

                        <a href="sales-made.php" class="button-function bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 512 512"><path fill="#eee" d="M258.9 48C141.92 46.42 46.42 141.92 48 258.9c1.56 112.19 92.91 203.54 205.1 205.1c117 1.6 212.48-93.9 210.88-210.88C462.44 140.91 371.09 49.56 258.9 48m-16.79 192.47l51.55-59a16 16 0 0 1 24.1 21.06l-51.55 59a16 16 0 1 1-24.1-21.06m-38.86 90.85a16 16 0 0 1-22.62 0l-47.95-48a16 16 0 1 1 22.64-22.62l48 48a16 16 0 0 1-.07 22.62m176.8-128.79l-111.88 128a16 16 0 0 1-11.51 5.47h-.54a16 16 0 0 1-11.32-4.69l-47.94-48a16 16 0 1 1 22.64-22.62l29.8 29.83a8 8 0 0 0 11.68-.39l95-108.66a16 16 0 0 1 24.1 21.06Z"/></svg>    
                            <p>Ver ventas realizadas</p>
                        </a>
                    </div>
                </div>

                <div class="content-table">
                    <div class="tlt-buttons-sale">
                        <div class="list-message">
                            <h3 class="tlt">Productos listados</h3>
                            <?php
                                $message = isset($_GET['message']) ? $_GET['message'] : '';
                                $message_type = isset($_GET['message_type']) ? $_GET['message_type'] : '';

                                echo "<p class='" . $message_type . "'>" . $message . "</p>";
                            ?>
                        </div>

                        <div class="cancel-generate-buttons">
                            <div class="options-pay-credit">
                                <button type="button" class="btn-options btn-pay">Pagada</button>
                                <button type="button" class="btn-options btn-credit locked-button">A crédito</button>
                            </div>

                            <a href="functions/cancel-sale.php">
                                <p>Cancelar venta</p>
                            </a>

                            <?php
                                $query = "SELECT COUNT(*) AS total FROM cart_store";
                                $result = mysqli_query($conexion, $query);
                                $row = mysqli_fetch_assoc($result);

                                if ($row['total'] > 0): 
                            ?>
                                <button type="button" class="button-confirm">Confirmar productos</button>
                            <?php 
                                endif; 
                            ?>
                        </div>

                        <script>
                            const totalProductos = <?php echo $row['total']; ?>;

                            const updateCancelButtonTitle = () => {
                                const cancelGenerateButton = document.querySelector('.cancel-generate-buttons');
                                const confirmButton = document.querySelector('.button-confirm');

                                if (totalProductos > 0) {
                                    cancelGenerateButton.title = '';  
                                } else {
                                    cancelGenerateButton.title = 'Agrega productos a la venta';  
                                }
                            };

                            // Ejecutamos la función para actualizar el estado de los botones
                            updateCancelButtonTitle();
                        </script>
                    </div>

                    <div class="hidden-info-sale">
                        <form action="functions/generate-sale.php" method="POST" class="form-generate">
                            <div class="text">
                                <input type="text" name="client" id="client" placeholder="Nombre del cliente" class="input client b-col-fcs-val input-blocked">
                                <input type="email" name="client-email" id="client-email" placeholder="Correo del cliente" class="input client-email b-col-fcs-val input-blocked">
                                <input type="text" name="client-phone" id="client-phone" placeholder="Celular del cliente" class="input client-phone b-col-fcs-val input-blocked">
                                <select name="payment-method" class="select payment-method b-col-fcs-val" required>
                                    <option value="" disabled selected>Método de pago</option>
                                    <option value="Efectivo">Efectivo</option>
                                    <option value="Nequi">Nequi</option>
                                </select>
                            </div>
                            <input type="submit" class="btn-generate" value="Generar venta">
                        </form>
                    </div>

                    <script>
                        $(document).ready(function(){
                            $('#client').autocomplete({
                                source: function(request, response) {
                                    $.ajax({
                                        url: "functions/autocomplete-clients.php",
                                        type: "POST",
                                        data: { query: request.term },
                                        success: function(data) {
                                            response($.parseJSON(data));
                                        }
                                    });
                                },
                                minLength: 1,
                                select: function(event, ui) {
                                    $('#client-email').val(ui.item.email);
                                    $('#client-phone').val(ui.item.phone);
                                }
                            });
                        });
                    </script>

                    <table>
                        <tr>
                            <th>Producto</th>
                            <th>Unidades</th>
                            <th>Precio de venta</th>
                        </tr>

                        <?php
                            $getData = "SELECT * FROM cart_store";
                            $resultData = mysqli_query($conexion, $getData);

                            if($resultData -> num_rows > 0){
                                while ($row = mysqli_fetch_array($resultData)){
                                    echo "<tr>
                                            <td>" . ucfirst($row['product_name']) . "</td>
                                            <td>" . $row['cart_stock'] . "</td>
                                            <td>$" . number_format($row['sale_price'], 0) . "</td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='3'>No hay productos listados</td>   
                                     </tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="modal-add-product">
            <div class="flex-modal">
                <div class="tlt-form">
                    <div class="tlt-close">
                        <h2 class="tlt">Agregar producto</h2>
                        <svg class="close-modal" xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 304 384"><path fill="#ffffff" d="M299 73L179 192l120 119l-30 30l-120-119L30 341L0 311l119-119L0 73l30-30l119 119L269 43z"/></svg>
                    </div>

                    <form action="functions/add-product-sale.php" method="POST" class="form-modal">
                        <div class="content-inputs">
                            <div class="label-input">
                                <label for="name-product">Nombre del producto</label>
                                <input type="text" name="name-product" id="name-product" class="input-form b-col-fcs-val" placeholder="Nombre del producto" onkeyup="searchProduct(this.value)" required>
                            </div>

                            <div class="label-input">
                                <label for="cart-stock">Cantidad</label>
                                <input type="number" name="cart-stock" id="quantity" class="input-form b-col-fcs-val" placeholder="Cantidad" required>
                            </div>
                        </div>

                        <div class="content-inputs">
                            <div class="label-input">
                                <label for="sale-price">Precio</label>
                                <input type="number" name="sale-price" id="sale-price" class="input-form b-col-fcs-val" placeholder="Precio de venta" required>
                            </div>

                            <div class="label-input">
                                <input type="submit" name="button-add-product-sale" class="btn-form-modal bg-btn" value="Agregar producto">
                            </div>
                        </div>
                    </form>

                    <h2 class="tlt-product">Productos</h2>
                    <script>
                        function searchProduct(keyword) {
                            if (keyword.length > 0) {
                                const xhr = new XMLHttpRequest();
                                xhr.open("POST", "functions/search.php", true);
                                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

                                xhr.onreadystatechange = function () {
                                    if (xhr.readyState === 4 && xhr.status === 200) {
                                        document.getElementById("products").innerHTML = xhr.responseText;
                                    }
                                };

                                xhr.send("name-product=" + encodeURIComponent(keyword));
                            } else {
                                document.getElementById("products").innerHTML = ""; // Limpia los resultados si no hay texto
                            }
                        }
                    </script>
                    <div class="products" id="products">
                        <p class="info">El producto que estás buscando se mostrará en este espacio.</p>
                    </div>
                </div>
            </div>
        </section>

        <script>
            $(document).ready(function(){
                $('#name-product').autocomplete({
                    source: function(request, response) {
                        $.ajax({
                            url: "functions/autocomplete.php",
                            type: "POST",
                            data: { query: request.term },
                            success: function(data) {
                                response($.parseJSON(data));
                            }
                        });
                    },
                    minLength: 1,
                    // Agregamos el evento select para cuando se selecciona un producto
                    select: function(event, ui) {
                        // Asumiendo que tienes un input con id="price-product" para el precio
                        $('#sale-price').val(ui.item.price);
                    }
                });
            });
        </script>
    </main>

    <script src="show-modal.js"></script>
    <script src="sale.js"></script>
    <script src="bill/capture.js"></script>
    <script src="bill/send.js"></script>
    <script src="../../../js/base-nav-dash.js"></script>

</body>
</html>