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


            <?php
                session_start(); // Asegúrate de iniciar la sesión
                if (isset($_SESSION['usuario'])) {
                    echo '<span>' . $_SESSION['usuario'] . '</span>';
                    echo '<img src="img/foto-de-perfil.jpg" alt="Foto de perfil" id="imgPerfil">';
                }
                else{
                    echo '<span>Invitado</span>';
                    echo '<img src="img/not-foto-de-perfil.jpg" alt="Foto de perfil" id="imgPerfil">';
                }
            ?>

            <div id="ciruja"></div>

        </div>

        <div id="contenido">

            <div id="calendario" class="contenido_mostrado"><h2>Calendario</h2></div>
            <div id="horarios" class="contenido_mostrado"><h2>Horarios</h2></div>
            <div id="biblioteca" class="contenido_mostrado"><h2>Biblioteca</h2></div>
            <div id="asistencia" class="contenido_mostrado">

                <div id="asistencia-titulos"> 
                    <h2>Asistencia</h2>

                </div>

                <div id="div-asistencia">

                    <span class="nombre-alumno">Maximiliano, Alcaraz</span><hr>

                    <table>
                        <thead>
                          <tr>
                            <th>Materia</th>
                            <th>Porcentaje de Asistencia</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>Prácticas Profesionalizantes I</td>
                            <td>100%</td>
                          </tr>
                          <tr>
                            <td>Inglés Técnico</td>
                            <td>100%</td>
                          </tr>
                          <tr>
                            <td>Gestión de Software</td>
                            <td>100%</td>
                          </tr>
                          <tr>
                            <td>Desarrollo de Sistemas</td>
                            <td>100%</td>
                          </tr>
                          <tr>
                            <td>Estretégias de Negocios</td>
                            <td>100%</td>
                          </tr>
                          <tr>
                            <td>Estadística I</td>
                            <td>100%</td>
                          </tr>
                          <tr>
                            <td>UDI II</td>
                            <td>100%</td>
                          </tr>
                          <tr>
                            <td>Innovación y Desarrollo Emprendedor</td>
                            <td>100%</td>
                          </tr>
                          <tr>
                            <td>Problemas Socio-Contemporáneos</td>
                            <td>100%</td>
                          </tr>
                        </tbody>
                      </table>

                </div>


            </div>
            <div id="notas" class="contenido_mostrado"><h2>Notas</h2></div>
            <div id="carpetas" class="contenido_mostrado"><h2>Carpetas</h2></div>
            <div id="resumenes" class="contenido_mostrado"><h2>Resúmenes</h2></div>
            <div id="configuracion" class="contenido_mostrado"><h2>Configuración</h2></div>
            <div id="bug" class="contenido_mostrado"><h2>Reportar bug</h2></div>

        </div>

        <script src="js/main.js"></script>
    </body>

</html>