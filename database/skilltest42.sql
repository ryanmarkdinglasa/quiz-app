-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2023 at 07:18 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skilltest42`
--

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `queID` int(11) NOT NULL,
  `queMain` text NOT NULL,
  `queOpt1` text NOT NULL,
  `queOpt2` text NOT NULL,
  `queOpt3` text NOT NULL,
  `queOpt4` text NOT NULL,
  `queAns` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`queID`, `queMain`, `queOpt1`, `queOpt2`, `queOpt3`, `queOpt4`, `queAns`) VALUES
(3, 'Which of the following is primary storage?', 'A. RAM', 'B. USB drive', 'C. CD', 'D. external hard drive', 'D'),
(4, 'Your release of information system has part of the computing on the workstation and part on the file server. What type of technology is being used?', 'A. Internet', 'B. client server', 'C. LAN', 'D. operating system', 'B'),
(5, 'What controls the traffic on the Internet?', 'A. the World Wide Web', 'B. Internet protocol', 'C. the ISDN', 'D. domain names', 'B'),
(6, 'The data on the hard drive were erased by a corrupted file that had been attached to an e-mail message. Which software would be used to prevent this?', 'A. productivity', 'B. utility', 'C. virus checker', 'D. encryption', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `studID` int(11) NOT NULL,
  `studFName` text NOT NULL,
  `studMName` text NOT NULL,
  `studLName` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`studID`, `studFName`, `studMName`, `studLName`) VALUES
(1992, 'Jeybie', 'D', 'Harville'),
(14589, 'Kerry Ann', 'M', 'Daroy'),
(122345, 'Rolie Mae', 'C', 'Getubig'),
(19925775, 'Mark', 'Dinglasa', 'Manos'),
(2147483647, 'Jaylord', 'Bacalso', 'Campo');

-- --------------------------------------------------------

--
-- Table structure for table `studentaker`
--

CREATE TABLE `studentaker` (
  `stanID` int(11) NOT NULL,
  `studID` int(11) NOT NULL,
  `queID` int(11) NOT NULL,
  `studAns` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentaker`
--

INSERT INTO `studentaker` (`stanID`, `studID`, `queID`, `studAns`) VALUES
(17, 19925775, 6, 'c'),
(18, 19925775, 3, 'd'),
(19, 19925775, 5, 'b'),
(20, 14589, 5, 'B'),
(21, 14589, 4, 'C'),
(22, 14589, 6, 'D'),
(23, 14589, 3, 'C');

-- --------------------------------------------------------

--
-- Table structure for table `studentexam`
--

CREATE TABLE `studentexam` (
  `studID` int(11) NOT NULL,
  `started` datetime NOT NULL,
  `finished` datetime DEFAULT NULL,
  `score` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `studentexam`
--

INSERT INTO `studentexam` (`studID`, `started`, `finished`, `score`) VALUES
(14589, '2023-05-22 18:40:06', '2023-05-22 18:42:06', 1),
(19925775, '2023-05-22 18:27:06', '2023-05-22 18:33:32', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`queID`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`studID`);

--
-- Indexes for table `studentaker`
--
ALTER TABLE `studentaker`
  ADD PRIMARY KEY (`stanID`),
  ADD KEY `studID` (`studID`),
  ADD KEY `queID` (`queID`);

--
-- Indexes for table `studentexam`
--
ALTER TABLE `studentexam`
  ADD PRIMARY KEY (`studID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `queID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `studentaker`
--
ALTER TABLE `studentaker`
  MODIFY `stanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
