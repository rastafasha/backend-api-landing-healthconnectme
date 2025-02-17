-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-02-2025 a las 08:00:03
-- Versión del servidor: 10.6.20-MariaDB-cll-lve
-- Versión de PHP: 8.1.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `api_rest_healthconnect`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `ciudad` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `dondeSeEntero` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('APPROVED','PENDING','REJECTED') NOT NULL DEFAULT 'PENDING',
  `terminos` varchar(2) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `doctors`
--

INSERT INTO `doctors` (`id`, `nombre`, `apellido`, `email`, `ciudad`, `phone`, `speciality`, `address`, `facebook`, `instagram`, `dondeSeEntero`, `image`, `status`, `terminos`, `created_at`, `updated_at`) VALUES
(1, 'Malcolm', 'Cordova', 'mercadocreativo@gmail.com', 'caracas', '04241874370', 'Odontologia', 'caracas\ncaracas', NULL, NULL, 'un amigo', NULL, 'PENDING', '1', '2025-02-13 07:50:21', '2025-02-14 00:30:38'),
(2, 'test', 'Cordova', 'test@test.com', 'caracas', '234432432', 'Dermatologia', 'caracas\ncaracas', NULL, NULL, 'amigo', NULL, 'PENDING', '1', '2025-02-13 08:02:11', '2025-02-13 08:02:11');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
