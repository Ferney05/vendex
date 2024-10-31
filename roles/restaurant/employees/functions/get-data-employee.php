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
            header("Location: ../index.php");
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
                    <h2 class="tlt-function">Actualizar recetas</h2>
                    
                    <a href="../admin-inventory.php" class="button-function">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5Zm0 3.9a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0 7.9c2 0 6 1.09 6 3.08a7.2 7.2 0 0 1-12 0c0-1.99 4-3.08 6-3.08"/></svg>
                        <p>Administrar inventario</p>
                    </a>
                </div>

                <div class="content-form">
                    <form action="update-employee.php?id=<?php echo $id_employee ?>" method="POST" class="form">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="name-employee">Nombre completo</label>
                                    <input type="text" name="name-employee" class="input-form" placeholder="Nombre del empleado" value="<?php echo $row['name_employee'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="document-type">Tipo de documento</label>
                                    <select name="document-type" class="select" required>
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
                                    <select name="employee-position" class="select" required>
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
                                    <input type="text" name="emergency-contact" class="input-form" placeholder="Persona de contacto" value="<?php echo $row['emergency_contact'] ?>" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="email">Correo</label>
                                    <input type="email" name="email" class="input-form" placeholder="Correo del empleado" value="<?php echo $row['email'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="document-number">Número de documento</label>
                                    <input type="text" name="document-number" class="input-form" placeholder="Número de documento" maxlength="10" value="<?php echo $row['document_number'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="entry-date">Fecha de ingreso</label>
                                    <input type="date" name="entry-date" class="input-form" placeholder="Fecha de ingreso" value="<?php echo $row['entry_date'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="emergency-phone">Télefono de emergencia</label>
                                    <input type="tel" name="emergency-phone" class="input-form" placeholder="Télefono de emergencia" pattern="[0-9]{10,10}" value="<?php echo $row['emergency_phone'] ?>" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="address">Dirección</label>
                                    <input type="text" name="address" class="input-form" placeholder="Dirreción de residencia" value="<?php echo $row['address'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="phone">Télefono</label>
                                    <input type="tel" name="phone" class="input-form" placeholder="Teléfono del empleado" pattern="[0-9]{10,10}" value="<?php echo $row['phone'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="type-contract">Tipo de contrato</label>
                                    <select name="type-contract" class="select" required>
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
                                    <input type="submit" name="button-update-employee" class="btn-form" value="Agregar">
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