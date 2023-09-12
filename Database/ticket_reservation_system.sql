-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2023 at 07:57 PM
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
-- Database: `ticket_reservation_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nic` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_no`, `email`, `nic`) VALUES
(1, 'admin01@gmail.com', '200211111112'),
(2, 'admin2@gmail.com', '222222222222');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `plate_number` varchar(10) NOT NULL,
  `driver_id` int(11) NOT NULL,
  `model` varchar(50) NOT NULL,
  `capacity` int(11) NOT NULL,
  `owner_name` varchar(100) NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `reg_date` date NOT NULL,
  `bus_status` varchar(10) NOT NULL,
  `tour_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`plate_number`, `driver_id`, `model`, `capacity`, `owner_name`, `contact_number`, `reg_date`, `bus_status`, `tour_status`) VALUES
('WP-NA-0002', 2, 'Toyota Coaster', 25, 'Owner2', '075-5552224', '2023-06-28', 'Active', 'Enroll'),
('WP-NA-0004', 4, 'Toyota Coaster', 25, 'Owner4', '073-1212121', '2023-06-28', 'Deactivate', 'Free'),
('WP-ND-0001', 1, 'Toyota Coaster', 25, 'Jude Perera', '072-3333334', '2023-06-28', 'Active', 'Enroll'),
('WP-ND-0003', 3, 'Toyota Coaster', 25, 'Owner3', '070-1245653', '2023-06-28', 'Active', 'Enroll');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_no`, `email`) VALUES
(1, 'customer01@gmail.com'),
(2, 'customer02@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `driver_no` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `dl_no` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`driver_no`, `email`, `nic`, `dl_no`) VALUES
(1, 'driver1@gmail.com', '555555555554', '33333333'),
(2, 'driver02@gmail.com', '999999999999', '66666666'),
(3, 'driver03@gmail.com', '555555555555', '77777777'),
(4, 'driver04@gmail.com', '999999999999', '44444444');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `msg_name` varchar(100) NOT NULL,
  `msg_email` varchar(50) NOT NULL,
  `msg_sub` varchar(500) NOT NULL,
  `msg_body` varchar(5000) NOT NULL,
  `msg_status` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `msg_name`, `msg_email`, `msg_sub`, `msg_body`, `msg_status`) VALUES
(1, 'Sasanga Senal', 'sasanga@gmail.com', 'About my account', 'I have a account, but I cannot access it now. Please check.', 'Checked');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` varchar(100) NOT NULL,
  `ticket_id` varchar(50) NOT NULL,
  `token` varchar(100) NOT NULL,
  `amount` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `ticket_id`, `token`, `amount`, `date`) VALUES
('pay-TIC/2023-06-29/WP-ND-0001/05', 'TIC/2023-06-29/WP-ND-0001/05', 'token', 750, '2023-06-29'),
('Pay-TIC/2023-06-30/WP-ND-0002/12', 'TIC/2023-06-30/WP-ND-0002/12', 'token from gateway', 500, '2023-06-28'),
('pay-TIC/2023-07-02/WP-ND-0001/22', 'TIC/2023-07-02/WP-ND-0001/22', 'Token from gateway', 750, '2023-06-29'),
('pay-TIC/2023-07-05/WP-ND-0003/8', 'TIC/2023-07-05/WP-ND-0003/8', 'Token from gateway', 500, '2023-06-29');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `bus_id` varchar(10) NOT NULL,
  `route` int(11) NOT NULL,
  `start` varchar(50) NOT NULL,
  `end` varchar(50) NOT NULL,
  `arrival_time` time NOT NULL,
  `depature_time` time NOT NULL,
  `distance` double NOT NULL,
  `amount` int(11) NOT NULL,
  `sch_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `bus_id`, `route`, `start`, `end`, `arrival_time`, `depature_time`, `distance`, `amount`, `sch_status`) VALUES
(1, 'WP-ND-0003', 240, 'Negombo', 'Colombo', '09:00:00', '08:00:00', 100, 500, 'Ongoing'),
(2, 'WP-NA-0002', 240, 'Colombo', 'Negombo', '09:30:00', '08:30:00', 100, 500, 'Pending'),
(3, 'WP-ND-0001', 1, 'Colombo', 'Kandy', '10:30:00', '08:30:00', 200, 750, 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` varchar(50) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `sch_id` int(11) NOT NULL,
  `pass_name` varchar(100) NOT NULL,
  `pass_age` int(11) NOT NULL,
  `pass_phone` varchar(11) NOT NULL,
  `curr_date` date NOT NULL,
  `booking_date` date NOT NULL,
  `seat` int(11) NOT NULL,
  `tic_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `customer_id`, `sch_id`, `pass_name`, `pass_age`, `pass_phone`, `curr_date`, `booking_date`, `seat`, `tic_status`) VALUES
('TIC/2023-06-29/WP-ND-0001/05', 1, 3, 'Passenger Number 2', 50, '078-6548523', '2023-06-29', '2023-06-29', 5, 'Confirm'),
('TIC/2023-06-30/WP-ND-0002/12', 1, 2, 'Passenger number 1', 20, '075-6324588', '2023-06-28', '2023-06-30', 12, 'Confirm'),
('TIC/2023-07-02/WP-ND-0001/22', 1, 3, 'Passenger Number 4', 25, '074-3698524', '2023-06-29', '2023-07-02', 22, 'Confirm'),
('TIC/2023-07-05/WP-ND-0003/8', 1, 1, 'Passenger Number 3', 50, '078-9999999', '2023-06-29', '2023-07-05', 8, 'Confirm');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact_no` varchar(11) NOT NULL,
  `reg_date` date NOT NULL,
  `type` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `name`, `contact_no`, `reg_date`, `type`, `status`) VALUES
('admin01@gmail.com', 'admin111', 'Nisal Devinda', '071-1111112', '2023-06-27', 'admin', 'Active'),
('admin2@gmail.com', 'admin456', 'Sakuni Sirisena', '072-2222222', '2023-06-28', 'admin', 'Active'),
('customer01@gmail.com', 'customer1', 'customer01', '072-5555555', '2023-06-28', 'customer', 'Active'),
('customer02@gmail.com', 'customer02', 'customer02', '074-4444444', '2023-06-28', 'customer', 'Deactivate'),
('driver02@gmail.com', 'driver02', 'driver2', '078-1257463', '2023-06-28', 'driver', 'Active'),
('driver03@gmail.com', 'driverdefault', 'driver03', '072-6548523', '2023-06-28', 'driver', 'Active'),
('driver04@gmail.com', 'driver04', 'driver04', '075-1238526', '2023-06-28', 'driver', 'Deactivate'),
('driver1@gmail.com', 'driver01', 'driver01', '071-8888888', '2023-06-28', 'driver', 'Active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_no`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`plate_number`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_no`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`driver_no`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `driver`
--
ALTER TABLE `driver`
  MODIFY `driver_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
