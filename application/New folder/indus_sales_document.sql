-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 02, 2016 at 10:03 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `invoice`
--

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
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `indus_invoice_document`
--

INSERT INTO `indus_invoice_document` (`id`, `invoice_document_name`, `invoice_no_of_records`, `invoice_created_date`, `invoice_url`, `invoice_document_status`) VALUES
(21, 'invoice_CSV_-_invoice_CSV2.csv', 0, 1454150936, 'c25f0440b04959271689d71a8287e867', 'N'),
(22, 'Untitled_spreadsheet_-_Sheet112.csv', 0, 1454151003, '45c58678e4155a43845276bf9e119358', 'N'),
(23, 'Untitled_spreadsheet_-_Sheet13.csv', 0, 1454151139, 'ef47bb53363c60c2c22407ba2ea1907a', 'N'),
(24, 'invoice_CSV_-_invoice_CSV3.csv', 189, 1454151150, 'fe1c2e49dc3908e356eb39bb359fca20', 'N');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `indus_invoice_document`
--
ALTER TABLE `indus_invoice_document`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `indus_invoice_document`
--
ALTER TABLE `indus_invoice_document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=25;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
