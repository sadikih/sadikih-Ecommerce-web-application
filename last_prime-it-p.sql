-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2022 at 12:25 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `last_prime-it-p`
--

-- --------------------------------------------------------

--
-- Table structure for table `addtocart`
--

CREATE TABLE `addtocart` (
  `addtocart_sl_id` int(5) NOT NULL,
  `addtocart_invoice_id` varchar(100) NOT NULL,
  `addtocart_prod_id` varchar(50) NOT NULL,
  `addtocart_prod_name` varchar(100) NOT NULL,
  `addtocart_prod_img` text NOT NULL,
  `addtocart_prod_quantity` int(2) NOT NULL,
  `addtocart_prod_price` float NOT NULL,
  `addtocart_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `addtocart`
--

INSERT INTO `addtocart` (`addtocart_sl_id`, `addtocart_invoice_id`, `addtocart_prod_id`, `addtocart_prod_name`, `addtocart_prod_img`, `addtocart_prod_quantity`, `addtocart_prod_price`, `addtocart_time`) VALUES
(5, '1a3878h14nt9tggrkltuj1qdmp', 'MTS03201813001', 'Pink Color T-Shirt', 'images/products/men/t-shirt/mts032018130011520920691t_shirt1.jpg', 1, 250, '2021-12-21 20:44:38');

-- --------------------------------------------------------

--
-- Table structure for table `admin_access`
--

CREATE TABLE `admin_access` (
  `sl_id` int(2) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(100) NOT NULL,
  `admin_pass` varchar(100) NOT NULL,
  `admin_role` varchar(20) NOT NULL,
  `create_admin` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_access`
--

INSERT INTO `admin_access` (`sl_id`, `admin_name`, `admin_email`, `admin_pass`, `admin_role`, `create_admin`) VALUES
(6, 'sadiki', 'me@gmail.com', '1234', 'root_admin', '2021-12-21 18:21:19'),
(7, 'kira', 'kira@gmail.com', '123', 'admin', '2021-12-21 18:49:17');

-- --------------------------------------------------------

--
-- Table structure for table `all_products`
--

CREATE TABLE `all_products` (
  `prod_id` int(5) NOT NULL,
  `prod_code` varchar(20) NOT NULL,
  `prod_name` varchar(100) NOT NULL,
  `prod_price` float NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_avail` int(4) NOT NULL,
  `prod_img` text NOT NULL,
  `prod_main_id` int(2) NOT NULL,
  `prod_sub_id` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `all_products`
--

INSERT INTO `all_products` (`prod_id`, `prod_code`, `prod_name`, `prod_price`, `prod_desc`, `prod_avail`, `prod_img`, `prod_main_id`, `prod_sub_id`) VALUES
(1, 'MTS03201813001', 'Pink Color T-Shirt', 250, 'Pink Color Rounded neck t-shirt.', 10, 'images/products/men/t-shirt/mts032018130011520920691t_shirt1.jpg', 6, 6),
(2, 'MTS03201813002', 'Black Spider T-shirt', 150, 'Black Rounded Neck T-shirt', 10, 'images/products/men/t-shirt/mts032018130021520922547t_shirt4.jpg', 6, 6),
(3, 'KS04201815003', 'Sports Shoes', 1200, 'Sports Shoes Sports Shoes Sports Shoes Sports Shoes', 10, 'images/products/kids/shoes/ks042018150031523770457shoes01.jpg', 8, 7),
(4, 'KS04201815004', 'Addidash Sports Shoes', 2500, ' Addidash Sports Shoes Addidash Sports Shoes Addidash Sports Shoes Addidash Sports Shoes', 20, 'images/products/kids/shoes/ks042018150041523770500shoes02.jpg', 8, 7);

-- --------------------------------------------------------

--
-- Table structure for table `applicant_reg`
--

CREATE TABLE `applicant_reg` (
  `sl_id` int(5) NOT NULL,
  `applicant_name` varchar(100) NOT NULL,
  `applicant_email` varchar(100) NOT NULL,
  `applicant_phone` varchar(18) NOT NULL,
  `applicant_gender` varchar(4) NOT NULL,
  `applicant_dob` varchar(11) NOT NULL,
  `applicant_nationality` varchar(20) NOT NULL,
  `applicant_nid_bc` varchar(25) NOT NULL,
  `applicant_relg` varchar(10) NOT NULL,
  `applicant_bgroup` varchar(5) NOT NULL,
  `applicant_div` varchar(20) NOT NULL,
  `applicant_mstatus` varchar(10) NOT NULL,
  `applicant_course` varchar(100) NOT NULL,
  `applicant_addr` text NOT NULL,
  `applicant_uname` varchar(50) NOT NULL,
  `applicant_pwd` varchar(50) NOT NULL,
  `applicant_agreement` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `main_category`
--

CREATE TABLE `main_category` (
  `sl_id` int(3) NOT NULL,
  `main_categ_name` varchar(50) NOT NULL,
  `main_categ_folder` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `main_category`
--

INSERT INTO `main_category` (`sl_id`, `main_categ_name`, `main_categ_folder`) VALUES
(13, 'women', 'women'),
(14, 'children', 'children'),
(15, 'MaIe', 'maie'),
(16, 'pet', 'pet');

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

CREATE TABLE `sub_category` (
  `sl_id` int(3) NOT NULL,
  `sub_categ_name` varchar(100) NOT NULL,
  `sub_categ_folder` varchar(100) NOT NULL,
  `main_categ_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`sl_id`, `sub_categ_name`, `sub_categ_folder`, `main_categ_id`) VALUES
(6, 'T-Shirt', 't-shirt', 6),
(7, 'Shoes', 'shoes', 8),
(8, 'trouser', 'trouser', 6),
(9, 'bra', 'bra', 7),
(10, 'bra', 'bra', 7),
(11, 'trouser', 'trouser', 7),
(12, 'dogs', 'dogs', 9),
(13, 'cat', 'cat', 9),
(14, 'others', 'others', 9),
(15, 'formal', 'formal', 6),
(16, 'casual', 'casual', 6),
(17, 'sports', 'sports', 6),
(18, 'formal', 'formal', 7),
(19, 'formal', 'formal', 7),
(20, 'formal', 'formal', 11),
(21, 'formal', 'formal', 12),
(22, 'casual', 'casual', 12),
(23, 'sports', 'sports', 12),
(24, 'cats', 'cats', 9),
(25, 'other', 'other', 9),
(26, 'formal', 'formal', 13),
(27, 'casual', 'casual', 13),
(28, 'sports', 'sports', 13),
(29, 'sports', 'sports', 15),
(30, 'formal', 'formal', 15),
(31, 'casual', 'casual', 15),
(32, 'formal', 'formal', 14),
(33, 'casual', 'casual', 14),
(34, 'sports', 'sports', 14),
(35, 'dogs', 'dogs', 16),
(36, 'cats', 'cats', 16),
(37, 'others', 'others', 16);

-- --------------------------------------------------------

--
-- Table structure for table `user_access`
--

CREATE TABLE `user_access` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(100) NOT NULL,
  `u_email` varchar(100) NOT NULL,
  `u_phone` varchar(20) NOT NULL,
  `u_address` text NOT NULL,
  `u_pass` varchar(50) NOT NULL,
  `u_create` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_access`
--

INSERT INTO `user_access` (`u_id`, `u_name`, `u_email`, `u_phone`, `u_address`, `u_pass`, `u_create`) VALUES
(11, 'me ', 'me@gmail.com', '6512', 'sds', 'sad', '2021-12-21 18:42:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_cart`
--

CREATE TABLE `user_cart` (
  `cart_id` int(11) NOT NULL,
  `invoice_id` varchar(100) NOT NULL,
  `user_id` int(4) NOT NULL,
  `product_code` varchar(30) NOT NULL,
  `product_quantity` int(2) NOT NULL,
  `product_discount` float NOT NULL,
  `service_charge` float NOT NULL,
  `delivery_c_number` varchar(20) NOT NULL,
  `delivery_address` text NOT NULL,
  `payment_method` varchar(20) NOT NULL,
  `payment_s_number` varchar(20) NOT NULL,
  `payment_tid` int(30) NOT NULL,
  `cart_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_cart`
--

INSERT INTO `user_cart` (`cart_id`, `invoice_id`, `user_id`, `product_code`, `product_quantity`, `product_discount`, `service_charge`, `delivery_c_number`, `delivery_address`, `payment_method`, `payment_s_number`, `payment_tid`, `cart_time`) VALUES
(8, '1a3878h14nt9tggrkltuj1qdmp', 11, 'MTS03201813001', 1, 10, 150, '233', 's', 'homedelivery', '0', 0, '2021-12-21 18:42:44'),
(9, 'd1kbo5mg9kmjddv5bp0l6evgo0', 11, 'MTS03201813001', 1, 10, 150, '2345', 'sadiki', 'homedelivery', '0', 0, '2022-01-07 18:40:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addtocart`
--
ALTER TABLE `addtocart`
  ADD PRIMARY KEY (`addtocart_sl_id`);

--
-- Indexes for table `admin_access`
--
ALTER TABLE `admin_access`
  ADD PRIMARY KEY (`sl_id`),
  ADD UNIQUE KEY `admin_email` (`admin_email`);

--
-- Indexes for table `all_products`
--
ALTER TABLE `all_products`
  ADD PRIMARY KEY (`prod_id`),
  ADD UNIQUE KEY `prod_code` (`prod_code`);

--
-- Indexes for table `applicant_reg`
--
ALTER TABLE `applicant_reg`
  ADD PRIMARY KEY (`sl_id`),
  ADD UNIQUE KEY `applicant_email` (`applicant_email`);

--
-- Indexes for table `main_category`
--
ALTER TABLE `main_category`
  ADD PRIMARY KEY (`sl_id`),
  ADD UNIQUE KEY `main_categ_name` (`main_categ_name`);

--
-- Indexes for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`sl_id`);

--
-- Indexes for table `user_access`
--
ALTER TABLE `user_access`
  ADD PRIMARY KEY (`u_id`),
  ADD UNIQUE KEY `u_email` (`u_email`);

--
-- Indexes for table `user_cart`
--
ALTER TABLE `user_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addtocart`
--
ALTER TABLE `addtocart`
  MODIFY `addtocart_sl_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin_access`
--
ALTER TABLE `admin_access`
  MODIFY `sl_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `all_products`
--
ALTER TABLE `all_products`
  MODIFY `prod_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `applicant_reg`
--
ALTER TABLE `applicant_reg`
  MODIFY `sl_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `main_category`
--
ALTER TABLE `main_category`
  MODIFY `sl_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `sl_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `user_access`
--
ALTER TABLE `user_access`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_cart`
--
ALTER TABLE `user_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
