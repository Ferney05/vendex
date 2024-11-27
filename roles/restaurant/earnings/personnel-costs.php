<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Costos del personal - Vendex</title>
    <link rel="stylesheet" href="../../../css/restaurant/personnel-costs.css">
    <link rel="shortcut icon" href="../../../svg/icon.png" type="image/x-icon">

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

        <section class="personnel-costs" id="hidden-modal">
            <div class="personnel-content">
                <div class="tlt-button">
                    <h2 class="tlt-function">Costos del personal</h2>
                    <a href="add-personnel-costs.php" class="button-function bg-btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                        <p>Agregar costos del personal</p>
                    </a>
                </div>

                <div class="content-table">
                    <table>
                        <tr>
                            <th>Empleado</th>
                            <th>Cargo</th>
                            <th>Horas laboradas</th>
                            <th>Pago por hora</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>

                        <?php
                            $getPersonnel = "SELECT * FROM staff_costs";
                            $resultPersonnel = mysqli_query($conexion, $getPersonnel);

                            if($resultPersonnel -> num_rows > 0) {
                                while($row = mysqli_fetch_assoc($resultPersonnel)){
                                    $id = $row['id'];
                                    $total = $row['hours_worked'] * $row['hourly_pay'];

                                    echo "<tr>
                                            <td>" . $row['employee'] . "</td>
                                            <td>" . $row['employee_position'] . "</td>
                                            <td>" . $row['hours_worked'] . "</td>
                                            <td>$" . number_format($row['hourly_pay'], 0) . "</td>
                                            <td>$" . number_format($total, 0) . "</td>
                                            <td>
                                                <a href='functions/delete.php?id=$id'>
                                                    <img src='../../../svg/delete.svg' title='Eliminar' />
                                                </a>
    
                                                <a href='functions/get-data.php?id=$id'>
                                                    <img src='../../../svg/edit.svg' title='Editar' />
                                                </a>
                                            </td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='6'>No hay datos registrados para el personal.</td>
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