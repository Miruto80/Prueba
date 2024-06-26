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
-- Base de datos: `clase13`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
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
  `Numerodeaccion` varchar(30) NOT NULL

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `tatletas` (`id`, `cedula`, `nombres`, `apellidos`, `fechadenacimiento`, `sexo`, `Participacion`,`Direccion`, `Correo`,`Telefono`,`Numerodeaccion`) VALUES
(1, '30231853', 'Miguel Fernando', 'Torres Torres', '2004-08-10', 'M', 'Si','La mata','Mftt@gmail.com','04125889171','95');


--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `personas`
--
ALTER TABLE `tatletas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cedula` (`cedula`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `tatletas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

CREATE TABLE `tpagos`( 
    Comprobantedepago int PRIMARY KEY, 
    id1 int, 
    Monto float not Null, 
    fechadepago date NOT NULL,
    FOREIGN KEY (id1) REFERENCES tatletas(id) 
    )ENGINE=INNODB;

INSERT INTO `tpagos` (`Comprobantedepago`, `id1`, `Monto`,`fechadepago`) VALUES 
(22,1,12.2,'2024/02/24');

CREATE TABLE tHorarios( 
    Tipodehorario varchar(30) PRIMARY KEY, 
    id2 int, 
    Edad int not Null, 
    FOREIGN KEY (id2) REFERENCES tatletas(id) 
    )ENGINE=INNODB;

INSERT INTO `tHorarios` (`Tipodehorario`, `id2`, `Edad`)  VALUES
('Juvenil',1,23);

CREATE TABLE `tEntrenadores`( 
    CedulaE int PRIMARY key, 
    Nombre varchar(30) NOT NULL, 
    Apellido varchar(30) NOT NULL, 
    Telefono int NOT NULL, 
    Jerarquiadecinturon Varchar(30) 
     
 )ENGINE=INNODB;

INSERT INTO `tEntrenadores` (`CedulaE`, `Nombre`, `Apellido`, `Telefono`, `Jerarquiadecinturon`) VALUES
(14523692,'Joaquin','Mendoza',0412578963,'Negro');




/*Insert into tEntrenadores values(14523692,'Joaquin','Mendoza',0412578963,'Negro');*/;

CREATE TABLE tEventos( 
    Codevento int PRIMARY KEY, 
    id3 int, 
    NombreEvento varchar(30) not Null, 
    Logroobtenido varchar(30) not Null, 
    FOREIGN KEY (id3) REFERENCES tatletas(id) 
    )ENGINE=INNODB;

INSERT INTO `tEventos` (`Codevento`, `id3`, `NombreEvento`,`Logroobtenido`)  VALUES
(1,1,'Torneo Marcial','1er lugar');

/*Insert into tEventos values(1,1,'Torneo Marcial','1er lugar');*/;