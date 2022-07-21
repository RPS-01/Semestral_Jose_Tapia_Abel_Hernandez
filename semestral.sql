-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-07-2022 a las 02:56:53
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `semestral`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `glucosa`
--

CREATE TABLE `glucosa` (
  `glucosa` float NOT NULL,
  `ayuna` varchar(15) NOT NULL,
  `cedula` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `glucosa`
--

INSERT INTO `glucosa` (`glucosa`, `ayuna`, `cedula`) VALUES
(220, 'no', '8-972-514');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imc`
--

CREATE TABLE `imc` (
  `peso` float NOT NULL,
  `altura` float NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `imc` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `imc`
--

INSERT INTO `imc` (`peso`, `altura`, `cedula`, `imc`) VALUES
(85, 1.8, '8-972-514', 26.2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presion`
--

CREATE TABLE `presion` (
  `sistolica` int(5) NOT NULL,
  `diastolica` int(5) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `presion` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `presion`
--

INSERT INTO `presion` (`sistolica`, `diastolica`, `cedula`, `presion`) VALUES
(115, 75, '8-972-514', 'Normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `telefono` int(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `cedula` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`nombre`, `apellido`, `telefono`, `password`, `cedula`) VALUES
('jose', 'tapia', 63407120, 'admin', '8-972-514'),
('abel', 'hernandez', 69357894, 'admin', '8-972-516');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `glucosa`
--
ALTER TABLE `glucosa`
  ADD KEY `user_glucosa` (`cedula`);

--
-- Indices de la tabla `imc`
--
ALTER TABLE `imc`
  ADD KEY `user_imc` (`cedula`);

--
-- Indices de la tabla `presion`
--
ALTER TABLE `presion`
  ADD KEY `user_presion` (`cedula`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`cedula`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `glucosa`
--
ALTER TABLE `glucosa`
  ADD CONSTRAINT `user_glucosa` FOREIGN KEY (`cedula`) REFERENCES `user` (`cedula`);

--
-- Filtros para la tabla `imc`
--
ALTER TABLE `imc`
  ADD CONSTRAINT `user_imc` FOREIGN KEY (`cedula`) REFERENCES `user` (`cedula`);

--
-- Filtros para la tabla `presion`
--
ALTER TABLE `presion`
  ADD CONSTRAINT `user_presion` FOREIGN KEY (`cedula`) REFERENCES `user` (`cedula`);
COMMIT;