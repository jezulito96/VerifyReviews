-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-06-2024 a las 15:57:37
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
(4, 'Talleres'),
(5, 'Perfumería'),
(6, 'Psicología'),
(7, 'Moda');

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
(217, '403c37764f67624bf29da699fa59baf0', 'be5f44a3f1a3c98ca734a61a7649faee8a9b30fac4a471b6567107617d180736', '0a5a4301d289f0db49725ab875571336', 0),
(218, 'b2187c3ba1bae608d222cdadcf508037', 'd0b80bf0eaeabebd0305888caf280b4c9521a6587db63c0183b3e2acc6af6f61', '242be330ea762098a751466ca62c4d6e', 0),
(219, 'b43e4972d3ffabeaaec62555ca8d940f', 'ecb6b77378b0086d517dabc7b89c57acb4bf1de0fbb1dd5dbced6e7de264204f', '107592199159951cb9201756fc66588d', 0),
(220, '5d93fa48a6ff7d99dc43b8df369248b3', 'f1779be67742a0c27011ee55b50a6d4d3e3b09623c79903396a70e0c04b8f5ae', '2e72cdb36f988bd001a48143deb0f7f3', 0),
(221, '18c873a4116d8d9da3fb747007a850f8', 'ce697fa20b3447a9f6db04c1c36895c5be594af8cc60bb6d23434f876be0b562', '51df37dc72170b9cf947d28019616cb7', 1),
(222, 'b9ee37779218cd6b4609e13bb8f6ae7f', '6abbf57ddec2eb87c72a4f0bf645467055a2d96d2caeb40e46ad8e417f271865', 'c784941182432e3fba73ef7409e84aa3', 1),
(223, '2816e33f87878bb6733993481a15ffc9', '354e3374f7d1b506d0fea4d2463ba4fd758111d56882a0885a321e0fdfa68982', '805cd3a9591d3f00cab440dacc6eb22e', 1),
(224, '4fc48b5207a37e9466b08b2395e165bb', '6369811381ed2e5c9203af7764b4f72bafd5fa841f33aaad05f0b062615ddbec', '797d50019cf850b3861fc72cd2f1e185', 1),
(225, '9dcc0d847f608e85f7b3a325d084acaa', '5fcfc4a0e3bbae49d7413dd744059e64a3995992130f031be1d1ca3e597c650d', '71b0e77a4bdc9cfbcebe93c2f0e8341e', 1),
(226, '7f55332d5719f864c76e9141bf87b420', '242da3a1d4ec07fdcd9f26e5d71ca5ab4fc175e72c7de12ec49cba32fefd840d', 'e6b759a5e94dcee23449b6ebf02d46bc', 1),
(227, '2e1b9fa2cc7cff5ebe64dd72ec2c7d1b', 'eaedbf759035aa4d35c91fb2b1ece3b3ad70efa3abff362269a8d692f8d0b555', 'badc979b29a7da04ef62c0f53a2a70e1', 1),
(228, '8d4d2302afcdc8bfe5f625e0d7ff7747', 'b33826a40bb96cd1b1a251e4b1cb3f15b1801e64fe34969de00a32b07445bbbe', '52c289bbc3cbdb4a0bf95c17389ef2e8', 0),
(229, 'a2d7d637d7236bac1550f8f772db5b83', 'b168ba79c545fae1117784ed80eeebac32ad994b42848ac20b59f7ae05311265', 'bc51f156bba04ef7edc0382295858752', 0),
(230, '70679bc43c69633bb7edafd7e875fb8a', '4c9df1e697a89a040a369a4652b085cfec143ee76af0a82bd834fc5f852dd8ac', 'd3f05bf00c4efc07fda17beac86766e7', 0),
(231, 'c360d42b781d1a2c0f936484e306716f', '27d82de6af25d6e291334e1bc98c008e9de0a582586fa098dd1e4dc46245dbb0', 'b38d8254d0972b9cacb8b4006d32ce36', 0),
(232, '9bc70fad22934622db5f295f96d5787c', '78ec1d132072e57f1b77ccbd3b52801b7c006608e62cbe0895e9312f9079e0c9', '516b5f4c7d697c14d9e2b7f8ad7aa30d', 0),
(233, '3e8fec568b3b759429aee770b04177fd', '52f55df10b134879419ddc4e737cda46f865342097f35b3f3f263e8c1ef8a0d5', 'b00a2fc6a750f61d7c181a7f8ac88330', 0),
(234, 'affb4a90ea57c945a0e155a81f93e0b6', 'f787c450b79fe9018cbe892395171a9dca769782e9a920bbfd4d696727e1e0af', '067a01acfcd3689bed5c787fcd0d7c85', 0),
(235, 'a931bf9ee8be8cc1868c72ac1ec01e81', '1bb90762a59c335aba53724094a019d0e441c07512351666fa4a33ced0f1ecc7', 'beb36068f06a7050aedb3cbf15ba6069', 0),
(236, '5e72629adbf2930740d9d46768501752', 'd02ddd3c94aa8c66c83ca35866f0c6c1d91d29804a2f5c4283671c53d3633cf0', 'b74b05d2cceedd191d8758f5fb9e0c93', 0),
(237, 'f1baa2996788e117d2359d99198554ba', '775726e50342aaaf0ec337ce994268d7ac98d3404fed2269316f7dc9e9666fca', '38d7d1b77a809144b4de44e19524b3a9', 0),
(238, '3b8d2b3b3509088955162d1524fd955d', '254ab8446089d59bbcd54206041c3742ff8cf79dce84ec7c7bf4202f1f6b6a36', 'e37746fe78e524410ea4fe84052a9641', 0),
(239, '048bfb27db5a42be20f78e968b57d266', '242d4e95f2c2dd5038690acadd6244914d6fd83076dbee8f26f6004e8c137593', '66ffa6a7a659a1686775b71c835d192f', 0),
(240, '11ae79767eb8d32001854f4488e276a3', '3a5ee63446df7db464ed87f9067b940d4a55faf88fe82bbd583ad1c033849213', 'e543f54c3840d2c2c392dd91a4868cef', 0),
(241, 'e835066c81b44030fe624aee9499efe4', 'e0de86f6bf0aee74d3181dfb157e36dc77ba347d17b905a4ea9b2475c231362c', '4bb96067f95f3e68c6514d03806898d2', 0),
(242, '9577a1d9238da8c2942fcb26c40d3310', '8349e4805fe35ed56b7bf1b291e974d4c1e6b4c14b836ae0561d5799f2fcff0d', '4b8f11b6cc53fb7bb2bc207fdf0e03f2', 0),
(243, '0a96b04875d8813d90179ee72755b114', 'f115494dcb39220c4d804ddf0af355af8e2801f08e9ec4ab3717aaed88fe9f0d', '8eb7279c76223721e758fa8edd720ced', 0),
(244, '082be5863b516066ab38d4153ad1c8c5', '1848d1351e74774beb484cd8e75bacf531ffdbe8bb2f017312a964f21774b759', '51b511b5e80fc3d27967e28be2d08895', 0),
(245, '6315e06befa5e6b1ed997da4990e2682', '9c234549842ddf1859a3fa93bcf4c451bfc82a0943e1d3e127333d9d43aebbe3', 'af0655df9ad9f07f555807f1683fb517', 0),
(246, '68627e6610419e524077bf02361618a7', '163910f86f7cd4966fa916e00508216bbaae9ec3cffa04ca506afbc5bbcaf359', '524ce38fe9e9afdfb57c268fce96a6ec', 0),
(247, 'b7d9773ebb760f98ef4e04020e35817c', '46de7cd1cf35b092127191265d8764cd63059cbca3698a5fd37b1f74e1ede083', '1ae63e58a4c91b190923690d1fdb8b63', 0),
(248, '3f55970240cef2a030a25ce2cf7aa9bc', 'c690ee6f88ba0da69b48a90d23c37c77f9779c9f07acbcb156af2bbcb80fd1fc', 'cd155c635b191444f1d1ecf530f09edf', 0),
(249, '58612cf6f51196ef11f451ff54c6b78f', '03af03220144d2cde691e1dec50feac7e20dc667f02541c23c9b42229ef1de80', '2001614d3b7246ef1503f348b85e0068', 1),
(250, '22aeceaedd207ef6b4acc96843129bc4', '0a098521850fd7dc78f54ca8f720e297acab3ae4cdb4206bd0c7c1216c6ace90', '73d06c6a4648b497df7033538906ad04', 0),
(251, 'f63b9419bbdc8d08644b1971d9614b7a', 'beb62e6e77850d9df6bb0156c891dcbf7b3c4a7233b598c6cf943b498756ef35', '42826fe3ddcc9bbaefcc5da472cebf83', 1),
(252, '9e2b15737adbe873897b0a2593a5d2f3', '0e6a0610f56adde2f607c778392846cd47da1fa45c79eaed2eb8e982078594a6', '3471548e9424773c48895e835e055676', 1),
(255, '5fd42a8963db41cefd0898eb46109c3b', '21bda7d91fc004956e6e318dd9b8fc4683e61d761b246a86f76988cfaef50c22', 'a9ef363b82e3af958f5debd33ee7934e', 1),
(256, 'e4ef46c622b1e232c2800aecbc178c52', '208af9cd6ed66b8ab0b875c245dd289482896b0b35f527660d1393083c8b3b79', '9a9010c2d7487667a349c2611a3cdb12', 1),
(257, 'caa2ecc7f0eb7df8a2b3718cfc5d9fc4', 'bffdfa47d5f17ddf20162b54a27ed822c6a6e7baeb7bc7445cc4d2b58a9b4321', '008898771facefd872cf847b6a7408d2', 1),
(258, 'ff7d08b5e05add1b18f066a74afdf080', 'cf28694f8993073dec8e6ec10e7768e6182c6516311765bb4a8d1f66350a4b73', '7c73c3829bcfeb0f77185e1346404b30', 1),
(259, 'b3ac75ca5f4b29f8324acb876f8ed650', '7a5ba21e43f062f6397ddaff4dc38bb11798a51cd085fe96e37c106a1a1b5307', '8285de40876304f6d7c74c32559a1f6d', 1),
(260, '3a0a15541732f2c8ebf564b3da33a088', '80538c1999b331b672b04842d507e3c57db94bb83386664a2852c1b05e7b3bb5', '64c9659da6de9b258f365f653f9fba65', 1),
(261, 'd24707ffcd8d44140898e61b31f66a1f', '66705bea7fc562af5cd4826335a5a09cc1270ad5454727ffedbeb428c384899e', 'fa905bbd58d8a342d788e914fd9c4e8c', 1),
(262, 'ac9573dccb9a47bec01858329223b29e', 'c6e64d079cd95788a7f364ccb4e3ebf3c27f755e7dfc4d9855f728eaa332cfbf', 'ccc88678b6c844affd8648058e8fcd17', 1),
(263, '953a299e247bb4d987b8319acca0cc8b', '66d09bd08d542f2713abaa43f4bd70474f2219c9059170c1f16e8f6b12e83f4a', '91015efedf9bff2142ff32d1377f5887', 1),
(264, 'b9952e57ebce55c1612699364c57ac46', 'e8fc9f3c3cbaf35bf4b485e2cb8838013d77bb6605ee5b3e7f40fd5b868735da', '79d70e21c3d52ffbf73be62f83b4533d', 1),
(265, 'db8ee02243db8148850916b9edeecdf6', 'fad952702b41bf27c653d5af245f5a1162f568b2b2aa6e7d8b8e057961218ba6', '05c6c68f0c0489d2f574af1d09ab4dee', 1),
(266, 'b12157540f8b2df457c10760c9d47b2b', '835ef54026210773798acc658c845ce92d1e8395a68a99fb387554301b61b100', '5c48f8983cd00c3af0b84aa9e84ca44c', 1),
(267, '87627b32ab4c345428240e18ba46aca6', 'b9a69322c3be5fd609414a2dfe703d4048e3b9df80b1baf5a015a8efc762e08d', 'eaa6d952ed13ea7e946c5776c768b18c', 1),
(268, 'b59ab16480016375736a7bccf956d4e5', '8f5fcab533f842f5eee05c9294676a4a3c17983e4a8ef5c38c368b39b85a384f', '712eaa5aaa0b7fc06c071a1cf3a1335c', 1),
(269, '0942cce759c2187b33a8770fb5b915ae', 'f4cd2e16eb532000618964e618f7bb2bf81d506dc37af1f3ccc1fe4439307b26', 'ce56a4db1094d842e29586469d94ddc1', 1),
(270, '1ce74d9968f950dfbfee78f163f61871', '97b991d9db9f55c80f63f28b77492f12e33c7f98fc9c395b1bc9479fb3f33a77', 'b7f2f7cdcbc0e057cf295639fe8dd909', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estadisticas_resena`
--

CREATE TABLE `estadisticas_resena` (
  `id` int(11) NOT NULL,
  `cod_resena` int(11) NOT NULL,
  `cod_negocio` int(11) NOT NULL,
  `categoria_negocio` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estadisticas_resena`
--

INSERT INTO `estadisticas_resena` (`id`, `cod_resena`, `cod_negocio`, `categoria_negocio`, `calificacion`, `fecha`, `estado`) VALUES
(1, 1, 14, 1, 3, '2024-05-08', 1),
(2, 2, 14, 1, 2, '2024-05-08', 1),
(3, 12, 14, 1, 3, '2024-05-03', 1),
(4, 13, 14, 1, 5, '0024-05-01', 1),
(5, 15, 23, 2, 3, '2024-05-31', 1),
(6, 15, 15, 1, 5, '2024-05-31', 1),
(7, 17, 19, 1, 3, '2024-05-31', 1),
(8, 18, 24, 2, 3, '2024-05-31', 1),
(9, 19, 21, 2, 5, '2024-05-31', 1),
(10, 20, 20, 2, 3, '2024-05-31', 1),
(11, 21, 25, 3, 5, '2024-05-31', 1),
(12, 22, 26, 3, 4, '2024-05-31', 1),
(13, 23, 27, 3, 2, '2024-05-31', 1),
(14, 24, 28, 4, 4, '2024-05-31', 1),
(15, 25, 29, 4, 1, '2024-05-31', 1),
(16, 26, 30, 4, 5, '2024-05-31', 1),
(17, 27, 38, 5, 2, '2024-05-31', 1),
(18, 28, 39, 5, 4, '2024-05-31', 1),
(19, 29, 40, 5, 5, '2024-05-31', 1),
(20, 30, 33, 6, 4, '2024-05-31', 1),
(21, 31, 35, 6, 2, '2024-05-31', 1),
(22, 32, 34, 6, 5, '2024-05-31', 1),
(23, 33, 31, 7, 3, '2024-05-31', 1),
(24, 34, 32, 7, 3, '2024-05-31', 1),
(25, 35, 41, 7, 5, '2024-05-31', 1),
(26, 36, 29, 4, 4, '2024-06-01', 1),
(27, 37, 29, 4, 4, '2024-06-01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `cod_negocio` int(11) NOT NULL,
  `nombre` varchar(70) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `email` varchar(200) DEFAULT NULL,
  `calle` varchar(150) NOT NULL,
  `ciudad` varchar(70) NOT NULL,
  `pais` varchar(70) NOT NULL,
  `telefono_negocio` varchar(12) NOT NULL,
  `fotos` varchar(200) NOT NULL,
  `foto_principal` varchar(50) NOT NULL,
  `coordenadas` varchar(100) NOT NULL,
  `sitio_web` varchar(300) NOT NULL,
  `cod_categoria` int(11) NOT NULL,
  `nombre_titular` varchar(150) NOT NULL,
  `telefono_titular` varchar(12) NOT NULL,
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
(14, 'La terraza del Caballo Blanco', '$2y$10$PIDelYWx9BtPJiKP3Zv/5ekcxVyRw4MLO/NIVg6QHSJDZaZMF1N.K', 'jesus.g.956@gmail.com', 'Av. Valladolid, 106, 42005', 'soria', 'españa', '672416195', 'img1.jpg,img2.jpg', 'imgPrincipal.jpg', '41.77033641076329, -2.4939907404776958', 'https://www.verifyReviews.es', 1, 'jesus', '672416456', 1, 0, 'f88e11896cd1cfd7512e8e0d10f05d96', '41322858d7b19f1baa4ce2469dded2cf', '2024-04-01'),
(15, 'La Gastro Tasquita', '$2y$10$7A2mn9qnFfWcft.tCQ5ccOOHLJ4meeqHlT8sJ5skuOQDvlNBvg4Pa', 'tasquita@gmail.com', 'C/ leon', 'soria', 'españa', '672426295', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.4850908,-2.5416795', 'https://www.japan.travel/es/es/', 1, 'Maria', '273927392', 1, 0, 'ac1e6ad73647b62729f7ea9c9aeb703b', 'ab2642a1845ae91f593b5545dcb5ab3b', '2024-05-12'),
(17, 'Al Bar De Max', '$2y$10$avixw1f7MBg8Bjta0io2o.5D2DwZO8pyyaevx/9INJfjZ2tBn3jZK', 'max.max@verifyreviews.es', 'C/ Sanz Oliveros 1, 42002', 'Soria', 'España', '975342332', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.7658855,-2.4644435', 'https://www.facebook.com/albardemax/', 1, 'Max max', '975226968', 1, 0, 'c81f2d5d1fb1202669aa85bdc783bf71', '469ee56f5798b550457e4f20926758b8', '2024-05-28'),
(18, 'El Ventorro', '$2y$10$bBS4QpuGplYDCIiOYXbdqe7ua/ek2IVPQ8JPk6u.5LctmDrGyRIs2', 'ventorro.ventorro@verifyreviews.es', 'Avenida Mariano Vicen 33, 42003', 'Soria', 'España', '975235423', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.7589232,-2.4696948', 'https://elventorro.es/', 1, 'Pedro', '975235423', 1, 0, 'e7e080b4e36af70a43e4ab1d84c9f391', 'da69e0b9cf734c61fb680a9e71602354', '2024-05-28'),
(19, 'El kiosco', '$2y$10$KPXJssZaZRsQMms6WZCNCeLifeCA2dzXLKj3GhXlgokBCCus1VKHS', 'kiosco.kiosco@verifyreviews.es', 'paseo del espolon, 42001', 'Soria', 'España', '630756534', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.7647115,-2.4723079', 'https://elkioscodesoria.com/', 1, 'Paco', '630756534', 1, 1, '179515a0e87f404c7797529b3ffdf8d5', '69425ff51e7adeedd19b9b081db3dde9', '2024-05-28'),
(20, 'Estudio cero', '$2y$10$PmtbWBL5RkCtSUDVHVhYoOQt8f9Pz2WoSYnDfY2MdwoI1WF9egcJ.', 'estudio.cero@verifyreviews.es', 'Calle Puertas de Pro, 46, 42002 ', 'Soria', 'España', '975240224', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.766523,-2.4675837', 'http://estudio-cero.com/', 2, 'Lorena', '975240224', 1, 0, '9d6119f314ec9c33161dd872b16d1f5f', '3ce6e6deca2dae336f0a30d1f261ded2', '2024-05-28'),
(21, 'Peluquería y Estética X Los Pelos', '$2y$10$IavUBO2wbeI3RkBWdllRyOBUkwkjI9zrM9KPpwFdTJdHuTaxvBcXO', 'xlospelos@verifyreviews.es', 'C/ las Casas, nº 16 , 42004', 'Soria', 'España', '975223626', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.7688588,-2.4680337', 'https://www.instagram.com/xlospelossoria/?utm_medium=copy_link', 2, 'Gema', '975223626', 1, 0, 'a419fe366f9100706aee6da781eda41f', '8531eae588353997c607128eb03a45dd', '2024-05-28'),
(23, 'Peluquería Bambú', '$2y$10$cXzyhCag.YC4L9maKJg2..8LBh5jsWnnRnYPR5ww3reNNCp.FMfYu', 'peluqueriaBambu@verifyreviews.es', 'c/ Ángel Terrel, 1, 42001', 'Soria', 'España', '975232092', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.7662821,-2.4724896', 'https://www.facebook.com/bambupeluqueriasoria/?locale=es_ES', 2, 'Mariano', '975232092', 1, 0, 'c07dd5c2902d5a6300c1cd4e7efee562', '455ee6774d2cda916483ff4e7d981a8f', '2024-05-28'),
(24, 'Noelia Alcalde estilistas', '$2y$10$/9RTSHxXNmwevlWYuS5UgOuTlmvIcvM4I2VjN7zCx5o8AEY4ZXJJK', 'noeliaAlcalde@verifyreviews.es', 'C/ Aduana Vieja,  14, 42002', 'Soria', 'España', '935240224', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.7657868,-2.4670725', 'https://noeliaalcalde.es/', 2, 'Noelia', '975240224', 1, 0, '012b6103f61985377e5e57601c51a84f', '8e5a06b96c8fc7c512d12a5c55405595', '2024-05-28'),
(25, 'Cafetería Enjoy Coffee', '$2y$10$ena7tW2ngWc0RM.XnRvAj..fA0rNUyG0RCuixr01WYAsUPE1W3yKa', 'enjoy@verifyreviews.es', 'cl/ obispo rubio montel', 'Soria', 'España', '347373737', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.7648198,-2.4682479', 'https://enjoysoria.com/', 3, 'Lola', '347373737', 1, 0, '837fe2d5121b6f37ac8a6b4374355e0c', 'b62d108c9cc7803839af62b8eca5f740', '2024-05-30'),
(26, 'Cafetería Tauro', '$2y$10$lsTLK0qxHw7ZFwi9IMgRBuyeijoYcjCD69y.s7GF6Ewe18abE5PO.', 'tauro@verifyreviews.es', 'C. Venerable Palafox, 5', 'Soria', 'España', '975213901', 'img1.jpg,img2.jpg', 'imgPrincipal.jpg', '41.7669125,-2.4719537', 'https://www.facebook.com/cafeteria.tauro/?locale=es_ES', 3, 'Pedro', '975213901', 1, 0, '89240ca81ec2f48c32069f80152ba377', '329426b4ae76e5075407dac79cb029d8', '2024-05-30'),
(27, 'Café del Art', '$2y$10$IUezHA5tsZPKdH.Plt3S6uwD3Zy/ZVInYs2W9vyaiBTkTpnV/dGWq', 'cafeArt@verifyreviews.es', 'Pl. de Cascorro, 9, Centro, 28005', 'Madrid', 'España', '913203928', 'img1.jpg,img2.jpg', 'imgPrincipal.jpg', '40.4104627,-3.7074759', 'https://www.instagram.com/cafedelart.es/', 3, 'Begoña', '913203928', 1, 0, 'b21b877b0cc57fe6a711eeacca1122e3', '852f5828c035976afcd82a56dcfafacb', '2024-05-30'),
(28, 'Auto Talleres Barcelona', '$2y$10$UxOlcPl1/EvUCeL6mZ8L9e/QnsOYx1sSS.k9g0wsnUClamv61xsdG', 'AutoTalleres@verifyreviews.es', 'C/ de Sant Adrià, 52, Sant Andreu, 08030 ', 'Barcelona', 'España', '673489430', 'img1.jpg', 'imgPrincipal.jpg', '41.43503535,2.195338920904257', 'https://autotalleresbcn.com/', 4, 'Toni', '673489430', 1, 0, '8b98beda4551757710f917b29f20c44b', '3107611a91e07ff359333174ec8e54c4', '2024-05-30'),
(29, 'Talleres jorsan', '$2y$10$OohwSAeWIcXy/o.Z/IhSaOY0cXPiyNAbPTpMbItWVEF76vnYBInSS', 'Jorsan@verifyreviews.es', 'C/ de Sicília, 172, Eixample, 08013 ', 'Barcelona', 'España', '932240224', 'img1.jpg,img2.jpg', 'imgPrincipal.jpg', '41.39611647777778,2.1809374333333333', 'https://talleresjorsan.com/', 4, 'Jorsan', '932240224', 1, 0, 'af22725bbb654692797d24835e1954ed', '4d3c3a65b0e6b17740a35ac0a275a9f4', '2024-05-30'),
(30, 'Talleres Gabarda', '$2y$10$ncqojZkVK3ULMxEb6FWMBuSqsHixaJfTq6ZFtLSjmgDgvVIaeUABi', 'Gabarda@verifyreviews.es', 'Av. de Suècia, 1, El Pla del Real, 46010 València, Valencia', 'Valencia', 'España', '963240224', 'img1.jpg,img2.jpg', 'imgPrincipal.jpg', '39.4762826,-0.3584825', 'http://www.gabarda.es/', 4, 'Gabrada', '963240224', 1, 0, '266e567431682b008fb7161ebf1f3a7d', 'a63f569f00bad2cc66abff99dcebdb9d', '2024-05-30'),
(31, 'Moda joven K2', '$2y$10$EfRWsIcETkAlB0nkLoKnu.IDbX5d2FHaf1wJbu9NysW7IgnPF2f1C', 'k2@verifyreviews.es', 'C. Numancia, 53, 42001', 'Soria', 'España', '975240224', 'img1.jpg,img2.jpg', 'imgPrincipal.jpg', '41.7662185,-2.4681867', 'https://www.tutiendavecina.com/', 7, 'Julia', '975240224', 1, 0, 'fd0f20ca4c1440453aaaffa61d38f18f', '3c288b45fd102b9d1a21cd12073f4e7f', '2024-05-30'),
(32, 'Moda de hombre DISHOM', '$2y$10$m94EKJRO7l4OwtdfzONi0OMAi8KXqh6fh1cUZSqi.25KCCwqkCEAm', 'Dishom@verifyreviews.es', 'C. el Collado, 22, 42002', 'Soria', 'España', '975240224', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.7641127,-2.4661067', 'https://dishom.es/', 7, 'Raul', '975240224', 1, 0, 'c81e070b2dbbfd328958c9afcf0a7a00', '6f58bb81608dab13dc5b75bfd6a68793', '2024-05-30'),
(33, 'Ayuso psicología, Psicólogo Soria', '$2y$10$L7KUchePib3v/UrDZgGAbeqgYT01vby54Znmkz4hQ8YgLValK.nJa', 'ayuso@verifyreviews.es', 'C. Navas de Tolosa, 16, 42001', 'Soria', 'España', '630240224', 'img1.jpg', 'imgPrincipal.jpg', '41.7662916,-2.4739548', 'https://ayusopsicologia.com/', 6, 'Ayuso', '675240224', 1, 0, '382eb7562f8679fd4ebcd6030b245164', '5712dae6338e9be57c55475d545482b1', '2024-05-30'),
(34, 'Andrea M. Antolín Psicoterapia', '$2y$10$fQhKPtZBveARRwLtdcSuPePZm/pPJrA9p8d6c5eiv8/Xgx8iv674a', 'andrea@verifyreviews.es', 'C. Calixto Pereda, 14,  42002 ', 'Soria', 'España', '619240224', 'img1.jpg,img2.jpg', 'imgPrincipal.jpg', '41.7660841,-2.464463', 'https://www.linkedin.com/in/andreamantolin-psicoterapia/?originalSubdomain=es', 6, 'Andrea', '619240224', 1, 0, '9f02388ec5f9ce45516cfef287a4a5b0', '22909135476d605b794f4d53ca262967', '2024-05-30'),
(35, 'Ana León', '$2y$10$Ee33m/jOJE9yFBALKIad0OAPdGJxMuRsdWssMbAgJszMBQEOfC3pK', 'ana@verifyreviews.es', 'C. de Carretas, 14, Centro, 28012 ', 'Madrid', 'España', '633240224', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '40.4148126,-3.703678', 'https://www.enmadridpsicologos.com/', 6, 'Ana', '633240224', 1, 0, 'cb21f59828a455f32576d5aeb8370835', '7acde7496e8f08138ddef4cffe1c8ec9', '2024-05-31'),
(37, 'María García Gomez', '$2y$10$Ih5/.zEJ9FfrzNBzdu/Zp.rTAjJB/aaV.RV/ntXR2JRhVVXxSueD6', 'MariaGarcia@verifyreviews.es', 'Travessera de Gràcia, 66,08006 ', 'Barcelona', 'España', '630240224', 'img1.jpg,img2.jpg', 'imgPrincipal.jpg', '41.3964981,2.1506415', 'https://mariagarciagomez.com/', 6, 'Maria', '630240224', 1, 0, 'c15ba084d2b887deceea0a940695a798', 'aa0a4c08fc0b1a57d177ee59215c7e8a', '2024-05-31'),
(38, 'Druni', '$2y$10$qEKKZxjZnlxUMgj0VmEPXudDjuFYrOOl6EcRTNA5SQm4Ywmt/asv6', 'druni@verifyreviews.es', 'Gran Vía, 61, Centro, 28013', 'Madrid ', 'España', '697 43 48 23', 'img1.jpg,img2.jpg', 'imgPrincipal.jpg', '40.4223134,-3.7095103', 'https://www.druni.es/?utm_campaign=localistico&utm_medium=342&utm_source=google_gmb', 5, 'Druni', '697 43 48 34', 1, 0, 'e83d5f34f77912234ed3a1b037a1142b', '6bfeb682c468e0301fef8e9fddcc84a5', '2024-05-31'),
(39, 'Perfumería Júlia', '$2y$10$Nxw9OfaUKgJi89XfyoG4qO1bIxAY1lGcVbIbEo4AE.d7nK/erbuJO', 'julia@verifyreviews.es', 'C. del Carmen, 2, Centro, 28013', 'Madrid', 'España', '915 21 90 32', 'img1.jpg,img2.jpg', 'imgPrincipal.jpg', '40.4173293,-3.7035023', 'https://www.perfumeriajulia.es/', 5, 'Julia', '915 21 90 23', 1, 0, '838522787072af21dac4ab5a73e381cd', '037de561116cb21322732d6f5a15e7ec', '2024-05-31'),
(40, 'Arenal Perfumerías', '$2y$10$agXulR2Onm25oIT1RUL85uooLHJKf6.917/1xNxmSf.4YEGv8LEFS', 'arenal@verifyreviews.es', 'C. el Collado, 4, 42002', 'Soria', 'España', '975 03 30 23', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '41.7641127,-2.4661067', 'https://www.arenal.com/', 5, 'Andres', '975 03 30 23', 1, 0, '98140a5a2647936e7c934eaa197226a2', '75bf970b5c81169b5dba37e1410792af', '2024-05-31'),
(41, 'Nude Project', '$2y$10$wNQMerTDd0ImuK3eCV5Qf.8Q1s1BGTfbsSkA/05iuOlv3nHwxcdji', 'Nude@verifyreviews.es', ' Calle de Fuencarral, 47, Centro, 28004 ', 'Madrid', 'España', '975 23 20 12', 'img1.jpg,img2.jpg,img3.jpg', 'imgPrincipal.jpg', '40.4236306,-3.7007369', 'https://nude-project.com/', 7, 'Nude', '975 23 20 12', 1, 0, '2e1d030149e2b0dd82ab819699346714', '7de2163f9044ffa8cb03a3e3600052f5', '2024-05-31');

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
(1, 14, 2, '2024-05-11 00:00:00', '2024-05-08 00:00:00', 3, 'ASEFDDDDDDDDDDDDDDDDASEFDDASEFDDDDDDDDDDDDDDDDDDDD', 'ASEFDDDDDDDDDDDDDDDDASEFDDASEFDDDDDDDDDDDDDDDDDDDDASEFDDDDDDDDDDDDDDDDASEFDDASEFDDDDDDDDDDDDDDDDDDDDASEFDDDDDDDDDDDDDDDDASEFDDASEFDDDDDDDDDDDDDDDDDDDDASEFDDDDDDDDDDDDDDDDASEFDDASEFDDDDDDDDDDDDDDDDDDDD', 'n_14/resenas/r_1/img1.jpg,n_14/resenas/r_1/img2.jpg,n_14/resenas/r_1/img3.png,n_14/resenas/r_1/img4.png', 216, 1, 'jezulito'),
(2, 14, 2, '2024-05-12 00:00:00', '2024-05-08 00:00:00', 2, 'aafasuhola hola gholaafasuhola hola gholaafasuhola hola ghol', 'aafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola gholaafasuhola hola ghol', 'n_14/resenas/r_2/img1.png,n_14/resenas/r_2/img2.png,n_14/resenas/r_2/img3.png,n_14/resenas/r_2/img4.png,n_14/resenas/r_2/img5.png', 217, 1, 'jezulito'),
(12, 14, 4, '2024-05-12 00:00:00', '2024-05-03 00:00:00', 3, 'oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', 'oooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', 'n_14/resenas/r_3/img1.png', 219, 1, 'juanito'),
(13, 14, 5, '2024-05-12 00:00:00', '2024-05-01 00:00:00', 5, 'martinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartin', 'martinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartinmartin', 'n_14/resenas/r_13/img1.png,n_14/resenas/r_13/img2.png', 220, 1, 'martin'),
(14, 23, 8, '2024-05-31 00:00:00', '2024-05-29 00:00:00', 3, ' \"Experiencia inolvidable ¡Mi peluquería de confianza!\"', 'El personal es excepcionalmente amable y profesional. Siempre están dispuestos a escuchar mis ideas y sugerencias, y me dan consejos expertos sobre cómo mejorar mi estilo. Además, su atención al detalle es impecable; cada corte y peinado está cuidadosamente ejecutado, dejándome siempre sintiéndome renovado y seguro.', 'n_23/resenas/r_14/img1.jpg', 228, 1, 'Olga'),
(16, 15, 10, '2024-05-31 00:00:00', '2024-05-28 00:00:00', 5, 'Nos encontramos una joya gastronómica: La gastro Tasquita!', 'Tasquita ofrece una experiencia culinaria excepcional. Los sabores auténticos y la atención al detalle hacen de cada visita un verdadero placer. ¡Altamente recomendado! Volveremos!', 'n_15/resenas/r_15/img1.jpg', 229, 1, 'Gloria'),
(17, 19, 11, '2024-05-31 00:00:00', '2024-05-16 00:00:00', 3, 'El Kiosco: Una Experiencia Gastronómica que Deleita los Sentidos', 'El Kiosco es una auténtica joya gastronómica que supera todas las expectativas. Desde el momento en que entras, te recibe un ambiente cálido y acogedor que te hace sentir como en casa. El menú es una maravilla, con una variedad de platos que destacan por su frescura y sabor inigualable.', 'n_19/resenas/r_17/img1.jpg', 230, 1, 'Raul'),
(18, 24, 12, '2024-05-31 00:00:00', '2024-05-21 00:00:00', 3, 'Noelia Alcalde: Una Peluquería que Transforma Tu Estilo con Excelencia', 'Visitar la peluquería Noelia Alcalde es siempre una experiencia maravillosa. Desde que entras, te envuelve un ambiente moderno y acogedor, donde te reciben con una sonrisa y una atención personalizada. El equipo de profesionales es increíblemente talentoso y siempre está al tanto de las últimas tendencias.', 'n_24/resenas/r_18/img1.jpg', 231, 1, 'Andres'),
(19, 21, 13, '2024-05-31 00:00:00', '2024-05-31 00:00:00', 5, 'Por Los Pelos: Transformaciones Capilares con Estilo y Profesionalismo', 'Por Los Pelos es una peluquería que realmente entiende el arte del estilismo. Desde que entras, te sientes bienvenido en un ambiente vibrante y profesional. El equipo de estilistas es excepcional, siempre al tanto de las últimas tendencias y técnicas innovadoras.', 'n_21/resenas/r_19/img1.jpg', 232, 1, 'Carla'),
(20, 20, 14, '2024-05-31 00:00:00', '2024-05-29 00:00:00', 3, 'Estudio 0: Servicio Decente pero con Margen de Mejora', 'Estudio 0 ofrece un servicio aceptable, aunque hay aspectos que podrían mejorar. El ambiente es limpio y moderno, pero la atención al cliente no siempre es consistente. En mi visita, el corte de cabello fue satisfactorio, aunque no del todo acorde a mis expectativas.', 'n_20/resenas/r_20/img1.jpg', 233, 1, 'Carol'),
(21, 25, 15, '2024-05-31 00:00:00', '2024-05-29 00:00:00', 5, 'Enjoy Cafe: La Cafetería Perfecta para Disfrutar de Momentos Especiales', 'Enjoy Cafe es un verdadero tesoro para los amantes del buen café y un ambiente acogedor. Desde el momento en que entras, te sientes bienvenido por el cálido aroma del café recién hecho y el personal amable que siempre está dispuesto a hacer tu visita agradable.', 'n_25/resenas/r_21/img1.jpg', 234, 1, 'Marco'),
(22, 26, 16, '2024-05-31 00:00:00', '2024-05-09 00:00:00', 4, 'Tauro: Una Cafetería Confiable para Disfrutar de un Buen Café', 'El ambiente es tranquilo y agradable, ideal para leer un libro, trabajar en tu portátil o simplemente relajarte. Aunque podría haber más variedad en el menú, lo que ofrecen está bien hecho y es muy satisfactorio.', 'n_26/resenas/r_22/img1.jpg', 235, 1, 'Maria'),
(23, 27, 17, '2024-05-31 00:00:00', '2024-05-13 00:00:00', 2, 'Cafetería Art: Un Lugar Agradable con Servicio Correcto', 'El café es bueno, aunque no excepcional. Tienen una variedad razonable de bebidas y algunos bocadillos y pasteles que están bien para acompañar. Sin embargo, no hay nada que realmente destaque o sorprenda en el menú.', 'n_27/resenas/r_23/img1.jpg', 236, 1, 'Nacho'),
(24, 28, 18, '2024-05-31 00:00:00', '2024-05-17 00:00:00', 4, 'Auto Talleres Barcelona: Profesionalismo y Calidad en Cada Reparación', 'Cada vez que he llevado mi vehículo aquí, he quedado impresionado por la atención meticulosa que recibí y la calidad del trabajo realizado. Ya sea una reparación importante o un mantenimiento rutinario, siempre entregan resultados impecables y a un precio justo.', 'n_28/resenas/r_24/img1.jpg', 237, 1, 'Manolo'),
(25, 29, 19, '2024-05-31 00:00:00', '2024-05-09 00:00:00', 1, 'Talleres Jordan: Desafortunada Experiencia con Problemas Mecánicos', 'La calidad del trabajo dejó mucho que desear. No solo no se resolvió el problema original, sino que también surgieron nuevos fallos que antes no estaban presentes. Parecía que el personal carecía de la experiencia necesaria para abordar adecuadamente las reparaciones del motor.', 'n_29/resenas/r_25/img1.jpg', 238, 1, 'Gemma'),
(26, 30, 20, '2024-05-31 00:00:00', '2024-05-16 00:00:00', 5, 'Excelencia en Servicio Automotriz y Confianza Inigualable', 'Mi experiencia en Taller Gabarda ha sido excepcional en todos los aspectos. Desde el primer contacto hasta la entrega final, su enfoque en la calidad y la satisfacción del cliente es evidente en cada interacción.', 'n_30/resenas/r_26/img1.jpg', 239, 1, 'Mario'),
(27, 38, 21, '2024-05-31 00:00:00', '2024-05-15 00:00:00', 2, 'Una Experiencia Promedio en el Mundo de las Fragancias', 'Mi experiencia en Druni ha sido bastante regular en general. Si bien la tienda ofrece una amplia selección de fragancias y productos de belleza, no puedo decir que haya sido una experiencia excepcional.', 'n_38/resenas/r_27/img1.jpg', 240, 1, 'Natalia'),
(28, 39, 22, '2024-05-31 00:00:00', '2024-05-16 00:00:00', 4, 'Julia Perfumería: Donde los Sueños se Convierten en Fragancias', 'La selección de fragancias en Julia Perfumería es simplemente espectacular. Desde las últimas novedades hasta los clásicos atemporales, hay algo para todos los gustos y ocasiones. Además, la calidad de los productos es impecable, lo que garantiza una experiencia sensorial única en cada uso.', '', 241, 1, 'Alejandra'),
(29, 40, 23, '2024-05-31 00:00:00', '2024-05-29 00:00:00', 5, 'Arenal Perfumería: Donde la Elegancia y la Calidad Se Encuentran', 'Arenal Perfumería ha sido mi destino favorito para todas mis necesidades de fragancias y productos de belleza durante años, y por una buena razón. Desde el momento en que entras, te envuelve un aura de lujo y sofisticación, con estantes llenos de las últimas fragancias y productos de cuidado personal de las mejores marcas del mundo.', 'n_40/resenas/r_29/img1.jpg', 242, 1, 'Mariela'),
(30, 33, 24, '2024-05-31 00:00:00', '2024-05-16 00:00:00', 4, 'Es un gran apoyo Profesional en Momentos de Necesidad', 'Mi experiencia en Ausó Consulta ha sido satisfactoria en términos generales. Si bien no destacaría por encima de otros servicios de psicología, puedo decir que ofrecen un nivel adecuado de apoyo profesional en momentos de necesidad.', '', 243, 1, 'Usuario 12'),
(31, 35, 25, '2024-05-31 00:00:00', '2024-04-23 00:00:00', 2, 'onsulta de Psicología Ana: Servicio Estándar en un Entorno Cálido', 'Mi experiencia en la Consulta de Psicología Ana ha sido bastante estándar en comparación con otras consultas. El ambiente es acogedor y el equipo muestra un nivel básico de profesionalismo, pero no destaca en particular.', '', 244, 1, 'leire'),
(32, 34, 26, '2024-05-31 00:00:00', '2024-05-27 00:00:00', 5, 'Consulta de Psicología Andrea: Transformando Vidas con Compasión y Profesionalismo', 'Mi experiencia en la Consulta de Psicología Andrea ha sido excepcional en todos los aspectos. Desde el primer contacto, me sentí acogido en un ambiente cálido y compasivo, donde el bienestar del paciente es la máxima prioridad.\r\n\r\nEl equipo de psicólogos en la Consulta de Psicología Andrea muestra un nivel de profesionalismo y dedicación que es inspirador. Cada sesión se lleva a cabo con empatía y comprensión, y siempre me siento escuchado y apoyado en cada paso del camino.', '', 245, 1, 'Jesus'),
(33, 31, 27, '2024-05-31 00:00:00', '2024-05-27 00:00:00', 3, 'K2: Elevando el Estilo con Moda y Elegancia, volvere a comprar', 'El equipo de K2 es verdaderamente apasionado y experto en lo que hacen. Siempre están dispuestos a ofrecer asesoramiento personalizado y recomendaciones de moda que realzan tu estilo único. La atención al cliente es impecable, creando una experiencia de compra que es tanto gratificante como satisfactoria.', '', 246, 1, 'Pepe'),
(34, 32, 28, '2024-05-31 00:00:00', '2024-05-16 00:00:00', 3, 'Mi experiencia en Dishom ha sido realmente gratificante. ', 'El equipo de Dishom es excepcionalmente talentoso y siempre está al tanto de las últimas tendencias. Su pasión por la moda se refleja en su capacidad para ofrecer asesoramiento experto y recomendaciones de estilo que se adaptan perfectamente a cada cliente. La atención al cliente es impecable, creando una experiencia de compra personalizada y memorable.', 'n_32/resenas/r_34/img1.jpg', 247, 1, 'Mario'),
(35, 41, 29, '2024-05-31 00:00:00', '2024-05-07 00:00:00', 5, 'Nude Proyect: Donde la Moda Encuentra su Expresión Más Pura', 'El equipo de Nude Proyect es increíblemente talentoso y siempre está al tanto de las últimas tendencias en moda. Su compromiso con la excelencia se refleja en la calidad de las prendas que ofrecen, cada una seleccionada con cuidado y atención al detalle. Además, su enfoque en la sostenibilidad y la ética en la moda es verdaderamente inspirador.', 'n_41/resenas/r_35/img1.jpg', 248, 1, 'Marta'),
(36, 29, 31, '2024-06-01 00:00:00', '2024-05-29 00:00:00', 4, 'La Mejor Opción en Servicios Automotrices para un Mantenimiento Integral y Confiable', 'En Talleres Jorsan, nos dedicamos a proporcionar servicios automotrices de alta calidad con un enfoque en la satisfacción del cliente. Contamos con un equipo de técnicos altamente capacitados y equipados con tecnología de vanguardia para asegurar que tu vehículo reciba el mejor cuidado posible. ', 'n_29/resenas/r_36/img1.jpg', 250, 1, 'Manolo'),
(37, 29, 32, '2024-06-01 00:00:00', '2024-05-29 00:00:00', 4, 'La Mejor Opción en Servicios Automotrices para un Mantenimiento Integral y Confiable', 'En Talleres Jorsan, nos dedicamos a proporcionar servicios automotrices de alta calidad con un enfoque en la satisfacción del cliente. Contamos con un equipo de técnicos altamente capacitados y equipados con tecnología de vanguardia para asegurar que tu vehículo reciba el mejor cuidado posible. ', 'n_29/resenas/r_37/img1.jpg', 250, 1, 'Manolo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_no_registrado`
--

CREATE TABLE `usuario_no_registrado` (
  `cod_usuario` int(11) NOT NULL,
  `nickname` varchar(70) NOT NULL,
  `foto_perfil` varchar(30) NOT NULL DEFAULT 'default_user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `usuario_no_registrado`
--

INSERT INTO `usuario_no_registrado` (`cod_usuario`, `nickname`, `foto_perfil`) VALUES
(4, 'juanito', 'default_user.png'),
(8, 'Olga', 'default_user.png'),
(9, 'Olga', 'default_user.png'),
(10, 'Gloria', 'default_user.png'),
(11, 'Raul', 'default_user.png'),
(12, 'Andres', 'default_user.png'),
(13, 'Carla', 'default_user.png'),
(14, 'Carol', 'default_user.png'),
(15, 'Marco', 'default_user.png'),
(16, 'Maria', 'default_user.png'),
(17, 'Nacho', 'default_user.png'),
(18, 'Manolo', 'default_user.png'),
(19, 'Gemma', 'default_user.png'),
(20, 'Mario', 'default_user.png'),
(21, 'Natalia', 'default_user.png'),
(22, 'Alejandra', 'default_user.png'),
(23, 'Mariela', 'default_user.png'),
(24, 'Usuario 12', 'default_user.png'),
(25, 'leire', 'default_user.png'),
(26, 'Jesus', 'default_user.png'),
(27, 'Pepe', 'default_user.png'),
(28, 'Mario', 'default_user.png'),
(29, 'Marta', 'default_user.png'),
(31, 'Manolo', 'default_user.png'),
(32, 'Manolo', 'default_user.png');

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
(2, 'jesus', 'gomollon andres', 'jezulito', 'jezulito.png', '$2y$10$v9jM1/AavIjaQc16DeVPvuOoChI3KwdAcAmkciYGsGMGhZigkmvYC', 'soria', 'españa', '41.60125045,-2.721938035449954', '1996-10-20', 'jesus.g.9696@gmail.com', 672416195, 1, 0, '185678b6209baa07527154307e8dc2fe', '93f48855e243ab1d4959effe6536b892', '2024-04-01'),
(3, 'juan pedro', ' pedrolas de diego', 'pedro', 'pedro.png', '$2y$10$YSz1TBCuQP/XappNvq696Ond42GlTxZmLilVhP2JbNrCLO3vEZEJG', 'soria', 'españa', '41.60125045,-2.721938035449954', '2000-06-20', 'pedro@gmail.com', 672418223, 1, 0, 'f28353a9d7662406eee25b574b9ad028', 'd94e3e538d18046d1b4cd02b420851fe', '2024-05-12'),
(5, 'martin', 'martin martin', 'martin', 'martin.png', '$2y$10$c3xDtc.dKg7spVrygTW/POqH11ODPZnOX5GOZ1CjTeFpjsRCh5i5a', 'soria', 'españa', '41.60125045,-2.721938035449954', '2024-05-03', 'martin@martin.com', 236383838, 1, 0, '6e064b764bbe6dfcbdef30a6a055539a', 'cc2ac4c8d550ec10f0aeaa3fdc71597f', '2024-05-12'),
(6, 'Santiago ', 'Viñas Villa', 'Santi', 'Santi.png', '$2y$10$6q51kEOwvUIlkB5EYFP1NuqNlV4MU5.JY0Ciyrt9tooTJrBNhjaMC', 'Soria', 'España', '41.60125045,-2.721938035449954', '1984-05-29', 'santi@verifyreviews.es', 675231234, 1, 0, '42bb2afc3fd69c2352403fa55c948422', 'a029cc61d64d808097a2fe9ae5e6e324', '2024-05-28'),
(7, 'Jose M.', 'Estepa Martinez', 'Chema', 'default_user.png', '$2y$10$KOAXJ1/h6FMNkixuK75d2OoxzVF9NDML2xGqTZAHznbGETO0shr.6', 'Soria', 'España', '41.60125045,-2.721938035449954', '1961-05-25', 'chema@verifyreviews.es', 675233434, 1, 0, 'ba28562b22d30974d7240d62c31da678', '3791c78e3c8c6cf513b94f071e3aeccc', '2024-05-28'),
(30, 'Mariano', 'Antón Pacheco', 'Marano', 'Marano.png', '$2y$10$6ZyXKJIU29g1i8JL9kP8senbIw3mdv66HqD0MrTj4LRR7IRlxFOxu', 'Soria', 'España', '41.60125045,-2.721938035449954', '1990-06-20', 'jesus@sdif.es', 672232143, 1, 0, 'b8a45dc4c1a0c9a1272c93057e80fb90', '295b8d7c2f730040459e1088ae7c146b', '2024-06-01');

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
-- Indices de la tabla `estadisticas_resena`
--
ALTER TABLE `estadisticas_resena`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cod_resena` (`cod_resena`),
  ADD KEY `cod_negocio` (`cod_negocio`),
  ADD KEY `categoria_negocio` (`categoria_negocio`);

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
-- Indices de la tabla `usuario_no_registrado`
--
ALTER TABLE `usuario_no_registrado`
  ADD PRIMARY KEY (`cod_usuario`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

--
-- AUTO_INCREMENT de la tabla `estadisticas_resena`
--
ALTER TABLE `estadisticas_resena`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `cod_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `resena`
--
ALTER TABLE `resena`
  MODIFY `cod_resena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `estadisticas_resena`
--
ALTER TABLE `estadisticas_resena`
  ADD CONSTRAINT `estadisticas_resena_ibfk_1` FOREIGN KEY (`cod_negocio`) REFERENCES `negocio` (`cod_negocio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `estadisticas_resena_ibfk_2` FOREIGN KEY (`categoria_negocio`) REFERENCES `categoria` (`cod_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD CONSTRAINT `cod_comercio-cod_categoria` FOREIGN KEY (`cod_categoria`) REFERENCES `categoria` (`cod_categoria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `resena`
--
ALTER TABLE `resena`
  ADD CONSTRAINT `resena_ibfk_1` FOREIGN KEY (`cod_negocio`) REFERENCES `negocio` (`cod_negocio`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
