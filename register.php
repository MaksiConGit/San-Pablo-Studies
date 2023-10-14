<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>San Pablo Studies</title>
        <link href="https://fonts.cdnfonts.com/css/roboto" type="text/css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="css/style.css">
    </head>
    <body>
        <header>
            <div id="barraSup">
                <img src="img/san-pablo-studies.png" alt="San Pablo Studies" id="imgSPS">
                <span>Invitado</span>
                <img src="img/not-foto-de-perfil.jpg" alt="Foto de perfil" id="imgPerfil">
                <div id="ciruja"></div>
            </div>
        </header>

        <div id="contenido">
            <div class="form-register">
                <h4>Regístrate</h4>
                <select class="controls" name="alumno">
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
                <input class="controls" type="text" name="nombres" id="nombres" placeholder="Número de teléfono celular">
                <input class="controls" type="text" name="dni" id="dni" placeholder="DNI">
                <input class="controls" type="password" name="correo" id="contraseña" placeholder="Contraseña">
                <input class="controls" type="password" name="correo" id="rcontraseña" placeholder="Repetir contraseña">
                <input class="botons" type="submit" value="Registrar">
                <p><a href="#">¿Ya tengo Cuenta?</a></p>
            </div>
        </div>

        <script src="js/main.js"></script>
    </body>

</html>