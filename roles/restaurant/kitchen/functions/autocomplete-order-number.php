<?php
    include('../../../../conexion.php');

    if (isset($_POST['query'])) {
        $search = mysqli_real_escape_string($conexion, $_POST['query']);

        $query = "SELECT order_number FROM pending_orders WHERE order_number LIKE '%$search%' LIMIT 5";
        $result = mysqli_query($conexion, $query);

        $productList = array(); // Array para almacenar los resultados

        // Verifica si se encontraron resultados
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productList[] = $row['order_number']; // Añade cada resultado al array
            }
        } else {
            $productList[] = "No se encontraron ordenes";
        }

        // Devuelve los resultados como JSON
        echo json_encode($productList);
    }
?>
