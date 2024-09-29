-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-09-2024 a las 00:52:57
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
-- Base de datos: `taekyon1`
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
  `Correo` varchar(50) NOT NULL,
  `Telefono` int(20) NOT NULL,
  `Numerodeaccion` int(30) NOT NULL,
  `Cinturon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tatletas`
--

INSERT INTO `tatletas` (`id`, `cedula`, `apellidos`, `nombres`, `fechadenacimiento`, `sexo`, `Participacion`, `Direccion`, `Correo`, `Telefono`, `Numerodeaccion`, `Cinturon`) VALUES
(0, '30231853', 'Miguel Fernando', 'Torres Torres', '2004-08-10', 'M', 'Si','La mata','Mftt@gmail.com','04125889171','95','Blanco'),
(1, '29418245', 'Daisa', 'Perez', '1976-09-14', 'F', 'Si','Cabudare','dail@gmail.com','04242580141','36','Rojo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tatletaslogros`
--

CREATE TABLE `tatletaslogros` (
  `codEvento` int(15) NOT NULL,
  `id_atleta1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
  `id2` int(15) NOT NULL,
  `idclases` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclaseshorarios`
--

CREATE TABLE `tclaseshorarios` (
  `tipohorarios` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `idclases1` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tclub`
--

CREATE TABLE `tclub` (
  `numaccion` int(15) NOT NULL,
  `id_atleta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
(1, 30560144, 'Mendoza', 'Joaquin', '0414-5446656', 'VIII DAN'),
(2, 30678912, 'Ramirez', 'Carlos', '0414-1234567', 'VII DAN'),
(3, 30765498, 'Perez', 'Ana', '0416-2345678', 'VI DAN'),
(4, 30876543, 'Gomez', 'Luis', '0412-3456789', 'V DAN'),
(5, 30987654, 'Diaz', 'Maria', '0412-4567890', 'IV DAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `thorarios`
--

CREATE TABLE `thorarios` (
  `Tipodehorario` varchar(30) NOT NULL,
  `Edad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `id3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tlogros`
--

INSERT INTO `tlogros` (`Cod_evento`, `Nombre_de_evento`, `Fecha_del_evento`, `Logro_obtenido`, `categoria`, `id3`) VALUES
(1, 'Taekwondo Championship', '2024-05-15', '1ER LUGAR', 'POOMSAE', 1),
(2, 'Copa PAL LI', '2024-06-20', '2DO LUGAR', 'KYORUGUI', 2),
(3, 'Copa UFT', '2024-07-10', '3ER LUGAR', 'AMBAS', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tpagos`
--

CREATE TABLE `tpagos` (
  `cedula` int(15) NOT NULL,
  `fechadepago` date NOT NULL,
  `Monto` float NOT NULL,
  `tipopago` varchar(30) NOT NULL,
  `numeroaccion` int(15) NOT NULL,
  `id_atleta` int(11) NOT NULL,
  `Comprobantedepago` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Volcado de datos para la tabla `tpagos`
--

INSERT INTO `tpagos` (`cedula`, `fechadepago`, `Monto`, `tipopago`, `numeroaccion`, `id_atleta`, `Comprobantedepago`) VALUES
(26532154, '2024-09-21', 20, 'tranferencia', 0, 0, 6254);

-- Estructura de tabla para la tabla `tusuarios`

CREATE TABLE `tusuarios`(
`CedulaU` int PRIMARY KEY,
`NombreU` varchar(30) NOT NULL,
`Usuario`  varchar(30) NOT NULL,
`Cargo`  varchar(30) NOT NULL,
`Contrasena`  varchar(30) NOT NULL
)ENGINE=InnoDB;

INSERT INTO `tusuarios`(`CedulaU`, `NombreU`, `Usuario`, `Cargo`,`Contrasena`) VALUES
(31298123,'George kakajakian','GeorgeK','Gerente','123456789');
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
  ADD KEY `tipohorarios` (`tipohorarios`);

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
  ADD PRIMARY KEY (`Tipodehorario`);

--
-- Indices de la tabla `tlogros`
--
ALTER TABLE `tlogros`
  ADD PRIMARY KEY (`Cod_evento`);

--
-- Indices de la tabla `tpagos`
--
ALTER TABLE `tpagos`
  ADD KEY `id` (`id_atleta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tentrenadores`
--
ALTER TABLE `tentrenadores`
  MODIFY `CedulaE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30987655;

--
-- AUTO_INCREMENT de la tabla `tlogros`
--
ALTER TABLE `tlogros`
  MODIFY `Cod_evento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tatletaslogros`
--
ALTER TABLE `tatletaslogros`
  ADD CONSTRAINT `codEvento` FOREIGN KEY (`codEvento`) REFERENCES `tlogros` (`Cod_evento`),
  ADD CONSTRAINT `id_atleta1` FOREIGN KEY (`id_atleta1`) REFERENCES `tatletas` (`id`);

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
  ADD CONSTRAINT `id2` FOREIGN KEY (`id2`) REFERENCES `tatletas` (`id`),
  ADD CONSTRAINT `idclases` FOREIGN KEY (`idclases`) REFERENCES `tclases` (`idclases`);

--
-- Filtros para la tabla `tclaseshorarios`
--
ALTER TABLE `tclaseshorarios`
  ADD CONSTRAINT `idclases1` FOREIGN KEY (`idclases1`) REFERENCES `tclases` (`idclases`),
  ADD CONSTRAINT `tipohorarios` FOREIGN KEY (`tipohorarios`) REFERENCES `thorarios` (`Tipodehorario`);

--
-- Filtros para la tabla `tclub`
--
ALTER TABLE `tclub`
  ADD CONSTRAINT `id_atleta` FOREIGN KEY (`id_atleta`) REFERENCES `tatletas` (`id`);

--
-- Filtros para la tabla `tpagos`
--
ALTER TABLE `tpagos`
  ADD CONSTRAINT `id` FOREIGN KEY (`id_atleta`) REFERENCES `tatletas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
