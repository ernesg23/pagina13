-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-11-2024 a las 15:42:03
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

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

DROP DATABASE IF EXISTS pagina13;
CREATE DATABASE pagina13;
USE pagina13;

--
-- Estructura de tabla para la tabla `accountrecovery`
--

CREATE TABLE `accountrecovery` (
  `idRecovery` mediumint(9) NOT NULL,
  `resetEmail` text NOT NULL,
  `resetSelector` text NOT NULL,
  `token` longtext NOT NULL,
  `resetExprires` text NOT NULL
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
(1, 'Base de Datos'),
(2, 'Matemáticas'),
(3, 'Organización Computacional'),
(4, 'Lógica Computacional'),
(5, 'Lengua y Literatura'),
(6, 'Inglés Técnico'),
(7, 'Laboratorio de Algoritmos'),
(8, 'Proyecto Informático'),
(9, 'Sistemas Operativos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorites`
--

CREATE TABLE `favorites` (
  `Posts_idPosts` int(255) NOT NULL,
  `Users_idUsers` int(255) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(1, 'xdxvczxvcvz', 'cbccvzxfx', 'xvxxvczxcz<', '../../views/img/uploads/pngwing.com.png', '2024-11-25 15:28:32', NULL, NULL, 1, 0),
(2, 'fd', 'fafsssfa', 'gvbvb', '../../views/img/uploads/player.png', '2024-11-25 15:32:24', NULL, NULL, 1, 0),
(3, 'hgddfs', 'ggsgsdsgd', 'gdgdsgdgdsd', '../../views/img/uploads/descarga.jpg', '2024-11-25 15:34:23', NULL, NULL, 1, 0),
(4, 'yeyrery', 'yyey', 'reyerry', '../../views/img/uploads/ayew5.jpg', '2024-11-25 15:34:53', NULL, NULL, 1, 0),
(5, 'gsdggddgs', 'ddgdgsgsd', 'ggdsgdgd', '../../views/img/uploads/ayew2.png', '2024-11-25 15:35:10', NULL, NULL, 1, 0),
(6, 'gsgsdd', 'gdsdg', 'dgdgs', '../../views/img/uploads/ayew5.jpg', '2024-11-25 15:35:48', NULL, NULL, 1, 0),
(7, 'vbbvdgfgg', 'sddd', 'gfgdfgfgf', '../../views/img/uploads/ce8e99b1-d8c0-44ad-957d-259d38c15239.jfif', '2024-11-25 15:36:12', NULL, NULL, 1, 0),
(8, 'weef', 'fewe', 'fewef', '../../views/img/uploads/ayew.jpg', '2024-11-25 15:40:21', NULL, NULL, 1, 0);

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
(1, 2),
(2, 3),
(2, 4),
(2, 5),
(2, 6),
(2, 7),
(2, 8),
(3, 3),
(3, 5),
(4, 2),
(4, 8),
(7, 5),
(8, 5),
(8, 6);

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
(1, 'Ernesto Gallego', 'ernesmang23@gmail.com', 'ddc39c537b8ba1fb2759b9065050b03e0bbf5efc0de516b20b1e12fe4f3f8df99524c265180239b8f844c8ade780bf827835e4a8534c0db184b753077583523b', NULL, NULL, '2024-11-25', NULL, 0x3000),
(2, 'sif', 'ernestogallego2019@gmail.com', 'aab052952d49d24acd2be53b5c6fa1ba01cf5b75e66394ebd15a17f732658cf682dc734787495978d6e7685ce51f6b630897cdb47da95adb340c344f5d6512b1', NULL, NULL, '2024-11-11', NULL, 0x3000),
(3, 'mauro barraaza', 'lol@gmail.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', NULL, NULL, '2024-10-29', NULL, 0x3000),
(4, 'moni argento', 'hola@gmail.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', NULL, NULL, '2024-10-29', NULL, 0x3000),
(5, 'as das', 'prota@gmail.com', '9387b8bf99bf5a35c0c20d838186f54f621acb743a4d2c8eb355b3d8d4d44168db013782a342e571e46be9f125a8d067cd187438a4483d1d8f3f62bdc9fe6444', NULL, NULL, '2024-10-28', NULL, 0x3000),
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
(18, 'Pagina 13', 'pagina13oficial@gmail.com', 'caadfb23b8da956e47857f15f00bf4f86349b5852961ffb70e6e8b8fc73d241c73dd6f4c3bfccbe6ec4c50be927a1c9a423a805fe1d34d2bd97f2ca1c4eb216b', NULL, NULL, '2024-10-26', NULL, 0x3000);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `accountrecovery`
--
ALTER TABLE `accountrecovery`
  ADD PRIMARY KEY (`idRecovery`);

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
  MODIFY `idRecovery` mediumint(9) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategories` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `posts`
--
ALTER TABLE `posts`
  MODIFY `idPosts` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

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