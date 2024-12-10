<?php
    // Ejecutar screenshot.js
    echo "Ejecutando screenshot.js...\n";
    $nodeOutput = shell_exec('node C:/xampp/htdocs/vendex/roles/store/sales/bill/screenshot.js');  // Asegúrate de tener Node.js instalado
    echo $nodeOutput;  // Muestra la salida de screenshot.js

?>
