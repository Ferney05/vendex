<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Store - Vendex</title>
    <link rel="stylesheet" href="../css/dashboard-store.css">
    <link rel="shortcut icon" href="../svg/icon-vendex.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24"><path fill="#eee" d="M4 19v-2h2v-7q0-2.075 1.25-3.687T10.5 4.2V2h3v2.2q2 .5 3.25 2.113T18 10v7h2v2zm8 3q-.825 0-1.412-.587T10 20h4q0 .825-.587 1.413T12 22"/></svg>
                        <span>9</span>
                    </a>
                    
                    <div class="user-modal">
                        <div class="username">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#6bc04e" d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12S6.48 2 12 2M6.023 15.416C7.491 17.606 9.695 19 12.16 19s4.669-1.393 6.136-3.584A8.97 8.97 0 0 0 12.16 13a8.97 8.97 0 0 0-6.137 2.416M12 11a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></svg>
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
                                        <a href="#">
                                            <p>Salir</p>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#eee" d="M16 18H6V8h3v4.77L15.98 6L18 8.03L11.15 15H16z"/></svg>
                                        </a>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <section class="control-dash">
                <div class="content-dash">
                    <div class="group-cards">
                        <h3 class="tlt-group">Resumen de ventas del día</h3>

                        <div class="card-union">
                            <div class="padd">
                                <div class="icon-name-slogan">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="34.285714285714285" viewBox="0 0 448 512"><path fill="#eee" d="M353.4 32H94.7C42.6 32 0 74.6 0 126.6v258.7C0 437.4 42.6 480 94.7 480h258.7c52.1 0 94.7-42.6 94.7-94.6V126.6c0-52-42.6-94.6-94.7-94.6m-50 316.4c-27.9 48.2-89.9 64.9-138.2 37.2c-22.9 39.8-54.9 8.6-42.3-13.2l15.7-27.2c5.9-10.3 19.2-13.9 29.5-7.9c18.6 10.8-.1-.1 18.5 10.7c27.6 15.9 63.4 6.3 79.4-21.3c15.9-27.6 6.3-63.4-21.3-79.4c-17.8-10.2-.6-.4-18.6-10.6c-24.6-14.2-3.4-51.9 21.6-37.5c18.6 10.8-.1-.1 18.5 10.7c48.4 28 65.1 90.3 37.2 138.5m21.8-208.8c-17 29.5-16.3 28.8-19 31.5c-6.5 6.5-16.3 8.7-26.5 3.6c-18.6-10.8.1.1-18.5-10.7c-27.6-15.9-63.4-6.3-79.4 21.3s-6.3 63.4 21.3 79.4c0 0 18.5 10.6 18.6 10.6c24.6 14.2 3.4 51.9-21.6 37.5c-18.6-10.8.1.1-18.5-10.7c-48.2-27.8-64.9-90.1-37.1-138.4c27.9-48.2 89.9-64.9 138.2-37.2l4.8-8.4c14.3-24.9 52-3.3 37.7 21.5"/></svg>
                                    <div class="name-slogan">
                                        <p class="name-card">Total ventas del día</p>
                                        <p class="slogan-card">Hoy vendimos éxito.</p>
                                    </div>
                                </div>

                                <div class="num-percentage-content">
                                    <div class="num-percentage">
                                        <p class="num">19</p>
                                        <div class="icon-percentage">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48"><path fill="none" stroke="#6bc04e" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M24.008 12.1V36M12 24l12-12l12 12"/></svg>
                                            <p class="percentage">1.76%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-union">
                            <div class="padd">
                                <div class="icon-name-slogan">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#eee" d="M12.005 22.003c-5.523 0-10-4.477-10-10s4.477-10 10-10s10 4.477 10 10s-4.477 10-10 10m-3.5-8v2h2.5v2h2v-2h1a2.5 2.5 0 1 0 0-5h-4a.5.5 0 1 1 0-1h5.5v-2h-2.5v-2h-2v2h-1a2.5 2.5 0 1 0 0 5h4a.5.5 0 0 1 0 1z"/></svg>
                                    <div class="name-slogan">
                                        <p class="name-card">Ganancia total del día</p>
                                        <p class="slogan-card">Tu éxito, en números</p>
                                    </div>
                                </div>

                                <div class="num-percentage-content">
                                    <div class="num-percentage">
                                        <div class="num-margen">
                                            <p class="num">$125,000</p>
                                            <p class="margen">$54,500</p>
                                        </div>

                                        <div class="icon-percentage">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48"><path fill="none" stroke="#6bc04e" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M24.008 12.1V36M12 24l12-12l12 12"/></svg>
                                            <p class="percentage">5.92%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-union">
                            <div class="padd">
                                <div class="icon-name-slogan">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 1024 1024"><path fill="#eee" d="M704 288h131.072a32 32 0 0 1 31.808 28.8L886.4 512h-64.384l-16-160H704v96a32 32 0 1 1-64 0v-96H384v96a32 32 0 0 1-64 0v-96H217.92l-51.2 512H512v64H131.328a32 32 0 0 1-31.808-35.2l57.6-576a32 32 0 0 1 31.808-28.8H320v-22.336C320 154.688 405.504 64 512 64s192 90.688 192 201.664v22.4zm-64 0v-22.336C640 189.248 582.272 128 512 128s-128 61.248-128 137.664v22.4h256zm201.408 476.16a32 32 0 1 1 45.248 45.184l-128 128a32 32 0 0 1-45.248 0l-128-128a32 32 0 1 1 45.248-45.248L704 837.504V608a32 32 0 1 1 64 0v229.504l73.408-73.408z"/></svg>
                                    <div class="name-slogan">
                                        <p class="name-card">Producto más vendido</p>
                                        <p class="slogan-card">El favorito del día</p>
                                    </div>
                                </div>

                                <div class="num-percentage-content">
                                    <div class="product-percentage">
                                        <div class="num-margen">
                                            <p class="product">Colcafé (7 unidades)</p>
                                        </div>

                                        <div class="icon-percentage">
                                            <p class="percentage">4.3% del total de las ventas</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-see">
                                    <a href="#">
                                        <p>Ver top 3 ventas</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 1024 1024"><path fill="#3289d1" d="M768 256H353.6a32 32 0 1 1 0-64H800a32 32 0 0 1 32 32v448a32 32 0 0 1-64 0z"/><path fill="#3289d1" d="M777.344 201.344a32 32 0 0 1 45.312 45.312l-544 544a32 32 0 0 1-45.312-45.312z"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="group-cards">
                        <h3 class="tlt-group">Productos con bajo stock</h3>

                        <div class="card-union">
                            <div class="padd">
                                <div class="icon-name-slogan">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="34.285714285714285" viewBox="0 0 448 512"><path fill="#eee" d="M353.4 32H94.7C42.6 32 0 74.6 0 126.6v258.7C0 437.4 42.6 480 94.7 480h258.7c52.1 0 94.7-42.6 94.7-94.6V126.6c0-52-42.6-94.6-94.7-94.6m-50 316.4c-27.9 48.2-89.9 64.9-138.2 37.2c-22.9 39.8-54.9 8.6-42.3-13.2l15.7-27.2c5.9-10.3 19.2-13.9 29.5-7.9c18.6 10.8-.1-.1 18.5 10.7c27.6 15.9 63.4 6.3 79.4-21.3c15.9-27.6 6.3-63.4-21.3-79.4c-17.8-10.2-.6-.4-18.6-10.6c-24.6-14.2-3.4-51.9 21.6-37.5c18.6 10.8-.1-.1 18.5 10.7c48.4 28 65.1 90.3 37.2 138.5m21.8-208.8c-17 29.5-16.3 28.8-19 31.5c-6.5 6.5-16.3 8.7-26.5 3.6c-18.6-10.8.1.1-18.5-10.7c-27.6-15.9-63.4-6.3-79.4 21.3s-6.3 63.4 21.3 79.4c0 0 18.5 10.6 18.6 10.6c24.6 14.2 3.4 51.9-21.6 37.5c-18.6-10.8.1.1-18.5-10.7c-48.2-27.8-64.9-90.1-37.1-138.4c27.9-48.2 89.9-64.9 138.2-37.2l4.8-8.4c14.3-24.9 52-3.3 37.7 21.5"/></svg>
                                    <div class="name-slogan">
                                        <p class="name-card">Total ventas del día</p>
                                        <p class="slogan-card">Hoy vendimos éxito.</p>
                                    </div>
                                </div>

                                <div class="num-percentage-content">
                                    <div class="num-percentage">
                                        <p class="num">19</p>
                                        <div class="icon-percentage">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48"><path fill="none" stroke="#6bc04e" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M24.008 12.1V36M12 24l12-12l12 12"/></svg>
                                            <p class="percentage">1.76%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-union">
                            <div class="padd">
                                <div class="icon-name-slogan">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#eee" d="M12.005 22.003c-5.523 0-10-4.477-10-10s4.477-10 10-10s10 4.477 10 10s-4.477 10-10 10m-3.5-8v2h2.5v2h2v-2h1a2.5 2.5 0 1 0 0-5h-4a.5.5 0 1 1 0-1h5.5v-2h-2.5v-2h-2v2h-1a2.5 2.5 0 1 0 0 5h4a.5.5 0 0 1 0 1z"/></svg>
                                    <div class="name-slogan">
                                        <p class="name-card">Ganancia total del día</p>
                                        <p class="slogan-card">Tu éxito, en números</p>
                                    </div>
                                </div>

                                <div class="num-percentage-content">
                                    <div class="num-percentage">
                                        <div class="num-margen">
                                            <p class="num">$125,000</p>
                                            <p class="margen">$54,500</p>
                                        </div>

                                        <div class="icon-percentage">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 48 48"><path fill="none" stroke="#6bc04e" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M24.008 12.1V36M12 24l12-12l12 12"/></svg>
                                            <p class="percentage">5.92%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-union">
                            <div class="padd">
                                <div class="icon-name-slogan">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 1024 1024"><path fill="#eee" d="M704 288h131.072a32 32 0 0 1 31.808 28.8L886.4 512h-64.384l-16-160H704v96a32 32 0 1 1-64 0v-96H384v96a32 32 0 0 1-64 0v-96H217.92l-51.2 512H512v64H131.328a32 32 0 0 1-31.808-35.2l57.6-576a32 32 0 0 1 31.808-28.8H320v-22.336C320 154.688 405.504 64 512 64s192 90.688 192 201.664v22.4zm-64 0v-22.336C640 189.248 582.272 128 512 128s-128 61.248-128 137.664v22.4h256zm201.408 476.16a32 32 0 1 1 45.248 45.184l-128 128a32 32 0 0 1-45.248 0l-128-128a32 32 0 1 1 45.248-45.248L704 837.504V608a32 32 0 1 1 64 0v229.504l73.408-73.408z"/></svg>
                                    <div class="name-slogan">
                                        <p class="name-card">Producto más vendido</p>
                                        <p class="slogan-card">El favorito del día</p>
                                    </div>
                                </div>

                                <div class="num-percentage-content">
                                    <div class="product-percentage">
                                        <div class="num-margen">
                                            <p class="product">Colcafé (7 unidades)</p>
                                        </div>

                                        <div class="icon-percentage">
                                            <p class="percentage">4.3% del total de las ventas</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="btn-see">
                                    <a href="#">
                                        <p>Ver top 3 ventas</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 1024 1024"><path fill="#3289d1" d="M768 256H353.6a32 32 0 1 1 0-64H800a32 32 0 0 1 32 32v448a32 32 0 0 1-64 0z"/><path fill="#3289d1" d="M777.344 201.344a32 32 0 0 1 45.312 45.312l-544 544a32 32 0 0 1-45.312-45.312z"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </section>
    </main>

    <script src="../js/dashboard-store.js"></script>
    <script src="../js/graphic.js"></script>
</body>
</html>