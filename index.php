<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>San Pablo Studies</title>
        <link href="https://fonts.cdnfonts.com/css/roboto" rel="stylesheet">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
            <div id="barraSup">

                <img src="img/san-pablo-studies.png" alt="San Pablo Studies" id="imgSPS">
                <span>Usuario</span>
                <img src="img/foto-de-perfil.jpg" alt="Foto de perfil" id="imgPerfil">
                <div id="ciruja"></div>
    
            </div>

        </header>


        <div id="contenido">
            
            <!-- <h2>Registrarse</h2>
            <form action="" method="post">

                <br>
                <h2>Alumno</h2>
                <select id="nombres" name="nombre_seleccionado">
                    <option value="" disabled selected hidden>Selecciona un nombre</option>
                    <?php

                    $conexion= new mysqli("localhost", "root", "", "san-pablo-studies");

                    $sql = "SELECT id_alumno, nombres, apellidos FROM alumnos";

                    $res=mysqli_query($conexion, $sql);

                    // Generar opciones para el menú desplegable
                    while ($fila = $res->fetch_assoc()) {
                        echo "<option value='{$fila['id_alumno']}'>{$fila['nombres']} {$fila['apellidos']}</option>";
                    }

                    // Cerrar la conexión a la base de datos
                    $conexion->close();

                    ?>
                </select>
                <br><br>
                <p>Nombre de usuario</p>
                <input type="text" name="" maxlength="30" placeholder="Pepito">
                <br><br>
                <p>Email</p>
                <input type="text" name="" maxlength="30" placeholder="email@example.com">
                <br><br>
                <p>Contraseña</p>
                <input type="text" name="" maxlength="30" placeholder="********">
                <br><br>
                <input type="submit" name="enviar">

            </form> -->
            <section class="form-register">
                <h4>Formulario Registro</h4>
                <input class="controls" type="text" name="nombres" id="nombres" placeholder="Ingrese su Nombre">
                <input class="controls" type="text" name="apellidos" id="apellidos" placeholder="Ingrese su Apellido">
                <input class="controls" type="email" name="correo" id="correo" placeholder="Ingrese su Correo">
                <input class="controls" type="password" name="correo" id="correo" placeholder="Ingrese su Contraseña">
                <p>Estoy de acuerdo con <a href="#">Terminos y Condiciones</a></p>
                <input class="botons" type="submit" value="Registrar">
                <p><a href="#">¿Ya tengo Cuenta?</a></p>
            </section>
        </div>



        <script src="js/main.js"></script>
    </body>

</html>