-- --------------------------------------------------------
-- Host:                         localhost
-- Versión del servidor:         5.7.24 - MySQL Community Server (GPL)
-- SO del servidor:              Win64
-- HeidiSQL Versión:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Volcando estructura de base de datos para seguimiento_covid
CREATE DATABASE IF NOT EXISTS `seguimiento_covid` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `seguimiento_covid`;

-- Volcando estructura para tabla seguimiento_covid.complemento_seg
CREATE TABLE IF NOT EXISTS `complemento_seg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `antecedentes_viaje` varchar(45) DEFAULT NULL,
  `paises_ciudades_viajes` varchar(45) DEFAULT NULL,
  `atencion_medica_domiciliaria` varchar(50) NOT NULL,
  `fecha_atencion_medica_domiciliaria` date DEFAULT NULL,
  `realizacion_hemograma` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pacientes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_paciente` (`id_pacientes`),
  CONSTRAINT `complemento_seg_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `complemento_seg_ibfk_2` FOREIGN KEY (`id_pacientes`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla seguimiento_covid.complemento_seg: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `complemento_seg` DISABLE KEYS */;
INSERT INTO `complemento_seg` (`id`, `antecedentes_viaje`, `paises_ciudades_viajes`, `atencion_medica_domiciliaria`, `fecha_atencion_medica_domiciliaria`, `realizacion_hemograma`, `id_usuario`, `id_pacientes`) VALUES
	(1, 'NO', 'NO', 'Si', NULL, 'si lo tiene', 50, 1),
	(2, 'NO', 'NO', 'Si', NULL, 'si lo tiene', 50, 2);
/*!40000 ALTER TABLE `complemento_seg` ENABLE KEYS */;

-- Volcando estructura para tabla seguimiento_covid.llamadas_fallidas
CREATE TABLE IF NOT EXISTS `llamadas_fallidas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `role_usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombre_paciente` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `telefono_paciente` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefono_paciente_2` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `motivo` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `FK_llamadas_fallidas_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla seguimiento_covid.llamadas_fallidas: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `llamadas_fallidas` DISABLE KEYS */;
/*!40000 ALTER TABLE `llamadas_fallidas` ENABLE KEYS */;

-- Volcando estructura para tabla seguimiento_covid.pacientes
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `primer_nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_paciente` text NOT NULL,
  `segundo_nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `primer_apellido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `tipo_documento` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` bigint(20) NOT NULL,
  `edad` int(11) NOT NULL,
  `unidad_medida` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `correo` varchar(100) DEFAULT NULL,
  `telefono` bigint(20) NOT NULL,
  `telefono2` bigint(20) DEFAULT NULL,
  `aseguradora` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `novedad_paciente` varchar(40) DEFAULT NULL,
  `regimen` varchar(50) NOT NULL,
  `estado_paciente` enum('VIVO','MUERTO') NOT NULL DEFAULT 'VIVO',
  `fecha_fallecimiento` datetime DEFAULT NULL,
  `laboratorio` varchar(50) DEFAULT NULL,
  `trabajador_salud` enum('SI','NO') DEFAULT NULL,
  `contacto_caso_confirmado` enum('SI','NO') DEFAULT NULL,
  `observacion_paciente` text,
  `fecha_nacimiento` date DEFAULT NULL,
  `fecha_prog_recep` datetime DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario_programacion` int(11) DEFAULT NULL,
  `id_usuario_seguimiento` int(11) DEFAULT NULL,
  `id_usuario_notificacion` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_documento` (`numero_documento`),
  KEY `FK_pacientes_usuarios_seguimiento` (`id_usuario_seguimiento`),
  KEY `FK_pacientes_usuarios_programacion` (`id_usuario_programacion`),
  KEY `FK_pacientes_usuarios_notificacion` (`id_usuario_notificacion`),
  CONSTRAINT `FK_pacientes_usuarios_notificacion` FOREIGN KEY (`id_usuario_notificacion`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_pacientes_usuarios_programacion` FOREIGN KEY (`id_usuario_programacion`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  CONSTRAINT `FK_pacientes_usuarios_seguimiento` FOREIGN KEY (`id_usuario_seguimiento`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla seguimiento_covid.pacientes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `pacientes` DISABLE KEYS */;
INSERT INTO `pacientes` (`id`, `primer_nombre`, `tipo_paciente`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `tipo_documento`, `numero_documento`, `edad`, `unidad_medida`, `sexo`, `barrio`, `municipio`, `correo`, `telefono`, `telefono2`, `aseguradora`, `novedad_paciente`, `regimen`, `estado_paciente`, `fecha_fallecimiento`, `laboratorio`, `trabajador_salud`, `contacto_caso_confirmado`, `observacion_paciente`, `fecha_nacimiento`, `fecha_prog_recep`, `fecha_registro`, `id_usuario_programacion`, `id_usuario_seguimiento`, `id_usuario_notificacion`) VALUES
	(1, 'Victor', 'COMORBILIDAD', 'Daniel', 'Zabaleta', 'Castellar', 'CC', 1001975759, 20, 'AÃ‘OS', 'MASCULINO', 'Buenos Aires Diagonal 49 #50-85', 'CARTAGENA (13001)', 'zabaletacastellar@gmail.com', 3015487821, 3015487821, 'MUTUAL SER', '', 'SUBSIDIADO', 'VIVO', NULL, 'ANALIZAR LCA', 'SI', 'NO', 'UwU', '1999-12-02', NULL, '2020-10-05 15:48:34', 50, 52, NULL),
	(2, 'Esteban', 'CASO INDICE', 'Alberto', 'Zabaleta', 'Castellar', 'CC', 1001975753, 19, 'AÃ‘OS', 'MASCULINO', 'Buenos Aires Diagonal 49 #50-85', 'CARTAGENA (13001)', 'zabaletacastellar@gmail.com', 3015784892, 3015784892, 'MUTUAL SER', '', 'SUBSIDIADO', 'VIVO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-10-05 15:49:41', 50, 52, 51);
/*!40000 ALTER TABLE `pacientes` ENABLE KEYS */;

-- Volcando estructura para tabla seguimiento_covid.prog_toma_muestra
CREATE TABLE IF NOT EXISTS `prog_toma_muestra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` int(11) DEFAULT NULL,
  `pacientes_id` int(11) NOT NULL,
  `acepta_visita` text,
  `fecha_programacion` datetime DEFAULT NULL,
  `fecha_realizacion` datetime DEFAULT NULL,
  `visita_exitosa` varchar(50) DEFAULT NULL,
  `tipo_prueba` varchar(50) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `motivo` text,
  `programacion_atencion` varchar(45) DEFAULT NULL,
  `programa_pertenece` varchar(45) DEFAULT NULL,
  `fecha_entrega_lab` date DEFAULT NULL,
  `fecha_procesamiento` date DEFAULT NULL,
  `fecha_resultado` date DEFAULT NULL,
  `resultado` enum('Positivo','Negativo','Pendiente') DEFAULT 'Pendiente',
  `estado_proceso` varchar(10) NOT NULL DEFAULT 'ACTIVO',
  `notificado` varchar(2) NOT NULL DEFAULT 'NO',
  `fecha_notificacion` datetime DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index_paciente` (`pacientes_id`),
  KEY `usuario_id` (`usuario_id`),
  CONSTRAINT `FK_prog_toma_muestra_usuarios` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `prog_toma_muestra_ibfk_1` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla seguimiento_covid.prog_toma_muestra: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `prog_toma_muestra` DISABLE KEYS */;
INSERT INTO `prog_toma_muestra` (`id`, `usuario_id`, `pacientes_id`, `acepta_visita`, `fecha_programacion`, `fecha_realizacion`, `visita_exitosa`, `tipo_prueba`, `observacion`, `motivo`, `programacion_atencion`, `programa_pertenece`, `fecha_entrega_lab`, `fecha_procesamiento`, `fecha_resultado`, `resultado`, `estado_proceso`, `notificado`, `fecha_notificacion`, `fecha_registro`) VALUES
	(31, 52, 1, 'SI', '2020-10-13 00:00:00', '2020-10-14 10:41:04', 'SI', 'PCR', 'sin observacion', 'sin motivo', 'CERCO', 'NINGUNO', NULL, NULL, NULL, 'Pendiente', 'ACTIVO', 'NO', NULL, '2020-10-13 17:40:28'),
	(44, 50, 2, 'SI', '2020-10-14 03:23:27', NULL, NULL, NULL, NULL, NULL, 'HOSPITALARIO', 'NINGUNO', NULL, NULL, NULL, 'Pendiente', 'ACTIVO', 'NO', NULL, '2020-10-14 10:23:27');
/*!40000 ALTER TABLE `prog_toma_muestra` ENABLE KEYS */;

-- Volcando estructura para tabla seguimiento_covid.seguimiento_paciente
CREATE TABLE IF NOT EXISTS `seguimiento_paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complemento_seg_id` int(11) NOT NULL,
  `tipo_toma` enum('Primera toma','Segunda toma') NOT NULL DEFAULT 'Primera toma',
  `fecha_hora` timestamp NOT NULL,
  `asintomatico` varchar(45) NOT NULL,
  `fecha_sintomas` date DEFAULT NULL,
  `fiebre_cuantificada` varchar(45) NOT NULL,
  `tos` varchar(45) NOT NULL,
  `dificultad_respiratoria` varchar(45) NOT NULL,
  `odinofagia` varchar(45) NOT NULL,
  `fatiga_adinamia` varchar(45) NOT NULL,
  `cumple_criterios` varchar(50) NOT NULL,
  `comorbilidad` varchar(50) DEFAULT NULL,
  `entrega_kits` varchar(50) DEFAULT NULL,
  `fecha_entrega_kits` date DEFAULT NULL,
  `oxigeno_terapia` varchar(50) DEFAULT NULL,
  `tipo_flujo` enum('Alto flujo','Bajo flujo') DEFAULT NULL,
  `ambito_atencion` varchar(50) NOT NULL,
  `saturacion_oxigeno` varchar(50) NOT NULL,
  `actual` enum('si','no') DEFAULT 'si',
  `novedad_paciente` longtext,
  `paciente_recuperado` enum('SI','NO','POR DEFINIR') DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pacientes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pacientes` (`id_pacientes`),
  KEY `seguimiento_paciente_ibfk_2` (`id_usuario`),
  KEY `complemento_seg_id` (`complemento_seg_id`),
  CONSTRAINT `seguimiento_paciente_ibfk_3` FOREIGN KEY (`complemento_seg_id`) REFERENCES `complemento_seg` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla seguimiento_covid.seguimiento_paciente: ~17 rows (aproximadamente)
/*!40000 ALTER TABLE `seguimiento_paciente` DISABLE KEYS */;
INSERT INTO `seguimiento_paciente` (`id`, `complemento_seg_id`, `tipo_toma`, `fecha_hora`, `asintomatico`, `fecha_sintomas`, `fiebre_cuantificada`, `tos`, `dificultad_respiratoria`, `odinofagia`, `fatiga_adinamia`, `cumple_criterios`, `comorbilidad`, `entrega_kits`, `fecha_entrega_kits`, `oxigeno_terapia`, `tipo_flujo`, `ambito_atencion`, `saturacion_oxigeno`, `actual`, `novedad_paciente`, `paciente_recuperado`, `id_usuario`, `id_pacientes`) VALUES
	(1, 1, 'Primera toma', '2020-10-05 15:56:20', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'Si', 'Si', 'No', NULL, 'No', NULL, 'HOTEL', '16', 'no', 'Sin novedad', 'NO', 50, 1),
	(2, 1, 'Primera toma', '2020-10-05 15:58:21', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'HOTEL', '35', 'no', 'Sin novedad', 'NO', 50, 1),
	(3, 1, 'Primera toma', '2020-10-05 16:03:24', 'No', '2020-10-05', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', NULL, 'Si', '2020-10-05', 'Si', 'Alto flujo', 'DOMICILIO', '31', 'no', 'mal', 'NO', 50, 1),
	(4, 1, 'Primera toma', '2020-10-05 16:05:07', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'Si', NULL, 'No', NULL, 'No', NULL, 'DOMICILIO', '0', 'no', 'Sin novedad', 'SI', 51, 1),
	(5, 1, 'Segunda toma', '2020-10-06 11:28:22', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'Si', NULL, 'No', NULL, 'No', NULL, 'DOMICILIO', '8', 'no', 'Sin novedad', 'NO', 50, 1),
	(6, 1, 'Segunda toma', '2020-10-06 11:31:43', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'DOMICILIO', '9', 'no', 'Sin novedad', 'NO', 51, 1),
	(7, 2, 'Primera toma', '2020-10-06 11:58:27', 'No', '2020-10-06', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', '2020-10-06', 'Si', 'Alto flujo', 'HOTEL', '27', 'no', 'Sin novedad', 'NO', 50, 2),
	(8, 2, 'Primera toma', '2020-10-06 11:59:00', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'CASA COVID', '9', 'no', 'Sin novedad', 'NO', 50, 2),
	(9, 2, 'Primera toma', '2020-10-06 11:59:29', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'HOTEL', '3', 'no', 'Sin novedad', 'SI', 51, 2),
	(10, 2, 'Segunda toma', '2020-10-06 12:00:53', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'DOMICILIO', '7', 'no', 'Sin novedad', 'NO', 51, 2),
	(11, 2, 'Segunda toma', '2020-10-06 12:02:16', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'DOMICILIO', '4', 'si', 'Sin novedad', 'NO', 51, 2),
	(12, 1, 'Segunda toma', '2020-10-09 13:45:51', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'DOMICILIO', '9', 'no', 'Sin novedad', 'NO', 50, 1),
	(13, 1, 'Segunda toma', '2020-10-09 13:46:27', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'DOMICILIO', '7', 'no', 'Sin novedad', 'NO', 51, 1),
	(14, 1, 'Segunda toma', '2020-10-09 13:54:34', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'DOMICILIO', '0', 'no', 'Sin novedad', 'SI', 51, 1),
	(15, 1, 'Segunda toma', '2020-10-09 13:58:26', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'DOMICILIO', '0', 'no', 'Sin novedad', 'NO', 51, 1),
	(16, 1, 'Segunda toma', '2020-10-09 14:33:06', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'CASA COVID', '0', 'no', 'Sin novedad', 'NO', 51, 1),
	(17, 1, 'Segunda toma', '2020-10-09 14:35:00', 'Si', NULL, 'No', 'No', 'No', 'No', 'No', 'No', NULL, 'No', NULL, 'No', NULL, 'DOMICILIO', '0', 'si', 'Sin novedad', 'SI', 51, 1);
/*!40000 ALTER TABLE `seguimiento_paciente` ENABLE KEYS */;

-- Volcando estructura para tabla seguimiento_covid.segunda_toma_muestra_control_2
CREATE TABLE IF NOT EXISTS `segunda_toma_muestra_control_2` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `pacientes_id` int(11) NOT NULL,
  `acepta_visita` text,
  `fecha_programacion` datetime DEFAULT NULL,
  `fecha_realizacion` datetime DEFAULT NULL,
  `visita_exitosa` varchar(50) DEFAULT NULL,
  `tipo_prueba` varchar(50) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `motivo` text,
  `programacion_atencion` varchar(45) DEFAULT NULL,
  `programa_pertenece` varchar(45) DEFAULT NULL,
  `fecha_entrega_lab` date DEFAULT NULL,
  `fecha_procesamiento` date DEFAULT NULL,
  `fecha_resultado` date DEFAULT NULL,
  `resultado` enum('Positivo','Negativo','Pendiente') DEFAULT 'Pendiente',
  `estado_proceso` varchar(10) NOT NULL DEFAULT 'ACTIVO',
  `notificado` varchar(2) NOT NULL DEFAULT 'NO',
  `fecha_notificacion` datetime DEFAULT NULL,
  `fecha_registro` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `pacientes_id` (`pacientes_id`),
  KEY `index_paciente` (`pacientes_id`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `FK_segunda_toma_muestra_control-2_pacientes` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`),
  CONSTRAINT `FK_segunda_toma_muestra_control_2_usuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla seguimiento_covid.segunda_toma_muestra_control_2: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `segunda_toma_muestra_control_2` DISABLE KEYS */;
INSERT INTO `segunda_toma_muestra_control_2` (`id`, `id_usuario`, `pacientes_id`, `acepta_visita`, `fecha_programacion`, `fecha_realizacion`, `visita_exitosa`, `tipo_prueba`, `observacion`, `motivo`, `programacion_atencion`, `programa_pertenece`, `fecha_entrega_lab`, `fecha_procesamiento`, `fecha_resultado`, `resultado`, `estado_proceso`, `notificado`, `fecha_notificacion`, `fecha_registro`) VALUES
	(4, 50, 1, 'SI', '2020-10-07 03:34:32', NULL, NULL, NULL, NULL, NULL, 'SEDE DE CAMINOS', 'NO APLICA', NULL, NULL, NULL, 'Pendiente', 'ACTIVO', 'NO', NULL, '2020-10-07 10:34:32');
/*!40000 ALTER TABLE `segunda_toma_muestra_control_2` ENABLE KEYS */;

-- Volcando estructura para tabla seguimiento_covid.soporte_resultado
CREATE TABLE IF NOT EXISTS `soporte_resultado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soporte_resultado` text COLLATE utf8_spanish_ci NOT NULL,
  `pacientes_id` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pacientes_id` (`pacientes_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- Volcando datos para la tabla seguimiento_covid.soporte_resultado: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `soporte_resultado` DISABLE KEYS */;
/*!40000 ALTER TABLE `soporte_resultado` ENABLE KEYS */;

-- Volcando estructura para tabla seguimiento_covid.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(45) NOT NULL,
  `identificacion` varchar(50) NOT NULL DEFAULT '',
  `clave` varchar(100) NOT NULL,
  `roles` enum('Auxiliar de programacion','Auxiliar de seguimiento','Coordinador covid','Medico','Digitador') NOT NULL,
  `sede` enum('Cartagena','Barranquilla','Carmen de bolivar') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identificacion` (`identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=54 DEFAULT CHARSET=utf8;

-- Volcando datos para la tabla seguimiento_covid.usuarios: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` (`id`, `nombre_apellido`, `identificacion`, `clave`, `roles`, `sede`) VALUES
	(50, 'Daniel Zabaleta Castellar', '1001975759', '1001975759', 'Digitador', 'Cartagena'),
	(51, 'Esteban Zabaleta Castellar', '1001975753', '1001975753', 'Medico', 'Cartagena'),
	(52, 'Dylan Zabaleta Castellar', '1001975760', '1001975760', 'Auxiliar de seguimiento', 'Cartagena'),
	(53, 'Berquis Castellar Benavides', '1001975761', '1001975761', 'Auxiliar de programacion', 'Cartagena');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
