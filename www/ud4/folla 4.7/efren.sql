-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: dbXdebug
-- Tiempo de generación: 10-02-2025 a las 12:40:22
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
(8, 'papaventos', 17, 'es mi primer comentario', '2025-02-05 19:07:34', '2025-02-07 16:00:52', 'non'),
(23, 'papaventos', 9, 'Este producto es perfecto para lo que buscaba. Muy funcional y práctico.', '2025-02-07 17:25:03', '2025-02-10 12:33:46', 'non'),
(24, 'papaventos', 21, 'Me parece bien, pero el precio es un poco elevado en comparación con otros productos similares.', '2025-02-07 17:28:45', '2025-02-10 12:33:50', 'si'),
(25, 'papaventos', 9, 'No es lo que esperaba, me gustaría más opciones de personalización.', '2025-02-07 17:32:12', '2025-02-10 12:37:23', 'si'),
(27, 'efren', 1, 'ddddd', '2025-02-10 12:03:05', '2025-02-10 12:38:33', 'non'),
(28, 'efren', 1, 'ddddd', '2025-02-10 12:03:16', NULL, 'non');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `idProduto` int NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricion` text,
  `familia` varchar(50) DEFAULT NULL,
  `imaxe` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`idProduto`, `nome`, `descricion`, `familia`, `imaxe`) VALUES
(1, 'Laptop Dell XPS 13', 'Portátil ultradelgado y potente con procesador Intel Core i7, 16 GB de RAM y 512 GB de SSD.', 'Portátiles', 'img_default.jpg'),
(2, 'Apple MacBook Pro 16\"', 'Laptop de alto rendimiento con procesador M1 Pro, 32 GB de RAM y 1 TB de almacenamiento SSD.', 'Portátiles', 'img_default.jpg'),
(3, 'Samsung Galaxy Tab S8', 'Tableta Android de 11\" con pantalla Super AMOLED y procesador Snapdragon 8 Gen 1.', 'Tabletas', 'img_default.jpg'),
(4, 'Microsoft Surface Pro 9', 'Tableta híbrida con Windows 11, pantalla de 13\" y procesador Intel Core i7.', 'Tabletas', 'img_default.jpg'),
(5, 'HP Omen 30L', 'PC de sobremesa gaming con procesador Intel Core i9, 64 GB de RAM y tarjeta gráfica NVIDIA RTX 3080.', 'PC de sobremesa', 'img_default.jpg'),
(6, 'Razer Blade 15', 'Portátil gaming con procesador Intel Core i7, 16 GB de RAM y tarjeta gráfica NVIDIA RTX 3070.', 'Portátiles', 'img_default.jpg'),
(7, 'Logitech MX Master 3', 'Ratón ergonómico inalámbrico para productividad con Bluetooth y rueda de desplazamiento electromagnética.', 'Accesorios', 'img_default.jpg'),
(8, 'Seagate Barracuda 2TB', 'Disco duro interno de 2 TB para almacenamiento de alto rendimiento.', 'Almacenamiento', 'img_default.jpg'),
(9, 'Sony WH-1000XM4', 'Auriculares inalámbricos con cancelación de ruido activa y hasta 30 horas de autonomía.', 'Accesorios', 'img_default.jpg'),
(10, 'Canon EOS 90D', 'Cámara réflex digital con sensor APS-C, 32.5 MP y grabación en 4K.', 'Cámaras', 'img_default.jpg'),
(11, 'Laptop Dell XPS 13', 'Portátil ultradelgado y potente con procesador Intel Core i7, 16 GB de RAM y 512 GB de SSD.', 'Portátiles', 'img_default.jpg'),
(12, 'Smartphone Samsung Galaxy S23', 'Smartphone con pantalla Dynamic AMOLED 2X de 6.1\", cámara principal de 50 MP, y batería de 3900 mAh.', 'Smartphones', 'img_default.jpg'),
(13, 'Tablet Apple iPad Pro', 'Tablet de 12.9\" con pantalla Liquid Retina, chip M1, y 128 GB de almacenamiento.', 'Tablets', 'img_default.jpg'),
(14, 'Smartwatch Garmin Forerunner 945', 'Reloj inteligente para corredores y atletas con GPS, monitoreo de frecuencia cardíaca y hasta 2 semanas de autonomía.', 'Smartwatches', 'img_default.jpg'),
(15, 'Auriculares Sony WH-1000XM5', 'Auriculares inalámbricos con cancelación de ruido y sonido de alta resolución, hasta 30 horas de autonomía.', 'Auriculares', 'img_default.jpg'),
(16, 'Teclado mecánico Logitech G Pro X', 'Teclado mecánico con switches intercambiables, retroiluminación RGB y diseño compacto para gaming.', 'Periféricos', 'img_default.jpg'),
(17, 'Monitor LG UltraWide 34WN80C-B', 'Monitor ultrapanorámico de 34\", resolución 1440p, ideal para multitarea y contenido multimedia.', 'Monitores', 'img_default.jpg'),
(18, 'Disco duro externo Seagate 2TB', 'Disco duro portátil de 2 TB con velocidad de transferencia rápida y diseño compacto.', 'Almacenamiento', 'img_default.jpg'),
(19, 'Cámara Canon EOS 90D', 'Cámara réflex digital con sensor de 32.5 MP, grabación en 4K y enfoque automático de alta precisión.', 'Cámaras', 'img_default.jpg'),
(20, 'Silla gaming DXRacer Racing Series', 'Silla ergonómica para gamers con soporte lumbar ajustable, reposabrazos 4D y reclinable hasta 135°.', 'Mobiliario', 'img_default.jpg'),
(21, 'Impresora HP LaserJet Pro MFP M428fdw', 'Impresora multifuncional láser en blanco y negro con impresión dúplex automática y conectividad Wi-Fi.', 'Impresoras', 'img_default.jpg'),
(22, 'Proyector Epson Home Cinema 2150', 'Proyector Full HD con 2500 lúmenes de brillo, conexión inalámbrica y corrección de distorsión.', 'Proyectores', 'img_default.jpg'),
(23, 'Altavoces Bluetooth JBL Flip 5', 'Altavoces portátiles Bluetooth con sonido potente, resistencia al agua IPX7 y hasta 12 horas de autonomía.', 'Altavoces', 'img_default.jpg'),
(24, 'Cámara de seguridad Nest Cam', 'Cámara de seguridad para interiores con visión nocturna, alertas de movimiento y audio bidireccional.', 'Seguridad', 'img_default.jpg'),
(25, 'Router Wi-Fi Mesh TP-Link Deco X60', 'Sistema de router Wi-Fi Mesh con cobertura de hasta 6000 pies cuadrados y velocidad AX3000.', 'Redes', 'img_default.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int NOT NULL,
  `nomeUsuario` varchar(50) NOT NULL,
  `contrasinal` varchar(255) NOT NULL,
  `nomeCompleto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `email` varchar(100) NOT NULL,
  `ultimaConexion` datetime DEFAULT NULL,
  `rol` enum('usuario','moderador','administrador') DEFAULT 'usuario'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nomeUsuario`, `contrasinal`, `nomeCompleto`, `email`, `ultimaConexion`, `rol`) VALUES
(6, 'usuario1', 'f2e53c927c66fe711e8e88ef9b37a8e3187f1652216b313fc8eb2513883dd360', 'Juan', 'juan.perez@example.com', NULL, 'usuario'),
(7, 'usuario2', 'f2e53c927c66fe711e8e88ef9b37a8e3187f1652216b313fc8eb2513883dd360', 'Ana', 'ana.garcia@example.com', NULL, 'usuario'),
(8, 'moderador1', 'f2e53c927c66fe711e8e88ef9b37a8e3187f1652216b313fc8eb2513883dd360', 'Carlos', 'carlos.lopez@example.com', NULL, 'moderador'),
(10, 'papaventos', '$2y$10$x1a/0FhrnwdWzDWn1iZ6XuTSQgcD1sqmo0cMfH9ch9RB0szoxyPxG', 'efren corzon', 'azak4@hotmail.com', '2025-02-10 12:26:06', 'moderador'),
(12, 'administrador', '$2y$10$Yo9SNTiehzrITvWL4Vpu8uuMsk8Idkqg.N1.87ApfXqv4sozTgTkO', 'administrador', 'administrador@administrador.com', '2025-02-05 19:50:47', 'moderador'),
(13, 'userproba', '$2y$10$p/OwISbqkejbPLQORFQvKOE.Wc4JgxOSRW5AYzjvd8mevZje7RbXS', 'userproba', 'azak4@hotmail.com', '2025-02-07 16:02:44', 'usuario'),
(14, 'asdfas', '$2y$10$pj14nKGuCJuo.Dwi2SvQ3eA8NfE2mIVZFcvjY8171FAAhJUlPzyF2', 'asdfas', 'azak4@hotmail.com', NULL, 'usuario'),
(15, 'efren', '$2y$10$ZEAx1dgbAJEAd0qhoSpjFupHx4HXHt.uNPPAh3k.8b.ZnELbrPOYO', 'efren corzon', 'azak4@hotmail.com', '2025-02-10 12:01:28', 'usuario');

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
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `idProduto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `usuarios` (`nomeUsuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`idProduto`) REFERENCES `productos` (`idProduto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
