<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar insumos al inventario - Vendex</title>
    <link rel="stylesheet" href="../../../../css/restaurant/add-ingredients.css">
    <link rel="stylesheet" href="../../../../css/restaurant/base-autocomplete.css">
    <link rel="shortcut icon" href="../../../../svg/icon-vendex.svg" type="image/x-icon">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <?php
        include("../../../../conexion.php");

        session_start();

        if (isset($_SESSION['user_id'])) {
            $id_user = $_SESSION['user_id']; 
        } else {
            header("Location: ../../../../index.php");
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
                    <img src="../../../../svg/people.svg" alt="">
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

        <section class="add-products-form" id="hidden-modal">
            <div class="add-form">
                <div class="tlt-button">
                    <h2 class="tlt-function">Agregar ingredientes al plato</h2>
                    
                    <div class="create-update">
                        <a href="../inventory-ingredients.php" class="button-function bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"><path fill="#eee" d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12c5.16-1.26 9-6.45 9-12V5Zm0 3.9a3 3 0 1 1-3 3a3 3 0 0 1 3-3m0 7.9c2 0 6 1.09 6 3.08a7.2 7.2 0 0 1-12 0c0-1.99 4-3.08 6-3.08"/></svg>
                            <p>Administrar inventario de ingredientes</p>
                        </a>
                    </div>
                </div>

                <div class="content-form">
                    <form action="adding-ingredients-dish.php?id=<?php echo $id_dish ?>" method="POST" class="form">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="name-ingredient">Nombre del ingrediente</label>
                                    <input type="text" name="name-ingredient" id="name-ingredient" class="input-form b-col-fcs-val" placeholder="Nombre del producto" required>
                                </div>

                                <div class="label-input">
                                    <label for="unit">Unidad</label>
                                    <input type="text" name="unit" id="unit" class="input-form b-col-fcs-val" placeholder="Unidad" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="taken-stock">Cantidad</label>
                                    <input type="number" name="taken-stock" class="input-form b-col-fcs-val" placeholder="Cantidad que lleva" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="cost-ingredient">Costo</label>
                                    <input type="number" name="cost-ingredient" id="cost" class="input-form b-col-fcs-val" placeholder="Costo" required>
                                </div>
                            </div>
                        </div>

                        <div class="button-submit">
                            <input type="submit" name="button-add-ingredient-dish" class="btn-form bg-btn" value="Agregar">
                        </div>
                    </form>
                </div>
            </div>

            <script>
                $(document).ready(function(){
                    // Inicia el autocompletado usando jQuery UI
                    $('#name-ingredient').autocomplete({
                        source: function(request, response) {
                            $.ajax({
                                url: "autocomplete.php", // Archivo PHP que consulta los productos
                                type: "POST",
                                data: { query: request.term }, // Envía lo que el usuario escribe
                                success: function(data) {
                                    response($.parseJSON(data)); // Convierte los datos en formato JSON
                                }
                            });
                        },
                        minLength: 3, // Comienza a buscar desde el segundo carácter
                        select: function(event, ui) {
                            $('#unit').val(ui.item.unity);
                            $('#cost').val(ui.item.price);
                        }
                    });
                });
            </script>
        </section>
    </main>

    <script src="../../../../js/base-nav-dash.js"></script>
</body>
</html>