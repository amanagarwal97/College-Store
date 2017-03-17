--
-- DATABASE : `Project_2`
--

CREATE DATABASE IF NOT EXISTS `Project_2`;
USE `Project_2`;

-- -----------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
    `cid` int(10) NOT NULL,
    `cname` varchar(255) NOT NULL,
    PRIMARY KEY (`cid`),
    UNIQUE KEY (`cname`)
)ENGINE = InnoDB ;

-- -----------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users`(
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `college` int(10) NOT NULL,
    `gender` char(1) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`email`),
    FOREIGN KEY (`college`) REFERENCES colleges(`cid`)
)ENGINE = InnoDB ;

-- ----------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `name` varchar(255) NOT NULL,
    PRIMARY KEY (`id`),
    UNIQUE KEY (`name`)
)ENGINE = InnoDB ;

-- ----------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items`(
    `id` int(100) NOT NULL AUTO_INCREMENT,
    `uid` int(10) NOT NULL,
    `category` int(10) NOT NULL,
    `title` varchar(255) NOT NULL,
    `description` varchar(200) NOT NULL,
    `contact` varchar(100) NOT NULL,
    `itype` int(1) NOT NULL,
    `price` int(10) NOT NULL,
    `date` datetime NOT NULL,
    `image` varchar(255),
    PRIMARY KEY (`id`),
    FOREIGN KEY (`uid`) REFERENCES users(`id`),
    FOREIGN KEY (`category`) REFERENCES categories(`id`)
)ENGINE = InnoDB ;

-- ----------------------------------------

--
-- Dumping Data for table `categories`
--

INSERT INTO categories(`name`) VALUES ('Books');
INSERT INTO categories(`name`) VALUES ('Clothing');
INSERT INTO categories(`name`) VALUES ('Electronics');
INSERT INTO categories(`name`) VALUES ('Furniture');
INSERT INTO categories(`name`) VALUES ('Sports');
INSERT INTO categories(`name`) VALUES ('Vehicles');
INSERT INTO categories(`name`) VALUES ('Others');

-- ---------------------------------------
