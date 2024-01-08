-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 10, 2023 at 11:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testwebdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `ac_berth`
--

CREATE TABLE `ac_berth` (
  `train_name` varchar(100) NOT NULL,
  `seat_remaining` int(11) NOT NULL,
  `departure_time` varchar(20) NOT NULL,
  `arival_time` varchar(20) NOT NULL,
  `r_departure_time` varchar(20) NOT NULL,
  `r_arival_time` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ac_berth`
--

INSERT INTO `ac_berth` (`train_name`, `seat_remaining`, `departure_time`, `arival_time`, `r_departure_time`, `r_arival_time`, `price`) VALUES
('Chitra Express', 40, '7:00 pm', '3:40 am', '9:00 am', '6:00 pm', 350),
('Joyentika Express', 40, '11:30 am', '5:00 pm', '7:00 pm', '3:00 am', 350),
('Lalmoni Express', 40, '9:45 pm', '7:30 am', '10:00 am', '7:40 pm', 350),
('Sonar bangla express', 40, '7:00 am', '12:00 pm', '4:30 pm', '10:00 pm', 350),
('t1', 39, '2023-11-22 07:32:45', '2023-11-22 07:32:45', '', '', 400),
('Tista Express', 40, '7:30 am', '12:40 pm', '3:00 pm', '8:25 pm', 350);

-- --------------------------------------------------------

--
-- Table structure for table `ac_chair`
--

CREATE TABLE `ac_chair` (
  `train_name` varchar(100) NOT NULL,
  `seat_remaining` int(11) NOT NULL,
  `departure_time` varchar(20) NOT NULL,
  `arival_time` varchar(20) NOT NULL,
  `r_departure_time` varchar(20) NOT NULL,
  `r_arival_time` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ac_chair`
--

INSERT INTO `ac_chair` (`train_name`, `seat_remaining`, `departure_time`, `arival_time`, `r_departure_time`, `r_arival_time`, `price`) VALUES
('Chitra Express', 40, '7:00 pm', '3:40 am', '9:00 am', '6:00 pm', 300),
('Joyentika Express', 40, '11:30 am', '5:00 pm', '7:00 pm', '3:00 am', 300),
('Lalmoni Express', 40, '9:45 pm', '7:30 am', '10:00 am', '7:40 pm', 300),
('Sonar bangla express', 40, '7:00 am', '12:00 pm', '4:30 pm', '10:00 pm', 300),
('Tista Express', 40, '7:30 am', '12:40 pm', '3:00 pm', '8:25 pm', 300);

-- --------------------------------------------------------

--
-- Table structure for table `available`
--

CREATE TABLE `available` (
  `route` varchar(10) NOT NULL,
  `train_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `available`
--

INSERT INTO `available` (`route`, `train_name`) VALUES
('dc', 'Sonar bangla express'),
('dde', 'Tista Express'),
('dk', 'Chitra Express'),
('dl', 'Lalmoni Express'),
('ds', 'Joyentika Express');

-- --------------------------------------------------------

--
-- Table structure for table `calculate`
--

CREATE TABLE `calculate` (
  `train_name` varchar(100) NOT NULL,
  `route` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `calculate`
--

INSERT INTO `calculate` (`train_name`, `route`) VALUES
('Chitra Express', 'dk'),
('Joyentika Express', 'ds'),
('Lalmoni Express', 'dl'),
('Sonar bangla express', 'dc'),
('Tista Express', 'dde');

-- --------------------------------------------------------

--
-- Table structure for table `claim_reward`
--

CREATE TABLE `claim_reward` (
  `username` varchar(20) NOT NULL,
  `transaction_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `first_class`
--

CREATE TABLE `first_class` (
  `train_name` varchar(100) NOT NULL,
  `seat_remaining` int(11) NOT NULL,
  `departure_time` varchar(20) NOT NULL,
  `arival_time` varchar(20) NOT NULL,
  `r_departure_time` varchar(20) NOT NULL,
  `r_arival_time` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `first_class`
--

INSERT INTO `first_class` (`train_name`, `seat_remaining`, `departure_time`, `arival_time`, `r_departure_time`, `r_arival_time`, `price`) VALUES
('Chitra Express', 40, '7:00 pm', '3:40 am', '9:00 am', '6:00 pm', 550),
('Joyentika Express', 40, '11:30 am', '5:00 pm', '7:00 pm', '3:00 am', 550),
('Lalmoni Express', 40, '9:45 pm', '7:30 am', '10:00 am', '7:40 pm', 550),
('Sonar bangla express', 40, '7:00 am', '12:00 pm', '4:30 pm', '10:00 pm', 550),
('Tista Express', 40, '7:30 am', '12:40 pm', '3:00 pm', '8:25 pm', 550);

-- --------------------------------------------------------

--
-- Table structure for table `modify_pricing`
--

CREATE TABLE `modify_pricing` (
  `username` varchar(20) NOT NULL,
  `route` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `transaction_id` varchar(50) NOT NULL,
  `amount` int(11) DEFAULT NULL,
  `username` varchar(20) DEFAULT NULL,
  `checkout_date` varchar(50) DEFAULT NULL,
  `ticket_serial_num` int(11) NOT NULL,
  `redeem_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `purchase_history`
--

CREATE TABLE `purchase_history` (
  `serial` int(11) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `route` varchar(10) DEFAULT NULL,
  `purchase_date` varchar(40) DEFAULT NULL,
  `tickets_date` varchar(30) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_history`
--

INSERT INTO `purchase_history` (`serial`, `username`, `transaction_id`, `route`, `purchase_date`, `tickets_date`, `quantity`) VALUES
(4, 'user4', 'SSLCZ_TEST_6570ad6ed5828', 'dc', '2023-12-06 23:20:47', '2023-12-07', 0),
(6, 'user4', 'SSLCZ_TEST_6570ada338deb', 'dc', '2023-12-06 23:21:39', '2023-12-07', 0),
(7, 'user4', 'SSLCZ_TEST_6570ada338deb', 'ds', '2023-12-06 23:21:39', '2023-12-07', 0),
(8, 'user4', 'SSLCZ_TEST_6570cf4c653e2', 'dc', '2023-12-07 01:45:16', '2023-12-08', 0),
(9, 'user4', 'SSLCZ_TEST_6570cf4c653e2', 'dc', '2023-12-07 01:45:16', '2023-12-08', 0),
(10, 'user4', 'SSLCZ_TEST_6570d255c9171', 'dc', '2023-12-07 01:58:14', '2023-12-08', 0),
(12, 'user4', 'SSLCZ_TEST_6570d2d1a4eda', 'dc', '2023-12-07 02:00:18', '2023-12-08', 0),
(13, 'user4', 'SSLCZ_TEST_6570d5addc834', 'dc', '2023-12-07 02:12:30', '2023-12-07', 0),
(14, 'user4', 'SSLCZ_TEST_6570d5addc834', 'dc', '2023-12-07 02:12:30', '2023-12-07', 0),
(19, 'user4', 'SSLCZ_TEST_6570de59c28cd', 'dc', '2023-12-07 02:49:30', '2023-12-07', 2),
(29, 'user4', 'SSLCZ_TEST_6570e8453ad69', 'dc', '2023-12-07 03:31:49', '2023-12-08', 2),
(31, 'user4', 'SSLCZ_TEST_6570f4a7c328f', 'dc', '2023-12-07 04:24:40', '2023-12-07', 2),
(32, 'user4', 'SSLCZ_TEST_6570f5bf2d19c', 'dc', '2023-12-07 04:29:19', '2023-12-08', 2),
(33, 'user4', 'SSLCZ_TEST_6570f5e5a7c20', 'dc', '2023-12-07 04:29:57', '2023-12-08', 2),
(34, 'user4', 'SSLCZ_TEST_6570f6193ea0a', 'dc', '2023-12-07 04:30:49', '2023-12-08', 2),
(35, 'user4', 'SSLCZ_TEST_6570f6193ea0a', 'dc', '2023-12-07 04:30:49', '2023-12-08', 1),
(40, 'user4', 'SSLCZ_TEST_6570f722da1f4', 'dc', '2023-12-07 04:35:15', '2023-12-08', 1),
(42, 'user4', 'SSLCZ_TEST_6570f742925b9', 'dc', '2023-12-07 04:35:46', '2023-12-08', 1),
(45, 'user4', 'SSLCZ_TEST_6570f7b809f1c', 'dc', '2023-12-07 04:37:44', '2023-12-08', 2),
(47, 'user4', 'SSLCZ_TEST_6570f8e222380', 'ds', '2023-12-07 04:42:42', '2023-12-08', 2),
(48, 'user4', 'SSLCZ_TEST_6570f8e222380', 'ds', '2023-12-07 04:42:42', '2023-12-08', 2),
(49, 'user4', 'SSLCZ_TEST_6571030d475d1', 'ds', '2023-12-07 05:26:05', '2023-12-08', 3),
(50, 'user4', 'SSLCZ_TEST_6571032de1fe4', 'dc', '2023-12-07 05:26:38', '2023-12-07', 3),
(51, 'user4', 'SSLCZ_TEST_6571032de1fe4', 'dc', '2023-12-07 05:26:38', '2023-12-08', 1),
(52, 'user4', 'SSLCZ_TEST_657162227c106', 'dc', '2023-12-07 12:11:46', '2023-12-08', 2),
(53, 'user4', 'SSLCZ_TEST_6571fd94a5d6d', 'dc', '2023-12-07 23:15:01', '2023-12-07', 1),
(56, 'user4', 'SSLCZ_TEST_6571fe255feba', 'dc', '2023-12-07 23:17:26', '2023-12-08', 3),
(59, 'man', 'SSLCZ_TEST_65720235271ed', 'dc', '2023-12-07 23:34:46', '2023-12-08', 2),
(60, 'man', 'SSLCZ_TEST_657202526f734', 'dc', '2023-12-07 23:35:15', '2023-12-08', 2),
(61, 'user4', 'SSLCZ_TEST_657379283bf4c', 'dc', '2023-12-09 02:14:33', '2023-12-10', 2),
(62, 'user4', 'SSLCZ_TEST_657399b0e237e', 'dc', '2023-12-09 04:33:21', '2023-12-10', 1),
(63, 'user4', 'SSLCZ_TEST_65739ab26962a', 'dc', '2023-12-09 04:37:39', '2023-12-10', 1),
(64, 'user4', 'SSLCZ_TEST_65739c839bf6e', 'dc', '2023-12-09 04:45:24', '2023-12-10', 1),
(65, 'user4', 'SSLCZ_TEST_65739c9c0b206', 'dc', '2023-12-09 04:45:48', '2023-12-11', 1),
(66, 'man', 'SSLCZ_TEST_65743af00a86d', 'dc', '2023-12-09 16:01:21', '2023-12-10', 2),
(67, 'man', 'SSLCZ_TEST_65743af00a86d', 'dc', '2023-12-09 16:01:21', '2023-12-10', 1),
(68, 'man', 'SSLCZ_TEST_65743b04e7b1f', 'dc', '2023-12-09 16:01:42', '2023-12-10', 1),
(69, 'bats', 'SSLCZ_TEST_65743c518698c', 'dc', '2023-12-09 16:07:14', '2023-12-11', 2),
(70, 'bats', 'SSLCZ_TEST_65743ed497d82', 'dc', '2023-12-09 16:17:57', '2023-12-10', 1),
(71, 'user4', 'SSLCZ_TEST_65743f273f128', 'ds', '2023-12-09 16:19:20', '2023-12-12', 1),
(72, 'man', 'SSLCZ_TEST_6574b72b4b476', 'dde', '2023-12-10 00:51:23', '2023-12-13', 1),
(73, 'man', 'SSLCZ_TEST_6574b72b4b476', 'dl', '2023-12-10 00:51:23', '', 1),
(74, 'man', 'SSLCZ_TEST_6574b72b4b476', 'dk', '2023-12-10 00:51:23', '2023-12-14', 2),
(75, 'theFirstone', 'SSLCZ_TEST_6576200528610', 'dde', '2023-12-11 02:31:01', '2023-12-11', 2),
(76, 'theFirstone', 'SSLCZ_TEST_65762017e766e', 'dk', '2023-12-11 02:31:20', '2023-12-12', 1),
(77, 'theFirstone', 'SSLCZ_TEST_657623753372c', 'dde', '2023-12-11 02:45:41', '2023-12-12', 1),
(78, 'theFirstone', 'SSLCZ_TEST_6576240b6c1e4', 'dl', '2023-12-11 02:48:12', '2023-12-13', 1),
(79, 'theFirstone', 'SSLCZ_TEST_6576242849b3d', 'dl', '2023-12-11 02:48:41', '2023-12-12', 2),
(80, 'user4', 'SSLCZ_TEST_65763af850ff0', 'dc', '2023-12-11 04:26:00', '2023-12-13', 1),
(81, 'bats', 'SSLCZ_TEST_65763cd4b17b4', 'dc', '2023-12-11 04:33:57', '2023-12-12', 1),
(82, 'bats', 'SSLCZ_TEST_65763ce850240', 'dde', '2023-12-11 04:34:16', '2023-12-14', 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_ticket`
--

CREATE TABLE `purchase_ticket` (
  `username` varchar(20) NOT NULL,
  `train_name` varchar(10) NOT NULL,
  `route` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rewards`
--

CREATE TABLE `rewards` (
  `username` varchar(20) NOT NULL,
  `purchase_tracker` int(11) DEFAULT NULL,
  `redeem_code` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rewards`
--

INSERT INTO `rewards` (`username`, `purchase_tracker`, `redeem_code`) VALUES
('bats', 2, '0'),
('man', 5, '0'),
('manhunter', 0, '0'),
('q', 0, '0'),
('theFirstone', 1, '0'),
('TheSecondOne', 0, '0'),
('user3', 0, '0'),
('user4', 26, '0');

-- --------------------------------------------------------

--
-- Table structure for table `seat_status`
--

CREATE TABLE `seat_status` (
  `route` varchar(10) NOT NULL,
  `source` varchar(15) NOT NULL,
  `destination` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `seat_status`
--

INSERT INTO `seat_status` (`route`, `source`, `destination`) VALUES
('dc', 'Dhaka', 'Chittagong'),
('dde', 'Dhaka', 'Dewanganj'),
('dk', 'Dhaka', 'Khulna'),
('dl', 'Dhaka', 'Lalmonirhat'),
('ds', 'Dhaka', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `shovon_chair`
--

CREATE TABLE `shovon_chair` (
  `train_name` varchar(100) NOT NULL,
  `seat_remaining` int(11) NOT NULL,
  `departure_time` varchar(20) NOT NULL,
  `arival_time` varchar(20) NOT NULL,
  `r_departure_time` varchar(20) NOT NULL,
  `r_arival_time` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `shovon_chair`
--

INSERT INTO `shovon_chair` (`train_name`, `seat_remaining`, `departure_time`, `arival_time`, `r_departure_time`, `r_arival_time`, `price`) VALUES
('Chitra Express', 40, '7:00 pm', '3:40 am', '9:00 am', '6:00 pm', 250),
('Joyentika Express', 40, '11:30 am', '5:00 pm', '7:00 pm', '3:00 am', 250),
('Lalmoni Express', 40, '9:45 pm', '7:30 am', '10:00 am', '7:40 pm', 250),
('Sonar bangla express', 40, '7:00 am', '12:00 pm', '4:30 pm', '10:00 pm', 250),
('t1', 40, '2023-11-22 07:21:24', '2023-11-22 07:21:24', '', '', 300),
('Tista Express', 40, '7:30 am', '12:40 pm', '3:00 pm', '8:25 pm', 250);

-- --------------------------------------------------------

--
-- Table structure for table `show_history`
--

CREATE TABLE `show_history` (
  `username` varchar(20) NOT NULL,
  `transaction_id` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sleeper_coach`
--

CREATE TABLE `sleeper_coach` (
  `train_name` varchar(100) NOT NULL,
  `seat_remaining` int(11) NOT NULL,
  `departure_time` varchar(20) NOT NULL,
  `arival_time` varchar(20) NOT NULL,
  `r_departure_time` varchar(20) NOT NULL,
  `r_arival_time` varchar(20) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sleeper_coach`
--

INSERT INTO `sleeper_coach` (`train_name`, `seat_remaining`, `departure_time`, `arival_time`, `r_departure_time`, `r_arival_time`, `price`) VALUES
('Chitra Express', 40, '7:00 pm', '3:40 am', '9:00 am', '6:00 pm', 450),
('Joyentika Express', 40, '11:30 am', '5:00 pm', '7:00 pm', '3:00 am', 450),
('Lalmoni Express', 40, '9:45 pm', '7:30 am', '10:00 am', '7:40 pm', 450),
('Sonar bangla express', 40, '7:00 am', '12:00 pm', '4:30 pm', '10:00 pm', 450),
('Tista Express', 40, '7:30 am', '12:40 pm', '3:00 pm', '8:25 pm', 450);

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_price` int(11) NOT NULL,
  `route` varchar(10) NOT NULL,
  `source` varchar(15) NOT NULL,
  `destination` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_price`, `route`, `source`, `destination`) VALUES
(300, 'dc', 'Dhaka', 'Chittagong'),
(250, 'dde', 'Dhaka', 'Dewanganj'),
(300, 'dk', 'Dhaka', 'Khulna'),
(350, 'dl', 'Dhaka', 'Lalmonirhat'),
(200, 'ds', 'Dhaka', 'Sylhet');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `user_type` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`username`, `password`, `email`, `name`, `phone`, `user_type`) VALUES
('bats', '123', 'bats@gmail.com', 'batman', '0129298456', 'user'),
('batss', '123', 'batman@gmail.com', 'batman', '12345678901', 'user'),
('man', '123', 'batman@gmail.com', 'super', '12345678901', 'user'),
('manhunter', 'shape', 'martianmanhunter@gmail.com', 'Jonn Jonzz', '12312412567', 'user'),
('q', '###', 'question@gmail.com', 'Question', '01128374665', 'user'),
('theFirstone', '11111', 'iamfirst@gmail.com', 'Bruce Wayne', '012345678910', 'admin'),
('TheSecondOne', '22222', 'second@gmail.com', 'Alfred Pennyworth', '12423412412', 'user'),
('u2', '1234', 'some@gmail.com', 'fsasdkfj', '12345678901', 'user'),
('user3', '1234', 'some@gmail.com', 'p4', '12345678901', 'user'),
('user4', '1234', 'some@gmail.com', 'p4', '12345678910', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ac_berth`
--
ALTER TABLE `ac_berth`
  ADD PRIMARY KEY (`train_name`);

--
-- Indexes for table `ac_chair`
--
ALTER TABLE `ac_chair`
  ADD PRIMARY KEY (`train_name`);

--
-- Indexes for table `available`
--
ALTER TABLE `available`
  ADD PRIMARY KEY (`route`,`train_name`),
  ADD KEY `train_name` (`train_name`);

--
-- Indexes for table `calculate`
--
ALTER TABLE `calculate`
  ADD PRIMARY KEY (`train_name`,`route`),
  ADD KEY `route` (`route`);

--
-- Indexes for table `claim_reward`
--
ALTER TABLE `claim_reward`
  ADD PRIMARY KEY (`username`,`transaction_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `first_class`
--
ALTER TABLE `first_class`
  ADD PRIMARY KEY (`train_name`);

--
-- Indexes for table `modify_pricing`
--
ALTER TABLE `modify_pricing`
  ADD PRIMARY KEY (`username`,`route`),
  ADD KEY `route` (`route`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`transaction_id`,`ticket_serial_num`),
  ADD UNIQUE KEY `ticket_serial_num` (`ticket_serial_num`),
  ADD UNIQUE KEY `ticket_serial_num_2` (`ticket_serial_num`);

--
-- Indexes for table `purchase_history`
--
ALTER TABLE `purchase_history`
  ADD PRIMARY KEY (`serial`);

--
-- Indexes for table `purchase_ticket`
--
ALTER TABLE `purchase_ticket`
  ADD PRIMARY KEY (`username`,`train_name`,`route`),
  ADD KEY `train_name` (`train_name`),
  ADD KEY `route` (`route`);

--
-- Indexes for table `rewards`
--
ALTER TABLE `rewards`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `seat_status`
--
ALTER TABLE `seat_status`
  ADD PRIMARY KEY (`route`);

--
-- Indexes for table `shovon_chair`
--
ALTER TABLE `shovon_chair`
  ADD PRIMARY KEY (`train_name`);

--
-- Indexes for table `show_history`
--
ALTER TABLE `show_history`
  ADD PRIMARY KEY (`username`,`transaction_id`),
  ADD KEY `transaction_id` (`transaction_id`);

--
-- Indexes for table `sleeper_coach`
--
ALTER TABLE `sleeper_coach`
  ADD PRIMARY KEY (`train_name`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`route`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`,`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `ticket_serial_num` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `purchase_history`
--
ALTER TABLE `purchase_history`
  MODIFY `serial` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `available`
--
ALTER TABLE `available`
  ADD CONSTRAINT `available_ibfk_1` FOREIGN KEY (`route`) REFERENCES `seat_status` (`route`),
  ADD CONSTRAINT `available_ibfk_2` FOREIGN KEY (`train_name`) REFERENCES `shovon_chair` (`train_name`);

--
-- Constraints for table `calculate`
--
ALTER TABLE `calculate`
  ADD CONSTRAINT `calculate_ibfk_1` FOREIGN KEY (`train_name`) REFERENCES `shovon_chair` (`train_name`),
  ADD CONSTRAINT `calculate_ibfk_2` FOREIGN KEY (`route`) REFERENCES `ticket` (`route`);

--
-- Constraints for table `claim_reward`
--
ALTER TABLE `claim_reward`
  ADD CONSTRAINT `claim_reward_ibfk_1` FOREIGN KEY (`username`) REFERENCES `rewards` (`username`),
  ADD CONSTRAINT `claim_reward_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `payment` (`transaction_id`);

--
-- Constraints for table `modify_pricing`
--
ALTER TABLE `modify_pricing`
  ADD CONSTRAINT `modify_pricing_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `modify_pricing_ibfk_2` FOREIGN KEY (`route`) REFERENCES `ticket` (`route`);

--
-- Constraints for table `purchase_ticket`
--
ALTER TABLE `purchase_ticket`
  ADD CONSTRAINT `purchase_ticket_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `purchase_ticket_ibfk_2` FOREIGN KEY (`train_name`) REFERENCES `shovon_chair` (`train_name`),
  ADD CONSTRAINT `purchase_ticket_ibfk_3` FOREIGN KEY (`route`) REFERENCES `ticket` (`route`);

--
-- Constraints for table `show_history`
--
ALTER TABLE `show_history`
  ADD CONSTRAINT `show_history_ibfk_1` FOREIGN KEY (`username`) REFERENCES `user` (`username`),
  ADD CONSTRAINT `show_history_ibfk_2` FOREIGN KEY (`transaction_id`) REFERENCES `payment` (`transaction_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
