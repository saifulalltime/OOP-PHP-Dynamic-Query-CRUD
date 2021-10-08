-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 13, 2020 at 06:24 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oop_php_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `user_image` varchar(500) NOT NULL,
  `agree_status` enum('yes','no') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `name`, `email`, `address`, `user_image`, `agree_status`) VALUES
(4, 'Md. Siful Islam', 'saifulalltime@gmail.com', 'Adampur, Pattan, Bijoynagor\r\nBrahmanbaria', 'assets/user_image/158024320127570004718.jpg', 'yes'),
(5, 'Md. Jhon', 'jhone@gmail.com', 'New York, America', 'assets/user_image/158030066543660004726.jpg', 'yes'),
(6, 'safasdf', 'saifulalltime@gmail.com', 'dsfasdfas', 'assets/user_image/15803137784441GAMMA SUP II.png', 'yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
