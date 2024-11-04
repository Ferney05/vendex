<?php
    include('../../../../conexion.php');

    if (isset($_POST['query'])) {
        $employee = mysqli_real_escape_string($conexion, $_POST['query']);

        $query = "SELECT name_employee, employee_position FROM employees WHERE name_employee LIKE '%$employee%' LIMIT 5";
        $result = mysqli_query($conexion, $query);

        $productList = array(); // Array para almacenar los resultados

        // Verifica si se encontraron resultados
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productList[] = array(
                    'label' => $row['name_employee'],
                    'value' => $row['name_employee'],
                    'post' => $row['employee_position']
                ); 
            }
        } else {
            $productList[] = array(
                'label' => "No existe el empleado",
                'value' => "",
                'post' => ""
            );
        }

        echo json_encode($productList);
    }
?>
