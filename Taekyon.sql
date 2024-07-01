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
(5, '30987654', 'Diaz', 'Maria', '0412-4567890', 'IV DAN'),
(6, '31098765', 'Lopez', 'Pedro', '0416-5678901', 'III DAN'),
(7, '31123456', 'Fernandez', 'Lucia', '0416-6789012', 'II DAN'),
(8, '31234567', 'Sanchez', 'Miguel', '0412-7890123', 'I DAN'),
(9, '31345678', 'Martinez', 'Isabel', '0414-8901234', 'IX DAN'),
(10, '31456789', 'Gonzalez', 'Roberto', '0414-9012345', 'VIII DAN'),
(11, '31567890', 'Torres', 'Rafael', '0416-1234561', 'VII DAN'),
(12, '31678901', 'Suarez', 'Elena', '0416-2345672', 'VI DAN'),
(13, '31789012', 'Ortega', 'Juan', '0416-3456783', 'V DAN'),
(14, '31890123', 'Rojas', 'Patricia', '0416-4567894', 'IV DAN'),
(15, '31901234', 'Castro', 'Hector', '0416-5678905', 'III DAN'),
(16, '32012345', 'Mendez', 'Clara', '0416-6789016', 'II DAN'),
(17, '32123456', 'Vargas', 'Carlos', '0416-7890127', 'I DAN'),
(18, '32234567', 'Guerrero', 'Paula', '0416-8901238', 'IX DAN'),
(19, '32345678', 'Reyes', 'Pedro', '0416-9012349', 'VIII DAN'),
(20, '32456789', 'Molina', 'Gabriela', '0416-0123450', 'VII DAN'),
(21, '32567890', 'Cruz', 'Esteban', '0416-1234561', 'VI DAN'),
(22, '32678901', 'Morales', 'Andrea', '0416-2345672', 'V DAN'),
(23, '32789012', 'Medina', 'Luis', '0416-3456783', 'IV DAN'),
(24, '32890123', 'Pena', 'Diana', '0416-4567894', 'III DAN'),
(25, '32901234', 'Herrera', 'Jorge', '0416-5678905', 'II DAN'),
(26, '33012345', 'Silva', 'Sofia', '0416-6789016', 'I DAN'),
(27, '33123456', 'Espinoza', 'Marcos', '0416-7890127', 'IX DAN'),
(28, '33234567', 'Vega', 'Carla', '0416-8901238', 'VIII DAN'),
(29, '33345678', 'Alvarez', 'Fernando', '0416-9012349', 'VII DAN'),
(30, '33456789', 'Roman', 'Isabel', '0416-0123450', 'VI DAN'),
(31, '33567890', 'Campos', 'Ricardo', '0416-1234561', 'V DAN'),
(32, '33678901', 'Fuentes', 'Laura', '0416-2345672', 'IV DAN'),
(33, '33789012', 'Cabrera', 'Julio', '0416-3456783', 'III DAN'),
(34, '33890123', 'Lozano', 'Marina', '0416-4567894', 'II DAN'),
(35, '33901234', 'Paredes', 'Pablo', '0416-5678905', 'I DAN'),
(36, '34012345', 'Rivas', 'Angela', '0416-6789016', 'IX DAN'),
(37, '34123456', 'Guzman', 'Sergio', '0416-7890127', 'VIII DAN'),
(38, '34234567', 'Navarro', 'Tatiana', '0416-8901238', 'VII DAN'),
(39, '34345678', 'Rivera', 'Victor', '0416-9012349', 'VI DAN'),
(40, '34456789', 'Ramos', 'Monica', '0416-0123450', 'V DAN'),
(41, '34567890', 'Chavez', 'Alberto', '0416-1234561', 'IV DAN'),
(42, '34678901', 'Salazar', 'Luz', '0416-2345672', 'III DAN'),
(43, '34789012', 'Delgado', 'Hugo', '0416-3456783', 'II DAN'),
(44, '34890123', 'Muñoz', 'Adriana', '0416-4567894', 'I DAN'),
(45, '34901234', 'Carrillo', 'Mario', '0416-5678905', 'IX DAN'),
(46, '35012345', 'Soto', 'Lucia', '0416-6789016', 'VIII DAN'),
(47, '35123456', 'Juarez', 'Federico', '0416-7890127', 'VII DAN'),
(48, '35234567', 'Mejia', 'Valeria', '0416-8901238', 'VI DAN'),
(49, '35345678', 'Flores', 'Raul', '0416-9012349', 'V DAN'),
(50, '35456789', 'Serrano', 'Lilian', '0416-0123450', 'IV DAN'),
(51, '35567890', 'Aguilar', 'Jose', '0416-1234561', 'III DAN'),
(52, '35678901', 'Nieves', 'Marta', '0416-2345672', 'II DAN'),
(53, '35789012', 'Palacios', 'Enrique', '0416-3456783', 'I DAN'),
(54, '35890123', 'Tovar', 'Eva', '0416-4567894', 'IX DAN'),
(55, '35901234', 'Bermudez', 'Oscar', '0416-5678905', 'VIII DAN'),
(56, '36012345', 'Cortez', 'Daniela', '0416-6789016', 'VII DAN'),
(57, '36123456', 'Arroyo', 'Manuel', '0416-7890127', 'VI DAN'),
(58, '36234567', 'Figueroa', 'Teresa', '0416-8901238', 'V DAN'),
(59, '36345678', 'Mora', 'Eduardo', '0416-9012349', 'IV DAN'),
(60, '36456789', 'Santana', 'Claudia', '0416-0123450', 'III DAN');


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