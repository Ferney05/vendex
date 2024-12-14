<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganancias del día de hoy - Vendex</title>
    <link rel="stylesheet" href="../../../../css/store/today-earnings.css">
    <link rel="stylesheet" href="../../../../css/base-btn-bd.css">
    <link rel="stylesheet" href="../../../../css/base-premium.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">
    <?php
        include("../../../../conexion.php");

        session_start();

        if (isset($_SESSION['user_id'])) {
            $id_user = $_SESSION['user_id']; 
        } else {
            header("Location: ../../../../index.php");
            exit(); 
        }
    ?>
</head>
<body>

    <main class="main">
        <nav class="nav-dash">
            <a href="../../../dashboard-store.php" class="go-dash">
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

        <section class="earnings-today" id="hidden-modal">
            <div class="earn-content">
                <div class="tlt-button">
                    <h2 class="tlt-function">Ganancias del día | <?php echo $date = $_POST['date-earnings']; ?></h2>

                    <div class="search bg-btn locked-button">
                        <p>Historial de ventas</p>
                        <img src="../../../../svg/search.svg" alt="">
                    </div>
                </div>

                <div class="content-table">
                    <table>
                        <tr>
                            <th>Número de ventas</th>
                            <th>Fecha de venta</th>
                            <th>Total</th>
                            <th>Detalles</th>
                        </tr>

                        <?php
                            if(isset($_POST['button-search-history'])){
                                $date = $_POST['date-earnings'];
                                $getEarnings = "SELECT id, COUNT(*) AS total_sales, SUM(total_amount) AS total_earnings, sale_date
                                            FROM sales 
                                            WHERE sale_date = '$date'
                                            GROUP BY sale_date";
                                            
                                $resultEarnings = mysqli_query($conexion, $getEarnings);

                                if($resultEarnings -> num_rows > 0) {
                                    while($row = mysqli_fetch_assoc($resultEarnings)){
                                        $id_sale_total = $row['id'];
                                        echo "<tr>
                                                <td>" . $row['total_sales'] . "</td>
                                                <td>" . $row['sale_date'] . "</td>
                                                <td>$" . number_format($row['total_earnings'], 0) . "</td>
                                                <td class='view-details'>
                                                    <a href='sales-history-details.php?id=<?= $id_sale_total ?>&date=$date'>Ver</a>
                                                </td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr>
                                            <td colspan='4'>No se han registrado ganancias para el día especificado.</td>
                                        </tr>";
                                }
                            }
                        ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="modal-search">
            <div class="content-search">
                <form action="search-sales-history.php" method="POST" class="is">
                    <input type="date" name="date-earnings" class="input-search b-col-fcs-val" required>
                    <input type="submit" name="button-search-history" class="btn-search bg-btn" value="Consultar">
                </form>
            </div>
        </section>
    </main>

    <script src="../show-search.js"></script>
    <script src="../../../../js/base-nav-dash.js"></script>

</body>
</html>