-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2022 at 03:10 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(100) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `brand_id` int(100) NOT NULL,
  `brand_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_tbl`
--

INSERT INTO `brand_tbl` (`brand_id`, `brand_title`) VALUES
(1, 'demo'),
(2, 'demo2'),
(3, 'demo3'),
(4, '2');

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_image` varchar(100) NOT NULL,
  `product_price` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `catagory_tbl`
--

CREATE TABLE `catagory_tbl` (
  `cata_id` int(255) NOT NULL,
  `cata_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `catagory_tbl`
--

INSERT INTO `catagory_tbl` (`cata_id`, `cata_title`) VALUES
(1, 'wooden'),
(2, 'metal'),
(3, '22'),
(4, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `oder_tbl`
--

CREATE TABLE `oder_tbl` (
  `id` int(100) NOT NULL,
  `user_id` int(255) NOT NULL,
  `payment_gateway_id` int(255) NOT NULL,
  `payment_status` int(100) NOT NULL,
  `status` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `oder_tbl`
--

INSERT INTO `oder_tbl` (`id`, `user_id`, `payment_gateway_id`, `payment_status`, `status`) VALUES
(1, 1, 2, 0, 1),
(2, 1, 2, 0, 1),
(3, 1, 1, 0, 1),
(4, 1, 2, 0, 1),
(5, 1, 2, 0, 1),
(6, 1, 2, 0, 1),
(7, 1, 2, 0, 1),
(8, 1, 2, 0, 1),
(9, 1, 2, 0, 1),
(10, 1, 2, 0, 1),
(11, 3, 2, 0, 1),
(12, 3, 1, 0, 1),
(13, 3, 1, 0, 1),
(14, 3, 1, 0, 1),
(15, 3, 2, 0, 1),
(16, 3, 1, 0, 1),
(17, 3, 1, 0, 1),
(18, 3, 1, 0, 1),
(19, 1, 2, 0, 1),
(20, 1, 1, 0, 1),
(21, 1, 2, 0, 1),
(22, 1, 2, 0, 1),
(23, 1, 2, 0, 1),
(24, 1, 1, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `orderitem_tbl`
--

CREATE TABLE `orderitem_tbl` (
  `Name` varchar(100) NOT NULL,
  `id` int(255) NOT NULL,
  `user_id` int(100) NOT NULL,
  `payment_gateway_id` int(100) NOT NULL,
  `payment_status` varchar(255) NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_item_tbl`
--

CREATE TABLE `order_item_tbl` (
  `id` int(100) NOT NULL,
  `order_id` int(100) NOT NULL,
  `product_id` int(100) NOT NULL,
  `inventory_id` int(100) NOT NULL,
  `qty` double NOT NULL,
  `price` double NOT NULL,
  `order_date` varchar(200) NOT NULL,
  `status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order_item_tbl`
--

INSERT INTO `order_item_tbl` (`id`, `order_id`, `product_id`, `inventory_id`, `qty`, `price`, `order_date`, `status`) VALUES
(1, 2, 16, 16, 1, 3, '2022-10-22', 1),
(2, 3, 16, 16, 1, 3, '2022-10-22', 1),
(3, 3, 15, 15, 1, 4, '2022-10-22', 1),
(4, 4, 16, 16, 1, 3, '2022-10-22', 1),
(5, 4, 15, 15, 1, 4, '2022-10-22', 1),
(6, 5, 16, 16, 1, 3, '2022-10-22', 1),
(7, 6, 16, 16, 1, 3, '2022-10-22', 1),
(8, 7, 16, 16, 1, 3, '2022-10-22', 1),
(9, 7, 17, 17, 1, 123, '2022-10-22', 1),
(10, 8, 17, 17, 1, 123, '2022-10-22', 1),
(11, 8, 16, 16, 1, 3, '2022-10-22', 1),
(12, 9, 16, 16, 1, 3, '2022-10-22', 1),
(13, 10, 15, 15, 2, 4, '13-12-2022 07:53:29', 1),
(14, 11, 17, 17, 1, 123, '14-12-2022 07:57:37', 1),
(15, 12, 17, 17, 1, 123, '2022-10-22', 1),
(16, 13, 17, 17, 1, 123, '2022-10-22', 1),
(17, 14, 17, 17, 1, 123, '2022-10-22', 1),
(18, 15, 17, 17, 1, 123, '14-12-2022 08:05:09', 1),
(19, 16, 17, 17, 1, 123, '2022-10-22', 1),
(20, 17, 17, 17, 1, 123, '2022-10-22', 1),
(21, 18, 17, 17, 1, 123, '2022-10-22', 1),
(22, 19, 16, 16, 1, 3, '15-12-2022 03:21:01', 1),
(23, 20, 16, 16, 1, 3, '2022-10-22', 1),
(24, 21, 23, 23, 1, 9, '25-12-2022 11:24:52', 1),
(25, 22, 23, 23, 1, 9, '25-12-2022 11:37:17', 1),
(26, 23, 23, 23, 1, 9, '25-12-2022 11:45:55', 1),
(27, 24, 24, 24, 1, 33, '2022-10-22', 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `id` int(100) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `cata_id` varchar(255) NOT NULL,
  `brand_id` varchar(255) NOT NULL,
  `p_disc` text NOT NULL,
  `p_image` varchar(30) NOT NULL,
  `p_price` bigint(200) NOT NULL,
  `p_quentity` varchar(255) NOT NULL,
  `p_status` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`id`, `product_name`, `cata_id`, `brand_id`, `p_disc`, `p_image`, `p_price`, `p_quentity`, `p_status`) VALUES
(14, ' q', '  1  ', '1 ', 'y ', 'arrivals1.png', 7, '7', 1),
(15, ' dhhjs', '  7', '5', 'oo', 'arrivals1.png', 4, '77', 1),
(16, ' ee', '  2  ', '4 ', 'ee ', 'arrivals1.png', 3, '2', 1),
(17, ' desk', '  1  ', '2 ', 'jiban ', 'arrivals1.png', 123, '2', 1),
(18, 'ii', '1', '2', '99 ', 'arrivals1.png', 99, '99', 1),
(19, 'jh', '2', '2', 'iu ', 'arrivals1.png', 99, '8', 1),
(20, '9', '2', '2', '9 ', 'arrivals1.png', 9, '9', 1),
(21, 'j', '3', '2', 'j ', 'arrivals1.png', 8, '8', 1),
(22, '9', '2', '3', 'o ', 'arrivals1.png', 0, '0', 1),
(23, '9', '2', ' ', ' ', 'arrivals1.png', 9, '0', 1),
(24, 'abc', '2', '2', 'abcddhk ', 'arrivals2.png', 33, '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `u_id` int(100) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `middleName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `MobileNumber` bigint(30) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `street` varchar(255) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `register_date` datetime(6) NOT NULL,
  `status` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`u_id`, `firstName`, `middleName`, `lastName`, `email`, `MobileNumber`, `gender`, `username`, `password`, `country`, `city`, `street`, `verification_code`, `register_date`, `status`) VALUES
(1, 'sudip', 'prasad', 'khanal', 'khanalsudip237@gmail.com', 9877777777, '', 'sudip', '12345', 'nepal', 'kathmandu', 'koteshor', '837534', '0000-00-00 00:00:00.000000', 0),
(2, 'sudip', 'jhg', 'yuuu', 'abc@gmail.com', 986789, '', 'kk', '7890', 'nepal', 'kathmandu', 'koteshor', '817639', '0000-00-00 00:00:00.000000', 0),
(3, 'jiban', 'bahadur', 'kumal', 'jiban2056@gmail.com', 9803674803, '', 'jibankm', 'jiban', 'mongolia', 'dang', 'pakhapani', '640774', '0000-00-00 00:00:00.000000', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `catagory_tbl`
--
ALTER TABLE `catagory_tbl`
  ADD PRIMARY KEY (`cata_id`);

--
-- Indexes for table `oder_tbl`
--
ALTER TABLE `oder_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderitem_tbl`
--
ALTER TABLE `orderitem_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_item_tbl`
--
ALTER TABLE `order_item_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `catagory_tbl`
--
ALTER TABLE `catagory_tbl`
  MODIFY `cata_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `oder_tbl`
--
ALTER TABLE `oder_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orderitem_tbl`
--
ALTER TABLE `orderitem_tbl`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_item_tbl`
--
ALTER TABLE `order_item_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `u_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
