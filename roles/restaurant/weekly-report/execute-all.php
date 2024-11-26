<?php
    // Ejecutar screenshot.js
    echo "Ejecutando screenshot.js...\n";
    $nodeOutput = shell_exec('node C:/xampp/htdocs/vendex/roles/restaurant/weekly-report/screenshot.js');  // Asegúrate de tener Node.js instalado
    echo $nodeOutput;  // Muestra la salida de screenshot.js

    // Ejecutar pdf.php
    echo "Ejecutando pdf.php...\n";
    include('C:/xampp/htdocs/vendex/roles/restaurant/weekly-report/pdf.php');  // Esto incluye y ejecuta el archivo pdf.php

    // Ejecutar send-pdf.php
    echo "Ejecutando send-pdf.php...\n";
    include('C:/xampp/htdocs/vendex/roles/restaurant/weekly-report/send-pdf.php');  // Esto incluye y ejecuta el archivo send-pdf.php

    echo "\n\nTodos los scripts se han ejecutado correctamente.";
?>
