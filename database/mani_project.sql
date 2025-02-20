-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2025 at 11:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mani_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `formcat`
--

CREATE TABLE `formcat` (
  `userid` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(50) DEFAULT NULL,
  `image` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `formcat`
--

INSERT INTO `formcat` (`userid`, `name`, `description`, `image`) VALUES
(4, 'iphone pro max', 'this is latest iphone ', '61gDg-vFhzL.jpg'),
(5, 'laptop', 'we have gaming laptop', 'gaming laptop.jpg'),
(6, 'keyboard ', 'new smart keyboard ', 'best key.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `prodtform`
--

CREATE TABLE `prodtform` (
  `prodtid` int(11) NOT NULL,
  `proname` varchar(100) DEFAULT NULL,
  `proprice` varchar(100) DEFAULT NULL,
  `proquantity` int(11) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL,
  `img` varchar(5000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `prodtform`
--

INSERT INTO `prodtform` (`prodtid`, `proname`, `proprice`, `proquantity`, `userid`, `img`) VALUES
(8, 'ipone pro 14', ' 30000', 2, 4, '61vIdWlDGcL._AC_SL1500_.jpg'),
(9, 'laptop', ' 9000', 2, 5, 'laptop.jpeg'),
(10, 'keyboard ', ' 4500', 5, 6, 'keybord.jpg'),
(11, 'phone ', ' 34000', 10, 4, 'apple.jpg'),
(12, 'iphone 13 ', ' 340000', 3, 4, 'images.jpg'),
(13, 'keyboard ', ' 8900', 7, 6, 'kebord.jpg'),
(14, 'mobile', ' 230000', 2, 4, 'redmi13black_420x.webp');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `pass` varchar(16) DEFAULT NULL,
  `admin` varchar(255) DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `pass`, `admin`) VALUES
(5, 'rafeeq', 'khan', 'rafeeq@gmail.om', '1234', 'admin'),
(6, 'alli', 'khan', 'all@gmail.om', '123456', 'user'),
(7, 'neha ', 'khan', 'neha@gmail.om', '45555', 'user'),
(8, 'maraim', 'khan', 'maraim@gmail.om', '6666', 'user'),
(9, 'rafeeq', 'ahmed', 'rafeeqahmed@gmail.om', 'rafeeq', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `formcat`
--
ALTER TABLE `formcat`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `prodtform`
--
ALTER TABLE `prodtform`
  ADD PRIMARY KEY (`prodtid`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `formcat`
--
ALTER TABLE `formcat`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `prodtform`
--
ALTER TABLE `prodtform`
  MODIFY `prodtid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `prodtform`
--
ALTER TABLE `prodtform`
  ADD CONSTRAINT `prodtform_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `formcat` (`userid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
