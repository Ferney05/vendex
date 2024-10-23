<?php
    include('../../../../conexion.php'); 

    if (isset($_POST['query'])) {
        $search = mysqli_real_escape_string($conexion, $_POST['query']);

        $query = "SELECT product_name FROM inventory_products WHERE product_name LIKE '%$search%' LIMIT 5";
        $result = mysqli_query($conexion, $query);

        $productList = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productList[] = array(
                    'name' => $row['product_name'],
                    'price' => $row['sale_price']
                ); 
            }
        } else {
            $productList[] = array('name' => "No se encontraron productos", 'price' => null);
        }

        echo json_encode($productList);
    }
?>
