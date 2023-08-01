-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2022 at 09:16 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fonimonosha`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `sl` int(11) NOT NULL,
  `d_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `p_date` varchar(255) NOT NULL,
  `total` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`sl`, `d_id`, `email`, `p_date`, `total`) VALUES
(92, '11be089fa1509d62dd88bfe3e0cb1b88', 'Adnin@gmail.com', '01:26:am  |  24-12-2022', '315300');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `o_price` double(10,2) NOT NULL,
  `n_price` double(10,2) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `description1` varchar(500) NOT NULL,
  `description2` varchar(500) NOT NULL,
  `description3` varchar(500) NOT NULL,
  `type` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stock` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `image`, `name`, `o_price`, `n_price`, `brand`, `description1`, `description2`, `description3`, `type`, `category`, `stock`) VALUES
(1, 'Product//Plants//tomato_plant.jpg', 'Tomato Plant', 4000.00, 40000.00, 'Adnin Com', 'fg', '', '', 'Plant', 'Vegetable', 20),
(2, 'Product//Plants//mint_plant.jpg', 'Mint Plant', 40000.00, 35000.00, 'Adnin Com', 'd', '', '', 'Plant', 'Vegetble', 15),
(3, 'Product//Plants//jade_plant.jpeg', 'Jade Plant', 90000.00, 82000.00, 'Adnin Com', 'fr', 'vd', 'fvvd', 'Plant', 'Decorative', 10),
(4, 'Product//Plants//spider_plant.jpg', 'Spider Plant', 400.00, 400.00, 'Adnin Com', 'vfdf', 'vs', 'vfd', 'Plant', 'Decorative', 12),
(5, 'Product//Instrument//pot.jpg', 'Watering Can', 210.00, 200.00, 'RFL', 'fddf', 'vfdf', 'dcsdv', 'Instrument', 'Water Jar', 5),
(6, 'Product//Instrument//shovel.jpg', 'Shovel', 120000.00, 105000.00, 'RFL', 'fdfd', 'fg', 'fd', 'Instrument', 'Water Jar', 15),
(28, 'Product//Fertilizer//joibo_sar.png', 'Joibo Shar', 500.00, 450.00, 'ACI', 'Green ', 'sdgv', '', 'Fertilizer', 'Organic', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `signup_date` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `signup_date`, `image`) VALUES
(2, 'admin', 'admin', 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '2021-11-28', 'images/profile_pics/defaults/head_emerald.png'),
(16, 'Fairooz', 'Nawar', 'fairooz_nawar', 'Adnin@gmail.com', '06f0d48cb3141d4c12ff771ada148cb5', '2022-12-24', 'images/profile_pics/defaults/head_deep_blue.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`sl`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `sl` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
