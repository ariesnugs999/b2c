-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 05:33 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumbersubur_lite`
--

-- --------------------------------------------------------

--
-- Structure for view `tec_v_sale_items_products`
--

CREATE VIEW `tec_v_sale_items_products` AS 
SELECT `tec_sale_items`.`id` AS `id`, 
`tec_sale_items`.`sale_id` AS `sale_id`, 
`tec_sale_items`.`product_id` AS `product_id`, 
`tec_sale_items`.`quantity` AS `quantity`, 
`tec_sale_items`.`unit_price` AS `unit_price`, 
`tec_sale_items`.`net_unit_price` AS `net_unit_price`, 
`tec_sale_items`.`discount` AS `discount`, 
`tec_sale_items`.`item_discount` AS `item_discount`, 
`tec_sale_items`.`tax` AS `tax`, 
`tec_sale_items`.`item_tax` AS `item_tax`, 
`tec_sale_items`.`subtotal` AS `subtotal`, 
`tec_sale_items`.`real_unit_price` AS `real_unit_price`, 
`tec_sale_items`.`cost` AS `cost`, 
`tec_sale_items`.`product_code` AS `product_code`, 
`tec_sale_items`.`product_name` AS `product_name`, 
`tec_sale_items`.`comment` AS `comment`, 
sum(`tec_sale_items`.`quantity`) AS `sold`, 
sum(`tec_sale_items`.`subtotal`) AS `grandtotal` 
FROM `tec_sale_items` 
LEFT JOIN `tec_sales` ON `tec_sales`.`id`=`tec_sale_items`.`sale_id`
GROUP BY `tec_sale_items`.`product_id` ;

--
-- VIEW `tec_v_sale_items_products`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
