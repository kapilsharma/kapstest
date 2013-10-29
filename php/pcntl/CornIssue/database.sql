---------------------------------------------
-- Dummy table for contacts.
---------------------------------------------
CREATE TABLE IF NOT EXISTS `pcntl_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


CREATE TABLE IF NOT EXISTS `pcntl_email` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;