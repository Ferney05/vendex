<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizando horario a empleados - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon-vendex.svg" type="image/x-icon">

    <?php
        include("../../../../conexion.php");

        if(isset($_GET['id'])) {
            $id_schedule = $_GET['id'];
        }
    ?>
</head>
<body>

    <?php
        if(isset($_POST['button-update-schedule'])) {
            $name_employee = $_POST['name-employee'];
            $days_week = isset($_POST['days-week']) ? implode(", ", $_POST['days-week']) : '';
            $entry_time = $_POST['entry-time'];
            $start_break = $_POST['start-break'];
            $departure_time = $_POST['departure-time'];
            $end_break = $_POST['end-rest'];

            $updateData = "UPDATE schedule SET name_employee = '$name_employee', entry_time = '$entry_time', departure_time = '$departure_time', days_week = '$days_week', start_break = '$start_break', end_break = '$end_break' WHERE id = $id_schedule";
            $execute = mysqli_query($conexion, $updateData);

            if($execute){
                header("Refresh: 3; url= ../horary.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Horario actualizado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Se ha actualizado el horario exitosamente.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>