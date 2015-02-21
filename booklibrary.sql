-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2014 at 06:50 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `booklibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE IF NOT EXISTS `authors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `gender` enum('f','m') NOT NULL,
  `dob` date DEFAULT NULL,
  `biography` text,
  `address` varchar(45) DEFAULT NULL,
  `status` enum('enable','disable','delete','') NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `gender`, `dob`, `biography`, `address`, `status`, `created`, `modified`) VALUES
(1, 'Ma Nor Ha Yi', 'f', '2000-10-21', 'i admire', 'Yangon', 'disable', '1899-11-30 09:28:22', '2014-10-21 12:32:01'),
(2, 'Tar Yar Min Wai', 'm', '2014-10-17', 'Hello Bio', 'Yangaon', 'enable', '2014-10-17 05:52:52', '2014-10-24 10:04:30'),
(3, 'Min Khite Soe San', 'f', '2014-10-17', 'Bachlor', 'TaungGyi', 'enable', '2014-10-17 06:15:01', '2014-10-17 06:15:01'),
(4, 'Min Lu', 'm', '1985-11-21', 'My Favorite Author', 'Yangon', 'enable', '2014-10-21 12:28:41', '2014-10-21 12:28:41'),
(5, 'Lun Set Noe Myat', 'm', '2000-10-24', 'Yangon', 'Yangon', 'enable', '2014-10-24 10:18:16', '2014-10-24 10:18:16'),
(6, 'Pyae Paing Muu Eain', 'm', '2000-10-24', 'Tg paw thar', 'TaungGyi', 'enable', '2014-10-24 10:18:50', '2014-10-24 10:18:50'),
(7, 'Tha Doe Tay Za', 'm', '2000-10-25', 'Devil Story', 'Taze', 'enable', '2014-10-25 10:02:29', '2014-10-25 10:02:29'),
(8, 'ေနေနာ္', 'm', '2000-10-27', '', '', 'enable', '2014-10-27 06:16:47', '2014-10-27 06:16:47');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `publisher_id` int(11) DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `entitle` varchar(300) DEFAULT NULL,
  `ISBN` varchar(45) DEFAULT NULL,
  `borrow_price` int(11) DEFAULT NULL,
  `demage_price` int(11) DEFAULT NULL,
  `book_price` int(11) DEFAULT NULL,
  `description` text,
  `bookqty` tinyint(4) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '1=ok,2=delete',
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_book_publisher_idx` (`publisher_id`),
  KEY `fk_book_author1_idx` (`author_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `publisher_id`, `author_id`, `title`, `entitle`, `ISBN`, `borrow_price`, `demage_price`, `book_price`, `description`, `bookqty`, `status`, `created`, `updated`, `user_id`) VALUES
(00001, 3, 1, 'ေသာၾကာၾကယ္ ကတဲ့ ရထား', 'castle pull by Friday star', '4589-45678-5455-111', 100, 1000, 1000, 'star', 3, 2, '2014-10-14 00:00:00', '2014-10-29 11:31:32', 1),
(00002, 1, 2, 'ေကာင္းကင္အေၾကြေကာက္တဲ့လက္', 'ု်ုpick up droped sky', '45566445', 50, 600, 500, 'this book is good', 4, 1, '2014-10-21 10:07:38', '2014-10-29 11:41:44', 1),
(00003, 7, 3, 'ေကာ္ဖီည', 'coffee night', '4564878451455', 200, 2500, 2000, 'This Book is good fancy , imagination', 3, 1, '2014-10-25 08:52:20', '2014-10-25 08:52:20', 1),
(00004, 3, 7, 'သရဲေျခာက္တဲ့ည', 'devil scare night', '', 50, 2500, 2000, 'Devil Story', 1, 1, '2014-10-25 10:03:52', '2014-10-25 10:03:52', 1),
(00005, 1, 2, 'သူအိုးပုတ္ကေလး ကၽြန္ေတာ္ ျပန္မေပးပါ', 'her ', '', 200, 2500, 2000, 'Novel', 3, 1, '2014-10-25 11:14:44', '2014-10-25 11:14:44', 3),
(00006, 1, 4, 'ယုန္ကေလးရဲ႕ ကုိယ္', 'body of rabbit', '', 50, 2000, 1500, '', 5, 1, '2014-10-27 06:16:24', '2014-10-27 06:16:24', 3),
(00007, 1, 8, 'ယုန္ကေလးရဲ႕ ကုိယ္', 'body of rabbit', '5144545', 50, 2500, 2400, '', 0, 1, '2014-10-27 06:18:06', '2014-10-29 11:47:23', 3);

-- --------------------------------------------------------

--
-- Table structure for table `categorys`
--

CREATE TABLE IF NOT EXISTS `categorys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` int(11) NOT NULL,
  `description` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created` int(11) NOT NULL,
  `updated` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `type` varchar(45) DEFAULT NULL,
  `address` varchar(45) DEFAULT NULL,
  `contactph` varchar(45) DEFAULT NULL,
  `nrcno` varchar(45) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` enum('female','male','unspecified') DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime DEFAULT NULL,
  `updated` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `email`, `type`, `address`, `contactph`, `nrcno`, `dob`, `gender`, `status`, `created`, `updated`) VALUES
(00001, 'Ye Htun', 'yeye@gmail.com', 'premium', 'Taze', '0931463155', '5/TaSaNa(Naing)113481', '2014-01-01', '', 0, NULL, '2014-10-21 05:38:00'),
(00002, 'yEyE', 'maungyehtunzaw@gmail.com', '', 'hello', '0946566221', '5/tasana@2202230', '2003-01-01', NULL, 0, '2014-10-17 09:08:17', '2014-10-20 07:09:21'),
(00003, 'Kira', 'kira@deathnote.com', 'kill', '', '4565789', '', '2014-10-01', NULL, 0, '2014-10-17 09:16:57', '2014-10-17 09:19:50'),
(00004, 'Hate That', 'Ja@mail.com', 'hh', 'Yangon', 'hh', 'hsldfj', '2014-10-18', 'male', 0, '2014-10-18 10:53:16', '2014-10-18 10:53:16'),
(00005, 'Dream', 'toodreamsomuch@mail.com', 'enable', 'Yangon', '0946566221', '5/tasan(naing)456785', '2014-10-20', 'male', 0, '2014-10-20 05:16:15', '2014-10-20 05:16:15'),
(00006, 'Organe', 'helloPottery@com.aa', 'noone', 'Male', 'else me', 'Null', '2014-10-20', '', 0, '2014-10-20 05:42:58', '2014-10-20 05:42:58'),
(00007, 'Monaliza', 'kira@deathnote.com', 'enable', 'Yangon', '0946566221', '5/tasan(naing)456785', '2014-10-20', '', 0, '2014-10-20 05:47:33', '2014-10-20 05:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `publishers`
--

CREATE TABLE IF NOT EXISTS `publishers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `contactph` varchar(45) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `status` enum('enable','disable','delete','') NOT NULL DEFAULT 'enable' COMMENT 'the status of publisher avaliable or not',
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `company`, `contactph`, `address`, `status`, `created`, `modified`) VALUES
(1, 'Mg Myo', 'Two Cat', '097548425455', 'No3, Pyay Road, Ba Nyar Thar ya Kar Rod', 'enable', '2014-10-14 00:00:00', '2014-10-17 07:22:33'),
(2, 'U Mg Tin Gyi', 'Satekuchocho Publisher', '0913454545', 'Yangon', 'enable', '2014-10-17 07:09:33', '2014-10-17 07:22:45'),
(3, 'To2 P', 'Eleven Publisher', '094545', 'Mandaylay', 'enable', '2014-10-21 12:08:15', '2014-10-21 12:09:41'),
(4, 'Thein Aung', 'Labar Jar Pub', '09454587789', 'Loikaw', 'disable', '2014-10-21 12:18:03', '2014-10-21 12:19:06'),
(5, 'U Sein Mg', 'Lamp Publisher Gp', '0959784646', 'Yangon', 'enable', '2014-10-24 11:38:43', '2014-10-24 11:38:43'),
(6, 'U Aung Din', 'Dream House Pub', '01456987', 'Yangon', 'enable', '2014-10-24 11:39:44', '2014-10-24 11:39:44'),
(7, 'U Hmone Gyi', 'Guiding Star Pub', '4567879', 'Pyin Oo Lwin', 'enable', '2014-10-24 11:40:34', '2014-10-24 11:40:34');

-- --------------------------------------------------------

--
-- Table structure for table `transitions`
--

CREATE TABLE IF NOT EXISTS `transitions` (
  `id` int(5) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `book_id` int(5) unsigned zerofill DEFAULT NULL,
  `member_id` int(5) unsigned zerofill DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `status` enum('aa','bb','cc','dd','ee') NOT NULL DEFAULT 'bb' COMMENT '00=already back to lib,11=member not still back,22=lost book and give demage price;33=mean book is not return and this book is expire to return;44=''delete''',
  `remarks` varchar(300) DEFAULT NULL,
  `receivetime` datetime NOT NULL,
  `borrowtime` datetime NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_transition_book1_idx` (`book_id`),
  KEY `fk_transition_member1_idx` (`member_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `transitions`
--

INSERT INTO `transitions` (`id`, `book_id`, `member_id`, `group_id`, `status`, `remarks`, `receivetime`, `borrowtime`, `created`, `modified`) VALUES
(00001, 00001, 00001, 1, '', NULL, '0000-00-00 00:00:00', '1899-11-30 00:00:00', '2014-10-21 00:00:00', '2014-10-27 07:37:42'),
(00002, 00002, 00002, 2, '', NULL, '2014-10-22 00:00:00', '2014-10-09 00:00:00', '2014-10-15 00:00:00', '2014-10-27 07:33:22'),
(00003, 00007, 00002, NULL, 'bb', 'to receive back', '0000-00-00 00:00:00', '2014-10-25 09:29:00', '2014-10-25 09:49:25', '2014-10-29 11:11:29'),
(00004, 00002, 00005, NULL, 'bb', '', '0000-00-00 00:00:00', '2014-10-25 09:49:00', '2014-10-25 09:50:27', '2014-10-29 11:11:25'),
(00005, 00002, 00004, NULL, '', '', '0000-00-00 00:00:00', '2014-10-25 09:51:00', '2014-10-25 09:51:25', '2014-10-27 07:42:02'),
(00006, 00004, 00006, NULL, '', '', '0000-00-00 00:00:00', '2014-10-18 10:04:00', '2014-10-25 10:04:22', '2014-10-27 05:55:54'),
(00007, 00004, 00006, NULL, '', '', '0000-00-00 00:00:00', '2014-10-25 10:36:00', '2014-10-25 10:36:59', '2014-10-27 06:14:27'),
(00008, 00005, 00004, NULL, '', '', '0000-00-00 00:00:00', '2014-10-27 06:15:00', '2014-10-27 06:15:26', '2014-10-27 07:25:45'),
(00009, 00007, 00002, NULL, 'cc', '', '0000-00-00 00:00:00', '2014-10-29 07:40:00', '2014-10-29 07:40:56', '2014-10-29 11:16:27'),
(00010, 00007, 00007, NULL, 'bb', '', '0000-00-00 00:00:00', '2014-10-29 11:12:00', '2014-10-29 11:12:59', '2014-11-03 07:47:17'),
(00011, 00005, 00007, NULL, 'bb', '', '0000-00-00 00:00:00', '2014-10-29 11:13:00', '2014-10-29 11:13:08', '2014-10-29 11:14:35'),
(00012, 00003, 00003, NULL, 'bb', '', '0000-00-00 00:00:00', '2014-11-01 09:36:00', '2014-11-01 09:36:23', '2014-11-01 09:36:23'),
(00013, 00001, 00001, NULL, 'bb', '', '0000-00-00 00:00:00', '2014-11-01 10:58:00', '2014-11-01 10:58:44', '2014-11-03 08:22:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(20) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `status`, `created`, `modified`) VALUES
(1, 'yeye', '$2a$10$WCIJM6mtRewM3rqj3c.wQ.V0oTdG6YoG8fAzehLYF/H0fa4GuYJnC', 'admin', 0, '2014-10-20 09:05:15', '2014-10-20 09:05:15'),
(2, 'tintin', 'tintin', 'admin', 0, '2014-10-20 09:10:02', '2014-10-20 09:10:02'),
(3, 'apple', '$2a$10$WCIJM6mtRewM3rqj3c.wQ.V0oTdG6YoG8fAzehLYF/H0fa4GuYJnC', 'admin', 0, '2014-10-20 09:27:13', '2014-10-20 09:27:13'),
(4, 'thura', '$2a$10$PhaHs.Hfykg1ZXisl2UvC.wbZibkZ0gA2S.dNfa/FdhIRp6dOCgSW', 'author', 0, '2014-10-25 11:44:04', '2014-10-25 11:44:04'),
(5, 'apple', '$2a$10$Y5Ts7f.4nojc.ROCaddro.BiKTBHcPOerpWgb8uE8q8jZNE2vPLJG', 'admin', 0, '2014-11-03 08:17:54', '2014-11-03 08:17:54'),
(6, 'yeye', '$2a$10$O5Xq02ykDvCSU0A3oMA1fe3PLbCW3a.huOZWIjWc0.v6IdCIeYdV6', 'admin', 0, '2014-12-17 04:47:06', '2014-12-17 04:47:06');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `fk_book_author1` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_book_publisher` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `transitions`
--
ALTER TABLE `transitions`
  ADD CONSTRAINT `fk_transition_book1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transition_member1` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
