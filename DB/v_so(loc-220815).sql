-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 12:02 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2c`
--

-- --------------------------------------------------------

--
-- Structure for view `v_so`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_so`  AS SELECT `fi`.`invoice_no` AS `invoice_no`, `fi`.`invoice_date` AS `invoice_date`, `fi`.`reference_no` AS `delivery_order_no`, `fi`.`due_date` AS `due_date`, `fi`.`currency` AS `currency`, `fi`.`amount_total` AS `debit`, `fi`.`amount_total` AS `total_debit`, `fi`.`top` AS `top`, '' AS `sales_order_no`, '' AS `finance_receipt_no`, '' AS `finance_receipt_date`, '' AS `bank`, '' AS `credit`, ifnull(`fri`.`total_credit1`,0) + ifnull(`nr`.`total_credit2`,0) AS `total_credit`, 'SI' AS `cek`, '' AS `category` FROM ((`paste_finance_invoice` `fi` left join (select `f1`.`invoice_no` AS `invoice_no`,sum(`fr1`.`amount`) AS `total_credit1` from ((`paste_finance_receipt_items` `fr1` join `paste_finance_receipt` `fr` on(`fr1`.`receipt_no` = `fr`.`receipt_no`)) join `paste_finance_invoice` `f1` on(`f1`.`invoice_no` = `fr1`.`invoice_no`)) where `fr`.`status_id` = '3' group by `f1`.`invoice_no`) `fri` on(`fri`.`invoice_no` = `fi`.`invoice_no`)) left join (select `f1`.`invoice_no` AS `invoice_no`,sum(`nru`.`amount`) AS `total_credit2` from ((`paste_finance_sales_return_used` `nru` join `paste_finance_sales_return` `nr` on(`nr`.`sales_return_no` = `nru`.`sales_return_no`)) join `paste_finance_invoice` `f1` on(`f1`.`invoice_no` = `nru`.`invoice_no`)) where `nr`.`status_id` = '3' group by `f1`.`invoice_no`) `nr` on(`nr`.`invoice_no` = `fi`.`invoice_no`)) WHERE `fi`.`category` = 'SALES' AND `fi`.`status_id` = '3' ;

--
-- VIEW `v_so`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
