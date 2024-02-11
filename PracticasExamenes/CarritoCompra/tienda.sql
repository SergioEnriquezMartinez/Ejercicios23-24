-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-02-2024 a las 18:24:29
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaproductos`
--

CREATE TABLE `categoriaproductos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoriaproductos`
--

INSERT INTO `categoriaproductos` (`id`, `nombre`) VALUES
(1, 'Ordenadores'),
(2, 'Moviles'),
(3, 'Electrodomesticos'),
(4, 'Hogar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalles_pedidos`
--

CREATE TABLE `detalles_pedidos` (
  `id` int(11) NOT NULL,
  `id_pedido` int(11) DEFAULT NULL,
  `producto_id` int(11) DEFAULT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `precio_unitario` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalles_pedidos`
--

INSERT INTO `detalles_pedidos` (`id`, `id_pedido`, `producto_id`, `cantidad`, `precio_unitario`) VALUES
(5, 8, 13, 1, 129.99),
(6, 8, 10, 1, 89.99),
(7, 8, 2, 1, 29.99),
(8, 9, 13, 1, 129.99),
(9, 9, 10, 1, 89.99),
(11, 11, 10, 1, 89.99),
(12, 12, 2, 1, 29.99),
(13, 13, 3, 1, 39.99),
(14, 14, 13, 1, 129.99),
(15, 15, 13, 2, 129.99),
(16, 15, 10, 1, 89.99),
(17, 15, 2, 1, 29.99),
(18, 16, 13, 3, 129.99),
(19, 16, 10, 2, 89.99),
(20, 16, 2, 2, 29.99),
(21, 16, 12, 3, 1499.99),
(22, 16, 9, 2, 799.99),
(23, 16, 3, 2, 39.99),
(24, 16, 1, 2, 19.99),
(25, 16, 11, 3, 249.99),
(26, 17, 12, 1, 1499.99),
(27, 17, 2, 1, 29.99);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `total_pedido` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `fecha_pedido`, `total_pedido`) VALUES
(8, 17, '2024-02-11', 302.46),
(9, 17, '2024-02-11', 266.18),
(11, 18, '2024-02-11', 108.89),
(12, 18, '2024-02-11', 36.29),
(13, 18, '2024-02-11', 48.39),
(14, 18, '2024-02-11', 157.29),
(15, 18, '2024-02-11', 459.75),
(16, 17, '2024-02-11', 9195.77),
(17, 19, '2024-02-11', 1851.28);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `categoria_id`) VALUES
(1, 'Producto A', 'Ordenador Asus i7', 19.99, 1),
(2, 'Producto B', 'Iphone XXI', 29.99, 2),
(3, 'Producto C', 'Ordenador hp AMD', 39.99, 1),
(9, 'Teléfono inteligente', 'Teléfono con pantalla OLED y cámara de alta resolución', 799.99, 1),
(10, 'Zapatos deportivos', 'Zapatos diseñados para correr con suela amortiguada', 89.99, 2),
(11, 'Silla de oficina ergonómica', 'Silla ajustable con soporte lumbar y reposabrazos ajustables', 249.99, 4),
(12, 'Cámara DSLR', 'Cámara réflex digital con sensor de 24 MP y capacidad de grabación de video 4K', 1499.99, 1),
(13, 'Libro electrónico', 'Dispositivo de lectura con pantalla táctil y luz frontal ajustable', 129.99, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(20) NOT NULL,
  `correo` varchar(50) DEFAULT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `correo`, `contrasena`) VALUES
(1, 'Juan Pérez', '', 'juan@example.com', 'contrasena123'),
(2, 'María López', '', 'maria@example.com', 'clave456'),
(3, 'Carlos Rodríguez', '', 'carlos@example.com', 'secreto789'),
(4, 'María García', '', 'maria@example.com', 'clave123'),
(5, 'Carlos López', '', 'carlos@example.com', 'secreto456'),
(6, 'Laura Fernández', '', 'laura@example.com', 'password789'),
(7, 'Juan Martín', '', 'juan@example.com', 'contrasena456'),
(14, 'Manuel', 'Manzano', 'manuel@gmail.com', '$2y$10$Un.b4seAIvNxM22uD7oCZ.oYUwvdmbjJeA91qIK8jdt'),
(15, 'Prueba', 'Pruebita', 'prueba@gmail.com', '$2y$10$K17DYKusbKe8Kh3e7DzoJeYPYF1mGyeIG8bpazvyqMLIWmtuDImbS'),
(16, 'Sergio', 'Sergio', 'sergio@gmail.com', '$2y$10$vtXQwA/ZGtTpsKDX2.5rkeneXZObX6YB/DTqN25U2fTiA3dk.oRTG'),
(17, 'Manuel', 'Manzano', 'vdele93@gmail.com', '$2y$10$mVO0aEQjxVNsKKE/Y/uHoeUX/SVQfCtVTprGYtKtaNwDPOirqHYg.'),
(18, 'Mioguel', 'Prieto', 'miguel@gmail.com', '$2y$10$qg222lO.VBpJdmhKLAIR0.qS1PFTG.TkFFi1wxnR1j7Jy71BKowKC'),
(19, 'Anabel', 'Rodriguez', 'anabel@gmail.com', '$2y$10$QBcTQq92soXIPPQqR6V1D.XTl47aP3mtGcUXSBL0dRVbAXIknPJBq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoriaproductos`
--
ALTER TABLE `categoriaproductos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categoria_id` (`categoria_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriaproductos`
--
ALTER TABLE `categoriaproductos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalles_pedidos`
--
ALTER TABLE `detalles_pedidos`
  ADD CONSTRAINT `detalles_pedidos_ibfk_1` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`categoria_id`) REFERENCES `categoriaproductos` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
