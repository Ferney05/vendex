<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar empleados - Vendex</title>
    <link rel="stylesheet" href="../../../../css/restaurant/add-employees.css">
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
            $id_employee = $_GET['id']; 
        }

        $queryEmployee = "SELECT * FROM employees WHERE id = $id_employee";
        $result = mysqli_query($conexion, $queryEmployee);
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

        <section class="add-employee-form" id="hidden-modal">
            <div class="add-form">
                <div class="tlt-button">
                    <h2 class="tlt-function">Actualizar empleados</h2>
                    
                    <a href="../see-employees.php" class="button-function bg-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 2048 2048"><path fill="#eee" d="M1024 768q79 0 149 30t122 82t83 123t30 149q0 80-30 149t-82 122t-123 83t-149 30q-80 0-149-30t-122-82t-83-122t-30-150q0-79 30-149t82-122t122-83t150-30m0 640q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20m0-1152q143 0 284 35t266 105t226 170t166 234q40 83 61 171t21 181h-128q0-118-36-221t-99-188t-150-152t-185-113t-209-70t-217-24q-108 0-217 24t-208 70t-186 113t-149 152t-100 188t-36 221H0q0-92 21-180t61-172q64-132 165-233t227-171t266-104t284-36"/></svg>
                        <p>Ver lista de empleados</p>
                    </a>
                </div>

                <div class="content-form">
                    <form action="update-employee.php?id=<?php echo $id_employee ?>" method="POST" class="form">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="name-employee">Nombre completo</label>
                                    <input type="text" name="name-employee" class="input-form b-col-fcs-val" placeholder="Nombre del empleado" value="<?php echo $row['name_employee'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="document-type">Tipo de documento</label>
                                    <select name="document-type" class="select b-col-fcs-val" required>
                                        <option value="" disabled>Seleccione</option>
                                        <?php
                                            if ($row['document_type'] == "CC") {
                                                echo '<option value="CC" selected>CC</option>';
                                                echo '<option value="TI">TI</option>';
                                            } else if ($row['document_type'] == "TI") {
                                                echo '<option value="TI" selected>TI</option>';
                                                echo '<option value="CC">CC</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="label-input">
                                    <label for="employee-position">Cargo</label>
                                    <select name="employee-position" class="select b-col-fcs-val" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <?php
                                            if ($row['employee_position'] == "Administrador") {
                                                echo '<option value="Administrador" selected>Administrador</option>';
                                                echo '<option value="Cocinero">Cocinero</option>';
                                                echo '<option value="Mesero/a">Mesero/a</option>';
                                                echo '<option value="Ayudante de cocina">Ayudante de cocina</option>';
                                            } else if ($row['employee_position'] == "Cocinero") {
                                                echo '<option value="Administrador">Administrador</option>';
                                                echo '<option value="Cocinero" selected>Cocinero</option>';
                                                echo '<option value="Mesero/a">Mesero/a</option>';
                                                echo '<option value="Ayudante de cocina">Ayudante de cocina</option>';
                                            } else if ($row['employee_position'] == "Mesero/a") {
                                                echo '<option value="Administrador">Administrador</option>';
                                                echo '<option value="Cocinero">Cocinero</option>';
                                                echo '<option value="Mesero/a" selected>Mesero/a</option>';
                                                echo '<option value="Ayudante de cocina">Ayudante de cocina</option>';
                                            } else if ($row['employee_position'] == "Ayudante de cocina") {
                                                echo '<option value="Administrador">Administrador</option>';
                                                echo '<option value="Cocinero">Cocinero</option>';
                                                echo '<option value="Mesero/a">Mesero/a</option>';
                                                echo '<option value="Ayudante de cocina" selected>Ayudante de cocina</option>';
                                            }
                                        ?>
                                    </select>
                                </div>

                                <div class="label-input">
                                    <label for="emergency-contact">Contacto de emergencia</label>
                                    <input type="text" name="emergency-contact" class="input-form b-col-fcs-val" placeholder="Persona de contacto" value="<?php echo $row['emergency_contact'] ?>" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="email">Correo</label>
                                    <input type="email" name="email" class="input-form b-col-fcs-val" placeholder="Correo del empleado" value="<?php echo $row['email'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="document-number">Número de documento</label>
                                    <input type="text" name="document-number" class="input-form b-col-fcs-val" placeholder="Número de documento" maxlength="10" value="<?php echo $row['document_number'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="entry-date">Fecha de ingreso</label>
                                    <input type="date" name="entry-date" class="input-form b-col-fcs-val" placeholder="Fecha de ingreso" value="<?php echo $row['entry_date'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="emergency-phone">Télefono de emergencia</label>
                                    <input type="tel" name="emergency-phone" class="input-form b-col-fcs-val" placeholder="Télefono de emergencia" pattern="[0-9]{10,10}" value="<?php echo $row['emergency_phone'] ?>" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="address">Dirección</label>
                                    <input type="text" name="address" class="input-form b-col-fcs-val" placeholder="Dirreción de residencia" value="<?php echo $row['address'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="phone">Télefono</label>
                                    <input type="tel" name="phone" class="input-form b-col-fcs-val" placeholder="Teléfono del empleado" pattern="[0-9]{10,10}" value="<?php echo $row['phone'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="type-contract">Tipo de contrato</label>
                                    <select name="type-contract" class="select b-col-fcs-val" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <?php
                                            if ($row['type_contract'] == "Tiempo completo") {
                                                echo '<option value="Tiempo completo" selected>Tiempo completo</option>';
                                                echo '<option value="Medio tiempo">Medio tiempo</option>';
                                                echo '<option value="Por horas">Por horas</option>';
                                            } else if ($row['type_contract'] == "Medio tiempo") {
                                                echo '<option value="Tiempo completo">Tiempo completo</option>';
                                                echo '<option value="Medio tiempo"  selected>Medio tiempo</option>';
                                                echo '<option value="Por horas">Por horas</option>';
                                            } else if ($row['type_contract'] == "Por horas") {
                                                echo '<option value="Tiempo completo">Tiempo completo</option>';
                                                echo '<option value="Medio tiempo">Medio tiempo</option>';
                                                echo '<option value="Por horas" selected>Por horas</option>';
                                            } 
                                        ?>
                                    </select>
                                </div>

                                <div class="button-submit">
                                    <input type="submit" name="button-update-employee" class="btn-form bg-btn" value="Agregar">
                                </div>
                            </div>
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