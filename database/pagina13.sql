-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 08, 2025 at 08:54 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pagina13`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountrecovery`
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
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `idCategories` int(255) NOT NULL,
  `name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
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
(17, 'testa'),
(18, 'testaa'),
(19, 'tesa'),
(20, 'anda?'),
(21, 'tu'),
(22, 'noti'),
(23, 'JOKE'),
(24, 'asf'),
(25, 'musica'),
(26, 'Matematicas'),
(27, 'Otros'),
(28, 'Base de Datos'),
(29, 'Organizacion Computacional'),
(30, 'Logica Computacional'),
(31, 'Lengua y Literatura'),
(32, 'Ingles Tecnico'),
(33, 'Laboratorio de Algoritmos'),
(34, 'Proyecto Informatico'),
(35, 'Analisis de sistemas');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `Posts_idPosts` int(255) NOT NULL,
  `Users_idUsers` int(255) NOT NULL,
  `deleted_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`Posts_idPosts`, `Users_idUsers`, `deleted_at`) VALUES
(1, 13, NULL),
(5, 13, NULL),
(15, 13, NULL),
(22, 13, NULL),
(24, 13, NULL),
(26, 13, NULL),
(27, 13, NULL),
(28, 13, NULL),
(29, 13, NULL),
(30, 13, '2024-10-25'),
(31, 13, NULL),
(32, 13, '2024-10-25'),
(39, 21, NULL),
(40, 13, '2024-10-25'),
(41, 20, '2024-10-29'),
(45, 18, '2025-01-03'),
(46, 18, '2025-01-06'),
(51, 18, NULL),
(53, 18, NULL),
(58, 18, '2025-01-08');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
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
-- Dumping data for table `posts`
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
(34, 'testasdaw', 'testasdaw', 'testasdaw', '../../views/img/uploads/Screenshot 2024-05-19 202410.png', '2024-10-25 04:25:17', NULL, NULL, 13, 0),
(35, 'testasdaw', 'testasdaw', 'testasdaw', '../../views/img/uploads/Screenshot 2024-05-19 202624.png', '2024-10-25 04:26:08', NULL, NULL, 13, 0),
(36, 'tesd', 'tesasdaw', '131a', '../../views/img/uploads/Screenshot 2024-05-19 203023.png', '2024-10-25 04:32:02', NULL, NULL, 13, 0),
(37, 'porfavoranda', 'tesasdaw', '131a', '../../views/img/uploads/Screenshot 2024-09-14 201141.png', '2024-10-25 04:44:14', NULL, NULL, 13, 0),
(38, 'noanda', 'd', 'd', '../../views/img/uploads/Screenshot 2024-09-28 203338.png', '2024-10-25 04:45:03', NULL, NULL, 13, 1),
(39, 'anda', 'dwadaw', 'dwad', '../../views/img/uploads/Screenshot 2023-12-11 234603.png', '2024-10-25 04:50:29', NULL, NULL, 13, 0),
(40, 'andasporfin?', 'dwadawsadaw', 'dwadsadwa', '../../views/img/uploads/Screenshot 2024-06-15 185520.png', '2024-10-25 04:50:04', NULL, NULL, 13, 0),
(41, 'momo', 'Benicio despues de darse cuenta que ernesto nunca termino el modo claro y fue descartado por eso', 'hola', '../../views/img/uploads/Harry.jpg', '2024-10-29 14:26:48', NULL, NULL, 20, 0),
(43, 'WHY SO SERIOUS', 'WHY SO', 'SERIOUS', '../../views/img/uploads/descarga (4).jfif', '2024-10-29 16:17:30', NULL, NULL, 21, 0),
(44, 'dgj', 'gjj', 'HOLA', '../../views/img/uploads/Pong krell.jfif', '2024-11-11 12:48:07', NULL, NULL, 22, 0),
(45, 'dgj', 'gjj', 'HOLA', '../../views/img/uploads/Pong krell.jfif', '2024-11-11 12:48:08', NULL, NULL, 22, 0),
(46, 'Ahora te puedes marchar', 'SI NO SUPISTE AMAR', 'Si tú me hubieras dicho siempre la verdad\r\nSi hubieras respondido cuando te llamé\r\nSi hubieras amado cuando te amé\r\nSerías en mis sueños la mejor mujer\r\nSi no supiste amar\r\nAhora te puedes marchar\r\nSi tú supieras lo que yo sufrí por ti\r\nTeniendo que olvidarte sin saber porqué\r\nY ahora me llamas, me quieres ver\r\nMe juras que has cambiado y piensas en volver\r\nSi no supiste amar\r\nAhora te puedes marchar\r\nAléjate de mí\r\nNo hay nada más que hablar\r\nContigo yo perdí\r\nYa tengo con quien ganar\r\nYa sé que no hubo nadie que te diera lo que yo te di\r\nQue nadie te ha cuidado como te cuidé\r\nPor eso comprendo que estás aquí\r\nPero ha pasado el tiempo y yo también cambié\r\nSi no supiste amar\r\nAhora te puedes marchar\r\nAléjate de mí\r\nNo hay nada más que hablar\r\nContigo yo perdí\r\nYa tengo con quien ganar\r\nYa sé que no hubo nadie que te diera lo que yo te di\r\nQue nadie te ha cuidado como te cuidé\r\nPor eso comprendo que estás aquí\r\nPero ha pasado el tiempo y yo también cambié\r\nSi no supiste amar\r\nAhora te puedes marchar\r\nSi no supiste amar\r\nAhora te puedes marchar', '../../views/img/uploads/descarga (5).jfif', '2024-11-11 13:16:41', NULL, NULL, 22, 0),
(47, 'Test', 'test', 'test', '../../views/img/uploads/Screenshot 2023-12-24 181158.png', '2025-01-03 20:14:45', NULL, '2025-01-05 22:36:33', 18, 0),
(48, 'Test2', 'test2', 'test2', '../../views/img/uploads/Screenshot 2023-12-24 181158.png', '2025-01-03 20:19:38', NULL, '2025-01-05 22:36:32', 18, 0),
(49, 'A', 'A', 'A', '../../views/img/uploads/kamikaze.png', '2025-01-03 20:22:05', NULL, '2025-01-05 22:36:30', 18, 0),
(50, 'test', 'test', 'test', '../../views/img/uploads/kamikaze.png', '2025-01-03 21:22:11', NULL, '2025-01-05 22:36:30', 18, 0),
(51, 'tes', 'test', 'test', '../../views/img/uploads/Screenshot 2024-01-16 151045.png', '2025-01-03 21:22:25', NULL, '2025-01-05 22:36:28', 18, 0),
(52, 'test', 'teast', 'tastea', '../../views/img/uploads/kamikaze.png', '2025-01-03 21:22:49', NULL, '2025-01-05 22:36:27', 18, 0),
(53, 'teast', 'teastea', 'staetea', '../../views/img/uploads/kamikaze.png', '2025-01-03 21:23:00', NULL, '2025-01-05 22:36:27', 18, 0),
(54, 'twaeatsadaws', 'dawd', 'asdwadsadw', '../../views/img/uploads/Screenshot 2023-12-24 181158.png', '2025-01-03 21:23:13', NULL, '2025-01-03 22:04:53', 18, 0),
(55, 'satrwaedwas', 'sadaws', 'sdawdsadaw', '../../views/img/uploads/Screenshot 2023-12-24 181158.png', '2025-01-03 21:23:58', NULL, '2025-01-03 22:04:53', 18, 0),
(56, 'dwasdaw', 'sadwa', 'asdaw', '../../views/img/uploads/Screenshot 2024-02-02 185711.png', '2025-01-03 22:02:44', NULL, '2025-01-03 22:04:51', 18, 0),
(57, 'asdwadsa', 'dwa', 'sdawdsadwa', '../../views/img/uploads/Screenshot 2024-01-16 151045.png', '2025-01-03 22:03:03', NULL, '2025-01-03 22:04:46', 18, 0),
(58, 'De los ultimos test', 'quizas el penultimo', 'hay que testear ', '../../views/img/uploads/ado-plush-ado-plush-ado-plush-v0.jpg', '2025-01-08 20:45:22', NULL, NULL, 18, 0);

-- --------------------------------------------------------

--
-- Table structure for table `posts_has_categories`
--

CREATE TABLE `posts_has_categories` (
  `Posts_idPosts` int(255) NOT NULL,
  `Categories_idCategories` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts_has_categories`
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
(34, 17),
(35, 18),
(36, 19),
(37, 20),
(38, 20),
(39, 20),
(40, 20),
(41, 21),
(43, 23),
(44, 24),
(45, 24),
(46, 25),
(47, 2),
(48, 26),
(49, 27),
(50, 28),
(51, 29),
(52, 30),
(53, 31),
(54, 32),
(55, 33),
(56, 28),
(57, 27),
(58, 27);

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
  `blackTheme` binary(2) NOT NULL DEFAULT '0\0',
  `role` varchar(20) NOT NULL DEFAULT 'reader'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`idUsers`, `name`, `email`, `password`, `profileImg`, `description`, `create_at`, `deleted_at`, `blackTheme`, `role`) VALUES
(6, 'test test', 'test@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-09-27', NULL, 0x3000, 'reader'),
(7, 'Thiago Martinez', 'thiagomartinez960@gmail.com', 'ea58ea8047f921fc923957b4bc4e48918b0e7f302f852216997a3a9ac01c5b25a1ed2b514860665bd5414ed830503f6ba9595a62b77544b6556b0ac53a7af0e1', NULL, NULL, '2024-09-27', NULL, 0x3000, 'reader'),
(8, 'Thiago Martinez', 'thiagomartinez961@gmail.com', 'd0d28103551c49ec855ec32c132d6d19a3c7a33b9895fd9b243f5f4738afcfd1b2a91d23a50bb9d7974788d0f8eebdf5fff31f032085b3759e9b0d17a3259237', NULL, NULL, '2024-09-27', NULL, 0x3000, 'reader'),
(9, 'Test Test', 'Test@test.com', '4db159b682cf2c5130805ccc5a4f4bd336427522ad398978ae25d071c2dc191606e676dff4d100c147fcff66a0df4f158d357c0a417ac99d1125c9dc67b69cd5', NULL, NULL, '2024-09-28', NULL, 0x3000, 'reader'),
(10, 'Tst Tst', 'Tst@tst.com', '292d118c70695191f4872fb32b6da252c36dfe43b680722f4c95be64c32b73f67a95bb533a00b68c44f55789cf93a8365e14f9e81c43794bee3ed9c8926a900a', NULL, NULL, '2024-09-28', NULL, 0x3000, 'reader'),
(11, 'Thiago Martinez', 'thiagomartinez963@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-09-28', NULL, 0x3000, 'reader'),
(12, 'Thiago Martinez', 'thiagomartinez967@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-09-28', NULL, 0x3000, 'reader'),
(13, 'Thiago Martinez', 'thiagomartinez968@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-09-28', NULL, 0x3000, 'reader'),
(14, 'Juanito Alcachofa', 'Ja@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-10-04', NULL, 0x3000, 'reader'),
(15, 'Thiago Martinez', 'thiagomartinez969@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-10-04', NULL, 0x3000, 'reader'),
(16, 'Thiago Martinez', 'thiagomartinez930@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-10-04', NULL, 0x3000, 'reader'),
(17, 't t', 't@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', NULL, NULL, '2024-10-04', NULL, 0x3000, 'reader'),
(18, 'Pagina13', 'pagina13oficial@gmail.com', 'c21a809a0b2e17f4312b53eedf201aa72b1e13331e5997c8c8845de4f76ecfdcaac2c51f6af89ac4eff925a5ed25415d423926b20b21257d8b2faa8f09eced1d', 0x2e2e2f2e2e2f76696577732f696d672f75706c6f6164732f656e74657270726973655f6c6f676f2e706e67, 'Administrador del sitio web Página 13', '2024-10-26', NULL, 0x3000, 'writer'),
(19, 'as das', 'prota@gmail.com', '9387b8bf99bf5a35c0c20d838186f54f621acb743a4d2c8eb355b3d8d4d44168db013782a342e571e46be9f125a8d067cd187438a4483d1d8f3f62bdc9fe6444', NULL, NULL, '2024-10-28', NULL, 0x3000, 'reader'),
(20, 'moni argento', 'hola@gmail.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', NULL, NULL, '2024-10-29', NULL, 0x3000, 'reader'),
(21, 'mauro barraaza', 'lol@gmail.com', 'cf83e1357eefb8bdf1542850d66d8007d620e4050b5715dc83f4a921d36ce9ce47d0d13c5d85f2b0ff8318d2877eec2f63b931bd47417a81a538327af927da3e', NULL, NULL, '2024-10-29', NULL, 0x3000, 'reader'),
(22, 'sif', 'ernestogallego2019@gmail.com', 'aab052952d49d24acd2be53b5c6fa1ba01cf5b75e66394ebd15a17f732658cf682dc734787495978d6e7685ce51f6b630897cdb47da95adb340c344f5d6512b1', NULL, NULL, '2024-11-11', NULL, 0x3000, 'reader');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountrecovery`
--
ALTER TABLE `accountrecovery`
  ADD PRIMARY KEY (`idRecovery`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`idCategories`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`Posts_idPosts`,`Users_idUsers`),
  ADD KEY `fk_Posts_has_Users_Users1_idx` (`Users_idUsers`),
  ADD KEY `fk_Posts_has_Users_Posts1_idx` (`Posts_idPosts`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`idPosts`,`Users_idUsers`),
  ADD KEY `fk_Posts_Users1_idx` (`Users_idUsers`);

--
-- Indexes for table `posts_has_categories`
--
ALTER TABLE `posts_has_categories`
  ADD PRIMARY KEY (`Posts_idPosts`,`Categories_idCategories`),
  ADD KEY `fk_Posts_has_Categories_Categories1_idx` (`Categories_idCategories`),
  ADD KEY `fk_Posts_has_Categories_Posts1_idx` (`Posts_idPosts`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`idUsers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountrecovery`
--
ALTER TABLE `accountrecovery`
  MODIFY `idRecovery` mediumint(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `idCategories` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `idPosts` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `idUsers` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_Posts_has_Users_Posts1` FOREIGN KEY (`Posts_idPosts`) REFERENCES `posts` (`idPosts`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Posts_has_Users_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_Posts_Users1` FOREIGN KEY (`Users_idUsers`) REFERENCES `users` (`idUsers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `posts_has_categories`
--
ALTER TABLE `posts_has_categories`
  ADD CONSTRAINT `fk_Posts_has_Categories_Categories1` FOREIGN KEY (`Categories_idCategories`) REFERENCES `categories` (`idCategories`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Posts_has_Categories_Posts1` FOREIGN KEY (`Posts_idPosts`) REFERENCES `posts` (`idPosts`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
