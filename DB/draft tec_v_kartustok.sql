-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2020 at 10:18 AM
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
-- Database: `sumbersubur`
--

-- --------------------------------------------------------

--
-- Structure for view `tec_v_kartustok`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tec_v_kartustok`  AS 
SELECT `tec_kartu_stok`.`idProduk` AS `idProduk`, `tec_kartu_stok`.`tanggal` AS `tanggal`, `tec_products`.`name` AS `name`, `tec_kartu_stok`.`currentStok` AS `currentStok`, `tec_kartu_stok`.`store_id` AS `store_id`, sum(`tec_kartu_stok`.`barangMasuk` * `tec_kartu_stok`.`hargaSatuan`) AS `rpMasuk`, sum(`tec_kartu_stok`.`barangKeluar` * `tec_kartu_stok`.`hargaSatuan`) AS `rpKeluar`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'PENERIMAAN' then `tec_kartu_stok`.`barangMasuk` else 0 end) AS `totalBarangMasuk`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'STOKAWAL' then `tec_kartu_stok`.`barangMasuk` else 0 end) AS `totalStokAwal`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'PENJUALAN' then `tec_kartu_stok`.`barangKeluar` else 0 end) AS `totalBarangKeluar`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'RETUR' then `tec_kartu_stok`.`barangKeluar` else 0 end) AS `totalRetur`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'WASTE' then `tec_kartu_stok`.`barangKeluar` else 0 end) AS `totalWaste`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'RETURSTORE' then `tec_kartu_stok`.`barangMasuk` else 0 end) AS `totalReturStore` 
FROM (`tec_kartu_stok` 
	left join `tec_products` on(`tec_products`.`id` = `tec_kartu_stok`.`idProduk`)) 
GROUP BY `tec_kartu_stok`.`idProduk` ;

--
-- VIEW `tec_v_kartustok`
-- Data: None
--

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
