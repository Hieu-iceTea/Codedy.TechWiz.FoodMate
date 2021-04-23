# Created_by:
# Created_at: 15:00 2020-08-10
# Updated_at: 00:00 2021-02-26

# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                           Create DataBase                                           #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

# SET @DATABASE_Name = 'Codedy.TechWiz.FoodMate';

# Create DataBase
DROP DATABASE IF EXISTS `Codedy.TechWiz.FoodMate`;
CREATE DATABASE IF NOT EXISTS `Codedy.TechWiz.FoodMate` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `Codedy.TechWiz.FoodMate`;

SET time_zone = '+07:00';
#ALTER DATABASE `Codedy.TechWiz.FoodMate` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

#SET SQL_MODE = 'ALLOW_INVALID_DATES';

# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                            Create Tables                                            #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

# Create Table User
DROP TABLE IF EXISTS `User`;
CREATE TABLE IF NOT EXISTS `User`
(
    `id`                  INT AUTO_INCREMENT,

    `user_name`           VARCHAR(64) UNIQUE         NOT NULL,
    `email`               VARCHAR(64)                NOT NULL,
    `password`            VARCHAR(128)               NOT NULL,
    `level`               TINYINT UNSIGNED DEFAULT 3 NOT NULL,

    `email_verified_at`   DATETIME,
    `verification_code`   VARCHAR(8)       DEFAULT NULL,
    `reset_password_code` VARCHAR(16)      DEFAULT NULL,
    `remember_token`      VARCHAR(128)     DEFAULT NULL,

    `image`               VARCHAR(128),
    `gender`              BOOLEAN                    NOT NULL,
    `first_name`          VARCHAR(64),
    `last_name`           VARCHAR(64),
    `phone`               VARCHAR(16),
    `street`              VARCHAR(128),
    `city`                VARCHAR(128),

    `active`              BOOLEAN          DEFAULT FALSE,

    `created_by`          NVARCHAR(32)     DEFAULT 'Codedy.TechWiz.FoodMate',
    `created_at`          TIMESTAMP        DEFAULT CURRENT_TIMESTAMP,
    `updated_by`          NVARCHAR(32)     DEFAULT NULL,
    `updated_at`          TIMESTAMP        DEFAULT CURRENT_TIMESTAMP,
    `version`             INT              DEFAULT 1,
    `deleted`             BOOLEAN          DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;


#Create Table products
DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products`
(
    `id`                  INT AUTO_INCREMENT,

    `product_category_id` INT UNSIGNED               NOT NULL,
    `restaurant_id`       INT UNSIGNED               NOT NULL,

    `name`                VARCHAR(128)               NOT NULL,
    `price`               DECIMAL(16) UNSIGNED       NOT NULL,
    `image`               VARCHAR(128),
    `country`             VARCHAR(32),
    `description`         TEXT,
    `featured`            BOOLEAN      DEFAULT FALSE NOT NULL,

    `created_by`          NVARCHAR(32) DEFAULT 'Codedy.TechWiz.FoodMate',
    `created_at`          TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`          NVARCHAR(32) DEFAULT NULL,
    `updated_at`          TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`             INT          DEFAULT 1,
    `deleted`             BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;


#Create Table product_categories
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories`
(
    `id`         INT AUTO_INCREMENT,

    `name`       VARCHAR(64) NOT NULL,

    `created_by` NVARCHAR(32) DEFAULT 'Codedy.TechWiz.FoodMate',
    `created_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;


#Create Table orders
DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders`
(
    `id`           INT AUTO_INCREMENT,

    `user_id`      INT UNSIGNED         NOT NULL,

    `first_name`   VARCHAR(64),
    `last_name`    VARCHAR(64),
    `phone`        VARCHAR(64),
    `street`       VARCHAR(64),
    `city`         VARCHAR(64),
    `payment_type` INT UNSIGNED         NOT NULL,
    `total_amount` DECIMAL(16) UNSIGNED NOT NULL,

    `status`       INT UNSIGNED         NOT NULL,

    `created_by`   NVARCHAR(32) DEFAULT 'Codedy.TechWiz.FoodMate',
    `created_at`   TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`   NVARCHAR(32) DEFAULT NULL,
    `updated_at`   TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`      INT          DEFAULT 1,
    `deleted`      BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;


#Create Table order_details
DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details`
(
    `id`           INT AUTO_INCREMENT,

    `order_id`     INT UNSIGNED         NOT NULL,
    `product_id`   INT UNSIGNED         NOT NULL,

    `qty`          INT(16) UNSIGNED     NOT NULL,
    `total_amount` DECIMAL(16) UNSIGNED NOT NULL,

    `created_by`   NVARCHAR(32) DEFAULT 'Codedy.TechWiz.FoodMate',
    `created_at`   TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`   NVARCHAR(32) DEFAULT NULL,
    `updated_at`   TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`      INT          DEFAULT 1,
    `deleted`      BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;

#Create Table restaurants
DROP TABLE IF EXISTS `restaurants`;
CREATE TABLE IF NOT EXISTS `restaurants`
(
    `id`           INT AUTO_INCREMENT,

    `name`   VARCHAR(64),
    `image`   CHAR(128),
    `address`   VARCHAR(64),
    `description`   TEXT,

    `qty`          INT(16) UNSIGNED     NOT NULL,
    `total_amount` DECIMAL(16) UNSIGNED NOT NULL,

    `created_by`   NVARCHAR(32) DEFAULT 'Codedy.TechWiz.FoodMate',
    `created_at`   TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`   NVARCHAR(32) DEFAULT NULL,
    `updated_at`   TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`      INT          DEFAULT 1,
    `deleted`      BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;


# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                             Insert Data                                             #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

#Default password: 123456
