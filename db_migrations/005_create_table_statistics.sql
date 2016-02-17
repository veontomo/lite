CREATE TABLE IF NOT EXISTS `statistics` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `campaign_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT 'nome della campagna',
  `views` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'il numero di visualizazzioni',
  `redirects` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'il numero di click',
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaign_name` (`campaign_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='contiene le staistiche della campagna in tempo reale' AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
