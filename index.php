<?php

    session_start(); // Asegúrate de iniciar la sesión

?>

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
                       
            <div id="biblioteca" class="contenido_mostrado">

                <div id="biblioteca-titulos"> 
                    <h2>Biblioteca</h2>
                </div>

                <div id="pdfs-biblioteca">
                
                    <span class="nombre-materia">Prácticas Profezionalizantes I</span><hr>
                    <div class="div-materia">

                        <?php
                            $conexion= new mysqli("localhost", "root", "", "san-pablo-studies");
                            $sql = "SELECT nombre_pdf, ruta_materia FROM biblioteca WHERE ID_materia = 3";
                            $res=mysqli_query($conexion, $sql);

                            // Generar opciones para el menú desplegable
                            while ($fila = $res->fetch_assoc()) {
                                // echo "<option value='{$fila['id_alumno']}'>{$fila['nombres']} {$fila['apellidos']}</option>";

                                echo "<div class='archivo' data-nombre-archivo='" . $fila['nombre_pdf'] . "' data-ruta-archivo='" . $fila['ruta_materia'] . "'>
                                        <div class='rect-img'>
                                            <div class='div-rectangulo'><img src='img/pdf.png' alt=''></div>
                                        </div>
                                        <div class='nombre-archivo'>" . $fila['nombre_pdf'] . "</div>
                                        </div>";
                                }
                            // Cerrar la conexión a la base de datos
                            $conexion->close();
                        ?> 

                    </div>

                    <span class="nombre-materia">Estadística I</span><hr>
                    <div class="div-materia">

                        <?php
                            $conexion= new mysqli("localhost", "root", "", "san-pablo-studies");
                            $sql = "SELECT nombre_pdf FROM biblioteca WHERE ID_materia = 2";
                            $res=mysqli_query($conexion, $sql);

                            // Generar opciones para el menú desplegable
                            while ($fila = $res->fetch_assoc()) {
                                // echo "<option value='{$fila['id_alumno']}'>{$fila['nombres']} {$fila['apellidos']}</option>";

                                echo "<div class='archivo'>
                                        <div class='rect-img'>
                                            <div class='div-rectangulo'><img src='img/pdf.png' alt=''></div>
                                        </div>
                                        <div class='nombre-archivo'>" . $fila['nombre_pdf'] . "</div>
                                        </div>";
                                }
                            // Cerrar la conexión a la base de datos
                            $conexion->close();
                        ?> 

                    </div>

                    <span class="nombre-materia">Desarrollo de Sistemas</span><hr>
                    <div class="div-materia">

                        <?php
                        $conexion= new mysqli("localhost", "root", "", "san-pablo-studies");
                        $sql = "SELECT nombre_pdf FROM biblioteca WHERE ID_materia = 1";
                        $res=mysqli_query($conexion, $sql);

                        // Generar opciones para el menú desplegable
                        while ($fila = $res->fetch_assoc()) {
                            // echo "<option value='{$fila['id_alumno']}'>{$fila['nombres']} {$fila['apellidos']}</option>";

                            echo "<div class='archivo'>
                                    <div class='rect-img'>
                                        <div class='div-rectangulo'><img src='img/foto.png' alt=''></div>
                                    </div>
                                    <div class='nombre-archivo'>" . $fila['nombre_pdf'] . "</div>
                                    </div>";
                            }
                        // Cerrar la conexión a la base de datos
                        $conexion->close();
                        ?> 
                    </div>

                </div>

            </div>

            <div id="asistencia" class="contenido_mostrado">

                <div id="asistencia-titulos"> 
                    <h2>Asistencia</h2>

                </div>

                <div id="div-asistencia">

                    <?php

                        if (isset($_SESSION['usuario'])) {

                            // Obtener id_usuario del usuario en sesión
                            $alumno = $_SESSION['usuario'];
                            $conexion= new mysqli("localhost", "root", "", "san-pablo-studies");
                            $sql = "SELECT id_alumno FROM cuentas WHERE nombre_usuario = '$alumno'";
                            $res=mysqli_query($conexion, $sql);

                            $fila_id_alumno = mysqli_fetch_assoc($res);
                            $id_alumno_bd = $fila_id_alumno['id_alumno'];

                            // Obtener nombres y apellidos del usuario en sesión
                            $sql = "SELECT nombres, apellidos FROM alumnos WHERE id_alumno = '$id_alumno_bd'";
                            $res=mysqli_query($conexion, $sql);

                            $fila_nom_apel = mysqli_fetch_assoc($res);
                            $nombres = $fila_nom_apel['nombres'];
                            $apellidos = $fila_nom_apel['apellidos'];

                            echo "<span class='nombre-alumno'>{$nombres}, {$apellidos}</span><hr>";

                            // Obtener porcentajes de asistencias del usuario en sesión
                            $sql = "SELECT * FROM asistencia WHERE id_alumno = '$id_alumno_bd'";
                            $res=mysqli_query($conexion, $sql);

                            $fila_asisten = mysqli_fetch_assoc($res);

                            $prac_profes =  $fila_asisten['pract_profes'];
                            $ingles =  $fila_asisten['ingles_tecnico'];
                            $gestion_soft =  $fila_asisten['gestion_de_software'];
                            $des_de_sist =  $fila_asisten['des_de_sist'];
                            $estrat_de_nego =  $fila_asisten['estrat_de_nego'];
                            $estadis =  $fila_asisten['estadistica'];
                            $udi =  $fila_asisten['udi'];
                            $innova =  $fila_asisten['innovacion'];
                            $problem_socio =  $fila_asisten['problem_socio_cont'];
                            $asist_total =  $fila_asisten['asist_total'];

                            echo " <table>
                            <thead>
                              <tr>
                                <th>Materia</th>
                                <th>Porcentaje de Asistencia</th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>Prácticas Profesionalizantes I</td>
                                <td>{$prac_profes}%</td>
                              </tr>
                              <tr>
                                <td>Inglés Técnico</td>
                                <td>{$ingles}%</td>
                              </tr>
                              <tr>
                                <td>Gestión de Software</td>
                                <td>{$gestion_soft}%</td>
                              </tr>
                              <tr>
                                <td>Desarrollo de Sistemas</td>
                                <td>{$des_de_sist}%</td>
                              </tr>
                              <tr>
                                <td>Estretégias de Negocios</td>
                                <td>{$estrat_de_nego}%</td>
                              </tr>
                              <tr>
                                <td>Estadística I</td>
                                <td>{$estadis}%</td>
                              </tr>
                              <tr>
                                <td>UDI II</td>
                                <td>{$udi}%</td>
                              </tr>
                              <tr>
                                <td>Innovación y Desarrollo Emprendedor</td>
                                <td>{$innova}%</td>
                              </tr>
                              <tr>
                                <td>Problemas Socio-Contemporáneos</td>
                                <td>{$problem_socio}%</td>
                              </tr>
                              <tr>
                              <td>Asistencia Total</td>
                              <td>{$asist_total}%</td>
                            </tr>
                            </tbody>
                          </table>";
                        }

                    ?>

                </div>


            </div>

            <div id="notas" class="contenido_mostrado">

                <div id="notas-titulos"> 
                    <h2>Notas</h2>
                </div>

                <div id="div-notas">

                    <span class="nombre-materia">Prácticas Profesionalizantes</span><hr>
                    <div class="div-materia-notas">

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>10</p></div>
                            </div>
                            <div class="nombre-examen">Parcial 1</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>9 >:(</p></div>
                            </div>
                            <div class="nombre-examen">Parcial 2</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>10 B)</p></div>
                            </div>
                            <div class="nombre-examen">Parcial 3</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>10</p></div>
                            </div>
                            <div class="nombre-examen">Promedio</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>10</p></div>
                            </div>
                            <div class="nombre-examen">Nota Final</div>
                        </div>

                    </div>

                </div>

                <div id="div-notas">

                    <span class="nombre-materia">Inglés Técnico</span><hr>
                    <div class="div-materia-notas">

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>9.60</p></div>
                            </div>
                            <div class="nombre-examen">Parcial 1</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 2</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 3</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Promedio</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Nota Final</div>
                        </div>

                    </div>

                </div>

                <div id="div-notas">

                    <span class="nombre-materia">Gestión de Software</span><hr>
                    <div class="div-materia-notas">

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>8</p></div>
                            </div>
                            <div class="nombre-examen">Parcial 1</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>10</p></div>
                            </div>
                            <div class="nombre-examen">Parcial 2</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 3</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Promedio</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Nota Final</div>
                        </div>

                    </div>

                </div>

                <div id="div-notas">

                    <span class="nombre-materia">Desarrollo de Sistemas</span><hr>
                    <div class="div-materia-notas">

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>8</p></div>
                            </div>
                            <div class="nombre-examen">Parcial 1</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>8</p></div>
                            </div>
                            <div class="nombre-examen">Parcial 2</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 3</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Promedio</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Nota Final</div>
                        </div>

                    </div>

                </div>

                <div id="div-notas">

                    <span class="nombre-materia">Estratégias de Negocios</span><hr>
                    <div class="div-materia-notas">

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 1</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 2</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 3</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Promedio</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Nota Final</div>
                        </div>

                    </div>

                </div>

                <div id="div-notas">

                    <span class="nombre-materia">Estadística I</span><hr>
                    <div class="div-materia-notas">

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p>10</p></div>
                            </div>
                            <div class="nombre-examen">Parcial 1</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 2</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 3</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Promedio</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Nota Final</div>
                        </div>

                    </div>

                </div>

                <div id="div-notas">

                    <span class="nombre-materia">UDI II</span><hr>
                    <div class="div-materia-notas">

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 1</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 2</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 3</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Promedio</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Nota Final</div>
                        </div>

                    </div>

                </div>

                <div id="div-notas">

                    <span class="nombre-materia">Innovación y Desarrollo Emprendedor</span><hr>
                    <div class="div-materia-notas">

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 1</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 2</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Parcial 3</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Promedio</div>
                        </div>

                        <div class="archivo">
                            <div class="rect-span">
                                <div class="div-rectangulo"><p></p></div>
                            </div>
                            <div class="nombre-examen">Nota Final</div>
                        </div>

                    </div>

                </div>

            </div>

            <div id="carpetas" class="contenido_mostrado"><h2>Carpetas</h2></div>
            <div id="resumenes" class="contenido_mostrado"><h2>Resúmenes</h2></div>
            <div id="configuracion" class="contenido_mostrado"><h2>Configuración</h2></div>
            <div id="bug" class="contenido_mostrado"><h2>Reportar bug</h2></div>

        </div>

        <script src="js/main.js"></script>
    </body>

</html>