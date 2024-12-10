<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buscando productos - Vendex</title>
    <link rel="stylesheet" href="../../../../css/store/admin-inventory.css">
    <link rel="stylesheet" href="../../../../css/store/base-autocomplete.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">

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

        <section class="info-table-product" id="hidden-modal">
            <div class="table-products">
                <div class="tlt-search-add">
                    <h2 class="tlt-function">Consulta realizada</h2>
                    
                    <div class="search-add">
                        <form action="" method="POST" class="form-search">
                            <input type="text" name="search" id="search" class="input-search" placeholder="Buscar por producto..." required>
                            <input type="submit" name="button-search" class="btn-search bg-btn" value="Buscar">
                        </form>

                        <script>
                            $(document).ready(function(){
                                // Inicia el autocompletado usando jQuery UI
                                $('#search').autocomplete({
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
                                    minLength: 3 // Comienza a buscar desde el segundo carácter
                                });
                            });
                        </script>
                        
                        <a href="../admin-inventory.php" class="add bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 2048 2048"><path fill="#eee" d="M1024 768q79 0 149 30t122 82t83 123t30 149q0 80-30 149t-82 122t-123 83t-149 30q-80 0-149-30t-122-82t-83-122t-30-150q0-79 30-149t82-122t122-83t150-30m0 640q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20m0-1152q143 0 284 35t266 105t226 170t166 234q40 83 61 171t21 181h-128q0-118-36-221t-99-188t-150-152t-185-113t-209-70t-217-24q-108 0-217 24t-208 70t-186 113t-149 152t-100 188t-36 221H0q0-92 21-180t61-172q64-132 165-233t227-171t266-104t284-36"/></svg>
                            <p>Ver todos los productos</p>
                        </a>
                    </div>
                </div>

                <div class="all-products">
                    <div class="content-cards">
                        <?php
                            if(isset($_POST['button-search'])){
                                $search = $_POST['search'];

                                $searchTerm = mysqli_real_escape_string($conexion, $search);

                                $getProducts = "SELECT * FROM inventory_products WHERE product_name LIKE '%$searchTerm%'";
                                $resultProducts = mysqli_query($conexion, $getProducts);
                                
                                if($resultProducts -> num_rows > 0){
                                    while($row = mysqli_fetch_array($resultProducts)){
                                        $id = $row['id'];
                                        $id_category = $row['id_category'];
    
                                        $queryCategory = "SELECT category FROM categories_store WHERE id = $id_category";
                                        $resultCat = mysqli_query($conexion, $queryCategory);
                                        $rowCat = mysqli_fetch_array($resultCat);
    
                                        echo "<div class='card-product'>
                                                <div class='info-product'>
                                                    <p>$ " . number_format($row['sale_price'], 0) . "</p>
                                                    <h3 class='product'>" . ucfirst($row['product_name']) . "</h3>
                                                    <p>" . $row['stock_quantity'] . " disponibles</p>
                                                </div>
    
                                                <div class='actions'>
                                                    <a href='delete.php?id=$id'>
                                                        <img src='../../../../svg/delete.svg' />
                                                        Eliminar
                                                    </a>
    
                                                    <a href='get-data.php?id=$id'>
                                                        <img src='../../../../svg/edit.svg' />
                                                        Editar
                                                    </a>
                                                </div>
                                            </div>";
                                    }
                                } else {
                                    echo "<div class='not-product'><p>No tienes productos en tu inventario</p></div>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script src="../../../../js/base-nav-dash.js"></script>
</body>
</html>