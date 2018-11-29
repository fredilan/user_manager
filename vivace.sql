-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2018 at 03:06 PM
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
-- Database: `vivace`
--

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `key` varchar(40) COLLATE utf8_bin NOT NULL,
  `value` varchar(200) COLLATE utf8_bin NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `config`
--

INSERT INTO `config` (`key`, `value`, `id`) VALUES
('admin_email', 'fredilan@gmail.com', 1),
('admin_password', '123456', 2),
('user_rates', '0.1, 0.2, 0.3, 0.4, 0.5, 0.6, 0.7, 0.8, 0.9, 1.0', 3);

-- --------------------------------------------------------

--
-- Table structure for table `custom_fields`
--

CREATE TABLE `custom_fields` (
  `id` bigint(20) NOT NULL,
  `meta_key` varchar(40) COLLATE utf8_bin NOT NULL,
  `meta_value` varchar(40) COLLATE utf8_bin NOT NULL,
  `meta_fieldtype` varchar(20) COLLATE utf8_bin NOT NULL,
  `options` longtext COLLATE utf8_bin NOT NULL,
  `global_enable` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `custom_fields`
--

INSERT INTO `custom_fields` (`id`, `meta_key`, `meta_value`, `meta_fieldtype`, `options`, `global_enable`) VALUES
(1, 'gender', 'Gender', 'dropdown', '[\"Female\",\"Male\"]', 1),
(2, 'mobile', 'Mobile Number', 'textfield', '[\"\"]', 1),
(3, 'interests', 'Interests', 'checkbox', '[\"Sports\",\"Movies\",\"Shopping\",\"Travel\",\"Food\"]', 1),
(4, 'status', 'Status', 'radio', '[\"Single\",\"Married\",\"Divorced\"]', 1),
(5, 'test', 'test', 'textfield', '[\"\"]', 0),
(6, 'asasqwqwqw', 'aasass', 'textfield', '[\"\"]', 0),
(7, 'aaaaaaa', 'aaaaa', 'textfield', '[\"\"]', 0),
(8, '23232323', 'wewewee', 'textfield', '[\"\"]', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email_address` varchar(40) COLLATE utf8_bin NOT NULL,
  `first_name` varchar(40) COLLATE utf8_bin NOT NULL,
  `middle_name` varchar(40) COLLATE utf8_bin NOT NULL,
  `last_name` varchar(40) COLLATE utf8_bin NOT NULL,
  `is_verified` tinyint(1) NOT NULL DEFAULT '0',
  `verification_code` varchar(20) COLLATE utf8_bin NOT NULL,
  `company` varchar(40) COLLATE utf8_bin NOT NULL,
  `channel_manager` varchar(40) COLLATE utf8_bin NOT NULL,
  `rates` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email_address`, `first_name`, `middle_name`, `last_name`, `is_verified`, `verification_code`, `company`, `channel_manager`, `rates`) VALUES
(2, 'maefatima.gallardo@gmail.com', 'Mae Fatima', 'Gallardo', 'Samson', 0, '9PpHUJJ563HK', 'Duke Manufacturing', 'Lhan Samson', 200),
(5, 'krestamerei@gmail.com', 'Jules', 'Silvestre', 'Mendoza', 0, 'rLSsRXZU09Uc', 'Duke Manufacturing', 'Lhan Samson', 1111),
(6, 'flora_phoy@yahoo.com.ph', 'Flor', 'Payabyab', 'Samson', 0, 've9PxpFSd5QO', 'Zento', 'Lhan Samson', 111),
(7, 'fredilan@gmail.com', 'Fredilan', 'Payabyab', 'Samson', 0, 'Ry1POz6QfToe', 'Vivace Innovative Solutions', 'Lhan Samson', 111);

-- --------------------------------------------------------

--
-- Table structure for table `user_metadata`
--

CREATE TABLE `user_metadata` (
  `id` bigint(20) NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `meta_key` varchar(40) COLLATE utf8_bin NOT NULL,
  `meta_value` text COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `user_metadata`
--

INSERT INTO `user_metadata` (`id`, `user_id`, `meta_key`, `meta_value`) VALUES
(1, 2, '0', 'Married'),
(4, 5, '0', '\"Married\"'),
(5, 6, '1', '\"0\"'),
(6, 6, '2', '\"1212121212122\"'),
(7, 6, '3', '\"Food\"'),
(8, 6, '4', '\"Married\"'),
(9, 7, '1', '\"1\"'),
(10, 7, '2', '\"2222332323233\"'),
(11, 7, '3', '\"Food\"'),
(12, 7, '4', '\"Married\"');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_fields`
--
ALTER TABLE `custom_fields`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_metadata`
--
ALTER TABLE `user_metadata`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `custom_fields`
--
ALTER TABLE `custom_fields`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_metadata`
--
ALTER TABLE `user_metadata`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
