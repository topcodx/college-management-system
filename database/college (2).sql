-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 13, 2024 at 05:43 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `college`
--

-- --------------------------------------------------------



INSERT INTO `setting` (`sno`, `key`, `value`) VALUES
(1, 'University_name', 'JK UNIVERSITY'),
(2, 'University_logo', '/var/www/html/college-management-system/images/logo.jpg');


-- --------------------------------------------------------

--
-- Table structure for table `class_result`
--

DROP TABLE IF EXISTS `class_result`;
CREATE TABLE IF NOT EXISTS `class_result` (
  `class_result_id` int NOT NULL AUTO_INCREMENT,
  `roll_no` varchar(30) NOT NULL,
  `course_code` varchar(30) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` varchar(11) NOT NULL,
  `total_marks` varchar(11) NOT NULL,
  `obtain_marks` varchar(11) NOT NULL,
  `result_date` varchar(10) NOT NULL,
  PRIMARY KEY (`class_result_id`)
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_result`
--

INSERT INTO `class_result` (`class_result_id`, `roll_no`, `course_code`, `subject_code`, `semester`, `total_marks`, `obtain_marks`, `result_date`) VALUES
(5, '31', 'MCS', 'OOP', '2', '100', '96', '10-03-20'),
(6, '33', 'MCS', 'OOP', '2', '100', '97', '10-03-20'),
(7, '34', 'MCS', 'OOP', '2', '100', '94', '10-03-20'),
(8, '35', 'MCS', 'OOP', '2', '100', '91', '10-03-20'),
(9, '36', 'MCS', 'OOP', '2', '100', '90', '10-03-20'),
(10, 'MCS-S19-1', 'MCS', 'DBMS', '2', '100', '98', '10-03-20'),
(11, '25', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(12, '27', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(13, '29', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(14, '31', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(15, '33', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(16, 'MCS-S19-1', 'MCS', 'SE', '2', '100', '64', '10-03-20'),
(17, '35', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(18, '36', 'MIT', 'ITP', '2', '100', '98', '10-03-20'),
(28, 'MCS-S19-1', 'MCS', 'DLD', '2', '100', '76', '29-03-20'),
(35, '', '', '', '', '', '', '29-03-20'),
(36, '', '', '', '', '', '', '29-03-20'),
(37, 'MCS-S19-1', 'MCS', 'SE', '2', '100', '80', '30-03-20'),
(38, '', '', '', '', '', '', '30-03-20'),
(39, '', '', '', '', '', '', '30-03-20'),
(40, '', '', '', '', '', '', '30-03-20'),
(41, '', '', '', '', '', '', '30-03-20'),
(42, '', '', '', '', '', '', '30-03-20'),
(43, '', '', '', '', '', '', '30-03-20'),
(44, '', '', '', '', '', '', '30-03-20'),
(45, '', '', '', '', '', '', '30-03-20'),
(46, 'MCS-S19-1', 'MCS', 'SE', '2', '100', '80', '30-03-20'),
(47, '', '', '', '', '', '', '30-03-20'),
(48, '', '', '', '', '', '', '30-03-20'),
(49, '', '', '', '', '', '', '30-03-20'),
(50, '', '', '', '', '', '', '30-03-20'),
(51, '', '', '', '', '', '', '30-03-20'),
(52, '', '', '', '', '', '', '30-03-20'),
(53, '', '', '', '', '', '', '30-03-20'),
(54, '', '', '', '', '', '', '30-03-20'),
(55, '2', 'MCS', 'CSPD', '1', '100', '90', '08-03-24'),
(56, '2', 'MCS', 'DBMS', '2', '100', '80', '08-03-24'),
(57, '2', 'MCS', 'DLD', '2', '100', '85', '08-03-24'),
(58, '2', 'MCS', 'Ds', '1', '100', '90', '08-03-24'),
(59, '2', 'MCS', 'I2C', '1', '100', '65', '08-03-24'),
(60, '2', 'MCS', 'OOP', '2', '100', '80', '08-03-24'),
(61, '2', 'MCS', 'SE', '2', '100', '50', '08-03-24'),
(62, '2', 'MCS', 'WEB', '2', '100', '80', '08-03-24'),
(63, '2', 'MCS', 'OOP', '2', '100', '90', '08-03-24'),
(64, '1', 'MCS', 'OOP', '2', '100', '95', '08-03-24'),
(65, '2', 'MCS', 'OOP', '2', '100', '50', '08-03-24'),
(66, '1', 'MCS', 'OOP', '2', '100', '90', '08-03-24'),
(67, '2', 'MCS', 'CSPD', '1', '100', '95', '08-03-24'),
(68, '2', 'MCS', 'DBMS', '2', '100', '95', '08-03-24'),
(69, '2', 'MCS', 'DLD', '2', '100', '95', '08-03-24'),
(70, '2', 'MCS', 'Ds', '1', '100', '95', '08-03-24'),
(71, '2', 'MCS', 'I2C', '1', '100', '95', '08-03-24'),
(72, '2', 'MCS', 'OOP', '2', '100', '95', '08-03-24'),
(73, '2', 'MCS', 'SE', '2', '100', '95', '08-03-24'),
(74, '2', 'MCS', 'WEB', '2', '100', '95', '08-03-24'),
(75, '2', 'MCS', 'OOP', '2', '100', '90', '08-03-24'),
(76, '1', 'MCS', 'OOP', '2', '100', '90', '08-03-24'),
(77, '3', 'MCS', 'OOP', '2', '100', '99', '08-03-24'),
(78, '1', 'MCS', 'OOP', '2', '100', '50', '10-03-24'),
(79, '10', 'MCS', 'OOP', '2', '100', '60', '10-03-24'),
(80, '3', 'MCS', 'OOP', '2', '100', '50', '10-03-24'),
(81, '3', 'MCS', 'OOP', '2', '100', '50', '10-03-24'),
(82, '3', 'MCS', 'OOP', '2', '100', '95', '10-03-24'),
(83, '3', 'MCS', 'OOP', '2', '100', '80', '10-03-24'),
(84, '1', 'MCS', 'OOP', '2', '100', '90', '10-03-24'),
(85, '10', 'MCS', 'OOP', '2', '100', '80', '10-03-24'),
(86, '3', 'MCS', 'OOP', '2', '100', '70', '10-03-24'),
(87, '3', 'MCS', 'OOP', '2', '100', '60', '10-03-24'),
(88, '2', 'MCS', 'OOP', '2', '100', '90', '12-03-24'),
(89, '1', 'MCS', 'OOP', '2', '100', '80', '12-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

DROP TABLE IF EXISTS `contact`;
CREATE TABLE IF NOT EXISTS `contact` (
  `id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone_number` int NOT NULL,
  `message` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `message`) VALUES
(8, 'vidhi', 'jogani', 'vidhi@gmail.com', 2147483647, 'call me'),
(9, 'vidhi', 'jogani', 'vidhi@gmail.com', 2147483647, 'call me'),
(10, 'vidhi', 'jogani', 'vidhi@gmail.com', 2147483647, 'call me'),
(11, 'VIDHI', 'JOGANI', 'VIDHI@GMAIL.COM', 2147483647, 'CALL ME'),
(13, 'VIDHI', 'JOGANI', 'VIDHI@GMAIL.COM', 2147483647, 'CALL EM'),
(14, 'VIDHI', 'JOGANI', 'VIDHI@GMAIL.COM', 1203654789, 'IDPSLAY'),
(15, 'VIDHI', 'JOGANI', 'VIDHI@GMAIL.CON', 1478523699, 'CALL ME'),
(16, 'vmj', 'vmj', 'vj@gmail.com', 2147483647, 'call me'),
(21, 'vidhi', 'jogani', 'vidhi@gmail.com', 2147483647, 'call me'),
(18, '111', '222', '333@gmail.com', 2147483647, 'call me'),
(19, '111', '222', '333@gmail.com', 2147483647, 'call me'),
(20, '111', '222', '333@gfmail.com', 2147483647, 'call me.');

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `course_code` varchar(10) NOT NULL,
  `course_name` varchar(50) NOT NULL,
  `semester_or_year` varchar(10) NOT NULL,
  `no_of_year` int NOT NULL,
  PRIMARY KEY (`course_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`course_code`, `course_name`, `semester_or_year`, `no_of_year`) VALUES
('AHL', 'Allied Health Science', 'Semester', 4),
('B.Arch', 'Bachular in Architecture', 'Semester', 5),
('b.com', 'batulare of computer', '2', 5),
('B.Fashion', 'Bachular in Fashion and Design', 'Semester', 4),
('BA', 'BA', '3', 5),
('BBA', 'Bachular in Business Administration', 'Semester', 2),
('BSAI', 'Bachular in Artificial Inteligence', 'Semester', 2),
('BSEE', 'Bachular in Electrical Engineering', 'Semester', 4),
('ca', 'ca', '2', 1),
('M.Com', 'Master in Commerce', 'Semester', 2),
('MCS', 'Master in Computer Science', 'Semester', 2),
('MIT', 'Master in Information Technology', 'Semester', 2),
('oop', 'object oriented programming', '2', 1),
('wd', 'web designing', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_subjects`
--

DROP TABLE IF EXISTS `course_subjects`;
CREATE TABLE IF NOT EXISTS `course_subjects` (
  `subject_code` varchar(10) NOT NULL,
  `subject_name` varchar(50) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `semester` int NOT NULL,
  `dept_id` int DEFAULT NULL,
  `credit_hours` int NOT NULL,
  PRIMARY KEY (`subject_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_subjects`
--

INSERT INTO `course_subjects` (`subject_code`, `subject_name`, `course_code`, `semester`, `dept_id`, `credit_hours`) VALUES
('DBMS', 'Database Management System', 'MCS', 2, 1, 4),
('DLD', 'Data Logic and Design', 'MCS', 2, 1, 3),
('Ds', 'Discrete Structure', 'MCS', 1, 1, 3),
('I2C', 'Introduction to Computer Science', 'MCS', 1, 1, 4),
('iot', 'introductin', 'MCS', 2, NULL, 2),
('ITP', 'IT Project Management System', 'MIT', 2, 1, 3),
('MBAD', 'Mobile Application Development', 'MIT', 2, 1, 4),
('OOP', 'Object Oriented Programming', 'MCS', 2, 1, 4),
('wd', 'Web Designing', 'MCS', 2, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `user_id` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Role` varchar(10) NOT NULL,
  `account` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'Deactivate',
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `user_id`, `Password`, `Role`, `account`) VALUES
(2, 'admin@gmail.com', 'VMJ', 'Admin', 'Activate'),
(5, 'staff1@gmail.com', 'VMJ', 'Teacher', 'Activate'),
(6, 'vmj@gmail.com', 'teacher123*', 'Teacher', 'Activate'),
(20, '222@gmail.com', 'student123*', 'Student', 'Activate'),
(21, 'abc@gmail.com', 'teacher123*', 'Teacher', 'Deactivate'),
(22, '125@gmail.com', 'student123*', 'Student', 'Activate'),
(23, 'vidhi@gmail.com', 'student123*', 'Student', 'Activate'),
(24, '111@GMAIL.COM', 'student123*', 'Student', 'Deactive'),
(25, '', 'student123*', 'Student', 'Deactivate'),
(26, '65', 'student123*', 'Student', 'Deactivate'),
(27, 'VIDHI@GMAIL.COM', 'student123*', 'Student', 'Activate'),
(28, '50', 'student123*', 'Student', 'Deactivate'),
(29, '1', 'student123*', 'Student', 'Activate'),
(30, '2', 'student123*', 'Student', 'Activate'),
(31, '142@gmail.com', 'teacher123*', 'Teacher', 'Deactivate'),
(32, 'vidhiabc@gmail.com', 'student123*', 'Student', 'Deactive'),
(33, 'ankita@gmail.com', 'student123*', 'Student', 'Activate');

-- --------------------------------------------------------

--
-- Table structure for table `mytable`
--

DROP TABLE IF EXISTS `mytable`;
CREATE TABLE IF NOT EXISTS `mytable` (
  `id` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mytable`
--

INSERT INTO `mytable` (`id`, `name`, `course_code`) VALUES
('B.Fashion-S19-1', 'husnain', 'B.Fashion'),
('B.Fashion-S19-2', 'razarai663@gmail.com', 'B.Fashion'),
('MCS-S19-1', 'Muhammad Husnain Raza', 'MCS'),
('MCS-S19-2', 'razarai663@gmail.com', 'MCS'),
('MIT-S19-1', 'Muhammad Husnain Raza', 'MIT');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
CREATE TABLE IF NOT EXISTS `sessions` (
  `session_id` int NOT NULL AUTO_INCREMENT,
  `session` varchar(30) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`session_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`session_id`, `session`, `created_date`) VALUES
(1, 'S19', '2020-03-11 20:20:44');

-- --------------------------------------------------------

--
-- Table structure for table `student_attendance`
--

DROP TABLE IF EXISTS `student_attendance`;
CREATE TABLE IF NOT EXISTS `student_attendance` (
  `attendance_id` int NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `semester` int NOT NULL,
  `student_id` varchar(20) NOT NULL,
  `attendance` int NOT NULL,
  `attendance_date` varchar(11) NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`attendance_id`, `course_code`, `subject_code`, `semester`, `student_id`, `attendance`, `attendance_date`) VALUES
(1, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(2, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(3, 'MCS', 'DBMS', 2, 'MCS-S19-1', 1, '15-03-20'),
(4, 'MCS', 'DBMS', 2, 'MCS-S19-1', 0, '15-03-20'),
(5, 'MCS', 'DLD', 2, 'MCS-S19-1', 1, '15-03-20'),
(6, 'MCS', 'OOP', 2, 'MCS-S19-1', 1, '15-03-20'),
(7, 'MCS', 'SE', 2, 'MCS-S19-1', 0, '15-03-20'),
(8, 'MCS', 'WEB', 2, 'MCS-S19-1', 1, '15-03-20'),
(9, 'MCS', 'OOP', 2, '2', 1, '08-03-24'),
(10, 'MCS', 'OOP', 2, '1', 0, '08-03-24'),
(11, 'MCS', 'OOP', 2, '1', 1, '10-03-24'),
(12, 'MCS', 'OOP', 2, '10', 1, '10-03-24'),
(13, 'MCS', 'OOP', 2, '3', 0, '10-03-24'),
(14, 'MCS', 'OOP', 2, '3', 0, '10-03-24'),
(15, 'MCS', 'OOP', 2, '1', 0, '10-03-24'),
(16, 'MCS', 'OOP', 2, '10', 0, '10-03-24'),
(17, 'MCS', 'OOP', 2, '3', 1, '10-03-24'),
(18, 'MCS', 'OOP', 2, '3', 1, '10-03-24'),
(19, 'MCS', 'OOP', 2, '2', 1, '10-03-24'),
(20, 'MCS', 'OOP', 2, '1', 0, '10-03-24'),
(21, 'MCS', 'OOP', 2, '2', 0, '12-03-24'),
(22, 'MCS', 'OOP', 2, '1', 0, '12-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `student_courses`
--

DROP TABLE IF EXISTS `student_courses`;
CREATE TABLE IF NOT EXISTS `student_courses` (
  `student_course_id` int NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) NOT NULL,
  `semester` int NOT NULL,
  `dept_id` int NOT NULL DEFAULT '1',
  `roll_no` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `assign_date` varchar(10) NOT NULL,
  PRIMARY KEY (`student_course_id`),
  KEY `course_code` (`course_code`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`student_course_id`, `course_code`, `semester`, `dept_id`, `roll_no`, `subject_code`, `session`, `assign_date`) VALUES
(1, 'MCS', 2, 1, 'MCS-S19-1', 'OOP', 'S19', '15-03-20'),
(2, 'MCS', 2, 1, 'MCS-S19-1', 'DBMS', 'S19', '15-03-20'),
(3, 'MCS', 2, 1, 'MCS-S19-1', 'DLD', 'S19', '15-03-20'),
(4, 'MCS', 2, 1, 'MCS-S19-1', 'SE', 'S19', '15-03-20'),
(5, 'MCS', 2, 1, 'MCS-S19-1', 'WEB', 'S19', '15-03-20'),
(7, 'MCS', 1, 1, '2', 'CSPD', '', '08-03-24'),
(8, 'MCS', 2, 1, '2', 'DBMS', '', '08-03-24'),
(9, 'MCS', 2, 1, '2', 'DLD', '', '08-03-24'),
(10, 'MCS', 1, 1, '2', 'Ds', '', '08-03-24'),
(11, 'MCS', 1, 1, '2', 'I2C', '', '08-03-24'),
(12, 'MCS', 2, 1, '2', 'OOP', '', '08-03-24'),
(13, 'MCS', 2, 1, '2', 'SE', '', '08-03-24'),
(14, 'MCS', 2, 1, '2', 'WEB', '', '08-03-24'),
(15, 'MCS', 2, 1, '1', 'OOP', '', '08-03-24'),
(16, 'MIT', 2, 1, '3', 'ITP', '', '08-03-24'),
(17, 'MIT', 2, 1, '3', 'MBAD', '', '08-03-24'),
(18, 'MCS', 1, 1, '10', 'CSPD', '', '08-03-24'),
(19, 'MCS', 2, 1, '10', 'DBMS', '', '08-03-24'),
(20, 'MCS', 2, 1, '10', 'DLD', '', '08-03-24'),
(21, 'MCS', 1, 1, '10', 'Ds', '', '08-03-24'),
(22, 'MCS', 1, 1, '10', 'I2C', '', '08-03-24'),
(23, 'MCS', 2, 1, '10', 'OOP', '', '08-03-24'),
(24, 'MCS', 2, 1, '10', 'SE', '', '08-03-24'),
(25, 'MCS', 2, 1, '10', 'WEB', '', '08-03-24'),
(26, 'MCS', 2, 1, '3', 'OOP', '', '08-03-24'),
(27, 'BBA', 6, 1, '3', 'DBMS', '', '08-03-24'),
(28, 'MCS', 2, 1, '3', 'OOP', '', '10-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `student_fee`
--

DROP TABLE IF EXISTS `student_fee`;
CREATE TABLE IF NOT EXISTS `student_fee` (
  `fee_voucher` int NOT NULL AUTO_INCREMENT,
  `roll_no` varchar(30) NOT NULL,
  `amount` int NOT NULL,
  `posting_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`fee_voucher`),
  KEY `roll_no` (`roll_no`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`fee_voucher`, `roll_no`, `amount`, `posting_date`, `status`) VALUES
(1, 'MCS-S19-1', 23455, '2020-03-29 11:24:36', 'Paid'),
(2, 'MCS-S19-1', 20093, '2020-03-30 12:35:39', 'Paid'),
(3, '2', 5000, '2024-03-08 07:28:05', 'Paid'),
(4, '3', 5000, '2024-03-10 08:44:03', 'Paid'),
(5, '1', 5000, '2024-03-10 09:27:47', 'Paid'),
(6, '3', 6000, '2024-03-10 09:27:57', 'Paid'),
(7, '11', 9000, '2024-03-10 09:37:36', 'Paid'),
(8, '11', 5000, '2024-03-10 09:40:09', 'Paid'),
(9, '2', 10000, '2024-03-10 15:50:02', 'Paid'),
(10, '1', 2, '2024-03-12 05:26:38', 'Paid'),
(11, '67', 5000, '2024-03-12 08:43:34', 'Paid'),
(12, '2', 5000, '2024-03-12 08:44:44', 'Paid');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `roll_no` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `father_name` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `mobile_no` varchar(11) NOT NULL,
  `course_code` varchar(11) NOT NULL,
  `session` varchar(10) NOT NULL,
  `profile_image` varchar(100) NOT NULL,
  `prospectus_issued` varchar(10) NOT NULL,
  `prospectus_amount` varchar(10) NOT NULL,
  `form_b` varchar(20) NOT NULL,
  `applicant_status` varchar(20) NOT NULL,
  `application_status` varchar(20) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `other_phone` varchar(11) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `permanent_address` varchar(150) NOT NULL,
  `current_address` varchar(150) NOT NULL,
  `place_of_birth` varchar(150) NOT NULL,
  `matric_complition_date` varchar(10) NOT NULL,
  `matric_awarded_date` varchar(10) NOT NULL,
  `matric_certificate` varchar(100) NOT NULL,
  `fa_complition_date` varchar(10) NOT NULL,
  `fa_awarded_date` varchar(10) NOT NULL,
  `fa_certificate` varchar(100) NOT NULL,
  `ba_complition_date` varchar(10) NOT NULL,
  `ba_awarded_date` varchar(10) NOT NULL,
  `ba_certificate` varchar(100) NOT NULL,
  `semester` int NOT NULL,
  `total_marks` int NOT NULL,
  `obtain_marks` int NOT NULL,
  `state` varchar(20) NOT NULL,
  `admission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`roll_no`)
) ENGINE=InnoDB AUTO_INCREMENT=69 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`roll_no`, `first_name`, `middle_name`, `last_name`, `father_name`, `email`, `mobile_no`, `course_code`, `session`, `profile_image`, `prospectus_issued`, `prospectus_amount`, `form_b`, `applicant_status`, `application_status`, `cnic`, `dob`, `other_phone`, `gender`, `permanent_address`, `current_address`, `place_of_birth`, `matric_complition_date`, `matric_awarded_date`, `matric_certificate`, `fa_complition_date`, `fa_awarded_date`, `fa_certificate`, `ba_complition_date`, `ba_awarded_date`, `ba_certificate`, `semester`, `total_marks`, `obtain_marks`, `state`, `admission_date`) VALUES
(1, '1234', '1234', '1234', '1234', '1234@GMAIL.COM', '147852369', 'Select Cour', 'Select Ses', '', 'Select Opt', 'Select Opt', '', 'Select Option', 'Select Option', '', '', '', 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '2024-03-10 14:54:05'),
(2, '123', '123', '123', '123', '123@gmail.com', '7412589630', 'Select Cour', 'Select Ses', '', 'Select Opt', 'Select Opt', '', 'Select Option', 'Select Option', '', '', '', 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '2024-03-10 15:46:43'),
(67, 'vidhi', 'jogani', 'nareshbhai', 'nareshbahi', 'vidhiabc@gmail.com', '7894563210', 'BBA', 'S19', 'Screenshot 2023-03-18 192910.png', 'Yes', 'Yes', 'form is completed', 'Admitted', 'Approved', '147852369784', '', '', 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '2024-03-12 07:53:52'),
(68, 'ankita ', 'dave', 's', 's', 'ankita@gmail.com', '7412589630', 'Select Cour', 'Select Ses', '', 'Select Opt', 'Select Opt', '', 'Select Option', 'Select Option', '', '', '', 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '2024-03-12 08:16:38');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_attendance`
--

DROP TABLE IF EXISTS `teacher_attendance`;
CREATE TABLE IF NOT EXISTS `teacher_attendance` (
  `attendance_id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` varchar(30) NOT NULL,
  `attendance` int NOT NULL,
  `attendance_date` varchar(11) NOT NULL,
  PRIMARY KEY (`attendance_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`attendance_id`, `teacher_id`, `attendance`, `attendance_date`) VALUES
(1, '3', 1, '09-03-20'),
(2, '3', 1, '10-03-20'),
(3, '3', 1, '11-04-20'),
(4, '3', 1, '30-03-20'),
(5, '2', 0, '30-03-20'),
(6, '2', 1, '08-03-24'),
(7, '6', 1, '10-03-24'),
(8, '2', 1, '12-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_courses`
--

DROP TABLE IF EXISTS `teacher_courses`;
CREATE TABLE IF NOT EXISTS `teacher_courses` (
  `teacher_courses_id` int NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) NOT NULL,
  `semester` int NOT NULL,
  `teacher_id` varchar(10) NOT NULL,
  `subject_code` varchar(10) NOT NULL,
  `assign_date` varchar(10) NOT NULL,
  `total_classes` int NOT NULL,
  PRIMARY KEY (`teacher_courses_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_courses`
--

INSERT INTO `teacher_courses` (`teacher_courses_id`, `course_code`, `semester`, `teacher_id`, `subject_code`, `assign_date`, `total_classes`) VALUES
(1, 'MCS', 2, '3', 'OOP', '27-03-20', 30),
(2, 'MCS', 2, '1', 'DBMS', '27-03-20', 30),
(3, 'MCS', 2, '3', 'DLD', '27-03-20', 30),
(4, 'MCS', 2, '1', 'SE', '27-03-20', 30),
(5, 'MCS', 2, '3', 'WEB', '27-03-20', 30),
(6, 'MCS', 2, '2', 'OOP', '08-03-24', 2),
(7, 'MIT', 6, '5', 'DBMS', '08-03-24', 5),
(8, 'MCS', 2, '6', 'OOP', '10-03-24', 2),
(9, 'MIT', 3, '2', 'DBMS', '12-03-24', 2);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_info`
--

DROP TABLE IF EXISTS `teacher_info`;
CREATE TABLE IF NOT EXISTS `teacher_info` (
  `teacher_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `father_name` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone_no` varchar(11) NOT NULL,
  `profile_image` blob NOT NULL,
  `teacher_status` varchar(10) NOT NULL,
  `application_status` varchar(10) NOT NULL,
  `cnic` varchar(15) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `other_phone` int NOT NULL,
  `gender` varchar(10) NOT NULL,
  `permanent_address` varchar(100) NOT NULL,
  `current_address` varchar(100) NOT NULL,
  `place_of_birth` varchar(50) NOT NULL,
  `matric_complition_date` varchar(10) NOT NULL,
  `matric_awarded_date` varchar(10) NOT NULL,
  `matric_certificate` varchar(100) NOT NULL,
  `fa_complition_date` varchar(10) NOT NULL,
  `fa_awarded_date` varchar(10) NOT NULL,
  `fa_certificate` varchar(100) NOT NULL,
  `ba_complition_date` varchar(10) NOT NULL,
  `ba_awarded_date` varchar(10) NOT NULL,
  `ba_certificate` varchar(100) NOT NULL,
  `ma_complition_date` varchar(10) NOT NULL,
  `ma_awarded_date` varchar(100) NOT NULL,
  `ma_certificate` varchar(101) NOT NULL,
  `last_qualification` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `hire_date` varchar(10) NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`teacher_id`, `first_name`, `middle_name`, `last_name`, `father_name`, `email`, `phone_no`, `profile_image`, `teacher_status`, `application_status`, `cnic`, `dob`, `other_phone`, `gender`, `permanent_address`, `current_address`, `place_of_birth`, `matric_complition_date`, `matric_awarded_date`, `matric_certificate`, `fa_complition_date`, `fa_awarded_date`, `fa_certificate`, `ba_complition_date`, `ba_awarded_date`, `ba_certificate`, `ma_complition_date`, `ma_awarded_date`, `ma_certificate`, `last_qualification`, `state`, `hire_date`) VALUES
(2, 'GOPI', 'PATEL', 'SURESHBHAI', '', 'staff1@gmail.com', '9807367624', 0x696d616765732e706e67, 'Permanent', 'Yes', '8793', '1987-01-17', 0, 'Male', 'abc', 'def', 'ghij', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '18-06-21'),
(3, 'vmj', 'vmj', 'vmj', '', 'vmj@gmail.com', '7845123690', '', 'Select Sta', 'Select Sta', '', '', 0, 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '08-03-24'),
(5, 'gopi', 'dhanani', 'nareshbahi', '', 'gopi@gmail.com', '', '', 'Select Sta', 'Select Sta', '', '', 0, 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '08-03-24'),
(6, 'bipin', 'mahaavtar', 'jadav', '', 'bipin@gmail.com', '7412589630', 0x6465736b746f702d77616c6c70617065722d7377616d696e61726179616e2d61617274692d776974682d6c79726963732d7377616d696e61726179616e2d6268616777616e2e6a7067, 'Select Sta', 'Select Sta', '', '', 0, 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '08-03-24'),
(7, 'abc', 'abc', 'abc', '', 'abc@gmail.com', '7896541230', '', 'Select Sta', 'Select Sta', '', '', 0, 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10-03-24'),
(8, '142', '142', '142', '', '142@gmail.com', '', '', 'Select Sta', 'Select Sta', '', '', 0, 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '10-03-24');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salary_allowances`
--

DROP TABLE IF EXISTS `teacher_salary_allowances`;
CREATE TABLE IF NOT EXISTS `teacher_salary_allowances` (
  `teacher_id` int NOT NULL,
  `basic_salary` int NOT NULL,
  `medical_allowance` int NOT NULL,
  `hr_allowance` int NOT NULL,
  `scale` int NOT NULL,
  PRIMARY KEY (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salary_allowances`
--

INSERT INTO `teacher_salary_allowances` (`teacher_id`, `basic_salary`, `medical_allowance`, `hr_allowance`, `scale`) VALUES
(1, 40000, 5, 10, 15),
(2, 500, 300, 200, 100),
(3, 500, 500, 500, 500),
(4, 500, 100, 20, 30),
(5, 100, 50, 10, 20),
(6, 5000, 4000, 300, 200),
(7, 500, 200, 100, 50);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_salary_report`
--

DROP TABLE IF EXISTS `teacher_salary_report`;
CREATE TABLE IF NOT EXISTS `teacher_salary_report` (
  `salary_id` int NOT NULL AUTO_INCREMENT,
  `teacher_id` int NOT NULL,
  `total_amount` int NOT NULL,
  `status` varchar(11) NOT NULL,
  `paid_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`salary_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salary_report`
--

INSERT INTO `teacher_salary_report` (`salary_id`, `teacher_id`, `total_amount`, `status`, `paid_date`) VALUES
(1, 1, 46000, 'Paid', '2020-03-27 11:28:57'),
(33, 4, 7500, 'Paid', '2024-03-08 04:27:15'),
(39, 3, 20000, 'Paid', '2024-03-08 05:26:57'),
(44, 2, 5500, 'Paid', '2024-03-08 05:43:51'),
(49, 5, 160, 'Paid', '2024-03-08 09:06:31'),
(50, 6, 6500, 'Paid', '2024-03-08 09:10:20'),
(51, 6, 184000, 'Paid', '2024-03-10 14:10:11'),
(52, 6, 220000, 'Paid', '2024-03-12 05:09:33'),
(53, 2, 3000, 'Paid', '2024-03-12 08:37:46'),
(54, 7, 3000, 'Paid', '2024-03-13 04:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `time_table`
--

DROP TABLE IF EXISTS `time_table`;
CREATE TABLE IF NOT EXISTS `time_table` (
  `id` int NOT NULL AUTO_INCREMENT,
  `course_code` varchar(10) NOT NULL,
  `semester` int NOT NULL,
  `timing_from` varchar(10) NOT NULL,
  `timing_to` varchar(10) NOT NULL,
  `day` varchar(20) NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `room_no` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `course_code`, `semester`, `timing_from`, `timing_to`, `day`, `subject_code`, `room_no`) VALUES
(1, 'MCS', 2, '14:01', '15:01', '2', 'OOP', 3),
(2, 'MCS', 2, '18:00', '21:00', '2', 'DBMS', 21),
(3, 'MCS', 2, '17:02', '18:02', '1', 'DLD', 3),
(4, 'MCS', 2, '18:00', '21:00', '4', 'SE', 21),
(5, 'MCS', 2, '18:00', '21:00', '5', 'WEB', 21),
(6, 'MIT', 2, '18:00', '21:00', '4', 'MBAD', 12),
(7, 'M.Com', 2, '14:00', '15:00', '7', 'CSPD', 2),
(8, 'MCS', 2, '13:58', '15:58', '1', 'CSPD', 2);

-- --------------------------------------------------------

--
-- Table structure for table `weekdays`
--

DROP TABLE IF EXISTS `weekdays`;
CREATE TABLE IF NOT EXISTS `weekdays` (
  `day_id` int NOT NULL AUTO_INCREMENT,
  `day_name` varchar(15) NOT NULL,
  PRIMARY KEY (`day_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `weekdays`
--

INSERT INTO `weekdays` (`day_id`, `day_name`) VALUES
(1, 'Monday'),
(2, 'Tuesday'),
(3, 'Wednesday'),
(4, 'Thursday'),
(5, 'Friday'),
(6, 'Saturday'),
(7, 'Sunday');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `teacher_salary_report`
--
ALTER TABLE `teacher_salary_report`
  ADD CONSTRAINT `teacher_salary_report_ibfk_1` FOREIGN KEY (`teacher_id`) REFERENCES `teacher_salary_allowances` (`teacher_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
