-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2024 a las 01:30:51
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
-- Base de datos: `control_de_rifas_l10`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cantidad_venta`
--

CREATE TABLE `cantidad_venta` (
  `id_venta` int(11) NOT NULL,
  `cantidad_venta` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cantidad_venta`
--

INSERT INTO `cantidad_venta` (`id_venta`, `cantidad_venta`, `fecha`, `tipo_de_rifa`, `registro`) VALUES
(1, '2', '2024-05-21', 5, '2024-05-22 00:38:53');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `numero_bloqueado`
--

CREATE TABLE `numero_bloqueado` (
  `id_numero_bloqueo` int(11) NOT NULL,
  `numero` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `numero_bloqueado`
--

INSERT INTO `numero_bloqueado` (`id_numero_bloqueo`, `numero`, `fecha`, `tipo_de_rifa`) VALUES
(1, 41, '2024-05-06', 1),
(2, 745, '2024-05-06', 2),
(3, 120, '2024-05-06', 4),
(4, 785, '2024-05-06', 3),
(5, 22, '2024-05-08', 1),
(6, 784, '2024-05-08', 2),
(7, 411, '2024-05-08', 3),
(8, 748, '2024-05-08', 4),
(9, 48, '2024-05-22', 1),
(10, 745, '2024-05-22', 2),
(11, 784, '2024-05-22', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_moto_numero`
--

CREATE TABLE `registro_moto_numero` (
  `id_moto` int(11) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `signo` int(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `valor` int(11) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_moto_triples`
--

CREATE TABLE `registro_moto_triples` (
  `id_rifa_moto_triple` int(11) NOT NULL,
  `numero_primero` varchar(11) NOT NULL,
  `numero_segundo` varchar(11) NOT NULL,
  `zodiacal_primero` varchar(20) NOT NULL,
  `zodiacal_segundo` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `vendedor` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `valor` int(11) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_moto_triples`
--

INSERT INTO `registro_moto_triples` (`id_rifa_moto_triple`, `numero_primero`, `numero_segundo`, `zodiacal_primero`, `zodiacal_segundo`, `fecha`, `vendedor`, `nombre`, `cedula`, `valor`, `tipo_de_rifa`, `registro`) VALUES
(1, '111', '222', 'Aries', 'Aries', '2024-05-21', 27047631, 'No obtenidos', 'No obtenid', 1, 5, '2024-05-22 00:40:33'),
(2, '111', '222', 'Aries', 'Aries', '2024-05-21', 27047631, 'No obtenidos', 'No obtenid', 1, 5, '2024-05-22 00:40:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_numero_doble_oportunidad`
--

CREATE TABLE `registro_numero_doble_oportunidad` (
  `id_doble_oportunidad` int(11) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `valor` int(11) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_numero_doble_oportunidad`
--

INSERT INTO `registro_numero_doble_oportunidad` (`id_doble_oportunidad`, `numero`, `vendedor`, `fecha`, `nombre`, `cedula`, `valor`, `tipo_de_rifa`, `registro`) VALUES
(1, '452', 27047631, '2024-05-06', 'No obtenidos.', 'No obtenid', 2, 2, '2024-05-06 23:15:51');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_numero_millonaria`
--

CREATE TABLE `registro_numero_millonaria` (
  `id_millonaria` int(11) NOT NULL,
  `numero_one` varchar(10) NOT NULL,
  `numero_dos` varchar(10) NOT NULL,
  `numero_tres` varchar(10) NOT NULL,
  `numero_cuatro` varchar(10) NOT NULL,
  `numero_cinco` varchar(10) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_numero_millonaria`
--

INSERT INTO `registro_numero_millonaria` (`id_millonaria`, `numero_one`, `numero_dos`, `numero_tres`, `numero_cuatro`, `numero_cinco`, `vendedor`, `valor`, `fecha`, `nombre`, `cedula`, `tipo_de_rifa`, `registro`) VALUES
(1, '741', '563', '125', '111', '020', 27047631, 2, '2024-05-06', 'No obtenido', 'No obtenid', 3, '2024-05-06 23:16:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro_numero_triple_500`
--

CREATE TABLE `registro_numero_triple_500` (
  `id_triple` int(11) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `monto_total` varchar(20) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `registro_numero_triple_500`
--

INSERT INTO `registro_numero_triple_500` (`id_triple`, `numero`, `cantidad`, `monto_total`, `vendedor`, `fecha`, `nombre`, `cedula`, `tipo_de_rifa`, `registro`) VALUES
(1, '148', 2, '1000', 27047631, '2024-05-06', 'No obtenido.', 'No obtenida', 4, '2024-05-06 23:16:11'),
(2, '487', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 21:58:37'),
(3, '658', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 21:59:01'),
(4, '475', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 21:59:58'),
(5, '754', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:00:57'),
(6, '745', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:06:05'),
(7, '745', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:06:54'),
(8, '758', 4, '2000', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:07:06'),
(9, '784', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:08:24'),
(10, '745', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:10:22'),
(11, '459', 4, '2000', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:10:31'),
(12, '785', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:17:19'),
(13, '456', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:19:28'),
(14, '548', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:20:07'),
(15, '456', 2, '1000', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:43:49'),
(16, '786', 45, '22500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 22:44:02'),
(17, '457', 3, '1500', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 23:23:39'),
(18, '155', 4, '2000', 27047631, '2024-05-24', 'No obtenido.', 'No obtenida', 4, '2024-05-24 23:25:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Supervisor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_rifas`
--

CREATE TABLE `tipo_de_rifas` (
  `id_rifas` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_de_rifas`
--

INSERT INTO `tipo_de_rifas` (`id_rifas`, `nombre`) VALUES
(1, 'Rifa moto'),
(2, 'Doble Oportunidad'),
(3, 'Rifa Millonaria'),
(4, 'triple 500'),
(5, 'Rifa Moto Triples');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `triple_acomulado`
--

CREATE TABLE `triple_acomulado` (
  `id_triple_acomulado` int(11) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `participacion` varchar(10) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `triple_acomulado`
--

INSERT INTO `triple_acomulado` (`id_triple_acomulado`, `numero`, `vendedor`, `fecha`, `participacion`, `registro`) VALUES
(1, '1485', 27047631, '2024-05-24', 'Si', '2024-05-24 23:23:49'),
(2, '7899', 27047631, '2024-05-24', 'Si', '2024-05-24 23:25:23');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `cedula` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `cedula`, `id_rol`, `registro`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 27047631, 1, '2024-04-15 00:32:29'),
(2, 'vendedor', '7c4a8d09ca3762af61e59520943dc26494f8941b', 27047631, 2, '2024-04-15 00:32:54'),
(4, 'supervisor', '7c4a8d09ca3762af61e59520943dc26494f8941b', 27047631, 3, '2024-05-22 23:26:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`cedula`, `nombre`, `telefono`, `correo`) VALUES
(12345670, 'Daniela', '04264325675', 'daniela@gmail.com'),
(12345677, 'Luis Navarro', '04264567889', 'lnavarro@gmail.com'),
(12345678, 'Luis Navarro', '04264567889', 'lnavarro@gmail.com'),
(12916293, 'Yasmin Brito', '04269004314', 'yasmin@gmail.com'),
(15170361, 'barbara aguilar', '04265146937', 'barbaraedwina.at@gmail.com'),
(19776509, 'Angy reyes', '04121227836', 'angyhoelyreyes@gmail.com'),
(27047631, 'Danyerbert Rangel', '04126296504', 'danyerbert@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zodiaco`
--

CREATE TABLE `zodiaco` (
  `id_zodiaco` int(11) NOT NULL,
  `zodiaco` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zodiaco`
--

INSERT INTO `zodiaco` (`id_zodiaco`, `zodiaco`) VALUES
(1, 'Aries'),
(2, 'Tauro'),
(3, 'Geminis'),
(4, 'Cancer'),
(5, 'Leo'),
(6, 'Virgo'),
(7, 'Libra'),
(8, 'Escorpio'),
(9, 'Sagitario'),
(10, 'Capricornio'),
(11, 'Acuario'),
(12, 'Piscis');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cantidad_venta`
--
ALTER TABLE `cantidad_venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`);

--
-- Indices de la tabla `numero_bloqueado`
--
ALTER TABLE `numero_bloqueado`
  ADD PRIMARY KEY (`id_numero_bloqueo`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`);

--
-- Indices de la tabla `registro_moto_numero`
--
ALTER TABLE `registro_moto_numero`
  ADD PRIMARY KEY (`id_moto`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `signo` (`signo`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`);

--
-- Indices de la tabla `registro_moto_triples`
--
ALTER TABLE `registro_moto_triples`
  ADD PRIMARY KEY (`id_rifa_moto_triple`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`),
  ADD KEY `vendedor` (`vendedor`);

--
-- Indices de la tabla `registro_numero_doble_oportunidad`
--
ALTER TABLE `registro_numero_doble_oportunidad`
  ADD PRIMARY KEY (`id_doble_oportunidad`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`);

--
-- Indices de la tabla `registro_numero_millonaria`
--
ALTER TABLE `registro_numero_millonaria`
  ADD PRIMARY KEY (`id_millonaria`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`);

--
-- Indices de la tabla `registro_numero_triple_500`
--
ALTER TABLE `registro_numero_triple_500`
  ADD PRIMARY KEY (`id_triple`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_de_rifas`
--
ALTER TABLE `tipo_de_rifas`
  ADD PRIMARY KEY (`id_rifas`);

--
-- Indices de la tabla `triple_acomulado`
--
ALTER TABLE `triple_acomulado`
  ADD PRIMARY KEY (`id_triple_acomulado`),
  ADD KEY `vendedor` (`vendedor`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_vendedor` (`cedula`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`cedula`);

--
-- Indices de la tabla `zodiaco`
--
ALTER TABLE `zodiaco`
  ADD PRIMARY KEY (`id_zodiaco`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cantidad_venta`
--
ALTER TABLE `cantidad_venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `numero_bloqueado`
--
ALTER TABLE `numero_bloqueado`
  MODIFY `id_numero_bloqueo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `registro_moto_numero`
--
ALTER TABLE `registro_moto_numero`
  MODIFY `id_moto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registro_moto_triples`
--
ALTER TABLE `registro_moto_triples`
  MODIFY `id_rifa_moto_triple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `registro_numero_doble_oportunidad`
--
ALTER TABLE `registro_numero_doble_oportunidad`
  MODIFY `id_doble_oportunidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro_numero_millonaria`
--
ALTER TABLE `registro_numero_millonaria`
  MODIFY `id_millonaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro_numero_triple_500`
--
ALTER TABLE `registro_numero_triple_500`
  MODIFY `id_triple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_de_rifas`
--
ALTER TABLE `tipo_de_rifas`
  MODIFY `id_rifas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `triple_acomulado`
--
ALTER TABLE `triple_acomulado`
  MODIFY `id_triple_acomulado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `zodiaco`
--
ALTER TABLE `zodiaco`
  MODIFY `id_zodiaco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cantidad_venta`
--
ALTER TABLE `cantidad_venta`
  ADD CONSTRAINT `cantidad_venta_ibfk_1` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`);

--
-- Filtros para la tabla `numero_bloqueado`
--
ALTER TABLE `numero_bloqueado`
  ADD CONSTRAINT `numero_bloqueado_ibfk_1` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`);

--
-- Filtros para la tabla `registro_moto_numero`
--
ALTER TABLE `registro_moto_numero`
  ADD CONSTRAINT `registro_moto_numero_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  ADD CONSTRAINT `registro_moto_numero_ibfk_2` FOREIGN KEY (`signo`) REFERENCES `zodiaco` (`id_zodiaco`),
  ADD CONSTRAINT `registro_moto_numero_ibfk_3` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`);

--
-- Filtros para la tabla `registro_moto_triples`
--
ALTER TABLE `registro_moto_triples`
  ADD CONSTRAINT `registro_moto_triples_ibfk_1` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`),
  ADD CONSTRAINT `registro_moto_triples_ibfk_2` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`);

--
-- Filtros para la tabla `registro_numero_doble_oportunidad`
--
ALTER TABLE `registro_numero_doble_oportunidad`
  ADD CONSTRAINT `registro_numero_doble_oportunidad_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  ADD CONSTRAINT `registro_numero_doble_oportunidad_ibfk_2` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`);

--
-- Filtros para la tabla `registro_numero_millonaria`
--
ALTER TABLE `registro_numero_millonaria`
  ADD CONSTRAINT `registro_numero_millonaria_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  ADD CONSTRAINT `registro_numero_millonaria_ibfk_2` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`);

--
-- Filtros para la tabla `registro_numero_triple_500`
--
ALTER TABLE `registro_numero_triple_500`
  ADD CONSTRAINT `registro_numero_triple_500_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  ADD CONSTRAINT `registro_numero_triple_500_ibfk_2` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`);

--
-- Filtros para la tabla `triple_acomulado`
--
ALTER TABLE `triple_acomulado`
  ADD CONSTRAINT `triple_acomulado_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`cedula`) REFERENCES `vendedores` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
