<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambiar contraseña - Vendex</title>
    <link rel="stylesheet" href="../../css/warning.css">
    <link rel="stylesheet" href="../../css/success.css">
    <link rel="shortcut icon" href="../../svg/icon-vendex.svg" type="image/x-icon">
</head>
<body>

    <?php
        include('../../conexion.php');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // Validar entrada
            $email = mysqli_real_escape_string($conexion, $_POST['email']);
            $new_password = mysqli_real_escape_string($conexion, $_POST['new-password']); 

            // Verificar si el email existe
            $query = "SELECT * FROM users WHERE email = ?";
            $stmt = mysqli_prepare($conexion, $query);
            mysqli_stmt_bind_param($stmt, "s", $email);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if (mysqli_num_rows($result) > 0) {
                // Actualizar contraseña en texto plano (NO RECOMENDADO)
                $updateQuery = "UPDATE users SET pass = ? WHERE email = ?";
                $stmt_update = mysqli_prepare($conexion, $updateQuery);
                mysqli_stmt_bind_param($stmt_update, "ss", $new_password, $email);
                $execute = mysqli_stmt_execute($stmt_update);

                if($execute) {
                    header("Refresh: 5; url=../../index.php");
                    echo "<div class='success'>
                            <div class='back'>
                                <div class='tlt-icon'>
                                    <h2>Cambio exitoso</h2>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'>
                                        <path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/>
                                    </svg>
                                </div>
                                <p class='info-text'>La contraseña se ha actualizado correctamente. Ya puedes iniciar sesión.</p>
                            </div>
                          </div>";
                } else {
                    header("Refresh: 5; url=../../index.php");
                    echo "<div class='warning'>
                            <div class='back'>
                                <div class='tlt-icon'>
                                    <h2>Error en la actualización</h2>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24'>
                                        <path fill='#911919' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/>
                                    </svg>
                                </div>
                                <p class='info-text'>Ocurrió un problema al actualizar la contraseña. Inténtalo de nuevo.</p>
                            </div>
                          </div>";
                }

            } else {
                // El correo no existe
                header("Refresh: 5; url=../../index.php");
                echo "<div class='warning'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Cambio fallido</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 24 24'>
                                    <path fill='#911919' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/>
                                </svg>
                            </div>
                            <p class='info-text'>El correo ingresado no se encuentra en nuestra base de datos.</p>
                        </div>
                      </div>";
            }
        }
    ?>

</body>
</html>
