<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Store - Vendex</title>
    <link rel="stylesheet" href="../css/dashboard-store.css">
    <link rel="shortcut icon" href="../svg/icon-vendex.svg" type="image/x-icon">
</head>
<body>

    <main class="main-store">
        <section class="sidebar">
            <div class="logo">
                <img src="../svg/icon-vendex.svg" alt="Logo de Vendex">
                <h1>ENDEX</h1>
            </div>

            <div class="functions-dash">
                <div class="accordion">
                    <div class="accordion-btn">
                        <span>Inventario</span>
                        <img src="../svg/down-arrow.svg" class="down-arrow" alt="">
                        <img src="../svg/up-arrow.svg" class="up-arrow" alt="">
                    </div>

                    <div class="accordion-content">
                        <div>
                            <a href="#">
                                <img src="../svg/add.svg" alt="">
                                <p>Agregar productos</p>
                            </a>

                            <a href="#">
                                <img src="../svg/update.svg" alt="">
                                <p>Actualizar inventario</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="accordion">
                    <div class="accordion-btn">
                        <span>Ventas</span>
                        <img src="../svg/down-arrow.svg" class="down-arrow" alt="">
                        <img src="../svg/up-arrow.svg" class="up-arrow" alt="">
                    </div>

                    <div class="accordion-content">
                        <div>
                            <a href="#">
                                <img src="../svg/add.svg" alt="">
                                <p>Nueva venta</p>
                            </a>

                            <a href="#">
                                <img src="../svg/update.svg" alt="">
                                <p>Ver ventas realizadas</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="accordion">
                    <div class="accordion-btn">
                        <span>Ganancias</span>
                        <img src="../svg/down-arrow.svg" class="down-arrow" alt="">
                        <img src="../svg/up-arrow.svg" class="up-arrow" alt="">
                    </div>

                    <div class="accordion-content">
                        <div>
                            <a href="#">
                                <img src="../svg/add.svg" alt="">
                                <p>Ver ganancias de ventas</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

        </section>

        <section class="dashboard">
            <nav class="nav-dash">
                <h2 class="tlt-dash">Dashboard</h2>
                <div class="noti-username">
                    <a href="#">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M4 19v-2h2v-7q0-2.075 1.25-3.687T10.5 4.2V2h3v2.2q2 .5 3.25 2.113T18 10v7h2v2zm8 3q-.825 0-1.412-.587T10 20h4q0 .825-.587 1.413T12 22"/></svg>
                        <span>9</span>
                    </a>
                    
                    <div class="user-modal">
                        <div class="username">
                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#2ab2ed" d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12S6.48 2 12 2M6.023 15.416C7.491 17.606 9.695 19 12.16 19s4.669-1.393 6.136-3.584A8.97 8.97 0 0 0 12.16 13a8.97 8.97 0 0 0-6.137 2.416M12 11a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></svg>
                            <div class="name-down">
                                <p class="name">Ferney Bar.</p>
                                <img src="../svg/down-arrow.svg" alt="">
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
                                        <a href="#">Salir</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <section class="control-dash">

            </section>
        </section>
    </main>

    <script src="../js/dashboard-store.js"></script>
</body>
</html>