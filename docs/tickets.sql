-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-09-2020 a las 22:38:11
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tickets`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencia`
--

CREATE TABLE `dependencia` (
  `id` int(11) NOT NULL,
  `dependence` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dependencia`
--

INSERT INTO `dependencia` (`id`, `dependence`) VALUES
(1, 'Biblioteca'),
(2, 'Bienestar Universitario'),
(3, 'Derecho'),
(4, 'Enfermeria'),
(5, 'Fisica'),
(6, 'Ingenieria de sistemas'),
(7, 'Ingenieria Industrial'),
(8, 'Ingenieria Mecanica'),
(9, 'Licenciatura'),
(10, 'Postgrado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` int(11) NOT NULL,
  `asunto` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `nombres` varchar(50) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `identificacion` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `id_tipo` int(11) NOT NULL,
  `id_dependencia` int(11) NOT NULL,
  `ts_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `asunto`, `descripcion`, `created`, `nombres`, `apellidos`, `identificacion`, `email`, `id_tipo`, `id_dependencia`, `ts_update`) VALUES
(1, 'Certificado Matrícula', 'Quiero sacar un certificado de matrícula de la U', '2020-09-26 18:43:29', 'Abel Antonio', 'López Hernández', 1003458251, 'ablh54@outlook.es', 3, 2, '2020-09-26 18:43:52'),
(2, 'Notas corte', 'Quiero obtener las notas del primer corte', '2020-09-26 18:46:18', 'Frank James', 'Lampard Obe', 101112987, 'frankiel10@chelsea.uk', 3, 6, '2020-09-26 18:46:18'),
(3, 'Solicitud ', 'Solicitud para cambio de cargo', '2020-09-26 18:48:01', 'María Isabel', 'Pinedo Burgos', 27569211, 'mayi_isa@correo.unicordoba.edu.co', 2, 4, '2020-09-26 18:48:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `id` int(11) NOT NULL,
  `type` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`id`, `type`) VALUES
(1, 'Administrativo'),
(2, 'Docente'),
(3, 'Estudiante');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `dependencia`
--
ALTER TABLE `dependencia`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`),
  ADD KEY `fk_id_tipo` (`id_tipo`),
  ADD KEY `fk_id_dependencia` (`id_dependencia`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `dependencia`
--
ALTER TABLE `dependencia`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id_ticket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `fk_id_dependencia` FOREIGN KEY (`id_dependencia`) REFERENCES `dependencia` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_id_tipo` FOREIGN KEY (`id_tipo`) REFERENCES `tipo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
