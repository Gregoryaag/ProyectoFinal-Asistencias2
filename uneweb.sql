-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 23-10-2023 a las 21:49:59
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `uneweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

DROP TABLE IF EXISTS `categorias`;
CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int NOT NULL AUTO_INCREMENT,
  `nombre_categoria` varchar(45) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`) VALUES
(1, 'Programación'),
(2, 'Mercadeo'),
(3, 'Offimatica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

DROP TABLE IF EXISTS `cursos`;
CREATE TABLE IF NOT EXISTS `cursos` (
  `id_curso` int NOT NULL AUTO_INCREMENT,
  `nombre_curso` varchar(45) NOT NULL,
  PRIMARY KEY (`id_curso`)
) ENGINE=MyISAM AUTO_INCREMENT=53 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id_curso`, `nombre_curso`) VALUES
(1, 'Lógica de Programación'),
(2, 'HTML 5 - Nivel 1'),
(3, 'HTML 5 - Nivel 2'),
(4, 'MySQL - Nivel 1'),
(5, 'PostgreSQL - Nivel 1'),
(6, 'JavaScript - Nivel 1'),
(7, 'JavaScript - Nivel 2'),
(8, 'Python - Nivel 1'),
(9, 'Python - Nivel 2'),
(10, 'Python - Nivel 3'),
(11, 'Python - Nivel 4'),
(12, 'Python - Nivel 5'),
(13, 'Proyecto Final'),
(14, 'PHP - Nivel 1'),
(15, 'PHP - Nivel 2'),
(16, 'PHP - Nivel 3'),
(17, 'PHP - Nivel 4'),
(19, 'JQuery - Nivel 1'),
(20, 'Java SE - Nivel 1'),
(21, 'Java SE - Nivel 2'),
(22, 'Java SE - Nivel 3'),
(23, 'Java SE - Nivel 4'),
(24, 'Java EE - Nivel 1'),
(25, 'Java EE - Nivel 2'),
(26, 'Java EE - Nivel 3'),
(27, 'Java EE - Nivel 4'),
(28, 'Diagramación Digital'),
(29, 'Photoshop - Nivel 1'),
(30, 'Photoshop - Nivel 2'),
(31, 'Illustrator - Nivel 1'),
(32, 'Indesign - Nivel 1'),
(33, 'Animate - Nivel 1'),
(34, '3D - Nivel 1'),
(35, '3D - Nivel 2'),
(36, '3D - Nivel 3'),
(37, 'After Effects - Nivel 1'),
(38, 'After Effects - Nivel 2'),
(39, 'Premiere - Nivel 1'),
(40, 'WordPress - Nivel 1'),
(41, 'WordPress Nivel 2'),
(43, 'Bootstrap - Nivel 1'),
(44, 'Community Manager - Nivel 1'),
(45, 'Community Manager - Nivel 2'),
(46, 'Marketing Digital - Nivel 1'),
(47, 'Comunicación Masiva Email - Nivel 1'),
(48, 'SEO - Nivel 1'),
(49, 'Excel - Nivel 1'),
(50, 'Excel - Nivel 2'),
(51, 'Excel - Nivel 3'),
(52, 'Excel - Nivel 4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diplomados`
--

DROP TABLE IF EXISTS `diplomados`;
CREATE TABLE IF NOT EXISTS `diplomados` (
  `id_diplomado` int NOT NULL AUTO_INCREMENT,
  `nombre_diplomado` varchar(45) NOT NULL,
  PRIMARY KEY (`id_diplomado`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `diplomados`
--

INSERT INTO `diplomados` (`id_diplomado`, `nombre_diplomado`) VALUES
(1, 'Diplomado de Python'),
(2, 'Diplomado de Programación Web'),
(3, 'Diplomado de Java'),
(4, 'Diplomado Web'),
(5, 'Diplomado de Mercadeo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidad`
--

DROP TABLE IF EXISTS `modalidad`;
CREATE TABLE IF NOT EXISTS `modalidad` (
  `id_modalidad` int NOT NULL AUTO_INCREMENT,
  `online` tinyint NOT NULL,
  `presencial` tinyint NOT NULL,
  PRIMARY KEY (`id_modalidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id_rol` int NOT NULL AUTO_INCREMENT,
  `roles` varchar(30) NOT NULL,
  PRIMARY KEY (`id_rol`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `roles`) VALUES
(1, 'Administrador'),
(2, 'Estudiante'),
(3, 'Profesor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

DROP TABLE IF EXISTS `turnos`;
CREATE TABLE IF NOT EXISTS `turnos` (
  `id_turnos` int NOT NULL AUTO_INCREMENT,
  `turnos` varchar(45) NOT NULL,
  PRIMARY KEY (`id_turnos`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`id_turnos`, `turnos`) VALUES
(1, '08:00 a.m - 11:00 a.m'),
(2, '11:00 a.m - 02:00 p.m'),
(3, '02:00 p.m - 05:00 p.m'),
(4, 'Sab 08:00 a.m - 01:00 p.m'),
(5, 'Sab 01:00 p.m - 06:00 p.m');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id_usuario` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `cedula` int NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_sesion` int NOT NULL,
  PRIMARY KEY (`id_usuario`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `cedula`, `fecha_nacimiento`, `status`, `id_sesion`) VALUES
(1, 'Gregory', 'Arteaga', 24210544, '1995-11-14', 1, 1423),
(2, 'Jose', 'Delpino', 14889152, '1980-10-05', 1, 1234),
(3, 'Jose', 'Rivas', 17245711, '1989-09-25', 1, 4321),
(4, 'Jesus', 'Casanova', 28447639, '2000-01-18', 1, 5556),
(5, 'Michael', 'Jordan', 10447125, '1963-02-17', 1, 2323),
(6, 'Lionel', 'Messi', 12778996, '1987-06-24', 1, 1010),
(7, 'Tom', 'Brady', 9104745, '1977-03-08', 1, 1212),
(8, 'Omar', 'Vizquel', 10256478, '1967-04-24', 1, 4242),
(9, 'Manny', 'Pacquiao', 20658923, '1978-12-17', 1, 1717),
(10, 'Michael', 'Phelps', 19475879, '1985-06-30', 1, 3030),
(11, 'Cristiano', 'Ronaldo', 26789147, '1985-05-02', 1, 707),
(12, 'LeBron', 'James', 20750441, '1987-10-16', 1, 606),
(13, 'Deivis', 'Martinez', 23224653, '1994-03-20', 1, 8989),
(14, 'Oliver', 'Andrade', 24639885, '1995-08-06', 1, 2089),
(15, 'Maria', 'Delgado', 30741247, '2000-12-12', 1, 2090),
(16, 'Ana', 'Rodriguez', 28254123, '1998-11-18', 1, 3018),
(17, 'Diana', 'Muria', 31012290, '2003-05-30', 1, 2121),
(18, 'Teresa', 'Chacon', 19442036, '1997-09-01', 1, 2024),
(19, 'Carolina', 'Infante', 21440380, '1990-08-15', 1, 4617),
(20, 'Mia', 'Farias', 19235606, '1991-01-26', 1, 6969),
(21, 'Albert', 'Arteaga', 20714009, '1992-02-15', 1, 2222),
(22, 'Jhosep', 'Ramos', 23112652, '1994-09-22', 1, 101),
(23, 'Erickson', 'Lopez', 26385212, '1997-04-17', 1, 2121),
(24, 'William', 'Martinez', 20889634, '1992-10-22', 1, 1818),
(25, 'Yesmina', 'Moreno', 14203564, '1984-11-06', 1, 3333),
(26, 'wqdeqwdqwdqw', 'dqwdqwdqwd', 0, '2023-10-12', 0, 0),
(27, 'wqdeqwdqwdqw', 'dqwdqwdqwd', 0, '2023-10-12', 0, 0),
(28, 'wqdeqwdqwdqw', 'dqwdqwdqwd', 0, '2023-10-12', 0, 0),
(29, 'jesus', 'alexis', 30999553, '2000-12-11', 0, 0),
(30, 'jesus', 'alexis', 30999553, '2000-12-11', 0, 0),
(31, 'Alejandro', 'Rodriguez', 29887449, '2003-10-09', 0, 0),
(32, 'Alejandro', 'Rodriguez', 29887449, '2003-10-09', 0, 0),
(33, 'Alejandro', 'Rodriguez', 29887449, '2003-10-09', 0, 0),
(34, 'Joseva', 'Legarra', 20714250, '1992-02-18', 0, 0),
(35, 'Joseva', 'Legarra', 20714250, '1992-02-18', 0, 0),
(36, 'Jon', 'Snow', 80778996, '1970-11-10', 0, 0),
(37, 'Jon', 'Snow', 80778996, '1970-11-10', 0, 0),
(38, 'Jaime', 'Lannister', 90774124, '1890-02-18', 0, 0);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
