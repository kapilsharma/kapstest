---------------------------------------------
-- Dummy table for contacts.
---------------------------------------------
CREATE TABLE IF NOT EXISTS `pcntl_contacts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB;


