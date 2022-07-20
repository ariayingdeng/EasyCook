drop database if exists EasyCook;
create database EasyCook;
use EasyCook;

create table user (
	id INT AUTO_INCREMENT PRIMARY KEY,	
	email VARCHAR(50),
    username VARCHAR(50),
	password VARCHAR(250),
    phoneNumber INT(20),
    address VARCHAR(500)
) Engine=InnoDB;

INSERT INTO user VALUES (1,"Aria@gmail.com","Aria","$2y$10$Wc2ccfQcNXgU7yStROapEunzjKDOBfCzknPPq2.iqUAy9DkLhCMPK","7783222323","address1");

create table orders (
	id INT AUTO_INCREMENT PRIMARY KEY,	
	totalPrice DECIMAL(10,2),
	imageURL VARCHAR(250),
	mealName VARCHAR(50),
	mealInstructions VARCHAR(2000),
	userID INT
) Engine=InnoDB;

INSERT INTO orders VALUES (1,200,"https://www.themealdb.com/images/media/meals/ryppsv1511815505.jpg","BeaverTails","delicious dog",1);



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
  (34, 'Minced Beef', 5000, 18, '1.8g'),
  (35, 'Cheese Curds', 5000, 3.2, '50g'),
  (36, 'Maple Syrup', 6000, 2.8, '50ml'),
  (37, 'Single Cream', 10000, 3.6, '100ml'),
  (38,'Water',10000,0.2,'100ml'),
  (39,'Yeast',10000,10,'1pound'),
  (40,'Lemon',10000,0.67,'1unit'),
  (41,'Olive Oil',10000,11,'700ml'),
  (42,'Bacon',10000,7,'300g'),
  (43,'Parsley',10000,3,'300g'),
  (44,'Pepper',10000,3,'300g'),
  (45,'Muscovado Sugar',10000,4,'300g'),
  (46,'Raisins',10000,7,'300g'),
  (47,'Walnuts',10000,5,'300g'),
  (48,'Beef Brisket',10000,10,'500g'),
  (49,'Black Pepper',10000,3,'500g'),
  (50,'Coriander',10000,1.2,'500g'),
  (51,'Bay Leaf',10000,0.7,'500g'),
  (52,'Cloves',10000,0.5,'500g'),
  (53,'Paprika',10000,0.3,'500g'),
  (54,'Dill',10000,0.7,'500g'),
  (55,'English Mustard',10000,1,'500g'),
  (56,'Celery Salt',10000,3,'1000g'),
  (57,'Red Pepper Flakes',10000,0.7,'300g'),
  (58,'Custard',10000,1.37,'100g'),
  (59,'Caster Sugar',10000,6.49,'500g'),
  (60,'Cocoa',10000,1.2,'500g'),
  (61,'Digestive Biscuits',10000,3.3,'500g'),
  (62,'Desiccated Coconut',10000,6,'250g'),
  (63,'Almonds',10000,11.87,'0.5 Pounds'),
  (64,'Double Cream',10000,2.97,'1L'),
  (65,'Custard Powder',10000,4.67,'340g'),
  (66,'Dark Chocolate',10000,10,'100g'),
  (67,'Creamed Corn',10000,28.95,'2kg');








  



