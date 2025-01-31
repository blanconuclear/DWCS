-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: dbXdebug
-- Tiempo de generación: 31-01-2025 a las 10:02:43
-- Versión del servidor: 9.0.1
-- Versión de PHP: 8.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tarefa4.7`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `idProduto` int NOT NULL,
  `Comentario` text NOT NULL,
  `dataCreacion` datetime DEFAULT CURRENT_TIMESTAMP,
  `dataModeracion` datetime DEFAULT NULL,
  `moderado` enum('si','non') DEFAULT 'non'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `usuario`, `idProduto`, `Comentario`, `dataCreacion`, `dataModeracion`, `moderado`) VALUES
(1, 'usuario2', 4, 'me parece muy buen producto!.', '2025-01-31 09:56:38', NULL, 'non');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProduto` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricion` text,
  `familia` varchar(50) DEFAULT NULL,
  `imaxe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProduto`, `nome`, `descricion`, `familia`, `imaxe`) VALUES
(1, 'Laptop Dell XPS 13', 'Portátil ultradelgado y potente con procesador Intel Core i7, 16 GB de RAM y 512 GB de SSD.', 'Portátiles', 'imaxes/laptop_dell_xps13.jpg'),
(2, 'Apple MacBook Pro 16\"', 'Laptop de alto rendimiento con procesador M1 Pro, 32 GB de RAM y 1 TB de almacenamiento SSD.', 'Portátiles', 'imaxes/macbook_pro_16.jpg'),
(3, 'Samsung Galaxy Tab S8', 'Tableta Android de 11\" con pantalla Super AMOLED y procesador Snapdragon 8 Gen 1.', 'Tabletas', 'imaxes/samsung_galaxy_tab_s8.jpg'),
(4, 'Microsoft Surface Pro 9', 'Tableta híbrida con Windows 11, pantalla de 13\" y procesador Intel Core i7.', 'Tabletas', 'imaxes/surface_pro_9.jpg'),
(5, 'HP Omen 30L', 'PC de sobremesa gaming con procesador Intel Core i9, 64 GB de RAM y tarjeta gráfica NVIDIA RTX 3080.', 'PC de sobremesa', 'imaxes/hp_omen_30l.jpg'),
(6, 'Razer Blade 15', 'Portátil gaming con procesador Intel Core i7, 16 GB de RAM y tarjeta gráfica NVIDIA RTX 3070.', 'Portátiles', 'imaxes/razer_blade_15.jpg'),
(7, 'Logitech MX Master 3', 'Ratón ergonómico inalámbrico para productividad con Bluetooth y rueda de desplazamiento electromagnética.', 'Accesorios', 'imaxes/logitech_mx_master_3.jpg'),
(8, 'Seagate Barracuda 2TB', 'Disco duro interno de 2 TB para almacenamiento de alto rendimiento.', 'Almacenamiento', 'imaxes/seagate_barracuda_2tb.jpg'),
(9, 'Sony WH-1000XM4', 'Auriculares inalámbricos con cancelación de ruido activa y hasta 30 horas de autonomía.', 'Accesorios', 'imaxes/sony_wh1000xm4.jpg'),
(10, 'Canon EOS 90D', 'Cámara réflex digital con sensor APS-C, 32.5 MP y grabación en 4K.', 'Cámaras', 'imaxes/canon_eos_90d.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `contrasinal` varchar(255) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `apelido1` varchar(100) NOT NULL,
  `apelido2` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `ultimaConexion` datetime DEFAULT NULL,
  `rol` enum('usuario','moderador','administrador') DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nomeUsuario`, `contrasinal`, `nome`, `apelido1`, `apelido2`, `email`, `ultimaConexion`, `rol`) VALUES
(6, 'usuario1', 'f2e53c927c66fe711e8e88ef9b37a8e3187f1652216b313fc8eb2513883dd360', 'Juan', 'Pérez', NULL, 'juan.perez@example.com', NULL, 'usuario'),
(7, 'usuario2', 'f2e53c927c66fe711e8e88ef9b37a8e3187f1652216b313fc8eb2513883dd360', 'Ana', 'García', 'Martínez', 'ana.garcia@example.com', NULL, 'usuario'),
(8, 'moderador1', 'f2e53c927c66fe711e8e88ef9b37a8e3187f1652216b313fc8eb2513883dd360', 'Carlos', 'López', NULL, 'carlos.lopez@example.com', NULL, 'moderador'),
(9, 'administrador', 'f2e53c927c66fe711e8e88ef9b37a8e3187f1652216b313fc8eb2513883dd360', 'Administrador', 'Sistema', NULL, 'admin@example.com', NULL, 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario` (`usuario`),
  ADD KEY `idProduto` (`idProduto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProduto`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nomeUsuario` (`nomeUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProduto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nomeUsuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `producto` (`idProduto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
