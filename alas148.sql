-- phpMyAdmin SQL Dump
-- version 4.0.6deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2013 a las 18:14:00
-- Versión del servidor: 5.5.34-0ubuntu0.13.10.1
-- Versión de PHP: 5.5.3-1ubuntu2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `alas148`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `config_id` int(11) NOT NULL,
  `rs` text NOT NULL,
  `dir` text NOT NULL,
  `tel` int(11) NOT NULL,
  `cp` text NOT NULL,
  `cuit` text NOT NULL,
  `email` text NOT NULL,
  `notas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`config_id`, `rs`, `dir`, `tel`, `cp`, `cuit`, `email`, `notas`) VALUES
(1, 'Veterina Sport Center', 'San Pedrito 4874', 46114321, '1406', '51-6125664634-11', 'vete2013@yahoo.com.ar', ''),
(1, 'Veterina Sport Center', 'San Pedrito 4874', 46114321, '1406', '51-6125664634-11', 'vete2013@yahoo.com.ar', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historias`
--

CREATE TABLE IF NOT EXISTS `historias` (
  `veteid` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `texto` longtext NOT NULL,
  `medico` text NOT NULL,
  `vetecol` char(1) NOT NULL DEFAULT '1',
  KEY `veteid` (`veteid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `historias`
--

INSERT INTO `historias` (`veteid`, `fecha`, `texto`, `medico`, `vetecol`) VALUES
(40, '2012-05-30 07:12:58', 'AZAZAAAAAAAAAAAAAA', 'admin', '1'),
(38, '2013-01-26 21:20:51', 'The following list includes the HTML codes for many of the special character symbols used on Web pages. Not all browsers support all the codes, so be sure to test your HTML codes before you use them. You should also use the Unicode character set, and define that in the head of your document', 'admin', '1'),
(40, '2013-03-07 09:34:50', 'En diferentes oportunidades necesitamos grabar lo que estamos haciendo en nuestra pc, ya sea por que estamos realizando videotutoriales, o por que necesitamos recordar ciertos procesos y grabar la pantalla puede ser una gran soluciÃ³n. Hoy quiero recomendar dos aplicaciones que me sacaron de este apuro, de forma rÃ¡pida y segura. ', 'admin', '1'),
(40, '2013-04-07 10:27:12', 'Vino a vacunarse y a hacer un corte felino =)', 'admin', '1'),
(39, '2013-07-13 21:47:17', 'The Sink-Urinal Saves Water, Encourages Men To Wash Hands. The design, called Stand, is already in use in several European countries.', 'alas', '1'),
(40, '2013-02-14 21:47:31', 'The Saves Water, Encourages Men To Wash Hands. The design, called Stand, is already in use in several European countries.', 'alas', '1'),
(40, '2013-07-21 14:29:44', 'La presidenta de Abuelas de Plaza de Mayo sostuvo que los organismos de derechos humanos "confÃ­an en la decisiÃ³n de la Presidenta" de designarlo jefe del EjÃ©rcito. Pero advirtiÃ³ que si la Justicia prueba las acusaciones en su contra "entonces, inmediatamente fuera".', 'admin', '1'),
(40, '2013-08-11 15:35:33', 'Configurar una IP estÃ¡tica en mi red\r\nInstalar programas en una mÃ¡quina sin Internet\r\nPrevisualizar imÃ¡genes en carpetas en Canaima 3.1\r\nBogotÃ¡ tendrÃ¡ su plataforma en Linux y usarÃ¡ software lib\r\nnavegadores para linux\r\nGnome 3 grabar escritorio con RecordMyDesktop\r\nLinux no es feo\r\nDe slacko a manjaro ', 'admin', '1'),
(40, '2013-08-16 21:40:45', 'Los chicos de TorrentFreak contactaron en el pasado a la multinacional para escuchar sus comentarios respecto a las peticiones errÃ³neas de este tipo, recibiendo lo siguiente por respuesta: Â«Microsoft estÃ¡ comprometida a que los derechos de autor sean respetados en lÃ­nea y que las medidas sean apropiadas y precisas. Nosotros y nuestros proveedores usamos varias medidas para verificar la veracidad de la informaciÃ³n contenida en nuestras peticiones DMCA, incluyendo revisiones algorÃ­tmicas y humanasÂ».\r\n', 'alas', '1'),
(40, '2013-08-26 20:35:14', 'El equipo de Evergreen openSUSE se complace en anunciar que openSUSE 13.1\r\nserÃ¡ la prÃ³xima versiÃ³n Evergreen. Esto significa que openSUSE 13.1 se\r\nseguir a un suministro de actualizaciones de seguridad y correcciones de errores importantes\r\nhasta que haya pasado un tiempo de vida de al menos tres aÃ±os.\r\n\r\n\r\nEl equipo de Evergreen openSUSE amplÃ­a la vida Ãºtil de las emisiones de openSUSE\r\nla emisiÃ³n de correcciones de seguridad y estabilidad despuÃ©s de los habituales 18 meses. La\r\nel equipo ha mantenido comunicados seleccionados se mantienen para una adicional y una\r\nmedio a tres aÃ±os. La primera versiÃ³n fue Evergreen openSUSE 11.1.\r\n', 'admin', '1'),
(39, '2013-08-26 20:35:39', 'Versiones actuales en el programa de mantenimiento Evergreen son openSUSE 11.2\r\ndebe mantenerse hasta noviembre de 2013 (un total de 4 aÃ±os) y 11,4 para ser\r\nmantenido hasta julio de 2014 (llegando a mÃ¡s de tres).\r\n\r\nEncuentre mÃ¡s informaciÃ³n acerca de Evergreen y cÃ³mo mantener su openSUSE\r\nliberar vivos en la pÃ¡gina wiki Evergreen:\r\nhttp://en.opensuse.org/openSUSE:Evergreen ', 'admin', '1'),
(42, '2013-08-26 22:12:56', ' La cumbre de desarrolladores de Ubuntu...\r\nLinus celebra los 22 aÃ±os de Linux con un emotivo mensaje\r\nCÃ³mo quitar el ruido en los videos de tus screencasts\r\nGinseng para la duracion de la bateria de tu laptop\r\nLa prÃ³xima versiÃ³n de openSUSE 13.1 serÃ¡ LTS\r\nLinus Torvalds anuncia Linux 3.11 ', 'admin', '1'),
(43, '2013-08-27 08:15:17', 'Mi primera visita', 'admin', '1'),
(41, '2013-08-27 08:18:19', 'Visital semanal', 'admin', '1'),
(40, '2012-05-30 07:12:58', 'AZAZAAAAAAAAAAAAAA', 'admin', '1'),
(38, '2013-01-26 21:20:51', 'The following list includes the HTML codes for many of the special character symbols used on Web pages. Not all browsers support all the codes, so be sure to test your HTML codes before you use them. You should also use the Unicode character set, and define that in the head of your document', 'admin', '1'),
(40, '2013-03-07 09:34:50', 'En diferentes oportunidades necesitamos grabar lo que estamos haciendo en nuestra pc, ya sea por que estamos realizando videotutoriales, o por que necesitamos recordar ciertos procesos y grabar la pantalla puede ser una gran soluciÃ³n. Hoy quiero recomendar dos aplicaciones que me sacaron de este apuro, de forma rÃ¡pida y segura. ', 'admin', '1'),
(40, '2013-04-07 10:27:12', 'Vino a vacunarse y a hacer un corte felino =)', 'admin', '1'),
(39, '2013-07-13 21:47:17', 'The Sink-Urinal Saves Water, Encourages Men To Wash Hands. The design, called Stand, is already in use in several European countries.', 'alas', '1'),
(40, '2013-02-14 21:47:31', 'The Saves Water, Encourages Men To Wash Hands. The design, called Stand, is already in use in several European countries.', 'alas', '1'),
(40, '2013-07-21 14:29:44', 'La presidenta de Abuelas de Plaza de Mayo sostuvo que los organismos de derechos humanos "confÃ­an en la decisiÃ³n de la Presidenta" de designarlo jefe del EjÃ©rcito. Pero advirtiÃ³ que si la Justicia prueba las acusaciones en su contra "entonces, inmediatamente fuera".', 'admin', '1'),
(40, '2013-08-11 15:35:33', 'Configurar una IP estÃ¡tica en mi red\r\nInstalar programas en una mÃ¡quina sin Internet\r\nPrevisualizar imÃ¡genes en carpetas en Canaima 3.1\r\nBogotÃ¡ tendrÃ¡ su plataforma en Linux y usarÃ¡ software lib\r\nnavegadores para linux\r\nGnome 3 grabar escritorio con RecordMyDesktop\r\nLinux no es feo\r\nDe slacko a manjaro ', 'admin', '1'),
(40, '2013-08-16 21:40:45', 'Los chicos de TorrentFreak contactaron en el pasado a la multinacional para escuchar sus comentarios respecto a las peticiones errÃ³neas de este tipo, recibiendo lo siguiente por respuesta: Â«Microsoft estÃ¡ comprometida a que los derechos de autor sean respetados en lÃ­nea y que las medidas sean apropiadas y precisas. Nosotros y nuestros proveedores usamos varias medidas para verificar la veracidad de la informaciÃ³n contenida en nuestras peticiones DMCA, incluyendo revisiones algorÃ­tmicas y humanasÂ».\r\n', 'alas', '1'),
(40, '2013-08-26 20:35:14', 'El equipo de Evergreen openSUSE se complace en anunciar que openSUSE 13.1\r\nserÃ¡ la prÃ³xima versiÃ³n Evergreen. Esto significa que openSUSE 13.1 se\r\nseguir a un suministro de actualizaciones de seguridad y correcciones de errores importantes\r\nhasta que haya pasado un tiempo de vida de al menos tres aÃ±os.\r\n\r\n\r\nEl equipo de Evergreen openSUSE amplÃ­a la vida Ãºtil de las emisiones de openSUSE\r\nla emisiÃ³n de correcciones de seguridad y estabilidad despuÃ©s de los habituales 18 meses. La\r\nel equipo ha mantenido comunicados seleccionados se mantienen para una adicional y una\r\nmedio a tres aÃ±os. La primera versiÃ³n fue Evergreen openSUSE 11.1.\r\n', 'admin', '1'),
(39, '2013-08-26 20:35:39', 'Versiones actuales en el programa de mantenimiento Evergreen son openSUSE 11.2\r\ndebe mantenerse hasta noviembre de 2013 (un total de 4 aÃ±os) y 11,4 para ser\r\nmantenido hasta julio de 2014 (llegando a mÃ¡s de tres).\r\n\r\nEncuentre mÃ¡s informaciÃ³n acerca de Evergreen y cÃ³mo mantener su openSUSE\r\nliberar vivos en la pÃ¡gina wiki Evergreen:\r\nhttp://en.opensuse.org/openSUSE:Evergreen ', 'admin', '1'),
(42, '2013-08-26 22:12:56', ' La cumbre de desarrolladores de Ubuntu...\r\nLinus celebra los 22 aÃ±os de Linux con un emotivo mensaje\r\nCÃ³mo quitar el ruido en los videos de tus screencasts\r\nGinseng para la duracion de la bateria de tu laptop\r\nLa prÃ³xima versiÃ³n de openSUSE 13.1 serÃ¡ LTS\r\nLinus Torvalds anuncia Linux 3.11 ', 'admin', '1'),
(43, '2013-08-27 08:15:17', 'Mi primera visita', 'admin', '1'),
(41, '2013-08-27 08:18:19', 'Visital semanal', 'admin', '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_admin`
--

CREATE TABLE IF NOT EXISTS `login_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(100) DEFAULT NULL,
  `user_pass` varchar(200) DEFAULT NULL,
  `lastin` datetime NOT NULL,
  `tel1` int(11) NOT NULL,
  `tel2` int(11) NOT NULL,
  `dir` text NOT NULL,
  `email` text NOT NULL,
  `mn` text NOT NULL,
  `nombre` text NOT NULL,
  `apellido` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `login_admin`
--

INSERT INTO `login_admin` (`id`, `user_name`, `user_pass`, `lastin`, `tel1`, `tel2`, `dir`, `email`, `mn`, `nombre`, `apellido`) VALUES
(1, 'alas', '30fe61944e1cdd4b81145d87ae2de708', '2013-02-07 08:30:17', 1540906070, 222, 'Espartaco 995', 'alitasd66@hotmail.com', '12451', 'Alejandrita', 'Olafa'),
(2, 'admin', '63a9f0ea7bb98050796b649e85481845', '2013-08-27 08:13:39', 61211412, 1511111, 'Directorio 3033', 'perdi@hotmail.com', '1111', 'Di', 'Perey');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login_logs`
--

CREATE TABLE IF NOT EXISTS `login_logs` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_username` text NOT NULL,
  `log_datetime` datetime NOT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=197 ;

--
-- Volcado de datos para la tabla `login_logs`
--

INSERT INTO `login_logs` (`log_id`, `log_username`, `log_datetime`) VALUES
(144, 'admin', '2013-05-26 16:16:21'),
(145, 'admin', '2013-05-26 17:15:22'),
(146, 'admin', '2013-05-26 20:01:37'),
(147, 'admin', '2013-05-26 20:33:16'),
(148, 'admin', '2013-05-26 20:35:24'),
(149, 'admin', '2013-05-26 20:41:02'),
(150, 'admin', '2013-05-27 07:14:56'),
(151, 'admin', '2013-05-27 20:45:17'),
(152, 'admin', '2013-05-27 21:55:17'),
(153, 'admin', '2013-05-30 07:07:36'),
(154, 'admin', '2013-06-01 18:56:05'),
(155, 'alas', '2013-06-02 10:53:46'),
(156, 'admin', '2013-06-02 13:36:14'),
(157, 'admin', '2013-06-02 19:29:02'),
(158, 'admin', '2013-06-03 08:09:36'),
(159, 'admin', '2013-06-15 13:40:27'),
(160, 'admin', '2013-06-23 21:49:39'),
(161, 'admin', '2013-06-25 21:59:33'),
(162, 'admin', '2013-07-07 10:23:43'),
(163, 'admin', '2013-07-07 10:47:03'),
(164, 'admin', '2013-07-09 18:10:34'),
(165, 'admin', '2013-07-09 19:05:03'),
(166, 'admin', '2013-07-09 19:05:03'),
(167, 'admin', '2013-07-09 21:40:05'),
(168, 'admin', '2013-07-10 22:11:16'),
(169, 'alas', '2013-07-14 21:36:44'),
(170, 'admin', '2013-07-14 22:01:16'),
(171, 'admin', '2013-07-15 06:55:28'),
(172, 'alas', '2013-07-15 06:55:57'),
(173, 'alas', '2013-07-17 21:55:15'),
(174, 'admin', '2013-07-17 23:44:30'),
(175, 'admin', '2013-07-19 01:55:51'),
(176, 'admin', '2013-07-20 08:48:44'),
(177, 'alas', '2013-08-06 03:37:47'),
(178, 'admin', '2013-08-11 15:26:52'),
(179, 'admin', '2013-08-11 16:29:46'),
(180, 'admin', '2013-08-11 19:11:59'),
(181, 'alas', '2013-08-16 21:29:41'),
(182, 'admin', '2013-08-18 12:02:45'),
(183, 'admin', '2013-08-21 08:43:04'),
(184, 'admin', '2013-08-25 10:00:27'),
(185, 'admin', '2013-08-26 20:24:44'),
(186, 'admin', '2013-08-26 21:42:15'),
(187, 'alas', '2013-08-27 07:25:13'),
(188, 'alas', '2013-08-27 07:25:18'),
(189, 'admin', '2013-08-27 07:25:22'),
(190, 'alas', '2013-08-27 07:27:38'),
(191, 'admin', '2013-08-27 07:32:43'),
(192, 'alas', '2013-08-27 08:06:12'),
(193, 'admin', '2013-08-27 08:10:28'),
(194, 'admin', '2013-08-27 08:11:32'),
(195, 'admin', '2013-08-27 08:19:52'),
(196, 'alas', '2013-11-30 18:03:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `peluqueria`
--

CREATE TABLE IF NOT EXISTS `peluqueria` (
  `veteid` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `medico` text NOT NULL,
  `trabajo` text NOT NULL,
  `texto` text NOT NULL,
  `vetecol` char(1) NOT NULL DEFAULT '2',
  KEY `veteid` (`veteid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `peluqueria`
--

INSERT INTO `peluqueria` (`veteid`, `fecha`, `medico`, `trabajo`, `texto`, `vetecol`) VALUES
(40, '2013-06-02 14:34:57', 'admin', 'BaÃ±o', 'V', '2'),
(40, '2013-08-10 10:26:31', 'admin', 'Corte', 'Corte por Caro.', '2'),
(39, '2013-08-11 15:36:44', 'admin', 'Corte', 'corte FLO', '2'),
(42, '2013-08-27 07:30:32', 'alas', 'BaÃ±o', 'J', '2'),
(43, '2013-08-27 08:15:31', 'admin', 'BaÃ±o y Corte', 'peluqueria, corte, baÃ±o, J', '2'),
(40, '2013-08-27 08:16:45', 'admin', 'BaÃ±o', 'bano felino', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas_caninos`
--

CREATE TABLE IF NOT EXISTS `razas_caninos` (
  `raza` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `razas_caninos`
--

INSERT INTO `razas_caninos` (`raza`) VALUES
('beagle'),
('dalmata'),
('caniche'),
('mestizo'),
('ovejero aleman'),
('caniche toy'),
('caniche gigante'),
('Labrador'),
('Schnauzer'),
('Yorkshire Terrier'),
('Pekines'),
('Dogo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas_felinos`
--

CREATE TABLE IF NOT EXISTS `razas_felinos` (
  `raza` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `razas_felinos`
--

INSERT INTO `razas_felinos` (`raza`) VALUES
('siames'),
('mestizo'),
('Persa'),
('Himalayo'),
('Oriental'),
('Siberiano');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas_otros`
--

CREATE TABLE IF NOT EXISTS `razas_otros` (
  `raza` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `razas_otros`
--

INSERT INTO `razas_otros` (`raza`) VALUES
('tortuga'),
('pajaro'),
('conejo'),
('huron');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE IF NOT EXISTS `vacunas` (
  `vacuid` int(11) NOT NULL AUTO_INCREMENT,
  `veteid` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `vacuna` text NOT NULL,
  `medico` text NOT NULL,
  `texto` text NOT NULL,
  `vetecol` char(1) NOT NULL DEFAULT '3',
  `status` text NOT NULL,
  PRIMARY KEY (`vacuid`),
  KEY `veteid` (`veteid`),
  KEY `vacuid` (`vacuid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`vacuid`, `veteid`, `fecha`, `vacuna`, `medico`, `texto`, `vetecol`, `status`) VALUES
(34, 40, '2013-08-25 19:37:34', 'T.FEL', 'admin', 'V', '3', 'AVISADO'),
(35, 40, '2013-07-07 10:26:49', 'SEXT', 'admin', 'Dada por Caro, sin problemas.', '3', ''),
(36, 40, '2013-08-11 15:35:45', 'SEXT', 'admin', 'AD', '3', 'NO RESPONDE'),
(37, 39, '2013-08-26 20:35:47', 'VAR', 'admin', 'AD!', '3', ''),
(38, 42, '2013-08-26 22:12:47', 'VAR+SEXT', 'admin', 'A', '3', ''),
(39, 43, '2013-08-27 08:15:47', 'SEXT', 'admin', 'Alas.', '3', 'AVISADO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vete`
--

CREATE TABLE IF NOT EXISTS `vete` (
  `veteid` int(10) NOT NULL AUTO_INCREMENT,
  `nom` text NOT NULL,
  `ape` text NOT NULL,
  `dir` text NOT NULL,
  `tel1` int(15) NOT NULL,
  `tel2` int(15) NOT NULL,
  `email` text NOT NULL,
  `notas` text NOT NULL,
  `paciente` text NOT NULL,
  `sexo` char(1) NOT NULL,
  `especie` text NOT NULL,
  `raza` text NOT NULL,
  `fechadealta` date NOT NULL,
  `fechanaci` date NOT NULL,
  `esterilizado` char(1) NOT NULL,
  `reproduccion` char(1) NOT NULL,
  `pedigree` char(1) NOT NULL,
  `color` text NOT NULL,
  `peso` int(3) NOT NULL,
  `medico` text NOT NULL,
  `cirugias` text NOT NULL,
  `alimentacion` text NOT NULL,
  `antiparasitarios` text NOT NULL,
  `senias` text NOT NULL,
  `fallecido` char(1) NOT NULL,
  `fechafallecido` date NOT NULL,
  `causafalle` text NOT NULL,
  `lastupdate` datetime NOT NULL,
  PRIMARY KEY (`veteid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Volcado de datos para la tabla `vete`
--

INSERT INTO `vete` (`veteid`, `nom`, `ape`, `dir`, `tel1`, `tel2`, `email`, `notas`, `paciente`, `sexo`, `especie`, `raza`, `fechadealta`, `fechanaci`, `esterilizado`, `reproduccion`, `pedigree`, `color`, `peso`, `medico`, `cirugias`, `alimentacion`, `antiparasitarios`, `senias`, `fallecido`, `fechafallecido`, `causafalle`, `lastupdate`) VALUES
(39, 'Jose', 'Tronko', 'Cretense 5656', 51233131, 1581518571, 'bond777@gmail.com', '', 'Pepe', 'M', 'canino', 'basset hound', '2013-05-26', '2010-07-26', '0', '0', '0', '', 0, 'ADMIN', '', '', '', '', '0', '0000-00-00', 'Auto', '2013-05-26 21:57:44'),
(38, 'Jose', 'Tronko', 'Cretense 5656', 51233131, 1581518571, 'bond777@gmail.com', 'Gato gordooo@!', 'Tinina', 'F', 'canino', 'cocker spaniel ingles', '2013-08-26', '2001-08-01', '1', '0', '0', 'Negra amarronada', 0, 'ADMIN', 'Ninguna', 'DogShow', '', '', '1', '2013-10-01', 'auto', '2013-05-27 08:02:48'),
(40, 'Jose', 'Tronko', 'Cretense 5656', 51233131, 1581518571, 'bond777@gmail.com', '', 'Martuchi', 'M', 'felino', 'meztiza', '2013-05-26', '2006-01-03', '0', '0', '0', 'marron', 3, 'ADMIN', '', '', '', '', '0', '0000-00-00', '', '2013-07-07 10:27:50'),
(41, 'Jose', 'Tronko', 'Cretense 5656', 51233131, 1581518571, 'bond777@gmail.com', 'un perro de pelicula', 'Pluto', 'F', 'canino', 'dalmata', '2013-07-07', '2007-07-15', '1', '1', '1', 'beige', 5, 'ADMIN', 'asd', 'asd', 'asd', 'asd', '0', '0000-00-00', '', '2013-08-26 22:28:03'),
(42, 'Solange', 'Germi', 'suipacha 878', 2147483647, 1581518571, 'soporte@netsol-international.com', '', 'sombra', 'F', 'canino', 'caniche', '2013-08-26', '2011-08-17', '0', '0', '0', 'Rosa', 0, 'admin', '', '', '', '', '0', '0000-00-00', '', '2013-08-26 22:11:46'),
(43, 'diego', 'Jujuy', 'Cretense 5656', 47129812, 1581518571, 'vete2013@yahoo.com.ar', '', 'Pepe', 'M', 'canino', 'dalmata', '2013-08-27', '2008-03-12', '1', '0', '0', 'blanco y negro', 0, 'ADMIN', '', '', '', '', '0', '0000-00-00', '', '2013-08-27 08:18:57'),
(44, 'diego', 'Jujuy', 'Cretense 5656', 47129812, 1581518571, 'vete2013@yahoo.com.ar', '', 'lucila', 'M', 'otros', 'Monita', '2013-08-27', '2010-03-02', '0', '0', '0', '', 0, 'admin', '', '', '', '', '0', '0000-00-00', '', '2013-08-27 08:19:18'),
(45, 'Roberto', 'Gonzales', 'Bolivia 666', 1236112, 25123534, 'dd@bolivia.net', 'Canta bonito', 'Perejil', 'F', 'otros', 'pajaro', '2013-11-30', '2010-11-08', '0', '0', '0', 'azul turquesa', 0, 'alas', '', '', '', '', '0', '0000-00-00', '', '2013-11-30 18:11:37');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
