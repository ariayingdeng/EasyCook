drop database if exists EasyCook;
create database EasyCook;
use EasyCook;

create table user (
	id INT AUTO_INCREMENT PRIMARY KEY,	
	email VARCHAR(50),
    username VARCHAR(50),
	password VARCHAR(250)
) Engine=InnoDB;