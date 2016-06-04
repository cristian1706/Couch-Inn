-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-06-2016 a las 05:08:10
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
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(60) NOT NULL,
  `clave` int(40) NOT NULL,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `telefono` bigint(40) NOT NULL,
  `nacimiento` varchar(30) NOT NULL,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_admin`, `correo`, `clave`, `nombre`, `apellido`, `telefono`, `nacimiento`) VALUES
(1, 'emanucilli@hotmail.com', 1234, 'Emanuel', 'Nucilli', 2216020077, '1985-06-17'),
(2, 'admin@hotmail.com', 1234, 'Administrador', 'Couchinn', 2215540032, '1984-08-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comenta`
--

CREATE TABLE IF NOT EXISTS `comenta` (
  `correo` int(11) NOT NULL,
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
  KEY `id_couch_usuario` (`id_couch_usuario`),
  KEY `id_couch_usuario_2` (`id_couch_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=16 ;

--
-- Volcado de datos para la tabla `couch`
--

INSERT INTO `couch` (`id_couch`, `titulo`, `descripcion`, `ubicacion`, `capacidad`, `id_tipo_couch`, `id_couch_usuario`) VALUES
(4, 'Mi casa', 'Hogar localizado en el casco urbano de la ciudad', 'La Plata', 3, 1, 6),
(6, 'Quinchito', 'Es una habitacion que conmemora a las tribus indigenas de la region', 'Chascomus', 2, 5, 2),
(7, 'Casa en el agua', 'Una casa en el lago', 'Rio Negro', 3, 1, 13),
(8, 'Casa invertida', 'Una linda casa que esta diseñada al reves', 'Buenos Aires', 5, 1, 5),
(9, 'Casa avion', 'Una casa con forma de avion', 'Misiones', 7, 1, 10),
(10, 'Catamaran', 'Gran catamaran con excelentes comodidades. Especial para pasar unos días con amigos o familia en el agua... ', 'Tigre', 5, 10, 11),
(11, 'Quincho', 'Quincho en las afueras de la plata, 3 habitaciones', 'La Plata', 5, 11, 12),
(12, 'Habitacion', 'Habitacion doble. ', 'Merlo', 2, 12, 10),
(13, 'Casa frente al lago', 'Casa frente al lago, ideal para pasar unos días en familia relajados. ', 'Bariloche', 10, 1, 6),
(14, 'Yate', 'Yate para 5 personas. Ideal para pasar unos dias con amigos en el agua', 'Puerto Madryn', 5, 9, 3),
(15, 'Casa de campo', 'Excelente casa en medio del campo. Especial para pasar unos dias relajados, disfrutando de la tranquilidad y sonidos de la naturaleza. ', 'Daireaux', 8, 1, 18);

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
  `imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`id_foto`),
  KEY `id_couch` (`id_couch`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `foto`
--

INSERT INTO `foto` (`id_foto`, `id_couch`, `imagen`) VALUES
(6, 6, 'choza.jpg'),
(7, 7, 'casa_lago.jpg'),
(8, 9, 'casa_avion.jpg'),
(9, 8, 'al_reves.jpg'),
(11, 13, 'casaFrenteAlLago.jpg'),
(12, 10, 'catamaran.jpg'),
(13, 12, 'habitacion.jpg'),
(14, 15, 'casaDeCampo.jpg'),
(15, 14, 'yate.jpg'),
(16, 4, 'casa.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `premium`
--

CREATE TABLE IF NOT EXISTS `premium` (
  `nro_inscripcion` int(11) NOT NULL AUTO_INCREMENT,
  `monto` int(11) NOT NULL,
  `fecha_inscripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`nro_inscripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

--
-- Volcado de datos para la tabla `premium`
--

INSERT INTO `premium` (`nro_inscripcion`, `monto`, `fecha_inscripcion`) VALUES
(1, 40, '2012-12-12'),
(4, 40, '0000-00-00'),
(5, 40, '0000-00-00'),
(6, 40, '0000-00-00'),
(7, 40, '0000-00-00'),
(11, 40, '2012-12-12'),
(12, 40, '0000-00-00'),
(13, 40, '0001-01-02'),
(14, 40, '0001-01-01'),
(15, 40, '2012-12-12'),
(16, 40, '0000-00-00'),
(17, 40, '0000-00-00'),
(18, 40, '0000-00-00'),
(19, 40, '0000-00-00'),
(20, 40, '0000-00-00'),
(21, 40, '0000-00-00'),
(22, 40, '0000-00-00'),
(23, 40, 'CAST(GETDATE() AS DA'),
(24, 40, '03/06/2016'),
(25, 40, '03/06/2016'),
(26, 40, '13/14/15'),
(27, 40, '12/12/12'),
(28, 40, '13/14/15'),
(29, 40, '12/12/12'),
(30, 100, '07/06/2016'),
(31, 100, '2016-06-07');

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
  `descripcion` varchar(140) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(10) NOT NULL,
  PRIMARY KEY (`id_tipo`),
  UNIQUE KEY `descripcion` (`descripcion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id_tipo`, `descripcion`, `estado`) VALUES
(1, 'Casa', 'Activo'),
(4, 'Cama', 'Activo'),
(5, 'Choza', 'Activo'),
(6, 'Galpón ', 'Activo'),
(7, 'Hostel', 'Activo'),
(8, 'Departamento', 'Activo'),
(9, 'Yate', 'Activo'),
(10, 'Catamaran', 'Activo'),
(11, 'Quincho', 'Inactivo'),
(12, 'Habitacion', 'Activo'),
(13, 'Mansion', 'Activo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `apellido` varchar(40) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `telefono` bigint(40) NOT NULL,
  `nacimiento` varchar(12) NOT NULL,
  `clave` varchar(20) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `tipo` char(2) NOT NULL,
  `id_nro_inscripcion` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `correo` varchar(100) NOT NULL,
  PRIMARY KEY (`id_usuario`),
  UNIQUE KEY `id_nro_inscripcion_3` (`id_nro_inscripcion`),
  KEY `id_nro_inscripcion` (`id_nro_inscripcion`),
  KEY `id_nro_inscripcion_2` (`id_nro_inscripcion`),
  KEY `id_usuario` (`id_usuario`),
  FULLTEXT KEY `correo` (`correo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre`, `apellido`, `telefono`, `nacimiento`, `clave`, `tipo`, `id_nro_inscripcion`, `id_usuario`, `correo`) VALUES
('Mariana', 'Robles', 2216548536, '1993-06-08', '1234', '', NULL, 2, 'marianarobles@hotmail.com'),
('Manuel', 'Rigonat', 2214276928, '1994-12-16', '1234', '', 26, 3, 'manuelrigonat@hotmail.com'),
('Juan', 'Perez', 2214739832, '1965-12-12', '1234', '', 14, 4, 'juanito@hotmail.com'),
('Roberto', 'Carlos', 22138941375, '1978-05-28', 'carlos', '', 18, 5, 'vas@hotmail.com'),
('Jonathan', 'Sabando', 876579033, '1994-02-12', 'jonathan', '', NULL, 6, 'jonathansabando@hotmail.com'),
('Facundo', 'Diaz', 47345782, '1995-01-25', 'facundo', '', 30, 10, 'facundodiaz@hotmail.com'),
('Emiliana', 'Corbatta', 2314576294, '1995-03-31', 'emiliana', '', NULL, 11, 'emiliana.corbatta@hotmail.com'),
('Julia', 'Miranda', 1149096217, '1988-08-20', 'julia', '', NULL, 12, 'camilamiranda@hotmail.com'),
('Marina', 'Ortu', 2214687520, '1977-06-21', 'marina', '', 17, 13, 'marinaortu@hotmail.com'),
('Marcelo', 'Ruffolo', 1324356, '1986-01-01', 'marcelo', '', NULL, 14, 'marceloruffolo@hotmail.com'),
('Emilia', 'Rodriguez', 1147036495, '1969-08-08', 'emilia', '', 24, 15, 'emiliarodriguez25@hotmail.com'),
('Emilio', 'Roberto', 198196, '1993-07-11', 'aosndoi', '', NULL, 17, 'emilioroberto@hotmail.com'),
('Soledad', 'Villalba', 2218399476, '1984-04-23', 'soledad', '', NULL, 18, 'soledadvillalba@hotmail.com'),
('Cristian', 'Barreto', 2216020066, '1994-06-17', '1234', '', 31, 19, 'cristian.csl@hotmail.com');

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
