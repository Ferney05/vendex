<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordenes pendientes - Vendex</title>
    <link rel="stylesheet" href="../../../css/restaurant/pending-orders.css">
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

        <section class="pending-orders" id="hidden-modal">
            <div class="orders-content">
                <div class="tlt-button">
                    <h2 class="tlt-function">Ordenes pendientes</h2>

                    <div class="content-buttons">
                        <a href="create-orders.php" class="button-function bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                            <p>Crear orden</p>
                        </a>

                        <a href="functions/add-orders-details.php" class="button-function bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                            <p>Agregar platos a la orden</p>
                        </a>
                    </div>
                </div>

                <div class="content-table">
                    <table>
                        <tr>
                            <th>Número de orden</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Estado</th>
                            <th>Tipo de servicio</th>
                            <th>Detalles</th>
                            <th>Acciones</th>
                        </tr>

                        <?php
                            $getOrders = "SELECT * FROM pending_orders ORDER BY order_number DESC";
                            $resultOrders = mysqli_query($conexion, $getOrders);

                            if($resultOrders -> num_rows > 0) {
                                while($row = mysqli_fetch_assoc($resultOrders)){
                                    $order_number = $row['order_number'];
                                    $id = $row['id'];
                                    $order_date = $row['order_date'];
                                    $date = new DateTime($order_date);
                                    $formatted_date = $date->format('Y-m-d \a \l\a\s h:i A');

                                    // Agregar clase para estado
                                    $status_class = '';
                                    switch ($row['order_status']) {
                                        case 'Pendiente':
                                            $status_class = 'pending';
                                            break;
                                        case 'En preparación':
                                            $status_class = 'preparing';
                                            break;
                                        case 'Lista':
                                            $status_class = 'ready';
                                            break;
                                        default:
                                            $status_class = 'default';
                                            break;
                                    }

                                    $class_sale = '';
                                    $class_cart = '';

                                    switch ($row['transaction']) {
                                        case '0':
                                            $class_cart = 'yes-sent';
                                            $class_sale = 'not-sent';
                                            break;
                                        case '1':
                                            $class_cart = 'not-sent';
                                            $class_sale = 'yes-sent';
                                            break;
                                        default:
                                            $class_sale = 'default';
                                            break;
                                    }

                                    echo "<tr>
                                            <td>#ORD-" . $row['order_number'] . "</td>
                                            <td>" . ucwords($row['customer']) . "</td>
                                            <td>" . $formatted_date . "</td>
                                            <td><span class='" . $status_class . "'>" . $row['order_status'] . "</span></td>
                                            <td>" . $row['type_service'] . "</td>
                                            
                                            <td class='view-details'>
                                                <a href='details.php?order_number=$order_number'>Ver</a>
                                            </td>
                                            <td>
                                                <a href='functions/delete.php?id=$id'>
                                                    <img src='../../../svg/delete.svg' title='Eliminar' />
                                                </a>
    
                                                <a href='functions/get-data.php?id=$id'>
                                                    <img src='../../../svg/edit.svg' title='Editar' />
                                                </a>

                                                <a href='functions/send-order-sale.php?order_number=$order_number' class='" . $class_cart . "'>
                                                    <img  src='../../../svg/cart.svg' title='Enviar a ventas' />
                                                </a>

                                                <span class='" . $class_sale . "'>
                                                    <img src='../../../svg/success.svg' title='Enviado a ventas' />
                                                </span>
                                            </td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='7'>No hay ordenes pendientes.</td>
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