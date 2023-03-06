-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2023 at 06:43 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `account_details`
--

CREATE TABLE `account_details` (
  `account_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `user_type` varchar(10) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `suffix` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `account_details`
--

INSERT INTO `account_details` (`account_id`, `username`, `password`, `user_type`, `lastname`, `firstname`, `middlename`, `suffix`) VALUES
(100001, 'aron.ligsay@pup.com', 'aron.ligsay', 'student', 'Ligsay', 'Aron', 'A', ''),
(100002, 'mariah.sydney@pup.com', 'mariah.sydney', 'student', 'Sydney', 'Mariah', '', ''),
(100003, 'harold.manuel@pup.com', 'harold.manuel', 'student', 'Harold', 'Manuel', '', ''),
(100004, 'ian.ilagan@pup.com', 'ian.ilagan', 'student', 'Ilagan', 'Ian', 'Geoffrey', ''),
(100005, 'nhory.banez@pup.com', 'nhory.banez', 'instructor', 'Banez', 'Nhory', 'James', ''),
(100006, 'valmaria.bestal@pup.com', 'valmaria.bestal', 'instructor', 'Bestal', 'Valmoria', 'Richard', ''),
(100007, 'jose.arambulo@pup.com', 'jose.arambulo', 'student', 'Arambulo', 'Jose', 'Nido', ''),
(100008, 'allan.bautista@pup.com', 'allan.bautista', 'student', 'Bautista', 'Allan', 'L', 'Jr.'),
(100009, 'mary.boceso@pup.com', 'mary.boceso', 'student', 'Boceso', 'Mary', 'Gueverra', ''),
(100010, 'adrian.cabahug@pup.com', 'adrian.cabahug', 'student', 'Cabahug', 'Adrian', 'Ortega', ''),
(100011, 'kenneth.cerrado@pup.com', 'kenneth.cerrado', 'student', 'Cerrado', 'Kenneth', 'Jolin', ''),
(100012, 'dan.coloma@pup.com', 'dan.coloma', 'instructor', 'Coloma', 'Dan', 'Agamon', ''),
(100013, 'christian.conanan@pup.com', 'christian.conanan', 'instructor', 'Conanan', 'Christian', 'Yves', ''),
(100014, 'lucibelle.dellomos@pup.com', 'lucibelle.dellomos', 'instructor', 'Dellomos', 'Lucibelle', 'Deslate', ''),
(100015, 'daniel.dulce@pup.com', 'daniel.dulce', 'admin', 'Dulce', 'Daniel Joseph', 'Siunam', ''),
(100016, 'aron1.ligsay@pup.com', 'aron1.ligsay', 'student', 'ligsay', 'aron1', 'a', 'Jr.'),
(100017, 'charlotte.balbido@pup.com', 'charlotte.balbido', 'student', 'Balbido', 'Charlotte', 'B', ''),
(100018, 'james.banez@pup.com', 'james.banez', 'student', 'Banez', 'James', 'C', ''),
(100019, 'charly.basa@pup.com', 'charly.basa', 'student', 'Basa', 'Charly', 'B', ''),
(100020, 'xavier.coloma@pup.com', 'xavier.coloma', 'student', 'Coloma', 'Xavier', 'C', ''),
(100021, 'marilou.novida@pup.c.om', 'marilou.novida', 'admin', 'Novida', 'Marilou', 'A', ''),
(100022, 'richard.valmoria@pup.com', 'richard.valmoria', 'instructor', 'Bestal', 'Richard', 'Valmoria', ''),
(100023, 'richard.valmoria@pup.com', 'richard.valmoria', 'instructor', 'Bestal', 'Richard', 'Valmoria', '');

-- --------------------------------------------------------

--
-- Table structure for table `class_information_details`
--

CREATE TABLE `class_information_details` (
  `class_info_id` int(11) NOT NULL,
  `letter_order_number` varchar(15) NOT NULL,
  `general_order` varchar(30) NOT NULL,
  `cert_ctrl_no` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `class_information_details`
--

INSERT INTO `class_information_details` (`class_info_id`, `letter_order_number`, `general_order`, `cert_ctrl_no`) VALUES
(600000, 'A', '1', 'cert_600000'),
(600001, 'B', '1', 'cert_600001'),
(600002, 'C', '1', 'cert_600002'),
(600011, '999', '999', '999'),
(600012, '600020', '600020', '600020'),
(600013, '111', '111', '111');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(30) NOT NULL,
  `number_of_days` int(11) NOT NULL DEFAULT 1,
  `mtap_course` tinyint(1) NOT NULL DEFAULT 0,
  `pre_requisite_course` int(11) DEFAULT NULL,
  `implementation` varchar(200) DEFAULT NULL,
  `year_certified` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `number_of_days`, `mtap_course`, `pre_requisite_course`, `implementation`, `year_certified`) VALUES
(300000, 'Programming 1', 15, 0, NULL, '1st Quarter 2023', 2000),
(300001, 'Programming 2', 30, 0, 300000, '', 1990),
(300002, 'Object Oriented Programing', 0, 0, NULL, '', 1990),
(300003, 'Calculus', 0, 0, NULL, '', 2000),
(300004, 'Calculus 2', 0, 0, 300003, '', 2000),
(300005, 'Information Management', 0, 0, NULL, '', 2010),
(300006, 'Database Administration', 0, 0, 300005, '', 2010),
(300007, 'Web Development', 0, 0, NULL, '', 2000),
(300008, 'Mathematics', 30, 0, NULL, '', 2023),
(300009, 'Arts', 30, 0, NULL, '', 2023),
(300010, 'Programming 3', 30, 0, 300001, '', 2023),
(300011, 'CHMTC', 14, 0, NULL, '1st Quarter 2023', 2023);

-- --------------------------------------------------------

--
-- Table structure for table `pool_instructor_details`
--

CREATE TABLE `pool_instructor_details` (
  `instructor_id` int(11) NOT NULL,
  `account_id` int(11) DEFAULT NULL,
  `rank` varchar(15) NOT NULL,
  `qualification_degree` varchar(50) DEFAULT NULL,
  `course_specialization` varchar(50) NOT NULL,
  `other_qualification` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pool_instructor_details`
--

INSERT INTO `pool_instructor_details` (`instructor_id`, `account_id`, `rank`, `qualification_degree`, `course_specialization`, `other_qualification`) VALUES
(700000, 100005, 'PCO', 'Master in Degree', 'Mathematics', '    '),
(700001, 100006, 'PCO', 'Bachelor\'s in Education', 'Computer Science', ''),
(700002, 100012, 'PNCO', 'Master\'s Degree', 'Math', ''),
(700003, 100013, 'NUP', 'Doctor of Education Degree', 'Information Technology', ''),
(700008, NULL, 'NUP', 'Doctor of Education Degree', 'Information Technology', ''),
(700009, NULL, 'NUP', 'Doctor of Education Degree', 'Information Technology', ''),
(700010, NULL, '', '', '', ''),
(700011, NULL, 'PCO', 'Master Degree', 'Information Technology', ''),
(700012, NULL, 'NUP', 'Associates in Degree', 'Information Technology', ''),
(700013, 100019, 'NUP', 'Doctor of Education Degree', 'Information Technology', ''),
(700014, 100021, 'NUP', 'Doctor of Education Degree', 'Information Technology', ''),
(700015, 100001, 'PCO', 'Associates in Degree', 'Information Technology', '');

-- --------------------------------------------------------

--
-- Table structure for table `registration_course`
--

CREATE TABLE `registration_course` (
  `course_reg_id` int(11) NOT NULL,
  `course_id` int(11) DEFAULT NULL,
  `instructor_id` int(11) DEFAULT NULL,
  `opening_date` date DEFAULT NULL,
  `closing_date` date DEFAULT NULL,
  `implementation_nr` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_course`
--

INSERT INTO `registration_course` (`course_reg_id`, `course_id`, `instructor_id`, `opening_date`, `closing_date`, `implementation_nr`) VALUES
(400000, 300000, 700000, '2022-11-01', '2023-02-28', ''),
(400001, 300003, 700002, '2022-11-01', '2023-02-28', ''),
(400002, 300002, 700001, '2022-11-01', '2023-02-28', ''),
(400003, 300005, 700001, '2022-11-01', '2023-02-28', ''),
(400004, 300000, 700000, '2023-01-01', '2023-04-30', ''),
(400005, 300004, 700002, '2023-01-01', '2023-04-30', ''),
(400006, 300007, 700003, '2023-01-01', '2023-04-30', ''),
(400007, 300006, 700001, '2023-01-01', '2023-04-30', ''),
(400008, 300008, 700000, '0000-00-00', '0000-00-00', ''),
(400009, 300009, 700013, '0000-00-00', '0000-00-00', ''),
(400010, 300000, 700000, '0000-00-00', '0000-00-00', ''),
(400011, 300001, 700000, '0000-00-00', '0000-00-00', ''),
(400012, 300010, 700002, '0000-00-00', '0000-00-00', ''),
(400013, 300011, 700001, '0000-00-00', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Table structure for table `registration_participants_class`
--

CREATE TABLE `registration_participants_class` (
  `student_reg_id` int(11) NOT NULL,
  `course_reg_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `qualification` varchar(50) DEFAULT 'Satisfactory',
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `class_info_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration_participants_class`
--

INSERT INTO `registration_participants_class` (`student_reg_id`, `course_reg_id`, `student_id`, `qualification`, `status`, `class_info_id`) VALUES
(500006, 400002, 200002, 'Satisfactory', 0, 600001),
(500007, 400003, 200002, 'Very Satisfactory', 0, 600002),
(500008, 400004, 200002, 'Extremely Satisfactory', 0, 600002),
(500009, 400002, 200003, 'Satisfactory', 0, 600002),
(500010, 400003, 200003, 'Satisfactory', 0, 600002),
(500015, 400000, 2000028, NULL, 0, 600013),
(500016, 400013, 2000028, NULL, 0, 600000),
(500017, 400013, 200005, NULL, 0, 600000);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `student_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `rank` varchar(15) NOT NULL,
  `office_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`student_id`, `account_id`, `rank`, `office_name`) VALUES
(200000, 100001, 'CPU', 'InfoTech'),
(200001, 100002, 'PCOS', 'InfoTech'),
(200002, 100003, 'PCOS', 'AVG'),
(200003, 100004, 'PCO', 'InfoTech'),
(200004, 100007, 'PNCO', 'TechnoOrg'),
(200005, 100008, 'PNCO', 'InfoTech'),
(200006, 100009, 'PNCO', 'AVG'),
(200007, 100010, 'NUP', 'InfoTech'),
(200008, 100011, 'NUP', 'TechnoOrg'),
(200014, 100016, 'PCO', 'InfoTech'),
(200015, 100017, 'PCO', 'IT'),
(2000024, 100017, 'PCO', 'InfoTech'),
(2000025, 100018, 'PCO', 'InfoTech'),
(2000026, 100019, 'PCO', 'InfoTech'),
(2000028, 100020, 'NUP', 'InfoTech');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account_details`
--
ALTER TABLE `account_details`
  ADD PRIMARY KEY (`account_id`);

--
-- Indexes for table `class_information_details`
--
ALTER TABLE `class_information_details`
  ADD PRIMARY KEY (`class_info_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_ibfk_1` (`pre_requisite_course`);

--
-- Indexes for table `pool_instructor_details`
--
ALTER TABLE `pool_instructor_details`
  ADD PRIMARY KEY (`instructor_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `registration_course`
--
ALTER TABLE `registration_course`
  ADD PRIMARY KEY (`course_reg_id`),
  ADD KEY `instructor_id` (`instructor_id`),
  ADD KEY `course_id` (`course_id`);

--
-- Indexes for table `registration_participants_class`
--
ALTER TABLE `registration_participants_class`
  ADD PRIMARY KEY (`student_reg_id`),
  ADD KEY `course_reg_id` (`course_reg_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `registration_participants_class_ibfk_3` (`class_info_id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`student_id`),
  ADD KEY `account_id` (`account_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account_details`
--
ALTER TABLE `account_details`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100024;

--
-- AUTO_INCREMENT for table `class_information_details`
--
ALTER TABLE `class_information_details`
  MODIFY `class_info_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=600014;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300012;

--
-- AUTO_INCREMENT for table `pool_instructor_details`
--
ALTER TABLE `pool_instructor_details`
  MODIFY `instructor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=700018;

--
-- AUTO_INCREMENT for table `registration_course`
--
ALTER TABLE `registration_course`
  MODIFY `course_reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=400014;

--
-- AUTO_INCREMENT for table `registration_participants_class`
--
ALTER TABLE `registration_participants_class`
  MODIFY `student_reg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=500019;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000029;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`pre_requisite_course`) REFERENCES `course` (`course_id`);

--
-- Constraints for table `pool_instructor_details`
--
ALTER TABLE `pool_instructor_details`
  ADD CONSTRAINT `pool_instructor_details_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account_details` (`account_id`);

--
-- Constraints for table `registration_course`
--
ALTER TABLE `registration_course`
  ADD CONSTRAINT `registration_course_ibfk_1` FOREIGN KEY (`course_id`) REFERENCES `course` (`course_id`),
  ADD CONSTRAINT `registration_course_ibfk_2` FOREIGN KEY (`instructor_id`) REFERENCES `pool_instructor_details` (`instructor_id`);

--
-- Constraints for table `registration_participants_class`
--
ALTER TABLE `registration_participants_class`
  ADD CONSTRAINT `registration_participants_class_ibfk_1` FOREIGN KEY (`course_reg_id`) REFERENCES `registration_course` (`course_reg_id`),
  ADD CONSTRAINT `registration_participants_class_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `student` (`student_id`),
  ADD CONSTRAINT `registration_participants_class_ibfk_3` FOREIGN KEY (`Class_info_ID`) REFERENCES `class_information_details` (`class_info_id`);

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account_details` (`account_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
