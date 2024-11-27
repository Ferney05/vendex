<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de empleados - Vendex</title>
    <link rel="stylesheet" href="../../../css/restaurant/see-employees.css">
    <link rel="stylesheet" href="../../../css/base-autocomplete.css">
    <link rel="shortcut icon" href="../../../svg/icon.png" type="image/x-icon">

    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> -->

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

        <section class="info-table-employee" id="hidden-modal">
            <div class="table-employee">
                <div class="tlt-search-add">
                    <h2 class="tlt-function">Lista de empleados</h2>
                    
                    <div class="search-add">
                        <a href="functions/add-employees.php" class="add bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                            <p>Agregar empleados</p>
                        </a>

                        <a href="horary.php" class="add bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 16 16"><path fill="#eee" d="M4.497 2a2.5 2.5 0 0 0-2.5 2.5v7a2.5 2.5 0 0 0 2.5 2.5h7a2.5 2.5 0 0 0 2.5-2.5v-7a2.5 2.5 0 0 0-2.5-2.5zM7.5 4a.5.5 0 0 1 .5.5V8h2.5a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5v-4a.5.5 0 0 1 .5-.5"/></svg>
                            <p>Horario</p>
                        </a>
                    </div>
                </div>

                <div class="content-table">
                    <table>
                        <tr>
                            <th>Nombre del empleado</th>
                            <th>Correo</th>
                            <th>Télefono</th>
                            <th>Cargo</th>
                            <th>Fecha de ingreso</th>
                            <th>Tipo de contrato</th>
                            <th>Persona de contacto</th>
                            <th>Télefono de emergencia</th>
                            <th>Acciones</th>
                        </tr>

                        <?php
                            $getEmployees = "SELECT * FROM employees";
                            $resultEmployees = mysqli_query($conexion, $getEmployees);
                            
                            if($resultEmployees -> num_rows > 0){
                                while($row = mysqli_fetch_array($resultEmployees)){
                                    $id = $row['id'];
    
                                    echo "<tr>
                                            <td>" . ucfirst($row['name_employee']) . "</td>
                                            <td>" . $row['email'] . "</td>
                                            <td>+57 " . $row['phone'] . "</td>
                                            <td>" . $row['employee_position'] . "</td>
                                            <td>" . $row['entry_date'] . "</td>
                                            <td>" . $row['type_contract'] . "</td>
                                            <td>" . $row['emergency_contact'] . "</td>
                                            <td>+57 " . $row['emergency_phone'] . "</td>
                                            <td>
                                                <a href='functions/delete-employee.php?id=$id'>
                                                    <img src='../../../svg/delete.svg' title='Eliminar' />
                                                </a>
    
                                                <a href='functions/get-data-employee.php?id=$id'>
                                                    <img src='../../../svg/edit.svg' title='Editar' />
                                                </a>
                                            </td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='10'>No hay empleados aún.</td>
                                      </tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <script src="../../../js/base-nav-dash.js"></script>
</body>
</html>