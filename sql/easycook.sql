drop database if exists EasyCook;
create database EasyCook;
use EasyCook;

create table user (
	id INT AUTO_INCREMENT PRIMARY KEY,	
	email VARCHAR(50),
    username VARCHAR(50),
	password VARCHAR(250)
) Engine=InnoDB;

create table orders (
	id INT AUTO_INCREMENT PRIMARY KEY,	
	totalPrice DECIMAL(10,2),
	imageURL VARCHAR(250),
	mealName VARCHAR(50),
	mealInstructions VARCHAR(2000),
	userID INT
) Engine=InnoDB;

create table inventoryItem (
	id INT AUTO_INCREMENT PRIMARY KEY,	
	itemName VARCHAR(20),
    quantityInStock INT(30),
	pricePerPortion DECIMAL(10,2),
	measurePerPortion VARCHAR(250)
) Engine=InnoDB;

create table orderItem (
	id INT AUTO_INCREMENT PRIMARY KEY,	
	orderID INT,
    inventoryID INT,
	amount INT
) Engine=InnoDB;

INSERT INTO inventoryItem VALUES
  (1, 'Potatoes', 6000, 0.99, "1 medium"),
  (2, 'Sunflower Oil', 6000, 5.5, "200ml"),
  (3, 'Minced Pork', 6000, 5, "500g"),
  (4, 'Onion', 6000, 0.8, "1"),
  (5, 'Garlic Clove', 6000, 0.8, "1"),
  (6, 'Cinnamon', 6000, 1.5, "20g"),
  (7, 'Allspice', 6000, 1.8, "20g"),
  (8, 'Nutmeg', 6000, 1.2, "20g"),
  (9, 'Vegetable Stock', 6000, 5, "200ml"),
  (10, 'Shortcrust Pastry', 6000, 6, "500g"),
  (11, 'Egg', 10000, 0.5, "1 medium"),
  (12, 'Flour', 10000, 2, "500g"),
  (13, 'Sugar', 10000, 1.99, "100g"),
  (14, 'Baking Powder', 10000, 1.99, "50g"),
  (15, 'Salt', 10000, 1.99, '50g'),
  (16, 'Milk', 10000, 1.2, '200m'),
  (17, 'Oil', 10000, 3.8, '200ml'),
  (18, 'Icing Sugar', 6000, 1.99, '100g'),
  (19, 'Brown Sugar', 6000, 1.99, '100g'),
  (20, 'Butter', 10000, 3.2, "100g"),
  (21, 'Eggs', 10000, 1.2, '3 medium'),
  (22, 'Vanilla Extract', 6000, 1.3, "20ml"),
  (23, 'Plain Flour', 10000, 2, "500g"),
  (24, 'Ham', 6000, 12, '1kg'),
  (25, 'Peas', 6000, 2, '200g'),
  (26, 'Onions', 6000, 1.5, '2'),
  (27, 'Carrots', 6000, 1.5, '2'),
  (28, 'Bay Leaves', 5000, 1.2, '6'),
  (29, 'Celery', 5000, 2.2, '1'),
  (30, 'Frozen Peas', 5000, 2, '300g'),
  (31, 'Bread', 10000, 2, '6 slices'),
  (32, 'Vegetable Oil', 5000, 4.8, '200ml'),
  (33, 'Beef Gravy', 5000, 5.2, '1 can'),
  (34, 'Potatoes', 5000, 4.6, '8 small'),
  (35, 'Cheese Curds', 5000, 3.2, '50g'),
  (36, 'Maple Syrup', 6000, 2.8, '50ml'),
  (37, 'Single Cream', 10000, 3.6, '100ml');