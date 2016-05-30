-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-05-2016 a las 19:25:20
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 7.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `clave`, `email`) VALUES
(2, 'limonconsal', 'lanner@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Couch`
--

CREATE TABLE `Couch` (
  `id_couch` int(100) NOT NULL,
  `descripcion` text NOT NULL,
  `lugar` varchar(100) NOT NULL,
  `capacidad` varchar(100) NOT NULL,
  `disponibilidad` varchar(100) NOT NULL,
  `fecha` datetime(6) NOT NULL,
  `idUsuario` varchar(90) NOT NULL,
  `idTipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `idEstado` int(11) NOT NULL,
  `estado` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `foto`
--

CREATE TABLE `foto` (
  `idFotos` int(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `id_couch` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `preguntasRespuestas`
--

CREATE TABLE `preguntasRespuestas` (
  `idPregRta` int(100) NOT NULL,
  `coment` varchar(100) NOT NULL,
  `tipo` char(1) NOT NULL,
  `idUsuario` varchar(90) NOT NULL,
  `idCouch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puntuacion`
--

CREATE TABLE `puntuacion` (
  `puntuacion` int(5) NOT NULL,
  `comentario` text NOT NULL,
  `idPuntuacion` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `id_reserva` int(100) NOT NULL,
  `id_couch` int(100) NOT NULL,
  `capac` int(100) NOT NULL,
  `fecha_inicio` int(100) NOT NULL,
  `fecha_fin` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `idTarifa` int(100) NOT NULL,
  `nroTarjeta` varchar(100) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_couch`
--

CREATE TABLE `tipo_couch` (
  `id_tipo` int(100) NOT NULL,
  `nombreTipo` varchar(100) NOT NULL,
  `visible` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(100) NOT NULL,
  `apeynombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `sexo` char(1) NOT NULL,
  `nacionalidad` varchar(100) NOT NULL,
  `fecha_de_nacimiento` varchar(90) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `premiun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `apeynombre`, `email`, `sexo`, `nacionalidad`, `fecha_de_nacimiento`, `telefono`, `clave`, `premiun`) VALUES
(9, 'Angelica Gomez', 'a@gomez.com', 'M', 'argentina', '05/16/2016', '232323', 'sandia', 0),
(4, 'Camila Miranda', 'camimiranda95@gmail.com', '', 'Boliviana', '9999999', '1569140130', 'limon', 0),
(6, 'lore', 'hola@gmail.com', '', 'eweqe', 'we', 'we', 'weqwe', 0),
(1, 'www', 'lore.-br@hotmail.com', '', 'wwww', 'w', 'ww', 'w', 0),
(3, 'lore', 'lore@hotmail.com', '', 'w', 'w', 'w', 'w', 0),
(8, 'Natalia', 'nati@oortutu.com', 'H', 'dfdsf', 'sdsd', '23221', 'lore', 0),
(5, 'Nati', 'nati@ortu.com', '', 'qwqw', 'qwqw', 'we|we', 'wqw', 0),
(7, 'zapato', 'zapato@zapato.com', '', '', '3323', '23', 'violeta', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `Couch`
--
ALTER TABLE `Couch`
  ADD UNIQUE KEY `id_couch` (`id_couch`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`idEstado`);

--
-- Indices de la tabla `foto`
--
ALTER TABLE `foto`
  ADD KEY `idFotos` (`idFotos`);

--
-- Indices de la tabla `preguntasRespuestas`
--
ALTER TABLE `preguntasRespuestas`
  ADD PRIMARY KEY (`idPregRta`);

--
-- Indices de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  ADD PRIMARY KEY (`idPuntuacion`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD KEY `id_reserva` (`id_reserva`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD KEY `idTarifa` (`idTarifa`);

--
-- Indices de la tabla `tipo_couch`
--
ALTER TABLE `tipo_couch`
  ADD KEY `id_tipo` (`id_tipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`email`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `id_administrador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `Couch`
--
ALTER TABLE `Couch`
  MODIFY `id_couch` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `idEstado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `foto`
--
ALTER TABLE `foto`
  MODIFY `idFotos` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `preguntasRespuestas`
--
ALTER TABLE `preguntasRespuestas`
  MODIFY `idPregRta` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `puntuacion`
--
ALTER TABLE `puntuacion`
  MODIFY `idPuntuacion` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id_reserva` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tipo_couch`
--
ALTER TABLE `tipo_couch`
  MODIFY `id_tipo` int(100) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
