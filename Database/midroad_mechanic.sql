-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2021 at 07:47 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `midroad_mechanic`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(30) NOT NULL,
  `admin_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_password`) VALUES
(1, 'Bala', 'bala'),
(2, 'Azar', 'azar'),
(3, 'Pragash', 'pragash');

-- --------------------------------------------------------

--
-- Table structure for table `assuredmechanic`
--

CREATE TABLE `assuredmechanic` (
  `mechanic_id` int(11) NOT NULL,
  `business_name` varchar(30) NOT NULL,
  `business_id` int(11) NOT NULL,
  `mechanic_name` varchar(30) NOT NULL,
  `services` varchar(30) NOT NULL,
  `available` varchar(30) NOT NULL,
  `number` bigint(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `experience` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `assuredmechanic`
--

INSERT INTO `assuredmechanic` (`mechanic_id`, `business_name`, `business_id`, `mechanic_name`, `services`, `available`, `number`, `city`, `latitude`, `longitude`, `experience`, `status`) VALUES
(1, 'Royal Mechs', 1, 'ravi', 'all 2 wheeler and cars', 'all days 24/7', 994107255, 'Theni', '10.00410652', '77.50482113', '25 years', 1),
(2, 'Royal Mechs', 1, 'kumar', 'all 4 wheelers', 'weekdays 24/7', 9985476321, 'Theni', '10.00334848', '77.50563302', '20 years', 1),
(3, 'Rich Mech', 2, 'velu', 'all 2 wheelers', 'weekdays 24/7', 8064752131, 'Madurai', '9.93573678', '78.07525647', '30 years', 1),
(4, 'Rich Mech', 2, 'muruga', 'all vechicles', 'all days 24/7', 8845123650, 'Madurai', '9.93335590', '78.08515043', '20 years', 1),
(5, 'Rich Mech', 2, 'kiruba', 'all 4 wheelers', 'weekends 24/7', 8845632175, 'Madurai', '9.93270773', '78.08489546', '15 years', 1),
(6, 'Great Mech', 3, 'raja', 'all vehicles', 'all days 24/7', 9874568543, 'Madurai', '9.95821302', '77.82445845', '10 years', 1);

-- --------------------------------------------------------

--
-- Table structure for table `business`
--

CREATE TABLE `business` (
  `business_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mail_id` varchar(40) NOT NULL,
  `number` bigint(10) NOT NULL,
  `city` varchar(30) NOT NULL,
  `location` varchar(80) NOT NULL,
  `idproof` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `business`
--

INSERT INTO `business` (`business_id`, `name`, `password`, `mail_id`, `number`, `city`, `location`, `idproof`) VALUES
(1, 'Royal Mechs', 'royalmechs', 'royalmechs@gmail.com', 9998745632, 'Theni', 'Theni', '123456785'),
(2, 'Rich Mech', 'richmech', 'richmech@gmail.com', 9997845632, 'Madurai', 'kalavaasal', '123458521'),
(3, 'Great Mech', 'greatmech', 'greatmech@gmail.com', 9997845633, 'Madurai', 'usilampatti', '123458522');

-- --------------------------------------------------------

--
-- Table structure for table `confirmedcust`
--

CREATE TABLE `confirmedcust` (
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `vehicletype` varchar(30) NOT NULL,
  `acc_rej` tinyint(1) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `feedback_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `message` varchar(120) NOT NULL,
  `mail_id` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`feedback_id`, `business_id`, `mechanic_id`, `user_id`, `name`, `message`, `mail_id`) VALUES
(1, 1, 2, 1, 'Bala', 'good service\r\nOn time', 'bala@gmail.com'),
(2, 1, 2, 2, 'azar', 'service is good \r\n', 'azar@gmail.com'),
(3, 2, 3, 3, 'Sankar', 'very good service\r\n', 'sankar@gmail.com'),
(4, 2, 4, 4, 'Pragash', 'good  service\r\nrate 4.5 out of 5\r\n', 'pragash@gmail.com'),
(5, 2, 5, 7, 'kumar', 'on time service and good\r\n\r\n', 'kumar@gmail.com'),
(6, 1, 2, 1, 'Bala', 'Service is good can rate 5 out of 4\r\nand\r\nmechanic is on time ', 'bala@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `mechanic`
--

CREATE TABLE `mechanic` (
  `mechanic_id` int(11) NOT NULL,
  `business_name` varchar(30) NOT NULL,
  `business_id` int(11) NOT NULL,
  `mechanic_name` varchar(30) NOT NULL,
  `services` varchar(30) NOT NULL,
  `available` varchar(30) NOT NULL,
  `number` bigint(20) NOT NULL,
  `city` varchar(30) NOT NULL,
  `latitude` decimal(10,8) NOT NULL,
  `longitude` decimal(11,8) NOT NULL,
  `experience` varchar(30) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `business_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `Name`, `user_id`, `mechanic_id`, `business_id`, `amount`) VALUES
(1, 'Bala', 1, 2, 1, 800),
(2, 'Azar', 2, 2, 1, 600),
(3, 'Sankar', 3, 3, 2, 400),
(4, 'Prakash', 4, 4, 2, 1000),
(5, 'kumar', 7, 5, 2, 800),
(6, 'Bala', 1, 2, 1, 600);

-- --------------------------------------------------------

--
-- Table structure for table `userlocation`
--

CREATE TABLE `userlocation` (
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `user_id` int(11) NOT NULL,
  `mechanic_id` int(11) NOT NULL,
  `vehicletype` varchar(30) NOT NULL,
  `acc_rej` tinyint(1) NOT NULL DEFAULT 0,
  `amount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `user_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL,
  `mail_id` varchar(40) NOT NULL,
  `number` bigint(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`user_id`, `name`, `password`, `mail_id`, `number`) VALUES
(1, 'Bala', 'bala', 'bala@gmail.com', 9940972789),
(2, 'Azar', 'azar', 'azar@gmail.com', 8045263542),
(3, 'Sankar', 'sankar', 'sankar@gmail.com', 8877465324),
(4, 'Pragash', 'pragash', 'pragash@gmail.com', 3562145678),
(7, 'kumar', 'kumar', 'kumar@gmail.com', 8054652531),
(8, 'ganesh', 'ganesh', 'ganesh@gmail.com', 5214789652),
(9, 'prasad', 'prasad', 'prasad@gmail.com', 9975481254),
(10, 'sri', 'sri', 'sri@gmail.com', 9975481250),
(11, 'ram', 'ram', 'ram@gmail.com', 9975481252),
(12, 'kani', 'kani', 'kani@gmail.com', 9975481253),
(13, 'kapoor', 'kapoor', 'kapoor@gmail.com', 9975481255),
(14, 'kathir', 'kathir', 'kathir@gmail.com', 9975481256),
(15, 'velan', 'velan', 'velan@gmail.com', 9975481257),
(16, 'hari', 'hari', 'hari@gmail.com', 9975481258),
(17, 'karan', 'karan', 'karan@gmail.com', 9975481259),
(18, 'rajan', 'rajan', 'rajan@gmail.com', 9975481260);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `assuredmechanic`
--
ALTER TABLE `assuredmechanic`
  ADD PRIMARY KEY (`mechanic_id`),
  ADD UNIQUE KEY `num` (`number`),
  ADD KEY `businesid` (`business_id`);

--
-- Indexes for table `business`
--
ALTER TABLE `business`
  ADD PRIMARY KEY (`business_id`),
  ADD UNIQUE KEY `mail` (`mail_id`),
  ADD UNIQUE KEY `num` (`number`),
  ADD UNIQUE KEY `idproof` (`idproof`);

--
-- Indexes for table `confirmedcust`
--
ALTER TABLE `confirmedcust`
  ADD KEY `userrela` (`user_id`),
  ADD KEY `mechrela` (`mechanic_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`feedback_id`);

--
-- Indexes for table `mechanic`
--
ALTER TABLE `mechanic`
  ADD PRIMARY KEY (`mechanic_id`),
  ADD UNIQUE KEY `num` (`number`),
  ADD KEY `businessid` (`business_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `userlocation`
--
ALTER TABLE `userlocation`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD KEY `userrela` (`user_id`),
  ADD KEY `mechrela` (`mechanic_id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `mail` (`mail_id`),
  ADD UNIQUE KEY `num` (`number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `assuredmechanic`
--
ALTER TABLE `assuredmechanic`
  MODIFY `mechanic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `business`
--
ALTER TABLE `business`
  MODIFY `business_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `feedback_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `mechanic`
--
ALTER TABLE `mechanic`
  MODIFY `mechanic_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assuredmechanic`
--
ALTER TABLE `assuredmechanic`
  ADD CONSTRAINT `businesid` FOREIGN KEY (`business_id`) REFERENCES `business` (`business_id`);

--
-- Constraints for table `mechanic`
--
ALTER TABLE `mechanic`
  ADD CONSTRAINT `businessid` FOREIGN KEY (`business_id`) REFERENCES `business` (`business_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
