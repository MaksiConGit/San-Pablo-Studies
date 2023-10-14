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
            <form action="" method="post">
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
                    <input class="controls" type="text" name="nombre_usuario" placeholder="Nombre de usuario">
                    <input class="controls" type="text" name="telefono" placeholder="Número de teléfono celular">
                    <input class="controls" type="text" name="dni" placeholder="DNI">
                    <input class="controls" type="password" name="contra" placeholder="Contraseña">
                    <input class="controls" type="password" name="rcontra" placeholder="Repetir contraseña">
                    <input class="botons" type="submit" name="enviar" value="Registrar">
                    <p><a href="login.php">¿Ya tengo Cuenta?</a></p>

                    <?php
                        $conexion = new mysqli("localhost", "root", "", "san-pablo-studies");
                        $sql = "SELECT id_alumno, nombre_usuario, telefono, dni, contra FROM cuentas";
                        $res=mysqli_query($conexion, $sql);

                        if(isset($_POST['enviar'])){
                            $alumno=trim($_POST['alumno']);
                            $usuario=trim($_POST['nombre_usuario']);
                            $telefono=trim($_POST['telefono']);
                            $dni=trim($_POST['dni']);
                            $contra=trim($_POST['contra']);

                            if (!empty($alumno) && !empty($usuario) && !empty($telefono) && !empty($dni) && !empty($contra)) {
                                $agregar="INSERT INTO cuentas(id_alumno, nombre_usuario, telefono, dni, contra) VALUES ('$alumno', '$usuario', '$telefono', '$dni', '$contra')";
                                $res = mysqli_query($conexion, $agregar);
                                echo "datos ingresados";
                                $conexion->close();  

                                if ($res) {
                                    // Operación exitosa
                                    header("Location: login.php");
                                    exit(); // Asegura que el script se detiene aquí
                                } else {
                                    // Error en la operación
                                    echo "Hubo un error al procesar el registro.";
                                }
                            }
                        }  
                    ?>
                </div>
            </form>
        </div>

        <script src="js/main.js"></script>
    </body>

</html>