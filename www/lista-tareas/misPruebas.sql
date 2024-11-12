-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: dbXDebug
-- Tiempo de generación: 12-11-2024 a las 14:55:25
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `misPruebas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `mail` varchar(200) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id`, `nombre`, `mail`, `pass`) VALUES
(1, '', 'azak4@hotm.es', '1234'),
(2, 'lorena', 'lore@mail.com', '1234'),
(11, 'pepe', 'pepe@hotmail.com', '$2y$10$sSVeK7Edr5rKXdPCNeCy/.MoBTYugum2VXvG6oi9Txxp9hgMYxnS2'),
(8, 'jose', 'jose@hot.com', '12345'),
(9, 'andres', 'andres@prueba.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(10, 'andres', 'andres@prueba.com', '827ccb0eea8a706c4c34a16891f84e7b'),
(12, 'tomas', 'tomas@hotmail.com', '$2y$10$y5ODHb0P5prb6s/L5IPyYeFfDOikYXotoS2ltCl7biqTeA7aWXYvK'),
(13, 'andres', 'andres@hotmail.com', '$2y$10$BbPw4tbI/ggiPLhA8KqeAuTFrCVE/LbjCYSKvtGQzAfCmHNhCDL3e');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE `tarea` (
  `id` int NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `tarea` varchar(200) NOT NULL,
  `user_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id`, `titulo`, `tarea`, `user_id`) VALUES
(2, 'prueba_tarea', 'texto_prueba_tarea', 0),
(3, 'prueba_titulo', 'pruebaaaa', 0),
(5, 'hacer comida', 'pizza', 0),
(7, 'deberes', 'mates', 0),
(8, 'deberes', 'mates', 0),
(10, 'prueba_tomas', 'prueba_tomas', 12),
(11, 'andres_prueba', 'andres_prueba_texto', 13);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarea`
--
ALTER TABLE `tarea`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
