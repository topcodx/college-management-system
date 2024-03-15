-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 14, 2024 at 12:20 PM
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
) ENGINE=InnoDB AUTO_INCREMENT=90 DEFAULT CHARSET=latin1;

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
('BA', 'BA', '3', 5),
('ca', 'ca', '2', 1),
('M.Com', 'Master in Commerce', 'Semester', 2),
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
('DLD', 'Data Logic and Designing', 'MIT', 4, 1, 2),
('Ds', 'Discrete Structure', 'MCS', 1, 1, 3),
('I2C', 'Introduction to Computer Science', 'MCS', 1, 1, 4),
('ITP', 'IT Project Management System', 'MIT', 2, 1, 3),
('MBAD', 'Mobile Application Development', 'MIT', 2, 1, 4),
('OOP', 'Object Oriented ', 'M.Com', 23, 1, 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`ID`, `user_id`, `Password`, `Role`, `account`) VALUES
(2, 'admin@gmail.com', 'VMJ', 'Admin', 'Activate'),
(5, 'staff1@gmail.com', 'VMJ', 'Teacher', 'Activate'),
(70, '607980501', 'student123*', 'Student', 'Activate');

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
(1, 'University_name', 'VMJ UNIVERSITY'),
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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_courses`
--

INSERT INTO `student_courses` (`student_course_id`, `course_code`, `semester`, `dept_id`, `roll_no`, `subject_code`, `session`, `assign_date`) VALUES
(29, 'MCS', 1, 1, '607980501', 'Ds', '', '14-03-24'),
(30, 'MCS', 1, 1, '607980501', 'I2C', '', '14-03-24'),
(31, 'M.Com', 2, 1, '607980501	', 'OOP', '', '14-03-24');

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

DROP TABLE IF EXISTS `student_info`;
CREATE TABLE IF NOT EXISTS `student_info` (
  `roll_no` int NOT NULL,
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`roll_no`, `first_name`, `middle_name`, `last_name`, `father_name`, `email`, `mobile_no`, `course_code`, `session`, `profile_image`, `prospectus_issued`, `prospectus_amount`, `form_b`, `applicant_status`, `application_status`, `cnic`, `dob`, `other_phone`, `gender`, `permanent_address`, `current_address`, `place_of_birth`, `matric_complition_date`, `matric_awarded_date`, `matric_certificate`, `fa_complition_date`, `fa_awarded_date`, `fa_certificate`, `ba_complition_date`, `ba_awarded_date`, `ba_certificate`, `semester`, `total_marks`, `obtain_marks`, `state`, `admission_date`) VALUES
(607980501, 'jogani', 'vidhi', 'nareshbhai', '', 'vidhi@gmail.com', '7046650409', 'MIT', 'S19', 'user1.jpg', '', '', '', '', 'Admitted', '', '', '', 'Select Gen', '', '', '', '', '', '', '', '', '', '', '', '', 0, 0, 0, '', '2024-03-14 11:00:41');

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_attendance`
--

INSERT INTO `teacher_attendance` (`attendance_id`, `teacher_id`, `attendance`, `attendance_date`) VALUES
(9, '2', 1, '14-03-24'),
(10, '2', 0, '14-03-24');

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
(2, 'GOPI', 'PATEL', 'SURESHBHAI', '', 'staff1@gmail.com', '9807367624', 0x696d616765732e706e67, 'Permanent', 'Yes', '8793', '1987-01-17', 0, 'Male', 'abc', 'def', 'ghij', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '18-06-21');

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
(2, 500, 100, 30, 20);

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
) ENGINE=InnoDB AUTO_INCREMENT=56 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teacher_salary_report`
--

INSERT INTO `teacher_salary_report` (`salary_id`, `teacher_id`, `total_amount`, `status`, `paid_date`) VALUES
(55, 2, 1150, 'Paid', '2024-03-14 12:06:11');

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `time_table`
--

INSERT INTO `time_table` (`id`, `course_code`, `semester`, `timing_from`, `timing_to`, `day`, `subject_code`, `room_no`) VALUES
(1, 'M.Com', 2, '18:48', '18:49', '3', 'OOP', 15),
(2, 'MIT', 2, '18:36', '18:38', '3', 'DBMS', 3),
(3, 'MCS', 2, '17:02', '18:02', '1', 'DLD', 3),
(4, 'M.Com', 4, '17:32', '17:35', '1', 'SE', 5),
(5, 'b.com', 2, '11:47', '12:47', '3', 'OOP', 15),
(6, 'MIT', 2, '18:00', '21:00', '4', 'MBAD', 12),
(7, 'M.Com', 2, '14:00', '15:00', '7', 'CSPD', 2),
(8, 'MCS', 2, '13:58', '15:58', '1', 'CSPD', 2),
(9, 'b.com', 2, '11:47', '12:47', '3', 'OOP', 15),
(10, 'b.com', 2, '11:47', '12:47', '3', 'OOP', 15),
(11, 'ca', 2, '15:34', '17:35', '4', 'MBAD', 12),
(12, 'B.Fashion', 4, '10:58', '10:59', '1', 'Ds', 5),
(13, 'BSAI', 4, '11:40', '12:40', '1', 'DLD', 1);

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
