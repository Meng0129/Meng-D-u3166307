CREATE SCHEMA `form1`;
USE `form1`;

CREATE TABLE `form1` (
	`email` VARCHAR(100) NOT NULL,
	`password` VARCHAR(100) NOT NULL,
	PRIMARY KEY (`email`),
	UNIQUE INDEX `email_UNIQUE` (`email` ASC)) ENGINE=InnoDB DEFAULT CHARSET=latin1;

