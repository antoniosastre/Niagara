-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:8889
-- Tiempo de generación: 25-06-2014 a las 00:21:51
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.5.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `notas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hthelp_prio_color`
--

CREATE TABLE `hthelp_prio_color` (
  `id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `color` varchar(8) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `hthelp_prio_color`
--

INSERT INTO `hthelp_prio_color` (`id`, `color`) VALUES
(1, '#eee'),
(2, '#ccffcc'),
(3, '#aaccff'),
(4, '#ffff66'),
(5, '#ff9933'),
(6, '#ff2222');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mat_cddvd`
--

CREATE TABLE `mat_cddvd` (
  `id` int(2) unsigned NOT NULL AUTO_INCREMENT,
  `tipo` int(1) NOT NULL,
  `nombre` varchar(40) NOT NULL DEFAULT '',
  `desc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `mat_cddvd`
--

INSERT INTO `mat_cddvd` (`id`, `tipo`, `nombre`, `desc`) VALUES
(1, 0, 'CD Norm', 'CD Normal'),
(2, 0, 'CD Imp', 'CD Imprimible'),
(3, 1, 'DVD5 Norm', 'DVD 4''7 GB Normal'),
(4, 1, 'DVD5 Imp', 'DVD 4''7 GB Imprimible'),
(5, 1, 'DVD9 Norm', 'DVD 9''4 GB Normal'),
(6, 1, 'DVD9 Imp', 'DVD 9''4 GB Imprimible'),
(7, 2, 'CD Fat Negro', 'Caja de CD normal negra'),
(8, 2, 'CD Slim Negro', 'Caja de CD fina negra'),
(9, 2, 'CD Fat Cristal', 'Caja de CD normal transparente'),
(10, 2, 'CD Slim Cristal', 'Caja de CD fina transparente'),
(11, 2, 'DVD Fat Negro', 'Caja de DVD normal negra'),
(12, 2, 'DVD Slim Negro', 'Caja de DVD fina negra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notas`
--

CREATE TABLE `notas` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT COMMENT 'Id del trabajo',
  `isediting` tinyint(1) NOT NULL DEFAULT '1',
  `prioridad` int(2) unsigned NOT NULL COMMENT 'Prioridad de la nota',
  `trabajo` varchar(50) NOT NULL COMMENT 'Nombre del trabajo',
  `fecha_in` date NOT NULL COMMENT 'Fecha de entrada',
  `fecha_out` date DEFAULT NULL COMMENT 'Fecha de salida',
  `cliente` varchar(100) DEFAULT NULL COMMENT 'Id del cliente',
  `notacliente` varchar(250) DEFAULT NULL,
  `nota_gen` varchar(250) DEFAULT NULL COMMENT 'Notas Generales',
  `nota_imp` varchar(250) DEFAULT NULL COMMENT 'Notas de Impresión',
  `nota_man` varchar(250) DEFAULT NULL COMMENT 'Notas de Manipulado',
  `nota_ent` varchar(250) DEFAULT NULL COMMENT 'Notas de Entrega',
  `precio` decimal(7,2) DEFAULT NULL COMMENT 'Precio del trabajo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `notas`
--

INSERT INTO `notas` (`id`, `isediting`, `prioridad`, `trabajo`, `fecha_in`, `fecha_out`, `cliente`, `notacliente`, `nota_gen`, `nota_imp`, `nota_man`, `nota_ent`, `precio`) VALUES
(1, 0, 1, 'Carteles Semana Santa', '2014-04-01', '2014-04-05', 'Hermandad de Nazarenos', 'Teléfono 956000000', 'Tiene que quedar perfecto.', 'Que queden bien los colores.', 'Cortar a sangre.', 'Recoger en el taller.', 25.20),
(2, 1, 2, 'Semana del Arte Étnico', '2014-04-09', '2014-04-12', 'Asociación Cultural Genérica', 'No', NULL, NULL, NULL, 'Todo guay.', 20.45),
(3, 0, 1, 'Marcha Comisiones', '2014-04-10', '2014-04-12', 'CC.OO.', NULL, NULL, NULL, NULL, NULL, NULL),
(4, 0, 1, 'Encuentro Jóvenes', '2014-04-20', '2014-04-22', 'Caballas', NULL, NULL, NULL, NULL, NULL, NULL),
(5, 0, 2, 'Presentación del libro', '2014-05-03', '2014-05-10', 'Biblioteca', NULL, NULL, NULL, NULL, NULL, NULL),
(6, 0, 1, 'Acto Ayuntamiento', '2014-05-10', '2014-05-12', 'Ayuntamiento', NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_anapurna`
--

CREATE TABLE `trab_anapurna` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `material` varchar(50) DEFAULT '',
  `cantidad` int(6) unsigned DEFAULT NULL,
  `tamano` varchar(50) DEFAULT NULL,
  `coment` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nota` (`nota`),
  KEY `papel` (`material`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `trab_anapurna`
--

INSERT INTO `trab_anapurna` (`id`, `nota`, `nombre`, `material`, `cantidad`, `tamano`, `coment`) VALUES
(2, 1, NULL, '1', 2, '30x40', 'Imagen de la virgen');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_cddvd`
--

CREATE TABLE `trab_cddvd` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `tipo` tinyint(1) DEFAULT NULL,
  `cantidad` int(6) unsigned DEFAULT NULL,
  `soporte` int(2) unsigned DEFAULT NULL,
  `estuche` int(2) unsigned DEFAULT NULL,
  `master` varchar(50) DEFAULT '',
  `galleta` varchar(50) DEFAULT '',
  `coment` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nota` (`nota`),
  KEY `soporte` (`soporte`),
  KEY `estuche` (`estuche`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `trab_cddvd`
--

INSERT INTO `trab_cddvd` (`id`, `nota`, `nombre`, `tipo`, `cantidad`, `soporte`, `estuche`, `master`, `galleta`, `coment`) VALUES
(1, 2, NULL, 1, 100, NULL, NULL, '1', '1', 'Grabar a 6x');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_coloca`
--

CREATE TABLE `trab_coloca` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `direccion` varchar(200) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(50) DEFAULT NULL,
  `coment` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nota` (`nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_dise`
--

CREATE TABLE `trab_dise` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `coment` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nota` (`nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_exter`
--

CREATE TABLE `trab_exter` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `cantidad` int(10) unsigned DEFAULT NULL,
  `coment` varchar(500) DEFAULT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `datos_empr` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nota` (`nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_imp`
--

CREATE TABLE `trab_imp` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `papel` varchar(50) DEFAULT '',
  `cantidad` int(10) unsigned DEFAULT NULL,
  `tamano` varchar(50) DEFAULT NULL,
  `color_a` int(1) unsigned DEFAULT NULL,
  `color_b` int(1) unsigned DEFAULT NULL,
  `duplex` tinyint(1) unsigned DEFAULT '0',
  `manipulacion` varchar(300) DEFAULT '',
  `coment` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nota` (`nota`),
  KEY `papel` (`papel`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `trab_imp`
--

INSERT INTO `trab_imp` (`id`, `nota`, `nombre`, `papel`, `cantidad`, `tamano`, `color_a`, `color_b`, `duplex`, `manipulacion`, `coment`) VALUES
(1, 1, NULL, '3', 200, 'A3+', NULL, NULL, 0, '', 'Carteles'),
(2, 2, NULL, '2', 100, 'A4/A5', NULL, NULL, 0, '', 'Folletos'),
(3, 1, NULL, '3', 500, 'A4', NULL, NULL, 0, '', 'Carteles 2'),
(4, 2, NULL, '3', 1, 'Desconocido', NULL, NULL, 0, '', 'Esto tiene muchíííísimos espacios. Incluso este  espacio doble.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_otro`
--

CREATE TABLE `trab_otro` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `coment` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_plotter`
--

CREATE TABLE `trab_plotter` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `soporte` varchar(50) DEFAULT '',
  `cantidad` int(8) unsigned DEFAULT NULL,
  `tamano` varchar(50) DEFAULT NULL,
  `acabado` varchar(300) DEFAULT NULL,
  `coment` varchar(500) DEFAULT '',
  PRIMARY KEY (`id`),
  KEY `nota` (`nota`),
  KEY `papel` (`soporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_rotula`
--

CREATE TABLE `trab_rotula` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `coment` varchar(800) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nota` (`nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_sublim`
--

CREATE TABLE `trab_sublim` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `soporte` varchar(50) DEFAULT NULL,
  `cantidad` int(4) unsigned DEFAULT NULL,
  `coment` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `nota` (`nota`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trab_vcorte`
--

CREATE TABLE `trab_vcorte` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `nota` int(6) unsigned NOT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `soporte` varchar(50) DEFAULT '',
  `color` varchar(50) DEFAULT '',
  `cantidad` int(8) unsigned DEFAULT NULL,
  `tamano` varchar(50) DEFAULT NULL,
  `coment` varchar(500) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `nota` (`nota`),
  KEY `papel` (`soporte`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `trab_anapurna`
--
ALTER TABLE `trab_anapurna`
  ADD CONSTRAINT `trab_anapurna_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trab_cddvd`
--
ALTER TABLE `trab_cddvd`
  ADD CONSTRAINT `trab_cddvd_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `trab_cddvd_ibfk_2` FOREIGN KEY (`soporte`) REFERENCES `mat_cddvd` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  ADD CONSTRAINT `trab_cddvd_ibfk_3` FOREIGN KEY (`estuche`) REFERENCES `mat_cddvd` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `trab_coloca`
--
ALTER TABLE `trab_coloca`
  ADD CONSTRAINT `trab_coloca_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trab_dise`
--
ALTER TABLE `trab_dise`
  ADD CONSTRAINT `trab_dise_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trab_exter`
--
ALTER TABLE `trab_exter`
  ADD CONSTRAINT `trab_exter_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trab_imp`
--
ALTER TABLE `trab_imp`
  ADD CONSTRAINT `trab_imp_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trab_plotter`
--
ALTER TABLE `trab_plotter`
  ADD CONSTRAINT `trab_plotter_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trab_rotula`
--
ALTER TABLE `trab_rotula`
  ADD CONSTRAINT `trab_rotula_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trab_sublim`
--
ALTER TABLE `trab_sublim`
  ADD CONSTRAINT `trab_sublim_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `trab_vcorte`
--
ALTER TABLE `trab_vcorte`
  ADD CONSTRAINT `trab_vcorte_ibfk_1` FOREIGN KEY (`nota`) REFERENCES `notas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
