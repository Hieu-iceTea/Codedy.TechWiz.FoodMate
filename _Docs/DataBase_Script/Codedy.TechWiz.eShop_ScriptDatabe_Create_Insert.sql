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

    `user_id`      INT UNSIGNED,

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

    `location`     VARCHAR(64),
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
    `id`          INT AUTO_INCREMENT,

    `name`        VARCHAR(64),
    `image`       CHAR(128),
    `address`     VARCHAR(64),
    `description` TEXT,

    `created_by`  NVARCHAR(32) DEFAULT 'Codedy.TechWiz.FoodMate',
    `created_at`  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`  NVARCHAR(32) DEFAULT NULL,
    `updated_at`  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`     INT          DEFAULT 1,
    `deleted`     BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;


# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                             Insert Data                                             #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

#Default password: 123456
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (4, 'Host', 'host.codedy@gmail.com', '$2y$10$oW..IGNT/CH2muKpN/8LAuNJ1ahnwLoyCBWRQyBj4p6ITOJFb.gs2', 1, '2020-08-08', 'host.jpg', 1, 'CODEDY', 'Host', '032 87 99 000', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (3, 'Admin', 'admin.codedy@gmail.com', '$2y$10$/AmOQGhkVS8otOSJbAv.6OHxseW/AOdVw7wxNbopMHgy0Btbp3Anu', 2, '2020-08-08', 'admin.jpg', 1, 'CODEDY', 'Admin', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (2, 'Customer', 'customer.codedy@gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 3, '2020-08-08', 'member.jpg', 1, 'CODEDY', 'Member', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (1, 'Admin_Demo', 'admin_demo.codedy@gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 2, '2020-08-08', 'admin_demo.jpg', 1, 'CODEDY', 'Admin_Demo', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', TRUE);


INSERT INTO Product_Categories (Id, Name)
VALUE (1, 'Burgers');
INSERT INTO Product_Categories (Id, Name)
VALUE (2, 'Pasta');
INSERT INTO Product_Categories (Id, Name)
VALUE (3, 'Pizza');
INSERT INTO Product_Categories (Id, Name)
VALUE (4, 'Sushi');
INSERT INTO Product_Categories (Id, Name)
VALUE (5, 'Desserts');
INSERT INTO Product_Categories (Id, Name)
VALUE (6, 'Drinks');


INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (1, 1, 1, 'Chicken Burger', 39.90, 'product-chicken-burger.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (2, 1, 2, 'Broccoli', 19.90, 'product-pizza.jpg', 'Trung Quoc', 'Beef, cheese, potato, onion, fries', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (3, 1, 3, 'Chicken wings', 39.90, 'product-chicken-wings.jpg', 'Thai Lan', 'Beef, cheese, potato, onion, fries', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (4, 1, 4, 'Nigiri-sushi', 49.90, 'product-sushi.jpg', 'Nhat Ban', 'Beef, cheese, potato, onion, fries', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (5, 1, 1, 'Creste di Galli', 29.90, 'product-pasta.jpg', 'Han Quoc', 'Beef, cheese, potato, onion, fries', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (6, 1, 2, 'Beef Burger', 39.59, 'product-burger.jpg', 'My', 'Beef, cheese, potato, onion, fries', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (7, 2, 3, 'Chicken Burger', 39.90, 'product-2-1.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (8, 2, 4, 'Broccoli', 19.90, 'product-2-2.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (9, 2, 1, 'Chicken wings', 39.90, 'product-2-3.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (10, 2, 2, 'Nigiri-sushi', 49.90, 'product-2-4.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (11, 2, 3, 'Creste di Galli', 29.90, 'product-2-5.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (12, 2, 4, 'Beef Burger', 39.59, 'product-2-6.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (13, 3, 1, 'Chicken Burger', 39.90, 'product-3-1.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (14, 3, 2, 'Broccoli', 19.90, 'product-3-2.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (15, 3, 3, 'Chicken wings', 39.90, 'product-3-3.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (16, 3, 4, 'Nigiri-sushi', 49.90, 'product-3-4.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (17, 3, 1, 'Creste di Galli', 29.90, 'product-3-5.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (18, 3, 2, 'Beef Burger', 39.59, 'product-3-6.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (19, 4, 3, 'Chicken Burger', 39.90, 'product-4-4.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (20, 4, 4, 'Broccoli', 19.90, 'product-4-2.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (21, 4, 1, 'Chicken wings', 39.90, 'product-4-3.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (22, 4, 2, 'Nigiri-sushi', 49.90, 'product-4-4.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (23, 4, 3, 'Creste di Galli', 29.90, 'product-4-5.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (24, 4, 4, 'Beef Burger', 39.59, 'product-4-6.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (25, 5, 1, 'Chicken Burger', 39.90, 'product-5-1.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (26, 5, 2, 'Broccoli', 19.90, 'product-5-2.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (27, 5, 3, 'Chicken wings', 39.90, 'product-5-3.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (28, 5, 4, 'Nigiri-sushi', 49.90, 'product-5-4.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (29, 5, 1, 'Creste di Galli', 29.90, 'product-5-5.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (30, 5, 2, 'Beef Burger', 39.59, 'product-5-6.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (31, 6, 3, 'Chicken Burger', 39.90, 'product-6-1.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (32, 6, 4, 'Broccoli', 19.90, 'product-6-2.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (33, 6, 1, 'Chicken wings', 39.90, 'product-6-3.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (34, 6, 2, 'Nigiri-sushi', 49.90, 'product-6-4.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (35, 6, 3, 'Creste di Galli', 29.90, 'product-6-5.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Price, Image, Country, Description, Featured)
VALUE (36, 6, 4, 'Beef Burger', 39.59, 'product-6-6.jpg', 'Viet Nam', 'Beef, cheese, potato, onion, fries', FALSE);


INSERT INTO restaurants (id, name, image, address, description)
VALUE (1, 'Head Ha Noi', 'Head-Ha-Noi.jpg', 'Ha Noi', '<ul class=""list-check text-lg mb-0"">
                        <li>Only on Tuesdays</li>
                        <li class=""false"">Order higher that $40</li>
                        <li>Unless one burger ordered</li>
                    </ul>');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (2, 'Special Ho Chi Minh', 'Special-Ho-Chi-Minh.jpg', 'Ho Chi Minh', '<ul class=""list-check text-lg mb-0"">
                        <li>Only on Weekends</li>
                        <li class=""false"">Order higher that $40</li>
                    </ul>');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (3, 'Flagship Nghe An', 'Flagship-Nghe-An.jpg', 'Nghe An', '<ul class=""list-check text-lg mb-0"">
                        <li>Only on Friday</li>
                        <li>All products</li>
                        <li>Online order</li>
                    </ul>');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (4, 'Standard Da Nang', 'Standard-Da-Nang.jpg', 'Da Nang', '<ul class=""list-check text-lg mb-0"">
                        <li>Only on Tuesdays</li>
                        <li class=""false"">Order higher that $40</li>
                        <li>Unless one burger ordered</li>
                    </ul>');


INSERT INTO orders (id, user_id, first_name, last_name, phone, street, city, payment_type, total_amount, status)
VALUE (1, 2, 'Nguyễn Đình', 'Hiếu', '0868 6633 15', '8 Ton That Thuyet', 'Ha Noi',1, 300, 1);
INSERT INTO orders (id, user_id, first_name, last_name, phone, street, city, payment_type, total_amount, status)
VALUE (2, 2, 'Nông', 'Hùng', '0868 6633 15', '9 Ton That Thuyet', 'Ha Noi',2, 100, 2);
INSERT INTO orders (id, user_id, first_name, last_name, phone, street, city, payment_type, total_amount, status)
VALUE (3, NULL, 'Nguyễn', 'Trung Anh', '0987 6543 10', '10 Ton That Thuyet', 'Ha Noi',1, 400, 3);
INSERT INTO orders (id, user_id, first_name, last_name, phone, street, city, payment_type, total_amount, status)
VALUE (4, NULL, 'Vũ', 'Quang Huy', '0987 6543 11', '11 Ton That Thuyet', 'Ha Noi',2, 200, 4);


INSERT INTO order_details (id, order_id, product_id, location, qty, total_amount)
VALUE (1, 1, 1, 'Viet Nam', 2, 200);
INSERT INTO order_details (id, order_id, product_id, location, qty, total_amount)
VALUE (2, 1, 2, 'Viet Nam', 1, 100);
INSERT INTO order_details (id, order_id, product_id, location, qty, total_amount)
VALUE (3, 2, 3, 'Viet Nam', 1, 100);
