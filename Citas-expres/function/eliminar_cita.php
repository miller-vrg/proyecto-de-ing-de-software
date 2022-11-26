<?php
session_start();
require_once "../databases/conexion_db.php";

// Verifica si se borraron las cukis
$tipo = $_SESSION['tipo'];
if ($tipo == null) {
    header("location: ../");
}

$id = $_REQUEST['id'];

    $sql = "delete from citas where id = $id;";
    if(mysqli_query($conexion, $sql)){
        echo "<script>
        alert('eliminación de cita exitosa');
        location='../page/home-usuario.php'
        </script>";
    }else {
        echo "<script>
            alert('Error al tratar de eliminar la cita');
            location='../page/home-usuario.php'
         </script>";
    }
