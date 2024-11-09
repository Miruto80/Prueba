

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
    `numeroaccion` int(15) NOT NULL,
    `nombres` VARCHAR(20)NOT NULL,
    `apellidos` VARCHAR(20)NOT NULL 

) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tpagos` (`Comprobantedepago`, `Monto`,`fechadepago`,`cedula`,`nombres`,`apellidos`)
VALUES (22,12.2,'2024/02/24',24351625,'pepe','gomez');

CREATE TABLE `tentrenadores` (
  `id` INT(11) NOT NULL,
  `CedulaE` INT PRIMARY KEY AUTO_INCREMENT,
  `Apellido` VARCHAR(30) NOT NULL,
  `Nombre` VARCHAR(30) NOT NULL,
  `Telefono` VARCHAR(15) NOT NULL,
  `Jerarquiadecinturon` VARCHAR(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tentrenadores` (`id`, `CedulaE`, `Apellido`, `Nombre`, `Telefono`, `Jerarquiadecinturon`) VALUES
(1, '30560144', 'Mendoza', 'Joaquin', '0414-5446656', 'VIII DAN'),
(2, '30678912', 'Ramirez', 'Carlos', '0414-1234567', 'VII DAN'),
(3, '30765498', 'Perez', 'Ana', '0416-2345678', 'VI DAN'),
(4, '30876543', 'Gomez', 'Luis', '0412-3456789', 'V DAN'),
(5, '30987654', 'Diaz', 'Maria', '0412-4567890', 'IV DAN');

CREATE TABLE `tHorarios`(
    `Tipodehorario` varchar(30), 
    `id2` int, 
    `cedula` int,
    `apellidos` varchar(30) NOT NULL,
    `nombres` varchar(30) NOT NULL,
    `Edad` int NOT NULL,
    `Nombre` varchar(30) NOT NULL,
    `Apellido` varchar(30) NOT NULL,
    PRIMARY KEY (`id2`, `cedula`)
) ENGINE=InnoDB;


INSERT INTO `tHorarios` (`Tipodehorario`, `id2`, `cedula`, `nombres`, `apellidos`, `Edad`, `Nombre`, `Apellido`) VALUES
('Adulto', 1, 30560144, 'John', 'Smith', 23, 'George', 'Kahakajian'),
('Juvenil', 2, 30560145, 'Jane', 'Doe', 24, 'Elias', 'Hoss'),
('Infantil', 3, 30560146, 'Charlie', 'Brown', 30, 'Antonio', 'Sabino');



CREATE TABLE `tlogros` (
    `Cod_evento` INT NOT NULL AUTO_INCREMENT,
    `Nombre_de_evento` VARCHAR(30) NOT NULL,
    `Fecha_del_evento` DATE NOT NULL,
    `Logro_obtenido` VARCHAR(30) NOT NULL,
    `categoria` VARCHAR(30) NOT NULL,
    `NombreLA` VARCHAR(30) NOT NULL,
    `id3` INT NOT NULL,
    PRIMARY KEY (`Cod_evento`)
) ENGINE=InnoDB;

INSERT INTO `tlogros` (`Nombre_de_evento`, `Fecha_del_evento`, `Logro_obtenido`,`categoria`,`NombreLA`,`id3`) VALUES
('Taekwondo Championship', '2024-05-15', '1ER LUGAR', 'POOMSAE','Joaquin mendoza', 1),
('Copa PAL LI', '2024-06-20', '2DO LUGAR', 'KYORUGUI','Miguel torres' , 2),
('Copa UFT', '2024-07-10', '3ER LUGAR', 'AMBAS','Rhicahrd virguez', 3);


CREATE TABLE `tusuarios`(
`CedulaU` int PRIMARY KEY,
`NombreU` varchar(30) NOT NULL,
`Usuario`  varchar(30) NOT NULL,
`Cargo`  varchar(30) NOT NULL,
`Contrasena`  varchar(30) NOT NULL
)ENGINE=InnoDB;

INSERT INTO `tusuarios`(`CedulaU`, `NombreU`, `Usuario`, `Cargo`,`Contrasena`) VALUES
(31298123,'George kakajakian','GeorgeK','Gerente','123456789'),
(30955611,'Pedro perez','Pedro1','Entrenador','12345678');
COMMIT;