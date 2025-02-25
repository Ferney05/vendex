<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abonar - Vendex</title>
    <link rel="stylesheet" href="../../../css/base-form.css">
    <link rel="stylesheet" href="../../../css/store/base-autocomplete.css">
    <link rel="shortcut icon" href="../../../svg/icon.png" type="image/x-icon">

    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
                    <h2 class="tlt-function">Realizar abono al crédito</h2>
                    
                    <div class="create-update">
                        <a href="see-credits.php" class="button-function bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                            <p>Ver créditos</p>
                        </a>
                    </div>
                </div>

                <div class="content-form">
                    <form action="functions/pay.php" method="POST" id="pay-form" class="form-flex">
                        <div class="alls-t">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="customer">Cliente</label>
                                    <input type="text" name="customer" class="input-form b-col-fcs-val" id="customer" placeholder="Cliente" required>
                                </div>

                                <script>
                                    $(document).ready(function(){
                                        $('#customer').autocomplete({
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
                                            minLength: 3
                                        });
                                    });
                                </script> 
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="pay">Cantidad a abonar</label>
                                    <input type="number" name="pay" class="input-form b-col-fcs-val" placeholder="Cantidad a abonar" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="button-submit">
                                    <input type="button" name="button-pay-credit" id="submit-pay" class="btn-form bg-btn" value="Abonar">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="../../../js/base-nav-dash.js"></script>


    <script>
        document.getElementById('submit-pay').addEventListener('click', function () {
            const customer = document.querySelector('input[name="customer"]').value;
            const pay = document.querySelector('input[name="pay"]').value;

            if (!customer || !pay || pay <= 0) {
                Toastify({
                    text: "Por favor, complete todos los campos con valores válidos.",
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: 'center',
                    backgroundColor: "linear-gradient(to right, #FF5F6D, #FFC371)",
                }).showToast();
                return;
            }

            // Enviar datos al servidor usando AJAX
            fetch('functions/pay.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: new URLSearchParams({
                    'customer': customer,
                    'pay': pay,
                    'button-pay-credit': true
                })
            })
            .then(response => response.text())
            .then(data => {
                // Mostrar mensaje basado en la respuesta del servidor
                if (data.includes('correctamente')) {
                    localStorage.setItem('toastMessage', 'Se abonó correctamente.');
                    localStorage.setItem('toastType', 'success');
                } else if (data.includes('no válido') || data.includes('Error')) {
                    localStorage.setItem('toastMessage', 'El crédito ya está pagado. No se puede abonar');
                    localStorage.setItem('toastType', 'error');
                } else {
                    localStorage.setItem('toastMessage', 'El monto a abonar no puede ser mayor al monto total prestado');
                    localStorage.setItem('toastType', 'error');
                }
                // Recargar la página
                location.reload();
            })
            .catch(error => {
                console.error('Error:', error);
                localStorage.setItem('toastMessage', 'Ocurrió un error al procesar el abono.');
                localStorage.setItem('toastType', 'error');
                location.reload();
            });
        });

        // Mostrar mensaje de Toastify al cargar la página
        window.onload = function () {
            const message = localStorage.getItem('toastMessage');
            const type = localStorage.getItem('toastType');
            if (message) {
                Toastify({
                    text: message,
                    duration: 3000,
                    close: true,
                    gravity: "top",
                    position: 'center',
                    backgroundColor: type === 'success' ? "#4caf50" : "#911919",
                }).showToast();
                // Limpiar el mensaje después de mostrarlo
                localStorage.removeItem('toastMessage');
                localStorage.removeItem('toastType');
            }
        };
    </script>

</body>
</html>