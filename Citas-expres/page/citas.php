<?php
session_start();
require_once "../databases/conexion_db.php";

$tipo = $_SESSION['tipo'];

if ($tipo == null) {
    header("location: ../");
}

@$user = $_SESSION['user'];

$sql = "SELECT medicos.name, apellidos  , fecha_cita, tipo, id_citas  FROM citas,registros, medicos 
WHERE ( id_user = '$user' AND id_citas = citas.id and id_medico = medicos.`user`) 
 AND ( estado = 'Pendiente' OR estado = 'Asistida' );";
$row = mysqli_query($conexion, $sql);

@$data = "";
@$num = 0;
if (mysqli_num_rows($row) > 0) {
    $num = mysqli_num_rows($row);
    $data = mysqli_fetch_assoc($row);
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <title>Listado</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style-citas.css">
</head>

<body>
    <header>
        <nav>
            <ul>
                <li onclick="location='home-usuario.php'; ">Inicio</li>
                <li onclick="location='citas.php'">Calendario</li>
                <li onclick="location='registros.php'">Reporte</li>
                <li onclick="location='../'">Salir</li>
            </ul>
        </nav>
    </header>
    <div class="contenedor">
        <table class="t" BORDER CELLPADDING=10 CELLSPACING=0>

            <?php
            if (@$data != null) {
                echo <<<tt
                    <tr>
                    <th class="c n">N#</th>
                    <th class="c medico">Medico</th>
                    <th class="c fecha">Fecha</th>
                    <th class="c hora">Hora</th>
                    <th class="c tipo">Tipo</th>
                    <th class="c can"></th>
    
                <tr>  
tt;
                $cout = 1;
                while ($cout <= $num) {
                    @$fecha = date($data['fecha_cita']);
                    @$fecha  = strtotime($fecha);
                    @$dma = date("d-m-Y", $fecha);
                    @$hora = date("H:i:s", $fecha);

                    echo <<<tt1
                    <tr class="ttrr">
                        <th class="n">$cout</th>
                        <td>{$data['name']} {$data['apellidos']}</td>
                        <td>$dma</td>
                        <td>$hora</td>
                        <td>{$data['tipo']}</td>
                        <td class="btn">
                        <a href="../function/eliminar_cita.php?id={$data['id_citas']}" class="buton" type="submit">
                            <img src="../icons/cancelar.png" alt="X">
                        </a>
                        </td>
                    </tr>
tt1;
                    $cout += 1;
                }
            } else {

                echo "<th  style='width: 100%; text-align: center center; colspan='5';'><h1>No tienes un registro de citas</h1> </th>";
            }

            ?>
            <!-- <th style="background-color: blue;width: 100%; text-align: center center;" colspan="5" ></th> -->



        </table>
    </div>

</body>

</html>