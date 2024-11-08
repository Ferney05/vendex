<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar horarios - Vendex</title>
    <link rel="stylesheet" href="../../../../css/restaurant/assign-schedule.css">
    <link rel="shortcut icon" href="../../../../svg/icon-vendex.svg" type="image/x-icon">

    <?php
        include("../../../../conexion.php");

        session_start();

        if (isset($_SESSION['user_id'])) {
            $id_user = $_SESSION['user_id']; 
        } else {
            header("Location: ../../../../index.php");
            exit(); 
        }

        if (isset($_GET['id'])) {
            $id_schedule = $_GET['id']; 
        }

        $querySchedule = "SELECT * FROM schedule WHERE id = $id_schedule";
        $result = mysqli_query($conexion, $querySchedule);
        $row = mysqli_fetch_array($result);
    ?>
</head>
<body>

    <main class="main">
        <nav class="nav-dash">
            <a href="../../../dashboard-restaurant.php" class="go-dash">
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
                        <img src="../../../../svg/down-arrow.svg" alt="">
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
                                <a href="../../../../app/users/logout.php">
                                    <p>Salir</p>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#eee" d="M16 18H6V8h3v4.77L15.98 6L18 8.03L11.15 15H16z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <section class="update-recipes-form" id="hidden-modal">
            <div class="update-form">
                <div class="tlt-button">
                    <h2 class="tlt-function">Actualizar horarios</h2>
                    
                    <a href="../horary.php" class="button-function">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="#eee" d="M4.497 2a2.5 2.5 0 0 0-2.5 2.5v7a2.5 2.5 0 0 0 2.5 2.5h7a2.5 2.5 0 0 0 2.5-2.5v-7a2.5 2.5 0 0 0-2.5-2.5zM7.5 4a.5.5 0 0 1 .5.5V8h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5"/></svg>
                        <p>Horario</p>
                    </a>
                </div>

                <div class="content-form">
                    <form action="update-schedule.php?id=<?php echo $id_schedule ?>" method="POST" class="form">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="name-employee">Empleado</label>
                                    <input type="text" name="name-employee" class="input-form" placeholder="Nombre del empleado" value="<?php echo $row['name_employee'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="days-week">Días de la semana</label>
                                    <div class="checks">
                                        <?php
                                            // Asumiendo que $row['days_week'] tiene los días como una cadena separada por comas
                                            $selectedDays = explode(', ', $row['days_week']); // Convertir a un array
                                            $daysOfWeek = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];

                                            foreach ($daysOfWeek as $day) {
                                                // Verificar si el día está en el array de días seleccionados
                                                $isChecked = in_array($day, $selectedDays) ? 'checked' : '';
                                                echo "<label><input type='checkbox' name='days-week[]' value='$day' $isChecked> $day</label>";
                                            }
                                        ?>
                                    </div>
                                </div>

                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="entry-time">Hora de entrada</label>
                                    <input type="time" name="entry-time" class="input-form" value="<?php echo $row['entry_time'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="start-break">Hora de inicio del descanso</label>
                                    <input type="time" name="start-break" class="input-form" value="<?php echo $row['start_break'] ?>" required>
                                </div>   
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="departure-time">Hora de salida</label>
                                    <input type="time" name="departure-time" class="input-form" value="<?php echo $row['departure_time'] ?>" required>
                                </div>  

                                <div class="label-input">
                                    <label for="end-rest">Hora de fin del descanso</label>
                                    <input type="time" name="end-rest" class="input-form" value="<?php echo $row['end_break'] ?>" required>
                                </div>
                            </div>
                        </div>

                        <div class="button-submit">
                            <input type="submit" name="button-update-schedule" class="btn-form" value="Actualizar">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="../show-category.js"></script>
    <script src="../../../../js/base-nav-dash.js"></script>

</body>
</html>