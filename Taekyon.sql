-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-09-2023 a las 03:00:58
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Estructura de tabla para la tabla `tatletas`
--

CREATE TABLE `tatletas` (
  `id` int(11) NOT NULL,
  `cedula` varchar(15) NOT NULL,
  `apellidos` varchar(50) NOT NULL,
  `nombres` varchar(50) NOT NULL,
  `fechadenacimiento` date NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `Participacion` varchar(30) NOT NULL,
  `Direccion` varchar(30) NOT NULL,
  `Correo` varchar(30) NOT NULL,
  `Telefono` varchar(30) NOT NULL,
  `Numerodeaccion` varchar(30) NOT NULL,
  `Cinturon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tatletas`
--

INSERT INTO `tatletas` (`id`, `cedula`, `nombres`, `apellidos`, `fechadenacimiento`, `sexo`, `Participacion`,`Direccion`, `Correo`,`Telefono`,`Numerodeaccion`,`Cinturon`) VALUES
(1, '30231853', 'Miguel Fernando', 'Torres Torres', '2004-08-10', 'M', 'Si','La mata','Mftt@gmail.com','04125889171','95','Blanco'),
(2, '29418245', 'Daisa', 'Perez', '1976-09-14', 'F', 'Si','Cabudare','dail@gmail.com','04242580141','36','Rojo');

--
-- Índices para tablas volcadas
--

ALTER TABLE `tatletas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

ALTER TABLE `tatletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `tpagos`(
    `cedula` int(15),
    `fechadepago` date NOT NULL,
    `Monto` float NOT NULL,
    `Comprobantedepago` int (11) PRIMARY KEY
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tpagos` (`Comprobantedepago`, `Monto`,`fechadepago`,`cedula`)
VALUES (22,12.2,'2024/02/24',24351625);

CREATE TABLE `tentrenadores` (
  `id` int(11) NOT NULL,
  `CedulaE` int PRIMARY key,
  `Apellido` varchar(30) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Telefono` varchar(15) NOT NULL,
  `Jerarquiadecinturon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

INSERT INTO `tentrenadores` (`id`, `CedulaE`, `Apellido`, `Nombre`, `Telefono`, `Jerarquiadecinturon`) VALUES
(1, '30560144', 'Mendoza', 'Joaquin', '0414-5446656', 'VIII DAN'),
(2, '30678912', 'Ramirez', 'Carlos', '0414-1234567', 'VII DAN'),
(3, '30765498', 'Perez', 'Ana', '0416-2345678', 'VI DAN'),
(4, '30876543', 'Gomez', 'Luis', '0412-3456789', 'V DAN'),
(5, '30987654', 'Diaz', 'Maria', '0412-4567890', 'IV DAN');

CREATE TABLE `tHorarios`( 
    `Tipodehorario` varchar(30) PRIMARY KEY, 
    `id2` int, 
    `CedulaE2` int,
    `Edad` int NOT NULL,
    FOREIGN KEY (`id2`) REFERENCES `tatletas`(`id`) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (`CedulaE2`) REFERENCES `tentrenadores`(`CedulaE`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

INSERT INTO `tHorarios` (`Tipodehorario`, `id2`, `CedulaE2`, `Edad`) VALUES
('Juvenil', 1, 30560144, 23);

CREATE TABLE `tEventos`( 
    `Codevento` int PRIMARY KEY, 
    `id3` int, 
    `NombreEvento` varchar(30) NOT NULL, 
    `Logroobtenido` varchar(30) NOT NULL, 
    FOREIGN KEY (`id3`) REFERENCES `tatletas`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

INSERT INTO `tEventos` (`Codevento`, `id3`, `NombreEvento`, `Logroobtenido`) VALUES
(1, 1, 'Torneo Marcial', '1er lugar');

COMMIT;