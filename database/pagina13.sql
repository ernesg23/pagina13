-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2024 a las 15:58:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pagina13`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `accountrecovery`
--

CREATE TABLE `accountrecovery` (
  `idRecovery` int(255) NOT NULL,
  `token` int(255) NOT NULL,
  `developement_at` datetime NOT NULL,
  `Users_idUsers` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `idCategories` int(255) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`idCategories`, `name`) VALUES
(1, 'test'),
(2, ''),
(3, 'testeito'),
(4, 'testeazo'),
(5, 'teasdwadaw'),
(6, 'teasdsafaw'),
(7, 'testazp'),
(8, 'tastead'),
(9, 'Fix'),
(10, 'EstoError'),
(11, 'matoaErnesto'),
(12, 'promo'),
(13, 'promo'),
(14, 'adshinawoldmaw'),
(15, 'prueba'),
(16, 'testeo'),
(17, 'violencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `Posts_idPosts` int(255) NOT NULL,
  `Users_idUsers` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `favorites`
--

INSERT INTO `favorites` (`Posts_idPosts`, `Users_idUsers`) VALUES
(1, 13),
(5, 13),
(15, 13),
(22, 13),
(24, 13),
(26, 13),
(27, 13),
(28, 13),
(29, 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts`
--

CREATE TABLE `posts` (
  `idPosts` int(255) NOT NULL,
  `title` varchar(45) NOT NULL,
  `subtitle` tinytext NOT NULL,
  `description` mediumtext NOT NULL,
  `portraitImg` mediumtext NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `Users_idUsers` int(255) NOT NULL,
  `isArchived` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts`
--

INSERT INTO `posts` (`idPosts`, `title`, `subtitle`, `description`, `portraitImg`, `created_at`, `updated_at`, `deleted_at`, `Users_idUsers`, `isArchived`) VALUES
(1, 'Test', 'Test', 'Test', '../../views/img/uploads/test.png', '2024-09-29 00:00:00', NULL, NULL, 13, 0),
(2, 'test1', 'test1', 'test1', '../../views/img/uploads/cinturon-de-orion-constelacion.png', '2024-09-29 00:00:00', NULL, NULL, 13, 0),
(3, 'test1', 'test1', 'test1', '../../views/img/uploads/cinturon-de-orion-constelacion.png', '2024-09-29 00:00:00', NULL, NULL, 13, 0),
(4, 'Test2', 'Test2', 'Testep', '../../views/img/uploads/test.png', '2024-09-29 00:00:00', NULL, NULL, 13, 0),
(5, 'Testeootravez', 'trmenedotesteobro', 'ASJNOIDWAHDIUOWASJNDWASIHJNDMAWIODNAWIODHNAWOIDASHNDIOAWNIODSANDIOWAJMndIOSADIOWADIAWOSHNDIOSANHDIOWANDAWIOHDNNSAIODHNWAIODNJHSAIODJNIAOWNHDASIOUJHNSAHJDIOASJNDIOASNMDIOSAJDNMSAIODJMNSAIODJMSIAMNDIOSANDMSAIODNSAOIDNSAIODSMADIOSAMDIOSAMDIOSANMDSIOANDSAIONDISAONDIOSANDIOSADNASIODNSAION', '../../views/img/uploads/test.png', '2024-09-29 00:00:00', NULL, NULL, 13, 0),
(6, 'Testeo2', 'Testeo testeo', 'Testeo', '../../views/img/uploads/Screenshot 2023-12-11 234603.png', '2024-09-29 00:00:00', NULL, NULL, 13, 0),
(7, 'Test', 'Test', 'Testep', '../../views/img/uploads/Screenshot 2023-12-11 234603.png', '2024-09-29 00:00:00', NULL, NULL, 13, 0),
(8, 'tgest', 'setfasdfaw', 'teasdwasdswadaw', '../../views/img/uploads/test.png', '2024-09-29 00:00:00', NULL, NULL, 13, 0),
(9, 'Test', 'Test', 'Test', '../../views/img/uploads/Screenshot 2023-12-24 181158.png', '2024-10-02 00:00:00', NULL, NULL, 13, 0),
(10, 'Test', 'Test', 'Test', '../../views/img/uploads/Screenshot 2023-12-24 181158.png', '2024-10-02 00:00:00', NULL, NULL, 13, 0),
(11, 'Testeado', 'testadi', 'tastadr', '../../views/img/uploads/Screenshot 2023-12-24 181158.png', '2024-10-02 00:00:00', NULL, NULL, 13, 0),
(12, 'Testeo desde el fix al error de inicializacio', 'Testeo desde el fix al error de inicializacion', 'Testeo desde el fix al error de inicializacion', '../../views/img/uploads/Screenshot 2024-02-02 185711.png', '2024-10-02 00:00:00', NULL, NULL, 13, 0),
(13, 'Test', 'Test', 'Test', '../../views/img/uploads/Screenshot 2024-02-02 185711.png', '2024-10-02 00:00:00', NULL, NULL, 13, 0),
(14, 'Test', 'Test', 'TEst', '../../views/img/uploads/Screenshot 2024-02-02 185711.png', '2024-10-02 00:00:00', NULL, NULL, 13, 0),
(15, 'Si es esto mato a ernesto', 'Test', 'Test', '../../views/img/uploads/Screenshot 2024-02-02 185711.png', '2024-10-02 00:00:00', NULL, NULL, 13, 0),
(16, 'sape', 'ingreos a la cgt', 'promocion para la cgt', '../../views/img/uploads/download.jfif', '2024-10-03 00:00:00', NULL, NULL, 13, 0),
(17, 'sape', 'ingreos a la cgt', 'promocion para la cgt', '../../views/img/uploads/download.jfif', '2024-10-03 00:00:00', NULL, NULL, 13, 0),
(18, 'INGRESO LA CGT', 'PROMO PARA LA CGT EN ESTUDIANTES PERONISTAS', 'larreta requiere de sangre joven', '../../views/img/uploads/download.jfif', '2024-10-03 00:00:00', NULL, NULL, 13, 0),
(19, 'INGRESO LA CGT', 'PROMO PARA LA CGT EN ESTUDIANTES PERONISTAS', 'larreta requiere de sangre joven', '../../views/img/uploads/download.jfif', '2024-10-03 00:00:00', NULL, NULL, 13, 0),
(20, 'tesadasmdoaw', 'mdsaiodmwao', 'sadoiwamdopsa', '../../views/img/uploads/Untitled-2024-06-04-1415.png', '2024-10-03 00:00:00', NULL, NULL, 13, 0),
(21, 'tesadasmdoaw', 'mdsaiodmwao', 'sadoiwamdopsa', '../../views/img/uploads/Untitled-2024-06-04-1415.png', '2024-10-03 00:00:00', NULL, NULL, 13, 0),
(22, 'wqudhajoñaiednwalkdw', 'dijaslmdnaiomd awjdowandmoawnoas', 'asjdoawñdmwaoñd', '../../views/img/uploads/ej33.png', '2024-10-03 00:00:00', NULL, NULL, 13, 0),
(23, 'wqudhajoñaiednwalkdw', 'dijaslmdnaiomd awjdowandmoawnoas', 'asjdoawñdmwaoñd', '../../views/img/uploads/ej33.png', '2024-10-03 00:00:00', NULL, NULL, 13, 0),
(24, 'matoaErnesto', 'hdilidjhsilfhselidhwaid', 'jawidldjwalidjawd', '../../views/img/uploads/nextstep.png', '2024-10-03 00:00:00', NULL, NULL, 13, 0),
(25, 'matoaErnesto', 'hdilidjhsilfhselidhwaid', 'jawidldjwalidjawd', '../../views/img/uploads/nextstep.png', '2024-10-03 00:00:00', NULL, NULL, 13, 0),
(26, 'test', 'test', 'test', '../../views/img/uploads/kamikaze.png', '2024-10-04 21:40:51', NULL, NULL, 13, 0),
(27, 'test', 'test', 'test', '../../views/img/uploads/kamikaze.png', '2024-10-04 21:41:49', NULL, NULL, 14, 0),
(28, 'test', 'test', 'test', '../../views/img/uploads/Screenshot 2024-05-28 132815.png', '2024-10-04 23:34:29', NULL, NULL, 13, 0),
(29, 'test', 'test', 'test', '../../views/img/uploads/cinturon-de-orion-constelacion.png', '2024-10-14 16:03:09', NULL, NULL, 13, 0),
(30, 'sajdioawm', 'sadjioawmd', 'sadjkawiodm,sa', '../../views/img/uploads/NASA-logo-9411797223-seeklogo.com.png', '2024-10-15 02:11:11', NULL, NULL, 13, 0),
(31, 'test', 'test', 'test', '../../views/img/uploads/NASA-logo-9411797223-seeklogo.com.png', '2024-10-15 02:37:56', NULL, NULL, 13, 0),
(32, 'test', 'test', 'test', '../../views/img/uploads/NASA-logo-9411797223-seeklogo.com.png', '2024-10-15 02:38:40', NULL, NULL, 13, 0),
(33, 'test', 'test', 'test', '../../views/img/uploads/NASA-logo-9411797223-seeklogo.com.png', '2024-10-15 02:39:54', NULL, NULL, 13, 1),
(34, 'TRABAJADORES DE NEXSHOP SE SUICIDAM', 'nexshop es acusado de sobre explotar a sus trabajadores y provocar sus suicidios', 'En un impactante giro de los acontecimientos, NexShop, una reconocida empresa de comercio electrónico, se enfrenta a una creciente ola de denuncias por condiciones laborales inhumanas. Según informes de empleados actuales y anteriores, la presión extrema y la falta de apoyo emocional han llevado a varios trabajadores al borde de la desesperación, culminando en trágicos suicidios.\r\n\r\nLa situación se ha vuelto insostenible en los últimos meses. Empleados han descrito un ambiente de trabajo tóxico, caracterizado por largas jornadas sin descanso, metas inalcanzables y una cultura de miedo que penaliza cualquier intento de expresar malestar. \"Siento que somos piezas desechables\", comentó un empleado que pidió permanecer en el anonimato. \"La empresa solo se preocupa por los números, no por nosotros\".\r\n\r\nLas redes sociales se han inundado de testimonios desgarradores de trabajadores que luchan con ansiedad y depresión debido a la carga laboral. Organizaciones de derechos laborales han comenzado a investigar las prácticas de NexShop y exigen cambios inmediatos para proteger a los empleados.\r\n\r\nEn respuesta a las crecientes críticas, la dirección de NexShop ha emitido un comunicado, alegando que están comprometidos con el bienestar de sus empleados y que están implementando \"nuevas políticas de salud mental\". Sin embargo, muchos trabajadores consideran estas medidas insuficientes y meramente un intento de desviar la atención de la crisis.\r\n\r\nMientras la comunidad clama por justicia y mayor transparencia, el futuro de NexShop pende de un hilo. Activistas han convocado protestas para exigir la renuncia de los directivos responsables y la implementación de estándares laborales más humanos. La historia de NexShop es un sombrío recordatorio de los peligros de la explotación laboral en el mundo corporativo actual.', '../../views/img/uploads/@pai.png', '2024-10-22 15:55:32', NULL, NULL, 18, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posts_has_categories`
--

CREATE TABLE `posts_has_categories` (
  `Posts_idPosts` int(255) NOT NULL,
  `Categories_idCategories` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `posts_has_categories`
--

INSERT INTO `posts_has_categories` (`Posts_idPosts`, `Categories_idCategories`) VALUES
(1, 1),
(2, 1),
(4, 3),
(5, 4),
(6, 5),
(8, 6),
(11, 8),
(15, 11),
(22, 14),
(24, 11),
(26, 1),
(27, 1),
(28, 15),
(29, 1),
(30, 16),
(31, 1),
(32, 1),
(33, 1),
(34, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `idUsers` int(255) NOT NULL,
  `name` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profileImg` blob DEFAULT NULL,
  `description` tinytext DEFAULT NULL,
  `create_at` date NOT NULL,
  `deleted_at` date DEFAULT NULL,
  `blackTheme` binary(2) NOT NULL DEFAULT '0\0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`idUsers`, `name`, `email`, `password`, `profileImg`, `description`, `create_at`, `deleted_at`, `blackTheme`) VALUES
(6, 'test test', 'test@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-09-27', NULL, 0x3000),
(7, 'Thiago Martinez', 'thiagomartinez960@gmail.com', 'ea58ea8047f921fc923957b4bc4e48918b0e7f302f852216997a3a9ac01c5b25a1ed2b514860665bd5414ed830503f6ba9595a62b77544b6556b0ac53a7af0e1', NULL, NULL, '2024-09-27', NULL, 0x3000),
(8, 'Thiago Martinez', 'thiagomartinez961@gmail.com', 'd0d28103551c49ec855ec32c132d6d19a3c7a33b9895fd9b243f5f4738afcfd1b2a91d23a50bb9d7974788d0f8eebdf5fff31f032085b3759e9b0d17a3259237', NULL, NULL, '2024-09-27', NULL, 0x3000),
(9, 'Test Test', 'Test@test.com', '4db159b682cf2c5130805ccc5a4f4bd336427522ad398978ae25d071c2dc191606e676dff4d100c147fcff66a0df4f158d357c0a417ac99d1125c9dc67b69cd5', NULL, NULL, '2024-09-28', NULL, 0x3000),
(10, 'Tst Tst', 'Tst@tst.com', '292d118c70695191f4872fb32b6da252c36dfe43b680722f4c95be64c32b73f67a95bb533a00b68c44f55789cf93a8365e14f9e81c43794bee3ed9c8926a900a', NULL, NULL, '2024-09-28', NULL, 0x3000),
(11, 'Thiago Martinez', 'thiagomartinez963@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-09-28', NULL, 0x3000),
(12, 'Thiago Martinez', 'thiagomartinez967@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-09-28', NULL, 0x3000),
(13, 'Thiago Martinez', 'thiagomartinez968@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-09-28', NULL, 0x3000),
(14, 'Juanito Alcachofa', 'Ja@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-10-04', NULL, 0x3000),
(15, 'Thiago Martinez', 'thiagomartinez969@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-10-04', NULL, 0x3000),
(16, 'Thiago Martinez', 'thiagomartinez930@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-10-04', NULL, 0x3000),
(17, 't t', 't@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-10-04', NULL, 0x3000),
(18, 'oal chavo', 'lol@gmail.com', '9387b8bf99bf5a35c0c20d838186f54f621acb743a4d2c8eb355b3d8d4d44168db013782a342e571e46be9f125a8d067cd187438a4483d1d8f3f62bdc9fe6444', NULL, NULL, '2024-10-22', NULL, 0x3000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accountrecovery`
--
ALTER TABLE `accountrecovery`
  ADD PRIMARY KEY (`idRecovery`,`Users_idUsers`),
  ADD KEY `fk_accountRecovery_Users1_idx` (`Users_idUsers`);

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategories`);

--
-- Indices de la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`Posts_idPosts`,`Users_idUsers`),
  ADD KEY `fk_Posts_has_Users_Users1_idx` (`Users_idUsers`),
  ADD KEY `fk_Posts_has_Users_Posts1_idx` (`Posts_idPosts`);

--
-- Indices de la tabla `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idPosts`,`Users_idUsers`),
  ADD KEY `fk_Posts_Users1_idx` (`Users_idUsers`);

--
-- Indices de la tabla `posts_has_categories`
--
ALTER TABLE `posts_has_categories`
  ADD PRIMARY KEY (`Posts_idPosts`,`Categories_idCategories`),
  ADD KEY `fk_Posts_has_Categories_Categories1_idx` (`Categories_idCategories`),
  ADD KEY `fk_Posts_has_Categories_Posts1_idx` (`Posts_idPosts`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `accountrecovery`
--
ALTER TABLE `accountrecovery`
  MODIFY `idRecovery` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategories` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `idPosts` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `accountrecovery`
--
ALTER TABLE `accountrecovery`
  ADD CONSTRAINT `fk_accountRecovery_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_Posts_has_Users_Posts1` FOREIGN KEY (`Posts_idPosts`) REFERENCES `posts` (`idPosts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Posts_has_Users_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_Posts_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `posts_has_categories`
--
ALTER TABLE `posts_has_categories`
  ADD CONSTRAINT `fk_Posts_has_Categories_Categories1` FOREIGN KEY (`Categories_idCategories`) REFERENCES `categories` (`idCategories`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Posts_has_Categories_Posts1` FOREIGN KEY (`Posts_idPosts`) REFERENCES `posts` (`idPosts`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
