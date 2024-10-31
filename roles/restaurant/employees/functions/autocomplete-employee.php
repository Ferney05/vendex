<?php
    include('../../../../conexion.php');

    if (isset($_POST['query'])) {
        $employee = mysqli_real_escape_string($conexion, $_POST['query']);

        $query = "SELECT name_employee FROM employees WHERE name_employee LIKE '%$employee%' LIMIT 5";
        $result = mysqli_query($conexion, $query);

        $productList = array(); // Array para almacenar los resultados

        // Verifica si se encontraron resultados
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $productList[] = $row['name_employee']; // Añade cada resultado al array
            }
        } else {
            $productList[] = "No se encontraron empleados";
        }

        // Devuelve los resultados como JSON
        echo json_encode($productList);
    }
?>
