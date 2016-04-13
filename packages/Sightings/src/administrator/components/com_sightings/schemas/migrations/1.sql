CREATE TABLE IF NOT EXISTS `#__sightings_sightings` (
  `sightings_sighting_id` bigint(20) NOT NULL auto_increment,
  `node_id` bigint(11) NOT NULL,
  PRIMARY KEY  (`sightings_sighting_id`),
  UNIQUE KEY `node_id` (`node_id`)
) ENGINE=InnoDB CHARACTER SET `utf8` COLLATE `utf8_general_ci`;
