-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2013 at 10:53 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `studentcorner`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `post_ID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `comment` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`post_ID`, `username`, `comment`) VALUES
(3, 'Rahul', 'thanks'),
(3, 'sumit', 'this is great'),
(4, 'unimax', 'comment'),
(3, 'unimax', 'sks123');

-- --------------------------------------------------------

--
-- Table structure for table `file2`
--

CREATE TABLE IF NOT EXISTS `file2` (
  `fcat` varchar(30) NOT NULL,
  `address` varchar(100) NOT NULL,
  `md5` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `file2`
--

INSERT INTO `file2` (`fcat`, `address`, `md5`) VALUES
('ECE & EE', 'Range_search.pdf', ''),
('CSE & IT', '10_digital_experiment_with_ckt.pdf', ''),
('CSE & IT', 'IT302.PDF', ''),
('CSE & IT', 'IT-302.zip', ''),
('CSE & IT', 'Algorithms_and_Data_Structures_in_C++.pdf', '');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_ID` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(30) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `userby` varchar(30) NOT NULL,
  `category1` int(11) NOT NULL,
  `category2` varchar(30) NOT NULL,
  `content` text NOT NULL,
  PRIMARY KEY (`post_ID`),
  UNIQUE KEY `post_ID` (`post_ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_ID`, `title`, `date`, `userby`, `category1`, `category2`, `content`) VALUES
(1, '', '2013-04-08 07:44:31', 'SKS', 2, 'EE', 'this is a fool'),
(2, 'qweqwe', '2013-04-03 07:27:37', 'zxczxczxczxc', 3, 'NOTES', 'asdasdasdasd'),
(3, 'Red5 info', '2013-04-08 15:58:35', 'dhiraj (CR)', 3, 'IT', 'We created an IRC channel on the freenode.net network for informal Red5 discussions, asking questions or just hanging out and â€œsocializingâ€.\nThe channel is #red5 on irc.freenode.net\nDrop by if you are interested in the development of Red5, have a quick question or just want to get to know the people developing and using it. If youâ€™re new to IRC, be sure to learn how to get answers.'),
(4, 'Sample Post', '2013-04-08 15:59:17', 'Sunil', 3, 'IT', 'Latest Red5 release\r\n\r\nThe latest release of Red5 is 0.9.1 Final (released 21 February 2010), which can be downloaded from Red5 official site or Google Code.\r\nContinuous builds\r\n\r\nA Hudson continuous build server has been set up to regularly build the latest versions of Red5 and various related projects (eg. Xuggler). Some links to its web interface are:\r\nAll continuous builds\r\nStable Red5 continuous builds\r\nMain Red5Wiki areas\r\n\r\nInstalling and running Red5 - How to get Red5 up and running on various platforms.\r\nRed5 tutorials - Articles to get you up and running with using and developing for Red5, as well as understanding its architecture.\r\nRed5 reference - Pages containing reference information about various aspects of Red5.'),
(8, 'tamato', '2013-04-08 14:33:53', 'jain', 2, 'CIV', 'tamato is red');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `fullname` varchar(30) NOT NULL COMMENT 'full name of user',
  `dept` varchar(20) NOT NULL,
  `year` int(11) NOT NULL DEFAULT '1',
  `usertype` int(11) NOT NULL DEFAULT '1',
  `username` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `extra` varchar(30) NOT NULL,
  `realemail` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`username`),
  UNIQUE KEY `username` (`username`),
  KEY `dept` (`dept`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fullname`, `dept`, `year`, `usertype`, `username`, `email`, `password`, `extra`, `realemail`) VALUES
('dsf', '', 999, 1, 'admin', 'sunilku12mar@gmail.com', 'f925a92696859cd7e4ad68dad5af6ba4', 'f0be22614f7325b2ecb1815fb45604', 0),
('sd', 'MME', 999, 2, 'admin12', 'f@22h.com', '827ccb0eea8a706c4c34a16891f84e7b', '7519d29737600c233364e08b277c78', 0),
('dfs', '', 999, 2, 'admin231', 'sunilku1234mar@gmail.com', 'f925a92696859cd7e4ad68dad5af6ba4', 'f9e99474dbf9e0b8c8a0a2302c965c', 0),
('32423423', 'ME', 999, 2, 'admin2342342', '43534534', 'f925a92696859cd7e4ad68dad5af6ba4', '06506edb8dd5cb361f54eccc8c1445', 0),
('sunilkumar', 'IT', 2010, 1, 'unimax', 'sunilkumar@gmail.com', '3911391c841dfc34e689b8f189f404c9', '5e318086f83ced3a98d386b32a38a4', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
