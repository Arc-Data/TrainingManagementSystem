-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 03:43 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

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
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `course_id` int(11) NOT NULL,
  `course_title` varchar(30) NOT NULL,
  `number_of_days` int(11) NOT NULL DEFAULT 1,
  `mtap_course` tinyint(1) NOT NULL DEFAULT 0,
  `pre_requisite_course` int(11) DEFAULT NULL,
  `implementation` enum('1st Quarter','2nd Quarter','3rd Quarter','4th Quarter') NOT NULL DEFAULT '1st Quarter',
  `implementation_year` year(4) NOT NULL DEFAULT current_timestamp(),
  `year_certified` year(4) NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`course_id`, `course_title`, `number_of_days`, `mtap_course`, `pre_requisite_course`, `implementation`, `implementation_year`, `year_certified`) VALUES
(300000, 'Programming 1', 15, 0, NULL, '1st Quarter', 2023, 2000),
(300001, 'Programming 2', 30, 0, 300000, '2nd Quarter', 2023, 1990),
(300002, 'Object Oriented Programing', 1, 0, NULL, '1st Quarter', 2023, 1990),
(300003, 'Calculus', 1, 0, NULL, '1st Quarter', 2023, 2000),
(300004, 'Calculus 2', 1, 0, 300003, '1st Quarter', 2023, 2000),
(300005, 'Information Management', 1, 0, NULL, '1st Quarter', 2023, 2010),
(300006, 'Database Administration', 1, 0, 300005, '1st Quarter', 2023, 2010),
(300007, 'Web Development', 1, 0, NULL, '1st Quarter', 2023, 2000),
(300008, 'Mathematics', 30, 0, NULL, '1st Quarter', 2023, 2023),
(300009, 'Arts', 30, 0, NULL, '1st Quarter', 2023, 2023),
(300010, 'Programming 3', 30, 0, 300001, '1st Quarter', 2023, 2023),
(300011, 'CHMTC', 14, 0, NULL, '1st Quarter', 2023, 2023),
(300016, 'Something Nice', 2, 0, NULL, '1st Quarter', 2025, 2023),
(300017, 'Something NIce', 2, 0, NULL, '2nd Quarter', 2023, 2001);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`course_id`),
  ADD KEY `course_ibfk_1` (`pre_requisite_course`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `course_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=300018;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `course`
--
ALTER TABLE `course`
  ADD CONSTRAINT `course_ibfk_1` FOREIGN KEY (`pre_requisite_course`) REFERENCES `course` (`course_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
