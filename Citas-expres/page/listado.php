<?php
session_start();
require_once "../databases/conexion_db.php";


$tipo = $_SESSION['tipo'];

if ($tipo == null) {
    header("location: ../");
}

@$ex = $_SESSION['especializacion'];
@$user = $_SESSION['user'];

$sql = "SELECT tipo,estado FROM citas,registros
WHERE ( tipo = '" . $ex . "' AND id_user = '" . $user . "' AND id_citas = citas.id) 
 AND ( estado = 'Pendiente' OR estado = 'Asistida' );";
$row = mysqli_query($conexion, $sql);

if (mysqli_num_rows($row) > 0) {
    echo "<script>
            alert('Usted ya tiene una cita asignada');
            location='../page/home-usuario.php';
         </script>";
} else {
    $sql = "SELECT * FROM medicos
    WHERE lower(especializacion)  like '%$ex%';";
    $row = mysqli_query($conexion, $sql);

    @$data = "";

    if (mysqli_num_rows($row) > 0) {
        $data = mysqli_fetch_assoc($row);
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Listado</title>
    <meta charset="UFT-8">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style-listado.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li onclick="location='home-usuario.php'; ">Inicio</li>
                <li onclick="location='citas.php'">Calendario</li>
                <li onclick="location='registros.php'">Reporte</li>
                <li onclick="location='nosotros.html'">Nosotros</li>
                <li onclick="location='contactanos.html'">Contactanos</li>
                <li onclick="location='../'">Salir</li>
            </ul>
        </nav>
    </header>

    <form class="contenedor">
        <table class="t" BORDER CELLPADDING=10 CELLSPACING=0>

            <?php

            if (@$data != null) {
                date_default_timezone_set("America/Bogota");
                @$fecha = date("d-m-Y");
                @$fecha_au  = date("d-m-Y");
                @$hora = date("5:40:0");
                @$auxi = strtotime($hora);

                @$hora_actual = date("H:i:s");
                @$auxi2 =  strtotime($hora_actual);
                $auxi2 = @strtotime("+2 hour", $auxi2);


                @$final = date("17:40:00");
                if ($auxi2 >= @strtotime($final) && !isset($_REQUEST["au"])) {
                    echo "<th style='width: 100%; text-align: center center; colspan='5'><H1> A esta hora usted ya no tiene citas disponibles para hoy </H1></th>";
                } else {
                    echo <<<tt
                    <tr>
                    <th class="c">N#</th>
                    <th class="c">Medico</th>
                    <th class="c">Fecha</th>
                    <th class="c">Hora</th>
                    <th class="c b"></th>
                    </tr>
tt;
                }

                if (isset($_REQUEST["au"])) {
                    $indice = $_REQUEST["au"] + 0;
                    $mod_date = @strtotime($fecha . "+ $indice days");
                    $fecha_au = @date("d-m-Y", $mod_date);
                    $fecha = $fecha_au;
                    $fecha_au = date("d-m-Y");
                }

                for ($i = 1; $i <= 36; $i++) {

                    @$auxi = strtotime('+20 minute', $auxi);
                    $hora = @date('H:i:s', $auxi);

                    $print = <<<pp
                    <tr>
                        <td class="n">{$i}</td>
                        <td>{$data["name"]} {$data["apellidos"]}</td>
                        <td>{$fecha}</td>
                        <td>{$hora}</td>
                        <td class="btn">
                        <a href="../function/registrar_cita.php?fh={$fecha} {$hora}&u={$data["user"]}" class="buton" type="submit" >
                        <img src="../icons/agregar.png" alt="+">
                        </a>
                        </td>
                    </tr>
pp;
                    if ($auxi  > $auxi2) {
                        echo $print;
                    }

                    if (strtotime($fecha) > strtotime($fecha_au)) {
                        echo $print;
                    }
                }
            } else {

                echo "<th style='width: 100%; text-align: center center; colspan='5'><h1>No hay medico disponible para " . $_SESSION['especializacion'] . "</h1> </th>";
            }
            ?>
        </table>
    </form>
    <div class="dias">
        <p><b>Dias: </b></p>
        <?php
        if (@$data != null) {

            for ($p = 1; $p <= 30; $p++) {

                $aux3 = strtotime($fecha_au . "+ $p days");
                $aux3 = date('d', $aux3);
                echo <<<oo
                <a href="listado.php?au=$p"><button class="chid"><p>$aux3</p></button></a>
oo;
            }
        } else {
            echo "<a href='home-usuario.php'><input class='retroceso' type='button' value='Atras'></a>";
        }
        ?>
    </div>
</body>

</html>