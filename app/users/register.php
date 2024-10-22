<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro exitoso - Vendex</title>
    <link rel="stylesheet" href="../../css/success.css">
    <link rel="shortcut icon" href="../../svg/icon-vendex.svg" type="image/x-icon">
</head>
<body>

    <?php

        include("../../conexion.php");

        if(isset($_POST['button-register-users'])){
            $name = $_POST['name'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $role = $_POST['role'];

            $insertData = "INSERT INTO users VALUES(null, '$name', '$lastname', '$email', '$password', '$role')";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                header("Refresh: 5; url=../../index.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Registro exitoso</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Tu cuenta ha sido creada con éxito. Ahora puedes iniciar sesión y comenzar a usar la plataforma.</p>
                        </div>
                      </div>";
            }
        }
    ?>

</body>
</html>