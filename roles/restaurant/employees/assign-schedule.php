<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar insumos al inventario - Vendex</title>
    <link rel="stylesheet" href="../../../css/restaurant/assign-schedule.css">
    <link rel="stylesheet" href="../../../css/restaurant/base-autocomplete.css">
    <link rel="shortcut icon" href="../../../svg/icon-vendex.svg" type="image/x-icon">

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
            <a href="../../dashboard-restaurant.php" class="go-dash">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="m4 10l-.707.707L2.586 10l.707-.707zm17 8a1 1 0 1 1-2 0zM8.293 15.707l-5-5l1.414-1.414l5 5zm-5-6.414l5-5l1.414 1.414l-5 5zM4 9h10v2H4zm17 7v2h-2v-2zm-7-7a7 7 0 0 1 7 7h-2a5 5 0 0 0-5-5z"/></svg>
                <p>Dashboard</p>
            </a>

            <div class="user-modal">
                <div class="username">
                    <img src="../../../svg/people.svg" alt="">
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

        <section class="design-form" id="hidden-modal">
            <div class="content-all-form">
                <div class="tlt-button">
                    <h2 class="tlt-function">Asignar horario a empleados</h2>
                    
                    <div class="create-update">
                        <a href="horary.php" class="button-function bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="#eee" d="M4.497 2a2.5 2.5 0 0 0-2.5 2.5v7a2.5 2.5 0 0 0 2.5 2.5h7a2.5 2.5 0 0 0 2.5-2.5v-7a2.5 2.5 0 0 0-2.5-2.5zM7.5 4a.5.5 0 0 1 .5.5V8h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5"/></svg>
                            <p>Horario</p>
                        </a>
                    </div>
                </div>

                <div class="content-form">
                    <form action="functions/assigning-schedules.php" method="POST" class="form">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="name-employee">Empleado</label>
                                    <input type="text" name="name-employee" id="name-employee" class="input-form b-col-fcs-val" placeholder="Nombre del empleado" required>
                                </div>

                                <script>
                                    $(document).ready(function(){
                                        $('#name-employee').autocomplete({
                                            source: function(request, response) {
                                                $.ajax({
                                                    url: "functions/autocomplete-employee.php",
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

                                <div class="label-input">
                                    <label for="days-week">Días de la semana</label>
                                    <div class="checks">
                                        <label><input type="checkbox" name="days-week[]" value="Lunes"> Lunes</label>
                                        <label><input type="checkbox" name="days-week[]" value="Martes"> Martes</label>
                                        <label><input type="checkbox" name="days-week[]" value="Miércoles"> Miércoles</label>
                                        <label><input type="checkbox" name="days-week[]" value="Jueves"> Jueves</label>
                                        <label><input type="checkbox" name="days-week[]" value="Viernes"> Viernes</label>
                                        <label><input type="checkbox" name="days-week[]" value="Sábado"> Sábado</label>
                                        <label><input type="checkbox" name="days-week[]" value="Domingo"> Domingo</label>
                                    </div>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="entry-time">Hora de entrada</label>
                                    <input type="time" name="entry-time" class="input-form b-col-fcs-val" required>
                                </div>

                                <div class="label-input">
                                    <label for="start-break">Hora de inicio del descanso</label>
                                    <input type="time" name="start-break" class="input-form b-col-fcs-val" required>
                                </div>   
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="departure-time">Hora de salida</label>
                                    <input type="time" name="departure-time" class="input-form b-col-fcs-val" placeholder="" required>
                                </div>  

                                <div class="label-input">
                                    <label for="end-rest">Hora de fin del descanso</label>
                                    <input type="time" name="end-rest" class="input-form b-col-fcs-val" required>
                                </div>
                            </div>
                        </div>

                        <div class="button-submit">
                            <input type="submit" name="button-assign-schedule" class="btn-form bg-btn" value="Asignar">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="../../../js/base-nav-dash.js"></script>

</body>
</html>