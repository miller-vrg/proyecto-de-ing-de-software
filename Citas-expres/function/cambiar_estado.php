<?php
session_start();
require_once "../databases/conexion_db.php";

// Verifica si se borraron las cukis
$tipo = $_SESSION['tipo'];
if ($tipo == null) {
    header("location: ../");
}

$data = $_GET["data"];
$id= $_GET["id"];

if($data == "ASISTIDA"){
    $sql = "UPDATE registros SET estado='ASISTIDA' WHERE id=$id;";
    if(mysqli_query($conexion, $sql)){
        echo "<script>
        alert('Preceso realizado con exito');
        location='../page/mostrar-datos-doctor.php'
        </script>";
    }
}
if($data == "NO_ASISTIDA"){
    $sql = "UPDATE registros SET estado='NO_ASISTIDA' WHERE id=$id;";
    if(mysqli_query($conexion, $sql)){
        echo "<script>
        alert('Preceso realizado con exito');
        location='../page/mostrar-datos-doctor.php'
        </script>";
    }
}