-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2018 at 06:35 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ams`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendanceid` int(11) NOT NULL,
  `attendancedate` date NOT NULL,
  `heldclasses` int(20) NOT NULL,
  `attendedclasses` int(25) NOT NULL,
  `studentid` int(21) NOT NULL,
  `subjectid` int(21) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendanceid`, `attendancedate`, `heldclasses`, `attendedclasses`, `studentid`, `subjectid`) VALUES
(1, '2018-04-28', 1, 1, 11, 4),
(2, '2018-04-28', 2, 2, 14, 3);

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `batchid` int(11) NOT NULL,
  `batchtitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`batchid`, `batchtitle`) VALUES
(1, 'PHP'),
(3, 'Tally'),
(6, 'M S Office'),
(7, 'Javascript'),
(8, 'Angular JS'),
(9, 'Node Js'),
(10, 'Mongo DB');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `departmentid` int(11) NOT NULL,
  `departmentname` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`departmentid`, `departmentname`) VALUES
(1, 'Engineering'),
(2, 'Commerce');

-- --------------------------------------------------------

--
-- Table structure for table `program`
--

CREATE TABLE `program` (
  `programid` int(11) NOT NULL,
  `programtitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `program`
--

INSERT INTO `program` (`programid`, `programtitle`) VALUES
(1, 'Basics of JS'),
(2, 'HTML'),
(3, 'HTML 5'),
(4, 'CSS 3'),
(5, 'Accounting Problems'),
(6, 'PHP'),
(7, 'others');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE `semester` (
  `semesterid` int(11) NOT NULL,
  `semestertitle` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`semesterid`, `semestertitle`) VALUES
(1, 'sem-1'),
(2, 'sem-2'),
(3, 'sem-3'),
(4, 'sem-4'),
(5, 'sem-5');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studentid` int(11) NOT NULL,
  `studentname` varchar(250) NOT NULL,
  `studentfathername` varchar(250) NOT NULL,
  `studentrollno` varchar(250) NOT NULL,
  `batchid` int(50) NOT NULL,
  `departmentid` int(50) NOT NULL,
  `programid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studentid`, `studentname`, `studentfathername`, `studentrollno`, `batchid`, `departmentid`, `programid`) VALUES
(12, 'Prajit Chhaya', 'Vallabhbhai', '25', 6, 2, 7),
(13, 'Prashant Tankariya', 'Mukeshbhai', '14', 1, 1, 6),
(14, 'Aman Shah', 'Amitbhai', '45', 7, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subject`
--

CREATE TABLE `subject` (
  `subjectid` int(11) NOT NULL,
  `subjectname` varchar(250) NOT NULL,
  `subjectcode` varchar(250) NOT NULL,
  `departmentid` int(50) NOT NULL,
  `semesterid` int(50) NOT NULL,
  `programid` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subject`
--

INSERT INTO `subject` (`subjectid`, `subjectname`, `subjectcode`, `departmentid`, `semesterid`, `programid`) VALUES
(2, 'Accounting and Finance', 'AF007', 2, 4, 5),
(3, 'Javascript - Properties and Methods', 'JS002', 1, 4, 1),
(4, 'PHP - Fundamentals', 'P887', 1, 4, 6),
(5, 'PHP - OOP', 'P777', 4, 3, 6),
(6, 'NSM', '455', 5, 5, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendanceid`);

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`batchid`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`departmentid`);

--
-- Indexes for table `program`
--
ALTER TABLE `program`
  ADD PRIMARY KEY (`programid`);

--
-- Indexes for table `semester`
--
ALTER TABLE `semester`
  ADD PRIMARY KEY (`semesterid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studentid`);

--
-- Indexes for table `subject`
--
ALTER TABLE `subject`
  ADD PRIMARY KEY (`subjectid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendanceid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `batchid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `departmentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `program`
--
ALTER TABLE `program`
  MODIFY `programid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `semester`
--
ALTER TABLE `semester`
  MODIFY `semesterid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `studentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `subject`
--
ALTER TABLE `subject`
  MODIFY `subjectid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
