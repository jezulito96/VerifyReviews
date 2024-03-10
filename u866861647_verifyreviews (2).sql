-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 10-03-2024 a las 11:44:36
-- Versión del servidor: 10.11.7-MariaDB-cll-lve
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u866861647_verifyreviews`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `cod_categoria` int(11) NOT NULL,
  `tipo_negocio` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cod_categoria`, `tipo_negocio`) VALUES
(1, 'Bar/Restaurante'),
(2, 'Peluquería');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comercio`
--

CREATE TABLE `comercio` (
  `cod_comercio` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `ubicacion` varchar(100) NOT NULL,
  `contacto` varchar(200) NOT NULL,
  `fotos` varchar(200) NOT NULL,
  `coordenadas` varchar(100) NOT NULL,
  `sitio_web` varchar(300) NOT NULL,
  `cod_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseña`
--

CREATE TABLE `reseña` (
  `cod_reseña` int(11) NOT NULL,
  `cod_comercio` int(11) NOT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_servicio` datetime DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `opinion` varchar(500) DEFAULT NULL,
  `fotos` varchar(300) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_registrado`
--

CREATE TABLE `usuario_registrado` (
  `cod_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellidos` varchar(70) NOT NULL,
  `correo` varchar(70) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `ubicacion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD PRIMARY KEY (`cod_reseña`);

--
-- Indices de la tabla `usuario_registrado`
--
ALTER TABLE `usuario_registrado`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `reseña`
--
ALTER TABLE `reseña`
  MODIFY `cod_reseña` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_registrado`
--
ALTER TABLE `usuario_registrado`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
