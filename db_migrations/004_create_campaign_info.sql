/*Table structure for table `mailing` */
CREATE TABLE `mailing` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL COMMENT 'nome della spedizione',
  `dal` date NOT NULL COMMENT 'data della inizio della spedizione',
  `al` date NOT NULL COMMENT 'data della fine della spedizione',
  `quantita` int(10) unsigned DEFAULT NULL COMMENT 'numero delle email inviate',
  `archiviato` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'TRUE se le statistiche sono state archiviate, FALSE altrimenti',
  `note` varchar(255) DEFAULT NULL COMMENT 'eventuali note riguardanti la spedizione',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Table structure for table `mailing_link` */
CREATE TABLE `mailing_link` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `id_mailing` int(10) unsigned NOT NULL COMMENT 'codice della spedizione',
  `risorsa` tinytext NOT NULL COMMENT 'url per un link o immagine presente nella newsletter della spedizione',
  `destinazione` tinytext COMMENT 'url al quale reindirizzare. Rimane vuoto per le view.',
  `note` varchar(255) DEFAULT NULL COMMENT 'eventuali note',
  PRIMARY KEY (`id`),
  KEY `fk_mailing_id` (`id_mailing`),
  CONSTRAINT `fk_mailing_id` FOREIGN KEY (`id_mailing`) REFERENCES `mailing` (`id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

