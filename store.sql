CREATE TABLE IF NOT EXISTS `shop` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `shop_type` text
  PRIMARY KEY (`id`)
);
INSERT INTO `shop` 
	(`name`, `shop_type`);
VALUES
     (`Atdp_merch`, `merch_store`),
    (`Atdp_books`, `book_store`),
     (`Atdp_boba`, `boba_store`);


CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int,
  `item_type` text,
  `price` int
  PRIMARY KEY (`id`)
);
INSERT INTO `item` 
	(`shop_id`, `item_type`, `price`);
VALUES
     (1, `clothes`, 25),
    (2, `books`, 15),
     (3, `boba`, 5);


CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int,
  `user_name` text,
<<<<<<< HEAD
  `password` text
=======
`password` text,
>>>>>>> 660e01a3e973e4d1292f349bd63aeaf5ca98cb25
  PRIMARY KEY (`id`)
);
INSERT INTO `admin` 
	(`shop_id`, `user_name`, `password`);
VALUES
     ();

CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` text,
  `password` text
  PRIMARY KEY (`id`)
);
INSERT INTO `customer` 
	(`user_name`, `password`);
VALUES
     ();

CREATE TABLE IF NOT EXISTS `purchased` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int,
  `item_id` int,
  `bought` text
  PRIMARY KEY (`id`)
);
INSERT INTO `purchased` 
	(`customer_id`,`item_id`,`bought`);
VALUES
     ();
    



