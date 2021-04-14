-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 02, 2021 at 01:27 AM
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
  `date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `com` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `billings`
--

INSERT INTO `billings` (`id`, `billing`, `partner`, `vessel`, `imo`, `agent`, `date`, `status`, `user`, `com`, `free2`, `created_at`, `updated_at`) VALUES
(1, '3668616', '2', 'shipping moon', '9999999', 'jashim', '2021-04-02', '1', '10', '50', NULL, '2021-04-02', '2021-04-02 06:38:03');

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
(1, 'OIL STORES', NULL, '2021-04-02 00:41:17', '2021-04-02 00:41:17');

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
(1, 'HM Suppliers', 'M Rahman Tower(6th Floor) Cement Crossing,EPZ.Chittagong Bangladesh', '+8801619222777', '+8801857922724', 'abu.sayeed.diu@gmail.com', '2021', 'public/image/WhatsApp Image 2021-03-28 at 1.23.22 AM.jpeg', 'Josim', '2021', '20000', NULL, NULL, '2021-04-01 22:30:36');

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

--
-- Dumping data for table `companyexpenses`
--

INSERT INTO `companyexpenses` (`id`, `user`, `type`, `qty`, `rate`, `total`, `free1`, `free2`, `free3`, `free4`, `created_at`, `updated_at`) VALUES
(2, '10', '2', '1', '5000', '5000', NULL, NULL, NULL, NULL, '2021-04-02', '2021-04-02 06:48:02');

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
(1, 'Bahadur', '01714574502', 'Cement Crossing,EPZ,Chattogram', '10', NULL, NULL, '2021-04-02 00:14:27', '2021-04-02 00:14:27');

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
(1, '1', '3668616', '1', '1', '2000', '2000', '10', '2', NULL, NULL, '2021-04-02 06:31:36', '2021-04-02 06:31:36'),
(2, '1', '3668616', '2', '2', '1500', '3000', '10', '2', NULL, NULL, '2021-04-02 06:31:55', '2021-04-02 06:31:55'),
(3, '1', '3668616', '3', '1', '1000', '1000', '10', '2', NULL, NULL, '2021-04-02 06:32:12', '2021-04-02 06:32:12'),
(4, '1', '3668616', '4', '1', '2000', '2000', '10', '2', NULL, NULL, '2021-04-02 06:32:31', '2021-04-02 06:32:31'),
(5, '1', '3668616', '5', '1', '3000', '3000', '10', '2', NULL, NULL, '2021-04-02 06:32:48', '2021-04-02 06:32:48'),
(6, '1', '3668616', '6', '1', '2100', '2100', '10', '2', NULL, NULL, '2021-04-02 06:33:09', '2021-04-02 06:33:09'),
(7, '1', '3668616', '7', '1', '10000', '10000', '10', '2', NULL, NULL, '2021-04-02 06:33:29', '2021-04-02 06:33:29'),
(8, '1', '3668616', '8', '1', '2500', '2500', '10', '2', NULL, NULL, '2021-04-02 06:33:52', '2021-04-02 06:33:52'),
(9, '1', '3668616', '9', '50', '900', '45000', '10', '2', NULL, NULL, '2021-04-02 06:34:20', '2021-04-02 06:34:20'),
(10, '1', '3668616', '10', '2', '500', '1000', '10', '2', NULL, NULL, '2021-04-02 06:34:48', '2021-04-02 06:34:48'),
(11, '1', '3668616', '11', '1', '5000', '5000', '10', '2', NULL, NULL, '2021-04-02 06:35:10', '2021-04-02 06:35:10'),
(12, '1', '3668616', '12', '1', '2000', '2000', '10', '2', NULL, NULL, '2021-04-02 06:35:29', '2021-04-02 06:35:29'),
(13, '1', '3668616', '13', '4', '700', '2800', '10', '2', NULL, NULL, '2021-04-02 06:36:00', '2021-04-02 06:36:00');

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
(1, 'Police', NULL, '2021-04-02 00:55:14', '2021-04-02 01:09:04'),
(2, 'Transport(Pickup)', NULL, '2021-04-02 00:55:56', '2021-04-02 01:08:32'),
(3, 'Labor\"s Sancks', NULL, '2021-04-02 01:11:26', '2021-04-02 01:11:26'),
(4, 'Unload Labor', NULL, '2021-04-02 01:12:15', '2021-04-02 01:12:15'),
(5, 'Police Station', NULL, '2021-04-02 01:13:09', '2021-04-02 01:13:09'),
(6, 'Boat oil', NULL, '2021-04-02 01:15:11', '2021-04-02 01:15:11'),
(7, 'Coast Guard', NULL, '2021-04-02 01:15:40', '2021-04-02 01:15:40'),
(8, 'Product carrier labor', NULL, '2021-04-02 01:16:04', '2021-04-02 01:16:04'),
(9, 'Drum purchase', NULL, '2021-04-02 01:16:18', '2021-04-02 01:16:18'),
(10, 'Duty boat', NULL, '2021-04-02 01:16:38', '2021-04-02 01:16:38'),
(11, 'Partner Expenses', NULL, '2021-04-02 01:17:03', '2021-04-02 01:17:03'),
(12, 'Jashim Expenses', NULL, '2021-04-02 01:17:24', '2021-04-02 01:17:24'),
(13, 'Ship Labor', NULL, '2021-04-02 01:17:38', '2021-04-02 01:17:38');

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
(1, '1', '3668616', '10', 'RBD', '50', '7500', '375000', '1', NULL, 'Drum', '2', NULL, '2021-04-02 06:29:50', '2021-04-02 06:29:50'),
(2, '1', '3668616', '10', 'RBD', '49', '18000', '882000', '3', NULL, 'Drum', '2', NULL, '2021-04-02 06:30:55', '2021-04-02 06:30:55');

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
  `free1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `free2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `parties`
--

INSERT INTO `parties` (`id`, `pid`, `name`, `mobile`, `email`, `nid`, `address`, `bank`, `acc`, `gender`, `image`, `status`, `free1`, `free2`, `created_at`, `updated_at`) VALUES
(1, '2117', 'Iqbal Hossain Nayan', '01816889996', 'info@shipchandlerbd.com', '24687756353', 'Bandartilla,EPZ', NULL, NULL, 'Male', 'public/image/party/51-512473_cargo-ship-clipart-png.png', '1', NULL, NULL, '2021-04-02 00:06:47', '2021-04-02 00:06:47'),
(2, '522', 'Jahid', '01811114268', 'info@shipchandlerbd.com', '6636737333', 'Bijoy Nogor,14 NO,Patenga', NULL, NULL, 'Male', 'public/image/party/89cd844ea03527ee307a5c37211fc505.jpg', '1', NULL, NULL, '2021-04-02 00:09:20', '2021-04-02 00:09:20');

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

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `billing`, `billno`, `payment`, `user`, `type`, `free1`, `created_at`, `updated_at`) VALUES
(1, '1', '3668616', '375000', '10', 'cashout', NULL, '2021-04-02 06:29:50', '2021-04-02 06:29:50'),
(2, '1', '3668616', '882000', '10', 'cashin', NULL, '2021-04-02 06:30:55', '2021-04-02 06:30:55');

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
(1, '1', 'CDSO', '67724', 'Drum', '8500', NULL, NULL, NULL, NULL, '2021-04-02 00:42:29', '2021-04-02 00:42:29'),
(2, '1', 'RBD', '24302', 'Drum', '7500', NULL, NULL, NULL, NULL, '2021-04-02 00:43:04', '2021-04-02 00:43:04'),
(3, '1', 'HIGH SULFAR FARNES OIL', '33708', 'Ltr', '16', NULL, NULL, NULL, NULL, '2021-04-02 00:44:53', '2021-04-02 00:52:12'),
(4, '1', 'DISSEL', '9855', 'Ltr', '40', NULL, NULL, NULL, NULL, '2021-04-02 00:47:37', '2021-04-02 00:47:37'),
(5, '1', 'MOBILE', '48224', 'Drum', '8000', NULL, NULL, NULL, NULL, '2021-04-02 00:48:47', '2021-04-02 00:48:47'),
(6, '1', 'BREAK OIL', '67116', 'Drum', '10000', NULL, NULL, NULL, NULL, '2021-04-02 00:49:37', '2021-04-02 00:49:37'),
(7, '1', 'GEAR OIL', '60166', 'Drum', '10000', NULL, NULL, NULL, NULL, '2021-04-02 00:50:28', '2021-04-02 00:50:28'),
(8, '1', 'BLISE OIL', '60473', 'Ltr', '76', NULL, NULL, NULL, NULL, '2021-04-02 00:51:25', '2021-04-02 05:35:28');

-- --------------------------------------------------------

--
-- Table structure for table `sdetails`
--

CREATE TABLE `sdetails` (
  `id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
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
('uOBu4izAWDC16de3lc35oNf4A9quRcljICuuiKM8', 10, '103.115.25.182', 'Mozilla/5.0 (Linux; Android 10; SM-A205F) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.105 Mobile Safari/537.36', 'YToxMTp7czo2OiJfdG9rZW4iO3M6NDA6IjdsNEdrczFCMVJBTm85YnM5bTZZODh1QlFvaURDUmpIa1NmdHZMNW0iO3M6MzoidXJsIjthOjE6e3M6ODoiaW50ZW5kZWQiO3M6MjY6Imh0dHA6Ly9obS5sc3NvZnQueHl6L3BhcnR5Ijt9czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM4OiJodHRwOi8vaG0ubHNzb2Z0Lnh5ei9jYXJ0dXBkYXRlP190b2tlbj03bDRHa3MxQjFSQU5vOWJzOW02WTg4dUJRb2lEQ1JqSGtTZnR2TDVtJmJ0bj0mcHJpY2U9MTYmcXR5PTEmcm93SWQ9ODg5ZjQxY2U4Zjc0ZmRiYjY0YmEwYjU0ZGJiZTQ2ZDgiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YToxOntpOjA7czo0OiJpbmZvIjt9czozOiJuZXciO2E6MDp7fX1zOjUwOiJsb2dpbl93ZWJfNTliYTM2YWRkYzJiMmY5NDAxNTgwZjAxNGM3ZjU4ZWE0ZTMwOTg5ZCI7aToxMDtzOjQ6InR5cGUiO2k6MTtzOjE3OiJwYXNzd29yZF9oYXNoX3dlYiI7czo2MDoiJDJ5JDEwJGRya0wzRUZpWklMVjJ6RHQvMXlqN2U1L3BhV1I2aEl0U1VoUWtpTzRUMHVTSU9iSkhEVXhDIjtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMCRkcmtMM0VGaVpJTFYyekR0LzF5ajdlNS9wYVdSNmhJdFNVaFFraU80VDB1U0lPYkpIRFV4QyI7czo4OiJzdWJ0b3RhbCI7aTo4MDAwMDA7czo0OiJjYXJ0IjthOjE6e3M6NzoiZGVmYXVsdCI7TzoyOToiSWxsdW1pbmF0ZVxTdXBwb3J0XENvbGxlY3Rpb24iOjE6e3M6ODoiACoAaXRlbXMiO2E6MTp7czozMjoiODg5ZjQxY2U4Zjc0ZmRiYjY0YmEwYjU0ZGJiZTQ2ZDgiO086MzI6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtIjoxMDp7czo1OiJyb3dJZCI7czozMjoiODg5ZjQxY2U4Zjc0ZmRiYjY0YmEwYjU0ZGJiZTQ2ZDgiO3M6MjoiaWQiO3M6MToiMyI7czozOiJxdHkiO3M6MToiMSI7czo0OiJuYW1lIjtzOjIyOiJISUdIIFNVTEZBUiBGQVJORVMgT0lMIjtzOjU6InByaWNlIjtzOjI6IjE2IjtzOjc6Im9wdGlvbnMiO086Mzk6Ikdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtT3B0aW9ucyI6MTp7czo4OiIAKgBpdGVtcyI7YToxOntzOjQ6InVuaXQiO3M6MzoiTHRyIjt9fXM6NDk6IgBHbG91ZGVtYW5zXFNob3BwaW5nY2FydFxDYXJ0SXRlbQBhc3NvY2lhdGVkTW9kZWwiO047czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAHRheFJhdGUiO2k6MjE7czo0MToiAEdsb3VkZW1hbnNcU2hvcHBpbmdjYXJ0XENhcnRJdGVtAGlzU2F2ZWQiO2I6MDtzOjg6InByaWNlVGF4IjtkOjE5LjM1OTk5OTk5OTk5OTk5OTQzMTU2NTgxMTM5MTkxOTg1MTMwMzEwMDU4NTkzNzU7fX19fXM6NDoiaW5mbyI7czoyNToiQ2FydCBVcGRhdGVkIFN1Y2Nlc3NmdWxseSI7fQ==', 1617344818),
('WTUqhMHFKquCtHwQFScHYDYyNgoWNnbjEhF7RDWr', NULL, '202.65.168.196', 'Mozilla/5.0 (Linux; Android 9; SM-N950U) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/85.0.4183.81 Mobile Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiMFl1d0hlSEZBVWNnZE5wUk0xMkVqMzg4WXhJeDhzUlNCaVlMY3piWSI7czozOiJ1cmwiO2E6MTp7czo4OiJpbnRlbmRlZCI7czozMToiaHR0cDovL2htLmxzc29mdC54eXovcHVyY2hhc2UvMCI7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwOi8vaG0ubHNzb2Z0Lnh5ei9sb2dpbiI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1617344672);

-- --------------------------------------------------------

--
-- Table structure for table `sorders`
--

CREATE TABLE `sorders` (
  `id` bigint(20) UNSIGNED NOT NULL DEFAULT '0',
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
(2, 'A.M.C Bappy', 'Shabnam 5', '01575667650', 'Noakhali', '10', NULL, NULL, NULL, '2021-04-02 00:10:43', '2021-04-02 00:10:43'),
(4, 'Liton', 'FO High Sulfar', '01911189148', 'Hatia', '10', NULL, NULL, NULL, '2021-04-02 00:23:26', '2021-04-02 00:23:26'),
(5, 'Moshiur Rahman', 'FO High Sulfer', '01721893781', 'Gopalganz', '10', NULL, NULL, NULL, '2021-04-02 00:24:46', '2021-04-02 00:24:46'),
(6, 'Jahir', 'City 40', '01816734535', 'Cumilla', '10', NULL, NULL, NULL, '2021-04-02 00:25:43', '2021-04-02 00:25:43');

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
(10, 'Sayeed Islam', 'admin@admin.com', NULL, '$2y$10$drkL3EFiZILV2zDt/1yj7e5/paWR6hItSUhQkiO4T0uSIObJHDUxC', NULL, NULL, NULL, NULL, 'public/image/user/d958ea13928499.5627a60f7fbc2.png', '1', '1', 1, '2020-12-02 00:00:00', '01318712782', 'Dhaka,Bangladesh', '2021-03-23 08:04:23', 1, 1, 1, NULL, NULL),
(11, 'Robbin', 'user@user.com', NULL, '$2y$10$BpGZxZA.c6BABReoMgpX3uQnauKDd5ROtv3EMad2wyHuC6gCudLmC', NULL, NULL, NULL, NULL, 'public/image/user/d958ea13928499.5627a60f7fbc2.png', '1', '1', 2, '2021-03-28 02:44:10', '01771700400', 'M Rahman Twoer(4th Floor', '2021-04-01 23:53:57', 0, 0, 0, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billings`
--
ALTER TABLE `billings`
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
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`(191),`tokenable_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `companyexpenses`
--
ALTER TABLE `companyexpenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `corders`
--
ALTER TABLE `corders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cpayments`
--
ALTER TABLE `cpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `spayments`
--
ALTER TABLE `spayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
