-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2020 at 09:42 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.3.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `foodshala`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(255) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `cname` varchar(100) NOT NULL,
  `dish` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `price` float NOT NULL,
  `preference` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `rname`, `cname`, `dish`, `quantity`, `price`, `preference`) VALUES
(1, 'Bawarchi', 'Sharik U Zama', 'Kadai Panner', 2, 500, 'Vegetarian'),
(2, 'Angara', 'Sharik U Zama', 'Chole bhature', 1, 60, 'Vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `cregistration`
--

CREATE TABLE `cregistration` (
  `id` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `password` varchar(60) NOT NULL,
  `cpassword` varchar(60) NOT NULL,
  `preference` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cregistration`
--

INSERT INTO `cregistration` (`id`, `name`, `email`, `password`, `cpassword`, `preference`) VALUES
(1, 'Sharik U Zama', 'sidsharik@gmail.com', '$2y$10$gO6VfpgK9kwQHF1JWiyquu1Uf/MQfv.BlnCyQ/EQNJdZcbZbR7MVC', '$2y$10$WGNPS7bedBbtECJ7Ig7VNuSXO8q.fjARWEbZgfgoLaXp9Ev8tsr4O', 'Vegetarian'),
(2, 'Fariyal Ajrad', 'ajradfariyal@gmail.com', '$2y$10$ZqtojqgV7RX.SMNqeIZsQudYnZoc4UhlPhIRvZTLUB9eCmHHGlLvq', '$2y$10$o1Dor7.yLSP2nirgk2ukcuZkkLp0ukk3Z8yxaMifVLBPiv4baqcK2', 'Vegetarian');

-- --------------------------------------------------------

--
-- Table structure for table `menuitems`
--

CREATE TABLE `menuitems` (
  `id` int(255) NOT NULL,
  `name` varchar(200) NOT NULL,
  `restname` varchar(255) NOT NULL,
  `price` varchar(10) NOT NULL,
  `quantity` varchar(200) NOT NULL,
  `preference` varchar(100) NOT NULL,
  `isrestaurent` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `menuitems`
--

INSERT INTO `menuitems` (`id`, `name`, `restname`, `price`, `quantity`, `preference`, `isrestaurent`) VALUES
(1, 'Chicken biryani', 'Bawarchi', '280', '1', 'Non-Vegetarian', ''),
(2, 'Kadai Panner', 'Bawarchi', '250', '0', 'Vegetarian', ''),
(3, 'Jelly', 'Bawarchi', '50', '2', 'Vegetarian', ''),
(4, 'Chole bhature', 'Angara', '60', '9', 'Vegetarian', ''),
(5, 'Kulfi', 'Angara', '12', '10', 'Vegetarian', ''),
(6, 'Chicken Masala', 'Bawarchi', '250', '10', 'Non-Vegetarian', '');

-- --------------------------------------------------------

--
-- Table structure for table `rregistration`
--

CREATE TABLE `rregistration` (
  `id` int(11) NOT NULL,
  `rname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `rpassword` varchar(100) NOT NULL,
  `cpassword` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rregistration`
--

INSERT INTO `rregistration` (`id`, `rname`, `email`, `rpassword`, `cpassword`) VALUES
(1, 'Bawarchi', 'bawarchi@gmail.com', '$2y$10$hGd4EyAxNPdlDaytOwXLQu8MYQbgdia0p4EXRECaBgsdQqRdbssLq', '$2y$10$g9cxf4ZxjnvrkXk2MhCfq.//jUFbHQwbjxIlcQYlBYR5L6J93hBaa'),
(2, 'Angara', 'angara@gmail.com', '$2y$10$SWo0U4tu0/AkwKT3qgrnj.CBiEmPQY9aoQfp6CQjmqVbOJ.qS2/o.', '$2y$10$BxH0afux1nlRLPdFv20YlOXgQLNip98NIwnRHpB9vB1RDQQQwpU76'),
(3, 'Angara', 'angara@gmail.coma', '$2y$10$Dk0P2obUaeiqjWB/dwZlSOhjtDbjqPX0X4k.P0b/uaxbYIqhpaNj.', '$2y$10$bzZz1npTxipGDHrv2Ti0VeeSs2wlfH7nU4RmOMDDP/orUYHmQWFaO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cregistration`
--
ALTER TABLE `cregistration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menuitems`
--
ALTER TABLE `menuitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rregistration`
--
ALTER TABLE `rregistration`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cregistration`
--
ALTER TABLE `cregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `menuitems`
--
ALTER TABLE `menuitems`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `rregistration`
--
ALTER TABLE `rregistration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
