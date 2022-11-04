-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 13-08-2021 a las 20:54:09
-- Versión del servidor: 10.4.19-MariaDB
-- Versión de PHP: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `matricula`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_alimentos`
--

CREATE TABLE `tbl_alimentos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `calorias` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_conversaciones`
--

CREATE TABLE `tbl_conversaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `idemisor` int(11) NOT NULL,
  `idreceptor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_conversaciones`
--

INSERT INTO `tbl_conversaciones` (`id`, `nombre`, `idemisor`, `idreceptor`) VALUES
(1, 'hola', 10, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_estado_recomendaciones`
--

CREATE TABLE `tbl_estado_recomendaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_estado_recomendaciones`
--

INSERT INTO `tbl_estado_recomendaciones` (`id`, `nombre`, `descripcion`) VALUES
(1, 'pendiente', 'Recomendaciones enviadas pero pendientes'),
(2, 'aprobada', 'Recomendaciones enviadas realizadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mensajes`
--

CREATE TABLE `tbl_mensajes` (
  `id` int(11) NOT NULL,
  `idreceptor` int(11) NOT NULL,
  `idemisor` int(11) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `mensaje` varchar(500) NOT NULL,
  `idconversacion` int(11) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_mensajes`
--

INSERT INTO `tbl_mensajes` (`id`, `idreceptor`, `idemisor`, `asunto`, `mensaje`, `idconversacion`, `fecha`) VALUES
(41, 2, 10, 'hola', 'hola jose', 33, '2021-08-10 03:42:28'),
(45, 10, 2, 'hola jose', 'hola jose', 33, '2021-08-10 04:19:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_perfiles`
--

CREATE TABLE `tbl_perfiles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_perfiles`
--

INSERT INTO `tbl_perfiles` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Gerente General'),
(2, 'Cliente',''),
(3, 'Digitador', 'Recepcionista');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_recomendaciones`
--

CREATE TABLE `tbl_recomendaciones` (
  `id` int(11) NOT NULL,
  `tipo` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `idemisor` int(11) NOT NULL,
  `idreceptor` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `asunto` varchar(500) NOT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos`
--

CREATE TABLE `tbl_tipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipos`
--

INSERT INTO `tbl_tipos` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Carbohidratos', 'Simples y complejos'),
(2, 'Proteinas', 'Animal y vegetal'),
(3, 'Grasas', 'Insaturadas y saturadas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos_recomendaciones`
--

CREATE TABLE `tbl_tipos_recomendaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_tipos_recomendaciones`
--

INSERT INTO `tbl_tipos_recomendaciones` (`id`, `nombre`, `descripcion`) VALUES
(1, 'diaria', 'Recomendación que recibe todos los días'),
(2, 'adicional', 'Recomendaciones adicionales'),
(3, 'anterior', 'Recomendaciones de dias anteriores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`
--

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `name`, `lastname`, `email`, `password`, `id_perfil`) VALUES
(2, 'jesus', 'granados', 'jessus9899@gmail.com', '12345678', 1),
(10, 'jose', 'torres', 'jose000@gmail.com', '12345678', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_alimentos`
--
ALTER TABLE `tbl_alimentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tipos` (`tipo`),
  ADD KEY `idx_usuario` (`id_usuario`);

--
-- Indices de la tabla `tbl_conversaciones`
--
ALTER TABLE `tbl_conversaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_emisor` (`idemisor`),
  ADD KEY `idx_receptor` (`idreceptor`);

--
-- Indices de la tabla `tbl_estado_recomendaciones`
--
ALTER TABLE `tbl_estado_recomendaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_mensajes`
--
ALTER TABLE `tbl_mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_receptor` (`idreceptor`),
  ADD KEY `idx_emisor` (`idemisor`),
  ADD KEY `idx_conversacion` (`idconversacion`);

--
-- Indices de la tabla `tbl_perfiles`
--
ALTER TABLE `tbl_perfiles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_recomendaciones`
--
ALTER TABLE `tbl_recomendaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_tipo` (`tipo`),
  ADD KEY `idx_estado` (`estado`),
  ADD KEY `idx_emisor` (`idemisor`),
  ADD KEY `idx_receptor` (`idreceptor`);

--
-- Indices de la tabla `tbl_tipos`
--
ALTER TABLE `tbl_tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_tipos_recomendaciones`
--
ALTER TABLE `tbl_tipos_recomendaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_email` (`email`),
  ADD KEY `idx_perfil` (`id_perfil`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_alimentos`
--
ALTER TABLE `tbl_alimentos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tbl_conversaciones`
--
ALTER TABLE `tbl_conversaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `tbl_estado_recomendaciones`
--
ALTER TABLE `tbl_estado_recomendaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tbl_mensajes`
--
ALTER TABLE `tbl_mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `tbl_perfiles`
--
ALTER TABLE `tbl_perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_recomendaciones`
--
ALTER TABLE `tbl_recomendaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `tbl_tipos`
--
ALTER TABLE `tbl_tipos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_tipos_recomendaciones`
--
ALTER TABLE `tbl_tipos_recomendaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_alimentos`
--
ALTER TABLE `tbl_alimentos`
  ADD CONSTRAINT `tbl_alimentos_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tbl_tipos` (`id`),
  ADD CONSTRAINT `tbl_alimentos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id`);

--
-- Filtros para la tabla `tbl_conversaciones`
--
ALTER TABLE `tbl_conversaciones`
  ADD CONSTRAINT `tbl_conversaciones_ibfk_1` FOREIGN KEY (`idemisor`) REFERENCES `tbl_usuarios` (`id`),
  ADD CONSTRAINT `tbl_conversaciones_ibfk_2` FOREIGN KEY (`idreceptor`) REFERENCES `tbl_usuarios` (`id`);

--
-- Filtros para la tabla `tbl_mensajes`
--
ALTER TABLE `tbl_mensajes`
  ADD CONSTRAINT `tbl_mensajes_ibfk_1` FOREIGN KEY (`idemisor`) REFERENCES `tbl_usuarios` (`id`),
  ADD CONSTRAINT `tbl_mensajes_ibfk_2` FOREIGN KEY (`idreceptor`) REFERENCES `tbl_usuarios` (`id`),
  ADD CONSTRAINT `tbl_mensajes_ibfk_3` FOREIGN KEY (`idconversacion`) REFERENCES `tbl_conversaciones` (`id`);

--
-- Filtros para la tabla `tbl_recomendaciones`
--
ALTER TABLE `tbl_recomendaciones`
  ADD CONSTRAINT `tbl_recomendaciones_ibfk_1` FOREIGN KEY (`idemisor`) REFERENCES `tbl_usuarios` (`id`),
  ADD CONSTRAINT `tbl_recomendaciones_ibfk_2` FOREIGN KEY (`idreceptor`) REFERENCES `tbl_usuarios` (`id`),
  ADD CONSTRAINT `tbl_recomendaciones_ibfk_3` FOREIGN KEY (`tipo`) REFERENCES `tbl_tipos_recomendaciones` (`id`),
  ADD CONSTRAINT `tbl_recomendaciones_ibfk_4` FOREIGN KEY (`estado`) REFERENCES `tbl_estado_recomendaciones` (`id`);

--
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `tbl_perfiles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
