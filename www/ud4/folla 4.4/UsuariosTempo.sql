-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: dbXdebug
-- Tiempo de generación: 21-01-2025 a las 12:03:35
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
-- Base de datos: `UsuariosApp`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `UsuariosTempo`
--

CREATE TABLE `UsuariosTempo` (
  `nome` varchar(40) NOT NULL,
  `passwd` varchar(255) DEFAULT NULL,
  `ultimaconexion` datetime DEFAULT NULL,
  `rol` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `UsuariosTempo`
--

INSERT INTO `UsuariosTempo` (`nome`, `passwd`, `ultimaconexion`, `rol`) VALUES
('andres', '$2y$10$q04Izk6oJ95dkf02koqa3eSqCliFn92GtUAz82wk6Y59drhexpF82', '2025-01-21 11:43:52', 'administrador'),
('efren', '$2y$10$qB3g/27Izn/rah.ynpmcZOQKB/GJ7h/Az2dGKH7.nCFoKbTAyUMHG', '2025-01-21 11:45:03', 'administrador'),
('jose', '$2y$10$/qOt1X/XYQk6u2saeUno/OU/tn.t/NPTu7kAoJIJ0NhBxKO9OeT9a', '2025-01-21 11:20:04', 'administrador'),
('lola', '$2y$10$PjlMkoBDilull3jinDaT7.1kZ1J2RxA/G3D8tECJucbf8pAhg7Biy', '2025-01-21 11:59:18', 'usuario'),
('lore', '$2y$10$/v7h0sNSZzDZocw3mdoDvON4QdC8L2mOxs/AAGSmJTQjuq/kFPZU.', '1970-01-01 00:00:00', 'administrador'),
('tomas', '$2y$10$LrBfSy7UY9cDEFnAyvTeQ.PM15XAa1rTg4V1c6cUu/0ujMm/jWa/q', '2025-01-21 11:44:20', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `UsuariosTempo`
--
ALTER TABLE `UsuariosTempo`
  ADD PRIMARY KEY (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
