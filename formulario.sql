-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 07-09-2015 a las 05:27:55
-- Versión del servidor: 5.5.44-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `formulario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `idciudades` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `provincia_id` int(10) unsigned NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idciudades`),
  KEY `fk_ciudades_provincias1_idx` (`provincia_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `ciudades`
--

INSERT INTO `ciudades` (`idciudades`, `provincia_id`, `nombre`) VALUES
(3, 1, 'Rawson'),
(4, 1, 'Trelew');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paises`
--

CREATE TABLE IF NOT EXISTS `paises` (
  `idpaises` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idpaises`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `paises`
--

INSERT INTO `paises` (`idpaises`, `nombre`) VALUES
(1, 'Argentina'),
(3, 'Brazil'),
(4, 'Uruguay'),
(7, 'Chile');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `idpersona` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nombres` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `sexo` char(1) NOT NULL,
  `pais_nacimientoID` int(10) unsigned NOT NULL,
  `provincia_nacimiento` varchar(45) DEFAULT NULL,
  `ejemplar` char(1) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_emicion` date NOT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `num_documento` int(10) unsigned NOT NULL,
  `domicilio` varchar(200) NOT NULL,
  `provincias_residenciaID` int(10) unsigned DEFAULT NULL,
  `ciudad_residencia` varchar(45) DEFAULT NULL,
  `cuil` int(10) unsigned DEFAULT NULL,
  `imagen` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`idpersona`),
  UNIQUE KEY `num_documento_UNIQUE` (`num_documento`),
  UNIQUE KEY `cuil_UNIQUE` (`cuil`),
  KEY `fk_personas_paises_idx` (`pais_nacimientoID`),
  KEY `fk_personas_provincias1_idx` (`provincias_residenciaID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`idpersona`, `nombres`, `apellidos`, `sexo`, `pais_nacimientoID`, `provincia_nacimiento`, `ejemplar`, `fecha_nacimiento`, `fecha_emicion`, `fecha_vencimiento`, `num_documento`, `domicilio`, `provincias_residenciaID`, `ciudad_residencia`, `cuil`, `imagen`) VALUES
(1, 'anahi', 'cardenas', 'f', 1, NULL, 'A', '1989-03-01', '2015-09-06', NULL, 33946606, 'en el fin del mundo', NULL, NULL, NULL, NULL),
(2, 'ester', 'toledo', 'f', 1, NULL, 'B', '1978-02-16', '2015-09-06', NULL, 33944606, 'aca', NULL, NULL, NULL, NULL),
(3, 'sonia', 'ramirez', 'f', 1, NULL, 'A', '1987-02-01', '2015-09-06', NULL, 32946606, 'covira', NULL, NULL, NULL, NULL),
(4, 'valeria', 'ocampo', 'f', 1, NULL, 'A', '1979-05-30', '2015-09-06', NULL, 30946606, 'san martin', NULL, NULL, NULL, NULL),
(7, 'Belen', 'Arsija', 'f', 1, NULL, 'A', '1993-02-17', '2015-09-06', NULL, 36946606, 'en el fin del mundo', NULL, NULL, NULL, NULL),
(8, 'fsdf', 'dfsdf', 'f', 3, NULL, 'B', '1989-12-25', '2015-09-06', NULL, 21946606, 'ssssssssssssssss', NULL, NULL, NULL, NULL),
(12, 'laura', 'toledo', 'f', 1, NULL, 'C', '1989-03-01', '2015-09-06', NULL, 45946606, 'en mi casa', NULL, NULL, NULL, NULL),
(17, 'noemi', 'cardenas', 'f', 1, NULL, 'A', '1989-03-01', '2015-09-06', NULL, 22946607, 'casa', NULL, NULL, NULL, NULL),


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincias`
--

CREATE TABLE IF NOT EXISTS `provincias` (
  `idprovincias` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `paisID` int(10) unsigned NOT NULL,
  `nombre` varchar(45) NOT NULL,
  PRIMARY KEY (`idprovincias`),
  KEY `fk_provincias_paises1_idx` (`paisID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `provincias`
--

INSERT INTO `provincias` (`idprovincias`, `paisID`, `nombre`) VALUES
(1, 1, 'Chubut'),
(2, 1, 'Santa Cruz');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `pass`) VALUES
(1, 'laura', 'admin'),
(2, 'root', 'admin');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `fk_ciudades_provincias1` FOREIGN KEY (`provincia_id`) REFERENCES `provincias` (`idprovincias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_personas_paises` FOREIGN KEY (`pais_nacimientoID`) REFERENCES `paises` (`idpaises`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_personas_provincias1` FOREIGN KEY (`provincias_residenciaID`) REFERENCES `provincias` (`idprovincias`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `provincias`
--
ALTER TABLE `provincias`
  ADD CONSTRAINT `fk_provincias_paises1` FOREIGN KEY (`paisID`) REFERENCES `paises` (`idpaises`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
