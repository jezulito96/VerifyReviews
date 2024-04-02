-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-04-2024 a las 13:32:58
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
  `tipo_negocio` varchar(90) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`cod_categoria`, `tipo_negocio`) VALUES
(1, 'Restaurantes'),
(2, 'Peluquerías'),
(3, 'Cafeterías'),
(4, 'Talleres');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `cod_negocio` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `calle` varchar(150) NOT NULL,
  `ciudad` varchar(70) NOT NULL,
  `pais` varchar(70) NOT NULL,
  `telefono_negocio` int(9) NOT NULL,
  `fotos` varchar(200) NOT NULL,
  `foto_principal` varchar(10) NOT NULL,
  `coordenadas` varchar(100) NOT NULL,
  `sitio_web` varchar(300) NOT NULL,
  `cod_categoria` int(11) NOT NULL,
  `nombre_titular` varchar(150) NOT NULL,
  `telefono_titular` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `confirma_correo` tinyint(1) NOT NULL,
  `cod_confirmacion` varchar(40) NOT NULL,
  `cod_recordar_contrasena` varchar(40) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`cod_negocio`, `nombre`, `contrasena`, `email`, `calle`, `ciudad`, `pais`, `telefono_negocio`, `fotos`, `foto_principal`, `coordenadas`, `sitio_web`, `cod_categoria`, `nombre_titular`, `telefono_titular`, `activo`, `confirma_correo`, `cod_confirmacion`, `cod_recordar_contrasena`, `fecha_creacion`) VALUES
(14, 'caballo', '$2y$10$PIDelYWx9BtPJiKP3Zv/5ekcxVyRw4MLO/NIVg6QHSJDZaZMF1N.K', 'jesus.g.956@gmail.com', 'cortes de soria, 15', 'soria', 'españa', 672416195, 'img1.png', 'imgPrincip', '41.7622786,-2.4686196', 'https://www.verifyReviews.es', 1, 'jesus', 672416195, 1, 0, 'f88e11896cd1cfd7512e8e0d10f05d96', '41322858d7b19f1baa4ce2469dded2cf', '2024-04-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reseña`
--

CREATE TABLE `reseña` (
  `cod_reseña` int(11) NOT NULL,
  `cod_negocio` int(11) NOT NULL,
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
-- Estructura de tabla para la tabla `usuario_no_registrado`
--

CREATE TABLE `usuario_no_registrado` (
  `cod_usuario` int(11) NOT NULL,
  `nick_name` varchar(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_registrado`
--

CREATE TABLE `usuario_registrado` (
  `cod_usuario` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `apellidos` varchar(70) NOT NULL,
  `nickname` varchar(50) NOT NULL,
  `foto_perfil` varchar(20) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `ciudad` varchar(100) NOT NULL,
  `pais` varchar(50) NOT NULL,
  `coordenadas` varchar(100) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `email` varchar(200) NOT NULL,
  `telefono` int(9) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `confirma_correo` tinyint(1) NOT NULL,
  `cod_confirmacion` varchar(40) NOT NULL,
  `cod_recordar_contrasena` varchar(255) NOT NULL,
  `fecha_creacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_registrado`
--

INSERT INTO `usuario_registrado` (`cod_usuario`, `nombre`, `apellidos`, `nickname`, `foto_perfil`, `contrasena`, `ciudad`, `pais`, `coordenadas`, `fecha_nacimiento`, `email`, `telefono`, `activo`, `confirma_correo`, `cod_confirmacion`, `cod_recordar_contrasena`, `fecha_creacion`) VALUES
(2, 'jesus', 'gomollon andres', 'jezulito', 'jezulito.png', '$2y$10$v9jM1/AavIjaQc16DeVPvuOoChI3KwdAcAmkciYGsGMGhZigkmvYC', 'soria', 'españa', '41.60125045,-2.721938035449954', '1996-10-20', 'jesus.g.9696@gmail.com', 672416195, 1, 0, '185678b6209baa07527154307e8dc2fe', '93f48855e243ab1d4959effe6536b892', '2024-04-01');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`cod_categoria`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`cod_negocio`),
  ADD KEY `cod_categoria` (`cod_categoria`);

--
-- Indices de la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD PRIMARY KEY (`cod_reseña`),
  ADD KEY `cod_comercio` (`cod_negocio`,`cod_usuario`),
  ADD KEY `cod_usuario` (`cod_usuario`);

--
-- Indices de la tabla `usuario_registrado`
--
ALTER TABLE `usuario_registrado`
  ADD PRIMARY KEY (`cod_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `cod_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `reseña`
--
ALTER TABLE `reseña`
  MODIFY `cod_reseña` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario_registrado`
--
ALTER TABLE `usuario_registrado`
  MODIFY `cod_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD CONSTRAINT `cod_comercio-cod_categoria` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `reseña`
--
ALTER TABLE `reseña`
  ADD CONSTRAINT `reseña_ibfk_1` FOREIGN KEY (`cod_negocio`) REFERENCES `negocio` (`cod_negocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reseña_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario_registrado` (`cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
