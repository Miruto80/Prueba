-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-11-2024 a las 16:31:12
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
-- Base de datos: `taekyonnueva`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tatletas`
--

CREATE TABLE `tatletas` (
  `id` int(11) NOT NULL,
  `cedula` int(15) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `fechadenacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `Participacion` varchar(30) NOT NULL,
  `Direccion` varchar(50) NOT NULL,
  `Correo` varchar(50) DEFAULT NULL,
  `Telefono` varchar(30) NOT NULL,
  `Numerodeaccion` varchar(30) DEFAULT NULL,
  `Cinturon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tatletas`
--

INSERT INTO `tatletas` (`id`, `cedula`, `apellidos`, `nombres`, `fechadenacimiento`, `sexo`, `Participacion`, `Direccion`, `Correo`, `Telefono`, `Numerodeaccion`, `Cinturon`) VALUES
(1, 30294852, 'Perez', 'Roberto', '2006-07-12', 'M', 'Si', 'Cabudare', 'cahgvkas@hotmail.com', '0424-1245674', '36', 'Blanco'),
(2, 31245689, 'Melendez', 'Mariana', '2004-11-14', 'F', 'No', 'La mora', 'Mftt@gmail.com', '0412-2278991', '31', 'Rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tatletaslogros`
--

CREATE TABLE `tatletaslogros` (
  `codEvento` int(11) NOT NULL,
  `id_atleta1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclaseentrenadores`
--

CREATE TABLE `tclaseentrenadores` (
  `cedulaE` int(15) NOT NULL,
  `Idclases` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclases`
--

CREATE TABLE `tclases` (
  `duracionclase` int(15) NOT NULL,
  `idclases` int(11) NOT NULL,
  `Edadesclases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclasesatletas`
--

CREATE TABLE `tclasesatletas` (
  `id2` int(11) NOT NULL,
  `idclases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclaseshorarios`
--

CREATE TABLE `tclaseshorarios` (
  `idclases1` int(11) NOT NULL,
  `id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclub`
--

CREATE TABLE `tclub` (
  `numaccion` int(15) NOT NULL,
  `id_atleta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tentrenadores`
--

CREATE TABLE `tentrenadores` (
  `id` int(11) NOT NULL,
  `CedulaE` int(11) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Jerarquiadecinturon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tentrenadores`
--

INSERT INTO `tentrenadores` (`id`, `CedulaE`, `Apellido`, `Nombre`, `Telefono`, `Jerarquiadecinturon`) VALUES
(0, 3654225, 'paere', 'quuuan', '0415-2416546', 'V DAN'),
(1, 30560144, 'Mendoza', 'Joaquin', '0414-5446656', 'VIII DAN'),
(2, 30678912, 'Ramirez', 'Carlos', '0414-1234567', 'VII DAN'),
(3, 30765498, 'Perez', 'Ana', '0416-2345678', 'VI DAN'),
(4, 30876543, 'Gomez', 'Luis', '0412-3456789', 'V DAN'),
(5, 30987654, 'peres', 'Maria', '0412-4567890', 'I DAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thorarios`
--

CREATE TABLE `thorarios` (
  `id2` int(11) NOT NULL,
  `cedula` int(11) DEFAULT NULL,
  `apellidos` varchar(30) NOT NULL,
  `nombres` varchar(30) NOT NULL,
  `Edad` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Apellido` varchar(30) NOT NULL,
  `Tipodehorario` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `thorarios`
--

INSERT INTO `thorarios` (`id2`, `cedula`, `apellidos`, `nombres`, `Edad`, `Nombre`, `Apellido`, `Tipodehorario`) VALUES
(1, 31245689, 'Melendez', 'Mariana', 20, 'Carlos', 'Ramirez', 'INFANTIL de 5:00 PM a 6:00 PM'),
(2, 30294852, 'Perez', 'Roberto', 18, 'Luis', 'Gomez', 'INFANTIL de 5:00 PM a 6:00 PM');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tlogros`
--

CREATE TABLE `tlogros` (
  `Cod_evento` int(11) NOT NULL,
  `Nombre_de_evento` varchar(30) NOT NULL,
  `Fecha_del_evento` date NOT NULL,
  `Logro_obtenido` varchar(30) NOT NULL,
  `categoria` varchar(30) NOT NULL,
  `NombreLA` varchar(30) NOT NULL,
  `id3` int(11) NOT NULL,
  `cedula` int(11) NOT NULL,
  `apellidos` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tlogros`
--

INSERT INTO `tlogros` (`Cod_evento`, `Nombre_de_evento`, `Fecha_del_evento`, `Logro_obtenido`, `categoria`, `NombreLA`, `id3`, `cedula`, `apellidos`) VALUES
(10, 'ppaa', '2024-11-17', '1ER LUGAR', 'POOMSAE', 'Perez', 0, 30294852, 'Roberto'),
(11, 'oaosd', '2024-11-22', '1ER LUGAR', 'POOMSAE', 'Mariana', 0, 31245689, 'Melendez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpagos`
--

CREATE TABLE `tpagos` (
  `cedula` int(15) NOT NULL,
  `fechadepago` date NOT NULL,
  `Monto` float NOT NULL,
  `tipopago` varchar(30) NOT NULL,
  `numeroaccion` varchar(30) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `Comprobantedepago` varchar(30) DEFAULT NULL,
  `nombres` varchar(20) NOT NULL,
  `apellidos` varchar(20) NOT NULL,
  `idpago` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tpagos`
--

INSERT INTO `tpagos` (`cedula`, `fechadepago`, `Monto`, `tipopago`, `numeroaccion`, `id_atleta`, `Comprobantedepago`, `nombres`, `apellidos`, `idpago`) VALUES
(30294852, '2024-11-06', 23, 'transferencia', '36', 1, '2323', 'Roberto', 'Perez', 14),
(30294852, '2024-11-23', 50, 'transferencia', '36', 1, '4561', 'Roberto', 'Perez', 24),
(30294852, '2024-11-16', 56, 'Pago movil', '36', 1, '1563', 'Roberto', 'Perez', 25);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tusuarios`
--

CREATE TABLE `tusuarios` (
  `CedulaU` int(11) NOT NULL,
  `NombreU` varchar(30) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `Cargo` varchar(30) NOT NULL,
  `Contrasena` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tusuarios`
--

INSERT INTO `tusuarios` (`CedulaU`, `NombreU`, `Usuario`, `Cargo`, `Contrasena`) VALUES
(30955611, 'Pedro perez', 'Pedro1', 'Entrenador', '12345678'),
(31298123, 'George kakajakian', 'GeorgeK', 'Gerente', '123456789');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tatletas`
--
ALTER TABLE `tatletas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tatletaslogros`
--
ALTER TABLE `tatletaslogros`
  ADD KEY `codEvento` (`codEvento`),
  ADD KEY `id_atleta1` (`id_atleta1`);

--
-- Indices de la tabla `tclaseentrenadores`
--
ALTER TABLE `tclaseentrenadores`
  ADD KEY `cedulaE` (`cedulaE`),
  ADD KEY `idclases2` (`Idclases`);

--
-- Indices de la tabla `tclases`
--
ALTER TABLE `tclases`
  ADD PRIMARY KEY (`idclases`);

--
-- Indices de la tabla `tclasesatletas`
--
ALTER TABLE `tclasesatletas`
  ADD KEY `id2` (`id2`),
  ADD KEY `idclases` (`idclases`);

--
-- Indices de la tabla `tclaseshorarios`
--
ALTER TABLE `tclaseshorarios`
  ADD KEY `idclases1` (`idclases1`),
  ADD KEY `id2` (`id2`);

--
-- Indices de la tabla `tclub`
--
ALTER TABLE `tclub`
  ADD PRIMARY KEY (`numaccion`),
  ADD KEY `id_atleta` (`id_atleta`);

--
-- Indices de la tabla `tentrenadores`
--
ALTER TABLE `tentrenadores`
  ADD PRIMARY KEY (`CedulaE`);

--
-- Indices de la tabla `thorarios`
--
ALTER TABLE `thorarios`
  ADD PRIMARY KEY (`id2`);

--
-- Indices de la tabla `tlogros`
--
ALTER TABLE `tlogros`
  ADD PRIMARY KEY (`Cod_evento`);

--
-- Indices de la tabla `tpagos`
--
ALTER TABLE `tpagos`
  ADD PRIMARY KEY (`idpago`),
  ADD KEY `id_atleta` (`id_atleta`);

--
-- Indices de la tabla `tusuarios`
--
ALTER TABLE `tusuarios`
  ADD PRIMARY KEY (`CedulaU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tatletas`
--
ALTER TABLE `tatletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tentrenadores`
--
ALTER TABLE `tentrenadores`
  MODIFY `CedulaE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30987655;

--
-- AUTO_INCREMENT de la tabla `thorarios`
--
ALTER TABLE `thorarios`
  MODIFY `id2` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tlogros`
--
ALTER TABLE `tlogros`
  MODIFY `Cod_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tpagos`
--
ALTER TABLE `tpagos`
  MODIFY `idpago` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tatletaslogros`
--
ALTER TABLE `tatletaslogros`
  ADD CONSTRAINT `tatletaslogros_ibfk_1` FOREIGN KEY (`codEvento`) REFERENCES `tlogros` (`Cod_evento`) ON DELETE CASCADE,
  ADD CONSTRAINT `tatletaslogros_ibfk_2` FOREIGN KEY (`id_atleta1`) REFERENCES `tatletas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tclaseentrenadores`
--
ALTER TABLE `tclaseentrenadores`
  ADD CONSTRAINT `cedulaE` FOREIGN KEY (`cedulaE`) REFERENCES `tentrenadores` (`CedulaE`),
  ADD CONSTRAINT `idclases2` FOREIGN KEY (`Idclases`) REFERENCES `tclases` (`idclases`);

--
-- Filtros para la tabla `tclasesatletas`
--
ALTER TABLE `tclasesatletas`
  ADD CONSTRAINT `tclasesatletas_ibfk_1` FOREIGN KEY (`id2`) REFERENCES `tatletas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tclasesatletas_ibfk_2` FOREIGN KEY (`idclases`) REFERENCES `tclases` (`idclases`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tclaseshorarios`
--
ALTER TABLE `tclaseshorarios`
  ADD CONSTRAINT `tclaseshorarios_ibfk_1` FOREIGN KEY (`idclases1`) REFERENCES `tclases` (`idclases`) ON DELETE CASCADE,
  ADD CONSTRAINT `tclaseshorarios_ibfk_2` FOREIGN KEY (`id2`) REFERENCES `thorarios` (`id2`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `tclub`
--
ALTER TABLE `tclub`
  ADD CONSTRAINT `tclub_ibfk_1` FOREIGN KEY (`id_atleta`) REFERENCES `tatletas` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `tpagos`
--
ALTER TABLE `tpagos`
  ADD CONSTRAINT `tpagos_ibfk_1` FOREIGN KEY (`id_atleta`) REFERENCES `tatletas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
