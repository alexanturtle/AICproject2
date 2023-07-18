CREATE TABLE IF NOT EXISTS `shop` (
  `id` int NOT NULL AUTO_INCREMENT,
  `location` text,
  `item_type` text,
  PRIMARY KEY (`id`)
);
INSERT INTO `shop` 
	(`location`, `item_type`) 
VALUES
(
