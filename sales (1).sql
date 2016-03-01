-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 12, 2016 at 01:12 PM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sales`
--

-- --------------------------------------------------------

--
-- Table structure for table `indus_brand`
--

CREATE TABLE IF NOT EXISTS `indus_brand` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(300) NOT NULL,
  `brand_user_id` varchar(50) NOT NULL,
  `brand_address` text NOT NULL,
  `brand_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `brand_url` varchar(100) NOT NULL,
  `brand_display_order` int(5) NOT NULL,
  `brand_created_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indus_client`
--

CREATE TABLE IF NOT EXISTS `indus_client` (
  `id` int(11) NOT NULL,
  `client_name` varchar(300) NOT NULL,
  `client_user_id` varchar(50) NOT NULL,
  `client_address` text NOT NULL,
  `client_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `client_display_order` int(5) NOT NULL,
  `client_created_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indus_invoice_document`
--

CREATE TABLE IF NOT EXISTS `indus_invoice_document` (
  `id` int(11) NOT NULL,
  `invoice_document_name` varchar(300) NOT NULL,
  `invoice_no_of_records` int(5) NOT NULL,
  `invoice_created_date` int(11) NOT NULL,
  `invoice_url` varchar(150) NOT NULL,
  `invoice_document_status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indus_invoice_orders`
--

CREATE TABLE IF NOT EXISTS `indus_invoice_orders` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `sales_document_id` int(11) NOT NULL,
  `order_url` varchar(100) NOT NULL,
  `submitted_date` int(11) NOT NULL,
  `date` date NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_status` int(5) NOT NULL DEFAULT '1',
  `total_price` decimal(11,2) NOT NULL,
  `sales_representative_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indus_invoice_order_items`
--

CREATE TABLE IF NOT EXISTS `indus_invoice_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indus_orders`
--

CREATE TABLE IF NOT EXISTS `indus_orders` (
  `id` int(11) NOT NULL,
  `invoice_id` varchar(50) NOT NULL,
  `order_url` varchar(100) NOT NULL,
  `submitted_date` int(11) NOT NULL,
  `client_id` int(11) NOT NULL,
  `order_status` int(5) NOT NULL DEFAULT '1',
  `total_price` decimal(11,2) NOT NULL,
  `sales_representative_id` int(11) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indus_order_items`
--

CREATE TABLE IF NOT EXISTS `indus_order_items` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(5,2) NOT NULL,
  `price` decimal(11,2) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `sales_document_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `indus_product`
--

CREATE TABLE IF NOT EXISTS `indus_product` (
  `id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(300) NOT NULL,
  `product_user_id` varchar(50) NOT NULL,
  `product_description` text NOT NULL,
  `product_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `product_url` varchar(100) NOT NULL,
  `product_created_date` int(11) NOT NULL,
  `um_id` varchar(100) NOT NULL,
  `unit_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indus_sales_document`
--

CREATE TABLE IF NOT EXISTS `indus_sales_document` (
  `id` int(11) NOT NULL,
  `sales_document_name` varchar(300) NOT NULL,
  `sales_no_of_records` int(5) NOT NULL,
  `sales_created_date` int(11) NOT NULL,
  `sales_url` varchar(150) NOT NULL,
  `sales_document_status` enum('Y','N') NOT NULL DEFAULT 'N',
  `sales_document_not_inserted` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indus_sales_report_type`
--

CREATE TABLE IF NOT EXISTS `indus_sales_report_type` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indus_sales_report_type`
--

INSERT INTO `indus_sales_report_type` (`id`, `name`) VALUES
(1, 'User'),
(2, 'Brand'),
(3, 'Client');

-- --------------------------------------------------------

--
-- Table structure for table `indus_sales_representative`
--

CREATE TABLE IF NOT EXISTS `indus_sales_representative` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `sales_representative_name` varchar(300) NOT NULL,
  `sales_representative_user_id` varchar(50) NOT NULL,
  `sales_representative_address` text NOT NULL,
  `sales_representative_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sales_representative_url` varchar(100) NOT NULL,
  `sales_representative_display_order` int(5) NOT NULL,
  `sales_representative_created_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indus_shop`
--

CREATE TABLE IF NOT EXISTS `indus_shop` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(300) NOT NULL,
  `shop_user_id` varchar(50) NOT NULL,
  `shop_address` text NOT NULL,
  `shop_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `shop_url` varchar(100) NOT NULL,
  `shop_display_order` int(5) NOT NULL,
  `shop_created_date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `indus_users`
--

CREATE TABLE IF NOT EXISTS `indus_users` (
  `users_id` int(5) NOT NULL,
  `users_usertype` int(5) NOT NULL,
  `users_full_name` varchar(300) NOT NULL,
  `users_phone` varchar(100) NOT NULL,
  `users_display_order` int(5) NOT NULL,
  `users_active` enum('Y','N') NOT NULL DEFAULT 'N',
  `users_email` varchar(100) NOT NULL,
  `users_address` text NOT NULL,
  `users_password` varchar(150) NOT NULL,
  `users_username` varchar(100) NOT NULL,
  `users_image` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_users`
--

INSERT INTO `indus_users` (`users_id`, `users_usertype`, `users_full_name`, `users_phone`, `users_display_order`, `users_active`, `users_email`, `users_address`, `users_password`, `users_username`, `users_image`) VALUES
(1, 1, 'admin', '9037270454', 0, 'Y', 'sibin@easysoftindia.com', 'address', 'ba3126193fb3bc71361f81f14925ffd9', 'admin', 'DSC09870.jpg'),
(17, 2, '', '', 0, 'N', '', '', 'dc96a13f47bd81aed3eaf44203d11a14', 'fghgfh', ''),
(18, 2, 'ww', '', 0, 'Y', '', '', '7fb34d04aa12368c10bf8bd78c3c2d01', 'ss', ''),
(19, 2, 'dfg', '', 0, 'Y', '', '', '44aee6d447e2ca7e37cdebe6efa3142c', 'dfgdfgd', '');

-- --------------------------------------------------------

--
-- Table structure for table `indus_usertype`
--

CREATE TABLE IF NOT EXISTS `indus_usertype` (
  `usertype_id` int(11) NOT NULL,
  `usertype_title` varchar(200) NOT NULL,
  `usertype_display_order` int(11) NOT NULL,
  `usertype_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `usertype_date` int(11) NOT NULL,
  `usertype_created_id` int(11) NOT NULL,
  `usertype_created_date` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_usertype`
--

INSERT INTO `indus_usertype` (`usertype_id`, `usertype_title`, `usertype_display_order`, `usertype_status`, `usertype_date`, `usertype_created_id`, `usertype_created_date`) VALUES
(1, 'Administrator', 1, 'Y', 0, 0, 0),
(2, 'Users', 2, 'Y', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indus_brand`
--
ALTER TABLE `indus_brand`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_client`
--
ALTER TABLE `indus_client`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_invoice_document`
--
ALTER TABLE `indus_invoice_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_invoice_orders`
--
ALTER TABLE `indus_invoice_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_invoice_order_items`
--
ALTER TABLE `indus_invoice_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_orders`
--
ALTER TABLE `indus_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_order_items`
--
ALTER TABLE `indus_order_items`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_product`
--
ALTER TABLE `indus_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_sales_document`
--
ALTER TABLE `indus_sales_document`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_sales_report_type`
--
ALTER TABLE `indus_sales_report_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_sales_representative`
--
ALTER TABLE `indus_sales_representative`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_shop`
--
ALTER TABLE `indus_shop`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `indus_users`
--
ALTER TABLE `indus_users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `indus_usertype`
--
ALTER TABLE `indus_usertype`
  ADD PRIMARY KEY (`usertype_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indus_brand`
--
ALTER TABLE `indus_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_client`
--
ALTER TABLE `indus_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_invoice_document`
--
ALTER TABLE `indus_invoice_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_invoice_orders`
--
ALTER TABLE `indus_invoice_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_invoice_order_items`
--
ALTER TABLE `indus_invoice_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_orders`
--
ALTER TABLE `indus_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_order_items`
--
ALTER TABLE `indus_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_product`
--
ALTER TABLE `indus_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_sales_document`
--
ALTER TABLE `indus_sales_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_sales_report_type`
--
ALTER TABLE `indus_sales_report_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `indus_sales_representative`
--
ALTER TABLE `indus_sales_representative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_shop`
--
ALTER TABLE `indus_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `indus_users`
--
ALTER TABLE `indus_users`
  MODIFY `users_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `indus_usertype`
--
ALTER TABLE `indus_usertype`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
