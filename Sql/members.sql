-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2019 a las 21:36:49
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `nordicguides`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `members`
--

CREATE TABLE `members` (
  `memberID` int(11) NOT NULL,
  `birthdate` date DEFAULT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `street` varchar(50) DEFAULT NULL,
  `city` varchar(30) DEFAULT NULL,
  `zip` varchar(10) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(120) NOT NULL,
  `role` varchar(10) NOT NULL DEFAULT 'member',
  `driverslicense` varchar(10) DEFAULT NULL,
  `profileimage` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `members`
--

INSERT INTO `members` (`memberID`, `birthdate`, `firstname`, `lastname`, `street`, `city`, `zip`, `phone`, `email`, `password`, `role`, `driverslicense`, `profileimage`) VALUES
(1, NULL, 'John', 'Doe', 'Hallituskatu 1', 'Tornio', '95400', NULL, 'jdoe@lapinamk.fi', '$2y$10$ukH4IrFDcXlk9wb3UG3pR.s6sD0BuEYRxoFhz50A8qK6.3MgtZTsy', 'member', NULL, NULL),
(2, NULL, 'Mike', 'Stone', 'Meripuistokatu 4', 'Kemi', '94700', NULL, 'mstone@kemi.fi', 'password', 'member', NULL, NULL),
(3, NULL, 'Georg', 'Harrison', 'Strandgata 3', 'Haparanda', '95300', NULL, 'gharrison@haparanda.se', 'password', 'member', NULL, NULL),
(4, '0000-00-00', 'Andy', 'McRoy', 'Kauppakatu 58', 'Tornio', '95400', '1234567', 'amarronp@outlook.es', '$2y$10$q8VfJZKAfOVzQii3CyLbbewfefUSqxKMl/y2sBMuhSDi9uqeFiAn.', 'admin', '', 'lo.jpg'),
(5, NULL, 'Anna', 'Hanson', 'Porokatu 2', 'Rovaniemi', '96300', NULL, 'ahanson@rollo.fi', 'password', 'member', NULL, NULL),
(6, NULL, 'Andres', 'Marron', NULL, NULL, NULL, NULL, 'estoymulo69@gmail.com', '$2y$10$vUl8KHyP8GVKXpzN8UcB.OJqlFTvkGU93BGtAD0iA2ln57iMC.Uee', 'member', NULL, NULL),
(7, NULL, 'Marc', 'Otaku', NULL, NULL, NULL, NULL, 'MarcOtaku@gmail.com', '$2y$10$rpP4IZHvqm9YMKQs0syma.D5p04Qrjw2SHyfLqOJL4YPTeP5pbOLi', 'member', NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`memberID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `members`
--
ALTER TABLE `members`
  MODIFY `memberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
