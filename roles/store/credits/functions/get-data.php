<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar créditos - Vendex</title>
    <link rel="stylesheet" href="../../../../css/store/edit-credits.css">
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

        if (isset($_GET['id'])) {
            $id_credit = $_GET['id']; 
        }

        $queryCredit = "SELECT * FROM credits WHERE id = $id_credit";
        $result = mysqli_query($conexion, $queryCredit);
        $row = mysqli_fetch_array($result);
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

        <section class="create-credits-form" id="hidden-modal">
            <div class="add-form">
                <div class="tlt-button">
                    <h2 class="tlt-function">Actualizar créditos</h2>
                    
                    <div class="create-update">
                        <a href="../see-credits.php" class="button-function bg-btn">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 2048 2048"><path fill="#eee" d="M1024 768q79 0 149 30t122 82t83 123t30 149q0 80-30 149t-82 122t-123 83t-149 30q-80 0-149-30t-122-82t-83-122t-30-150q0-79 30-149t82-122t122-83t150-30m0 640q53 0 99-20t82-55t55-81t20-100q0-53-20-99t-55-82t-81-55t-100-20q-53 0-99 20t-82 55t-55 81t-20 100q0 53 20 99t55 82t81 55t100 20m0-1152q143 0 284 35t266 105t226 170t166 234q40 83 61 171t21 181h-128q0-118-36-221t-99-188t-150-152t-185-113t-209-70t-217-24q-108 0-217 24t-208 70t-186 113t-149 152t-100 188t-36 221H0q0-92 21-180t61-172q64-132 165-233t227-171t266-104t284-36"/></svg>
                            <p>Ver créditos</p>
                        </a>
                    </div>
                </div>

                <div class="content-form">
                    <form action="update.php?id=<?php echo $id_credit ?>" method="POST" class="form">
                        <div class="alls">
                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="customer">Cliente</label>
                                    <input type="text" name="customer" class="input-form b-col-fcs-val" placeholder="Cliente" value="<?php echo $row['customer'] ?>" required>
                                </div>

                                <div class="label-input">
                                    <label for="creation-date">Fecha de creación</label>
                                    <input type="date" name="creation-date" class="input-form b-col-fcs-val" value="<?php echo $row['creation_date'] ?>" required>
                                </div>
                            </div>

                            <div class="content-labels-inputs">
                                <div class="label-input">
                                    <label for="amount-borrowed">Monto prestado</label>
                                    <input type="number" name="amount-borrowed" class="input-form b-col-fcs-val" placeholder="Monto prestado" value="<?php echo $row['amount_borrowed'] ?>" required>
                                </div>
                                
                                <div class="label-input">
                                    <label for="status">Estado</label>
                                    <select name="status" class="select b-col-fcs-val" required>
                                        <option value="" disabled selected>Seleccione</option>
                                        <?php
                                            if($row['credit_status'] == 'Pendiente') {
                                                echo "<option value='Pendiente' selected>Pendiente</option>";
                                                echo "<option value='Pagado'>Pagado</option>";
                                            } else if($row['credit_status'] == 'Pagado') {
                                                echo "<option value='Pendiente'>Pendiente</option>";
                                                echo "<option value='Pagado' selected>Pagado</option>";
                                            } 
                                        ?>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="button-submit">
                            <input type="submit" name="button-update-credit" class="btn-form bg-btn" value="Actualizar">
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script src="../../../../js/base-nav-dash.js"></script>

</body>
</html>