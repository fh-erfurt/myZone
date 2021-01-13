-- MySQL Script generated by MySQL Workbench
-- Mon Dec 21 21:20:02 2020
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema myZone
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema myZone
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `myZone` DEFAULT CHARACTER SET utf8 ;
USE `myZone` ;

-- -----------------------------------------------------
-- Table `myZone`.`addresses`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myZone`.`addresses` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `street` VARCHAR(45) NOT NULL,
  `number` VARCHAR(5) NOT NULL,
  `city` VARCHAR(50) NOT NULL,
  `zipCode` VARCHAR(5) NOT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `myZone`.`customers`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myZone`.`customers` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `firstName` VARCHAR(50) NOT NULL,
  `lastName` VARCHAR(50) NOT NULL,
  `email` VARCHAR(45) NOT NULL,
  `phone` VARCHAR(20) NULL,
  `billingAddress` INT NULL,
  `deliveryAddress` INT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_customers_addresses1`
    FOREIGN KEY (`billingAddress`)
    REFERENCES `myZone`.`addresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_customers_addresses2`
    FOREIGN KEY (`deliveryAddress`)
    REFERENCES `myZone`.`addresses` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `myZone`.`userLogins`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myZone`.`userLogins` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `validated` TINYINT NOT NULL,
  `enabled` TINYINT NOT NULL,
  `username` VARCHAR(25) NOT NULL,
  `lastLogin` TIMESTAMP NULL,
  `failedLoginCount` TINYINT NOT NULL,
  `passwordHash` VARCHAR(255) NOT NULL,
  `customer` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_userLogins_customers`
    FOREIGN KEY (`customer`)
    REFERENCES `myZone`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `myZone`.`orders`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myZone`.`orders` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `shipmentDate` TIMESTAMP NULL,
  `customer` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_orders_customers1`
    FOREIGN KEY (`customer`)
    REFERENCES `myZone`.`customers` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `myZone`.`products`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myZone`.`products` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `name` VARCHAR(45) NOT NULL,
  `price` DECIMAL(5,2) NOT NULL,
  `category` VARCHAR(20) NULL,
  `brand` VARCHAR(45) NULL,
  `color` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `myZone`.`orderItems`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `myZone`.`orderItems` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `createdAt` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatedAt` TIMESTAMP NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `quantity` INT NOT NULL,
  `actualPrice` DECIMAL(8,2) NOT NULL,
  `order` INT NOT NULL,
  `product` INT NOT NULL,
  PRIMARY KEY (`id`),
  CONSTRAINT `fk_orderItems_orders1`
    FOREIGN KEY (`order`)
    REFERENCES `myZone`.`orders` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_orderItems_products1`
    FOREIGN KEY (`product`)
    REFERENCES `myZone`.`products` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;




/* test data */


INSERT INTO `myZone`.`customers` (`id`, `firstName`, `lastName`, `email`, `phone`)
VALUES (1, 'testFirstName', 'testLastName', 'test@email.de', '018054646'),
       (2, 'totallyRealFName', 'totallyRealLName', 'real@person.com', '010012345');

INSERT INTO `myZone`.`userLogins` (`id`, `validated`, `enabled`, `username`, `failedLoginCount`, `passwordHash`, `customer`)
VALUES (1, 1, 1, 'testUser', 0, '$2y$10$GzNBS1d96sZVhoE241Znf.Wzx9O4vBijFiU1NiPhr4SK3bzyFZNry', 1),
       (2, 1, 1, 'realUser', 0, '$2y$10$GzNBS1d96sZVhoE241Znf.Wzx9O4vBijFiU1NiPhr4SK3bzyFZNry', 2);

INSERT INTO `myZone`.`products` (`id`, `name`, `price`, `category`, `brand`, `color`)
VALUES (1, 'Club C85 Vintage', 99.99, 'shoes', 'Rebook', 'white'),
       (2, 'Air Max 97', 129.99, 'shoes', 'Nike', 'red'),
       (3, 'Classic Clog', 69.69, 'shoes', 'crocs', 'bronze'),
       (4, 'Yeezy Boost 380 "Alien"', 199.99, 'shoes', 'Adidas', 'green');

INSERT INTO `myZone`.`orders` (`shipmentDate`, `customer`)
VALUES ('2020-12-30', 1),
       ('2020-12-31', 2),
       ('2021-01-01', 1),
       ('2021-01-10', 2);

INSERT INTO `myZone`.`orderItems` (`quantity`, `actualPrice`, `order`, `product`)
VALUES (2, 199.98, 1, 1),
       (1, 199.99, 1, 4),
       (5, 348.45, 2, 3),
       (1,  99.99, 2, 1),
       (1, 129.99, 2, 2),
       (1,  69.69, 3, 3),
       (1, 199.99, 4, 4);

/* SELECT name, price, category, brand, color, products.`id`, sum(quantity) as `sum` FROM products
INNER JOIN orderItems
ON products.id = orderItems.product
GROUP BY product
ORDER BY `sum`  DESC */