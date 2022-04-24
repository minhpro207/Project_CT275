-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 24, 2022 at 06:30 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop-database`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_table`
--

CREATE TABLE `admin_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `fullname` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_table`
--

INSERT INTO `admin_table` (`id`, `fullname`, `username`, `password`) VALUES
(21, '1', '1', 'c4ca4238a0b923820dcc509a6f75849b'),
(23, 'minh', 'minh', 'c4ca4238a0b923820dcc509a6f75849b');

-- --------------------------------------------------------

--
-- Table structure for table `category_table`
--

CREATE TABLE `category_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `img` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_table`
--

INSERT INTO `category_table` (`id`, `title`, `img`, `featured`, `active`) VALUES
(63, 'Fast Food', 'Food_category_626.jpeg', 'Yes', 'Yes'),
(65, 'Juice', 'Food_category_367.jpg', 'Yes', 'Yes'),
(67, 'Starchy food', 'Food_category_862.jpg', 'Yes', 'Yes'),
(68, 'Dessert', 'Food_category_411.jpg', 'Yes', 'Yes'),
(69, 'Lunch', 'Food_category_216.jfif', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `food_table`
--

CREATE TABLE `food_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `img` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_table`
--

INSERT INTO `food_table` (`id`, `title`, `description`, `price`, `img`, `category_id`, `featured`, `active`) VALUES
(10, 'Orange Juice', 'One of the best juice in the world', '2.00', 'Food_name_9898.webp', 65, 'Yes', 'Yes'),
(11, 'Apple Juice', 'One of the best juice in the world', '2.00', 'Food_name_7153.jpg', 65, 'No', 'Yes'),
(12, 'Watermelon Juice', 'One of the best juice in the world', '2.00', 'Food_name_6275.jpg', 65, 'No', 'Yes'),
(13, 'Chocolate Cake', 'One of the best dessert food in the world', '3.00', 'Food_name_8937.webp', 68, 'No', 'Yes'),
(14, 'Chocolate Flan', 'One of the best dersert food in the world', '3.00', 'Food_name_3494.jpg', 68, 'Yes', 'Yes'),
(15, 'Waffle', 'One of the best dersert food in the world', '5.00', 'Food_name_3629.webp', 68, 'No', 'Yes'),
(16, 'Chicken Noodle Soup', 'One of the best lunch in the world', '8.00', 'Food_name_8490.jpg', 69, 'No', 'Yes'),
(17, 'Taco Salad', 'One of the best lunch in the world', '8.00', 'Food_name_3500.jpg', 69, 'No', 'Yes'),
(18, 'Cauliflower Soup', 'One of the best lunch in the world', '11.00', 'Food_item_340.jpg', 69, 'Yes', 'Yes'),
(19, 'Burger', 'One of the best fast food in the world', '4.00', 'Food_name_8251.webp', 63, 'Yes', 'Yes'),
(20, 'Pizza', 'One of the best fast food in the world', '8.00', 'Food_name_3812.jpg', 63, 'Yes', 'Yes'),
(21, 'Taco', 'One of the best fast food in the world', '6.00', 'Food_name_4054.jpg', 63, 'Yes', 'Yes'),
(22, 'Chicken Nuggets', 'One of the best fast food in the world', '12.00', 'Food_name_5805.jpg', 63, 'No', 'Yes'),
(23, 'Tomato juice', 'One of the best juice in the world', '3.00', 'Food_name_7025.jpeg', 65, 'No', 'Yes'),
(24, 'Carrot juice', 'One of the best juice in the world', '2.00', 'Food_name_6293.jpg', 65, 'No', 'Yes'),
(25, 'Pineapple juice', 'One of the best juice in the world', '4.00', 'Food_name_6115.jpg', 65, 'No', 'Yes'),
(26, 'Pho', 'Top 1 Vietnamese food', '5.00', 'Food_name_1280.jpg', 69, 'No', 'Yes'),
(27, 'Ice cream', 'One of the best dessert in the world', '2.00', 'Food_name_7056.jpg', 68, 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `order_table`
--

CREATE TABLE `order_table` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `quantity` int(10) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_table`
--

INSERT INTO `order_table` (`id`, `food`, `price`, `quantity`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(8, 'Orange Juice', '2.00', 7, '14.00', '2022-04-24', 'Delivered', 'Trương Quốc Minh', '0939465116', 'minhb1910412@student.ctu.edu.vn', 'Sa Đéc'),
(9, 'Burger', '4.00', 2, '8.00', '2022-04-24', 'On Deliver', 'Trương Quốc Minh', '0939465116', 'minhb1910412@student.ctu.edu.vn', 'Sa Đéc');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_table`
--
ALTER TABLE `admin_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_table`
--
ALTER TABLE `category_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food_table`
--
ALTER TABLE `food_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_table`
--
ALTER TABLE `order_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_table`
--
ALTER TABLE `admin_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `category_table`
--
ALTER TABLE `category_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `food_table`
--
ALTER TABLE `food_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `order_table`
--
ALTER TABLE `order_table`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
