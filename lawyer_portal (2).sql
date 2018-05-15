-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2018 at 07:02 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lawyer_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_casebrief`
--

CREATE TABLE IF NOT EXISTS `tbl_casebrief` (
  `case_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `case_title` varchar(255) NOT NULL,
  `case_description` text NOT NULL,
  `case_added_date` date NOT NULL,
  PRIMARY KEY (`case_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `tbl_casebrief`
--

INSERT INTO `tbl_casebrief` (`case_id`, `user_id`, `case_title`, `case_description`, `case_added_date`) VALUES
(6, 2, 'Perera V. Perera', 'Perera V. Perera , in this case I  have tried to limit number of rows in textarea to 4 but its giving error Message: Array to string', '2018-05-14'),
(7, 2, 'Perera V. Perera', 'Perera V. Perera , in this case I  have tried to limit number of rows in textarea to 4 but its giving error Message: Array to string', '2018-05-14'),
(8, 2, 'Perera V. Perera2', 'have tried to limit number of rows in textarea to 4 but its giving error Message: Array to string', '2018-05-14'),
(9, 2, 'Perera V. Perera2', 'have tried to limit number of rows in textarea to 4 but its giving error Message: Array to string', '2018-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lawyer_schedule`
--

CREATE TABLE IF NOT EXISTS `tbl_lawyer_schedule` (
  `schedule_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `schedule_date` date NOT NULL,
  `day` varchar(50) NOT NULL,
  `schedule_time` time NOT NULL,
  `schedule_status` enum('available','booked','booked-closed','closed') NOT NULL,
  `client_id` int(11) NOT NULL,
  `schedule_add_date` date NOT NULL,
  `updated_date` date NOT NULL,
  `booked_date` date NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tbl_lawyer_schedule`
--

INSERT INTO `tbl_lawyer_schedule` (`schedule_id`, `user_id`, `schedule_date`, `day`, `schedule_time`, `schedule_status`, `client_id`, `schedule_add_date`, `updated_date`, `booked_date`) VALUES
(1, 2, '2018-05-11', 'friday', '06:30:00', 'closed', 0, '2018-05-10', '2018-05-10', '0000-00-00'),
(2, 2, '2018-05-12', 'saturday', '15:00:00', 'booked-closed', 5, '2018-05-10', '2018-05-10', '2018-05-12'),
(3, 2, '2018-05-10', 'thursday', '09:30:00', 'booked-closed', 5, '2018-05-09', '2018-05-09', '2018-05-13'),
(4, 2, '2018-05-13', 'sunday', '10:00:00', 'closed', 0, '2018-05-11', '2018-05-11', '0000-00-00'),
(5, 2, '2018-05-13', 'sunday', '11:30:00', 'booked-closed', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(6, 2, '2018-05-14', 'monday', '13:30:00', 'booked', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(7, 2, '2018-05-14', 'monday', '16:00:00', 'booked', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(8, 2, '2018-05-13', 'Sunday', '06:00:00', 'closed', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(9, 2, '2018-05-13', 'Sunday', '06:30:00', 'closed', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(10, 2, '2018-05-15', 'Tuesday', '06:00:00', 'available', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(11, 2, '2018-05-16', 'Wednesday', '06:00:00', 'available', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(12, 2, '2018-05-16', 'Wednesday', '06:30:00', 'available', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(13, 2, '2018-05-16', 'Wednesday', '07:00:00', 'available', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(14, 2, '2018-05-16', 'Wednesday', '07:30:00', 'available', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(15, 2, '2018-05-16', 'Wednesday', '09:30:00', 'available', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(16, 2, '2018-05-13', 'Sunday', '07:00:00', 'available', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(17, 2, '2018-05-13', 'Sunday', '07:30:00', 'available', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(18, 2, '2018-05-13', 'Sunday', '08:00:00', 'available', 0, '2018-05-12', '2018-05-12', '0000-00-00'),
(19, 2, '2018-05-19', 'Saturday', '06:00:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(20, 2, '2018-05-19', 'Saturday', '06:30:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(21, 2, '2018-05-19', 'Saturday', '07:00:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(22, 2, '2018-05-14', 'Monday', '06:00:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(23, 2, '2018-05-14', 'Monday', '06:30:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(24, 2, '2018-05-18', 'Friday', '06:00:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(25, 2, '2018-05-18', 'Friday', '06:30:00', 'available', 5, '2018-05-13', '2018-05-13', '0000-00-00'),
(26, 2, '2018-05-18', 'Friday', '21:00:00', 'available', 5, '2018-05-13', '2018-05-13', '0000-00-00'),
(27, 2, '2018-05-18', 'Friday', '21:30:00', 'booked', 5, '2018-05-13', '2018-05-13', '0000-00-00'),
(28, 2, '2018-05-20', 'Sunday', '06:00:00', 'booked', 5, '2018-05-13', '2018-05-13', '0000-00-00'),
(29, 2, '2018-05-20', 'Sunday', '06:30:00', 'booked', 5, '2018-05-13', '2018-05-13', '0000-00-00'),
(30, 2, '2018-05-20', 'Sunday', '21:30:00', 'booked', 5, '2018-05-13', '2018-05-13', '2018-05-14'),
(31, 2, '2018-05-17', 'Thursday', '22:00:00', 'booked', 5, '2018-05-13', '2018-05-13', '2018-05-14'),
(32, 2, '2018-05-17', 'Thursday', '22:30:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(33, 2, '2018-05-17', 'Thursday', '23:00:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(34, 2, '2018-05-14', 'Monday', '23:00:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(35, 3, '2018-05-14', 'Monday', '06:00:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(36, 3, '2018-05-14', 'Monday', '06:30:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(37, 3, '2018-05-14', 'Monday', '07:00:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(38, 3, '2018-05-14', 'Monday', '07:30:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(39, 3, '2018-05-14', 'Monday', '08:00:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(40, 3, '2018-05-14', 'Monday', '08:30:00', 'available', 0, '2018-05-13', '2018-05-13', '0000-00-00'),
(41, 3, '2018-05-15', 'Tuesday', '06:00:00', 'available', 0, '2018-05-14', '2018-05-14', '0000-00-00'),
(42, 3, '2018-05-15', 'Tuesday', '06:30:00', 'booked-closed', 5, '2018-05-14', '2018-05-14', '2018-05-15'),
(43, 3, '2018-05-15', 'Tuesday', '07:00:00', 'booked-closed', 5, '2018-05-14', '2018-05-14', '2018-05-15'),
(44, 3, '2018-05-15', 'Tuesday', '07:30:00', 'booked', 5, '2018-05-14', '2018-05-14', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` enum('Mr','Mrs','Ms','Miss') NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `provincial_area` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `legal_professional` enum('lawyer','sworn-translator','lawyer-sworn-translator','notary','family-counselor') NOT NULL,
  `admitted_bar` varchar(255) DEFAULT '0',
  `specialty` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `register_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `title`, `first_name`, `last_name`, `email`, `provincial_area`, `password`, `legal_professional`, `admitted_bar`, `specialty`, `location`, `register_date`) VALUES
(2, 'Mr', 'praveen', 'tissera', 'praveen.tissera@gmail.com', 'north-Western', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lawyer', 'test bar', 'accident-personal', 'kotikawatta', '2018-05-09'),
(3, 'Mr', 'sampa', 'rasini', 'samap@gmail.com', 'western', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lawyer', 'colombo', 'immigration', 'colombo', '2018-05-13'),
(4, 'Mr', 'surangi', 'tissera', 'hgs@gmail.com', 'northern', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lawyer', 'colombo-10', 'accident-personal', 'colombo', '2018-05-14'),
(5, 'Mr', 'udari', 'tissera', 'udari01@gmail.com', 'north-Western', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lawyer', 'colombo-10', 'accident-personal', 'colombo', '2018-05-14'),
(6, 'Mr', 'praveena', 'tisseraa', 'praveena@gmail.com', 'northern', '7c4a8d09ca3762af61e59520943dc26494f8941b', '', 'colombo-10', 'accident-personal', 'colombo 4', '2018-05-14'),
(7, 'Mr', 'praveenaa', 'tissera', 'praveenaa@gmail.com', 'northern', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lawyer', 'colombo-10', 'immigration', 'colombo', '2018-05-14'),
(8, 'Mr', 'praveen', 'tissera', 'praveen123.tissera@gmail.com', 'western', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'lawyer-sworn-translator', 'colombo-10', 'immigration', 'colombo', '2018-05-14'),
(9, 'Mr', 'praveen', 'tissera', 'praveen11.tissera@gmail.com', 'northern', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'notary', '', 'divorce', 'colombo', '2018-05-14'),
(10, 'Mr', 'praveen', 'tissera', 'praveen12.tissera@gmail.com', 'north-Central', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sworn-translator', '', 'divorce', 'colombo', '2018-05-14'),
(11, 'Mr', 'praveen', 'tissera', 'praveen124.tissera@gmail.com', 'northern', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sworn-translator', '', '0', 'colombo', '2018-05-14'),
(12, 'Mr', 'praveen', 'tissera', 'praveen125.tissera@gmail.com', 'western', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sworn-translator', '', '0', 'colombo', '2018-05-14'),
(13, 'Mr', 'praveen', 'tissera', 'praveen6.tissera@gmail.com', 'western', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sworn-translator', '', '0', 'colombo', '2018-05-14'),
(14, 'Mr', 'praveen', 'tissera', 'maithree11.pathirane@gmail.com', 'western', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'lawyer', 'colombo-10', '0', 'colombo', '2018-05-14'),
(15, 'Mr', 'praveen', 'tissera', 'praveen199.tissera@gmail.com', 'north-Western', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'sworn-translator', '', '', 'colombo', '2018-05-14'),
(16, 'Mr', 'praveen', 'tissera', 'praveen198.tissera@gmail.com', 'northern', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', 'lawyer', 'colombo-10', 'immigration', 'colombo', '2018-05-14'),
(17, 'Mr', 'Lalitha', 'caldera', 'lalitha@gmail.com', 'central', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'sworn-translator', '', '', 'colombo 4', '2018-05-14'),
(18, 'Mr', 'praveen', 'tissera', 'praveen197.tissera@gmail.com', 'northern', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lawyer', 'colombo-10', 'family', 'colombo', '2018-05-14'),
(19, 'Mr', 'praveen', 'tissera', 'praveen777.tissera@gmail.com', 'central', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'notary', '', '', 'kotikawatta', '2018-05-14'),
(20, 'Mr', 'praveen', 'tissera', 'praveen171.tissera@gmail.com', 'sabaragamuwa', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lawyer', 'nuwara', 'criminal', 'colombo', '2018-05-14'),
(21, 'Mr', 'praveen', 'tissera', 'praveen144.tissera@gmail.com', 'western', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lawyer-sworn-translator', 'colombo-10', 'criminal', 'colombo', '2018-05-14'),
(22, 'Miss', 'sasmitha', 'tissera', 'sasmitha123@gmail.com', 'northern', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lawyer', 'colombo-10', 'immigration', 'colombo', '2018-05-15'),
(23, 'Mr', 'raveen', 'jaya', 'raveen@gmail.com', 'northern', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'lawyer', 'Welimada-Combined-Court', 'divorce', 'colombo', '2018-05-15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user_client`
--

CREATE TABLE IF NOT EXISTS `tbl_user_client` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `register_date` date NOT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `tbl_user_client`
--

INSERT INTO `tbl_user_client` (`client_id`, `first_name`, `last_name`, `email`, `password`, `contact`, `register_date`) VALUES
(4, 'saseema', 'damaya', 'sasi@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '014521244', '2018-05-14'),
(5, 'udari', 'tissera', 'udari011@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '0123654787', '2018-05-15');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
