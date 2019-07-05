-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 05, 2019 at 11:15 AM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `evnto`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

CREATE TABLE `album` (
  `aid` int(5) NOT NULL,
  `albumname` varchar(20) DEFAULT NULL,
  `adesc` longtext NOT NULL,
  `cover` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`aid`, `albumname`, `adesc`, `cover`) VALUES
(1, 'Mindkraft', 'Technical event to showcase new inventions', 'mindkraftlogo.png'),
(2, 'Evogen', 'Project Exhibition', 'evo.png');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `eventname` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `duration` int(3) NOT NULL,
  `venue` varchar(20) NOT NULL,
  `dept` varchar(7) NOT NULL,
  `status` varchar(10) NOT NULL,
  `description` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`eventname`, `date`, `time`, `duration`, `venue`, `dept`, `status`, `description`) VALUES
('Mindkraft', '2019-07-19', '09:00:00', 8, 'DGS', 'CSE', 'approved', 'Technical event to showcase inventions'),
('Evogen', '2019-07-18', '15:00:00', 3, 'Gallery', 'Bioinfo', 'approved', 'National Level Symposium'),
('Techogen', '2019-07-26', '09:00:00', 8, 'DGS', 'ECE', 'pending', 'Project Exhibition');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `iid` int(10) NOT NULL,
  `albumname` varchar(20) NOT NULL,
  `imgtitle` longtext,
  `uniquetitle` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`iid`, `albumname`, `imgtitle`, `uniquetitle`) VALUES
(1, 'Mindkraft', '1510836203phpPKipW7.jpeg', ''),
(2, 'Mindkraft', 'bcb98f9c26a.jpg', ''),
(3, 'Mindkraft', 'mindkraftlogo.png', ''),
(4, 'Evogen', '3E5A7721.jpg', ''),
(5, 'Evogen', 'DSC_0687.jpg', ''),
(6, 'Evogen', 'evo.png', '');

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `eventname` varchar(10) NOT NULL,
  `imagetmp` varchar(50) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`eventname`, `imagetmp`, `image`) VALUES
('Mindkraft', 'C:xampp	mpphp5D12.tmp', 'mindkraftlogo.png'),
('Evogen', 'C:xampp	mpphp8F83.tmp', 'evo.png');

-- --------------------------------------------------------

--
-- Table structure for table `userdetails`
--

CREATE TABLE `userdetails` (
  `uid` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL,
  `dept` varchar(7) NOT NULL,
  `regnum` varchar(10) NOT NULL,
  `type` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='details of the users are stored in this tab';

--
-- Dumping data for table `userdetails`
--

INSERT INTO `userdetails` (`uid`, `name`, `username`, `email`, `phone`, `password`, `dept`, `regnum`, `type`) VALUES
(1, 'xyz', 'xyz', 'xyz@ymail.com', '999999999', 'xyz', '', '', 'admin'),
(3, 'jeny', 'jen', 'jen@gmail.com', '9999999999', 'jen', 'CSE', 'UR16CS001', 'normal');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`iid`);

--
-- Indexes for table `userdetails`
--
ALTER TABLE `userdetails`
  ADD PRIMARY KEY (`uid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album`
--
ALTER TABLE `album`
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `iid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
