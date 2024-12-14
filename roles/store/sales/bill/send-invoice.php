<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carga automática de Composer
require '../../../../vendor/autoload.php';
include('../../../../conexion.php');

session_start();

// Verifica si el usuario está logueado
if (isset($_SESSION['user_id'])) {
    $id_user = $_SESSION['user_id'];

    // Carga las credenciales del archivo de configuración
    $config = include('../../../../app/public-html/config.php');
    $smtpEmail = $config['SMTP_EMAIL'];
    $smtpPassword = $config['SMTP_PASSWORD'];

    $query = "SELECT sd.client_email
            FROM sales AS s
            INNER JOIN sale_details AS sd ON s.id = sd.sale_id
            ORDER BY s.id DESC
            LIMIT 1";
    $result = mysqli_query($conexion, $query);

    if ($row = $result->fetch_assoc()) {
        // Verifica que el archivo existe antes de adjuntarlo
        $imgPath = 'C:/xampp/htdocs/vendex/roles/store/sales/bill/factura.png';
        if (!file_exists($imgPath)) {
            die('El archivo .PNG no existe.');
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
            $mail->setFrom($smtpEmail, 'Vendex Store'); // Remitente
            $mail->addAddress($row['client_email']); // Destinatario dinámico

            // Adjuntar la imagen como contenido embebido
            $mail->addEmbeddedImage($imgPath, 'factura');

            // Contenido del correo
            $mail->isHTML(true);
            $mail->Subject = 'Factura de tu compra en nuestra tienda';

            // HTML para mostrar solo la imagen en el correo
            $mail->Body = '
                <div style="margin: 0; padding: 0; text-align: center;">
                    <img src="cid:factura" alt="Factura" style="width: 100%; max-width: 800px; height: auto;">
                </div>
            ';

            $mail->AltBody = '';

            // Enviar el correo
            $mail->send();
        } catch (Exception $e) {
            echo "No se pudo enviar el correo. Error: {$mail->ErrorInfo}";
        }
    } else {
        echo 'No se encontraron datos del usuario.';
    }

} else {
    echo 'El usuario no está logueado.';
}
?>

    