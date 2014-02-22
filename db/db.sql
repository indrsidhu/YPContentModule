CREATE TABLE IF NOT EXISTS `yp_content` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `lang` varchar(16) DEFAULT 'en_us',
  `content_title` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  `content_description` text,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) DEFAULT '1',
  `content_group` varchar(45) DEFAULT 'GENERAL',
  `created` date DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1;
