<?php
session_start();
require_once "../databases/conexion_db.php";

$tipo = $_SESSION['tipo'];

if ($tipo == null) {
    header("location: ../");
}

$id = $_REQUEST['id'];

$sql = "DELETE FROM registros WHERE id_citas=$id;";
if (mysqli_query($conexion, $sql)) {
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
} else {
    echo "<script>
        alert('Error al tratar de eliminar la cita');
        location='../page/home-usuario.php'
     </script>";
}
