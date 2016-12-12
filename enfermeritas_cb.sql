-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-08-2016 a las 10:06:40
-- Versión del servidor: 5.6.26-cll-lve
-- Versión de PHP: 5.4.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `enfermeritas_cb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `acceso`
--

CREATE TABLE IF NOT EXISTS `acceso` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `prefijo` varchar(3) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=59 ;

--
-- Volcado de datos para la tabla `acceso`
--

INSERT INTO `acceso` (`id`, `prefijo`, `usuario`, `email`, `pass`) VALUES
(57, 'ADM', 'IvanRios', 'ivriosg@gmail.com', '*IvanRios1989'),
(58, 'COL', 'rbnaless', 'ruben.sanchez@metrics.digital', 'Revolver#22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `columnista`
--

CREATE TABLE IF NOT EXISTS `columnista` (
  `tema` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `columnista`
--

INSERT INTO `columnista` (`tema`, `email`) VALUES
('dweiduwh', 'creador_prueba@email.com'),
('dweiduwh', 'creador_prueba@email.com'),
('kjkhkjh', 'yeikelectro@gmail.com'),
('kjkhkjh', 'yeikelectro@gmail.com'),
('richard', 'arturomorenod@gmail.com'),
('holasss', 'creador_prueba@email.com'),
('cshiduh', 'creador_prueba@email.com'),
('csiducs', 'yeikelectro@gmail.com'),
('deiuweiudewuiew', 'creador_prueba@email.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `columnista_tema`
--

CREATE TABLE IF NOT EXISTS `columnista_tema` (
  `tema` varchar(30) NOT NULL,
  `descripcion` varchar(30) NOT NULL,
  `empresa` varchar(30) NOT NULL,
  `autor` varchar(30) NOT NULL,
  `fecha` varchar(30) NOT NULL,
  `hora` varchar(30) NOT NULL,
  `asignado` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `columnista_tema`
--

INSERT INTO `columnista_tema` (`tema`, `descripcion`, `empresa`, `autor`, `fecha`, `hora`, `asignado`) VALUES
('tema', 'descripcion', 'cliente', 'yo mero', 'eheh', '4343', 'enfermera');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empresa`
--

CREATE TABLE IF NOT EXISTS `empresa` (
  `id_empresa` int(10) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `empresa` varchar(20) NOT NULL,
  `tipo_empresa` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `movil` int(15) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `telefono` int(15) NOT NULL,
  `solucion` varchar(20) NOT NULL,
  `formato` varchar(20) NOT NULL,
  `publicacion` varchar(50) NOT NULL,
  PRIMARY KEY (`id_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=250 ;

--
-- Volcado de datos para la tabla `empresa`
--

INSERT INTO `empresa` (`id_empresa`, `nombre`, `apellido`, `empresa`, `tipo_empresa`, `email`, `movil`, `pais`, `telefono`, `solucion`, `formato`, `publicacion`) VALUES
(160, '', '', '', '', 'empresa@email.com', 0, '', 0, 'microblogging', 'texto', 'diaria'),
(209, 'Arturo', 'Moreno Doratnes', 'Metrics', 'selecciona', 'arturo.moreno@metrics.digital', 1847782364, 'selecciona', 239814798, 'microblogging', 'imagen', 'on'),
(210, 'lizeth', 'Aguirre', 'index', 'recursos humanos', 'kalisa_1@hotmail.com', 28423897, 'angula', 23921838, 'webinar', 'texto', ''),
(227, 'Ruben Sanchez Colin', 'Tech', 'Tech', 'Atencion_clientes', 'ruben.sanchez@metrics.digital', 262727, 'AI', 288118821, 'microblogging', 'multimedia', ''),
(228, 'Rodolfo', 'Galvan', 'Rudy', 'Atencion_clientes', '', 2147483647, 'MX', 56794466, '', '', ''),
(229, 'Ivan', 'Ross', 'metrics', 'ConstrucciÃ³n', 'trikodmf@gmail.com', 1212321322, 'MX', 2147483647, 'blog', 'video', ''),
(230, 'dsdasdas|', 'fasfa', 'metric', 'Atencion_clientes', 'qwdd@fins.com', 2147483647, 'DZ', 2147483647, 'blog', 'audio', ''),
(231, 'Rodolfo', 'Rivera', 'Videosssss', 'Comercio exterior', 'rodolfo.galvan@metrics.digital', 2147483647, 'selecciona', 56794466, 'articulos', 'texto', ''),
(232, 'Arturo', 'Moreno Doratnes', 'Metrics', 'selecciona', 'arturo.moreno@metrics.digital', 1847782364, 'selecciona', 239814798, 'articulos', 'audio', ''),
(233, 'Rodolfo', 'Rivera', 'Videosssss', 'Comercio exterior', 'rodolfo.galvan@metrics.digital', 2147483647, 'selecciona', 56794466, 'blog', 'texto', ''),
(234, 'Raul', 'Castro Gonzalez', 'Kinkas', 'Telemarketing', 'rene.ramos@metrics.digital', 2147483647, 'MX', 56026544, 'articulos', 'texto', ''),
(235, 'Arturo', 'Moreno', 'Metrics', 'Comercio exterior', 'arturo.moreno@metrics.digital', 0, 'BS', 0, 'blog', 'texto', ''),
(239, 'Gerardo ', 'Rios', 'Metrics', 'Telemarketing', 'trikodmf@gmail.com', 2147483647, 'AL', 2147483647, 'blog', 'imagen', ''),
(240, 'Prueba', 'Empresa', 'Empresa Prueba', 'Logistica', 'prueba_empresa@email.com', 53262727, 'AF', 73736352, 'microblogging', 'multimedia', ''),
(241, 'Prueba', 'Empresa', 'Empresa Prueba', 'Logistica', 'prueba_empresa@email.com', 53262727, 'AF', 73736352, 'microblogging', 'multimedia', ''),
(242, 'Prueba', 'Empresa', 'Empresa Prueba', 'Logistica', 'prueba_empresa@email.com', 53262727, 'AF', 73736352, 'microblogging', 'multimedia', ''),
(243, 'Ivan', 'rios', 'Metrics', 'Comercio exterior', 'trikodmf@gmail.com', 2147483647, 'AS', 2147483647, 'webinar', 'video', ''),
(244, 'Larry', 'KaÃ±onga', 'La Que Buena', 'Comunicacion', 'larry@megustatumama.org', 0, 'AG', 0, 'microblogging', 'multimedia', ''),
(248, '', '', '', '', '', 0, '', 0, '', '', ''),
(249, 'puberto', 'perru', 'kjkljl', 'Logistica', 'perro@gmail.com', 87987, 'AL', 987897987, 'microblogging', 'imagen', 'on');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `prefijo` varchar(3) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=268 ;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `prefijo`, `nombre`, `apellido`, `email`) VALUES
(266, 'ADM', 'Ivan', 'Rios', 'ivriosg@gmail.com'),
(267, 'COL', 'RubÃ©n', 'SÃ¡nchez', 'ruben.sanchez@metrics.digital');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
