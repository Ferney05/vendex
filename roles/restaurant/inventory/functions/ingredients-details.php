<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles de ingredientes - Vendex</title>
    <link rel="stylesheet" href="../../../../css/restaurant/invoice-details.css">
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


        if(isset($_GET['id'])){
            $id_dish = $_GET['id'];
        }
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
        </nav>

        <section class="sect-details" id="hidden-modal">
            <div class="view-details">
                <div class="tlt-button">
                    <h2 class="tlt-function">Detalles de los ingredientes</h2>
                    
                    <a href="../admin-inventory.php" class="btn-details">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5Zm0 3.9a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0 7.9c2 0 6 1.09 6 3.08a7.2 7.2 0 0 1-12 0c0-1.99 4-3.08 6-3.08"/></svg>
                        <p>Administrar inventario de recetas</p>
                    </a>
                </div>

                <div class="content-table">
                    <div class="tlt-info">
                        <?php
                            $queryDish = "SELECT name_dish FROM recipes WHERE id = $id_dish";
                            $resultDish = mysqli_query($conexion, $queryDish);
                            $rowDish = mysqli_fetch_array($resultDish);

                            echo "<h3>Ingredientes del plato '" . ucfirst($rowDish['name_dish']) . "'</h3>";
                        ?>
                    </div>

                    <table>
                        <tr>
                            <th>Ingrediente</th>
                            <th>Unidades</th>
                            <th>Unidad</th>
                            <th>Costo</th>
                        </tr>

                        <?php
                            $queryDetails = "SELECT * FROM ingredients_of_dish WHERE id_dish = $id_dish";
                            $resultDetails = mysqli_query($conexion, $queryDetails);

                            if($resultDetails -> num_rows > 0) {
                                while ($row = mysqli_fetch_assoc($resultDetails)){
                                    echo "<tr>
                                            <td>" . ucfirst($row['name_ingredient']) . "</td>
                                            <td>" . $row['stock_taken'] . "</td>
                                            <td>" . $row['unit'] . "</td>
                                            <td>$" . number_format($row['cost'], 0) . "</td>
                                          </tr>";
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='4'>No hay ingredientes agregados</td>
                                     </tr>";
                            }
                        ?>
                    </table>
                </div>
            </div>
        </section>
    </main>

    <script src="../../../../js/base-nav-dash.js"></script>

</body>
</html>