<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Store - Vendex</title>
    <link rel="stylesheet" href="../css/dashboard-store.css">
    <link rel="shortcut icon" href="../svg/icon-vendex" type="image/x-icon">
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

        </section>
    </main>

    <script src="../js/dashboard-store.js"></script>
</body>
</html>