<?php
    include('../../../../conexion.php');

    if (isset($_POST['query'])) {
        $search = mysqli_real_escape_string($conexion, $_POST['query']);

        $query = "SELECT name_ingredient, purchase_price, unit FROM ingredients WHERE name_ingredient LIKE '%$search%' LIMIT 5";
        $result = mysqli_query($conexion, $query);

        $productList = array(); // Array para almacenar los resultados

        // Verifica si se encontraron resultados
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productList[] = array(
                    'label' => $row['name_ingredient'],
                    'value' => $row['name_ingredient'],
                    'unity' => $row['unit'],
                    'price' => $row['purchase_price']
                );
            }
        } else {
            $productList[] = array(
                'label' => "No se encontraron insumos",
                'value' => "",
                'unit' => "",
                'price' => ""
            );
        }

        // Devuelve los resultados como JSON
        echo json_encode($productList);
    }
?>
