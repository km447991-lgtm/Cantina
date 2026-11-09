-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-11-2026 a las 23:31:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cantina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_compra` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fecha_hora` varchar(50) NOT NULL,
  `total_compra` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito_tiene_producto`
--

CREATE TABLE `carrito_tiene_producto` (
  `fk_compra` int(11) NOT NULL,
  `fk_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `fk_administrador` int(11) DEFAULT NULL,
  `nombre_categoria` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `fk_administrador`, `nombre_categoria`) VALUES
(1, NULL, 'Bebidas'),
(2, NULL, 'Bizcochos y Panificados'),
(3, NULL, 'Sándwiches y Comidas'),
(4, NULL, 'Snacks'),
(5, NULL, 'Golosinas'),
(6, NULL, 'Fruta'),
(7, NULL, 'Helados');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `saldo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_likes_producto`
--

CREATE TABLE `cliente_likes_producto` (
  `fk_cliente` int(11) NOT NULL,
  `fk_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_realiza_encuesta`
--

CREATE TABLE `cliente_realiza_encuesta` (
  `id` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_encuesta` int(11) NOT NULL,
  `eleccion` int(11) DEFAULT NULL,
  `fecha` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `id_encuesta` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `fk_administrador` int(11) NOT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `fecha_enviado` varchar(50) NOT NULL,
  `eleccion_cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `opcion_encuesta`
--

CREATE TABLE `opcion_encuesta` (
  `fk_encuesta` int(11) NOT NULL,
  `opcion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id_producto` int(11) NOT NULL,
  `fk_administrador` int(11) DEFAULT NULL,
  `id_categoria` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `imagen_producto` varchar(255) DEFAULT NULL,
  `precio_producto` int(11) NOT NULL,
  `receta` varchar(500) DEFAULT NULL,
  `nombre_producto` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id_producto`, `fk_administrador`, `id_categoria`, `stock`, `imagen_producto`, `precio_producto`, `receta`, `nombre_producto`) VALUES
(18, NULL, 2, 20, 'Imágenes/productos/fe9d561654be2659984b78fba362e6ac.jpg', 65, 'Masa horneada rellena de queso derretido', 'Empanada de queso'),
(19, NULL, 1, 40, 'Imágenes/productos/c3b3677a13ee76cb5592bfa886079837.jpg', 30, 'Bebida de frutas en envase individual con sorbito', 'Jugo en caja'),
(20, NULL, 4, 20, 'Imágenes/productos/0e688b808246e25f15a6e55a398e7589.jpg', 45, 'Dos tapas dulces rellenas de dulce de leche y cubiertas de chocolate', 'Alfajor de chocolate'),
(21, NULL, 2, 16, 'Imágenes/productos/d701fca25fa461903220785ebbc6ac3f.jpg', 40, 'fina masa de pan, hojaldre o harina que se dobla para envolver un relleno salado o dulce, y luego se cocina al horno o se fríe', 'Empanada de carne'),
(22, NULL, 2, 34, 'Imágenes/productos/c56d9e0b4ee50412d880809c0391d886.jpg', 15, 'dulce frito de masa alargada y estriada, crujiente por fuera y suave por dentro', 'Churros'),
(23, NULL, 2, 200, 'Imágenes/productos/6ad66c933a9c82d4940df06e386e76fc.jpg', 60, 'Refueso, suave y ligeramente dulce, típico de la gastronomía de Argentina, Uruguay y Paraguay.', 'Refuerso de jamon y queso');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_esta_categoria`
--

CREATE TABLE `producto_esta_categoria` (
  `fk_categoria` int(11) NOT NULL,
  `fk_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sugerencia`
--

CREATE TABLE `sugerencia` (
  `id_sugerencias` int(11) NOT NULL,
  `fk_cliente` int(11) NOT NULL,
  `texto` text NOT NULL,
  `fecha` varchar(50) NOT NULL,
  `titulo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_Usuario` int(11) NOT NULL,
  `contrasena` varchar(150) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `nombre_usuario` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_Usuario`, `contrasena`, `nombre`, `nombre_usuario`) VALUES
(17, 'd404559f602eab6fd602ac7680dacbfaadd13630335e951f097af3900e9de176b6db28512f2e000b9d04fba5133e8b1c6e8df59db3a8ab9d60be4b97cc9e81db', 'Kevin', 'mameito'),
(19, '96fbd596c1519cf64414263261787ff0567088a888bfbf263267d2dcac5d15b39a893fcb65190daf827ca78b5ee3693c8296d5c648d041d93d19798352367a64', 'gabito', 'gabito'),
(20, '19c1de84e87b4cacf215f4bdcabf7751f37f2d73db45fcdb9a3b64f11eb1b11acf0c11d47197d7f4293190d5b69ea0ff9d4dde9edad66bb5ede4ae2a3f6ccf3c', 'camila', 'cami');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Indices de la tabla `carrito_tiene_producto`
--
ALTER TABLE `carrito_tiene_producto`
  ADD PRIMARY KEY (`fk_compra`,`fk_producto`),
  ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fk_administrador` (`fk_administrador`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `cliente_likes_producto`
--
ALTER TABLE `cliente_likes_producto`
  ADD PRIMARY KEY (`fk_cliente`,`fk_producto`),
  ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `cliente_realiza_encuesta`
--
ALTER TABLE `cliente_realiza_encuesta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cliente` (`fk_cliente`),
  ADD KEY `fk_encuesta` (`fk_encuesta`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`id_encuesta`),
  ADD KEY `fk_cliente` (`fk_cliente`),
  ADD KEY `fk_administrador` (`fk_administrador`);

--
-- Indices de la tabla `opcion_encuesta`
--
ALTER TABLE `opcion_encuesta`
  ADD KEY `fk_encuesta` (`fk_encuesta`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_administrador` (`fk_administrador`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `producto_esta_categoria`
--
ALTER TABLE `producto_esta_categoria`
  ADD PRIMARY KEY (`fk_categoria`,`fk_producto`),
  ADD KEY `fk_producto` (`fk_producto`);

--
-- Indices de la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  ADD PRIMARY KEY (`id_sugerencias`),
  ADD KEY `fk_cliente` (`fk_cliente`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_Usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_compra` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `cliente_realiza_encuesta`
--
ALTER TABLE `cliente_realiza_encuesta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `id_encuesta` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  MODIFY `id_sugerencias` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_Usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD CONSTRAINT `administrador_ibfk_1` FOREIGN KEY (`id_administrador`) REFERENCES `usuarios` (`id_Usuario`);

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`);

--
-- Filtros para la tabla `carrito_tiene_producto`
--
ALTER TABLE `carrito_tiene_producto`
  ADD CONSTRAINT `carrito_tiene_producto_ibfk_1` FOREIGN KEY (`fk_compra`) REFERENCES `carrito` (`id_compra`),
  ADD CONSTRAINT `carrito_tiene_producto_ibfk_2` FOREIGN KEY (`fk_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `categoria_ibfk_1` FOREIGN KEY (`fk_administrador`) REFERENCES `administrador` (`id_administrador`);

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`id_cliente`) REFERENCES `usuarios` (`id_Usuario`);

--
-- Filtros para la tabla `cliente_likes_producto`
--
ALTER TABLE `cliente_likes_producto`
  ADD CONSTRAINT `cliente_likes_producto_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `cliente_likes_producto_ibfk_2` FOREIGN KEY (`fk_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `cliente_realiza_encuesta`
--
ALTER TABLE `cliente_realiza_encuesta`
  ADD CONSTRAINT `cliente_realiza_encuesta_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `cliente_realiza_encuesta_ibfk_2` FOREIGN KEY (`fk_encuesta`) REFERENCES `encuesta` (`id_encuesta`);

--
-- Filtros para la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD CONSTRAINT `encuesta_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `encuesta_ibfk_2` FOREIGN KEY (`fk_administrador`) REFERENCES `administrador` (`id_administrador`);

--
-- Filtros para la tabla `opcion_encuesta`
--
ALTER TABLE `opcion_encuesta`
  ADD CONSTRAINT `opcion_encuesta_ibfk_1` FOREIGN KEY (`fk_encuesta`) REFERENCES `encuesta` (`id_encuesta`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`fk_administrador`) REFERENCES `administrador` (`id_administrador`),
  ADD CONSTRAINT `producto_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Filtros para la tabla `producto_esta_categoria`
--
ALTER TABLE `producto_esta_categoria`
  ADD CONSTRAINT `producto_esta_categoria_ibfk_1` FOREIGN KEY (`fk_categoria`) REFERENCES `categoria` (`id_categoria`),
  ADD CONSTRAINT `producto_esta_categoria_ibfk_2` FOREIGN KEY (`fk_producto`) REFERENCES `producto` (`id_producto`);

--
-- Filtros para la tabla `sugerencia`
--
ALTER TABLE `sugerencia`
  ADD CONSTRAINT `sugerencia_ibfk_1` FOREIGN KEY (`fk_cliente`) REFERENCES `cliente` (`id_cliente`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
