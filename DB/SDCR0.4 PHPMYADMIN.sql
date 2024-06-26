-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 10:53 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `control_de_rifas_l10`
--

-- --------------------------------------------------------

--
-- Table structure for table `cantidad_venta`
--

CREATE TABLE `cantidad_venta` (
  `id_venta` int(11) NOT NULL,
  `cantidad_venta` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cantidad_venta`
--

INSERT INTO `cantidad_venta` (`id_venta`, `cantidad_venta`, `fecha`, `tipo_de_rifa`, `registro`) VALUES
(1, '2', '2024-05-21', 5, '2024-05-22 00:38:53'),
(2, '3', '2024-06-10', 5, '2024-06-11 00:10:00'),
(3, '3', '2024-06-10', 1, '2024-06-11 00:43:29'),
(4, '3', '2024-06-20', 1, '2024-06-21 00:48:48'),
(5, '4', '2024-06-20', 5, '2024-06-21 00:48:54'),
(6, '4', '2024-06-26', 1, '2024-06-26 04:13:27'),
(7, '3', '2024-06-26', 5, '2024-06-26 05:32:35');

-- --------------------------------------------------------

--
-- Table structure for table `metodo_de_pago`
--

CREATE TABLE `metodo_de_pago` (
  `id_metodo_pago` int(11) NOT NULL,
  `metodo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `metodo_de_pago`
--

INSERT INTO `metodo_de_pago` (`id_metodo_pago`, `metodo`) VALUES
(1, 'Pago Movil'),
(2, 'Efectivo Divisas'),
(3, 'Efectivo Bolivares');

-- --------------------------------------------------------

--
-- Table structure for table `numero_bloqueado`
--

CREATE TABLE `numero_bloqueado` (
  `id_numero_bloqueo` int(11) NOT NULL,
  `numero` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `numero_bloqueado`
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
-- Table structure for table `registro_moto_numero`
--

CREATE TABLE `registro_moto_numero` (
  `id_moto` int(11) NOT NULL,
  `irm` varchar(20) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `signo` int(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre_comprador` varchar(30) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `valor` int(11) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `metodo_pago` int(11) NOT NULL,
  `cantidad_pago` varchar(20) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registro_moto_numero`
--

INSERT INTO `registro_moto_numero` (`id_moto`, `irm`, `numero`, `signo`, `vendedor`, `fecha`, `nombre_comprador`, `cedula`, `valor`, `tipo_de_rifa`, `metodo_pago`, `cantidad_pago`, `registro`) VALUES
(1, '2024-MD-1', '23', 1, 27047631, '2024-06-26', 'Danyerbert Rangel', '27047631', 3, 1, 1, '12354', '2024-06-26 04:18:07'),
(2, '2024-MD-2', '43', 1, 27047631, '2024-06-26', 'Danyerbert Rangel', '27047631', 3, 1, 1, '1234', '2024-06-26 04:27:58'),
(3, '2024-MD-3', '25', 6, 27047631, '2024-06-26', 'Danyerbert Rangel', '27047631', 3, 1, 1, '1234', '2024-06-26 04:38:20'),
(4, '2024-MD-4', '25', 1, 27047631, '2024-06-26', 'Danyerbert Rangel', '27047631', 3, 1, 2, '3', '2024-06-26 05:10:31');

-- --------------------------------------------------------

--
-- Table structure for table `registro_moto_triples`
--

CREATE TABLE `registro_moto_triples` (
  `id_rifa_moto_triple` int(11) NOT NULL,
  `irmt` varchar(20) NOT NULL,
  `numero_primero` varchar(11) NOT NULL,
  `numero_segundo` varchar(11) NOT NULL,
  `zodiacal_primero` varchar(20) NOT NULL,
  `zodiacal_segundo` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `vendedor` int(11) NOT NULL,
  `nombre_comprador` varchar(30) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `valor` int(11) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `metodo_pago` int(11) NOT NULL,
  `cantidad_pago` varchar(15) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registro_moto_triples`
--

INSERT INTO `registro_moto_triples` (`id_rifa_moto_triple`, `irmt`, `numero_primero`, `numero_segundo`, `zodiacal_primero`, `zodiacal_segundo`, `fecha`, `vendedor`, `nombre_comprador`, `cedula`, `valor`, `tipo_de_rifa`, `metodo_pago`, `cantidad_pago`, `registro`) VALUES
(1, '2024-MT-1', '234', '543', 'Capricornio', 'Leo', '2024-06-26', 27047631, 'Danyerbert Rangel', '27047631', 1, 5, 1, '1234', '2024-06-26 05:37:56');

-- --------------------------------------------------------

--
-- Table structure for table `registro_numero_doble_oportunidad`
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
  `metodo_pago` int(11) NOT NULL,
  `cantidad_pago` varchar(20) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `registro_numero_millonaria`
--

CREATE TABLE `registro_numero_millonaria` (
  `id_millonaria` int(11) NOT NULL,
  `irmm` varchar(20) NOT NULL,
  `numero_one` varchar(10) NOT NULL,
  `numero_dos` varchar(10) NOT NULL,
  `numero_tres` varchar(10) NOT NULL,
  `numero_cuatro` varchar(10) NOT NULL,
  `numero_cinco` varchar(10) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre_comprador` varchar(30) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `metodo_pago` int(11) NOT NULL,
  `cantidad_pago` varchar(20) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registro_numero_millonaria`
--

INSERT INTO `registro_numero_millonaria` (`id_millonaria`, `irmm`, `numero_one`, `numero_dos`, `numero_tres`, `numero_cuatro`, `numero_cinco`, `vendedor`, `valor`, `fecha`, `nombre_comprador`, `cedula`, `tipo_de_rifa`, `metodo_pago`, `cantidad_pago`, `registro`) VALUES
(1, '2024-MM-1', '124', '432', '531', '531', '532', 27047631, 2, '2024-06-26', 'Danyerbert Rangel', '27047631', 3, 1, '1234', '2024-06-26 06:03:19');

-- --------------------------------------------------------

--
-- Table structure for table `registro_numero_triple_500`
--

CREATE TABLE `registro_numero_triple_500` (
  `id_triple` int(11) NOT NULL,
  `irtq` varchar(20) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `monto_total` varchar(20) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `loteria_one` varchar(40) NOT NULL,
  `fecha` date NOT NULL,
  `nombre_comprador` varchar(30) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `metodo_pago` int(11) NOT NULL,
  `cantidad_pago` varchar(20) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `registro_numero_triple_500`
--

INSERT INTO `registro_numero_triple_500` (`id_triple`, `irtq`, `numero`, `cantidad`, `monto_total`, `vendedor`, `loteria_one`, `fecha`, `nombre_comprador`, `cedula`, `tipo_de_rifa`, `metodo_pago`, `cantidad_pago`, `registro`) VALUES
(1, '2024-TQ-1', '123', 3, '1500', 27047631, 'triple Tachira A', '2024-06-26', 'Danyerbert Rangel', '27047631', 4, 1, '1234', '2024-06-26 18:33:12'),
(2, '2024-TQ-2', '432', 3, '1500', 27047631, 'triple Tachira A', '2024-06-26', 'Danyerbert Rangel', '27047631', 4, 1, '12345', '2024-06-26 18:36:12'),
(3, '2024-TQ-3', '342', 3, '1500', 27047631, 'triple Tachira A', '2024-06-26', 'Danyerbert Rangel', '27047631', 4, 1, '1234', '2024-06-26 19:05:21'),
(4, '2024-TQ-4', '432', 3, '1500', 27047631, 'triple Tachira A', '2024-06-26', 'Danyerbert Rangel', '27047631', 4, 1, '1234', '2024-06-26 19:08:41'),
(5, '2024-TQ-5', '412', 2, '1000', 27047631, 'triple Tachira A', '2024-06-26', 'Danyerbert Rangel', '27047631', 4, 1, '1234', '2024-06-26 19:09:29'),
(6, '2024-TQ-6', '431', 4, '2000', 27047631, 'triple Tachira A', '2024-06-26', 'Danyerbert Rangel', '27047631', 4, 1, '1234', '2024-06-26 19:16:20'),
(7, '2024-TQ-7', '431', 4, '2000', 27047631, 'triple gana', '2024-06-26', 'Danyerbert Rangel', '27047631', 4, 1, '1234', '2024-06-26 20:38:23'),
(8, '2024-TQ-8', '123', 3, '1500', 27047631, 'triple Tachira A', '2024-06-26', 'Danyerbert', '27047631', 4, 1, '1234', '2024-06-26 20:39:36');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `roles` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `roles`) VALUES
(1, 'Administrador'),
(2, 'Vendedor'),
(3, 'Supervisor');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_de_rifas`
--

CREATE TABLE `tipo_de_rifas` (
  `id_rifas` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tipo_de_rifas`
--

INSERT INTO `tipo_de_rifas` (`id_rifas`, `nombre`) VALUES
(1, 'Rifa moto'),
(2, 'Doble Oportunidad'),
(3, 'Rifa Millonaria'),
(4, 'triple 500'),
(5, 'Rifa Moto Triples');

-- --------------------------------------------------------

--
-- Table structure for table `triple_acomulado`
--

CREATE TABLE `triple_acomulado` (
  `id_triple_acomulado` int(11) NOT NULL,
  `irta` varchar(20) NOT NULL,
  `numero` varchar(11) NOT NULL,
  `cedula_comprador` varchar(10) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `participacion` varchar(10) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `triple_acomulado`
--

INSERT INTO `triple_acomulado` (`id_triple_acomulado`, `irta`, `numero`, `cedula_comprador`, `vendedor`, `fecha`, `participacion`, `registro`) VALUES
(1, '2024-TA-1', '1234', '27047631', 27047631, '2024-06-26', 'Si', '2024-06-26 20:38:40'),
(2, '2024-TA-2', '1234', '27047631', 27047631, '2024-06-26', 'Si', '2024-06-26 20:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
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
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `password`, `cedula`, `id_rol`, `registro`) VALUES
(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 27047631, 1, '2024-04-15 00:32:29'),
(2, 'vendedor', '7c4a8d09ca3762af61e59520943dc26494f8941b', 27047631, 2, '2024-04-15 00:32:54'),
(4, 'supervisor', '7c4a8d09ca3762af61e59520943dc26494f8941b', 27047631, 3, '2024-05-22 23:26:30');

-- --------------------------------------------------------

--
-- Table structure for table `vendedores`
--

CREATE TABLE `vendedores` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendedores`
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
-- Table structure for table `zodiaco`
--

CREATE TABLE `zodiaco` (
  `id_zodiaco` int(11) NOT NULL,
  `zodiaco` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `zodiaco`
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
-- Indexes for dumped tables
--

--
-- Indexes for table `cantidad_venta`
--
ALTER TABLE `cantidad_venta`
  ADD PRIMARY KEY (`id_venta`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`);

--
-- Indexes for table `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  ADD PRIMARY KEY (`id_metodo_pago`);

--
-- Indexes for table `numero_bloqueado`
--
ALTER TABLE `numero_bloqueado`
  ADD PRIMARY KEY (`id_numero_bloqueo`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`);

--
-- Indexes for table `registro_moto_numero`
--
ALTER TABLE `registro_moto_numero`
  ADD PRIMARY KEY (`id_moto`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `signo` (`signo`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`),
  ADD KEY `metodo_pago` (`metodo_pago`);

--
-- Indexes for table `registro_moto_triples`
--
ALTER TABLE `registro_moto_triples`
  ADD PRIMARY KEY (`id_rifa_moto_triple`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `metodo_pago` (`metodo_pago`);

--
-- Indexes for table `registro_numero_doble_oportunidad`
--
ALTER TABLE `registro_numero_doble_oportunidad`
  ADD PRIMARY KEY (`id_doble_oportunidad`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`),
  ADD KEY `metodo_pago` (`metodo_pago`);

--
-- Indexes for table `registro_numero_millonaria`
--
ALTER TABLE `registro_numero_millonaria`
  ADD PRIMARY KEY (`id_millonaria`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`),
  ADD KEY `metodo_pago` (`metodo_pago`);

--
-- Indexes for table `registro_numero_triple_500`
--
ALTER TABLE `registro_numero_triple_500`
  ADD PRIMARY KEY (`id_triple`),
  ADD KEY `vendedor` (`vendedor`),
  ADD KEY `tipo_de_rifa` (`tipo_de_rifa`),
  ADD KEY `metodo_pago` (`metodo_pago`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tipo_de_rifas`
--
ALTER TABLE `tipo_de_rifas`
  ADD PRIMARY KEY (`id_rifas`);

--
-- Indexes for table `triple_acomulado`
--
ALTER TABLE `triple_acomulado`
  ADD PRIMARY KEY (`id_triple_acomulado`),
  ADD KEY `vendedor` (`vendedor`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_vendedor` (`cedula`);

--
-- Indexes for table `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`cedula`);

--
-- Indexes for table `zodiaco`
--
ALTER TABLE `zodiaco`
  ADD PRIMARY KEY (`id_zodiaco`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cantidad_venta`
--
ALTER TABLE `cantidad_venta`
  MODIFY `id_venta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `metodo_de_pago`
--
ALTER TABLE `metodo_de_pago`
  MODIFY `id_metodo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `numero_bloqueado`
--
ALTER TABLE `numero_bloqueado`
  MODIFY `id_numero_bloqueo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `registro_moto_numero`
--
ALTER TABLE `registro_moto_numero`
  MODIFY `id_moto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `registro_moto_triples`
--
ALTER TABLE `registro_moto_triples`
  MODIFY `id_rifa_moto_triple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registro_numero_doble_oportunidad`
--
ALTER TABLE `registro_numero_doble_oportunidad`
  MODIFY `id_doble_oportunidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registro_numero_millonaria`
--
ALTER TABLE `registro_numero_millonaria`
  MODIFY `id_millonaria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `registro_numero_triple_500`
--
ALTER TABLE `registro_numero_triple_500`
  MODIFY `id_triple` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tipo_de_rifas`
--
ALTER TABLE `tipo_de_rifas`
  MODIFY `id_rifas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `triple_acomulado`
--
ALTER TABLE `triple_acomulado`
  MODIFY `id_triple_acomulado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zodiaco`
--
ALTER TABLE `zodiaco`
  MODIFY `id_zodiaco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cantidad_venta`
--
ALTER TABLE `cantidad_venta`
  ADD CONSTRAINT `cantidad_venta_ibfk_1` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`);

--
-- Constraints for table `numero_bloqueado`
--
ALTER TABLE `numero_bloqueado`
  ADD CONSTRAINT `numero_bloqueado_ibfk_1` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`);

--
-- Constraints for table `registro_moto_numero`
--
ALTER TABLE `registro_moto_numero`
  ADD CONSTRAINT `registro_moto_numero_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  ADD CONSTRAINT `registro_moto_numero_ibfk_2` FOREIGN KEY (`signo`) REFERENCES `zodiaco` (`id_zodiaco`),
  ADD CONSTRAINT `registro_moto_numero_ibfk_3` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`),
  ADD CONSTRAINT `registro_moto_numero_ibfk_4` FOREIGN KEY (`metodo_pago`) REFERENCES `metodo_de_pago` (`id_metodo_pago`);

--
-- Constraints for table `registro_moto_triples`
--
ALTER TABLE `registro_moto_triples`
  ADD CONSTRAINT `registro_moto_triples_ibfk_1` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`),
  ADD CONSTRAINT `registro_moto_triples_ibfk_2` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  ADD CONSTRAINT `registro_moto_triples_ibfk_3` FOREIGN KEY (`metodo_pago`) REFERENCES `metodo_de_pago` (`id_metodo_pago`);

--
-- Constraints for table `registro_numero_doble_oportunidad`
--
ALTER TABLE `registro_numero_doble_oportunidad`
  ADD CONSTRAINT `registro_numero_doble_oportunidad_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  ADD CONSTRAINT `registro_numero_doble_oportunidad_ibfk_2` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`),
  ADD CONSTRAINT `registro_numero_doble_oportunidad_ibfk_3` FOREIGN KEY (`metodo_pago`) REFERENCES `metodo_de_pago` (`id_metodo_pago`);

--
-- Constraints for table `registro_numero_millonaria`
--
ALTER TABLE `registro_numero_millonaria`
  ADD CONSTRAINT `registro_numero_millonaria_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  ADD CONSTRAINT `registro_numero_millonaria_ibfk_2` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`),
  ADD CONSTRAINT `registro_numero_millonaria_ibfk_3` FOREIGN KEY (`metodo_pago`) REFERENCES `metodo_de_pago` (`id_metodo_pago`);

--
-- Constraints for table `registro_numero_triple_500`
--
ALTER TABLE `registro_numero_triple_500`
  ADD CONSTRAINT `registro_numero_triple_500_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  ADD CONSTRAINT `registro_numero_triple_500_ibfk_2` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`),
  ADD CONSTRAINT `registro_numero_triple_500_ibfk_3` FOREIGN KEY (`metodo_pago`) REFERENCES `metodo_de_pago` (`id_metodo_pago`);

--
-- Constraints for table `triple_acomulado`
--
ALTER TABLE `triple_acomulado`
  ADD CONSTRAINT `triple_acomulado_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`cedula`) REFERENCES `vendedores` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
