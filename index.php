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
        
        <div id="menu">

            <div id="opciones1">

                <div class="opciones_laterales">
                    <img src="img/calendario.png" alt="">
                    <a>Calendario</a>
                </div>

                <div class="opciones_laterales">
                    <img src="img/horarios.png" alt="">
                    <a">Horarios</a>
                </div>

            
                <div class="opciones_laterales">
                    <img src="img/biblioteca.png" alt="">
                    <a>Biblioteca</a>
                </div>

            
                <div class="opciones_laterales">
                    <img src="img/asistencia.png" alt="">
                    <a>Asistencia</a>
                </div>

            
                <div class="opciones_laterales">
                    <img src="img/notas.png" alt="">
                    <a>Notas</a>
                </div>

            
                <div class="opciones_laterales">
                    <img src="img/carpetas.png" alt="">
                    <a>Carpetas</a>
                </div>

            
                <div class="opciones_laterales">
                    <img src="img/resumenes.png" alt="">
                    <a>Resúmenes</a>
                </div>

            </div>

            <div id="opciones2">

                <div class="opciones_laterales">        
                    <img src="img/ajustes.png" alt="Opción 4">
                    <a>Configuración</a>
                </div>
            
                <div class="opciones_laterales">
                    <img src="img/bug.png" alt="Opción 5">
                    <a>Reportar error</a>
                </div>

            </div>

        </div>

        <div id="barraSup">

            <img src="img/san-pablo-studies.png" alt="San Pablo Studies" id="imgSPS">
            <span>Usuario</span>
            <img src="img/foto-de-perfil.jpg" alt="Foto de perfil" id="imgPerfil">
            <div id="ciruja"></div>

        </div>

        <div id="contenido">

            <div id="calendario" class="contenido_mostrado"><h2>Calendario</h2></div>
            <div id="horarios" class="contenido_mostrado"><h2>Horarios</h2></div>
            <div id="biblioteca" class="contenido_mostrado"><h2>Biblioteca</h2></div>
            <div id="asistencia" class="contenido_mostrado"><h2>Asistencia</h2></div>
            <div id="notas" class="contenido_mostrado"><h2>Notas</h2></div>
            <div id="carpetas" class="contenido_mostrado"><h2>Carpetas</h2></div>
            <div id="resumenes" class="contenido_mostrado">
                
                <div id="resumenes-titulos"> 
                    <h2>Resúmenes</h2>
                </div>

                <div id="pdfs-biblioteca">

                    <?php

                        $conexion= new mysqli("localhost", "root", "", "san-pablo-studies");
                        $sql_alumno = "SELECT id_alumno FROM resumenes";
                        $res_alumno=mysqli_query($conexion, $sql_alumno);

                        $lastAlumnoId = null;

                        while ($fila_alumno = $res_alumno->fetch_assoc()) {
                            $id_alumno = $fila_alumno['id_alumno'];

                            if ($id_alumno !== $lastAlumnoId) {
                                
                                $sql_nombres_alumnos = "SELECT nombres, apellidos FROM alumnos WHERE id_alumno = $id_alumno";
                                $res_nombres_alumnos=mysqli_query($conexion, $sql_nombres_alumnos);

                                while ($fila_nombres_alumnos = $res_nombres_alumnos->fetch_assoc()) {
                                    $nombres_alumnos = $fila_nombres_alumnos['nombres'];
                                    $apellidos_alumnos = $fila_nombres_alumnos['apellidos'];

                                    echo "<span class='nombre-materia'>$nombres_alumnos, $apellidos_alumnos</span><hr>
                                    <div class='div-materia'>";
            
                                    $sql_parcial = "SELECT id_parcial FROM resumenes WHERE id_alumno = $id_alumno";
                                    $res_parcial=mysqli_query($conexion, $sql_parcial);
            
                                    while ($fila_parcial = $res_parcial->fetch_assoc()) {
            
                                        $id_parcial = $fila_parcial['id_parcial'];
                                        $sql_id_materia = "SELECT id_materia FROM parciales WHERE id_parcial = $id_parcial";
                                        $res_id_materia=mysqli_query($conexion, $sql_id_materia);
            
                                        while ($fila_id_materia = $res_id_materia->fetch_assoc()) {
                                            $id_materia = $fila_id_materia['id_materia']; 
                                            $sql_nombre_materia = "SELECT nombre_materia FROM materias WHERE ID_materia = $id_materia";
                                            $res_nombre_materia=mysqli_query($conexion, $sql_nombre_materia);
            
                                            while ($fila_nombre_materia = $res_nombre_materia->fetch_assoc()) {
                                                $nombre_materia = $fila_nombre_materia['nombre_materia']; 
                                                echo "<div class='archivo'>
                                                        <div class='rect-img'>
                                                            <div class='div-rectangulo'><h2>Parcial $id_parcial</h2></div>
                                                        </div>
                                                        <div class='nombre-archivo'>$nombre_materia</div>
                                                    </div>";

                                                $lastAlumnoId = $id_alumno;
                                            }
                                        }
                                    }

                                    echo "</div>";

                                }

                            }

                            
                        }
                        
                        $conexion->close();
                    ?> 

                </div>

            </div>
            <div id="configuracion" class="contenido_mostrado"><h2>Configuración</h2></div>
            <div id="bug" class="contenido_mostrado"><h2>Reportar bug</h2></div>

        </div>

        <script src="js/main.js"></script>
    </body>

</html>