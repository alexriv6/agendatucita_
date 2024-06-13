-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 01-06-2024 a las 14:39:26
-- Versión del servidor: 5.7.23-23
-- Versión de PHP: 8.1.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hpmmx_eventos`
--

DELIMITER $$
--
-- Procedimientos
--
$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE `acceso` (
  `Id_user` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Passw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`Id_user`, `Username`, `Passw`) VALUES
(1, 'alexa', '202cb962ac59075b964b07152d234b70'),
(2, 'PAB1H6P0M9L', '960c5d68dead3648dd485ef310f9e4bd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `start` datetime DEFAULT NULL,
  `end` datetime DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `id_posible` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id`, `title`, `name`, `motivo`, `color`, `start`, `end`, `estatus`, `id_posible`) VALUES
(1, 'Contabilidad', 'Brayan Josue Reyes Salazar', 'Asesoría contable', '#FFE075', '2022-11-23 18:30:00', '2022-11-23 18:30:00', 2, 2),
(2, 'Papeles de Alexa', 'Alexa', 'Asesoría para e.firma', '#1430E2', '2022-11-30 18:00:00', '2022-11-30 18:00:00', 0, 1),
(3, 'Reunión con ALEXA', 'Alexa', 'tendreos reunión con Alexa', '#E21A14', '2023-01-02 15:00:00', '2023-01-02 15:00:00', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posibles`
--

CREATE TABLE `posibles` (
  `id_posible` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `time` time DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `tel` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `estatus` int(11) DEFAULT NULL,
  `materia` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `posibles`
--

INSERT INTO `posibles` (`id_posible`, `nombre`, `motivo`, `time`, `date`, `tel`, `email`, `estatus`, `materia`) VALUES
(1, 'Alexa Montserrat Rivas Arambula', 'Necesito una cita en el SAT para e.firma', '18:00:00', '2022-11-30 00:00:00', '4494753256', 'alexarivastd@gmail.com', 2, 'Jurídica'),
(2, 'Brayan Josue reyes Salazar ', 'Asesoría contable ', '18:31:00', '2022-11-23 00:00:00', '4494389966', 'brayan-josue1913@hotmail.com', 2, 'Contable'),
(3, 'Leonardo Esau Cervantes Calzada ', 'Asesoría de divorcio ', '17:10:00', '2022-11-25 00:00:00', '4491906442 ', 'Leonardoesau.tf10@gmail.com', 1, 'Jurídica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `acceso`
--
ALTER TABLE `acceso`
  ADD PRIMARY KEY (`Id_user`);

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_posible` (`id_posible`);

--
-- Indices de la tabla `posibles`
--
ALTER TABLE `posibles`
  ADD PRIMARY KEY (`id_posible`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `acceso`
--
ALTER TABLE `acceso`
  MODIFY `Id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `posibles`
--
ALTER TABLE `posibles`
  MODIFY `id_posible` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_posible`) REFERENCES `posibles` (`id_posible`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
