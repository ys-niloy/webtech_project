-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2025 at 09:25 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment_history`
--

CREATE TABLE `appointment_history` (
  `appointment_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_date` date NOT NULL,
  `problem` text NOT NULL,
  `token` varchar(50) NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment_history`
--

INSERT INTO `appointment_history` (`appointment_id`, `email`, `doctor_id`, `doctor_name`, `appointment_time`, `appointment_date`, `problem`, `token`, `file_path`, `first_name`, `last_name`) VALUES
(1, 'john.doe@example.com', 1, 'Dr. Sarah Connor', '09:00:00', '2024-01-01', 'Fever and chills', 'TKN001', '/myPart/uploads/Screenshot 2025-01-02 004502.png', 'John', 'Doe'),
(2, 'jane.smith@example.com', 2, 'Dr. Alan Grant', '10:30:00', '2024-01-10', 'Regular health check-up', 'TKN002', '/reports/report2.pdf', 'Jane', 'Smith'),
(3, 'alice.brown@example.com', 3, 'Dr. Ellie Sattler', '14:00:00', '2024-01-15', 'Asthma follow-up', 'TKN003', NULL, 'Alice', 'Brown'),
(4, 'bob.white@example.com', 4, 'Dr. Ian Malcolm', '16:00:00', '2024-01-20', 'Back pain consultation', 'TKN004', '/reports/report4.pdf', 'Bob', 'White');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_info`
--

CREATE TABLE `doctor_info` (
  `doctor_id` int(11) NOT NULL,
  `doctor_name` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `available_time` time NOT NULL,
  `speciality` varchar(255) NOT NULL,
  `hospital` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor_info`
--

INSERT INTO `doctor_info` (`doctor_id`, `doctor_name`, `phone`, `email`, `available_time`, `speciality`, `hospital`, `password`) VALUES
(1, 'Dr. Sarah Connor', '1234567890', 'sarah.connor@example.com', '09:00:00', 'General Physician', 'Central Hospital', 'securepass1'),
(2, 'Dr. Alan Grant', '9876543210', 'alan.grant@example.com', '10:30:00', 'Pediatrician', 'Community Clinic', 'securepass2'),
(3, 'Dr. Ellie Sattler', '5556667777', 'ellie.sattler@example.com', '14:00:00', 'Pulmonologist', 'Green Valley Hospital', 'securepass3'),
(4, 'Dr. Ian Malcolm', '1112223333', 'ian.malcolm@example.com', '16:00:00', 'Orthopedic', 'Metro Healthcare', 'securepass4');

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `transaction_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `appointment_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`transaction_id`, `name`, `email`, `card_number`, `appointment_id`) VALUES
(1, 'John Doe', 'john.doe@example.com', '1234567890123456', 1),
(2, 'Jane Smith', 'jane.smith@example.com', '2345678901234567', 2),
(3, 'Alice Brown', 'alice.brown@example.com', '3456789012345678', 3),
(4, 'Bob White', 'bob.white@example.com', '4567890123456789', 4);

-- --------------------------------------------------------

--
-- Table structure for table `review_box`
--

CREATE TABLE `review_box` (
  `patient_email` varchar(100) NOT NULL,
  `patient_name` varchar(100) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `review_comment` text DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review_box`
--

INSERT INTO `review_box` (`patient_email`, `patient_name`, `doctor_name`, `review_comment`, `doctor_id`) VALUES
('john.doe@example.com', 'John', 'Dr. Sarah Connor', 'He is good', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `first_name` varchar(100) DEFAULT NULL,
  `last_name` varchar(100) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `nid` varchar(20) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `med_history` varchar(255) DEFAULT NULL,
  `emergency_contact` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`first_name`, `last_name`, `email`, `phone`, `nid`, `password`, `dob`, `gender`, `address`, `med_history`, `emergency_contact`) VALUES
('Alice', 'Brown', 'alice.brown@example.com', '3456789012', 'NID11223', 'password789', '1995-08-20', 'Female', '789 Pine Road', 'Asthma', '2233445566'),
('Bob', 'White', 'bob.white@example.com', '4567890123', 'NID33445', 'password321', '1980-12-10', 'Male', '101 Maple Lane', 'None', '3344556677'),
('Jane', 'Smith', 'jane.smith@example.com', '2345678901', 'NID67890', 'password456', '1985-05-15', 'Female', '456 Oak Avenue', 'Diabetes', '1122334455'),
('John', 'Doe', 'john.doe@example.com', '1234567890', 'NID12345', 'password123', '1990-01-01', 'Male', '123 Elm Street', 'No allergies', '0987654321'),
('Mohammad', 'Yeasin', 'ys.niloy.666@gmail.com', '01740810152', '1234567890', 'Password@123', '2002-02-05', 'Male', 'Road-2, House-28, Mirpur-12', 'Back pain', '09876543210');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment_history`
--
ALTER TABLE `appointment_history`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `doctor_info`
--
ALTER TABLE `doctor_info`
  ADD PRIMARY KEY (`doctor_id`),
  ADD UNIQUE KEY `doctor_name` (`doctor_name`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `review_box`
--
ALTER TABLE `review_box`
  ADD PRIMARY KEY (`patient_email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment_history`
--
ALTER TABLE `appointment_history`
  MODIFY `appointment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `doctor_info`
--
ALTER TABLE `doctor_info`
  MODIFY `doctor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment_history`
--
ALTER TABLE `appointment_history`
  ADD CONSTRAINT `appointment_history_ibfk_1` FOREIGN KEY (`email`) REFERENCES `user_info` (`email`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
