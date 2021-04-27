# Created_by:
# Created_at: 18:00 2021-04-24
# Updated_at: 12:00 2021-04-27

# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                           Create DataBase                                           #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

# SET @DATABASE_Name = 'codedy_techwiz_foodmate';

# Create DataBase
DROP DATABASE IF EXISTS `codedy_techwiz_foodmate`;
CREATE DATABASE IF NOT EXISTS `codedy_techwiz_foodmate` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE `codedy_techwiz_foodmate`;

SET time_zone = '+07:00';
ALTER DATABASE `codedy_techwiz_foodmate` CHARACTER SET utf8 COLLATE utf8_unicode_ci;

#SET SQL_MODE = 'ALLOW_INVALID_DATES';

# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #
#                                            Create Tables                                            #
# = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = = #

# Create Table user
DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user`
(
    `id`                  INT AUTO_INCREMENT,

    `restaurant_id`       INT UNSIGNED,

    `user_name`           VARCHAR(64) UNIQUE NOT NULL,
    `email`               VARCHAR(64) UNIQUE NOT NULL,
    `password`            VARCHAR(128)       NOT NULL,
    `level`               TINYINT UNSIGNED   NOT NULL,

    `email_verified_at`   DATETIME,
    `verification_code`   VARCHAR(8)   DEFAULT NULL,
    `reset_password_code` VARCHAR(16)  DEFAULT NULL,
    `remember_token`      VARCHAR(128) DEFAULT NULL,

    `image`               VARCHAR(128),
    `gender`              BOOLEAN,
    `first_name`          VARCHAR(64),
    `last_name`           VARCHAR(64),
    `phone`               VARCHAR(16),
    `address`             VARCHAR(128),

    `active`              BOOLEAN      DEFAULT FALSE,

    `created_by`          NVARCHAR(32) DEFAULT 'codedy_techwiz_foodmate',
    `created_at`          TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`          NVARCHAR(32) DEFAULT NULL,
    `updated_at`          TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`             INT          DEFAULT 1,
    `deleted`             BOOLEAN      DEFAULT FALSE,

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
    `tag`                 VARCHAR(128),
    `description`         TEXT,
    `featured`            BOOLEAN      DEFAULT FALSE NOT NULL,

    `created_by`          NVARCHAR(32) DEFAULT 'codedy_techwiz_foodmate',
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

    `created_by` NVARCHAR(32) DEFAULT 'codedy_techwiz_foodmate',
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
    `id`               INT AUTO_INCREMENT,

    `user_id`          INT UNSIGNED,
    `restaurant_id`    INT UNSIGNED         NOT NULL,

    `delivery_address` VARCHAR(128)         NOT NULL,

    `payment_type`     INT UNSIGNED         NOT NULL,
    `total_amount`     DECIMAL(16) UNSIGNED NOT NULL,

    `status`           INT UNSIGNED         NOT NULL,
    `reason_reject`    VARCHAR(128),

    `created_by`       NVARCHAR(32) DEFAULT 'codedy_techwiz_foodmate',
    `created_at`       TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `updated_by`       NVARCHAR(32) DEFAULT NULL,
    `updated_at`       TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
    `version`          INT          DEFAULT 1,
    `deleted`          BOOLEAN      DEFAULT FALSE,

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

    `created_by`   NVARCHAR(32) DEFAULT 'codedy_techwiz_foodmate',
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

    `created_by`  NVARCHAR(32) DEFAULT 'codedy_techwiz_foodmate',
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
    `rating`     INT,

    `created_by` NVARCHAR(32) DEFAULT 'codedy_techwiz_foodmate',
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

INSERT INTO User (id, restaurant_id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, address, active)
VALUE (10, NULL, 'Host', 'host.codedy@gmail.com', '$2y$10$oW..IGNT/CH2muKpN/8LAuNJ1ahnwLoyCBWRQyBj4p6ITOJFb.gs2', 1, '2020-08-08', 'host.jpg', 1, 'CODEDY', 'Host', '032 87 99 000', '8, Ton That Thuyet, Ha Noi, Viet Nam', TRUE);
INSERT INTO User (id, restaurant_id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, address, active)
VALUE (9, NULL, 'Admin', 'admin.codedy@gmail.com', '$2y$10$/AmOQGhkVS8otOSJbAv.6OHxseW/AOdVw7wxNbopMHgy0Btbp3Anu', 2, '2020-08-08', 'admin.jpg', 1, 'CODEDY', 'Admin', '0868 6633 15', '8, Ton That Thuyet, Ha Noi, Viet Nam', TRUE);
INSERT INTO User (id, restaurant_id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, address, active)
VALUE (8, 3, 'Staff_B', 'staff_b.codedy@gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 3, '2020-08-08', 'staff_b.jpg', 2, 'CODEDY', 'Staff B', '0868 6633 15', '8, Ton That Thuyet, Ha Noi, Viet Nam', TRUE);
INSERT INTO User (id, restaurant_id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, address, active)
VALUE (7, 1, 'Staff_A', 'staff_a.codedy@gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 3, '2020-08-08', 'staff_a.jpg', 1, 'CODEDY', 'Staff A', '0868 6633 15', '8, Ton That Thuyet, Ha Noi, Viet Nam', TRUE);
INSERT INTO User (id, restaurant_id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, address, active)
VALUE (6, NULL, 'Customer', 'customer.codedy@gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 4, '2020-08-08', 'member.jpg', 1, 'CODEDY', 'Customer', '0868 6633 15', '8, Ton That Thuyet, Ha Noi, Viet Nam', TRUE);
INSERT INTO User (id, restaurant_id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, address, active)
VALUE (5, NULL, 'DinhHieu8896', 'DinhHieu8896gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 4, '2020-08-08', 'DinhHieu8896.jpg', 1, 'Nguyễn Đình', 'Hiếu', '0868 6633 15', '8, Ton That Thuyet, Ha Noi, Viet Nam', TRUE);
INSERT INTO User (id, restaurant_id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, address, active)
VALUE (4, NULL, 'HuyVQTH1909003', 'HuyVQTH1909003@fpt.edu.vn', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 4, '2020-08-08', 'HuyVQTH1909003.jpg', 1, 'Vũ Quang', 'Huy', '0868 6633 15', '8, Ton That Thuyet, Ha Noi, Viet Nam', TRUE);
INSERT INTO User (id, restaurant_id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, address, active)
VALUE (3, NULL, 'HungNPMTH1908050', 'HungNPMTH1908050@fpt.edu.vn', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 4, '2020-08-08', 'HungNPMTH1908050.jpg', 1, 'Nông Phan Mạnh', 'Hùng', '0868 6633 15', '8, Ton That Thuyet, Ha Noi, Viet Nam', TRUE);
INSERT INTO User (id, restaurant_id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, address, active)
VALUE (2, NULL, 'AnhNTTH1908059', 'AnhNTTH1908059@fpt.edu.vn', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 4, '2020-08-08', 'AnhNTTH1908059.jpg', 1, 'Nguyễn Trung', 'Anh', '0868 6633 15', '8, Ton That Thuyet, Ha Noi, Viet Nam', TRUE);
INSERT INTO User (id, restaurant_id, user_name, email, password, level, email_verified_at, image, gender, first_name, last_name, phone, address, active)
VALUE (1, NULL, 'Admin_Demo', 'admin_demo.codedy@gmail.com', '$2y$10$//Od0OmEqRwFepW3wynrYOwslyvaS.snzBbpWwskF1Zrg5fNI.eTe', 2, '2020-08-08', 'admin_demo.jpg', 1, 'CODEDY', 'Admin_Demo', '0868 6633 15', '8, Ton That Thuyet, Ha Noi, Viet Nam', FALSE);


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


INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (1, 1, 1, 'Best Lentil Soup', 'Includes vegetables and flour',10.59, 'Best Lentil Soup.jpg', 'Viet Nam', 'Snacks', 'My lentil soup is made with most of the ingredients in the pantry but includes hearty greens and a squeeze of lemon for a fresh flavor. It is seasoned with a few of my spices and lots of freshly ground black pepper', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (2, 1, 2, 'Crispy Baked Falafel', 'Includes several healthy vegetables',13.89, 'Crispy Baked Falafel.jpg', 'American', 'Lunch', 'No kidding! If you are a mom of a picky eater or someone constantly worried about including various veggies in your family’s diet and hoping to relish the goodness of all vegetables in one go – pick vegetable flours.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (3, 1, 1, 'Peanut Slaw with Soba Noodles', 'cabbage, carrots, scallions, peanut butter',18.39, 'Peanut Slaw with Soba Noodles.jpg', 'Viet Nam', 'Snacks', 'Its spicy (mild). It is beans and pasta. It is a friend of all vegetables. Its a salad ... not really a salad. It has a crunchy flavor from soft drinks and juices, and its extremely water-free and a mixture of carbs called soba noodles, and its also colorful and crunchy and fresh, so its the same.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (4, 1, 2, 'Black Bean Sweet Potato Enchiladas', 'Include black beans, sweet potatoes and some special spices',15.29, 'Black Bean Sweet Potato Enchiladas.jpg', 'Japan', 'Breakfast', 'This is a delicious vegetarian dish that will suit everyone, with the black beans and sweet potatoes combined to make the black Bean Sweet Potato Enchiladas. This dish is easy to eat so we thought it would be a dish suitable for everyone', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (5, 1, 1, 'Spaghetti Squash Burrito Bowls', 'pumpkin, olive oil, monosodium glutamate and chili powder',16.39, 'Spaghetti Squash Burrito Bowls.jpg', 'American', 'Snacks', 'This is a dish with all vegetable ingredients so it will be very suitable for those on a diet, although this is also a dish full of nutrients. I look forward to you coming to our store or ordering it online to try our food', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (6, 1, 2, 'Spicy Sweet Potato', 'The main ingredient is sweet potato',12.89, 'Spicy Sweet Potato.jpg', 'ThaiLan', 'Lunch', 'Spicy roasted sweet potatoes make a great treat for chicken, pork or beef and they also taste great when combined with eggs, making for an easy breakfast. Try tossing leftovers into a green leaf salad with some feta cheese. I recommend you to try this one once because of its special taste', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (7, 2, 1, 'Vegan Eggplant Salad', 'Peppers, garlic, fresh herbs, lemon juice',10.59, 'engg.jpg', 'Viet Nam', 'Dinner', 'Grilled aubergine salad with chickpeas and tomato is a recipe inspired by Mediterranean flavors. Its vegan, gluten-free and healthy. This is also a dish recommended by nutrition experts because it is full of nutrients', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (8, 2, 3, 'Vegan Potato Salad', 'Potatoes, tomatoes, onions, peppers, herbs, house spices, and olive oil.',13.89, 'vegan.jpg', 'Viet Nam', 'Dinner', 'this vegan potato salad is a must for your summer picnics and parties! A flavorful dressing, dill pickles, and crunchy celery and onion make this recipe a favorite. ', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (9, 2, 1, 'Vegan Onion Rings', 'Carrots, cabbage, onions, olive oil',18.39, 'onion.jpg', 'Viet Nam', 'Snacks', 'You will love these vegan onion rings! They are extremely crunchy and delicious. Plus, theyre baked in the oven, making them much healthier than fried onion slices. This dish will also be very attractive to your children', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (10, 2, 3, 'Vegan Hummus with Pita', 'cucumber, tomato, red wine vinegar, salt and black pepper',15.29, 'VeganHummus.jpg', 'Viet Nam', 'Snacks', 'Im not lying when I say that this is a best-selling sandwich in our store. I was skeptical when I saw no cheese or meat in the recipe - how could it really be called a sandwich without those two ?? Thats a completely dumb thought of mine. It turns out that not only can it be called a sandwich, it can be called an absolutely amazing!', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (11, 2, 1, 'Vegan Spicy Falafel Wrap', 'Onions, cilantro, parsley, and tahini',16.39, 'Veganpicy.jpg', 'Viet Nam', 'Breakfast', 'This Spicy Vegan Falafel Wrap is an Indian version of very famous middle eastern street food falafel wrap. To give the Indian touch to traditional vegan falafel wrap, we have added some more spices to make it more aromatic and spicy. The falafel wrap recipe using the very basic ingredients of chickpeas, cilantro, onions, garlic, cumins, in addition we have added peppercorns, cinnamon, cloves and cayenne (red chili powder) to add to the spice.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (12, 2, 3, 'Original Acai Bowl', 'granola, fresh banana, blueberries and strawberries',12.89, 'original.jpg', 'Chinese', 'Breakfast', 'Introducing Acai Smoothie Bowls , a frozen smoothie blend topped with tangy fruit and crunchy granola. With delectable flavors and non-GMO ingredients, its a light and refreshing snack you can take anywhere. Our Acai Original Frozen Smoothie Bowl features a refreshing blend of  bananas, and honey topped with strawberries, blueberries, honey oat granola, and coconut. With only 210 calories, its the perfect snack for any time of day. Just grab, thaw and enjoy!', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (13, 3, 2, 'Minced Pork on Rice', 'Rice, Pork, Green onion, Soup',10.59, 'minced-pork-on-rice.jpg', 'China', 'Breakfast', 'This dish is based on one of Taiwans most loved comfort foods, though adapted it using more common kitchen ingredients. Feel free to substitute with your choice of meat. Serve over rice / noodles or cauliflower rice for a low carb option and enjoy.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (14, 3, 3, 'Wonton Noodle Soup', 'rice flour, vegetables, minced meat, soup',13.89, 'wonton-noodle-soup.jpg', 'Viet Nam', 'Snacks', 'Cantonese Wonton Noodles is a basic, indisputable noodle that you will find at most Cantonese restaurants. But if you are not near Chinatown or the Cantonese location, you will definitely want to try this at our restaurant. Its easy to put together. If you are interested in this dish then you come to our store or order one of our to try it', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (15, 3, 2, 'Chiayi Chicken Rice', 'Jidori chicken, shallot oil, house pickles,
garnished with scallions. Gluten Free',18.39, 'chiayi-chicken-rice.jpg', 'Korean', 'Lunch', 'Taiwanese chicken rice originated from Chiayi, a city in the southern part of Taiwan.  Traditionally its made with turkey, as its cheaper and more available back in the day.  If you visit Chiayi in Taiwan, you will see restaurants and food stalls selling turkey/chicken rice every where. In its appearance, this dish is deceptively simple -- seemingly just a bowl of white rice topped with some shredded chicken and sauce.  The flavor, however, will surprise you with its depth and savoriness.  If you like Taiwanese braised pork rice (Lu Rou Fan), then you must try this chicken rice.  To me, they are equally delicious and addictive.  I always end up eating more whenever I made this chicken rice!', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (16, 3, 3, 'Slack Season Noodles', 'Chicken and pork broth, minced pork, garlic,
shrimp',15.29, 'slack-season-noodles.jpg', 'American', 'Breakfast', 'Like many dishes in Taiwan, this one combines meat and seafood. The broth is often enriched with a sea flavor by simmering the head and shells of the shrimp in a basic pork stock. The noodles are then topped with a simmered pork sauce often served with rice or noodles - a meat sauce recipe can be found here - plus the only cooked shrimp that is solemnly placed on top.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (17, 3, 2, 'Pork Meat Soup Dumplings', 'Rice flour, char siu, minced pork',16.39, 'porkmeatsoupdumplings.jpg', 'China', 'Breakfast', 'The Chinese soup dumplings are probably the most perfect food ever made. This dreamy snack is probably the most famous one from Jiangnan region, China. It is often associated with Shanghai city (the largest city in the region by population and also the largest city in China!), Which is why soup dumplings are often referred to as “Banh Bao”. Shanghai soup bag ”.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (18, 3, 3, 'Shanghai Sauteed Flat Noodle', 'Rice flour, pork, green onion, vegetables, chili, sugar, salt',12.89, 'shanghaisauteedflatnoodle.jpg', 'Viet Nam', 'Dinner', 'Plump, handmade noodles are the preference and have been for centuries.  Watching Chinese noodle-makers at work in food stalls along the streets of Shanghai, pulling dough and chopping with cleavers at lightening speed is truly awe-inspiring.  And whatever variations of noodles are served, the most popular remain ones based on rich brown sauces such as the one featured in this authentic recipe.  Not encumbered with a lot other ingredients, the central feature of this dish is, of course, the noodles. ', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (19, 4, 1, 'Anitas Cantina', 'Beef, cheese, potato, onion, fries',10.59, 'AnitasCantina.jpg', 'Mexico', 'Breakfast', 'We bring the flavors of South Texas and Mexico to you. Our Anitas Cantina is made from traditional home recipes. Everything on our menu is made with love at home - including our critically acclaimed corn and flour sandwiches. All of them are handmade, because nothing can beat homemade!', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (20, 4, 2, 'Salt n Lime', 'Beef, cheese, potato, onion, fries',13.89, 'SaltnLime.jpg', 'Mexico', 'Lunch', 'At Salt n Lime we offer clean n safely prepared meals of excellent quality and invite you to try our fresh Mexican n American foods. The key to our success is simple: providing quality consistent food that tastes great every single time', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (21, 4, 1, 'Street Tacos', '2 tablespoons reduced sodium soy sauce
2 tablespoons freshly squeezed lime juice
2 tablespoons canola oil, divided
3 cloves garlic, minced
2 teaspoons chili powder',18.39, 'StreetTacos.jpg', 'Mexico', 'Snacks', 'What are street tacos? Mexican street tacos are smaller tacos, typically served on corn tortillas. They are small in size, making it easier for a “street traveler” to enjoy a quick meal. The filling is served on two small corn tortillas so that they dont rip or tear when piled high with toppings', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (22, 4, 2, 'LimeVeganTacos', '2 tablespoons avocado oil (or coconut oil)
1/2 red onion, diced small
1/2 jalapeño, diced small (optional; or more to taste!)
1 large zucchini, chopped
1 green bell pepper, chopped (or any color)',15.29, 'LimeVeganTacos.jpg', 'Mexico', 'Dinner', 'The tacos are filled with pinto beans and brown rice simmered in veggie broth and seasonings. The tacos are then slathered in a tangy cilantro-lime sauce and topped with diced onion and fresh cilantro', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (23, 4, 1, 'Chicken Tacos', '1 large red onion, diced (reserve half)
500g chicken mince
30g Old El Paso™ Taco Spice Mix
1/2 cup water
1/2 cup Old El Paso™ Mild Taco Sauce',16.39, 'ChickenTacos.jpg', 'Mexico', 'Dinner', 'n a small bowl, combine chili powder, cumin, paprika, oregano, garlic powder, 1 teaspoon salt and 1/2 teaspoon pepper. Season chicken with chili powder mixture. Heat canola oil in a large skillet over medium high heat. Serve chicken in tortillas, topped with pico de gallo, avocado, cilantro and lime', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (24, 4, 2, 'Naco Taco', 'Beef, cheese, potato, onion, fries',12.89, 'NacoTaco.jpg', 'Mexico', 'Dinner', 'Food was tasty. Service was awesome, drinks were delicious. The restaurant has dim lighting, the sides are enough to share. I Couldnt have picked a better place to celebrate my birthday. Monday nights seem very low-key', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (25, 5, 1, 'Original Chicken Sandwich', 'Beef, cheese, potato, onion, fries',10.59, 'OriginalChicken.jpg', 'American', 'Lunch', 'Our original Chicken Sandwich is made from white chicken, light flour and topped with a simple combination of chopped lettuce and cream mayonnaise on a nut bread. We know that you will love this cake.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (26, 5, 1, 'Croissanwich Meal for Two', 'Beef, cheese, potato, onion, fries',13.89, 'Croissa.jpg', 'American', 'Dinner', 'Our King Croissanwich with Double Sausage is now made with 100% butter for a soft, flaky croissant piled high with fluffy eggs, two helpings of melted American cheese, and a hearty serving of savory sizzling sausage.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (27, 5, 2, 'SMOKED BACON BRISKET BURGER', 'Certified Angus Beef, smoked aged cheddar cheese, brisket, applewood smoked bacon, pickles, bbq sauce, toasted brioche bun',18.39, 'Smashburger.jpg', 'American', 'Lunch', 'Brisket Bacon Burger is made with certified Angus beef and covered with smoked brisket for 10 hours, then layered with Applewood bacon, smoked cheese, pickles and BBQ sauce on a brioche sandwich. Delivering an explosive taste in every delicious bite, Smashburger latest innovation will satisfy any meat-eaters cravings for meat.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (28, 5, 3, 'Mighty McMuffin Meal ', 'Beef, cheese, potato, onion, fries',15.29, 'Product_thumb_McMuffin-Mighty.jpg', 'American', 'Lunch', 'Mighty McMuffin is a messy Sausage & Eggs McMuffin throws two pieces of bacon and ketchup into the mix. The result is a dangerously addictive breakfast even by Macca standards: a single serving of 1950kJ energy, 11.4g of saturated fat, 31.5g of carbohydrates, 5.7g of sugar and 1220mg. sodium. Thats a pretty big total for something you can polish in four or five bites.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (29, 5, 4, 'BBQ Brekky Stack', 'Beef, cheese, potato, onion, fries',16.39, 'BBQ_Brekky_Stack.jpg', 'American', 'Dinner', 'Heres a great reason to spring out of bed. The awesome combination of a freshly cracked egg, flame-grilled sausage patty, premium eye bacon, cheese and BBQ sauce on a warm toasted tortilla wrap.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (30, 5, 5, 'Veg Burger', 'Beef, cheese, potato, onion, fries',12.89, 'VegBurger.jpg', 'American', 'Lunch', 'These veggie burgers are packed with vegetables! See how to make homemade veggie burgers that are hearty, flavorful and full of vegetables. These delicious vegetable-packed burgers are high in fiber (5 grams) and come in at just under 200 calories for one patty. Vegan substitutes are included in the recipe.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (31, 6, 1, 'Spaghetti with Ramps', 'Ramps, Chilies and Parmesan',10.59, 'Spaghetti.jpg', 'Chinese', 'Breakfast', 'Seafood is a treasured delicacy in Italy, which is no surprise when you think about the expansive coastline stretching from the northern regions of Veneto and Liguria all the way to the southern island of Sicily. From the shores of the Adriatic sea and the glistening marinas that line the Amalfi coast to the bustling ports of the Italian riviera, seafood is freshly prepared everyday in humble, family-run eateries to be enjoyed by locals and holiday-makers alike. In this dish, we pay homage to the time-honoured culinary traditions of Italy’s seaside towns.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (32, 6, 2, 'Bucatini', 'Pancetta, Tomato, Chilies and Pecorino',13.89, 'delish-bucatinipasta.jpg', 'Chinese', 'Snacks', 'The beautiful, rolling hills of Tuscany are home to countless vineyards and the region is fondly nicknamed ‘Chiantishire’ after the bold red wine that it produces in abundance. However, it is not only for its wine that this region is so well-loved.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (33, 6, 2, 'Garganelli', 'Mushroom Ragu and Ricotta Salata',18.39, 'creamy-cacio-e-pepe-recipe-2150w.jpg', 'Chinese', 'Breakfast', 'Now very much a favourite amongst the Pasta Evangelists community – and something of a signature dish – this hedonistic Roman classic is thought to have its name derived from when charcoal burners were used to cook the dish over campfires. In true Pasta Evangelists style, we’ve added our own twist to this classic, comforting dish, presenting a gloriously creamy carbonara with tangles of fresh bucatini – in our opinion bigger and better than spaghetti – which sop up this luxuriant sauce.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (34, 6, 3, 'Cacio Pepe', 'Black Pepper, Pecorino and Butter',15.29, 'CacioPepe.jpg', 'Chinese', 'Lunch', 'This sauce, although not strictly traditional, combines the classic ingredients of several regions of Italy: Calabria and Campania in the south and Lombardia in the north. Calabrian ‘nduja sausage, citrus celebrated in Campania, and mascarpone originating in Lombardia come together in this irresistible dish. The spicy and soft ‘nduja sausage forms the perfect base for this sauce', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (35, 6, 6, 'Tagliatelle', 'Bolognese Bianco (Chicken, Veal, Pork) and Parmesan',16.39, 'tagliatelle-arrabbiata.jpg', 'Chinese', 'Breakfast', 'In this weeks Italo-Americano special, weve created the ultimate macaroni cheese, transforming a somewhat scorned American staple into something utterly irresistible. To do so, weve called upon a selection of beautiful cheeses from Italy, as well as a sumptuous scattering of gorgeous truffles sourced in Umbria', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (36, 6, 7, 'Mint Pangrattato', 'Red Pepper, San Marzano Tomatoes, Extra Virgin Olive Oil, Salt, Basil',12.89, 'pangratto.jpg', 'American', 'Dinner', 'In Sardinia, you can ask any passerby - albeit in Sardu, the local language - what the secret to the island’s cuisine is and, should you understand the vernacular, they will tell you that the perfect Sardinian dish relies not on elaborate preparation but the use of as few ingredients as possible. Each, however, must be exquisite. ', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (37, 7, 1, 'Margherita Pizza', 'Tomato sauce, mozzarella cheese and
basil.',10.59, 'margherita-pizza.jpg', 'American', 'Lunch', 'Is a classic American pizza, with traditional American flavor and character', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (38, 7, 2, 'Pepperoni Pizza', 'Pepperoni, tomato sauce, mozzarella, and
provolone.',13.89, 'repperoni-pizza.jpg', 'ThaiLan', 'Dinner', 'using a special cheese called Pepperoni, n with a special taste gives the eater a new and attractive feeling.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (39, 7, 3, 'Italian Sausage Pizza', 'Tomato sauce, spicy sausage, smoked
mozzarella, potato, mama Lils peppers,…',18.39, 'italian-sausage-pizza.jpg', 'Korean', 'Lunch', 'An Italian pizza that uses special spicy sausage with mozzarella bacon to create a distinctive spicy flavor and is only suitable for adults and people to eat spicy.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (40, 7, 9, 'Cheese Pizza', 'Tomato sauce, mozzarella and provolone.',15.29, 'cheese-pizza.jpg', 'Japan', 'Breakfast', 'Cheese pizza uses cheese as the main flavor to make a difference to the cake and create a new impression on the eaters.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (41, 7, 8, 'Mushroom Pizza', 'Garlic, fontina, scallion, ricotta, and parmigiano.',16.39, 'mushroom-pizza.jpg', 'Viet Nam', 'Lunch', 'This pizza uses parmigiano mushrooms to create a highlight for the cake, parmigiano mushrooms combined with the leaves to create a special aroma that attracts people to eat.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (42, 7, 7, 'Fennel Diavolo Pizza', 'Garlic, spicy fennel, calabrese salami, red
onion, mozzarella, fennel pollen,…',12.89, 'fennel-diavolo-pizza.jpg', 'American', 'Snacks', 'Is a pizza that combines many different ingredients and spices to create harmony and give people a delicious pizza.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (43, 8, 1, 'Salmon Avocado Roll', 'Salmon and avocado',10.59, 'salmon-avocado-roll.jpg', 'Viet Nam', 'Snacks', 'The combination of salmon and avocado creates a rich and creamy sushi dish', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (44, 8, 2, 'Spicy Tuna Roll', 'tuna and cucumber',13.89, 'spicy-tuna-roll.jpg', 'Japan', 'Dinner', 'Soft tuna and crispy cucumber combine to create a harmonious combination for delicious sushi', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (45, 8, 3, 'Baked Salmon Roll', 'salmon and cheese',18.39, 'baked-salmon-roll.jpg', 'American', 'Lunch', 'Grilled salmon with special sauce and cheese topped with a new flavor and california wrap create an eye-catching feeling for sushi.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (46, 8, 6, 'California Rool', 'Rice and butter',15.29, 'california-roll.jpg', 'ThaiLan', 'Dinner', 'Rice and avocado create a novel combination for sushi. With familiar ingredients, but this novel combination will bring everyone delicious and attractive sushi dishes ', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (47, 8, 5, 'Salmon Sushi', 'Rice and salmon',16.39, 'salmon-sushi.jpg', 'Japan', 'Breakfast', 'Salmon sushi is no longer a strange dish to everyone, a familiar delicious sushi that everyone should try at least once in their life.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (48, 8, 4, 'Shrimp Tempura Roll', 'Shrimp tempura, avocado and
cucumber roll and Topped with eel sauce.',12.89, 'shrim-tempura-roll.jpg', 'American', 'Snacks', 'Rice roll with shrimp, avocado, cucumber and eel sauce these 4 ingredients work together to create delicious and exotic sushi. 4 unrelated ingredients but when combined to create an unforgettable taste for first time eaters ', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (49, 9, 1, 'Little Bowl', 'Coconut milk, jelly, pearls',10.59, 'LittleBowl.jpg', 'VietNam', 'Snacks', 'Very small bowls, such as the tea bowl, are often called cups, while plates with especially deep wells are often called bowls. In many cultures bowls are the most common kind of vessel used for serving and eating food. Historically small bowls were also used for serving both tea and alcoholic drinks.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (50, 9, 2, 'Cheap Corner', 'Rice, meat, vegetables',13.89, 'CheapCorner.jpg', 'VietNam', 'Snacks', 'Product Description. If you are looking for comfort, style and competitive prices youve found the right sofa for you', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (51, 9, 3, 'Local Desserts', 'Ice blended, jelly, yogurt',18.39, 'LocalDesserts.jpg', 'VietNam', 'Breakfast', 'There is widespread use of rice flour in East Asian desserts, which often include local ingredients', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (52, 9, 1, 'Vietnamese Ice Cream', 'Cream, sticky rice, dry coconut',15.29, 'VietnameseIcecream.jpg', 'VietNam', 'Dinner', 'Ice cream (derived from earlier iced cream or cream ice) is a sweetened frozen food typically eaten as a snack or dessert. It may be made from dairy milk or cream and is flavoured with a sweetener, either sugar or an alternative, and any spice, such as cocoa or vanilla', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (53, 9, 2, 'Dough Tampas', 'Wheat flour, milk, chocolate',16.39, 'DoughTampas.jpg', 'VietNam', 'Lunch', 'Description. Meet Dough: a quirky and whimsical bistro and bakery by Datz. This is the place for delicious morning pastries, eclectic lunch, an afterschool snack', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (54, 9, 3, 'Dessert Place', 'Ice cream, chocolate, milk',12.89, 'DessertPlace.jpg', 'VietNam', 'Breakfast', 'Ice cream and chocolate taste great together', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (55, 10, 1, 'US-Beveragee', 'Water, fruit, ice, sugar',10.59, 'US-Beveragee.jpg', 'USA', 'Lunch', 'Cool non-alcoholic drinks and fruity flavors', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (56, 10, 2, 'Soda', 'Fruit, soda, sugar, ice cold',13.89, 'Soda.jpg', 'USA', 'Dinner', 'Great combination of soda and fruit flavor', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (57, 10, 3, 'Fruit Juice', 'Fruit, sugar, ice cold',18.39, 'FruitJuice.jpg', 'Korean', 'Breakfast', 'Fruit juice is 100% pure juice made from the flesh of fresh fruit or from whole fruit, depending on the type used. It is not permitted to add sugars, sweeteners, preservatives, flavourings or colourings to fruit juice. Fruit juices are usually described as: From concentrate.', TRUE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (58, 10, 4, 'Matcha Mojito', 'White rum, sugar, lemon juice, soda water and green tea powder',15.29, 'MatchaMojito.jpg', 'Korean', 'Dinner', 'The combination of the sweetness of green tea and the herbal mint flavor is intended to complement rum, making mojito a popular summer drink.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (59, 10, 5, 'Cocktail Cafe', 'Base wines, colorants, fragrances, coffee and decorations',16.39, 'CocktailCafe.jpg', 'Korean', 'Snacks', 'A cocktail is an alcoholic mixed drink, which is either a combination of spirits, or one or more spirits mixed with other ingredients such as fruit juice, flavored syrup, or cream.', FALSE);
INSERT INTO Products (Id, Product_Category_Id, Restaurant_Id, Name, Ingredients, Price, Image, Country, Tag, Description, Featured)
VALUE (60, 10, 6, 'Milk Tea', 'Tea, milk, sugar, pearls and fruit syrup',12.89, 'MilkTea.jpg', 'Korean', 'Snacks', 'The term ""milk tea"" refers to any tea drink with milk added. It can be as simple as a splash of milk in a hot cup of tea, or it can be a complex recipe including various ingredients, like the popular bubble tea. ... Milk tea is enjoyed throughout the world as both a hot and cold beverage.', FALSE);


INSERT INTO restaurants (id, name, image, address, description)
VALUE (1, 'Essence Restaurant', 'EssenceRestaurant.PNG', '154 East 79th Street, Manhattan New York, USA', 'Located on 154 East 79th Street, Manhattan New York, the award-winning renowned Essence Restaurant offers you a variety of delicious authentic Western menus for all-day dining. With an extensive drink menu including fresh fruit shakes, coffee, cocktails and wines, the restaurant guarantees a nutritious meal with delicious food, great service in the right space and brandy , all with the most affordable prices in town.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (2, 'Chestnut Restaurant & Sky Bar', 'ChestnutRestaurant.PNG', '35-4, Insadong-gil, Jongno-gu, Seoul, South Korea', 'Vegan Chestnut & Sky Bar restaurant serves a variety of meals including salads, skin rolls, sandwiches, vegetarian burgers, lentils bowls and pasta dinner. Serves craft beers, tap water kombucha, cold-pressed smoothies and juices. The kitchen stopped at 9pm. Reservations are accepted, but not on the same day, Saturday or holiday');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (3, 'Poke Hanoi', 'poke_hanoi.png', '11B Hang Khay | Alley | Level 3 Hoan Kiem, Hanoi 100000 Vietnam', 'Poke Hanoi serves Hawaiian Poke. Poke Is a Hawaiian dish made of raw cube of fish marinated, in sauces. We serve our poke with rice, salads and a variety of toppings which you can choose yourself. Perfect place to eat healthy, we also serve smoothie bowls.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (4, 'Chops Old Quarter', 'chopsolder.PNG', '12 Hang Bac Hanoi Old Quarter, Hoan Kiem, Hanoi', 'Serving food from 8am until late Chops has got you covered. With our daily brunch menu serving delights from French Toast to a good old English Fry Up. And our burger menu that runs all day serving up the best burgers Hanoi has to offer, or if your feeling a bit healthier they try one of our amazing salads');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (5, 'Burgers Berlin', 'BurgersBerlin.jpg', '112 Sonntag, Berlin, Germany', 'Burgers Berlin is currently a major fast food restaurant. Every day, more than 1000 diners come to Burgers Berlin restaurants to enjoy high quality food, excellent taste and affordable prices. The predecessor was Insta-Burger King, founded by Matthew Burns and Keith J. Kramer in 1953. The Insta-Broiler blister cooking recipe produces meatballs with excellent taste.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (6, 'Hoang Cuisine', 'HoangCuisine.PNG', '2nd Floor, 20 Bat Dan Street Hang Bo Ward, Hanoi, Vietnam', 'Based on our experiences working in tourism industry, we have many chances to know more about not only culture but also customs from people all over the world coming to Vietnam. Therefore, with our passion about food and to show our hospitality to every single customer, we would like to run this restaurant to introduce our pride - Vietnamese cuisine to all our friends from different countries.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (7, 'Green Cuisine', 'tungkitchen.jpg', '15 Ta Hien, Hang Buom, Hoan Kiem, Hanoi', 'Even if diners are willing to pay a minimum of $ 325 per person, it can be difficult to book a table at this food temple. However, it is hard to resist the appeal of Thomas Kellers famous ""Chicken egg salad"", accompanied by 8 perfect dishes without any repeating ingredients in each dish.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (8, 'The Handpulled Noodle', 'TheHandpulledNoodle.PNG', '196 Spring St Soho, New York City, USA', 'The Sichuan dishes here look very nice with delicious taste. Diners coming here not only can enjoy the food but also watch the artists performing the painting on the zither in the evening. Some dishes that we should not miss are: shark fin soup, grilled lobster with salt and chilli, duck drinking Chengdu tea. Sitting on a luxury restaurant, diners eat and drink while watching the skyline. The average cost per person is about 45 $.');
INSERT INTO restaurants (id, name, image, address, description)
VALUE (9, 'Xian Famous Foods', 'xianfood.png', '778 Wall Street, New York, NY, USA', 'In fact, Xian Famous Foods has many similarities with Sichuan, but the flavor is different because of its sour taste, many salt grains and the dish often has a small bacon added. When visiting a famous high-class restaurant, visitors should enjoy the restaurants famous dishes such as fish head cooked with crushed eggplant, sauteed pork.');


INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (1, 6, 1, '8, Ton That Thuyet, My Dinh, Ha Noi',1, 60, 1, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (2, 6, 3, '24, Pham hung, My Dinh, Ha Noi',1, 10, 2, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (3, 6, 1, '15, Me Tri, Tu Liem, Ha noi',1, 10, 3, 'Not enough materials to make dishes.');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (4, 6, 1, '111, Phan Trong Tue, Thanh Tri, Ha Noi',1, 10, 4, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (5, 5, 1, '56, Giai Phong, Hoang Mai, Ha Noi',1, 10, 1, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (6, 4, 1, '19, Pho Hue, Hoan Kiem, Ha Noi',1, 10, 2, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (7, 3, 1, '78, Xuan Thuy, Cau Giay, Ha Noi',1, 10, 3, 'Over service time.');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (8, 6, 1, '356, To Huu, Ha Dong, Ha Noi',1, 30, 4, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (9, 6, 1, '543, Tran Hung Dao, Ba Dinh, Ha Noi',1, 10, 1, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (10, 2, 1, '87, Truong Dinh, Hoang Mai, Ha Noi',1, 40, 2, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (11, 3, 1, '97, Ngoc hoi, Thanh Tri, Ha Noi',1, 60, 3, 'Not enough materials to make dishes.');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (12, 4, 1, '96, Nguyen Ngoc Nai, Hoan Kiem, Ha Noi',1, 105, 4, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (13, 5, 1, '74, Luong Ngoc Khuyen, Ha Dong, Ha Noi',1, 85, 1, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (14, 2, 1, '63, Tran Duy Hung, Cau Giay, Ha Noi',1, 75, 2, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (15, 3, 1, '100, Phu Doan, Ba Dinh, Ha Noi',1, 60, 3, 'Over service time.');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (16, 4, 1, '63, Tam hiep, Mai Dich, Ha Noi',1, 80, 4, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (17, 5, 1, '64, Tran Thu Do, Thanh Tri, Ha Noi',1, 35, 1, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (18, 2, 1, '74, Tu Hiep, Hoang Mai, Ha Noi',1, 70, 2, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (19, 3, 1, '192, Pho Voi, Mai Dich, Ha Noi',1, 40, 3, 'Not enough materials to make dishes.');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (20, 4, 1, '12, Nui Truc, Ba Dinh, Ha Noi',1, 60, 4, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (21, 5, 1, '127, Tran Thai Tong, Hai Ba Trung, Ha Noi',1, 35, 1, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (22, 2, 1, '439, Van Dien, Thanh Tri, Ha Noi',1, 35, 2, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (23, 3, 1, '91, Nguyen Trai, Thanh Xuan, Ha Noi',1, 60, 3, 'Not enough materials to make dishes.');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (24, 4, 1, '382, Tay Mo, Ha Dong, Ha Noi',1, 45, 4, '');
INSERT INTO orders (id, user_id, restaurant_id, delivery_address, payment_type, total_amount, status, reason_reject)
VALUE (25, 5, 1, '97, Lien Hoa, My Dinh, Ha Noi',1, 70, 1, '');


INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (1, 1, 1, 2, 10, 20);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (2, 1, 3, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (3, 1, 5, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (4, 1, 7, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (5, 1, 9, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (6, 2, 2, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (7, 3, 19, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (8, 4, 21, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (9, 5, 23, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (10, 6, 25, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (11, 7, 26, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (12, 8, 37, 2, 10, 20);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (13, 8, 43, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (14, 8, 49, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (15, 9, 52, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (16, 10, 11, 2, 15, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (17, 10, 31, 1, 1, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (18, 11, 55, 2, 15, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (19, 11, 31, 3, 10, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (20, 12, 37, 1, 10, 20);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (21, 12, 1, 2, 20, 40);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (22, 12, 19, 3, 15, 45);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (23, 13, 25, 1, 25, 25);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (24, 13, 31, 2, 30, 60);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (25, 14, 43, 3, 10, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (26, 14, 55, 3, 15, 45);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (27, 15, 21, 3, 10, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (28, 15, 26, 2, 15, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (29, 16, 3, 4, 15, 60);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (30, 16, 11, 2, 10, 20);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (31, 17, 21, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (32, 17, 31, 1, 15, 15);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (33, 18, 37, 2, 15, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (34, 18, 43, 4, 10, 40);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (35, 19, 21, 1, 10, 10);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (36, 19, 23, 1, 15, 15);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (37, 19, 25, 1, 15, 15);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (38, 20, 19, 2, 15, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (39, 20, 37, 3, 10, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (40, 21, 37, 2, 10, 20);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (41, 21, 49, 1, 15, 15);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (42, 22, 26, 2, 10, 20);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (43, 22, 31, 1, 15, 15);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (44, 23, 7, 3, 10, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (45, 23, 9, 2, 15, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (46, 24, 21, 3, 10, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (47, 24, 37, 1, 15, 15);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (48, 25, 19, 2, 15, 30);
INSERT INTO order_details (id, order_id, product_id, qty, amount, total_amount)
VALUE (49, 25, 49, 4, 10, 40);


INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (1, 5, 'Nguyen Dinh Hieu', 'DinhHieu8896gmail.com', 'Very excellent products.', 5);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (2, NULL, 'Vu Quang Huy', 'HuyVQTH1909003@fpt.edu.vn', 'Best solution for online food sale.', 4);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (3, 3, 'Nong Phan Manh Hung', 'HungNPMTH1908050@fpt.edu.vn', 'The software has every feature that my company needs.', 5);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (4, NULL, 'Nguyen Trung Anh', 'AnhNTTH1908059@fpt.edu.vn', 'Thanks a lot of development team. I used the product and very satisfied.', 3);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (5, 2, 'Truong Thanh Tu', 'truongthanhtu@gmail.com', 'Good service shops', 3);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (6, 4, 'Pham Tuan', 'phamtuan@gmail.com', 'Very good food and good service quality', 5);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (7, NULL, 'Do Thi Chan Hoa', 'dothichanhoa@gmail.com', 'I appreciate the quality of your food', 4);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (8, NULL, 'Dang Kim Thi', 'dangkimthi@gmail.com', 'fast service and delicious food', 5);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (9, NULL, 'Nhu Hoang Minh Duc', 'ducnhu@gmail.com', 'delicious food', 4);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (10, NULL, 'Nguyen Van Thuan', 'nguyenvanthuan@gmail.com', 'Food is fine', 3);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (11, NULL, 'Mai Xuan Truong', 'maixuantruong@gmail.com', 'fast shipping', 5);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (12, NULL, 'Do Huu Cong', 'dohuucong@gmail.com', 'The food is very palatable', 4);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (13, NULL, 'Nguyen Quang Nhat', 'nguyenquangnhat@gmail.com', 'Pack the dish carefully', 4);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (14, NULL, 'Ha Van Vu', 'havanvu@gmail.com', 'diversified food', 4);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (15, NULL, 'Truong Lam', 'truonglam@gmail.com', 'Fast delivery and very good food', 5);
INSERT INTO feedbacks (id, user_id, name, email, message, rating)
VALUE (16, NULL, 'Vu Thanh Lam', 'vuthanhlam@gmial.com', 'delicious food', 4);

