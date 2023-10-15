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
                    <h4>Inicia Sesión</h4>
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
                    <input class="controls" type="password" name="contra" placeholder="Contraseña">
                    <input class="botons" type="submit" name="enviar" value="Iniciar sesión">
                    <p><a href="register.php">¿No tienes una cuenta? Regístrate</a></p>

                    <?php

                        if(isset($_POST['enviar'])){
                            $alumno=trim($_POST['alumno']);
                            $contra=trim($_POST['contra']);

                            if (!empty($contra)){
                                $conexion= new mysqli("localhost", "root", "", "san-pablo-studies");

                                $comparar_contrasena = "SELECT contra FROM cuentas WHERE id_alumno = '$alumno'";
    
                                $resultado_contrasena = mysqli_query($conexion, $comparar_contrasena);
    
                                if (mysqli_num_rows($resultado_contrasena) == 1) {
                                    $fila_contrasena = mysqli_fetch_assoc($resultado_contrasena);
                                    $contrasena_bd = $fila_contrasena['contra'];
                                
                                    // Comparar la contraseña ingresada con la contraseña de la base de datos
                                    if ($contra == $contrasena_bd){
                                        // Las contraseñas coinciden, el usuario puede iniciar sesión
                                        echo "Contraseña correcta.";
                                        header("Location: index.html");
                                        exit();
                                    }
                                    else {
                                        // Las contraseñas no coinciden, mostrar un mensaje de error
                                        echo "Contraseña incorrecta.";
                                    }
                                }
                                else {
                                    // No se encontró la contraseña en la base de datos, muestra un mensaje de error
                                    echo "Contraseña incorrecta.";
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