-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: db
-- Xerado en: 13 de Dec de 2021 ás 11:13
-- Versión do servidor: 8.0.27
-- Versión do PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `maqueta`
--

-- --------------------------------------------------------

--
-- Estrutura da táboa `naves`
--

CREATE TABLE `naves` (
  `nome` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `prezo` int NOT NULL,
  `alugado` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `nomeImaxe` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8_spanish_ci;

--
-- A extraer os datos da táboa `naves`
--

INSERT INTO `naves` (`nome`, `prezo`, `alugado`, `nomeImaxe`) VALUES
('Berna-1', 600, 'si', 'Berna-1.jpg'),
('Discovery-1', 600, 'si', 'Discovery-1.jpg'),
('Moscova-1', 550, 'si', 'Moscova-1.jpg'),
('Serenity', 800, 'non', 'erenity.jpg'),
('StarShip', 500, 'non', 'StarShip.jpg'),
('USS-Enterprise', 400, 'non', 'USS-Enterprise.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `naves`
--
ALTER TABLE `naves`
  ADD PRIMARY KEY (`nome`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
