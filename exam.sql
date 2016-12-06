-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2016 at 08:06 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `exam_3`
--

CREATE TABLE IF NOT EXISTS `exam_3` (
  `q_id` int(10) unsigned NOT NULL,
  `question` varchar(255) NOT NULL,
  `answer` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `exam_3`
--

INSERT INTO `exam_3` (`q_id`, `question`, `answer`) VALUES
(1, 'What is mean by DLD ______?', 'Digital Eleactronincs'),
(2, 'What is the short name of multiplexer??', 'MUX'),
(3, 'What is the short name of demultiplexer??', 'DEMUX');

-- --------------------------------------------------------

--
-- Table structure for table `std_sign`
--

CREATE TABLE IF NOT EXISTS `std_sign` (
  `std_id` int(15) NOT NULL,
  `std_name` varchar(255) NOT NULL,
  `email` text NOT NULL,
  `pass` varchar(255) NOT NULL,
  `std_dep` varchar(255) NOT NULL,
  `std_batch` int(5) NOT NULL,
  `std_sec` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `std_sign`
--

INSERT INTO `std_sign` (`std_id`, `std_name`, `email`, `pass`, `std_dep`, `std_batch`, `std_sec`) VALUES
(1512020220, 'Azharul Islam', 'azharul@gmail.com', '12345', 'CSE', 38, 'E');

-- --------------------------------------------------------

--
-- Table structure for table `std_table`
--

CREATE TABLE IF NOT EXISTS `std_table` (
  `id` int(20) NOT NULL,
  `std_id` int(15) NOT NULL,
  `exam_id` int(10) NOT NULL,
  `exam_name` varchar(20) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `marks` int(10) NOT NULL,
  `outof` int(20) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `std_table`
--

INSERT INTO `std_table` (`id`, `std_id`, `exam_id`, `exam_name`, `course_code`, `teacher_name`, `marks`, `outof`) VALUES
(1, 1512020220, 3, 'DLD Lab', 'EEE-2318', 'Riad Ahmed', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `teacher_sign`
--

CREATE TABLE IF NOT EXISTS `teacher_sign` (
  `teacher_id` int(9) NOT NULL,
  `teacher_email` varchar(255) NOT NULL,
  `teacher_pass` varchar(255) NOT NULL,
  `teacher_name` varchar(100) NOT NULL,
  `teacher_dep` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_sign`
--

INSERT INTO `teacher_sign` (`teacher_id`, `teacher_email`, `teacher_pass`, `teacher_name`, `teacher_dep`) VALUES
(1, 'riad@gmail.com', '123456', 'Riad Ahmed', 'CSE');

-- --------------------------------------------------------

--
-- Table structure for table `teacher_table`
--

CREATE TABLE IF NOT EXISTS `teacher_table` (
  `exam_id` int(10) NOT NULL,
  `teacher_id` int(10) NOT NULL,
  `teacher_name` varchar(20) NOT NULL,
  `exam_name` varchar(20) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `total_ques` int(10) NOT NULL,
  `mark_per` int(10) NOT NULL,
  `outof` int(10) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `end_time` time NOT NULL,
  `exam_status` int(5) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `teacher_table`
--

INSERT INTO `teacher_table` (`exam_id`, `teacher_id`, `teacher_name`, `exam_name`, `course_code`, `total_ques`, `mark_per`, `outof`, `date`, `time`, `end_time`, `exam_status`) VALUES
(3, 1, 'Riad Ahmed', 'DLD Lab', 'EEE-2318', 3, 1, 3, '2016-12-06', '13:00:00', '13:30:00', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `exam_3`
--
ALTER TABLE `exam_3`
  ADD PRIMARY KEY (`q_id`);

--
-- Indexes for table `std_sign`
--
ALTER TABLE `std_sign`
  ADD PRIMARY KEY (`std_id`);

--
-- Indexes for table `std_table`
--
ALTER TABLE `std_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teacher_sign`
--
ALTER TABLE `teacher_sign`
  ADD PRIMARY KEY (`teacher_id`);

--
-- Indexes for table `teacher_table`
--
ALTER TABLE `teacher_table`
  ADD PRIMARY KEY (`exam_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `exam_3`
--
ALTER TABLE `exam_3`
  MODIFY `q_id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `std_table`
--
ALTER TABLE `std_table`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher_sign`
--
ALTER TABLE `teacher_sign`
  MODIFY `teacher_id` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `teacher_table`
--
ALTER TABLE `teacher_table`
  MODIFY `exam_id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
