<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar empleados - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon-vendex.svg" type="image/x-icon">

    <?php
        include("../../../../conexion.php");
    ?>
</head>
<body>

    <?php
        if(isset($_POST['button-add-employee'])) {
            $name_employee = $_POST['name-employee'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $document_type = $_POST['document-type'];
            $document_number = $_POST['document-number'];
            $phone = $_POST['phone'];
            $employee_position = $_POST['employee-position'];
            $entry_date = $_POST['entry-date'];
            $type_contract = $_POST['type-contract'];
            $emergency_contact = $_POST['emergency-contact'];
            $emergency_phone = $_POST['emergency-phone'];

            $insertData = "INSERT INTO employees VALUES(null, '$name_employee', '$email', '$address', '$document_type', '$document_number', '$phone', '$employee_position', '$entry_date', '$type_contract', '$emergency_contact', '$emergency_phone')";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                header("Refresh: 3; url= add-employees.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Empleado agregado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>El empleado ha sido agregado exitosamente.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>