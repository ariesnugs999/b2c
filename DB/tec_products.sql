-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2020 at 08:02 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fwms_v2`
--

-- --------------------------------------------------------

--
-- Table structure for table `tec_products`
--

CREATE TABLE `tec_products` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` char(255) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT '1',
  `price` decimal(25,2) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.png',
  `tax` varchar(20) DEFAULT NULL,
  `cost` decimal(25,2) DEFAULT NULL,
  `tax_method` tinyint(1) DEFAULT '1',
  `quantity` decimal(15,4) DEFAULT '0.0000',
  `unit` varchar(20) NOT NULL,
  `barcode_symbology` varchar(20) NOT NULL DEFAULT 'code39',
  `type` varchar(20) NOT NULL DEFAULT 'standard',
  `details` text,
  `alert_quantity` decimal(10,4) DEFAULT '0.0000'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tec_products`
--

INSERT INTO `tec_products` (`id`, `code`, `name`, `category_id`, `price`, `image`, `tax`, `cost`, `tax_method`, `quantity`, `unit`, `barcode_symbology`, `type`, `details`, `alert_quantity`) VALUES
(5, 'GR345', 'GORI', 1, '10000.00', '9dfa23f89bd05ffb3525c182ecbc1813.jpg', '0', '0.00', 0, '0.0000', '1', 'code128', 'standard', '', '0.0000'),
(6, 'KR234', 'KACANG RAMPONG', 1, '5000.00', 'a00bb22720dc2def351b4fc5f1aa59e0.jpg', '0', '0.00', 0, '0.0000', '1', 'code128', 'standard', '', '0.0000'),
(7, 'CK231', 'CABE KRITING', 1, '5000.00', 'bda74c66806535c58be320f71c6d5a68.jpg', '0', '0.00', 0, '0.0000', '1', 'code128', 'standard', '', '0.0000'),
(8, 'TMT345', 'TOMAT', 1, '5000.00', '0e1b6b532efcf4a1b3ce72a5d0f40156.jpg', '0', '0.00', 0, '0.0000', '1', 'code128', 'standard', '', '0.0000'),
(9, 'TKL1', 'tangkil', 1, '7000.00', 'no_image.png', '0', '100000.00', 0, '0.0000', '1', 'code128', 'standard', '', '0.0000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tec_products`
--
ALTER TABLE `tec_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tec_products`
--
ALTER TABLE `tec_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
