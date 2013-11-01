create database BikeFramework;

use BikeFramework;

CREATE TABLE user (
	id_user INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	name VARCHAR(50) NOT NULL,
	email VARCHAR(50) NOT NULL,
	password VARCHAR(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET=utf8;
