-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2022 at 04:55 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `busonline_ticket`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(7) NOT NULL,
  `Password` varchar(20) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `Password`) VALUES
('AD01', 'admin123'),
('AD02', 'admin123'),
('AD03', 'admin123'),
('AD04', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `bus_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `total_seat` int(11) NOT NULL,
  PRIMARY KEY (`bus_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `name`, `total_seat`) VALUES
(1, 'ABU EXPRESS', 40),
(2, 'SUNNY EXPRESS', 32),
(3, 'AEROLINE', 60),
(4, 'RAPID EXPRESS', 40),
(5, 'MAHSURI EXPRESS', 60),
(6, 'ANDA EXPRESS', 35);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `order_id` int(5) NOT NULL AUTO_INCREMENT,
  `schedule_id` int(11) NOT NULL,
  `ticket_amount` int(11) NOT NULL,
  `total_payment` double(10,2) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `schedule_id` (`schedule_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE IF NOT EXISTS `route` (
  `route_id` int(5) NOT NULL,
  `from` varchar(20) NOT NULL,
  `to` varchar(20) NOT NULL,
  PRIMARY KEY (`route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `from`, `to`) VALUES
(1, 'SELANGOR', 'JOHOR'),
(2, 'JOHOR', 'SELANGOR'),
(3, 'MELAKA', 'NEGERI SEMBILAN'),
(4, 'PERLIS', 'TERENGGANU');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE IF NOT EXISTS `schedule` (
  `schedule_id` int(5) NOT NULL,
  `bus_id` int(5) NOT NULL,
  `route_id` int(5) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  PRIMARY KEY (`schedule_id`),
  KEY `route_id` (`route_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `bus_id`, `route_id`, `date`, `time`, `fee`) VALUES
(1, 1, 1, '2022-11-19', '22:00:00', '20.00'),
(2, 2, 2, '2022-11-29', '23:00:00', '30.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `User_Name` varchar(50) NOT NULL,
  `User_phone_num` varchar(12) NOT NULL,
  `User_email` varchar(30) NOT NULL,
  `schedule_id` int(11) NOT NULL,
  `ticket_amount` int(11) NOT NULL,
  `total_payment` double(10,2) NOT NULL,
  PRIMARY KEY (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`order_id`, `User_Name`, `User_phone_num`, `User_email`, `schedule_id`, `ticket_amount`, `total_payment`) VALUES
(1, 'AHMAD NOR DANIAL', '0136047270', 'danial191003@gmail.com', 1, 2, 40.00),
(2, 'ALI BIN ABU', '0123456789', 'adanial990@gmail.com', 1, 1, 20.00),
(3, 'AHMAD ALBAB', '01122223300', 'albab@test.com', 1, 3, 60.00);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
