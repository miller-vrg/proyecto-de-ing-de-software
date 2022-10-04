<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrar Usuario</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300;500;700&display=swap" rel="stylesheet"> 
<link rel="stylesheet" href="../css/style-registrar-usuario.css">
<script src="../js/function.js" defer="defer"></script>
</head>
<body>
    <section class="box">
        <h1><i>Citas expres</i></h1>
        <img class="latido" src="../icons/latidos.png" alt="latidos">
    </section>
    <main>
        <form action="/ABP_requeriminto/controllers/registroController.php">
            <section class="container">
                    <img src="../img/login.png" alt="enfermera">
                    <div class="container__form">
                            <div class="container__form___row">
                                <p class="p1">Nombre: <r>*</r></p>
                                <input name="name" class="campos" type="text" required>
                            </div>
                            
                            <div class="container__form___row">
                                <p class="p1">Apellidos: <r>*</r></p>
                                <input name="apellidos" class="campos" type="text"  required>
                            </div>
                                                    
                            <div class="container__form___row">
                                <p class="p1">Edad: <r>*</r></p>
                                <input name="edad" min="1" class="campos" type="number"  required>
                            </div>
                            
                            <div class="container__form___row">
                                <p class="p1">Telefono: <r>*</r></p>
                                <input name="telefono" min="30000000" max="3499999999" class="campos" type="number"  required>
                            </div>
                            
                            <div class="container__form___row">
                                <p class="p1">Cedula: <r>*</r></p>
                                <input name="cc" class="campos" type="number" min="800000" max="9999999999" required>
                            </div>
                                                    
                            <div class="container__form___row">
                                <p class="p1">Email: <r>*</r></p>
                                <input id="email" class="campos" name="email" type="email"  required>
                            </div>
    
                            <div class="container__form___row">
                                <p class="p1">Direccion: <r>*</r></p>
                                <input name="direccion" class="campos" type="text" required>
                            </div>
    
                            <div class="container__form___row">
                                <p class="p1">Usuario: <r>*</r></p>
                                <input name="user" class="campos" type="text" minlength="5" maxlength="10"  required>
                            </div>
    
                            <div class="container__form___row">
                                <p class="p1">Contraseña: <r>*</r></p>
                                <input name="password" class="campos"  name="password" type="password" placeholder="*****" minlength="8" maxlength="16" required>
                            </div>
                            <div class="container__form___boton">
                                <button type="submit" class="boton__registrarse" >Registrarse</button>
                            </div>
                        <a href="../index.php">Ya tengo cuenta</a>
                    </div>
            </section>
        </form>
    </main>
</body>
</html>