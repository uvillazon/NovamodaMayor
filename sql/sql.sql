-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2015 a las 00:16:07
-- Versión del servidor: 5.5.39
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `novamoda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_proforma`
--

CREATE TABLE IF NOT EXISTS `detalles_proforma` (
`id_detalle` bigint(20) NOT NULL,
  `id_proforma` bigint(20) NOT NULL,
  `fila` int(11) NOT NULL,
  `columna` int(11) NOT NULL,
  `valor` varchar(255) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `detalles_proforma`
--

INSERT INTO `detalles_proforma` (`id_detalle`, `id_proforma`, `fila`, `columna`, `valor`) VALUES
(1, 1, 234, 234234, '234234');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proformas`
--

CREATE TABLE IF NOT EXISTS `proformas` (
`id_proforma` bigint(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `fecha` date NOT NULL,
  `fecha_reg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `responsable` varchar(50) DEFAULT NULL,
  `almacen` varchar(50) DEFAULT NULL,
  `marca` varchar(50) DEFAULT NULL,
  `nombre_archivo` varchar(255) DEFAULT NULL,
  `tipo_archivo` varchar(255) DEFAULT NULL,
  `url_archivo` varchar(255) DEFAULT NULL,
  `nro_factura` varchar(255) DEFAULT NULL,
  `estado` varchar(20) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `proformas`
--

INSERT INTO `proformas` (`id_proforma`, `nombre`, `fecha`, `fecha_reg`, `responsable`, `almacen`, `marca`, `nombre_archivo`, `tipo_archivo`, `url_archivo`, `nro_factura`, `estado`) VALUES
(1, 'aseqweqweq', '0000-00-00', '2015-10-07 13:30:40', 'qweqwewq', 'eqweqweqwe', 'qweqw', 'qweqwe', 'qweqweqwe', 'qweqwe', 'qwe123123123', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalles_proforma`
--
ALTER TABLE `detalles_proforma`
 ADD PRIMARY KEY (`id_detalle`), ADD KEY `id_proforma` (`id_proforma`);

--
-- Indices de la tabla `proformas`
--
ALTER TABLE `proformas`
 ADD PRIMARY KEY (`id_proforma`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalles_proforma`
--
ALTER TABLE `detalles_proforma`
MODIFY `id_detalle` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `proformas`
--
ALTER TABLE `proformas`
MODIFY `id_proforma` bigint(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_proforma`
--
ALTER TABLE `detalles_proforma`
ADD CONSTRAINT `detalles_proforma_ibfk_1` FOREIGN KEY (`id_proforma`) REFERENCES `proformas` (`id_proforma`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
