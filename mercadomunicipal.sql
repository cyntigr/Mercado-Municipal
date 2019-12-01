-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2019 a las 21:50:36
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mercadomunicipal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE `compra` (
  `idProducto` int(11) NOT NULL,
  `idPuesto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `cantidad` varchar(100) NOT NULL,
  `fechaPedido` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `horaRecogida` time NOT NULL,
  `aceptado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `idUsuario` int(11) NOT NULL,
  `idPuesto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favorito`
--

INSERT INTO `favorito` (`idUsuario`, `idPuesto`) VALUES
(3, 2),
(4, 6),
(4, 8),
(5, 2),
(6, 1),
(6, 5),
(6, 7),
(6, 8),
(6, 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `origen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puesto`
--

CREATE TABLE `puesto` (
  `idPuesto` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `telefono` int(9) NOT NULL,
  `foto` varchar(500) DEFAULT NULL,
  `idUsuario` int(11) NOT NULL,
  `infoPuesto` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `puesto`
--

INSERT INTO `puesto` (`idPuesto`, `nombre`, `telefono`, `foto`, `idUsuario`, `infoPuesto`) VALUES
(1, 'Panadería Delis', 661121633, 'panaderia.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(2, 'Frutería Frambuesa', 661121633, 'fruteria2.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(3, 'Pescadería Navas', 661121633, 'pescaderia.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(4, 'Carnicería Pedrol', 615422789, 'carniceria.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(5, 'Frutería Corona', 661121633, 'fruteria3.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(6, 'Carnicería Luz', 661121633, 'carniceria2.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(7, 'Pescadería win', 654789123, 'pescaderia2.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(8, 'Iluminación', 661121633, 'iluminacion.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.'),
(9, 'Cash', 456123789, 'cash.jpg', 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis elementum elit ut lorem lacinia bibendum. Donec nisi tellus, feugiat sit amet diam et, blandit bibendum dolor. In a risus sem. Vestibulum nec enim semper, consequat nunc ut, efficitur nisi. Proin volutpat risus vitae volutpat ultricies. Suspendisse viverra mauris quis risus hendrerit, in dictum sem auctor. Sed turpis dui, malesuada ac malesuada in, ornare sit amet leo. Cras efficitur ligula ac dignissim euismod. Curabitur ac ipsum nec ligula mollis egestas.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `puestoproducto`
--

CREATE TABLE `puestoproducto` (
  `idPuesto` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `precio` decimal(10,0) NOT NULL,
  `observaciones` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo`
--

CREATE TABLE `tipo` (
  `idTipo` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipo`
--

INSERT INTO `tipo` (`idTipo`, `nombre`) VALUES
(1, 'administrador'),
(2, 'vendedor'),
(3, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(34) NOT NULL,
  `idTipo` int(11) NOT NULL,
  `telefono` int(9) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `apiKey` varchar(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellido`, `email`, `password`, `idTipo`, `telefono`, `foto`, `apiKey`) VALUES
(2, 'Alexander', 'Quesada López', 'alexql91@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 3, 610040371, 'tio.jpg', NULL),
(3, 'Alfred', 'Castaño', 'alf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, 951685974, 'tio.jpg', NULL),
(4, 'lydia', 'garcia', 'lydiagarciaruz@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 605459216, 'tio.jpg', NULL),
(5, 'antonio', 'sanchez', 'antonio@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 987654123, 'tio.jpg', 'buenasPuedeProbarLaApi'),
(6, 'Cyntia', 'Garcia Ruiz', 'cyntigr@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 610040375, 'tio.jpg', 'hola2020adios2019'),
(8, 'Noah', 'Quesada ', 'noah16@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 3, 610040521, 'tio.jpg', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `compra`
--
ALTER TABLE `compra`
  ADD KEY `FK_compra` (`idUsuario`),
  ADD KEY `FK_comp` (`idProducto`),
  ADD KEY `FK_compr` (`idPuesto`);

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`idUsuario`,`idPuesto`),
  ADD KEY `idPuesto` (`idPuesto`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD PRIMARY KEY (`idPuesto`),
  ADD KEY `FK_usu` (`idUsuario`);

--
-- Indices de la tabla `puestoproducto`
--
ALTER TABLE `puestoproducto`
  ADD PRIMARY KEY (`idPuesto`,`idProducto`),
  ADD KEY `FK_PUESTOPRODUC` (`idProducto`);

--
-- Indices de la tabla `tipo`
--
ALTER TABLE `tipo`
  ADD PRIMARY KEY (`idTipo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `FK_tipo_usu` (`idTipo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `puesto`
--
ALTER TABLE `puesto`
  MODIFY `idPuesto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tipo`
--
ALTER TABLE `tipo`
  MODIFY `idTipo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `FK_comp` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `FK_compr` FOREIGN KEY (`idPuesto`) REFERENCES `puesto` (`idPuesto`),
  ADD CONSTRAINT `FK_compra` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`),
  ADD CONSTRAINT `favorito_ibfk_2` FOREIGN KEY (`idPuesto`) REFERENCES `puesto` (`idPuesto`);

--
-- Filtros para la tabla `puesto`
--
ALTER TABLE `puesto`
  ADD CONSTRAINT `FK_usu` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `puestoproducto`
--
ALTER TABLE `puestoproducto`
  ADD CONSTRAINT `FK_PUESTOPRODUC` FOREIGN KEY (`idProducto`) REFERENCES `producto` (`idProducto`),
  ADD CONSTRAINT `FK_PUESTOPRODUCTO` FOREIGN KEY (`idPuesto`) REFERENCES `puesto` (`idPuesto`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `FK_tipo_usu` FOREIGN KEY (`idTipo`) REFERENCES `tipo` (`idTipo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
