-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-11-2021 a las 15:29:21
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `investments`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `amounts`
--

CREATE TABLE `amounts` (
  `id_amount` int(11) NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `date` date DEFAULT current_timestamp(),
  `diff` decimal(10,2) DEFAULT 0.00,
  `id_fund` int(11) NOT NULL DEFAULT 0,
  `perc` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `amounts`
--

INSERT INTO `amounts` (`id_amount`, `amount`, `date`, `diff`, `id_fund`, `perc`) VALUES
(85, '100.00', '2021-11-23', '97.00', 24, '3233.33'),
(88, '23.00', '2021-11-23', '0.00', 26, '0.00'),
(89, '34.00', '2021-11-23', '11.00', 26, '47.83'),
(90, '45.00', '2021-11-23', '11.00', 26, '32.35'),
(91, '50.00', '2021-11-23', '5.00', 26, '11.11'),
(92, '410.00', '2021-11-23', '360.00', 26, '720.00'),
(93, '2.00', '2021-11-23', '-408.00', 26, '-99.51'),
(94, '500.00', '2021-11-23', '0.00', 27, '0.00'),
(95, '500.00', '2021-11-23', '0.00', 27, '0.00'),
(96, '5525.00', '2021-11-23', '5025.00', 27, '1005.00'),
(97, '4524.00', '2021-11-23', '-1001.00', 27, '-18.12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comments`
--

CREATE TABLE `comments` (
  `id_coment` int(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `user` varchar(20) NOT NULL,
  `id_topic` int(11) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comments`
--

INSERT INTO `comments` (`id_coment`, `message`, `user`, `id_topic`, `date`) VALUES
(1, 'aca me respondo', 'cliente', 1, '2021-11-23 03:55:59'),
(2, 'me respondo', 'cliente', 1, '2021-11-23 03:56:39'),
(3, '1', '', 0, '2021-11-23 04:12:37'),
(4, 'funciona?', '25', 1, '2021-11-23 04:15:15'),
(5, 'asd', '25', 1, '2021-11-23 04:15:36'),
(6, 'dfgfdggfd', '25', 1, '2021-11-23 04:19:13'),
(7, 'asddasasd', 'admin', 1, '2021-11-23 04:19:55'),
(8, 'hola', 'admin', 1, '2021-11-23 10:41:57'),
(9, 'hj', 'admin', 1, '2021-11-23 10:42:21'),
(10, 'asdasd', 'admin', 1, '2021-11-23 10:55:14'),
(11, 'sdfdgfgdgfdgfdfg', 'admin', 1, '2021-11-23 10:55:17'),
(12, 'dfdf', 'admin', 4, '2021-11-23 10:55:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funds`
--

CREATE TABLE `funds` (
  `id_fund` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `currency` char(3) NOT NULL,
  `id_user` int(11) NOT NULL DEFAULT 0,
  `state` tinyint(1) NOT NULL DEFAULT 1,
  `percentage` decimal(10,2) NOT NULL DEFAULT 0.00,
  `total` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `funds`
--

INSERT INTO `funds` (`id_fund`, `name`, `currency`, `id_user`, `state`, `percentage`, `total`) VALUES
(25, '2', 'ars', 26, 0, '400.00', '8.00'),
(26, 'hola', 'ars', 26, 1, '-91.30', '-21.00'),
(27, 'asd', 'ars', 25, 1, '804.80', '4024.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `topic`
--

CREATE TABLE `topic` (
  `id_topic` bigint(20) NOT NULL,
  `name` varchar(50) NOT NULL,
  `content` varchar(300) NOT NULL,
  `user` varchar(20) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `topic`
--

INSERT INTO `topic` (`id_topic`, `name`, `content`, `user`, `date`) VALUES
(1, 'hola', 'tmaos probando', 'admin', '2021-11-23 03:13:03'),
(4, 'asdasd', 'asdasd', 'admin', '2021-11-23 10:55:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `password` varchar(34) NOT NULL,
  `state` tinyint(4) NOT NULL DEFAULT 1,
  `lastlogin` datetime DEFAULT NULL,
  `user` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'client'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id_user`, `password`, `state`, `lastlogin`, `user`, `email`, `role`) VALUES
(25, 'e00cf25ad42683b3df678c61f42c6bda', 1, '2021-11-23 10:36:11', 'admin', 'mariano@pereyradiaz.com.ar', 'admin'),
(26, 'e10adc3949ba59abbe56e057f20f883e', 1, '2021-11-22 23:44:40', 'mariano', 'marianopereyradiaz@gmail.com', 'client');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `amounts`
--
ALTER TABLE `amounts`
  ADD PRIMARY KEY (`id_amount`);

--
-- Indices de la tabla `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id_coment`);

--
-- Indices de la tabla `funds`
--
ALTER TABLE `funds`
  ADD PRIMARY KEY (`id_fund`);

--
-- Indices de la tabla `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id_topic`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `amounts`
--
ALTER TABLE `amounts`
  MODIFY `id_amount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT de la tabla `comments`
--
ALTER TABLE `comments`
  MODIFY `id_coment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `funds`
--
ALTER TABLE `funds`
  MODIFY `id_fund` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `topic`
--
ALTER TABLE `topic`
  MODIFY `id_topic` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
