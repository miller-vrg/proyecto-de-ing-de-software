<?php
session_start();
$tipo = $_SESSION['tipo'];

if($tipo == null){
    header("location: ../");
}

if ( $tipo == "usuarios"){
    $ruta = "../controllers/usuarioControllers.php";
 }else{ 
    $ruta = "../controllers/medicosControllers.php";
 }
 
$name = $_SESSION['name'];
$edad = $_SESSION['edad'];
$email = $_SESSION['email'];
$telefono = $_SESSION['telefono'];
$direccion = $_SESSION['direccion'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.::Edit user::.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/style-edit.css">
    <script src="../js/function.js" defer="defer"></script>
</head>
<body>
    <header>
        <nav >
            <ul>
                <li onclick="location='home-usuario.php'; ">Inicio</li>
                <li onclick="location='citas.html'">Calendario</li>
                <li onclick="location='registros.php'">Reporte</li>
                <li onclick="location='nosotros.html'">Nosotros</li>
                <li onclick="location='contactanos.html'">Contactanos</li>
                <li onclick="location='../'">Salir</li>
            </ul>
        </nav>
    </header>
    <main>
        <form action="<?= $ruta ?>"  class="main__card" >
            <img class="user" src="../icons/usuario.png" alt="PERFIL">
            <p id="main__card___title"><?= $name?></p>
            <div class="card__datos">
                <p id="datos__subtitle">Telefono:</p>
                <input class="datos__campos" name="telefono" min="30000000" max="3499999999" type="number" value="<?=$telefono?>" required>
                <p id="datos__subtitle">Email: </p>
                <input class="datos__campos" id="email" name="email" type="text" value="<?=$email?>" required>
                <p id="subtitle">Dirección: </p>
                <input class="datos__campos" name="direccion" type="text" value="<?=$direccion?>" required>
            </div>
            <button class="card__boton" id="editar" type="submit">Guadar</button>
    </form>
    </main>
</body>
</html>