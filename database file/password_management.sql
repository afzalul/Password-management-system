-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 18, 2021 at 02:18 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `password_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `username`, `password`) VALUES
('Afzalul Alam', 'afzalul_alam', 'baT1ogwytou8.'),
('Nazmul Hassan Papon', 'papon', 'baxMKdi2r4ktM');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE `image` (
  `username` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `file_name` varchar(300) NOT NULL,
  `data` varchar(300) NOT NULL,
  `key_data` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `image`
--

INSERT INTO `image` (`username`, `id`, `file_name`, `data`, `key_data`) VALUES
('sakib', 26, 'sakib1616073028.jpg', '8jGvcGU+fP0d4MAHMQ==', 'bangladesh'),
('sakib', 27, 'sakib1616073044.jpg', '+Dnhfik+dbgd6Q==', 'bangladesh'),
('sakib', 28, 'sakib1616073097.jpg', '8jGvcGU+fP0d4MAHMblbeND3fvn06CnhC3drRYld3Dom7xJERvuK', 'bangladesh'),
('tamim', 29, 'tamim1616073133.jpg', '8jGvcGU+fP0a4MYHPblbeND3fvn06CnhC3drRYld3Dom7xJERvuK', 'bangladesh'),
('tamim', 30, 'tamim1616073153.jpg', '8jGvcGU+fP0a4MYHPg==', 'bangladesh'),
('mushfiq', 31, 'mushfiq1616073192.jpg', '8jGvcGU+fP0D9NgGNfBaNMHievKx9W+uDzMpQttXzTgg8FdEA+6C5gQ=', 'bangladesh'),
('mushfiq', 32, 'mushfiq1616073203.jpg', '8jGvcGU+fP0d4MAHMQ==', 'bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `join_request`
--

CREATE TABLE `join_request` (
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile_no` varchar(30) NOT NULL,
  `image_name` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `join_request`
--

INSERT INTO `join_request` (`name`, `username`, `password`, `mobile_no`, `image_name`) VALUES
('Mashrafe Bin Mortaza', 'mashrafe', 'bae5c.x6H3ZGU', '1334640944', 'mashrafe1616072895.jpg'),
('Nafiz', 'nafiz', 'baxMKdi2r4ktM', '1334640944', 'default.jpg'),
('Nasir Hossain', 'nasir', 'baxMKdi2r4ktM', '1734640988', 'nasir1616072823.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `name` varchar(30) NOT NULL,
  `mobile_no` varchar(12) NOT NULL,
  `message` text NOT NULL,
  `id` int(11) NOT NULL,
  `date` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`name`, `mobile_no`, `message`, `id`, `date`) VALUES
('Afzalul Alam', '01734640912', 'This demo message', 25, '21.03.18 06:14:12 PM'),
('Ashraful Alam', '01427479657', 'Another demo message', 26, '21.03.18 06:14:29 PM');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `mobile_no` varchar(300) NOT NULL,
  `admin_username` varchar(30) NOT NULL,
  `image_name` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`name`, `username`, `password`, `mobile_no`, `admin_username`, `image_name`) VALUES
('Mushfiqur Rahim', 'mushfiq', 'baxMKdi2r4ktM', '1334640913', 'afzalul_alam', 'mushfiq1616072541.jpg'),
('Sakib Al Hasan', 'sakib', 'baxMKdi2r4ktM', '1427449653', 'afzalul_alam', 'sakib1616072475.jpg'),
('Tamim Iqbal', 'tamim', 'baxMKdi2r4ktM', '1734640912', 'afzalul_alam', 'tamim1616072504.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_notification`
--

CREATE TABLE `user_notification` (
  `U_username` varchar(30) NOT NULL,
  `id` int(11) NOT NULL,
  `notification` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `join_request`
--
ALTER TABLE `join_request`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `user_notification`
--
ALTER TABLE `user_notification`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user_notification`
--
ALTER TABLE `user_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
