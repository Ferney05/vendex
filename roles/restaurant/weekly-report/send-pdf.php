<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    // Carga automática de Composer
    require '../../../vendor/autoload.php';
    include('../../../conexion.php');

    session_start();

    // Verifica si el usuario está logueado
    if (isset($_SESSION['user_id'])) {
        $id_user = $_SESSION['user_id']; 

        // Carga las credenciales del archivo de configuración
        $config = include('../../../app/public-html/config.php');
        $smtpEmail = $config['SMTP_EMAIL'];
        $smtpPassword = $config['SMTP_PASSWORD'];

        // Consulta parametrizada para evitar inyección SQL
        $query = $conexion->prepare("SELECT name, lastname, email FROM users WHERE id = ?");
        $query->bind_param('i', $id_user);
        $query->execute();
        $result = $query->get_result();

        if ($row = $result->fetch_assoc()) {
            // Verifica que el archivo existe antes de adjuntarlo
            $pdfPath = 'C:/xampp/htdocs/vendex/roles/restaurant/weekly-report/report.pdf';
            if (!file_exists($pdfPath)) {
                die('El archivo PDF no existe.');
            }

            // Configuración de PHPMailer
            $mail = new PHPMailer(true);

            try {
                // Configuración del servidor SMTP
                $mail->SMTPDebug = 0; // Cambia a 0 en producción
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $smtpEmail;
                $mail->Password = $smtpPassword;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->Port = 587;

                // Configuración del remitente y destinatario
                $mail->setFrom($smtpEmail, 'Vendex'); // Remitente
                $mail->addAddress($row['email'], $row['name'] . ' ' . $row['lastname']); // Destinatario dinámico

                // Adjuntar el PDF
                $mail->addAttachment($pdfPath);

                // Contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Reporte mensual de Vendex';

                $mail->Body = '
                    <p>Estimado/a <strong>' . htmlspecialchars($row['name'] . ' ' . $row['lastname']) . '</strong>,</p>
                    <p>Te enviamos adjunto el reporte mensual de tu restaurante, generado automáticamente por nuestra plataforma <strong>Vendex</strong>. Este informe proporciona un análisis detallado de tu desempeño durante el último mes, con el fin de ayudarte a tomar decisiones informadas.</p>
                    <p>Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en responder a este correo. Estamos aquí para apoyarte en todo momento.</p>
                    <p>Atentamente,<br><strong>Equipo Vendex</strong></p>
                ';

                $mail->AltBody = "Estimado/a " . htmlspecialchars($row['name'] . ' ' . $row['lastname']) . ",\n\nTe enviamos adjunto el reporte mensual de tu restaurante, generado automáticamente por nuestra plataforma Vendex. Este informe proporciona un análisis detallado de tu desempeño durante el último mes.\n\nSi tienes alguna duda o necesitas asistencia adicional, no dudes en responder a este correo. Estamos aquí para apoyarte.\n\nAtentamente,\nEquipo Vendex";

                // Enviar el correo
                $mail->send();
                echo 'El correo ha sido enviado con éxito.';
            } catch (Exception $e) {
                echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
            }
        } else {
            echo 'No se encontraron datos del usuario.';
        }

        // Cierra la consulta
        $query->close();
    } else {
        echo 'El usuario no está logueado.';
    }
?>
