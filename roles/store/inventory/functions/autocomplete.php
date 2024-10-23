<?php
    include('../../../../conexion.php'); // Conexión a la base de datos

    if (isset($_POST['query'])) {
        $search = mysqli_real_escape_string($conexion, $_POST['query']);

        // Consulta para buscar coincidencias con el término ingresado
        $query = "SELECT product_name FROM inventory_products WHERE product_name LIKE '%$search%' LIMIT 5";
        $result = mysqli_query($conexion, $query);

        $productList = array(); // Array para almacenar los resultados

        // Verifica si se encontraron resultados
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productList[] = $row['product_name']; // Añade cada resultado al array
            }
        } else {
            $productList[] = "No se encontraron productos";
        }

        // Devuelve los resultados como JSON
        echo json_encode($productList);
    }
?>
