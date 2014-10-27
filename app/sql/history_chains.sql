-- phpMyAdmin SQL Dump
-- version 4.1.7
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Oct 27, 2014 at 11:36 AM
-- Server version: 5.5.33
-- PHP Version: 5.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `history_chains`
--

-- --------------------------------------------------------

--
-- Table structure for table `sources`
--

CREATE TABLE IF NOT EXISTS `sources` (
  `source_id` int(10) NOT NULL AUTO_INCREMENT,
  `comment` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(50) NOT NULL,
  `troveid` varchar(50) NOT NULL,
  PRIMARY KEY (`source_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `sources`
--

INSERT INTO `sources` (`source_id`, `comment`, `timestamp`, `type`, `troveid`) VALUES
(1, 'world war 2 article #3', '2014-10-08 10:53:35', 'book', '10701744'),
(2, 'world war 2 article #2', '2014-10-08 10:53:43', 'book', '21584426'),
(3, 'world war 2 article #1', '2014-10-08 10:53:03', 'book', '19039562'),
(4, 'rabbit proof fence article #2', '2014-10-08 10:51:31', 'book', '28597356'),
(5, 'rabbit proof fence article #1', '2014-10-08 10:50:23', 'book', '8477700'),
(6, 'the first fleet article #3', '2014-10-08 10:48:23', 'book', '21123583'),
(7, 'the first fleet article #2', '2014-10-08 10:48:14', 'book', '9455755'),
(8, 'the first fleet article #1', '2014-10-07 06:07:18', 'book', '35568463');

-- --------------------------------------------------------

--
-- Table structure for table `sources1`
--

CREATE TABLE IF NOT EXISTS `sources1` (
  `source_id` int(10) NOT NULL AUTO_INCREMENT,
  `comment` varchar(100) NOT NULL,
  `keywords` varchar(100) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `type` varchar(50) NOT NULL,
  `troveid` varchar(50) NOT NULL,
  `user` int(10) NOT NULL,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`source_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=235 ;

--
-- Dumping data for table `sources1`
--

INSERT INTO `sources1` (`source_id`, `comment`, `keywords`, `timestamp`, `type`, `troveid`, `user`, `title`) VALUES
(1, 'eeeeeeeeeeee', 'eeeee', '2014-10-27 11:20:32', 'ee', 'eeeee', 0, '0'),
(42, 'rrrr', 'rrr', '2014-10-27 11:21:08', 'rrrr', 'rrr', 0, '0'),
(56, 'f', 'f', '2014-10-27 11:33:34', 'f', 'f', 15, 'Australian Trees'),
(234, 'fff', 'fff', '2014-10-27 11:33:18', 'fff', 'ffff', 15, 'Austrlaian politics');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `institution` varchar(100) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `rep` int(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `fname`, `lname`, `institution`, `dob`, `img`, `rep`) VALUES
(1, 'testuser1', 'asdf', 'test', 'user', 'the univeristy of queensland', '2014-09-22', NULL, 5),
(2, 'user2', 'pass2', 'Fifflaren', 'Kenny', 'University of Queensland', '1997-10-13', NULL, 2),
(3, 'user3', 'pass3', 'Jamie', 'Wright', 'University of Queensland', '2014-10-14', NULL, 3),
(4, 'user4', 'pass4', 'Jenny', 'Forest', 'University of Queensland', '2014-07-14', NULL, 4),
(5, 'user5', 'pass5', 'Danny', 'Davis', 'University of Queensland', '2014-04-15', NULL, 5),
(6, 'user6', 'pass6', 'Warren', 'Davis', 'University of Queensland', '2013-11-12', NULL, 6),
(7, 'ChainGod', 'chainzfordayz', 'Elliot', 'Randall', 'University of Queensland', '1996-02-16', 'resources/images/user_profile_pics/meh.jpg', NULL),
(9, 'ChainGod', 'chainzfordayz', 'Elliot', 'Randall', 'University of Queensland', '1996-02-16', 'resources/images/user_profile_pics/meh.jpg', NULL),
(10, 'reububble', '1234', 'Reuben', 'Willson', NULL, '0000-00-00', NULL, NULL),
(11, 'a', 'b', 'c', 'd', NULL, '0000-00-00', NULL, NULL),
(12, 'ChainGod', 'chainzfordayz', 'Elliot', 'Randall', 'University of Queensland', '1996-02-16', 'resources/images/user_profile_pics/meh.jpg', NULL),
(13, 'anguspdpayne', 'password', 'Angus', 'Payne', 'University of Queensland', '1996-04-28', 'resources/images/user_profile_pics/IMG_1321.JPG', NULL),
(14, '7989', '7989', 'One', 'Two', 'UQ', '1986-02-01', NULL, NULL),
(15, 'henry', 'asdf', 'henry', 'asdf', NULL, '1994-09-22', 'resources/images/user_profile_pics/EDNaQ.jpg', NULL),
(20, 'winston', 'password', 'Jeff', 'Squiggleson', 'UQ', '1995-02-12', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_chain`
--

CREATE TABLE IF NOT EXISTS `user_chain` (
  `id` int(10) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '',
  `topic` varchar(50) DEFAULT NULL,
  `active` int(1) NOT NULL DEFAULT '0',
  `time_stamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`,`title`),
  UNIQUE KEY `chain_index` (`title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_chain`
--

INSERT INTO `user_chain` (`id`, `title`, `topic`, `active`, `time_stamp`) VALUES
(1, 'asdas', 'asdas', 0, '0000-00-00 00:00:00'),
(1, 'Australian Trees', 'g, g, w, p', 0, '0000-00-00 00:00:00'),
(1, 'Austrlaian politics', 'Australia, brisbane', 0, '0000-00-00 00:00:00'),
(1, 'Brisbane Politics', 'Brisbane, Australia', 0, '0000-00-00 00:00:00'),
(1, 'hello', 'hello', 0, '0000-00-00 00:00:00'),
(1, 'Johnathan', 'um', 0, '2014-10-27 05:39:30'),
(1, 'justin the four eyes', 'glasses', 0, '0000-00-00 00:00:00'),
(1, 'Swag', 'Elliot, DECO1800', 0, '0000-00-00 00:00:00'),
(1, 'Test', 'vietnam', 0, '0000-00-00 00:00:00'),
(1, 'Winstonfang', 'worlds sexist man', 0, '0000-00-00 00:00:00'),
(3, 'rabbit proof fence', 'what happend', 0, '0000-00-00 00:00:00'),
(4, 'the first fleet', 'the first fleet', 0, '0000-00-00 00:00:00'),
(20, 'blah blach', 'hfhehf', 1, '2014-10-27 09:51:15'),
(20, 'world war 2', 'world war 2', 0, '2014-10-27 10:18:23');

--
-- Triggers `user_chain`
--
DROP TRIGGER IF EXISTS `update_trigger`;
DELIMITER //
CREATE TRIGGER `update_trigger` BEFORE UPDATE ON `user_chain`
 FOR EACH ROW BEGIN
IF NEW.`active` = 1 THEN
UPDATE user_chain
SET `active` = 0
WHERE `active` = 1
AND `id`=NEW.`id`; 
END IF;
END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_chain_source`
--

CREATE TABLE IF NOT EXISTS `user_chain_source` (
  `source_id` int(10) NOT NULL DEFAULT '0',
  `user_id` int(10) NOT NULL DEFAULT '0',
  `chain_title` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`source_id`,`user_id`,`chain_title`),
  KEY `user_id` (`user_id`),
  KEY `chain_title` (`chain_title`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_chain_source`
--

INSERT INTO `user_chain_source` (`source_id`, `user_id`, `chain_title`) VALUES
(1, 1, 'world war 2'),
(2, 1, 'world war 2'),
(3, 1, 'world war 2'),
(4, 2, 'rabbit proof fence'),
(5, 2, 'rabbit proof fence'),
(6, 3, 'the first fleet'),
(7, 3, 'rabbit proof fence'),
(8, 3, 'the first fleet');

-- --------------------------------------------------------

--
-- Table structure for table `user_subject`
--

CREATE TABLE IF NOT EXISTS `user_subject` (
  `id` int(10) NOT NULL DEFAULT '0',
  `subject` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`,`subject`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_subject`
--

INSERT INTO `user_subject` (`id`, `subject`) VALUES
(3, 'Rotations'),
(4, 'Cow goes moo');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_chain`
--
ALTER TABLE `user_chain`
  ADD CONSTRAINT `user_chain_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

--
-- Constraints for table `user_chain_source`
--
ALTER TABLE `user_chain_source`
  ADD CONSTRAINT `user_chain_source_ibfk_1` FOREIGN KEY (`source_id`) REFERENCES `sources` (`source_id`),
  ADD CONSTRAINT `user_chain_source_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  ADD CONSTRAINT `user_chain_source_ibfk_3` FOREIGN KEY (`chain_title`) REFERENCES `user_chain` (`title`);

--
-- Constraints for table `user_subject`
--
ALTER TABLE `user_subject`
  ADD CONSTRAINT `user_subject_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
