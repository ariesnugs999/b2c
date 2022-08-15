-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 15, 2022 at 08:32 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

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
-- Table structure for table `tec_paste_marketing_customer`
--

CREATE TABLE `tec_paste_marketing_customer` (
  `no` int(11) NOT NULL,
  `account` char(5) NOT NULL,
  `name` char(35) NOT NULL,
  `nik_no` char(35) NOT NULL,
  `npwp_no` char(25) NOT NULL,
  `npwp_address` char(150) NOT NULL,
  `delivery_address` char(150) NOT NULL,
  `region` char(35) NOT NULL,
  `contact_person` char(35) NOT NULL,
  `email_address` char(100) NOT NULL,
  `tlp_no` char(25) NOT NULL,
  `fax_no` char(25) NOT NULL,
  `chanel_id` char(5) NOT NULL,
  `payment_method` char(5) NOT NULL,
  `payment_top` int(11) NOT NULL,
  `limit_credit` double NOT NULL,
  `tax_ppn` char(3) NOT NULL,
  `account_sales` char(5) NOT NULL,
  `summary` char(200) NOT NULL,
  `attachment_1` char(50) NOT NULL,
  `attachment_2` char(50) NOT NULL,
  `attachment_3` char(50) NOT NULL,
  `status_id` char(2) NOT NULL,
  `coa_receivable` char(15) NOT NULL,
  `coa_sales_advance` char(15) NOT NULL,
  `blocked` char(3) NOT NULL,
  `category_book` char(1) NOT NULL,
  `create_user` char(35) NOT NULL,
  `create_date` datetime NOT NULL,
  `modified_user` char(35) NOT NULL,
  `modified_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tec_paste_marketing_customer`
--

INSERT INTO `tec_paste_marketing_customer` (`no`, `account`, `name`, `nik_no`, `npwp_no`, `npwp_address`, `delivery_address`, `region`, `contact_person`, `email_address`, `tlp_no`, `fax_no`, `chanel_id`, `payment_method`, `payment_top`, `limit_credit`, `tax_ppn`, `account_sales`, `summary`, `attachment_1`, `attachment_2`, `attachment_3`, `status_id`, `coa_receivable`, `coa_sales_advance`, `blocked`, `category_book`, `create_user`, `create_date`, `modified_user`, `modified_date`) VALUES
(1, 'C0001', 'GOPPAR', '', '-', '-', 'CAKUNG', 'JABODETABEK', 'Tohir', 'goppar.rajagopal@gmail.com', '87712345678', '-', '01', 'TOP', 7, 0, 'No', 'S0001', 'ring 1', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'risman', '2031-05-21 15:36:00', 'jamaludin', '0000-00-00 00:00:00'),
(2, 'C0002', 'ABDULLAH FAQIH', '', '-', '-', 'JATI ASIH - BEKASI', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:55:21'),
(3, 'C0003', 'AA', '', '', '', 'CIBINONG, BOGOR', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:56:15'),
(4, 'C0004', 'ABIL / DONI', '', '-', '-', 'CIMANGGIS, DEPOK', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-\r\n', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:56:24'),
(5, 'C0005', 'ALEX', '', '-', '-', 'CAKUNG', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:56:32'),
(6, 'C0006', 'ALDI', '', '', '', 'JAKARTA', 'JABODETABEK', '', '', '6.29E+11', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:56:44'),
(7, 'C0007', 'BAEHAQI', '', '-', '-', 'LEMBANG - BANDUNG', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:56:53'),
(8, 'C0008', 'BASOR', '', '-', '-', 'CIANJUR', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:57:02'),
(9, 'C0009', 'BERDIKARI', '', '', '', 'JAKARTA', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:57:14'),
(10, 'C0010', 'CIANJUR ARTA MAKMUR', '', '-', '-', 'CIANJUR', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:57:28'),
(11, 'C0011', 'PT. CMT', '', '-', '-', 'RANGKASBITUNG', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:57:37'),
(12, 'C0012', 'PT. ANDINI KARYA MAKMUR', '', '-', '-', 'CIJAPATI BANDUNG', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:58:02'),
(13, 'C0013', 'DILAR', '', '-', '-', 'TASIKMALAYA', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:58:17'),
(14, 'C0014', 'ENO', '', '', '', 'PONDOK AREN', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:58:47'),
(15, 'C0015', 'HARIYATNO DIDIK', '', '-', '-', 'SUKABUMI', 'JABODETABEK', '-', '-', '6281331134868, 6287828219', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:58:58'),
(16, 'C0016', 'HAPARA', '', '', '', 'CIPENDEUY, SUBANG', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:59:13'),
(17, 'C0017', 'HARUN', '', '-', '-', 'CIAWI - BOGOR', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:59:24'),
(18, 'C0018', 'IJA', '', '-', '-', 'CIBARUSAH', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-\r\n', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:59:41'),
(19, 'C0019', 'KOSASIH', '', '', '', 'CIKAMPEK', 'JABODETABEK', '', '', '6.28E+12', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 09:59:52'),
(20, 'C0020', 'LEMBU SETIA ABADI JAYA', '', '', '', 'TANGERANG', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105001012', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:00:04'),
(21, 'C0021', 'MAHIDIN', '', '-', '-', 'TANJUNG BARAT', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:00:13'),
(22, 'C0022', 'OKI', '', '-', '-', 'BANDUNG', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:00:37'),
(23, 'C0023', 'OWIN SETIAWAN', '', '-', '-', 'SUBANG', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:00:46'),
(24, 'C0024', 'PANDANARAN AP', '', '', '', 'KLATEN', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:00:56'),
(25, 'C0025', 'RAHMAT/MAMAT', '', '', '', 'SUKABUMI', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:01:05'),
(26, 'C0026', 'RAHMAD SETIADI', '', '', '', 'CIANJUR', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:01:16'),
(27, 'C0027', 'RAMLAN', '', '', '', 'BOGOR', 'JABODETABEK', '', '', '628128391404, 62815176482', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:01:26'),
(28, 'C0028', 'RIDWAN', '', '', '', 'CILEUNGSI', 'JABODETABEK', '', '', '6.29E+12', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:01:49'),
(29, 'C0029', 'SAMUDERA KARUNIA RIZKY', '', '-', '-', 'SAWANGAN - DEPOK', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:01:59'),
(30, 'C0030', 'SIERAD', '', '-', '-', 'CAKUNG', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:02:16'),
(31, 'C0031', 'TANJUNG UNGGUL MANDIRI', '', '', '', '', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:05:06'),
(32, 'C0032', 'TOTONG', '', '', '', 'BANDUNG', 'JABODETABEK', '', '', '6.28E+12', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:05:22'),
(33, 'C0033', 'UJANG', '', '', '', 'PRIOK - JAKARTA UTARA', 'JABODETABEK', '', '', '6.29E+25', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:05:43'),
(34, 'C0034', 'WALUYO', '', '', '', 'BOGOR', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:05:54'),
(35, 'C0035', 'WAWAN', '', '', '', 'TANJUNG PRIUK - JAKARTA UTARA', 'JABODETABEK', '', '', '6.29E+12', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:06:03'),
(36, 'C0036', 'WIDODO MAKMUR PERKASA', '', '', '', '', 'JABODETABEK', '', '', '', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:06:14'),
(37, 'C0037', 'WIWIK', '', '', '', 'BOGOR', 'JABODETABEK', '', '', '62818110956', '', '01', 'COD', 10, 0, 'No', 'S0001', '', '', '', '', '22', '1105002001', '2106002001', 'No', '1', '', '0000-00-00 00:00:00', 'jamaludin', '2022-04-05 10:06:27'),
(38, 'C0038', 'KEMITRAAN', '', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 10, 2000000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'risman', '2004-06-21 10:05:00', 'jamaludin', '2022-04-05 10:06:46'),
(39, 'C0039', 'LAIN-LAIN', '', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 10, 2000000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'risman', '2004-06-21 10:11:00', 'jamaludin', '2022-04-05 10:06:54'),
(40, 'C0040', 'KARTIKO ABISENO', '', '-', '-', 'PAMULANG', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 10, 2000000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'risman', '2007-06-21 11:11:00', 'jamaludin', '2022-04-05 10:07:02'),
(41, 'C0041', 'SUKAMULYA HIJAU LESTARI', '', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 10, 60000000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'risman', '2016-06-21 11:24:00', 'jamaludin', '2022-04-05 10:07:09'),
(42, 'C0042', 'CV. BAROKAH', '', '-', '-', 'CIANJUR', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 10, 5000000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'risman', '2017-06-21 11:41:00', 'jamaludin', '2022-04-05 10:07:18'),
(43, 'C0043', 'KAR', '', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 10, 5000000000, 'Yes', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'risman', '2006-08-21 15:35:00', 'jamaludin', '2022-04-05 10:07:27'),
(44, 'C0044', 'TEST BY BAYU', '', '123456789', 'CILANGKAP 58', 'CILANGKAP 58', 'JABODETABEK', '08123456', 'b@gmail.com', '0215555', '02200', '01', 'COD', 50, 5000000, 'No', 'S0001', 'Test by Bayu', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2021-12-29 01:22:22', 'jamaludin', '2021-12-29 01:24:40'),
(45, 'C0045', 'WARDHANA', '', '1234', 'CILANGKAP', 'CILANGKAP', 'JABODETABEK', 'aji', 'aji@admin.com', '021345', '021', '01', 'TOP', 30, 5000000, 'No', 'S0002', 'test', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2021-12-29 13:41:20', 'jamaludin', '2021-12-29 13:42:39'),
(46, 'C0046', 'WAHYU', '', '-', '-', 'CIPANAS, CIANJUR', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'eka.aa', '2022-04-12 10:39:30', 'jamaludin', '2022-06-26 02:32:24'),
(47, 'C0047', 'ALIF', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-06-26 02:13:58', 'jamaludin', '2022-06-26 02:30:26'),
(48, 'C0048', 'BUNBUN SETIABUNDA', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-06-26 02:14:50', 'jamaludin', '2022-06-26 02:30:53'),
(49, 'C0049', 'H. SAIBAN', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-06-26 02:15:34', 'jamaludin', '2022-06-26 02:31:11'),
(50, 'C0050', 'KADILA LESTARI JAYA', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-06-26 02:16:09', 'jamaludin', '2022-06-26 02:31:29'),
(51, 'C0051', 'PT. BIYONA BERLIAN SEJAHTERA', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-06-26 02:17:32', 'jamaludin', '2022-06-26 02:31:45'),
(52, 'C0052', 'RITA', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-06-26 02:22:24', 'jamaludin', '2022-06-26 02:32:00'),
(53, 'C0053', 'SABANA KARUNIA RIZKI', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-06-26 02:23:09', 'jamaludin', '2022-06-26 02:32:13'),
(54, 'C0054', 'SARI MURNI', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-06-29 11:26:52', 'jamaludin', '2022-06-29 11:58:19'),
(55, 'C0055', 'MULYADI', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 10, 0, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'eka.aa', '2022-07-13 10:21:50', 'enno.kurniawati', '2022-07-19 11:34:38'),
(56, 'C0056', 'PRATOMO', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-07-26 10:35:19', 'jamaludin', '2022-07-26 10:42:06'),
(57, 'C0057', 'SILIH WANGI SAWARGI', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-07-26 10:36:11', 'jamaludin', '2022-07-26 10:42:20'),
(58, 'C0058', 'NAFIL FADLI', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-07-26 10:37:47', 'jamaludin', '2022-07-26 10:42:32'),
(59, 'C0059', 'ASEP ISKANDAR', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-07-27 08:42:17', 'jamaludin', '2022-07-27 08:42:53'),
(60, 'C0060', 'DEDE IRFAN', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-07-27 09:08:14', 'jamaludin', '2022-07-27 09:13:30'),
(61, 'C0061', 'SYAMSUDIN', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-07-27 09:09:03', 'jamaludin', '2022-07-27 09:13:39'),
(62, 'C0062', 'JOKO TOTOK', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-07-27 09:09:44', 'jamaludin', '2022-07-27 09:13:52'),
(63, 'C0063', 'BADI MULYADI', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-07-27 09:10:34', 'jamaludin', '2022-07-27 09:14:03'),
(64, 'C0064', 'TAB', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 100000000, 'No', 'S0001', '-', '', '', '', '22', '1105002001', '2106002001', 'No', '1', 'jamaludin', '2022-07-27 09:12:39', 'jamaludin', '2022-07-27 09:14:47'),
(65, 'C0065', 'ABIEL, H.', '-', '-', '-', '-', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 1200000000, 'No', 'S0001', '-', '', '', '', '21', '', '', 'No', '1', 'eka.aa', '2022-08-04 14:14:01', '', '0000-00-00 00:00:00'),
(66, 'C0066', 'DONI, H.', '-', '-', '--', '--', 'JABODETABEK', '-', '-', '-', '-', '01', 'TOP', 7, 1200000000, 'No', 'S0001', '-', '', '', '', '21', '', '', 'No', '1', 'eka.aa', '2022-08-04 14:14:42', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tec_users`
--

CREATE TABLE `tec_users` (
  `id` int(11) UNSIGNED NOT NULL,
  `last_ip_address` varbinary(45) DEFAULT NULL,
  `ip_address` varbinary(45) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(40) NOT NULL,
  `salt` varchar(40) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `avatar` varchar(55) DEFAULT NULL,
  `gender` varchar(20) DEFAULT NULL,
  `group_id` int(11) UNSIGNED NOT NULL DEFAULT 2,
  `store_id` int(11) DEFAULT NULL,
  `account_customer` varchar(100) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tec_users`
--

INSERT INTO `tec_users` (`id`, `last_ip_address`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `avatar`, `gender`, `group_id`, `store_id`, `account_customer`, `account_id`) VALUES
(1, 0x3132372e302e302e31, 0x3132372e302e302e31, 'admin', 'fe941d48eb1fbce34b4588ae500861570fb0e398', NULL, 'admin@cuansdev.com', NULL, NULL, NULL, 'b2d2c8fd5d9a5f19901279ac74cec92dc15ac970', 1435204774, 1660544850, 1, 'Admin', 'Admin', 'Cuansdev', '012345678', NULL, 'male', 1, 1, '', 0),
(2, NULL, 0x3130332e3231332e3132382e323534, 'bayu', '36fffd7e5a4b88f7b4bfc7f6854544a120f74ab8', NULL, 'bayoewa@gmail.com', NULL, NULL, NULL, NULL, 1606535740, 1606535740, 1, 'Bayu', 'War', NULL, '08888', NULL, 'male', 2, 1, 'C0005', 0),
(3, 0x3131342e352e3231312e3531, 0x3131322e3231352e3233352e323235, 'kasir', '9864e0f0337fbadaed1fe31320300928552e2e82', NULL, 'kasir@sumbersubur.xyz', NULL, NULL, NULL, '974c4ea17b3e6e918e450c5df7929e6a1bc3272a', 1606569552, 1606707580, 1, 'kasir', 'sumbersubur', NULL, '12345678', NULL, 'male', 2, 1, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tec_paste_marketing_customer`
--
ALTER TABLE `tec_paste_marketing_customer`
  ADD PRIMARY KEY (`account`);

--
-- Indexes for table `tec_users`
--
ALTER TABLE `tec_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tec_users`
--
ALTER TABLE `tec_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
