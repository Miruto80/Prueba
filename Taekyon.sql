

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";



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



CREATE TABLE `tpagos`(
    `cedula` int(15) NOT NULL,
    `fechadepago` date NOT NULL,
    `Monto` float NOT NULL,
    `Comprobantedepago` int (11) PRIMARY KEY,
    `tipopago` VARCHAR(30) NOT NULL,
    `numeroaccion` int(15) NOT NULL
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
    `Tipodehorario` varchar(30), 
    `id2` int, 
    `CedulaE2` int,
    `Edad` int NOT NULL,
    `EntrenadorH` varchar(30) NOT NULL,
    PRIMARY KEY (`id2`, `CedulaE2`)
) ENGINE=InnoDB;

INSERT INTO `tHorarios` (`Tipodehorario`, `id2`, `CedulaE2`, `Edad`, `EntrenadorH`) VALUES
('Adulto', 1, 30560144, 23, 'George Kahakajian'),
('Juvenil', 2, 30560145, 24,'Elias Hoss'),
('Infantil', 3, 30560146, 30, 'Antonio Sabino');


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