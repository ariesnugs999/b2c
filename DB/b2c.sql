-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jul 2022 pada 08.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

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
-- Struktur dari tabel `tec_categories`
--

CREATE TABLE `tec_categories` (
  `id` int(11) NOT NULL,
  `code` varchar(20) NOT NULL,
  `name` varchar(55) NOT NULL,
  `image` varchar(100) DEFAULT 'no_image.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_categories`
--

INSERT INTO `tec_categories` (`id`, `code`, `name`, `image`) VALUES
(1, 'G01', 'General', 'no_image.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_combo_items`
--

CREATE TABLE `tec_combo_items` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `item_code` varchar(20) NOT NULL,
  `quantity` decimal(12,4) NOT NULL,
  `price` decimal(25,4) DEFAULT NULL,
  `cost` decimal(25,4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_customers`
--

CREATE TABLE `tec_customers` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `cf1` varchar(255) NOT NULL,
  `cf2` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `store_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_customers`
--

INSERT INTO `tec_customers` (`id`, `name`, `cf1`, `cf2`, `phone`, `email`, `store_id`) VALUES
(1, 'Walk-in Client', '', '', '012345678', 'customer@tecdiary.com', NULL),
(2, 'ss', '', '', '', '', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_expenses`
--

CREATE TABLE `tec_expenses` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `reference` varchar(50) NOT NULL,
  `amount` decimal(25,4) NOT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `created_by` varchar(55) NOT NULL,
  `attachment` varchar(55) DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_gift_cards`
--

CREATE TABLE `tec_gift_cards` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `card_no` varchar(20) NOT NULL,
  `value` decimal(25,4) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `balance` decimal(25,4) NOT NULL,
  `expiry` date DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `store_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_groups`
--

CREATE TABLE `tec_groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_groups`
--

INSERT INTO `tec_groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'staff', 'Staff');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_hutang`
--

CREATE TABLE `tec_hutang` (
  `no_tagihan` varchar(30) NOT NULL,
  `status_hutang` int(5) NOT NULL COMMENT '0 = ditagih,rn1 = terbayar,rn2 = transaksi selesai'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_kartu_stok`
--

CREATE TABLE `tec_kartu_stok` (
  `id` bigint(255) NOT NULL,
  `noRefference` varchar(40) NOT NULL,
  `tanggal` date NOT NULL,
  `idUser` int(15) NOT NULL,
  `idProduk` varchar(15) NOT NULL,
  `currentStok` int(15) DEFAULT NULL,
  `barangMasuk` int(15) DEFAULT NULL,
  `barangKeluar` int(15) DEFAULT NULL,
  `hargaSatuan` int(10) DEFAULT NULL,
  `jenisTrx` varchar(30) DEFAULT NULL COMMENT 'penerimaan,mutasi,retur,waste,penjualan',
  `type` varchar(30) DEFAULT NULL COMMENT 'gudang / store',
  `store_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_login_attempts`
--

CREATE TABLE `tec_login_attempts` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_login_attempts`
--

INSERT INTO `tec_login_attempts` (`id`, `ip_address`, `login`, `time`) VALUES
(16, 0x3132372e302e302e31, 'admin@admin.com', 1658071675);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_payments`
--

CREATE TABLE `tec_payments` (
  `id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `sale_id` int(11) DEFAULT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `paid_by` varchar(20) NOT NULL,
  `cheque_no` varchar(20) DEFAULT NULL,
  `cc_no` varchar(20) DEFAULT NULL,
  `cc_holder` varchar(25) DEFAULT NULL,
  `cc_month` varchar(2) DEFAULT NULL,
  `cc_year` varchar(4) DEFAULT NULL,
  `cc_type` varchar(20) DEFAULT NULL,
  `amount` decimal(25,4) NOT NULL,
  `currency` varchar(3) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `attachment` varchar(55) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `pos_paid` decimal(25,4) DEFAULT 0.0000,
  `pos_balance` decimal(25,4) DEFAULT 0.0000,
  `gc_no` varchar(20) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_payments`
--

INSERT INTO `tec_payments` (`id`, `date`, `sale_id`, `customer_id`, `transaction_id`, `paid_by`, `cheque_no`, `cc_no`, `cc_holder`, `cc_month`, `cc_year`, `cc_type`, `amount`, `currency`, `created_by`, `attachment`, `note`, `pos_paid`, `pos_balance`, `gc_no`, `reference`, `updated_by`, `updated_at`, `store_id`) VALUES
(5, '2020-11-28 13:41:53', 5, 1, NULL, 'cash', '', '', '', '', '', '', '55000.0000', NULL, 1, NULL, '', '100000.0000', '45000.0000', '', NULL, NULL, NULL, 1),
(6, '2020-11-29 04:30:54', 6, 1, NULL, 'cash', '', '', '', '', '', '', '25000.0000', NULL, 3, NULL, '', '50000.0000', '25000.0000', '', NULL, NULL, NULL, 1),
(7, '2020-11-29 08:33:35', 7, 1, NULL, 'cash', '', '', '', '', '', '', '55000.0000', NULL, 3, NULL, '', '100000.0000', '45000.0000', '', NULL, NULL, NULL, 1),
(8, '2020-11-30 03:37:30', 8, 1, NULL, 'cash', '', '', '', '', '', '', '18375.0000', NULL, 1, NULL, '', '50000.0000', '31625.0000', '', NULL, NULL, NULL, 1),
(9, '2020-12-04 17:47:06', 9, 1, NULL, 'gift_card', '', '', '', '', '', '', '5000.0000', NULL, 1, NULL, '', '5000.0000', '-5000.0000', '', NULL, NULL, NULL, 1),
(10, '2020-12-04 17:48:14', 10, 1, NULL, 'gift_card', '', '', '', '', '', '', '30000.0000', NULL, 1, NULL, '', '30000.0000', '-30000.0000', '', NULL, NULL, NULL, 1),
(11, '2020-12-04 18:41:08', 11, 2, NULL, 'cash', '', '', '', '', '', '', '5000.0000', NULL, 1, NULL, '', '5000.0000', '-5000.0000', '', NULL, NULL, NULL, 1),
(12, '2020-12-04 18:52:00', 11, 2, NULL, 'cash', '', '', '', '', '', 'Visa', '1000.0000', NULL, 1, NULL, '', '0.0000', '0.0000', '', '', NULL, NULL, 1),
(13, '2020-12-20 04:06:43', 12, 1, NULL, 'cash', '', '', '', '', '', '', '5000.0000', NULL, 1, NULL, '', '5000.0000', '0.0000', '', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_printers`
--

CREATE TABLE `tec_printers` (
  `id` int(11) NOT NULL,
  `title` varchar(55) NOT NULL,
  `type` varchar(25) NOT NULL,
  `profile` varchar(25) NOT NULL,
  `char_per_line` tinyint(3) UNSIGNED DEFAULT NULL,
  `path` varchar(255) DEFAULT NULL,
  `ip_address` varbinary(45) DEFAULT NULL,
  `port` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_printers`
--

INSERT INTO `tec_printers` (`id`, `title`, `type`, `profile`, `char_per_line`, `path`, `ip_address`, `port`) VALUES
(1, 'XPrinter', 'network', 'default', 45, '', 0x3139322e3136382e312e323030, '9100');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_products`
--

CREATE TABLE `tec_products` (
  `id` int(11) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` char(255) NOT NULL,
  `category_id` int(11) NOT NULL DEFAULT 1,
  `price` decimal(25,2) NOT NULL,
  `image` varchar(255) DEFAULT 'no_image.png',
  `tax` varchar(20) DEFAULT NULL,
  `cost` decimal(25,2) DEFAULT NULL,
  `tax_method` tinyint(1) DEFAULT 1,
  `quantity` decimal(15,4) DEFAULT 0.0000,
  `unit` varchar(20) NOT NULL,
  `barcode_symbology` varchar(20) NOT NULL DEFAULT 'code39',
  `type` varchar(20) NOT NULL DEFAULT 'standard',
  `details` text DEFAULT NULL,
  `alert_quantity` decimal(10,4) DEFAULT 0.0000
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_products`
--

INSERT INTO `tec_products` (`id`, `code`, `name`, `category_id`, `price`, `image`, `tax`, `cost`, `tax_method`, `quantity`, `unit`, `barcode_symbology`, `type`, `details`, `alert_quantity`) VALUES
(5, 'GR345', 'GORI', 1, '10000.00', '9dfa23f89bd05ffb3525c182ecbc1813.jpg', '0', '0.00', 0, '0.0000', '1', 'code128', 'standard', '', '0.0000'),
(6, 'KR234', 'KACANG RAMPONG', 1, '5000.00', 'a00bb22720dc2def351b4fc5f1aa59e0.jpg', '0', '0.00', 0, '0.0000', '1', 'code128', 'standard', '', '0.0000'),
(7, 'CK231', 'CABE KRITING', 1, '5000.00', 'bda74c66806535c58be320f71c6d5a68.jpg', '0', '0.00', 0, '0.0000', '1', 'code128', 'standard', '', '0.0000'),
(8, 'TMT345', 'TOMAT', 1, '5000.00', '0e1b6b532efcf4a1b3ce72a5d0f40156.jpg', '0', '0.00', 0, '0.0000', '1', 'code128', 'standard', '', '0.0000'),
(9, 'TKL1', 'tangkil', 1, '7000.00', 'no_image.png', '0', '100000.00', 0, '0.0000', '2', 'code128', 'standard', '', '0.0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_product_store_qty`
--

CREATE TABLE `tec_product_store_qty` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `store_id` int(11) NOT NULL,
  `quantity` decimal(15,4) NOT NULL DEFAULT 0.0000,
  `price` decimal(25,4) DEFAULT NULL,
  `hpp` decimal(25,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_product_store_qty`
--

INSERT INTO `tec_product_store_qty` (`id`, `product_id`, `store_id`, `quantity`, `price`, `hpp`) VALUES
(5, 5, 1, '0.0000', '10000.0000', '0.00'),
(6, 6, 1, '214.0000', '5000.0000', '0.00'),
(7, 7, 1, '23.0000', '5000.0000', '0.00'),
(8, 8, 1, '100.0000', '5000.0000', '0.00'),
(9, 9, 1, '110.0000', '7000.0000', '0.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_purchases`
--

CREATE TABLE `tec_purchases` (
  `id` int(11) NOT NULL,
  `PONumber` varchar(100) DEFAULT NULL,
  `pqnumber` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL,
  `est_date` datetime NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(55) NOT NULL,
  `total` decimal(25,4) NOT NULL,
  `product_discount` decimal(25,4) DEFAULT NULL,
  `order_discount_id` varchar(20) DEFAULT NULL,
  `tempo_bayar` varchar(20) DEFAULT NULL,
  `jns_bayar` tinyint(1) DEFAULT NULL,
  `order_discount` decimal(25,4) DEFAULT NULL,
  `total_discount` decimal(25,4) DEFAULT NULL,
  `product_tax` decimal(25,4) DEFAULT NULL,
  `order_tax_id` varchar(20) DEFAULT NULL,
  `order_tax` decimal(25,4) DEFAULT NULL,
  `total_tax` decimal(25,4) DEFAULT NULL,
  `grand_total` decimal(25,4) NOT NULL,
  `total_items` int(11) DEFAULT NULL,
  `total_quantity` decimal(15,4) DEFAULT NULL,
  `paid` decimal(25,4) DEFAULT 0.0000,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `podesc` varchar(1000) DEFAULT NULL,
  `alamatkirim` varchar(1000) DEFAULT NULL,
  `store_destination` int(11) NOT NULL DEFAULT 1,
  `received` tinyint(1) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `applevelcode` varchar(20) DEFAULT NULL,
  `rounding` decimal(10,4) DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT 1,
  `hold_ref` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_purchases`
--

INSERT INTO `tec_purchases` (`id`, `PONumber`, `pqnumber`, `date`, `est_date`, `supplier_id`, `supplier_name`, `total`, `product_discount`, `order_discount_id`, `tempo_bayar`, `jns_bayar`, `order_discount`, `total_discount`, `product_tax`, `order_tax_id`, `order_tax`, `total_tax`, `grand_total`, `total_items`, `total_quantity`, `paid`, `created_by`, `updated_by`, `updated_at`, `note`, `podesc`, `alamatkirim`, `store_destination`, `received`, `attachment`, `status`, `applevelcode`, `rounding`, `store_id`, `hold_ref`) VALUES
(12, '', '', '2020-12-19 00:00:00', '2020-12-20 00:00:00', 2, '', '0.0000', NULL, NULL, '30', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0.0000', NULL, NULL, '0.0000', 1, NULL, NULL, 'dd', '', NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(13, '2444', '2444', '2020-12-20 00:00:00', '2020-12-20 00:00:00', 2, '', '800.0000', NULL, NULL, '30', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0.0000', NULL, NULL, '0.0000', 1, NULL, NULL, 's', 'ss', NULL, 1, NULL, NULL, 'approved', NULL, NULL, 1, NULL),
(14, '66', '66', '2020-12-20 00:00:00', '2020-12-20 00:00:00', 1, '', '800.0000', NULL, NULL, '34', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0.0000', NULL, NULL, '0.0000', 1, NULL, NULL, NULL, NULL, NULL, 1, 0, NULL, 'approved', NULL, NULL, 1, NULL),
(15, '99', '99', '2020-12-20 00:00:00', '2020-12-20 00:00:00', 1, '', '800.0000', NULL, NULL, '30', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0.0000', NULL, NULL, '0.0000', 1, NULL, NULL, NULL, NULL, NULL, 1, 1, NULL, NULL, NULL, NULL, 1, NULL),
(16, '55', '55', '2020-12-20 00:00:00', '2020-12-21 00:00:00', 2, '', '1000.0000', NULL, NULL, '40', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0.0000', NULL, NULL, '0.0000', 1, NULL, NULL, '', 'f', NULL, 1, NULL, NULL, NULL, NULL, NULL, 1, NULL),
(17, 'po123', 'po123', '2020-12-20 00:00:00', '2020-12-20 00:00:00', 2, 'SUPLIER CABE', '1000.0000', NULL, NULL, '', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0.0000', NULL, NULL, '1000.0000', 1, NULL, NULL, 'note', 'desv', NULL, 2, NULL, NULL, 'paid', NULL, NULL, 1, NULL),
(18, 'PO2020/12/0001', NULL, '2020-12-22 23:09:00', '2020-12-22 23:09:00', 2, '', '20.0000', NULL, NULL, '30', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0.0000', NULL, NULL, '0.0000', 1, NULL, NULL, 'das', 'ss', NULL, 1, 1, NULL, 'approved', NULL, NULL, 1, NULL),
(19, 'PO2020/12/0001', '', '2020-12-22 00:00:00', '2020-12-22 00:00:00', 2, '', '200.0000', NULL, NULL, '14', 1, NULL, NULL, NULL, NULL, NULL, NULL, '0.0000', NULL, NULL, '0.0000', 1, NULL, NULL, 'asd', 'sdas', NULL, 1, 1, NULL, 'draft', NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_purchase_items`
--

CREATE TABLE `tec_purchase_items` (
  `id` int(11) NOT NULL,
  `purchase_id` int(11) NOT NULL,
  `pqnumber` int(11) NOT NULL,
  `itemunit` varchar(50) NOT NULL,
  `itemdesc` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,4) NOT NULL,
  `qty_delivered` decimal(25,2) NOT NULL,
  `cost` decimal(25,4) NOT NULL,
  `discount` decimal(25,4) NOT NULL,
  `subtotal` decimal(25,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_purchase_items`
--

INSERT INTO `tec_purchase_items` (`id`, `purchase_id`, `pqnumber`, `itemunit`, `itemdesc`, `product_id`, `quantity`, `qty_delivered`, `cost`, `discount`, `subtotal`) VALUES
(21, 12, 0, '', '', 6, '2.0000', '0.00', '0.0000', '0.0000', '0.0000'),
(23, 13, 0, '', '', 6, '2.0000', '0.00', '400.0000', '0.0000', '800.0000'),
(24, 14, 0, '', '', 6, '2.0000', '0.00', '400.0000', '0.0000', '800.0000'),
(25, 15, 0, '', '', 6, '2.0000', '0.00', '400.0000', '0.0000', '800.0000'),
(28, 17, 0, '', '', 6, '2.0000', '0.00', '500.0000', '0.0000', '1000.0000'),
(29, 16, 0, '', '', 6, '2.0000', '0.00', '500.0000', '0.0000', '1000.0000'),
(30, 18, 0, '', '', 6, '2.0000', '0.00', '10.0000', '0.0000', '20.0000'),
(31, 19, 0, '', '', 6, '2.0000', '0.00', '100.0000', '0.0000', '200.0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_purchase_payments`
--

CREATE TABLE `tec_purchase_payments` (
  `id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT current_timestamp(),
  `purchase_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `transaction_id` varchar(50) DEFAULT NULL,
  `paid_by` varchar(20) NOT NULL,
  `cheque_no` varchar(20) DEFAULT NULL,
  `cc_no` varchar(20) DEFAULT NULL,
  `cc_holder` varchar(25) DEFAULT NULL,
  `cc_month` varchar(2) DEFAULT NULL,
  `cc_year` varchar(4) DEFAULT NULL,
  `cc_type` varchar(20) DEFAULT NULL,
  `amount` decimal(25,4) NOT NULL,
  `currency` varchar(3) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `attachment` varchar(55) DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `purchase_paid` decimal(25,4) DEFAULT 0.0000,
  `purchase_balance` decimal(25,4) DEFAULT 0.0000,
  `gc_no` varchar(20) DEFAULT NULL,
  `reference` varchar(50) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_purchase_payments`
--

INSERT INTO `tec_purchase_payments` (`id`, `date`, `purchase_id`, `supplier_id`, `transaction_id`, `paid_by`, `cheque_no`, `cc_no`, `cc_holder`, `cc_month`, `cc_year`, `cc_type`, `amount`, `currency`, `created_by`, `attachment`, `note`, `purchase_paid`, `purchase_balance`, `gc_no`, `reference`, `updated_by`, `updated_at`, `store_id`) VALUES
(1, '2020-12-01 06:51:00', 11, 2, NULL, 'cash', '', '', '', '', '', 'Visa', '4800.0000', NULL, 1, NULL, '', '0.0000', '0.0000', '', '', NULL, NULL, 1),
(2, '2020-12-21 00:53:00', 17, 2, NULL, 'cash', '', '', '', '', '', 'Visa', '1000.0000', NULL, 1, NULL, 'hh', '0.0000', '0.0000', '', NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_receiving`
--

CREATE TABLE `tec_receiving` (
  `id` int(11) NOT NULL,
  `PONumber` varchar(100) DEFAULT NULL,
  `rinumber` varchar(100) DEFAULT NULL,
  `date` datetime NOT NULL,
  `est_date` datetime NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(55) NOT NULL,
  `no_polisi` varchar(25) DEFAULT NULL,
  `total` decimal(25,4) NOT NULL,
  `product_discount` decimal(25,4) DEFAULT NULL,
  `order_discount_id` varchar(20) DEFAULT NULL,
  `tempo_bayar` varchar(20) DEFAULT NULL,
  `jns_bayar` tinyint(1) DEFAULT NULL,
  `order_discount` decimal(25,4) DEFAULT NULL,
  `total_discount` decimal(25,4) DEFAULT NULL,
  `product_tax` decimal(25,4) DEFAULT NULL,
  `order_tax_id` varchar(20) DEFAULT NULL,
  `order_tax` decimal(25,4) DEFAULT NULL,
  `total_tax` decimal(25,4) DEFAULT NULL,
  `grand_total` decimal(25,4) NOT NULL,
  `total_items` int(11) DEFAULT NULL,
  `total_quantity` decimal(15,4) DEFAULT NULL,
  `paid` decimal(25,4) DEFAULT 0.0000,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `podesc` varchar(1000) DEFAULT NULL,
  `alamatkirim` varchar(1000) DEFAULT NULL,
  `store_destination` int(11) NOT NULL DEFAULT 1,
  `received` tinyint(1) DEFAULT NULL,
  `attachment` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `applevelcode` varchar(20) DEFAULT NULL,
  `rounding` decimal(10,4) DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT 1,
  `hold_ref` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_receiving`
--

INSERT INTO `tec_receiving` (`id`, `PONumber`, `rinumber`, `date`, `est_date`, `supplier_id`, `supplier_name`, `no_polisi`, `total`, `product_discount`, `order_discount_id`, `tempo_bayar`, `jns_bayar`, `order_discount`, `total_discount`, `product_tax`, `order_tax_id`, `order_tax`, `total_tax`, `grand_total`, `total_items`, `total_quantity`, `paid`, `created_by`, `updated_by`, `updated_at`, `note`, `podesc`, `alamatkirim`, `store_destination`, `received`, `attachment`, `status`, `applevelcode`, `rounding`, `store_id`, `hold_ref`) VALUES
(18, 'PO2020/12/0001', '', '2020-12-27 00:00:00', '0000-00-00 00:00:00', 2, '', '2', '0.0000', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.0000', NULL, NULL, '0.0000', 1, NULL, NULL, NULL, 'ads', NULL, 1, 1, NULL, NULL, NULL, NULL, 1, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_receiving_items`
--

CREATE TABLE `tec_receiving_items` (
  `id` int(11) NOT NULL,
  `receiving_id` int(11) NOT NULL,
  `PONumber` int(11) NOT NULL,
  `itemunit` varchar(50) NOT NULL,
  `itemdesc` varchar(50) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qtyri` decimal(15,2) NOT NULL,
  `quantity` decimal(15,2) NOT NULL,
  `balance` decimal(15,2) NOT NULL,
  `exp_date` datetime NOT NULL,
  `cost` decimal(25,4) NOT NULL,
  `discount` decimal(25,4) NOT NULL,
  `subtotal` decimal(25,4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_receiving_items`
--

INSERT INTO `tec_receiving_items` (`id`, `receiving_id`, `PONumber`, `itemunit`, `itemdesc`, `product_id`, `qtyri`, `quantity`, `balance`, `exp_date`, `cost`, `discount`, `subtotal`) VALUES
(29, 18, 0, '', '', 6, '0.00', '2.00', '2.00', '0000-00-00 00:00:00', '0.0000', '0.0000', '0.0000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_registers`
--

CREATE TABLE `tec_registers` (
  `id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `user_id` int(11) NOT NULL,
  `cash_in_hand` decimal(25,4) NOT NULL,
  `status` varchar(10) NOT NULL,
  `total_cash` decimal(25,4) DEFAULT NULL,
  `total_cheques` int(11) DEFAULT NULL,
  `total_cc_slips` int(11) DEFAULT NULL,
  `total_cash_submitted` decimal(25,4) DEFAULT NULL,
  `total_cheques_submitted` int(11) DEFAULT NULL,
  `total_cc_slips_submitted` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `closed_at` timestamp NULL DEFAULT NULL,
  `transfer_opened_bills` varchar(50) DEFAULT NULL,
  `closed_by` int(11) DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_registers`
--

INSERT INTO `tec_registers` (`id`, `date`, `user_id`, `cash_in_hand`, `status`, `total_cash`, `total_cheques`, `total_cc_slips`, `total_cash_submitted`, `total_cheques_submitted`, `total_cc_slips_submitted`, `note`, `closed_at`, `transfer_opened_bills`, `closed_by`, `store_id`) VALUES
(1, '2019-03-19 18:19:22', 1, '200.0000', 'close', '200.0000', 0, 0, '200.0000', 0, 0, '', '2020-11-28 03:49:20', NULL, 1, 1),
(2, '2020-11-28 03:50:23', 1, '1000.0000', 'close', '44470.0000', 0, 0, '44470.0000', 0, 0, 'Penjualan hari 1 - 28/11/2020', '2020-11-28 04:18:22', NULL, 1, 1),
(3, '2020-11-28 04:18:34', 1, '0.0000', 'close', '0.0000', 0, 0, '0.0000', 0, 0, '', '2020-11-28 05:04:53', NULL, 1, 1),
(4, '2020-11-28 05:09:02', 1, '1000.0000', 'close', '1000.0000', 0, 0, '1000.0000', 0, 0, '', '2020-11-28 05:09:45', NULL, 1, 1),
(5, '2020-11-28 05:13:12', 1, '1000.0000', 'close', '1000.0000', 0, 0, '1000.0000', 0, 0, '', '2020-11-28 05:35:27', NULL, 1, 1),
(6, '2020-11-28 05:35:56', 1, '0.0000', 'close', '0.0000', 0, 0, '0.0000', 0, 0, '', '2020-11-28 05:36:08', NULL, 1, 1),
(7, '2020-11-28 05:36:15', 1, '0.0000', 'close', '55000.0000', 0, 0, '55000.0000', 0, 0, '', '2020-11-29 08:56:00', NULL, 1, 1),
(8, '2020-11-28 13:37:42', 3, '200000.0000', 'close', '200000.0000', 0, 0, '200000.0000', 0, 0, '', '2020-11-29 04:30:17', NULL, 3, 1),
(9, '2020-11-29 04:30:27', 3, '200000.0000', 'close', '225000.0000', 0, 0, '225000.0000', 0, 0, '', '2020-11-29 04:31:15', NULL, 3, 1),
(10, '2020-11-29 08:32:17', 3, '100000.0000', 'close', '155000.0000', 0, 0, '155000.0000', 0, 0, '', '2020-11-30 03:39:48', NULL, 3, 1),
(11, '2020-11-29 14:48:56', 1, '0.0000', 'open', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_sales`
--

CREATE TABLE `tec_sales` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `total` decimal(25,4) NOT NULL,
  `product_discount` decimal(25,4) DEFAULT NULL,
  `order_discount_id` varchar(20) DEFAULT NULL,
  `order_discount` decimal(25,4) DEFAULT NULL,
  `total_discount` decimal(25,4) DEFAULT NULL,
  `product_tax` decimal(25,4) DEFAULT NULL,
  `order_tax_id` varchar(20) DEFAULT NULL,
  `order_tax` decimal(25,4) DEFAULT NULL,
  `total_tax` decimal(25,4) DEFAULT NULL,
  `grand_total` decimal(25,4) NOT NULL,
  `total_items` int(11) DEFAULT NULL,
  `total_quantity` decimal(15,4) DEFAULT NULL,
  `paid` decimal(25,4) DEFAULT NULL,
  `balance2` decimal(25,4) NOT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `rounding` decimal(10,4) DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT 1,
  `hold_ref` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_sales`
--

INSERT INTO `tec_sales` (`id`, `date`, `customer_id`, `customer_name`, `total`, `product_discount`, `order_discount_id`, `order_discount`, `total_discount`, `product_tax`, `order_tax_id`, `order_tax`, `total_tax`, `grand_total`, `total_items`, `total_quantity`, `paid`, `balance2`, `created_by`, `updated_by`, `updated_at`, `note`, `status`, `rounding`, `store_id`, `hold_ref`) VALUES
(5, '2020-11-28 20:41:53', 1, 'Walk-in Client', '55000.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '0%', '0.0000', '0.0000', '55000.0000', 2, '11.0000', '55000.0000', '0.0000', 1, NULL, NULL, '', 'paid', '0.0000', 1, ''),
(6, '2020-11-29 11:30:54', 1, 'Walk-in Client', '25000.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '0%', '0.0000', '0.0000', '25000.0000', 2, '5.0000', '25000.0000', '0.0000', 3, NULL, NULL, '', 'paid', '0.0000', 1, ''),
(7, '2020-11-29 15:33:35', 1, 'Walk-in Client', '55000.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '0%', '0.0000', '0.0000', '55000.0000', 2, '11.0000', '55000.0000', '0.0000', 3, NULL, NULL, '', 'paid', '0.0000', 1, ''),
(8, '2020-11-30 10:37:30', 1, 'Walk-in Client', '17500.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '5%', '875.0000', '875.0000', '18375.0000', 1, '5.0000', '18375.0000', '0.0000', 1, NULL, NULL, '', 'paid', '0.0000', 1, ''),
(9, '2020-12-05 00:47:06', 1, 'Walk-in Client', '5000.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '0%', '0.0000', '0.0000', '5000.0000', 1, '1.0000', '5000.0000', '0.0000', 1, NULL, NULL, '', 'paid', '0.0000', 1, ''),
(10, '2020-12-05 00:48:14', 1, 'Walk-in Client', '30000.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '0%', '0.0000', '0.0000', '30000.0000', 1, '6.0000', '30000.0000', '0.0000', 1, NULL, NULL, '', 'paid', '0.0000', 1, ''),
(11, '2020-12-05 01:41:08', 2, 'ss', '10000.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '0%', '0.0000', '0.0000', '10000.0000', 1, '2.0000', '6000.0000', '4000.0000', 1, NULL, NULL, '', 'partial', '0.0000', 1, ''),
(12, '2020-12-20 11:06:43', 1, 'Walk-in Client', '5000.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '0%', '0.0000', '0.0000', '5000.0000', 1, '1.0000', '5000.0000', '0.0000', 1, NULL, NULL, '', 'paid', '0.0000', 1, '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_sale_items`
--

CREATE TABLE `tec_sale_items` (
  `id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,4) NOT NULL,
  `unit_price` decimal(25,4) NOT NULL,
  `net_unit_price` decimal(25,4) NOT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `item_discount` decimal(25,4) DEFAULT NULL,
  `tax` int(20) DEFAULT NULL,
  `item_tax` decimal(25,4) DEFAULT NULL,
  `subtotal` decimal(25,4) NOT NULL,
  `real_unit_price` decimal(25,4) DEFAULT NULL,
  `cost` decimal(25,4) DEFAULT 0.0000,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_sale_items`
--

INSERT INTO `tec_sale_items` (`id`, `sale_id`, `product_id`, `quantity`, `unit_price`, `net_unit_price`, `discount`, `item_discount`, `tax`, `item_tax`, `subtotal`, `real_unit_price`, `cost`, `product_code`, `product_name`, `comment`) VALUES
(7, 5, 6, '10.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '50000.0000', '5000.0000', '0.0000', 'KR234', 'KACANG RAMPONG', ''),
(8, 5, 7, '1.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '5000.0000', '5000.0000', '0.0000', 'CK231', 'CABE KRITING', ''),
(9, 6, 6, '4.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '20000.0000', '5000.0000', '0.0000', 'KR234', 'KACANG RAMPONG', ''),
(10, 6, 7, '1.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '5000.0000', '5000.0000', '0.0000', 'CK231', 'CABE KRITING', ''),
(11, 7, 6, '1.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '5000.0000', '5000.0000', '0.0000', 'KR234', 'KACANG RAMPONG', ''),
(12, 7, 7, '10.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '50000.0000', '5000.0000', '0.0000', 'CK231', 'CABE KRITING', ''),
(13, 8, 7, '5.0000', '3500.0000', '3500.0000', '0', '0.0000', 0, '0.0000', '17500.0000', '3500.0000', '0.0000', 'CK231', 'CABE KRITING', ''),
(14, 9, 7, '1.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '5000.0000', '5000.0000', '0.0000', 'CK231', 'CABE KRITING', ''),
(15, 10, 7, '6.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '30000.0000', '5000.0000', '0.0000', 'CK231', 'CABE KRITING', ''),
(16, 11, 7, '2.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '10000.0000', '5000.0000', '0.0000', 'CK231', 'CABE KRITING', ''),
(17, 12, 7, '1.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '5000.0000', '5000.0000', '0.0000', 'CK231', 'CABE KRITING', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_sessions`
--

CREATE TABLE `tec_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_sessions`
--

INSERT INTO `tec_sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('05eilbl95gb2tahc1uiniaurv694k0ti', '127.0.0.1', 1658122539, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132323533393b),
('3lobctvhf1v3eekplj728f5b83lamohi', '127.0.0.1', 1658125836, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132353833363b),
('4l9p7ljtgj05hm3ntr5ikrfvbjbivdhr', '127.0.0.1', 1658126567, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132363536373b),
('a96o9cf4ruef99q3a32n3r4sogstorbe', '127.0.0.1', 1658124926, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132343932363b),
('asrj1mb6onk42aa472t7vsoetmtufmfm', '127.0.0.1', 1658126239, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132363233393b),
('cq4po44nro5fuc8qc7eeqvjfi2afkfof', '127.0.0.1', 1658124123, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132343132333b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31383a2261646d696e406375616e736465762e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32313a22546875203235204a756e20323031352031303a3539223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231363538313232383738223b6c6173745f69707c733a393a223132372e302e302e31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c733a313a2231223b6861735f73746f72655f69647c733a313a2231223b72656769737465725f69647c733a323a223131223b636173685f696e5f68616e647c733a363a22302e30303030223b72656769737465725f6f70656e5f74696d657c733a31393a22323032302d31312d32392032313a34383a3536223b),
('j9dfj043ts6sgtfv473n8fefu1pm72nh', '127.0.0.1', 1658125528, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132353532383b),
('lcppc7n2efao3vb02kqilqhsf8r7ubap', '127.0.0.1', 1658126712, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132363536373b),
('lqntj2hg715fj0gor378s1t8rk2phc22', '127.0.0.1', 1658125107, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132353130373b),
('mnquna09geuamosq8j6jhkcjagh2p8nd', '127.0.0.1', 1658125105, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132353130353b),
('n0fd3br6eao6ivslfp75qceruchq5b42', '127.0.0.1', 1658122842, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132323834323b),
('rei9q2g9ami3h4q9h07j02v0nqb20gj1', '127.0.0.1', 1658122917, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132323834323b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31383a2261646d696e406375616e736465762e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32313a22546875203235204a756e20323031352031303a3539223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231363538313231373130223b6c6173745f69707c733a393a223132372e302e302e31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c733a313a2231223b6861735f73746f72655f69647c733a313a2231223b72656769737465725f69647c733a323a223131223b636173685f696e5f68616e647c733a363a22302e30303030223b72656769737465725f6f70656e5f74696d657c733a31393a22323032302d31312d32392032313a34383a3536223b),
('vv02nhjcdde0a2vgasub6eqshg1i8tdg', '127.0.0.1', 1658121974, 0x5f5f63695f6c6173745f726567656e65726174657c693a313635383132313937343b6964656e746974797c733a353a2261646d696e223b757365726e616d657c733a353a2261646d696e223b656d61696c7c733a31383a2261646d696e406375616e736465762e636f6d223b757365725f69647c733a313a2231223b66697273745f6e616d657c733a353a2241646d696e223b6c6173745f6e616d657c733a353a2241646d696e223b637265617465645f6f6e7c733a32313a22546875203235204a756e20323031352031303a3539223b6f6c645f6c6173745f6c6f67696e7c733a31303a2231363538303731363836223b6c6173745f69707c733a393a223132372e302e302e31223b6176617461727c4e3b67656e6465727c733a343a226d616c65223b67726f75705f69647c733a313a2231223b73746f72655f69647c733a313a2231223b6861735f73746f72655f69647c733a313a2231223b72656769737465725f69647c733a323a223131223b636173685f696e5f68616e647c733a363a22302e30303030223b72656769737465725f6f70656e5f74696d657c733a31393a22323032302d31312d32392032313a34383a3536223b);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_settings`
--

CREATE TABLE `tec_settings` (
  `setting_id` int(1) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `site_name` varchar(55) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `dateformat` varchar(20) DEFAULT NULL,
  `timeformat` varchar(20) DEFAULT NULL,
  `default_email` varchar(100) NOT NULL,
  `language` varchar(20) NOT NULL,
  `version` varchar(10) NOT NULL DEFAULT '1.0',
  `theme` varchar(20) NOT NULL,
  `timezone` varchar(255) NOT NULL DEFAULT '0',
  `protocol` varchar(20) NOT NULL DEFAULT 'mail',
  `smtp_host` varchar(255) DEFAULT NULL,
  `smtp_user` varchar(100) DEFAULT NULL,
  `smtp_pass` varchar(255) DEFAULT NULL,
  `smtp_port` varchar(10) DEFAULT '25',
  `smtp_crypto` varchar(5) DEFAULT NULL,
  `mmode` tinyint(1) NOT NULL,
  `captcha` tinyint(1) NOT NULL DEFAULT 1,
  `mailpath` varchar(55) DEFAULT NULL,
  `currency_prefix` varchar(3) NOT NULL,
  `default_customer` int(11) NOT NULL,
  `default_tax_rate` varchar(20) NOT NULL,
  `rows_per_page` int(2) NOT NULL,
  `total_rows` int(2) NOT NULL,
  `header` varchar(1000) DEFAULT NULL,
  `footer` varchar(1000) DEFAULT NULL,
  `bsty` tinyint(4) NOT NULL,
  `display_kb` tinyint(4) NOT NULL,
  `default_category` int(11) NOT NULL,
  `default_discount` varchar(20) NOT NULL,
  `item_addition` tinyint(1) NOT NULL,
  `barcode_symbology` varchar(55) DEFAULT NULL,
  `pro_limit` tinyint(4) NOT NULL,
  `decimals` tinyint(1) NOT NULL DEFAULT 2,
  `thousands_sep` varchar(2) NOT NULL DEFAULT ',',
  `decimals_sep` varchar(2) NOT NULL DEFAULT '.',
  `focus_add_item` varchar(55) DEFAULT NULL,
  `add_customer` varchar(55) DEFAULT NULL,
  `toggle_category_slider` varchar(55) DEFAULT NULL,
  `cancel_sale` varchar(55) DEFAULT NULL,
  `suspend_sale` varchar(55) DEFAULT NULL,
  `print_order` varchar(55) DEFAULT NULL,
  `print_bill` varchar(55) DEFAULT NULL,
  `finalize_sale` varchar(55) DEFAULT NULL,
  `today_sale` varchar(55) DEFAULT NULL,
  `open_hold_bills` varchar(55) DEFAULT NULL,
  `close_register` varchar(55) DEFAULT NULL,
  `java_applet` tinyint(1) NOT NULL,
  `receipt_printer` varchar(55) DEFAULT NULL,
  `pos_printers` varchar(255) DEFAULT NULL,
  `cash_drawer_codes` varchar(55) DEFAULT NULL,
  `char_per_line` tinyint(4) DEFAULT 42,
  `rounding` tinyint(1) DEFAULT 0,
  `pin_code` varchar(20) DEFAULT NULL,
  `stripe` tinyint(1) DEFAULT NULL,
  `stripe_secret_key` varchar(100) DEFAULT NULL,
  `stripe_publishable_key` varchar(100) DEFAULT NULL,
  `purchase_code` varchar(100) DEFAULT NULL,
  `envato_username` varchar(50) DEFAULT NULL,
  `theme_style` varchar(25) DEFAULT 'green',
  `after_sale_page` tinyint(1) DEFAULT NULL,
  `overselling` tinyint(1) DEFAULT 1,
  `multi_store` tinyint(1) DEFAULT NULL,
  `qty_decimals` tinyint(1) DEFAULT 2,
  `symbol` varchar(55) DEFAULT NULL,
  `sac` tinyint(1) DEFAULT 0,
  `display_symbol` tinyint(1) DEFAULT NULL,
  `remote_printing` tinyint(1) DEFAULT 1,
  `printer` int(11) DEFAULT NULL,
  `order_printers` varchar(55) DEFAULT NULL,
  `auto_print` tinyint(1) DEFAULT 0,
  `local_printers` tinyint(1) DEFAULT NULL,
  `rtl` tinyint(1) DEFAULT NULL,
  `print_img` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_settings`
--

INSERT INTO `tec_settings` (`setting_id`, `logo`, `site_name`, `tel`, `dateformat`, `timeformat`, `default_email`, `language`, `version`, `theme`, `timezone`, `protocol`, `smtp_host`, `smtp_user`, `smtp_pass`, `smtp_port`, `smtp_crypto`, `mmode`, `captcha`, `mailpath`, `currency_prefix`, `default_customer`, `default_tax_rate`, `rows_per_page`, `total_rows`, `header`, `footer`, `bsty`, `display_kb`, `default_category`, `default_discount`, `item_addition`, `barcode_symbology`, `pro_limit`, `decimals`, `thousands_sep`, `decimals_sep`, `focus_add_item`, `add_customer`, `toggle_category_slider`, `cancel_sale`, `suspend_sale`, `print_order`, `print_bill`, `finalize_sale`, `today_sale`, `open_hold_bills`, `close_register`, `java_applet`, `receipt_printer`, `pos_printers`, `cash_drawer_codes`, `char_per_line`, `rounding`, `pin_code`, `stripe`, `stripe_secret_key`, `stripe_publishable_key`, `purchase_code`, `envato_username`, `theme_style`, `after_sale_page`, `overselling`, `multi_store`, `qty_decimals`, `symbol`, `sac`, `display_symbol`, `remote_printing`, `printer`, `order_printers`, `auto_print`, `local_printers`, `rtl`, `print_img`) VALUES
(1, 'logo1.png', 'Porta WMP Group', '0105292122', 'D j M Y', 'H:i', 'nugiscumi999@gmail.com', 'indonesian', '4.0.28', 'default', 'Asia/Kuala_Lumpur', 'mail', 'pop.gmail.com', 'noreply@spos.tecdiary.my', '', '25', '', 0, 0, NULL, 'IDR', 1, '0%', 10, 30, NULL, NULL, 2, 0, 1, '0', 1, NULL, 10, 0, '.', ',', 'ALT+F1', 'ALT+F2', 'ALT+F10', 'ALT+F5', 'ALT+F6', 'ALT+F11', 'ALT+F12', 'ALT+F8', 'Ctrl+F1', 'Ctrl+F2', 'ALT+F7', 0, '', '', '', 42, 1, NULL, 0, '', '', '', '', 'black', 0, 0, 0, 0, 'Rp', 0, 1, 1, 1, 'null', 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_stock_item`
--

CREATE TABLE `tec_stock_item` (
  `IDStock` int(11) NOT NULL,
  `WarehouseCode` varchar(8) NOT NULL,
  `ItemCode` varchar(25) NOT NULL,
  `QTY` decimal(20,2) NOT NULL DEFAULT 0.00,
  `volume` decimal(20,2) DEFAULT 0.00,
  `ItemAverage` double NOT NULL DEFAULT 0,
  `ItemAverage_volume` double NOT NULL DEFAULT 0,
  `LastUser` varchar(8) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_stores`
--

CREATE TABLE `tec_stores` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `code` varchar(20) NOT NULL,
  `logo` varchar(40) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(15) NOT NULL,
  `address1` varchar(50) DEFAULT NULL,
  `address2` varchar(50) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `state` varchar(20) DEFAULT NULL,
  `postal_code` varchar(8) DEFAULT NULL,
  `country` varchar(25) DEFAULT NULL,
  `currency_code` varchar(3) DEFAULT NULL,
  `receipt_header` text DEFAULT NULL,
  `receipt_footer` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_stores`
--

INSERT INTO `tec_stores` (`id`, `name`, `code`, `logo`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `postal_code`, `country`, `currency_code`, `receipt_header`, `receipt_footer`) VALUES
(1, 'SUMBER SUBUR', 'POS', '895800c6c7b403946a184fc4be94de40.png', 'waroenkmimo999@gmail.com', '012345678', 'Address Line 1', '', 'Cipinang', 'Backstrad', '131410', 'Indonesia', 'MYR', '', 'This is receipt footer for store');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_suppliers`
--

CREATE TABLE `tec_suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(55) NOT NULL,
  `cf1` varchar(255) NOT NULL,
  `cf2` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_suppliers`
--

INSERT INTO `tec_suppliers` (`id`, `name`, `cf1`, `cf2`, `phone`, `email`) VALUES
(1, 'Test Supplier', '1', '2', '0123456789', 'supplier@tecdairy.com'),
(2, 'SUPLIER CABE', '', '', '021021', 'CABE@GGMAIL.COM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_suspended_items`
--

CREATE TABLE `tec_suspended_items` (
  `id` int(11) NOT NULL,
  `suspend_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` decimal(15,4) NOT NULL,
  `unit_price` decimal(25,4) NOT NULL,
  `net_unit_price` decimal(25,4) NOT NULL,
  `discount` varchar(20) DEFAULT NULL,
  `item_discount` decimal(25,4) DEFAULT NULL,
  `tax` int(20) DEFAULT NULL,
  `item_tax` decimal(25,4) DEFAULT NULL,
  `subtotal` decimal(25,4) NOT NULL,
  `real_unit_price` decimal(25,4) DEFAULT NULL,
  `product_code` varchar(50) DEFAULT NULL,
  `product_name` varchar(50) DEFAULT NULL,
  `comment` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_suspended_items`
--

INSERT INTO `tec_suspended_items` (`id`, `suspend_id`, `product_id`, `quantity`, `unit_price`, `net_unit_price`, `discount`, `item_discount`, `tax`, `item_tax`, `subtotal`, `real_unit_price`, `product_code`, `product_name`, `comment`) VALUES
(1, 1, 7, '2.0000', '5000.0000', '5000.0000', '0', '0.0000', 0, '0.0000', '10000.0000', '5000.0000', 'CK231', 'CABE KRITING', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_suspended_sales`
--

CREATE TABLE `tec_suspended_sales` (
  `id` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `customer_id` int(11) NOT NULL,
  `customer_name` varchar(55) NOT NULL,
  `total` decimal(25,4) NOT NULL,
  `product_discount` decimal(25,4) DEFAULT NULL,
  `order_discount_id` varchar(20) DEFAULT NULL,
  `order_discount` decimal(25,4) DEFAULT NULL,
  `total_discount` decimal(25,4) DEFAULT NULL,
  `product_tax` decimal(25,4) DEFAULT NULL,
  `order_tax_id` varchar(20) DEFAULT NULL,
  `order_tax` decimal(25,4) DEFAULT NULL,
  `total_tax` decimal(25,4) DEFAULT NULL,
  `grand_total` decimal(25,4) NOT NULL,
  `total_items` int(11) DEFAULT NULL,
  `total_quantity` decimal(15,4) DEFAULT NULL,
  `paid` decimal(25,4) DEFAULT NULL,
  `created_by` int(11) DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `note` varchar(1000) DEFAULT NULL,
  `hold_ref` varchar(255) DEFAULT NULL,
  `store_id` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_suspended_sales`
--

INSERT INTO `tec_suspended_sales` (`id`, `date`, `customer_id`, `customer_name`, `total`, `product_discount`, `order_discount_id`, `order_discount`, `total_discount`, `product_tax`, `order_tax_id`, `order_tax`, `total_tax`, `grand_total`, `total_items`, `total_quantity`, `paid`, `created_by`, `updated_by`, `updated_at`, `note`, `hold_ref`, `store_id`) VALUES
(1, '2020-12-05 00:33:38', 2, 'ss', '10000.0000', '0.0000', NULL, '0.0000', '0.0000', '0.0000', '0%', '0.0000', '0.0000', '10000.0000', 1, '2.0000', '0.0000', 1, NULL, NULL, '', 'ss', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_unit`
--

CREATE TABLE `tec_unit` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `nick` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tec_unit`
--

INSERT INTO `tec_unit` (`id`, `name`, `nick`) VALUES
(1, 'Kilogram', 'Kg'),
(2, 'Ons', 'Ons');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_users`
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
  `store_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_users`
--

INSERT INTO `tec_users` (`id`, `last_ip_address`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `avatar`, `gender`, `group_id`, `store_id`) VALUES
(1, 0x3132372e302e302e31, 0x3132372e302e302e31, 'admin', 'fe941d48eb1fbce34b4588ae500861570fb0e398', NULL, 'admin@cuansdev.com', NULL, NULL, NULL, 'b2d2c8fd5d9a5f19901279ac74cec92dc15ac970', 1435204774, 1658125094, 1, 'Admin', 'Admin', 'Cuansdev', '012345678', NULL, 'male', 1, 1),
(2, NULL, 0x3130332e3231332e3132382e323534, 'bayu', '36fffd7e5a4b88f7b4bfc7f6854544a120f74ab8', NULL, 'bayoewa@gmail.com', NULL, NULL, NULL, NULL, 1606535740, 1606535740, 1, 'Bayu', 'War', NULL, '08888', NULL, 'male', 2, 1),
(3, 0x3131342e352e3231312e3531, 0x3131322e3231352e3233352e323235, 'kasir', '9864e0f0337fbadaed1fe31320300928552e2e82', NULL, 'kasir@sumbersubur.xyz', NULL, NULL, NULL, '974c4ea17b3e6e918e450c5df7929e6a1bc3272a', 1606569552, 1606707580, 1, 'kasir', 'sumbersubur', NULL, '12345678', NULL, 'male', 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tec_user_logins`
--

CREATE TABLE `tec_user_logins` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_id` int(11) DEFAULT NULL,
  `ip_address` varbinary(16) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `tec_user_logins`
--

INSERT INTO `tec_user_logins` (`id`, `user_id`, `company_id`, `ip_address`, `login`, `time`) VALUES
(1, 1, NULL, 0x38302e32332e3132312e313134, 'admin@tecdiary.com', '2019-03-19 16:47:42'),
(2, 1, NULL, 0x3a3a31, 'admin@tecdiary.com', '2019-03-19 18:17:26'),
(3, 1, NULL, 0x3a3a31, 'admin', '2020-05-13 14:45:37'),
(4, 1, NULL, 0x3132372e302e302e31, 'admin', '2020-05-14 17:07:01'),
(5, 1, NULL, 0x3a3a31, 'admin', '2020-07-26 03:19:04'),
(6, 1, NULL, 0x3a3a31, 'admin', '2020-11-27 18:16:15'),
(7, 1, NULL, 0x3131322e3231352e3233352e323235, 'admin', '2020-11-27 18:50:48'),
(8, 1, NULL, 0x3131322e3231352e3233352e323235, 'admin', '2020-11-27 19:14:34'),
(9, 1, NULL, 0x3131342e342e3231322e3732, 'Admin', '2020-11-28 00:29:21'),
(10, 1, NULL, 0x3131342e342e3231322e3732, 'Admin', '2020-11-28 00:30:01'),
(11, 1, NULL, 0x3131342e342e3231322e3732, 'admin', '2020-11-28 02:44:27'),
(12, 1, NULL, 0x3130332e3231332e3132382e323534, 'Admin ', '2020-11-28 03:11:14'),
(13, 1, NULL, 0x3130332e3231332e3132382e323534, 'admin', '2020-11-28 03:46:20'),
(14, 1, NULL, 0x3130332e3231332e3132382e323534, 'admin', '2020-11-28 03:48:08'),
(15, 1, NULL, 0x3131322e3231352e3233352e323235, 'admin', '2020-11-28 05:01:10'),
(16, 1, NULL, 0x3131342e342e3231322e3732, 'admin', '2020-11-28 05:09:20'),
(17, 1, NULL, 0x3130332e3231332e3132382e323534, 'admin', '2020-11-28 05:34:43'),
(18, 1, NULL, 0x3130332e3231332e3132382e323534, 'admin', '2020-11-28 05:35:14'),
(19, 1, NULL, 0x3130332e3231332e3132382e323534, 'admin', '2020-11-28 05:35:47'),
(20, 1, NULL, 0x3131342e342e3231322e3732, 'admin', '2020-11-28 05:42:54'),
(21, 1, NULL, 0x3131322e3231352e3233352e323235, 'admin', '2020-11-28 09:02:19'),
(22, 1, NULL, 0x3131342e352e3231312e3531, 'admin', '2020-11-28 12:34:46'),
(23, 1, NULL, 0x3131322e3231352e3233352e323235, 'admin', '2020-11-28 13:01:08'),
(24, 3, NULL, 0x3131322e3231352e3233352e323235, 'kasir', '2020-11-28 13:19:29'),
(25, 3, NULL, 0x3131342e352e3231312e3531, 'kasir', '2020-11-28 13:35:42'),
(26, 1, NULL, 0x3130332e3231332e3132392e3938, 'admin', '2020-11-28 18:35:36'),
(27, 3, NULL, 0x3131342e352e3231312e3531, 'kasir', '2020-11-29 04:29:35'),
(28, 1, NULL, 0x3131342e352e3231312e3531, 'admin', '2020-11-29 04:31:52'),
(29, 1, NULL, 0x3131342e352e3231312e3531, 'admin', '2020-11-29 08:21:43'),
(30, 3, NULL, 0x3131342e352e3231312e3531, 'kasir', '2020-11-29 08:30:19'),
(31, 1, NULL, 0x3131342e352e3231312e3531, 'admin', '2020-11-29 08:35:14'),
(32, 1, NULL, 0x3130332e3231332e3132382e313138, 'admin', '2020-11-29 14:48:43'),
(33, 1, NULL, 0x3130332e36362e3139382e3432, 'Admin ', '2020-11-30 03:36:22'),
(34, 1, NULL, 0x3131342e352e3231312e3531, 'Admin', '2020-11-30 03:36:23'),
(35, 3, NULL, 0x3131342e352e3231312e3531, 'Kasir', '2020-11-30 03:39:40'),
(36, 1, NULL, 0x3131342e352e3231312e3531, 'Admin', '2020-11-30 03:41:24'),
(37, 1, NULL, 0x3130332e36362e3139382e3432, 'admin', '2020-11-30 04:15:40'),
(38, 1, NULL, 0x3a3a31, 'admin', '2020-11-30 09:14:12'),
(39, 1, NULL, 0x3a3a31, 'admin', '2020-12-01 03:37:14'),
(40, 1, NULL, 0x3132372e302e302e31, 'admin', '2020-12-01 07:11:01'),
(41, 1, NULL, 0x3a3a31, 'admin', '2020-12-01 17:29:08'),
(42, 1, NULL, 0x3a3a31, 'admin', '2020-12-01 17:46:46'),
(43, 1, NULL, 0x3a3a31, 'admin', '2020-12-04 17:25:55'),
(44, 1, NULL, 0x3a3a31, 'admin', '2020-12-05 14:51:50'),
(45, 1, NULL, 0x3a3a31, 'admin', '2020-12-05 15:12:35'),
(46, 1, NULL, 0x3a3a31, 'admin', '2020-12-07 15:19:33'),
(47, 1, NULL, 0x3a3a31, 'admin', '2020-12-07 16:48:43'),
(48, 1, NULL, 0x3a3a31, 'admin', '2020-12-08 17:14:03'),
(49, 1, NULL, 0x3a3a31, 'admin', '2020-12-15 12:46:28'),
(50, 1, NULL, 0x3a3a31, 'admin', '2020-12-15 14:11:48'),
(51, 1, NULL, 0x3a3a31, 'admin', '2020-12-15 14:15:54'),
(52, 1, NULL, 0x3a3a31, 'admin', '2020-12-15 15:24:37'),
(53, 1, NULL, 0x3a3a31, 'admin', '2020-12-15 15:25:43'),
(54, 1, NULL, 0x3a3a31, 'admin', '2020-12-16 14:58:44'),
(55, 1, NULL, 0x3132372e302e302e31, 'admin', '2020-12-19 03:32:31'),
(56, 1, NULL, 0x3a3a31, 'admin', '2020-12-20 03:17:55'),
(57, 1, NULL, 0x3a3a31, 'admin', '2020-12-20 13:39:21'),
(58, 1, NULL, 0x3a3a31, 'admin', '2020-12-21 00:36:43'),
(59, 1, NULL, 0x3132372e302e302e31, 'admin', '2020-12-21 00:46:47'),
(60, 1, NULL, 0x3a3a31, 'admin', '2020-12-21 07:59:07'),
(61, 1, NULL, 0x3a3a31, 'admin', '2020-12-21 08:29:58'),
(62, 1, NULL, 0x3a3a31, 'admin', '2020-12-21 14:18:54'),
(63, 1, NULL, 0x3a3a31, 'admin', '2020-12-21 14:43:08'),
(64, 1, NULL, 0x3a3a31, 'admin', '2020-12-21 14:54:40'),
(65, 1, NULL, 0x3a3a31, 'admin', '2020-12-21 14:57:51'),
(66, 1, NULL, 0x3a3a31, 'admin', '2020-12-21 14:59:47'),
(67, 1, NULL, 0x3a3a31, 'admin', '2020-12-22 16:00:47'),
(68, 1, NULL, 0x3a3a31, 'admin', '2020-12-22 16:25:45'),
(69, 1, NULL, 0x3a3a31, 'admin', '2020-12-22 16:27:39'),
(70, 1, NULL, 0x3a3a31, 'admin', '2020-12-22 16:28:33'),
(71, 1, NULL, 0x3a3a31, 'admin', '2020-12-22 16:49:56'),
(72, 1, NULL, 0x3a3a31, 'admin', '2020-12-26 10:21:44'),
(73, 1, NULL, 0x3a3a31, 'admin', '2020-12-27 04:34:44'),
(74, 1, NULL, 0x3a3a31, 'admin', '2020-12-27 04:44:58'),
(75, 1, NULL, 0x3a3a31, 'admin', '2020-12-27 05:01:20'),
(76, 1, NULL, 0x3132372e302e302e31, 'admin', '2020-12-28 02:23:09'),
(77, 1, NULL, 0x3132372e302e302e31, 'admin', '2020-12-28 02:25:26'),
(78, 1, NULL, 0x3132372e302e302e31, 'admin', '2020-12-28 03:29:09'),
(79, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-06-13 08:06:01'),
(80, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-16 16:43:09'),
(81, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-16 17:33:31'),
(82, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-16 17:35:26'),
(83, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-16 17:37:34'),
(84, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-16 20:42:00'),
(85, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-17 15:28:06'),
(86, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-18 05:21:50'),
(87, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-18 05:41:18'),
(88, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-18 05:57:22'),
(89, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-18 06:17:39'),
(90, 1, NULL, 0x3132372e302e302e31, 'admin', '2022-07-18 06:18:14');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `tec_v_kartustok`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `tec_v_kartustok` (
`idProduk` varchar(15)
,`tanggal` date
,`name` char(255)
,`currentStok` int(15)
,`store_id` int(11)
,`rpMasuk` decimal(46,0)
,`rpKeluar` decimal(46,0)
,`totalBarangMasuk` decimal(36,0)
,`totalStokAwal` decimal(36,0)
,`totalBarangKeluar` decimal(36,0)
,`totalRetur` decimal(36,0)
,`totalWaste` decimal(36,0)
,`totalReturStore` decimal(36,0)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `tec_v_kartustok`
--
DROP TABLE IF EXISTS `tec_v_kartustok`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `tec_v_kartustok`  AS SELECT `tec_kartu_stok`.`idProduk` AS `idProduk`, `tec_kartu_stok`.`tanggal` AS `tanggal`, `tec_products`.`name` AS `name`, `tec_kartu_stok`.`currentStok` AS `currentStok`, `tec_kartu_stok`.`store_id` AS `store_id`, sum(`tec_kartu_stok`.`barangMasuk` * `tec_kartu_stok`.`hargaSatuan`) AS `rpMasuk`, sum(`tec_kartu_stok`.`barangKeluar` * `tec_kartu_stok`.`hargaSatuan`) AS `rpKeluar`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'PENERIMAAN' then `tec_kartu_stok`.`barangMasuk` else 0 end) AS `totalBarangMasuk`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'STOKAWAL' then `tec_kartu_stok`.`barangMasuk` else 0 end) AS `totalStokAwal`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'PENJUALAN' then `tec_kartu_stok`.`barangKeluar` else 0 end) AS `totalBarangKeluar`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'RETUR' then `tec_kartu_stok`.`barangKeluar` else 0 end) AS `totalRetur`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'WASTE' then `tec_kartu_stok`.`barangKeluar` else 0 end) AS `totalWaste`, sum(case when `tec_kartu_stok`.`jenisTrx` = 'RETURSTORE' then `tec_kartu_stok`.`barangMasuk` else 0 end) AS `totalReturStore` FROM (`tec_kartu_stok` left join `tec_products` on(`tec_products`.`id` = `tec_kartu_stok`.`idProduk`)) GROUP BY `tec_kartu_stok`.`idProduk` ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tec_categories`
--
ALTER TABLE `tec_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_combo_items`
--
ALTER TABLE `tec_combo_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_customers`
--
ALTER TABLE `tec_customers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_expenses`
--
ALTER TABLE `tec_expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_gift_cards`
--
ALTER TABLE `tec_gift_cards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `card_no` (`card_no`);

--
-- Indeks untuk tabel `tec_groups`
--
ALTER TABLE `tec_groups`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_hutang`
--
ALTER TABLE `tec_hutang`
  ADD PRIMARY KEY (`no_tagihan`) USING BTREE;

--
-- Indeks untuk tabel `tec_kartu_stok`
--
ALTER TABLE `tec_kartu_stok`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `tec_login_attempts`
--
ALTER TABLE `tec_login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_payments`
--
ALTER TABLE `tec_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_printers`
--
ALTER TABLE `tec_printers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_products`
--
ALTER TABLE `tec_products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indeks untuk tabel `tec_product_store_qty`
--
ALTER TABLE `tec_product_store_qty`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `store_id` (`store_id`);

--
-- Indeks untuk tabel `tec_purchases`
--
ALTER TABLE `tec_purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_purchase_items`
--
ALTER TABLE `tec_purchase_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_purchase_payments`
--
ALTER TABLE `tec_purchase_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_receiving`
--
ALTER TABLE `tec_receiving`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_receiving_items`
--
ALTER TABLE `tec_receiving_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_registers`
--
ALTER TABLE `tec_registers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_sales`
--
ALTER TABLE `tec_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_sale_items`
--
ALTER TABLE `tec_sale_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_sessions`
--
ALTER TABLE `tec_sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ci_sessions_timestamp` (`timestamp`);

--
-- Indeks untuk tabel `tec_settings`
--
ALTER TABLE `tec_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indeks untuk tabel `tec_stock_item`
--
ALTER TABLE `tec_stock_item`
  ADD PRIMARY KEY (`IDStock`),
  ADD KEY `WarehouseCode` (`WarehouseCode`),
  ADD KEY `ItemCode` (`ItemCode`);

--
-- Indeks untuk tabel `tec_stores`
--
ALTER TABLE `tec_stores`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_suppliers`
--
ALTER TABLE `tec_suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_suspended_items`
--
ALTER TABLE `tec_suspended_items`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_suspended_sales`
--
ALTER TABLE `tec_suspended_sales`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_unit`
--
ALTER TABLE `tec_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tec_users`
--
ALTER TABLE `tec_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Indeks untuk tabel `tec_user_logins`
--
ALTER TABLE `tec_user_logins`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tec_categories`
--
ALTER TABLE `tec_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tec_combo_items`
--
ALTER TABLE `tec_combo_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tec_customers`
--
ALTER TABLE `tec_customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tec_expenses`
--
ALTER TABLE `tec_expenses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tec_gift_cards`
--
ALTER TABLE `tec_gift_cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tec_groups`
--
ALTER TABLE `tec_groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tec_kartu_stok`
--
ALTER TABLE `tec_kartu_stok`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tec_login_attempts`
--
ALTER TABLE `tec_login_attempts`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tec_payments`
--
ALTER TABLE `tec_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tec_printers`
--
ALTER TABLE `tec_printers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tec_products`
--
ALTER TABLE `tec_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tec_product_store_qty`
--
ALTER TABLE `tec_product_store_qty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `tec_purchases`
--
ALTER TABLE `tec_purchases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `tec_purchase_items`
--
ALTER TABLE `tec_purchase_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tec_purchase_payments`
--
ALTER TABLE `tec_purchase_payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tec_receiving`
--
ALTER TABLE `tec_receiving`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `tec_receiving_items`
--
ALTER TABLE `tec_receiving_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tec_registers`
--
ALTER TABLE `tec_registers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `tec_sales`
--
ALTER TABLE `tec_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tec_sale_items`
--
ALTER TABLE `tec_sale_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tec_stock_item`
--
ALTER TABLE `tec_stock_item`
  MODIFY `IDStock` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tec_stores`
--
ALTER TABLE `tec_stores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tec_suppliers`
--
ALTER TABLE `tec_suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tec_suspended_items`
--
ALTER TABLE `tec_suspended_items`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tec_suspended_sales`
--
ALTER TABLE `tec_suspended_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tec_unit`
--
ALTER TABLE `tec_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tec_users`
--
ALTER TABLE `tec_users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tec_user_logins`
--
ALTER TABLE `tec_user_logins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
