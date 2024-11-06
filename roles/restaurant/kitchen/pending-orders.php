<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenes pendientes - Vendex</title>
    <link rel="stylesheet" href="../../../css/restaurant/pending-orders.css">
    <link rel="shortcut icon" href="../../../svg/icon-vendex.svg" type="image/x-icon">

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

        <section class="pending-orders" id="hidden-modal">
            <div class="orders-content">
                <div class="tlt-button">
                    <h2 class="tlt-function">Ordenes pendientes</h2>
                    <a href="add-orders.php" class="button-function">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                        <p>Agregar ordenes</p>
                    </a>
                </div>

                <div class="content-table">
                    <table>
                        <tr>
                            <th>Número de orden</th>
                            <th>Cliente</th>
                            <th>Platillo</th>
                            <th>Cantidad</th>
                            <th>Personalización</th>
                            <th>Estado</th>
                            <th>Tipo de servicio</th>
                            <th>Tiempo estimado</th>
                            <th>Acciones</th>
                        </tr>

                        <?php
                            $getOrders = "SELECT * FROM pending_orders";
                            $resultOrders = mysqli_query($conexion, $getOrders);

                            if($resultOrders -> num_rows > 0) {
                                while($row = mysqli_fetch_assoc($resultOrders)){
                                    $id = $row['id'];

                                    echo "<tr>
                                            <td>" . $row['order_number'] . "</td>
                                            <td>" . ucwords($row['customer']) . "</td>
                                            <td>" . $row['saucer'] . "</td>
                                            <td>" . $row['quantity'] . "</td>
                                            <td>" . ucfirst($row['personalization']) . "</td>
                                            <td><span>" . $row['order_status'] . "</span></td>
                                            <td>" . $row['type_service'] . "</td>
                                            <td>" . $row['estimated_time'] . "</td>
                                            <td>
                                                <a href='functions/delete.php?id=$id'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' viewBox='0 0 24 24'><path fill='#911919' d='M4 8h16v13a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1zm2 2v10h12V10zm3 2h2v6H9zm4 0h2v6h-2zM7 5V3a1 1 0 0 1 1-1h8a1 1 0 0 1 1 1v2h5v2H2V5zm2-1v1h6V4z'/></svg>
                                                </a>
    
                                                <a href='functions/get-data.php?id=$id'>
                                                    <svg xmlns='http://www.w3.org/2000/svg' width='25' height='25' viewBox='0 0 24 24'><g fill='none' stroke='#3289d1' stroke-linecap='round' stroke-linejoin='round' stroke-width='2'><path stroke-dasharray='20' stroke-dashoffset='20' d='M3 21h18'><animate fill='freeze' attributeName='stroke-dashoffset' dur='0.2s' values='20;0'/></path><path fill='#3289d1' fill-opacity='0' stroke-dasharray='48' stroke-dashoffset='48' d='M7 17v-4l10 -10l4 4l-10 10h-4'><animate fill='freeze' attributeName='fill-opacity' begin='1.1s' dur='0.15s' values='0;0.3'/><animate fill='freeze' attributeName='stroke-dashoffset' begin='0.2s' dur='0.6s' values='48;0'/></path><path stroke-dasharray='8' stroke-dashoffset='8' d='M14 6l4 4'><animate fill='freeze' attributeName='stroke-dashoffset' begin='0.8s' dur='0.2s' values='8;0'/></path></g></svg>
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