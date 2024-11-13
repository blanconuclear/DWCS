-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: dbXDebug
-- Tiempo de generación: 13-11-2024 a las 10:18:43
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
(13, 'andres', 'andres@hotmail.com', '$2y$10$BbPw4tbI/ggiPLhA8KqeAuTFrCVE/LbjCYSKvtGQzAfCmHNhCDL3e'),
(14, 'lore', 'lore@pesa.com', '$2y$10$qb1duCh5RD5sKbgbnJ5AnOzl2yrbCL.hOaarOD62ukSDz7NiNDE0W'),
(15, 'prueba', 'prueba@prueba.com', '$2y$10$ljm00RyyDPdLClT0o8m0JeI/caciapzCmnuwlNfBxBH/bdW6.4qLC'),
(16, 'prueba2', 'prueba2@hotmail.com', '$2y$10$WFISfUp2KA0xp4GVDYDD7O3JZ4kV62n6HU6ShFa.bAoxR7bww6oSi'),
(17, 'prueba2', 'prueba2@hotmail.com', '$2y$10$4YnTKXmv/iiLbBZGEKub8OuENNkmqivfmlCP/rnzEvf.pB9XkIVjm'),
(18, 'prueba2', 'prueba2@hotmail.com', '$2y$10$5VYX.nJingCz652YaJK.F.CwFj5WxgkIzbUpabqe14qSRAdj9USwu'),
(19, 'prueba4', 'prueba4@prueba.com', '$2y$10$f5lT.RKY9VCEelS0bnNsXO9PadbnRhi.JYksd3.fHZ10IVPsUP/Oq'),
(20, 'prueba5', 'prueba5@hotmail.com', '$2y$10$NuO2hAGUy5DDhmtUSTHKWeDqJWCG2w1r6QThEWClo0vOxr5bz9RRa'),
(22, 'root', 'root@root.com', '$2y$10$8/EDpMob7cAYe2H81SUvMeqyjQfj4ti.5kjVMZheRzxmzx9BLeJ0i');

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
(43, 'wwww', 'wwww', 13),
(44, 'prueba', 'prueba', 13),
(45, 'aaaaaa', 'aaaaaa', 22);

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `tarea`
--
ALTER TABLE `tarea`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
