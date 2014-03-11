
CREATE TABLE IF NOT EXISTS `api_siteminder` (
  `as_id` int(255) NOT NULL AUTO_INCREMENT,
  `as_date` date NOT NULL,
  `as_order_serial` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `as_source` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `as_dtime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`as_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;
