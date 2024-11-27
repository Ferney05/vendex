<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ganancias del día de hoy - Vendex</title>
    <link rel="stylesheet" href="../../../css/restaurant/profitable-dishes.css">
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

        <section class="profitable-dishes" id="hidden-modal">
            <div class="dish-content">
                <div class="tlt-button">
                    <h2 class="tlt-function">Platos más rentables</h2>
                    <div class="date">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M5 22q-.825 0-1.412-.587T3 20V6q0-.825.588-1.412T5 4h1V2h2v2h8V2h2v2h1q.825 0 1.413.588T21 6v14q0 .825-.587 1.413T19 22zm0-2h14V10H5zM5 8h14V6H5zm0 0V6zm7 6q-.425 0-.712-.288T11 13t.288-.712T12 12t.713.288T13 13t-.288.713T12 14m-4 0q-.425 0-.712-.288T7 13t.288-.712T8 12t.713.288T9 13t-.288.713T8 14m8 0q-.425 0-.712-.288T15 13t.288-.712T16 12t.713.288T17 13t-.288.713T16 14m-4 4q-.425 0-.712-.288T11 17t.288-.712T12 16t.713.288T13 17t-.288.713T12 18m-4 0q-.425 0-.712-.288T7 17t.288-.712T8 16t.713.288T9 17t-.288.713T8 18m8 0q-.425 0-.712-.288T15 17t.288-.712T16 16t.713.288T17 17t-.288.713T16 18"/></svg>
                        <?php
                            echo "<p>" . date('Y-m-d') . "</p>";
                        ?>
                    </div>
                </div>

                <div class="content-table">
                    <table>
                        <tr>
                            <th>Plato</th>
                            <th>Unidades vendidas</th>
                            <th>Precio unitario</th>
                            <th>Coste unitario</th>
                            <th>Ingresos totales</th>
                            <th>Costes totales</th>
                            <th>Margen de ganancia</th>
                            <th>Rentabilidad</th>
                        </tr>

                        <?php
                            $getDishes = "SELECT 
                                            r.name_dish,
                                            r.sale_price,
                                            SUM(iod.stock_taken * i.purchase_price) AS unit_cost,
                                            sales.total_quantity as quantity
                                        FROM recipes r
                                        INNER JOIN ingredients_of_dish iod ON r.id = iod.id_dish
                                        INNER JOIN ingredients i ON iod.name_ingredient = i.name_ingredient
                                        INNER JOIN (
                                            SELECT order_name, SUM(quantity) as total_quantity
                                            FROM order_sales_details osd
                                            INNER JOIN order_sales os ON osd.sale_id = os.id
                                            WHERE DATE(os.sale_date) = CURDATE()
                                            GROUP BY order_name
                                        ) sales ON r.name_dish = sales.order_name
                                        GROUP BY r.id, r.name_dish, r.sale_price, sales.total_quantity
                                        HAVING sales.total_quantity >= 5";
                                            
                            $resultDishes = mysqli_query($conexion, $getDishes);

                            if($resultDishes -> num_rows > 0) {
                                while($row = mysqli_fetch_assoc($resultDishes)){
                                    $total_income = $row['sale_price'] * $row['quantity'];
                                    $total_unit_cost = $row['unit_cost'] * $row['quantity'];
                                    $profit_margin = $total_income - $total_unit_cost;
                                    $profitability = ($profit_margin / $total_income) * 100;

                                    echo "<tr>
                                            <td>" . $row['name_dish'] . "</td>
                                            <td>" . $row['quantity'] . "</td>
                                            <td>$" . number_format($row['sale_price'], 0) . "</td>
                                            <td>$" . number_format($row['unit_cost'], 0) . "</td>
                                            <td>$" . number_format($total_income, 0) . "</td>
                                            <td>$" . number_format($total_unit_cost, 0) . "</td>
                                            <td>$" . number_format($profit_margin, 0) . "</td>
                                            <td>" . intval($profitability) . "%</td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='8'>No se ha registrado rentabilidad en el día de hoy.</td>
                                      </tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </section>

        <section class="premium">
            <div class="content">
                <div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#eee" d="M12 13a1.49 1.49 0 0 0-1 2.61V17a1 1 0 0 0 2 0v-1.39A1.49 1.49 0 0 0 12 13m5-4V7A5 5 0 0 0 7 7v2a3 3 0 0 0-3 3v7a3 3 0 0 0 3 3h10a3 3 0 0 0 3-3v-7a3 3 0 0 0-3-3M9 7a3 3 0 0 1 6 0v2H9Zm9 12a1 1 0 0 1-1 1H7a1 1 0 0 1-1-1v-7a1 1 0 0 1 1-1h10a1 1 0 0 1 1 1Z"/></svg>
                    <p>Solo disponible para la versión premium.</p>
                </div>
            </div>
        </section>
    </main>

    <script src="../../../js/base-nav-dash.js"></script>

</body>
</html>