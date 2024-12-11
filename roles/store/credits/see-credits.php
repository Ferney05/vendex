<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Control de créditos - Vendex</title>
    <link rel="stylesheet" href="../../../css/store/credits.css">
    <link rel="stylesheet" href="../../../css/base-premium.css">
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
            <a href="../../dashboard-store.php" class="go-dash">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="m4 10l-.707.707L2.586 10l.707-.707zm17 8a1 1 0 1 1-2 0zM8.293 15.707l-5-5l1.414-1.414l5 5zm-5-6.414l5-5l1.414 1.414l-5 5zM4 9h10v2H4zm17 7v2h-2v-2zm-7-7a7 7 0 0 1 7 7h-2a5 5 0 0 0-5-5z"/></svg>
                <p>Dashboard</p>
            </a>

            <div class="user-modal">
                <div class="username">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 512 512"><path fill="#04BEFA" d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208s208-93.31 208-208S370.69 48 256 48m2 96a72 72 0 1 1-72 72a72 72 0 0 1 72-72m-2 288a175.55 175.55 0 0 1-129.18-56.6C135.66 329.62 215.06 320 256 320s120.34 9.62 129.18 55.39A175.52 175.52 0 0 1 256 432"/></svg>
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

        <section class="sect-credits" id="hidden-modal">
            <div class="credits">
                <div class="tlt-button">
                    <h2 class="tlt-function">Control de créditos</h2>
                    
                    <div class="content-buttons">
                        <a href="fertilizers.php" class="btn-new-sale bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12.005 22.003c-5.523 0-10-4.477-10-10s4.477-10 10-10s10 4.477 10 10s-4.477 10-10 10m-3.5-8v2h2.5v2h2v-2h1a2.5 2.5 0 1 0 0-5h-4a.5.5 0 1 1 0-1h5.5v-2h-2.5v-2h-2v2h-1a2.5 2.5 0 1 0 0 5h4a.5.5 0 0 1 0 1z"/></svg>
                            <p>Abonar</p>
                        </a>
                    </div>
                </div>

                <div class="content-table">
                    <table>
                        <tr>
                            <th>Cliente</th>
                            <th>Fecha de creación</th>
                            <th>Saldo total</th>
                            <th>Abonos realizados</th>
                            <th>Saldo actual</th>
                            <th>Estado</th>
                            <th>Acciones</th>
                        </tr>

                        <?php
                            $queryCredits = "SELECT *, SUM(amount_borrowed) AS current_balance FROM credits GROUP BY customer;";
                            $resultCredits = mysqli_query($conexion, $queryCredits);

                            if($resultCredits -> num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($resultCredits)){
                                    $id = $row['id'];
                                    $current_balance = $row['current_balance'] - $row['fertilizers'];

                                    $status_class = '';
                                    switch ($row['credit_status']) {
                                        case 'Pendiente':
                                            $status_class = 'pending';
                                            break;
                                        case 'Pagado':
                                            $status_class = 'paid';
                                            break;
                                        case 'Vencido':
                                            $status_class = 'defeated';
                                            break;
                                        default:
                                            $status_class = 'default';
                                            break;
                                    }

                                    echo "<tr>
                                            <td>" . $row['customer'] . "</td>
                                            <td>" . $row['creation_date'] . "</td>
                                            <td>$" . number_format($row['current_balance'], 0) . "</td>
                                            <td>$" . number_format($row['fertilizers'], 0) . "</td>
                                            <td>$" . number_format($current_balance, 0) . "</td>
                                            <td><span class='" . $status_class . "'>" . $row['credit_status'] . "</span></td>
                                            <td>
                                                <a href='functions/delete.php?id=$id'>
                                                    <img src='../../../svg/delete.svg' />
                                                </a>
    
                                                <a href='functions/get-data.php?id=$id'>
                                                    <img src='../../../svg/edit.svg' />
                                                </a>
                                            </td>
                                        </tr>";
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='8'>No hay créditos creados aún.</td>
                                      </tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </section>

        <!-- <section class="premium">
            <div class="content">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#eee" d="M12 13a1.49 1.49 0 0 0-1 2.61V17a1 1 0 0 0 2 0v-1.39A1.49 1.49 0 0 0 12 13m5-4V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3M9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z"/></svg>
                    <p>Solo disponible para la versión premium.</p>
                </div>
            </div>
        </section> -->
    </main>

    <script src="show-modal-add.js"></script>
    <script src="../../../js/base-nav-dash.js"></script>

</body>
</html>