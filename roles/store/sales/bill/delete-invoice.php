<?php
    $imagePath = 'factura.png'; // Ruta de la imagen en el servidor

    // Verificar si la imagen existe
    if (file_exists($imagePath)) {
        // Eliminar la imagen
        if (unlink($imagePath)) {
            echo "Imagen eliminada correctamente.";
        } else {
            echo "Error al eliminar la imagen.";
        }
    } else {
        echo "La imagen no existe.";
    }
?>
