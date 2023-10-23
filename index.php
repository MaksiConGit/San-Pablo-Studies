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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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

            <div id="calendario" class="contenido_mostrado">

                <div id="calendario-titulos"> 
                    <h2>Calendario</h2>
                </div>

                <div id="div-calendario">

                    <div id="opciones_parciales_calendario">

                        <div id="calendar">
                            <div class="buttons">
                                <div id="botones-mes">
                                    <button class="cambiar-mes" id="previousMonth"><img src="img/flecha-izquierda.png" alt="" class="flechas"></button>
                                    <h2 id="month-year">Mes Año</h2>
                                    <button class="cambiar-mes" id="nextMonth"><img src="img/flecha-derecha.png" alt="" class="flechas"></button>
                                </div>
                            </div>
                            <table id="calendario-table">
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

                                            echo "<div class='parcial_calendario'>
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
    
                                    echo "<div class='contenido_parciales_calendario'>
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

            <div id="horarios" class="contenido_mostrado">
                <div id="horarios-titulos">
                    <h2>Horarios</h2>       
                    <h2>Análisis de Sistemas 2°do</h2>
                    <?php
                        $fecha_actual = date('d/m/Y');
                        echo "<h2>$fecha_actual</h2>";
                    ?>
                </div>
                <table id="horarios-table">
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

                            echo " <table id='asistencias-table'>
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

                    <?php

                       if(isset($_SESSION['usuario'])){

                            // Obtener id_usuario del usuario en sesión
                            $alumno = $_SESSION['usuario'];

                            $conexion= new mysqli("localhost", "root", "", "san-pablo-studies");

                            $sql = "SELECT id_alumno FROM cuentas WHERE nombre_usuario = '$alumno'";
                            $res=mysqli_query($conexion, $sql);

                            $fila_id_alumno = mysqli_fetch_assoc($res);
                            $id_alumno_bd = $fila_id_alumno['id_alumno'];

                            // Obtener nombres de todas las materias
                            $sql = "SELECT nombre_materia FROM materias";
                            $res=mysqli_query($conexion, $sql);

                            while($fila_info_materia = $res->fetch_assoc()){
                                $nombre_materia = $fila_info_materia['nombre_materia'];
                                $nombres_materias[] = $nombre_materia; 
                            }

                            $numero_iteracion = 0;

                            // Iterar todas las materias y mostrarlas junto con sus notas
                            foreach($nombres_materias as $materia){
                                $numero_iteracion++;
                                // Obtener nombres y apellidos del usuario en sesión
                                $sql = "SELECT id_materia, num_parcial, nota FROM notas WHERE id_alumno = '$id_alumno_bd' AND id_materia = $numero_iteracion";
                                $res=mysqli_query($conexion, $sql);

                                $cont_parciales = 1;

                                echo "<span class='nombre-materia'>$materia</span><hr>
                                <div class='div-materia-notas'>";

                                while ($fila_info_notas = $res->fetch_assoc()) {

                                    $cont_parciales += 1;

                                    echo "<div class='archivo'>
                                        <div class='rect-span'>
                                            <div class='div-rectangulo'><p>" . $fila_info_notas['nota'] . "</p></div>
                                        </div>
                                        <div class='nombre-examen'>Parcial " . $fila_info_notas['num_parcial'] . "</div>
                                    </div>";
                                }

                                // Mostrar el resto de parciales sin nota
                                for ($cont_parciales; $cont_parciales < 4; $cont_parciales++){
                                    
                                    echo "<div class='archivo'>
                                        <div class='rect-span'>
                                            <div class='div-rectangulo'><p></p></div>
                                        </div>
                                        <div class='nombre-examen'>Parcial $cont_parciales</div>
                                    </div>";

                                    if ($cont_parciales > 2){
                                        echo "<div class='archivo'>
                                            <div class='rect-span'>
                                                <div class='div-rectangulo'><p></p></div>
                                            </div>
                                            <div class='nombre-examen'>Nota Final</div>
                                        </div>";
                                    }
                                }

                                echo "</div>";
                            }

                            $conexion->close();
                        } 

                    ?>

                </div>

            </div>
            
            <div id="carpetas" class="contenido_mostrado">

                
                <div id="carpetas-titulos"> 
                    <h2>Carpetas</h2>
                </div>


                <div id="div-carpetas">

                    <div id="opciones_carpetas">

                        <span class="nombre-alumno">Maximiliano, Alcaraz</span><hr>

                            <?php

                                $conexion = new mysqli("localhost", "root", "", "san-pablo-studies");
                                $sql = "SELECT nombre_materia FROM materias";
                                $res = mysqli_query($conexion, $sql);

                                $total_filas = mysqli_num_rows($res);
                                $filas_por_grupo = 4;

                                for ($i = 0; $i < $total_filas; $i += $filas_por_grupo) {
                                    echo "<div class='div-alumno'>";

                                    // Iterar sobre un grupo de 4 filas
                                    for ($j = 0; $j < $filas_por_grupo; $j++) {
                                        $fila = mysqli_fetch_assoc($res);
                                        if ($fila) {
                                            echo "<div class='archivo-materia'>
                                                <div class='rect-img'>
                                                    <div class='div-rectangulo'><img src='img/carpeta.png' alt=''></div>
                                                </div>
                                                <div class='nombre-archivo'>" . $fila['nombre_materia'] . "</div>
                                            </div>";
                                        }
                                    }

                                    echo "</div>"; // Cierre del div-alumno
                                }

                                $conexion->close();

                            ?>
                            
                    </div>

                    <?php

                        $conexion = new mysqli("localhost", "root", "", "san-pablo-studies");
                        $sql = "SELECT ID_materia FROM materias";
                        $res = mysqli_query($conexion, $sql);

                        $total_materias = mysqli_num_rows($res) + 1;

                        for($i = 1; $i < $total_materias; $i++){

                            $sql = "SELECT ruta_pagina, fechas_titulos FROM carpetas WHERE id_materia = $i";
                            $res = mysqli_query($conexion, $sql);

                            echo "<div class='contenido_carpetas'>";
                            
                            if (mysqli_num_rows($res) > 0){
                            
                                echo "<div id='carousel$i' class='carousel slide'>
                                        <div class='carousel-inner'>";

                                $item_active = true;

                                
                                while ($fila_paginas = mysqli_fetch_assoc($res)) {

                                    if ($item_active){

                                        echo "<div class='carousel-item active' >
                                        <figure class='zoom' onmousemove='zoom(event)' style='background-image: url(" . $fila_paginas['ruta_pagina'] . ")'>
                                            <a href='" . $fila_paginas['ruta_pagina'] . "' target='_blank'><img src='" . $fila_paginas['ruta_pagina'] . "' /></a>
                                            </figure>
                                        </div>";
                                    }
                                    else{
                                        echo "<div class='carousel-item'>
                                        <figure class='zoom' onmousemove='zoom(event)' style='background-image: url(" . $fila_paginas['ruta_pagina'] . ")'>
                                            <a href='" . $fila_paginas['ruta_pagina'] . "' target='_blank'><img src='" . $fila_paginas['ruta_pagina'] . "' /></a>
                                        </figure>
                                    </div>"; 
                                    }

                                    $item_active = false;

                                }
                                
                                echo "</div>
                                        <button class='carousel-control-prev' type='button' data-bs-target='#carousel$i' data-bs-slide='prev'>
                                        <span class='carousel-control-prev-icon' aria-hidden='true'></span>
                                        <span class='visually-hidden'>Previous</span>
                                        </button>
                                        <button class='carousel-control-next' type='button' data-bs-target='#carousel$i' data-bs-slide='next'>
                                        <span class='carousel-control-next-icon' ariahidden='true'></span>
                                        <span class='visually-hidden'>Next</span>
                                        </button>
                                    </div>";

                            }
                            else{
                                echo "<div><h2>Carousel en construcción</h2>
                                <h3>(no saqué más fotos jeje)</h3></div>";
                            }

                            echo "<div>
                                    <h2>Índice</h2>
                                    <div id='lista-carpetas'>
                                        <span class='fecha-carpeta'>DD/MM</span>
                                        <div>
                                            <span class='titulo-carpeta'>Sin títulos por hoy, pero ¡cada imagen vale más que mil palabras!</span>
                                            <hr>
                                        </div>
                                        <span class='fecha-carpeta'>DD/MM</span>
                                        <div>
                                            <span class='titulo-carpeta'>Sin títulos por hoy, pero ¡cada imagen vale más que mil palabras!</span>
                                            <hr>
                                        </div>
                                        <span class='fecha-carpeta'>DD/MM</span>
                                        <div>
                                            <span class='titulo-carpeta'>Sin títulos por hoy, pero ¡cada imagen vale más que mil palabras!</span>
                                            <hr>
                                        </div>
                                    </div>
                                    <button class='volver'>Volver a Carpetas</button>
                                </div>";

                            echo "</div>";

                        }

                    ?>

                <div>

            </div>
            <div id="resumenes" class="contenido_mostrado"><h2>Resúmenes</h2></div>
            <div id="configuracion" class="contenido_mostrado"><h2>Configuración</h2></div>
            <div id="bug" class="contenido_mostrado"><h2>Reportar bug</h2></div>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="js/main.js"></script>
    </body>

</html>