<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar inventario - Vendex</title>
    <link rel="stylesheet" href="../../css/update-inventory.css">
    <link rel="shortcut icon" href="../../svg/icon-vendex.svg" type="image/x-icon">
</head>
<body>

    <main class="main">
        <nav class="nav-dash">
            <a href="../dashboard-store.php" class="go-dash">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="m4 10l-.707.707L2.586 10l.707-.707zm17 8a1 1 0 1 1-2 0zM8.293 15.707l-5-5l1.414-1.414l5 5zm-5-6.414l5-5l1.414 1.414l-5 5zM4 9h10v2H4zm17 7v2h-2v-2zm-7-7a7 7 0 0 1 7 7h-2a5 5 0 0 0-5-5z"/></svg>
                <p>Dashboard</p>
            </a>

            <div class="user-modal">
                <div class="username">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#6bc04e" d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12S6.48 2 12 2M6.023 15.416C7.491 17.606 9.695 19 12.16 19s4.669-1.393 6.136-3.584A8.97 8.97 0 0 0 12.16 13a8.97 8.97 0 0 0-6.137 2.416M12 11a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></svg>
                    <div class="name-down">
                        <p class="name">Ferney Bar.</p>
                        <img src="../../svg/down-arrow.svg" alt="">
                    </div>
                </div>

                <div class="modal-dash">
                    <div class="border-modal">
                        <div class="name-logout">
                            <div class="myself">
                                <p class="name">Ferney Bar.</p>
                                <p class="rol">Store</p>
                            </div>

                            <div class="options-modal">
                                <a href="#">
                                    <p>Salir</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#eee" d="M16 18H6V8h3v4.77L15.98 6L18 8.03L11.15 15H16z"/></svg>
                                </a>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <section class="info-table-product">
            <div class="table-products">
                <div class="tlt-search-add">
                    <h2 class="tlt-function">Actualizar inventario</h2>
                    
                    <div class="search-add">
                        <form action="" method="POST" class="form-search">
                            <input type="text" name="search" class="input-search" placeholder="Buscar por producto..." required>
                            <input type="submit" name="button-search" class="btn-search" value="Buscar">
                        </form>
                        
                        <div class="add">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                            <p>Agregar producto</p>
                        </div>
                    </div>
                </div>

                <div class="content-table">
                    <table>
                        <tr>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Categoría</th>
                            <th>Precio de compra</th>
                            <th>Precio de venta</th>
                            <th>Stock</th>
                            <th>Proveedor</th>
                            <th>Fecha de ingreso</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>

                        <tr>
                            <td>Arroz pinillar</td>
                            <td>Arroz bueno</td>
                            <td>Alimentos</td>
                            <td>$2,500</td>
                            <td>$4,000</td>
                            <td>18</td>
                            <td>Proveedor A</td>
                            <td>2024-10-20</td>
                            <td>Activo</td>
                            <td>Eliminar</td>
                        </tr>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <script src="../../js/base-nav-dash.js"></script>
</body>
</html>