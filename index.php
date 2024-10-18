<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vendex - Gestión de Inventarios Inteligente</title>
    <link rel="shortcut icon" href="SVG/icon-vendex.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/home.css">
</head>
<body>
    
    <main class="main-home">
        <nav class="nav-home">
            <div class="logo-buttons">
                <div class="logo">
                    <img src="svg/icon-vendex.svg" alt="Logo de Vendex">
                    <h1>ENDEX</h1>
                </div>

                <div class="buttons">
                    <a href="#" id="show-login" class="access">Ingresar</a>
                    <a href="#" id="show-register" class="access">Regístrate</a>
                </div>

                <div class="menu">
                    <img src="svg/menu.svg" id="menu-modal" alt="">
                </div>
            </div>
        </nav>

        <!-- MODAL BUTTONS -->

        <section id="modal-buttons">
            <div class="modal-buttons">
                <div class="close">
                    <img src="svg/close-x.svg" id="close-x" alt="">
                </div>

                <a href="#" id="show-login-buttons" class="access-modal">Ingresar</a>
                <a href="#" id="show-register-buttons" class="access-modal">Regístrate</a>
            </div>
        </section>

        <section class="welcome-home">
            <div class="psb">
                <div class="phrase-slogan">
                    <h1 class="phrase">Gestiona tus inventarios con precisión y eficiencia, todo con Vendex.</h1>
                    <p class="slogan">Tu socio estratégico en la gestión de inventarios, donde cada negocio encuentra el control y la eficiencia que necesita para crecer y prosperar.</p>
                </div>

                <button type="button" id="show-welcome-button">Iniciar ahora</button>
            </div>
        </section>

        <!-- MODAL REGISTER -->

        <section id="modal-register">
            <div class="content-logo-form">
                <div class="logo-form">
                    <div class="logo-close">
                        <div class="none-logo">
                            <div class="logo-icon">
                                <img src="svg/icon-vendex.svg" alt="Logo de Vendex">
                                <h1>ENDEX</h1>
                            </div>
                        </div>

                        <div class="close-modals">
                            <svg xmlns="http://www.w3.org/2000/svg" id="close-register" width="30" height="35" viewBox="0 0 304 384"><path fill="#ffffff" d="M299 73L179 192l120 119l-30 30l-120-119L30 341L0 311l119-119L0 73l30-30l119 119L269 43z"/></svg>
                        </div>
                    </div>

                    <form action="" method="POST" class="form">
                        <div class="tlt-text-modal">
                            <h1 class="tlt-form-modal">¡Bienvenido!</h1>
                            <p class="text-form-modal">Completa el formulario para registrarte y comenzar a optimizar la gestión de tus inventarios.</p>
                        </div>

                        <div class="content-form">
                            <div class="content-inputs">
                                <input type="text" name="name" class="input" placeholder="Tu nombre" required>
                                <input type="text" name="lastname" class="input" placeholder="Tu apellido" required>
                            </div>

                            <div class="content-inputs">
                                <input type="email" name="email" class="input" placeholder="Tu email" required>
                            </div>

                            <div class="content-inputs">
                                <input type="password" name="password" class="input" placeholder="Contraseña" required>
                                <select name="rol" id="" class="select" required>
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="">Tienda</option>
                                </select>
                            </div>

                            <div class="content-inputs">
                                <input type="submit" name="button-register" class="button-form" value="Registrarte">
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>

        <!-- MODAL LOGIN -->

        <section id="modal-login">
            <div class="content-logo-form">
                <div class="logo-form">
                    <div class="logo-close">
                        <div class="none-logo">
                            <div class="logo-icon">
                                <img src="svg/icon-vendex.svg" alt="Logo de Vendex">
                                <h1>ENDEX</h1>
                            </div>
                        </div>

                        <div class="close-modals">
                            <svg xmlns="http://www.w3.org/2000/svg" id="close-login" width="30" height="35" viewBox="0 0 304 384"><path fill="#ffffff" d="M299 73L179 192l120 119l-30 30l-120-119L30 341L0 311l119-119L0 73l30-30l119 119L269 43z"/></svg>
                        </div>
                    </div>

                    <form action="" method="POST" class="form">
                        <div class="tlt-text-modal">
                            <h1 class="tlt-form-modal">¡Hola!</h1>
                            <p class="text-form-modal text-login">Bienvenido a Vendex, tu plataforma de gestión inteligente de inventarios.</p>
                        </div>

                        <div class="content-form">
                            <div class="content-inputs">
                                <input type="email" name="email" class="input" placeholder="Tu email" required>
                            </div>

                            <div class="content-inputs">
                                <input type="password" name="password" class="input" placeholder="Contraseña" required>
                                <select name="rol" id="" class="select" required>
                                    <option value="" disabled selected>Seleccione</option>
                                    <option value="">Tienda</option>
                                </select>
                            </div>

                            <div class="content-inputs">
                                <input type="submit" name="button-login" class="button-form" value="Ingresar">
                            </div>

                            <div class="content-a">
                                <a href="#">¿Has olvidado la contraseña?</a>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="js/home.js"></script>
</body>
</html>