-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         10.4.32-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para control_de_rifas_l10
CREATE DATABASE IF NOT EXISTS `control_de_rifas_l10` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;
USE `control_de_rifas_l10`;

-- Volcando estructura para tabla control_de_rifas_l10.cantidad_venta
CREATE TABLE IF NOT EXISTS `cantidad_venta` (
  `id_venta` int(11) NOT NULL AUTO_INCREMENT,
  `cantidad_venta` varchar(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_venta`),
  KEY `tipo_de_rifa` (`tipo_de_rifa`),
  CONSTRAINT `cantidad_venta_ibfk_1` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.cantidad_venta: ~0 rows (aproximadamente)
DELETE FROM `cantidad_venta`;
INSERT INTO `cantidad_venta` (`id_venta`, `cantidad_venta`, `fecha`, `tipo_de_rifa`, `registro`) VALUES
	(1, '2', '2024-05-21', 5, '2024-05-22 00:38:53');

-- Volcando estructura para tabla control_de_rifas_l10.numero_bloqueado
CREATE TABLE IF NOT EXISTS `numero_bloqueado` (
  `id_numero_bloqueo` int(11) NOT NULL AUTO_INCREMENT,
  `numero` int(10) NOT NULL,
  `fecha` date NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  PRIMARY KEY (`id_numero_bloqueo`),
  KEY `tipo_de_rifa` (`tipo_de_rifa`),
  CONSTRAINT `numero_bloqueado_ibfk_1` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.numero_bloqueado: ~11 rows (aproximadamente)
DELETE FROM `numero_bloqueado`;
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

-- Volcando estructura para tabla control_de_rifas_l10.registro_moto_numero
CREATE TABLE IF NOT EXISTS `registro_moto_numero` (
  `id_moto` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(11) NOT NULL,
  `signo` int(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cedula` varchar(20) NOT NULL,
  `valor` int(11) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_moto`),
  KEY `vendedor` (`vendedor`),
  KEY `signo` (`signo`),
  KEY `tipo_de_rifa` (`tipo_de_rifa`),
  CONSTRAINT `registro_moto_numero_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  CONSTRAINT `registro_moto_numero_ibfk_2` FOREIGN KEY (`signo`) REFERENCES `zodiaco` (`id_zodiaco`),
  CONSTRAINT `registro_moto_numero_ibfk_3` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.registro_moto_numero: ~0 rows (aproximadamente)
DELETE FROM `registro_moto_numero`;

-- Volcando estructura para tabla control_de_rifas_l10.registro_moto_triples
CREATE TABLE IF NOT EXISTS `registro_moto_triples` (
  `id_rifa_moto_triple` int(11) NOT NULL AUTO_INCREMENT,
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
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_rifa_moto_triple`),
  KEY `tipo_de_rifa` (`tipo_de_rifa`),
  KEY `vendedor` (`vendedor`),
  CONSTRAINT `registro_moto_triples_ibfk_1` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`),
  CONSTRAINT `registro_moto_triples_ibfk_2` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.registro_moto_triples: ~2 rows (aproximadamente)
DELETE FROM `registro_moto_triples`;
INSERT INTO `registro_moto_triples` (`id_rifa_moto_triple`, `numero_primero`, `numero_segundo`, `zodiacal_primero`, `zodiacal_segundo`, `fecha`, `vendedor`, `nombre`, `cedula`, `valor`, `tipo_de_rifa`, `registro`) VALUES
	(1, '111', '222', 'Aries', 'Aries', '2024-05-21', 27047631, 'No obtenidos', 'No obtenid', 1, 5, '2024-05-22 00:40:33'),
	(2, '111', '222', 'Aries', 'Aries', '2024-05-21', 27047631, 'No obtenidos', 'No obtenid', 1, 5, '2024-05-22 00:40:43');

-- Volcando estructura para tabla control_de_rifas_l10.registro_numero_doble_oportunidad
CREATE TABLE IF NOT EXISTS `registro_numero_doble_oportunidad` (
  `id_doble_oportunidad` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `cedula` varchar(10) NOT NULL,
  `valor` int(11) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_doble_oportunidad`),
  KEY `vendedor` (`vendedor`),
  KEY `tipo_de_rifa` (`tipo_de_rifa`),
  CONSTRAINT `registro_numero_doble_oportunidad_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  CONSTRAINT `registro_numero_doble_oportunidad_ibfk_2` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.registro_numero_doble_oportunidad: ~0 rows (aproximadamente)
DELETE FROM `registro_numero_doble_oportunidad`;
INSERT INTO `registro_numero_doble_oportunidad` (`id_doble_oportunidad`, `numero`, `vendedor`, `fecha`, `nombre`, `cedula`, `valor`, `tipo_de_rifa`, `registro`) VALUES
	(1, '452', 27047631, '2024-05-06', 'No obtenidos.', 'No obtenid', 2, 2, '2024-05-06 23:15:51');

-- Volcando estructura para tabla control_de_rifas_l10.registro_numero_millonaria
CREATE TABLE IF NOT EXISTS `registro_numero_millonaria` (
  `id_millonaria` int(11) NOT NULL AUTO_INCREMENT,
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
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_millonaria`),
  KEY `vendedor` (`vendedor`),
  KEY `tipo_de_rifa` (`tipo_de_rifa`),
  CONSTRAINT `registro_numero_millonaria_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  CONSTRAINT `registro_numero_millonaria_ibfk_2` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.registro_numero_millonaria: ~0 rows (aproximadamente)
DELETE FROM `registro_numero_millonaria`;
INSERT INTO `registro_numero_millonaria` (`id_millonaria`, `numero_one`, `numero_dos`, `numero_tres`, `numero_cuatro`, `numero_cinco`, `vendedor`, `valor`, `fecha`, `nombre`, `cedula`, `tipo_de_rifa`, `registro`) VALUES
	(1, '741', '563', '125', '111', '020', 27047631, 2, '2024-05-06', 'No obtenido', 'No obtenid', 3, '2024-05-06 23:16:02');

-- Volcando estructura para tabla control_de_rifas_l10.registro_numero_triple_500
CREATE TABLE IF NOT EXISTS `registro_numero_triple_500` (
  `id_triple` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(11) NOT NULL,
  `cantidad` int(20) NOT NULL,
  `monto_total` varchar(20) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cedula` varchar(11) NOT NULL,
  `tipo_de_rifa` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_triple`),
  KEY `vendedor` (`vendedor`),
  KEY `tipo_de_rifa` (`tipo_de_rifa`),
  CONSTRAINT `registro_numero_triple_500_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`),
  CONSTRAINT `registro_numero_triple_500_ibfk_2` FOREIGN KEY (`tipo_de_rifa`) REFERENCES `tipo_de_rifas` (`id_rifas`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.registro_numero_triple_500: ~18 rows (aproximadamente)
DELETE FROM `registro_numero_triple_500`;
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

-- Volcando estructura para tabla control_de_rifas_l10.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roles` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.roles: ~2 rows (aproximadamente)
DELETE FROM `roles`;
INSERT INTO `roles` (`id`, `roles`) VALUES
	(1, 'Administrador'),
	(2, 'Vendedor'),
	(3, 'Supervisor');

-- Volcando estructura para tabla control_de_rifas_l10.tipo_de_rifas
CREATE TABLE IF NOT EXISTS `tipo_de_rifas` (
  `id_rifas` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  PRIMARY KEY (`id_rifas`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.tipo_de_rifas: ~3 rows (aproximadamente)
DELETE FROM `tipo_de_rifas`;
INSERT INTO `tipo_de_rifas` (`id_rifas`, `nombre`) VALUES
	(1, 'Rifa moto'),
	(2, 'Doble Oportunidad'),
	(3, 'Rifa Millonaria'),
	(4, 'triple 500'),
	(5, 'Rifa Moto Triples');

-- Volcando estructura para tabla control_de_rifas_l10.triple_acomulado
CREATE TABLE IF NOT EXISTS `triple_acomulado` (
  `id_triple_acomulado` int(11) NOT NULL AUTO_INCREMENT,
  `numero` varchar(11) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `participacion` varchar(10) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id_triple_acomulado`),
  KEY `vendedor` (`vendedor`),
  CONSTRAINT `triple_acomulado_ibfk_1` FOREIGN KEY (`vendedor`) REFERENCES `vendedores` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.triple_acomulado: ~2 rows (aproximadamente)
DELETE FROM `triple_acomulado`;
INSERT INTO `triple_acomulado` (`id_triple_acomulado`, `numero`, `vendedor`, `fecha`, `participacion`, `registro`) VALUES
	(1, '1485', 27047631, '2024-05-24', 'Si', '2024-05-24 23:23:49'),
	(2, '7899', 27047631, '2024-05-24', 'Si', '2024-05-24 23:25:23');

-- Volcando estructura para tabla control_de_rifas_l10.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `cedula` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `id_rol` (`id_rol`),
  KEY `id_vendedor` (`cedula`),
  CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`),
  CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`cedula`) REFERENCES `vendedores` (`cedula`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.usuario: ~2 rows (aproximadamente)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`id`, `usuario`, `password`, `cedula`, `id_rol`, `registro`) VALUES
	(1, 'admin', '7c4a8d09ca3762af61e59520943dc26494f8941b', 27047631, 1, '2024-04-15 00:32:29'),
	(2, 'vendedor', '7c4a8d09ca3762af61e59520943dc26494f8941b', 27047631, 2, '2024-04-15 00:32:54'),
	(4, 'supervisor', '7c4a8d09ca3762af61e59520943dc26494f8941b', 27047631, 3, '2024-05-22 23:26:30');

-- Volcando estructura para tabla control_de_rifas_l10.vendedores
CREATE TABLE IF NOT EXISTS `vendedores` (
  `cedula` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `correo` varchar(60) NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.vendedores: ~3 rows (aproximadamente)
DELETE FROM `vendedores`;
INSERT INTO `vendedores` (`cedula`, `nombre`, `telefono`, `correo`) VALUES
	(12345670, 'Daniela', '04264325675', 'daniela@gmail.com'),
	(12345677, 'Luis Navarro', '04264567889', 'lnavarro@gmail.com'),
	(12345678, 'Luis Navarro', '04264567889', 'lnavarro@gmail.com'),
	(12916293, 'Yasmin Brito', '04269004314', 'yasmin@gmail.com'),
	(15170361, 'barbara aguilar', '04265146937', 'barbaraedwina.at@gmail.com'),
	(19776509, 'Angy reyes', '04121227836', 'angyhoelyreyes@gmail.com'),
	(27047631, 'Danyerbert Rangel', '04126296504', 'danyerbert@gmail.com');

-- Volcando estructura para tabla control_de_rifas_l10.zodiaco
CREATE TABLE IF NOT EXISTS `zodiaco` (
  `id_zodiaco` int(11) NOT NULL AUTO_INCREMENT,
  `zodiaco` varchar(20) NOT NULL,
  PRIMARY KEY (`id_zodiaco`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Volcando datos para la tabla control_de_rifas_l10.zodiaco: ~12 rows (aproximadamente)
DELETE FROM `zodiaco`;
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

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
