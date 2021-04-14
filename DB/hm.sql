-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2021 at 11:57 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hm`
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
(1, '7584035', '5', 'Star Ship Bd', '12345678', 'Nurul Islam', '2021-03-25', '0', '10', '30', NULL, '2021-03-25 06:00:56', '2021-03-27 05:33:46'),
(2, '2005408', '3', 'Sayeed Shipping', '3456435', 'Safiul Islam', '2021-03-25', '0', '10', '50', NULL, '2021-03-25 06:27:13', '2021-03-27 06:02:38'),
(4, '5965458', '2', 'Hello World', '54678654', 'Lovely Islam', '2021-03-27', '1', '10', '30', NULL, '2021-03-27 07:33:44', '2021-04-01 07:44:59'),
(5, '3480529', '5', 'Hello World', '1234567', 'rerere', '2021-03-28', '0', '13', '10', NULL, '2021-03-28 10:22:59', '2021-03-28 10:22:59'),
(6, '275125', '6', 'Test', '12345', 'Test', '2021-03-29', '1', '10', '10', NULL, '2021-03-29 13:03:45', '2021-04-03 06:08:24'),
(7, '7462996', '6', 'Test', '1322', 'Test', '2021-03-29', '1', '10', '20', NULL, '2021-03-29 13:24:28', '2021-04-03 06:07:24'),
(8, '9626569', '3', 'Sayeed', '1345', 'Loveky', '2021-04-01', '1', '14', '32', NULL, '2021-04-01 10:16:18', '2021-04-03 04:55:22');

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

--
-- Dumping data for table `capitals`
--

INSERT INTO `capitals` (`id`, `user`, `type`, `amount`, `note`, `free1`, `free2`, `created_at`, `updated_at`) VALUES
(10, '10', '1', '100000', NULL, NULL, NULL, '2021-04-03 07:10:47', '2021-04-03 07:10:47');

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
(1, 'Hardware', NULL, '2021-03-24 10:00:19', '2021-03-24 10:01:41'),
(3, 'Fruits', NULL, '2021-03-24 10:02:02', '2021-03-24 10:02:02'),
(4, 'Machine', NULL, '2021-03-24 10:05:48', '2021-03-24 10:05:48'),
(5, 'Leathers', NULL, '2021-04-01 10:15:08', '2021-04-01 10:15:08');

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
(1, '2', 'Moto Machine 456 H', '4', '12000', '48000', 'Piece', NULL, NULL, '2021-03-27 14:02:38', '2021-03-27 14:02:38'),
(2, '2', 'Air Cooller', '5', '2300', '11500', 'Piece', NULL, NULL, '2021-03-27 14:02:38', '2021-03-27 14:02:38'),
(3, '2', 'Ispat Pat', '3', '200', '600', 'KG', NULL, NULL, '2021-03-27 14:02:38', '2021-03-27 14:02:38'),
(4, '2', 'Banana', '5', '5', '25', 'Piece', NULL, NULL, '2021-03-27 14:02:38', '2021-03-27 14:02:38'),
(5, '3', 'Moto Machine 456 H', '4', '12000', '48000', 'Piece', NULL, NULL, '2021-03-27 14:07:23', '2021-03-27 14:07:23'),
(6, '3', 'Air Cooller', '5', '2300', '11500', 'Piece', NULL, NULL, '2021-03-27 14:07:23', '2021-03-27 14:07:23'),
(7, '3', 'Ispat Pat', '3', '200', '600', 'KG', NULL, NULL, '2021-03-27 14:07:23', '2021-03-27 14:07:23'),
(8, '3', 'Banana', '5', '5', '25', 'Piece', NULL, NULL, '2021-03-27 14:07:23', '2021-03-27 14:07:23'),
(9, '4', 'Banana', '1', '5', '5', 'Piece', NULL, NULL, '2021-03-28 06:18:26', '2021-03-28 06:18:26'),
(10, '4', 'Ispat Pat', '1', '200', '200', 'KG', NULL, NULL, '2021-03-28 06:18:26', '2021-03-28 06:18:26'),
(11, '4', 'Apple', '1', '120', '120', 'KG', NULL, NULL, '2021-03-28 06:18:26', '2021-03-28 06:18:26'),
(12, '5', 'Banana', '1', '5', '5', 'Piece', NULL, NULL, '2021-03-28 07:39:15', '2021-03-28 07:39:15'),
(13, '5', 'Air Cooller', '1', '2300', '2300', 'Piece', NULL, NULL, '2021-03-28 07:39:15', '2021-03-28 07:39:15'),
(14, '6', 'Moto Machine 456 H', '1', '12000', '12000', 'Piece', NULL, NULL, '2021-03-28 07:46:51', '2021-03-28 07:46:51'),
(15, '6', 'Apple', '11', '120', '1320', 'KG', NULL, NULL, '2021-03-28 07:46:51', '2021-03-28 07:46:51'),
(16, '7', 'Apple', '2', '120', '240', 'KG', NULL, NULL, '2021-03-28 07:58:26', '2021-03-28 07:58:26'),
(17, '7', 'Air Cooller', '1', '2300', '2300', 'Piece', NULL, NULL, '2021-03-28 07:58:26', '2021-03-28 07:58:26'),
(18, '8', 'Ispat Pat', '1', '200', '200', 'KG', NULL, NULL, '2021-03-28 07:59:37', '2021-03-28 07:59:37'),
(19, '8', 'Air Cooller', '1', '2300', '2300', 'Piece', NULL, NULL, '2021-03-28 07:59:37', '2021-03-28 07:59:37'),
(20, '9', 'Apple', '1', '120', '120', 'KG', NULL, NULL, '2021-03-28 08:00:07', '2021-03-28 08:00:07'),
(21, '9', 'Ispat Pat', '1', '200', '200', 'KG', NULL, NULL, '2021-03-28 08:00:07', '2021-03-28 08:00:07'),
(22, '10', 'Moto Machine 456 H', '4', '12000', '48000', 'Piece', NULL, NULL, '2021-03-28 10:07:22', '2021-03-28 10:07:22'),
(23, '10', 'Banana', '1', '5', '5', 'Piece', NULL, NULL, '2021-03-28 10:07:23', '2021-03-28 10:07:23'),
(24, '10', 'Air Cooller', '1', '2300', '2300', 'Piece', NULL, NULL, '2021-03-28 10:07:23', '2021-03-28 10:07:23'),
(25, '11', 'Banana', '1', '5', '5', 'Piece', NULL, NULL, '2021-03-28 10:39:38', '2021-03-28 10:39:38'),
(26, '11', 'Ispat Pat', '1', '200', '200', 'KG', NULL, NULL, '2021-03-28 10:39:38', '2021-03-28 10:39:38'),
(27, '12', 'Moto Machine 456 H', '1', '12000', '12000', 'Piece', NULL, NULL, '2021-03-28 11:32:49', '2021-03-28 11:32:49'),
(28, '12', 'Apple', '1', '120', '120', 'KG', NULL, NULL, '2021-03-28 11:32:49', '2021-03-28 11:32:49'),
(29, '13', 'Air Cooller', '2', '2300', '4600', 'Piece', NULL, NULL, '2021-03-28 11:37:40', '2021-03-28 11:37:40'),
(30, '13', 'Apple', '1', '120', '120', 'KG', NULL, NULL, '2021-03-28 11:37:40', '2021-03-28 11:37:40'),
(31, '14', 'Air Cooller', '1', '2300', '2300', 'Piece', NULL, NULL, '2021-04-01 05:34:05', '2021-04-01 05:34:05'),
(32, '14', 'Moto Machine 456 H', '1', '12000', '12000', 'Piece', NULL, NULL, '2021-04-01 05:34:05', '2021-04-01 05:34:05'),
(33, '15', 'Moto Machine 456 H', '1', '12000', '12000', 'Piece', NULL, NULL, '2021-04-01 08:49:32', '2021-04-01 08:49:32'),
(34, '15', 'Ispat Pat', '1', '200', '200', 'KG', NULL, NULL, '2021-04-01 08:49:32', '2021-04-01 08:49:32'),
(35, '16', 'Moto Machine 456 H', '1', '12000', '12000', 'Piece', NULL, NULL, '2021-04-01 08:53:47', '2021-04-01 08:53:47'),
(36, '17', 'Banana', '9', '5', '45', 'Piece', NULL, NULL, '2021-04-03 09:29:44', '2021-04-03 09:29:44'),
(37, '17', 'Ispat Pat', '4', '200', '800', 'KG', NULL, NULL, '2021-04-03 09:29:44', '2021-04-03 09:29:44'),
(38, '17', 'Air Cooller', '2', '2300', '4600', 'Piece', NULL, NULL, '2021-04-03 09:29:44', '2021-04-03 09:29:44'),
(39, '17', 'Moto Machine 456 H', '1', '12000', '12000', 'Piece', NULL, NULL, '2021-04-03 09:29:44', '2021-04-03 09:29:44'),
(40, '17', 'Apple', '5', '120', '600', 'KG', NULL, NULL, '2021-04-03 09:29:44', '2021-04-03 09:29:44');

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
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(1, 'HM SUPPLIERS', 'M Rahman Tower(4th Floor) Cement Crossing,EPZ.Chittagong Bangladesh', '+8801619222777', '+8801857922724', 'abu.sayeed.diu@gmail.com', '2021', 'public/image/Capture.JPG', 'Josim', '2021', '100000', NULL, NULL, '2021-04-03 07:10:47');

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
(1, '10', '4', '1', '344', '344', 'Hello Note0', NULL, NULL, NULL, '2021-04-01', '2021-04-01 10:35:32'),
(2, '10', '2', '1', '200', '200', 'Hello Note', NULL, NULL, NULL, '2021-04-01', '2021-04-01 10:34:33'),
(3, '10', '2', '1', '2', '2', NULL, NULL, NULL, NULL, '2021-04-01', '2021-04-01 10:40:32'),
(4, '10', '3', '1', '929', '929', NULL, NULL, NULL, NULL, '2021-04-03', '2021-04-03 06:04:24');

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
(2, '412963', '5', '60125', '6000', '17', '10', NULL, NULL, '2021-03-27', '2021-03-27 14:02:38'),
(3, '78030', '4', '60125', '60125', '17', '11', NULL, NULL, '2021-03-27', '2021-03-27 14:07:23'),
(5, '321362', '2', '2305', '1200', '2', '10', NULL, NULL, '2021-03-28', '2021-03-28 07:39:14'),
(7, '213947', '4', '2540', '0', '3', '10', NULL, NULL, '2021-03-28', '2021-03-28 07:58:26'),
(8, '402511', '2', '2500', '0', '2', '10', NULL, NULL, '2021-03-28', '2021-03-28 07:59:37'),
(9, '205540', '2', '320', '200', '2', '10', NULL, NULL, '2021-03-26', '2021-03-28 08:00:07'),
(10, '893200', '6', '50305', '30000', '6', '13', NULL, NULL, '2021-03-28', '2021-03-28 10:07:22'),
(11, '461057', '4', '205', '205', '2', '13', NULL, NULL, '2021-03-28', '2021-03-28 10:39:38'),
(12, '129671', '5', '12120', '0', '2', '13', NULL, NULL, '2021-03-28', '2021-03-28 11:32:49'),
(13, '507373', '6', '4720', '2389', '3', '10', NULL, NULL, '2021-03-28', '2021-03-28 11:37:40'),
(14, '259703', '6', '14300', '0', '2', '10', NULL, NULL, '2021-04-01', '2021-04-01 05:34:05'),
(15, '407441', '4', '12200', '0', '2', '10', NULL, NULL, '2021-04-01', '2021-04-01 08:49:32'),
(16, '403513', '6', '12000', '1230', '1', '10', NULL, NULL, '2021-04-01', '2021-04-01 08:53:47'),
(17, '58435', '2', '18045', '18000', '21', '10', NULL, NULL, '2021-04-03', '2021-04-03 09:29:44');

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
(2, '2', '5', '6000', '10', NULL, '2021-03-22', '2021-03-28 06:44:10'),
(3, '3', '4', '60125', '10', NULL, '2021-03-27', '2021-03-28 06:44:06'),
(4, '4', '5', '3000', '10', NULL, '2021-03-28', '2021-03-28 06:42:23'),
(8, '9', '2', '200', '10', NULL, '2021-03-28', '2021-03-28 08:00:07'),
(9, '10', '6', '30000', '10', 'Hello Note', '2021-03-28', '2021-04-01 10:32:18'),
(10, NULL, '6', '2009', '13', NULL, '2021-03-28', '2021-03-28 10:11:46'),
(11, '11', '4', '205', '13', NULL, '2021-03-28', '2021-03-28 10:39:38'),
(12, '13', '6', '2389', '10', NULL, '2021-03-28', '2021-03-28 11:37:40'),
(13, NULL, '6', '34', '10', NULL, '2021-03-28', '2021-03-28 12:09:09'),
(14, NULL, '6', '1200', '10', NULL, '2021-04-01', '2021-04-01 05:38:40'),
(15, '16', '5', '1230', '10', 'Hello Note', '2021-04-01', '2021-04-01 10:34:14'),
(16, NULL, '4', '3000', '10', 'Hello Note', '2021-04-01', '2021-04-01 10:32:09'),
(17, NULL, '6', '12', '10', NULL, '2021-04-01', '2021-04-01 10:40:52'),
(18, '17', '2', '18000', '10', NULL, '2021-04-03', '2021-04-03 09:29:44');

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
(2, 'Sayeed Islam', '01318712782', 'Dhaka,Bangladesh, Software Company', '10', NULL, NULL, '2021-03-27 11:49:32', '2021-03-27 11:49:32'),
(4, 'Md Alamin', '01318712783', 'Dhaka,Bangladesh, Software Company', '10', NULL, NULL, '2021-03-27 11:49:57', '2021-03-27 11:53:40'),
(5, 'Nur-E-Elahi Business Limited', '01778311111', 'La-Montana, House #33,, Road: Gareeb-E-Newaz Avenue,, Sector:11,Uttara', '10', NULL, NULL, '2021-03-27 12:49:20', '2021-03-27 12:49:20'),
(6, 'DBBL', '123456789', 'DBBL Bank', '13', NULL, NULL, '2021-03-28 10:07:11', '2021-03-28 10:07:11');

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
(1, '1', '7584035', '1', '1', '2', '2', '10', '1', NULL, NULL, '2021-03-25 10:37:09', '2021-03-25 10:37:09'),
(3, '1', '7584035', '4', '2', '300', '600', '10', '4', NULL, NULL, '2021-03-25 10:52:55', '2021-03-25 10:52:55'),
(4, '2', '2005408', '4', '2', '2000', '4000', '10', '2', NULL, NULL, '2021-03-25 10:53:56', '2021-03-25 11:34:40'),
(5, '2', '2005408', '3', '10', '3000', '30000', '10', '2', NULL, NULL, '2021-03-25 10:54:08', '2021-03-25 11:07:37'),
(7, '2', '2005408', '1', '1', '3000', '3000', '10', '1', NULL, NULL, '2021-03-26 18:21:00', '2021-03-26 18:21:00'),
(8, '4', '5965458', '4', '15', '23', '345', '10', '5', NULL, NULL, '2021-03-27 07:38:24', '2021-03-27 07:38:30'),
(9, '5', '3480529', '1', '1', '2000', '2000', '10', '5', NULL, NULL, '2021-03-29 12:06:34', '2021-03-29 12:06:34'),
(10, '5', '3480529', '3', '2', '200', '400', '10', '5', NULL, NULL, '2021-03-29 12:08:22', '2021-03-29 12:08:22'),
(11, '6', '275125', '1', '1', '2000', '2000', '10', '6', NULL, NULL, '2021-03-29 13:05:00', '2021-03-29 13:05:00');

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
(1, 'N.O.C', NULL, '2021-03-25 07:23:03', '2021-03-25 07:23:03'),
(2, 'Speed Boat', NULL, '2021-03-25 07:23:17', '2021-03-25 07:23:17'),
(3, 'Operation Man', NULL, '2021-03-25 07:23:42', '2021-03-25 07:23:42'),
(4, 'Mobil SIM', NULL, '2021-03-25 07:24:02', '2021-03-25 07:24:02');

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
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
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

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2020_12_02_060015_create_sessions_table', 1),
(7, '2021_03_01_093748_create_companies_table', 2),
(8, '2021_03_06_121521_create_services_table', 3),
(9, '2021_03_07_063011_create_products_table', 4),
(10, '2021_03_07_073549_create_stocks_table', 5),
(11, '2021_03_07_115756_create_service_sales_table', 6),
(12, '2021_03_07_115817_create_customers_table', 6),
(13, '2021_03_08_045500_create_expenses_table', 7),
(14, '2017_06_26_000000_create_shopping_cart_table', 8),
(15, '2021_03_08_130125_create_product_sales_table', 9),
(16, '2021_03_08_130228_create_order_details_table', 9),
(17, '2021_03_10_071405_create_due_receives_table', 10),
(18, '2021_03_17_141251_create_loans_table', 11),
(19, '2021_03_23_160742_create_parties_table', 12),
(20, '2021_03_24_154812_create_categories_table', 13),
(21, '2021_03_24_174659_create_products_table', 14),
(22, '2021_03_25_111411_create_billings_table', 15),
(23, '2021_03_25_131713_create_expense_categories_table', 16),
(24, '2021_03_25_162150_create_expenses_table', 17),
(25, '2021_03_26_123456_create_orders_table', 18),
(26, '2021_03_26_172357_create_payments_table', 19),
(27, '2021_03_27_172517_create_customers_table', 20),
(28, '2021_03_27_185316_create_corders_table', 21),
(29, '2021_03_27_185329_create_cpayments_table', 21),
(30, '2021_03_27_185350_create_cdetails_table', 22),
(31, '2021_03_29_125548_create_partnerpayments_table', 23),
(32, '2021_03_30_123327_create_companyexpenses_table', 24),
(33, '2021_03_31_115213_create_suppliers_table', 24),
(34, '2021_03_31_122748_create_sorders_table', 25),
(35, '2021_03_31_122802_create_spayments_table', 25),
(36, '2021_03_31_122812_create_sdetails_table', 25),
(37, '2021_04_02_121558_create_pprofits_table', 26),
(38, '2021_04_03_111747_create_capitals_table', 26);

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
(7, '2', '2005408', '10', 'Air Cooller', '1', '2300', '2300', '3', 'you', NULL, '1', NULL, '2021-03-26 11:36:56', '2021-03-26 11:36:56'),
(8, '2', '2005408', '10', 'Moto Machine 456 H', '3', '12000', '36000', '1', 'you', NULL, '2', NULL, '2021-03-26 11:38:03', '2021-03-26 15:02:47'),
(9, '2', '2005408', '10', 'Ispat Pat', '3', '200', '600', '1', 'you', NULL, '4', NULL, '2021-03-26 11:38:04', '2021-03-26 11:38:04'),
(10, '2', '2005408', '10', 'Air Cooller', '7', '2300', '16100', '1', 'you', NULL, '5', NULL, '2021-03-26 11:38:04', '2021-03-26 15:03:03'),
(14, '2', '2005408', '10', 'Moto Machine 456 H', '1', '12000', '12000', '3', 'you', NULL, '5', NULL, '2021-03-26 11:43:08', '2021-03-26 11:43:08'),
(15, '2', '2005408', '10', 'Ispat Pat', '3', '200', '600', '3', 'you', NULL, '5', NULL, '2021-03-26 11:43:08', '2021-03-26 11:43:08'),
(17, '2', '2005408', '10', 'Ispat Pat', '1', '200', '200', '2', NULL, 'KG', '1', NULL, '2021-03-26 15:21:40', '2021-03-26 15:21:40'),
(18, '2', '2005408', '10', 'Moto Machine 456 H', '1', '12000', '12000', '2', NULL, 'Piece', '2', NULL, '2021-03-26 15:21:40', '2021-03-26 15:21:40'),
(19, '2', '2005408', '10', 'Banana', '1', '5', '5', '2', NULL, 'Piece', '2', NULL, '2021-03-26 15:21:40', '2021-03-26 15:21:40'),
(20, '1', '7584035', '10', 'Banana', '1', '5', '5', '1', NULL, 'Piece', '4', NULL, '2021-03-26 15:27:55', '2021-03-26 15:27:55'),
(21, '1', '7584035', '10', 'Air Cooller', '1', '2300', '2300', '1', NULL, 'Piece', '4', NULL, '2021-03-26 15:27:55', '2021-03-26 15:27:55'),
(22, '1', '7584035', '10', 'Ispat Pat', '1', '200', '200', '1', NULL, 'KG', '5', NULL, '2021-03-26 15:27:56', '2021-03-26 15:27:56'),
(23, '1', '7584035', '10', 'Apple', '4', '120', '480', '3', NULL, 'KG', '1', NULL, '2021-03-26 15:31:31', '2021-03-26 15:31:31'),
(24, '1', '7584035', '10', 'Moto Machine 456 H', '4', '12000', '48000', '3', NULL, 'Piece', '2', NULL, '2021-03-26 15:31:31', '2021-03-26 15:31:31'),
(25, '2', '2005408', '10', 'Banana', '1', '5', '5', '3', 'Hello Note', 'Piece', '4', NULL, '2021-03-27 05:41:50', '2021-03-27 05:41:50'),
(26, '2', '2005408', '10', 'Moto Machine 456 H', '16', '12000', '192000', '3', 'Hello Note', 'Piece', '5', NULL, '2021-03-27 05:41:50', '2021-03-27 05:53:13'),
(27, '4', '5965458', '10', 'Apple', '10', '120', '1200', '1', 'Hello Note', 'KG', '4', NULL, '2021-03-27 07:37:44', '2021-03-27 07:37:44'),
(29, '5', '3480529', '13', 'Moto Machine 456 H', '1', '12000', '12000', '3', NULL, 'Piece', '4', NULL, '2021-03-29 09:10:10', '2021-03-29 09:10:10'),
(30, '5', '3480529', '13', 'Apple', '56', '120', '6720', '3', NULL, 'KG', '5', NULL, '2021-03-29 09:10:10', '2021-03-29 11:37:37'),
(31, '5', '3480529', '13', 'Ispat Pat', '1', '200', '200', '2', NULL, 'KG', '5', NULL, '2021-03-29 09:46:39', '2021-03-29 09:46:39'),
(32, '5', '3480529', '13', 'Moto Machine 456 H', '1', '12000', '12000', '2', NULL, 'Piece', '5', NULL, '2021-03-29 09:46:39', '2021-03-29 09:46:39'),
(33, '4', '5965458', '10', 'Moto Machine 456 H', '2', '12000', '24000', '3', NULL, 'Piece', '5', NULL, '2021-03-29 12:43:34', '2021-03-29 12:43:34'),
(34, '6', '275125', '10', 'Air Cooller', '2', '2300', '4600', '3', NULL, 'Piece', '6', NULL, '2021-03-29 13:04:00', '2021-03-29 13:04:00'),
(35, '6', '275125', '10', 'Moto Machine 456 H', '1', '12000', '12000', '3', NULL, 'Piece', '6', NULL, '2021-03-29 13:04:00', '2021-03-29 13:04:00'),
(36, '6', '275125', '10', 'Moto Machine 456 H', '1', '120', '120', '1', NULL, 'Piece', '6', NULL, '2021-03-29 13:04:20', '2021-03-29 13:04:20'),
(37, '6', '275125', '10', 'Air Cooller', '1', '2300', '2300', '1', NULL, 'Piece', '6', NULL, '2021-03-29 13:04:20', '2021-03-29 13:04:20'),
(38, '6', '275125', '10', 'Air Cooller', '1', '2300', '2300', '2', NULL, 'Piece', '6', NULL, '2021-03-29 13:04:27', '2021-03-29 13:04:27'),
(39, '6', '275125', '10', 'Apple', '1', '120', '120', '1', NULL, 'KG', '6', NULL, '2021-03-29 13:12:46', '2021-03-29 13:12:46'),
(40, '7', '7462996', '10', 'Air Cooller', '2', '2300', '4600', '1', NULL, 'Piece', '6', NULL, '2021-03-29 13:24:45', '2021-03-29 13:24:45'),
(41, '7', '7462996', '10', 'Banana', '1', '5', '5', '1', NULL, 'Piece', '6', NULL, '2021-03-29 13:24:45', '2021-03-29 13:24:45'),
(42, '7', '7462996', '10', 'Ispat Pat', '2', '200', '400', '3', NULL, 'KG', '6', NULL, '2021-03-29 13:25:01', '2021-03-29 13:25:01'),
(43, '7', '7462996', '10', 'Apple', '2', '120', '240', '3', NULL, 'KG', '6', NULL, '2021-03-29 13:25:01', '2021-03-29 13:25:01'),
(44, '7', '7462996', '10', 'Banana', '2', '5000', '10000', '3', NULL, 'Piece', '6', NULL, '2021-03-29 13:25:01', '2021-03-29 13:25:01'),
(45, '8', '9626569', '14', 'Leather Bag', '1', '1200', '1200', '3', NULL, 'Piece', '3', NULL, '2021-04-01 10:17:39', '2021-04-01 10:17:39'),
(46, '8', '9626569', '14', 'Banana', '1', '5', '5', '3', NULL, 'Piece', '3', NULL, '2021-04-01 10:17:39', '2021-04-01 10:17:39'),
(47, '8', '9626569', '14', 'Apple', '1', '120', '120', '3', NULL, 'KG', '3', NULL, '2021-04-01 10:17:39', '2021-04-01 10:17:39'),
(48, '5', '3480529', '10', 'Apple', '1', '120', '120', '1', NULL, 'Ltr', '5', NULL, '2021-04-03 09:03:52', '2021-04-03 09:03:52'),
(49, '5', '3480529', '10', 'Air Cooller', '1', '2300', '2300', '1', NULL, 'Drum', '5', NULL, '2021-04-03 09:03:52', '2021-04-03 09:03:52'),
(50, '5', '3480529', '10', 'Banana', '1', '5', '5', '1', NULL, 'Drum', '5', NULL, '2021-04-03 09:03:52', '2021-04-03 09:03:52');

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
(2, '5408', 'sayeed khan', '01318712782', 'abu.sayeed.diu@gmail.com', NULL, 'Dhaka', NULL, NULL, 'Male', 'public/image/party/d958ea13928499.5627a60f7fbc2.png', '1', '-49', NULL, '2021-03-23 11:19:42', '2021-04-03 06:11:17'),
(3, '8075', 'Nur-E-Elahi Business Limited', '01778311111', 'kitesfashionnebl@gmail.com', '655665', 'La-Montana, House #33,', 'DBBL', '244564', 'Male', 'public/image/party/new-year-diaries-500x500.jpg', '1', '424', NULL, '2021-03-23 11:27:55', '2021-04-03 04:55:22'),
(5, '5684', 'sayeed khan', '01768829775', 'abu.sayeed.diu@gmail.com', '655665', 'Dhaka', 'DBBL', '67', 'Male', 'public/image/party/images.jfif', '1', NULL, NULL, '2021-03-23 11:50:47', '2021-03-24 07:36:10'),
(6, '2615', 'Text', '01318712782', 'hello@gmail.com', '655665', 'Dhaka,Bangladesh', 'DBBL', '234', 'Male', 'public/image/party/d958ea13928499.5627a60f7fbc2.png', '1', '2183', NULL, '2021-03-29 13:03:13', '2021-04-03 06:08:24');

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

--
-- Dumping data for table `partnerpayments`
--

INSERT INTO `partnerpayments` (`id`, `partner`, `payment`, `user`, `free1`, `free2`, `free3`, `created_at`, `updated_at`) VALUES
(1, '3', '1000', '10', NULL, NULL, NULL, '2021-03-29', '2021-03-29 07:42:22'),
(2, '5', '567', '10', NULL, NULL, NULL, '2021-03-28', '2021-03-29 07:06:44'),
(3, '3', '2000', '13', NULL, NULL, NULL, '2021-03-29', '2021-03-29 07:44:11'),
(5, '3', '200', '10', NULL, NULL, NULL, '2021-03-29', '2021-03-29 07:39:07'),
(8, '6', '100', '10', NULL, NULL, NULL, '2021-03-29', '2021-03-29 13:07:26'),
(9, '3', '1200', '10', 'Hello Note', NULL, NULL, '2021-04-01', '2021-04-01 10:26:26'),
(10, '3', '1230', '10', 'Hello Note', NULL, NULL, '2021-04-01', '2021-04-01 10:26:38'),
(11, '5', '1200', '14', 'Advance', NULL, NULL, '2021-04-01', '2021-04-01 10:27:09'),
(13, '2', '49', '10', NULL, NULL, NULL, '2021-04-03', '2021-04-03 06:11:17');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@admin.com', '$2y$10$NM5OfH6qPIOEnT8pzAI0uunaffh1Y2MVTNs0zibXDqX1DbZoKKor.', '2020-12-02 06:29:37'),
('admin@admin.com', '$2y$10$NM5OfH6qPIOEnT8pzAI0uunaffh1Y2MVTNs0zibXDqX1DbZoKKor.', '2020-12-02 06:29:37'),
('admin@admin.com', '$2y$10$NM5OfH6qPIOEnT8pzAI0uunaffh1Y2MVTNs0zibXDqX1DbZoKKor.', '2020-12-02 06:29:37'),
('admin@admin.com', '$2y$10$NM5OfH6qPIOEnT8pzAI0uunaffh1Y2MVTNs0zibXDqX1DbZoKKor.', '2020-12-02 06:29:37');

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
(1, '2', '2005408', '10000', '10', 'cashin', NULL, '2021-03-26 11:36:56', '2021-03-26 11:36:56'),
(2, '2', '2005408', '10000', '10', 'cashout', NULL, '2021-03-26 11:38:04', '2021-03-26 11:38:04'),
(3, '2', '2005408', '2000', '10', 'cashout', NULL, '2021-03-26 11:38:58', '2021-03-26 11:38:58'),
(4, '2', '2005408', '200', '10', 'cashin', NULL, '2021-03-26 11:43:08', '2021-03-26 11:43:08'),
(5, '2', '2005408', '0', '10', 'cashout', NULL, '2021-03-26 15:21:40', '2021-03-26 15:21:40'),
(6, '1', '7584035', '2505', '10', 'cashout', NULL, '2021-03-26 15:27:56', '2021-03-26 15:27:56'),
(7, '1', '7584035', '40000', '10', 'cashin', NULL, '2021-03-26 15:31:31', '2021-03-26 15:31:31'),
(8, '2', '2005408', '0', '10', 'cashin', NULL, '2021-03-27 05:41:50', '2021-03-27 05:41:50'),
(9, '2', '2005408', '100', '10', 'cashin', 'Hello Note', '2021-03-27 07:27:46', '2021-03-27 07:27:46'),
(10, '4', '5965458', '190000', '10', 'cashout', NULL, '2021-03-27 07:37:45', '2021-03-27 07:37:45'),
(11, '5', '3480529', '10000', '13', 'cashin', NULL, '2021-03-29 09:10:10', '2021-03-29 09:10:10'),
(12, '5', '3480529', '12200', '13', 'cashout', NULL, '2021-03-29 09:46:39', '2021-03-29 09:46:39'),
(13, '4', '5965458', '0', '10', 'cashin', NULL, '2021-03-29 12:43:34', '2021-03-29 12:43:34'),
(14, '6', '275125', '0', '10', 'cashin', NULL, '2021-03-29 13:04:00', '2021-03-29 13:04:00'),
(15, '6', '275125', '0', '10', 'cashout', NULL, '2021-03-29 13:04:20', '2021-03-29 13:04:20'),
(16, '6', '275125', '0', '10', 'cashout', NULL, '2021-03-29 13:04:27', '2021-03-29 13:04:27'),
(17, '6', '275125', '0', '10', 'cashout', NULL, '2021-03-29 13:12:46', '2021-03-29 13:12:46'),
(18, '7', '7462996', '0', '10', 'cashout', NULL, '2021-03-29 13:24:45', '2021-03-29 13:24:45'),
(19, '7', '7462996', '0', '10', 'cashin', NULL, '2021-03-29 13:25:01', '2021-03-29 13:25:01'),
(20, '8', '9626569', '1000', '14', 'cashin', NULL, '2021-04-01 10:17:39', '2021-04-01 10:17:39');

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
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

--
-- Dumping data for table `pprofits`
--

INSERT INTO `pprofits` (`id`, `billing`, `partner`, `vessel`, `imo`, `profit`, `user`, `company`, `free1`, `created_at`, `updated_at`) VALUES
(6, '2', '2', 'Green Line', '9999999', 39350, '10', 39350, NULL, '2021-04-02', '2021-04-02 12:32:59'),
(8, '4', '1', 'shipping moon', '234564', 3416, '10', 5124, NULL, '2021-04-02', '2021-04-02 14:47:30'),
(9, '7', '6', 'Test', '1322', 1207, '10', 4828, NULL, '2021-04-03', '2021-04-03 06:07:24'),
(10, '6', '6', 'Test', '12345', 976, '10', 8784, NULL, '2021-04-03', '2021-04-03 06:08:24');

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
(2, '3', 'Apple', '9320', 'KG', '120', NULL, NULL, NULL, NULL, '2021-03-24 12:50:39', '2021-03-24 12:50:39'),
(4, '4', 'Moto Machine 456 H', '16536', 'Piece', '12000', NULL, NULL, NULL, NULL, '2021-03-25 11:57:12', '2021-03-25 11:57:12'),
(5, '1', 'Ispat Pat', '80701', 'KG', '200', NULL, NULL, NULL, NULL, '2021-03-25 11:57:35', '2021-03-25 11:57:35'),
(6, '3', 'Banana', '23342', 'Piece', '5', NULL, NULL, NULL, NULL, '2021-03-25 11:57:53', '2021-03-25 11:57:53'),
(7, '1', 'Air Cooller', '73483', 'Piece', '2300', NULL, NULL, NULL, NULL, '2021-03-25 11:58:34', '2021-03-25 11:58:34'),
(8, '5', 'Leather Bag', '79163', 'Piece', '1200', NULL, NULL, NULL, NULL, '2021-04-01 10:15:27', '2021-04-01 10:15:27');

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
(1, '3', 'Moto Machine 456 H', '8', '12000', '96000', 'Piece', NULL, NULL, '2021-03-31', '2021-03-31 06:41:16'),
(2, '3', 'Air Cooller', '4', '2300', '9200', 'Piece', NULL, NULL, '2021-03-31', '2021-03-31 06:41:16'),
(3, '3', 'Apple', '10', '120', '1200', 'KG', NULL, NULL, '2021-03-31', '2021-03-31 06:41:16'),
(4, '4', 'Air Cooller', '4', '2300', '9200', 'Piece', NULL, NULL, '2021-03-31', '2021-03-31 06:45:56'),
(5, '4', 'Apple', '10', '120', '1200', 'KG', NULL, NULL, '2021-03-31', '2021-03-31 06:45:56'),
(6, '4', 'Ispat Pat', '2', '200', '400', 'KG', NULL, NULL, '2021-03-31', '2021-03-31 06:45:56'),
(7, '4', 'Banana', '9', '5', '45', 'Piece', NULL, NULL, '2021-03-31', '2021-03-31 06:45:56'),
(8, '5', 'Air Cooller', '11', '2300', '25300', 'Piece', NULL, NULL, '2021-03-31', '2021-03-31 06:56:14'),
(9, '5', 'Apple', '10', '120', '1200', 'KG', NULL, NULL, '2021-03-31', '2021-03-31 06:56:14'),
(10, '5', 'Ispat Pat', '2', '200', '400', 'KG', NULL, NULL, '2021-03-31', '2021-03-31 06:56:14'),
(11, '5', 'Banana', '9', '5', '45', 'Piece', NULL, NULL, '2021-03-31', '2021-03-31 06:56:14'),
(12, '7', 'Air Cooller', '1', '2300', '2300', 'Piece', NULL, NULL, '2021-04-01', '2021-04-01 05:39:12'),
(13, '7', 'Moto Machine 456 H', '1', '120', '120', 'Piece', NULL, NULL, '2021-04-01', '2021-04-01 05:39:12'),
(14, '8', 'Air Cooller', '1', '2300', '2300', 'Piece', NULL, NULL, '2021-04-01', '2021-04-01 09:05:19'),
(15, '8', 'Ispat Pat', '1', '200', '200', 'KG', NULL, NULL, '2021-04-01', '2021-04-01 09:05:19'),
(16, '8', 'Moto Machine 456 H', '1', '12000', '12000', 'Piece', NULL, NULL, '2021-04-01', '2021-04-01 09:05:20'),
(17, '9', 'Banana', '3', '5', '15', 'Piece', NULL, NULL, '2021-04-01', '2021-04-01 09:41:50'),
(18, '9', 'Apple', '1', '120', '120', 'KG', NULL, NULL, '2021-04-01', '2021-04-01 09:41:50'),
(19, '9', 'Air Cooller', '1', '2300', '2300', 'Piece', NULL, NULL, '2021-04-01', '2021-04-01 09:41:50'),
(20, '10', 'Leather Bag', '1', '1200', '1200', 'Piece', NULL, NULL, '2021-04-03', '2021-04-03 09:05:59'),
(21, '10', 'Moto Machine 456 H', '1', '12000', '12000', 'Drum', NULL, NULL, '2021-04-03', '2021-04-03 09:05:59'),
(22, '10', 'Air Cooller', '1', '2300', '2300', 'KG', NULL, NULL, '2021-04-03', '2021-04-03 09:05:59');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payload` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('x7mf1PY3PtJfV5uA0Pm4CsXd5EfRtOYHFydEHbhe', 10, '::1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/89.0.4389.114 Safari/537.36', 'YTo5OntzOjY6Il90b2tlbiI7czo0MDoiTjI1aDJtcVJ5ODB0N21mdTV4UkUyTkVZREVTbEw2NDZKanlUVm9JWSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjk6Imh0dHA6Ly9sb2NhbGhvc3QvaG0vZGFzaGJvYXJkIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTA7czo0OiJ0eXBlIjtpOjE7czoxNzoicGFzc3dvcmRfaGFzaF93ZWIiO3M6NjA6IiQyeSQxMCRkcmtMM0VGaVpJTFYyekR0LzF5ajdlNS9wYVdSNmhJdFNVaFFraU80VDB1U0lPYkpIRFV4QyI7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTAkZHJrTDNFRmlaSUxWMnpEdC8xeWo3ZTUvcGFXUjZoSXRTVWhRa2lPNFQwdVNJT2JKSERVeEMiO3M6ODoic3VidG90YWwiO2k6MDtzOjQ6ImNhcnQiO2E6MDp7fX0=', 1617443728);

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
(3, '501429', '2', '106400', '5000', '22', '10', NULL, NULL, '2021-03-31', '2021-03-31 06:41:16'),
(4, '470561', '3', '10845', '1000', '25', '10', NULL, NULL, '2021-03-22', '2021-03-31 06:45:56'),
(5, '188376', '5', '26945', '26945', '32', '10', NULL, NULL, '2021-03-31', '2021-03-31 06:56:14'),
(7, '861270', '3', '2420', '0', '2', '10', NULL, NULL, '2021-04-01', '2021-04-01 05:39:12'),
(8, '855111', '4', '14500', '10000', '3', '10', NULL, NULL, '2021-04-01', '2021-04-01 09:05:19'),
(9, '562004', '3', '2435', '2000', '5', '13', NULL, NULL, '2021-04-01', '2021-04-01 09:41:50'),
(10, '745303', '3', '15500', '1212', '3', '10', NULL, NULL, '2021-04-03', '2021-04-03 09:05:59');

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
(1, '3', '2', '5000', '10', NULL, '2021-03-31', '2021-03-31 06:41:16'),
(2, '4', '3', '1000', '10', NULL, '2021-03-31', '2021-03-31 06:45:56'),
(5, NULL, '3', '1000', '10', NULL, '2021-03-31', '2021-03-31 07:52:53'),
(6, NULL, '5', '1000', '10', NULL, '2021-03-31', '2021-03-31 08:36:00'),
(7, NULL, '4', '1200', '10', NULL, '2021-04-01', '2021-04-01 05:39:22'),
(8, '8', '4', '10000', '10', NULL, '2021-04-01', '2021-04-01 09:05:19'),
(9, '9', '3', '2000', '10', 'Hello Note0', '2021-04-01', '2021-04-01 10:39:18'),
(10, NULL, '3', '1200', '10', 'Hello Note', '2021-04-01', '2021-04-01 10:39:05'),
(11, NULL, '3', '12', '10', NULL, '2021-04-01', '2021-04-01 10:41:15'),
(12, '10', '3', '10012', '10', NULL, '2021-04-03', '2021-04-03 09:06:22');

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
(2, 'Sayeed Islam', 'Pet Lover', '01318712782', 'Dhaka,Bangladesh', '10', NULL, NULL, NULL, '2021-03-31 06:05:45', '2021-03-31 06:05:45'),
(3, 'Nur-E-Elahi Business Limited', NULL, '01778311111', 'La-Montana, House #33,', '10', NULL, NULL, NULL, '2021-03-31 06:06:24', '2021-03-31 06:06:24'),
(4, 'Hello World', 'LS Soft', '01318712782', 'Dhaka', '10', NULL, NULL, NULL, '2021-03-31 06:06:36', '2021-03-31 06:07:12');

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
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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
(13, 'User', 'user@user.com', NULL, '$2y$10$NrDYzx/aopRJD/0sT7VNleIedhOKf.Z98Lmsj8IbrwHC6aPWaPdr6', NULL, NULL, NULL, NULL, 'public/image/user/logo-demo3.png', '1', '1', 2, '2021-03-28 14:21:05', '01318712783', 'Dhaka,Bangladesh', '2021-04-03 04:57:42', NULL, NULL, NULL, NULL, NULL),
(14, 'User2', 'user2@user.com', NULL, '$2y$10$/d4WqUTe0HbUZJ9tEbZxde651Re6.BmvvfePCX616XRAXXxWvkwJG', NULL, NULL, NULL, NULL, 'public/image/user/images.jfif', '1', '1', 2, '2021-04-01 16:14:07', '123456', 'Haripur,Sirajgonj Sadar', '2021-04-03 04:57:33', NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
  ADD KEY `password_resets_email_index` (`email`);

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
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

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
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `capitals`
--
ALTER TABLE `capitals`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cdetails`
--
ALTER TABLE `cdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `companyexpenses`
--
ALTER TABLE `companyexpenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `corders`
--
ALTER TABLE `corders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cpayments`
--
ALTER TABLE `cpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `expense_categories`
--
ALTER TABLE `expense_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `partnerpayments`
--
ALTER TABLE `partnerpayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pprofits`
--
ALTER TABLE `pprofits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sdetails`
--
ALTER TABLE `sdetails`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `sorders`
--
ALTER TABLE `sorders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `spayments`
--
ALTER TABLE `spayments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
