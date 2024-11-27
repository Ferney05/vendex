<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar costos del personal - Vendex</title>
    <link rel="stylesheet" href="../../../../css/restaurant/add-personnel-costs.css">
    <link rel="stylesheet" href="../../../../css/restaurant/base-autocomplete.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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
            $id_staff = $_GET['id']; 
        }

        $queryStaff = "SELECT * FROM staff_costs WHERE id = $id_staff";
        $result = mysqli_query($conexion, $queryStaff);
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
                    <img src="../../../../svg/people.svg" alt="">
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

        <section class="add-personnel-form" id="hidden-modal">
            <div class="add-form">
                <div class="tlt-button">
                    <h2 class="tlt-function">Actualizar costos del personal</h2>
                    <a href="../personnel-costs.php" class="button-function bg-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 2048 2048"><path fill="#eee" d="M1024 768q79 0 149 30t122 82t83 123t30 149q0 80-30 149t-82 122t-123 83t-149 30q-80 0-149-30t-122-82t-83-122t-30-150q0-79 30-149t82-122t122-83t150-30m0 640q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20m0-1152q143 0 284 35t266 105t226 170t166 234q40 83 61 171t21 181h-128q0-118-36-221t-99-188t-150-152t-185-113t-209-70t-217-24q-108 0-217 24t-208 70t-186 113t-149 152t-100 188t-36 221H0q0-92 21-180t61-172q64-132 165-233t227-171t266-104t284-36"/></svg>
                        <p>Ver costos del personal</p>
                    </a>
                </div>

                <div class="content-form">
                    <form action="update.php?id=<?php echo $id_staff ?>" method="POST" class="form">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="employee">Empleado</label>
                                    <input type="text" name="employee" class="input-form b-col-fcs-val" id="employee" placeholder="Nombre del empleado" value="<?php echo $row['employee'] ?>" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="hours">Horas</label>
                                    <input type="number" name="hours" class="input-form b-col-fcs-val" placeholder="Horas laboradas" value="<?php echo $row['hours_worked'] ?>" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="employee-position">Cargo</label>
                                    <input type="text" name="employee-position" id="position" class="input-form b-col-fcs-val" placeholder="Cargo del empleado" value="<?php echo $row['employee_position'] ?>" required>
                                </div>

                                <script>
                                    $(document).ready(function(){
                                        $('#employee').autocomplete({
                                            source: function(request, response) {
                                                $.ajax({
                                                    url: "autocomplete.php",
                                                    type: "POST",
                                                    data: { query: request.term },
                                                    success: function(data) {
                                                        response($.parseJSON(data));
                                                    }
                                                });
                                            },
                                            minLength: 3,
                                            select: function(event, ui) {
                                                $('#position').val(ui.item.post);
                                            }
                                        });
                                    });
                                </script> 

                                <div class="label-input">
                                    <label for="hourly-pay">Pago por hora</label>
                                    <input type="number" name="hourly-pay" class="input-form b-col-fcs-val" placeholder="Pago por hora" value="<?php echo $row['hourly_pay'] ?>" required>
                                </div>

                            </div>
                        </div>

                        <div class="button-submit">
                            <input type="submit" name="button-update-costs" class="btn-form bg-btn" value="Actualizar">
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