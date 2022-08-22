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
-- Structure for view `tec_v_profit_sale_items`
--

CREATE VIEW `tec_v_profit_sale_items`  AS SELECT `tec_v_sale_items`.`product_id` AS `product_id`, `tec_v_sale_items`.`product_code` AS `product_code`, `tec_v_sale_items`.`product_name` AS `product_name`, sum(`tec_v_sale_items`.`quantity`) AS `jpsi_jml_qty`, sum(`tec_v_sale_items`.`subtotal`) AS `jpsi_jml_subtotal`, coalesce(sum(`tec_v_sale_items`.`profit_items`),0) AS `jml_profit_items`, coalesce(sum(`tec_v_sale_items`.`jml_profit_items`),0) AS `tot_profit_items` 
FROM `tec_v_sale_items` 
GROUP BY `tec_v_sale_items`.`product_id` ;

--
-- VIEW `tec_v_profit_sale_items`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


SELECT
    `tec_sale_items`.`product_id` AS `product_id`,
    `tec_sale_items`.`product_code` AS `product_code`,
    `tec_sale_items`.`product_name` AS `product_name`,
    SUM(`tec_sale_items`.`quantity`) AS `jpsi_jml_qty`,
    SUM(`tec_sale_items`.`subtotal`) AS `jpsi_jml_subtotal`,
        SUM(`tec_sale_items`.`real_unit_price` - (sum(`tec_purchase_items`.`subtotal`) / sum(`tec_purchase_items`.`quantity`))) AS `jml_profit_items`,
    
        SUM(((`tec_sale_items`.`real_unit_price` - (sum(`tec_purchase_items`.`subtotal`) / sum(`tec_purchase_items`.`quantity`))) * `tec_sale_items`.`quantity`)) AS `tot_profit_items`
FROM
    (`tec_sale_items`
    	left join `tec_purchase_items` on(`tec_purchase_items`.`product_id` = `tec_sale_items`.`product_id`))
GROUP BY
    `tec_sale_items`.`product_id`