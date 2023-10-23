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

            <div id="calendario" class="contenido_mostrado">

                <div id="calendario-titulos"> 
                    <h2>Calendario</h2>
                </div>

                <div id="div-calendario">

                    <div id="opciones_parciales">

                        <div id="calendar">
                            <div class="buttons">
                                <div id="botones-mes">
                                    <button class="cambiar-mes" id="previousMonth"><img src="img/flecha-izquierda.png" alt="" class="flechas"></button>
                                    <h2 id="month-year">Mes Año</h2>
                                    <button class="cambiar-mes" id="nextMonth"><img src="img/flecha-derecha.png" alt="" class="flechas"></button>
                                </div>
                            </div>
                            <table>
                                <thead>
                                    <tr>
                                        <th>Dom</th>
                                        <th>Lun</th>
                                        <th>Mar</th>
                                        <th>Mié</th>
                                        <th>Jue</th>
                                        <th>Vie</th>
                                        <th>Sáb</th>
                                    </tr>
                                </thead>
                                <tbody id="calendar-body">
                                    <!-- Aquí se generará el calendario -->
                                </tbody>
                            </table>
                        </div>

                        <div>

                            <h2>Fecha de parciales</h2>

                            <div id="lista-parciales-cal">

                                <?php
                                    $conexion = new mysqli("localhost", "root", "", "san-pablo-studies");
                                    $sql_parciales = "SELECT id_parcial, id_materia, num_parcial, fecha FROM parciales ORDER BY fecha";
                                    $res_parciales = mysqli_query($conexion, $sql_parciales);

                                    // Obtener la fecha actual en formato YYYY-MM-DD
                                    $fecha_actual = date('Y-m-d');

                                    while ($fila_parciales = $res_parciales->fetch_assoc()) {
                                        $fecha_parciales = $fila_parciales['fecha'];
                                        $num_parcial = $fila_parciales['num_parcial'];
                                        $id_materia = $fila_parciales['id_materia'];

                                        $sql_materia = "SELECT nombre_materia FROM materias WHERE id_materia = $id_materia";
                                        $res_materia = mysqli_query($conexion, $sql_materia);

                                        while ($fila_materia = $res_materia->fetch_assoc()) {
                                            $nombre_materia = $fila_materia['nombre_materia'];

                                            // Reformatea la fecha al formato DD/MM
                                            $fecha_formateada = date('d/m', strtotime($fecha_parciales));

                                            // Compara las fechas usando un if
                                            if (strtotime($fecha_parciales) < strtotime($fecha_actual)) {
                                                $clase_adicional = 'parcial-pasado';
                                            } else {
                                                $clase_adicional = '';
                                            }

                                            echo "<div class='parcial'>
                                                    <span class='fecha-parcial-cal $clase_adicional' data-fecha='$fecha_parciales'>$fecha_formateada</span>
                                                    <span class='nombre-materia-cal $clase_adicional'>Parcial $num_parcial de $nombre_materia</span>
                                                </div>";
                                        }
                                    }

                                    $conexion->close();

                                ?>


                            </div>
                            
                        </div>

                    </div>

                    <?php
                        $conexion = new mysqli("localhost", "root", "", "san-pablo-studies");
                        $sql_parciales = "SELECT id_parcial, id_materia, num_parcial, fecha FROM parciales ORDER BY fecha";
                        $res_parciales = mysqli_query($conexion, $sql_parciales);

                        while ($fila_parciales = $res_parciales->fetch_assoc()) {
                            $fecha_parciales = $fila_parciales['fecha'];
                            $fecha_formateada = date('d/m', strtotime($fecha_parciales));
                            $num_parcial = $fila_parciales['num_parcial'];
                            $id_materia = $fila_parciales['id_materia'];
                            $id_parcial = $fila_parciales['id_parcial'];

                            $sql_materia = "SELECT nombre_materia FROM materias WHERE id_materia = $id_materia";
                            $res_materia = mysqli_query($conexion, $sql_materia);

                            while ($fila_materia = $res_materia->fetch_assoc()) {
                                $nombre_materia = $fila_materia['nombre_materia'];

                                $sql_temario = "SELECT descripcion, notas FROM temarios WHERE id_parcial = $id_parcial";
                                $res_temario = mysqli_query($conexion, $sql_temario);
    
                                while ($fila_temario = $res_temario->fetch_assoc()) {
                                    $descripcion = $fila_temario['descripcion'];
                                    $notas = $fila_temario['notas'];
    
                                    echo "<div class='contenido_parciales'>
                                            <div>
                                                <div id='h2-boton'>
                                                    <h2>Parcial $num_parcial de $nombre_materia ($fecha_formateada)</h2>
                                                    <button class='volver_calendario'>Volver a Carpetas</button>
                                                </div>
                                                <div id='descripcion_temario'>$descripcion</div>
                                                <h2>Anotaciones</h2>
                                                <div id='notaciones_temario'>$notas</div>
                                            </div>
                                        </div>";
                                }
                            }

                        }

                        $conexion->close();

                    ?>
                
                </div>

            </div>

        </div>

        <script src="js/main.js"></script>
    </body>

</html>