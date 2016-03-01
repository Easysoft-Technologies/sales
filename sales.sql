-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2016 at 07:42 AM
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
-- Table structure for table `indus_branch`
--

CREATE TABLE IF NOT EXISTS `indus_branch` (
  `branch_id` int(11) NOT NULL,
  `branch_title` varchar(200) NOT NULL,
  `branch_display_order` int(11) NOT NULL,
  `branch_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `branch_date` int(11) NOT NULL,
  `branch_created_id` int(11) NOT NULL,
  `branch_created_date` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_branch`
--

INSERT INTO `indus_branch` (`branch_id`, `branch_title`, `branch_display_order`, `branch_status`, `branch_date`, `branch_created_id`, `branch_created_date`) VALUES
(1, 'Main Branch', 1, 'Y', 0, 3, 1418991208),
(2, 'Aluva', 2, 'Y', 0, 3, 1418988740),
(3, 'Angamaly', 3, 'Y', 0, 3, 1418988748);

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_brand`
--

INSERT INTO `indus_brand` (`id`, `brand_name`, `brand_user_id`, `brand_address`, `brand_status`, `brand_url`, `brand_display_order`, `brand_created_date`) VALUES
(2, 'dfg', 'dfgf', 'dfg', 'Y', '', 0, 1453445462),
(3, '', '40000SSD', '', 'Y', '', 0, 1453712319),
(4, '', '40000JI', '', 'Y', '', 0, 1453712319);

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
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_client`
--

INSERT INTO `indus_client` (`id`, `client_name`, `client_user_id`, `client_address`, `client_status`, `client_display_order`, `client_created_date`) VALUES
(14, 'Supercare Jumairah Phy', '103AKP', '', 'Y', 0, 1453439457),
(15, 'Al Barari Firm Management L.L.C', '01ABFM', '', 'Y', 0, 1453439617);

-- --------------------------------------------------------

--
-- Table structure for table `indus_orders`
--

CREATE TABLE IF NOT EXISTS `indus_orders` (
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
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indus_orders`
--

INSERT INTO `indus_orders` (`id`, `invoice_id`, `sales_document_id`, `order_url`, `submitted_date`, `date`, `client_id`, `order_status`, `total_price`, `sales_representative_id`) VALUES
(42, 'DC95141', 14, 'a1d0c6e83f027327d8461063f4ac58a6', 1454043159, '2015-01-04', 14, 1, '0.00', 5),
(43, 'DC95142', 14, '17e62166fc8586dfa4d1bc0e1742c08b', 1454043159, '2015-01-04', 15, 1, '0.00', 6);

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
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `indus_order_items`
--

INSERT INTO `indus_order_items` (`id`, `order_id`, `product_id`, `quantity`, `price`, `total`) VALUES
(26, 42, 4, '1.00', '390.00', '390.00'),
(27, 42, 5, '1.00', '209.00', '209.00'),
(28, 43, 6, '1.00', '625.00', '625.00'),
(29, 43, 7, '1.00', '425.00', '425.00'),
(30, 43, 8, '1.00', '475.00', '475.00');

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
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_product`
--

INSERT INTO `indus_product` (`id`, `brand_id`, `product_name`, `product_user_id`, `product_description`, `product_status`, `product_url`, `product_created_date`, `um_id`, `unit_price`) VALUES
(2, 2, 'dsf', 'sdf', '345', 'Y', '', 1453700861, '345', '34534.00'),
(3, 2, 'gfh', 'fgh', 'fghgf', 'Y', '', 1453701646, 'fgh', '0.00'),
(4, 0, '', 'D103605', 'Super Rich 1.7oz (R)', 'Y', '', 1453712368, '75ml', '390.00'),
(5, 0, '', 'D110652', 'Sheer Tint Medium, 1.3oz (40ml)', 'Y', '', 1453712387, '<Each>', '209.00'),
(6, 0, '', 'J60090480', 'BGF FLD- Compact Frame- logo Mirror', 'Y', '', 1453712387, '0', '625.00'),
(7, 0, '', 'J60060551', 'BG Tst Set Blush 12', 'Y', '', 1453712387, '0', '425.00'),
(8, 0, '', 'J60060562', 'BG Tst Set Lash & Eye 12', 'Y', '', 1453712387, '0', '475.00');

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
  `sales_document_status` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_sales_document`
--

INSERT INTO `indus_sales_document` (`id`, `sales_document_name`, `sales_no_of_records`, `sales_created_date`, `sales_url`, `sales_document_status`) VALUES
(12, 'Untitled_spreadsheet_-_Sheet132.csv', 5, 1453882819, '858cdce9008df4a8459e3ff294c9cb22', 'N'),
(13, 'Untitled_spreadsheet_-_Sheet142.csv', 0, 1453883997, '32fb7427baf148e794f028030e1de79a', 'N'),
(14, 'Untitled_spreadsheet_-_Sheet161.csv', 5, 1454043159, 'dddebbfe55a1ea4f0eea6c958071a18f', 'N');

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
  `sales_representative_name` varchar(300) NOT NULL,
  `sales_representative_user_id` varchar(50) NOT NULL,
  `sales_representative_address` text NOT NULL,
  `sales_representative_status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `sales_representative_url` varchar(100) NOT NULL,
  `sales_representative_display_order` int(5) NOT NULL,
  `sales_representative_created_date` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_sales_representative`
--

INSERT INTO `indus_sales_representative` (`id`, `sales_representative_name`, `sales_representative_user_id`, `sales_representative_address`, `sales_representative_status`, `sales_representative_url`, `sales_representative_display_order`, `sales_representative_created_date`) VALUES
(5, 'sibin', 'NS', '', 'Y', '', 0, 1453962086),
(6, 'arun', 'KXAN', '', 'Y', '', 0, 1453962095);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_shop`
--

INSERT INTO `indus_shop` (`id`, `shop_name`, `shop_user_id`, `shop_address`, `shop_status`, `shop_url`, `shop_display_order`, `shop_created_date`) VALUES
(3, 'temp1', '', '', 'Y', 'temp1', 1, 0),
(6, 'dfg', '', '', 'Y', 'dfg', 4, 0);

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
  `users_content` varchar(500) NOT NULL,
  `users_active` enum('Y','N') NOT NULL DEFAULT 'N',
  `users_active_date` int(11) NOT NULL,
  `users_active_by` int(11) NOT NULL,
  `users_email` varchar(100) NOT NULL,
  `users_address` text NOT NULL,
  `users_password` varchar(150) NOT NULL,
  `users_username` varchar(100) NOT NULL,
  `users_branch` int(5) NOT NULL,
  `users_image` varchar(150) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_users`
--

INSERT INTO `indus_users` (`users_id`, `users_usertype`, `users_full_name`, `users_phone`, `users_display_order`, `users_content`, `users_active`, `users_active_date`, `users_active_by`, `users_email`, `users_address`, `users_password`, `users_username`, `users_branch`, `users_image`) VALUES
(13, 1, 'admin', '9037270454', 0, '', 'Y', 1419065620, 15, 'sibin@easysoftindia.com', 'address', '162a96194fe9479ecb63901ec1288d7c', 'admin', 1, 'DSC09870.jpg'),
(15, 1, 'sibin', '9037270454', 0, '', 'Y', 1419065593, 13, 'admin1@admin.com', 'address', '162a96194fe9479ecb63901ec1288d7c', 'admin1', 135, ''),
(16, 1, 'dfds', 'dfg', 0, '', 'N', 0, 0, 'sdf@dfsdf.com', 'dfgdfg', 'c639c777d1e43102a28aa1d7f04629ae', 'fsdf', 1, '');

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
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;

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
-- Indexes for table `indus_branch`
--
ALTER TABLE `indus_branch`
  ADD PRIMARY KEY (`branch_id`);

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
-- AUTO_INCREMENT for table `indus_branch`
--
ALTER TABLE `indus_branch`
  MODIFY `branch_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `indus_brand`
--
ALTER TABLE `indus_brand`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `indus_client`
--
ALTER TABLE `indus_client`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `indus_orders`
--
ALTER TABLE `indus_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=44;
--
-- AUTO_INCREMENT for table `indus_order_items`
--
ALTER TABLE `indus_order_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `indus_product`
--
ALTER TABLE `indus_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `indus_sales_document`
--
ALTER TABLE `indus_sales_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `indus_sales_report_type`
--
ALTER TABLE `indus_sales_report_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `indus_sales_representative`
--
ALTER TABLE `indus_sales_representative`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `indus_shop`
--
ALTER TABLE `indus_shop`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `indus_users`
--
ALTER TABLE `indus_users`
  MODIFY `users_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `indus_usertype`
--
ALTER TABLE `indus_usertype`
  MODIFY `usertype_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=134;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
