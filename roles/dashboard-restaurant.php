<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Restaurant - Vendex</title>
    <link rel="stylesheet" href="../css/restaurant/dashboard.css">
    <link rel="shortcut icon" href="../svg/icon-vendex.svg" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <?php
        include("../conexion.php");

        session_start();

        if (isset($_SESSION['user_id'])) {
            $id_user = $_SESSION['user_id']; 
        } else {
            header("Location: ../index.php");
            exit(); 
        }
    ?>
</head>
<body>

    <main class="main-store">
        <section class="sidebar">
            <div class="logo">
                <img src="../svg/icon-vendex.svg" alt="Logo de Vendex">
                <h1>ENDEX</h1>
            </div>

            <div class="functions-dash">
                <div class="accordion">
                    <div class="accordion-btn">
                        <span>Inventario</span>
                        <img src="../svg/down-arrow.svg" class="down-arrow" alt="">
                        <img src="../svg/up-arrow.svg" class="up-arrow" alt="">
                    </div>

                    <div class="accordion-content">
                        <div>
                            <a href="restaurant/inventory/add-ingredients.php">
                                <img src="../svg/add.svg" alt="">
                                <p>Agregar insumos</p>
                            </a>

                            <a href="restaurant/inventory/add-recipes.php">
                                <img src="../svg/add.svg" alt="">
                                <p>Agregar recetas</p>
                            </a>

                            <a href="restaurant/inventory/admin-inventory.php">
                                <img src="../svg/admin.svg" alt="">
                                <p>Inventario de recetas</p>
                            </a>

                            <a href="restaurant/inventory/inventory-ingredients.php">
                                <img src="../svg/admin.svg" alt="">
                                <p>Inventario de ingredientes</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="accordion">
                    <div class="accordion-btn">
                        <span>Empleados</span>
                        <img src="../svg/down-arrow.svg" class="down-arrow" alt="">
                        <img src="../svg/up-arrow.svg" class="up-arrow" alt="">
                    </div>

                    <div class="accordion-content">
                        <div>
                            <a href="restaurant/employees/add-employees.php">
                                <img src="../svg/add.svg" alt="">
                                <p>Agregar empleado</p>
                            </a>

                            <a href="restaurant/employees/see-employees.php">
                                <img src="../svg/eyes.svg" alt="">
                                <p>Lista de empleados</p>
                            </a>

                            <a href="restaurant/employees/horary.php">
                                <img src="../svg/horary.svg" alt="">
                                <p>Horarios</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="accordion">
                    <div class="accordion-btn">
                        <span>Ventas</span>
                        <img src="../svg/down-arrow.svg" class="down-arrow" alt="">
                        <img src="../svg/up-arrow.svg" class="up-arrow" alt="">
                    </div>

                    <div class="accordion-content">
                        <div>
                            <a href="restaurant/sales/new-sales.php">
                                <img src="../svg/add.svg" alt="">
                                <p>Nueva venta</p>
                            </a>

                            <a href="restaurant/sales/sales-made.php">
                                <img src="../svg/eyes.svg" alt="">
                                <p>Ver ventas realizadas</p>
                            </a>

                            <a href="restaurant/sales/sales-employee.php">
                                <img src="../svg/employee.svg" alt="">
                                <p>Ventas por empleado</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="accordion">
                    <div class="accordion-btn">
                        <span>Ganancias</span>
                        <img src="../svg/down-arrow.svg" class="down-arrow" alt="">
                        <img src="../svg/up-arrow.svg" class="up-arrow" alt="">
                    </div>

                    <div class="accordion-content">
                        <div>
                            <a href="restaurant/earnings/today-earnings.php">
                                <img src="../svg/eyes.svg" alt="">
                                <p>Ver ganancias de ventas</p>
                            </a>

                            <a href="restaurant/earnings/profitable-dishes.php">
                                <img src="../svg/dish.svg" alt="">
                                <p>Platos más rentables</p>
                            </a>

                            <a href="restaurant/earnings/personnel-costs.php">
                                <img src="../svg/staff.svg" alt="">
                                <p>Costos del personal</p>
                            </a>
                        </div>
                    </div>
                </div>

                <div class="accordion">
                    <div class="accordion-btn">
                        <span>Control de cocina</span>
                        <img src="../svg/down-arrow.svg" class="down-arrow" alt="">
                        <img src="../svg/up-arrow.svg" class="up-arrow" alt="">
                    </div>

                    <div class="accordion-content">
                        <div>
                            <a href="restaurant/kitchen/pending-orders.php">
                                <img src="../svg/orders.svg" alt="">
                                <p>Órdenes pendientes</p>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- <div class="accordion">
                    <div class="accordion-btn">
                        <span>Reportes generados</span>
                        <img src="../svg/down-arrow.svg" class="down-arrow" alt="">
                        <img src="../svg/up-arrow.svg" class="up-arrow" alt="">
                    </div>

                    <div class="accordion-content">
                        <div>
                            <a href="restaurant/earnings/today-earnings.php">
                                <img src="../svg/eyes.svg" alt="">
                                <p>Ver ganancias de ventas</p>
                            </a>

                            <a href="#" class="premium">
                                <img src="../svg/secure.svg" alt="">
                                <p>Versión premium</p>
                            </a>
                        </div>
                    </div>
                </div> -->
            </div>
        </section>

        <section class="dashboard">
            <nav class="nav-dash">
                <h2 class="tlt-dash">Dashboard</h2>
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
                            <img src="../svg/down-arrow.svg" alt="">
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
                                    <a href="../app/users/logout.php">
                                        <p>Salir</p>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24"><path fill="#eee" d="M16 18H6V8h3v4.77L15.98 6L18 8.03L11.15 15H16z"/></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>

            <section class="scroll-dash">
                <section class="control-dash" id="hidden-modal">
                    <div class="grid-one">
                        <div class="group-cards">
                            <h3 class="tlt-group">Órdenes actuales</h3>

                            <div class="cards">
                                <div class="card-union">
                                    <div class="padd">
                                        <div class="icon-name-slogan">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#eee" d="M12 22q-.825 0-1.412-.587T10 20h4q0 .825-.587 1.413T12 22m-8-3v-2h2v-7q0-2.075 1.25-3.687T10.5 4.2v-.7q0-.625.438-1.062T12 2t1.063.438T13.5 3.5v.325q-.25.5-.375 1.05T13 6q0 2.075 1.463 3.538T18 11v6h2v2zM18 9q-1.25 0-2.125-.875T15 6t.875-2.125T18 3t2.125.875T21 6t-.875 2.125T18 9"/></svg>
                                            <div class="name-slogan">
                                                <p class="name-card">Órdenes pendientes</p>
                                                <p class="slogan-card">Cada orden, un paso hacia el éxito.</p>
                                            </div>
                                        </div>

                                        <div class="num-percentage-content">
                                            <div class="content-orders">
                                                <div class="order">
                                                    <?php
                                                        //? CÁLCULO DE INGRESOS Y MARGEN DEL DÍA
                                                        $getOrders = "SELECT 
                                                                        po.id,
                                                                        po.order_date,
                                                                        po.order_number, 
                                                                        po.order_status, 
                                                                        po.customer, 
                                                                        pod.quantity,
                                                                        GROUP_CONCAT(CONCAT(pod.saucer, ' (', pod.personalization, ') - ', pod.quantity) SEPARATOR '\n') AS saucers
                                                                    FROM 
                                                                        pending_orders AS po
                                                                    INNER JOIN 
                                                                        pending_order_details AS pod ON po.order_number = pod.order_id 
                                                                    WHERE 
                                                                        po.order_status = 'En espera'
                                                                    GROUP BY 
                                                                        po.order_number, po.order_status, po.customer
                                                                    LIMIT 6";

                                                        $resultOrders = mysqli_query($conexion, $getOrders);

                                                        if($resultOrders -> num_rows > 0) {
                                                            echo "<div class='flex-order'>";
                                                                while ($rowOrders = mysqli_fetch_assoc($resultOrders)) {
                                                                    $id = $rowOrders['id'];
                                                                    $order_date = $rowOrders['order_date'];
                                                                    $timezone = new DateTimeZone('America/Bogota');
                                                                    $orderDateTime = new DateTime($order_date, $timezone);
                                                                    $currentDateTime = new DateTime('now', $timezone);
                                                                    $interval = $currentDateTime->diff($orderDateTime);
                                                                    $total_hours = ($interval->days * 24) + $interval->h;
                                                                    $total_minutes = ($total_hours * 60) + $interval->i;

                                                                    echo "<div class='c-order'>
                                                                            <div class='one'>
                                                                                <div class='info'>
                                                                                    <p>#ORD " . $rowOrders['order_number'] . "</p>
                                                                                    <p>" . $total_hours . ' hrs ' . $interval->i . ' min' . "</p>
                                                                                </div>

                                                                                <p>Cliente: " . $rowOrders['customer'] . "</p>
                                                                            </div>

                                                                            <div>
                                                                                <p>" . nl2br($rowOrders['saucers']) . "</p>
                                                                            </div>

                                                                            <div>
                                                                                <p>Estado: <span class='pending'>" . $rowOrders['order_status'] . "</span></p>
                                                                            </div>

                                                                            <div>
                                                                                <form action='restaurant/kitchen/functions/preparing.php?id=$id' method='POST'>
                                                                                    <input type='submit' name='preparation' value='En prepación' class='btn-preparation'>
                                                                                </form>
                                                                            </div>
                                                                        </div>";
                                                                }  
                                                            echo "</div>";
                                                        } else {
                                                            echo "<div class='not-status'>
                                                                    <p>No hay órdenes pendientes.</p>
                                                                </div>";
                                                        }
                                                    ?>
                                                        
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card-union">
                                    <div class="padd">
                                        <div class="icon-name-slogan">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><circle cx="12" cy="2" r="0" fill="#eee"><animate attributeName="r" begin="0" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="#eee" transform="rotate(45 12 12)"><animate attributeName="r" begin="0.125s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="#eee" transform="rotate(90 12 12)"><animate attributeName="r" begin="0.25s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="#eee" transform="rotate(135 12 12)"><animate attributeName="r" begin="0.375s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="#eee" transform="rotate(180 12 12)"><animate attributeName="r" begin="0.5s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="#eee" transform="rotate(225 12 12)"><animate attributeName="r" begin="0.625s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="#eee" transform="rotate(270 12 12)"><animate attributeName="r" begin="0.75s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle><circle cx="12" cy="2" r="0" fill="#eee" transform="rotate(315 12 12)"><animate attributeName="r" begin="0.875s" calcMode="spline" dur="1s" keySplines="0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8;0.2 0.2 0.4 0.8" repeatCount="indefinite" values="0;2;0;0"/></circle></svg>
                                            <div class="name-slogan">
                                                <p class="name-card">Órdenes en preparación</p>
                                                <p class="slogan-card">Tu orden, en camino a la perfección.</p>
                                            </div>
                                        </div>

                                        <div class="num-percentage-content">
                                            <div class="content-orders">
                                                <div class="order">
                                                    <?php
                                                        //? CÁLCULO DE INGRESOS Y MARGEN DEL DÍA
                                                        $getOrders = "SELECT 
                                                                        po.id,
                                                                        po.order_date,
                                                                        po.order_number, 
                                                                        po.order_status, 
                                                                        po.customer, 
                                                                        pod.quantity,
                                                                        GROUP_CONCAT(CONCAT(pod.saucer, ' (', pod.personalization, ') - ', pod.quantity) SEPARATOR '\n') AS saucers
                                                                    FROM 
                                                                        pending_orders AS po
                                                                    INNER JOIN 
                                                                        pending_order_details AS pod ON po.order_number = pod.order_id 
                                                                    WHERE 
                                                                        po.order_status = 'En preparación'
                                                                    GROUP BY 
                                                                        po.order_number, po.order_status, po.customer
                                                                    LIMIT 6";

                                                        $resultOrders = mysqli_query($conexion, $getOrders);

                                                        if($resultOrders -> num_rows > 0) {
                                                            echo "<div class='flex-order'>";
                                                                while ($rowOrders = mysqli_fetch_assoc($resultOrders)) {
                                                                    $id = $rowOrders['id'];
                                                                    $order_date = $rowOrders['order_date'];
                                                                    $timezone = new DateTimeZone('America/Bogota');
                                                                    $orderDateTime = new DateTime($order_date, $timezone);
                                                                    $currentDateTime = new DateTime('now', $timezone);
                                                                    $interval = $currentDateTime->diff($orderDateTime);
                                                                    $total_hours = ($interval->days * 24) + $interval->h;
                                                                    $total_minutes = ($total_hours * 60) + $interval->i;

                                                                    echo "<div class='c-order'>
                                                                            <div class='one'>
                                                                                <div class='info'>
                                                                                    <p>#ORD-" . $rowOrders['order_number'] . "</p>
                                                                                    <p>" . $total_hours . ' hrs ' . $interval->i . ' min' . "</p>
                                                                                </div>

                                                                                <p>Cliente: " . $rowOrders['customer'] . "</p>
                                                                            </div>

                                                                            <div>
                                                                                <p>" . nl2br($rowOrders['saucers']) . "</p>
                                                                            </div>

                                                                            <div>
                                                                                <p>Estado: <span class='preparing'>" . $rowOrders['order_status'] . "</span></p>
                                                                            </div>

                                                                            <div>
                                                                                <form action='restaurant/kitchen/functions/ready.php?id=$id' method='POST'>
                                                                                    <input type='submit' name='ready' value='Lista' class='btn-ready'>
                                                                                </form>
                                                                            </div>
                                                                        </div>";
                                                                }  
                                                            echo "</div>";
                                                        } else {
                                                            echo "<div class='not-status'>
                                                                    <p>No hay órdenes en preparación.</p>
                                                                </div>";
                                                        }
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="content-two-three">
                        <div class="grid-two">
                            <div class="group-cards">
                                <h3 class="tlt-group">Resumen de ventas del día</h3>

                                <div class="cards">
                                    <div class="card-union">
                                        <div class="padd">
                                            <div class="icon-name-slogan">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="34.285714285714285" viewBox="0 0 448 512"><path fill="#eee" d="M353.4 32H94.7C42.6 32 0 74.6 0 126.6v258.7C0 437.4 42.6 480 94.7 480h258.7c52.1 0 94.7-42.6 94.7-94.6V126.6c0-52-42.6-94.6-94.7-94.6m-50 316.4c-27.9 48.2-89.9 64.9-138.2 37.2c-22.9 39.8-54.9 8.6-42.3-13.2l15.7-27.2c5.9-10.3 19.2-13.9 29.5-7.9c18.6 10.8-.1-.1 18.5 10.7c27.6 15.9 63.4 6.3 79.4-21.3c15.9-27.6 6.3-63.4-21.3-79.4c-17.8-10.2-.6-.4-18.6-10.6c-24.6-14.2-3.4-51.9 21.6-37.5c18.6 10.8-.1-.1 18.5 10.7c48.4 28 65.1 90.3 37.2 138.5m21.8-208.8c-17 29.5-16.3 28.8-19 31.5c-6.5 6.5-16.3 8.7-26.5 3.6c-18.6-10.8.1.1-18.5-10.7c-27.6-15.9-63.4-6.3-79.4 21.3s-6.3 63.4 21.3 79.4c0 0 18.5 10.6 18.6 10.6c24.6 14.2 3.4 51.9-21.6 37.5c-18.6-10.8.1.1-18.5-10.7c-48.2-27.8-64.9-90.1-37.1-138.4c27.9-48.2 89.9-64.9 138.2-37.2l4.8-8.4c14.3-24.9 52-3.3 37.7 21.5"/></svg>
                                                <div class="name-slogan">
                                                    <p class="name-card">Total ventas del día</p>
                                                    <p class="slogan-card">Hoy vendimos éxito.</p>
                                                </div>
                                            </div>

                                            <div class="num-percentage-content">
                                                <div class="num-percentage">
                                                    <?php
                                                        $getTotalSale = "SELECT 
                                                                            COUNT(*) AS total_sales
                                                                        FROM order_sales 
                                                                        WHERE sale_date = CURDATE()
                                                                        GROUP BY sale_date";

                                                        $resultSales = mysqli_query($conexion, $getTotalSale);
                                                        $row = mysqli_fetch_assoc($resultSales);

                                                        echo "<p class='num'>" . ($row ? $row['total_sales'] : 0) . "</p>";
                                                    ?>

                                                    <div class="icon-percentage">
                                                        <?php
                                                            //? VENTAS DE HOY
                                                            $getTotalSaleToday = "SELECT 
                                                                COUNT(*) AS total_sales,
                                                                COALESCE(SUM(total_amount), 0) AS total_amount
                                                                FROM order_sales 
                                                                WHERE DATE(sale_date) = CURDATE()";

                                                            $resultSalesToday = mysqli_query($conexion, $getTotalSaleToday);
                                                            $rowToday = mysqli_fetch_assoc($resultSalesToday);
                                                            $totalSalesToday = $rowToday['total_sales'] ?? 0;

                                                            //? VENTAS DE AYER
                                                            $getTotalSaleYesterday = "SELECT 
                                                                COUNT(*) AS total_sales,
                                                                COALESCE(SUM(total_amount), 0) AS total_amount
                                                                FROM order_sales 
                                                                WHERE DATE(sale_date) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";

                                                            $resultSalesYesterday = mysqli_query($conexion, $getTotalSaleYesterday);
                                                            $rowYesterday = mysqli_fetch_assoc($resultSalesYesterday);
                                                            $totalSalesYesterday = $rowYesterday['total_sales'] ?? 0;

                                                            //? CÁLCULO DE DIFERENCIA Y PORCENTAJE
                                                            $difference = $totalSalesToday - $totalSalesYesterday;

                                                            if ($totalSalesYesterday == 0) {
                                                                echo "<p class='percentage-neutral'>Sin comparación</p>";
                                                            } else if ($totalSalesToday == $totalSalesYesterday) {
                                                                echo "<p class='percentage-neutral'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'><path fill='#3289d1' d='M5 11v2h14v-2z'/></svg> 0%</p>";
                                                            } else {
                                                                // if ($totalSalesYesterday > 0) {
                                                                //     $percentageChange = round(($difference / $totalSalesYesterday) * 100, 2);
                                                                // }

                                                                //? DETERMINAR CLASE CSS SEGÚN EL RESULTADO
                                                                $class = $difference >= 0 ? 'percentage-positive' : 'percentage-negative';
                                                                $plus = $difference >= 0 ? '+' : '';
                                                                $arrow = $difference >= 0 ? '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="#6bc04e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M12 15h2v-6h2.5l-4.5 -4.5M12 15h-2v-6h-2.5l4.5 -4.5"><animate attributeName="d" begin="0.5s" dur="1.5s" repeatCount="indefinite" values="M12 15h2v-6h2.5l-4.5 -4.5M12 15h-2v-6h-2.5l4.5 -4.5;M12 15h2v-3h2.5l-4.5 -4.5M12 15h-2v-3h-2.5l4.5 -4.5;M12 15h2v-6h2.5l-4.5 -4.5M12 15h-2v-6h-2.5l4.5 -4.5"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="20;0"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M6 19h12"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="14;0"/></path></g></svg>' : '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="#911919" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M12 4h2v6h2.5l-4.5 4.5M12 4h-2v6h-2.5l4.5 4.5"><animate attributeName="d" begin="0.5s" dur="1.5s" repeatCount="indefinite" values="M12 4h2v6h2.5l-4.5 4.5M12 4h-2v6h-2.5l4.5 4.5;M12 4h2v3h2.5l-4.5 4.5M12 4h-2v3h-2.5l4.5 4.5;M12 4h2v6h2.5l-4.5 4.5M12 4h-2v6h-2.5l4.5 4.5"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="20;0"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M6 19h12"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="14;0"/></path></g></svg>';
                                                                

                                                                //? MOSTRAR RESULTADO
                                                                echo "<p class='{$class}'>{$arrow} {$plus}{$difference} respecto al día anterior</p>";
                                                            }

                                                            //? VALIDAR ERRORES DE MYSQLI
                                                            if (mysqli_error($conexion)) {
                                                                error_log("Error en consulta de ventas: " . mysqli_error($conexion));
                                                                echo "<p class='error'>Error al obtener datos de ventas</p>";
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-union">
                                        <div class="padd">
                                            <div class="icon-name-slogan">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#eee" d="M12.005 22.003c-5.523 0-10-4.477-10-10s4.477-10 10-10s10 4.477 10 10s-4.477 10-10 10m-3.5-8v2h2.5v2h2v-2h1a2.5 2.5 0 1 0 0-5h-4a.5.5 0 1 1 0-1h5.5v-2h-2.5v-2h-2v2h-1a2.5 2.5 0 1 0 0 5h4a.5.5 0 0 1 0 1z"/></svg>
                                                <div class="name-slogan">
                                                    <p class="name-card">Ganancia total del día</p>
                                                    <p class="slogan-card">Tu éxito, en números</p>
                                                </div>
                                            </div>

                                            <div class="num-percentage-content">
                                                <div class="num-percentage">
                                                    <div class="num-margen">
                                                        <?php
                                                            //? CÁLCULO DE INGRESOS Y MARGEN DEL DÍA
                                                            $getEarnings = "SELECT 
                                                                                SUM(osd.unit_price * osd.quantity) AS total_income
                                                                            FROM order_sales os
                                                                            INNER JOIN order_sales_details osd ON os.id = osd.sale_id
                                                                            WHERE os.sale_date = CURDATE()";

                                                            $resultEarnings = mysqli_query($conexion, $getEarnings);

                                                            //? VALIDAR SI LA CONSULTA FUE EXITOSA
                                                            if (!$resultEarnings) {
                                                                error_log("Error en cálculo de ingresos: " . mysqli_error($conexion));
                                                                echo "<p class='error'>Error al calcular ingresos</p>";
                                                            } else {
                                                                $earnings = mysqli_fetch_assoc($resultEarnings);

                                                                //? FORMATEAR NÚMEROS
                                                                $totalIncome = number_format($earnings['total_income'], 0);

                                                                //? MOSTRAR RESULTADOS
                                                                echo "<p class='margen'>Ingresos</p>";
                                                                echo "<p class='num'>$" . $totalIncome . "</p>";
                                                            }
                                                        ?>

                                                    </div>

                                                    <div class="icon-percentage">
                                                        <?php
                                                            //? CÁLCULO DE INGRESOS Y MARGEN DEL DÍA
                                                            $getEarnings = "SELECT 
                                                                COALESCE(SUM(os.total_amount), 0) AS total_income
                                                            FROM order_sales os
                                                            INNER JOIN order_sales_details osd ON os.id = osd.sale_id
                                                            WHERE os.sale_date = CURDATE();";

                                                            $resultEarnings = mysqli_query($conexion, $getEarnings);
                                                            $earnings = mysqli_fetch_assoc($resultEarnings);

                                                            //? FORMATEAR NÚMEROS
                                                            $totalIncome = number_format($earnings['total_income'], 0);

                                                            //? VENTAS DE AYER
                                                            $getTotalSaleYesterday = "SELECT 
                                                                                COALESCE(SUM(os.total_amount), 0) AS total_income_yesterday
                                                                            FROM order_sales os
                                                                            INNER JOIN order_sales_details osd ON os.id = osd.sale_id
                                                                            WHERE os.sale_date = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";

                                                            $resultSalesYesterday = mysqli_query($conexion, $getTotalSaleYesterday);
                                                            $rowYesterday = mysqli_fetch_assoc($resultSalesYesterday);
                                                            $totalIncomeYesterday = $rowYesterday['total_income_yesterday'] ?? 0;

                                                            //? CÁLCULO DEL PORCENTAJE DE GANANCIA
                                                            $percentageChangeMargin = 0;
                                                            $differenceIncome = $earnings['total_income'] - $totalIncomeYesterday;

                                                            if ($differenceIncome == 0) {
                                                                echo "<p class='percentage-neutral'>Sin comparación</p>";
                                                                // echo "<p class='percentage-neutral'><svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 24 24'><path fill='#3289d1' d='M5 11v2h14v-2z'/></svg> 0%</p>";
                                                            } else {
                                                                // Calcular el porcentaje de cambio
                                                                $percentageChangeMargin = round(($differenceIncome / $totalIncomeYesterday) * 100, 2);

                                                                //? DETERMINAR CLASE CSS SEGÚN EL RESULTADO
                                                                $class = $percentageChangeMargin >= 0 ? 'percentage-positive' : 'percentage-negative';
                                                                $info = $percentageChangeMargin >= 0 ? 'subiendo' : 'bajo';
                                                                $arrow = $percentageChangeMargin >= 0 ? 
                                                                    '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="#6bc04e" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M12 15h2v-6h2.5l-4.5 -4.5M12 15h-2v-6h-2.5l4.5 -4.5"><animate attributeName="d" begin="0.5s" dur="1.5s" repeatCount="indefinite" values="M12 15h2v-6h2.5l-4.5 -4.5M12 15h-2v-6h-2.5l4.5 -4.5;M12 15h2v-3h2.5l-4.5 -4.5M12 15h-2v-3h-2.5l4.5 -4.5;M12 15h2v-6h2.5l-4.5 -4.5M12 15h-2v-6h-2.5l4.5 -4.5"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="20;0"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M6 19h12"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="14;0"/></path></g></svg>' : 
                                                                    '<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><g fill="none" stroke="#911919" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path stroke-dasharray="20" stroke-dashoffset="20" d="M12 4h2v6h2.5l-4.5 4.5M12 4h-2v6h-2.5l4.5 4.5"><animate attributeName="d" begin="0.5s" dur="1.5s" repeatCount="indefinite" values="M12 4h2v6h2.5l-4.5 4.5M12 4h-2v6h-2.5l4.5 4.5;M12 4h2v3h2.5l-4.5 4.5M12 4h-2v3h-2.5l4.5 4.5;M12 4h2v6h2.5l-4.5 4.5M12 4h-2v6h-2.5l4.5 4.5"/><animate fill="freeze" attributeName="stroke-dashoffset" dur="0.4s" values="20;0"/></path><path stroke-dasharray="14" stroke-dashoffset="14" d="M6 19h12"><animate fill="freeze" attributeName="stroke-dashoffset" begin="0.5s" dur="0.2s" values="14;0"/></path></g></svg>';

                                                                //? MOSTRAR RESULTADO
                                                                echo "<p class='{$class}'>{$arrow} {$percentageChangeMargin}% {$info}</p>";
                                                            }

                                                            //? VALIDAR ERRORES DE MYSQLI
                                                            if (mysqli_error($conexion)) {
                                                                error_log("Error en consulta de márgenes: " . mysqli_error($conexion));
                                                                echo "<p class='error'>Error al obtener datos de márgenes</p>";
                                                            }
                                                            ?>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card-union">
                                        <div class="padd">
                                            <div class="icon-name-slogan">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="none" stroke="#eee" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 11h16a1 1 0 0 1 1 1v.5c0 1.5-2.517 5.573-4 6.5v1a1 1 0 0 1-1 1H8a1 1 0 0 1-1-1v-1c-1.687-1.054-4-5-4-6.5V12a1 1 0 0 1 1-1m15-4L5 8m14-6L5 5"/></svg>
                                                <div class="name-slogan">
                                                    <p class="name-card">Platillo más vendido</p>
                                                    <p class="slogan-card">El favorito del día</p>
                                                </div>
                                            </div>

                                            <div class="num-percentage-content">
                                                <div class="product-percentage">
                                                    <div class="num-margen">
                                                        <?php
                                                            //? CÁLCULO DE INGRESOS Y MARGEN DEL DÍA
                                                            $getOrder = "SELECT 
                                                                                osd.order_name, 
                                                                                SUM(osd.quantity) AS total_quantity
                                                                            FROM order_sales os
                                                                            INNER JOIN order_sales_details osd ON os.id = osd.sale_id
                                                                            WHERE os.sale_date = CURDATE()
                                                                            GROUP BY osd.order_name
                                                                            ORDER BY total_quantity DESC
                                                                            LIMIT 1";

                                                            $resultOrder = mysqli_query($conexion, $getOrder);

                                                            if($resultOrder -> num_rows > 0){
                                                                $rowOrder = mysqli_fetch_assoc($resultOrder);
                                                                if($rowOrder['total_quantity'] > 1){
                                                                    echo "<p class='product'>" . ucfirst($rowOrder['order_name']) . " (" . $rowOrder['total_quantity'] . " unidades)</p>";
                                                                } else {
                                                                    echo "<p class='product'>" . ucfirst($rowOrder['order_name']) . " (" . $rowOrder['total_quantity'] . " unidad)</p>";
                                                                }
                                                            } else {
                                                                echo "<div class='not-sales-today'>
                                                                        <p>No se han registrado ventas hoy.</p>
                                                                    </div>";
                                                            }
                                                        ?>

                                                    </div>

                                                    <div class="icon-percentage">
                                                        <?php
                                                            //? CONSULTA DEL TOTAL DE VENTAS DEL DÍA
                                                            $getTotalSales = "SELECT 
                                                                                COALESCE(SUM(s.total_amount), 0) AS total_sales
                                                                            FROM order_sales s
                                                                            WHERE s.sale_date = CURDATE()";

                                                            $resultTotalSales = mysqli_query($conexion, $getTotalSales);
                                                            $totalSalesData = mysqli_fetch_assoc($resultTotalSales);
                                                            $totalSales = $totalSalesData['total_sales'] ?? 0;

                                                            //? CONSULTA DEL PRODUCTO MÁS VENDIDO
                                                            $getBestSellingOrder = "SELECT 
                                                                osd.order_name, 
                                                                SUM(osd.quantity) AS total_quantity,
                                                                SUM(osd.unit_price * osd.quantity) AS order_total_sales
                                                            FROM order_sales os
                                                            INNER JOIN order_sales_details osd ON os.id = osd.sale_id
                                                            WHERE os.sale_date = CURDATE()
                                                            GROUP BY osd.order_name
                                                            ORDER BY total_quantity DESC
                                                            LIMIT 1";

                                                            $resultBestSelling = mysqli_query($conexion, $getBestSellingOrder);
                                                            $bestSellingOrder = mysqli_fetch_assoc($resultBestSelling);

                                                            //? VERIFICAR SI HAY RESULTADOS
                                                            if ($bestSellingOrder) {
                                                                $orderName = $bestSellingOrder['order_name'];
                                                                $orderQuantity = $bestSellingOrder['total_quantity'];
                                                                $orderTotalSales = $bestSellingOrder['order_total_sales'] ?? 0;

                                                                //? CALCULAR PORCENTAJE DEL PRODUCTO MÁS VENDIDO
                                                                $percentage = ($totalSales > 0) ? ($orderTotalSales / $totalSales) * 100 : 0;

                                                                //? MOSTRAR RESULTADOS
                                                                echo "<p class='percentage-positive'>" . round($percentage, 2) . "% del total de las ventas del día</p>";
                                                            } 
                                                            
                                                            // else {
                                                            //     echo "<p>No se han registrado ventas hoy.</p>";
                                                            // }

                                                            //? VALIDAR ERRORES DE MYSQLI
                                                            if (mysqli_error($conexion)) {
                                                                error_log("Error en consulta de producto más vendido: " . mysqli_error($conexion));
                                                                echo "<p class='error'>Error al obtener datos del producto más vendido</p>";
                                                            }
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- PARA ACTUALIZACIONES -->

                                            <!-- <div class="btn-see">
                                                <a href="#">
                                                    <p>Ver top 3 ventas</p>
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 1024 1024"><path fill="#3289d1" d="M768 256H353.6a32 32 0 1 1 0-64H800a32 32 0 0 1 32 32v448a32 32 0 0 1-64 0z"/><path fill="#3289d1" d="M777.344 201.344a32 32 0 0 1 45.312 45.312l-544 544a32 32 0 0 1-45.312-45.312z"/></svg>
                                                </a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="grid-three">
                            <div class="group-cards-auto">
                                <h3 class="tlt-group">Insumos con bajo stock</h3>

                                <div class="content-cards-auto">
                                    <div class="card-union">
                                        <div class="padd">
                                            <div class="icon-name-slogan">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 14 14"><path fill="none" stroke="#eee" stroke-linecap="round" stroke-linejoin="round" d="M12.25 1.81V.5M11 5.31c0 .66.53.88 1.25.88s1.25 0 1.25-.88C13.5 4 11 4 11 2.69c0-.88.53-.88 1.25-.88s1.25.33 1.25.88m-1.25 3.5V7.5m-9.75-4h-1a1 1 0 0 0-1 1V9a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V4.5a1 1 0 0 0-1-1M2 10v1.5m0-8v-3m6 7H7a1 1 0 0 0-1 1V10a1 1 0 0 0 1 1h1a1 1 0 0 0 1-1V8.5a1 1 0 0 0-1-1M7.5 11v2.5m0-6V4"/></svg>
                                                <div class="name-slogan">
                                                    <p class="name-card">Insumos con menor stock</p>
                                                    <p class="slogan-card">Última oportunidad para gestionar el inventario.</p>
                                                </div>
                                            </div>

                                            <?php
                                                $getIngredient = "SELECT name_ingredient, quantity_stock FROM ingredients WHERE quantity_stock <= minimum_stock";
                                                $resultIngredient = mysqli_query($conexion, $getIngredient);

                                                if($resultIngredient -> num_rows > 0){
                                                    echo "<div class='product-stock'>";

                                                        while ( $rowIngredient = mysqli_fetch_assoc($resultIngredient)){
                                                            echo "<div class='bp-stock'>
                                                                    <p class='name-product'>" . ucfirst($rowIngredient['name_ingredient']) . "</p>
                                                                    <p class='available'>Disponibles: " . $rowIngredient['quantity_stock'] . "</p>
                                                                </div>";
                                                        }
                                            
                                                    echo "</div>";

                                                    echo "<div class='low-stock'>
                                                                <svg xmlns='http://www.w3.org/2000/svg' width='20' height='20' viewBox='0 0 20 20'><path fill='#911919' d='M19.511 17.98L10.604 1.348a.697.697 0 0 0-1.208 0L.49 17.98a.68.68 0 0 0 .005.68c.125.211.352.34.598.34h17.814a.7.7 0 0 0 .598-.34a.68.68 0 0 0 .006-.68M11 17H9v-2h2zm0-3.5H9V7h2z'/></svg>
                                                                <p>Stock muy bajo, reponer pronto</p>
                                                            </div>";
                                                } else {
                                                    echo "<div class='not-products'>
                                                            <p>No hay insumos con bajo stock.</p>
                                                        </div>";
                                                }
                                            ?>
                                        </div>
                                    </div>

                                    <div class="card-union">
                                        <div class="padd">
                                            <div class="icon-name-slogan">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"><path fill="#eee" d="M22 2.25h-3.25V.75a.75.75 0 0 0-1.5-.001V2.25h-4.5V.75a.75.75 0 0 0-1.5-.001V2.25h-4.5V.75a.75.75 0 0 0-1.5-.001V2.25H2a2 2 0 0 0-2 1.999v17.75a2 2 0 0 0 2 2h20a2 2 0 0 0 2-2V4.249a2 2 0 0 0-2-1.999M22.5 22a.5.5 0 0 1-.499.5H2a.5.5 0 0 1-.5-.5V4.25a.5.5 0 0 1 .5-.499h3.25v1.5a.75.75 0 0 0 1.5.001V3.751h4.5v1.5a.75.75 0 0 0 1.5.001V3.751h4.5v1.5a.75.75 0 0 0 1.5.001V3.751H22a.5.5 0 0 1 .499.499z"/><path fill="#eee" d="M5.25 9h3v2.25h-3zm0 3.75h3V15h-3zm0 3.75h3v2.25h-3zm5.25 0h3v2.25h-3zm0-3.75h3V15h-3zm0-3.75h3v2.25h-3zm5.25 7.5h3v2.25h-3zm0-3.75h3V15h-3zm0-3.75h3v2.25h-3z"/></svg>
                                                <div class="name-slogan">
                                                    <p class="name-card">Fecha de última reposición</p>
                                                    <p class="slogan-card">Mantente al día, revisa la última reposición.</p>
                                                </div>
                                            </div>

                                            <?php
                                                $getIngredient = "SELECT name_ingredient, entry_date, DATEDIFF(CURDATE(), entry_date) AS days_gone FROM ingredients WHERE quantity_stock <= minimum_stock";
                                                $resultIngredient = mysqli_query($conexion, $getIngredient);

                                                if($resultIngredient -> num_rows > 0){
                                                    echo "<div class='product-stock'>";

                                                        while ( $rowIngredient = mysqli_fetch_assoc($resultIngredient)){
                                                            echo "<div class='bp-stock'>
                                                                        <p class='name-product'>" . ucfirst($rowIngredient['name_ingredient']) . "</p>
                                                                        <div class='news'>
                                                                            <p>" . $rowIngredient['entry_date'] . "</p>
                                                                            <p>Reposición días: " . $rowIngredient['days_gone'] . "</p>
                                                                        </div>
                                                                    </div>";
                                                        }
                                                    
                                                    echo "</div>";
                                                
                                                } else {
                                                    echo "<div class='not-products'>
                                                            <p>No hay insumos con bajo stock</p>
                                                        </div>";
                                                }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </section>
            </section>
        </section>
    </main>

    <script src="../js/dashboard-store.js"></script>
</body>
</html>