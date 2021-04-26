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
    `email`               VARCHAR(64) UNIQUE         NOT NULL,
    `password`            VARCHAR(128)               NOT NULL,
    `level`               TINYINT UNSIGNED NOT NULL,

    `email_verified_at`   DATETIME,
    `verification_code`   VARCHAR(8)       DEFAULT NULL,
    `reset_password_code` VARCHAR(16)      DEFAULT NULL,
    `remember_token`      VARCHAR(128)     DEFAULT NULL,

    `image`               VARCHAR(128),
    `gender`              BOOLEAN,
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
    `ingredients`         VARCHAR(256)               NOT NULL,
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
    `image`      CHAR(128)   NOT NULL,

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
    `email`        VARCHAR(64),
    `phone`        VARCHAR(64),
    `street`       VARCHAR(128),
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
    `amount`       DECIMAL(16) UNSIGNED NOT NULL,
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


#Create Table feedbacks
DROP TABLE IF EXISTS `feedbacks`;
CREATE TABLE IF NOT EXISTS `feedbacks`
(
    `id`         INT AUTO_INCREMENT,

    `user_id`    INT UNSIGNED,

    `name`       VARCHAR(64),
    `email`      CHAR(128),
    `message`    TEXT,

    `created_by` NVARCHAR(32) DEFAULT 'Codedy.TechWiz.FoodMate',
    `created_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by` NVARCHAR(32) DEFAULT NULL,
    `updated_at` TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`    INT          DEFAULT 1,
    `deleted`    BOOLEAN      DEFAULT FALSE,

    PRIMARY KEY (`id`)
) ENGINE InnoDB;

# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                             Insert Data                                             #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

#Default password: 123456

INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (9, 'Host', 'host.codedy@gmail.com', '$2y$10$oW..IGNT/CH2muKpN/8LAuNJ1ahnwLoyCBWRQyBj4p6ITOJFb.gs2', 1, '2020-08-08', 'host.jpg', 1, 'CODEDY', 'Host', '032 87 99 000', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (8, 'Admin', 'admin.codedy@gmail.com', '$2y$10$/AmOQGhkVS8otOSJbAv.6OHxseW/AOdVw7wxNbopMHgy0Btbp3Anu', 2, '2020-08-08', 'admin.jpg', 1, 'CODEDY', 'Admin', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (7, 'Staff', 'staff.codedy@gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 3, '2020-08-08', 'staff.jpg', 2, 'CODEDY', 'Staff', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (6, 'Customer', 'customer.codedy@gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 4, '2020-08-08', 'member.jpg', 1, 'CODEDY', 'Customer', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (5, 'DinhHieu8896', 'DinhHieu8896gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 3, '2020-08-08', 'DinhHieu8896.jpg', 1, 'Nguyễn Đình', 'Hiếu', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (4, 'HuyVQTH1909003', 'HuyVQTH1909003@fpt.edu.vn', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 3, '2020-08-08', 'HuyVQTH1909003.jpg', 1, 'Vũ Quang', 'Huy', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (3, 'HungNPMTH1908050', 'HungNPMTH1908050@fpt.edu.vn', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 3, '2020-08-08', 'HungNPMTH1908050.jpg', 1, 'Nông Phan Mạnh', 'Hùng', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (2, 'AnhNTTH1908059', 'AnhNTTH1908059@fpt.edu.vn', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 3, '2020-08-08', 'AnhNTTH1908059.jpg', 1, 'Nguyễn Trung', 'Anh', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', TRUE);
INSERT INTO User (id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, street, city, active)
VALUE (1, 'Admin_Demo', 'admin_demo.codedy@gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 2, '2020-08-08', 'admin_demo.jpg', 1, 'CODEDY', 'Admin_Demo', '0868 6633 15', 'Ton That Thuyet', 'Ha Noi', FALSE);


INSERT INTO Product_Categories (Id, Name, Image)
VALUE (1, 'Vegetarian', 'Vegetarian.jpg');
INSERT INTO Product_Categories (Id, Name, Image)
VALUE (2, 'Vegan', 'Vegan.jpg');
INSERT INTO Product_Categories (Id, Name, Image)
VALUE (3, 'Chinese', 'Chinese.jpg');
INSERT INTO Product_Categories (Id, Name, Image)
VALUE (4, 'Mexican', 'Mexican.jpg');
INSERT INTO Product_Categories (Id, Name, Image)
VALUE (5, 'Burgers', 'menu-title-burgers.jpg');
INSERT INTO Product_Categories (Id, Name, Image)
VALUE (6, 'Pasta', 'menu-title-pasta.jpg');
INSERT INTO Product_Categories (Id, Name, Image)
VALUE (7, 'Pizza', 'menu-title-pizza.jpg');
INSERT INTO Product_Categories (Id, Name, Image)
VALUE (8, 'Sushi', 'menu-title-sushi.jpg');
INSERT INTO Product_Categories (Id, Name, Image)
VALUE (9, 'Desserts', 'menu-title-desserts.jpg');
INSERT INTO Product_Categories (Id, Name, Image)
VALUE (10, 'Drinks', 'menu-title-drinks.jpg');


INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (19, 4, 1, 'Anitas Cantina', 'Beef, cheese, potato, onion, fries',32.5, 'AnitasCantina.jpg', 'Mexico', 'serves up fresh, authentic Tex-Mex made with lots of love', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (45, 8, 9, 'Baked Salmon Roll', 'salmon and cheese',18.90, 'baked-salmon-roll.jpg', 'American', 'Grilled salmon with special sauce and cheese topped with a new flavor and california wrap create an eye-catching feeling for sushi.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (29, 5, 2, 'BBQ Brekky Stack', 'Beef, cheese, potato, onion, fries',39.59, 'BBQ_Brekky_Stack.png', 'American', 'Golden hash brown, two slices of premium eye bacon, a freshly cracked egg, cheese and tangy BBQ sauce stacked high on a sesame seed bun. Available until 11am.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (1, 1, 1, 'Best Lentil Soup', 'Gluten free and vegan',39.90, 'Best Lentil Soup.jpg', 'Viet Nam', 'This is one of my favorite recipes ever. I think I could eat it every day. One time when I was eating it while curled up on the couch, I kept saying, “This is sooo good,” after every single bite. The curry powder and lemon juice MAKE IT. Thank you, Kate!', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (4, 1, 4, 'Black Bean Sweet Potato Enchiladas', 'Gluten free and easily vegan',39.59, 'Black Bean Sweet Potato Enchiladas.jpg', 'Japan', 'This is heavenly! I decided to make dinner for my mom and her boyfriend the night before they left for a vacay to London. Knowing that her boyfriend is vegetarian, I had to turn to google. I came across your page, and I never turned back! The two could not stop raving about this dish. And honestly, either could I! I paired it with Cilantro Lime Rice – perfection. I’m going to be whipping up more of your recipes this coming week. Thank you, Kate!', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (34, 6, 7, 'Cacio Pepe', 'Black Pepper, Pecorino and Butter',39.59, 'CacioPepe.jpg', 'Chinese', 'This sauce, although not strictly traditional, combines the classic ingredients of several regions of Italy: Calabria and Campania in the south and Lombardia in the north. Calabrian ‘nduja sausage, citrus celebrated in Campania, and mascarpone originating in Lombardia come together in this irresistible dish. The spicy and soft ‘nduja sausage forms the perfect base for this sauce', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (46, 8, 1, 'California Rool', 'Rice and butter',25.90, 'california-roll.jpg', 'ThaiLan', 'Rice and avocado create a novel combination for sushi. With familiar ingredients, but this novel combination will bring everyone delicious and attractive sushi dishes ', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (59, 10, 5, 'Cocktail Cafe', 'Beef, cheese, potato, onion, fries',27.8, 'CocktailCafe.jpg', 'Korean', 'A cocktail is an alcoholic mixed drink, which is either a combination of spirits, or one or more spirits mixed with other ingredients such as fruit juice, flavored syrup, or cream.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (33, 6, 6, 'Garganelli', 'Mushroom Ragu and Ricotta Salata',29.90, 'creamy-cacio-e-pepe-recipe-2150w.jpg', 'Chinese', 'Now very much a favourite amongst the Pasta Evangelists community – and something of a signature dish – this hedonistic Roman classic is thought to have its name derived from when charcoal burners were used to cook the dish over campfires. In true Pasta Evangelists style, we’ve added our own twist to this classic, comforting dish, presenting a gloriously creamy carbonara with tangles of fresh bucatini – in our opinion bigger and better than spaghetti – which sop up this luxuriant sauce.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (2, 1, 2, 'Crispy Baked Falafel', 'Vegetables and wheat',49.90, 'Crispy Baked Falafel.jpg', 'American', 'Ok, these little babies are literally THE best falafels I have EVER had. I will be keeping this recipe, five out of five!! We had them with whole wheat pita, hummus, vegan pesto mayo, tomatoes, kalamata olives and spring greens. OMG sooo good. Thank You!!! You’re the best! I could cry they are so good!', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (26, 5, 8, 'Croissanwich Meal for Two', 'Beef, cheese, potato, onion, fries',39.90, 'Croissa.png', 'American', '2 Croissanwich Sandwiches, 2 Small Hash Browns, 2 Small Brewed Coffees', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (50, 9, 5, 'Cheap Corner', 'Beef, cheese, potato, onion, fries',17.3, 'CheapCorner.jpg', 'VietNam', 'Product Description. If you are looking for comfort, style and competitive prices youve found the right sofa for you', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (40, 7, 4, 'Cheese Pizza', 'Tomato sauce, mozzarella and provolone.',11.90, 'cheese-pizza.jpg', 'Japan', 'Cheese pizza uses cheese as the main flavor to make a difference to the cake and create a new impression on the eaters.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (15, 3, 6, 'Chiayi Chicken Rice', 'Jidori chicken, shallot oil, house pickles,
garnished with scallions. Gluten Free',6.90, 'chiayi-chicken-rice.jpg', 'Korean', 'Vegetarian noodles are full of delicious spices, giving diners a delicious and attractive dish', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (23, 4, 5, 'Chicken Tacos', '1 large red onion, diced (reserve half)
500g chicken mince
30g Old El Paso™ Taco Spice Mix
1/2 cup water
1/2 cup Old El Paso™ Mild Taco Sauce',34.5, 'ChickenTacos.jpg', 'Mexico', 'n a small bowl, combine chili powder, cumin, paprika, oregano, garlic powder, 1 teaspoon salt and 1/2 teaspoon pepper. Season chicken with chili powder mixture. Heat canola oil in a large skillet over medium high heat. Serve chicken in tortillas, topped with pico de gallo, avocado, cilantro and lime', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (32, 6, 5, 'Bucatini', 'Pancetta, Tomato, Chilies and Pecorino',49.90, 'delish-bucatinipasta.jpg', 'Chinese', 'The beautiful, rolling hills of Tuscany are home to countless vineyards and the region is fondly nicknamed ‘Chiantishire’ after the bold red wine that it produces in abundance. However, it is not only for its wine that this region is so well-loved.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (54, 9, 9, 'Dessert Place', 'Beef, cheese, potato, onion, fries',22.5, 'DessertPlace.jpg', 'VietNam', 'This definition includes a range of courses ranging from fruits or dried nuts to multi-ingredient cakes and pies. Many cultures have different variations of dessert', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (53, 9, 8, 'Dough Tampas', 'Beef, cheese, potato, onion, fries',21.3, 'DoughTampas.jpg', 'VietNam', 'Description. Meet Dough: a quirky and whimsical bistro and bakery by Datz. This is the place for delicious morning pastries, eclectic lunch, an afterschool snack', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (7, 2, 7, 'Vegan Eggplant Salad', 'Peppers, garlic, fresh herbs, lemon juice',39.90, 'engg.jpeg', 'Viet Nam', 'Flaming hot oven-roasted eggplant, with mixed peppers, garlic, fresh herbs, lemon juice, and olive oil.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (42, 7, 6, 'Fennel Diavolo Pizza', 'Garlic, spicy fennel, calabrese salami, red
onion, mozzarella, fennel pollen,…',10.90, 'fennel-diavolo-pizza.jpg', 'American', 'Is a pizza that combines many different ingredients and spices to create harmony and give people a delicious pizza.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (57, 10, 3, 'Fruit Juice', 'Beef, cheese, potato, onion, fries',25.9, 'FruitJuice.jpg', 'Korean', 'Fruit juice is 100% pure juice made from the flesh of fresh fruit or from whole fruit, depending on the type used. It is not permitted to add sugars, sweeteners, preservatives, flavourings or colourings to fruit juice. Fruit juices are usually described as: From concentrate.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (39, 7, 3, 'Italian Sausage Pizza', 'Tomato sauce, spicy sausage, smoked
mozzarella, potato, mama Lils peppers,…',9.90, 'italian-sausage-pizza.jpg', 'Korean', 'An Italian pizza that uses special spicy sausage with mozzarella bacon to create a distinctive spicy flavor and is only suitable for adults and people to eat spicy.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (22, 4, 4, 'LimeVeganTacos', '2 tablespoons avocado oil (or coconut oil)
1/2 red onion, diced small
1/2 jalapeño, diced small (optional; or more to taste!)
1 large zucchini, chopped
1 green bell pepper, chopped (or any color)',38.5, 'LimeVeganTacos.jpg', 'Mexico', 'The tacos are filled with pinto beans and brown rice simmered in veggie broth and seasonings. The tacos are then slathered in a tangy cilantro-lime sauce and topped with diced onion and fresh cilantro', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (49, 9, 4, 'Little Bowl', 'Beef, cheese, potato, onion, fries',18.5, 'LittleBowl.jpg', 'VietNam', 'Very small bowls, such as the tea bowl, are often called cups, while plates with especially deep wells are often called bowls. In many cultures bowls are the most common kind of vessel used for serving and eating food. Historically small bowls were also used for serving both tea and alcoholic drinks.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (51, 9, 6, 'Local Desserts', 'Beef, cheese, potato, onion, fries',19.6, 'LocalDesserts.jpg', 'VietNam', 'essert is a course that concludes a meal. The course consists of sweet foods, such as ... There is no simple definition of a dessert wine. ... There is widespread use of rice flour in East Asian desserts, which often include local ingredients such ', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (37, 7, 1, 'Margherita Pizza', 'Tomato sauce, mozzarella cheese and
basil.',9.90, 'margherita-pizza.jpg', 'American', 'Is a classic American pizza, with traditional American flavor and character', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (58, 10, 4, 'Matcha Mojito', 'Beef, cheese, potato, onion, fries',28.3, 'MatchaMojito.jpg', 'Korean', 'Matcha is a green tea made from stone ground tea leaves. Its packed with nutrients and antioxidants, so why not add it to a yummy cocktail? We made a classic mojito recipe, we like them with a lot of mint leaves (you cant go overboard!), lime juice, a little cane sugar and a tablespoon of matcha powder.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (60, 10, 6, 'Milk Tea', 'Beef, cheese, potato, onion, fries',26.5, 'MilkTea.jpg', 'Korean', 'The term ""milk tea"" refers to any tea drink with milk added. It can be as simple as a splash of milk in a hot cup of tea, or it can be a complex recipe including various ingredients, like the popular bubble tea. ... Milk tea is enjoyed throughout the world as both a hot and cold beverage.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (13, 3, 4, 'Minced Pork on Rice', 'Rice, Pork, Green onion, Soup',3.90, 'minced-pork-on-rice.jpg', 'China', 'Kurobuta pork, soy braised egg, house
pickles, garnished with scallions', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (41, 7, 5, 'Mushroom Pizza', 'Garlic, fontina, scallion, ricotta, and parmigiano.',12.90, 'mushroom-pizza.jpg', 'Viet Nam', 'This pizza uses parmigiano mushrooms to create a highlight for the cake, parmigiano mushrooms combined with the leaves to create a special aroma that attracts people to eat.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (24, 4, 6, 'Naco Taco', 'Beef, cheese, potato, onion, fries',33.8, 'NacoTaco.jpg', 'Mexico', 'Food was tasty. Service was awesome, drinks were delicious. The restaurant has dim lighting, the sides are enough to share. I Couldnt have picked a better place to celebrate my birthday. Monday nights seem very low-key', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (9, 2, 9, 'Vegan Onion Rings', 'onions',29.90, 'onion.jpeg', 'Viet Nam', 'We use real onions and batter them in house.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (12, 2, 3, 'Original Acai Bowl', 'granola, fresh banana, blueberries and strawberries',19.90, 'original.png', 'Chinese', 'Topped off with unsweetened organic coconut chips. ✅ Gluten-free ✅ Vegan ✅ Soy-free ✅ 100% Natural Non-GMO ingredients Allergens: Contains almond, coconut. May contain traces of other tree nuts.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (25, 5, 7, 'Original Chicken Sandwich', 'Beef, cheese, potato, onion, fries',19.90, 'OriginalChicken.png', 'American', '2 Original Chicken Sandwiches and 2 Small French Fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (36, 6, 9, 'Mint Pangrattato', 'Red Pepper, San Marzano Tomatoes, Extra Virgin Olive Oil, Salt, Basil',39.59, 'pangratto.jpg', 'American', 'In Sardinia, you can ask any passerby - albeit in Sardu, the local language - what the secret to the island’s cuisine is and, should you understand the vernacular, they will tell you that the perfect Sardinian dish relies not on elaborate preparation but the use of as few ingredients as possible. Each, however, must be exquisite. ', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (3, 1, 3, 'Peanut Slaw with Soba Noodles', 'Easily gluten free and easily vegan',29.90, 'Peanut Slaw with Soba Noodles.jpg', 'Viet Nam', 'I have made this recipe so many times! Mostly for myself, but I have also brought it to a few potluck-style gatherings and it was a hit every time. Super simple to make and very addicting!', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (17, 3, 8, 'Pork Meat Soup Dumplings', 'Rice flour, char siu, minced pork',3.90, 'porkmeatsoupdumplings.jpg', 'China', 'Combo includes 8 char siu dumplings', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (28, 5, 1, 'Mighty McMuffin Meal ', 'Beef, cheese, potato, onion, fries',29.90, 'Product_thumb_McMuffin-Mighty.png', 'American', 'Nam eleifend elementum sapien et bibendum. Nunc ac diam efficitur, ultrices lorem quis, consectetur odio. Nullam vulputate, eros quis accumsan cursus, elit lectus bibendum nulla, sed dapibus ligula tellus at purus. Fusce id eros id mi cursus semper. Quisque efficitur bibendum nunc a consectetur.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (38, 7, 2, 'Pepperoni Pizza', 'Pepperoni, tomato sauce, mozzarella, and
provolone.',10.90, 'repperoni-pizza.jpg', 'ThaiLan', 'using a special cheese called Pepperoni, n with a special taste gives the eater a new and attractive feeling.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (43, 8, 7, 'Salmon Avocado Roll', 'Salmon and avocado',20.90, 'salmon-avocado-roll.jpg', 'Viet Nam', 'The combination of salmon and avocado creates a rich and creamy sushi dish', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (47, 8, 2, 'Salmon Sushi', 'Rice and salmon',17.90, 'salmon-sushi.jpg', 'Japan', 'Salmon sushi is no longer a strange dish to everyone, a familiar delicious sushi that everyone should try at least once in their life.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (20, 4, 2, 'Salt n Lime', 'Beef, cheese, potato, onion, fries',30.5, 'SaltnLime.jpg', 'Mexico', 'At Salt n Lime we offer clean n safely prepared meals of excellent quality and invite you to try our fresh Mexican n American foods. The key to our success is simple: providing quality consistent food that tastes great every single time', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (18, 3, 9, 'Shanghai Sauteed Flat Noodle', 'Rice flour, pork, green onion, vegetables, chili, sugar, salt',2.90, 'shanghaisauteedflatnoodle.jpg', 'Viet Nam', 'Có 2 loại mì kết hợp, loại nhỏ và dai, loại lớn giòn với thịt heo xào tỏi tạo nên sự hấp dẫn.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (48, 8, 3, 'Shrimp Tempura Roll', 'Shrimp tempura, avocado and
cucumber roll and Topped with eel sauce.',27.90, 'shrim-tempura-roll.jpg', 'American', 'Rice roll with shrimp, avocado, cucumber and eel sauce these 4 ingredients work together to create delicious and exotic sushi. 4 unrelated ingredients but when combined to create an unforgettable taste for first time eaters ', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (16, 3, 7, 'Slack Season Noodles', 'Chicken and pork broth, minced pork, garlic,
shrimp',4.90, 'slack-season-noodles.jpg', 'American', 'Chicken and pork sauce combined with minced meat, garlic and shrimp creates a bowl of noodles with a new and attractive flavor.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (27, 5, 9, 'SMOKED BACON BRISKET BURGER', 'Certified Angus Beef, smoked aged cheddar cheese, brisket, applewood smoked bacon, pickles, bbq sauce, toasted brioche bun',49.90, 'Smashburger.jpg', 'American', 'Total Fat 27g,Cholesterol 210mg ,Total Carbohydrate 56g', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (56, 10, 2, 'Soda', 'Beef, cheese, potato, onion, fries',25.2, 'Soda.jpg', 'USA', '1 : a powdery substance like salt used in washing and in making glass or soap. 2 : baking soda. 3 : soda water. 4 : soda pop. 5 : a sweet drink made of soda water, flavoring, and often ice cream.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (5, 1, 5, 'Spaghetti Squash Burrito Bowls', 'Noodle, Gluten free and easily vegan.',39.90, 'Spaghetti Squash Burrito Bowls.jpg', 'American', 'I absolutely LOVE this recipe! I made it last night for my family girls night. My 4 year old exclaimed “this is so good mommy!” and “I love this!” once she finally sat still enough to eat more than the purple parts. As for me….just what I needed…fabulous flavor amazing color and pretty fast to prepare for our lenten Friday supper. And my husband was out, so no griping about squash! Wins all the way around.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (31, 6, 4, 'Spaghetti with Ramps', 'Ramps, Chilies and Parmesan',39.90, 'Spaghetti.jpg', 'Chinese', 'Seafood is a treasured delicacy in Italy, which is no surprise when you think about the expansive coastline stretching from the northern regions of Veneto and Liguria all the way to the southern island of Sicily. From the shores of the Adriatic sea and the glistening marinas that line the Amalfi coast to the bustling ports of the Italian riviera, seafood is freshly prepared everyday in humble, family-run eateries to be enjoyed by locals and holiday-makers alike. In this dish, we pay homage to the time-honoured culinary traditions of Italy’s seaside towns.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (6, 1, 6, 'Spicy Sweet Potato', 'Green rice burrito bowls, vegan.',19.90, 'Spicy Sweet Potato.jpg', 'ThaiLan', 'I made this last night, and my brother-in-law, a devout meat eater, loved it. But more importantly, the vegetarians present loved it. We were all wowed by the combo of textures and flavors: soft, crunchy, hot, cool. The hint of lime in the beans and the seasoned rice were show-stoppers. I am curious to try other flavored rice, but for now, thank you so much for such a wonderful company dish.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (44, 8, 8, 'Spicy Tuna Roll', 'tuna and cucumber',28.90, 'spicy-tuna-roll.jpg', 'Japan', 'Soft tuna and crispy cucumber combine to create a harmonious combination for delicious sushi', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (21, 4, 3, 'Street Tacos', '2 tablespoons reduced sodium soy sauce
2 tablespoons freshly squeezed lime juice
2 tablespoons canola oil, divided
3 cloves garlic, minced
2 teaspoons chili powder',36.5, 'StreetTacos.jpg', 'Mexico', 'What are street tacos? Mexican street tacos are smaller tacos, typically served on corn tortillas. They are small in size, making it easier for a “street traveler” to enjoy a quick meal. The filling is served on two small corn tortillas so that they dont rip or tear when piled high with toppings', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (35, 6, 8, 'Tagliatelle', 'Bolognese Bianco (Chicken, Veal, Pork) and Parmesan',39.90, 'tagliatelle-arrabbiata.jpg', 'Chinese', 'In this weeks Italo-Americano special, weve created the ultimate macaroni cheese, transforming a somewhat scorned American staple into something utterly irresistible. To do so, weve called upon a selection of beautiful cheeses from Italy, as well as a sumptuous scattering of gorgeous truffles sourced in Umbria', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (55, 10, 1, 'US-Beveragee', 'Beef, cheese, potato, onion, fries',30.1, 'US-Beveragee.jpg', 'USA', 'Non-alcoholic drinks[edit]. Image, Drink Name, Associated Region, Description', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (8, 2, 8, 'Vegan Potato Salad', 'Potatoes, tomatoes, onions, peppers, herbs, house spices, and olive oil.',49.90, 'vegan.jpeg', 'Viet Nam', 'Potatoes, tomatoes, onions, peppers, herbs, house spices, and olive oil.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (10, 2, 1, 'Vegan Hummus with Pita', 'sauce and garlic',39.59, 'VeganHummus.jpeg', 'Viet Nam', 'Creamy garbanzo beans mixed with sesame sauce and garlic.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (11, 2, 2, 'Vegan Spicy Falafel Wrap', ' onions, cilantro, parsley, and tahini',39.90, 'Veganpicy.jpeg', 'Viet Nam', 'Crispy spicy vegan falafel balls served with onions, cilantro, parsley, and tahini, on your choice of wrap.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (30, 5, 3, 'Veg Burger', 'Beef, cheese, potato, onion, fries',49.90, 'VegBurger.png', 'American', 'Veg burger,Coca Cola ,French fries', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (52, 9, 7, 'Vietnamese Ice Cream', 'Beef, cheese, potato, onion, fries',20.2, 'VietnameseIcecream.jpg', 'VietNam', 'Ice cream (derived from earlier iced cream or cream ice) is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Description, Featured)
VALUE (14, 3, 5, 'Wonton Noodle Soup', 'rice flour, vegetables, minced meat, soup',2.90, 'wonton-noodle-soup.jpg', 'Viet Nam', 'using beef bone broth for hours creates delicious soups and chewy noodles', FALSE);


INSERT INTO restaurants (id, name, image, address, description)
VALUE (1, 'Burgers Berlin', 'BurgersBerlin.jpg', 'Sonntagstr. 2, 10245 Berlin Germany', 'American, Fast Food');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (2, 'Chestnut Restaurant & Sky Bar', 'ChestnutRestaurant.PNG', '35-4, Insadong-gil, Jongno-gu, Seoul, South Korea', 'Vegan restaurant offering a variety of meals including salads, wraps, sandwiches, veggie burgers, lentil bowls, and pasta dinner. Serves craft beers, kombucha on tap, smoothies, and cold-pressed juices. Kitchen stops at 9pm. Reservations accepted, yet not same-day, Saturdays, or holidays');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (3, 'Chops Old Quarter', 'chopsolder.PNG', '12 Hang Bac Hanoi Old Quarter, Hoan Kiem, Hanoi', 'Serving food from 8am until late Chops has got you covered. With our daily brunch menu serving delights from French Toast to a good old English Fry Up. And our burger menu that runs all day serving up the best burgers Hanoi has to offer, or if your feeling a bit healthier they try one of our amazing salads');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (4, 'Essence Restaurant', 'EssenceRestaurant.PNG', '154 East 79th Street, Manhattan New York, New York, 10075, USA', 'Located on the 9th floor at No. 38A Tran Phu Street, Ba Dinh District, Hanoi, the award-winning renowned Essence Restaurant offers you various tasty authentic Vietnamese dishes, Japanese and standard Western menu for all-day dining. Accomplished with an extensive menu of beverages including fresh fruit shakes, coffees, cocktails and wines, the restaurant ensures you a wholesome meal with great food, excellent service in the right ambiance and fine spirits, all at a price guaranteed most reasonable in town.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (5, 'Hoang Cuisine', 'HoangCuisine.PNG', '2nd Floor, 20 Bat Dan Street Hang Bo Ward, Hanoi 100000 Vietnam', 'Based on our experiences working in tourism industry, we have many chances to know more about not only culture but also customs from people all over the world coming to Vietnam. Therefore, with our passion about food and to show our hospitality to every single customer, we would like to run this restaurant to introduce our pride - Vietnamese cuisine to all our friends from different countries.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (6, 'Poke Hanoi', 'poke_hanoi.png', '11B Hang Khay | Alley | Level 3 Hoan Kiem, Hanoi 100000 Vietnam', 'Poke Hanoi serves Hawaiian Poke. Poke Is a Hawaiian dish made of raw cube of fish marinated, in sauces. We serve our poke with rice, salads and a variety of toppings which you can choose yourself. Perfect place to eat healthy, we also serve smoothie bowls.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (7, 'Tungs Kitchen', 'tungkitchen.jpg', 'Locust Street, Philadelphia, Pennsylvania, 19121, USA', 'About Tungs Vietnamese cuisine & Cooking Class I am proud to assure that i will bring best food to customers in the world. I hope you enjoy the journey and good courses that I will take you on as I present a mix of traditional Vietnamese.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (8, 'The Handpulled Noodle', 'TheHandpulledNoodle.PNG', '3600 Broadway,New York, NY 10031', 'For noodles with plenty of Sichuan peppercorns, check out spicy tingly lamb soup, or go for more inventive dishes like the so-called Beijing bolognese. The dumplings here come in four flavor options and are served steamed or fried — opt for the latter. Scallion pancakes, vegetable sides, and iced teas also available.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (9, 'Xian Famous Foods', 'xianfood.png', '328 E 78th St,New York, NY 10075', 'The original location of this full-on empire from restaurateur Jason Wang opened in Flushing. As its reputation grew, branches started popping up all over the city with its spicy, fragrant style of cooking from northwestern China, inflected with Middle Eastern spices. Try any of the hand-pulled noodles and the spicy cumin lamb burger — the meat is rich, the bread has a crunchy sear on the outside, and the bun is soft enough inside to soak up plenty of lamb juices.');


INSERT INTO orders (id, user_id, first_name, last_name, email, phone, street, city, payment_type, total_amount, status)
VALUE (1, 6, 'Nguyễn Đình', 'Hiếu', 'DinhHieu8896gmail.com','0868 6633 15', '8 Ton That Thuyet', 'Ha Noi',1, 600, 1);
INSERT INTO orders (id, user_id, first_name, last_name, email, phone, street, city, payment_type, total_amount, status)
VALUE (2, 6, 'Nông Phan Mạnh', 'Hùng', 'HuyVQTH1909003@fpt.edu.vn','0868 6633 15', '8 Ton That Thuyet', 'Ha Noi',1, 100, 2);
INSERT INTO orders (id, user_id, first_name, last_name, email, phone, street, city, payment_type, total_amount, status)
VALUE (3, 6, 'Vũ Quang', 'Huy', 'HungNPMTH1908050@fpt.edu.vn','0868 6633 15', '8 Ton That Thuyet', 'Ha Noi',1, 100, 3);
INSERT INTO orders (id, user_id, first_name, last_name, email, phone, street, city, payment_type, total_amount, status)
VALUE (4, 6, 'Nguyễn Trung', 'Anh', 'AnhNTTH1908059@fpt.edu.vn','0868 6633 15', '8 Ton That Thuyet', 'Ha Noi',1, 100, 4);
INSERT INTO orders (id, user_id, first_name, last_name, email, phone, street, city, payment_type, total_amount, status)
VALUE (5, NULL, 'Phạm Thị Mai', 'Hoa', 'Hoa@gmail.com','032 8799000', '8 Ton That Thuyet', 'Ha Noi',1, 100, 5);
INSERT INTO orders (id, user_id, first_name, last_name, email, phone, street, city, payment_type, total_amount, status)
VALUE (6, NULL, 'Nguyễn', 'Tuân', 'A@gmail.com','032 8799000', '8 Ton That Thuyet', 'Ha Noi',1, 100, 6);
INSERT INTO orders (id, user_id, first_name, last_name, email, phone, street, city, payment_type, total_amount, status)
VALUE (7, NULL, 'Phạm', 'Tú', 'B@gmail.com','032 8799000', '8 Ton That Thuyet', 'Ha Noi',1, 100, 0);
INSERT INTO orders (id, user_id, first_name, last_name, email, phone, street, city, payment_type, total_amount, status)
VALUE (8, 6, 'Cao Trung', 'Kiên', 'Kien@gmail.com','0868 6633 15', '8 Ton That Thuyet', 'Ha Noi',1, 300, 1);
INSERT INTO orders (id, user_id, first_name, last_name, email, phone, street, city, payment_type, total_amount, status)
VALUE (9, 6, 'Dang Kim', 'Thi', 'ThiDK@gmail.com','0868 6633 15', '8 Ton That Thuyet', 'Ha Noi',1, 100, 2);


INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (1, 1, 1, 2, 100, 200);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (2, 1, 2, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (3, 1, 3, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (4, 1, 4, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (5, 1, 5, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (6, 2, 6, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (7, 3, 7, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (8, 4, 8, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (9, 5, 9, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (10, 6, 10, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (11, 7, 1, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (12, 8, 8, 2, 100, 200);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (13, 8, 9, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (14, 8, 10, 1, 100, 100);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (15, 9, 9, 1, 100, 100);


INSERT INTO feedbacks (id, user_id, name, email, message)
VALUE (1, 6, 'Nguyễn Đình Hiếu', 'DinhHieu8896gmail.com', 'Very excellent products.');
INSERT INTO feedbacks (id, user_id, name, email, message)
VALUE (2, 6, 'Vũ Quang Huy', 'HuyVQTH1909003@fpt.edu.vn', 'Best solution for online food sale.');
INSERT INTO feedbacks (id, user_id, name, email, message)
VALUE (3, NULL, 'Nông Phan Mạnh Hùng', 'HungNPMTH1908050@fpt.edu.vn', 'The software has every feature that my company needs.');
INSERT INTO feedbacks (id, user_id, name, email, message)
VALUE (4, NULL, 'Nguyễn Trung Anh', 'AnhNTTH1908059@fpt.edu.vn', 'Thanks a lot of development team. I used the product and very satisfied.');
