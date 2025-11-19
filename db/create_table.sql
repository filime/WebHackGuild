CREATE DATABASE IF NOT EXISTS `tower`;
CREATE DATABASE IF NOT EXISTS `guild`;
CREATE DATABASE IF NOT EXISTS `prison`;



## FOR UNION SQL INJECTION DB
USE prison
SET NAMES utf8 ;
SET character_set_client = utf8mb4;


## 1,2,3 floor
DROP TABLE IF EXISTS `FLAG`;
CREATE TABLE `FLAG` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `FL` TEXT NOT NULL,
    `AG` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `FLAG` (FL, AG) VALUES ('gkljgrirgij349t5ui389245','fagji385ng9349urkfdr');

DROP TABLE IF EXISTS `1st_floor`;
CREATE TABLE `1st_floor` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` TEXT NOT NULL,
    `user_password` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


INSERT INTO `1st_floor` (user_id, user_password) VALUES ('guest','guest');




## GUILD SETTING
USE guild
SET NAMES utf8 ;
SET character_set_client = utf8mb4;


CREATE TABLE IF NOT EXISTS `player` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` TEXT NOT NULL,
    `user_password` TEXT NOT NULL,
    `EXP` INT DEFAULT 0,
    `solves` TEXT
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



INSERT INTO `player` (user_id, user_password) VALUES ('admin','6da6998dfb8dbd92e9f3034d707b1733a14c3f1fef43530ad84370e85a35d876');



## REALESE THE HOUNDS
USE tower
SET NAMES utf8 ;
SET character_set_client = utf8mb4;


## 1,2,3 floor
DROP TABLE IF EXISTS `1st_floor`;
CREATE TABLE `1st_floor` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` TEXT NOT NULL,
    `user_password` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `1st_floor` (user_id, user_password) VALUES ('guest','guest');
INSERT INTO `1st_floor` (user_id, user_password) VALUES ('admin',UUID());


## 2 floor
DROP TABLE IF EXISTS `2st_floor`;
CREATE TABLE `2st_floor` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` TEXT NOT NULL,
    `user_password` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `2st_floor` (user_id, user_password) VALUES ('guest','guest');
INSERT INTO `2st_floor` (user_id, user_password) VALUES ('admin','a6c83b67f91');

## 5 floor

DROP TABLE IF EXISTS `5st_floor`;
CREATE TABLE `5st_floor` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` TEXT NOT NULL,
    `user_password` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `5st_floor` (user_id, user_password) VALUES ('guest','guest');
INSERT INTO `5st_floor` (user_id, user_password) VALUES ('admin','0ab02486cf');

## 6 floor
DROP TABLE IF EXISTS `6st_floor`;
CREATE TABLE `6st_floor` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` TEXT NOT NULL,
    `user_password` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `6st_floor` (user_id, user_password) VALUES ('guest','guest');
INSERT INTO `6st_floor` (user_id, user_password) VALUES ('admin','18fk39whcvls02');


## 7 floor
DROP TABLE IF EXISTS `7st_floor`;
CREATE TABLE `7st_floor` (
    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `user_id` TEXT NOT NULL,
    `user_password` TEXT NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `7st_floor` (user_id, user_password) VALUES ('guest','guest');
INSERT INTO `7st_floor` (user_id, user_password) VALUES ('admin','48gjw9fj457gjfikb8');