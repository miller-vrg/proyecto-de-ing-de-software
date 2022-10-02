<?php
session_start();
$tipo = $_SESSION['tipo'];

if($tipo == null){
    header("location: ../");
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
    <title>Home-user</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../css/style-home-usuario.css">
</head>
<body>
    <header>
        <nav >
            <ul>
                <li onclick="location='home-usuario.html'; ">Inicio</li>
                <li onclick="location='citas.html'">Calendario</li>
                <li onclick="location='registros.php'">Reporte</li>
                <li onclick="location='nosotros.html'">Nosotros</li>
                <li onclick="location='contactanos.html'">Contactanos</li>
                <li onclick="location='../'">Salir</li>
            </ul>
        </nav>
    </header>
    <section class="container">
        <form action="./edit.php" method="post" class="card-user tajeta-efect" >
            <img class="img-user" src="../icons/usuario.png" alt="PERFIL">
            <h3><?= $name ?></h3>
            <div class="datos">
                <p><b>Edad:</b> <br>22<?= $edad?></p>
                <p><b>Email:</b> <br>miller<?= $email?></p>
                <p><b>Telefono:</b> <br>3343<?= $telefono?></p>
                <p><b>Dirección:</b> <br>majshd<?= $direccion?></p>
            </div>
            <button class="btn-editar btn-efect" type="submit">Editar</button>
        </form>
            <form action="../function/datoMedico.php" method="post" class="tarjetero">
                
                <div class="flechas-guia">
                    <div class="flecha flecha1"></div>
                    <div class="flecha flecha2"></div>
                    <div class="flecha flecha3"></div>
                </div>
                <div class="tarjeta tajeta-efect">
                    <img src="../img/general.jpg" alt="Medico General">
                    <h5>Medico general</h5>
                    <p>El médico general tiene la responsabilidad de ofrecer una atención integral al paciente. Esto hace que tenga un total conocimiento del historial médico y clínico del paciente.</p>
                    <button class="btn-efect" type="submit" name="accion" value="General"><h5>Agendar</h5> <img src="../icons/fecha-derecha.svg" alt="=>"></button>
                </div>
                <div class="tarjeta tajeta-efect">
                    <img src="../img/ginecologo.jpg" alt="Ginecologo">
                    <h5>Ginecologia</h5>
                    <p>La finalidad de la revisión ginecológica es la prevención y detección precoz de alteraciones de los órganos reproductores.</p>
                    <button class="btn-efect" type="submit" name="accion" value="Ginecologia" ><h5>Agendar</h5><img src="../icons/fecha-derecha.svg" alt="=>"></button>
                </div>
                <div class="tarjeta tajeta-efect">
                    <img src="../img/pediatria.jpg" alt="Pediatria">
                    <h5>Pediatria</h5>
                    <p>Ofrecer consejos para evitar enfermedades y lesiones. Proporcionar cuidado anticipado y adecuado en caso de enfermedades graves para evitar que progresen.</p>
                    <button class="btn-efect" type="submit" name="accion" value="Pediatria" ><h5>Agendar</h5> <img src="../icons/fecha-derecha.svg" alt="=>"></button>
                </div>
                <div class="tarjeta tajeta-efect" >
                    <img src="../img/odontologia.jpg" alt="Odontologia">
                    <h5>Odontologia</h2>
                    <p>La odontologia es la mejor manera de que tus dientes y tu boca se mantengan sanos con el paso de los años, y de que además, evites enfermedades causadas por una mala higiene bucodental.</p>
                    <button class="btn-efect" type="submit" name="accion" value="odontologia" ><h5>Agendar</h5> <img src="../icons/fecha-derecha.svg" alt="=>"></button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>