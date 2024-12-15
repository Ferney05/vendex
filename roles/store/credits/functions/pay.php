<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Se abonó - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="stylesheet" href="../../../../css/warning.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">
</head>
<body>

<?php
    include("../../../../conexion.php");

    // Función para mostrar mensajes
    function showMessage($type, $title, $message, $redirect) {
        $iconColor = $type === 'success' ? '#6bc04e' : '#911919';
        $iconPath = $type === 'success'
            ? 'M4 24l5-5l10 10L39 9l5 5l-25 25z'
            : 'M12 17q.425 0 .713-.288T13 16q0-.425-.288-.713T12 15q-.425 0-.713.288T11 16q0 .425.288.713T12 17Zm0 5q-2.075 0-3.9-.788t-3.175-2.137q-1.35-1.35-2.137-3.175T2 12q0-2.075.788-3.9t2.137-3.175q1.35-1.35 3.175-2.137T12 2q2.075 0 3.9.788t3.175 2.137q1.35 1.35 2.138 3.175T22 12q0 2.075-.788 3.9t-2.137 3.175q-1.35 1.35-3.175 2.138T12 22Zm0-9q.425 0 .713-.288T13 12V8q0-.425-.288-.713T12 7q-.425 0-.713.288T11 8v4q0 .425.288.713T12 13Z';

        echo "
        <div class='$type'>
            <div class='back'>
                <div class='tlt-icon'>
                    <h2>$title</h2>
                    <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'>
                        <path fill='$iconColor' d='$iconPath'/>
                    </svg>
                </div>
                <p class='info-text'>$message</p>
            </div>
        </div>";
        header("Refresh: 3; url=$redirect");
        exit;
    }

    // Validar datos POST
    if (isset($_POST['button-pay-credit'])) {
        $pay = filter_input(INPUT_POST, 'pay', FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
        $customer = mysqli_real_escape_string($conexion, $_POST['customer']);

        if (!$pay || !$customer || $pay <= 0) {
            showMessage('warning', 'Error', 'Datos inválidos o monto no válido.', '../see-credits.php');
        }

        // Consultar datos del cliente
        $query = $conexion->prepare("SELECT amount_borrowed, fertilizers FROM credits WHERE customer = ?");
        $query->bind_param("s", $customer);
        $query->execute();
        $result = $query->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verificar que el monto a abonar no sea mayor al monto prestado
            if ($pay > $row['amount_borrowed']) {
                showMessage('warning', 'Abono no procesado', 'El monto a abonar no puede ser mayor al monto total prestado.', '../see-credits.php');
            } else {
                // Actualizar abono y estado del crédito
                $newFertilizers = $row['fertilizers'] + $pay;
                $status = ($newFertilizers >= $row['amount_borrowed']) ? 'Pagado' : 'Pendiente';

                // Actualizar en la base de datos
                $update = $conexion->prepare("UPDATE credits SET fertilizers = ?, credit_status = ?, creation_date = CURDATE() WHERE customer = ?");
                $update->bind_param("dss", $newFertilizers, $status, $customer);
                $execute = $update->execute();

                if ($execute) {
                    showMessage('success', 'Se ha abonado', 'Se abonó correctamente.', '../see-credits.php');
                } else {
                    showMessage('warning', 'Error', 'No se pudo procesar el abono.', '../see-credits.php');
                }
            }
        } else {
            showMessage('warning', 'Error', 'Cliente no encontrado.', '../see-credits.php');
        }
    }
?>

</body>
</html>
