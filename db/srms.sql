-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 17, 2018 at 10:25 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `srms`
--

-- --------------------------------------------------------

--
-- Table structure for table `studentaccountCombination`
--

CREATE TABLE `studentaccountCombination` (
  `studentID` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `studentaccountCombination`
--

INSERT INTO `studentaccountCombination` (`studentID`, `id`) VALUES
(1, 5),
(2, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tblclasses`
--

CREATE TABLE `tblclasses` (
  `id` int(11) NOT NULL,
  `ClassName` varchar(80) DEFAULT NULL,
  `ClassNameNumeric` int(4) NOT NULL,
  `Section` varchar(5) NOT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblclasses`
--

INSERT INTO `tblclasses` (`id`, `ClassName`, `ClassNameNumeric`, `Section`, `CreationDate`, `UpdationDate`) VALUES
(1, 'First Semester', 1, 'A', '2018-04-02 17:52:28', '2018-04-02 18:16:17'),
(2, 'Second Semester', 2, 'A', '2018-04-02 17:52:59', '2018-04-02 18:16:30'),
(3, 'Third Semester', 3, 'A', '2018-04-02 17:53:35', '2018-04-02 18:16:46'),
(4, 'Fourth Semester', 4, 'A', '2018-04-02 17:53:49', '2018-04-02 18:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `tblresult`
--

CREATE TABLE `tblresult` (
  `id` int(11) NOT NULL,
  `StudentId` int(11) DEFAULT NULL,
  `ClassId` int(11) DEFAULT NULL,
  `SubjectId` int(11) DEFAULT NULL,
  `marks` int(11) DEFAULT NULL,
  `PostingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblresult`
--

INSERT INTO `tblresult` (`id`, `StudentId`, `ClassId`, `SubjectId`, `marks`, `PostingDate`, `UpdationDate`) VALUES
(1, 2, 1, 1, 99, '2018-04-02 18:28:31', '2018-04-21 12:56:57'),
(2, 2, 1, 2, 80, '2018-04-02 18:28:31', NULL),
(3, 1, 1, 1, 90, '2018-04-02 18:28:45', NULL),
(4, 1, 1, 2, 90, '2018-04-02 18:28:45', NULL),
(5, 3, 1, 1, 100, '2018-04-02 18:29:23', NULL),
(6, 3, 1, 2, 90, '2018-04-02 18:29:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblstudents`
--

CREATE TABLE `tblstudents` (
  `StudentId` int(11) NOT NULL,
  `StudentName` varchar(100) NOT NULL,
  `RollId` varchar(100) NOT NULL,
  `StudentEmail` varchar(100) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `DOB` varchar(100) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `RegDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `Status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblstudents`
--

INSERT INTO `tblstudents` (`StudentId`, `StudentName`, `RollId`, `StudentEmail`, `Gender`, `DOB`, `ClassId`, `RegDate`, `UpdationDate`, `Status`) VALUES
(1, 'Ephrem', '1', 'fstudioceh@gmail.com', 'Male', '1997-04-26', 1, '2018-04-02 17:55:41', NULL, 1),
(2, 'Abeni', '2', 'abeni@gmail.com', 'Male', '1994-04-21', 1, '2018-04-02 17:56:26', NULL, 1),
(3, 'Laura', '3', 'laura@gmail.com', 'Male', '1993-05-22', 1, '2018-04-02 18:22:20', NULL, 1),
(4, 'Annar', '4', 'annar@email.com', 'Male', '1997-03-11', 2, '2018-04-02 18:23:17', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjectcombination`
--

CREATE TABLE `tblsubjectcombination` (
  `id` int(11) NOT NULL,
  `ClassId` int(11) NOT NULL,
  `SubjectId` int(11) NOT NULL,
  `status` int(1) DEFAULT NULL,
  `CreationDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Updationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjectcombination`
--

INSERT INTO `tblsubjectcombination` (`id`, `ClassId`, `SubjectId`, `status`, `CreationDate`, `Updationdate`) VALUES
(1, 1, 1, 1, '2018-04-02 18:15:39', '2018-04-02 18:15:39'),
(2, 1, 2, 1, '2018-04-02 18:15:45', '2018-04-02 18:15:45'),
(3, 2, 3, 1, '2018-04-02 18:18:27', '2018-04-02 18:18:27'),
(4, 3, 6, 1, '2018-04-02 18:18:41', '2018-04-02 18:18:41'),
(5, 3, 5, 1, '2018-04-02 18:18:48', '2018-04-02 18:18:48'),
(6, 4, 7, 1, '2018-04-02 18:18:53', '2018-04-02 18:18:53'),
(7, 4, 8, 1, '2018-04-02 18:18:58', '2018-04-02 18:18:58'),
(8, 2, 3, 0, '2018-04-02 18:19:47', '2018-04-02 18:19:47'),
(9, 2, 4, 1, '2018-04-02 18:21:23', '2018-04-02 18:21:23');

-- --------------------------------------------------------

--
-- Table structure for table `tblsubjects`
--

CREATE TABLE `tblsubjects` (
  `id` int(11) NOT NULL,
  `SubjectName` varchar(100) NOT NULL,
  `SubjectCode` varchar(100) NOT NULL,
  `Creationdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UpdationDate` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00' ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblsubjects`
--

INSERT INTO `tblsubjects` (`id`, `SubjectName`, `SubjectCode`, `Creationdate`, `UpdationDate`) VALUES
(1, 'Introduction to Programming', 'ITX001', '2018-04-02 17:58:12', '0000-00-00 00:00:00'),
(2, 'Network Technology 1', 'ITX002', '2018-04-02 17:58:41', '0000-00-00 00:00:00'),
(3, 'Network Technology 2', 'ITX003', '2018-04-02 17:58:53', '0000-00-00 00:00:00'),
(4, 'Network Forensic', 'ITX004', '2018-04-02 17:59:16', '0000-00-00 00:00:00'),
(5, 'Network Protocol Design', 'ITX005', '2018-04-02 17:59:31', '0000-00-00 00:00:00'),
(6, 'Web Application Security', 'ITX006', '2018-04-02 18:00:32', '0000-00-00 00:00:00'),
(7, 'Malware 1', 'ITX007', '2018-04-02 18:00:44', '0000-00-00 00:00:00'),
(8, 'Malware 2', 'ITX007', '2018-04-02 18:00:54', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(4, 'admin', 'admin', 'admin'),
(5, 'student', 'student', 'student'),
(6, 'teacher', 'teacher', 'teacher'),
(7, 'student2', 'student2', 'student');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `studentaccountCombination`
--
ALTER TABLE `studentaccountCombination`
  ADD KEY `fk_accId` (`studentID`),
  ADD KEY `fk_id` (`id`);

--
-- Indexes for table `tblclasses`
--
ALTER TABLE `tblclasses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblresult`
--
ALTER TABLE `tblresult`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstudents`
--
ALTER TABLE `tblstudents`
  ADD PRIMARY KEY (`StudentId`);

--
-- Indexes for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblclasses`
--
ALTER TABLE `tblclasses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblresult`
--
ALTER TABLE `tblresult`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tblstudents`
--
ALTER TABLE `tblstudents`
  MODIFY `StudentId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tblsubjectcombination`
--
ALTER TABLE `tblsubjectcombination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tblsubjects`
--
ALTER TABLE `tblsubjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `studentaccountCombination`
--
ALTER TABLE `studentaccountCombination`
  ADD CONSTRAINT `studentaccountCombination_ibfk_1` FOREIGN KEY (`studentID`) REFERENCES `tblstudents` (`StudentId`),
  ADD CONSTRAINT `studentaccountCombination_ibfk_2` FOREIGN KEY (`id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
