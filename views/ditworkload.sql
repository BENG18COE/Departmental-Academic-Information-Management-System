-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 09:13 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ditworkload`
--

-- --------------------------------------------------------

--
-- Table structure for table `acyearsettings`
--

CREATE TABLE `acyearsettings` (
  `id` int(11) NOT NULL,
  `year` varchar(20) NOT NULL,
  `dataentryaccess` text NOT NULL,
  `smster` text NOT NULL,
  `userid` int(11) NOT NULL,
  `yearinit` year(4) NOT NULL,
  `uniquee` int(11) NOT NULL,
  `currentstatus` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `acyearsettings`
--

INSERT INTO `acyearsettings` (`id`, `year`, `dataentryaccess`, `smster`, `userid`, `yearinit`, `uniquee`, `currentstatus`) VALUES
(1, '2019/2020', 'Not Allow', 'Semester 1', 0, 2020, 201, 0),
(2, '2019/2020', 'Allow', 'Semester 2', 0, 2020, 202, 1);

-- --------------------------------------------------------

--
-- Table structure for table `assignmodules`
--

CREATE TABLE `assignmodules` (
  `id` int(11) NOT NULL,
  `departid` int(11) NOT NULL,
  `classid` int(11) NOT NULL,
  `moduleid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `hrstght` int(11) NOT NULL,
  `acyear` varchar(11) NOT NULL,
  `sems` text NOT NULL,
  `idunique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assignmodules`
--

INSERT INTO `assignmodules` (`id`, `departid`, `classid`, `moduleid`, `teacherid`, `hrstght`, `acyear`, `sems`, `idunique`) VALUES
(1, 1, 1, 1, 15, 120, '2019/2020', 'Semester 2', 202);

-- --------------------------------------------------------

--
-- Table structure for table `cashregistrdate`
--

CREATE TABLE `cashregistrdate` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `dateselected` date NOT NULL,
  `branchid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `classlist`
--

CREATE TABLE `classlist` (
  `id` int(11) NOT NULL,
  `classtype` text NOT NULL,
  `totalsdnts` int(11) NOT NULL,
  `yearof` int(11) NOT NULL,
  `coarse` int(11) NOT NULL,
  `stream` text NOT NULL,
  `departid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `classlist`
--

INSERT INTO `classlist` (`id`, `classtype`, `totalsdnts`, `yearof`, `coarse`, `stream`, `departid`) VALUES
(1, 'OD', 50, 19, 1, '1', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coarses`
--

CREATE TABLE `coarses` (
  `id` int(11) NOT NULL,
  `crsshrstfrm` text NOT NULL,
  `departid` int(11) NOT NULL,
  `crsename` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coarses`
--

INSERT INTO `coarses` (`id`, `crsshrstfrm`, `departid`, `crsename`) VALUES
(1, 'COE', 1, 'COMPUTER ENGINEERING');

-- --------------------------------------------------------

--
-- Table structure for table `departs`
--

CREATE TABLE `departs` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `shortform` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departs`
--

INSERT INTO `departs` (`id`, `name`, `shortform`) VALUES
(1, 'Computer Department', 'COE'),
(2, 'Civil Department', 'CE');

-- --------------------------------------------------------

--
-- Table structure for table `examsetdetials`
--

CREATE TABLE `examsetdetials` (
  `id` int(11) NOT NULL,
  `departid` int(11) NOT NULL,
  `odpay` int(11) NOT NULL,
  `bengpay` int(11) NOT NULL,
  `sems` text NOT NULL,
  `semyear` text NOT NULL,
  `acyear` text NOT NULL,
  `teacherid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examsetdetials`
--

INSERT INTO `examsetdetials` (`id`, `departid`, `odpay`, `bengpay`, `sems`, `semyear`, `acyear`, `teacherid`) VALUES
(1, 1, 1, 0, 'Semester 2', '202', '2019/2020', 15);

-- --------------------------------------------------------

--
-- Table structure for table `examsettings`
--

CREATE TABLE `examsettings` (
  `id` int(11) NOT NULL,
  `semyear` text NOT NULL,
  `sems` text NOT NULL,
  `acyear` text NOT NULL,
  `departid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `moduleid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `examsettings`
--

INSERT INTO `examsettings` (`id`, `semyear`, `sems`, `acyear`, `departid`, `teacherid`, `moduleid`) VALUES
(1, '202', 'Semester 2', '2019/2020', 1, 15, 1);

-- --------------------------------------------------------

--
-- Table structure for table `extrahours`
--

CREATE TABLE `extrahours` (
  `id` int(11) NOT NULL,
  `departid` int(11) NOT NULL,
  `hrstght` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL,
  `sems` text NOT NULL,
  `acyear` varchar(10) NOT NULL,
  `idunique` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `extrahours`
--

INSERT INTO `extrahours` (`id`, `departid`, `hrstght`, `teacherid`, `sems`, `acyear`, `idunique`) VALUES
(1, 1, 120, 15, 'Semester 2', '2019/2020', 202);

-- --------------------------------------------------------

--
-- Table structure for table `iptbooksmarking`
--

CREATE TABLE `iptbooksmarking` (
  `id` int(11) NOT NULL,
  `nostudents` int(11) NOT NULL,
  `semyear` text NOT NULL,
  `sems` text NOT NULL,
  `acyear` text NOT NULL,
  `departid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `iptbooksmarking`
--

INSERT INTO `iptbooksmarking` (`id`, `nostudents`, `semyear`, `sems`, `acyear`, `departid`, `teacherid`) VALUES
(1, 10, '202', 'Semester 2', '2019/2020', 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `code` varchar(100) NOT NULL,
  `smster` text NOT NULL,
  `departid` int(11) NOT NULL,
  `hrstght` int(11) NOT NULL,
  `classtype` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `code`, `smster`, `departid`, `hrstght`, `classtype`) VALUES
(1, 'BASIC OF PROGRAMING', 'CSET 601', 'Semester 1', 1, 120, 'OD');

-- --------------------------------------------------------

--
-- Table structure for table `pricelist`
--

CREATE TABLE `pricelist` (
  `id` int(11) NOT NULL,
  `ipt` float NOT NULL,
  `stdnt` float NOT NULL,
  `prjtbks` float NOT NULL,
  `hod` float NOT NULL,
  `scripmark` float NOT NULL,
  `xtrhrs` float NOT NULL,
  `bengexamset` double NOT NULL,
  `odexamset` double NOT NULL,
  `prjcor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pricelist`
--

INSERT INTO `pricelist` (`id`, `ipt`, `stdnt`, `prjtbks`, `hod`, `scripmark`, `xtrhrs`, `bengexamset`, `odexamset`, `prjcor`) VALUES
(1, 5000, 5000, 10000, 80000, 1500, 10000, 40000, 20000, 60000);

-- --------------------------------------------------------

--
-- Table structure for table `prjctbooksmarking`
--

CREATE TABLE `prjctbooksmarking` (
  `id` int(11) NOT NULL,
  `nostudents` int(11) NOT NULL,
  `semyear` text NOT NULL,
  `sems` text NOT NULL,
  `acyear` text NOT NULL,
  `departid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `prjctsprsion`
--

CREATE TABLE `prjctsprsion` (
  `id` int(11) NOT NULL,
  `nostudents` int(11) NOT NULL,
  `semyear` text NOT NULL,
  `sems` text NOT NULL,
  `acyear` text NOT NULL,
  `departid` int(11) NOT NULL,
  `teacherid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prjctsprsion`
--

INSERT INTO `prjctsprsion` (`id`, `nostudents`, `semyear`, `sems`, `acyear`, `departid`, `teacherid`) VALUES
(1, 10, '202', 'Semester 2', '2019/2020', 1, 18);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `username` text NOT NULL,
  `othername` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` text NOT NULL,
  `rank` text NOT NULL,
  `departid` int(11) NOT NULL,
  `datecreated` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `othername`, `password`, `role`, `rank`, `departid`, `datecreated`) VALUES
(2, 'edson ', 'mubezi', 'Mubezi Dominic', '$2a$07$asxx54ahjppf45sd87a5auW9AgON5cKgbYdWnikcNSbi3TVUNPLUe', 'System Adminstrator', 'Technician', 0, '2020-08-08 22:21:07'),
(14, 'Ian', 'Ian', 'Ian Blair', '$2a$07$asxx54ahjppf45sd87a5auUmJPgLCEqab/QEAWAJvzYSk5fRcStfq', 'Accounts Office', 'Tutorial Assistant', 0, '2020-08-26 05:53:26'),
(15, 'edson', 'edson', 'Mubezi Dominic', '$2a$07$asxx54ahjppf45sd87a5auqueK/WIgHFO9d7WJdquXqZwPBD8.1NO', 'Timetable Coordinator', 'Assistant Lecturer', 1, '2020-09-15 11:21:41'),
(16, 'loti', 'loti', 'loti', '$2a$07$asxx54ahjppf45sd87a5auXFr7zQpgsPT3STqyFNW5Q5H4AHmkkXq', 'Exam Coordinator', 'Senior Instructor', 1, '2020-09-15 14:32:29'),
(17, 'diana', 'diana', 'diana', '$2a$07$asxx54ahjppf45sd87a5auEguoqX2JePv/2zDeAKXyhud8GFyD/SW', 'IPT Coordinator', 'Senior Instructor', 1, '2020-09-15 14:47:42'),
(18, 'juma', 'juma', 'juma', '$2a$07$asxx54ahjppf45sd87a5auz757irpec77YrPIlYxjmbj8UC2SL3CG', 'Project Coordinator', 'Senior Instructor', 1, '2020-09-15 14:50:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `acyearsettings`
--
ALTER TABLE `acyearsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assignmodules`
--
ALTER TABLE `assignmodules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cashregistrdate`
--
ALTER TABLE `cashregistrdate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classlist`
--
ALTER TABLE `classlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `coarses`
--
ALTER TABLE `coarses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `departs`
--
ALTER TABLE `departs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examsetdetials`
--
ALTER TABLE `examsetdetials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `examsettings`
--
ALTER TABLE `examsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `extrahours`
--
ALTER TABLE `extrahours`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `iptbooksmarking`
--
ALTER TABLE `iptbooksmarking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pricelist`
--
ALTER TABLE `pricelist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prjctbooksmarking`
--
ALTER TABLE `prjctbooksmarking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prjctsprsion`
--
ALTER TABLE `prjctsprsion`
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
-- AUTO_INCREMENT for table `acyearsettings`
--
ALTER TABLE `acyearsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `assignmodules`
--
ALTER TABLE `assignmodules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cashregistrdate`
--
ALTER TABLE `cashregistrdate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `classlist`
--
ALTER TABLE `classlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `coarses`
--
ALTER TABLE `coarses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `departs`
--
ALTER TABLE `departs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `examsetdetials`
--
ALTER TABLE `examsetdetials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `examsettings`
--
ALTER TABLE `examsettings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `extrahours`
--
ALTER TABLE `extrahours`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `iptbooksmarking`
--
ALTER TABLE `iptbooksmarking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `pricelist`
--
ALTER TABLE `pricelist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `prjctbooksmarking`
--
ALTER TABLE `prjctbooksmarking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `prjctsprsion`
--
ALTER TABLE `prjctsprsion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
