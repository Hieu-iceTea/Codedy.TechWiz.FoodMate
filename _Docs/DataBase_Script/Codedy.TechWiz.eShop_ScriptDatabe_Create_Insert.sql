# Created_by:
# Created_at: 15:00 2020-08-10
# Updated_at: 00:00 2021-02-26

# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                           Create DataBase                                           #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

# SET @DATABASE_Name = 'Codedy.TechWiz.eShop';

# Create DataBase
DROP DATABASE IF EXISTS `Codedy.TechWiz.eShop`;
CREATE DATABASE IF NOT EXISTS `Codedy.TechWiz.eShop` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `Codedy.TechWiz.eShop`;

SET time_zone = '+07:00';
#ALTER DATABASE `Codedy.TechWiz.eShop` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

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

    `avatar`              VARCHAR(128),
    `gender`              BOOLEAN                    NOT NULL,
    `first_name`          VARCHAR(64),
    `last_name`           VARCHAR(64),
    `dob`                 DATE,
    `phone`               VARCHAR(16),
    `address`             VARCHAR(128),

    `active`              BOOLEAN          DEFAULT FALSE,

    `created_by`          NVARCHAR(32)     DEFAULT 'Codedy.TechWiz.eShop',
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

    `name`                VARCHAR(128)                NOT NULL,
    `price`               DECIMAL(16) UNSIGNED       NOT NULL,
    `discount`            DECIMAL(16) UNSIGNED,
    `total_qty`           INT(16) UNSIGNED           NOT NULL,
    `description`         TEXT,
    `featured`            BOOLEAN      DEFAULT FALSE NOT NULL,

    `created_by`          NVARCHAR(32) DEFAULT 'Codedy.TechWiz.eShop',
    `created_at`          TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`          NVARCHAR(32) DEFAULT NULL,
    `updated_at`          TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`             INT          DEFAULT 1,
    `deleted`             BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;


#Create Table product_details
DROP TABLE IF EXISTS `product_details`;
CREATE TABLE IF NOT EXISTS `product_details`
(
    `id`         INT AUTO_INCREMENT,

    `product_id` INT UNSIGNED     NOT NULL,

    `color`      VARCHAR(64)      NOT NULL,
    `size`       VARCHAR(64)      NOT NULL,
    `qty`        INT(16) UNSIGNED NOT NULL,

    `created_by` NVARCHAR(32) DEFAULT 'Codedy.TechWiz.eShop',
    `created_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;


#Create Table Product_Images
DROP TABLE IF EXISTS `product_images`;
CREATE TABLE IF NOT EXISTS `product_images`
(
    `id`         INT AUTO_INCREMENT,

    `product_id` INT UNSIGNED NOT NULL,

    `file_name`  CHAR(64)     NOT NULL,

    `created_by` NVARCHAR(32) DEFAULT 'Codedy.TechWiz.eShop',
    `created_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;


#Create Table product_categories
DROP TABLE IF EXISTS `product_categories`;
CREATE TABLE IF NOT EXISTS `product_categories`
(
    `id`         INT AUTO_INCREMENT,

    `name`       VARCHAR(64) NOT NULL,

    `created_by` NVARCHAR(32) DEFAULT 'Codedy.TechWiz.eShop',
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

    `first_name`   VARCHAR(64),
    `last_name`    VARCHAR(64),
    `company_name` VARCHAR(64),
    `country`      VARCHAR(64),
    `address`      VARCHAR(128),
    `post_code`    VARCHAR(64),
    `town_city`    VARCHAR(64),
    `province`     VARCHAR(64),
    `phone`        CHAR(64),
    `email`        VARCHAR(64),
    `payment_type` CHAR(32),
    `total_amount` DECIMAL(16) UNSIGNED NOT NULL,

    `created_by`   NVARCHAR(32) DEFAULT 'Codedy.TechWiz.eShop',
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
    `amount`       DECIMAL(16) UNSIGNED NOT NULL,
    `total_amount` DECIMAL(16) UNSIGNED NOT NULL,

    `created_by`   NVARCHAR(32) DEFAULT 'Codedy.TechWiz.eShop',
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

INSERT INTO Product_Categories (Id, Name)
VALUE (1, 'Woman');INSERT INTO Product_Categories (Id, Name)
VALUE (2, 'Man');INSERT INTO Product_Categories (Id, Name)
VALUE (3, 'Kid');

INSERT INTO Products (Id, Product_Category_Id, Name, Price, Discount, Total_QTY, Description, Featured)
VALUE (1, 1, 'Jeans midi cocktail dress', 39.90, NULL, 20, 'Approx length 66cm/26 (Based on a UK size 8 sample) Mixed fibres
The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5.8', TRUE);INSERT INTO Products (Id, Product_Category_Id, Name, Price, Discount, Total_QTY, Description, Featured)
VALUE (2, 2, 'Daysocial relaxed t-shirt with flower print', 49.90, NULL, 20, 'Approx length 66cm/26 (Based on a UK size 8 sample) Mixed fibres
The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5.9', FALSE);INSERT INTO Products (Id, Product_Category_Id, Name, Price, Discount, Total_QTY, Description, Featured)
VALUE (3, 3, 'Topman organic stretch skinny ripped jeans in black', 29.90, NULL, 20, 'Approx length 66cm/26 (Based on a UK size 8 sample) Mixed fibres
The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5.10', FALSE);INSERT INTO Products (Id, Product_Category_Id, Name, Price, Discount, Total_QTY, Description, Featured)
VALUE (4, 1, 'Lacoste 3 pack t-shirts in black', 39.90, NULL, 20, 'Approx length 66cm/26 (Based on a UK size 8 sample) Mixed fibres
The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5.11', TRUE);INSERT INTO Products (Id, Product_Category_Id, Name, Price, Discount, Total_QTY, Description, Featured)
VALUE (5, 2, 'Jeans midi cocktail dress', 19.90, NULL, 20, 'Approx length 66cm/26 (Based on a UK size 8 sample) Mixed fibres
The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5.12', TRUE);INSERT INTO Products (Id, Product_Category_Id, Name, Price, Discount, Total_QTY, Description, Featured)
VALUE (6, 3, 'Jack & Jones Originals oversize sweatshirt with New York chest logo in grey', 29.90, NULL, 20, 'Approx length 66cm/26 (Based on a UK size 8 sample) Mixed fibres
The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5.13', TRUE);INSERT INTO Products (Id, Product_Category_Id, Name, Price, Discount, Total_QTY, Description, Featured)
VALUE (7, 1, 'Abercrombie & Fitch icon logo linen shirt in navy', 39.90, NULL, 20, 'Approx length 66cm/26 (Based on a UK size 8 sample) Mixed fibres
The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5.14', TRUE);INSERT INTO Products (Id, Product_Category_Id, Name, Price, Discount, Total_QTY, Description, Featured)
VALUE (8, 2, 'Nike fleece tracksuit in grey', 49.90, NULL, 20, 'Approx length 66cm/26 (Based on a UK size 8 sample) Mixed fibres
The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5.15', TRUE);INSERT INTO Products (Id, Product_Category_Id, Name, Price, Discount, Total_QTY, Description, Featured)
VALUE (9, 3, 'Siksilk athlete joggers in black', 29.90, NULL, 20, 'Approx length 66cm/26 (Based on a UK size 8 sample) Mixed fibres
The Model wears a UK size 8/ EU size 36/ US size 4 and her height is 5.16', TRUE);

INSERT INTO Product_Details (Id, Product_Id, Color, Size, QTY)
VALUE (1, 1, 'Red', 'XL', 5);INSERT INTO Product_Details (Id, Product_Id, Color, Size, QTY)
VALUE (2, 1, 'Blue', 'XL', 5);INSERT INTO Product_Details (Id, Product_Id, Color, Size, QTY)
VALUE (3, 1, 'White', 'XL', 5);INSERT INTO Product_Details (Id, Product_Id, Color, Size, QTY)
VALUE (4, 1, 'Black', 'XL', 5);INSERT INTO Product_Details (Id, Product_Id, Color, Size, QTY)
VALUE (5, 1, 'Red', 'L', 5);INSERT INTO Product_Details (Id, Product_Id, Color, Size, QTY)
VALUE (6, 1, 'Black', 'L', 0);INSERT INTO Product_Details (Id, Product_Id, Color, Size, QTY)
VALUE (7, 1, 'White', 'L', 0);

INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (1, 1, 'product-images-1.1.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (2, 1, 'product-images-1.2.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (3, 1, 'product-images-1.3.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (4, 1, 'product-images-1.4.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (5, 2, 'product-images-2.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (6, 3, 'product-images-3.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (7, 4, 'product-images-4.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (8, 5, 'product-images-5.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (9, 6, 'product-images-6.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (10, 7, 'product-images-7.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (11, 8, 'product-images-8.jpg');INSERT INTO Product_Images (Id, Product_Id, File_Name)
VALUE (12, 9, 'product-images-9.jpg');

INSERT INTO Orders (Id, First_Name, Last_Name, Company_Name, Country, Address, Post_Code, Town_City, Province, Phone, Email, Payment_Type, Total_Amount)
VALUE (1, 'Nguyễn Đình', 'Hiếu', 'FPT', 'Viet Nam', '8 Tôn Thất Thuyểt', '10000', 'Hà Nội', 'Hà Nội', '0868663315', 'DinhHieu8896@gmail.com', 'vnpay', 300);INSERT INTO Orders (Id, First_Name, Last_Name, Company_Name, Country, Address, Post_Code, Town_City, Province, Phone, Email, Payment_Type, Total_Amount)
VALUE (2, 'Nông', 'Hùng', 'FPT', 'Viet Nam', '8 Tôn Thất Thuyểt', '10000', 'Hà Nội', 'Hà Nội', '01234567899', 'Hung@gmail.com', 'pay_later', 100);

INSERT INTO Order_Details (Id, Order_Id, Product_Id, QTY, Amount, Total_Amount)
VALUE (1, 1, 1, 2, 100, 200);INSERT INTO Order_Details (Id, Order_Id, Product_Id, QTY, Amount, Total_Amount)
VALUE (2, 1, 2, 1, 100, 100);INSERT INTO Order_Details (Id, Order_Id, Product_Id, QTY, Amount, Total_Amount)
VALUE (3, 2, 3, 1, 100, 100);
