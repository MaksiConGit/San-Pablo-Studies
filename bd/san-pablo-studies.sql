-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2023 a las 18:53:57
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
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id_cuenta` int(11) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `nombre_usuario` tinytext NOT NULL,
  `mail` tinytext NOT NULL,
  `contraseña` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuenta`
--

INSERT INTO `cuenta` (`id_cuenta`, `id_alumno`, `nombre_usuario`, `mail`, `contraseña`) VALUES
(1, 2, 'Maxi', 'maximilianoalcaraz464@gmail.com', 'contraseña123');
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
(16, 2, 'pdf/estadis/', 'Practica parcial 2.pdf');

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
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `ID_materia` int(11) NOT NULL,
  `nombre_materia` text NOT NULL,
  `ruta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`ID_materia`, `nombre_materia`, `ruta`) VALUES
(1, 'Desarrollo de Sistemas', 'pdf/desa_de_sist'),
(2, 'Estadística', 'pdf/estadis'),
(3, 'Prácticas Profesionalizantes', 'pdf/pract_profes');

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
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD KEY `id_alumno` (`id_alumno`);
-- Indices de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD PRIMARY KEY (`ID_pdf`),
  ADD KEY `ID_materia` (`ID_materia`);

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD UNIQUE KEY `id_alumno` (`id_alumno`) USING BTREE;

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`ID_materia`);

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
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
-- AUTO_INCREMENT de la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  MODIFY `ID_pdf` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1031;

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `ID_materia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `asistencia`
--
ALTER TABLE `asistencia`
  ADD CONSTRAINT `asistencia_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD CONSTRAINT `cuenta_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON UPDATE CASCADE;
-- Filtros para la tabla `biblioteca`
--
ALTER TABLE `biblioteca`
  ADD CONSTRAINT `biblioteca_ibfk_1` FOREIGN KEY (`ID_materia`) REFERENCES `materias` (`ID_materia`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
