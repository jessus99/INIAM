SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";
-- Base de datos: `matricula`

-- Estructura de tabla para la tabla `tbl_carreras`
--

CREATE TABLE `tbl_carreras` (
  `id` int(11) NOT NULL,
  `nombre_carrera` varchar(50) NOT NULL,
  `nombre_profesor` varchar(50) NOT NULL,
  `horario` varchar(10) NOT NULL,
  `tipo` varchar(10) NOT NULL,
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

-- --------------------------------------------------------

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
(1, 'Administrador', 'G'),
(2, 'Cliente',''),
(3, 'Digitador', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_tipos`


CREATE TABLE `tbl_tipos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_usuarios`

CREATE TABLE `tbl_usuarios` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_perfil` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Volcado de datos para la tabla `tbl_usuarios`
--

INSERT INTO `tbl_usuarios` (`id`, `name`, `lastname`, `email`, `password`, `id_perfil`) VALUES
('', 'Jesus', 'Granados', 'jessus9899@gmail.com', '135790', 1);

--
-- Indices de la tabla `tbl_carreras`
--
ALTER TABLE `tbl_carreras`
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

-- Indices de la tabla `tbl_tipos`
--
ALTER TABLE `tbl_tipos`
  ADD PRIMARY KEY (`id`);

-- Indices de la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_email` (`email`),
  ADD KEY `idx_perfil` (`id_perfil`);

-- AUTO_INCREMENT de la tabla `tbl_conversaciones`
--
ALTER TABLE `tbl_conversaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

-- AUTO_INCREMENT de la tabla `tbl_mensajes`
--
ALTER TABLE `tbl_mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT de la tabla `tbl_perfiles`
--
ALTER TABLE `tbl_perfiles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

-- AUTO_INCREMENT de la tabla `tbl_tipos`
--
ALTER TABLE `tbl_tipos`
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
-- Filtros para la tabla `tbl_carreras`
--
ALTER TABLE `tbl_carreras`
  ADD CONSTRAINT `tbl_carreras_ibfk_1` FOREIGN KEY (`tipo`) REFERENCES `tbl_tipos` (`id`),
  ADD CONSTRAINT `tbl_carreras_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `tbl_usuarios` (`id`);

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
-- Filtros para la tabla `tbl_usuarios`
--
ALTER TABLE `tbl_usuarios`
  ADD CONSTRAINT `tbl_usuarios_ibfk_1` FOREIGN KEY (`id_perfil`) REFERENCES `tbl_perfiles` (`id`);
COMMIT;
