-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-06-2018 a las 03:00:15
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascota`
--

CREATE TABLE `mascota` (
  `idmascota` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `nacimiento` date DEFAULT NULL,
  `raza` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `peso` float DEFAULT NULL,
  `sexo` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `talla` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `color` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `mascota`
--

INSERT INTO `mascota` (`idmascota`, `nombre`, `nacimiento`, `raza`, `peso`, `sexo`, `talla`, `color`) VALUES
(1, 'luna', '0000-00-00', 'pibull', 30, 'Hembra', 'grande', 'negro'),
(2, 'candy', '2018-06-03', 'pibull', 23, 'Macho', 'mediana', 'negro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `idpropietario` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `documento` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `correo` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`idpropietario`, `nombre`, `documento`, `telefono`, `correo`) VALUES
(1, 'Abelardo', '1059448', '3192581093', 'abelardo@gmail.com'),
(2, 'Jhony', '123', '12345', 'jhony@gmail.com'),
(3, 'Alfredo', '15424523', '323', 'abelardo@gmail.com'),
(4, 'Juan', '679', '56757', 'al@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietariomascota`
--

CREATE TABLE `propietariomascota` (
  `idpropmasco` int(11) NOT NULL,
  `idmascota` int(11) DEFAULT NULL,
  `idpropietario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `iduser` int(11) NOT NULL,
  `usuario` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(50) COLLATE utf8_bin DEFAULT NULL,
  `TipoUsuario` varchar(50) COLLATE utf8_bin DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`iduser`, `usuario`, `password`, `TipoUsuario`) VALUES
(1, 'Abelardo', 'Abelardo1', 'user'),
(2, '1', '1', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `mascota`
--
ALTER TABLE `mascota`
  ADD PRIMARY KEY (`idmascota`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`idpropietario`);

--
-- Indices de la tabla `propietariomascota`
--
ALTER TABLE `propietariomascota`
  ADD PRIMARY KEY (`idpropmasco`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`iduser`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `mascota`
--
ALTER TABLE `mascota`
  MODIFY `idmascota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `idpropietario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `propietariomascota`
--
ALTER TABLE `propietariomascota`
  MODIFY `idpropmasco` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `propietariomascota`
--
ALTER TABLE `propietariomascota`
  ADD CONSTRAINT `propietariomascota_ibfk_1` FOREIGN KEY (`idpropmasco`) REFERENCES `propietario` (`idpropietario`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
