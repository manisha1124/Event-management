-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2020 at 04:30 PM
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
(4, 'Art event', 'Art exhibition and competition organised by viscom', 'art.jpg');

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
('cultural event', '2025-12-15', '16:00:00', 4, 'Gallery', 'CSE', 'approved', 'Cultural fest organised by the department of computer science  '),
('Art event', '2025-12-26', '10:00:00', 7, 'Gallery', 'Viscom', 'approved', 'Art exhibition and competition organised by viscom department. All the students are invited to participate');

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
(10, 'Art event', 'DSC04401.jpg', ''),
(11, 'Art event', 'art.jpg', ''),
(12, 'Art event', 'art_exhi.jpg', ''),
(13, 'Art event', 'images.jpg', '');

-- --------------------------------------------------------

--
-- Table structure for table `poster`
--

CREATE TABLE `poster` (
  `eventname` varchar(100) NOT NULL,
  `imagetmp` varchar(50) NOT NULL,
  `image` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `poster`
--

INSERT INTO `poster` (`eventname`, `imagetmp`, `image`) VALUES
('Art event', 'C:xampp	mpphp826F.tmp', 'art.jpg'),
('cultural event', 'C:xampp	mpphp4DA7.tmp', 'cul.jpg');

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
  MODIFY `aid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `iid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `userdetails`
--
ALTER TABLE `userdetails`
  MODIFY `uid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
