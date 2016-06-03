-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-06-2016 a las 05:09:35
-- Versión del servidor: 5.6.17
-- Versión de PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `couchinn`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE IF NOT EXISTS `administrador` (
  `id_admin` int(15) NOT NULL AUTO_INCREMENT,
  `correo` varchar(70) NOT NULL,
  `clave` varchar(40) NOT NULL,
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `correo`, `clave`) VALUES
(1, 'admin@hotmail.com', '1234'),
(2, 'emanucilli@hotmail.com', '12345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comenta`
--

CREATE TABLE IF NOT EXISTS `comenta` (
  `correo` varchar(50) NOT NULL,
  `id_couch` int(11) NOT NULL,
  PRIMARY KEY (`correo`,`id_couch`),
  KEY `FK_comenta_couch` (`id_couch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `couch`
--

CREATE TABLE IF NOT EXISTS `couch` (
  `id_couch` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(30) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `capacidad` int(100) NOT NULL,
  `id_tipo_couch` int(11) NOT NULL,
  `id_couch_usuario` int(11) NOT NULL,
  PRIMARY KEY (`id_couch`),
  KEY `id_tipo_couch` (`id_tipo_couch`),
  KEY `id_couch_usuario` (`id_couch_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `couch`
--

INSERT INTO `couch` (`id_couch`, `titulo`, `descripcion`, `ubicacion`, `capacidad`, `id_tipo_couch`, `id_couch_usuario`) VALUES
(1, 'Hostel in', 'Es una poronga', 'Mar Del Plata', 5, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadia`
--

CREATE TABLE IF NOT EXISTS `estadia` (
  `id_estadia` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id_estadia`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE IF NOT EXISTS `foto` (
  `id_foto` int(11) NOT NULL AUTO_INCREMENT,
  `id_couch` int(11) NOT NULL,
  `imagen` mediumblob NOT NULL,
  `tipo_imagen` varchar(40) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `id_couch` (`id_couch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premium`
--

CREATE TABLE IF NOT EXISTS `premium` (
  `nro_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `fecha_inscripcion` date NOT NULL,
  PRIMARY KEY (`nro_inscripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `premium`
--

INSERT INTO `premium` (`nro_inscripcion`, `monto`, `fecha_inscripcion`) VALUES
(1, 40, '0000-00-00'),
(2, 40, '0000-00-00'),
(3, 40, '0000-00-00'),
(4, 40, '0000-00-00'),
(5, 40, '0000-00-00'),
(6, 40, '0000-00-00'),
(7, 40, '0000-00-00'),
(8, 40, '0000-00-00'),
(9, 40, '2016-06-07'),
(10, 40, '2016-06-13'),
(11, 40, '2016-06-07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntua_couch`
--

CREATE TABLE IF NOT EXISTS `puntua_couch` (
  `correo` int(11) NOT NULL,
  `id_couch` int(11) NOT NULL,
  PRIMARY KEY (`correo`,`id_couch`),
  KEY `FK_puntua_couch` (`id_couch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE IF NOT EXISTS `reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_couch` int(11) NOT NULL,
  `id_estadia` int(11) NOT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_usuario` (`id_usuario`,`id_couch`,`id_estadia`),
  KEY `id_estadia` (`id_estadia`),
  KEY `id_couch` (`id_couch`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE IF NOT EXISTS `tipo` (
  `id_tipo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(140) CHARACTER SET utf8 NOT NULL,
  `estado` varchar(50) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  UNIQUE KEY `descripcion` (`descripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `descripcion`, `estado`) VALUES
(1, 'cama', 'activo'),
(2, 'hotel', 'Activo'),
(5, 'cabaña', 'Activo'),
(6, 'kfgnñdnk', 'Inactivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(60) DEFAULT NULL,
  `nombre` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefono` int(20) NOT NULL,
  `nacimiento` date NOT NULL,
  `clave` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo` char(2) NOT NULL,
  `id_nro_inscripcion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `correo` (`correo`),
  KEY `id_nro_inscripcion` (`id_nro_inscripcion`),
  KEY `id_nro_inscripcion_2` (`id_nro_inscripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `correo`, `nombre`, `apellido`, `telefono`, `nacimiento`, `clave`, `tipo`, `id_nro_inscripcion`) VALUES
(1, 'cristian.csl@hotmail.com', 'Cristian', 'Barreto', 2147483647, '1994-06-17', '1234', '', 9),
(2, 'belu@hotmail.com', 'Belen', 'Cremaschi', 2147483647, '1994-06-17', '1234', '', NULL),
(10, 'gero@hotmail.com', 'Geronimo', 'Boza', 221454534, '2016-06-14', '12345', '', NULL),
(11, 'boza@hotmail.com', 'Geronimo', 'Boza', 22133432, '2016-06-01', '123', '', NULL),
(12, 'manu@hotmail.com', 'Manuel', 'Rigonat', 22143233, '2016-05-31', '12345', '', NULL),
(13, 'gdfg@gdfgdf', 'fdgfg', 'gdfgsdf', 345, '2016-05-31', '45353', '', NULL),
(14, 'dgg@sdfsdffs', 'fsdfsf', 'dsfsdsdf', 43535, '2016-06-15', '45435', '', NULL),
(15, 'gfgg@fgfg', 'hgng', 'hgjhgj', 4535, '2016-06-07', 'hgfh', '', NULL),
(16, 'gfgdf@ff', 'sdfdf', 'dsfsdfg', 435435, '2016-05-31', 'fg435', '', NULL);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comenta`
--
ALTER TABLE `comenta`
  ADD CONSTRAINT `FK_comenta_couch` FOREIGN KEY (`id_couch`) REFERENCES `couch` (`id_couch`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `couch`
--
ALTER TABLE `couch`
  ADD CONSTRAINT `FK_TIPO_COUCH` FOREIGN KEY (`id_tipo_couch`) REFERENCES `tipo` (`id_tipo`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `FK_foto_couch` FOREIGN KEY (`id_couch`) REFERENCES `couch` (`id_couch`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `puntua_couch`
--
ALTER TABLE `puntua_couch`
  ADD CONSTRAINT `FK_puntua_couch` FOREIGN KEY (`id_couch`) REFERENCES `couch` (`id_couch`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `FK_reserva_couch` FOREIGN KEY (`id_couch`) REFERENCES `couch` (`id_couch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_reserva_estadia` FOREIGN KEY (`id_estadia`) REFERENCES `estadia` (`id_estadia`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_usuario_inscripcion` FOREIGN KEY (`id_nro_inscripcion`) REFERENCES `premium` (`nro_inscripcion`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
