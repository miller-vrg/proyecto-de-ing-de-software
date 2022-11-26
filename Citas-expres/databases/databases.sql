-- abp_requerimientos.citas definition
CREATE DATABASES abp_requerimientos;

USE abp_requerimientos;

-- abp_requerimientos.usuarios definition


CREATE TABLE `citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(100) NOT NULL,
  `fecha_cita` datetime NOT NULL,
  `id_user` varchar(100) NOT NULL,
  `id_medico` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `citas_FK` (`id_user`),
  KEY `citas_FK_1` (`id_medico`),
  CONSTRAINT `citas_FK` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`user`) ON UPDATE CASCADE,
  CONSTRAINT `citas_FK_1` FOREIGN KEY (`id_medico`) REFERENCES `medicos` (`user`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

CREATE TABLE `medicos` (
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `cc` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `especializacion` varchar(100) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `registros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_registro` datetime NOT NULL DEFAULT current_timestamp(),
  `id_citas` int(11) NOT NULL,
  `estado` varchar(100) NOT NULL DEFAULT 'Pendiente',
  PRIMARY KEY (`id`),
  KEY `registros_FK` (`id_citas`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

CREATE TABLE `usuarios` (
  `user` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `edad` int(11) NOT NULL,
  `cc` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY (`user`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
