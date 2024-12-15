<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crédito actualizado - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">
</head>
<body>

    <?php

        include("../../../../conexion.php");

        if (isset($_GET['id'])) {
            $id_credit = $_GET['id']; 
        }

        if(isset($_POST['button-update-credit'])) {
            $customer = $_POST['customer'];
            $amount_borrowed = $_POST['amount-borrowed'];
            $creation_date = $_POST['creation-date'];
            $status = $_POST['status'];

            // Actualizar los datos del crédito en la base de datos
            $insertData = "UPDATE credits SET customer = '$customer', amount_borrowed = '$amount_borrowed', creation_date = '$creation_date', credit_status = '$status' WHERE id = $id_credit";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                // Consultar los datos actualizados
                $query = $conexion->prepare("SELECT amount_borrowed, fertilizers FROM credits WHERE customer = ?");
                $query->bind_param("s", $customer);
                $query->execute();
                $result = $query->get_result();
                $row = $result->fetch_assoc();

                // Verificar si el monto abonado es mayor o igual al monto prestado
                $status = ($row['fertilizers'] >= $row['amount_borrowed']) ? 'Pagado' : 'Pendiente';

                // Actualizar el estado del crédito
                $update = $conexion->prepare("UPDATE credits SET credit_status = ? WHERE id = ?");
                $update->bind_param("si", $status, $id_credit); // Se utiliza el ID del crédito
                $execute = $update->execute();

                // Mostrar el mensaje de éxito
                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Crédito actualizado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'>
                                    <path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/>
                                </svg>
                            </div>

                            <p class='info-text'>Se actualizó correctamente el crédito.</p>
                        </div>
                      </div>";

                // Redirigir después de 3 segundos
                header("Refresh: 3; url=../see-credits.php");
                exit;
            } else {
                // En caso de error al ejecutar la consulta de actualización
                echo "<div class='warning'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Error</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'>
                                    <path fill='#911919' fill-rule='evenodd' stroke='#911919' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z'/>
                                </svg>
                            </div>

                            <p class='info-text'>Hubo un error al actualizar el crédito.</p>
                        </div>
                      </div>";
                header("Refresh: 3; url=../see-credits.php");
                exit;
            }
        }
    ?>

</body>
</html>
