-- --------------------------------------------------------
-- Host:                         127.0.0.1
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
CREATE DATABASE IF NOT EXISTS `seguimiento_covid` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish_ci */;
USE `seguimiento_covid`;

-- Volcando estructura para tabla seguimiento_covid.complemento_seg
CREATE TABLE IF NOT EXISTS `complemento_seg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `antecedentes_viaje` varchar(45) DEFAULT NULL,
  `paises_ciudades_viajes` varchar(45) DEFAULT NULL,
  `atencion_medica_domiciliaria` varchar(50) NOT NULL,
  `fecha_atencion_medica_domiciliaria` date NOT NULL,
  `realizacion_hemograma` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pacientes` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario` (`id_usuario`),
  KEY `id_paciente` (`id_pacientes`),
  CONSTRAINT `complemento_seg_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  CONSTRAINT `complemento_seg_ibfk_2` FOREIGN KEY (`id_pacientes`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla seguimiento_covid.pacientes
CREATE TABLE IF NOT EXISTS `pacientes` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `primer_nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_paciente` text NOT NULL,
  `segundo_nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `primer_apellido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `tipo_documento` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` bigint(100) NOT NULL,
  `edad` int(100) NOT NULL,
  `unidad_medida` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` bigint(100) NOT NULL,
  `telefono2` bigint(20) DEFAULT NULL,
  `aseguradora` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `regimen` varchar(50) NOT NULL,
  `estado_paciente` enum('VIVO','MUERTO') NOT NULL DEFAULT 'VIVO',
  `fecha_fallecimiento` datetime DEFAULT NULL,
  `fecha_prog_recep` datetime DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_usuario` int(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `numero_documento` (`numero_documento`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla seguimiento_covid.prog_toma_muestra
CREATE TABLE IF NOT EXISTS `prog_toma_muestra` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `pacientes_id` int(11) NOT NULL,
  `acepta_visita` text,
  `fecha_programacion` datetime DEFAULT NULL,
  `fecha_realizacion` datetime DEFAULT NULL,
  `visita_exitosa` varchar(50) DEFAULT NULL,
  `tipo_prueba` varchar(50) DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
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
  CONSTRAINT `prog_toma_muestra_ibfk_1` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=146 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla seguimiento_covid.seguimiento_paciente
CREATE TABLE IF NOT EXISTS `seguimiento_paciente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complemento_seg_id` int(11) NOT NULL,
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
  `ambito_atencion` varchar(50) NOT NULL,
  `saturacion_oxigeno` varchar(50) NOT NULL,
  `actual` enum('si','no') DEFAULT 'si',
  `id_usuario` int(11) NOT NULL,
  `id_pacientes` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_pacientes` (`id_pacientes`),
  KEY `seguimiento_paciente_ibfk_2` (`id_usuario`),
  KEY `complemento_seg_id` (`complemento_seg_id`),
  CONSTRAINT `seguimiento_paciente_ibfk_3` FOREIGN KEY (`complemento_seg_id`) REFERENCES `complemento_seg` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=80 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla seguimiento_covid.segunda_toma_muestra_control
CREATE TABLE IF NOT EXISTS `segunda_toma_muestra_control` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pacientes_id` int(11) NOT NULL,
  `fecha_programacion` date DEFAULT NULL,
  `fecha_de_toma` datetime DEFAULT NULL,
  `resultado` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `soporte_resultado` longtext,
  `visita_domiciliaria` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_resgistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `visita_campo` varchar(50) DEFAULT NULL,
  `estado_proceso` varchar(15) NOT NULL DEFAULT 'ACTIVO',
  `notificado` varchar(2) NOT NULL DEFAULT 'NO',
  `fecha_notificacion` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla seguimiento_covid.soporte_resultado
CREATE TABLE IF NOT EXISTS `soporte_resultado` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `soporte_resultado` text COLLATE utf8_spanish_ci NOT NULL,
  `pacientes_id` int(11) NOT NULL,
  `fecha_registro` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `pacientes_id` (`pacientes_id`),
  CONSTRAINT `FK_soporte_resultado_pacientes` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- La exportación de datos fue deseleccionada.

-- Volcando estructura para tabla seguimiento_covid.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(100) NOT NULL AUTO_INCREMENT,
  `nombre_apellido` varchar(45) NOT NULL,
  `identificacion` varchar(50) NOT NULL DEFAULT '',
  `clave` varchar(100) NOT NULL,
  `roles` enum('Auxiliar de enfermeria','Jefe de Enfermeria','Medico general') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `identificacion` (`identificacion`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8;

-- La exportación de datos fue deseleccionada.

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
