<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Datos incorrectos - Vendex</title>
    <link rel="stylesheet" href="../../css/warning.css">
    <link rel="shortcut icon" href="../../svg/icon-vendex.svg" type="image/x-icon">
</head>
<body>

    <?php
        include('../../conexion.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = mysqli_real_escape_string($conexion, $_POST['email']);
            $password = mysqli_real_escape_string($conexion, $_POST['password']); 
            $role = $_POST['role'];

            $queryData = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_prepare($conexion, $queryData);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($rowData = mysqli_fetch_assoc($result)) {
                if ($password == $rowData['pass']) {
                    session_start();
                    $_SESSION['user_id'] = $rowData['id'];
                    $_SESSION['role'] = $rowData['role'];

                    if ($role == $rowData['role']) {
                        header("Location: ../../roles/dashboard-store.php");
                        exit;
                    } else {
                        header("Refresh: 5; url=../../index.php?error=role");

                        echo "<div class='warning'>
                                <div class='back'>
                                    <div class='tlt-icon'>
                                        <h2>Acceso denegado</h2>
                                        <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24'><path fill='#911919' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/></svg>
                                    </div>

                                    <p class='info-text'>El rol especificado no es correcto.</p>
                                </div>
                            </div>";

                        exit;
                    }
                } else {
                    header("Refresh: 5; url=../../index.php?error=invalid_password");

                    echo "<div class='warning'>
                            <div class='back'>
                                <div class='tlt-icon'>
                                    <h2>Acceso denegado</h2>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24'><path fill='#911919' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/></svg>
                                </div>

                                <p class='info-text'>La contraseña ingresada es incorrecta.</p>
                            </div>
                        </div>";
                        
                    exit;
                }
            } else {
                header("Refresh: 5; url=../../index.php?error=user_not_found");

                echo "<div class='warning'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Acceso denegado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24'><path fill='#911919' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/></svg>
                            </div>

                            <p class='info-text'>Los datos ingresados son incorrectos; no se ha encontrado el usuario.</p>
                        </div>
                    </div>";
                    
                exit;
            }
        }
    ?>


</body>
</html>
