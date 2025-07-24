-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-07-2025 a las 19:18:11
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
-- Base de datos: `db_asistencia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `candidatos`
--

CREATE TABLE `candidatos` (
  `id` int(10) UNSIGNED NOT NULL,
  `partido` varchar(255) NOT NULL,
  `cargo` varchar(255) NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `candidatos`
--

INSERT INTO `candidatos` (`id`, `partido`, `cargo`, `id_usuario`, `created_at`, `updated_at`) VALUES
(1, '1ro A Ultimo Poder', 'Presidente del Consejo Estudiantil', 29, '2025-07-24 00:37:05', '2025-07-24 01:01:42'),
(2, '2do A La paz sigue', 'Presidente del Consejo Estudiantil', 17, '2025-07-24 01:01:13', '2025-07-24 01:01:13'),
(3, '1ro A Ultimo Poder', 'Vicepresidente del Consejo Estudiantil', 22, '2025-07-24 01:15:42', '2025-07-24 01:15:58'),
(4, '2do A La paz sigue', 'Vicepresidente del Consejo Estudiantil', 19, '2025-07-24 01:15:43', '2025-07-24 01:15:43'),
(5, 'Partido 1', 'Presidente', 13, '2025-07-24 01:51:47', '2025-07-24 01:51:47'),
(11, '1B Partido de la paz', 'Presidente del Consejo Estudiantil', 16, '2025-07-24 21:38:39', '2025-07-24 21:38:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carpeta_info`
--

CREATE TABLE `carpeta_info` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_usuario` bigint(20) UNSIGNED NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `carpeta_info`
--

INSERT INTO `carpeta_info` (`id`, `id_usuario`, `titulo`, `descripcion`, `fecha`, `created_at`, `updated_at`) VALUES
(3, 3, 'Aprende PYTHON en 10 minutos', 'sldfhiso<idfhosf', '2025-07-24', '2025-07-24 21:44:02', '2025-07-24 21:44:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE `cursos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nivel` varchar(255) NOT NULL,
  `paralelos` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `nivel`, `paralelos`, `created_at`, `updated_at`) VALUES
(1, '1ro', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(2, '1ro', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(3, '1ro', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(4, '2do', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(5, '2do', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(6, '2do', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(7, '3ro', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(8, '3ro', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(9, '3ro', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(10, '4to', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(11, '4to', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(12, '4to', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(13, '5to', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(14, '5to', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(15, '5to', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(16, '6to', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(17, '6to', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(18, '6to', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(19, '7mo', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(20, '7mo', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(21, '7mo', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(22, '8vo', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(23, '8vo', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(24, '8vo', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(25, '9no', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(26, '9no', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(27, '9no', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(28, '10mo', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(29, '10mo', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(30, '10mo', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(31, '1Bh', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(32, '1Bh', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(33, '1Bh', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(34, '2Bh', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(35, '2Bh', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(36, '2Bh', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(37, '3Bh', 'A', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(38, '3Bh', 'B', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(39, '3Bh', 'C', '2025-07-22 10:45:32', '2025-07-22 10:45:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `horarios_tables`
--

CREATE TABLE `horarios_tables` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_materia` int(10) UNSIGNED NOT NULL,
  `id_curso` int(10) UNSIGNED NOT NULL,
  `id_periodolectivo` int(10) UNSIGNED NOT NULL,
  `dia` varchar(20) NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_fin` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `horarios_tables`
--

INSERT INTO `horarios_tables` (`id`, `id_usuario`, `id_materia`, `id_curso`, `id_periodolectivo`, `dia`, `hora_inicio`, `hora_fin`, `created_at`, `updated_at`) VALUES
(201, 3, 1, 1, 5, 'Martes', '07:30:00', '09:30:00', '2025-07-22 10:51:34', '2025-07-24 00:22:32'),
(202, 3, 2, 1, 5, 'Lunes', '11:30:00', '12:40:00', '2025-07-22 10:53:06', '2025-07-24 21:32:24'),
(203, 8, 7, 7, 5, 'Jueves', '11:26:00', '12:30:00', '2025-07-24 21:31:52', '2025-07-24 21:31:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `intemdatos`
--

CREATE TABLE `intemdatos` (
  `id` int(10) UNSIGNED NOT NULL,
  `valor_intemdato` double(5,2) NOT NULL,
  `tipo_intemdato` varchar(20) NOT NULL,
  `observacion_intemdato` text DEFAULT NULL,
  `id_registrosecs` int(10) UNSIGNED NOT NULL,
  `id_usuario_estudiante` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `intemdatos`
--

INSERT INTO `intemdatos` (`id`, `valor_intemdato`, `tipo_intemdato`, `observacion_intemdato`, `id_registrosecs`, `id_usuario_estudiante`, `created_at`, `updated_at`) VALUES
(9, 2.00, 'Asistencia', 'Retraso en el bus', 2, 16, '2025-07-22 11:15:50', '2025-07-23 00:56:11'),
(10, 2.00, 'Asistencia', NULL, 2, 15, '2025-07-22 11:15:50', '2025-07-22 11:15:50'),
(11, 2.00, 'Asistencia', NULL, 2, 18, '2025-07-22 11:15:50', '2025-07-22 11:15:50'),
(12, 2.00, 'Asistencia', NULL, 2, 13, '2025-07-22 11:15:50', '2025-07-22 11:15:50'),
(13, 2.00, 'Asistencia', NULL, 2, 17, '2025-07-22 11:15:50', '2025-07-22 11:15:50'),
(14, 2.00, 'Asistencia', NULL, 2, 14, '2025-07-22 11:15:50', '2025-07-22 11:15:50'),
(15, 2.00, 'Asistencia', NULL, 2, 20, '2025-07-22 11:15:50', '2025-07-22 11:15:50'),
(16, 2.00, 'Asistencia', NULL, 2, 19, '2025-07-22 11:15:50', '2025-07-22 11:15:50'),
(17, 8.00, 'Calificación', NULL, 3, 16, '2025-07-22 11:16:51', '2025-07-22 11:16:51'),
(18, 7.90, 'Calificación', NULL, 3, 15, '2025-07-22 11:16:51', '2025-07-22 11:16:51'),
(19, 6.00, 'Calificación', NULL, 3, 18, '2025-07-22 11:16:51', '2025-07-22 11:16:51'),
(20, 7.00, 'Calificación', NULL, 3, 13, '2025-07-22 11:16:51', '2025-07-22 11:16:51'),
(21, 5.00, 'Calificación', NULL, 3, 17, '2025-07-22 11:16:51', '2025-07-22 11:16:51'),
(22, 6.00, 'Calificación', NULL, 3, 14, '2025-07-22 11:16:51', '2025-07-22 11:16:51'),
(23, 4.00, 'Calificación', 'Muy Bajo', 3, 20, '2025-07-22 11:16:51', '2025-07-23 00:55:50'),
(24, 9.00, 'Calificación', NULL, 3, 19, '2025-07-22 11:16:51', '2025-07-22 11:16:51'),
(25, 2.00, 'Asistencia', NULL, 4, 16, '2025-07-23 01:14:26', '2025-07-23 01:14:26'),
(26, 2.00, 'Asistencia', NULL, 4, 15, '2025-07-23 01:14:26', '2025-07-23 01:14:26'),
(27, 2.00, 'Asistencia', NULL, 4, 18, '2025-07-23 01:14:26', '2025-07-23 01:14:26'),
(28, 1.00, 'Asistencia', NULL, 4, 13, '2025-07-23 01:14:26', '2025-07-23 01:16:33'),
(29, 2.00, 'Asistencia', NULL, 4, 17, '2025-07-23 01:14:26', '2025-07-23 01:14:26'),
(30, 2.00, 'Asistencia', NULL, 4, 14, '2025-07-23 01:14:26', '2025-07-23 01:14:26'),
(31, 0.00, 'Asistencia', 'No asistió por enfermedad', 4, 20, '2025-07-23 01:14:26', '2025-07-23 01:14:26'),
(32, 2.00, 'Asistencia', NULL, 4, 19, '2025-07-23 01:14:26', '2025-07-23 01:14:26'),
(33, 1.17, 'Asistencia', NULL, 5, 16, '2025-07-24 21:34:14', '2025-07-24 21:34:14'),
(34, 1.00, 'Asistencia', NULL, 5, 15, '2025-07-24 21:34:14', '2025-07-24 21:34:44'),
(35, 1.17, 'Asistencia', NULL, 5, 18, '2025-07-24 21:34:14', '2025-07-24 21:34:14'),
(36, 1.17, 'Asistencia', NULL, 5, 13, '2025-07-24 21:34:14', '2025-07-24 21:34:14'),
(37, 0.00, 'Asistencia', NULL, 5, 17, '2025-07-24 21:34:14', '2025-07-24 21:34:14'),
(38, 0.00, 'Asistencia', NULL, 5, 14, '2025-07-24 21:34:14', '2025-07-24 21:34:14'),
(39, 1.17, 'Asistencia', NULL, 5, 20, '2025-07-24 21:34:14', '2025-07-24 21:34:14'),
(40, 0.00, 'Asistencia', NULL, 5, 19, '2025-07-24 21:34:14', '2025-07-24 21:34:14'),
(41, 7.00, 'Calificación', NULL, 6, 16, '2025-07-24 21:41:25', '2025-07-24 21:41:25'),
(42, 7.00, 'Calificación', NULL, 6, 15, '2025-07-24 21:41:25', '2025-07-24 21:42:34'),
(43, 0.00, 'Calificación', NULL, 6, 18, '2025-07-24 21:41:25', '2025-07-24 21:41:25'),
(44, 8.00, 'Calificación', NULL, 6, 13, '2025-07-24 21:41:25', '2025-07-24 21:41:25'),
(45, 9.00, 'Calificación', NULL, 6, 17, '2025-07-24 21:41:25', '2025-07-24 21:41:25'),
(46, 8.00, 'Calificación', NULL, 6, 14, '2025-07-24 21:41:25', '2025-07-24 21:41:25'),
(47, 9.00, 'Calificación', NULL, 6, 20, '2025-07-24 21:41:25', '2025-07-24 21:41:25'),
(48, 8.00, 'Calificación', NULL, 6, 19, '2025-07-24 21:41:25', '2025-07-24 21:41:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materias`
--

CREATE TABLE `materias` (
  `id_materia` int(10) UNSIGNED NOT NULL,
  `nombre_materia` varchar(100) NOT NULL,
  `detalle_materia` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `materias`
--

INSERT INTO `materias` (`id_materia`, `nombre_materia`, `detalle_materia`, `created_at`, `updated_at`) VALUES
(1, 'Matemáticas', 'Álgebra, geometría, trigonometría y cálculo básico', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(2, 'Lengua y Literatura', 'Gramática, literatura, comprensión lectora y expresión escrita', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(3, 'Ciencias Naturales', 'Biología, química y física básica', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(4, 'Estudios Sociales', 'Historia del Ecuador, geografía y cívica', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(5, 'Inglés', 'Gramática inglesa, vocabulario y conversación', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(6, 'Educación Física', 'Deportes, actividad física y salud', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(7, 'Educación Cultural y Artística', 'Expresión artística, historia del arte y música', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(8, 'Computación', 'Informática, programación básica y herramientas digitales', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(9, 'Física', 'Mecánica, termodinámica, electromagnetismo y física moderna', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(10, 'Química', 'Química general, orgánica e inorgánica', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(11, 'Biología', 'Biología celular, genética, ecología y evolución', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(12, 'Historia del Ecuador', 'Historia nacional, procesos históricos y desarrollo del país', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(13, 'Geografía', 'Geografía física, humana y económica del Ecuador', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(14, 'Filosofía', 'Pensamiento crítico, ética, lógica y filosofía antigua', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(15, 'Psicología', 'Desarrollo humano, comportamiento y salud mental', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(16, 'Sociología', 'Estructura social, dinámicas sociales y desarrollo comunitario', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(17, 'Economía', 'Principios económicos, microeconomía y macroeconomía', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(18, 'Emprendimiento y Gestión', 'Desarrollo de proyectos, gestión empresarial y liderazgo', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(19, 'Ciencias Políticas', 'Sistemas políticos, democracia y participación ciudadana', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(20, 'Antropología', 'Culturas, diversidad cultural y desarrollo humano', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(21, 'Literatura Universal', 'Análisis literario, géneros literarios y obras clásicas', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(22, 'Lengua Extranjera (Francés)', 'Gramática francesa, vocabulario y conversación', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(23, 'Arte y Diseño', 'Diseño gráfico, artes plásticas y expresión creativa', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(24, 'Música', 'Teoría musical, instrumentos y composición', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(25, 'Teatro', 'Expresión dramática, actuación y producción teatral', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(26, 'Danza', 'Expresión corporal, ritmos y danzas tradicionales', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(27, 'Programación', 'Lógica de programación, algoritmos y desarrollo de software', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(28, 'Robótica', 'Diseño, construcción y programación de robots', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(29, 'Medio Ambiente', 'Conservación ambiental, sostenibilidad y ecología', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(30, 'Salud y Nutrición', 'Nutrición, salud pública y bienestar integral', '2025-07-22 10:45:32', '2025-07-22 10:45:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_06_10_224805_create_cursos_table', 1),
(5, '2024_01_15_000002_create_usuarios_table', 1),
(6, '2024_01_15_000004_create_materias_table', 1),
(7, '2025_07_03_040400_create_periodolectivos_table', 1),
(8, '2025_07_16_211040_create_horarios_tables', 1),
(9, '2025_07_16_213746_update_periodolectivos_table_change_date_fields', 1),
(10, '2025_07_16_214523_update_horarios_table_make_periodolectivo_required', 1),
(11, '2025_07_17_153058_create_registrosecs_table', 1),
(12, '2025_07_22_041543_create_intemdatos_table', 1),
(13, '2025_07_22_213805_create_candidatos_table', 2),
(14, '2025_07_22_213848_create_votaciones_table', 2),
(15, '2025_07_24_134141_create_carpeta_info_table', 3),
(16, '2025_07_24_134144_create_ruta_arch_table', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodolectivos`
--

CREATE TABLE `periodolectivos` (
  `id_periodolectivo` int(10) UNSIGNED NOT NULL,
  `periodo_lectivo` varchar(255) NOT NULL,
  `fecha_incial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `periodolectivos`
--

INSERT INTO `periodolectivos` (`id_periodolectivo`, `periodo_lectivo`, `fecha_incial`, `fecha_final`, `created_at`, `updated_at`) VALUES
(1, 'Primer Quimestre 2024-2025', '2024-09-02', '2024-12-20', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(2, 'Segundo Quimestre 2024-2025', '2025-01-06', '2025-04-25', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(3, 'Tercer Quimestre 2024-2025', '2025-05-05', '2025-07-25', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(4, 'Primer Quimestre 2025-2026', '2025-09-01', '2025-12-19', '2025-07-22 10:45:32', '2025-07-22 10:45:32'),
(5, 'Segundo Quimestre 2025-2026', '2026-01-05', '2026-04-24', '2025-07-22 10:45:32', '2025-07-22 10:45:32');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registrosecs`
--

CREATE TABLE `registrosecs` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha_registro` date NOT NULL,
  `tipo_registro` varchar(255) NOT NULL,
  `descripcion_registro` text NOT NULL,
  `id_usuario_profesor` int(10) UNSIGNED NOT NULL,
  `id_horario` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `registrosecs`
--

INSERT INTO `registrosecs` (`id`, `fecha_registro`, `tipo_registro`, `descripcion_registro`, `id_usuario_profesor`, `id_horario`, `created_at`, `updated_at`) VALUES
(2, '2025-07-22', 'Asistencia', 'Clase de programacion34', 3, 201, '2025-07-22 11:15:50', '2025-07-23 00:39:53'),
(3, '2025-07-22', 'Calificacion', 'Trabajo en clases', 3, 201, '2025-07-22 11:16:51', '2025-07-22 11:16:51'),
(4, '2025-07-22', 'Asistencia', 'Asistencia del día 22 07 2025 tema calculo diferencial', 3, 201, '2025-07-23 01:14:26', '2025-07-23 01:14:26'),
(5, '2025-07-24', 'Asistencia', 'Lectura reflectiva', 3, 202, '2025-07-24 21:34:14', '2025-07-24 21:34:14'),
(6, '2025-07-24', 'Calificacion', 'Trabajo en clases', 3, 201, '2025-07-24 21:41:25', '2025-07-24 21:41:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ruta_arch`
--

CREATE TABLE `ruta_arch` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_carpeta_info` bigint(20) UNSIGNED NOT NULL,
  `nombre_archivo` varchar(255) NOT NULL,
  `extension_archivo` varchar(255) NOT NULL,
  `ruta_archivo` varchar(255) NOT NULL,
  `link_drive` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ruta_arch`
--

INSERT INTO `ruta_arch` (`id`, `id_carpeta_info`, `nombre_archivo`, `extension_archivo`, `ruta_archivo`, `link_drive`, `created_at`, `updated_at`) VALUES
(7, 3, '04 SOLICITUD REVISION.docx', 'docx', 'archivos/1753375442_688262d216830_04 SOLICITUD REVISION.docx', NULL, '2025-07-24 21:44:02', '2025-07-24 21:44:02'),
(8, 3, '01 SOLICITUD ESTUDIANTIL.docx', 'docx', 'archivos/1753375442_688262d2205e5_01 SOLICITUD ESTUDIANTIL.docx', NULL, '2025-07-24 21:44:02', '2025-07-24 21:44:02'),
(9, 3, '02 ACTA DE ASIGNACION x.docx', 'docx', 'archivos/1753375442_688262d2219f3_02 ACTA DE ASIGNACION x.docx', NULL, '2025-07-24 21:44:02', '2025-07-24 21:44:02'),
(10, 3, 'Link de Drive', 'link', '', 'https://docs.google.com/spreadsheets/d/1gGRVMCIrctbSBqzfKILmIXCy870wjhRN_jN1MzYEOxE/edit?usp=drive_link', '2025-07-24 21:44:02', '2025-07-24 21:44:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_apellido` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `roles` varchar(255) NOT NULL,
  `dni` varchar(255) DEFAULT NULL,
  `imgprofile` varchar(255) DEFAULT NULL,
  `id_curso` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre_apellido`, `correo`, `clave`, `usuario`, `roles`, `dni`, `imgprofile`, `id_curso`, `created_at`, `updated_at`) VALUES
(1, 'María González', 'maria.gonzalez@colegio.edu.ec', '$2y$10$g0gOqkglwKYf602Px/Bqm.r4xb9pJBvVwct441vC1Iu8yHm2GGDda', 'admin.maria', 'Administrador', '1234567890', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(2, 'Carlos Rodríguez', 'carlos.rodriguez@colegio.edu.ec', '$2y$10$KbM0SMG7q/EiStWRZB3NUO0bP.eJPgSMBHZIGDZ05UejZZIM5oXDu', 'admin.carlos', 'Administrador', '0987654321', NULL, NULL, '2025-07-22 10:45:35', '2025-07-23 00:50:13'),
(3, 'Ana Martínez', 'ana.martinez@colegio.edu.ec', '$2y$10$g0gOqkglwKYf602Px/Bqm.r4xb9pJBvVwct441vC1Iu8yHm2GGDda', 'prof.ana', 'Profesor', '1122334455', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(4, 'Luis Fernández', 'luis.fernandez@colegio.edu.ec', '$2y$10$5Ii4pgH5Q/HEWY3XqeMque5YkRm/D7eP9VL9zsrLYef2obpHA4PM2', 'prof.luis', 'Profesor', '2233445566', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(5, 'Carmen Silva', 'carmen.silva@colegio.edu.ec', '$2y$10$/qe9UHtafrbo9vUClMYyGuJYkWlAsumfHn0VDI3/KMOm96eYbYrKe', 'prof.carmen', 'Profesor', '3344556677', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(6, 'Roberto Vargas', 'roberto.vargas@colegio.edu.ec', '$2y$10$HAaQeJF58e1I90x9iWNhruZXcWnw4aD5IJxYZJtefB6rRCs6ykxgm', 'prof.roberto', 'Profesor', '4455667788', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(7, 'Patricia Herrera', 'patricia.herrera@colegio.edu.ec', '$2y$10$jr.OlHSz3qKlhv6QfgZp4urDt9kYNZCsQtvVisW0VZKRYPjqCmOIe', 'prof.patricia', 'Profesor', '5566778899', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(8, 'Miguel Torres', 'miguel.torres@colegio.edu.ec', '$2y$10$1rv7jIRrDC1Fr7iCB/kB3O4oBlW616V7eGoglWnAEwSsotdU4LEtS', 'prof.miguel', 'Profesor', '6677889900', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(9, 'Isabel Morales', 'isabel.morales@colegio.edu.ec', '$2y$10$dwEzMl0.suebSe5zpTCafOuQ9Ec3JaeY7HDz/SV4VH831BOFXxpyi', 'prof.isabel', 'Profesor', '7788990011', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(10, 'Fernando Rojas', 'fernando.rojas@colegio.edu.ec', '$2y$10$dlIRG7wFaSoeWpE0JDhPrOhfl3iUT3lpW6CTm/aAIxV/VjBP3/5bu', 'prof.fernando', 'Profesor', '8899001122', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(11, 'Lucía Mendoza', 'lucia.mendoza@colegio.edu.ec', '$2y$10$f9oTqFgjPzTpiWiZAmiDcuz3WI1O/5Ul57c3Q9/NQVpwT65qDx/p.', 'prof.lucia', 'Profesor', '9900112233', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(12, 'Diego Castro', 'diego.castro@colegio.edu.ec', '$2y$10$i3DQgw/euvOUQq7g2tEimOdIDe4AIz76SWVNpnRZRcn568V.a5TAe', 'prof.diego', 'Profesor', '0011223344', NULL, NULL, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(13, 'Juan Pérez', 'juan.perez@colegio.edu.ec', '$2y$10$eBlkWD6yk55mP3xOLDMXFOdXCBYykNRII4sZZG47HgxoStZiJnCGO', 'est.juan', 'Estudiante', '1111111111', NULL, 1, '2025-07-22 10:45:35', '2025-07-24 21:45:20'),
(14, 'María López', 'maria.lopez@colegio.edu.ec', '$2y$10$az20SjnRAEzoiYbVNo.izunigkVUVi9fpW1mkk8rZtnj8YwES42Dq', 'est.maria', 'Estudiante', '2222222222', NULL, 1, '2025-07-22 10:45:35', '2025-07-24 21:47:06'),
(15, 'Carlos García', 'carlos.garcia@colegio.edu.ec', '$2y$10$0fhiUW5p5nS8dTLxUPsW4Oa6Jkyhc3zMvbsKaHGC8LgtDTfBJHAQu', 'est.carlos', 'Estudiante', '3333333333', NULL, 1, '2025-07-22 10:45:35', '2025-07-22 10:53:34'),
(16, 'Ana Rodríguez', 'ana.rodriguez@colegio.edu.ec', '$2y$10$kjhNWkeHSSBYJz4EXM6I0etxQIridbxFastjNglGSTMJybj4DsvoC', 'est.ana', 'Estudiante', '4444444444', NULL, 1, '2025-07-22 10:45:35', '2025-07-22 10:53:47'),
(17, 'Luis Martínez', 'luis.martinez@colegio.edu.ec', '$2y$10$aH3D4R9CwBxlSMl9hHAp.uvfp0W.AMPpPyJMCJuT3TIfjLLzeyAkm', 'est.luis', 'Estudiante', '5555555555', NULL, 1, '2025-07-22 10:45:35', '2025-07-22 10:54:01'),
(18, 'Carmen Silva', 'carmen.silva.est@colegio.edu.ec', '$2y$10$jKOZxDk3uTmWSgXnqZUTJO5RMtXLFKmy4jFLQnooCeMnQro68CJdW', 'est.carmen', 'Estudiante', '6666666666', NULL, 1, '2025-07-22 10:45:35', '2025-07-22 10:54:15'),
(19, 'Roberto Vargas', 'roberto.vargas.est@colegio.edu.ec', '$2y$10$qAnqvanrdADhZN9Zc5hisOaKFpyKZ6EgiWuB97SjXaHFa3SL9utRC', 'est.roberto', 'Estudiante', '7777777777', NULL, 1, '2025-07-22 10:45:35', '2025-07-22 10:54:37'),
(20, 'Patricia Herrera', 'patricia.herrera.est@colegio.edu.ec', '$2y$10$FqffOfWWuC/KVI.xNHLAkOO1ATLmNbYXe.qkGRTAFYxvUNBh4TUte', 'est.patricia', 'Estudiante', '8888888888', NULL, 1, '2025-07-22 10:45:35', '2025-07-22 10:54:50'),
(21, 'Miguel Torres', 'miguel.torres.est@colegio.edu.ec', '$2y$10$Zlgrud54urRPogac9g0cLu6eHVjYyS7w8vw9t13myZFIhIvDdMC0a', 'est.miguel', 'Estudiante', '9999999999', NULL, 5, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(22, 'Isabel Morales', 'isabel.morales.est@colegio.edu.ec', '$2y$10$ajKQ6LMpHKbUOZJVkEWC7uWuyrcZneaK8LSR5YF5mz8GNNewmzcRC', 'est.isabel', 'Estudiante', '0000000000', NULL, 5, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(23, 'Fernando Rojas', 'fernando.rojas.est@colegio.edu.ec', '$2y$10$na15wbyQ6UjWK4pg9TcUd.gb/9aFJ.SPQ1WqLZgxkoW4nh0DA/x66', 'est.fernando', 'Estudiante', '1231231231', NULL, 6, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(24, 'Lucía Mendoza', 'lucia.mendoza.est@colegio.edu.ec', '$2y$10$wGXBey4hdYuX46Ba8xkiWeMdqQz1RG/pnBSxiiEsfh3NSWr.i612O', 'est.lucia', 'Estudiante', '2342342342', NULL, 6, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(25, 'Diego Castro', 'diego.castro.est@colegio.edu.ec', '$2y$10$KpmOg28GngvsrpCu8ceNoekRE/oZT/wE5KGwLPHzHripE8HbfLKBu', 'est.diego', 'Estudiante', '3453453453', NULL, 7, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(26, 'Sofía Ruiz', 'sofia.ruiz@colegio.edu.ec', '$2y$10$0N/GpWZ6cf2ni47LPgLIz.GMynxvZ8DSRN8ZfvFzONWKviLVhkEGi', 'est.sofia', 'Estudiante', '4564564564', NULL, 7, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(27, 'Andrés Jiménez', 'andres.jimenez@colegio.edu.ec', '$2y$10$4mDfFVdpsCvvfXu4VTsQKuS2y1H6MikBVfV6ObgJyNxFb241vonGO', 'est.andres', 'Estudiante', '5675675675', NULL, 8, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(28, 'Valeria Ortiz', 'valeria.ortiz@colegio.edu.ec', '$2y$10$XcAPODPQ7vqRPbtlnBV2RumQxjy77KkLZhvLhWi6QE8BzVy0.q/Ma', 'est.valeria', 'Estudiante', '6786786786', NULL, 8, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(29, 'Daniel Moreno', 'daniel.moreno@colegio.edu.ec', '$2y$10$/TiW2tMnrA9wPse26LRasuvM5a28uGNEBukqlMUsTcl0uDfAr/LcC', 'est.daniel', 'Estudiante', '7897897897', NULL, 9, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(30, 'Camila Vega', 'camila.vega@colegio.edu.ec', '$2y$10$E6dZ2s.mAcDemBiD2A3wVO5ygGk/XMzyOBKPsNHFpoX00AblBxJ7.', 'est.camila', 'Estudiante', '8908908908', NULL, 9, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(31, 'Eduardo Paredes', 'eduardo.paredes@colegio.edu.ec', '$2y$10$eJnUwNherujBb1.Erg78fOlJYUrrHnotZxo1kue3Zug143ssSHBGC', 'est.eduardo', 'Estudiante', '9019019019', NULL, 10, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(32, 'Gabriela Flores', 'gabriela.flores@colegio.edu.ec', '$2y$10$wprORjyIWP20Xp9jZP5Bd.FjkikyA4KI6.Aybq3jVo6hFHlS0nygq', 'est.gabriela', 'Estudiante', '0120120120', NULL, 10, '2025-07-22 10:45:35', '2025-07-22 10:45:35'),
(33, 'Jose Quintero', 'josepr@gmail.com', '$2y$10$0A62u1A8w.kF2ant/JdQo.yA950tOc7Xxu5tzF7IaiuTSWxs6eMsu', 'Jose', 'Estudiante', '0932079888', 'uploads/josepr@gmail.com/1753374444_admin.jpeg', 2, '2025-07-24 21:27:24', '2025-07-24 21:27:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `votaciones`
--

CREATE TABLE `votaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_usuario` int(10) UNSIGNED NOT NULL,
  `id_candidato` int(10) UNSIGNED NOT NULL,
  `voto` tinyint(1) NOT NULL DEFAULT 0,
  `fecha` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `votaciones`
--

INSERT INTO `votaciones` (`id`, `id_usuario`, `id_candidato`, `voto`, `fecha`, `created_at`, `updated_at`) VALUES
(61, 15, 1, 1, '2025-07-23', '2025-07-24 03:22:00', '2025-07-24 03:22:00'),
(62, 15, 4, 1, '2025-07-23', '2025-07-24 03:22:00', '2025-07-24 03:22:00'),
(67, 13, 1, 1, '2025-07-24', '2025-07-24 21:36:23', '2025-07-24 21:36:23'),
(68, 13, 4, 1, '2025-07-24', '2025-07-24 21:36:23', '2025-07-24 21:36:23'),
(69, 15, 2, 1, '2025-07-24', '2025-07-24 21:49:26', '2025-07-24 21:49:26');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `candidatos_id_usuario_foreign` (`id_usuario`);

--
-- Indices de la tabla `carpeta_info`
--
ALTER TABLE `carpeta_info`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cursos`
--
ALTER TABLE `cursos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `horarios_tables`
--
ALTER TABLE `horarios_tables`
  ADD PRIMARY KEY (`id`),
  ADD KEY `horarios_tables_id_materia_foreign` (`id_materia`),
  ADD KEY `horarios_tables_id_usuario_dia_hora_inicio_hora_fin_index` (`id_usuario`,`dia`,`hora_inicio`,`hora_fin`),
  ADD KEY `horarios_tables_id_curso_dia_hora_inicio_hora_fin_index` (`id_curso`,`dia`,`hora_inicio`,`hora_fin`),
  ADD KEY `horarios_tables_id_periodolectivo_dia_index` (`id_periodolectivo`,`dia`),
  ADD KEY `horarios_tables_id_periodolectivo_id_usuario_index` (`id_periodolectivo`,`id_usuario`),
  ADD KEY `horarios_tables_id_periodolectivo_id_curso_index` (`id_periodolectivo`,`id_curso`);

--
-- Indices de la tabla `intemdatos`
--
ALTER TABLE `intemdatos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `intemdatos_id_usuario_estudiante_foreign` (`id_usuario_estudiante`),
  ADD KEY `intemdatos_id_registrosecs_id_usuario_estudiante_index` (`id_registrosecs`,`id_usuario_estudiante`),
  ADD KEY `intemdatos_tipo_intemdato_index` (`tipo_intemdato`);

--
-- Indices de la tabla `materias`
--
ALTER TABLE `materias`
  ADD PRIMARY KEY (`id_materia`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `periodolectivos`
--
ALTER TABLE `periodolectivos`
  ADD PRIMARY KEY (`id_periodolectivo`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `registrosecs`
--
ALTER TABLE `registrosecs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `registrosecs_id_usuario_profesor_foreign` (`id_usuario_profesor`),
  ADD KEY `registrosecs_id_horario_foreign` (`id_horario`);

--
-- Indices de la tabla `ruta_arch`
--
ALTER TABLE `ruta_arch`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ruta_arch_id_carpeta_info_foreign` (`id_carpeta_info`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuarios_correo_unique` (`correo`),
  ADD UNIQUE KEY `usuarios_dni_unique` (`dni`),
  ADD KEY `usuarios_id_curso_foreign` (`id_curso`);

--
-- Indices de la tabla `votaciones`
--
ALTER TABLE `votaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `votaciones_id_usuario_foreign` (`id_usuario`),
  ADD KEY `votaciones_id_candidato_foreign` (`id_candidato`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `candidatos`
--
ALTER TABLE `candidatos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `carpeta_info`
--
ALTER TABLE `carpeta_info`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cursos`
--
ALTER TABLE `cursos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `horarios_tables`
--
ALTER TABLE `horarios_tables`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT de la tabla `intemdatos`
--
ALTER TABLE `intemdatos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT de la tabla `materias`
--
ALTER TABLE `materias`
  MODIFY `id_materia` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `periodolectivos`
--
ALTER TABLE `periodolectivos`
  MODIFY `id_periodolectivo` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `registrosecs`
--
ALTER TABLE `registrosecs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `ruta_arch`
--
ALTER TABLE `ruta_arch`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `votaciones`
--
ALTER TABLE `votaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `candidatos`
--
ALTER TABLE `candidatos`
  ADD CONSTRAINT `candidatos_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `horarios_tables`
--
ALTER TABLE `horarios_tables`
  ADD CONSTRAINT `horarios_tables_id_curso_foreign` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `horarios_tables_id_materia_foreign` FOREIGN KEY (`id_materia`) REFERENCES `materias` (`id_materia`) ON DELETE CASCADE,
  ADD CONSTRAINT `horarios_tables_id_periodolectivo_foreign` FOREIGN KEY (`id_periodolectivo`) REFERENCES `periodolectivos` (`id_periodolectivo`) ON DELETE CASCADE,
  ADD CONSTRAINT `horarios_tables_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `intemdatos`
--
ALTER TABLE `intemdatos`
  ADD CONSTRAINT `intemdatos_id_registrosecs_foreign` FOREIGN KEY (`id_registrosecs`) REFERENCES `registrosecs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `intemdatos_id_usuario_estudiante_foreign` FOREIGN KEY (`id_usuario_estudiante`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `registrosecs`
--
ALTER TABLE `registrosecs`
  ADD CONSTRAINT `registrosecs_id_horario_foreign` FOREIGN KEY (`id_horario`) REFERENCES `horarios_tables` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `registrosecs_id_usuario_profesor_foreign` FOREIGN KEY (`id_usuario_profesor`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `ruta_arch`
--
ALTER TABLE `ruta_arch`
  ADD CONSTRAINT `ruta_arch_id_carpeta_info_foreign` FOREIGN KEY (`id_carpeta_info`) REFERENCES `carpeta_info` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_id_curso_foreign` FOREIGN KEY (`id_curso`) REFERENCES `cursos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `votaciones`
--
ALTER TABLE `votaciones`
  ADD CONSTRAINT `votaciones_id_candidato_foreign` FOREIGN KEY (`id_candidato`) REFERENCES `candidatos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `votaciones_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
