<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>San Pablo Studies</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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