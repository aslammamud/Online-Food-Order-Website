-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 06, 2020 at 07:25 AM
-- Server version: 10.3.15-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `online_food_order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Email` varchar(30) NOT NULL,
  `Password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Email`, `Password`) VALUES
(1, 'Aslam', 'aslammamud@gmail.com', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `burger`
--

CREATE TABLE `burger` (
  `id` int(11) NOT NULL,
  `Name` varchar(20) NOT NULL,
  `Size` varchar(20) NOT NULL,
  `Price` int(20) NOT NULL,
  `Quantity` int(255) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `burger`
--

INSERT INTO `burger` (`id`, `Name`, `Size`, `Price`, `Quantity`) VALUES
(1, 'Chicken Shorma', 'M', 100, 1),
(2, 'Chiken Burger ', 'M', 140, 1),
(3, 'Chiken Burger ', 'L', 160, 1),
(4, 'Chiken Cheese Burger', 'M', 160, 1),
(5, 'Chiken Cheese Burger', 'L', 180, 1),
(6, 'Chiken Burger With B', 'L', 200, 1),
(7, 'Beef Burger ', 'M', 160, 1),
(8, 'Beef Burger ', 'L', 180, 1),
(9, 'Beef Cheese Burger ', 'M', 180, 1),
(10, 'Beef Cheese Burger ', 'L', 200, 1),
(11, 'Beef Burger With Bac', 'L', 220, 1),
(12, 'Corn Soup', 'M', 220, 1),
(13, 'Hot & Sour Soup', 'M', 230, 1),
(14, 'Thai Soup', 'M', 240, 1),
(15, 'Fish Finger', 'M', 250, 1),
(16, 'Fish Finger', 'L', 300, 1),
(17, 'Chiken fry', 'M', 150, 1),
(18, 'Chiken fry', 'L', 250, 1),
(19, 'Onthon', 'M', 300, 1),
(20, 'Cold Coffee', 'M', 50, 1),
(21, 'Cold Coffee', 'L', 100, 1),
(22, 'Oreo Shake', 'M', 80, 1),
(23, 'Oreo Shake', 'L', 180, 1),
(24, 'Kitkat', 'M', 220, 1),
(25, 'Kitkat', 'L', 420, 1),
(26, 'Coka-Cola', 'M 400ml ', 40, 1),
(27, 'Coka-Cola', 'L 1ltr', 90, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `datecreation` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `username` varchar(250) NOT NULL,
  `quantity` int(11) NOT NULL,
  `bill` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `datecreation`, `username`, `quantity`, `bill`) VALUES
(93, '2019-12-09 18:00:00', 'Md. Faruk', 5, 500),
(92, '2019-12-09 18:00:00', 'Md. Faruk', 4, 400),
(94, '2019-12-10 11:44:24', 'Md. Faruk', 2, 280),
(99, '2019-12-10 11:54:53', 'Aslam Mamud', 1, 100),
(96, '2019-12-10 11:47:31', 'Aslam Mamud', 4, 400),
(97, '2019-12-10 11:47:51', 'Aslam Mamud', 5, 500),
(98, '2019-12-10 11:51:53', 'Aslam Mamud', 1, 100),
(100, '2019-12-10 11:56:56', 'Aslam Mamud', 1, 100),
(101, '2019-12-10 11:58:02', 'Aslam Mamud', 1, 100),
(102, '2019-12-10 11:58:17', 'Aslam Mamud', 1, 100),
(103, '2019-12-10 11:58:42', 'Aslam Mamud', 1, 100),
(104, '2019-12-10 11:58:55', 'Aslam Mamud', 1, 100),
(105, '2019-12-10 12:00:26', 'Aslam Mamud', 1, 100),
(106, '2019-12-10 12:01:11', 'Aslam Mamud', 1, 100),
(107, '2019-12-10 12:03:03', 'Aslam Mamud', 1, 100),
(108, '2019-12-10 12:03:09', 'Aslam Mamud', 1, 100),
(109, '2019-12-10 12:03:17', 'Aslam Mamud', 1, 100),
(110, '2019-12-10 12:03:27', 'Aslam Mamud', 1, 100),
(111, '2019-12-10 12:03:28', 'Aslam Mamud', 1, 100),
(112, '2019-12-10 12:03:32', 'Aslam Mamud', 1, 100),
(113, '2019-12-10 12:03:49', 'Aslam Mamud', 1, 100),
(114, '2019-12-10 12:04:09', 'Aslam Mamud', 1, 100),
(115, '2019-12-10 12:04:19', 'Aslam Mamud', 1, 100),
(116, '2019-12-10 12:04:20', 'Aslam Mamud', 1, 100),
(117, '2019-12-10 12:04:44', 'Aslam Mamud', 1, 100),
(118, '2019-12-10 12:04:54', 'Aslam Mamud', 1, 100),
(119, '2019-12-10 12:05:01', 'Aslam Mamud', 1, 100),
(120, '2020-11-05 23:15:38', 'Aslam Mamud', 3, 360);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phoneCode` varchar(11) NOT NULL,
  `phone` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `username`, `password`, `gender`, `email`, `phoneCode`, `phone`) VALUES
(9, 'Aslam Mamud', '12345', 'Male', 'aslam@gmail.com', '015', 21310261),
(10, 'Dr. Karim', '54321', 'Male', 'karim@gmail.com', '019', 21310261),
(11, 'Md. Faruk', '12345', 'Male', 'faruk@gmail.com', '019', 81400668);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `Email` (`Email`);

--
-- Indexes for table `burger`
--
ALTER TABLE `burger`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `burger`
--
ALTER TABLE `burger`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=121;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
