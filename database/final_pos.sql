-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 05:32 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final_pos`
--

-- --------------------------------------------------------

--
-- Table structure for table `attributes`
--

CREATE TABLE `attributes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attributes`
--

INSERT INTO `attributes` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Color', '2021-09-18 02:19:34', '2021-09-18 02:19:34'),
(2, 'Unit', '2021-09-18 22:15:11', '2021-09-18 22:15:11');

-- --------------------------------------------------------

--
-- Table structure for table `attribute_values`
--

CREATE TABLE `attribute_values` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `attribute_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attribute_values`
--

INSERT INTO `attribute_values` (`id`, `value`, `attribute_id`, `created_at`, `updated_at`) VALUES
(1, 'White', 1, '2021-09-18 02:19:35', '2021-09-18 22:37:20'),
(2, 'Green', 1, '2021-09-18 02:19:35', '2021-09-18 02:19:35'),
(3, 'Blue', 1, '2021-09-18 02:19:35', '2021-09-18 02:19:35'),
(4, 'pece', 2, '2021-09-18 22:15:11', '2021-09-18 22:15:11'),
(5, 'kg', 2, '2021-09-18 22:15:11', '2021-09-18 22:15:11'),
(6, 'gram', 2, '2021-09-18 22:15:12', '2021-09-18 22:15:12'),
(7, 'pound', 2, '2021-09-18 22:15:12', '2021-09-18 22:15:12');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tempusertoken` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `item_id`, `tempusertoken`, `quantity`, `created_at`, `updated_at`) VALUES
(6, 1, 1, 'ZzlZCc26TlGn5m2C', 1.00, '2021-09-18 11:15:18', NULL),
(7, 1, 2, 'ZzlZCc26TlGn5m2C', 1.00, '2021-09-18 11:36:20', NULL),
(8, 10, 19, 'blmB9okyvI9booDA', 1.00, '2021-09-18 22:44:45', NULL),
(9, 10, 49, 'blmB9okyvI9booDA', 1.00, '2021-09-18 23:15:10', NULL),
(10, 6, 57, 'GZfdNBITCGm18VQV', 1.00, '2021-09-18 23:41:14', NULL),
(11, 7, 33, 'yVslyVaWTZFcpX0t', 1.00, '2021-09-18 23:50:38', NULL),
(13, 10, 122, 'blmB9okyvI9booDA', 1.00, '2021-09-19 00:49:49', NULL),
(14, 10, 59, 'blmB9okyvI9booDA', 1.00, '2021-09-19 00:50:50', NULL),
(15, 7, 50, 'qnCoclO7d23KPoeU', 1.00, '2021-09-19 00:53:34', NULL),
(16, 12, 46, 'NBl3Aos0vP737htd', 1.00, '2021-09-19 02:08:30', NULL),
(17, 12, 23, 'NBl3Aos0vP737htd', 1.00, '2021-09-19 02:08:37', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `parent_id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 0, 'Electronics', NULL, '2021-09-18 02:18:08', '2021-09-18 02:18:08'),
(2, 1, 'mobile', NULL, '2021-09-18 02:18:15', '2021-09-18 02:18:15'),
(3, 2, 'iPhone', NULL, '2021-09-18 02:19:00', '2021-09-18 02:19:00'),
(4, 2, 'Samsung', NULL, '2021-09-18 09:56:41', '2021-09-18 09:56:41'),
(5, 0, 'Fruits & Vegetables', NULL, '2021-09-18 21:28:26', '2021-09-18 21:28:26'),
(6, 5, 'Fruits', NULL, '2021-09-18 21:28:53', '2021-09-18 21:28:53'),
(7, 5, 'Vegetables', NULL, '2021-09-18 21:29:05', '2021-09-18 21:29:05'),
(8, 5, 'Dry Fruits', NULL, '2021-09-18 21:29:25', '2021-09-18 21:29:25'),
(9, 0, 'Meat & Fish', NULL, '2021-09-18 21:30:11', '2021-09-18 21:30:11'),
(10, 9, 'Meat', NULL, '2021-09-18 21:30:21', '2021-09-18 21:30:21'),
(11, 9, 'Fish', NULL, '2021-09-18 21:30:26', '2021-09-18 21:30:26'),
(12, 0, 'Cooking Essentials', NULL, '2021-09-18 21:30:51', '2021-09-18 21:30:51'),
(13, 12, 'Rice', NULL, '2021-09-18 21:31:06', '2021-09-18 21:31:06'),
(14, 12, 'Oil', NULL, '2021-09-18 21:31:18', '2021-09-18 21:31:18'),
(15, 13, 'Loose Rice', NULL, '2021-09-18 21:31:36', '2021-09-18 21:31:36'),
(16, 13, 'Packaged Rice', NULL, '2021-09-18 21:31:47', '2021-09-18 21:31:47'),
(17, 14, 'Soybean Oil', NULL, '2021-09-18 21:32:07', '2021-09-18 21:32:07'),
(18, 14, 'Mustard Oil', NULL, '2021-09-18 21:32:24', '2021-09-18 21:32:24'),
(19, 14, 'Olive Oil', NULL, '2021-09-18 21:32:36', '2021-09-18 21:32:36'),
(20, 14, 'Sunflower Oil', NULL, '2021-09-18 21:32:50', '2021-09-18 21:32:50'),
(21, 0, 'Spices & Mixes', NULL, '2021-09-18 21:33:12', '2021-09-18 21:33:12'),
(22, 21, 'Daal & Chola', NULL, '2021-09-18 21:33:46', '2021-09-18 21:33:46'),
(23, 22, 'loose Daal & Chola', NULL, '2021-09-18 21:34:07', '2021-09-18 21:34:07'),
(24, 22, 'Packaged Daal & Chola', NULL, '2021-09-18 21:34:26', '2021-09-18 21:34:26'),
(25, 21, 'Salt & Sugar', NULL, '2021-09-18 21:34:44', '2021-09-18 21:34:44'),
(26, 25, 'Salt', NULL, '2021-09-18 21:34:52', '2021-09-18 21:34:52'),
(27, 25, 'Sugar', NULL, '2021-09-18 21:35:03', '2021-09-18 21:35:03'),
(28, 0, 'Sauces & Pickles', NULL, '2021-09-18 21:35:24', '2021-09-18 21:35:24'),
(29, 28, 'Sauces', NULL, '2021-09-18 21:36:06', '2021-09-18 21:36:06'),
(30, 29, 'Cooking Sauce', NULL, '2021-09-18 21:36:24', '2021-09-18 21:36:24'),
(31, 29, 'Dipping Sauce', NULL, '2021-09-18 21:36:36', '2021-09-18 21:36:36'),
(32, 0, 'Snacks & Instant Foods', NULL, '2021-09-18 21:37:03', '2021-09-18 21:37:03'),
(33, 32, 'Forzen Food', NULL, '2021-09-18 21:37:39', '2021-09-18 21:37:39'),
(34, 32, 'Soups', NULL, '2021-09-18 21:37:51', '2021-09-18 21:37:51'),
(35, 32, 'Chips, Nuts & Others', NULL, '2021-09-18 21:38:14', '2021-09-18 21:38:14'),
(36, 32, 'Noodles, Pastas & Shemai', NULL, '2021-09-18 21:38:33', '2021-09-18 21:38:33'),
(37, 32, 'Cereals', NULL, '2021-09-18 21:38:49', '2021-09-18 21:38:49'),
(38, 32, 'Canned Foods', NULL, '2021-09-18 21:39:00', '2021-09-18 21:39:00'),
(39, 0, 'Breads, Biscuits & Cakes', NULL, '2021-09-18 21:39:38', '2021-09-18 21:39:38'),
(40, 39, 'Biscuits', NULL, '2021-09-18 21:40:50', '2021-09-18 21:40:50'),
(41, 39, 'Cakes', NULL, '2021-09-18 21:41:00', '2021-09-18 21:41:00'),
(42, 39, 'Breads', NULL, '2021-09-18 21:41:06', '2021-09-18 21:41:06'),
(43, 0, 'Spreads', NULL, '2021-09-18 21:41:19', '2021-09-18 21:41:19'),
(44, 43, 'Jam & Jelly', NULL, '2021-09-18 21:41:33', '2021-09-18 21:41:33'),
(45, 43, 'Honey', NULL, '2021-09-18 21:41:43', '2021-09-18 21:41:43'),
(46, 43, 'Mayonnaise', NULL, '2021-09-18 21:41:54', '2021-09-18 21:41:54'),
(47, 43, 'Chocolate Spreads', NULL, '2021-09-18 21:42:14', '2021-09-18 21:42:14'),
(48, 0, 'Milk & Dairy Products', NULL, '2021-09-18 21:42:34', '2021-09-18 21:42:34'),
(49, 48, 'Milk', NULL, '2021-09-18 21:42:41', '2021-09-18 21:42:41'),
(50, 49, 'Powdered Milk', NULL, '2021-09-18 21:42:53', '2021-09-18 21:42:53'),
(51, 49, 'UHT Milk', NULL, '2021-09-18 21:43:03', '2021-09-18 21:43:03'),
(52, 48, 'Cheese', NULL, '2021-09-18 21:43:13', '2021-09-18 21:43:13'),
(53, 52, 'Sliced', NULL, '2021-09-18 21:43:22', '2021-09-18 21:43:22'),
(54, 53, 'Others', NULL, '2021-09-18 21:43:28', '2021-09-18 21:43:28'),
(55, 48, 'Yogurt/Curd', NULL, '2021-09-18 21:43:41', '2021-09-18 21:43:41'),
(56, 48, 'Ice Cream', NULL, '2021-09-18 21:43:49', '2021-09-18 21:43:49'),
(57, 48, 'Butter & Ghee', NULL, '2021-09-18 21:44:05', '2021-09-18 21:44:05'),
(58, 0, 'Drinks', NULL, '2021-09-18 21:44:17', '2021-09-18 21:44:17'),
(59, 58, 'Mineral Water', NULL, '2021-09-18 21:45:36', '2021-09-18 21:45:36'),
(60, 58, 'Jouce', NULL, '2021-09-18 21:45:45', '2021-09-18 21:45:45'),
(61, 58, 'Energy & Malted Drinks', NULL, '2021-09-18 21:45:57', '2021-09-18 21:45:57'),
(62, 58, 'Soft Drinks', NULL, '2021-09-18 21:46:08', '2021-09-18 21:46:08'),
(63, 58, 'Tea & Coffee', NULL, '2021-09-18 21:46:28', '2021-09-18 21:46:28'),
(64, 0, 'Baby Food & Care', NULL, '2021-09-18 21:46:40', '2021-09-18 21:46:40'),
(65, 64, 'Baby Diapers', NULL, '2021-09-18 21:46:53', '2021-09-18 21:46:53'),
(66, 64, 'Baby Accessories', NULL, '2021-09-18 21:47:14', '2021-09-18 21:47:14'),
(67, 64, 'Baby Food', NULL, '2021-09-18 21:47:28', '2021-09-18 21:47:28'),
(68, 0, 'Home Care & Cleaning', NULL, '2021-09-18 21:47:41', '2021-09-18 21:47:41'),
(69, 68, 'Air Freshner', NULL, '2021-09-18 21:47:49', '2021-09-18 21:47:49'),
(70, 68, 'Cleaning Products', NULL, '2021-09-18 21:47:59', '2021-09-18 21:47:59'),
(71, 0, 'Personal Care', NULL, '2021-09-18 21:48:08', '2021-09-18 21:48:08'),
(72, 71, 'Shampoo & Hair Care', NULL, '2021-09-18 21:48:22', '2021-09-18 21:48:22'),
(73, 71, 'Toothpaste & Oral Care', NULL, '2021-09-18 21:48:54', '2021-09-18 21:48:54'),
(74, 71, 'Having & Facial Care', NULL, '2021-09-18 21:49:23', '2021-09-18 21:49:23'),
(75, 71, 'Saving & Facial Care', NULL, '2021-09-18 21:49:43', '2021-09-18 21:49:43'),
(76, 71, 'Bath & Body', NULL, '2021-09-18 21:49:54', '2021-09-18 21:49:54'),
(77, 71, 'Skin Care', NULL, '2021-09-18 21:50:04', '2021-09-18 21:50:04'),
(78, 71, 'Health Care', NULL, '2021-09-18 21:50:12', '2021-09-18 21:50:12'),
(79, 0, 'Home & Living', NULL, '2021-09-18 21:50:24', '2021-09-18 21:50:24'),
(80, 79, 'Towels', NULL, '2021-09-18 21:51:32', '2021-09-18 21:51:32'),
(81, 79, 'Cabinets', NULL, '2021-09-18 21:51:38', '2021-09-18 21:51:38'),
(82, 79, 'Pillow & Cushion', NULL, '2021-09-18 21:51:52', '2021-09-18 21:51:52'),
(83, 2, 'Smart Phones', NULL, '2021-09-18 22:11:16', '2021-09-18 22:11:16'),
(86, 85, 'shows', NULL, '2021-09-19 01:39:52', '2021-09-19 01:39:52'),
(87, 0, 'others', NULL, '2021-09-19 04:45:52', '2021-09-19 04:45:52'),
(88, 87, 'sports', NULL, '2021-09-19 04:46:51', '2021-09-19 04:46:51');

-- --------------------------------------------------------

--
-- Table structure for table `categories_items`
--

CREATE TABLE `categories_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_items`
--

INSERT INTO `categories_items` (`id`, `category_id`, `item_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 2, 1, NULL, NULL),
(3, 3, 1, NULL, NULL),
(4, 1, 2, NULL, NULL),
(5, 2, 2, NULL, NULL),
(6, 4, 2, NULL, NULL),
(7, 5, 3, NULL, NULL),
(8, 6, 3, NULL, NULL),
(9, 1, 4, NULL, NULL),
(10, 2, 4, NULL, NULL),
(11, 83, 4, NULL, NULL),
(12, 39, 5, NULL, NULL),
(13, 40, 5, NULL, NULL),
(14, 68, 6, NULL, NULL),
(15, 69, 6, NULL, NULL),
(16, 32, 7, NULL, NULL),
(17, 33, 7, NULL, NULL),
(18, 39, 8, NULL, NULL),
(19, 40, 8, NULL, NULL),
(20, 21, 9, NULL, NULL),
(21, 5, 10, NULL, NULL),
(22, 6, 10, NULL, NULL),
(23, 9, 11, NULL, NULL),
(24, 10, 11, NULL, NULL),
(25, 58, 12, NULL, NULL),
(26, 59, 12, NULL, NULL),
(27, 68, 13, NULL, NULL),
(28, 70, 13, NULL, NULL),
(29, 28, 14, NULL, NULL),
(30, 29, 14, NULL, NULL),
(31, 30, 14, NULL, NULL),
(32, 5, 15, NULL, NULL),
(33, 6, 15, NULL, NULL),
(34, 39, 16, NULL, NULL),
(35, 40, 16, NULL, NULL),
(36, 68, 17, NULL, NULL),
(37, 32, 18, NULL, NULL),
(38, 33, 18, NULL, NULL),
(39, 12, 19, NULL, NULL),
(40, 39, 20, NULL, NULL),
(41, 41, 20, NULL, NULL),
(42, 58, 21, NULL, NULL),
(43, 59, 21, NULL, NULL),
(44, 5, 22, NULL, NULL),
(45, 7, 22, NULL, NULL),
(46, 79, 23, NULL, NULL),
(47, 80, 23, NULL, NULL),
(48, 58, 24, NULL, NULL),
(49, 59, 24, NULL, NULL),
(50, 5, 26, NULL, NULL),
(51, 7, 26, NULL, NULL),
(52, 28, 27, NULL, NULL),
(53, 29, 27, NULL, NULL),
(54, 30, 27, NULL, NULL),
(55, 32, 29, NULL, NULL),
(56, 33, 29, NULL, NULL),
(57, 12, 30, NULL, NULL),
(58, 58, 31, NULL, NULL),
(59, 60, 31, NULL, NULL),
(60, 5, 32, NULL, NULL),
(61, 7, 32, NULL, NULL),
(62, 9, 33, NULL, NULL),
(63, 10, 33, NULL, NULL),
(64, 39, 34, NULL, NULL),
(65, 41, 34, NULL, NULL),
(66, 21, 35, NULL, NULL),
(67, 12, 36, NULL, NULL),
(68, 32, 37, NULL, NULL),
(69, 34, 37, NULL, NULL),
(70, 5, 38, NULL, NULL),
(71, 8, 38, NULL, NULL),
(72, 9, 39, NULL, NULL),
(73, 10, 39, NULL, NULL),
(74, 79, 40, NULL, NULL),
(75, 80, 40, NULL, NULL),
(76, 5, 41, NULL, NULL),
(77, 8, 41, NULL, NULL),
(78, 39, 42, NULL, NULL),
(79, 41, 42, NULL, NULL),
(80, 58, 43, NULL, NULL),
(81, 60, 43, NULL, NULL),
(82, 28, 44, NULL, NULL),
(83, 29, 44, NULL, NULL),
(84, 31, 44, NULL, NULL),
(85, 5, 45, NULL, NULL),
(86, 8, 45, NULL, NULL),
(87, 79, 46, NULL, NULL),
(88, 79, 47, NULL, NULL),
(89, 58, 48, NULL, NULL),
(90, 60, 48, NULL, NULL),
(91, 12, 49, NULL, NULL),
(92, 39, 50, NULL, NULL),
(93, 42, 50, NULL, NULL),
(94, 26, 51, NULL, NULL),
(95, 68, 52, NULL, NULL),
(96, 71, 52, NULL, NULL),
(97, 32, 53, NULL, NULL),
(98, 34, 53, NULL, NULL),
(99, 58, 54, NULL, NULL),
(100, 61, 54, NULL, NULL),
(101, 71, 55, NULL, NULL),
(102, 72, 55, NULL, NULL),
(103, 28, 56, NULL, NULL),
(104, 29, 56, NULL, NULL),
(105, 31, 56, NULL, NULL),
(106, 9, 57, NULL, NULL),
(107, 11, 57, NULL, NULL),
(108, 12, 59, NULL, NULL),
(109, 71, 60, NULL, NULL),
(110, 72, 60, NULL, NULL),
(111, 21, 61, NULL, NULL),
(112, 71, 62, NULL, NULL),
(113, 72, 62, NULL, NULL),
(114, 32, 63, NULL, NULL),
(115, 34, 63, NULL, NULL),
(116, 58, 64, NULL, NULL),
(117, 61, 64, NULL, NULL),
(118, 71, 65, NULL, NULL),
(119, 73, 65, NULL, NULL),
(120, 71, 66, NULL, NULL),
(121, 73, 66, NULL, NULL),
(122, 23, 67, NULL, NULL),
(123, 71, 68, NULL, NULL),
(124, 73, 68, NULL, NULL),
(125, 12, 69, NULL, NULL),
(126, 24, 70, NULL, NULL),
(127, 9, 71, NULL, NULL),
(128, 11, 71, NULL, NULL),
(129, 71, 72, NULL, NULL),
(130, 74, 72, NULL, NULL),
(131, 13, 19, NULL, NULL),
(132, 39, 73, NULL, NULL),
(133, 42, 73, NULL, NULL),
(134, 71, 74, NULL, NULL),
(135, 74, 74, NULL, NULL),
(136, 58, 75, NULL, NULL),
(137, 61, 75, NULL, NULL),
(138, 21, 51, NULL, NULL),
(139, 39, 76, NULL, NULL),
(140, 42, 76, NULL, NULL),
(141, 39, 77, NULL, NULL),
(142, 42, 77, NULL, NULL),
(143, 14, 49, NULL, NULL),
(144, 18, 49, NULL, NULL),
(145, 9, 78, NULL, NULL),
(146, 11, 78, NULL, NULL),
(147, 71, 79, NULL, NULL),
(148, 76, 79, NULL, NULL),
(149, 21, 80, NULL, NULL),
(150, 25, 80, NULL, NULL),
(151, 27, 80, NULL, NULL),
(152, 58, 81, NULL, NULL),
(153, 62, 81, NULL, NULL),
(154, 21, 67, NULL, NULL),
(155, 13, 36, NULL, NULL),
(156, 16, 36, NULL, NULL),
(157, 14, 59, NULL, NULL),
(158, 19, 59, NULL, NULL),
(159, 21, 70, NULL, NULL),
(160, 22, 70, NULL, NULL),
(161, 14, 30, NULL, NULL),
(162, 17, 30, NULL, NULL),
(163, 14, 69, NULL, NULL),
(164, 20, 69, NULL, NULL),
(165, 71, 82, NULL, NULL),
(166, 76, 82, NULL, NULL),
(167, 15, 19, NULL, NULL),
(168, 21, 83, NULL, NULL),
(169, 25, 83, NULL, NULL),
(170, 27, 83, NULL, NULL),
(171, 71, 84, NULL, NULL),
(172, 77, 84, NULL, NULL),
(173, 32, 85, NULL, NULL),
(174, 35, 85, NULL, NULL),
(175, 58, 86, NULL, NULL),
(176, 62, 86, NULL, NULL),
(177, 21, 87, NULL, NULL),
(178, 24, 87, NULL, NULL),
(179, 58, 88, NULL, NULL),
(180, 62, 88, NULL, NULL),
(181, 12, 89, NULL, NULL),
(182, 13, 89, NULL, NULL),
(183, 15, 89, NULL, NULL),
(184, 12, 90, NULL, NULL),
(185, 13, 90, NULL, NULL),
(186, 15, 90, NULL, NULL),
(187, 21, 91, NULL, NULL),
(188, 25, 91, NULL, NULL),
(189, 26, 91, NULL, NULL),
(190, 28, 92, NULL, NULL),
(191, 29, 92, NULL, NULL),
(192, 31, 92, NULL, NULL),
(193, 58, 93, NULL, NULL),
(194, 62, 93, NULL, NULL),
(195, 21, 94, NULL, NULL),
(196, 25, 94, NULL, NULL),
(197, 26, 94, NULL, NULL),
(198, 71, 95, NULL, NULL),
(199, 77, 95, NULL, NULL),
(200, 64, 96, NULL, NULL),
(201, 65, 96, NULL, NULL),
(202, 12, 97, NULL, NULL),
(203, 13, 97, NULL, NULL),
(204, 16, 97, NULL, NULL),
(205, 12, 98, NULL, NULL),
(206, 13, 98, NULL, NULL),
(207, 16, 98, NULL, NULL),
(208, 58, 99, NULL, NULL),
(209, 63, 99, NULL, NULL),
(210, 21, 100, NULL, NULL),
(211, 23, 100, NULL, NULL),
(212, 21, 101, NULL, NULL),
(213, 23, 101, NULL, NULL),
(214, 28, 102, NULL, NULL),
(215, 29, 102, NULL, NULL),
(216, 31, 102, NULL, NULL),
(217, 32, 104, NULL, NULL),
(218, 35, 104, NULL, NULL),
(219, 58, 105, NULL, NULL),
(220, 63, 105, NULL, NULL),
(221, 64, 106, NULL, NULL),
(222, 65, 106, NULL, NULL),
(223, 12, 107, NULL, NULL),
(224, 14, 107, NULL, NULL),
(225, 17, 107, NULL, NULL),
(226, 21, 108, NULL, NULL),
(227, 24, 108, NULL, NULL),
(228, 12, 109, NULL, NULL),
(229, 14, 109, NULL, NULL),
(230, 17, 109, NULL, NULL),
(231, 32, 110, NULL, NULL),
(232, 35, 110, NULL, NULL),
(233, 28, 111, NULL, NULL),
(234, 29, 111, NULL, NULL),
(235, 30, 111, NULL, NULL),
(236, 58, 112, NULL, NULL),
(237, 63, 112, NULL, NULL),
(238, 21, 113, NULL, NULL),
(239, 25, 113, NULL, NULL),
(240, 27, 113, NULL, NULL),
(241, 28, 114, NULL, NULL),
(242, 29, 114, NULL, NULL),
(243, 30, 114, NULL, NULL),
(244, 64, 116, NULL, NULL),
(245, 65, 116, NULL, NULL),
(246, 32, 117, NULL, NULL),
(247, 36, 117, NULL, NULL),
(248, 12, 118, NULL, NULL),
(249, 14, 118, NULL, NULL),
(250, 18, 118, NULL, NULL),
(251, 12, 119, NULL, NULL),
(252, 14, 119, NULL, NULL),
(253, 18, 119, NULL, NULL),
(254, 32, 120, NULL, NULL),
(255, 36, 120, NULL, NULL),
(256, 12, 121, NULL, NULL),
(257, 14, 121, NULL, NULL),
(258, 19, 121, NULL, NULL),
(259, 12, 122, NULL, NULL),
(260, 14, 122, NULL, NULL),
(261, 19, 122, NULL, NULL),
(262, 64, 123, NULL, NULL),
(263, 67, 123, NULL, NULL),
(264, 12, 124, NULL, NULL),
(265, 14, 124, NULL, NULL),
(266, 20, 124, NULL, NULL),
(267, 12, 125, NULL, NULL),
(268, 14, 125, NULL, NULL),
(269, 20, 125, NULL, NULL),
(270, 32, 126, NULL, NULL),
(271, 38, 126, NULL, NULL),
(272, 32, 127, NULL, NULL),
(273, 38, 127, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

CREATE TABLE `coupons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` int(11) NOT NULL,
  `coupon_validity` date DEFAULT NULL,
  `price_limit` double(8,2) DEFAULT NULL,
  `used` int(11) NOT NULL DEFAULT 0 COMMENT 'How Many time used this coupon',
  `max_used` int(11) DEFAULT NULL COMMENT 'How Many time you want  used this coupon',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `coupon`, `value`, `coupon_validity`, `price_limit`, `used`, `max_used`, `created_at`, `updated_at`) VALUES
(1, 'mf10', 10, '2021-10-01', NULL, 1, 50, '2021-09-18 02:24:56', '2021-09-18 02:32:47'),
(2, 'r45', 45, '2021-09-30', 5000.00, 1, 50, '2021-09-18 23:32:02', '2021-09-19 04:05:17'),
(3, 'mf50', 50, '2021-09-28', 700.00, 0, 10, '2021-09-18 23:32:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `first_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` set('m','f','o') COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` decimal(8,2) NOT NULL,
  `discount` int(11) NOT NULL,
  `taxable` tinyint(4) NOT NULL DEFAULT 0,
  `comments` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `user_id`, `first_name`, `last_name`, `gender`, `email`, `phone`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `company`, `account`, `total`, `discount`, `taxable`, `comments`, `created_at`, `updated_at`) VALUES
(1, 1, 'User', 'Profile', 'm', 'user@gmail.com', '017587965', 'dk', 'nai', 'dk', 'dk', '1254', 'bd', 'nai', 'nai', '0.00', 0, 1, 'nai', '2021-09-18 02:15:09', '2021-09-18 02:15:09'),
(2, NULL, 'default', 'default', 'm', 'default@gmail.com', '6465456', 'j', 'j', 'j', 'j', '4565', 'j', 'j', '78', '20.00', 3212, 1, 'default Customer', '2021-09-18 02:39:13', '2021-09-18 02:39:13'),
(3, NULL, 'ASA', 'Al-Mamun', 'm', 'asamamun.web@gmail.com', '01911039525', 'Dhaka', 'Dhaka', 'Dhaka', 'Dhaka', '1216', 'Bangladesh', 'PTTC', '2343245', '0.00', 0, 0, 'mamun sir as customer', '2021-09-18 22:09:23', '2021-09-18 22:09:23');

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `loginname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` set('m','f','o') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `employeeid` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employees`
--

INSERT INTO `employees` (`id`, `loginname`, `user_id`, `password`, `role`, `first_name`, `last_name`, `gender`, `phone`, `email`, `image`, `employeeid`, `created_at`, `updated_at`) VALUES
(1, 'Employee', 3, '$2y$10$4Ka8pRdOD7sG6VVGqz4jReRQldr1Crtd4oeQAhZ25KprBSoSodxWm', '6', 'Employee', 'first', 'm', '01557889554', 'employee@gmail.com', 'Employee.png', '01', '2021-09-18 02:35:27', '2021-09-18 02:35:27'),
(2, 'employee2', 4, '$2y$10$ivSXJe584QsmK7T8Vgl3Ue1bfIkJee1UbQn0B3SkIHhHhBwH6NiJC', '6', 'employee2', 'employee2', 'm', '4645645', 'employe44e@gmail.com', 'employee2.png', '1001', '2021-09-18 07:20:21', '2021-09-18 07:20:21'),
(3, 'emp112345', 15, '$2y$10$b/dHXolHubvCsLGHM4daEeV1Vzo6ofmfEGRsR0dfu8E5OMAFGBKpy', '6', 'emp112345', 'emp112345', 'm', '0195465656', 'emp1@gmail.com', 'emp112345.jpg', '205', '2021-09-18 22:16:41', '2021-09-18 22:16:41');

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
-- Table structure for table `giftcards`
--

CREATE TABLE `giftcards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `card_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expire_date` date NOT NULL,
  `value` int(11) NOT NULL,
  `card_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `giftcards`
--

INSERT INTO `giftcards` (`id`, `customer_id`, `card_number`, `expire_date`, `value`, `card_image`, `created_at`, `updated_at`) VALUES
(1, 1, '1010101010', '2021-09-24', 200, NULL, '2021-09-18 08:07:31', '2021-09-18 08:07:31');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `item_id`, `name`, `note`, `created_at`, `updated_at`) VALUES
(1, 1, '952255f2d7a02db6c6f424d1157e7144.jpg', 'uploads/product/952255f2d7a02db6c6f424d1157e7144.jpg', '2021-09-18 02:24:02', '2021-09-18 02:24:02'),
(2, 1, 'a30f9de8828bbe3291b964afc2b14ca9.jpg', 'uploads/product/a30f9de8828bbe3291b964afc2b14ca9.jpg', '2021-09-18 02:24:02', '2021-09-18 02:24:02'),
(3, 1, '5ef90a6b71713b2938c17a8b55980aef.png', 'uploads/product/5ef90a6b71713b2938c17a8b55980aef.png', '2021-09-18 02:24:02', '2021-09-18 02:24:02'),
(4, 2, 'ded2352b42bb7789f48f9ab0def9ee40.jpg', 'uploads/product/ded2352b42bb7789f48f9ab0def9ee40.jpg', '2021-09-18 10:00:19', '2021-09-18 10:00:19'),
(5, 2, 'c77377b4621532b525661a8e02c1c316.jpg', 'uploads/product/c77377b4621532b525661a8e02c1c316.jpg', '2021-09-18 10:00:19', '2021-09-18 10:00:19'),
(6, 2, 'f2b4c1a9b2720bd0208b84868ef9c57a.jpg', 'uploads/product/f2b4c1a9b2720bd0208b84868ef9c57a.jpg', '2021-09-18 10:00:19', '2021-09-18 10:00:19'),
(7, 2, '86d92df25a91c54129c3e4c299530998.jpg', 'uploads/product/86d92df25a91c54129c3e4c299530998.jpg', '2021-09-18 10:00:19', '2021-09-18 10:00:19'),
(8, 3, 'f8cccca7a8d64b333cc07fd3de1eaeec.webp', 'uploads/product/f8cccca7a8d64b333cc07fd3de1eaeec.webp', '2021-09-18 22:16:15', '2021-09-18 22:16:15'),
(9, 3, '02bef9f53e0fee1ec2e0da019e42aa01.jpg', 'uploads/product/02bef9f53e0fee1ec2e0da019e42aa01.jpg', '2021-09-18 22:16:15', '2021-09-18 22:16:15'),
(10, 3, '4045b112b722f2aa91ee1268bdc53791.jpg', 'uploads/product/4045b112b722f2aa91ee1268bdc53791.jpg', '2021-09-18 22:16:15', '2021-09-18 22:16:15'),
(11, 4, 'd6af4f029378b06f590f9955099fd241.jpg', 'uploads/product/d6af4f029378b06f590f9955099fd241.jpg', '2021-09-18 22:20:46', '2021-09-18 22:20:46'),
(12, 4, '7b71ad482d607e84f119f60d33695dbd.jpg', 'uploads/product/7b71ad482d607e84f119f60d33695dbd.jpg', '2021-09-18 22:20:46', '2021-09-18 22:20:46'),
(13, 4, '3c89c1a92275d2ef3d1098d7eb2495ae.jpg', 'uploads/product/3c89c1a92275d2ef3d1098d7eb2495ae.jpg', '2021-09-18 22:20:46', '2021-09-18 22:20:46'),
(17, 6, '0f27f377fa0d96fd6cceb170a4c5394c.jpg', 'uploads/product/0f27f377fa0d96fd6cceb170a4c5394c.jpg', '2021-09-18 22:27:21', '2021-09-18 22:27:21'),
(18, 6, '6b21074daa8fbe16695b728ee4a39d1a.jpg', 'uploads/product/6b21074daa8fbe16695b728ee4a39d1a.jpg', '2021-09-18 22:27:21', '2021-09-18 22:27:21'),
(19, 6, 'b3867caffaeb56335e21207a3812dd98.jpg', 'uploads/product/b3867caffaeb56335e21207a3812dd98.jpg', '2021-09-18 22:27:21', '2021-09-18 22:27:21'),
(20, 7, '1c768fcb1018dc11a0c59f7cb4aca272.jpg', 'uploads/product/1c768fcb1018dc11a0c59f7cb4aca272.jpg', '2021-09-18 22:27:29', '2021-09-18 22:27:29'),
(21, 7, '39ab4670954a477947f9a014af026145.jpg', 'uploads/product/39ab4670954a477947f9a014af026145.jpg', '2021-09-18 22:27:29', '2021-09-18 22:27:29'),
(22, 7, 'acaa8aae09a35a8add0086661789316d.jpg', 'uploads/product/acaa8aae09a35a8add0086661789316d.jpg', '2021-09-18 22:27:29', '2021-09-18 22:27:29'),
(25, 9, '1476c582cd41f8245407df6664e221a8.jpg', 'uploads/product/1476c582cd41f8245407df6664e221a8.jpg', '2021-09-18 22:29:44', '2021-09-18 22:29:44'),
(26, 9, '710db6b310140309e10595b4baf5da8a.jpg', 'uploads/product/710db6b310140309e10595b4baf5da8a.jpg', '2021-09-18 22:29:44', '2021-09-18 22:29:44'),
(27, 9, '0b9f88f6e8f6307a21699e8c792e91d9.jpg', 'uploads/product/0b9f88f6e8f6307a21699e8c792e91d9.jpg', '2021-09-18 22:29:44', '2021-09-18 22:29:44'),
(32, 12, '52ff9c3409abd34c18007284d4ca1380.jpg', 'uploads/product/52ff9c3409abd34c18007284d4ca1380.jpg', '2021-09-18 22:33:05', '2021-09-18 22:33:05'),
(33, 12, '51a14642f973774d63b72c21ddd6040d.jpg', 'uploads/product/51a14642f973774d63b72c21ddd6040d.jpg', '2021-09-18 22:33:05', '2021-09-18 22:33:05'),
(34, 12, '960adc148967ed7e8fcd819640414a79.jpg', 'uploads/product/960adc148967ed7e8fcd819640414a79.jpg', '2021-09-18 22:33:05', '2021-09-18 22:33:05'),
(35, 13, 'b6bca410a79ef5ed86a71c539541b282.jpg', 'uploads/product/b6bca410a79ef5ed86a71c539541b282.jpg', '2021-09-18 22:33:55', '2021-09-18 22:33:55'),
(36, 13, '54115c5a19d302b65a48978e16261b77.jpg', 'uploads/product/54115c5a19d302b65a48978e16261b77.jpg', '2021-09-18 22:33:55', '2021-09-18 22:33:55'),
(42, 16, 'cf96abf8589b93aa009afc8c0deb89c6.jpg', 'uploads/product/cf96abf8589b93aa009afc8c0deb89c6.jpg', '2021-09-18 22:36:07', '2021-09-18 22:36:07'),
(43, 16, '44af3981c3f7c5a9ba0d66ad0a39c9aa.jpg', 'uploads/product/44af3981c3f7c5a9ba0d66ad0a39c9aa.jpg', '2021-09-18 22:36:07', '2021-09-18 22:36:07'),
(44, 17, 'be89444d9f95d62c662009f89d795114.jpg', 'uploads/product/be89444d9f95d62c662009f89d795114.jpg', '2021-09-18 22:40:30', '2021-09-18 22:40:30'),
(45, 17, '7142213e492354f98b53644864abf994.jpg', 'uploads/product/7142213e492354f98b53644864abf994.jpg', '2021-09-18 22:40:30', '2021-09-18 22:40:30'),
(46, 17, 'a4e35b7397501661bf0896b76ae9c74a.jpg', 'uploads/product/a4e35b7397501661bf0896b76ae9c74a.jpg', '2021-09-18 22:40:30', '2021-09-18 22:40:30'),
(47, 18, 'a73c1b97c6bc50b3284ab2de46a5fbf4.jpg', 'uploads/product/a73c1b97c6bc50b3284ab2de46a5fbf4.jpg', '2021-09-18 22:40:55', '2021-09-18 22:40:55'),
(48, 18, 'c0f8b0956c4ecb1f821a7254fa675ccc.jpg', 'uploads/product/c0f8b0956c4ecb1f821a7254fa675ccc.jpg', '2021-09-18 22:40:55', '2021-09-18 22:40:55'),
(49, 18, '8a6ff44dcbebc3656606e3ae65b5bd93.jpg', 'uploads/product/8a6ff44dcbebc3656606e3ae65b5bd93.jpg', '2021-09-18 22:40:55', '2021-09-18 22:40:55'),
(50, 11, 'c4971cb8299bc27dc3c120d846ff3e0a.jpg', 'uploads/product/c4971cb8299bc27dc3c120d846ff3e0a.jpg', '2021-09-18 22:44:17', '2021-09-18 22:44:17'),
(51, 11, 'e0212ae11c230ba5f7118ad9d56862f0.jpg', 'uploads/product/e0212ae11c230ba5f7118ad9d56862f0.jpg', '2021-09-18 22:44:17', '2021-09-18 22:44:17'),
(52, 19, '81c779f9eda4d7f49e4dff1a1b38d2a1.jpg', 'uploads/product/81c779f9eda4d7f49e4dff1a1b38d2a1.jpg', '2021-09-18 22:44:24', '2021-09-18 22:44:24'),
(53, 19, 'bd1feb8c67f1d274b059ea28f10df3f0.jpg', 'uploads/product/bd1feb8c67f1d274b059ea28f10df3f0.jpg', '2021-09-18 22:44:24', '2021-09-18 22:44:24'),
(54, 20, '465a3217dac8c2d7dff19d0ea2345c73.jpg', 'uploads/product/465a3217dac8c2d7dff19d0ea2345c73.jpg', '2021-09-18 22:44:55', '2021-09-18 22:44:55'),
(55, 20, '647a2db57a0c0d16f5fb5d2b8ffb9da3.jpg', 'uploads/product/647a2db57a0c0d16f5fb5d2b8ffb9da3.jpg', '2021-09-18 22:44:55', '2021-09-18 22:44:55'),
(56, 20, '8bb9c6574d16603845f264aeefb610e1.jpg', 'uploads/product/8bb9c6574d16603845f264aeefb610e1.jpg', '2021-09-18 22:44:55', '2021-09-18 22:44:55'),
(57, 21, '28815dff0e42a47cd8637687b783804e.jpg', 'uploads/product/28815dff0e42a47cd8637687b783804e.jpg', '2021-09-18 22:46:06', '2021-09-18 22:46:06'),
(58, 21, '8087e475fa4bcdfe0c645e9783d30e75.jpg', 'uploads/product/8087e475fa4bcdfe0c645e9783d30e75.jpg', '2021-09-18 22:46:07', '2021-09-18 22:46:07'),
(59, 21, 'adb24c5014e7d410b49b23162b03240f.jpg', 'uploads/product/adb24c5014e7d410b49b23162b03240f.jpg', '2021-09-18 22:46:07', '2021-09-18 22:46:07'),
(62, 14, 'd9908e3224b91c75785c098b88b87187.jpg', 'uploads/product/d9908e3224b91c75785c098b88b87187.jpg', '2021-09-18 22:48:10', '2021-09-18 22:48:10'),
(63, 14, '7ec7c941f2537054dbc9501874cf6e7f.jpg', 'uploads/product/7ec7c941f2537054dbc9501874cf6e7f.jpg', '2021-09-18 22:48:10', '2021-09-18 22:48:10'),
(64, 14, '56291f7655dca46c70ed88446825cead.jpg', 'uploads/product/56291f7655dca46c70ed88446825cead.jpg', '2021-09-18 22:48:10', '2021-09-18 22:48:10'),
(66, 8, 'e27736451ffd2cd69dfa22be247cebe7.jpg', 'uploads/product/e27736451ffd2cd69dfa22be247cebe7.jpg', '2021-09-18 22:51:09', '2021-09-18 22:51:09'),
(67, 8, '7916aae6eb86ada26a793b3f8d749c22.jpg', 'uploads/product/7916aae6eb86ada26a793b3f8d749c22.jpg', '2021-09-18 22:51:09', '2021-09-18 22:51:09'),
(68, 23, '492c647c975b7be73c9bca4b7f48827a.jpg', 'uploads/product/492c647c975b7be73c9bca4b7f48827a.jpg', '2021-09-18 22:52:02', '2021-09-18 22:52:02'),
(69, 23, '0afdfea745a562663532c07a96207dd7.jpg', 'uploads/product/0afdfea745a562663532c07a96207dd7.jpg', '2021-09-18 22:52:02', '2021-09-18 22:52:02'),
(70, 24, 'd1592ba6e2f9fa4d22df8fea8a449235.jpg', 'uploads/product/d1592ba6e2f9fa4d22df8fea8a449235.jpg', '2021-09-18 22:52:36', '2021-09-18 22:52:36'),
(71, 24, '54dd2aec6bbbecf64c162c38c41fea35.jpg', 'uploads/product/54dd2aec6bbbecf64c162c38c41fea35.jpg', '2021-09-18 22:52:36', '2021-09-18 22:52:36'),
(72, 24, '9aa98fa66dac8525a4474f7bc3994d8d.jpg', 'uploads/product/9aa98fa66dac8525a4474f7bc3994d8d.jpg', '2021-09-18 22:52:36', '2021-09-18 22:52:36'),
(75, 27, '0dec07619e6b8e0e4be535aabc4558ac.jpg', 'uploads/product/0dec07619e6b8e0e4be535aabc4558ac.jpg', '2021-09-18 22:55:16', '2021-09-18 22:55:16'),
(76, 27, '92edffedf7438edbf5fc3e0d06b07de5.jpg', 'uploads/product/92edffedf7438edbf5fc3e0d06b07de5.jpg', '2021-09-18 22:55:16', '2021-09-18 22:55:16'),
(77, 27, '6a15d068851f635130f622619985394b.jpg', 'uploads/product/6a15d068851f635130f622619985394b.jpg', '2021-09-18 22:55:17', '2021-09-18 22:55:17'),
(78, 29, '13499c4b358caf65b339e8bd9c633666.jpg', 'uploads/product/13499c4b358caf65b339e8bd9c633666.jpg', '2021-09-18 22:56:10', '2021-09-18 22:56:10'),
(79, 29, '1b6d27e9bd4a8dce68556b18c8c43051.jpg', 'uploads/product/1b6d27e9bd4a8dce68556b18c8c43051.jpg', '2021-09-18 22:56:10', '2021-09-18 22:56:10'),
(80, 29, '3ba30c2f6938e06b591326d81fe74f16.jpg', 'uploads/product/3ba30c2f6938e06b591326d81fe74f16.jpg', '2021-09-18 22:56:10', '2021-09-18 22:56:10'),
(81, 30, '4b387f6c1b19a06fc823b1746b200244.jpg', 'uploads/product/4b387f6c1b19a06fc823b1746b200244.jpg', '2021-09-18 22:56:36', '2021-09-18 22:56:36'),
(82, 30, '9afcba686c2fd01bf4957f095061a62a.jpg', 'uploads/product/9afcba686c2fd01bf4957f095061a62a.jpg', '2021-09-18 22:56:36', '2021-09-18 22:56:36'),
(83, 31, '03b2c525a817bde674bfef846a3f9f13.jpg', 'uploads/product/03b2c525a817bde674bfef846a3f9f13.jpg', '2021-09-18 22:58:04', '2021-09-18 22:58:04'),
(84, 31, '6fb49589fe28d3b2255fe0f44cb21f78.jpg', 'uploads/product/6fb49589fe28d3b2255fe0f44cb21f78.jpg', '2021-09-18 22:58:05', '2021-09-18 22:58:05'),
(85, 31, 'ba400407cf8f8b3d60cdfb48b85a0b63.jpg', 'uploads/product/ba400407cf8f8b3d60cdfb48b85a0b63.jpg', '2021-09-18 22:58:05', '2021-09-18 22:58:05'),
(88, 33, '172fb7433e114bb0d3bb3a8286560dce.jpg', 'uploads/product/172fb7433e114bb0d3bb3a8286560dce.jpg', '2021-09-18 22:58:24', '2021-09-18 22:58:24'),
(89, 33, '70676834d7b7096fec4d044773cf14d3.jpg', 'uploads/product/70676834d7b7096fec4d044773cf14d3.jpg', '2021-09-18 22:58:24', '2021-09-18 22:58:24'),
(90, 34, '485a6aaececa7af07a7d1b3c78578c88.jpg', 'uploads/product/485a6aaececa7af07a7d1b3c78578c88.jpg', '2021-09-18 22:58:48', '2021-09-18 22:58:48'),
(91, 34, '7c51e665de08cc1e65b355227c2fa1a0.jpg', 'uploads/product/7c51e665de08cc1e65b355227c2fa1a0.jpg', '2021-09-18 22:58:48', '2021-09-18 22:58:48'),
(92, 34, 'ad2cbc505b93fab33ea47f3b065230af.jpg', 'uploads/product/ad2cbc505b93fab33ea47f3b065230af.jpg', '2021-09-18 22:58:48', '2021-09-18 22:58:48'),
(93, 35, '57d5a145014a4239ea9f3a2a8764702b.jpg', 'uploads/product/57d5a145014a4239ea9f3a2a8764702b.jpg', '2021-09-18 23:02:14', '2021-09-18 23:02:14'),
(94, 35, '4849d181ceaec25dc901ae632910908a.jpg', 'uploads/product/4849d181ceaec25dc901ae632910908a.jpg', '2021-09-18 23:02:14', '2021-09-18 23:02:14'),
(95, 35, '15aa0dd406b3fad1d38e2c6877d66318.jpg', 'uploads/product/15aa0dd406b3fad1d38e2c6877d66318.jpg', '2021-09-18 23:02:14', '2021-09-18 23:02:14'),
(96, 35, '544af51a1cbf958d05d08f4b8d0a417e.jpg', 'uploads/product/544af51a1cbf958d05d08f4b8d0a417e.jpg', '2021-09-18 23:02:14', '2021-09-18 23:02:14'),
(97, 36, '4f030699cc872571520cc3e22a63cb82.jpg', 'uploads/product/4f030699cc872571520cc3e22a63cb82.jpg', '2021-09-18 23:03:56', '2021-09-18 23:03:56'),
(98, 36, '2513199b507605c99a0d8d66cabd2d0a.jpg', 'uploads/product/2513199b507605c99a0d8d66cabd2d0a.jpg', '2021-09-18 23:03:56', '2021-09-18 23:03:56'),
(99, 37, '5eff841ca218cfa96a7def05fbab507e.jpg', 'uploads/product/5eff841ca218cfa96a7def05fbab507e.jpg', '2021-09-18 23:05:12', '2021-09-18 23:05:12'),
(100, 37, '601d0a4d262ffd7cb0ec8d39144cda85.jpg', 'uploads/product/601d0a4d262ffd7cb0ec8d39144cda85.jpg', '2021-09-18 23:05:12', '2021-09-18 23:05:12'),
(101, 37, '90c8b36858999f603d1f8e0c8278a185.jpg', 'uploads/product/90c8b36858999f603d1f8e0c8278a185.jpg', '2021-09-18 23:05:12', '2021-09-18 23:05:12'),
(104, 39, '55aac24d9fcaaac8c6e8f4437f102d80.jpg', 'uploads/product/55aac24d9fcaaac8c6e8f4437f102d80.jpg', '2021-09-18 23:05:32', '2021-09-18 23:05:32'),
(105, 39, 'adfbaa75be6f538277a93997861affcd.jpg', 'uploads/product/adfbaa75be6f538277a93997861affcd.jpg', '2021-09-18 23:05:32', '2021-09-18 23:05:32'),
(106, 40, '63a4d51f6246d47d592e5a6fad756a86.jpg', 'uploads/product/63a4d51f6246d47d592e5a6fad756a86.jpg', '2021-09-18 23:05:47', '2021-09-18 23:05:47'),
(107, 40, '9f69aa01cc7e3499bf3989ee2cc938f3.jpg', 'uploads/product/9f69aa01cc7e3499bf3989ee2cc938f3.jpg', '2021-09-18 23:05:47', '2021-09-18 23:05:47'),
(108, 40, 'ef65dbf14152595618c66a1db5b03f43.jpg', 'uploads/product/ef65dbf14152595618c66a1db5b03f43.jpg', '2021-09-18 23:05:47', '2021-09-18 23:05:47'),
(111, 42, '67682a8b30400769b2a7065dd97de023.jpg', 'uploads/product/67682a8b30400769b2a7065dd97de023.jpg', '2021-09-18 23:08:40', '2021-09-18 23:08:40'),
(112, 42, 'a4ff7653836555d40cc0697a2d7d0e51.jpg', 'uploads/product/a4ff7653836555d40cc0697a2d7d0e51.jpg', '2021-09-18 23:08:40', '2021-09-18 23:08:40'),
(113, 42, 'd8bc80e1dc2877a7acce86c6d69b4267.jpg', 'uploads/product/d8bc80e1dc2877a7acce86c6d69b4267.jpg', '2021-09-18 23:08:40', '2021-09-18 23:08:40'),
(114, 43, 'd1802a29996b7a2066c608c0c3ee052e.jpg', 'uploads/product/d1802a29996b7a2066c608c0c3ee052e.jpg', '2021-09-18 23:08:55', '2021-09-18 23:08:55'),
(115, 43, 'e18818dc3db0081d4999bb734843bf49.jpg', 'uploads/product/e18818dc3db0081d4999bb734843bf49.jpg', '2021-09-18 23:08:55', '2021-09-18 23:08:55'),
(116, 43, '5b851c1ab4c023c4e435d34d4940784c.jpg', 'uploads/product/5b851c1ab4c023c4e435d34d4940784c.jpg', '2021-09-18 23:08:55', '2021-09-18 23:08:55'),
(117, 44, 'c9aafd6bcd333c23396e7eba434609e3.jpg', 'uploads/product/c9aafd6bcd333c23396e7eba434609e3.jpg', '2021-09-18 23:10:28', '2021-09-18 23:10:28'),
(118, 44, '87a628be9b322b1483a644a60dad8c8d.jpg', 'uploads/product/87a628be9b322b1483a644a60dad8c8d.jpg', '2021-09-18 23:10:28', '2021-09-18 23:10:28'),
(119, 44, 'cce2cb6f4ba1235488c81d8e3d3ae2de.jpg', 'uploads/product/cce2cb6f4ba1235488c81d8e3d3ae2de.jpg', '2021-09-18 23:10:28', '2021-09-18 23:10:28'),
(122, 46, 'd93becef8a01c7d01cdb9a07632bed80.jpg', 'uploads/product/d93becef8a01c7d01cdb9a07632bed80.jpg', '2021-09-18 23:13:03', '2021-09-18 23:13:03'),
(123, 47, '4d71e1af27d75e0b0c8da566dbe8461a.jpg', 'uploads/product/4d71e1af27d75e0b0c8da566dbe8461a.jpg', '2021-09-18 23:13:03', '2021-09-18 23:13:03'),
(124, 46, 'd42bec42aabfa1410e1291c7ca93c69d.jpg', 'uploads/product/d42bec42aabfa1410e1291c7ca93c69d.jpg', '2021-09-18 23:13:03', '2021-09-18 23:13:03'),
(125, 47, 'effc7ee13e028fa9c8fa73632c18a681.jpg', 'uploads/product/effc7ee13e028fa9c8fa73632c18a681.jpg', '2021-09-18 23:13:03', '2021-09-18 23:13:03'),
(126, 46, '6b056e2363a11480ddfcce4943698889.jpg', 'uploads/product/6b056e2363a11480ddfcce4943698889.jpg', '2021-09-18 23:13:03', '2021-09-18 23:13:03'),
(127, 48, 'a9c14162001cd2be4511d69139e80841.jpg', 'uploads/product/a9c14162001cd2be4511d69139e80841.jpg', '2021-09-18 23:14:24', '2021-09-18 23:14:24'),
(128, 48, 'ebbccf7829cb1b3427385a79bd3096ae.jpg', 'uploads/product/ebbccf7829cb1b3427385a79bd3096ae.jpg', '2021-09-18 23:14:24', '2021-09-18 23:14:24'),
(129, 48, '6c715777e25f0cf0d2d30e95c7eec133.jpg', 'uploads/product/6c715777e25f0cf0d2d30e95c7eec133.jpg', '2021-09-18 23:14:24', '2021-09-18 23:14:24'),
(130, 49, '9ef048c1c65ec3f28bef09e8f23faba5.jpg', 'uploads/product/9ef048c1c65ec3f28bef09e8f23faba5.jpg', '2021-09-18 23:14:58', '2021-09-18 23:14:58'),
(131, 49, '30a8359d0a9349814d067b3bdcc53fe6.jpg', 'uploads/product/30a8359d0a9349814d067b3bdcc53fe6.jpg', '2021-09-18 23:14:58', '2021-09-18 23:14:58'),
(132, 50, 'dad42fcc75d2d9849ff4db69005439bc.jpg', 'uploads/product/dad42fcc75d2d9849ff4db69005439bc.jpg', '2021-09-18 23:16:12', '2021-09-18 23:16:12'),
(133, 50, '161b62f3ffd46081bfe55c274a0e3624.jpg', 'uploads/product/161b62f3ffd46081bfe55c274a0e3624.jpg', '2021-09-18 23:16:12', '2021-09-18 23:16:12'),
(134, 50, '316770561e71ee032845c5204ea323b9.jpg', 'uploads/product/316770561e71ee032845c5204ea323b9.jpg', '2021-09-18 23:16:12', '2021-09-18 23:16:12'),
(135, 51, '3af48c2718f47dd21f4fa5052d87815d.png', 'uploads/product/3af48c2718f47dd21f4fa5052d87815d.png', '2021-09-18 23:16:16', '2021-09-18 23:16:16'),
(136, 51, 'afe0b549552740117cb40e95887cfd32.png', 'uploads/product/afe0b549552740117cb40e95887cfd32.png', '2021-09-18 23:16:16', '2021-09-18 23:16:16'),
(137, 51, '2ba161f33533a7dbe023372da61c2da7.png', 'uploads/product/2ba161f33533a7dbe023372da61c2da7.png', '2021-09-18 23:16:16', '2021-09-18 23:16:16'),
(138, 52, '07ddaabd6f8210e485a51804b53eb29d.jpg', 'uploads/product/07ddaabd6f8210e485a51804b53eb29d.jpg', '2021-09-18 23:17:52', '2021-09-18 23:17:52'),
(139, 52, '55741ecc1bbd96505f1b112e04ef7477.jpg', 'uploads/product/55741ecc1bbd96505f1b112e04ef7477.jpg', '2021-09-18 23:17:52', '2021-09-18 23:17:52'),
(140, 53, 'a524d71e9c1d2a2e72dbb6cd5b7de6b5.jpg', 'uploads/product/a524d71e9c1d2a2e72dbb6cd5b7de6b5.jpg', '2021-09-18 23:18:37', '2021-09-18 23:18:37'),
(141, 53, '1917462c7ca2502531d473c3a4ee2be1.jpg', 'uploads/product/1917462c7ca2502531d473c3a4ee2be1.jpg', '2021-09-18 23:18:38', '2021-09-18 23:18:38'),
(142, 53, 'bde4ccbd9500ee8a086d668a8f33060e.jpg', 'uploads/product/bde4ccbd9500ee8a086d668a8f33060e.jpg', '2021-09-18 23:18:38', '2021-09-18 23:18:38'),
(143, 54, '96757de96d1d88d950d2d87af5876b4b.jpg', 'uploads/product/96757de96d1d88d950d2d87af5876b4b.jpg', '2021-09-18 23:20:17', '2021-09-18 23:20:17'),
(144, 54, '6ffbc224f5ed75690a3d1ec00cf90d02.jpg', 'uploads/product/6ffbc224f5ed75690a3d1ec00cf90d02.jpg', '2021-09-18 23:20:17', '2021-09-18 23:20:17'),
(145, 54, 'ae3729478895189a981fbb671a4053a3.jpg', 'uploads/product/ae3729478895189a981fbb671a4053a3.jpg', '2021-09-18 23:20:17', '2021-09-18 23:20:17'),
(146, 55, '89849eae82f03f10fcb991ac51ebcf54.jpg', 'uploads/product/89849eae82f03f10fcb991ac51ebcf54.jpg', '2021-09-18 23:20:35', '2021-09-18 23:20:35'),
(147, 55, '579083da07b1a97292c803cd05cbff86.jpg', 'uploads/product/579083da07b1a97292c803cd05cbff86.jpg', '2021-09-18 23:20:35', '2021-09-18 23:20:35'),
(148, 56, '860bd15dd2c8479cf515903bc5c0258a.jpg', 'uploads/product/860bd15dd2c8479cf515903bc5c0258a.jpg', '2021-09-18 23:20:59', '2021-09-18 23:20:59'),
(149, 56, '08f1aadb95f1aeea1da17c5bd20a2f65.jpg', 'uploads/product/08f1aadb95f1aeea1da17c5bd20a2f65.jpg', '2021-09-18 23:20:59', '2021-09-18 23:20:59'),
(150, 56, '692c28ac69054b2634f5f5ff9a591cb6.jpg', 'uploads/product/692c28ac69054b2634f5f5ff9a591cb6.jpg', '2021-09-18 23:20:59', '2021-09-18 23:20:59'),
(151, 57, 'c6002abfd0e094c2f926d817e44d8a4a.jpg', 'uploads/product/c6002abfd0e094c2f926d817e44d8a4a.jpg', '2021-09-18 23:21:40', '2021-09-18 23:21:40'),
(152, 57, '589042eb46d510d9354ab0dc53f26409.jpg', 'uploads/product/589042eb46d510d9354ab0dc53f26409.jpg', '2021-09-18 23:21:40', '2021-09-18 23:21:40'),
(153, 57, '56c2eb05a84e96c0efb5252333398fbd.jpg', 'uploads/product/56c2eb05a84e96c0efb5252333398fbd.jpg', '2021-09-18 23:21:40', '2021-09-18 23:21:40'),
(154, 59, '5e5c0885013c12ed24698f5d6cbb41f4.jpg', 'uploads/product/5e5c0885013c12ed24698f5d6cbb41f4.jpg', '2021-09-18 23:23:17', '2021-09-18 23:23:17'),
(155, 59, 'c51dcac445e27e5e247c3064f058ed45.jpg', 'uploads/product/c51dcac445e27e5e247c3064f058ed45.jpg', '2021-09-18 23:23:17', '2021-09-18 23:23:17'),
(156, 60, 'cf1867845fcd6900db57ba888981c50a.jpg', 'uploads/product/cf1867845fcd6900db57ba888981c50a.jpg', '2021-09-18 23:23:30', '2021-09-18 23:23:30'),
(157, 60, 'be1c3f4392ddfd85d29cf77911caf53c.jpg', 'uploads/product/be1c3f4392ddfd85d29cf77911caf53c.jpg', '2021-09-18 23:23:30', '2021-09-18 23:23:30'),
(158, 61, '9e4191de6c7e5472b08f8892427f3dc3.jpg', 'uploads/product/9e4191de6c7e5472b08f8892427f3dc3.jpg', '2021-09-18 23:23:32', '2021-09-18 23:23:32'),
(159, 61, '43224c231f62ba9aef72a719f790aa8c.png', 'uploads/product/43224c231f62ba9aef72a719f790aa8c.png', '2021-09-18 23:23:32', '2021-09-18 23:23:32'),
(160, 62, '7464a79532b7797fea96d270c40fea88.jpg', 'uploads/product/7464a79532b7797fea96d270c40fea88.jpg', '2021-09-18 23:23:51', '2021-09-18 23:23:51'),
(161, 62, '024bb3288ca5973657048072620dad22.webp', 'uploads/product/024bb3288ca5973657048072620dad22.webp', '2021-09-18 23:23:51', '2021-09-18 23:23:51'),
(162, 63, 'a949b7b6873bcb0544e7e2c7bac2d65b.jpg', 'uploads/product/a949b7b6873bcb0544e7e2c7bac2d65b.jpg', '2021-09-18 23:25:19', '2021-09-18 23:25:19'),
(163, 63, 'efaabaebca1245e37e9ba2833317f4c5.jpg', 'uploads/product/efaabaebca1245e37e9ba2833317f4c5.jpg', '2021-09-18 23:25:19', '2021-09-18 23:25:19'),
(164, 63, '73d72891904fb038375c80135e885ad5.webp', 'uploads/product/73d72891904fb038375c80135e885ad5.webp', '2021-09-18 23:25:19', '2021-09-18 23:25:19'),
(165, 64, 'ce16152a62d52e0aac9c5cbf9650793b.jpg', 'uploads/product/ce16152a62d52e0aac9c5cbf9650793b.jpg', '2021-09-18 23:25:36', '2021-09-18 23:25:36'),
(166, 64, '81dd4457800790f477f4b3be5f151a49.jpg', 'uploads/product/81dd4457800790f477f4b3be5f151a49.jpg', '2021-09-18 23:25:36', '2021-09-18 23:25:36'),
(167, 64, '255857f768f30242a443744ea744cf3a.jpg', 'uploads/product/255857f768f30242a443744ea744cf3a.jpg', '2021-09-18 23:25:36', '2021-09-18 23:25:36'),
(168, 65, 'd48e73b24d1b12b44a816a3a810ca680.jpg', 'uploads/product/d48e73b24d1b12b44a816a3a810ca680.jpg', '2021-09-18 23:26:13', '2021-09-18 23:26:13'),
(169, 65, '0a3df27197ef5ce279ed84ec29d89434.jpg', 'uploads/product/0a3df27197ef5ce279ed84ec29d89434.jpg', '2021-09-18 23:26:13', '2021-09-18 23:26:13'),
(170, 66, 'f7507551a97b4655f51ddd5f2ab90869.jpg', 'uploads/product/f7507551a97b4655f51ddd5f2ab90869.jpg', '2021-09-18 23:26:59', '2021-09-18 23:26:59'),
(171, 66, '91168d3946f04ae5b3420434d0cafeeb.jpg', 'uploads/product/91168d3946f04ae5b3420434d0cafeeb.jpg', '2021-09-18 23:26:59', '2021-09-18 23:26:59'),
(172, 67, 'd233fb20d8b31c4f2c48e2afdce5acbd.jpg', 'uploads/product/d233fb20d8b31c4f2c48e2afdce5acbd.jpg', '2021-09-18 23:27:59', '2021-09-18 23:27:59'),
(173, 67, 'b9fd3c88efcfd5404534849752cc7e19.jpg', 'uploads/product/b9fd3c88efcfd5404534849752cc7e19.jpg', '2021-09-18 23:27:59', '2021-09-18 23:27:59'),
(176, 69, 'b72b9580b781872f0b18b8c58f78bfa1.jpg', 'uploads/product/b72b9580b781872f0b18b8c58f78bfa1.jpg', '2021-09-18 23:30:23', '2021-09-18 23:30:23'),
(177, 69, '0b7d82787752a082ac354b32dbe9a2ba.jpg', 'uploads/product/0b7d82787752a082ac354b32dbe9a2ba.jpg', '2021-09-18 23:30:24', '2021-09-18 23:30:24'),
(178, 70, '8c987895e21ddf84d70186b4beccae41.jpg', 'uploads/product/8c987895e21ddf84d70186b4beccae41.jpg', '2021-09-18 23:31:01', '2021-09-18 23:31:01'),
(179, 70, '628233d81c640a009886b2519485608f.jpg', 'uploads/product/628233d81c640a009886b2519485608f.jpg', '2021-09-18 23:31:01', '2021-09-18 23:31:01'),
(180, 71, '53279a5b97c3f67e860872e5140b1431.jpg', 'uploads/product/53279a5b97c3f67e860872e5140b1431.jpg', '2021-09-18 23:32:16', '2021-09-18 23:32:16'),
(181, 71, '9715b119f71639a5110a837004de1298.jpg', 'uploads/product/9715b119f71639a5110a837004de1298.jpg', '2021-09-18 23:32:16', '2021-09-18 23:32:16'),
(182, 71, '3c4cd46fde4799361fda4de46660aa8b.jpg', 'uploads/product/3c4cd46fde4799361fda4de46660aa8b.jpg', '2021-09-18 23:32:16', '2021-09-18 23:32:16'),
(185, 73, '6fa5c425148638392e748a3c11e14e1d.jpg', 'uploads/product/6fa5c425148638392e748a3c11e14e1d.jpg', '2021-09-18 23:35:46', '2021-09-18 23:35:46'),
(186, 73, '7cce798c1427f47661770c877b9a617e.jpg', 'uploads/product/7cce798c1427f47661770c877b9a617e.jpg', '2021-09-18 23:35:46', '2021-09-18 23:35:46'),
(187, 73, 'c756df8acde7fc7c3a0a2c494ffffda3.jpg', 'uploads/product/c756df8acde7fc7c3a0a2c494ffffda3.jpg', '2021-09-18 23:35:46', '2021-09-18 23:35:46'),
(188, 74, '25c01ab04a2637c8f8dafe359d98f517.jpg', 'uploads/product/25c01ab04a2637c8f8dafe359d98f517.jpg', '2021-09-18 23:36:09', '2021-09-18 23:36:09'),
(189, 74, 'ff399bcd1070d4783678c01c817a6ac5.jpg', 'uploads/product/ff399bcd1070d4783678c01c817a6ac5.jpg', '2021-09-18 23:36:09', '2021-09-18 23:36:09'),
(190, 75, '89db4b6ed588c8c97c5e3e70fd3beb7a.jpg', 'uploads/product/89db4b6ed588c8c97c5e3e70fd3beb7a.jpg', '2021-09-18 23:36:34', '2021-09-18 23:36:34'),
(191, 75, '03ac9f55ad0ad98ffd5337f12ddc6a14.jpg', 'uploads/product/03ac9f55ad0ad98ffd5337f12ddc6a14.jpg', '2021-09-18 23:36:34', '2021-09-18 23:36:34'),
(192, 75, '51a0859f0aeb26a47f30e6e41b664b0f.jpg', 'uploads/product/51a0859f0aeb26a47f30e6e41b664b0f.jpg', '2021-09-18 23:36:34', '2021-09-18 23:36:34'),
(199, 78, 'de1c2c6e791065c60498e71d451ec134.jpg', 'uploads/product/de1c2c6e791065c60498e71d451ec134.jpg', '2021-09-18 23:40:29', '2021-09-18 23:40:29'),
(200, 78, '0de13ffcb2178870eee0dad5be840005.jpg', 'uploads/product/0de13ffcb2178870eee0dad5be840005.jpg', '2021-09-18 23:40:29', '2021-09-18 23:40:29'),
(201, 78, '3dc2e8b55202370ec77e49be94e3e6d1.jpg', 'uploads/product/3dc2e8b55202370ec77e49be94e3e6d1.jpg', '2021-09-18 23:40:29', '2021-09-18 23:40:29'),
(204, 76, 'bea8df9963c0f04936c19dd6fbce5741.jpg', 'uploads/product/bea8df9963c0f04936c19dd6fbce5741.jpg', '2021-09-18 23:42:41', '2021-09-18 23:42:41'),
(205, 76, '0673e84a49209ac0ca898b59c0b03274.jpg', 'uploads/product/0673e84a49209ac0ca898b59c0b03274.jpg', '2021-09-18 23:42:41', '2021-09-18 23:42:41'),
(206, 76, '01612ca3fdb735abf1e7486301abe53c.jpg', 'uploads/product/01612ca3fdb735abf1e7486301abe53c.jpg', '2021-09-18 23:42:41', '2021-09-18 23:42:41'),
(207, 77, '54055dd159ea0a8d7edebb5de5f483cc.jpg', 'uploads/product/54055dd159ea0a8d7edebb5de5f483cc.jpg', '2021-09-18 23:43:23', '2021-09-18 23:43:23'),
(208, 77, 'c4f6f677163d162e133698f7aaec12e6.jpg', 'uploads/product/c4f6f677163d162e133698f7aaec12e6.jpg', '2021-09-18 23:43:23', '2021-09-18 23:43:23'),
(209, 77, '736685512e879b0e2d84934e5c94333d.jpg', 'uploads/product/736685512e879b0e2d84934e5c94333d.jpg', '2021-09-18 23:43:23', '2021-09-18 23:43:23'),
(210, 80, 'bdb13530393058b6d54bd8d5f7d62378.jpg', 'uploads/product/bdb13530393058b6d54bd8d5f7d62378.jpg', '2021-09-18 23:43:54', '2021-09-18 23:43:54'),
(211, 80, '212a43dcf2ed63957a2b5befcede0e59.jpg', 'uploads/product/212a43dcf2ed63957a2b5befcede0e59.jpg', '2021-09-18 23:43:54', '2021-09-18 23:43:54'),
(212, 81, 'd2071a5214d436e95a0db94fc564c13b.jpg', 'uploads/product/d2071a5214d436e95a0db94fc564c13b.jpg', '2021-09-18 23:44:05', '2021-09-18 23:44:05'),
(213, 81, '6c66872978108535198f46058d7e20c7.jpg', 'uploads/product/6c66872978108535198f46058d7e20c7.jpg', '2021-09-18 23:44:05', '2021-09-18 23:44:05'),
(214, 81, 'dc890a0f7eadc1e8820e9f3edbd5e18c.jpg', 'uploads/product/dc890a0f7eadc1e8820e9f3edbd5e18c.jpg', '2021-09-18 23:44:05', '2021-09-18 23:44:05'),
(217, 83, '13cfc18ca2ce58fbffb15933b1c6649c.jpg', 'uploads/product/13cfc18ca2ce58fbffb15933b1c6649c.jpg', '2021-09-18 23:53:29', '2021-09-18 23:53:29'),
(218, 83, '06991d8cf7dd79589c9c1950e7202abb.jpg', 'uploads/product/06991d8cf7dd79589c9c1950e7202abb.jpg', '2021-09-18 23:53:29', '2021-09-18 23:53:29'),
(219, 83, '9a911066daaafd2445f1a3610c8c2832.jpg', 'uploads/product/9a911066daaafd2445f1a3610c8c2832.jpg', '2021-09-18 23:53:29', '2021-09-18 23:53:29'),
(222, 85, 'd58584b6dd2043c10aeb019a3eab4835.jpg', 'uploads/product/d58584b6dd2043c10aeb019a3eab4835.jpg', '2021-09-18 23:55:57', '2021-09-18 23:55:57'),
(223, 85, 'a38191b7b05418c9b85763620a1184f6.jpg', 'uploads/product/a38191b7b05418c9b85763620a1184f6.jpg', '2021-09-18 23:55:57', '2021-09-18 23:55:57'),
(224, 85, 'b0203a9f00a088d743be11a213b8578f.jpg', 'uploads/product/b0203a9f00a088d743be11a213b8578f.jpg', '2021-09-18 23:55:57', '2021-09-18 23:55:57'),
(225, 5, 'a79a96b656244dabc32b0dda2004fef7.jpg', 'uploads/product/a79a96b656244dabc32b0dda2004fef7.jpg', '2021-09-18 23:56:56', '2021-09-18 23:56:56'),
(226, 5, 'ba6e9704bcd45cb631d5662ecb3e0da5.jpg', 'uploads/product/ba6e9704bcd45cb631d5662ecb3e0da5.jpg', '2021-09-18 23:56:56', '2021-09-18 23:56:56'),
(227, 86, '837ceed235cc4ec04a235aebe66643aa.jpg', 'uploads/product/837ceed235cc4ec04a235aebe66643aa.jpg', '2021-09-18 23:57:44', '2021-09-18 23:57:44'),
(228, 86, '87f7a20962e8f2e79f7faa46da095619.jpg', 'uploads/product/87f7a20962e8f2e79f7faa46da095619.jpg', '2021-09-18 23:57:44', '2021-09-18 23:57:44'),
(229, 86, '91c98fe7e7ce374ee1ca26e6a8e4df7f.jpg', 'uploads/product/91c98fe7e7ce374ee1ca26e6a8e4df7f.jpg', '2021-09-18 23:57:44', '2021-09-18 23:57:44'),
(230, 87, 'f5b8decdf3dd3ad8509c5de159936536.jpg', 'uploads/product/f5b8decdf3dd3ad8509c5de159936536.jpg', '2021-09-19 00:00:39', '2021-09-19 00:00:39'),
(231, 87, 'deef8c6383de46c567075630bed591c3.jpg', 'uploads/product/deef8c6383de46c567075630bed591c3.jpg', '2021-09-19 00:00:39', '2021-09-19 00:00:39'),
(232, 88, 'e9aa0d17ce9cf5c07ea62aa6af54cdce.jpg', 'uploads/product/e9aa0d17ce9cf5c07ea62aa6af54cdce.jpg', '2021-09-19 00:00:47', '2021-09-19 00:00:47'),
(233, 88, '8e82d27c3e029ccb7413b64eefd55f70.jpg', 'uploads/product/8e82d27c3e029ccb7413b64eefd55f70.jpg', '2021-09-19 00:00:47', '2021-09-19 00:00:47'),
(234, 88, 'fd425c984d9e40048293c11e1e344467.jpg', 'uploads/product/fd425c984d9e40048293c11e1e344467.jpg', '2021-09-19 00:00:48', '2021-09-19 00:00:48'),
(235, 89, '53eb2fde444aeada6e35ecd77587952f.jpg', 'uploads/product/53eb2fde444aeada6e35ecd77587952f.jpg', '2021-09-19 00:01:19', '2021-09-19 00:01:19'),
(236, 89, 'de2582f07ae99d0201920f95f0c0dd95.jpg', 'uploads/product/de2582f07ae99d0201920f95f0c0dd95.jpg', '2021-09-19 00:01:19', '2021-09-19 00:01:19'),
(237, 90, '5810d12d8e2cb56e302cf7deb95a0066.jpg', 'uploads/product/5810d12d8e2cb56e302cf7deb95a0066.jpg', '2021-09-19 00:03:45', '2021-09-19 00:03:45'),
(238, 90, '1c1cb46f793a2974e21ea51bc7825c74.jpg', 'uploads/product/1c1cb46f793a2974e21ea51bc7825c74.jpg', '2021-09-19 00:03:45', '2021-09-19 00:03:45'),
(239, 91, '03348760dfb6e4aae4da13ef9a6dd9df.jpg', 'uploads/product/03348760dfb6e4aae4da13ef9a6dd9df.jpg', '2021-09-19 00:04:41', '2021-09-19 00:04:41'),
(240, 91, 'a7da4437414c4d604a3fcc133a9b50d9.jpg', 'uploads/product/a7da4437414c4d604a3fcc133a9b50d9.jpg', '2021-09-19 00:04:41', '2021-09-19 00:04:41'),
(241, 91, '93fbd78ab42e6244c906342f85f54e8e.jpg', 'uploads/product/93fbd78ab42e6244c906342f85f54e8e.jpg', '2021-09-19 00:04:41', '2021-09-19 00:04:41'),
(245, 93, '37f40da55efc7999c78a04aa92dc5283.jpg', 'uploads/product/37f40da55efc7999c78a04aa92dc5283.jpg', '2021-09-19 00:05:56', '2021-09-19 00:05:56'),
(246, 93, '0849146681b612026099839d157ef8a4.jpg', 'uploads/product/0849146681b612026099839d157ef8a4.jpg', '2021-09-19 00:05:56', '2021-09-19 00:05:56'),
(247, 93, 'e159243f0aa7b192fafee5460d61672d.jpg', 'uploads/product/e159243f0aa7b192fafee5460d61672d.jpg', '2021-09-19 00:05:57', '2021-09-19 00:05:57'),
(248, 94, '04591e2d6db470e337b50aa3689d2c43.jpg', 'uploads/product/04591e2d6db470e337b50aa3689d2c43.jpg', '2021-09-19 00:08:12', '2021-09-19 00:08:12'),
(249, 94, '4504b1a6f33c1fa092146ce16669f6fa.jpg', 'uploads/product/4504b1a6f33c1fa092146ce16669f6fa.jpg', '2021-09-19 00:08:12', '2021-09-19 00:08:12'),
(250, 94, 'c2ed340c2436e218098b341d3cb8f95b.jpg', 'uploads/product/c2ed340c2436e218098b341d3cb8f95b.jpg', '2021-09-19 00:08:12', '2021-09-19 00:08:12'),
(251, 95, '919e2e144511a5f6289fc9ab8bbf8371.jpg', 'uploads/product/919e2e144511a5f6289fc9ab8bbf8371.jpg', '2021-09-19 00:08:57', '2021-09-19 00:08:57'),
(252, 95, '68682f2c2a394f450aad1aaedc7a61a0.jpg', 'uploads/product/68682f2c2a394f450aad1aaedc7a61a0.jpg', '2021-09-19 00:08:58', '2021-09-19 00:08:58'),
(253, 96, '87162f599a3963da2c8cc1a877b897ac.jpg', 'uploads/product/87162f599a3963da2c8cc1a877b897ac.jpg', '2021-09-19 00:09:12', '2021-09-19 00:09:12'),
(254, 96, '6696ff3020f671fad8bfb4b96d7e98fd.jpg', 'uploads/product/6696ff3020f671fad8bfb4b96d7e98fd.jpg', '2021-09-19 00:09:12', '2021-09-19 00:09:12'),
(255, 96, '37f83831c7099e19375f53a14519659d.jpg', 'uploads/product/37f83831c7099e19375f53a14519659d.jpg', '2021-09-19 00:09:12', '2021-09-19 00:09:12'),
(256, 97, 'abfe73322d7d3897286bba27f057a279.jpg', 'uploads/product/abfe73322d7d3897286bba27f057a279.jpg', '2021-09-19 00:10:28', '2021-09-19 00:10:28'),
(257, 97, 'c24d6ddc4b510a9f7715101d4f23dc49.jpg', 'uploads/product/c24d6ddc4b510a9f7715101d4f23dc49.jpg', '2021-09-19 00:10:28', '2021-09-19 00:10:28'),
(258, 10, 'd45f2f9c59524e64c89a499b8e03de96.jpg', 'uploads/product/d45f2f9c59524e64c89a499b8e03de96.jpg', '2021-09-19 00:11:01', '2021-09-19 00:11:01'),
(259, 10, '2690607a5eaa94f7c3227a29917c155b.jpg', 'uploads/product/2690607a5eaa94f7c3227a29917c155b.jpg', '2021-09-19 00:11:01', '2021-09-19 00:11:01'),
(260, 10, 'a8d64be934227b91792fe5d00600f8e8.jpg', 'uploads/product/a8d64be934227b91792fe5d00600f8e8.jpg', '2021-09-19 00:11:01', '2021-09-19 00:11:01'),
(261, 26, '088743fccb41056985a3419a36685e1b.jpg', 'uploads/product/088743fccb41056985a3419a36685e1b.jpg', '2021-09-19 00:11:25', '2021-09-19 00:11:25'),
(262, 26, '7edc5e659eec39cf6f9b65ff2791f800.jpg', 'uploads/product/7edc5e659eec39cf6f9b65ff2791f800.jpg', '2021-09-19 00:11:25', '2021-09-19 00:11:25'),
(263, 26, '195232dd20b2befd47f7710f785e767a.jpg', 'uploads/product/195232dd20b2befd47f7710f785e767a.jpg', '2021-09-19 00:11:25', '2021-09-19 00:11:25'),
(264, 98, '1a3fb05f3590559698b391d1b2409df5.jpg', 'uploads/product/1a3fb05f3590559698b391d1b2409df5.jpg', '2021-09-19 00:11:46', '2021-09-19 00:11:46'),
(265, 98, '93cb351edeb4efac037df64dd04eb629.jpg', 'uploads/product/93cb351edeb4efac037df64dd04eb629.jpg', '2021-09-19 00:11:46', '2021-09-19 00:11:46'),
(266, 82, 'd292a14292c70df412a62ae42105f3b6.jpg', 'uploads/product/d292a14292c70df412a62ae42105f3b6.jpg', '2021-09-19 00:12:11', '2021-09-19 00:12:11'),
(267, 82, '7471214736310789e563851bad280b85.jpg', 'uploads/product/7471214736310789e563851bad280b85.jpg', '2021-09-19 00:12:11', '2021-09-19 00:12:11'),
(268, 82, '3b5628f7f61ea354c706ce915c3bc81f.jpg', 'uploads/product/3b5628f7f61ea354c706ce915c3bc81f.jpg', '2021-09-19 00:12:11', '2021-09-19 00:12:11'),
(269, 92, '70a1ddbebb749b7239f15b5c051c1b75.jpg', 'uploads/product/70a1ddbebb749b7239f15b5c051c1b75.jpg', '2021-09-19 00:12:29', '2021-09-19 00:12:29'),
(270, 92, 'a4f9349d463e5f9aa13af3154596d4eb.jpg', 'uploads/product/a4f9349d463e5f9aa13af3154596d4eb.jpg', '2021-09-19 00:12:29', '2021-09-19 00:12:29'),
(271, 92, '56c29411bd45ad095cf4f367dbcbdb7d.jpg', 'uploads/product/56c29411bd45ad095cf4f367dbcbdb7d.jpg', '2021-09-19 00:12:29', '2021-09-19 00:12:29'),
(272, 22, '65fa62b7b363d78ab9720a6a58650a53.png', 'uploads/product/65fa62b7b363d78ab9720a6a58650a53.png', '2021-09-19 00:12:31', '2021-09-19 00:12:31'),
(273, 22, '07939a7d1f9c812dee74837cc904e05e.jpg', 'uploads/product/07939a7d1f9c812dee74837cc904e05e.jpg', '2021-09-19 00:12:31', '2021-09-19 00:12:31'),
(274, 22, '26dbec3142cb46d81040f821c18e6a1b.png', 'uploads/product/26dbec3142cb46d81040f821c18e6a1b.png', '2021-09-19 00:12:31', '2021-09-19 00:12:31'),
(275, 99, 'fe45ecabd6ee4b798dd4f0917da19bc3.jpg', 'uploads/product/fe45ecabd6ee4b798dd4f0917da19bc3.jpg', '2021-09-19 00:12:43', '2021-09-19 00:12:43'),
(276, 99, 'd8094d12135078af048288ae11f019f3.jpg', 'uploads/product/d8094d12135078af048288ae11f019f3.jpg', '2021-09-19 00:12:43', '2021-09-19 00:12:43'),
(277, 99, '0efdde57f478bbb3700d1b0165d12efe.jpg', 'uploads/product/0efdde57f478bbb3700d1b0165d12efe.jpg', '2021-09-19 00:12:43', '2021-09-19 00:12:43'),
(278, 72, '0a35b35477b7a63f67575e60b22adbd8.jpg', 'uploads/product/0a35b35477b7a63f67575e60b22adbd8.jpg', '2021-09-19 00:13:11', '2021-09-19 00:13:11'),
(279, 72, '53fed0bbb7520a436e8cdede4ca94b0e.jpg', 'uploads/product/53fed0bbb7520a436e8cdede4ca94b0e.jpg', '2021-09-19 00:13:12', '2021-09-19 00:13:12'),
(280, 72, 'b6d7051a90d18e400c6af0ff28f56d50.jpg', 'uploads/product/b6d7051a90d18e400c6af0ff28f56d50.jpg', '2021-09-19 00:13:12', '2021-09-19 00:13:12'),
(281, 84, '1c7a947e34c6ef3c104f4cd7813a095f.jpg', 'uploads/product/1c7a947e34c6ef3c104f4cd7813a095f.jpg', '2021-09-19 00:13:32', '2021-09-19 00:13:32'),
(282, 100, 'a9b4b2d9721ac39e908d8021e3707ba0.jpg', 'uploads/product/a9b4b2d9721ac39e908d8021e3707ba0.jpg', '2021-09-19 00:13:32', '2021-09-19 00:13:32'),
(283, 84, '8f0ce656d2133afdd465caa7fea43da0.jpg', 'uploads/product/8f0ce656d2133afdd465caa7fea43da0.jpg', '2021-09-19 00:13:32', '2021-09-19 00:13:32'),
(284, 100, '1b0e89587e249b32f935e86800f20cb1.jpg', 'uploads/product/1b0e89587e249b32f935e86800f20cb1.jpg', '2021-09-19 00:13:32', '2021-09-19 00:13:32'),
(285, 84, '71c74708679b4b9fd094e99402631d73.jpg', 'uploads/product/71c74708679b4b9fd094e99402631d73.jpg', '2021-09-19 00:13:32', '2021-09-19 00:13:32'),
(286, 100, '9fe10252b072a5f726f1bb02d3318520.jpg', 'uploads/product/9fe10252b072a5f726f1bb02d3318520.jpg', '2021-09-19 00:13:32', '2021-09-19 00:13:32'),
(287, 41, '2e623accb82d012032d7755adc210a71.jpg', 'uploads/product/2e623accb82d012032d7755adc210a71.jpg', '2021-09-19 00:14:12', '2021-09-19 00:14:12'),
(288, 41, 'be13946d8c17ac802e05b6cc6498b763.jpg', 'uploads/product/be13946d8c17ac802e05b6cc6498b763.jpg', '2021-09-19 00:14:12', '2021-09-19 00:14:12'),
(289, 41, 'b84d42b33e585af3403ad8c009bf6f33.jpg', 'uploads/product/b84d42b33e585af3403ad8c009bf6f33.jpg', '2021-09-19 00:14:12', '2021-09-19 00:14:12'),
(290, 79, '7f14826872af7a20341705c57905eeff.jpg', 'uploads/product/7f14826872af7a20341705c57905eeff.jpg', '2021-09-19 00:14:27', '2021-09-19 00:14:27'),
(291, 79, '1184fd855732202bf444c497e039fbf2.jpg', 'uploads/product/1184fd855732202bf444c497e039fbf2.jpg', '2021-09-19 00:14:27', '2021-09-19 00:14:27'),
(292, 79, '4f36062100bb522216b6b6a9bba639be.jpg', 'uploads/product/4f36062100bb522216b6b6a9bba639be.jpg', '2021-09-19 00:14:28', '2021-09-19 00:14:28'),
(293, 38, 'f0edae82819c081e04d671a1a3d778ea.jpg', 'uploads/product/f0edae82819c081e04d671a1a3d778ea.jpg', '2021-09-19 00:14:41', '2021-09-19 00:14:41'),
(294, 38, 'ba90cedbd534ff86218826328f42c34c.jpg', 'uploads/product/ba90cedbd534ff86218826328f42c34c.jpg', '2021-09-19 00:14:41', '2021-09-19 00:14:41'),
(295, 38, '40420b432bb6a9e4875eee4415e679d0.jpg', 'uploads/product/40420b432bb6a9e4875eee4415e679d0.jpg', '2021-09-19 00:14:42', '2021-09-19 00:14:42'),
(296, 68, '545765713a5480bae3b4015f4f1fdcd0.jpg', 'uploads/product/545765713a5480bae3b4015f4f1fdcd0.jpg', '2021-09-19 00:14:58', '2021-09-19 00:14:58'),
(297, 68, '01234b5b5779f3aaf5523935e6da8559.jpg', 'uploads/product/01234b5b5779f3aaf5523935e6da8559.jpg', '2021-09-19 00:14:58', '2021-09-19 00:14:58'),
(298, 68, '4eac6b4e78c3028abee43b57d63b2e28.jpg', 'uploads/product/4eac6b4e78c3028abee43b57d63b2e28.jpg', '2021-09-19 00:14:59', '2021-09-19 00:14:59'),
(299, 101, '2f4182b5cf67fd671d4caeb6504f6b7e.jpg', 'uploads/product/2f4182b5cf67fd671d4caeb6504f6b7e.jpg', '2021-09-19 00:15:04', '2021-09-19 00:15:04'),
(300, 101, '1f0c5918494c66b669caf53bafb6c95a.jpg', 'uploads/product/1f0c5918494c66b669caf53bafb6c95a.jpg', '2021-09-19 00:15:04', '2021-09-19 00:15:04'),
(301, 101, 'ffa2276734ef3b8abecd0ea72fc499ca.jpg', 'uploads/product/ffa2276734ef3b8abecd0ea72fc499ca.jpg', '2021-09-19 00:15:04', '2021-09-19 00:15:04'),
(302, 102, 'f4f080e8c3fc46404c73578a64ef7dee.jpg', 'uploads/product/f4f080e8c3fc46404c73578a64ef7dee.jpg', '2021-09-19 00:15:53', '2021-09-19 00:15:53'),
(303, 102, '6e0d95b0b09ad2ca1cf30fd7726f95b7.jpg', 'uploads/product/6e0d95b0b09ad2ca1cf30fd7726f95b7.jpg', '2021-09-19 00:15:53', '2021-09-19 00:15:53'),
(304, 102, 'a0da41f5fb84d9059ed1794b1ea73d37.jpg', 'uploads/product/a0da41f5fb84d9059ed1794b1ea73d37.jpg', '2021-09-19 00:15:53', '2021-09-19 00:15:53'),
(305, 104, '89f4efc16d5d1a69bc65b08133ee16d6.jpg', 'uploads/product/89f4efc16d5d1a69bc65b08133ee16d6.jpg', '2021-09-19 00:16:36', '2021-09-19 00:16:36'),
(306, 104, '31c7ce1c971f2cc8520ccd69d1339646.jpg', 'uploads/product/31c7ce1c971f2cc8520ccd69d1339646.jpg', '2021-09-19 00:16:36', '2021-09-19 00:16:36'),
(307, 104, '59764ba3e3348fd667e34b535b14748f.jpg', 'uploads/product/59764ba3e3348fd667e34b535b14748f.jpg', '2021-09-19 00:16:36', '2021-09-19 00:16:36'),
(308, 105, 'ec5d87d3180f52c503e5405b552b0e02.jpg', 'uploads/product/ec5d87d3180f52c503e5405b552b0e02.jpg', '2021-09-19 00:16:44', '2021-09-19 00:16:44'),
(309, 105, '906308468bb7b20d7a520327c9b3a2a0.jpg', 'uploads/product/906308468bb7b20d7a520327c9b3a2a0.jpg', '2021-09-19 00:16:44', '2021-09-19 00:16:44'),
(310, 105, 'c92f750330517b1bbdfbfb566a3e8b00.jpg', 'uploads/product/c92f750330517b1bbdfbfb566a3e8b00.jpg', '2021-09-19 00:16:44', '2021-09-19 00:16:44'),
(311, 106, '148c6b32e6b8271889c382f4afa32809.jpg', 'uploads/product/148c6b32e6b8271889c382f4afa32809.jpg', '2021-09-19 00:18:00', '2021-09-19 00:18:00'),
(312, 106, '535fdaae90ac8a441e433f4c434449ac.jpg', 'uploads/product/535fdaae90ac8a441e433f4c434449ac.jpg', '2021-09-19 00:18:00', '2021-09-19 00:18:00'),
(313, 106, 'bd169f09d486180e65a146f8540ec60c.jpg', 'uploads/product/bd169f09d486180e65a146f8540ec60c.jpg', '2021-09-19 00:18:00', '2021-09-19 00:18:00'),
(314, 107, 'fdd61d817f6106e4a5a1dbb08e05e49c.jpg', 'uploads/product/fdd61d817f6106e4a5a1dbb08e05e49c.jpg', '2021-09-19 00:20:33', '2021-09-19 00:20:33'),
(315, 107, '009c90266715fcfb316deeda3f01c678.jpg', 'uploads/product/009c90266715fcfb316deeda3f01c678.jpg', '2021-09-19 00:20:33', '2021-09-19 00:20:33'),
(316, 108, '28fcb24f5a00d724c10df2a27a221d79.jpg', 'uploads/product/28fcb24f5a00d724c10df2a27a221d79.jpg', '2021-09-19 00:20:37', '2021-09-19 00:20:37'),
(317, 108, '3359ff2ec22ed5f390eaaf31dc23969a.jpg', 'uploads/product/3359ff2ec22ed5f390eaaf31dc23969a.jpg', '2021-09-19 00:20:37', '2021-09-19 00:20:37'),
(318, 108, '090b73808c832f0dbcbfdc075039318e.jpg', 'uploads/product/090b73808c832f0dbcbfdc075039318e.jpg', '2021-09-19 00:20:37', '2021-09-19 00:20:37'),
(319, 108, 'ea4c5047eafdb9696c7a0facc0b4c97e.jpg', 'uploads/product/ea4c5047eafdb9696c7a0facc0b4c97e.jpg', '2021-09-19 00:20:37', '2021-09-19 00:20:37'),
(320, 109, 'fa9a4725a4de3a8871aecca2eaccaf12.jpg', 'uploads/product/fa9a4725a4de3a8871aecca2eaccaf12.jpg', '2021-09-19 00:22:12', '2021-09-19 00:22:12'),
(321, 109, '4d4b7b0d751e13bcbf499940e807f67a.jpg', 'uploads/product/4d4b7b0d751e13bcbf499940e807f67a.jpg', '2021-09-19 00:22:12', '2021-09-19 00:22:12'),
(322, 45, 'edad01905b0df95f4dcc6dea77d4035c.jpg', 'uploads/product/edad01905b0df95f4dcc6dea77d4035c.jpg', '2021-09-19 00:22:35', '2021-09-19 00:22:35'),
(323, 45, '96ba2755981ce3bac3f9f2ff9cfcc756.jpg', 'uploads/product/96ba2755981ce3bac3f9f2ff9cfcc756.jpg', '2021-09-19 00:22:35', '2021-09-19 00:22:35'),
(324, 45, '579b9c909c95028bd92815f9e2e0af7d.jpg', 'uploads/product/579b9c909c95028bd92815f9e2e0af7d.jpg', '2021-09-19 00:22:35', '2021-09-19 00:22:35'),
(325, 110, '64c68b8350966c68fa8c39cacb9feb2b.jpg', 'uploads/product/64c68b8350966c68fa8c39cacb9feb2b.jpg', '2021-09-19 00:22:52', '2021-09-19 00:22:52'),
(326, 110, '46d4ddaf4e034d9cb9561bacb1e37f2e.jpg', 'uploads/product/46d4ddaf4e034d9cb9561bacb1e37f2e.jpg', '2021-09-19 00:22:53', '2021-09-19 00:22:53'),
(327, 110, 'ffef6cd49cbe8ba711e3a06c91336595.jpg', 'uploads/product/ffef6cd49cbe8ba711e3a06c91336595.jpg', '2021-09-19 00:22:53', '2021-09-19 00:22:53'),
(328, 111, 'c2b7d01b388018d5a30d4dc1e2beebdc.jpg', 'uploads/product/c2b7d01b388018d5a30d4dc1e2beebdc.jpg', '2021-09-19 00:23:17', '2021-09-19 00:23:17'),
(329, 111, '3701783d0b19a1a520e492202ab72fdf.jpg', 'uploads/product/3701783d0b19a1a520e492202ab72fdf.jpg', '2021-09-19 00:23:17', '2021-09-19 00:23:17'),
(330, 111, '52d218d165e1eb831b081186a4492318.png', 'uploads/product/52d218d165e1eb831b081186a4492318.png', '2021-09-19 00:23:17', '2021-09-19 00:23:17'),
(331, 112, '573ccc1e9acd19a6420b6ff4c1cecf56.jpg', 'uploads/product/573ccc1e9acd19a6420b6ff4c1cecf56.jpg', '2021-09-19 00:24:13', '2021-09-19 00:24:13'),
(332, 112, '865989d95d438e512d5caa8c1607f888.jpg', 'uploads/product/865989d95d438e512d5caa8c1607f888.jpg', '2021-09-19 00:24:13', '2021-09-19 00:24:13'),
(333, 112, '8bb8358ab3e92dbea17727981c680004.jpg', 'uploads/product/8bb8358ab3e92dbea17727981c680004.jpg', '2021-09-19 00:24:13', '2021-09-19 00:24:13'),
(334, 113, 'c02eb6edade68cda6da9358eb04ef93b.png', 'uploads/product/c02eb6edade68cda6da9358eb04ef93b.png', '2021-09-19 00:24:13', '2021-09-19 00:24:13'),
(335, 113, '7b44bd942a208247d62600cceeeba3c0.jpg', 'uploads/product/7b44bd942a208247d62600cceeeba3c0.jpg', '2021-09-19 00:24:13', '2021-09-19 00:24:13'),
(336, 32, 'a2eefa52542f9b701f06cb4226c90c07.jpg', 'uploads/product/a2eefa52542f9b701f06cb4226c90c07.jpg', '2021-09-19 00:25:15', '2021-09-19 00:25:15'),
(337, 32, '6468f060bcb4af500be8362655dbb89e.jpg', 'uploads/product/6468f060bcb4af500be8362655dbb89e.jpg', '2021-09-19 00:25:15', '2021-09-19 00:25:15'),
(338, 32, '15bc2d5e083980a8dedf16f59b94ac44.jpg', 'uploads/product/15bc2d5e083980a8dedf16f59b94ac44.jpg', '2021-09-19 00:25:15', '2021-09-19 00:25:15'),
(339, 15, 'a23df9b29109c3662e8b060dddca85e3.jpg', 'uploads/product/a23df9b29109c3662e8b060dddca85e3.jpg', '2021-09-19 00:26:43', '2021-09-19 00:26:43'),
(340, 15, '7d7607889c11e7e0f2d56d28a03fbdf9.jpg', 'uploads/product/7d7607889c11e7e0f2d56d28a03fbdf9.jpg', '2021-09-19 00:26:44', '2021-09-19 00:26:44'),
(341, 15, 'c0ee486b812d791765ef44325d349e3b.jpg', 'uploads/product/c0ee486b812d791765ef44325d349e3b.jpg', '2021-09-19 00:26:44', '2021-09-19 00:26:44'),
(342, 114, '2ca9d097d4eb75d044b7f59bce5cfdae.jpg', 'uploads/product/2ca9d097d4eb75d044b7f59bce5cfdae.jpg', '2021-09-19 00:29:40', '2021-09-19 00:29:40'),
(343, 114, 'f78d2beb77f849606d0f4ee0b2c95f1a.jpg', 'uploads/product/f78d2beb77f849606d0f4ee0b2c95f1a.jpg', '2021-09-19 00:29:40', '2021-09-19 00:29:40'),
(344, 114, '2acda1632124be46bd5dd488655a334c.jpg', 'uploads/product/2acda1632124be46bd5dd488655a334c.jpg', '2021-09-19 00:29:40', '2021-09-19 00:29:40'),
(345, 116, '67c4039e59c6063f58243f53b13366ac.jpg', 'uploads/product/67c4039e59c6063f58243f53b13366ac.jpg', '2021-09-19 00:30:21', '2021-09-19 00:30:21'),
(346, 116, '51a5eabe7f5ba246f9025bf5de427372.jpg', 'uploads/product/51a5eabe7f5ba246f9025bf5de427372.jpg', '2021-09-19 00:30:21', '2021-09-19 00:30:21'),
(347, 116, 'c80c46a5beeef24de4429273173d76da.jpg', 'uploads/product/c80c46a5beeef24de4429273173d76da.jpg', '2021-09-19 00:30:21', '2021-09-19 00:30:21'),
(348, 117, 'abb63ab078570f4564c1d23c88e21e27.jpg', 'uploads/product/abb63ab078570f4564c1d23c88e21e27.jpg', '2021-09-19 00:31:03', '2021-09-19 00:31:03'),
(349, 117, 'feade2cc8643d8b0494ce5112a33d2f3.jpg', 'uploads/product/feade2cc8643d8b0494ce5112a33d2f3.jpg', '2021-09-19 00:31:03', '2021-09-19 00:31:03'),
(350, 117, '5406fb831506cabb48223dc3990b4d37.png', 'uploads/product/5406fb831506cabb48223dc3990b4d37.png', '2021-09-19 00:31:03', '2021-09-19 00:31:03'),
(351, 118, '68fe4460bd35f8ff2c57378298a66c87.jpg', 'uploads/product/68fe4460bd35f8ff2c57378298a66c87.jpg', '2021-09-19 00:34:28', '2021-09-19 00:34:28'),
(352, 118, 'c52147adfb07c8eced44d7b40f6a4fce.jpg', 'uploads/product/c52147adfb07c8eced44d7b40f6a4fce.jpg', '2021-09-19 00:34:28', '2021-09-19 00:34:28'),
(353, 119, '390414336aba1bd66c90acf2688057d5.jpg', 'uploads/product/390414336aba1bd66c90acf2688057d5.jpg', '2021-09-19 00:38:24', '2021-09-19 00:38:24'),
(354, 119, '07fa607870b8e62858a0abbe7c228de8.jpg', 'uploads/product/07fa607870b8e62858a0abbe7c228de8.jpg', '2021-09-19 00:38:24', '2021-09-19 00:38:24'),
(355, 120, '209999d4b9d1ba172cb3e96ceb18fbc3.jpg', 'uploads/product/209999d4b9d1ba172cb3e96ceb18fbc3.jpg', '2021-09-19 00:41:53', '2021-09-19 00:41:53'),
(356, 120, '44cc8288a6fb4b9edb112ea58a8a8e40.jpg', 'uploads/product/44cc8288a6fb4b9edb112ea58a8a8e40.jpg', '2021-09-19 00:41:53', '2021-09-19 00:41:53'),
(357, 120, '3103d02f14b8065fb2b4f27078aeaa27.jpg', 'uploads/product/3103d02f14b8065fb2b4f27078aeaa27.jpg', '2021-09-19 00:41:53', '2021-09-19 00:41:53'),
(358, 121, 'e27bd3668fcda5942b34d7ac1c9a1275.jpg', 'uploads/product/e27bd3668fcda5942b34d7ac1c9a1275.jpg', '2021-09-19 00:45:44', '2021-09-19 00:45:44'),
(359, 121, '4a3ecd48b719376dfb7f9e951d937b8d.jpg', 'uploads/product/4a3ecd48b719376dfb7f9e951d937b8d.jpg', '2021-09-19 00:45:44', '2021-09-19 00:45:44'),
(360, 122, 'a3aae96f06903cefbdf8696da3da2814.jpg', 'uploads/product/a3aae96f06903cefbdf8696da3da2814.jpg', '2021-09-19 00:49:24', '2021-09-19 00:49:24'),
(361, 122, '56398fed37170bc3a4571637d5630790.jpg', 'uploads/product/56398fed37170bc3a4571637d5630790.jpg', '2021-09-19 00:49:24', '2021-09-19 00:49:24'),
(362, 123, 'bf9e72759c5d3af5595eefd155c29dcd.jpg', 'uploads/product/bf9e72759c5d3af5595eefd155c29dcd.jpg', '2021-09-19 00:58:21', '2021-09-19 00:58:21'),
(363, 123, '21b523062b376828dbba3b3a9ad47a7e.webp', 'uploads/product/21b523062b376828dbba3b3a9ad47a7e.webp', '2021-09-19 00:58:21', '2021-09-19 00:58:21'),
(364, 123, 'cf5905124e580402dc9ef27c29b17fe3.jpg', 'uploads/product/cf5905124e580402dc9ef27c29b17fe3.jpg', '2021-09-19 00:58:21', '2021-09-19 00:58:21'),
(365, 124, '115552b41df897fe7f025d0dfcc27f0c.png', 'uploads/product/115552b41df897fe7f025d0dfcc27f0c.png', '2021-09-19 01:00:18', '2021-09-19 01:00:18'),
(366, 124, '9109493884f8405aa4d9d618e2596902.jpg', 'uploads/product/9109493884f8405aa4d9d618e2596902.jpg', '2021-09-19 01:00:18', '2021-09-19 01:00:18'),
(367, 125, 'b0d4380f7a598203535c2ca05b945e2f.jpg', 'uploads/product/b0d4380f7a598203535c2ca05b945e2f.jpg', '2021-09-19 01:06:16', '2021-09-19 01:06:16'),
(368, 125, 'd1badd10bbc303bcf4291a4b3c64c7d0.jpg', 'uploads/product/d1badd10bbc303bcf4291a4b3c64c7d0.jpg', '2021-09-19 01:06:16', '2021-09-19 01:06:16'),
(369, 126, '97a1b38bd6c68c14efc927a880091c67.jpg', 'uploads/product/97a1b38bd6c68c14efc927a880091c67.jpg', '2021-09-19 01:12:34', '2021-09-19 01:12:34'),
(370, 126, 'b680751584042ceec65d5caac33c5692.jpg', 'uploads/product/b680751584042ceec65d5caac33c5692.jpg', '2021-09-19 01:12:34', '2021-09-19 01:12:34'),
(371, 126, 'df95cc19870721d95436be1347d56d1b.jpg', 'uploads/product/df95cc19870721d95436be1347d56d1b.jpg', '2021-09-19 01:12:34', '2021-09-19 01:12:34'),
(372, 127, '41b40f9336ddcc35dc9b3c7fc41f3e7a.jpg', 'uploads/product/41b40f9336ddcc35dc9b3c7fc41f3e7a.jpg', '2021-09-19 01:12:53', '2021-09-19 01:12:53'),
(373, 127, '973e2e59e6b64266f264b671dbd2ee36.jpg', 'uploads/product/973e2e59e6b64266f264b671dbd2ee36.jpg', '2021-09-19 01:12:53', '2021-09-19 01:12:53'),
(374, 127, '8d84371eee8d407934bd53f58a5cba73.jpg', 'uploads/product/8d84371eee8d407934bd53f58a5cba73.jpg', '2021-09-19 01:12:53', '2021-09-19 01:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cost_price` decimal(8,2) NOT NULL,
  `unit_price` decimal(8,2) NOT NULL,
  `reorder_level` int(11) NOT NULL,
  `quantity` double NOT NULL,
  `unit` set('gm','kg','lb','piece','dozon','l','ml','inch','foot') COLLATE utf8mb4_unicode_ci NOT NULL,
  `baseimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `alt_description` tinyint(4) NOT NULL DEFAULT 0,
  `has_serial` tinyint(4) NOT NULL DEFAULT 0,
  `serialno` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tax1` tinyint(4) DEFAULT NULL,
  `tax2` tinyint(4) DEFAULT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`attributes`)),
  `loc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'item location in store',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`id`, `name`, `supplier_id`, `sku`, `description`, `cost_price`, `unit_price`, `reorder_level`, `quantity`, `unit`, `baseimage`, `alt_description`, `has_serial`, `serialno`, `tax1`, `tax2`, `attributes`, `loc`, `created_at`, `updated_at`) VALUES
(1, 'iPhone 13', 1, 'ip-13', 'Apple iPhone 13 smartphone. Announced Sep 2021. Features 6.1″ display, Apple A15 Bionic chipset, 512 GB storage, 4 GB RAM, Scratch-resistant ceramic glass.', '99000.00', '100000.00', 4, 12, 'piece', 'uploads/product/1632026516.png', 0, 1, '131', 0, NULL, '{\"Color\":[\"White\",\"Green\",\"Blue\"]}', 'r-2', '2021-09-18 02:24:02', '2021-09-19 04:07:47'),
(2, 'Samsung Galaxy M21', 1, 'ss-65468', 'Samsung Galaxy M21 price in Bangladesh is start from BDT. 16,999 Tk to 18,999 Tk. The price of Galaxy M21 phone is the same in all divisional cities of Bangladesh. Such as Dhaka, Rajshahi, Sylhet, Barisal, Rangpur, Chittagong, Khulna & Mymensingh. The phone announced 18th March, 2020 and officially released in this country (Bangladesh) on 23th March, 2020. The Samsung Galaxy M21 phone is available in Midnight Blue & Raven Black colors. You may also like similar another phone specifications here: Samsung Galaxy A01 Price in Bangladesh.', '17800.00', '18999.00', 4, 82, 'piece', 'uploads/product/1631980819.jpg', 1, 1, '1535', 0, NULL, '{\"Color\":[\"White\",\"Blue\"]}', 'rs-1', '2021-09-18 10:00:19', '2021-09-18 10:35:33'),
(3, 'Pears White(Nashpati) Kg* 1 Kg', 4, 'Pears_White_001', 'PRODUCT DETAILS\r\nNutrient Value & Benefits	\r\nPears are especially rich in folate, vitamin C, copper, and potassium. They\'re also a good source of polyphenol antioxidants\r\nColor	\r\nPale, subdued, budding yellow with a sage undertone.\r\nUnit-	\r\n1kg/500g\r\nDescription	\r\nA pear is a sweet, juicy fruit which is narrow near its stalk, and wider and rounded at the bottom. Pears have white flesh and thin green or yellow skin.#\r\nDisclaimer	\r\nImage shown is a representation and may slightly vary from the actual product. Every effort is made to maintain accuracy of all information displayed. Every effort is made to maintain the accuracy of all information. However, actual product packaging and materials may contain more and/or different information. It is recommended not to solely rely on the information presented.\r\nStorage Tips	\r\nStore your pears at 30 F (and at 85% to 90% humidity), or as close to it as you can get.\r\nCountry of Origin	\r\nImported', '230.00', '250.00', 3, 50, 'kg', 'uploads/product/1632024974.jpg', 1, 0, NULL, 0, NULL, 'null', 'mirpur', '2021-09-18 22:16:14', '2021-09-18 23:00:55'),
(4, 'Xiaomi Redmi Note 10 Pro', 9, 'Xi-Re-No-10-P', 'DISPLAY	Type	AMOLED, 120Hz, HDR10, 450 nits (typ), 1200 nits (peak)\r\nSize	6.67 inches, 107.4 cm2 (~85.6% screen-to-body ratio)\r\nResolution	1080 x 2400 pixels, 20:9 ratio (~395 ppi density)\r\nProtection	Corning Gorilla Glass 5\r\nPLATFORM	OS	Android 11, MIUI 12\r\nChipset	Qualcomm SM7150 Snapdragon 732G (8 nm)\r\nCPU	Octa-core (2x2.3 GHz Kryo 470 Gold & 6x1.8 GHz Kryo 470 Silver)\r\nGPU	Adreno 618\r\nMEMORY	Card slot	microSDXC (dedicated slot)\r\nInternal	64GB 6GB RAM, 128GB 6GB RAM, 128GB 8GB RAM\r\n 	UFS 2.2\r\nMAIN CAMERA	Quad	108 MP, f/1.9, 26mm (wide), 1/1.52\", 0.7µm, dual pixel PDAF\r\n8 MP, f/2.2, 118˚ (ultrawide), 1/4.0\", 1.12µm\r\n5 MP, f/2.4, (macro), AF\r\n2 MP, f/2.4, (depth)\r\nFeatures	LED flash, HDR, panorama\r\nVideo	4K@30fps, 1080p@30/60fps', '18000.00', '22000.00', 5, 49, 'piece', 'uploads/product/1632025244.jpg', 0, 0, NULL, 0, NULL, '{\"Color\":[\"White\",\"Green\"],\"Unit\":[\"pece\"]}', 'R-5', '2021-09-18 22:20:44', '2021-09-19 01:21:06'),
(5, 'ACI Pure Plain Toast', 3, 'aci-4564', 'Aci Pure Plain Toast (350g) Aci PurePlain Toast Biscuit; crispy & tasty; perfect for tea time. These include protein, calories, and more nutritious', '45.00', '50.00', 10, 63, 'gm', 'uploads/product/1632031015.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 't-1', '2021-09-18 22:20:49', '2021-09-19 04:44:54'),
(6, 'Icare Home Kiwi Air Freshner 300ml', 12, 'icare-123', 'Icare Home Kiwi Air Freshner 300ml, the  best product for you', '90.00', '120.00', 40, 50, 'piece', 'uploads/product/1632025640.jpg', 1, 1, '01', 12, NULL, '{\"Color\":[\"White\",\"Green\",\"Blue\"],\"Unit\":[\"pece\"]}', 'R-a1', '2021-09-18 22:27:20', '2021-09-18 22:27:20'),
(7, 'Jhatpot Chicken Nuggets 300g', 11, 'jh-454', 'Jhatpot Chicken Nuggets 20 pcs 300g. Stock In. ৳180. (0). Add to cart. Buy Now. SKU: 1189; Category: Grocery; Warranty: 100% Authentic', '10.00', '12.00', 1, 50, 'gm', 'uploads/product/1632025649.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 's-1', '2021-09-18 22:27:29', '2021-09-18 22:27:29'),
(8, 'Danish Florida Orange Biscuits', 3, 'danish-456', 'The Orange Biscuits from Danish have a tangy orange flavor that is soft and crunchy, the sweet biscuits will charm you with every bite! Enjoy the delicious, rich flavor on special occasions or as an everyday treat.', '7.00', '10.00', 10, 50, 'gm', 'uploads/product/1632025746.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 't-2', '2021-09-18 22:29:06', '2021-09-18 22:29:06'),
(9, 'Pumpkin Pie Spice Mix', 7, 'Spices & Mixes', 'There\'s no need to buy pumpkin pie spice mix if you\'ve already got all the spices for it in your cupboard—just mix it up yourself and use it in any recipe that calls for it. Toss it with apples for a delicious pie filling, stir it into whipped cream or frosting for a festive fall dessert topping, or sprinkle it over sliced fruit or buttered toast for a dressed-up snack. You could even add it to your coffee for an at-home PSL experience.', '400.00', '500.00', 3, 10, 'kg', 'uploads/product/1632025784.jpg', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-18 22:29:44', '2021-09-18 22:29:44'),
(10, 'Ripen Papaya', 4, 'Ripen_Papaya_002', 'PRODUCT DETAILS\r\nNutrient Value & Benefits	\r\nOne small papaya (152 grams) contains (2): Calories: 59 Carbohydrates: 15 grams Fiber: 3 grams Protein: 1 gram Vitamin C: 157% of the RDI Vitamin A: 33% of the RDI Folate (vitamin B9): 14% of the RDI Potassium: 11% of the RDI Trace amounts of calcium, magnesium and vitamins B1, B3, B5, E and K.\r\nColor	\r\nYellow/Orange\r\nUnit-	\r\nPer Piece\r\nDescription	\r\nThe papaya is a tropical fruit high in vitamins C and A, as well as fiber and healthy plant compounds. It also contains an enzyme called papain, used to tenderize meat. Papaya has powerful antioxidant effects, which may reduce oxidative stress and lower your risk of several diseases.', '135.00', '180.00', 3, 50, 'kg', 'uploads/product/1632025867.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'mirpur', '2021-09-18 22:31:07', '2021-09-18 23:46:45'),
(11, 'Mutton', 5, 'Mutton_022', 'Mutton Meat', '500.00', '580.00', 4, 50, 'kg', 'uploads/product/1632026657.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'Meat', '2021-09-18 22:32:39', '2021-09-18 23:09:34'),
(12, 'MUM Drinking water', 6, 'mum-001', 'MUM drinking water conforms to Bangladesh Standard (BDS) and is enriched with natural minerals, well-balanced and ideal for people of all ages.', '12.00', '15.00', 1, 10000, 'ml', 'uploads/product/1632025985.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'mp-1', '2021-09-18 22:33:05', '2021-09-18 22:33:05'),
(13, 'Domex Toilet Cleaner Powder 100 Gm', 12, 'home-02', 'Domex Toilet Cleaner Powder 100 Gm. this is your best product.', '130.00', '190.00', 45, 60, 'piece', 'uploads/product/1632026034.jpg', 1, 1, '02', 9, NULL, '{\"Color\":[\"White\",\"Green\",\"Blue\"],\"Unit\":[\"pece\"]}', 'R-a2', '2021-09-18 22:33:54', '2021-09-18 22:33:54'),
(14, 'FERRER ROMESCO CATALAN SAUCE', 8, 'mb-401', 'Traditional creamy tomato-almond spread. Romesco, a Catalan classic, based on pulverized almonds and hazelnuts, dry sweet Nora peppers, and tomatoes. 4.7 ounces', '400.00', '640.00', 1, 20, 'gm', 'uploads/product/1632027356.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', '1', '2021-09-18 22:34:07', '2021-09-18 22:55:56'),
(15, 'Pomelo(Jambura)', 4, 'Pomelo_003', 'Nutrient Value & Benefits	\r\nOne peeled pomelo (about 21 ounces or 610 grams) contains (1Trusted Source): Calories: 231 Protein: 5 grams Fat: 0 grams Carbs: 59 grams Fiber: 6 grams Riboflavin: 12.6% of the Daily Value (DV) Thiamine: 17.3% of the DV Vitamin C: 412% of the DV Copper: 32% of the DV Potassium: 28% of the DV\r\nColor	\r\nThe thick skin of the ripe fruit should be dull and pale green to yellow in colour. The flesh of the ripe pomelo is white in colour. The pomelo is round to pear-shaped. A shiny white skin indicates that the fruit is not ripe.\r\nUnit-	\r\nPer Piece\r\nDescription	\r\nPomelo is a large Asian citrus fruit that’s closely related to grapefruit. It’s shaped like a teardrop and has green or yellow flesh and a thick, pale rind. It can grow to the size of a cantaloupe or larger. Pomelo tastes similar to grapefruit, but it’s sweeter.It contains several vitamins, minerals, and antioxidants that make it a healthy addition to your diet.#\r\nDisclaimer	\r\nImage shown is a representation and may slightly vary from the actual product. Every effort is made to maintain accuracy of all information displayed. Every effort is made to maintain the accuracy of all information. However, actual product packaging and materials may contain more and/or different information. It is recommended not to solely rely on the information presented.', '100.00', '80.00', 3, 50, 'kg', 'uploads/product/1632026156.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'mirpur', '2021-09-18 22:35:56', '2021-09-18 22:35:56'),
(16, 'Doreo BlackChocSandwichCrem Biscuit b', 3, 'doreo-456', 'For the chocolate lovers! Doreo chocolate melted with Sandwich and combined with our own cream biscuits for a delicious chocolate biscuit. Amazing taste of ...', '99.00', '120.00', 12, 45, 'gm', 'uploads/product/1632026167.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 't-3', '2021-09-18 22:36:07', '2021-09-18 22:36:07'),
(17, 'Daily Fresh Lemon Air Freshener 70g', 12, 'home-03', 'Daily Fresh Lemon Air Freshener 70g. This is your best product', '190.00', '260.00', 60, 80, 'piece', 'uploads/product/1632026430.jpg', 1, 1, '03', 10, NULL, '{\"Color\":[\"White\",\"Green\",\"Blue\"],\"Unit\":[\"pece\"]}', 'R-a3', '2021-09-18 22:40:30', '2021-09-18 22:40:30'),
(18, 'Paragon Chicken Nuggets 250g', 11, 'pr-22', 'Home Food Frozen & Canned Frozen Snacks Paragon Shami Kabab (500 gm). Paragon Shami Kabab (500 gm). ৳ 310. Size: 500 gm. Quantity: 1.', '160.00', '165.00', 2, 30, 'gm', 'uploads/product/1632026454.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 's-1', '2021-09-18 22:40:54', '2021-09-18 22:40:54'),
(19, 'Miniket Rice Loose(S)', 10, 'Miniket rice', 'Miniket Rice is extra long & white and has a beautiful subtle aroma. It is acknowledged for properties like pearly-white, extra long grains, highly nutritional value and cost-effectiveness.', '55.00', '60.00', 5, 10, 'kg', 'uploads/product/1632026664.jpg', 0, 1, '2', 1, NULL, '{\"Color\":[\"White\"],\"Unit\":[\"kg\"]}', 'cooking', '2021-09-18 22:44:24', '2021-09-18 22:44:24'),
(20, 'Dan Cake Vanilla Muffin', 3, 'dancake-987', 'Dan cake vanilla muffin is a good quality and tasty food with a quality packaging offering you a different taste. Flavor: Vanilla cream filled. You can serve it in your daily breakfast or you can give as a school tiffin food for your child.', '10.00', '12.00', 10, 40, 'gm', 'uploads/product/1632026695.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 't-4', '2021-09-18 22:44:55', '2021-09-18 22:44:55'),
(21, 'Fresh Natural Drinking Wate', 6, 'fdw-02', 'NATURALLY REFRESHING: Our pure bottled natural spring mineral water is always a refreshing, naturally hydrating drink. Its quality', '12.00', '15.00', 2, 6000, 'ml', 'uploads/product/1632026766.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'mp-1', '2021-09-18 22:46:06', '2021-09-18 22:46:06'),
(22, 'Lemon (Kagzi) PCS', 4, 'Lemon_(Kagzi)_001', 'Disclaimer	\r\nImage shown is a representation and may slightly vary from the actual product. Every effort is made to maintain accuracy of all information displayed. Every effort is made to maintain the accuracy of all information. However, actual product packaging and materials may contain more and/or different information. It is recommended not to solely rely on the information presented.', '3.50', '5.50', 3, 50, 'piece', 'uploads/product/1632026813.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'Mirpur', '2021-09-18 22:46:53', '2021-09-18 22:59:56'),
(23, 'L.Tex Bed Sheet King Size (Multi)', 13, 'home-04', 'L.Tex Bed Sheet King Size (Multi),\r\nBath Towel 70 X 140 (Buy1 Get1). this is your best product', '200.00', '300.00', 50, 90, 'piece', 'uploads/product/1632027122.jpg', 1, 1, '04', 12, NULL, '{\"Color\":[\"White\",\"Green\",\"Blue\"],\"Unit\":[\"pece\"]}', 'R-a4', '2021-09-18 22:52:02', '2021-09-18 22:52:02'),
(24, 'Kinley Mineral Drinking', 6, 'km-01', 'Aava Naturally Alkaline Mineral Water 200ml | Origin Aravalli Hills | 100% Alkaline pH 8.0+ |', '10.00', '15.00', 2, 5000, 'ml', 'uploads/product/1632027156.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'mp-1', '2021-09-18 22:52:36', '2021-09-18 22:52:36'),
(25, 'Mushroom Choice Whole 425 Gm (Tin)', 11, 'Mushroom-9', 'Best\'s Mushroom is very low in Saturated Fat and Cholesterol.\r\n\r\nIt is also a good source of Vitamin B6, Folate, Iron, Magnesium, Potassium, Zinc, and Manganese.\r\n\r\nThey are cooked before the canning process but can become rubbery if cooked for too long.', '122.00', '129.00', 3, 100, 'gm', 'uploads/product/1632027294.jpg', 0, 0, NULL, 0, NULL, '{\"Color\":[\"White\"],\"Unit\":[\"gram\"]}', 's-1', '2021-09-18 22:54:54', '2021-09-18 22:54:54'),
(26, 'Beet', 4, 'Beet_002', 'Disclaimer	\r\nImage shown is a representation and may slightly vary from the actual product. Every effort is made to maintain accuracy of all information displayed. Every effort is made to maintain the accuracy of all information. However, actual product packaging and materials may contain more and/or different information. It is recommended not to solely rely on the information presented.', '120.00', '150.00', 3, 50, 'kg', 'uploads/product/1632027301.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'Mirpur', '2021-09-18 22:55:01', '2021-09-18 22:59:10'),
(27, 'Pesto Princess Chimichurri Sauce 130g Jar', 8, 'mb-402', 'Argentina, where this sauce hails from, is braai country, just like South Africa. Any piece of meat off the grill would love it if you served chimichurri at its side. For some, putting a fresh sauce on their steak takes a little getting used to, but it’s so worth it. Move over Monkeygland, Barbecue and Creamy Black Pepper! Make way for chimichurri, a gently spiced, fresh new way to enjoy a steak', '300.00', '345.00', 2, 10, 'kg', 'uploads/product/1632027316.jpg', 0, 0, NULL, 0, NULL, '{\"Color\":[\"Green\"],\"Unit\":[\"kg\"]}', '2', '2021-09-18 22:55:16', '2021-09-18 22:55:16'),
(28, 'Mushroom Choice Whole 425 Gm (Tin)', 11, 'Mushroom-9', 'Best\'s Mushroom is very low in Saturated Fat and Cholesterol.\r\n\r\nIt is also a good source of Vitamin B6, Folate, Iron, Magnesium, Potassium, Zinc, and Manganese.\r\n\r\nThey are cooked before the canning process but can become rubbery if cooked for too long.', '122.00', '129.00', 3, 100, 'gm', 'uploads/product/1632027343.jpg', 0, 0, NULL, 0, NULL, '{\"Color\":[\"Green\"],\"Unit\":[\"gram\"]}', 's-1', '2021-09-18 22:55:43', '2021-09-18 22:55:43'),
(29, 'Mushroom Choice Whole 425 Gm (Tin)', 11, 'Mushroom-9', 'Best\'s Mushroom is very low in Saturated Fat and Cholesterol.\r\n\r\nIt is also a good source of Vitamin B6, Folate, Iron, Magnesium, Potassium, Zinc, and Manganese.\r\n\r\nThey are cooked before the canning process but can become rubbery if cooked for too long.', '122.00', '129.00', 3, 100, 'gm', 'uploads/product/1632027369.jpg', 0, 0, NULL, 0, NULL, '{\"Color\":[\"Green\"],\"Unit\":[\"gram\"]}', 's-1', '2021-09-18 22:56:09', '2021-09-18 22:56:09'),
(30, 'Pusti Soyabin oil', 10, 'Soyabin oil', 'contains approximately 54% linoleic acid (18:2), 23% oleic acid (18:1), 11% palmitic acid (16:0), 8% linolenic acid (18:3), and 4% steric acid (18:0). This fatty acid profile is high in unsaturated fatty acids, which is healthy, but shows poor oxidative stability. To improve oxidative stability, partial hydrogenation is often used but this does produce trans fats, which have adverse health effects.', '108.00', '112.00', 5, 20, 'l', 'uploads/product/1632027396.jpg', 0, 0, NULL, 1, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-18 22:56:36', '2021-09-19 01:09:53'),
(31, 'Pran Mango Fruit Drink', 6, 'pj-01', 'PRAN FRUIT DRINK is a beverage produced from best mango sources using hot filling and aseptic manufacturing process to provide a healthy drink', '17.00', '20.00', 5, 2500, 'ml', 'uploads/product/1632027484.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'js-02', '2021-09-18 22:58:04', '2021-09-18 22:58:04'),
(32, 'Mint Leaf (Pudinapata)', 4, 'Mint_Leaf_003', 'Image shown is a representation and may slightly vary from the actual product. Every effort is made to maintain accuracy of all information displayed. Every effort is made to maintain the accuracy of all information. However, actual product packaging and materials may contain more and/or different information. It is recommended not to solely rely on the information presented.', '290.00', '330.00', 3, 50, 'kg', 'uploads/product/1632027486.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'Mirpur', '2021-09-18 22:58:06', '2021-09-18 22:59:36'),
(33, 'Chicken', 5, 'Chicken_004', 'high quality chicken meat', '525.00', '550.00', 5, 59, 'kg', 'uploads/product/1632027504.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'Meat', '2021-09-18 22:58:24', '2021-09-19 01:21:05'),
(34, 'Dan Cake Chocolate Layer Cake', 3, 'danchocolate-980', 'With a layer of austere vanilla cream sandwiched between two finely baked chocolate cakes, prêt-à-porter Chocolate Layer Cake.', '10.00', '13.00', 10, 30, 'gm', 'uploads/product/1632027527.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 't-1', '2021-09-18 22:58:47', '2021-09-18 22:58:47'),
(35, 'ACI Pure Chilli Powder', 7, 'Spices & Mixes-red chili powder', 'ACI Pure Chilli Powder\r\nBest chili breed from Bagura\r\nTaste and flavor of hand ground chili paste\r\nNo synthetic colorants\r\nAdds great taste to your food', '500.00', '540.00', 4, 200, 'kg', 'uploads/product/1632027734.jpg', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-18 23:02:14', '2021-09-18 23:02:14'),
(36, 'Pure Packaged Rice', 10, 'Packaged Rice', 'Instant rice is rice that has been precooked. Some types are microwave ready, and some are dehydrated so that they cook more rapidly. ... Because it has already been cooked, all that is necessary to prepare instant rice is to simply microwave it or re-hydrate it with hot water.', '98.00', '105.00', 10, 50, 'kg', 'uploads/product/1632027836.jpg', 0, 1, NULL, 0, NULL, '{\"Color\":[\"White\"],\"Unit\":[\"kg\"]}', 'cooking', '2021-09-18 23:03:56', '2021-09-19 00:28:54'),
(37, 'Maggi Healthy Soup Thai 35 Gm', 11, 'Soup001', NULL, '40.00', '45.00', 4, 120, 'gm', 'uploads/product/1632027911.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 's-2', '2021-09-18 23:05:11', '2021-09-18 23:05:11'),
(38, 'Dates (Iranian) Maryam Loose', 4, 'Dates_001', 'Dates (Iranian) Maryam Loose. This is the best Dates (Iranian) Maryam Loose', '750.00', '785.00', 3, 50, 'kg', 'uploads/product/1632027917.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'Mirpur', '2021-09-18 23:05:17', '2021-09-18 23:05:17'),
(39, 'Beef', 5, 'Beef_0556', 'the best meat', '550.00', '600.00', 10, 60, 'kg', 'uploads/product/1632027932.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'Meat', '2021-09-18 23:05:32', '2021-09-18 23:05:32'),
(40, 'Bath Towel 70 X 140 (Buy1 Get1)', 13, 'hl-02', 'Bath Towel 70 X 140 (Buy1 Get1).this is your best products', '900.00', '1500.00', 25, 40, 'dozon', 'uploads/product/1632027947.jpg', 1, 1, '05', 12, NULL, '{\"Color\":[\"White\",\"Green\",\"Blue\"],\"Unit\":[\"pece\"]}', 'R-a5', '2021-09-18 23:05:47', '2021-09-18 23:05:47'),
(41, 'Dry Fig Loose', 4, 'Dry_Fig_Loose_002', 'Dry Fig Loose products', '1120.00', '1188.00', 3, 50, 'kg', 'uploads/product/1632028096.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'Mirpur', '2021-09-18 23:08:16', '2021-09-18 23:08:16'),
(42, 'Pran Alltime Cake', 3, 'prancake-098', 'All Time Pie Cake is a soft, round-shaped cake with a creamy strawberry filling. It comes in small, handy packaging.', '7.00', '12.00', 23, 20, 'gm', 'uploads/product/1632028120.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 't-3', '2021-09-18 23:08:40', '2021-09-18 23:08:40'),
(43, 'Frutika Mango juice', 6, 'fj-01', 'Frutika Mango Juice 250 ML. ৳ 17.00 ... Flavour Milk Chocoloate/ Elachi/ Mango Milk. ৳ 27.00. Add to cart. Add to wishlist.', '18.00', '20.00', 4, 3500, 'ml', 'uploads/product/1632028135.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'ji-02', '2021-09-18 23:08:55', '2021-09-18 23:08:55'),
(44, 'Coles Honey Mustard Simmer Sauce', 8, 'mb-403', 'INGREDIENTS: Water, Carrot, Canola Oil, Onion, Mustard (3.5%), Sugar, Cream (Milk), Thickeners (1442, 415), Honey (2%), White Wine, Egg Yolk Powder, Salt, Yeast Extract, Natural Flavours, Onion Powder, Concentrated Lemon Juice, Natural Colour (Beta Carotene), Parsley, Lactic Acid.', '150.00', '195.00', 3, 25, 'gm', 'uploads/product/1632028227.jpg', 0, 0, NULL, 0, NULL, '{\"Color\":[\"White\"],\"Unit\":[\"gram\"]}', '3', '2021-09-18 23:10:27', '2021-09-18 23:10:27'),
(45, 'Golden Garden Red Plum 220g', 4, 'Golden-Garden-003', 'Golden Garden Red Plum 220g. Best quality products', '220.00', '250.00', 3, 50, 'gm', 'uploads/product/1632028278.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'Mirpur', '2021-09-18 23:11:18', '2021-09-18 23:11:18'),
(46, 'Bath Towel 70 X 140 (Buy1 Get1)', 13, 'hl-03', 'Bath Towel 70 X 140 (Buy1 Get1). this is your best products.', '90.00', '190.00', 60, 80, 'piece', 'uploads/product/1632028382.jpg', 1, 1, '06', 9, NULL, '{\"Color\":[\"White\",\"Green\",\"Blue\"],\"Unit\":[\"pece\"]}', 'R-a6', '2021-09-18 23:13:02', '2021-09-18 23:13:02'),
(47, 'Bath Towel 70 X 140 (Buy1 Get1)', 13, 'hl-03', 'Bath Towel 70 X 140 (Buy1 Get1). this is your best products.', '90.00', '190.00', 60, 80, 'piece', 'uploads/product/1632028382.jpg', 0, 0, NULL, 9, NULL, '{\"Color\":[\"White\",\"Green\",\"Blue\"],\"Unit\":[\"pece\"]}', 'R-a6', '2021-09-18 23:13:02', '2021-09-18 23:13:02'),
(48, 'American Harvest Basil seed drink', 6, 'ahb-01', 'American Harvest Basil Seed Drink is one of the most favorite products by American Harvest. A great refreshing drink for the summer heat.A perfect combination ..', '170.00', '185.00', 5, 1360, 'ml', 'uploads/product/1632028464.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'jp-02', '2021-09-18 23:14:24', '2021-09-19 01:08:46'),
(49, 'Aroma Mustard oil', 10, 'Mustard oil', 'Mustard oil, which is produced from the seeds of the mustard plant, is a common ingredient in Indian cuisine.\r\n\r\nKnown for its strong flavor, pungent aroma, and high smoke point, it’s often used for sautéing and stir-frying vegetables in many parts of the world, including India, Bangladesh, and Pakistan.\r\n\r\nAlthough pure mustard oil is banned for use as a vegetable oil in the United States, Canada, and Europe, it’s often applied topically and used as a massage oil, skin serum, and hair treatment (1).', '205.00', '212.00', 10, 30, 'l', 'uploads/product/1632028497.jpg', 0, 1, NULL, 1, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-18 23:14:57', '2021-09-19 00:53:24'),
(50, 'Alltime bread', 3, 'bread-789', 'All Time Milk Bread is a soft milk bread which feels very light in the mouth. It is perfect for a quick, healthy breakfast.', '30.00', '35.00', 10, 30, 'gm', 'uploads/product/1632028571.jpg', 0, 0, NULL, NULL, NULL, '{\"Unit\":[\"gram\"]}', 't-3', '2021-09-18 23:16:11', '2021-09-18 23:16:11'),
(51, 'PINK HIMALAYAN SALT', 7, 'Spices & Mixes-salt', 'PINK HIMALAYAN SALT\r\nMined from the Himalayan mountains, this salt gets its pink and red color naturally from mineral deposits.\r\n\r\nUse it to add a luxurious and delectable flavor to any seafood or poultry dish.', '600.00', '650.00', 3, 20, 'kg', 'uploads/product/1632028576.png', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-18 23:16:16', '2021-09-18 23:17:41'),
(52, 'Good Knight GF M+1Reffil (Buy1 Get1 Refill Free)^', 12, 'hc-07', 'Good Knight GF M+1Reffil (Buy1 Get1 Refill Free)^\r\n.this is your product category', '170.00', '250.00', 40, 60, 'piece', 'uploads/product/1632028672.jpg', 1, 1, '07', 12, NULL, '{\"Color\":[\"White\",\"Green\",\"Blue\"],\"Unit\":[\"pece\"]}', 'r09', '2021-09-18 23:17:52', '2021-09-18 23:17:52'),
(53, 'Canton Corn & Chicken Soup 4 Pcs (Box)', 11, 'Soup002', NULL, '120.00', '130.00', 5, 80, 'gm', 'uploads/product/1632028717.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 's-2', '2021-09-18 23:18:37', '2021-09-18 23:18:37'),
(54, 'Horlicks Classic Malt Jar', 6, 'hsm-01', 'About this item. Health Drink that has nutrients to support immunity. Clinically proven to improve 5 signs of growth; Clinically proven to make kids Taller,', '170.00', '190.00', 20, 200, 'gm', 'uploads/product/1632028816.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'hsm-005', '2021-09-18 23:20:16', '2021-09-18 23:20:16'),
(55, 'Parachute Coconut Oil', 4, 'Parachute_001', 'Product Description of Parachute Coconut Oil\r\n\r\nParachute is made from the finest coconuts to ensure the best quality Coconut Oil. It has 5 Stage filtration process to ensure 100% pure coconut oil every time, Long-lasting freshness, and Consistent composition and viscosity in every drop of oil.', '120.00', '135.00', 3, 50, 'ml', 'uploads/product/1632028834.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'Mirpur', '2021-09-18 23:20:34', '2021-09-18 23:20:34'),
(56, 'Del Monte HOT & SPICY Ketchup 335g', 8, 'mb-404', 'Made from 100% Real Tomatoes. Use anytime for dishes, sandwiches, pizza and burgers. Best for dipping fries and other finger snacks.', '200.00', '265.00', 4, 18, 'kg', 'uploads/product/1632028859.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', '4', '2021-09-18 23:20:59', '2021-09-18 23:20:59'),
(57, 'Fresh Water Fish', 5, 'rui_0006', 'Water fish', '250.00', '285.00', 2, 40, 'kg', 'uploads/product/1632028900.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'Fish', '2021-09-18 23:21:40', '2021-09-18 23:21:40'),
(58, 'Sunsilk Hair Fall Solution Shampoo', 4, 'Sunsilk_Hair-Fall_002', 'Product Details of Sunsilk Shampoo Hairfall Solution 180ml\r\n\r\nStrong Hair that fights hair loss\r\nThicker, fuller looking hair starts right here, right now.\r\nEnriched with Soya Vitamin Complex\r\nStrengthens your hair, thus reducing hair breakage\r\nSay no to hair breakage and flaunt your healthy tresses.\r\nDeeply moisturizes and fortifies your hair\r\nSunsilk Hairfall Solution shampoo, for hair so strong it fights the loss! Tired of hairfall due to breakage? Tried everything but nothing works? Sunsilk Hairfall Solution shampoo is co-created with Dr. Francesca Fusco, scalp expert from New York. Dr. Francesca says, “a woman’s hair is her ‘crowning glory’, and is dedicated to giving every girl the best head start possible to getting glorious hair through care for the scalp”. So if you are tired of hair falling down, Sunsilk Hairfall Solution shampoo’s exclusive formula, with soya vitamin complex, deeply moisturizes and fortifies your hair, so that your hair is strong and healthy, with reduced fall out by up to 10 times. So now say no to hair fall with Sunsilk Hairfall^ Solution shampoo and have your hair always on your side. Start Shopping Now!', '160.00', '185.00', 3, 50, 'ml', 'uploads/product/1632028989.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'Mirpur', '2021-09-18 23:23:09', '2021-09-18 23:23:09'),
(59, 'Fresh organic Olive oil', 10, 'Olive oil', 'Olive oil is a major component of the Mediterranean diet. It is rich in antioxidants. The main fat it contains is monounsaturated fatty acids (MUFAs), which experts consider a healthful fat', '130.00', '135.00', 15, 20, 'l', 'uploads/product/1632028997.jpg', 0, 1, '3', 1, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-18 23:23:17', '2021-09-19 00:53:52'),
(60, 'Parachute Coconut Oil 95±5ml', 13, 'per-02', 'Parachute Coconut Oil 95±5ml', '90.00', '120.00', 40, 90, 'piece', 'uploads/product/1632029010.jpg', 1, 1, '045', 12, NULL, '{\"Color\":[\"Blue\"],\"Unit\":[\"pece\"]}', 'R-a70', '2021-09-18 23:23:30', '2021-09-18 23:23:30'),
(61, 'BAY LEAVES', 7, 'Spices & Mixes-bay leaves', 'BAY LEAVES\r\nAn essential ingredient in Mediterranean dishes, bay leaves add a sharp, warm flavor to soups, sauces and marinades. They release their flavor slowly, so add them early in the cooking process. And be sure to remove them before serving.\r\n\r\nWe source our Spice Islands® bay leaves from California, known for strong bay leaves with a more concentrated aroma and potent flavor. Theyre so potent, in fact, that we recommend using 1/3 of a leaf in recipes that call for a whole leaf.\r\n\r\nThe long, tapered leaves are handpicked and carefully dried to ensure they remain unbroken.\r\n\r\nOur Bay Leaves are only bay leaves. Spice Islands® spices and herbs dont contain added sugar, fillers or other ingredients so you get the most authentic flavor every tim', '400.00', '540.00', 3, 10, 'kg', 'uploads/product/1632029012.png', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-18 23:23:32', '2021-09-18 23:23:32'),
(62, 'Sunsilk Hair Fall Solution Shampoo', 4, 'Sunsilk_Hair-Fall_002', 'Product Details of Sunsilk Shampoo Hairfall Solution 180ml\r\n\r\nStrong Hair that fights hair loss\r\nThicker, fuller looking hair starts right here, right now.\r\nEnriched with Soya Vitamin Complex\r\nStrengthens your hair, thus reducing hair breakage\r\nSay no to hair breakage and flaunt your healthy tresses.\r\nDeeply moisturizes and fortifies your hair\r\nSunsilk Hairfall Solution shampoo, for hair so strong it fights the loss! Tired of hairfall due to breakage? Tried everything but nothing works? Sunsilk Hairfall Solution shampoo is co-created with Dr. Francesca Fusco, scalp expert from New York. Dr. Francesca says, “a woman’s hair is her ‘crowning glory’, and is dedicated to giving every girl the best head start possible to getting glorious hair through care for the scalp”. So if you are tired of hair falling down, Sunsilk Hairfall Solution shampoo’s exclusive formula, with soya vitamin complex, deeply moisturizes and fortifies your hair, so that your hair is strong and healthy, with reduced fall out by up to 10 times. So now say no to hair fall with Sunsilk Hairfall^ Solution shampoo and have your hair always on your side. Start Shopping Now!', '160.00', '185.00', 3, 50, 'ml', 'uploads/product/1632029031.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'Mirpur', '2021-09-18 23:23:51', '2021-09-18 23:23:51'),
(63, 'Knorr Classic Thai Cup-A-Soup 14±2g^', 11, 'Soup003', 'Product Type: Soup · Brand: Knorr · Weight: 12g · Per Carton size 96 Piece · High in nutrition and taste and low in fat · Made with 100% Real Chicken & Vegetable', '20.00', '25.00', 6, 200, 'gm', 'uploads/product/1632029119.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 's-2', '2021-09-18 23:25:19', '2021-09-18 23:25:19'),
(64, 'Complan Royal Chocolate', 6, 'crc-02', 'Amazon.com : Complan Royale Chocolate Flavour - 500g : Grocery & Gourmet Food. ... Complan Chocolate Flavor 450g · 4.8 out of 5 stars 6', '505.00', '540.00', 25, 3500, 'gm', 'uploads/product/1632029136.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'crc-06', '2021-09-18 23:25:36', '2021-09-18 23:25:36'),
(65, 'Jui Coconut Oil 400±50ml (Tin)*', 13, 'per-05', 'Jui Coconut Oil 400±50ml (Tin)*', '130.00', '260.00', 60, 90, 'kg', 'uploads/product/1632029173.jpg', 1, 1, '001', 12, NULL, '{\"Color\":[\"White\",\"Green\",\"Blue\"],\"Unit\":[\"pece\"]}', 'R-a22', '2021-09-18 23:26:13', '2021-09-18 23:26:13'),
(66, 'Pepsodent Toothpaste Charcoal White 90g', 4, 'Pepsodent_Toothpaste_001', 'Pepsodent Toothpaste Charcoal White 90g', '65.00', '75.00', 3, 50, 'gm', 'uploads/product/1632029219.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'Mirpur', '2021-09-18 23:26:59', '2021-09-18 23:26:59'),
(67, 'Toor Dal', 7, 'Spices & Mixes-loose Daal & Chola', 'Toor Dal Split Pigeon Pea 1 Kg Tuver Daal Arhar Dal Yellow Pulses Indian Kitchen', '400.00', '540.00', 3, 10, 'kg', 'uploads/product/1632029279.jpg', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-18 23:27:59', '2021-09-18 23:27:59'),
(68, 'Dabur Red Paste For Teeth', 4, 'Dabur_Red_002', 'Dabur Red Paste For Teeth', '50.00', '70.00', 3, 50, 'gm', 'uploads/product/1632029375.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'Mirpur', '2021-09-18 23:29:35', '2021-09-18 23:29:35'),
(69, 'Organic Sunflower oil', 10, 'Sunflower oil', 'Polyunsaturated fatty acids, or PUFAs, include omega-3s and omega-6s. PUFAs can reduce cholesterol and triglycerides in the blood, especially when substituted for less-healthy fats. Monounsaturated fatty acids, or MUFAs, also appear in sunflower oil. MUFAs may reduce heart disease.', '145.00', '150.00', 10, 20, 'l', 'uploads/product/1632029423.jpg', 0, 1, '4', 1, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-18 23:30:23', '2021-09-19 01:11:28'),
(70, 'Swad Masoor Dal', 7, 'Spices & Mixes-Packaged Daal & Chola', 'About this item\r\nProduct Type:Legume\r\nItem Package Dimension:5.9 cm L X17.6 cm W X28.9 cm H\r\nItem Package Weight:1.851 kg\r\nItem Package Quantity:1', '400.00', '540.00', 3, 10, 'kg', 'uploads/product/1632029461.jpg', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-18 23:31:01', '2021-09-18 23:31:01'),
(71, 'Rupchanda  Fish', 5, 'Fish_7456', 'sea fish', '850.00', '880.00', 2, 100, 'kg', 'uploads/product/1632029535.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'Fish', '2021-09-18 23:32:15', '2021-09-18 23:32:15'),
(72, 'Gillette -2 Razor', 4, 'Gillette-2Razor_001', 'Gillette -2 Razor for man', '20.00', '25.00', 3, 50, 'piece', 'uploads/product/1632029591.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'Mirpur', '2021-09-18 23:33:11', '2021-09-18 23:33:11'),
(73, 'Pran Bread', 3, 'pranbread-0897', 'Enjoy the amazing Pran Soft Crunch with your hot beverage. Pran Toast is a classic accomplice of tea for many people as it adds a wonderful, crisp texture to your overall experience.', '40.00', '45.00', 12, 10, 'gm', 'uploads/product/1632031124.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 't-4', '2021-09-18 23:35:46', '2021-09-18 23:58:44'),
(74, 'Veet Full Body Waxing Kit Normal Skin', 4, 'Veet _002', 'Veet Full Body Waxing Kit Normal Skin (20 Stripes)^', '450.00', '498.00', 3, 50, 'piece', 'uploads/product/1632029769.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'Mirpur', '2021-09-18 23:36:09', '2021-09-18 23:36:09'),
(75, 'Ovaltine Malted Chocolate Drink', 6, 'oed-0010', 'Ovaltine Power 10 Chocolate Malt Drink is a nutritious drink with the natural goodness of malt and milk, and a great taste and arom', '300.00', '325.00', 25, 200, 'gm', 'uploads/product/1632029794.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'vjz', '2021-09-18 23:36:34', '2021-09-18 23:36:34'),
(76, 'Amals breaky', 3, 'amals-0909', 'Poly Bread & Biscuit Factory is one of the leading bakery items manufacturer in Bangladesh. It began its journey in 1962.It focuses on the production..', '40.00', '45.00', 10, 30, 'gm', 'uploads/product/1632031269.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 't-4', '2021-09-18 23:38:25', '2021-09-19 00:01:09'),
(77, 'Amals Breads', 3, 'amals-0909', 'Poly Bread & Biscuit Factory is one of the leading bakery items manufacturer in Bangladesh. It began its journey in 1962.It focuses on the production..', '40.00', '45.00', 10, 30, 'gm', 'uploads/product/1632030203.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 't-4', '2021-09-18 23:38:25', '2021-09-19 00:02:39'),
(78, 'Koral Fish', 5, 'fish_55', 'sea fish', '650.00', '690.00', 2, 80, 'kg', 'uploads/product/1632030029.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'Fish', '2021-09-18 23:40:29', '2021-09-18 23:40:29'),
(79, 'Dove Beauty Cream Bar 100 Gm White', 4, 'Dove-Beauty-Cream_001', 'Dove Beauty Cream Bar 100 Gm White (Imported)', '65.00', '85.00', 3, 50, 'gm', 'uploads/product/1632030155.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'Mirpur', '2021-09-18 23:42:35', '2021-09-18 23:42:35'),
(80, 'SUger', 7, 'suger_02', 'suger', '400.00', '540.00', 3, 10, 'kg', 'uploads/product/1632030234.jpg', 0, 1, '1', 1, NULL, '{\"Color\":[\"White\"],\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-18 23:43:54', '2021-09-18 23:43:54'),
(81, '7up Pet Bottle', 6, 'sd-0045', 'The new bottles will be available across the entire 7UP product range, including the Regular, Free and Free Cherry flavours. The 375ml, 500ml .', '85.00', '100.00', 15, 150, 'ml', 'uploads/product/1632030245.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'sd', '2021-09-18 23:44:05', '2021-09-18 23:44:05'),
(82, 'Kumarika Herbal Beauty Soap 75g*', 4, 'Kumarika_Herbal_002', 'Kumarika Herbal Beauty Soap 75g*', '20.00', '30.00', 3, 50, 'gm', 'uploads/product/1632030646.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'Mirpur', '2021-09-18 23:50:46', '2021-09-18 23:50:46'),
(83, 'Brown Suger', 7, 'Spices & Mixes-brown-suger', 'Dark Brown Sugar\r\n 6 reviews\r\nAlso Known As: Soft Brown Sugar or Granulated Brown Sugar\r\nOrigin: USA\r\nIngredients: Brown Sugar and Cane Caramel Color.\r\nTaste and Aroma: Just as sweet as white sugar, but provides a softer and moister final product.\r\nUses: Baking, cookies, BBQ sauce, ham, pudding, cake, glaze, frosting, pie, muffins, coffee cake and bread.\r\nSubstitutes:Light Brown Sugar, Maple Sugar, Sucanat, Demerara Sugar, Cinnamon Sugar, Raw Sugar, Honey Granulated, Evaporated Cane Juice or Turbinado Sugar.\r\nFun Fact: The difference between Dark Brown Sugar and Light Brown Sugar is its molasses content, at 6.5% and 3.5%', '400.00', '540.00', 3, 10, 'kg', 'uploads/product/1632030809.jpg', 0, 0, NULL, 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-18 23:53:29', '2021-09-18 23:53:29'),
(84, 'Fair And Lovely Advanced Multivitamin 25g', 4, 'Fair-And-Lovely _001', 'Fair And Lovely Advanced Multivitamin 25g', '40.00', '64.00', 3, 50, 'gm', 'uploads/product/1632030875.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'Mirpur', '2021-09-18 23:54:35', '2021-09-18 23:54:35'),
(85, 'Pran Chanachur 300g^', 11, 'Chanachur', 'The Pran Hot Hot Chanachur Bombay Mix is a spicy blend of noodles with pulses, peanuts, and flattened rice. The crispy and tasty snack is best enjoyed with a cup of tea or coffee.', '59.30', '65.00', 7, 200, 'gm', 'uploads/product/1632030956.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 's-3', '2021-09-18 23:55:56', '2021-09-18 23:55:56'),
(86, 'Coca-cola Soft Drink', 6, 'co-2', 'Coca-cola Soft Drink Cans (6 x 400 ml). Share. Product ID: 000000000000404676_SW. 0 Reviews. Write a review. Coca-cola Soft Drink Cans (6 x 400 ml).\r\nZAR 54.95', '24.00', '30.00', 20, 249, 'ml', 'uploads/product/1632031063.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'co', '2021-09-18 23:57:43', '2021-09-19 01:21:05'),
(87, 'Chola', 7, 'Spices & Mixes-Packaged Daal & Chola', 'BLACK CHICKPEAS - KALA CHANA Kala chana (\"Black Chickpea\" in both Hindi and Urdu, also known as Desi chickpea or Chholaa Boot) can be black, green, or speckled. This variety is hulled and split to make chana dal.\r\n\r\nThe chickpea or chickpea (Cicer arietinum) is an annual legume of the family Fabaceae, subfamily Faboideae. Its different types are variously known as gram or Bengal gram, garbanzo or garbanzo bean, Egyptian pea, chana, and chole. Chickpea seeds are high in protein. It is one of the earliest cultivated legumes, and 7500-year-old remains have been found in the Middle East.\r\n\r\nChickpeas are a nutrient-dense food, providing rich content (20% or higher of the Daily Value, DV) of protein, dietary fiber, folate, and certain dietary minerals, such as iron and phosphorus in a 100-gram reference amount (see adjacent nutrition table). Thiamin, vitamin B6, magnesium, and zinc contents are moderate, providing 10–16% of the DV. Compared to reference levels established by the United Nations Food and Agriculture Organization and World Health Organization, proteins in cooked and germinated chickpeas are rich in essential amino acids such as lysine, isoleucine, tryptophan, and total aromatic amino acids.\r\n\r\nA 100 g serving of cooked chickpeas provides 164 kilocalories (690 kJ). Cooked chickpeas are 60% water, 27% carbohydrates, 9% protein, and 3% fat (table).[24] 75% of the fat content is unsaturated fatty acids for which linoleic acid comprises 43% of total fat.\r\nType: Chickpeas\r\n\r\nCategory: GRAINS & LEGUMES, Snack\r\n\r\n   \r\nCUSTOMER REVIEWS', '400.00', '540.00', 3, 10, 'kg', 'uploads/product/1632031239.jpg', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-19 00:00:39', '2021-09-19 00:00:39'),
(88, 'Fanta 1250', 6, 'fd-01', 'Fanta 1250 ml. In Stock. 0 Review(s). New. Price : ৳780. 1. Add to Cart; Buy Now. Product SKU: ow81562pJT. Brand:Coca Col', '50.00', '65.00', 30, 259, 'ml', 'uploads/product/1632031247.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'fdr', '2021-09-19 00:00:47', '2021-09-19 00:08:16'),
(89, 'Brown Loose rice', 10, 'Loose rice', 'There are dozens of different ways to classify the scores of types of rice from all over the world, but rice is generally described as being long-, medium- or short-grained. These are some of the most common types you’ll find in supermarkets and gourmet stores, as well as a few specialty rices that we’re seeing more and more often', '57.00', '60.00', 10, 50, 'kg', 'uploads/product/1632031278.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'cooking', '2021-09-19 00:01:18', '2021-09-19 00:27:08'),
(90, 'Najirshail Loose rice', 10, 'Loose rice', 'There are dozens of different ways to classify the scores of types of rice from all over the world, but rice is generally described as being long-, medium- or short-grain.', '60.00', '65.00', 15, 50, 'kg', 'uploads/product/1632031425.jpg', 0, 0, NULL, 1, NULL, '{\"Unit\":[\"kg\"]}', 'cooking', '2021-09-19 00:03:45', '2021-09-19 00:26:37'),
(91, 'ACI Salt', 7, 'Spices & Mixes-salt', 'Next to water, salt is the most essential item in human diet. As a product point of view of ACI Salt Ltd., this essential item must provide the consumer a constant feeling of healthy, nutritious & premium quality. Following that point of view, ACI Pure Salt is processed through fully automatic machine of vacuum evaporated technology, clearly distinctive quality of 100% pure, Free Flow, Crystal White & Perfectly Iodized, packed in attractive food-grade flexible packages; that helps to ensure brilliant future generation. This perfect mixture of iodine in salt is also very important as it is the most cost effective way of preventing IDD like Goitre, Mental Retardation, and Stunted Growth etc.', '500.00', '540.00', 3, 200, 'kg', 'uploads/product/1632031480.jpg', 0, 1, '1', 1, NULL, '{\"Color\":[\"White\"],\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-19 00:04:40', '2021-09-19 00:04:40'),
(92, 'Creamy Horseradish Sauce - Gluten-free, Kosher - 9Oz Bottle', 8, 'mb-405', 'Crafted in small batches using a family recipe since 1948, Creamy Horseradish Sauce has a full-bodied flavor with a bold heat. Creamy Horseradish Sauce starts with freshly ground horseradish that is enhanced with spices and vinegar, making it a robust condiment for seafood and sliced roast beef.', '430.00', '545.00', 5, 13, 'gm', 'uploads/product/1632031949.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', '5', '2021-09-19 00:05:50', '2021-09-19 00:12:29'),
(93, 'Sprite Drink', 6, 'spd', 'Sprite is a colorless, lemon and lime-flavored soft drink created by The Coca-Cola Company. It was first developed in West Germany in 1959 as Fanta Klare', '17.00', '20.00', 20, 200, 'ml', 'uploads/product/1632031556.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'spd', '2021-09-19 00:05:56', '2021-09-19 00:05:56'),
(94, 'Pink   salt', 7, 'Spices & Mixes-salt', 'The Himalayan Mountains stretch across Asia into China, Nepal, Myanmar, Pakistan, Bhutan, Afghanistan and India. The salt from these mountains are thought to be the purest in the world due to the fact that, more than 200 million years ago crystallized sea beds were covered by lava and then later by snow and ice for a millennia, preserved and protected from pollution.', '400.00', '540.00', 3, 200, 'kg', 'uploads/product/1632031692.jpg', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-19 00:08:12', '2021-09-19 00:08:12'),
(95, 'Ponds Vanishing Cream 50 Gm*', 4, 'Ponds_Vanishing-Cream_002', 'Ponds Vanishing Cream 50 Gm*', '50.00', '70.00', 3, 50, 'gm', 'uploads/product/1632031737.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'Mirpur', '2021-09-19 00:08:57', '2021-09-19 00:08:57'),
(96, 'Pampers Pants Diaper', 8, 'dipers_67', 'Baby Diapers', '1420.00', '1500.00', 4, 50, 'piece', 'uploads/product/1632031752.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'Baby Food & Care', '2021-09-19 00:09:12', '2021-09-19 00:09:12'),
(97, 'Aci Packaged Rice', 10, 'Packaged Rice', 'Water; Basmati Rice; Canola and/or Sunflower Oil; Soy Lecithin; Niacin; Iron (Ferric Orthophosphate); Thiamine (Thiamine Mononitrate); Folate (Folic Acid).', '95.00', '100.00', 20, 20, 'kg', 'uploads/product/1632031828.jpg', 0, 1, '5', 0, NULL, '{\"Unit\":[\"kg\"]}', 'cooking', '2021-09-19 00:10:28', '2021-09-19 00:28:20'),
(98, 'Arong Packaged Rice', 10, 'Packaged Rice', 'Water; Basmati Rice; Canola and/or Sunflower Oil; Soy Lecithin; Niacin; Iron (Ferric Orthophosphate); Thiamine (Thiamine Mononitrate); Folate (Folic Acid).', '85.00', '90.00', 15, 30, 'kg', 'uploads/product/1632031906.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"kg\"]}', 'cooking', '2021-09-19 00:11:46', '2021-09-19 00:27:54'),
(99, 'Seylon Gold Tea', 6, 'st-0111', 'Seylon Gold Tea is produced from best tea leaves of the finest tea gardens. Ceylon is a refreshing and reviving infusion. Ceylon tea with its distinct taste', '180.00', '210.00', 20, 150, 'gm', 'uploads/product/1632031963.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'st', '2021-09-19 00:12:43', '2021-09-19 00:12:43'),
(100, 'Chana Dal', 7, 'Spices & Mixes-loose Daal & Chola', 'Chana Dal (whole) - A common Indian pulse which can be technically described as yellow split gram. Pulses is the generic name for peas, beans and lentils from the legume family.', '500.00', '540.00', 3, 200, 'kg', 'uploads/product/1632032012.jpg', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-19 00:13:32', '2021-09-19 00:13:32'),
(101, 'Chana Dal', 7, 'Spices & Mixes-loose Daal & Chola', 'Chana Dal', '400.00', '540.00', 3, 10, 'kg', 'uploads/product/1632032103.jpg', 0, 0, NULL, 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-19 00:15:03', '2021-09-19 00:15:03'),
(102, 'Kraft Mayo Garlic Aioli 12 oz Bottle', 8, 'mb-406', 'Kraft Mayo Garlic Aioli (12 oz Bottle)One 12 fl. oz. bottle of Kraft Garlic Aioli - Kraft Garlic Aioli offers a bold taste as a quick, easy flavor enhancer - Intensely flavored', '900.00', '1170.00', 6, 8, 'gm', 'uploads/product/1632032153.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', '6', '2021-09-19 00:15:53', '2021-09-19 00:15:53'),
(104, 'Tong Garden Almonds Smoke Flavor 140g', 11, 'Almond11', 'These smoked almonds are suffused with the savoury scents of quality barbecue. Perfect as a big-game snack, or for unwinding with a beer on the balcony.', '425.00', '450.00', 8, 60, 'gm', 'uploads/product/1632032196.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 's-3', '2021-09-19 00:16:36', '2021-09-19 03:57:45'),
(105, 'Taaza Tea bags', 6, 'ttp-020', 'Taaza Tea bags are made of high quality food grade filter paper and uses food grade strings and thread. Finally, to ensure that the tea remains fresh,', '70.00', '85.00', 30, 150, 'gm', 'uploads/product/1632032204.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'ttp', '2021-09-19 00:16:44', '2021-09-19 00:16:44'),
(106, 'Savlon Twinkle Baby Diapers', 8, 'Savlon_Diapers_746', 'Savlon Twinkle Baby Diaper L', '980.00', '1000.00', 1, 50, 'piece', 'uploads/product/1632032280.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'Baby Food & Care', '2021-09-19 00:18:00', '2021-09-19 00:18:00'),
(107, 'Pure Soyabin oil', 10, 'Soyabin oil', 'Soybean oil is a vegetable oil that’s extracted from the seeds of the soybean plant.\r\n\r\nBetween 2018 and 2019, around 62 million tons (56 million metric tons) of soybean oil were produced around the globe, making it one of the most common cooking oils available (1).', '105.00', '115.00', 15, 20, 'l', 'uploads/product/1632032432.jpg', 0, 1, '6', 1, NULL, '{\"Unit\":[\"kg\"]}', 'cooking', '2021-09-19 00:20:32', '2021-09-19 00:23:47'),
(108, 'ACI Pure Moshur Dal', 7, 'Spices & Mixes-Packaged Daal & Chola', 'ACI Pure Moshur Dal', '400.00', '540.00', 3, 5, 'kg', 'uploads/product/1632032437.jpg', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-19 00:20:37', '2021-09-19 00:58:19'),
(109, 'soya Gold Soyabin oil', 10, 'Soyabin oil', 'Soybean oil is a vegetable oil that’s extracted from the seeds of the soybean plant.\r\n\r\nBetween 2018 and 2019, around 62 million tons (56 million metric tons) of soybean oil were produced around the globe, making it one of the most common cooking oils available (1).', '115.00', '120.00', 15, 30, 'l', 'uploads/product/1632032532.jpg', 0, 1, '7', 1, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-19 00:22:12', '2021-09-19 00:23:21');
INSERT INTO `items` (`id`, `name`, `supplier_id`, `sku`, `description`, `cost_price`, `unit_price`, `reorder_level`, `quantity`, `unit`, `baseimage`, `alt_description`, `has_serial`, `serialno`, `tax1`, `tax2`, `attributes`, `loc`, `created_at`, `updated_at`) VALUES
(110, 'Sun Chips Mix Masala 38g', 11, 'Chips00', '\'Mix Masala\' flavor, a true representation of Bangladesh in a potato chip! Made from exclusive and unique combination of local spices!', '20.00', '25.00', 9, 500, 'gm', 'uploads/product/1632032572.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 's-3', '2021-09-19 00:22:52', '2021-09-19 00:22:52'),
(111, 'Mantova Pomodoro Sauce, 24 oz', 8, 'mb-407', 'Product of Italy All-natural, high-quality ingredients; no preservatives or artificial flavors. Fresh tomato sauce made with 100% Italian tomatoes Simply add spices and fresh', '450.00', '680.00', 7, 12, 'gm', 'uploads/product/1632032597.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', '7', '2021-09-19 00:23:17', '2021-09-19 00:23:17'),
(112, 'Zareen Premium Tea', 6, 'ipt-007', 'Every cup of Zareen Premium Tea is rich in natural antioxidants. Zareen\'s carefully graded tea has almost zero calories and nearly zero fat.', '200.00', '230.00', 30, 250, 'gm', 'uploads/product/1632032652.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 'ipt', '2021-09-19 00:24:12', '2021-09-19 00:24:12'),
(113, 'ACI Pure Sugar', 7, 'Spices & Mixes-suger', 'ACI Pure Sugar', '400.00', '540.00', 3, 200, 'kg', 'uploads/product/1632032653.png', 0, 1, '1', 1, NULL, '{\"Unit\":[\"kg\"]}', 'spices & mixes', '2021-09-19 00:24:13', '2021-09-19 00:24:13'),
(114, 'Clara Olé Béchamel White Sauce 200g', 8, 'mb-408', 'Béchamel sauce is a sauce traditionally made from a white roux and milk. Béchamel may also be referred to as besciamella, besamel, or white sauce French, Italian and Greek Béchamel sauce recipes include salt and nutmeg as a seasoning base. Béchamel sauce is one of the \"mother sauces\" of French', '66.00', '120.00', 8, 25, 'gm', 'uploads/product/1632032980.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', '8', '2021-09-19 00:29:40', '2021-09-19 00:29:40'),
(116, 'Huggies Wonder Pant', 8, 'Wonder_Pant_89', NULL, '800.00', '899.00', 1, 60, 'piece', 'uploads/product/1632033021.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'Baby Food & Care', '2021-09-19 00:30:21', '2021-09-19 00:30:21'),
(117, 'Mama Instant Noodles Chicken Flavor 248g*', 11, 'Noodles01', 'YOUR FAVORITE THAI FLAVOR: enjoy the irresistible hot, spicy and savory Chicken flavor of MAMA noodles anytime of the day (or night!)\r\nLIGHT, CHEWY NOODLES IN A CUP: when cooked according to the recommended time, MAMA Asian noodles strike a delicate balance between chewiness and softness - a perfect match with the hot and spicy Chicken broth.\r\nFEWER CALORIES THAN DEEP-FRIED INSTANT NOODLES: MAMA Chicken instant noodles are air dried via hot air circulation, meaning that they contain fewer calories than their conventional deep fried counterparts.\r\nZERO TRANS FAT: MAMA Chicken Thai noodles don\'t contain any trans fat, so you can relish them with peace of mind.\r\nSPECIFICATIONS OF MAMA INSTANT NOODLES: 60g per bag; 30 bags in a pack, Chicken flavor', '65.00', '70.00', 10, 500, 'gm', 'uploads/product/1632033063.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 's-4', '2021-09-19 00:31:03', '2021-09-19 00:31:03'),
(118, 'Fresh Mustard oil', 10, 'Mustard oil', 'Mastard Oil is a vegetable oil which is deployed in a variety of very different external applications, including skin care products such as creams, lotions, lipsticks, and massage oils. It is also used in hair care products such as shampoos, conditioners and hair tonics.', '105.00', '115.00', 10, 30, 'l', 'uploads/product/1632033268.jpg', 0, 1, '8', 1, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-19 00:34:28', '2021-09-19 00:34:28'),
(119, 'Pro Mustard oil', 10, 'Mustard oil', 'Mastard Oil is a vegetable oil which is deployed in a variety of very different external applications, including skin care products such as creams, lotions, lipsticks, and massage oils. It is also used in hair care products such as shampoos, conditioners and hair tonics.', '112.00', '116.00', 15, 30, 'l', 'uploads/product/1632033504.jpg', 0, 1, '9', 1, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-19 00:38:24', '2021-09-19 00:38:24'),
(120, 'Kolson Vermicelli 200 Gm', 11, 'Vermicelli', 'Kolson Vermicelli 200 Gm', '30.00', '35.00', 11, 50, 'gm', 'uploads/product/1632033713.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 's-4', '2021-09-19 00:41:53', '2021-09-19 00:41:53'),
(121, 'Cufrol organic olive oil', 10, 'Olive oil', 'The antioxidants in olive oil may help protect the body from cellular damage that can lead to a range of health conditions and diseases. Extra virgin olive oil has a bitter flavor, but it contains more antioxidants than other types, as it undergoes the least processing.\r\n\r\nIn this article, find out more about the health benefits of olive oil and find some ideas on how to use it.', '110.00', '115.00', 10, 20, 'l', 'uploads/product/1632033944.jpg', 0, 1, '8', 1, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-19 00:45:44', '2021-09-19 00:47:21'),
(122, 'Texas olive oil', 10, 'Olive oil', 'The antioxidants in olive oil may help protect the body from cellular damage that can lead to a range of health conditions and diseases. Extra virgin olive oil has a bitter flavor, but it contains more antioxidants than other types, as it undergoes the least processing.\r\n\r\nIn this article, find out more about the health benefits of olive oil and find some ideas on how to use it.', '120.00', '125.00', 20, 20, 'l', 'uploads/product/1632034164.jpg', 0, 1, '9', 0, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-19 00:49:24', '2021-09-19 00:50:29'),
(123, 'Nestle Cerelac', 8, 'Baby_Food_99', NULL, '400.00', '500.00', 1, 70, 'piece', 'uploads/product/1632034700.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"pece\"]}', 'Baby Food & Care', '2021-09-19 00:58:20', '2021-09-19 01:27:34'),
(124, 'Kings sunflower oil', 10, 'Sunflower oil', 'Sunflowers are one of the few crops native to the United States. According to some sources, indigenous people likely began to cultivate them around 1000 BC. Sunflower seeds probably didn\'t reach Europe until the 1800s. When sunflower seeds arrived in Russia, their oil content interested farmers. The farmers selectively bred the plants until they almost doubled the oil content of the seeds.', '117.00', '120.00', 20, 20, 'l', 'uploads/product/1632034818.jpg', 0, 1, '10', 0, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-19 01:00:18', '2021-09-19 01:03:54'),
(125, 'Fortune Sunflower oil', 10, 'Sunflower oil', 'Sunflowers are one of the few crops native to the United States. According to some sources, indigenous people likely began to cultivate them around 1000 BC. Sunflower seeds probably didn\'t reach Europe until the 1800s. When sunflower seeds arrived in Russia, their oil content interested farmers. The farmers selectively bred the plants until they almost doubled the oil content of the seeds.', '113.00', '120.00', 15, 30, 'l', 'uploads/product/1632035176.jpg', 0, 1, '11', 1, NULL, '{\"Unit\":[\"pece\"]}', 'cooking', '2021-09-19 01:06:16', '2021-09-19 01:08:05'),
(126, 'Best\'s Whole Kernel Sweet Corn Tin 425g', 11, 'Kernel', 'Best\'s Whole Kernel Sweet Corn Tin 425g', '80.00', '90.00', 14, 100, 'gm', 'uploads/product/1632035554.jpg', 0, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 's-5', '2021-09-19 01:12:34', '2021-09-19 04:08:16'),
(127, 'Best\'s Whole Kernel Sweet Corn Tin 425g', 11, 'Kernel', 'Best\'s Whole Kernel Sweet Corn Tin 425g', '80.00', '90.00', 14, 100, 'gm', 'uploads/product/1632035573.jpg', 1, 0, NULL, 0, NULL, '{\"Unit\":[\"gram\"]}', 's-5', '2021-09-19 01:12:53', '2021-09-19 01:12:53');

-- --------------------------------------------------------

--
-- Table structure for table `item_kits`
--

CREATE TABLE `item_kits` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `baseimage` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_kits`
--

INSERT INTO `item_kits` (`id`, `name`, `description`, `baseimage`, `created_at`, `updated_at`) VALUES
(1, 'first item', 'fjdslfksadj', 'first-item.jpg', '2021-09-18 02:36:10', NULL),
(2, 'Bundle Product', 'Get 2 product and disscount1000 taka', 'Bundle-Product.jpg', '2021-09-18 10:39:33', NULL),
(3, 'Baby Diapers', 'baby diapers bundle', 'Baby-Diapers.jpg', '2021-09-19 00:51:52', NULL),
(4, 'baby food', 'baby food bundle', 'baby-food.jpg', '2021-09-19 01:01:41', NULL),
(5, 'dddd', 'afafsd', 'dddd.jpg', '2021-09-19 03:54:13', NULL),
(6, 'rt', 'tert', 'rt.png', '2021-09-19 04:42:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_kit_products`
--

CREATE TABLE `item_kit_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `item_kits_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `item_kit_products`
--

INSERT INTO `item_kit_products` (`id`, `item_kits_id`, `item_id`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '3.00', '2021-09-18 02:36:10', NULL),
(2, 2, 1, '1.00', '2021-09-18 10:39:33', NULL),
(3, 2, 2, '1.00', '2021-09-18 10:39:33', NULL),
(4, 3, 96, '1.00', '2021-09-19 00:51:52', NULL),
(5, 3, 106, '3.00', '2021-09-19 00:51:52', NULL),
(6, 4, 123, '3.00', '2021-09-19 01:01:42', NULL),
(7, 4, 106, '2.00', '2021-09-19 01:01:42', NULL),
(8, 4, 96, '5.00', '2021-09-19 01:01:42', NULL),
(9, 5, 5, '14.00', '2021-09-19 03:54:13', NULL),
(10, 6, 56, '4.00', '2021-09-19 04:42:51', NULL);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_09_01_182948_create_customers_table', 1),
(5, '2019_09_02_184906_create_suppliers_table', 1),
(6, '2019_09_03_041344_create_categories_table', 1),
(7, '2019_09_04_184055_create_items_table', 1),
(8, '2019_09_05_184457_create_item_kits_table', 1),
(9, '2019_09_06_045603_create_item_kit_products_table', 1),
(10, '2019_09_07_185922_create_employees_table', 1),
(11, '2019_09_08_185622_create_sales_table', 1),
(12, '2019_09_09_053519_create_sales_items_table', 1),
(13, '2019_09_12_044949_create_carts_table', 1),
(14, '2019_09_30_190649_create_storeconfigs_table', 1),
(18, '2021_08_25_064541_create_categories_items_table', 1),
(19, '2021_08_25_064810_create_images_table', 1),
(20, '2021_09_04_165908_create_attributes_table', 1),
(21, '2021_09_04_170043_create_attribute_values_table', 1),
(22, '2021_09_04_170043_create_wishlists_table', 1),
(23, '2021_09_09_094251_create_coupons_table', 1),
(24, '2021_09_09_094646_create_who_useds_table', 1),
(25, '2021_09_12_070934_add_order_status_user_id_in_sales', 1),
(26, '2021_09_12_072445_create_shipping_details_table', 1),
(27, '2021_09_12_124732_add_full_name_to_ship', 1),
(28, '2021_09_17_112302_add_user_id_to_employee', 1),
(34, '2021_08_11_185345_create_receivings_table', 2),
(35, '2021_08_11_185346_receivings_items', 2),
(36, '2021_08_11_190220_create_giftcards_table', 2);

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
-- Table structure for table `receivings`
--

CREATE TABLE `receivings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `supplier_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total` double(8,2) NOT NULL,
  `discount` double(8,2) NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finaltotal` double(8,2) NOT NULL,
  `payment_type` set('cash','bkash','nagad','ucash','rocket') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` set('incomplete','due','complete','partial') COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receivings`
--

INSERT INTO `receivings` (`id`, `invoice_id`, `supplier_id`, `employee_id`, `comments`, `total`, `discount`, `coupon`, `finaltotal`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(2, 'r45-0101010', 1, 2, 'dgf', 200000.00, 0.00, 'nocoupon', 200000.00, 'cash', 'complete', '2021-09-18 08:06:59', NULL),
(5, 'r45-101011', 1, 1, 'hccfcf', 100000.00, 0.00, 'nocoupon', 100000.00, 'cash', 'complete', '2021-09-18 08:25:02', NULL),
(6, 'r45-101012', 1, 1, 'completedd  dfdsf', 294995.00, 95.00, 'nocoupon', 294900.00, 'cash', 'complete', '2021-09-18 10:05:17', NULL),
(7, 'r45-101013', 1, 1, 'sfsfddsd', 569970.00, 0.00, 'nocoupon', 569970.00, 'cash', 'complete', '2021-09-18 10:35:33', NULL),
(8, 'r45-101014', 6, 1, 'COMPLETE', 3000.00, 200.00, 'nocoupon', 2800.00, 'cash', 'complete', '2021-09-19 01:26:14', NULL),
(9, 'r45-101015', 7, 1, 'DONE', 2000.00, 200.00, 'nocoupon', 1800.00, 'cash', 'complete', '2021-09-19 01:27:34', NULL),
(10, 'r45-101016', NULL, 1, 'DONE', 250.00, 20.00, 'nocoupon', 230.00, 'cash', 'complete', '2021-09-19 01:35:23', NULL),
(11, 'r45-101017', 1, 1, 'fDSdd', 10250.00, 0.00, 'nocoupon', 10250.00, 'cash', 'complete', '2021-09-19 03:57:08', NULL),
(12, 'r45-101018', 7, 1, 'done', 250.00, 50.00, 'nocoupon', 200.00, 'cash', 'complete', '2021-09-19 04:35:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receivings_items`
--

CREATE TABLE `receivings_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receivings_id` bigint(20) UNSIGNED DEFAULT NULL,
  `items_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` double(8,2) NOT NULL,
  `unit_price` double(8,2) NOT NULL,
  `discount_percent` double(8,2) NOT NULL,
  `cost_price` double(8,2) NOT NULL,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attributes`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receivings_items`
--

INSERT INTO `receivings_items` (`id`, `receivings_id`, `items_id`, `quantity`, `unit_price`, `discount_percent`, `cost_price`, `attributes`, `created_at`, `updated_at`) VALUES
(2, 2, 1, 2.00, 100000.00, 0.00, 99000.00, '{\"Color\":[\"White\",\"Green\",\"Blue\"]}', '2021-09-18 08:06:59', NULL),
(3, 5, 1, 1.00, 100000.00, 0.00, 99000.00, '{\"Color\":[\"White\",\"Green\",\"Blue\"]}', '2021-09-18 08:25:02', NULL),
(4, 6, 1, 2.00, 100000.00, 0.00, 99000.00, '{\"Color\":[\"White\",\"Green\",\"Blue\"]}', '2021-09-18 10:05:17', NULL),
(5, 6, 2, 5.00, 18999.00, 0.00, 17800.00, '{\"Color\":[\"White\",\"Blue\"]}', '2021-09-18 10:05:17', NULL),
(6, 7, 2, 30.00, 18999.00, 0.00, 17800.00, '{\"Color\":[\"White\",\"Blue\"]}', '2021-09-18 10:35:33', NULL),
(7, 8, 123, 6.00, 500.00, 0.00, 400.00, '{\"Unit\":[\"pece\"]}', '2021-09-19 01:26:14', NULL),
(8, 9, 123, 4.00, 500.00, 0.00, 400.00, '{\"Unit\":[\"pece\"]}', '2021-09-19 01:27:34', NULL),
(9, 10, 5, 5.00, 50.00, 0.00, 45.00, '{\"Unit\":[\"gram\"]}', '2021-09-19 01:35:23', NULL),
(10, 11, 5, 25.00, 50.00, 0.00, 45.00, '{\"Unit\":[\"gram\"]}', '2021-09-19 03:57:08', NULL),
(11, 11, 104, 20.00, 450.00, 0.00, 425.00, '{\"Unit\":[\"gram\"]}', '2021-09-19 03:57:09', NULL),
(12, 12, 5, 5.00, 50.00, 0.00, 45.00, '{\"Unit\":[\"gram\"]}', '2021-09-19 04:35:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reports`
--

CREATE TABLE `reports` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total` double NOT NULL,
  `discount` double NOT NULL,
  `coupon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `finaltotal` double NOT NULL,
  `payment_type` set('cash','bkash','nagad','ucash','rocket') COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` set('incomplete','due','complete','partial') COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale_type` set('store','web') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `order_status` set('pending','processing','shipped') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`id`, `invoice_id`, `customer_id`, `employee_id`, `comments`, `total`, `discount`, `coupon`, `finaltotal`, `payment_type`, `payment_status`, `sale_type`, `user_id`, `created_at`, `updated_at`, `order_status`) VALUES
(3, '45-1010126', 2, 1, 'dfsearhare', 200000, 2, 'nocoupon', 199998, 'cash', 'complete', 'store', NULL, '2021-09-18 02:50:44', NULL, 'pending'),
(5, '45-1010128', NULL, NULL, '645132sdfs', 256997, 0, NULL, 256997, 'cash', 'incomplete', 'web', 1, '2021-09-18 10:01:53', '2021-09-18 10:03:37', 'processing'),
(6, '45-1010129', 2, 2, 'gfaasfsaea', 1925, 25, 'nocoupon', 1900, 'cash', 'complete', 'store', NULL, '2021-09-19 00:39:47', NULL, 'pending'),
(7, '45-1010130', 2, 1, 'Done Payment', 4550, 50, 'nocoupon', 4500, 'cash', 'complete', 'store', NULL, '2021-09-19 00:58:18', NULL, 'pending'),
(8, '45-1010131', 3, 1, 'sadfdsadsa', 19725, 25, 'nocoupon', 19700, 'cash', 'complete', 'store', NULL, '2021-09-19 01:02:19', NULL, 'pending'),
(9, '45-1010132', 3, 1, 'order complete.', 7400, -0, 'nocoupon', 7400, 'cash', 'complete', 'store', NULL, '2021-09-19 01:08:45', NULL, 'pending'),
(10, '45-1010133', 3, 2, 'redmi, red one pls\niphone golden one id available, otherwise regular color', 122580, 80, 'nocoupon', 122500, 'cash', 'complete', 'store', NULL, '2021-09-19 01:21:05', NULL, 'pending'),
(13, '45-1010134', 2, 1, 'done', 600, 100, 'nocoupon', 500, 'cash', 'complete', 'store', NULL, '2021-09-19 04:44:53', NULL, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `sales_items`
--

CREATE TABLE `sales_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` bigint(20) UNSIGNED DEFAULT NULL,
  `items_id` bigint(20) UNSIGNED DEFAULT NULL,
  `quantity` double NOT NULL,
  `unit_price` double NOT NULL,
  `cost_price` double NOT NULL,
  `discount_percent` double NOT NULL DEFAULT 0,
  `attributes` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`attributes`)),
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sales_items`
--

INSERT INTO `sales_items` (`id`, `sales_id`, `items_id`, `quantity`, `unit_price`, `cost_price`, `discount_percent`, `attributes`, `created_at`, `updated_at`) VALUES
(3, 3, 1, 2, 100000, 99000, 0, '{\"Color\":[\"White\",\"Green\",\"Blue\"]}', '2021-09-18 02:50:44', NULL),
(5, 5, 1, 2, 100000, 99000, 0, NULL, '2021-09-18 10:01:54', '2021-09-18 10:01:54'),
(6, 5, 2, 3, 18999, 17800, 0, NULL, '2021-09-18 10:01:54', '2021-09-18 10:01:54'),
(7, 6, 5, 2, 50, 45, 0, '{\"Unit\":[\"gram\"]}', '2021-09-19 00:39:47', NULL),
(8, 6, 48, 5, 185, 170, 0, '{\"Unit\":[\"pece\"]}', '2021-09-19 00:39:47', NULL),
(9, 6, 104, 2, 450, 425, 0, '{\"Unit\":[\"gram\"]}', '2021-09-19 00:39:48', NULL),
(10, 7, 108, 5, 540, 400, 0, '{\"Unit\":[\"kg\"]}', '2021-09-19 00:58:19', NULL),
(11, 7, 48, 10, 185, 170, 0, '{\"Unit\":[\"pece\"]}', '2021-09-19 00:58:19', NULL),
(12, 8, 5, 8, 50, 45, 0, '{\"Unit\":[\"gram\"]}', '2021-09-19 01:02:20', NULL),
(13, 8, 48, 85, 185, 170, 0, '{\"Unit\":[\"pece\"]}', '2021-09-19 01:02:20', NULL),
(14, 8, 104, 8, 450, 425, 0, '{\"Unit\":[\"gram\"]}', '2021-09-19 01:02:20', NULL),
(15, 9, 48, 40, 185, 170, 0, '{\"Unit\":[\"pece\"]}', '2021-09-19 01:08:45', NULL),
(16, 10, 86, 1, 30, 24, 0, '{\"Unit\":[\"pece\"]}', '2021-09-19 01:21:05', NULL),
(17, 10, 33, 1, 550, 525, 0, '{\"Unit\":[\"kg\"]}', '2021-09-19 01:21:05', NULL),
(18, 10, 1, 1, 100000, 99000, 0, '{\"Color\":[\"White\",\"Green\",\"Blue\"]}', '2021-09-19 01:21:06', NULL),
(19, 10, 4, 1, 22000, 18000, 0, '{\"Color\":[\"White\",\"Green\"],\"Unit\":[\"pece\"]}', '2021-09-19 01:21:06', NULL),
(24, 13, 5, 12, 50, 45, 0, '{\"Unit\":[\"gram\"]}', '2021-09-19 04:44:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `shipping_details`
--

CREATE TABLE `shipping_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sales_id` bigint(20) UNSIGNED DEFAULT NULL,
  `full_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping_details`
--

INSERT INTO `shipping_details` (`id`, `sales_id`, `full_name`, `company_name`, `email`, `phone`, `address`, `country`, `state`, `city`, `created_at`, `updated_at`) VALUES
(3, 5, 'Andrea', 'lolly', 'andrea@gmail.com', '74512', 'rtuyvibjlnk', 'bd', 'dk', 'dk', '2021-09-18 10:01:53', '2021-09-18 10:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `storeconfigs`
--

CREATE TABLE `storeconfigs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `storeconfigs`
--

INSERT INTO `storeconfigs` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'address', '123 Nowhere street', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(2, 'barcode_content', 'id', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(3, 'barcode_first_row', 'name', '2021-08-25 00:39:44', '2021-09-15 19:35:42'),
(4, 'barcode_font', 'Arial.ttf', '2021-08-25 00:39:44', '2021-09-15 19:35:42'),
(5, 'barcode_font_size', '10', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(6, 'barcode_generate_if_empty', '0', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(7, 'barcode_height', '50', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(8, 'barcode_num_in_row', '2', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(9, 'barcode_page_cellspacing', '20', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(10, 'barcode_page_width', '100', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(11, 'barcode_quality', '100', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(12, 'barcode_second_row', 'category', '2021-08-25 00:39:44', '2021-09-15 19:35:42'),
(13, 'barcode_third_row', 'cost_price', '2021-08-25 00:39:44', '2021-09-15 19:35:43'),
(14, 'barcode_type', 'Code128', '2021-08-25 00:39:44', '2021-09-15 19:27:37'),
(15, 'barcode_width', '250', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(16, 'company', 'R-45 POS', '2021-08-25 00:39:44', '2021-09-18 23:38:38'),
(17, 'company_logo', NULL, '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(18, 'country_codes', 'us', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(19, 'currency_decimals', '2', '2021-08-25 00:39:44', '2021-09-15 19:20:48'),
(20, 'currency_symbol', '$', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(21, 'dateformat', 'Y/m/d', '2021-08-25 00:39:44', '2021-09-15 19:20:49'),
(22, 'default_sales_discount', '0', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(23, 'default_tax_rate', '8', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(24, 'email', 'andrea@gmail.com', '2021-08-25 00:39:44', '2021-09-15 18:33:32'),
(25, 'fax', '65456', '2021-08-25 00:39:44', '2021-09-15 18:34:11'),
(26, 'invoice_default_comments', 'This is a default comment', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(27, 'invoice_email_message', 'Dear $CU, In attachment the receipt for sale $INV', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(28, 'invoice_enable', '1', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(29, 'language', 'en:english', '2021-08-25 00:39:44', '2021-09-18 23:39:02'),
(30, 'language_code', 'en', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(31, 'lines_per_page', '25', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(32, 'mailpath', '/usr/sbin/sendmail', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(33, 'msg_msg', '', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(34, 'msg_pwd', '', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(35, 'msg_src', '', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(36, 'msg_uid', '', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(37, 'notify_horizontal_position', 'center', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(38, 'notify_vertical_position', 'bottom', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(39, 'number_locale', 'en_US', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(40, 'payment_options_order', 'debitcreditcash', '2021-08-25 00:39:44', '2021-09-15 19:20:48'),
(41, 'phone', '04564657', '2021-08-25 00:39:44', '2021-09-15 18:33:32'),
(42, 'print_bottom_margin', '0', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(43, 'print_footer', '0', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(44, 'print_header', '0', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(45, 'print_left_margin', '0', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(46, 'print_right_margin', '0', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(47, 'print_silently', '1', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(48, 'print_top_margin', '0', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(49, 'protocol', 'mail', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(50, 'quantity_decimals', '2', '2021-08-25 00:39:44', '2021-09-15 19:20:48'),
(51, 'receipt_show_description', '1', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(52, 'receipt_show_serialnumber', '1', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(53, 'receipt_show_taxes', '0', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(54, 'receipt_show_total_discount', '1', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(55, 'receipt_template', 'receipt_default', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(56, 'recv_invoice_format', '$CO', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(57, 'return_policy', 'Test', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(58, 'sales_invoice_format', '$CO', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(59, 'smtp_crypto', 'ssl', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(60, 'smtp_port', '465', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(61, 'smtp_timeout', '5', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(62, 'statistics', '1', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(63, 'tax_decimals', '2', '2021-08-25 00:39:44', '2021-09-15 19:20:48'),
(64, 'tax_included', '0', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(65, 'theme', 'center', '2021-08-25 00:39:44', '2021-09-15 18:53:41'),
(66, 'thousands_separator', '1', '2021-08-25 00:39:44', '2021-08-25 00:39:44'),
(67, 'timeformat', 'h:i:s a', '2021-08-25 00:39:44', '2021-09-15 19:20:49'),
(68, 'timezone', 'America/Kentucky/Monticello', '2021-08-25 00:39:44', '2021-09-15 19:20:49'),
(69, 'website', 'http://ecommpos.com', '2021-08-25 00:39:44', '2021-08-27 16:20:59'),
(76, 'established', '1953', '2021-08-27 16:21:32', '2021-08-27 16:21:32'),
(77, 'companyadd', 'DEV', '2021-09-14 07:17:20', '2021-09-15 18:33:45'),
(78, 'web', 'https://www.google.com/', '2021-09-15 18:15:48', '2021-09-15 18:33:26'),
(79, 'companylogo', '1632045538.png', '2021-09-15 18:20:28', '2021-09-19 03:58:58'),
(80, 'policy', 'fdsa', '2021-09-15 18:33:26', '2021-09-15 18:34:11'),
(81, 'tax1', '50', '2021-09-15 18:44:51', '2021-09-15 18:50:37'),
(82, 'cprice', '10', '2021-09-15 18:44:51', '2021-09-15 18:53:41'),
(83, 'area1', 'top', '2021-09-15 18:44:51', '2021-09-15 18:44:51'),
(84, 'area2', 'left', '2021-09-15 18:44:51', '2021-09-15 18:44:51'),
(85, 'c1', '55', '2021-09-15 18:44:51', '2021-09-15 18:53:41'),
(86, 'c12', NULL, '2021-09-15 18:44:51', '2021-09-15 18:44:51'),
(87, 'include_tax', '1', '2021-09-15 18:50:37', '2021-09-15 18:50:37'),
(88, 'line_per_page', '30', '2021-09-15 18:50:37', '2021-09-15 18:53:41'),
(89, 'calc_avg_price', '1', '2021-09-15 18:53:41', '2021-09-15 18:53:41'),
(90, 'send_statistc', '1', '2021-09-15 18:53:41', '2021-09-15 18:53:41'),
(91, 'c2', '55', '2021-09-15 18:53:41', '2021-09-15 18:53:41'),
(92, 'symble', '$', '2021-09-15 19:08:02', '2021-09-15 19:20:48'),
(93, 'ccode', 'us', '2021-09-15 19:08:02', '2021-09-15 19:08:02'),
(94, 'qty', '102', '2021-09-15 19:23:26', '2021-09-15 19:23:26'),
(95, 'width', '251', '2021-09-15 19:23:26', '2021-09-15 19:27:25'),
(96, 'weight', '49', '2021-09-15 19:23:26', '2021-09-15 19:35:42'),
(97, 'font', '10', '2021-09-15 19:23:26', '2021-09-15 19:23:26'),
(98, 'numrow', '2', '2021-09-15 19:23:26', '2021-09-15 19:23:26'),
(99, 'dpw', '101', '2021-09-15 19:23:26', '2021-09-15 19:35:43'),
(100, 'dpc', '204', '2021-09-15 19:23:26', '2021-09-15 19:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agency_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` set('m','f','o') COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(60) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address1` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address2` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zip` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `country` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comments` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `user_id`, `company_name`, `agency_name`, `account_number`, `first_name`, `last_name`, `gender`, `phone`, `email`, `address1`, `address2`, `city`, `state`, `zip`, `country`, `comments`, `created_at`, `updated_at`) VALUES
(1, NULL, 'supplier', 'AtoZ supplierManagement', '764556848', 'First', 'supplier', 'm', '767678', 'supplier@gmail.com', 'bd', 'bd', 'bd', 'bd', '465', 'bd', 'zvgsdVDV', NULL, '2021-09-18 02:56:53'),
(2, NULL, 'supp2', 'supp2', '46465', 'supp2', 'supp2', 'm', '46535', 'supp2@gmail.com', 'ssa', 'fdsfsd', 'safsa', 'asf', '4646', 'sfd', 'svsdfsda', NULL, NULL),
(3, NULL, 'Nabisco', 'Nabisco.com', '987654321', 'Tamanna', 'Chadni', 'm', '01711345687', 'tamanna@gmail.com', 'mirpur road', 'Dhaka', 'Bangladesh', 'Bangladesh', '1200', 'Bangladesh', 'National Biscuit Company introduced a snack in a sealed packet called the Peanut Sandwich Packet.', NULL, NULL),
(4, NULL, 'Agro Vegetables', 'Agro Vegetables', '00112233', 'Mehedi', 'Hasan', 'o', '01750952867', 'mehedihasan@gmail.com', 'Dhaka', 'Dhaka', 'Dhaka', 'Dhaka', '1216', 'Bangladesh', 'Now I am verify supplier', NULL, NULL),
(5, NULL, 'Meat and Fish LIT.', 'Meat and Fish LIT.', '0043526', 'Rabeya', 'Sultana', 'f', '01921535368', 'rabeya@gmail.com', 'mirpur1', 'mirpur1', 'dhaka', 'bangladesh', '12143', 'Bangladesh', 'best product', NULL, NULL),
(6, NULL, 'Pran food & bevarage', 'Pran food & bevarage', '18015000003698', 'Pran', 'Pran', 'm', '01775536198', 'kaziemam007@gmail.com', 'Adabor. Dhaka', 'shyamoli. Dhaka', 'dhaka', 'Dhaka', '8530', 'bangladesh', 'Largest drinking Water supplier', NULL, NULL),
(7, NULL, 'Spices & Mixes', 'spices_mixes.com', '555555555', 'Ayesha', 'Akther', 'f', '01764055600', 'ayeshaakhter222@gmail.com', '160/1,East Raza Bazar, Firmgate, Dhaka', '160/1,East Raza Bazar, Firmgate, Dhaka', 'Dhaka', 'Dhaka', '555', 'Bangladesh', 'spices & mixes', NULL, NULL),
(8, NULL, 'Meena Bazaar', 'Hayder Food', '05321', 'Hasin', 'Hayder', 'm', '01852456874', 'hasin@gmail.com', 'New Elephant Rd', 'Dhaka 1205', 'Dhaka', 'Dhaka', '1205', 'Bangladesh', 'Online & Offline Store', NULL, NULL),
(9, NULL, 'Xiaomi', 'MI', '234543543555', 'Xioami', 'MI', 'm', '123123123', 'mi@mi.com', 'Dhaka', 'Dhaka', 'Dhaka', 'Dhaka', '1216', 'Bangladesh', 'https://www.mi.com/', NULL, NULL),
(10, NULL, 'The kitchen', 'thekithen.com', '12347890', 'Shamima', 'Hossain', 'm', '0198743289', 'shamimahossain@gmail.com', 'Rokeya Soroni, Mirpur, Dhaka', '310 Elephant Road, Dhaka', 'Dhaka', 'Dhaka', '9703', 'Bangladesh', 'supply the fresh and best organic products.', NULL, NULL),
(11, NULL, 'saiktbd', 'saiktbd', '125125', 'MD Mamun', 'Billah', 'm', '+8801325645630', 'billah@gmail.com', '10/2, Bijoy street, Dhaka-1202', '10/2, Bijoy street, Dhaka-1202', 'Dhaka', 'Dhaka', '1202', 'Bangladesh', 'Quality in a product or service is not what the supplier puts in. it is what the customer gets out and is willing to pay for. A product is not quality because it is hard to make and costs a lot of money, as manufacturers typically believe.', NULL, NULL),
(12, NULL, 'RFl Plastic', 'Rose house', '4000005', 'Sabbir', 'hossin', 'm', '0124457789', 'sabbir@gmail.com', 'mirpur', 'Shrewrapara', 'Dhaka', 'dhaka', '5002', 'Bangladesh', 'this is rfl company products', NULL, NULL),
(13, NULL, 'Jamuna Furniture', 'River Himel', '4000007', 'Nowroj', 'Shajeed', 'm', '12554877', 'nshajeed@gmail.com', 'mirpur', 'Shrewrapara', 'Dhaka', 'dhaka', '5003', 'Bangladesh', 'this is jumma furniture products', NULL, NULL);

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
  `role` set('1','2','3','4','5') COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'user', 'user@gmail.com', NULL, '$2y$10$rdZSQ/qIH5wDDYvGAPZzdOHxcexT1IDIIY9rQkRX41Vf2V6G2lS7e', '2', NULL, '2021-09-18 02:14:04', '2021-09-18 02:14:04'),
(2, 'admin', 'admin@gmail.com', NULL, '$2y$10$bHw1L8v9cV.u0vrbHH0OSud4unpvl6rQek2F6Ck.ofyfTbH5wOKdC', '1', NULL, '2021-09-18 02:15:37', '2021-09-18 02:15:37'),
(3, 'Employee', 'employee@gmail.com', NULL, '$2y$10$4Ka8pRdOD7sG6VVGqz4jReRQldr1Crtd4oeQAhZ25KprBSoSodxWm', '5', NULL, '2021-09-18 02:35:27', '2021-09-18 02:35:27'),
(4, 'employee2', 'employe44e@gmail.com', NULL, '$2y$10$ivSXJe584QsmK7T8Vgl3Ue1bfIkJee1UbQn0B3SkIHhHhBwH6NiJC', '5', NULL, '2021-09-18 07:20:21', '2021-09-18 07:20:21'),
(5, 'mamun', 'mamun@gmail.com', NULL, '$2y$10$eegqV/Vo2O40PysbMeb1qu9h./relm4TKEDJihpAKdrBrS6xMXQXW', '1', NULL, '2021-09-18 21:58:07', '2021-09-18 21:58:13'),
(6, 'mehedi', 'mehedi@gmail.com', NULL, '$2y$10$JuqrmYzGxQaBn4t5hBgoTuROiAicjP1yB5qX4.fMVlo4DrLAJqVbG', '1', NULL, '2021-09-18 21:58:29', '2021-09-18 21:58:57'),
(7, 'Tamanna', 'tamanna@gmail.com', NULL, '$2y$10$jCL1s9FDPgiuG.xo9/Lb6.SXXEptt3LD7wjp6./Icf41Tm9ZA0K6e', '1', NULL, '2021-09-18 21:58:33', '2021-09-18 21:58:54'),
(8, 'KAZI EMAM', 'kaziemam007@gmail.com', NULL, '$2y$10$1dRCNnMzKWe7zbj3zAZjweqRH1BC2WuieHE//N.h0KX.U9nbeoWYW', '1', NULL, '2021-09-18 21:58:37', '2021-09-18 21:58:51'),
(9, 'rabeya', 'rabeya@gmail.com', NULL, '$2y$10$NfXBbGTJ4OegojVt2geEWO6ca93GoisDUrgFRhqCLkgf4e7S2a43e', '1', NULL, '2021-09-18 21:59:04', '2021-09-18 22:00:17'),
(10, 'sharmin', 'sharminmeena24h@gmail.com', NULL, '$2y$10$WyBVGBkgrPeZGaTqgwtGJeALmjR4S2eoZzs4M4SLAegEO48m2ImAO', '1', NULL, '2021-09-18 21:59:23', '2021-09-18 22:00:20'),
(11, 'Sahadat Hossain', 'shantotech@gmail.com', NULL, '$2y$10$NynOqvTzJuYa5QVpVM.KM.2dA8wYybYDyUhgwSurY4EVem8tIQ61.', '1', NULL, '2021-09-18 21:59:28', '2021-09-18 22:00:22'),
(12, 'Ayesha Akther', 'ayesha@gmail.com', NULL, '$2y$10$lOWBZc1xKcCVov/Yia/7uOYjC9oK0pZvmXUMHggSViNONav3Xz3g2', '2', NULL, '2021-09-18 21:59:36', '2021-09-19 02:08:01'),
(13, 'Waliur Rahman', 'saikt@gmail.com', NULL, '$2y$10$KEzhbslxSwZRfIRq804XNu358W9FY7OC2ZRxvb9LKTYDOTdt2GCza', '1', NULL, '2021-09-18 22:01:30', '2021-09-18 22:02:37'),
(14, 'mujammel', 'mujammel@gmail.com', NULL, '$2y$10$5uQ8xDNrqPY3ruPCWA20wuxC/Ek06Rkb4s1mQE4H9v2iTINuouDGS', '1', NULL, '2021-09-18 22:01:32', '2021-09-18 22:02:39'),
(15, 'emp112345', 'emp1@gmail.com', NULL, '$2y$10$b/dHXolHubvCsLGHM4daEeV1Vzo6ofmfEGRsR0dfu8E5OMAFGBKpy', '5', NULL, '2021-09-18 22:16:41', '2021-09-18 22:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `who_useds`
--

CREATE TABLE `who_useds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `coupon_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `who_useds`
--

INSERT INTO `who_useds` (`id`, `user_id`, `coupon_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2021-09-18 02:32:47', NULL),
(2, 1, 2, '2021-09-19 04:05:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `item_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `item_id`, `created_at`, `updated_at`) VALUES
(3, 12, 1, NULL, NULL),
(4, 12, 2, NULL, NULL),
(5, 12, 3, NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attributes`
--
ALTER TABLE `attributes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attribute_values_attribute_id_foreign` (`attribute_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `carts_user_id_foreign` (`user_id`),
  ADD KEY `carts_item_id_foreign` (`item_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_items`
--
ALTER TABLE `categories_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_items_category_id_foreign` (`category_id`),
  ADD KEY `categories_items_item_id_foreign` (`item_id`);

--
-- Indexes for table `coupons`
--
ALTER TABLE `coupons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customers_user_id_foreign` (`user_id`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `employees_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `giftcards`
--
ALTER TABLE `giftcards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `giftcards_customer_id_foreign` (`customer_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `images_item_id_foreign` (`item_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `items_supplier_id_foreign` (`supplier_id`);

--
-- Indexes for table `item_kits`
--
ALTER TABLE `item_kits`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_kit_products`
--
ALTER TABLE `item_kit_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `item_kit_products_item_kits_id_foreign` (`item_kits_id`),
  ADD KEY `item_kit_products_item_id_foreign` (`item_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `receivings`
--
ALTER TABLE `receivings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receivings_supplier_id_foreign` (`supplier_id`),
  ADD KEY `receivings_employee_id_foreign` (`employee_id`);

--
-- Indexes for table `receivings_items`
--
ALTER TABLE `receivings_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receivings_items_receivings_id_foreign` (`receivings_id`),
  ADD KEY `receivings_items_items_id_foreign` (`items_id`);

--
-- Indexes for table `reports`
--
ALTER TABLE `reports`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_customer_id_foreign` (`customer_id`),
  ADD KEY `sales_employee_id_foreign` (`employee_id`),
  ADD KEY `sales_user_id_foreign` (`user_id`);

--
-- Indexes for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sales_items_sales_id_foreign` (`sales_id`),
  ADD KEY `sales_items_items_id_foreign` (`items_id`);

--
-- Indexes for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shipping_details_sales_id_foreign` (`sales_id`);

--
-- Indexes for table `storeconfigs`
--
ALTER TABLE `storeconfigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suppliers_user_id_foreign` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `who_useds`
--
ALTER TABLE `who_useds`
  ADD PRIMARY KEY (`id`),
  ADD KEY `who_useds_user_id_foreign` (`user_id`),
  ADD KEY `who_useds_coupon_id_foreign` (`coupon_id`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`),
  ADD KEY `wishlists_user_id_foreign` (`user_id`),
  ADD KEY `wishlists_item_id_foreign` (`item_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attributes`
--
ALTER TABLE `attributes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `attribute_values`
--
ALTER TABLE `attribute_values`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT for table `categories_items`
--
ALTER TABLE `categories_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `coupons`
--
ALTER TABLE `coupons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giftcards`
--
ALTER TABLE `giftcards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=375;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT for table `item_kits`
--
ALTER TABLE `item_kits`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `item_kit_products`
--
ALTER TABLE `item_kit_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `receivings`
--
ALTER TABLE `receivings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `receivings_items`
--
ALTER TABLE `receivings_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `reports`
--
ALTER TABLE `reports`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `sales_items`
--
ALTER TABLE `sales_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `shipping_details`
--
ALTER TABLE `shipping_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `storeconfigs`
--
ALTER TABLE `storeconfigs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `who_useds`
--
ALTER TABLE `who_useds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attribute_values`
--
ALTER TABLE `attribute_values`
  ADD CONSTRAINT `attribute_values_attribute_id_foreign` FOREIGN KEY (`attribute_id`) REFERENCES `attributes` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `carts_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `carts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories_items`
--
ALTER TABLE `categories_items`
  ADD CONSTRAINT `categories_items_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `categories_items_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `giftcards`
--
ALTER TABLE `giftcards`
  ADD CONSTRAINT `giftcards_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `images`
--
ALTER TABLE `images`
  ADD CONSTRAINT `images_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`);

--
-- Constraints for table `items`
--
ALTER TABLE `items`
  ADD CONSTRAINT `items_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `item_kit_products`
--
ALTER TABLE `item_kit_products`
  ADD CONSTRAINT `item_kit_products_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `item_kit_products_item_kits_id_foreign` FOREIGN KEY (`item_kits_id`) REFERENCES `item_kits` (`id`);

--
-- Constraints for table `receivings`
--
ALTER TABLE `receivings`
  ADD CONSTRAINT `receivings_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `receivings_supplier_id_foreign` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `receivings_items`
--
ALTER TABLE `receivings_items`
  ADD CONSTRAINT `receivings_items_items_id_foreign` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `receivings_items_receivings_id_foreign` FOREIGN KEY (`receivings_id`) REFERENCES `receivings` (`id`);

--
-- Constraints for table `sales`
--
ALTER TABLE `sales`
  ADD CONSTRAINT `sales_customer_id_foreign` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `sales_employee_id_foreign` FOREIGN KEY (`employee_id`) REFERENCES `employees` (`id`),
  ADD CONSTRAINT `sales_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `sales_items`
--
ALTER TABLE `sales_items`
  ADD CONSTRAINT `sales_items_items_id_foreign` FOREIGN KEY (`items_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `sales_items_sales_id_foreign` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `shipping_details`
--
ALTER TABLE `shipping_details`
  ADD CONSTRAINT `shipping_details_sales_id_foreign` FOREIGN KEY (`sales_id`) REFERENCES `sales` (`id`);

--
-- Constraints for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD CONSTRAINT `suppliers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `who_useds`
--
ALTER TABLE `who_useds`
  ADD CONSTRAINT `who_useds_coupon_id_foreign` FOREIGN KEY (`coupon_id`) REFERENCES `coupons` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `who_useds_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Constraints for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD CONSTRAINT `wishlists_item_id_foreign` FOREIGN KEY (`item_id`) REFERENCES `items` (`id`),
  ADD CONSTRAINT `wishlists_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
