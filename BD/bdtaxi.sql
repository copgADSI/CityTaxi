-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-04-2020 a las 06:25:03
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdtaxi`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `IdAdmin` int(11) NOT NULL,
  `nombre` text NOT NULL,
  `email` text NOT NULL,
  `password` text NOT NULL,
  `telefono` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`IdAdmin`, `nombre`, `email`, `password`, `telefono`) VALUES
(1, 'UserAdmin1', 'UserAdmin@gmail.com', '$2y$10$xNeOekNpUPGF2GbbKGt2O.sqgQnKvlkkFQJQInIHE7/YBm5b7Lpmu', 2147483647);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL,
  `Documento` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `FechaNacimiento` varchar(45) NOT NULL,
  `Genero` varchar(45) NOT NULL,
  `Telefono` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `Clave` varchar(555) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`idCliente`, `Documento`, `Nombre`, `Apellido`, `FechaNacimiento`, `Genero`, `Telefono`, `email`, `Clave`) VALUES
(1, 1057606121, 'Cristian', 'Parada Gualteros', '1998-04-11', '1', '3214888230', 'Cristian@gmail.com', '$2y$10$xNeOekNpUPGF2GbbKGt2O.sqgQnKvlkkFQJQInIHE7/YBm5b7Lpmu'),
(2, 1057606121, 'Prueba2', 'Prueba2_', '2019-12-18', '1', '3214888230', 'Prueba2@gmail.com', '$2y$10$0Vs7ZpAxCEuq1q/Ldfez5e1mN1wJnVXLY4XNHg/DNdtt8lZz2SyMy'),
(3, 1057606121, 'Prueba', 'Prueba', '1998-02-11', '1', '3214888230', 'Prueba3@gmail.com', '$2y$10$v8zolev3Uo6h0g.Q6gwazO4U1D/DLQeuJCefI/6bT6jdV.vfi285G'),
(4, 1057606121, 'Cristian', 'Gualteros', '2020-04-04', '1', '3213123132', 'Cristian@gmail.com', '$2y$10$NK7YNe8sAcJCLlGtumisnO/ilIIi4PuLPAIF4ygtgnebBtSeYkXPe'),
(5, 1057606121, 'Cristian', 'Gualteros', '1998-04-11', '1', '3213123123', 'copg@gmail.com', '$2y$10$KuHeqmsfPCTEbwgIreMyBu4LAxLJNZ5A7wNWPcWDddmrLV3kqhRuK');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conductor`
--

CREATE TABLE `conductor` (
  `idConductor` int(11) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Documento` int(11) NOT NULL,
  `Genero` varchar(12) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `Direccion` varchar(22) NOT NULL,
  `email` varchar(100) NOT NULL,
  `Contraseña` varchar(500) NOT NULL,
  `foto` varchar(700) NOT NULL,
  `FechaIngreso` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `conductor`
--

INSERT INTO `conductor` (`idConductor`, `Nombre`, `Apellido`, `Documento`, `Genero`, `Telefono`, `Direccion`, `email`, `Contraseña`, `foto`, `FechaIngreso`) VALUES
(1, 'Jorge', 'Pérez', 1057606222, 'Masculino', 2147483647, 'Cra. 12 # 22-21', 'Conductor1@gmail.com', '$2y$10$KuHeqmsfPCTEbwgIreMyBu4LAxLJNZ5A7wNWPcWDddmrLV3kqhRuK', '', '0000-00-00 00:00:00'),
(2, 'Roberto', 'Suarez', 1057657434, 'Masculino', 2147483647, 'Calle 9 #22-1', 'Conductor2@gmail.com', '$2y$10$xNeOekNpUPGF2GbbKGt2O.sqgQnKvlkkFQJQInIHE7/YBm5b7Lpmu', '', '0000-00-00 00:00:00'),
(10, 'José ', 'Peréz', 10534321, 'Masculino', 2147483647, 'csdss', 'Conductor3@gmail.com', '123456123', '../FotoConductor/sharp_right.png', '2020-04-09 16:18:54'),
(12, 'Marta ', 'sdas', 10534321, 'Masculino', 2231312, 'dssad', 'Conductor4@gmail.com', '123456123', '../FotoConductor/MarcadorFlag.png', '2020-04-09 16:20:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordenadas`
--

CREATE TABLE `coordenadas` (
  `IdCoordenadas` int(11) NOT NULL,
  `Ciudad` text NOT NULL,
  `Latitud` int(11) NOT NULL,
  `Longitud` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idReserva` int(11) NOT NULL,
  `Fecha` text NOT NULL,
  `Origen` varchar(500) NOT NULL,
  `Destino` varchar(500) NOT NULL,
  `ViaOpcional` varchar(500) NOT NULL,
  `Distancia` float NOT NULL,
  `Tiempo` text NOT NULL,
  `Valor` float NOT NULL,
  `Estado` text NOT NULL,
  `idTarifa` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idVehiculo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idReserva`, `Fecha`, `Origen`, `Destino`, `ViaOpcional`, `Distancia`, `Tiempo`, `Valor`, `Estado`, `idTarifa`, `idCliente`, `idVehiculo`) VALUES
(1, '2020-04-07 15:30:00', 'Sogamoso, city, Colombia', 'Duitama, city, Colombia', '', 19, '16 minutos  Aprox.', 19, 'En Espera...', 1, 5, NULL),
(2, '2020-04-07 15:00:00', 'Sogamoso, city, Colombia', 'Duitama, city, Colombia', '', 19, '16 minutos  Aprox.', 17100, 'En Espera...', 1, 5, NULL),
(5, '0000-00-00 00:00:00', '$origen', '$destino', '$via', 0, '$tiempo', 0, '$estado', 2, 2, NULL),
(6, '0000-00-00 00:00:00', '$origen', '$destino', '$via', 0, '$tiempo', 0, '$estado', 2, 2, NULL),
(7, '0000-00-00 00:00:00', '$origen', '$destino', '$via', 0, '$tiempo', 0, '$estado', 2, 2, NULL),
(8, '0000-00-00 00:00:00', '$origen', '$destino', '$via', 222, '$tiempo', 0, '$estado', 2, 2, NULL),
(9, '0000-00-00 00:00:00', '$origen', '$destino', '$via', 222, '$tiempo', 5000, '$estado', 2, 2, NULL),
(10, '20/20/2020 22:23:00', '$origen', '$destino', '$via', 222, '$tiempo', 5000, '$estado', 2, 2, NULL),
(11, '20/20/2020 22:23:00', '$origen', '$destino', '$via', 222, '$tiempo', 5000, '$estado', 2, 2, NULL),
(12, '2020-04-07T15:33', 'Sogamoso, city, Colombia', 'Duitama, city, Colombia', '', 19, '16 minutos  Aprox.', 17100, 'En Espera...', 1, 5, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifa`
--

CREATE TABLE `tarifa` (
  `idTarifa` int(11) NOT NULL,
  `TasaBasica` float NOT NULL,
  `TipoVehiculo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tarifa`
--

INSERT INTO `tarifa` (`idTarifa`, `TasaBasica`, `TipoVehiculo`) VALUES
(1, 900, 'Ligero'),
(2, 1000, 'Semi-Ligero'),
(3, 1100, 'Normar'),
(4, 1300, 'Suv');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `idVehiculo` int(11) NOT NULL,
  `Modelo` varchar(45) NOT NULL,
  `Marca` varchar(45) NOT NULL,
  `Placa` varchar(12) NOT NULL,
  `idConductor` int(11) NOT NULL,
  `idTarifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`idVehiculo`, `Modelo`, `Marca`, `Placa`, `idConductor`, `idTarifa`) VALUES
(1, 'Skoda COMB ', 'Skoda', 'BII-664', 1, 1),
(2, '  PICANTO EKOTAXI', 'kKIA', 'HJJ-221', 2, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`IdAdmin`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`idConductor`);

--
-- Indices de la tabla `coordenadas`
--
ALTER TABLE `coordenadas`
  ADD PRIMARY KEY (`IdCoordenadas`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idReserva`),
  ADD KEY `idTarifa` (`idTarifa`),
  ADD KEY `idCliente` (`idCliente`),
  ADD KEY `idVehiculo` (`idVehiculo`);

--
-- Indices de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`idTarifa`);

--
-- Indices de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`idVehiculo`),
  ADD KEY `idConductor` (`idConductor`),
  ADD KEY `idTarifa` (`idTarifa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `administrador`
--
ALTER TABLE `administrador`
  MODIFY `IdAdmin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `conductor`
--
ALTER TABLE `conductor`
  MODIFY `idConductor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `coordenadas`
--
ALTER TABLE `coordenadas`
  MODIFY `IdCoordenadas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idReserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `idTarifa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  MODIFY `idVehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD CONSTRAINT `reserva_ibfk_1` FOREIGN KEY (`idTarifa`) REFERENCES `tarifa` (`idTarifa`),
  ADD CONSTRAINT `reserva_ibfk_2` FOREIGN KEY (`idCliente`) REFERENCES `cliente` (`idCliente`),
  ADD CONSTRAINT `reserva_ibfk_3` FOREIGN KEY (`idVehiculo`) REFERENCES `vehiculo` (`idVehiculo`);

--
-- Filtros para la tabla `vehiculo`
--
ALTER TABLE `vehiculo`
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`idConductor`) REFERENCES `conductor` (`idConductor`),
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`idTarifa`) REFERENCES `tarifa` (`idTarifa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
