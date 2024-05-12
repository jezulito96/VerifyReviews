-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 12-05-2024 a las 07:49:29
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
-- Estructura de tabla para la tabla `codigo_qr`
--

CREATE TABLE `codigo_qr` (
  `id` int(11) NOT NULL,
  `clave_publica` varchar(255) NOT NULL,
  `clave_privada` varchar(255) NOT NULL,
  `vector_inicializacion` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `codigo_qr`
--

INSERT INTO `codigo_qr` (`id`, `clave_publica`, `clave_privada`, `vector_inicializacion`, `estado`) VALUES
(188, 'c8d775d7cc7a0ed7d5a4a5d900c8ba84', 'ae71567ee79a3e4a21a9e0bd08b06b377bbfa9e93dbc0b3b985381eddd6fa02c', '9b24e94095a6e9b6bdb15f6d1585563b', 0),
(189, '2999e56c7af7b116a8443b10596b76ee', '28da8b98a11eb69e48b3f75dcb11fceac8fa2b901c8e460354f37d8ed8b85076', '89e33370798ac60551d34155bcacd365', 0),
(190, '35e908aabea78c3f60e6017b43404802', 'ece148169cda095d1ec9656ed8f48e17ad02f9a1909cbee0cd58532f685e9227', 'b4ff339315e9df32fb381e1311e734d6', 0),
(191, 'f2305e0270cb05d9053c3738f2cb2f40', '110fc50bc4227249d8264ebc5d609729b59da2a190d03256bccafed39af2dce5', 'e04374b0ad33d1b08153a0b7693776b0', 0),
(192, '501c2fc26b6c9631925a46e11ce3bbe3', '550182270a902989d5fac31ba0d739b7203bddae908b9064d8d5e1ca8c94f0a2', 'bf2a475bf3ea3256fdd17ab88b9a9941', 0),
(193, 'b96b623b745918d897cd12513d58712c', '8a6258c71715d49ad3718242da2e789265fa46903ff133bfa4a9d95ae73ff5fa', '7c4aa45086fc8658d22e652758d90b60', 0),
(194, 'f310c051ef4f381ec7af493ecdc89a77', '667bcaedf17e21c9420d851db671871a6eb324facc612593553a901b7ba776e8', '9c66fc04375e91808351d7a525c56077', 0),
(195, '88cf118fdcf908ebb5843827a73b5cf9', '7b177856018447e2e503ac705fd0c96d79c4b67495435140ab91d16e1d2ea07e', '870d024b4269a6631ddae641fd2ec4db', 0),
(196, 'b4ac12ffff7028ea3036e6bfb1b98741', 'bd1a9ad94665fb2b7fad37599229e9dcb65328e4faa728da5d668a49ae35322a', '5cdaa0493c8abc3ead10d5a7aba0f24f', 0),
(197, 'fe66f3628fb0a5707fd8791debbef3f8', '8600436eb3545ae7d33fc430c619071d0e7efc1b12c47fdf2715ebde7d4912ac', '28e823e521d3088b2790bd591d437e86', 0),
(198, 'c18a32ed3073cd03a8a2542419785042', 'b3490284ccaa4031d6f479e5b4169e11b641295f45e3e39bd28d73efe980c779', 'ab2021eca79d3bd8c778b9a873101879', 0),
(199, '82c9b35226c040307030097a0619805a', '85cec4cfa89443e22ef2c898f3e796c494b69979b74265f0d8742b6cb52cd0d2', 'cd0528c5b6f1138f44d1152d422c2eb3', 0),
(200, '5a8c662fbba720bb9a0d87f3c3c80130', '89fe48d01a793222a1b4297baa6148a12ccafd42ba2a88bda95afe5c84c8de53', 'fbfe5ede26073f16b4b9ec1f70db8b31', 0),
(201, '0978abb5163eb627a43d5f362e83abf3', '04f421e8795ae20edfc9313d2bb30087fe55983c1223fbf9b3ad9d46988bbde5', '166c62190f8f638dfc44b5f578e59970', 0),
(202, '187395e185c4bed298706f75c4e0e66b', '77cc1f66d81a49c226b057384c44443b5447252a8b298a4db43bf0f63c111e1c', '858eb6b3190904de94ff4318e87f6bad', 0),
(203, '4e6d1b88dd594b72be7eb69257095880', 'e2368913bcb13b65ee0daa3aed105d15ae59383aa8201e301a203e88e11e14aa', '4e5a8240dd96fec396b7743ca091a5a8', 0),
(204, '57453b9cf4542c06ed6250d2bab3a3a3', '72d9a9820c56169aabfab99d294f67fb4dc6058a5c1a67b093a157cc9bd0e2ec', '0738313925e5bfcf1d3aa96ecd84173f', 0),
(205, '631ce70b1fb369942d65d711402d5bff', '0cd12014d3ca565f8cc52d374c73878f3ffd71b29113f9c8d9a7a910c3202144', 'b816e67cd866160af40f510b503eda57', 0),
(206, '75adef55114b23f02eb6b115f2aa9458', 'c6eccca61d60c7630b9d23e3a2f5ff3a60a51662e0d207a56ec6cf8f213703bf', '5457d32f2b3593f0d1cda6e19745c5b1', 0),
(207, '6861bd3ecbfc14f6b2504c2e4472b232', 'e77d3947dd4526b8fb72c964268fb0ff37bcdfbb1c5f1fcf94a6c90ac9600386', '140a82c3db08c32a315ad872f95f6579', 0),
(208, 'e9f9426aa47e2e3fb4a628d737449e35', '8b590423210afb9554b3e6e72ebb40e58fbd8fc4026a6d3d7e32fa93c6dc6d5b', '45e13d60e15e698fcab15de77aa9ff8e', 0),
(209, '35b8777e977c80d9cfc3b3a6cd4e671a', 'a3c7dcf6793c938d4cbf6c5639461e94eb8b876a8964ee972a5141e2dae68fd5', '9c42b8b1b57cf48795f4a04feae8019d', 0),
(210, '481d872cdc48c76d2905dc0455da1fbc', 'e6fdd3aedbef51eead0f29c6e28ecdf4b6cfe881acff9f515d5a809fc4c56391', '2fd8c41099529216f4c35d3950d6d2ad', 0),
(211, '6d98bf828952ffbd4a830b3eaa420e1a', 'd75ad171d69729a60442c15ec2f0ba07a5aef3ca4e9333c122648bfd7814967e', '4c82d5ebc15b4bdde9396075babae827', 0),
(212, '893ebb189ad3f01e17cd5a5bf2f833a7', '0feb8a326f7c8dee31cf5a9150fb6a73bcb7256a9eab96762cac7e7f5ce14f55', '2d54343843a104b445616475e135afa8', 0),
(213, 'ff252efcedd4d47f61071c4fcf861cbd', '39b7b39f17875da167e26469878faed92e0dbe61df95b60f6222f1cd2b578ec3', 'fddd07c1c01fc9d204d547f930a5e8e0', 0),
(214, '84f7a8555718c13aa3d831af3c0616a1', '272a46a5efcf1e40dc75427459518df06625acb6c83da5bca78208164da487ba', '59153442960adaaf8f0eda3dc551cd4a', 0),
(215, '24b51a61cbde9fe1275075788882039e', '012c83ad45bfb8913bf0ef00755b10e53522ad63251b1e78c4a7ad20c89cfbc4', '6b92cc1528a97138d91b2989ac5d4511', 1),
(216, '8f26491bc2e2cee0950cb58b35a7cea9', 'c36d9885aff9b76b1757c6dd3b79ec70087a6f649ce5825c3fbbeefd8aab0b06', '133be5dc350443902d5fde83a3471cce', 0),
(217, '403c37764f67624bf29da699fa59baf0', 'be5f44a3f1a3c98ca734a61a7649faee8a9b30fac4a471b6567107617d180736', '0a5a4301d289f0db49725ab875571336', 0);

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
  `foto_principal` varchar(50) NOT NULL,
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
(14, 'La terraza del Caballo Blanco', '$2y$10$PIDelYWx9BtPJiKP3Zv/5ekcxVyRw4MLO/NIVg6QHSJDZaZMF1N.K', 'jesus.g.956@gmail.com', 'cortes de soria, 15', 'soria', 'españa', 672416195, 'images/n/n_14/img_negocio/img1.png', 'images/n/n_14/img_negocio/imgPrincipal.png', '41.7622786,-2.4686196', 'https://www.verifyReviews.es', 1, 'jesus', 672416195, 1, 0, 'f88e11896cd1cfd7512e8e0d10f05d96', '41322858d7b19f1baa4ce2469dded2cf', '2024-04-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `resena`
--

CREATE TABLE `resena` (
  `cod_resena` int(11) NOT NULL,
  `cod_negocio` int(11) NOT NULL,
  `cod_usuario` int(11) DEFAULT NULL,
  `fecha_creacion` datetime NOT NULL,
  `fecha_servicio` datetime DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `titulo` varchar(100) DEFAULT NULL,
  `opinion` varchar(500) DEFAULT NULL,
  `fotos` varchar(300) DEFAULT NULL,
  `qr_id` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1,
  `nickname` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `resena`
--

INSERT INTO `resena` (`cod_resena`, `cod_negocio`, `cod_usuario`, `fecha_creacion`, `fecha_servicio`, `calificacion`, `titulo`, `opinion`, `fotos`, `qr_id`, `estado`, `nickname`) VALUES
(1, 14, 2, '2024-05-11 00:00:00', '2024-05-08 00:00:00', 3, 'ASEFDDDDDDDDDDDDDDDDASEFDDASEFDDDDDDDDDDDDDDDDDDDD', 'ASEFDDDDDDDDDDDDDDDDASEFDDASEFDDDDDDDDDDDDDDDDDDDDASEFDDDDDDDDDDDDDDDDASEFDDASEFDDDDDDDDDDDDDDDDDDDDASEFDDDDDDDDDDDDDDDDASEFDDASEFDDDDDDDDDDDDDDDDDDDDASEFDDDDDDDDDDDDDDDDASEFDDASEFDDDDDDDDDDDDDDDDDDDD', 'n_14/resenas/r_1/img1.png,n_14/resenas/r_1/img2.png,n_14/resenas/r_1/img3.png,n_14/resenas/r_1/img4.png', 216, 1, 'jezulito'),
(5, 14, 2, '2024-05-12 00:00:00', '2024-05-08 00:00:00', 3, 'aafasuhola hola gholaafasuhola hola gholaafasuhola hola ghol', 'aafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola ghol', 'n_14/resenas/r_2/img1.png,n_14/resenas/r_2/img2.png,n_14/resenas/r_2/img3.png,n_14/resenas/r_2/img4.png,n_14/resenas/r_2/img5.png', 217, 1, 'jezulito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_no_registrado`
--

CREATE TABLE `usuario_no_registrado` (
  `cod_usuario` int(11) NOT NULL,
  `nickname` varchar(70) NOT NULL
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
-- Indices de la tabla `codigo_qr`
--
ALTER TABLE `codigo_qr`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`cod_negocio`),
  ADD KEY `cod_categoria` (`cod_categoria`);

--
-- Indices de la tabla `resena`
--
ALTER TABLE `resena`
  ADD PRIMARY KEY (`cod_resena`),
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
-- AUTO_INCREMENT de la tabla `codigo_qr`
--
ALTER TABLE `codigo_qr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=218;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `cod_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `resena`
--
ALTER TABLE `resena`
  MODIFY `cod_resena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- Filtros para la tabla `resena`
--
ALTER TABLE `resena`
  ADD CONSTRAINT `resena_ibfk_1` FOREIGN KEY (`cod_negocio`) REFERENCES `negocio` (`cod_negocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `resena_ibfk_2` FOREIGN KEY (`cod_usuario`) REFERENCES `usuario_registrado` (`cod_usuario`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
