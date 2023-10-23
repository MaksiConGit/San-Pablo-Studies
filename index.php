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

                        <h2>Este mes</h2>

                        <div id="lista-eventos">

                            <?php
                                $conexion= new mysqli("localhost", "root", "", "san-pablo-studies");
                                $sql = "SELECT id_parcial, id_materia, num_parcial, fecha FROM parciales";
                                $res=mysqli_query($conexion, $sql);



                                // Generar opciones para el menú desplegable
                                while ($fila_parciales = $res->fetch_assoc()) {

                                    echo "<div>
                                            <span class='fecha-evento'>" . $fila_parciales['fecha'] . "</span>
                                            <span class='nombre-evento'>Parcial " . $fila_parciales['id_parcial'] . " de " . $fila_parciales['id_materia'] . "</span>
                                        </div>";
                                    }

                                $conexion->close();
                            ?> 

                        </div>
                        
                    </div>

                </div>
                


            </div>
            <div id="horarios" class="contenido_mostrado"><h2>Horarios</h2></div>
            <div id="biblioteca" class="contenido_mostrado"><h2>Biblioteca</h2></div>
            <div id="asistencia" class="contenido_mostrado"><h2>Asistencia</h2></div>
            <div id="notas" class="contenido_mostrado"><h2>Notas</h2></div>
            <div id="carpetas" class="contenido_mostrado"><h2>Carpetas</h2></div>
            <div id="resumenes" class="contenido_mostrado"><h2>Resúmenes</h2></div>
            <div id="configuracion" class="contenido_mostrado"><h2>Configuración</h2></div>
            <div id="bug" class="contenido_mostrado"><h2>Reportar bug</h2></div>

        </div>

        <script src="js/main.js"></script>
    </body>

</html>