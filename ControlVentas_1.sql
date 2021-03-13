-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 05-03-2021 a las 19:32:55
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `ControlVentas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `identificacion` varchar(15) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `celular` varchar(10) NOT NULL,
  `direccion` varchar(150) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id`, `identificacion`, `nombre`, `celular`, `direccion`, `email`) VALUES
(123, '10256894567', 'Santiago Martinez', '3145524478', 'CRA 18A # 34-18', 'rami@gmail.com'),
(356, '1017171294', 'Andres Mona', '3215507210', 'Avenida 49 # 58-48', 'nelsonandres0323@gmail.com'),
(543, '1017208971', 'Faver Alonso Lopez', '3000000000', 'Direccion de Prueba', 'faver@prueba.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_ventas`
--

CREATE TABLE `control_ventas` (
  `id` int(11) NOT NULL,
  `oferta` varchar(15) NOT NULL,
  `fk_usuario` int(3) NOT NULL,
  `fk_cliente` int(3) NOT NULL,
  `fk_servicio` int(3) NOT NULL,
  `fk_estado` int(3) NOT NULL,
  `fecha` int(11) NOT NULL,
  `numero_instalacion` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `tipo_estado` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `manual`
--

CREATE TABLE `manual` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `ruta` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `manual`
--

INSERT INTO `manual` (`id`, `nombre`, `ruta`) VALUES
(5, 'UML', 'manuales/UML.pdf'),
(6, 'Libro Ingenieria de Software', 'manuales/Libro Ingenieria de Software.pdf'),
(7, 'Instructivo Retiro Cesantias', 'manuales/Instructivo Retiro Cesantias.pdf'),
(8, 'Certificado', 'manuales/Certificado.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id` int(3) NOT NULL,
  `nombre_rol` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre_rol`) VALUES
(1, 'Administrador'),
(2, 'Coordinador Comercial'),
(3, 'Asesor Comercial');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id_servicios` int(11) NOT NULL,
  `tipo_servicio` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id_servicios`, `tipo_servicio`) VALUES
(1122, 'Duo play'),
(1211, 'Internet individual'),
(1123, 'Triple play 30mb');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `identificacion` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `celular` varchar(10) DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(600) NOT NULL,
  `email` varchar(100) NOT NULL,
  `fk_zona_sede` int(5) NOT NULL,
  `fk_rol` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `identificacion`, `nombre`, `celular`, `usuario`, `contrasena`, `email`, `fk_zona_sede`, `fk_rol`) VALUES
(33, '123456', 'Faver Lopez', '3100000000', 'faverl', '$2y$15$KpYxRj3e5hHqaJj4scAzoOeC61MJgWz7YpGf71QImW1.nNPqoS8X2', 'faver@prueba.com', 1040, 1),
(34, '123', 'Andres', '3100000000', 'andres', '$2y$15$cgvdtW2xJ4V/7SYFS/5wpuLOALQ90KQhSvAATCokzj9cyHtMWKakW', 'prueba@prueba.com', 1040, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zona_sede`
--

CREATE TABLE `zona_sede` (
  `id` int(11) NOT NULL,
  `nombre_sede` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `zona_sede`
--

INSERT INTO `zona_sede` (`id`, `nombre_sede`) VALUES
(1040, 'San Diego'),
(1041, 'Santa fe'),
(1042, 'Molinos'),
(1043, 'Oriental');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacion` (`identificacion`);

--
-- Indices de la tabla `control_ventas`
--
ALTER TABLE `control_ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `manual`
--
ALTER TABLE `manual`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id_servicios`),
  ADD UNIQUE KEY `tipo_servicio` (`tipo_servicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `identificacion` (`identificacion`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_rol` (`fk_rol`);

--
-- Indices de la tabla `zona_sede`
--
ALTER TABLE `zona_sede`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=553;

--
-- AUTO_INCREMENT de la tabla `control_ventas`
--
ALTER TABLE `control_ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `manual`
--
ALTER TABLE `manual`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1212;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `zona_sede`
--
ALTER TABLE `zona_sede`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1044;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
