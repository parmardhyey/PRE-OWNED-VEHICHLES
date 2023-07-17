-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2022 at 02:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bike_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `password`, `create_datetime`) VALUES
(1, 'admin', 'admin123@gmail.com', '7488e331b8b64e5794da3fa4eb10ad5d', '2022-02-21 12:21:07');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `fid` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `bikename` varchar(20) NOT NULL,
  `rating` int(10) NOT NULL,
  `review` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`fid`, `username`, `bikename`, `rating`, `review`) VALUES
(6, 'Rahul', 'Yamaha Mt 15', 10, 'Fast and smooth process. Variety of bikes available. Best way to buy Second hand bikes.'),
(7, 'Archit_Pawar001', 'Tvs N-rq 125', 9, 'It\'s an excellent powered ever scooty with 125 cc.What a brilliant pickup and braking system.'),
(8, 'stoneheart_001', 'Bajaj Dominar 400', 10, 'I like the performance, its beast in the segment, and its unbeatable bike.'),
(9, 'AyaanSanjeetDas', 'Bullet classic 350', 7, 'Nice performance bike with relatively comfortable seat.From getting the speed 30km vibration occurs'),
(10, 'SantoshAyare', 'FZ S', 10, 'Very comfortable and smooth bike for daily commute.. You feel like a king when you will ride on this');

-- --------------------------------------------------------

--
-- Table structure for table `sell`
--

CREATE TABLE `sell` (
  `id` int(10) NOT NULL,
  `bikeid` int(10) NOT NULL,
  `name` varchar(20) NOT NULL,
  `bikename` varchar(20) NOT NULL,
  `ownership` int(20) NOT NULL,
  `model` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `km` int(20) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `description` varchar(800) NOT NULL,
  `address` varchar(100) NOT NULL,
  `State` varchar(20) NOT NULL,
  `city` varchar(20) NOT NULL,
  `image` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sell`
--

INSERT INTO `sell` (`id`, `bikeid`, `name`, `bikename`, `ownership`, `model`, `price`, `km`, `mobile`, `description`, `address`, `State`, `city`, `image`) VALUES
(5, 25, 'Gangaram Gaonkar', 'KTM RC 125', 1, 2017, 125000, 42000, '8956496767', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut nunc aliquam nisl viverra vehicula sed eget nisi. Sed sit amet fringilla elit, vel sodales lectus. Aenean lacus nibh, semper placerat diam dapibus, feugiat eleifend enim. Quisque eu tellus vestibulum nibh congue vehicula. Quisque eu felis aliquet, semper massa eget, feugiat nisi. Mauris eget accumsan ante. Nunc tempor dictum tortor ac feugiat.', 'Maker Chamber Vi, Nariman Point\r\nMumbai, Maharashtra, 400021', 'Maharashtra', 'Mumbai', 'image/KTM RC 125.jpg'),
(5, 26, 'Gangaram Gaonkar', 'BAJAJ DOMINAR 400', 1, 2019, 145000, 30000, '9637274449', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut nunc aliquam nisl viverra vehicula sed eget nisi. Sed sit amet fringilla elit, vel sodales lectus. Aenean lacus nibh, semper placerat diam dapibus, feugiat eleifend enim. Quisque eu tellus vestibulum nibh congue vehicula. Quisque eu felis aliquet, semper massa eget, feugiat nisi. Mauris eget accumsan ante. Nunc tempor dictum tortor ac feugiat.', 'Maker Chamber Vi, Nariman Point\r\nMumbai, Maharashtra, 400021', 'Maharashtra', 'Mumbai', 'image/BAJAJ DOMINAR 400.jpg'),
(9, 27, 'Santosh Ayare', 'FZ S', 1, 2018, 85000, 36000, '8545852585', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut nunc aliquam nisl viverra vehicula sed eget nisi. Sed sit amet fringilla elit, vel sodales lectus. Aenean lacus nibh, semper placerat diam dapibus, feugiat eleifend enim. Quisque eu tellus vestibulum nibh congue vehicula. Quisque eu felis aliquet, semper massa eget, feugiat nisi. Mauris eget accumsan ante. Nunc tempor dictum tortor ac feugiat.', 'New Budhwar Peth, Budhwar Peth\r\nPune, Maharashtra, 411002', 'Maharashtra', 'pune', 'image/FZ S.jpg'),
(10, 28, 'Archit pawar', 'TVS N-RQ 125', 2, 2018, 55000, 33000, '8758457965', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut nunc aliquam nisl viverra vehicula sed eget nisi. Sed sit amet fringilla elit, vel sodales lectus. Aenean lacus nibh, semper placerat diam dapibus, feugiat eleifend enim. Quisque eu tellus vestibulum nibh congue vehicula. Quisque eu felis aliquet, semper massa eget, feugiat nisi. Mauris eget accumsan ante. Nunc tempor dictum tortor ac feugiat.', '112-a, Group Indl Area, Wazirpur\r\nDelhi, Delhi, 110052', 'Delhi', 'Firozabad', 'image/TVS N-RQ 125.jpg'),
(11, 29, 'Ayaan Sanjeet Das', 'BULLET CLASSIC 350', 1, 2017, 150000, 49000, '9658475845', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut nunc aliquam nisl viverra vehicula sed eget nisi. Sed sit amet fringilla elit, vel sodales lectus. Aenean lacus nibh, semper placerat diam dapibus, feugiat eleifend enim. Quisque eu tellus vestibulum nibh congue vehicula. Quisque eu felis aliquet, semper massa eget, feugiat nisi. Mauris eget accumsan ante. Nunc tempor dictum tortor ac feugiat.', '4th Floor, Gandhi Palace, Nr Jain Derasar, B/h On-Off Showroom, Timaliyawad, Nanpura\r\nSurat, Gujarat', 'Gujarat', 'Surat', 'image/ROYAL ENFIELD CLASSIC 350.jpg'),
(12, 31, 'Rahul Gaonkar', 'YAMAHA MT15', 1, 2020, 135000, 15000, '8546857595', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut nunc aliquam nisl viverra vehicula sed eget nisi. Sed sit amet fringilla elit, vel sodales lectus. Aenean lacus nibh, semper placerat diam dapibus, feugiat eleifend enim. Quisque eu tellus vestibulum nibh congue vehicula. Quisque eu felis aliquet, semper massa eget, feugiat nisi. Mauris eget accumsan ante. Nunc tempor dictum tortor ac feugiat.', '1st Floor, LIG-684, Housing Board Colony, Sector-3, Ranjit Avenue, Jalandhar, Punjab, 143001', 'Punjab', 'Jalandhar', 'image/Yamaha mt15.jpg'),
(12, 33, 'Virat Gurav', 'PULSAR RS 200', 1, 2017, 100000, 65000, '8546857595', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Cras ut nunc aliquam nisl viverra vehicula sed eget nisi. Sed sit amet fringilla elit, vel sodales lectus. Aenean lacus nibh, semper placerat diam dapibus, feugiat eleifend enim. Quisque eu tellus vestibulum nibh congue vehicula. Quisque eu felis aliquet, semper massa eget, feugiat nisi. Mauris eget accumsan ante. Nunc tempor dictum tortor ac feugiat.', '1, 32,  Suprabatha Complex, Seshadri Road, Anand Rao Circle, Bangalore, Karnataka, 560011', 'Karnataka', 'Bangalore', 'image/BAJAJ PULSAR RS.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `create_datetime` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `create_datetime`) VALUES
(5, 'stoneheart_001', 'gaonkargangaram85@gmail.com', 'bd6a9e1a277202d9d628d85ef2519f79', '2022-02-26 13:32:58'),
(9, 'SantoshAyare', 'Santosh321@gmail.com', 'c469b7db734f75a8fa87cee93d87b371', '2022-03-01 15:05:53'),
(10, 'Archit_Pawar001', 'archit54@gmail.com', 'a4852972bca9f2adf950fde129b87f77', '2022-03-01 15:10:43'),
(11, 'AyaanSanjeetDas', 'Ayaan22@gmail.cm', 'eda872308bac49ea081e9fd78558be65', '2022-03-03 09:38:24'),
(12, 'Rahul', 'gaonkarrahul85@gmail.com', 'bd6a9e1a277202d9d628d85ef2519f79', '2022-03-03 12:20:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `sell`
--
ALTER TABLE `sell`
  ADD PRIMARY KEY (`bikeid`),
  ADD KEY `id` (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `fid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sell`
--
ALTER TABLE `sell`
  MODIFY `bikeid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `sell`
--
ALTER TABLE `sell`
  ADD CONSTRAINT `sell_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
