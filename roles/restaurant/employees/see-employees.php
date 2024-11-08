<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de empleados - Vendex</title>
    <link rel="stylesheet" href="../../../css/restaurant/see-employees.css">
    <link rel="stylesheet" href="../../../css/base-autocomplete.css">
    <link rel="shortcut icon" href="../../../svg/icon-vendex.svg" type="image/x-icon">

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
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#6bc04e" d="M12 2c5.52 0 10 4.48 10 10s-4.48 10-10 10S2 17.52 2 12S6.48 2 12 2M6.023 15.416C7.491 17.606 9.695 19 12.16 19s4.669-1.393 6.136-3.584A8.97 8.97 0 0 0 12.16 13a8.97 8.97 0 0 0-6.137 2.416M12 11a3 3 0 1 0 0-6a3 3 0 0 0 0 6"/></svg>
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
                        <!-- <form action="functions/search-dish.php" method="POST" class="form-search">
                            <input type="text" name="search" class="input-search" id="search-recipe" placeholder="Buscar por empleado..." required>
                            <input type="submit" name="button-search" class="btn-search" value="Buscar">
                        </form>

                        <script>
                            $(document).ready(function(){
                                // Inicia el autocompletado usando jQuery UI
                                $('#search-recipe').autocomplete({
                                    source: function(request, response) {
                                        $.ajax({
                                            url: "functions/autocomplete-employee.php", // Archivo PHP que consulta los productos
                                            type: "POST",
                                            data: { query: request.term }, // Envía lo que el usuario escribe
                                            success: function(data) {
                                                response($.parseJSON(data)); // Convierte los datos en formato JSON
                                            }
                                        });
                                    },
                                    minLength: 3 // Comienza a buscar desde el segundo carácter
                                });
                            });
                        </script> -->
                        
                        <a href="add-employees.php" class="add">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                            <p>Agregar empleados</p>
                        </a>

                        <a href="horary.php" class="add">
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
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' viewBox='0 0 24 24'><path fill='#911919' d='M4 8h16v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1zm2 2v10h12V10zm3 2h2v6H9zm4 0h2v6h-2zM7 5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v2h5v2H2V5zm2-1v1h6V4z'/></svg>
                                                </a>
    
                                                <a href='functions/get-data-employee.php?id=$id'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' viewBox='0 0 24 24'><g fill='none' stroke='#3289d1' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'><path stroke-dasharray='20' stroke-dashoffset='20' d='M3 21h18'><animate fill='freeze' attributeName='stroke-dashoffset' dur='0.2s' values='20;0'/></path><path fill='#3289d1' fill-opacity='0' stroke-dasharray='48' stroke-dashoffset='48' d='M7 17v-4l10 -10l4 4l-10 10h-4'><animate fill='freeze' attributeName='fill-opacity' begin='1.1s' dur='0.15s' values='0;0.3'/><animate fill='freeze' attributeName='stroke-dashoffset' begin='0.2s' dur='0.6s' values='48;0'/></path><path stroke-dasharray='8' stroke-dashoffset='8' d='M14 6l4 4'><animate fill='freeze' attributeName='stroke-dashoffset' begin='0.8s' dur='0.2s' values='8;0'/></path></g></svg>
                                                </a>
                                            </td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='10'>No hay productos</td>
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