CREATE TABLE IF NOT EXISTS `shop` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` text,
  `shop_type` text,
  PRIMARY KEY (`id`)
);

INSERT INTO `shop` 
    (`name`, `shop_type`)
VALUES
     ('Atdp_merch', 'merch_store'),
     ('Atdp_books', 'book_store'),
     ('Atdp_boba', 'boba_store');


CREATE TABLE IF NOT EXISTS `items` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int,
  `price` int,
  `category` text,  
  `item_name` text,
  `item_image` text,  
  PRIMARY KEY (`id`)
);
INSERT INTO `items` 
    (`shop_id`, `price`, `category`, `item_name`, `item_image`)
VALUES
 (1, 6, 'boba', 'rose milk tea', 'rose.jpg'),
  (1, 6, 'boba', 'earl grey milk tea', 'earl.jpg'),
  (1, 6, 'boba', 'caramel milk tea', 'caramel.jpg'),
  (1, 7, 'boba', 'strawberry milk tea', 'strawberry.jpg'),
  (1, 6, 'boba', 'thai milk tea', 'thai.jpg'),
  (1, 7, 'boba', 'Matcha', 'macha.jpg'),
  (1, 6, 'boba', 'Jasmine milk tea', 'jasmine.jpg'),
  (1, 6, 'boba', 'Taro', 'taro.jpg'),
  (1, 7, 'snack', 'Popcorn Chicken', 'chicken.jpg'),
  (1, 6, 'snack', 'French fries', 'fries.jpeg'),
  (1, 7, 'snack', 'Lobster balls', 'lobster.jpeg'),
  (1, 6, 'snack', 'Chicken pot-stickers', 'pot.jpeg'),

  
  

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int,
  `user_name` varchar(15),
  `password` varchar(64),
  PRIMARY KEY (`id`)
);
INSERT INTO `admin` 
    (`shop_id`, `user_name`, `password`)
VALUES
     (1, 'zoya', 'password'),
      (2, 'richard','password'),
     (3, 'riti', 'password');


CREATE TABLE IF NOT EXISTS `customer` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(15),
  `password` varchar(64),
  PRIMARY KEY (`id`)
);
INSERT INTO `customer` 
    (`user_name`, `password`)
VALUES
     ('blablab','$2y$10$wevI/TfHziZxV5yium92be.RVrWjNRWnRAkN5XT9lzeM1yG4NS9fe'),
      ('yayay', 'password'),
     ('coolcool', 'password');

CREATE TABLE IF NOT EXISTS `purchased` (
  `id` int NOT NULL AUTO_INCREMENT,
  `customer_id` int,
  `item_id` int,
  `bought` text,
  PRIMARY KEY (`id`)
);
INSERT INTO `purchased` 
    (`customer_id`,`item_id`,`bought`)
VALUES
  (1,1,'yes'),
  (2,2,'no'),
  (3,3,'yes');