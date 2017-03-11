--
-- DATABASE : `Project_2`
--

CREATE DATABASE IF NOT EXISTS `Project_2`;
USE `Project_2`;

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
    FOREIGN KEY (`college`) REFERENCES colleges(cid)
)ENGINE = InnoDB ;

-- ----------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE IF NOT EXISTS `items`(
    `id` int(100) NOT NULL AUTO_INCREMENT,
    `uid` int(10) NOT NULL,
    `category` varchar(55) NOT NULL,
    `title` varchar(255) NOT NULL,
    `description` varchar(200) NOT NULL,
    `contact` varchar(100) NOT NULL,
    `itype` char(1) NOT NULL,
    `price` int(10) NOT NULL,
    `date` datetime NOT NULL,
    `image` BLOB,
    PRIMARY KEY (`id`),
    FOREIGN KEY (`uid`) REFERENCES users(id)
)ENGINE = InnoDB ;

-- ----------------------------------------

--
-- Table structure for table `colleges`
--

CREATE TABLE IF NOT EXISTS `colleges` (
    `cid` int(10) NOT NULL AUTO_INCREMENT,
    `cname` varchar(255) NOT NULL,
    PRIMARY KEY (`cid`),
    UNIQUE KEY (`cname`)
)ENGINE = InnoDB ;

-- ----------------------------------------

--
-- Dumping Data for table `colleges`
--

INSERT INTO colleges(`cname`) VALUES ('Motilal Nehru National Institute of Technology,Allahabad');
INSERT INTO colleges(`cname`) VALUES ('National Institute of Technology,Agartala');
INSERT INTO colleges(`cname`) VALUES ('National Institute of Technology,Calicut');
INSERT INTO colleges(`cname`) VALUES ('National Institute of Technology,Durgapur');
INSERT INTO colleges(`cname`) VALUES ('National Institute of Technology,Delhi');
