DROP TABLE IF EXISTS `computadoras`;
CREATE TABLE `computadoras` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `procesador` int(11) NOT NULL DEFAULT '1',
  `monitor` int(11) DEFAULT '1',
  `detalles` char(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `procesador` (`procesador`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `discos`;
CREATE TABLE `discos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingreso` DATE NOT NULL DEFAULT CURRENT_DATE,
  `funciona` INT(1) DEFAULT NULL,
  `capacidad` int(11) NOT NULL,
  `marca` char(32) DEFAULT NULL,
  `interfaz` char(32) DEFAULT NULL,
  `detalles` char(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `memorias`;
CREATE TABLE `memorias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingreso` DATE NOT NULL DEFAULT CURRENT_DATE,
  `funciona` INT(1) DEFAULT NULL,
  `paso_test` INT(1) DEFAULT NULL,
  `capacidad` int(11) NOT NULL,
  `detalles` char(128) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `monitores`;
CREATE TABLE `monitores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingreso` DATE NOT NULL DEFAULT CURRENT_DATE,
  `funciona` tinyint(1) DEFAULT NULL,
  `resolucion` int(11) DEFAULT NULL,
  `pulgadas` int(11) NOT NULL DEFAULT '14',
  `marca` char(32) DEFAULT NULL,
  `detalles` char(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

DROP TABLE IF EXISTS `procesadores`;
CREATE TABLE `procesadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ingreso` DATE NOT NULL DEFAULT CURRENT_DATE,
  `funciona` INT(1) DEFAULT NULL,
  `paso_test` INT(1) DEFAULT NULL,
  `capacidad` int(11) NOT NULL,
  `detalles` char(128) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
