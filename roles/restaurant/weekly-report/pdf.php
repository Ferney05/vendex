<?php

    require_once('../../../vendor/tecnickcom/tcpdf/tcpdf.php');

    $pdf = new TCPDF();
    $pdf->AddPage();

    // Colocar un fondo de color solo en la primera página
    $pdf->SetFillColor(22, 25, 34); // color RGB de fondo
    $pdf->Rect(0, 0, 210, 297, 'F'); // Tamaño A4

    // Agregar la imagen capturada
    $pdf->Image('report.png', 15, 40, 180, 0, 'PNG');

    // Salida del PDF
    $pdf->Output('C:/xampp/htdocs/vendex/roles/restaurant/weekly-report/report.pdf', 'F'); // Guardar en archivo

?>