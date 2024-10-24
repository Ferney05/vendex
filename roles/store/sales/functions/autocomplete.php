<?php
    include('../../../../conexion.php'); 

    if (isset($_POST['query'])) {
        $search = mysqli_real_escape_string($conexion, $_POST['query']);

        // Modificamos la consulta para incluir también el precio
        $query = "SELECT product_name, sale_price FROM inventory_products WHERE product_name LIKE '%$search%' LIMIT 5";
        $result = mysqli_query($conexion, $query);

        $productList = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                // Creamos un array con nombre y precio para cada producto
                $productList[] = array(
                    'label' => $row['product_name'],  // 'label' es lo que se mostrará en el autocompletado
                    'value' => $row['product_name'],  // 'value' es lo que se pondrá en el input
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