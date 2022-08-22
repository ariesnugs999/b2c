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
-- Structure for view `tec_v_purchase_items_products`
--

CREATE VIEW `tec_v_purchase_items_products`  AS 
SELECT `tec_purchase_items`.`id` AS `id`, `tec_purchase_items`.`purchase_id` AS `purchase_id`, `tec_purchase_items`.`product_id` AS `product_id`, `tec_purchase_items`.`quantity` AS `quantity`, `tec_purchase_items`.`cost` AS `cost`, `tec_purchase_items`.`discount` AS `discount`, `tec_purchase_items`.`subtotal` AS `subtotal`, 
coalesce(sum(`tec_purchase_items`.`quantity`),0) AS `jml_qty_item`, coalesce(sum(`tec_purchase_items`.`cost`),0) AS `jml_harga_item`, 
coalesce(sum(`tec_purchase_items`.`subtotal`),0) AS `jml_subtotal`, 
coalesce(sum(`tec_purchase_items`.`subtotal`) / sum(`tec_purchase_items`.`quantity`),0) AS `avg_purchase_price` 
FROM `tec_purchase_items` 
LEFT JOIN `tec_purchases` ON `tec_purchases`.`id`=`tec_purchase_items`.`purchase_id`
GROUP BY `tec_purchase_items`.`product_id` ;

--
-- VIEW `tec_v_purchase_items_products`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
