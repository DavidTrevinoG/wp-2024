-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 19-03-2024 a las 13:25:11
-- Versión del servidor: 5.7.39
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `practica2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestacion_taller`
--

CREATE TABLE `prestacion_taller` (
  `id_taller` int(11) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `id_vehiculo` int(11) NOT NULL,
  `id_servicio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prestacion_taller`
--

INSERT INTO `prestacion_taller` (`id_taller`, `fecha_ingreso`, `id_vehiculo`, `id_servicio`) VALUES
(1, '2024-03-12', 3, 1),
(4, '2024-03-15', 3, 4),
(5, '2024-03-02', 3, 4),
(6, '2024-03-06', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicios` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `costo` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicios`, `nombre`, `costo`) VALUES
(1, 'Cambio de Aceite', 800),
(4, 'Cambio de rines', 2000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculos`
--

CREATE TABLE `vehiculos` (
  `id_vehiculo` int(11) NOT NULL,
  `num_serie` int(11) NOT NULL,
  `marca` varchar(50) NOT NULL,
  `submarca` varchar(50) NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `modelo` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `procedencia` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `vehiculos`
--

INSERT INTO `vehiculos` (`id_vehiculo`, `num_serie`, `marca`, `submarca`, `tipo`, `modelo`, `color`, `capacidad`, `procedencia`) VALUES
(3, 2435234, 'VolksWagen', 'Jetta', 'Sedán', 2017, 'blanco', 5, 'Mexico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `prestacion_taller`
--
ALTER TABLE `prestacion_taller`
  ADD PRIMARY KEY (`id_taller`),
  ADD KEY `fk_servicios` (`id_servicio`),
  ADD KEY `fk_vehiculo` (`id_vehiculo`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicios`);

--
-- Indices de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  ADD PRIMARY KEY (`id_vehiculo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `prestacion_taller`
--
ALTER TABLE `prestacion_taller`
  MODIFY `id_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculos`
--
ALTER TABLE `vehiculos`
  MODIFY `id_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestacion_taller`
--
ALTER TABLE `prestacion_taller`
  ADD CONSTRAINT `fk_servicios` FOREIGN KEY (`id_servicio`) REFERENCES `servicios` (`id_servicios`),
  ADD CONSTRAINT `fk_vehiculo` FOREIGN KEY (`id_vehiculo`) REFERENCES `vehiculos` (`id_vehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
