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

            <div id="horarios" class="contenido_mostrado">
                <div id="horarios-titulos">
                    <h2>Horarios</h2>       
                    <h2>Análisis de Sistemas 2°do</h2>
                    <?php
                        $fecha_actual = date('d/m/Y');
                        echo "<h2>$fecha_actual</h2>";
                    ?>
                </div>
                <table id="dias-horarios">
                    <tr>
                        <th>Hora</th>
                        <th>Lunes</th>
                        <th>Martes</th>
                        <th>Miércoles</th>
                        <th>Jueves</th>
                        <th>Viernes</th>
                    </tr>
                    <tr>
                        <td>19:00</td>
                        <td>Prácticas Profesional. I</td>
                        <td>Desarrollo de Sistemas</td>
                        <td>Estadística I</td>
                        <td>Prácticas Profesional. I</td>
                        <td>Innovac. Y Des. Emp</td>
                    </tr>
                    <tr>
                        <td>19:40</td>
                        <td>Prácticas Profesional. I</td>
                        <td>Desarrollo de Sistemas</td>
                        <td>Estadística I</td>
                        <td>Prácticas Profesional. I</td>
                        <td>Innovac. Y Des. Emp</td>
                    </tr>
                    <tr>
                        <td>20:30</td>
                        <td>Inglés Técnico II</td>
                        <td>Desarrollo de Sistemas</td>
                        <td>Estadística I</td>
                        <td>UDI II</td>
                        <td>Innovac. Y Des. Emp</td>
                    </tr>
                    <tr>
                        <td>21:10</td>
                        <td>Inglés Técnico II</td>
                        <td>Estratégias de Negocios</td>
                        <td>Desarrollo de Sistemas</td>
                        <td>UDI II</td>
                        <td class="sin-clases"></td>
                    </tr>
                    <tr>
                        <td>22:00</td>
                        <td>Gestión de Software II</td>
                        <td>Estratégias de Negocios</td>
                        <td>Gestión de Software II</td>
                        <td class="sin-clases"></td>
                        <td class="sin-clases"></td>
                    </tr>
                    <tr>
                        <td>22:40</td>
                        <td>Gestión de Software II</td>
                        <td>Estratégias de Negocios</td>
                        <td>Gestión de Software II</td>
                        <td class="sin-clases"></td>
                        <td class="sin-clases"></td>
                    </tr>
                </table>
            </div>
            
            
            </div>
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