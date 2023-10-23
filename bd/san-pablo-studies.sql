-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-10-2023 a las 23:22:31
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `san-pablo-studies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int(11) NOT NULL,
  `nombres` text NOT NULL,
  `apellidos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombres`, `apellidos`) VALUES
(1, 'GERÓNIMO', 'AGUIRRE'),
(2, 'MAXIMILIANO ARIEL', 'ALCARAZ'),
(3, 'AMIEL MATÍAS', 'ARIZAGA'),
(4, 'ELIAN SANTIAGO', 'ARIZAGA'),
(5, 'MATEO ALEJANDRO', 'BAZÁN'),
(6, 'MATEO ENZO', 'BELLINI'),
(7, 'JOAQUIN', 'BORRAS'),
(8, 'DAVID EZEQUIEL', 'CARLETTA'),
(9, 'VALENTINO EZEQUIEL', 'CEJAS'),
(10, 'VALENTINA SOLEDAD', 'DANTI'),
(11, 'LUCAS EMANUEL', 'DEL LABO'),
(12, 'AGUSTIN', 'DE SENSI SAN PEDRO'),
(13, 'SANTIAGO', 'FIORE CROCCIA'),
(14, 'DARÍO', 'FLORES'),
(15, 'ALEJO', 'HERRERA CORDOBA'),
(16, 'VITAL LEANDRO', 'LONGO'),
(17, 'SARA', 'MELITI'),
(18, 'MAURICIO', 'RAPARI'),
(19, 'GASPAR DANILO', 'RINALDI'),
(20, 'IVO IGNACIO', 'ROMERO'),
(21, 'ESTEFANI NAOMI', 'SAIQUITA'),
(22, 'MARTIN EZEQUIEL', 'SEQUEIRA'),
(23, 'NAZARENO', 'SERRA'),
(24, 'ALAN GABRIEL', 'VELAZQUEZ'),
(25, 'NICOLAS', 'VELEZ'),
(26, 'PEREZ', 'ESTANISLAO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asistencia`
--

CREATE TABLE `asistencia` (
  `id_asistencia` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `pract_profes` tinyint(4) NOT NULL,
  `ingles_tecnico` tinyint(4) NOT NULL,
  `gestion_de_software` tinyint(4) NOT NULL,
  `des_de_sist` tinyint(4) NOT NULL,
  `estrat_de_nego` tinyint(4) NOT NULL,
  `estadistica` tinyint(4) NOT NULL,
  `udi` tinyint(4) NOT NULL,
  `innovacion` tinyint(4) NOT NULL,
  `problem_socio_cont` tinyint(4) NOT NULL,
  `asist_total` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `asistencia`
--

INSERT INTO `asistencia` (`id_asistencia`, `id_alumno`, `fecha`, `pract_profes`, `ingles_tecnico`, `gestion_de_software`, `des_de_sist`, `estrat_de_nego`, `estadistica`, `udi`, `innovacion`, `problem_socio_cont`, `asist_total`) VALUES
(1, 2, '2023-10-13', 100, 100, 100, 100, 100, 100, 100, 100, 100, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `biblioteca`
--

CREATE TABLE `biblioteca` (
  `ID_pdf` int(11) NOT NULL,
  `ID_materia` int(11) NOT NULL,
  `ruta_materia` text NOT NULL,
  `nombre_pdf` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `biblioteca`
--

INSERT INTO `biblioteca` (`ID_pdf`, `ID_materia`, `ruta_materia`, `nombre_pdf`) VALUES
(1, 1, 'pdf/desa_de_sist/', 'IMG-20230614-WA0042.jpg'),
(2, 1, 'pdf/desa_de_sist/', 'IMG-20230614-WA0043.jpg'),
(3, 1, 'pdf/desa_de_sist/', 'IMG-20230628-WA0038.jpg'),
(4, 1, 'pdf/desa_de_sist/', 'IMG-20230704-WA0015.jpg'),
(5, 1, 'pdf/desa_de_sist/', 'IMG-20230704-WA0016.jpg'),
(6, 1, 'pdf/desa_de_sist/', 'IMG-20230704-WA0017.jpg'),
(7, 1, 'pdf/desa_de_sist/', 'IMG-20230704-WA0018.jpg'),
(8, 1, 'pdf/desa_de_sist/', 'IMG-20230705-WA0018.jpg'),
(9, 2, 'pdf/estadis/', 'Activiades cuartiles. Agrupados por intervalo.pdf'),
(10, 2, 'pdf/estadis/', 'Actividad repaso. 2do cuatrimestre.pdf'),
(11, 2, 'pdf/estadis/', 'Actividades Cuartiles.pdf'),
(12, 2, 'pdf/estadis/', 'Cuartiles.pdf'),
(13, 2, 'pdf/estadis/', 'Medidas de dispersión.pdf'),
(14, 2, 'pdf/estadis/', 'Practica Medidas de dispersión.pdf'),
(15, 2, 'pdf/estadis/', 'Practica para parcial.pdf'),
(16, 2, 'pdf/estadis/', 'Practica parcial 2.pdf'),
(17, 3, 'pdf/pract_profes/', 'Comencemos html - TP1.pdf'),
(18, 3, 'pdf/pract_profes/', 'Desarrollo Web-backend fronted.pdf'),
(19, 3, 'pdf/pract_profes/', 'Ejercitación HTML - TP4.pdf'),
(20, 3, 'pdf/pract_profes/', 'Prac Profesionalizante - UNIDAD 1.pdf'),
(21, 3, 'pdf/pract_profes/', 'proyecto final 2023.pdf'),
(22, 3, 'pdf/pract_profes/', 'Tp4- resuelto.docx.pdf'),
(23, 3, 'pdf/pract_profes/', 'trabajo cuatrimestral.pdf'),
(24, 3, 'pdf/pract_profes/', 'Unidad II - Desarrollo Web.pdf'),
(25, 3, 'pdf/pract_profes/', 'Unidad III - BOOTSTRAP.pdf'),
(26, 3, 'pdf/pract_profes/', 'Unidad III - JAVASCRIPT-1.pdf'),
(27, 3, 'pdf/pract_profes/', 'Unidad III - JAVASCRIPT-2.pdf'),
(28, 3, 'pdf/pract_profes/', 'Unidad III- Front End.pdf'),
(29, 3, 'pdf/pract_profes/', 'Unidad IV - Backend - APUNTE.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpetas`
--

CREATE TABLE `carpetas` (
  `id_pagina` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `ruta_pagina` text NOT NULL,
  `fechas_titulos` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`fechas_titulos`))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carpetas`
--

INSERT INTO `carpetas` (`id_pagina`, `id_materia`, `ruta_pagina`, `fechas_titulos`) VALUES
(3, 3, 'img/carpetas/pract_profes/1.jpg', '{\r\n    \"registros\": [\r\n        {\r\n            \"fecha\": \"\",\r\n            \"titulos\": [\"RNF\"]\r\n        },\r\n        {\r\n            \"fecha\": \"2023-05-22\",\r\n            \"titulos\": [\"Página Web\", \"Sitio Web\"]\r\n        }\r\n    ]\r\n}'),
(4, 3, 'img/carpetas/pract_profes/2.jpg', '{\r\n    \"registros\": [\r\n        {\r\n            \"fecha\": \"\",\r\n            \"titulos\": [\"RNF\"]\r\n        },\r\n        {\r\n            \"fecha\": \"2023-05-22\",\r\n            \"titulos\": [\"Página Web\", \"Sitio Web\"]\r\n        }\r\n    ]\r\n}');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id_cuenta` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `nombre_usuario` tinytext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `telefono` tinytext NOT NULL,
  `dni` tinytext NOT NULL,
  `contra` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id_cuenta`, `id_alumno`, `nombre_usuario`, `telefono`, `dni`, `contra`) VALUES
(2, 2, 'Maksi', '3364305645', '43863649', '1234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_evento` int(11) NOT NULL,
  `nombre_evento` text NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `ID_materia` int(11) NOT NULL,
  `nombre_materia` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`ID_materia`, `nombre_materia`) VALUES
(1, 'Desarrollo de Sistemas'),
(2, 'Estadística I'),
(3, 'Prácticas Profesionalizantes I'),
(4, 'Problemas Socio Contemporáneos'),
(5, 'UDI II'),
(6, 'Inglés Técnico II'),
(7, 'Innovación y Desarrollo Emprendedor'),
(8, 'Gestión de Software II'),
(9, 'Estratégias de Negocios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id_nota` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `num_parcial` tinyint(1) NOT NULL,
  `nota` tinyint(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id_nota`, `id_alumno`, `id_materia`, `fecha`, `num_parcial`, `nota`) VALUES
(1, 2, 3, '2023-10-19', 1, 10),
(2, 2, 3, '2023-10-19', 2, 9),
(3, 2, 2, '2023-10-19', 1, 10),
(4, 2, 1, '2023-10-19', 1, 8),
(5, 2, 1, '2023-10-19', 2, 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parciales`
--

CREATE TABLE `parciales` (
  `id_parcial` int(11) NOT NULL,
  `id_materia` int(11) NOT NULL,
  `num_parcial` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `parciales`
--

INSERT INTO `parciales` (`id_parcial`, `id_materia`, `num_parcial`, `fecha`) VALUES
(1, 1, 1, '2023-10-17'),
(2, 8, 2, '2023-10-19'),
(3, 6, 3, '2023-10-26'),
(4, 3, 3, '2023-10-23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumenes`
--

CREATE TABLE `resumenes` (
  `id_resumen` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `id_parcial` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resumenes`
--

INSERT INTO `resumenes` (`id_resumen`, `id_alumno`, `id_parcial`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 14, 1),
(4, 21, 2),
(5, 2, 2),
(6, 21, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resumenes_hojas`
--

CREATE TABLE `resumenes_hojas` (
  `id_resumen_hoja` int(11) NOT NULL,
  `id_resumen` int(11) NOT NULL,
  `ruta_resumen_hoja` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `resumenes_hojas`
--

INSERT INTO `resumenes_hojas` (`id_resumen_hoja`, `id_resumen`, `ruta_resumen_hoja`) VALUES
(1, 1, 'img/resumenes/desa_de_sist/p1/1.jpg'),
(2, 1, 'img/resumenes/desa_de_sist/p1/2.jpg'),
(3, 1, 'img/resumenes/desa_de_sist/p1/3.jpg'),
(4, 1, 'img/resumenes/desa_de_sist/p1/4.jpg'),
(5, 1, 'img/resumenes/desa_de_sist/p1/5.jpg'),
(6, 1, 'img/resumenes/desa_de_sist/p1/6.jpg'),
(7, 1, 'img/resumenes/desa_de_sist/p1/7.jpg'),
(8, 1, 'img/resumenes/desa_de_sist/p1/8.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temarios`
--

CREATE TABLE `temarios` (
  `id_temario` int(11) NOT NULL,
  `id_parcial` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `notas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `temarios`
--

INSERT INTO `temarios` (`id_temario`, `id_parcial`, `descripcion`, `notas`) VALUES
(1, 4, 'Realizar un SITIO WEB:\r\nEl proyecto puede ser desarrollado por 1 o 2 alumnos.\r\nEl sitio Web puede ser Estático o Dinámico. Debe contener:\r\n1. Una página principal responsive.\r\n2. Al menos 2 páginas secundarias o subpáginas por alumno.\r\n3. Una subpágina debe contener un formulario.\r\n4. Debe contener los lenguajes: HTML, CSS y JS.\r\n5. Puede usar shorthand para CSS y deben indentar el código. Apunte Unidad III.\r\n6. Puede contener animaciones y transiciones en CSS.\r\n7. Puede utilizar Bootstrap u otro CMS.\r\n8. El formulario puede estar conectado a una base de datos.\r\n9. Si la página no es dinámica en el pdf adjunto se debe agregar un mapa\r\nconceptual sobre Back End*. Apunte Unidad IV.\r\n10.s Las instrucciones utilizadas para desarrollar el sitio deben ser comprendidas\r\npor el/los alumno/s que realizaron el proyecto.\r\nAdjuntar un archivo pdf, indicando:\r\n1. Hoja 1: Nombre de la materia. Docente. Nombre del Sitio Web, nombre\r\nintegrante/s del trabajo. Año.\r\n2. Hoja 2: Descripción del Sitio Web, imagen representativa.\r\n3. Hoja/s siguiente/s: imagen de las páginas del sitio desarrollado.\r\n4. *Mapa conceptual sobre Back End, en caso de ser necesario.\r\nPrimera Entrega: día lunes 23/10/2023; en estas instancias el/los alumno/s debe/n\r\ntener el sitio desarrollado en su totalidad para su corrección.\r\nSegunda entrega: Se realizará el 26/10/2023. Con las correcciones y cambios indicados\r\nen la primera entrega. Se entregará el PDF correspondiente.', 'Algunos alumnos entregarán el proyecto el lunes y otros el jueves.'),
(2, 1, '1. Introducción al desarrollo de sistemas.\r\n2. Fundamentos de la programación.\r\n3. Diseño de algoritmos y estructuras de datos.\r\n4. Desarrollo de aplicaciones web.\r\n5. Desarrollo de aplicaciones móviles.\r\n6. Pruebas y depuración de software.\r\n7. Gestión de proyectos de desarrollo de software.\r\n8. Seguridad informática y protección de datos.', '# Es importante practicar regularmente la resolución de problemas de programación.\r\n# Mantén un control de versiones de tu código para facilitar la colaboración.\r\n# La documentación del software es clave para su mantenimiento a largo plazo.\r\n# Aprende a trabajar en equipo y a comunicarte eficazmente con otros desarrolladores.'),
(3, 2, '1. Ciclo de vida del desarrollo de software.\r\n2. Planificación y estimación de proyectos.\r\n3. Gestión de calidad del software.\r\n5. Modelos de procesos de software (por ejemplo, Agile, Waterfall).\r\n6. Gestión de riesgos en proyectos de software.\r\n7. Gestión de recursos y equipos de desarrollo.\r\n8. sMétricas y seguimiento del progreso del proyecto.\r\n9. Comunicación y liderazgo en equipos de desarrollo.', '# La comunicación efectiva con el equipo es esencial para el éxito del proyecto.\r\n# La adaptabilidad a diferentes modelos de proceso es importante.\r\n# Aprende a identificar y mitigar riesgos en el desarrollo de software.\r\n# Conoce las mejores prácticas de gestión de proyectos y liderazgo.'),
(4, 3, '1. Vocabulario técnico en inglés.\r\n2. Lectura y comprensión de documentación técnica.\r\n3. Escritura técnica en inglés (informes, documentación, correos electrónicos).\r\n4. Comunicación oral en entornos profesionales.\r\n5. Presentaciones técnicas en inglés.\r\n6. Conversación y negociación en inglés.\r\n7. Entrevistas de trabajo en inglés.\r\n8. Cultura empresarial en países de habla inglesa.', '# sPractica regularmente la lectura y comprensión de textos técnicos en inglés.\r\n# Mejora tus habilidades de escritura técnica para comunicarte de manera efectiva.\r\n# Participa en grupos de conversación o foros en línea en inglés.\r\n# Prepárate para entrevistas de trabajo en inglés y conoce las diferencias culturales en los entornos laborales.');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD PRIMARY KEY (`id_asistencia`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`ID_pdf`),
  ADD KEY `ID_materia` (`ID_materia`);

--
-- Indices de la tabla `carpetas`
--
ALTER TABLE `carpetas`
  ADD PRIMARY KEY (`id_pagina`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD UNIQUE KEY `id_alumno` (`id_alumno`) USING BTREE;

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_evento`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`ID_materia`),
  ADD UNIQUE KEY `nombre_materia` (`nombre_materia`) USING HASH,
  ADD UNIQUE KEY `nombre_materia_2` (`nombre_materia`) USING HASH;

--
-- Indices de la tabla `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id_nota`),
  ADD KEY `id_alumno` (`id_alumno`,`id_materia`),
  ADD KEY `id_materia` (`id_materia`);

--
-- Indices de la tabla `parciales`
--
ALTER TABLE `parciales`
  ADD PRIMARY KEY (`id_parcial`),
  ADD KEY `id_materia` (`id_materia`),
  ADD KEY `nombre_materia` (`id_materia`);

--
-- Indices de la tabla `resumenes`
--
ALTER TABLE `resumenes`
  ADD PRIMARY KEY (`id_resumen`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_parcial` (`id_parcial`);

--
-- Indices de la tabla `resumenes_hojas`
--
ALTER TABLE `resumenes_hojas`
  ADD PRIMARY KEY (`id_resumen_hoja`),
  ADD KEY `id_resumen` (`id_resumen`);

--
-- Indices de la tabla `temarios`
--
ALTER TABLE `temarios`
  ADD PRIMARY KEY (`id_temario`),
  ADD KEY `id_parcial` (`id_parcial`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `asistencia`
--
ALTER TABLE `asistencia`
  MODIFY `id_asistencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `ID_pdf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1044;

--
-- AUTO_INCREMENT de la tabla `carpetas`
--
ALTER TABLE `carpetas`
  MODIFY `id_pagina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `ID_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `notas`
--
ALTER TABLE `notas`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `parciales`
--
ALTER TABLE `parciales`
  MODIFY `id_parcial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `resumenes`
--
ALTER TABLE `resumenes`
  MODIFY `id_resumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `resumenes_hojas`
--
ALTER TABLE `resumenes_hojas`
  MODIFY `id_resumen_hoja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `temarios`
--
ALTER TABLE `temarios`
  MODIFY `id_temario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD CONSTRAINT `biblioteca_ibfk_1` FOREIGN KEY (`ID_materia`) REFERENCES `materias` (`ID_materia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `carpetas`
--
ALTER TABLE `carpetas`
  ADD CONSTRAINT `carpetas_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`ID_materia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON UPDATE CASCADE,
  ADD CONSTRAINT `notas_ibfk_2` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`ID_materia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `parciales`
--
ALTER TABLE `parciales`
  ADD CONSTRAINT `parciales_ibfk_1` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`ID_materia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `resumenes`
--
ALTER TABLE `resumenes`
  ADD CONSTRAINT `resumenes_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON UPDATE CASCADE,
  ADD CONSTRAINT `resumenes_ibfk_3` FOREIGN KEY (`id_parcial`) REFERENCES `parciales` (`id_parcial`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `resumenes_hojas`
--
ALTER TABLE `resumenes_hojas`
  ADD CONSTRAINT `resumenes_hojas_ibfk_1` FOREIGN KEY (`id_resumen`) REFERENCES `resumenes` (`id_resumen`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `temarios`
--
ALTER TABLE `temarios`
  ADD CONSTRAINT `temarios_ibfk_1` FOREIGN KEY (`id_parcial`) REFERENCES `parciales` (`id_parcial`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
