<?php
    include('../../../../conexion.php');

    if (isset($_POST['query'])) {
        $search = mysqli_real_escape_string($conexion, $_POST['query']);

        $query = "SELECT name_dish FROM recipes WHERE name_dish LIKE '%$search%' LIMIT 5";
        $result = mysqli_query($conexion, $query);

        $productList = array(); // Array para almacenar los resultados

        // Verifica si se encontraron resultados
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productList[] = $row['name_dish']; // Añade cada resultado al array
            }
        } else {
            $productList[] = "No se encontraron platillos";
        }

        // Devuelve los resultados como JSON
        echo json_encode($productList);
    }
?>
