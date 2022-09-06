-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 06, 2022 at 03:51 PM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cse_318`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity`
--

DROP TABLE IF EXISTS `activity`;
CREATE TABLE IF NOT EXISTS `activity` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity`
--

INSERT INTO `activity` (`id`, `title`, `user_id`) VALUES
(1, 'Join on Test Club eventEvent', 2),
(2, 'Join on Test Club eventEvent', 2),
(3, 'Join on Test Club eventEvent', 2),
(4, 'Join on Test Club eventEvent', 2),
(5, 'Join on Test Club eventEvent', 2),
(6, 'Join on Test Club eventEvent', 2),
(7, 'Join on s fasdf adsf ad Event', 2),
(8, 'Join on s fasdf adsf ad Event', 1);

-- --------------------------------------------------------

--
-- Table structure for table `attachment`
--

DROP TABLE IF EXISTS `attachment`;
CREATE TABLE IF NOT EXISTS `attachment` (
  `attachment_id` int NOT NULL AUTO_INCREMENT,
  `attachment_name` mediumtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`attachment_id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `attachment`
--

INSERT INTO `attachment` (`attachment_id`, `attachment_name`, `user_id`) VALUES
(1, 'man.png', 1),
(30, 'phpCB61-photo-1633332755192-727a05c4013d.jpg', 2),
(9, '9-project-task-list.png', 1),
(34, 'phpECE-Cambridge-Images.jpeg', 1),
(33, 'php9F69-Max-R_Headshot (1).jpg', 1),
(15, 'php73EE-Mask Group.png', 1),
(17, 'php1B1C-Screenshot 2022-07-17 200159.png', 1),
(37, 'phpA53F-Star Tech - 1652969725.png', 1),
(35, 'phpE2CA-Fantastic Maimu-Crift.png', 1),
(32, 'php7AF2-Depositphotos_158586554_L 1.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

DROP TABLE IF EXISTS `authentication`;
CREATE TABLE IF NOT EXISTS `authentication` (
  `auth_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `code` varchar(999) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`auth_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `club`
--

DROP TABLE IF EXISTS `club`;
CREATE TABLE IF NOT EXISTS `club` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` int DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci,
  `president` int DEFAULT NULL,
  `vic_president` int DEFAULT NULL,
  `created_by` int NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `club`
--

INSERT INTO `club` (`id`, `name`, `img`, `description`, `president`, `vic_president`, `created_by`, `created_on`) VALUES
(8, 'Test Club', 17, 'fdsg dfg sfdg  sfdg sdfg dfs gs\r\ndf g\r\nljkasdz kljsdaf hnsdkjaf hfkjdg nsdfkvjsdfnv \r\n\r\nda sdas\r\nd as\r\nd asd asd asd ', NULL, NULL, 1, '2022-07-19 04:14:44'),
(6, 'Test 2', 34, 'asd asd as', NULL, NULL, 1, '2022-07-04 21:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
CREATE TABLE IF NOT EXISTS `event` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `img` int DEFAULT NULL,
  `reg_start` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `event_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `venue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `club_id` int NOT NULL,
  `created_by` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `name`, `description`, `img`, `reg_start`, `event_date`, `venue`, `club_id`, `created_by`) VALUES
(1, 'tesdasd', 'as das dasd\r\nd asd\r\nas das d\r\nas d\r\nas d\r\nasd\r\n', NULL, '2022-07-14 00:00:00', '2022-07-28 00:00:00', 'asd asd asd ,asd masd, asd', 2, 1),
(2, 'Easjd asdj', 'Hui tajsdh asjdh asdjl hasdj asd \r\nasd \r\nasd \r\nasd asd kl;asjd laksjd sldkj as.dk ja.sjsdjk,f .s,df sdf', NULL, '2022-07-06 00:00:00', '2022-07-16 00:00:00', 'aslk;dj as;ldkj asldkj', 2, 1),
(3, 'Easjd asdj', 'Hui tajsdh asjdh asdjl hasdj asd \r\nasd \r\nasd \r\nasd asd kl;asjd laksjd sldkj as.dk ja.sjsdjk,f .s,df sdf', NULL, '2022-07-06 00:00:00', '2022-07-16 00:00:00', 'aslk;dj as;ldkj asldkj', 2, 1),
(5, 's fasdf adsf ad', 'a fds fa\r\nsdf as\r\ndf asdf adsf asdfasdf asdf fdasg sdfg \r\nsdfg sdfg sdfg sdfg', 32, '2022-07-21 00:00:00', '2022-07-30 00:00:00', 'Dhaka - 1216', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `event_join`
--

DROP TABLE IF EXISTS `event_join`;
CREATE TABLE IF NOT EXISTS `event_join` (
  `event_id` int NOT NULL,
  `user_id` int NOT NULL,
  PRIMARY KEY (`event_id`,`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `event_join`
--

INSERT INTO `event_join` (`event_id`, `user_id`) VALUES
(4, 2),
(5, 1),
(5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

DROP TABLE IF EXISTS `messages`;
CREATE TABLE IF NOT EXISTS `messages` (
  `msg_id` int NOT NULL AUTO_INCREMENT,
  `incoming_msg_id` int NOT NULL,
  `outgoing_msg_id` int NOT NULL,
  `msg` varchar(1000) NOT NULL,
  PRIMARY KEY (`msg_id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`msg_id`, `incoming_msg_id`, `outgoing_msg_id`, `msg`) VALUES
(1, 1, 2, 'Hi man'),
(2, 2, 0, 'Hello'),
(3, 2, 1, 'Hello'),
(4, 1, 2, 'How are you?'),
(5, 2, 1, 'Fine'),
(6, 2, 1, 'ASdlksjad hsadj hs'),
(7, 1, 2, 'laskd jasldk j'),
(8, 1, 2, 'Hi There'),
(9, 1, 2, 'How are you?'),
(10, 2, 1, 'What about you?'),
(11, 1, 2, 'All is good'),
(12, 2, 1, 'Okay bye :)'),
(13, 2, 1, 'Hi'),
(14, 1, 2, 'Hello'),
(15, 2, 1, 'Hi'),
(16, 2, 1, 'dfg '),
(17, 1, 2, '?'),
(18, 2, 1, ':)'),
(19, 1, 2, ':(');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `cat_id` int NOT NULL,
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `title`, `user_id`, `cat_id`, `created_on`) VALUES
(1, 'notification 1', 1, 0, '2022-03-20 12:15:53'),
(2, 'notification 2', 1, 2, '2022-03-20 12:15:53'),
(3, 'notification 1', 2, 2, '2022-03-20 12:15:56'),
(4, 'notification 2', 2, 2, '2022-03-20 12:15:56'),
(5, 'CSE 200 Share with you', 2, 2, '2022-03-20 13:05:42'),
(6, 'CSE 200 Share with you', 2, 2, '2022-03-20 13:24:03'),
(7, 'CSE 200 Share with you', 2, 2, '2022-03-20 13:24:14'),
(8, 'You have been given a new task on CSE 200', 2, 2, '2022-03-20 13:32:16'),
(9, 'You have been given a new task on Test Project', 1, 4, '2022-03-20 17:30:31'),
(10, 'You have been given a new task on Test Project', 1, 4, '2022-03-20 17:30:42'),
(11, 'You have been given a new task on Test Project', 1, 4, '2022-03-20 17:30:57'),
(12, 'Test Project Share with you', 2, 4, '2022-03-20 17:33:42'),
(13, 'You have been given a new task on CSE 200', 1, 2, '2022-03-20 19:44:43'),
(14, 'You have been given a new task on CSE 200', 1, 2, '2022-03-20 19:45:32'),
(15, 'You have been given a new task on CSE 200', 1, 2, '2022-03-20 19:47:02');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_email` varchar(99) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `user_password` varchar(999) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `img` int NOT NULL DEFAULT '1',
  `created_on` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL DEFAULT 'Offline now',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `email` (`user_email`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb3 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_email`, `user_password`, `img`, `created_on`, `status`) VALUES
(1, 'Munzirul Alom', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', 33, '2022-03-13 23:16:33', 'Active now'),
(2, 'User 1', 'demo@demo.com', '202cb962ac59075b964b07152d234b70', 30, '2022-03-20 11:28:57', 'Active now');

-- --------------------------------------------------------

--
-- Table structure for table `user_club`
--

DROP TABLE IF EXISTS `user_club`;
CREATE TABLE IF NOT EXISTS `user_club` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `club_id` int NOT NULL,
  `role` int NOT NULL DEFAULT '0' COMMENT '0: Deactive\r\n1: Admin\r\n2: President\r\n3: Vice-President\r\n4: Executive\r\n5: General',
  PRIMARY KEY (`user_id`,`club_id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_club`
--

INSERT INTO `user_club` (`id`, `user_id`, `club_id`, `role`) VALUES
(1, 1, 2, 1),
(2, 1, 6, 1),
(8, 2, 6, 4),
(4, 1, 7, 1),
(10, 1, 8, 1),
(7, 2, 8, 5),
(9, 1, 9, 1),
(11, 1, 10, 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
