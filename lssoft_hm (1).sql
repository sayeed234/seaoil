-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 04, 2021 at 10:43 PM
-- Server version: 5.6.41-84.1
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lssoft_hm`
--

-- --------------------------------------------------------

--
-- Table structure for table `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vessel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agent` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `com` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `billing`, `partner`, `vessel`, `imo`, `agent`, `date`, `status`, `user`, `com`, `free2`, `created_at`, `updated_at`) VALUES
(1, '8718103', '1', 'Liton', 'Hig Sulfar', 'Oil', '2021-04-04', '0', '10', '50', NULL, '2021-04-04 16:33:14', '2021-04-04 16:33:14'),
(2, '3291245', '1', 'BAPPY', 'CDSO', 'OIL', '2021-04-04', '0', '10', '50', NULL, '2021-04-04 16:52:44', '2021-04-04 16:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `capitals`
--

CREATE TABLE `capitals` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `free`, `created_at`, `updated_at`) VALUES
(1, 'OIL STORS', NULL, '2021-04-04 16:27:04', '2021-04-04 16:27:04');

-- --------------------------------------------------------

--
-- Table structure for table `cdetails`
--

CREATE TABLE `cdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `corder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cdetails`
--

INSERT INTO `cdetails` (`id`, `corder`, `name`, `qty`, `rate`, `total`, `unit`, `free`, `free2`, `created_at`, `updated_at`) VALUES
(1, '1', 'FO-Hig Sulfar', '51000', '23.50', '1198500', 'Ltr', NULL, NULL, '2021-04-04 17:07:19', '2021-04-04 17:07:19'),
(2, '2', 'CDSO', '43', '17200', '739600', 'Drum', NULL, NULL, '2021-04-04 17:57:50', '2021-04-04 17:57:50'),
(3, '2', 'FO-Hig Sulfar', '145', '71.66', '10390.7', 'Ltr', NULL, NULL, '2021-04-04 17:57:50', '2021-04-04 17:57:50'),
(4, '3', 'CDSO', '20', '17200', '344000', 'Drum', NULL, NULL, '2021-04-04 18:25:42', '2021-04-04 18:25:42'),
(5, '4', 'CDSO', '20', '17200', '344000', 'Drum', NULL, NULL, '2021-04-04 18:50:57', '2021-04-04 18:50:57'),
(6, '5', 'CDSO', '114', '71.66', '8169.24', 'Ltr', NULL, NULL, '2021-04-04 18:51:50', '2021-04-04 18:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `register` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `address`, `phone1`, `phone2`, `email`, `register`, `image`, `owner`, `tin`, `balance`, `free2`, `created_at`, `updated_at`) VALUES
(1, 'HM SUPPLIERS', 'M Rahman Tower(4th Floor) Cement Crossing,EPZ.Chittagong Bangladesh', '+8801619222777', '+8801857922724', 'abu.sayeed.diu@gmail.com', '2021', 'public/image/Capture2.JPG', 'Josim', '2021', '0', NULL, NULL, '2021-04-04 22:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `companyexpenses`
--

CREATE TABLE `companyexpenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `corders`
--

CREATE TABLE `corders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `corders`
--

INSERT INTO `corders` (`id`, `invoice`, `customer`, `total`, `payment`, `qty`, `user`, `free1`, `free2`, `created_at`, `updated_at`) VALUES
(1, '693176', '1', '1198500', '0', '51000', '10', NULL, NULL, '2021-04-04', '2021-04-04 17:07:19'),
(2, '259579', '2', '749990.7', '749990', '188', '10', NULL, NULL, '2021-04-04', '2021-04-04 17:57:50'),
(4, '676402', '2', '344000', '0', '20', '10', NULL, NULL, '2021-04-04', '2021-04-04 18:50:57'),
(5, '607188', '2', '8169.24', '0', '114', '10', NULL, NULL, '2021-04-04', '2021-04-04 18:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `cpayments`
--

CREATE TABLE `cpayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `corder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `customer` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cpayments`
--

INSERT INTO `cpayments` (`id`, `corder`, `customer`, `payment`, `user`, `free2`, `created_at`, `updated_at`) VALUES
(1, NULL, '1', '1198500', '10', 'Cash', '2021-04-04', '2021-04-04 19:11:07'),
(4, NULL, '2', '750000', '10', 'Cash', '2021-04-04', '2021-04-04 19:20:38');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `mobile`, `address`, `user`, `free`, `free2`, `created_at`, `updated_at`) VALUES
(1, 'Md.Showkat', '01783516220', 'Bangla Bazaer', '10', NULL, NULL, '2021-04-04 17:04:10', '2021-04-04 17:04:10'),
(2, 'Md.Bhadur', '01714574502', 'Cement Crssing EPZ Chittagong', '10', NULL, NULL, '2021-04-04 17:10:13', '2021-04-04 17:10:13');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `operation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`id`, `billing`, `billno`, `operation`, `qty`, `rate`, `total`, `user`, `partner`, `free2`, `free3`, `created_at`, `updated_at`) VALUES
(1, '1', '8718103', '15', '1', '70000', '70000', '10', '1', NULL, NULL, '2021-04-04 17:21:52', '2021-04-04 17:21:52'),
(2, '1', '8718103', '2', '2', '8000', '16000', '10', '1', NULL, NULL, '2021-04-05 04:52:25', '2021-04-05 04:52:25'),
(3, '1', '8718103', '3', '1', '20000', '20000', '10', '1', NULL, NULL, '2021-04-05 04:53:54', '2021-04-05 04:53:54'),
(4, '1', '8718103', '7', '1', '3000', '3000', '10', '1', NULL, NULL, '2021-04-05 04:55:17', '2021-04-05 04:55:17'),
(5, '1', '8718103', '17', '1', '600', '600', '10', '1', NULL, NULL, '2021-04-05 04:57:37', '2021-04-05 04:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `expense_categories`
--

CREATE TABLE `expense_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `expense_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `expense_categories`
--

INSERT INTO `expense_categories` (`id`, `expense_category`, `free`, `created_at`, `updated_at`) VALUES
(1, 'Transport(Pickup)', NULL, '2021-04-04 16:36:10', '2021-04-04 16:36:10'),
(2, 'Tranport(Boucher track)', NULL, '2021-04-04 16:37:02', '2021-04-04 16:37:02'),
(3, 'Police', NULL, '2021-04-04 16:37:25', '2021-04-04 16:37:25'),
(4, 'Labor`s Snacks', NULL, '2021-04-04 16:38:03', '2021-04-04 16:38:03'),
(5, 'Unload Labor`s', NULL, '2021-04-04 16:38:52', '2021-04-04 16:38:52'),
(6, 'Boat`s Oil', NULL, '2021-04-04 16:39:18', '2021-04-04 16:39:18'),
(7, 'Police Station', NULL, '2021-04-04 16:39:52', '2021-04-04 16:39:52'),
(8, 'Cost Guard', NULL, '2021-04-04 16:40:23', '2021-04-04 16:40:23'),
(9, 'Product Carrier Labor`s', NULL, '2021-04-04 16:41:29', '2021-04-04 16:41:29'),
(10, 'Drum Purchase', NULL, '2021-04-04 16:42:04', '2021-04-04 16:42:04'),
(11, 'Duty Boat', NULL, '2021-04-04 16:42:33', '2021-04-04 16:42:33'),
(12, 'Ship`s Expenses', NULL, '2021-04-04 16:43:16', '2021-04-04 16:43:16'),
(13, 'Jashim Expenses', NULL, '2021-04-04 16:43:45', '2021-04-04 16:43:45'),
(14, 'Ship`s Labor`s', NULL, '2021-04-04 16:45:08', '2021-04-04 16:45:08'),
(15, 'Volget', NULL, '2021-04-04 17:20:10', '2021-04-04 17:20:10'),
(16, 'Bunker', NULL, '2021-04-04 17:20:29', '2021-04-04 17:20:29'),
(17, 'Parcking', NULL, '2021-04-05 04:56:28', '2021-04-05 04:56:28');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '1=Shippurchase \r\n2=supplierpurchase\r\n 3=shipsale',
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partner` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `billing`, `billno`, `pid`, `pname`, `qty`, `rate`, `total`, `type`, `comments`, `unit`, `partner`, `free3`, `created_at`, `updated_at`) VALUES
(1, '1', '8718103', '10', 'FO-Hig Sulfar', '52000', '19', '988000', '1', NULL, 'Ltr', '1', NULL, '2021-04-04 16:33:58', '2021-04-04 16:33:58'),
(2, '1', '8718103', '10', 'FO-Hig Sulfar', '51000', '23.50', '1198500', '3', NULL, 'Ltr', '1', NULL, '2021-04-04 16:34:40', '2021-04-04 16:34:40'),
(7, '2', '3291245', '10', 'CDSO', '45', '9500', '427500', '1', NULL, 'Drum', '1', NULL, '2021-04-04 18:29:15', '2021-04-04 18:29:15'),
(8, '2', '3291245', '10', 'CDSO', '43', '17200', '739600', '3', NULL, 'Drum', '1', NULL, '2021-04-04 18:30:08', '2021-04-04 18:30:08'),
(9, '2', '3291245', '10', 'CDSO', '145', '71.66', '10390.7', '3', NULL, 'Ltr', '1', NULL, '2021-04-04 18:30:55', '2021-04-04 18:30:55'),
(10, '2', '3291245', '10', 'CDSO', '21', '9500', '199500', '1', NULL, 'Drum', '1', NULL, '2021-04-04 18:34:53', '2021-04-04 18:34:53'),
(11, '2', '3291245', '10', 'CDSO', '20', '17200', '344000', '3', NULL, 'Drum', '1', NULL, '2021-04-04 18:38:25', '2021-04-04 18:38:25'),
(12, '2', '3291245', '10', 'CDSO', '114', '71.66', '8169.24', '3', NULL, 'Drum', '1', NULL, '2021-04-04 18:39:15', '2021-04-04 18:39:15');

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `acc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `balance` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `pid`, `name`, `mobile`, `email`, `nid`, `address`, `bank`, `acc`, `gender`, `image`, `status`, `balance`, `free2`, `created_at`, `updated_at`) VALUES
(1, '675', 'Md.Harun-Ur Rashid', '01815138429', 'info@hmsupplierssbd.com', NULL, 'M Rohman Tower(4Th Floor) Cement Crossing EPZ Chittagong', 'H m Suppliers', '138429', 'Male', 'public/image/party/images sea oil.png', '1', NULL, NULL, '2021-04-04 16:32:19', '2021-04-04 16:32:19'),
(2, '3217', 'Md.Zahid', '01811114268', 'info@shipchandlerbd.com', NULL, 'Chittagong', NULL, NULL, 'Male', 'public/image/party/boat-wheel-transparent-png-clip-art-image-5a1c44f5c55c12.0747929215118021018084.jpg', '1', NULL, NULL, '2021-04-05 01:23:00', '2021-04-05 01:23:00');

-- --------------------------------------------------------

--
-- Table structure for table `partnerpayments`
--

CREATE TABLE `partnerpayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `partner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `billno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pprofits`
--

CREATE TABLE `pprofits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `billing` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vessel` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profit` int(255) NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` int(255) DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category`, `name`, `code`, `unit`, `price`, `free`, `free2`, `free3`, `free4`, `created_at`, `updated_at`) VALUES
(1, '1', 'FO-Hig Sulfar', '25843', 'Ltr', '19', NULL, NULL, NULL, NULL, '2021-04-04 16:28:23', '2021-04-04 16:28:23'),
(2, '1', 'CDSO', '76726', 'Drum', '9500', NULL, NULL, NULL, NULL, '2021-04-04 16:48:44', '2021-04-04 16:48:44');

-- --------------------------------------------------------

--
-- Table structure for table `sdetails`
--

CREATE TABLE `sdetails` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sorder` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sdetails`
--

INSERT INTO `sdetails` (`id`, `sorder`, `name`, `qty`, `rate`, `total`, `unit`, `free`, `free2`, `created_at`, `updated_at`) VALUES
(1, '1', 'CDSO', '47', '9500', '446500', 'Drum', NULL, NULL, '2021-04-04', '2021-04-04 16:55:14'),
(2, '2', 'CDSO', '22', '9500', '209000', 'Drum', NULL, NULL, '2021-04-04', '2021-04-04 16:56:10'),
(3, '3', 'FO-Hig Sulfar', '52000', '19', '988000', 'Ltr', NULL, NULL, '2021-04-04', '2021-04-04 16:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('Lf7fLAUirVxJ28mtBGPN2nNEWZzOSZWgIV9HPrl8', NULL, '58.145.187.235', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiZk5nOE5oaHRnVGplczl0V3VsRDVSUGNxWld4TjZIVGdHYkZaU1A3UyI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjA6Imh0dHA6Ly9obS5sc3NvZnQueHl6Ijt9fQ==', 1617563553);

-- --------------------------------------------------------

--
-- Table structure for table `sorders`
--

CREATE TABLE `sorders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sorders`
--

INSERT INTO `sorders` (`id`, `invoice`, `supplier`, `total`, `payment`, `qty`, `user`, `free1`, `free2`, `created_at`, `updated_at`) VALUES
(1, '532060', '2', '446500', '0', '47', '10', NULL, NULL, '2021-04-04', '2021-04-04 16:55:14'),
(2, '755160', '2', '209000', '0', '22', '10', NULL, NULL, '2021-04-04', '2021-04-04 16:56:10'),
(3, '497284', '1', '988000', '585000', '52000', '10', NULL, NULL, '2021-04-04', '2021-04-04 16:58:57');

-- --------------------------------------------------------

--
-- Table structure for table `spayments`
--

CREATE TABLE `spayments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sorder` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `supplier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `spayments`
--

INSERT INTO `spayments` (`id`, `sorder`, `supplier`, `payment`, `user`, `free2`, `created_at`, `updated_at`) VALUES
(1, NULL, '2', '300000', '10', 'CASH', '2021-04-04', '2021-04-04 16:56:46'),
(2, '3', '1', '585000', '10', NULL, '2021-04-04', '2021-04-04 16:58:57'),
(3, NULL, '2', '336500', '10', 'Cash', '2021-04-04', '2021-04-05 01:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `free` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `company`, `mobile`, `address`, `user`, `free`, `free1`, `free2`, `created_at`, `updated_at`) VALUES
(1, 'Md.Liton', 'FO-Hig Sulfar', '01718470057', 'Noakhali', '10', NULL, NULL, NULL, '2021-04-04 16:25:30', '2021-04-04 16:25:30'),
(2, 'Md.Bappy', 'S-R-B', '01619222777', 'Noakhli', '10', NULL, NULL, NULL, '2021-04-04 16:47:40', '2021-04-04 16:47:40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '2' COMMENT 'admin=1 and User=2',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `role` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `com` int(11) DEFAULT NULL,
  `sale` int(11) DEFAULT NULL,
  `loan` int(11) DEFAULT NULL,
  `free` int(11) DEFAULT NULL,
  `free2` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `remember_token`, `current_team_id`, `profile_photo_path`, `type`, `status`, `role`, `created_at`, `mobile`, `address`, `updated_at`, `com`, `sale`, `loan`, `free`, `free2`) VALUES
(1, 'Abu Sayeed', 'abu.sayeed.diu@gmail.com', NULL, '$2y$10$917Q25D1oLhXU/fek5qb0.JgQFH57iOlieT2hn/C8erB3OsVxs9rC', NULL, NULL, NULL, NULL, 'public/image/user/icon.png', '1', '1', 1, '2021-03-13 18:12:49', '01318712782', 'Mirpur -13,Road-4 Dhaka', '2021-03-13 12:12:49', NULL, NULL, NULL, NULL, NULL),
(10, 'Office', 'admin@admin.com', NULL, '$2y$10$drkL3EFiZILV2zDt/1yj7e5/paWR6hItSUhQkiO4T0uSIObJHDUxC', NULL, NULL, NULL, NULL, 'public/image/user/d958ea13928499.5627a60f7fbc2.png', '1', '1', 1, '2020-12-02 00:00:00', '01318712782', 'Dhaka,Bangladesh', '2021-04-04 17:10:16', 1, 1, 1, NULL, NULL),
(15, 'Jashim', 'jashim@jashim.com', NULL, '$2y$10$iqBeSx7VIe8ReoPP/QLtsuq3/x1jRA6btFfwKq49NNIb7BxhNZjpe', NULL, NULL, NULL, NULL, 'public/image/user/89cd844ea03527ee307a5c37211fc505.jpg', '1', '1', 2, '2021-04-03 22:55:03', '01771700400', 'Chittagong', '2021-04-04 03:55:03', NULL, NULL, NULL, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `capitals`
--
ALTER TABLE `capitals`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cdetails`
--
ALTER TABLE `cdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companyexpenses`
--
ALTER TABLE `companyexpenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `corders`
--
ALTER TABLE `corders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cpayments`
--
ALTER TABLE `cpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expense_categories`
--
ALTER TABLE `expense_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partnerpayments`
--
ALTER TABLE `partnerpayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pprofits`
--
ALTER TABLE `pprofits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sdetails`
--
ALTER TABLE `sdetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sorders`
--
ALTER TABLE `sorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spayments`
--
ALTER TABLE `spayments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`(191));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `capitals`
--
ALTER TABLE `capitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cdetails`
--
ALTER TABLE `cdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `companyexpenses`
--
ALTER TABLE `companyexpenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `corders`
--
ALTER TABLE `corders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cpayments`
--
ALTER TABLE `cpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `partnerpayments`
--
ALTER TABLE `partnerpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pprofits`
--
ALTER TABLE `pprofits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sdetails`
--
ALTER TABLE `sdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sorders`
--
ALTER TABLE `sorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `spayments`
--
ALTER TABLE `spayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
