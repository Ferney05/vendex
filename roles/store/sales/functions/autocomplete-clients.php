<?php
    include('../../../../conexion.php'); 

    if (isset($_POST['query'])) {
        $search = mysqli_real_escape_string($conexion, $_POST['query']);

        $query = "SELECT client, client_email, client_phone FROM sale_details WHERE client LIKE '%$search%' GROUP BY client LIMIT 5";
        $result = mysqli_query($conexion, $query);

        $productList = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productList[] = array(
                    'label' => $row['client'],  
                    'value' => $row['client'],  
                    'email' => $row['client_email'],
                    'phone' => $row['client_phone']  
                );
            }
        } else {
            $productList[] = array(
                'label' => "No se encontraron clientes",
                'value' => "",
                'email' => "",
                'price' => ""
            );
        }

        echo json_encode($productList);
    }
?>