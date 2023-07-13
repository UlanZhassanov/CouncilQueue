
-- phpMyAdmin SQL Dump
-- http://www.phpmyadmin.net
-- Host: 127.0.0.1
-- Generation Time: May 14, 2017 at 05:47 PM
-- Server version: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/* database name!!!!!!!!!!! */
--
-- Database: `queue_sys_`
--

-- --------------------------------------------------------

--
-- Table structure for table `queue_tb`
--

CREATE TABLE IF NOT EXISTS `queue_tb` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(250) NOT NULL,
  `firstname` varchar(128) NOT NULL,
  `lastname` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `service` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `queue_tb`
--

INSERT INTO `queue_tb` (`id`, `title`, `firstname`, `lastname`, `type`, `service`, `created`, `modified`) VALUES
(1, 'Mr', 'Ruben ', 'Faraj', 'Citizen', 'Housing', '2017-05-14 17:40:45', '2017-05-14 17:40:45'),
(3, 'Mr', 'Jon', 'Snow', 'Organisation', 'Council Tax', '2017-05-14 17:43:57', '2017-05-14 17:43:57'),
(4, 'Mr', 'Jake', 'Smith', 'Anonymous', 'Missed Bin', '2017-05-14 17:45:24', '2017-05-14 17:45:24');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
