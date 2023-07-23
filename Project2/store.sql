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
  (1, 24, 'clothes', 'Pink sweatshirt', 'pinksweat.jpg'),
  (1, 24, 'clothes', 'blue sweatshirt', 'bluesweat.jpg'),
 (1, 24, 'clothes', 'black sweatshirt', 'blacksweat.jpg'),
   (1, 24, 'clothes', 'white sweatshirt', 'whitesweat.jpg'),
  (1, 20, 'clothes', 'Pink shirt', 'pinkshirt.jpg'),
  (1, 20, 'clothes', 'blue shirt', 'blueshirt.jpg'),
  (1, 20, 'clothes', 'black shirt', 'blackshirt.jpg'),
  (1, 20, 'boba', 'white shirt', 'pinkshirt.jpg'),
  (2, 6, 'boba', 'thai milk tea', 'thai.jpg'),
  (2, 6, 'boba', 'Matcha', 'macha.jpg'),
  (2, 6, 'boba', 'Jasmine milk tea', 'jasmine.jpg'),
  (2, 6, 'boba', 'Taro', 'taro.jpg');
  
  

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `shop_id` int,
  `user_name` text,
  `password` text,
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
  `user_name` text,
  `password` text,
  PRIMARY KEY (`id`)
);
INSERT INTO `customer` 
    (`user_name`, `password`)
VALUES
     ('blablab','password'),
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