<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asignando horario a empleados - Vendex</title>
    <link rel="stylesheet" href="../../../../css/success.css">
    <link rel="shortcut icon" href="../../../../svg/icon.png" type="image/x-icon">

    <?php
        include("../../../../conexion.php");
    ?>
</head>
<body>

    <?php
        if(isset($_POST['button-assign-schedule'])) {
            $name_employee = $_POST['name-employee'];
            $days_week = isset($_POST['days-week']) ? implode(", ", $_POST['days-week']) : '';
            $entry_time = $_POST['entry-time'];
            $start_break = $_POST['start-break'];
            $departure_time = $_POST['departure-time'];
            $end_break = $_POST['end-rest'];

            $insertData = "INSERT INTO schedule VALUES(null, '$name_employee', '$entry_time', '$departure_time', '$days_week', '$start_break', '$end_break')";
            $execute = mysqli_query($conexion, $insertData);

            if($execute){
                header("Refresh: 3; url= assign-schedule.php");

                echo "<div class='success'>
                        <div class='back'>
                            <div class='tlt-icon'>
                                <h2>Horario asignado</h2>
                                <svg xmlns='http://www.w3.org/2000/svg' width='40' height='40' viewBox='0 0 48 48'><path fill='#6bc04e' fill-rule='evenodd' stroke='#6bc04e' stroke-linecap='round' stroke-linejoin='round' stroke-width='4' d='m4 24l5-5l10 10L39 9l5 5l-25 25z' clip-rule='evenodd'/></svg>
                            </div>

                            <p class='info-text'>Se le ha asignado el horario al empleado exitosamente.</p>
                        </div>
                      </div>";
                    
                exit;
            }
        }
    ?>

</body>
</html>