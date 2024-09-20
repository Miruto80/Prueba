

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


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
                  `Cinturon` varchar(20) NOT NULL,
                  PRIMARY KEY (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


                CREATE TABLE `tatletaslogros` (
                  `codEvento` int(15) NOT NULL,
                  `id_atleta1` int(11) NOT NULL,
                  KEY `codEvento` (`codEvento`),
                  KEY `id_atleta1` (`id_atleta1`),
                  CONSTRAINT `codEvento` FOREIGN KEY (`codEvento`) REFERENCES `tlogros` (`Cod_evento`),
                  CONSTRAINT `id_atleta1` FOREIGN KEY (`id_atleta1`) REFERENCES `tatletas` (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


                CREATE TABLE `tclaseentrenadores` (
                  `cedulaE` int(15) NOT NULL,
                  `Idclases` int(15) NOT NULL,
                  KEY `cedulaE` (`cedulaE`),
                  KEY `idclases2` (`Idclases`),
                  CONSTRAINT `cedulaE` FOREIGN KEY (`cedulaE`) REFERENCES `tentrenadores` (`CedulaE`),
                  CONSTRAINT `idclases2` FOREIGN KEY (`Idclases`) REFERENCES `tclases` (`idclases`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


                CREATE TABLE `tclases` (
                  `duracionclase` int(15) NOT NULL,
                  `idclases` int(11) NOT NULL,
                  `Edadesclases` int(11) NOT NULL,
                  PRIMARY KEY (`idclases`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


                CREATE TABLE `tclasesatletas` (
                  `id2` int(15) NOT NULL,
                  `idclases` int(11) NOT NULL,
                  KEY `id2` (`id2`),
                  KEY `idclases` (`idclases`),
                  CONSTRAINT `id2` FOREIGN KEY (`id2`) REFERENCES `tatletas` (`id`),
                  CONSTRAINT `idclases` FOREIGN KEY (`idclases`) REFERENCES `tclases` (`idclases`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


                CREATE TABLE `tclaseshorarios` (
                  `tipohorarios` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                  `idclases1` int(11) NOT NULL,
                  KEY `idclases1` (`idclases1`),
                  KEY `tipohorarios` (`tipohorarios`),
                  CONSTRAINT `idclases1` FOREIGN KEY (`idclases1`) REFERENCES `tclases` (`idclases`),
                  CONSTRAINT `tipohorarios` FOREIGN KEY (`tipohorarios`) REFERENCES `thorarios` (`Tipodehorario`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


                CREATE TABLE `tclub` (
                  `numaccion` int(15) NOT NULL,
                  `id_atleta` int(11) NOT NULL,
                  PRIMARY KEY (`numaccion`),
                  KEY `id_atleta` (`id_atleta`),
                  CONSTRAINT `id_atleta` FOREIGN KEY (`id_atleta`) REFERENCES `tatletas` (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;



CREATE TABLE `tpagos` (
                  `cedula` int(15) NOT NULL,
                  `fechadepago` date NOT NULL,
                  `Monto` float NOT NULL,
                  `tipopago` varchar(30) NOT NULL,
                  `numeroaccion` int(15) NOT NULL,
                  `id_atleta` int(11) NOT NULL,
                  `Comprobantedepago` int(11) NOT NULL,
                  KEY `id` (`id_atleta`),
                  CONSTRAINT `id` FOREIGN KEY (`id_atleta`) REFERENCES `tatletas` (`id`)
                ) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `tentrenadores` (
                  `id` int(11) NOT NULL,
                  `CedulaE` int(11) NOT NULL AUTO_INCREMENT,
                  `Apellido` varchar(30) NOT NULL,
                  `Nombre` varchar(30) NOT NULL,
                  `Telefono` varchar(15) NOT NULL,
                  `Jerarquiadecinturon` varchar(30) NOT NULL,
                  PRIMARY KEY (`CedulaE`)
                ) ENGINE=InnoDB AUTO_INCREMENT=30987655 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;


CREATE TABLE `thorarios` (
                  `Tipodehorario` varchar(30) NOT NULL,
                  `Edad` int(11) NOT NULL,
                  PRIMARY KEY (`Tipodehorario`)
                ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `tEventos`( 
    `Codevento` int PRIMARY KEY, 
    `id3` int, 
    `NombreEvento` varchar(30) NOT NULL, 
    `Logroobtenido` varchar(30) NOT NULL, 
    FOREIGN KEY (`id3`) REFERENCES `tatletas`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB;

CREATE TABLE `tlogros` (
                  `Cod_evento` int(11) NOT NULL AUTO_INCREMENT,
                  `Nombre_de_evento` varchar(30) NOT NULL,
                  `Fecha_del_evento` date NOT NULL,
                  `Logro_obtenido` varchar(30) NOT NULL,
                  `categoria` varchar(30) NOT NULL,
                  `id3` int(11) NOT NULL,
                  PRIMARY KEY (`Cod_evento`)
                ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `tusuarios`(
`CedulaU` int PRIMARY KEY,
`NombreU` varchar(30) NOT NULL,
`Usuario`  varchar(30) NOT NULL,
`Cargo`  varchar(30) NOT NULL,
`Contrasena`  varchar(30) NOT NULL
)ENGINE=InnoDB;

INSERT INTO `tusuarios`(`CedulaU`, `NombreU`, `Usuario`, `Cargo`,`Contrasena`) VALUES
(31298123,'George kakajakian','GeorgeK','Gerente','123456789');

COMMIT;