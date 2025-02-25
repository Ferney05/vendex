<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrar inventario de ingredientes - Vendex</title>
    <link rel="stylesheet" href="../../../css/restaurant/admin-inventory.css">
    <link rel="stylesheet" href="../../../css/base-inventory.css">
    <link rel="stylesheet" href="../../../css/restaurant/base-autocomplete.css">
    <link rel="shortcut icon" href="../../../svg/icon.png" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

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

        <section class="info-table-product" id="hidden-modal">
            <div class="table-products">
                <div class="tlt-search-add">
                    <h2 class="tlt-function">Administrar inventario de ingredientes</h2>
                    
                    <div class="search-add">
                        <form action="functions/search-ingredients.php" method="POST" class="form-search">
                            <input type="text" name="search" class="input-search b-col-fcs-val" id="search-ingredient" placeholder="Buscar por ingrediente..." required>
                            <input type="submit" name="button-search" class="btn-search bg-btn" value="Buscar">
                        </form>

                        <script>
                            $(document).ready(function(){
                                // Inicia el autocompletado usando jQuery UI
                                $('#search-ingredient').autocomplete({
                                    source: function(request, response) {
                                        $.ajax({
                                            url: "functions/autocomplete-ingredients.php", // Archivo PHP que consulta los productos
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
                        </script>
                        
                        <a href="functions/add-ingredients.php" class="add bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 2C6.477 2 2 6.477 2 12s4.477 10 10 10s10-4.477 10-10S17.523 2 12 2m5 11h-4v4h-2v-4H7v-2h4V7h2v4h4z"/></svg>
                            <p>Agregar ingredientes</p>
                        </a>
                    </div>
                </div>

                <div class="all-products">
                    <div class="content-cards">
                        <?php
                            $getIngredient = "SELECT * FROM ingredients";
                            $resultIngredient = mysqli_query($conexion, $getIngredient);
                            
                            if($resultIngredient -> num_rows > 0){
                                while($row = mysqli_fetch_array($resultIngredient)){
                                    $id = $row['id'];
    
                                        echo  "<div class='card-product' style='padding: 1rem 0 0 0;'>
                                                <div class='unit-info'>
                                                    <div class='info-product'>
                                                        <h3 class='product'>" . ucfirst($row['name_ingredient']) . "</h3>
                                                        <div class='stock-unit'>
                                                            <p>" . $row['quantity_stock'] . " disponibles</p>
                                                            <p>Medida: " . ucfirst($row['unit']) . "</p>
                                                            <p>Stock mínimo: " . $row['minimum_stock'] . "</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class='actions'>
                                                    <a href='functions/delete-ingredient.php?id=$id'>
                                                        <img src='../../../svg/delete.svg' />
                                                        Eliminar
                                                    </a>

                                                    <a href='functions/get-data-ingredients.php?id=$id'>
                                                        <img src='../../../svg/edit.svg' />
                                                        Editar
                                                    </a>
                                                </div>
                                            </div>";
                                }
                            } else {
                                echo "<tr>
                                        <td colspan='10'>No hay recetas aún.</td>
                                      </tr>";
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="../../../js/base-nav-dash.js"></script>
</body>
</html>