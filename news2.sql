-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 27, 2021 at 02:51 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `news2`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `catid` int(11) NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) NOT NULL,
  PRIMARY KEY (`catid`),
  UNIQUE KEY `catname` (`catname`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(18, 'blue'),
(21, 'dddd'),
(2, 'dogs'),
(16, 'flower'),
(17, 'purple'),
(23, 'sien'),
(19, 'sky'),
(20, 'sport');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `massage` varchar(400) NOT NULL,
  `comdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comid`, `name`, `email`, `massage`, `comdate`) VALUES
(1, 'ameer', 'anm@gmail.com', '', '2021-06-10 21:22:17'),
(3, 'df', 'wew@dfdf.fgf', 'woooow', '2021-06-10 21:25:40'),
(4, 'gggg', 'dfh@fdg.ghfhg', 'hi!!', '2021-06-10 21:52:47'),
(5, 'ameera', 'ahlam22@gmail.com', 'hiiiiii !!!!!!', '2021-06-16 23:59:40'),
(6, 'as', 'dfh@fddg.ghfhgdd', 'foooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooooo', '2021-06-25 03:24:44'),
(7, 'reem', 'reem@gmail.com', 'rrrrrrrrrrrrrrrfffffffffffffffffffffffffffffxs', '2021-06-26 15:23:46'),
(8, 'hhhhhhhhh', 'shukklmu@1244536', 'guSajnjbcsd', '2021-06-26 15:53:48'),
(9, 'ww', 'shuuuuu@1244536', 'Ewfsdgzdvzcg', '2021-06-26 16:17:50');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `postid` int(11) NOT NULL AUTO_INCREMENT,
  `imgname` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `userid` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  PRIMARY KEY (`postid`),
  KEY `catid` (`catid`),
  KEY `userid` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=59 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`postid`, `imgname`, `description`, `userid`, `catid`) VALUES
(56, '434313117_73069.jpg', 'dfffffffffffffzz', 77, 21),
(57, '438714642_128034.jpg', 'fgfcbv', 77, 21),
(58, 'n2.png', 'free fully Magazine for puplic and society\r\n                        by Yemeni Researchers free fully Magazine for puplic and society\r\n                        by Yemeni Researchers free fully Magazine for puplic and society\r\n                        by Yemeni Researchers free fully Magazine for puplic and society\r\n                        by Yemeni Researchers ', 77, 23);

-- --------------------------------------------------------

--
-- Table structure for table `premssions`
--

CREATE TABLE IF NOT EXISTS `premssions` (
  `pri_id` int(11) NOT NULL AUTO_INCREMENT,
  `pri_name` varchar(255) NOT NULL,
  PRIMARY KEY (`pri_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `premssions`
--

INSERT INTO `premssions` (`pri_id`, `pri_name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `userid` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `joindate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `profilename` varchar(255) NOT NULL,
  `active` int(11) NOT NULL DEFAULT '1',
  `pri_id` int(11) NOT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `email` (`email`),
  KEY `pri_id` (`pri_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=86 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `password`, `email`, `gender`, `birthdate`, `joindate`, `profilename`, `active`, `pri_id`) VALUES
(77, 'reham', '8cb2237d0679ca88db6464eac60da96345513964', 'shukklmu@1244536', 'male', '2021-07-01', '2021-06-26 16:47:04', '435813591_137047.jpg', 0, 1),
(82, 'rr', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'shuuuuu@1244536', 'male', '2021-06-02', '2021-06-27 08:06:22', '_______seep (1).jpg', 1, 2),
(85, 'tt', '601f1889667efaebb33b8c12572835da3f027f78', 'reham2@gmail.com', 'female', '2021-06-16', '2021-06-27 08:53:10', '٢٠٢١٠٥٢٠_٠٩١٢٥٩.jpg', 0, 2);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`catid`) REFERENCES `category` (`catid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_2` FOREIGN KEY (`userid`) REFERENCES `users` (`userid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`pri_id`) REFERENCES `premssions` (`pri_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
