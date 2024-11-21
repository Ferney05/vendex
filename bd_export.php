<?php
    // Configuración de la base de datos
    $host = 'localhost';   
    $username = 'root';    
    $password = '';
    $database = 'vendex'; 

    // Ruta del archivo de respaldo
    $backup_file = 'C:\\xampp\\htdocs\\vendex\\backup\\' . $database . '_' . date('Y-m-d_H-i-s') . '.sql'; 

    // Comando mysqldump (asegúrate de que la ruta a mysqldump sea correcta)
    $command = "C:\\xampp\\mysql\\bin\\mysqldump.exe --user=$username --password=$password --host=$host $database > $backup_file";

    // Ejecutar el comando
    system($command, $output);
?>
