DROP TABLE IF EXISTS `computadoras`;
CREATE TABLE `computadoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL DEFAULT '1',
  `procesador_id` int(11) NOT NULL DEFAULT '1',
  `disco_rigido` varchar(255) NOT NULL DEFAULT '1',
  `memoria` varchar(255) NOT NULL DEFAULT '1',
  `descartada` tinyint(1) NOT NULL DEFAULT '0',
  `detalles` text DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `procesador_id` (`procesador_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `monitores`;
CREATE TABLE `monitores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingreso` DATE,
  `funciona` tinyint(1) DEFAULT NULL,
  `resolucion` int(11) DEFAULT NULL,
  `pulgadas` int(11) NOT NULL DEFAULT '14',
  `marca` char(32) DEFAULT NULL,
  `detalles` char(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `procesadores`;
CREATE TABLE `procesadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(80) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

