-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 14, 2018 at 09:15 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

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
  `schedule_status` enum('available','tentative booking','booked','booked-closed','closed') NOT NULL,
  `client_id` int(11) NOT NULL,
  `schedule_add_date` date NOT NULL,
  `updated_date` date NOT NULL,
  PRIMARY KEY (`schedule_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=45 ;

--
-- Dumping data for table `tbl_lawyer_schedule`
--

INSERT INTO `tbl_lawyer_schedule` (`schedule_id`, `user_id`, `schedule_date`, `day`, `schedule_time`, `schedule_status`, `client_id`, `schedule_add_date`, `updated_date`) VALUES
(1, 2, '2018-05-11', 'friday', '06:30:00', 'closed', 0, '2018-05-10', '2018-05-10'),
(2, 2, '2018-05-12', 'saturday', '15:00:00', 'closed', 0, '2018-05-10', '2018-05-10'),
(3, 2, '2018-05-10', 'thursday', '09:30:00', 'booked-closed', 1, '2018-05-09', '2018-05-09'),
(4, 2, '2018-05-13', 'sunday', '10:00:00', 'closed', 0, '2018-05-11', '2018-05-11'),
(5, 2, '2018-05-13', 'sunday', '11:30:00', 'booked-closed', 0, '2018-05-12', '2018-05-12'),
(6, 2, '2018-05-14', 'monday', '13:30:00', 'tentative booking', 0, '2018-05-12', '2018-05-12'),
(7, 2, '2018-05-14', 'monday', '16:00:00', 'booked', 0, '2018-05-12', '2018-05-12'),
(8, 2, '2018-05-13', 'Sunday', '06:00:00', 'closed', 0, '2018-05-12', '2018-05-12'),
(9, 2, '2018-05-13', 'Sunday', '06:30:00', 'closed', 0, '2018-05-12', '2018-05-12'),
(10, 2, '2018-05-15', 'Tuesday', '06:00:00', 'available', 0, '2018-05-12', '2018-05-12'),
(11, 2, '2018-05-16', 'Wednesday', '06:00:00', 'available', 0, '2018-05-12', '2018-05-12'),
(12, 2, '2018-05-16', 'Wednesday', '06:30:00', 'available', 0, '2018-05-12', '2018-05-12'),
(13, 2, '2018-05-16', 'Wednesday', '07:00:00', 'available', 0, '2018-05-12', '2018-05-12'),
(14, 2, '2018-05-16', 'Wednesday', '07:30:00', 'available', 0, '2018-05-12', '2018-05-12'),
(15, 2, '2018-05-16', 'Wednesday', '09:30:00', 'available', 0, '2018-05-12', '2018-05-12'),
(16, 2, '2018-05-13', 'Sunday', '07:00:00', 'available', 0, '2018-05-12', '2018-05-12'),
(17, 2, '2018-05-13', 'Sunday', '07:30:00', 'available', 0, '2018-05-12', '2018-05-12'),
(18, 2, '2018-05-13', 'Sunday', '08:00:00', 'available', 0, '2018-05-12', '2018-05-12'),
(19, 2, '2018-05-19', 'Saturday', '06:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(20, 2, '2018-05-19', 'Saturday', '06:30:00', 'available', 0, '2018-05-13', '2018-05-13'),
(21, 2, '2018-05-19', 'Saturday', '07:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(22, 2, '2018-05-14', 'Monday', '06:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(23, 2, '2018-05-14', 'Monday', '06:30:00', 'available', 0, '2018-05-13', '2018-05-13'),
(24, 2, '2018-05-18', 'Friday', '06:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(25, 2, '2018-05-18', 'Friday', '06:30:00', 'available', 0, '2018-05-13', '2018-05-13'),
(26, 2, '2018-05-18', 'Friday', '21:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(27, 2, '2018-05-18', 'Friday', '21:30:00', 'available', 0, '2018-05-13', '2018-05-13'),
(28, 2, '2018-05-20', 'Sunday', '06:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(29, 2, '2018-05-20', 'Sunday', '06:30:00', 'available', 0, '2018-05-13', '2018-05-13'),
(30, 2, '2018-05-20', 'Sunday', '21:30:00', 'available', 0, '2018-05-13', '2018-05-13'),
(31, 2, '2018-05-17', 'Thursday', '22:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(32, 2, '2018-05-17', 'Thursday', '22:30:00', 'available', 0, '2018-05-13', '2018-05-13'),
(33, 2, '2018-05-17', 'Thursday', '23:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(34, 2, '2018-05-14', 'Monday', '23:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(35, 3, '2018-05-14', 'Monday', '06:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(36, 3, '2018-05-14', 'Monday', '06:30:00', 'available', 0, '2018-05-13', '2018-05-13'),
(37, 3, '2018-05-14', 'Monday', '07:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(38, 3, '2018-05-14', 'Monday', '07:30:00', 'available', 0, '2018-05-13', '2018-05-13'),
(39, 3, '2018-05-14', 'Monday', '08:00:00', 'available', 0, '2018-05-13', '2018-05-13'),
(40, 3, '2018-05-14', 'Monday', '08:30:00', 'available', 0, '2018-05-13', '2018-05-13'),
(41, 3, '2018-05-15', 'Tuesday', '06:00:00', 'available', 0, '2018-05-14', '2018-05-14'),
(42, 3, '2018-05-15', 'Tuesday', '06:30:00', 'available', 0, '2018-05-14', '2018-05-14'),
(43, 3, '2018-05-15', 'Tuesday', '07:00:00', 'available', 0, '2018-05-14', '2018-05-14'),
(44, 3, '2018-05-15', 'Tuesday', '07:30:00', 'available', 0, '2018-05-14', '2018-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `provincial_area` varchar(255) NOT NULL,
  `password` varchar(40) NOT NULL,
  `admitted_bar` varchar(255) NOT NULL,
  `specialty` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `register_date` date NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `first_name`, `last_name`, `email`, `provincial_area`, `password`, `admitted_bar`, `specialty`, `location`, `register_date`) VALUES
(2, 'praveen', 'tissera', 'praveen.tissera@gmail.com', 'north-Western', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'test bar', 'accident-personal', 'kotikawatta', '2018-05-09'),
(3, 'sampa', 'rasini', 'samap@gmail.com', 'western', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'colombo', 'immigration', 'colombo', '2018-05-13');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
