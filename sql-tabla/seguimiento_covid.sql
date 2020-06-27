-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:8889
-- Tiempo de generación: 27-06-2020 a las 14:26:46
-- Versión del servidor: 5.7.26
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `seguimiento_covid`
--
CREATE DATABASE IF NOT EXISTS `seguimiento_covid` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `seguimiento_covid`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `complemento_seg`
--

DROP TABLE IF EXISTS `complemento_seg`;
CREATE TABLE `complemento_seg` (
  `id` int(11) NOT NULL,
  `antecedentes_viaje` varchar(45) DEFAULT NULL,
  `paises_ciudades_viajes` varchar(45) DEFAULT NULL,
  `atencion_medica_domiciliaria` varchar(50) NOT NULL,
  `fecha_atencion_medica_domiciliaria` date NOT NULL,
  `realizacion_hemograma` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pacientes` int(11) NOT NULL,
  `estado_proceso` varchar(10) NOT NULL DEFAULT 'ACTIVO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `complemento_seg`
--

INSERT INTO `complemento_seg` (`id`, `antecedentes_viaje`, `paises_ciudades_viajes`, `atencion_medica_domiciliaria`, `fecha_atencion_medica_domiciliaria`, `realizacion_hemograma`, `id_usuario`, `id_pacientes`, `estado_proceso`) VALUES
(1, 'SI', 'ESPAÑA', 'No', '2020-06-11', 'SI LO TIENE', 1, 7, 'ACTIVO'),
(3, 'SI', 'ESPAÑA', 'Si', '2020-06-25', 'SI LO TIENE', 1, 12, 'ACTIVO'),
(4, 'SI', 'BOGOTA', 'Si', '2020-06-19', 'SI LO TIENE', 1, 1, 'ACTIVO'),
(5, 'SI', 'ESPAÑA', 'Si', '2020-06-10', 'SI LO TIENE', 1, 15, 'ACTIVO'),
(6, 'NO', 'ALEMANIA', 'Si', '2020-06-19', 'NO', 2, 20, 'ACTIVO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pacientes`
--

DROP TABLE IF EXISTS `pacientes`;
CREATE TABLE `pacientes` (
  `id` int(100) NOT NULL,
  `primer_nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_paciente` text NOT NULL,
  `segundo_nombre` text CHARACTER SET utf8 COLLATE utf8_spanish_ci,
  `primer_apellido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `segundo_apellido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `tipo_documento` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `numero_documento` bigint(100) NOT NULL,
  `edad` int(100) NOT NULL,
  `unidad_medida` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `barrio` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` bigint(100) NOT NULL,
  `aseguradora` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_prog_recep` datetime DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pacientes`
--

INSERT INTO `pacientes` (`id`, `primer_nombre`, `tipo_paciente`, `segundo_nombre`, `primer_apellido`, `segundo_apellido`, `tipo_documento`, `numero_documento`, `edad`, `unidad_medida`, `sexo`, `barrio`, `correo`, `telefono`, `aseguradora`, `fecha_prog_recep`, `fecha_registro`, `id_usuario`) VALUES
(1, 'EDUAR', 'CASO INDICE', 'LUIS', 'ROMERO', 'GARIZADO', 'CC', 1047433073, 38, 'AÑOS', 'MASCULINO', 'MZ: H LOTE 73', '', 45993837432, 'MUTUAL', NULL, '2020-06-23 19:11:10', 1),
(2, 'PRUEBA ', 'CASO INDICE', 'VASDVAVDSV', 'VSADVDSAVD', 'VASVDSVADS', 'CC', 423423453123, 34, 'AÑOS', 'FEMENINO', 'CAMPESTRE MZ J LT 8', '', 4321454532, '', NULL, '2020-06-23 19:11:22', 2),
(3, 'PRUEBA', 'CASO INDICE', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'CE', 389273728836, 69, 'AÑOS', 'MASCULINO', 'CAMPESTRE MZ J LT 8', '', 31434423423, '', NULL, '2020-06-23 19:11:31', 1),
(4, 'AGADGSFDGS', 'CONTACTO ESTRECHO', 'FGSDGDFSG', 'GSDGFDG', 'GSDGDFSG', 'CE', 104749393877482, 45, 'DIAS', 'FEMENINO', 'CAMPESTRE MZ J LT 8', '', 390928732632, '', NULL, '2020-06-23 19:11:41', 1),
(5, 'RODOLFO', 'CASO INDICE', 'CADAVID', 'GSDFGFD', 'GSDFG', 'CC', 343345633, 34, 'AÑOS', 'FEMENINO', 'CAMPESTRE MZ J LT 8', '', 5646556654, '', NULL, '2020-06-24 15:33:22', 2),
(6, 'FADFDSF', 'CONTACTO ESTRECHO', 'FADFDS', 'FASDF', 'FASDFD', 'CC', 3434223434, 43, 'AÑOS', 'FEMENINO', 'CAMPESTRE MZ J LT 8', '', 423432543, '', NULL, '2020-06-23 18:10:29', NULL),
(7, 'MARTHA', 'CONTACTO ESTRECHO', 'MATILDE', 'CASTAÑO', 'VERGARA', 'CC', 3398762, 32, 'AÑOS', 'FEMENINO', 'EL CONSULADO MZ: J LT: 8', '', 300983746, 'MUTUAL', NULL, '2020-06-23 18:10:29', NULL),
(8, 'HJHGHGK', 'CASO INDICE', 'YGYGYG', 'GGUGUG', 'FTFTFT', 'CC', 65434323, 55, 'AÑOS', 'MASCULINO', 'CAMPESTRE MZ J LT 8', '', 4345346424, '', NULL, '2020-06-23 18:10:29', NULL),
(9, 'VSFSV', 'CASO INDICE', 'VSDFVSD', 'VSVF', 'VSFVSDF', 'CE', 1009837462, 23, 'AÑOS', 'FEMENINO', 'PALMERAS MZ H LT 43', '', 3009836784, '', NULL, '2020-06-23 18:10:29', NULL),
(10, 'VANESSCA', 'CASO INDICE', 'DEL CARMEN', 'VERGARA', 'YEPES', 'CC', 1143334431, 30, 'AÑOS', 'FEMENINO', 'PALMERAS MZ H LT 43', '', 3008743475, '', NULL, '2020-06-23 18:10:29', NULL),
(11, 'CESAR', 'CASO INDICE', 'DE JESUS', 'AGRESOTH', 'BUSTAMANTE', 'CC', 30984932, 36, 'AÑOS', 'MASCULINO', 'LAS CAROLINAS MZ H LT 49', '', 3009847832, '', NULL, '2020-06-23 18:10:29', NULL),
(12, 'PEDRO', 'CONTACTO ESTRECHO', 'NEL', 'ROMERO', 'TRUJILLO', 'CC', 3387632, 52, 'AÑOS', 'MASCULINO', 'CAMPESTRE MZ J LT 8', '', 3009873463, 'CAJACOPI', NULL, '2020-06-23 18:15:22', NULL),
(13, 'RAUL', 'CONTACTO ESTRECHO', 'GSDGFDG', 'GSDFG', 'GSDGSDFG', 'TI', 3423432323, 43, 'AÑOS', 'MASCULINO', 'PALMERAS', '', 23423424, 'MUTUAL', NULL, '2020-06-23 19:15:20', NULL),
(14, 'JOSE', 'CONTACTO ESTRECHO', 'PRUEBA', 'PRUEBA', 'PRUEBA', 'CC', 3009283726, 23, 'AÑOS', 'MASCULINO', 'PALMERAS MZ H LT 43', '', 30076273823, 'MUTUAL', NULL, '2020-06-23 19:15:28', NULL),
(15, 'VICTOR', 'CONTACTO ESTRECHO', 'DANIEL', 'ZABALETA', 'CASTELLAR', 'CC', 1001975759, 20, 'AÑOS', 'MASCULINO', 'BUENOS AIRES DIG:49 # 50-85', '', 3009872635, 'MUTUAL', NULL, '2020-06-23 18:15:37', NULL),
(16, 'ANA', 'CASO INDICE', 'asd', 'GARCIA', 'asd', 'TI', 12342130098, 12, 'AÑOS', 'MASCULINO', 'sdad', '', 1234, 'MUTUAL', NULL, '2020-06-23 22:25:25', NULL),
(17, 'rrqwr', 'CONTACTO ESTRECHO', 'rwerewr', 'rwerwer', 'rwerewr', 'TI', 3432434, 10, 'MESES', 'FEMENINO', 'CAMPESTRE MZ J LT 8', '', 43244, 'MUTUAL', NULL, '2020-06-23 18:15:42', NULL),
(18, 'terwtrew', 'CONTACTO ESTRECHO', '', 'dgffdg', 'GARIZADO', 'TI', 45345345, 45, 'DIAS', 'FEMENINO', 'CAMPESTRE MZ J LT 8', '', 43244, 'MUTUAL', NULL, '2020-06-23 18:15:45', NULL),
(19, 'ANDRES', 'CASO INDICE', 'CAMILO', 'RESTREPO', 'HERNANDEZ', 'CC', 33872652, 39, 'AÑOS', 'MASCULINO', 'PALMERAS MZ H LT 43', 'ejemplo@hotmail.com', 4324324, 'MUTUAL', NULL, '2020-06-23 18:15:47', NULL),
(20, 'PACIENTE NUEVO', 'CONTACTO ESTRECHO', 'PACIENTE NUEVO', 'PACIENTE NUEVO', 'PACIENTE NUEVO', 'CC', 3209376422, 38, 'AÑOS', 'FEMENINO', 'VILLAS DE LA CANDELARIA MZ H LT 6', 'ejemplo@hotmail.com', 6543235, 'MUTUAL', NULL, '2020-06-23 18:15:50', NULL),
(21, 'ELKIN', 'CONTACTO ESTRECHO', 'MARIO', 'DIAZ', 'VITOLA', 'CC', 100928732, 28, 'AÑOS', 'MASCULINO', 'MIRADOR DE ZARAGOCILLA', 'elkin.diaz@caminosips.com', 3009874736, 'SANITAS', NULL, '2020-06-23 18:15:53', NULL),
(22, 'ROBOT', 'CASO INDICE', 'gdgsgd', 'gsgsdg', 'gsgsdg', 'CC', 34243, 43, 'AÑOS', 'FEMENINO', 'PALMERAS', 'eduardo.romero@caminosips.com', 2434234324, 'vcxxcvxv', NULL, '2020-06-25 19:02:01', 3),
(23, 'SANDRA', 'CASO INDICE', 'MARCELA', 'DE AVILA', 'MEJIA', 'CC', 1047425172, 29, 'AÑOS', 'FEMENINO', 'CONSOLATA ALTA PARAISO MZ: C LT:3', 'sandra.deavila@caminosips.com', 3187939623, 'SALUD TOTAL', NULL, '2020-06-25 19:02:01', 3),
(27, 'deded', 'CASO INDICE', 'dededede', 'dededede', 'dedede', 'CC', 23233232, 23, 'AÑOS', 'MASCULINO', 'CONSOLATA ALTA PARAISO MZ: C LT:3', 'sandra.deavila@caminosips.com', 23232323, 'SALUD TOTAL', NULL, '2020-06-25 19:04:06', 3),
(28, 'frfrf', 'CONTACTO ESTRECHO', 'frfrfr', 'frfrfr', 'frfrfr', 'CC', 2333232, 23, 'AÑOS', 'MASCULINO', 'MZ: H LOTE 73', 'elkin.diaz@caminosips.com', 2323, 'fewf', NULL, '2020-06-25 19:08:45', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prog_toma_muestra`
--

DROP TABLE IF EXISTS `prog_toma_muestra`;
CREATE TABLE `prog_toma_muestra` (
  `id` int(100) NOT NULL,
  `pacientes_id` int(11) NOT NULL,
  `acepta_visita` text,
  `fecha_programacion` datetime DEFAULT NULL,
  `fecha_realizacion` datetime DEFAULT NULL,
  `programacion_atencion` varchar(45) DEFAULT NULL,
  `programa_pertenece` varchar(45) DEFAULT NULL,
  `fecha_entrega_lab` date DEFAULT NULL,
  `observacion` varchar(45) DEFAULT NULL,
  `fecha_resultado` date DEFAULT NULL,
  `resultado` enum('positivo','negativo','Pendiente') DEFAULT 'Pendiente',
  `estado_proceso` varchar(10) NOT NULL DEFAULT 'ACTIVO',
  `notificado` varchar(2) NOT NULL DEFAULT 'NO',
  `fecha_notificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `prog_toma_muestra`
--

INSERT INTO `prog_toma_muestra` (`id`, `pacientes_id`, `acepta_visita`, `fecha_programacion`, `fecha_realizacion`, `programacion_atencion`, `programa_pertenece`, `fecha_entrega_lab`, `observacion`, `fecha_resultado`, `resultado`, `estado_proceso`, `notificado`, `fecha_notificacion`) VALUES
(24, 15, 'NO', '2020-06-04 00:00:00', '2020-06-04 00:00:00', 'domiciliaria', 'mutual', '2020-06-18', NULL, '2020-06-24', 'positivo', 'FINALIZADO', 'NO', NULL),
(25, 11, 'SI', '2020-06-04 00:00:00', '2020-06-04 00:00:00', 'domiciliaria', 'mutual', '2020-06-24', NULL, '2020-06-25', 'positivo', 'FINALIZADO', 'NO', NULL),
(27, 1, 'SI', '2020-06-17 00:00:00', '2020-06-24 00:00:00', 'domiciliaria', 'mutual', '2020-05-14', NULL, '2020-06-01', 'positivo', 'FINALIZADO', 'NO', NULL),
(34, 14, 'SI', '2020-06-04 00:00:00', '2020-06-04 00:00:00', 'domiciliaria', 'mutual', '2020-06-10', NULL, '2020-06-24', 'negativo', 'ACTIVO', 'SI', '2020-06-26 04:57:17'),
(39, 9, 'SI', '2020-06-04 00:00:00', '2020-06-09 00:00:00', 'inmediata', 'mutual', '2020-06-18', NULL, '2020-06-23', 'positivo', 'FINALIZADO', 'NO', NULL),
(42, 10, 'SI', '2020-06-04 00:00:00', '2020-06-18 00:00:00', 'inmediata', 'dwqdwqd', '2020-06-17', NULL, '2020-06-25', 'negativo', 'FINALIZADO', 'NO', NULL),
(43, 16, 'NO', '2020-06-09 00:00:00', '2020-06-17 00:00:00', 'domiciliaria', 'mutual', '2020-06-10', NULL, '2020-06-18', 'positivo', 'FINALIZADO', 'NO', NULL),
(53, 12, 'SI', '2020-06-10 00:00:00', '2020-06-11 00:00:00', 'domiciliaria', 'VIH', '2020-06-10', NULL, '2020-06-26', 'negativo', 'FINALIZADO', 'NO', NULL),
(71, 7, 'SI', '2020-06-18 00:00:00', '2020-06-24 00:00:00', 'domiciliaria', 'GESTANTES', '2020-06-18', NULL, '2020-06-19', 'positivo', 'FINALIZADO', 'NO', NULL),
(72, 2, 'SI', '2020-06-23 00:00:00', '2020-06-25 00:00:00', 'inmediata', 'PROMOCION Y MANTENIMIENTO DE LA SALUD', '2020-06-10', NULL, '2020-06-24', 'negativo', 'ACTIVO', 'SI', '2020-06-26 04:49:42'),
(75, 3, 'NO', '2020-06-17 00:00:00', '2020-06-18 00:00:00', 'inmediata', 'PROMOCION Y MANTENIMIENTO DE LA SALUD', '2020-06-04', NULL, '2020-06-10', 'positivo', 'FINALIZADO', 'NO', NULL),
(77, 4, 'SI', '2020-06-17 00:00:00', '2020-06-18 00:00:00', 'inmediata', 'AMARTE (ARTRITIS REUMATOIDES)', '2020-06-17', NULL, '2020-06-19', 'positivo', 'FINALIZADO', 'NO', NULL),
(80, 13, 'SI', '2020-06-17 00:00:00', '2020-06-19 00:00:00', 'domiciliaria', 'PROMOCION Y MANTENIMIENTO DE LA SALUD', '2020-06-17', NULL, '2020-06-18', 'negativo', 'ACTIVO', 'SI', '2020-06-26 04:51:11'),
(85, 21, 'SI', '2020-06-16 00:00:00', '2020-06-17 00:00:00', 'domiciliaria', 'VIH', '2020-06-10', NULL, '2020-06-18', 'positivo', 'FINALIZADO', 'NO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seguimiento_paciente`
--

DROP TABLE IF EXISTS `seguimiento_paciente`;
CREATE TABLE `seguimiento_paciente` (
  `id` int(11) NOT NULL,
  `complemento_seg_id` int(11) NOT NULL,
  `fecha_hora` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `asintomatico` varchar(45) NOT NULL,
  `fiebre_cuantificada` varchar(45) NOT NULL,
  `tos` varchar(45) NOT NULL,
  `dificultad_respiratoria` varchar(45) NOT NULL,
  `odinofagia` varchar(45) NOT NULL,
  `fatiga_adinamia` varchar(45) NOT NULL,
  `cumple_criterios` varchar(50) NOT NULL,
  `comorbilidad` varchar(50) DEFAULT NULL,
  `fecha_entrega_kits` date DEFAULT NULL,
  `oxigeno_terapia` varchar(50) DEFAULT NULL,
  `ambito_atencion` varchar(50) NOT NULL,
  `saturacion_oxigeno` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_pacientes` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `seguimiento_paciente`
--

INSERT INTO `seguimiento_paciente` (`id`, `complemento_seg_id`, `fecha_hora`, `asintomatico`, `fiebre_cuantificada`, `tos`, `dificultad_respiratoria`, `odinofagia`, `fatiga_adinamia`, `cumple_criterios`, `comorbilidad`, `fecha_entrega_kits`, `oxigeno_terapia`, `ambito_atencion`, `saturacion_oxigeno`, `id_usuario`, `id_pacientes`) VALUES
(19, 4, '2020-06-11 15:59:52', 'Si', 'No', 'No', 'Si', 'Si', 'No', 'Si', 'Si', '2020-06-18', 'No', 'No', 'No', 1, 1),
(20, 4, '2020-06-11 16:06:35', 'Si', 'No', 'No', 'Si', 'No', 'Si', 'No', NULL, NULL, NULL, 'No', 'No', 1, 1),
(21, 4, '2020-06-11 16:25:11', 'No', 'No', 'Si', 'No', 'Si', 'No', 'Si', NULL, NULL, NULL, 'Si', 'No', 1, 1),
(22, 5, '2020-06-11 21:32:37', 'No', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', '2020-06-17', 'No', 'No', 'No', 1, 15),
(23, 5, '2020-06-11 21:37:44', 'No', 'No', 'No', 'Si', 'Si', 'No', 'No', NULL, NULL, NULL, 'No', 'No', 1, 15),
(24, 5, '2020-06-11 21:38:23', 'No', 'Si', 'No', 'Si', 'Si', 'No', 'No', NULL, NULL, NULL, 'Si', 'No', 1, 15),
(25, 5, '2020-06-11 21:41:01', 'Si', 'No', 'No', 'No', 'Si', 'No', 'No', NULL, NULL, NULL, 'Si', 'No', 1, 15),
(26, 5, '2020-06-11 21:44:01', 'Si', 'No', 'No', 'No', 'No', 'No', 'No', NULL, NULL, NULL, 'Si', 'No', 2, 15),
(27, 6, '2020-06-11 22:10:57', 'Si', 'No', 'No', 'No', 'No', 'Si', 'No', 'Si', '2020-06-10', 'Si', 'Si', 'No', 2, 20),
(28, 6, '2020-06-11 22:12:17', 'Si', 'No', 'No', 'No', 'Si', 'No', 'No', NULL, NULL, NULL, 'Si', 'No', 2, 20),
(29, 5, '2020-06-11 23:59:34', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', 'Si', NULL, NULL, NULL, 'Si', 'Si', 2, 15),
(30, 4, '2020-06-17 19:57:34', 'Si', 'No', 'No', 'No', 'No', 'No', 'Si', NULL, NULL, NULL, 'Si', 'No', 2, 1),
(31, 4, '2020-06-17 20:00:22', 'Si', 'No', 'No', 'No', 'No', 'Si', 'Si', NULL, NULL, NULL, 'No', 'Si', 2, 1),
(33, 4, '2020-06-19 16:56:35', 'Si', 'No', 'No', 'No', 'No', 'No', 'Si', NULL, NULL, NULL, 'No', 'Si', 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `segunda_toma_muestra_control`
--

DROP TABLE IF EXISTS `segunda_toma_muestra_control`;
CREATE TABLE `segunda_toma_muestra_control` (
  `id` int(11) NOT NULL,
  `pacientes_id` int(11) NOT NULL,
  `fecha_programacion` date NOT NULL,
  `fecha_de_toma` datetime DEFAULT NULL,
  `resultado` varchar(45) CHARACTER SET utf8 COLLATE utf8_spanish_ci DEFAULT NULL,
  `soporte_resultado` longtext,
  `visita_domiciliaria` varchar(50) NOT NULL,
  `estado_paciente` varchar(50) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha_fallecimiento` date DEFAULT NULL,
  `fecha_resgistro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `visita_campo` varchar(50) DEFAULT NULL,
  `estado_proceso` varchar(15) NOT NULL DEFAULT 'ACTIVO',
  `notificado` varchar(2) NOT NULL DEFAULT 'NO',
  `fecha_notificacion` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `segunda_toma_muestra_control`
--

INSERT INTO `segunda_toma_muestra_control` (`id`, `pacientes_id`, `fecha_programacion`, `fecha_de_toma`, `resultado`, `soporte_resultado`, `visita_domiciliaria`, `estado_paciente`, `id_usuario`, `fecha_fallecimiento`, `fecha_resgistro`, `visita_campo`, `estado_proceso`, `notificado`, `fecha_notificacion`) VALUES
(1, 12, '2020-06-25', NULL, NULL, NULL, 'SI', 'VIVO', 1, NULL, '2020-06-11 21:18:16', '', 'ACTIVO', 'NO', NULL),
(4, 15, '2020-06-03', '2020-06-22 08:07:07', 'Negativo', 'soporte_resultado/1001975759/1001975759-Certificado.pdf', 'NO', 'MUERTO', 1, NULL, '2020-06-26 20:07:07', '', 'FINALIZADO', 'SI', '2020-06-26 08:07:07'),
(8, 1, '2020-06-17', '2020-06-02 09:30:04', 'Negativo', 'soporte_resultado/1047433073/1047433073-Certificado Protección.pdf', 'SI', 'VIVO', 4, NULL, '2020-06-26 20:04:29', NULL, 'FINALIZADO', 'NO', NULL),
(9, 7, '2020-06-25', NULL, NULL, NULL, 'SI', 'VIVO', 4, NULL, '2020-06-19 18:43:37', NULL, 'ACTIVO', 'NO', NULL),
(10, 11, '2020-06-09', '2020-06-18 06:56:12', 'Positivo', 'soporte_resultado/30984932/30984932-manual-de-php.pdf', 'SI', 'VIVO', 4, NULL, '2020-06-23 21:08:50', NULL, 'FINALIZADO', 'NO', NULL),
(11, 15, '2020-06-25', '2020-06-22 08:07:07', 'Negativo', 'soporte_resultado/1001975759/1001975759-ComprobantePSE20200522134833.pdf', 'NO', 'VIVO', 4, NULL, '2020-06-26 20:07:07', NULL, 'FINALIZADO', 'SI', '2020-06-26 08:07:07'),
(12, 1, '2020-06-17', '2020-06-26 01:21:29', 'Negativo', 'soporte_resultado/1047433073/1047433073-Certificado Protección.pdf', 'SI', 'VIVO', 4, NULL, '2020-06-24 13:21:29', NULL, 'FINALIZADO', 'NO', NULL),
(14, 1, '2020-06-11', '2020-06-26 01:21:29', 'Negativo', 'soporte_resultado/1047433073/1047433073-Certificado Protección.pdf', 'NO', 'VIVO', 4, NULL, '2020-06-24 13:21:29', NULL, 'ACTIVO', 'NO', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE `usuarios` (
  `id` int(100) NOT NULL,
  `nombre_apellido` varchar(45) NOT NULL,
  `identificacion` bigint(100) NOT NULL,
  `clave` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_apellido`, `identificacion`, `clave`) VALUES
(1, 'EDUAR GARIZADO', 12345, 'caminos2020'),
(2, 'LUIS ROMERO', 1047433073, '1047433073'),
(3, 'RAUL DARIO CABRERA', 123, '123'),
(4, 'ROLANDO GARCIA', 100478393, '12345');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `complemento_seg`
--
ALTER TABLE `complemento_seg`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_paciente` (`id_pacientes`);

--
-- Indices de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `numero_documento` (`numero_documento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `prog_toma_muestra`
--
ALTER TABLE `prog_toma_muestra`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pacientes_id` (`pacientes_id`),
  ADD KEY `index_paciente` (`pacientes_id`);

--
-- Indices de la tabla `seguimiento_paciente`
--
ALTER TABLE `seguimiento_paciente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_pacientes` (`id_pacientes`),
  ADD KEY `seguimiento_paciente_ibfk_2` (`id_usuario`),
  ADD KEY `complemento_seg_id` (`complemento_seg_id`);

--
-- Indices de la tabla `segunda_toma_muestra_control`
--
ALTER TABLE `segunda_toma_muestra_control`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacion` (`identificacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `complemento_seg`
--
ALTER TABLE `complemento_seg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `prog_toma_muestra`
--
ALTER TABLE `prog_toma_muestra`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `seguimiento_paciente`
--
ALTER TABLE `seguimiento_paciente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `segunda_toma_muestra_control`
--
ALTER TABLE `segunda_toma_muestra_control`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `complemento_seg`
--
ALTER TABLE `complemento_seg`
  ADD CONSTRAINT `complemento_seg_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `complemento_seg_ibfk_2` FOREIGN KEY (`id_pacientes`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `pacientes`
--
ALTER TABLE `pacientes`
  ADD CONSTRAINT `pacientes_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `prog_toma_muestra`
--
ALTER TABLE `prog_toma_muestra`
  ADD CONSTRAINT `prog_toma_muestra_ibfk_1` FOREIGN KEY (`pacientes_id`) REFERENCES `pacientes` (`id`);

--
-- Filtros para la tabla `seguimiento_paciente`
--
ALTER TABLE `seguimiento_paciente`
  ADD CONSTRAINT `seguimiento_paciente_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `seguimiento_paciente_ibfk_3` FOREIGN KEY (`complemento_seg_id`) REFERENCES `complemento_seg` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
