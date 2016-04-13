-- --------------------------------------------------------

CREATE TABLE `#__sightings_sightings` (
  `sightings_sighting_id` bigint(11) NOT NULL AUTO_INCREMENT,
  `node_id` bigint(11) NOT NULL,
  PRIMARY KEY (`sightings_sighting_id`),
  UNIQUE KEY `node_id` (`node_id`)
) ENGINE=InnoDB;

INSERT INTO #__migrator_versions (`version`,`component`) VALUES(1, 'sightings') ON DUPLICATE KEY UPDATE `version` = 1;