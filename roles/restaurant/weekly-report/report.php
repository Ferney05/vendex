<?php
// Incluir la librería
require_once __DIR__ . '/../../../vendor/autoload.php';

use Dompdf\Dompdf;
use Dompdf\Options;

// Opciones de configuración
$options = new Options();
$options->set('isHtml5ParserEnabled', true);
$options->set('isRemoteEnabled', true); // Permite usar imágenes remotas

// Crear una instancia de Dompdf
$dompdf = new Dompdf($options);

// Escribir el contenido HTML
$html = '
    <h1>Reporte Semanal</h1>
    <p>Este es el reporte semanal generado automáticamente.</p>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Producto</th>
                <th>Cantidad Vendida</th>
                <th>Precio Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Pizza</td>
                <td>20</td>
                <td>$300</td>
            </tr>
            <tr>
                <td>Pasta</td>
                <td>15</td>
                <td>$225</td>
            </tr>
        </tbody>
    </table>
';

// Cargar contenido HTML
$dompdf->loadHtml($html);

// (Opcional) Configurar tamaño y orientación del papel
$dompdf->setPaper('A4', 'portrait'); // Tamaño A4, orientación vertical

// Renderizar el HTML como PDF
$dompdf->render();

// Salida del PDF al navegador
$dompdf->stream("reporte_semanal.pdf", ["Attachment" => false]); // Cambia a true para descargar