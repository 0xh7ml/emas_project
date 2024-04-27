-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 27, 2024 at 05:20 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_attendance`
--

CREATE TABLE `tb_attendance` (
  `record_id` int(50) NOT NULL,
  `employee_id` int(50) NOT NULL,
  `date` date NOT NULL,
  `in_time` time DEFAULT NULL,
  `out_time` time DEFAULT NULL,
  `total_hours` time DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_attendance`
--

INSERT INTO `tb_attendance` (`record_id`, `employee_id`, `date`, `in_time`, `out_time`, `total_hours`, `status`) VALUES
(10, 19, '2024-04-19', '17:03:47', '17:03:48', '00:00:01', 'Present'),
(11, 21, '2024-04-20', '15:19:09', NULL, NULL, 'Present'),
(12, 19, '2024-04-22', '14:17:41', '14:20:57', '00:03:16', 'Present'),
(13, 21, '2024-04-22', '14:22:40', '14:22:57', '00:00:17', 'Present'),
(14, 19, '2024-04-24', '19:36:54', '19:37:16', '00:00:22', 'Present'),
(15, 19, '2024-04-25', '16:06:02', '16:06:22', '00:00:20', 'Present'),
(16, 22, '2024-04-25', '16:25:52', '16:25:53', '00:00:01', 'Present'),
(17, 19, '2024-04-27', '22:26:18', '22:26:33', '00:00:15', 'Present');

-- --------------------------------------------------------

--
-- Table structure for table `tb_employee`
--

CREATE TABLE `tb_employee` (
  `emp_id` int(11) NOT NULL,
  `emp_name` varchar(90) NOT NULL,
  `emp_phone` int(11) NOT NULL,
  `emp_address` varchar(255) NOT NULL,
  `emp_salary` int(10) NOT NULL,
  `emp_gender` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_employee`
--

INSERT INTO `tb_employee` (`emp_id`, `emp_name`, `emp_phone`, `emp_address`, `emp_salary`, `emp_gender`) VALUES
(19, 'Md Saikat', 1640814789, 'Sector 10, Uttara, Bangladesh', 30000, 'male'),
(21, 'sium', 1, 'a', 1, 'male'),
(22, 'Test', 0, '10', 10, 'male');

-- --------------------------------------------------------

--
-- Table structure for table `tb_users`
--

CREATE TABLE `tb_users` (
  `id` int(11) NOT NULL,
  `emp_id` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tb_users`
--

INSERT INTO `tb_users` (`id`, `emp_id`, `username`, `password`) VALUES
(3, NULL, 'admin', 'admin123'),
(4, 19, 'saikat', 'bonk'),
(5, 21, 'sium', '1'),
(6, 22, 'test', 'test');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  ADD PRIMARY KEY (`record_id`),
  ADD KEY `Foreign Key` (`employee_id`);

--
-- Indexes for table `tb_employee`
--
ALTER TABLE `tb_employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Foreign Key with Employee table` (`emp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  MODIFY `record_id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `tb_employee`
--
ALTER TABLE `tb_employee`
  MODIFY `emp_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_attendance`
--
ALTER TABLE `tb_attendance`
  ADD CONSTRAINT `Foreign Key` FOREIGN KEY (`employee_id`) REFERENCES `tb_employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_users`
--
ALTER TABLE `tb_users`
  ADD CONSTRAINT `Foreign Key with Employee table` FOREIGN KEY (`emp_id`) REFERENCES `tb_employee` (`emp_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
