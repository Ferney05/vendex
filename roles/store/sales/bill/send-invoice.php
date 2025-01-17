<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../../../../vendor/autoload.php';
include('../../../../conexion.php');

class InvoiceMailer {
    private $mailer;
    private $config;
    private $conexion;
    private $logger;

    public function __construct($config, $conexion) {
        $this->config = $config;
        $this->conexion = $conexion;
        $this->initializeMailer();
    }

    private function initializeMailer() {
        try {
            $this->mailer = new PHPMailer(true);
            $this->mailer->SMTPDebug = 0;
            $this->mailer->isSMTP();
            $this->mailer->Host = 'smtp.gmail.com';
            $this->mailer->SMTPAuth = true;
            $this->mailer->Username = $this->config['SMTP_EMAIL'];
            $this->mailer->Password = $this->config['SMTP_PASSWORD'];
            $this->mailer->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $this->mailer->Port = 587;
            $this->mailer->setFrom($this->config['SMTP_EMAIL'], 'Vendex Store');
            $this->mailer->isHTML(true);
        } catch (Exception $e) {
            error_log("Error inicializando mailer: " . $e->getMessage());
            throw $e;
        }
    }

    private function getClientEmail() {
        $query = "SELECT sd.client_email
                FROM sales AS s
                INNER JOIN sale_details AS sd ON s.id = sd.sale_id
                ORDER BY s.id DESC
                LIMIT 1";
        $result = mysqli_query($this->conexion, $query);
        
        if (!$result) {
            throw new Exception("Error en la consulta de base de datos");
        }
        
        $row = $result->fetch_assoc();
        if (!$row || !isset($row['client_email'])) {
            throw new Exception("No se encontró el email del cliente");
        }
        
        return $row['client_email'];
    }

    public function sendInvoice($invoicePath) {
        try {
            // Obtener email del cliente
            $clientEmail = $this->getClientEmail();
            
            // Verificar existencia del archivo
            if (!file_exists($invoicePath)) {
                throw new Exception('El archivo de factura no existe');
            }

            // Configurar destinatario
            $this->mailer->addAddress($clientEmail);

            // Adjuntar la imagen
            $this->mailer->addEmbeddedImage($invoicePath, 'factura');

            // Configurar el contenido del correo
            $this->mailer->Subject = 'Factura de tu compra en nuestra tienda';
            $this->mailer->Body = '
                <div style="margin: 0; padding: 0; text-align: center;">
                    <img src="cid:factura" alt="Factura" style="width: 100%; max-width: 800px; height: auto;">
                </div>
            ';
            $this->mailer->AltBody = 'Se adjunta tu factura de compra.';

            // Enviar el correo
            $this->mailer->send();
            error_log("Factura enviada exitosamente a: " . $clientEmail);
            return true;

        } catch (Exception $e) {
            error_log("Error enviando factura: " . $e->getMessage());
            throw $e;
        }
    }
}

// Inicialización y ejecución
try {
    session_start();

    if (!isset($_SESSION['user_id'])) {
        throw new Exception('El usuario no está logueado.');
    }

    $config = include('../../../../app/public-html/config.php');
    $invoiceMailer = new InvoiceMailer($config, $conexion);
    
    // Usar una constante o configuración para la ruta base
    $invoicePath = dirname(__FILE__) . '/factura.png';
    
    if ($invoiceMailer->sendInvoice($invoicePath)) {
        http_response_code(200);
        echo json_encode(['success' => true, 'message' => 'Factura enviada correctamente']);
    }

} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error al enviar la factura: ' . $e->getMessage()
    ]);
}
?>

    