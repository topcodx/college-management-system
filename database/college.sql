-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 04, 2024 at 01:20 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=110 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `class_result`
--

INSERT INTO `class_result` (`class_result_id`, `roll_no`, `course_code`, `subject_code`, `semester`, `total_marks`, `obtain_marks`, `result_date`) VALUES
(90, '607980501', 'wd', 'WD', '4', '100', '50', '15-03-24'),
(91, '123716694', 'MCS', 'OS', '2', '100', '70', '22-03-24'),
(92, '123716694', 'MCS', 'OS', '2', '100', '80', '22-03-24'),
(93, '123716694', 'MCS', 'OS', '2', '100', '90', '22-03-24'),
(94, '123716694', 'MCS', 'OS', '2', '100', '95', '22-03-24'),
(95, '123716694', 'MCS', 'OS', '2', '100', '50', '22-03-24'),
(96, '123716694', 'MCS', 'OS', '2', '100', '96', '22-03-24'),
(97, '123716694', 'MCS', 'OS', '2', '100', '96', '22-03-24'),
(98, '123716694', 'MCS', 'OS', '2', '100', '70', '22-03-24'),
(99, '123716694', 'MCS', 'OS', '2', '100', '90', '22-03-24'),
(100, '123716694', 'MCS', 'OS', '2', '100', '70', '22-03-24'),
(101, '147852369', 'MCS', 'OOP', '2', '100', '50', '22-03-24'),
(102, '815412342', 'MCS', 'OOP', '2', '100', '90', '22-03-24'),
(103, '147852369', 'MCS', 'OOP', '2', '100', '50', '22-03-24'),
(104, '815412342', 'MCS', 'OOP', '2', '100', '100', '22-03-24'),
(105, '147852369', 'MCS', 'OOP', '2', '100', '90', '22-03-24'),
(106, '815412342', 'MCS', 'OOP', '2', '100', '80', '22-03-24'),
(107, '147852369', 'MCS', 'OOP', '2', '100', '-45', '22-03-24'),
(108, '815412342', 'MCS', 'OOP', '2', '100', '', '22-03-24'),
(109, '71', 'MIT', 'OOP', '2', '100', '80', '2024-04-04');

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
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `first_name`, `last_name`, `email`, `phone_number`, `message`) VALUES
(25, 'jogani', 'bhavy', 'bhavy@gmail.com', 1023654789, 'call me'),
(23, 'sadasd', 'asd', 'asd@gmail.com', 234234234, '32423'),
(24, 'vidhi', 'jogani', 'vidhi@gmail.com', 2147483647, 'call me.');

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
('b.com', 'Bachelor of Commerce', '2', 0),
('BBA', 'Bachelor of Business Administration', '2', 2),
('BCA', 'Bachelor of Computer Applications', '6', 3),
('CA', 'ca', '3', 2),
('Mca', 'Master of Computer ', '4', 2),
('MCS', 'Master of Computer Science', '4', 2),
('MIT', 'Massachusetts Institute of Technology', '3', 5);

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
('NT', 'Network Texhnology', 'MIT', 4, NULL, 2),
('OOP', 'Object Oriented ', 'M.Com', 23, 1, 4),
('OS', 'Operating System', 'BBA', 2, NULL, 2),
('WD', 'Web Designing', 'MIT', 4, NULL, 3),
('Wd-2', 'web designing 2', 'MIT', 2, NULL, 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=93 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `user_id`, `Password`, `Role`, `account`) VALUES
(2, 'admin@gmail.com', '123', 'Admin', 'Activate'),
(86, '716', 'VMJ', 'Student', 'Activate'),
(87, 'abhi@gmail.com', 'VMJ', 'Teacher', 'Activate'),
(88, '', 'VMJ', 'Teacher', 'Activate'),
(89, '', 'VMJ', 'Teacher', 'Deactivate'),
(90, 'Array', 'VMJ', 'Teacher', 'Deactivate'),
(91, ' ', 'VMJ', 'Teacher', 'Deactivate'),
(92, '71', 'VMJ', 'Student', 'Activate');

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
-- Table structure for table `setting`
--

DROP TABLE IF EXISTS `setting`;
CREATE TABLE IF NOT EXISTS `setting` (
  `sno` int NOT NULL AUTO_INCREMENT,
  `key` text NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`sno`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`sno`, `key`, `value`) VALUES
(1, 'University_name', 'VMJ  UNIVERSITY'),
(2, 'University_logo', '/college-management-system/images/LOGO1.JPG');

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_attendance`
--

INSERT INTO `student_attendance` (`attendance_id`, `course_code`, `subject_code`, `semester`, `student_id`, `attendance`, `attendance_date`) VALUES
(25, 'MCS', 'OOP', 2, '147852369', 1, '22-03-24'),
(26, 'MCS', 'OOP', 2, '815412342', 0, '22-03-24'),
(27, 'MCS', 'OOP', 2, '147852369', 0, '22-03-24'),
(28, 'MCS', 'OOP', 2, '815412342', 1, '22-03-24'),
(29, 'MCS', 'OOP', 2, '147852369', 1, '22-03-24'),
(30, 'MCS', 'OOP', 2, '815412342', 1, '22-03-24'),
(31, 'MCS', 'OOP', 2, '147852369', 0, '22-03-24'),
(32, 'MCS', 'OOP', 2, '815412342', 1, '22-03-24'),
(33, 'MCS', 'OOP', 2, '147852369', 0, '22-03-24'),
(34, 'MCS', 'OOP', 2, '815412342', 1, '22-03-24'),
(35, 'MCS', 'OOP', 2, '147852369', 1, '22-03-24'),
(36, 'MCS', 'OOP', 2, '815412342', 0, '22-03-24'),
(37, 'MCS', 'OOP', 2, '147852369', 1, '22-03-24'),
(38, 'MCS', 'OOP', 2, '815412342', 0, '22-03-24'),
(39, 'MCS', 'OOP', 2, '147852369', 1, '22-03-24'),
(40, 'MCS', 'OOP', 2, '815412342', 1, '22-03-24'),
(41, '', '', 0, '', 0, '23-03-24'),
(42, '', '', 0, '', 0, '23-03-24'),
(43, 'MCS', 'OOP', 2, '147852369', 1, '23-03-24'),
(44, 'MCS', 'OOP', 2, '815412342', 0, '23-03-24'),
(45, 'MCS', 'OOP', 2, '147852369', 1, '23-03-24'),
(46, 'MCS', 'OOP', 2, '815412342', 0, '23-03-24'),
(47, 'MCS', 'OOP', 2, '147852369', 0, '23-03-24'),
(48, 'MCS', 'OOP', 2, '815412342', 1, '23-03-24'),
(49, 'MCS', 'OOP', 2, '147852369', 0, '23-03-24'),
(50, 'MCS', 'OOP', 2, '815412342', 0, '23-03-24'),
(51, 'MCS', 'OOP', 2, '147852369', 1, '23-03-24'),
(52, 'MCS', 'OOP', 2, '815412342', 1, '23-03-24'),
(53, 'MCS', 'OOP', 2, '147852369', 1, '23-03-24'),
(54, 'MCS', 'OOP', 2, '815412342', 1, '23-03-24'),
(55, 'MCS', 'OOP', 2, '147852369', 1, '23-03-24'),
(56, 'MCS', 'OOP', 2, '815412342', 1, '23-03-24'),
(57, 'MCS', 'OOP', 2, '147852369', 0, '23-03-24'),
(58, 'MCS', 'OOP', 2, '815412342', 0, '23-03-24'),
(59, '', '', 0, '', 0, '23-03-24'),
(60, '', '', 0, '', 0, '23-03-24'),
(61, '', '', 0, '', 0, '23-03-24'),
(62, '', '', 0, '', 0, '23-03-24'),
(63, 'MCS', 'OOP', 2, '147852369', 1, '23-03-24'),
(64, 'MCS', 'OOP', 2, '815412342', 0, '23-03-24'),
(65, 'MCS', 'OOP', 2, '147852369', 0, '23-03-24'),
(66, 'MCS', 'OOP', 2, '815412342', 0, '23-03-24'),
(67, 'MCS', 'OOP', 2, '147852369', 1, '23-03-24'),
(68, 'MCS', 'OOP', 2, '815412342', 1, '23-03-24'),
(69, 'MCS', 'OOP', 2, '716', 0, '26-03-24'),
(70, 'MCS', 'OOP', 2, '716', 1, '26-03-24');

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
) ENGINE=InnoDB AUTO_INCREMENT=60 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`student_course_id`, `course_code`, `semester`, `dept_id`, `roll_no`, `subject_code`, `session`, `assign_date`) VALUES
(29, 'MCS', 1, 1, '607980501', 'Ds', '', '14-03-24'),
(30, 'MCS', 1, 1, '607980501', 'I2C', '', '14-03-24'),
(31, 'M.Com', 2, 1, '607980501	', 'OOP', '', '14-03-24'),
(32, 'MIT', 5, 1, '607980501	', 'MBAD', '', '15-03-24'),
(33, 'wd', 4, 1, '607980501', 'WD', '', '15-03-24'),
(34, 'M.Com', 23, 1, '607980501', 'OOP', '', '15-03-24'),
(35, 'MCS', 4, 1, 'Master of ', 'OOP', '', '15-03-24'),
(36, 'MIT', 3, 1, '607980501', 'MBAD', '', '15-03-24'),
(37, 'MCS', 2, 1, '607980501', 'OS', '', '15-03-24'),
(38, 'MCS', 1, 1, '607980501', 'OOP', '', '15-03-24'),
(39, 'M.Com', 23, 1, '607980501', 'OOP', '', '15-03-24'),
(40, 'MCS', 2, 1, '607980501', 'OS', '', '15-03-24'),
(41, 'MIT', 3, 1, '607980501', 'MBAD', '', '15-03-24'),
(42, 'MCS', 2, 1, '123716694', 'OS', '', '15-03-24'),
(43, 'MIT', 3, 1, '147852369', 'MBAD', '', '15-03-24'),
(44, 'MIT', 3, 1, '147852369', 'MBAD', '', '15-03-24'),
(45, 'MIT', 3, 1, '147852369', 'OOP', '', '15-03-24'),
(46, 'MCS', 2, 1, '123716694	', 'OS', '', '22-03-24'),
(47, 'MCS', 2, 1, '147852369	', 'OOP', '', '22-03-24'),
(48, 'MCS', 2, 1, '815412342	', 'OOP', '', '22-03-24'),
(49, 'BCA', 2, 1, '716', 'NT', '', '26-03-24'),
(50, 'BBA', 2, 1, '716', 'OS', '', '26-03-24'),
(51, 'MCS', 2, 1, '716', 'WD', '', '26-03-24'),
(52, 'MCS', 2, 1, '716', 'OOP', '', '26-03-24'),
(53, 'BCA', 2, 1, '716', 'NT', '', '26-03-24'),
(54, 'BCA', 2, 1, '716', 'NT', '', '26-03-24'),
(55, 'BCA', 2, 1, '716', 'NT', '', '26-03-24'),
(56, 'MIT', 2, 1, '71', 'OOP', '', '04-04-24'),
(57, 'MIT', 2, 1, '', 'Select Sub', '', '04-04-24'),
(58, 'BBA', 2, 1, '71', 'OS', '', '04-04-24'),
(59, 'M.Com', 23, 1, '71', 'OOP', '', '04-04-24');

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
  `paid_at` timestamp NOT NULL,
  PRIMARY KEY (`fee_voucher`),
  KEY `roll_no` (`roll_no`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_fee`
--

INSERT INTO `student_fee` (`fee_voucher`, `roll_no`, `amount`, `posting_date`, `status`, `paid_at`) VALUES
(16, '147852369', 5000, '2024-03-15 07:31:02', 'Paid', '0000-00-00 00:00:00'),
(17, '123716694', 5000, '2024-03-22 07:37:39', 'Paid', '0000-00-00 00:00:00'),
(18, '123716694', 500, '2024-03-22 07:38:49', 'Paid', '0000-00-00 00:00:00'),
(19, '0', 500, '2024-03-22 07:40:44', 'Paid', '0000-00-00 00:00:00'),
(20, '147852369', 500, '2024-03-22 07:43:47', 'Paid', '0000-00-00 00:00:00'),
(21, '716', 5000, '2024-04-04 06:24:07', 'Paid', '0000-00-00 00:00:00'),
(22, '716', 5000, '2024-04-04 06:25:53', 'Paid', '0000-00-00 00:00:00'),
(23, '716', 5000, '2024-04-04 06:27:01', 'Paid', '0000-00-00 00:00:00'),
(24, '716', 5000, '2024-04-04 06:27:17', 'Paid', '0000-00-00 00:00:00'),
(25, '716', 5000, '2024-04-04 06:27:25', 'Paid', '0000-00-00 00:00:00'),
(26, '716', 14500, '2024-04-04 06:27:41', 'Paid', '0000-00-00 00:00:00'),
(37, '71', 9000, '2024-04-04 12:05:34', 'Unpaid', '0000-00-00 00:00:00'),
(38, '71', 14295, '2024-04-04 12:20:02', 'Unpaid', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `roll_no` int NOT NULL,
  `first_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `middle_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `last_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `father_name` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `email` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `mobile_no` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `course_code` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `session` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `profile_image` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `prospectus_issued` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `prospectus_amount` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `form_b` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `applicant_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `application_status` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `cnic` varchar(15) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `dob` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `other_phone` varchar(11) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `gender` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `permanent_address` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `current_address` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `place_of_birth` varchar(150) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `matric_complition_date` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `matric_awarded_date` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `matric_certificate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `fa_complition_date` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `fa_awarded_date` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `fa_certificate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `ba_complition_date` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `ba_awarded_date` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `ba_certificate` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `semester` int NOT NULL,
  `total_marks` int NOT NULL,
  `obtain_marks` int NOT NULL,
  `state` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'N/A',
  `admission_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`roll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`roll_no`, `first_name`, `middle_name`, `last_name`, `father_name`, `email`, `mobile_no`, `course_code`, `session`, `profile_image`, `prospectus_issued`, `prospectus_amount`, `form_b`, `applicant_status`, `application_status`, `cnic`, `dob`, `other_phone`, `gender`, `permanent_address`, `current_address`, `place_of_birth`, `matric_complition_date`, `matric_awarded_date`, `matric_certificate`, `fa_complition_date`, `fa_awarded_date`, `fa_certificate`, `ba_complition_date`, `ba_awarded_date`, `ba_certificate`, `semester`, `total_marks`, `obtain_marks`, `state`, `admission_date`) VALUES
(71, 'jogani', 'vidhi', 'nareshbahi', 'N/A', 'vidhi@gmail.com', '1478523690', 'MIT', 'S19', 'student.jpg', 'N/A', 'N/A', 'N/A', 'N/A', 'Admitted', '', '', 'N/A', 'Female', 'N/A', 'varchha', 'N/A', '', 'N/A', '', '', 'N/A', '', 'N/A', 'N/A', 'N/A', 0, 0, 0, 'N/A', '2024-04-04 06:59:17');

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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`attendance_id`, `teacher_id`, `attendance`, `attendance_date`) VALUES
(9, '2', 1, '14-03-24'),
(10, '2', 0, '14-03-24'),
(11, '2', 1, '22-03-24'),
(12, '2', 0, '22-03-24'),
(13, '2', 1, '22-03-24'),
(14, '2', 1, '22-03-24'),
(15, '2', 1, '23-03-24'),
(16, '20', 1, '04-04-24'),
(17, '20', 0, '04-04-24');

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
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

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
(9, 'MIT', 3, '2', 'DBMS', '12-03-24', 2),
(10, 'B.com', 2, '14', 'NT', '22-03-24', 2),
(11, 'MCS', 2, '5', 'NT', '26-03-24', 2),
(12, 'MCS', 2, '16', 'NT', '26-03-24', 5),
(13, 'MCS', 2, '16', 'NT', '26-03-24', 5),
(14, 'MCS', 3, '16', 'NT', '04-04-24', 2),
(15, '', 0, '', '', '', 0),
(16, 'MCS', 2, '16', 'NT', '04-04-24', 2);

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_info`
--

INSERT INTO `teacher_info` (`teacher_id`, `first_name`, `middle_name`, `last_name`, `father_name`, `email`, `phone_no`, `profile_image`, `teacher_status`, `application_status`, `cnic`, `dob`, `other_phone`, `gender`, `permanent_address`, `current_address`, `place_of_birth`, `matric_complition_date`, `matric_awarded_date`, `matric_certificate`, `fa_complition_date`, `fa_awarded_date`, `fa_certificate`, `ba_complition_date`, `ba_awarded_date`, `ba_certificate`, `ma_complition_date`, `ma_awarded_date`, `ma_certificate`, `last_qualification`, `state`, `hire_date`) VALUES
(16, 'jasoliya', 'abhi', 'manishbhai', '', 'abhi@gmail.com', '7412589630', 0x757365722e6a7067, 'Select Sta', 'Select Sta', '', '', 0, 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '26-03-24'),
(17, 'jadav', 'bipin', 'm', '', 'bipin@gmail.com', '1478523690', 0x757365722e6a7067, 'Permanent', 'Select Sta', '', '', 0, 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04-04-24'),
(20, 'desai', 'viswa', 's', '', 'viswa@gmail.com', '', '', 'Select Sta', 'Select Sta', '', '', 0, 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '04-04-24');

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
(2, 1000, 500, 200, 100),
(9, 100, 200, 100, 50),
(17, 0, 0, 0, 0),
(20, 0, 0, 0, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=57 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salary_report`
--

INSERT INTO `teacher_salary_report` (`salary_id`, `teacher_id`, `total_amount`, `status`, `paid_date`) VALUES
(55, 2, 1150, 'Paid', '2024-03-14 12:06:11'),
(56, 9, 400, 'Paid', '2024-03-22 08:50:42');

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
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `course_code`, `semester`, `timing_from`, `timing_to`, `day`, `subject_code`, `room_no`) VALUES
(3, 'MCS', 2, '13:44', '15:45', '1', 'NT', 3),
(17, 'Select Cou', 0, '', '', 'Select Week Day', 'Select Subject', 0),
(18, 'Select Cou', 0, '', '', 'Select Week Day', 'Select Subject', 0),
(20, 'b.com', 3, '12:44', '14:44', '1', 'NT', 2);

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
