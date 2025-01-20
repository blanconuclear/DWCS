-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: dbXdebug
-- Tiempo de generación: 18-01-2025 a las 11:17:56
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
-- Base de datos: `rexistro_usuarios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int NOT NULL,
  `nome` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `contrasinal` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `creado_en` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `contrasinal`, `creado_en`) VALUES
(1, 'efren', '$2y$10$LweAlZ/A3yYhvJhnET73E..nvlQq.hDnawHoivncjGYWx47S8QBMu', '2025-01-17 18:17:56'),
(2, 'lore', '$2y$10$TXJOsadkCKzbgEKlc12Rnu1ooVTPcaT6c36CQ2Io6AdwHnp91r5qa', '2025-01-17 18:18:34'),
(3, 'jose', 'abc123.', '2025-01-17 18:21:18'),
(4, 'tomas', '$2y$10$8RBUy5n8mh63GDIHWY4WLOlLDnzJmQenvUiWLG8Shc4DkQ89ddd3.', '2025-01-17 18:21:51'),
(5, 'prueba', '$2y$10$ehgQK37AxMowAJyx4QVvJ.Cn5OlUTdUBp.8WmqnPuQuGsq0Hbvn1W', '2025-01-18 11:12:03');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
