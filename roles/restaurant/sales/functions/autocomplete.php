<?php
    include('../../../../conexion.php'); 

    if (isset($_POST['query'])) {
        $search = mysqli_real_escape_string($conexion, $_POST['query']);

        $query = "SELECT name_dish, sale_price FROM recipes WHERE name_dish LIKE '%$search%' LIMIT 5";
        $result = mysqli_query($conexion, $query);

        $productList = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productList[] = array(
                    'label' => $row['name_dish'],  // 'label' es lo que se mostrará en el autocompletado
                    'value' => $row['name_dish'],  // 'value' es lo que se pondrá en el input
                    'price' => $row['sale_price']          // precio para usar después
                );
            }
        } else {
            $productList[] = array(
                'label' => "No se encontraron productos",
                'value' => "",
                'price' => ""
            );
        }

        echo json_encode($productList);
    }
?>