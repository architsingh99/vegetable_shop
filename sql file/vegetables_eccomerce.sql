-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 17, 2020 at 11:39 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vegetables_eccomerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `product_id`, `quantity`, `created_at`, `updated_at`) VALUES
(10, 21, 15, 200, '2020-05-10 19:57:26', '2020-05-10 19:57:26'),
(11, 21, 13, 500, '2020-05-10 19:57:29', '2020-05-10 19:57:29'),
(12, 21, 16, 200, '2020-05-10 19:57:32', '2020-05-10 19:57:32'),
(13, 22, 15, 200, '2020-05-10 20:30:49', '2020-05-10 20:30:49'),
(14, 22, 16, 200, '2020-05-10 20:30:51', '2020-05-10 20:30:51'),
(15, 22, 14, 500, '2020-05-10 20:30:53', '2020-05-10 20:30:53'),
(16, 22, 13, 500, '2020-05-10 20:30:55', '2020-05-10 20:30:55'),
(20, 26, 16, 200, '2020-05-11 08:33:00', '2020-05-11 08:33:00'),
(21, 26, 15, 200, '2020-05-11 08:33:12', '2020-05-11 08:33:12'),
(22, 26, 13, 500, '2020-05-11 08:33:21', '2020-05-11 08:33:21'),
(23, 26, 8, 500, '2020-05-11 08:33:34', '2020-05-11 08:33:34'),
(24, 26, 4, 500, '2020-05-11 08:33:41', '2020-05-11 08:33:41'),
(25, 26, 9, 500, '2020-05-11 08:35:38', '2020-05-11 08:35:38'),
(26, 27, 14, 500, '2020-05-11 08:55:21', '2020-05-11 08:55:21'),
(27, 27, 11, 250, '2020-05-11 08:55:32', '2020-05-11 08:55:32'),
(28, 27, 12, 250, '2020-05-11 08:55:46', '2020-05-11 08:55:46'),
(29, 28, 16, 200, '2020-05-11 09:02:43', '2020-05-11 09:02:43'),
(30, 28, 6, 1000, '2020-05-11 09:03:00', '2020-05-11 09:03:00'),
(35, 25, 9, 500, '2020-05-11 11:00:40', '2020-05-11 11:00:40'),
(36, 25, 7, 500, '2020-05-11 11:00:55', '2020-05-11 11:00:55'),
(37, 25, 6, 500, '2020-05-11 11:01:11', '2020-05-11 11:01:11'),
(38, 29, 16, 400, '2020-05-11 11:45:57', '2020-05-11 11:45:57'),
(39, 29, 15, 200, '2020-05-11 11:46:05', '2020-05-11 11:46:05'),
(40, 29, 13, 500, '2020-05-11 11:46:14', '2020-05-11 11:46:14'),
(41, 29, 14, 500, '2020-05-11 11:47:59', '2020-05-11 11:47:59'),
(53, 36, 13, 1000, '2020-05-12 15:46:06', '2020-05-12 15:46:06'),
(54, 36, 14, 1000, '2020-05-12 15:46:15', '2020-05-12 15:46:15'),
(59, 37, 15, 16000, '2020-05-12 16:33:14', '2020-05-12 16:33:14'),
(60, 38, 16, 3000, '2020-05-12 17:01:48', '2020-05-12 17:01:48'),
(61, 38, 15, 2000, '2020-05-12 17:01:51', '2020-05-12 17:01:51'),
(62, 38, 11, 1000, '2020-05-12 17:01:55', '2020-05-12 17:01:55'),
(69, 34, 9, 500, '2020-05-12 19:42:40', '2020-05-12 19:42:40'),
(70, 34, 13, 500, '2020-05-12 19:44:51', '2020-05-12 19:44:51'),
(71, 34, 10, 2000, '2020-05-12 19:45:06', '2020-05-12 19:45:06'),
(72, 34, 12, 1000, '2020-05-12 19:45:11', '2020-05-12 19:45:11'),
(73, 34, 8, 1500, '2020-05-12 19:45:17', '2020-05-12 19:45:17'),
(74, 34, 6, 500, '2020-05-12 19:45:21', '2020-05-12 19:45:21'),
(75, 34, 5, 2000, '2020-05-12 19:45:25', '2020-05-12 19:45:25'),
(76, 34, 7, 4000, '2020-05-12 19:46:19', '2020-05-12 19:46:19'),
(77, 34, 16, 800, '2020-05-12 19:46:46', '2020-05-12 19:46:46'),
(80, 39, 27, 2000, '2020-05-12 21:11:02', '2020-05-12 21:11:02'),
(81, 39, 26, 1000, '2020-05-12 21:11:07', '2020-05-12 21:11:07'),
(82, 39, 25, 500, '2020-05-12 21:11:11', '2020-05-12 21:11:11'),
(83, 39, 24, 2000, '2020-05-12 21:11:14', '2020-05-12 21:11:14'),
(87, 39, 32, 500, '2020-05-12 21:26:56', '2020-05-12 21:26:56'),
(88, 39, 31, 500, '2020-05-12 21:26:58', '2020-05-12 21:26:58'),
(89, 39, 30, 500, '2020-05-12 21:27:01', '2020-05-12 21:27:01'),
(90, 39, 29, 500, '2020-05-12 21:27:10', '2020-05-12 21:27:10'),
(91, 34, 26, 500, '2020-05-12 21:52:30', '2020-05-12 21:52:30'),
(92, 34, 25, 500, '2020-05-12 21:52:34', '2020-05-12 21:52:34'),
(93, 34, 27, 2000, '2020-05-12 21:52:36', '2020-05-12 21:52:36'),
(101, 51, 22, 2, '2020-05-12 23:56:17', '2020-05-12 23:56:17'),
(116, 34, 32, 5500, '2020-05-13 06:18:39', '2020-05-13 06:18:39'),
(117, 34, 33, 4000, '2020-05-13 06:18:51', '2020-05-13 06:18:51'),
(118, 34, 30, 1500, '2020-05-13 06:19:00', '2020-05-13 06:19:00'),
(119, 34, 28, 1500, '2020-05-13 06:19:10', '2020-05-13 06:19:10'),
(120, 34, 23, 500, '2020-05-13 06:19:15', '2020-05-13 06:19:15'),
(122, 50, 32, 1000, '2020-05-13 07:22:43', '2020-05-13 07:22:43'),
(123, 50, 31, 500, '2020-05-13 07:39:42', '2020-05-13 07:39:42'),
(127, 60, 30, 500, '2020-05-13 10:12:58', '2020-05-13 10:12:58'),
(128, 60, 29, 500, '2020-05-13 10:13:05', '2020-05-13 10:13:05'),
(129, 60, 28, 500, '2020-05-13 10:13:12', '2020-05-13 10:13:12'),
(132, 60, 9, 500, '2020-05-13 10:15:29', '2020-05-13 10:15:29'),
(133, 60, 8, 500, '2020-05-13 10:15:40', '2020-05-13 10:15:40'),
(134, 60, 32, 500, '2020-05-13 10:15:48', '2020-05-13 10:15:48'),
(135, 62, 32, 500, '2020-05-13 11:05:47', '2020-05-13 11:05:47'),
(136, 64, 27, 1000, '2020-05-13 12:26:43', '2020-05-13 12:26:43'),
(138, 66, 36, 1500, '2020-05-13 19:07:04', '2020-05-13 19:07:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`, `image`) VALUES
(1, 'Fruits', '2020-05-04 10:44:00', '2020-05-10 17:19:13', 'categories/May2020/tiOmBkhsCKmI2tzacaUr.jpg'),
(2, 'Vegetables', '2020-05-04 10:44:00', '2020-05-10 17:21:31', 'categories/May2020/LhQw60GC2JTZedHSMRnI.jpg'),
(3, 'Bakery Products', '2020-05-10 04:53:00', '2020-05-10 17:22:37', 'categories\\May2020\\wWWckAkBidvVMVrKdenf.jpg'),
(4, 'Grocery', '2020-05-10 04:55:00', '2020-05-10 18:12:05', 'categories/May2020/JKp6TLagRNyapbdaIqg7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_rows`
--

CREATE TABLE `data_rows` (
  `id` int(10) UNSIGNED NOT NULL,
  `data_type_id` int(10) UNSIGNED NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `required` tinyint(1) NOT NULL DEFAULT 0,
  `browse` tinyint(1) NOT NULL DEFAULT 1,
  `read` tinyint(1) NOT NULL DEFAULT 1,
  `edit` tinyint(1) NOT NULL DEFAULT 1,
  `add` tinyint(1) NOT NULL DEFAULT 1,
  `delete` tinyint(1) NOT NULL DEFAULT 1,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_rows`
--

INSERT INTO `data_rows` (`id`, `data_type_id`, `field`, `type`, `display_name`, `required`, `browse`, `read`, `edit`, `add`, `delete`, `details`, `order`) VALUES
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, '{}', 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, '{}', 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, '{}', 3),
(4, 1, 'password', 'password', 'Password', 0, 0, 0, 1, 1, 0, '{}', 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, '{}', 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, '{}', 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, '{}', 9),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":\"0\",\"taggable\":\"0\"}', 12),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 13),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, '{}', 14),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 0, 1, 1, 1, 1, 1, '{}', 11),
(22, 4, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 4, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(24, 4, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(25, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(26, 5, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(27, 5, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 5),
(28, 5, 'description', 'rich_text_box', 'Description', 0, 1, 1, 1, 1, 1, '{}', 6),
(29, 5, 'price_per_kg', 'number', 'Price Per Kg/ Per Quantity', 0, 1, 1, 1, 1, 1, '{}', 7),
(30, 5, 'minimum_quantity', 'number', 'Minimum Quantity In Grams/ Number', 0, 1, 1, 1, 1, 1, '{}', 10),
(31, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 13),
(32, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 15),
(33, 5, 'product_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(34, 5, 'category', 'text', 'Category', 0, 1, 1, 1, 1, 1, '{}', 4),
(35, 5, 'main_image', 'image', 'Main Image', 0, 1, 1, 1, 1, 1, '{}', 11),
(36, 5, 'other_images', 'multiple_images', 'Other Images', 0, 1, 1, 1, 1, 1, '{}', 12),
(37, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(38, 6, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(39, 6, 'product_id', 'text', 'Product Id', 0, 1, 1, 1, 1, 1, '{}', 5),
(40, 6, 'quantity', 'number', 'Quantity in grams/number', 0, 1, 1, 1, 1, 1, '{}', 6),
(41, 6, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(42, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(43, 6, 'cart_belongsto_product_relationship', 'relationship', 'products', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"product_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(44, 6, 'cart_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"email\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(45, 7, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(46, 7, 'pincode', 'number', 'Pincode', 0, 1, 1, 1, 1, 1, '{}', 2),
(47, 7, 'delivery_charge', 'number', 'Delivery Charge', 0, 1, 1, 1, 1, 1, '{}', 3),
(48, 7, 'delivery_time', 'number', 'Approx. Delivery Time In Minutes', 0, 1, 1, 1, 1, 1, '{}', 4),
(49, 7, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(50, 7, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(51, 8, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 0),
(52, 8, 'user_id', 'number', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 4),
(53, 8, 'user_email', 'text', 'User Email', 0, 1, 1, 1, 1, 1, '{}', 6),
(54, 8, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 7),
(55, 8, 'mobile', 'text', 'Mobile', 0, 1, 1, 1, 1, 1, '{}', 8),
(56, 8, 'landmark', 'text', 'Landmark', 0, 1, 1, 1, 1, 1, '{}', 9),
(57, 8, 'town_city', 'text', 'Town City', 0, 1, 1, 1, 1, 1, '{}', 10),
(58, 8, 'pincode', 'number', 'Pincode', 0, 1, 1, 1, 1, 1, '{}', 11),
(59, 8, 'address_type', 'text', 'Address Type', 0, 1, 1, 1, 1, 1, '{}', 12),
(60, 8, 'total_items', 'number', 'Total Items', 0, 1, 1, 1, 1, 1, '{}', 13),
(61, 8, 'order_id', 'text', 'Order Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(62, 8, 'total_price', 'number', 'Total Price', 0, 1, 1, 1, 1, 1, '{}', 16),
(63, 8, 'payment_status', 'text', 'Payment Status', 0, 1, 1, 1, 1, 1, '{}', 18),
(64, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 20),
(65, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 22),
(66, 8, 'order_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(68, 8, 'sub_total', 'text', 'Sub Total', 0, 1, 1, 1, 1, 1, '{}', 14),
(69, 8, 'delivery_charge', 'text', 'Delivery Charge', 0, 1, 1, 1, 1, 1, '{}', 15),
(70, 8, 'transaction_id', 'text', 'Transaction Id', 0, 1, 1, 1, 1, 1, '{}', 19),
(71, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 0),
(72, 9, 'item_name', 'text', 'Item Name', 0, 1, 1, 1, 1, 1, '{}', 5),
(73, 9, 'quantity', 'text', 'Quantity', 0, 1, 1, 1, 1, 1, '{}', 10),
(74, 9, 'price', 'text', 'Price', 0, 1, 1, 1, 1, 1, '{}', 11),
(75, 9, 'total', 'text', 'Total', 0, 1, 1, 1, 1, 1, '{}', 12),
(76, 9, 'category', 'text', 'Category', 0, 1, 1, 1, 1, 1, '{}', 4),
(77, 9, 'item_id', 'text', 'Item Id', 0, 1, 1, 1, 1, 1, '{}', 13),
(78, 9, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 16),
(79, 9, 'user_email', 'text', 'User Email', 0, 1, 1, 1, 1, 1, '{}', 17),
(81, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 18),
(82, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 19),
(83, 9, 'suborder_belongsto_user_relationship', 'relationship', 'Name', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(84, 9, 'suborder_belongsto_user_relationship_1', 'relationship', 'Email', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_email\",\"key\":\"email\",\"label\":\"email\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 9),
(85, 9, 'suborder_belongsto_product_relationship', 'relationship', 'products', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"item_name\",\"key\":\"name\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(86, 9, 'suborder_belongsto_product_relationship_1', 'relationship', 'products', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"item_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(87, 8, 'delivery_status', 'text', 'Delivery Status', 0, 1, 1, 1, 1, 1, '{}', 21),
(88, 4, 'image', 'image', 'Image', 0, 1, 1, 1, 1, 1, '{}', 5),
(89, 1, 'email_verified_at', 'timestamp', 'Email Verified At', 0, 1, 1, 1, 1, 1, '{}', 7),
(91, 8, 'payment_method', 'text', 'Payment Method', 0, 1, 1, 1, 1, 1, '{}', 17),
(92, 1, 'provider', 'text', 'Provider', 0, 1, 1, 1, 1, 1, '{}', 12),
(93, 1, 'provider_id', 'text', 'Provider Id', 0, 1, 1, 1, 1, 1, '{}', 13),
(94, 5, 'quantity_in_grams', 'radio_btn', 'Quantity In Grams', 0, 1, 1, 1, 1, 1, '{\"default\":\"1\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}', 9),
(95, 9, 'suborder_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 6),
(96, 9, 'order_id', 'text', 'Order Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(97, 5, 'mrp_per_kg', 'number', 'MRP Per Kg/  Per Quantity', 0, 1, 1, 1, 1, 1, '{}', 8),
(98, 10, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(99, 10, 'category_id', 'text', 'Category Id', 0, 1, 1, 1, 1, 1, '{}', 3),
(100, 10, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 4),
(101, 10, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 5),
(102, 10, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 6),
(103, 10, 'sub_category_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(104, 5, 'product_belongsto_sub_category_relationship', 'relationship', 'sub_categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\SubCategory\",\"table\":\"sub_categories\",\"type\":\"belongsTo\",\"column\":\"sub_category\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(105, 5, 'sub_category', 'text', 'Sub Category', 0, 1, 1, 1, 1, 1, '{}', 14),
(106, 9, 'suborder_belongsto_sub_category_relationship', 'relationship', 'Sub category', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\SubCategory\",\"table\":\"sub_categories\",\"type\":\"belongsTo\",\"column\":\"sub_category\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 7),
(107, 9, 'sub_category', 'text', 'Sub Category', 0, 1, 1, 1, 1, 1, '{}', 15),
(108, 5, 'subscription_available', 'radio_btn', 'Subscription Available', 0, 1, 1, 1, 1, 1, '{\"default\":\"0\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}', 14),
(109, 5, 'monthly_charge', 'text', 'Monthly Charge', 0, 1, 1, 1, 1, 1, '{}', 15),
(110, 5, 'discount_percentage_delivery_subscription', 'number', 'Discount Percentage Delivery Subscription', 0, 1, 1, 1, 1, 1, '{}', 16),
(111, 5, 'out_of_stock', 'radio_btn', 'Out Of Stock', 0, 1, 1, 1, 1, 1, '{\"default\":\"0\",\"options\":{\"0\":\"No\",\"1\":\"Yes\"}}', 17),
(112, 11, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 0),
(113, 11, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(114, 11, 'user_email', 'text', 'User Email', 0, 1, 1, 1, 1, 1, '{}', 3),
(115, 11, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 4),
(116, 11, 'mobile', 'text', 'Mobile', 0, 1, 1, 1, 1, 1, '{}', 5),
(117, 11, 'address', 'text_area', 'Address', 0, 1, 1, 1, 1, 1, '{}', 6),
(118, 11, 'landmark', 'text', 'Landmark', 0, 1, 1, 1, 1, 1, '{}', 7),
(119, 11, 'town_city', 'text', 'Town City', 0, 1, 1, 1, 1, 1, '{}', 8),
(120, 11, 'pincode', 'text', 'Pincode', 0, 1, 1, 1, 1, 1, '{}', 9),
(121, 11, 'address_type', 'text', 'Address Type', 0, 1, 1, 1, 1, 1, '{}', 10),
(122, 11, 'order_id', 'text', 'Order Id', 0, 1, 1, 1, 1, 1, '{}', 11),
(123, 11, 'sub_total', 'text', 'Sub Total', 0, 1, 1, 1, 1, 1, '{}', 12),
(124, 11, 'delivery_charge', 'text', 'Delivery Charge', 0, 1, 1, 1, 1, 1, '{}', 13),
(125, 11, 'total_price', 'text', 'Total Price', 0, 1, 1, 1, 1, 1, '{}', 14),
(126, 11, 'payment_status', 'text', 'Payment Status', 0, 1, 1, 1, 1, 1, '{}', 15),
(127, 11, 'payment_method', 'text', 'Payment Method', 0, 1, 1, 1, 1, 1, '{}', 16),
(128, 11, 'quantity_per_day', 'text', 'Quantity Per Day', 0, 1, 1, 1, 1, 1, '{}', 17),
(129, 11, 'product_id', 'text', 'Product Id', 0, 1, 1, 1, 1, 1, '{}', 18),
(130, 11, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 19),
(131, 11, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 20),
(132, 11, 'subscription_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 21),
(133, 11, 'subscription_belongsto_product_relationship', 'relationship', 'products', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"product_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 22);

-- --------------------------------------------------------

--
-- Table structure for table `data_types`
--

CREATE TABLE `data_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_singular` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name_plural` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `policy_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `controller` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `generate_permissions` tinyint(1) NOT NULL DEFAULT 0,
  `server_side` tinyint(4) NOT NULL DEFAULT 0,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_types`
--

INSERT INTO `data_types` (`id`, `name`, `slug`, `display_name_singular`, `display_name_plural`, `icon`, `model_name`, `policy_name`, `controller`, `description`, `generate_permissions`, `server_side`, `details`, `created_at`, `updated_at`) VALUES
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"desc\",\"default_search_key\":null,\"scope\":null}', '2020-05-02 13:23:27', '2020-05-11 18:10:27'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-05-02 13:23:28', '2020-05-02 13:23:28'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2020-05-02 13:23:28', '2020-05-02 13:23:28'),
(4, 'categories', 'categories', 'Category', 'Categories', NULL, 'App\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-04 10:32:48', '2020-05-09 15:50:54'),
(5, 'products', 'products', 'Product', 'Products', 'voyager-logbook', 'App\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-04 10:39:31', '2020-05-16 02:12:12'),
(6, 'carts', 'carts', 'Cart', 'Carts', 'voyager-credit-cards', 'App\\Cart', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-05 05:48:56', '2020-05-12 15:56:47'),
(7, 'pincodes', 'pincodes', 'Pincode', 'Pincodes', 'voyager-hammer', 'App\\Pincode', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-05 12:01:39', '2020-05-05 12:02:19'),
(8, 'orders', 'orders', 'Order', 'Orders', 'voyager-rum', 'App\\Order', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-07 01:55:25', '2020-05-13 01:16:03'),
(9, 'suborders', 'suborders', 'Suborder', 'Suborders', 'voyager-lab', 'App\\Suborder', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-07 02:23:36', '2020-05-14 13:32:47'),
(10, 'sub_categories', 'sub-categories', 'Sub Category', 'Sub Categories', 'voyager-data', 'App\\SubCategory', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-14 10:21:15', '2020-05-14 10:23:44'),
(11, 'subscriptions', 'subscriptions', 'Subscription', 'Subscriptions', 'voyager-treasure-open', 'App\\Subscription', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-17 04:01:49', '2020-05-17 04:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2020-05-02 13:23:36', '2020-05-02 13:23:36');

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

CREATE TABLE `menu_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `target` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '_self',
  `icon_class` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `order` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `route` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parameters` text COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `menu_items`
--

INSERT INTO `menu_items` (`id`, `menu_id`, `title`, `url`, `target`, `icon_class`, `color`, `parent_id`, `order`, `created_at`, `updated_at`, `route`, `parameters`) VALUES
(1, 1, 'Dashboard', '', '_self', 'voyager-boat', NULL, NULL, 1, '2020-05-02 13:23:37', '2020-05-02 13:23:37', 'voyager.dashboard', NULL),
(2, 1, 'Media', '', '_self', 'voyager-images', NULL, NULL, 5, '2020-05-02 13:23:37', '2020-05-02 13:23:37', 'voyager.media.index', NULL),
(3, 1, 'Users', '', '_self', 'voyager-person', NULL, NULL, 3, '2020-05-02 13:23:37', '2020-05-02 13:23:37', 'voyager.users.index', NULL),
(4, 1, 'Roles', '', '_self', 'voyager-lock', NULL, NULL, 2, '2020-05-02 13:23:37', '2020-05-02 13:23:37', 'voyager.roles.index', NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2020-05-02 13:23:38', '2020-05-02 13:23:38', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2020-05-02 13:23:38', '2020-05-02 13:23:38', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2020-05-02 13:23:38', '2020-05-02 13:23:38', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2020-05-02 13:23:39', '2020-05-02 13:23:39', 'voyager.bread.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 13, '2020-05-02 13:23:58', '2020-05-02 13:23:58', 'voyager.hooks', NULL),
(12, 1, 'Categories', '', '_self', 'voyager-cannon', '#000000', NULL, 15, '2020-05-04 10:32:50', '2020-05-04 10:33:55', 'voyager.categories.index', 'null'),
(13, 1, 'Products', '', '_self', 'voyager-logbook', NULL, NULL, 16, '2020-05-04 10:39:31', '2020-05-04 10:39:31', 'voyager.products.index', NULL),
(14, 1, 'Carts', '', '_self', 'voyager-credit-cards', NULL, NULL, 17, '2020-05-05 05:48:57', '2020-05-05 05:48:57', 'voyager.carts.index', NULL),
(15, 1, 'Pincodes', '', '_self', 'voyager-hammer', '#000000', NULL, 18, '2020-05-05 12:01:40', '2020-05-05 12:02:48', 'voyager.pincodes.index', 'null'),
(16, 1, 'Orders', '', '_self', 'voyager-rum', NULL, NULL, 19, '2020-05-07 01:55:26', '2020-05-07 01:55:26', 'voyager.orders.index', NULL),
(17, 1, 'Suborders', '', '_self', 'voyager-lab', NULL, NULL, 20, '2020-05-07 02:23:37', '2020-05-07 02:23:37', 'voyager.suborders.index', NULL),
(18, 1, 'Sub Categories', '', '_self', 'voyager-data', NULL, NULL, 21, '2020-05-14 10:21:15', '2020-05-14 10:21:15', 'voyager.sub-categories.index', NULL),
(19, 1, 'Subscriptions', '', '_self', 'voyager-treasure-open', NULL, NULL, 22, '2020-05-17 04:01:50', '2020-05-17 04:01:50', 'voyager.subscriptions.index', NULL);

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
(2, '2016_01_01_000000_add_voyager_user_fields', 1),
(3, '2016_01_01_000000_create_data_types_table', 1),
(4, '2016_05_19_173453_create_menu_table', 1),
(5, '2016_10_21_190000_create_roles_table', 1),
(6, '2016_10_21_190000_create_settings_table', 1),
(7, '2016_11_30_135954_create_permission_table', 1),
(8, '2016_11_30_141208_create_permission_role_table', 1),
(9, '2016_12_26_201236_data_types__add__server_side', 1),
(10, '2017_01_13_000000_add_route_to_menu_items_table', 1),
(11, '2017_01_14_005015_create_translations_table', 1),
(12, '2017_01_15_000000_make_table_name_nullable_in_permissions_table', 1),
(13, '2017_03_06_000000_add_controller_to_data_types_table', 1),
(14, '2017_04_21_000000_add_order_to_data_rows_table', 1),
(15, '2017_07_05_210000_add_policyname_to_data_types_table', 1),
(16, '2017_08_05_000000_add_group_to_settings_table', 1),
(17, '2017_11_26_013050_add_user_role_relationship', 1),
(18, '2017_11_26_015000_create_user_roles_table', 1),
(19, '2018_03_11_000000_add_user_settings', 1),
(20, '2018_03_14_000000_add_details_to_data_types_table', 1),
(21, '2018_03_16_000000_make_settings_value_nullable', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2014_10_12_100000_create_password_resets_table', 2),
(24, '2016_12_03_000000_create_payu_payments_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `address_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_items` int(11) DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `delivery_charge` int(11) DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'PENDING',
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `mobile`, `landmark`, `town_city`, `pincode`, `address_type`, `total_items`, `order_id`, `total_price`, `payment_status`, `created_at`, `updated_at`, `sub_total`, `delivery_charge`, `transaction_id`, `delivery_status`, `payment_method`) VALUES
(23, 26, '8051559977', 'Dilawar', '8051559977', 'Near Jail Road Masjid', 'Jorhat', 785001, 'Home', 6, '#V0G61J35K', 161, 'PENDING', '2020-05-11 08:39:24', '2020-05-11 08:39:24', 141, 20, NULL, 'Delivered', NULL),
(26, 28, '9957155616', 'Dr Abhijit Phukan', '9957155616', 'Sanjivani Hospital Tarajan', 'Jorhat', 785001, 'Office', 2, '#QUZY7AT8E', 73, 'PENDING', '2020-05-11 09:07:46', '2020-05-11 09:07:46', 53, 20, NULL, 'PENDING', NULL),
(39, 53, 'gyanhazarika12@gmail.com', 'Gyanjyoti Hazarika', '07896874270', 'Chondikavilla', 'JORHAT', 785001, 'Home', 5, '#L9KPAYIOH', 302, 'Cash On Delivery', '2020-05-13 05:57:30', '2020-05-13 05:57:30', 282, 20, NULL, 'PENDING', 'Cash On Delivery'),
(40, 53, 'gyanhazarika12@gmail.com', 'Gyanjyoti', '07896874270', 'Assam', 'JORHAT', 785001, 'Office', 2, '#G61RIYMCA', 65, 'Cash On Delivery', '2020-05-13 06:06:52', '2020-05-13 06:06:52', 45, 20, NULL, 'PENDING', 'Cash On Delivery'),
(41, 1, 'shahbaz.444khan@gmail.com', 'shahbaz', '9957588417', 'jorhat', 'jorhat', 785001, 'Home', 2, '#78C9P2BK6', 625, 'Cash On Delivery', '2020-05-13 07:11:05', '2020-05-13 07:11:05', 605, 20, NULL, 'PENDING', 'Cash On Delivery'),
(42, 48, 'shahbaz.444khan@gmail.com', 'shahbaz', '9957588417', 'jorhat', 'jorhat', 785001, 'Home', 2, '#FEG47Y1CT', 905, 'Cash On Delivery', '2020-05-13 10:01:07', '2020-05-13 10:01:07', 885, 20, NULL, 'PENDING', 'Cash On Delivery'),
(43, 57, 'shahbaz.444khan@gmail.com', 'shahbaz', '8240586766', 'jorhat', 'jorhat', 785001, 'Home', 1, '#VD5630OH7', 500, 'Cash On Delivery', '2020-05-13 10:04:12', '2020-05-13 10:04:12', 480, 20, NULL, 'PENDING', 'Cash On Delivery'),
(45, 65, 'shahbaz.444khan@gmail.com', 'shahbaz', '9957588417', 'jorhat', 'jorhat', 785001, 'Home', 1, '#2MI891OKZ', 500, 'Cash On Delivery', '2020-05-13 12:34:24', '2020-05-13 12:34:24', 480, 20, NULL, 'PENDING', 'Cash On Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `otps`
--

CREATE TABLE `otps` (
  `id` int(10) UNSIGNED NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `otp` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `otps`
--

INSERT INTO `otps` (`id`, `mobile`, `otp`, `status`, `created_at`, `updated_at`) VALUES
(1, '7002088304', 959010, 1, '2020-05-09 15:33:57', '2020-05-09 15:33:57'),
(2, '7002088304', 881029, 1, '2020-05-09 15:35:17', '2020-05-09 15:35:17'),
(3, '7002088304', 586821, 2, '2020-05-09 15:36:52', '2020-05-09 15:36:52'),
(4, '7002088304', 152582, 2, '2020-05-09 15:38:17', '2020-05-09 15:38:17'),
(5, '7002088304', 377324, 2, '2020-05-09 15:39:42', '2020-05-09 15:39:42'),
(6, '7399232150', 697521, 2, '2020-05-09 19:43:11', '2020-05-09 19:43:11'),
(7, '7399232150', 119543, 1, '2020-05-09 20:34:15', '2020-05-09 20:34:15'),
(8, '7399232150', 231384, 1, '2020-05-09 20:35:23', '2020-05-09 20:35:23'),
(9, '7399232150', 935244, 2, '2020-05-10 04:10:59', '2020-05-10 04:10:59'),
(10, '7399232150', 160410, 2, '2020-05-10 04:12:05', '2020-05-10 04:12:05'),
(11, '7399232150', 940419, 2, '2020-05-10 04:12:54', '2020-05-10 04:12:54'),
(12, '9818854434', 183165, 1, '2020-05-10 17:19:09', '2020-05-10 17:19:09'),
(13, '7002447782', 487192, 2, '2020-05-10 17:49:20', '2020-05-10 17:49:20'),
(14, '9613102349', 330317, 2, '2020-05-10 18:29:12', '2020-05-10 18:29:12'),
(15, '9818854434', 665768, 1, '2020-05-10 19:29:22', '2020-05-10 19:29:22'),
(16, '9706001039', 105112, 2, '2020-05-10 19:56:16', '2020-05-10 19:56:16'),
(17, '9957588417', 936373, 2, '2020-05-10 20:30:10', '2020-05-10 20:30:10'),
(18, '8240586766', 590846, 2, '2020-05-10 21:46:32', '2020-05-10 21:46:32'),
(19, '9818854434', 761959, 1, '2020-05-10 22:26:19', '2020-05-10 22:26:19'),
(20, '8051559977', 141406, 2, '2020-05-11 08:32:19', '2020-05-11 08:32:19'),
(21, '8790372712', 852735, 2, '2020-05-11 08:54:26', '2020-05-11 08:54:26'),
(22, '9957155616', 825734, 2, '2020-05-11 09:01:51', '2020-05-11 09:01:51'),
(23, '9818854434', 604953, 1, '2020-05-11 09:31:32', '2020-05-11 09:31:32'),
(24, '7002163398', 397256, 1, '2020-05-11 09:36:08', '2020-05-11 09:36:08'),
(25, '9818854434', 919648, 1, '2020-05-11 11:22:33', '2020-05-11 11:22:33'),
(26, '7002502902', 983529, 2, '2020-05-11 11:44:59', '2020-05-11 11:44:59'),
(27, '7002447782', 679807, 2, '2020-05-11 12:01:57', '2020-05-11 12:01:57'),
(28, '7002447782', 183877, 2, '2020-05-11 12:03:25', '2020-05-11 12:03:25'),
(29, '7399232150', 422695, 1, '2020-05-11 12:05:46', '2020-05-11 12:05:46'),
(30, '7399232150', 611989, 1, '2020-05-11 12:06:19', '2020-05-11 12:06:19'),
(31, '7002717151', 761053, 1, '2020-05-11 16:00:00', '2020-05-11 16:00:00'),
(32, '9818854434', 778573, 2, '2020-05-11 19:06:25', '2020-05-11 19:06:25'),
(33, '9818854434', 660616, 2, '2020-05-12 06:43:36', '2020-05-12 06:43:36'),
(34, '7002447782', 737985, 2, '2020-05-12 16:31:21', '2020-05-12 16:31:21'),
(35, '9435854585', 331135, 2, '2020-05-12 17:00:35', '2020-05-12 17:00:35'),
(36, '7002447782', 270788, 2, '2020-05-12 17:46:38', '2020-05-12 17:46:38'),
(37, '7002238695', 648490, 1, '2020-05-12 17:49:31', '2020-05-12 17:49:31'),
(38, '8486615148', 151222, 2, '2020-05-12 17:51:42', '2020-05-12 17:51:42'),
(39, '8638747055', 279877, 1, '2020-05-12 17:52:33', '2020-05-12 17:52:33'),
(40, '7575982813', 207934, 1, '2020-05-12 18:06:00', '2020-05-12 18:06:00'),
(41, '7896874270', 164774, 1, '2020-05-12 18:17:45', '2020-05-12 18:17:45'),
(42, '7002447782', 829087, 2, '2020-05-12 23:55:45', '2020-05-12 23:55:45'),
(43, '8486615148', 703211, 1, '2020-05-13 06:21:32', '2020-05-13 06:21:32'),
(44, '7896874270', 614203, 1, '2020-05-13 06:46:38', '2020-05-13 06:46:38'),
(45, '7002238695', 509397, 1, '2020-05-13 06:47:36', '2020-05-13 06:47:36'),
(46, '8486615148', 607773, 1, '2020-05-13 06:49:36', '2020-05-13 06:49:36'),
(47, '8240586766', 817868, 2, '2020-05-13 10:01:55', '2020-05-13 10:01:55'),
(48, '9818854434', 811251, 2, '2020-05-13 10:13:03', '2020-05-13 10:13:03'),
(49, '8892793488', 585510, 1, '2020-05-13 12:24:21', '2020-05-13 12:24:21'),
(50, '9971085036', 412075, 1, '2020-05-13 21:43:49', '2020-05-13 21:43:49'),
(51, '6001468151', 869394, 1, '2020-05-13 21:46:37', '2020-05-13 21:46:37'),
(52, '9435095921', 850292, 2, '2020-05-13 21:53:23', '2020-05-13 21:53:23');

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
('architsingh99@gmail.com', '$2y$10$YLDBtcoVUbd0k.nWtWlZVej1ZNCIXH8OM4eKl0PIQqqqmqvfgNvPW', '2020-05-03 11:24:13'),
('gyanhazarika17@gmail.com', '$2y$10$QHc2phpdXGUxqx3xfNmcX.OPRGi1q4n4BmgUXl9zMpIa8Vhgu6.b2', '2020-05-12 17:39:33'),
('aichwajyabora@gmail.com', '$2y$10$jEOJjlwOgsONmqR2ubR2BOhjccM5K2VeAs8vN.58aN9ydC8CUwkju', '2020-05-13 00:33:52'),
('gyanhazarika12@gmail.com', '$2y$10$BKkTdcYM2k9llN5Sdyf6MuwRDBvca8jEmAj1iwRex2JHFK3EAjDQ2', '2020-05-13 05:21:33');

-- --------------------------------------------------------

--
-- Table structure for table `payu_payments`
--

CREATE TABLE `payu_payments` (
  `id` int(10) UNSIGNED NOT NULL,
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payable_id` int(10) UNSIGNED DEFAULT NULL,
  `payable_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `txnid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mihpayid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `firstname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastname` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double NOT NULL,
  `discount` double NOT NULL DEFAULT 0,
  `net_amount_debit` double NOT NULL DEFAULT 0,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unmappedstatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_ref_num` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bankcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cardnum` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name_on_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `issuing_bank` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `card_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payu_payments`
--

INSERT INTO `payu_payments` (`id`, `account`, `payable_id`, `payable_type`, `txnid`, `mihpayid`, `firstname`, `lastname`, `email`, `phone`, `amount`, `discount`, `net_amount_debit`, `data`, `status`, `unmappedstatus`, `mode`, `bank_ref_num`, `bankcode`, `cardnum`, `name_on_card`, `issuing_bank`, `card_type`, `created_at`, `updated_at`) VALUES
(1, 'payumoney', NULL, NULL, 'EGHUJDMY4', '9083866570', 'Aichwajya Bora', NULL, 'admin@admin.com', '07399232150', 31, 0, 0, '{\"isConsentPayment\":\"0\",\"mihpayid\":\"9083866570\",\"mode\":\"CC\",\"status\":\"failure\",\"unmappedstatus\":\"failed\",\"key\":\"TOQkozk8\",\"txnid\":\"EGHUJDMY4\",\"amount\":\"31.00\",\"addedon\":\"2020-05-10 23:12:23\",\"productinfo\":\"ORDER ID: #EGHUJDMY4\",\"firstname\":\"Aichwajya Bora\",\"lastname\":null,\"address1\":null,\"address2\":null,\"city\":null,\"state\":null,\"country\":null,\"zipcode\":null,\"email\":\"admin@admin.com\",\"phone\":\"07399232150\",\"udf1\":null,\"udf2\":null,\"udf3\":null,\"udf4\":null,\"udf5\":null,\"udf6\":null,\"udf7\":null,\"udf8\":null,\"udf9\":null,\"udf10\":null,\"hash\":\"4132738432ed5f0e304a4d68806d7d349bb46e62adcba42ff37685fd615cdae2bddc4e14e799d8c5c18cc69b10b637fbdda97247892559526ff25c1c86e009ac\",\"field1\":null,\"field2\":null,\"field3\":null,\"field4\":null,\"field5\":null,\"field6\":null,\"field7\":\"AUCERROR\",\"field8\":\"Incorrect request received\",\"field9\":\"Verification of Secure Hash Failed: E700\",\"PG_TYPE\":\"AXISPG\",\"bankcode\":\"VISA\",\"error\":\"E700\",\"error_Message\":\"Validation of secure hash failed\",\"name_on_card\":\"asv\",\"cardnum\":\"424242XXXXXX4242\",\"cardhash\":\"This field is no longer supported in postback params.\",\"amount_split\":\"{\\\"PAYU\\\":\\\"31.00\\\"}\",\"payuMoneyId\":\"250261949\",\"discount\":\"0.00\",\"net_amount_debit\":\"0.00\",\"_token\":\"J6sOC0V8Az5ycWZZ6REkxri3kvZEB9NTtnqvg4RM\",\"callback\":\"aHR0cDovL2JhemFhcjI0eDcuaW4vcGF5bWVudC9zdGF0dXM=\"}', 'Failed', 'failed', 'CC', NULL, 'VISA', '424242XXXXXX4242', 'asv', NULL, NULL, '2020-05-10 21:46:29', '2020-05-10 21:46:29');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `key`, `table_name`, `created_at`, `updated_at`) VALUES
(1, 'browse_admin', NULL, '2020-05-02 13:23:42', '2020-05-02 13:23:42'),
(2, 'browse_bread', NULL, '2020-05-02 13:23:43', '2020-05-02 13:23:43'),
(3, 'browse_database', NULL, '2020-05-02 13:23:43', '2020-05-02 13:23:43'),
(4, 'browse_media', NULL, '2020-05-02 13:23:43', '2020-05-02 13:23:43'),
(5, 'browse_compass', NULL, '2020-05-02 13:23:43', '2020-05-02 13:23:43'),
(6, 'browse_menus', 'menus', '2020-05-02 13:23:43', '2020-05-02 13:23:43'),
(7, 'read_menus', 'menus', '2020-05-02 13:23:44', '2020-05-02 13:23:44'),
(8, 'edit_menus', 'menus', '2020-05-02 13:23:44', '2020-05-02 13:23:44'),
(9, 'add_menus', 'menus', '2020-05-02 13:23:44', '2020-05-02 13:23:44'),
(10, 'delete_menus', 'menus', '2020-05-02 13:23:44', '2020-05-02 13:23:44'),
(11, 'browse_roles', 'roles', '2020-05-02 13:23:45', '2020-05-02 13:23:45'),
(12, 'read_roles', 'roles', '2020-05-02 13:23:45', '2020-05-02 13:23:45'),
(13, 'edit_roles', 'roles', '2020-05-02 13:23:45', '2020-05-02 13:23:45'),
(14, 'add_roles', 'roles', '2020-05-02 13:23:46', '2020-05-02 13:23:46'),
(15, 'delete_roles', 'roles', '2020-05-02 13:23:46', '2020-05-02 13:23:46'),
(16, 'browse_users', 'users', '2020-05-02 13:23:46', '2020-05-02 13:23:46'),
(17, 'read_users', 'users', '2020-05-02 13:23:47', '2020-05-02 13:23:47'),
(18, 'edit_users', 'users', '2020-05-02 13:23:47', '2020-05-02 13:23:47'),
(19, 'add_users', 'users', '2020-05-02 13:23:47', '2020-05-02 13:23:47'),
(20, 'delete_users', 'users', '2020-05-02 13:23:47', '2020-05-02 13:23:47'),
(21, 'browse_settings', 'settings', '2020-05-02 13:23:47', '2020-05-02 13:23:47'),
(22, 'read_settings', 'settings', '2020-05-02 13:23:48', '2020-05-02 13:23:48'),
(23, 'edit_settings', 'settings', '2020-05-02 13:23:48', '2020-05-02 13:23:48'),
(24, 'add_settings', 'settings', '2020-05-02 13:23:48', '2020-05-02 13:23:48'),
(25, 'delete_settings', 'settings', '2020-05-02 13:23:49', '2020-05-02 13:23:49'),
(26, 'browse_hooks', NULL, '2020-05-02 13:23:58', '2020-05-02 13:23:58'),
(27, 'browse_categories', 'categories', '2020-05-04 10:32:49', '2020-05-04 10:32:49'),
(28, 'read_categories', 'categories', '2020-05-04 10:32:49', '2020-05-04 10:32:49'),
(29, 'edit_categories', 'categories', '2020-05-04 10:32:49', '2020-05-04 10:32:49'),
(30, 'add_categories', 'categories', '2020-05-04 10:32:49', '2020-05-04 10:32:49'),
(31, 'delete_categories', 'categories', '2020-05-04 10:32:49', '2020-05-04 10:32:49'),
(32, 'browse_products', 'products', '2020-05-04 10:39:31', '2020-05-04 10:39:31'),
(33, 'read_products', 'products', '2020-05-04 10:39:31', '2020-05-04 10:39:31'),
(34, 'edit_products', 'products', '2020-05-04 10:39:31', '2020-05-04 10:39:31'),
(35, 'add_products', 'products', '2020-05-04 10:39:31', '2020-05-04 10:39:31'),
(36, 'delete_products', 'products', '2020-05-04 10:39:31', '2020-05-04 10:39:31'),
(37, 'browse_carts', 'carts', '2020-05-05 05:48:57', '2020-05-05 05:48:57'),
(38, 'read_carts', 'carts', '2020-05-05 05:48:57', '2020-05-05 05:48:57'),
(39, 'edit_carts', 'carts', '2020-05-05 05:48:57', '2020-05-05 05:48:57'),
(40, 'add_carts', 'carts', '2020-05-05 05:48:57', '2020-05-05 05:48:57'),
(41, 'delete_carts', 'carts', '2020-05-05 05:48:57', '2020-05-05 05:48:57'),
(42, 'browse_pincodes', 'pincodes', '2020-05-05 12:01:40', '2020-05-05 12:01:40'),
(43, 'read_pincodes', 'pincodes', '2020-05-05 12:01:40', '2020-05-05 12:01:40'),
(44, 'edit_pincodes', 'pincodes', '2020-05-05 12:01:40', '2020-05-05 12:01:40'),
(45, 'add_pincodes', 'pincodes', '2020-05-05 12:01:40', '2020-05-05 12:01:40'),
(46, 'delete_pincodes', 'pincodes', '2020-05-05 12:01:40', '2020-05-05 12:01:40'),
(47, 'browse_orders', 'orders', '2020-05-07 01:55:25', '2020-05-07 01:55:25'),
(48, 'read_orders', 'orders', '2020-05-07 01:55:25', '2020-05-07 01:55:25'),
(49, 'edit_orders', 'orders', '2020-05-07 01:55:25', '2020-05-07 01:55:25'),
(50, 'add_orders', 'orders', '2020-05-07 01:55:25', '2020-05-07 01:55:25'),
(51, 'delete_orders', 'orders', '2020-05-07 01:55:25', '2020-05-07 01:55:25'),
(52, 'browse_suborders', 'suborders', '2020-05-07 02:23:37', '2020-05-07 02:23:37'),
(53, 'read_suborders', 'suborders', '2020-05-07 02:23:37', '2020-05-07 02:23:37'),
(54, 'edit_suborders', 'suborders', '2020-05-07 02:23:37', '2020-05-07 02:23:37'),
(55, 'add_suborders', 'suborders', '2020-05-07 02:23:37', '2020-05-07 02:23:37'),
(56, 'delete_suborders', 'suborders', '2020-05-07 02:23:37', '2020-05-07 02:23:37'),
(57, 'browse_sub_categories', 'sub_categories', '2020-05-14 10:21:15', '2020-05-14 10:21:15'),
(58, 'read_sub_categories', 'sub_categories', '2020-05-14 10:21:15', '2020-05-14 10:21:15'),
(59, 'edit_sub_categories', 'sub_categories', '2020-05-14 10:21:15', '2020-05-14 10:21:15'),
(60, 'add_sub_categories', 'sub_categories', '2020-05-14 10:21:15', '2020-05-14 10:21:15'),
(61, 'delete_sub_categories', 'sub_categories', '2020-05-14 10:21:15', '2020-05-14 10:21:15'),
(62, 'browse_subscriptions', 'subscriptions', '2020-05-17 04:01:50', '2020-05-17 04:01:50'),
(63, 'read_subscriptions', 'subscriptions', '2020-05-17 04:01:50', '2020-05-17 04:01:50'),
(64, 'edit_subscriptions', 'subscriptions', '2020-05-17 04:01:50', '2020-05-17 04:01:50'),
(65, 'add_subscriptions', 'subscriptions', '2020-05-17 04:01:50', '2020-05-17 04:01:50'),
(66, 'delete_subscriptions', 'subscriptions', '2020-05-17 04:01:50', '2020-05-17 04:01:50');

-- --------------------------------------------------------

--
-- Table structure for table `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permission_role`
--

INSERT INTO `permission_role` (`permission_id`, `role_id`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1),
(5, 1),
(6, 1),
(7, 1),
(8, 1),
(9, 1),
(10, 1),
(11, 1),
(12, 1),
(13, 1),
(14, 1),
(15, 1),
(16, 1),
(17, 1),
(18, 1),
(19, 1),
(20, 1),
(21, 1),
(22, 1),
(23, 1),
(24, 1),
(25, 1),
(26, 1),
(27, 1),
(28, 1),
(29, 1),
(30, 1),
(31, 1),
(32, 1),
(33, 1),
(34, 1),
(35, 1),
(36, 1),
(37, 1),
(38, 1),
(39, 1),
(40, 1),
(41, 1),
(42, 1),
(43, 1),
(44, 1),
(45, 1),
(46, 1),
(47, 1),
(48, 1),
(49, 1),
(50, 1),
(51, 1),
(52, 1),
(53, 1),
(54, 1),
(55, 1),
(56, 1),
(57, 1),
(58, 1),
(59, 1),
(60, 1),
(61, 1),
(62, 1),
(63, 1),
(64, 1),
(65, 1),
(66, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pincodes`
--

CREATE TABLE `pincodes` (
  `id` int(10) UNSIGNED NOT NULL,
  `pincode` int(11) DEFAULT NULL,
  `delivery_charge` int(11) DEFAULT NULL,
  `delivery_time` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pincodes`
--

INSERT INTO `pincodes` (`id`, `pincode`, `delivery_charge`, `delivery_time`, `created_at`, `updated_at`) VALUES
(4, 785001, 20, 120, '2020-05-10 20:16:00', '2020-05-13 02:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(3000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price_per_kg` int(11) DEFAULT NULL,
  `minimum_quantity` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `main_image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other_images` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_in_grams` int(11) DEFAULT NULL,
  `mrp_per_kg` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL,
  `subscription_available` int(11) DEFAULT 0,
  `monthly_charge` int(11) DEFAULT NULL,
  `discount_percentage_delivery_subscription` int(11) DEFAULT NULL,
  `out_of_stock` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price_per_kg`, `minimum_quantity`, `created_at`, `updated_at`, `category`, `main_image`, `other_images`, `quantity_in_grams`, `mrp_per_kg`, `sub_category`, `subscription_available`, `monthly_charge`, `discount_percentage_delivery_subscription`, `out_of_stock`) VALUES
(4, 'Bindi (Ladies Finger)', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Lady Finger</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is a type of green vegetable, long&nbsp;<strong>finger-like</strong></span><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, having a small tip at the tapering end. Its head shows a bulge, lighter green in shade, which is often removed as an inedible portion. ... The&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">lady\'s finger</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;may be cut into round pieces or sliced into 4 halves or maybe put a whole in a mixed vegetable sabji.</span></p>', 25, 500, '2020-05-10 17:03:00', '2020-05-13 21:06:13', 2, 'products/May2020/pmMbngQAGBxzdkWJFc1b.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(5, 'Brinjal', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Brinjal</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is an erect annual plant, often spiny, with large, coarsely lobed fuzzy leaves, 10-20 cm long and 5-10 cm broad. The plants usually grow 45 to 60 cm high and bear long to oval-shaped, purple, or greenish fruits. Flowers are white to purple, with a five-lobed corolla and yellow stamens.</span></p>', 40, 500, '2020-05-10 17:07:00', '2020-05-13 19:05:09', 2, 'products/May2020/OD4Vy6XzqG9ZiIUw1Dzf.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(7, 'Cucumber', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Cucumber</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, Cucumis sativus, is a warm season, vining, annual plant in the family Cucurbitaceae has grown for its edible&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">cucumber</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;fruit. The&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">cucumber</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;plant is a sprawling vine with large leaves and curling tendrils. ... The leaves of the plant are arranged alternately on the vines, have 3&ndash;7 pointed lobes and are hairy</span></p>', 30, 500, '2020-05-10 17:11:00', '2020-05-13 21:09:24', 2, 'products/May2020/S29loBzREJy9O0HeATcH.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(8, 'Squash', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">quash</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is the collective name given to several species of plant in the genus Cucurbita, including C. maxima, C. mixta , C. moschata and C. ...&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Squash</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;plants produce yellow or orange flowers and green, white or yellow fruit in a variety of shapes and sizes with smooth or ridged skin</span></p>', 30, 500, '2020-05-10 17:13:00', '2020-05-13 21:10:36', 2, 'products/May2020/fziXsZRZOgQVedmFmhto.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(9, 'Bhaat Karela', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Spine gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is a perennial climber with tuberous root, almost 4 m long vine bearing simple tendrils and distinctly dioecious species of family cucurbitaceae grown widely in different parts of Meghalaya. ... Young leaves, flower and tuberous roots are also eaten. It contains high amount of carotene and protein</span></p>', 75, 500, '2020-05-10 17:18:00', '2020-05-12 20:12:47', 2, 'products/May2020/iz0dsBx8M4db7sYJzq5R.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(10, 'Jika (Ridge Gourd)', '<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">It is a dark green, ridged, and tapering pretty vegetable. It has white pulp with white seeds embedded in spongy flesh. A </span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">ridge gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;also commonly known as Turai or Turiya is well-beloved in India.</span></p>', 50, 500, '2020-05-10 17:39:00', '2020-05-12 16:55:34', 2, 'products/May2020/bpJxgLXkhDi52U2zck5w.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(11, 'Pudina', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Mint</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;plants are mainly aromatic perennials and they possess erect, branching stems and oblong to ovate or lanceolate leaves arranged in opposing pairs on the stems. The leaves are often covered in tiny hairs and have a serrated margin.</span></p>', 80, 250, '2020-05-10 17:42:00', '2020-05-12 20:01:15', 2, 'products/May2020/jF6O4m8mc9vp2qoqtuDb.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(12, 'Ginger', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Ginger</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, Zingiber officinale, is an erect, herbaceous perennial plant in the family Zingiberaceae grown for its edible rhizome (underground stem) which is widely used as a spice. The rhizome is brown, with a corky outer layer and pale-yellow scented center</span></p>', 120, 250, '2020-05-10 17:46:00', '2020-05-12 20:11:49', 2, 'products/May2020/DNEjCEm7dnTzK5ncyQOT.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(14, 'Yardlong beans', '<p><span style=\"color: #4d5156; font-family: arial, sans-serif;\">The asparagus&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif;\">bean</span><span style=\"color: #4d5156; font-family: arial, sans-serif;\">&nbsp;(Vigna unguiculata subsp. sesquipedalis) is a legume cultivated for its edible green pods containing immature seeds, like the green&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif;\">bean</span><span style=\"color: #4d5156; font-family: arial, sans-serif;\">. It is also known as the&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif;\">yardlong bean</span><span style=\"color: #4d5156; font-family: arial, sans-serif;\">, long-podded cowpea, Chinese long&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif;\">bean</span><span style=\"color: #4d5156; font-family: arial, sans-serif;\">, bodi/bora, snake&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif;\">bean</span><span style=\"color: #4d5156; font-family: arial, sans-serif;\">, or pea&nbsp;</span><span style=\"font-weight: bold; color: #5f6368; font-family: arial, sans-serif;\">bean.</span></p>', 35, 500, '2020-05-10 17:53:00', '2020-05-13 21:07:56', 2, 'products/May2020/r5aw3xihs02Kgqz91FRQ.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(15, 'Green Chilli', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Green</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;chilis are immature&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">chili</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;peppers, most often Pasilla, Anaheim or Poblano peppers that have been harvested before fully ripening. Not as spicy as red&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">chili</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;peppers, they are available raw, canned or pickled and are a common addition to traditional Hispanic dishes ranging from soups to snacks.</span></p>', 60, 200, '2020-05-10 17:59:00', '2020-05-12 20:02:05', 2, 'products/May2020/L7A8fxoBOqjYE7FwphXY.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(16, 'Dhaniya Patta(Coriander)', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Coriander</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, Coriandrum sativum, is an erect annual herb in the family Apiaceae. The leaves of the plant are variable in shape, broadly lobed at the base of the plant, and slender and feathery higher on the flowering stems. It is a soft, hairless plant</span></p>', 70, 200, '2020-05-10 18:02:00', '2020-05-12 19:59:04', 2, 'products/May2020/hqZGQ0ayDRrEodRFsv2I.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(21, 'Chocolate Keto Cake 1/2kg', '<p>The cake is flourless and sugarfree. For Special request Whatsapp: 9957588417</p>', 520, 1, '2020-05-12 18:37:00', '2020-05-13 07:01:16', 3, 'products/May2020/jdhNGwAsYqIJqq2nVG55.jpeg', NULL, 0, NULL, NULL, 0, NULL, NULL, 0),
(22, 'Chocolate Delight 1/2 Kg', '<p>For Special Request Whatsapp on : 9957588417</p>', 480, 1, '2020-05-12 18:40:00', '2020-05-13 06:59:46', 3, 'products/May2020/8MjnjfJ825hVKGXJJjkz.jpeg', NULL, 0, NULL, NULL, 0, NULL, NULL, 0),
(23, 'Tomato', '<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">The&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">tomato</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is the edible, often red, berry of the plant Solanum lycopersicum, commonly known as a&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">tomato</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;plant.</span></p>', 30, 500, '2020-05-12 20:07:00', '2020-05-13 19:04:28', 2, 'products/May2020/drW8Lx0iqQgp6jifCuOm.jpeg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(24, 'Mango (Gulabkhas)', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Mango</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, Mangifera indica, is an evergreen tree in the family Anacardiaceae grown for its edible fruit. The&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">mango</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;tree is erect and branching with a thick trunk and broad, rounded canopy.&nbsp;</span></p>', 120, 500, '2020-05-12 20:18:00', '2020-05-13 18:41:03', 1, 'products/May2020/6e1QrcC3iwNMSaJGgto3.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(25, 'Grapes', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Green</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;seedless&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">grapes</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;are small to medium in size and are round to slightly oval in shape, growing in tight or loose clusters depending on the variety. The skin ranges from yellow-</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">green</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;to bright&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">green</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;and is typically crisp, firm, and smooth. ...&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Green</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;seedless&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">grapes</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;are mild and sweet with a slightly tart flavor</span></p>', 150, 500, '2020-05-12 20:21:00', '2020-05-13 18:40:24', 1, 'products/May2020/0eA4FzpyyqdOsXtSyi79.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(26, 'Pomegranate (Anar)', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Description</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;of Pomegranate,&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Anar</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">. A ripe, ready-to-eat pomegranate is a luscious jewel of a fruit, capable of transforming any meal into an extraordinary experience. And although this delicious fruit may seem exotic, it\'s wonderfully easy to enjoy. Pomegranate is a small tree up to 5 meter in height</span></p>', 170, 500, '2020-05-12 20:25:00', '2020-05-13 18:39:46', 1, 'products/May2020/O8e153yLfGo4XqdJ6i9k.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(27, 'Watermelon', '<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">The&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">watermelon</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is a large fruit of a more or less spherical shape. ... It has an oval or spherical shape and a dark green and smooth rind, sometimes showing irregular areas of a pale green colour. It has a sweet, juicy, refreshing flesh of yellowish or reddish colour, containing multiple black, brown or white pips.</span></p>', 35, 1000, '2020-05-12 20:27:00', '2020-05-16 02:35:39', 1, 'products\\May2020\\A6sAPDuaDNipyEXqYWHm.png', '[\"products\\\\May2020\\\\LGHBAo8OlQl09hDvwLZ4.png\",\"products\\\\May2020\\\\Islb8Yrz1D5mTI7cOenl.png\"]', 1, NULL, NULL, 1, 900, 100, 0),
(28, 'Toroi (Sponge Gourd)', '<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">The&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Sponge gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is a cylindrical fruit that grows on a climbing, herbaceous vine. ... The interior flesh of the&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Sponge gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is smooth and creamy-white.&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Sponge gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;has a mild, zucchini-like sweet taste and a silky texture. Mature fruits are not tasty, being fibrous, bitter and brown</span><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">The&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Sponge gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is a cylindrical fruit that grows on a climbing, herbaceous vine. ... The interior flesh of the&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Sponge gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is smooth and creamy-white.&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Sponge gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\"> has a mild, zucchini-like sweet taste and a silky texture. Mature fruits are not tasty, being fibrous, bitter and brown.</span></p>', 50, 500, '2020-05-12 20:31:40', '2020-05-12 20:31:40', 2, 'products/May2020/pWMOmlv5xicJ01XwCHTu.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(29, 'Potol (Pointed Gourd)', '<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Trichosanthes dioica, also known as&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">pointed gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, is a vine plant in the family Cucurbitaceae, similar to cucumber and squash, though unlike those it is perennial. It is a dioecious (male and female plants) vine (creeper) plant with heart-shaped leaves (cordate) and is grown on a trellis</span></p>', 50, 500, '2020-05-12 20:34:18', '2020-05-12 20:34:18', 2, 'products/May2020/JRWNXQcJQeAgmCixkKQv.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(30, 'Kundli (Ivy Gourd)', '<p><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Coccinia grandis, the&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">ivy gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, also known as scarlet&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">gourd</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, tindora and kowai fruit, is a tropical vine. It grows primarily in tropical climates and is commonly found in the southern Indian states, where it forms a part of the local cuisine. Coccinia grandis is cooked as a vegetable</span></p>', 40, 500, '2020-05-12 20:39:42', '2020-05-12 20:39:42', 2, 'products/May2020/xdCTGpOqdJ6ji3UHHt7Y.png', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(31, 'Carrot', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Carrot</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, Daucus carota, is an edible, biennial herb in the family Apiaceae grown for its edible root. The&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">carrot</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;plant produces a rosette of 8&ndash;12 leaves above ground and a fleshy conical taproot below ground. The plant produces small (2 mm) flowers which are white, red or purple in color.</span></p>', 50, 500, '2020-05-12 20:41:35', '2020-05-12 20:41:35', 2, 'products/May2020/XrXpeV1C1BqvbV8xrfZX.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(32, 'Capsicum', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Capsicums</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;are an excellent source of vitamin A and C (red contain more than&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">green capsicums</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">). They are also a good source of dietary fibre, vitamin E, B6 and folate. The sweetness of&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">capsicums</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;is due to their natural sugars (</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">green capsicums</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;have less sugar than red&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">capsicums</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">)</span></p>', 50, 500, '2020-05-12 20:47:00', '2020-05-12 20:48:11', 2, 'products/May2020/Fk83Wey7s0pRl0kGxBSZ.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(33, 'Small Potato', NULL, 60, 500, '2020-05-12 20:49:58', '2020-05-12 20:49:58', 2, 'products/May2020/YMzAV5hVrs6ezH0Nl6fe.jpg', NULL, 1, NULL, NULL, 0, NULL, NULL, 0),
(34, 'Chocolate Keto Cake 1kg', '<p><span style=\"color: #76838f; font-family: \'Open Sans\', sans-serif; background-color: #f5f5f5;\">The cake is flourless and sugarfree. For Special request Whatsapp: 9957588417</span></p>', 940, 1, '2020-05-12 20:55:00', '2020-05-13 06:56:52', 3, 'products/May2020/iqaigi0DMbmdVsyFWEgn.jpeg', NULL, 0, NULL, NULL, 0, NULL, NULL, 0),
(35, 'Choco Fantasy 1/2 kg', NULL, 480, 1, '2020-05-12 21:05:00', '2020-05-13 07:06:35', 3, 'products/May2020/XWPtyDTqHmW63EQNRw6i.jpeg', NULL, NULL, NULL, NULL, 0, NULL, NULL, 0),
(36, 'Apple (Himachali)', '<p><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Himachal</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;Pradesh is known worldwide for its variety of&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">apples</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;and has earned the nicknames as the &ldquo;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Apple</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;State&rdquo; and the &ldquo;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">Apple</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;Garden of India.&rdquo; The Shimla&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">apple</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">&nbsp;industry attracts thousands of international tourists and locals, and they come together to visit orchards, pick&nbsp;</span><strong style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">apples</strong><span style=\"color: #222222; font-family: arial, sans-serif; font-size: 16px;\">, and, of course, sample the fruits</span></p>', 150, 500, '2020-05-13 18:43:00', '2020-05-16 02:33:17', 1, 'products\\May2020\\mEmSz72VdDZ79rMMIde7.jpg', '[\"products\\\\May2020\\\\sZ63xw0a1ZD0rsmfhc49.jpg\",\"products\\\\May2020\\\\u9ewuhfOjB7s53sGEwrg.jpg\",\"products\\\\May2020\\\\E8yFTlo6MquYyVoy4RUM.jpeg\"]', 1, '200', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Administrator', '2020-05-02 13:23:40', '2020-05-02 13:23:40'),
(2, 'user', 'Normal User', '2020-05-02 13:23:40', '2020-05-02 13:23:40');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT 1,
  `group` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `display_name`, `value`, `details`, `type`, `order`, `group`) VALUES
(1, 'site.title', 'Site Title', 'Site Title', '', 'text', 1, 'Site'),
(2, 'site.description', 'Site Description', 'Site Description', '', 'text', 2, 'Site'),
(3, 'site.logo', 'Site Logo', '', '', 'image', 3, 'Site'),
(4, 'site.google_analytics_tracking_id', 'Google Analytics Tracking ID', '', '', 'text', 4, 'Site'),
(5, 'admin.bg_image', 'Admin Background Image', '', '', 'image', 5, 'Admin'),
(6, 'admin.title', 'Admin Title', 'Voyager', '', 'text', 1, 'Admin'),
(7, 'admin.description', 'Admin Description', 'Welcome to Voyager. The Missing Admin for Laravel', '', 'text', 2, 'Admin'),
(8, 'admin.loader', 'Admin Loader', '', '', 'image', 3, 'Admin'),
(9, 'admin.icon_image', 'Admin Icon Image', '', '', 'image', 4, 'Admin'),
(10, 'admin.google_analytics_client_id', 'Google Analytics Client ID (used for admin dashboard)', '', '', 'text', 1, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `suborders`
--

CREATE TABLE `suborders` (
  `id` int(10) UNSIGNED NOT NULL,
  `item_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `sub_category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suborders`
--

INSERT INTO `suborders` (`id`, `item_name`, `quantity`, `price`, `total`, `category`, `item_id`, `user_id`, `user_email`, `order_id`, `created_at`, `updated_at`, `sub_category`) VALUES
(29, 'Watermelon', 2000, 60, 120, 1, 27, 53, 'gyanhazarika12@gmail.com', '#L9KPAYIOH', '2020-05-13 05:57:31', '2020-05-13 05:57:31', NULL),
(30, 'Grapes', 500, 160, 80, 1, 25, 53, 'gyanhazarika12@gmail.com', '#L9KPAYIOH', '2020-05-13 05:57:31', '2020-05-13 05:57:31', NULL),
(31, 'Small Potato', 1000, 60, 60, 2, 33, 53, 'gyanhazarika12@gmail.com', '#L9KPAYIOH', '2020-05-13 05:57:31', '2020-05-13 05:57:31', NULL),
(32, 'Bindi (Ladies Finger)', 500, 40, 20, 2, 4, 53, 'gyanhazarika12@gmail.com', '#L9KPAYIOH', '2020-05-13 05:57:31', '2020-05-13 05:57:31', NULL),
(33, 'Choco Fantasy half kg', 2, 1, 2, 3, 35, 53, 'gyanhazarika12@gmail.com', '#L9KPAYIOH', '2020-05-13 05:57:31', '2020-05-13 05:57:31', NULL),
(34, 'Carrot', 500, 50, 25, 2, 31, 53, 'gyanhazarika12@gmail.com', '#G61RIYMCA', '2020-05-13 06:06:52', '2020-05-13 06:06:52', NULL),
(35, 'Kundli (Ivy Gourd)', 500, 40, 20, 2, 30, 53, 'gyanhazarika12@gmail.com', '#G61RIYMCA', '2020-05-13 06:06:52', '2020-05-13 06:06:52', NULL),
(36, 'Pomegranate (Anar)', 2000, 190, 380, 1, 26, 1, 'shahbaz.444khan@gmail.com', '#78C9P2BK6', '2020-05-13 07:11:06', '2020-05-13 07:11:06', NULL),
(37, 'Capsicum', 4500, 50, 225, 2, 32, 1, 'shahbaz.444khan@gmail.com', '#78C9P2BK6', '2020-05-13 07:11:06', '2020-05-13 07:11:06', NULL),
(38, 'Capsicum', 10500, 50, 525, 2, 32, 48, 'shahbaz.444khan@gmail.com', '#FEG47Y1CT', '2020-05-13 10:01:08', '2020-05-13 10:01:08', NULL),
(39, 'Watermelon', 6000, 60, 360, 1, 27, 48, 'shahbaz.444khan@gmail.com', '#FEG47Y1CT', '2020-05-13 10:01:08', '2020-05-13 10:01:08', NULL),
(40, 'Choco Fantasy 1/2 kg', 1, 480, 480, 3, 35, 57, 'shahbaz.444khan@gmail.com', '#VD5630OH7', '2020-05-13 10:04:12', '2020-05-13 10:04:12', NULL),
(41, 'Watermelon', 7000, 60, 420, 1, 27, 61, 'techservicedock@gmail.com', '#79IFCYDGL', '2020-05-13 10:15:04', '2020-05-13 10:15:04', NULL),
(42, 'Mango (Gulabkhas)', 3500, 150, 525, 1, 24, 61, 'techservicedock@gmail.com', '#79IFCYDGL', '2020-05-13 10:15:04', '2020-05-13 10:15:04', NULL),
(43, 'Watermelon', 8000, 60, 480, 1, 27, 65, 'shahbaz.444khan@gmail.com', '#2MI891OKZ', '2020-05-13 12:34:24', '2020-05-13 12:34:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` int(11) DEFAULT NULL,
  `address_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_id` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `delivery_charge` int(11) DEFAULT NULL,
  `total_price` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity_per_day` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 2, 'test', '2020-05-14 10:22:33', '2020-05-14 10:22:33');

-- --------------------------------------------------------

--
-- Table structure for table `temp_orders`
--

CREATE TABLE `temp_orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `landmark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `town_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pincode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address_type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `total_items` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL,
  `delivery_charge` int(11) DEFAULT NULL,
  `total_price` int(11) DEFAULT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `address` varchar(5000) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `temp_orders`
--

INSERT INTO `temp_orders` (`id`, `order_id`, `name`, `user_email`, `mobile`, `landmark`, `town_city`, `pincode`, `address_type`, `total_items`, `sub_total`, `delivery_charge`, `total_price`, `payment_method`, `payment_status`, `created_at`, `updated_at`, `user_id`, `address`, `quantity`, `product_id`) VALUES
(1, '#9UGEZQFSR', NULL, 'electronmedialab@gmail.com', '07002447782', 'Assam', 'Jorhat', '785001', 'Home', 1, 1, 0, NULL, 'Online Payment', 'PENDING', '2020-05-13 01:54:05', '2020-05-13 01:54:05', 50, NULL, NULL, NULL),
(2, '#0U4WO8I73', NULL, 'aichwajyabora@gmail.com', '07399232150', 'Assam', 'Jorhat', '785001', 'Home', 1, 1, 0, NULL, 'Online Payment', 'PENDING', '2020-05-13 01:55:42', '2020-05-13 01:55:42', 50, NULL, NULL, NULL),
(3, '#U6SJZQE2O', 'Aichwajya Bora', 'aichwajyabora@gmail.com', '07002447782', 'Assam', 'Jorhat', '785001', 'Home', 1, 1, 0, 1, 'Online Payment', 'PENDING', '2020-05-13 02:05:58', '2020-05-13 02:05:58', 50, NULL, NULL, NULL),
(5, '#2UT98WACM', 'shahbaz', 'shahbaz.444khan@gmail.com', '9957588417', 'Address', 'Jorhat', '785001', 'Home', 1, 525, 20, 545, 'Online Payment', 'PENDING', '2020-05-13 04:14:57', '2020-05-13 04:14:57', 48, NULL, NULL, NULL),
(6, '#L9KPAYIOH', 'Gyanjyoti Hazarika', 'gyanhazarika12@gmail.com', '07896874270', 'Chondikavilla', 'JORHAT', '785001', 'Home', 5, 282, 20, 302, 'Online Payment', 'PENDING', '2020-05-13 05:56:14', '2020-05-13 05:56:14', 53, NULL, NULL, NULL),
(7, '#T86BLMGPD', 'shahbaz', 'shahbaz.444khan@gmail.com', '9957588417', 'jorhat', 'jorhat', '785001', 'Home', 3, 606, 20, 626, 'Online Payment', 'PENDING', '2020-05-13 06:25:31', '2020-05-13 06:25:31', 1, NULL, NULL, NULL),
(8, '#VD5630OH7', 'shahbaz', 'shahbaz.444khan@gmail.com', '8240586766', 'jorhat', 'jorhat', '785001', 'Home', 1, 480, 20, 500, 'Online Payment', 'PENDING', '2020-05-13 10:04:00', '2020-05-13 10:04:00', 57, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `id` int(10) UNSIGNED NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `column_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foreign_key` int(10) UNSIGNED NOT NULL,
  `locale` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED DEFAULT 2,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'users/default.png',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provider` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`, `provider`, `provider_id`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$RqKASZJOuIXOnOCa4pzF/uRvaijylff7cHw9WRzCxvOHUqhLciD2q', NULL, NULL, '2020-05-02 13:24:58', '2020-05-02 13:24:59', NULL, NULL),
(23, 2, 'Parikhita Sarma', 'sarmaparikhita91@gmail.com', 'users/default.png', NULL, '$2y$10$S4kExHYo6Qj1VPvhlBZII.Ms0ike8rQl9NbgMJCBl28Uhv7cs/eMS', NULL, NULL, '2020-05-10 21:28:06', '2020-05-10 21:28:06', NULL, NULL),
(25, 2, 'Iswar Borthakur', 'iswarbor@gmail.com', 'users/default.png', NULL, '$2y$10$qUQEifmC4veBxkDc5QCgseGF6YZtLlnYgg6Fe7NUfIM0zJusc1jM2', NULL, NULL, '2020-05-11 05:50:53', '2020-05-11 05:50:53', NULL, NULL),
(31, 2, 'Susmita Dey', 'susmitadey432@gmail.com', 'users/default.png', NULL, '$2y$10$Yay3OAiTsu5p7xG.6tKeGO3T1xKcAz8TwPwLIA9nKfXvKIcBDJ96S', NULL, NULL, '2020-05-11 16:03:01', '2020-05-11 16:03:01', NULL, NULL),
(33, 2, 'TASHRIF ULLAH', 'tashrif19@hotmail.com', 'users/default.png', NULL, '$2y$10$aX4vnctRH8zZwdl//vMYPuZo3qdGyTmO6qg0I0cmb3jSOfGSLIHxG', NULL, NULL, '2020-05-11 18:55:52', '2020-05-11 18:55:52', NULL, NULL),
(45, 2, 'JOHAN RAJ DOWERAH', 'johandowerah6@gmail.com', 'users/default.png', NULL, '$2y$10$1OARkK7XXzA.e2/dphBDMOXGI.1Oujt0ONdUEJb9ArVb65.zy6YtS', NULL, NULL, '2020-05-12 17:56:39', '2020-05-12 17:56:39', NULL, NULL),
(52, 2, 'Kim Rose', 'jaesmith9999@gmail.com', 'https://graph.facebook.com/v3.3/2701172843495761/picture?type=normal', NULL, NULL, NULL, NULL, '2020-05-13 00:29:33', '2020-05-13 00:29:33', 'facebook', '2701172843495761'),
(56, 2, 'Abhishek Das', 'abhishekdasjrt@gmail.com', 'https://graph.facebook.com/v3.3/289863622025603/picture?type=normal', NULL, NULL, NULL, NULL, '2020-05-13 09:00:53', '2020-05-13 09:00:53', 'facebook', '289863622025603'),
(60, 2, 'Trisha Borkakoty', 'trishab016@gmail.com', 'https://graph.facebook.com/v3.3/2788066021303137/picture?type=normal', NULL, NULL, NULL, NULL, '2020-05-13 10:12:12', '2020-05-13 10:12:12', 'facebook', '2788066021303137'),
(61, 2, 'GUEST', '9818854434', 'users/default.png', NULL, '1229731141', NULL, NULL, '2020-05-13 10:13:35', '2020-05-13 10:13:35', NULL, NULL),
(62, 2, 'anita das', 'anitadassmch@gmail.com', 'https://lh3.googleusercontent.com/-xDDc1XtxFoU/AAAAAAAAAAI/AAAAAAAAAAA/AMZuucmxOkX0erz0LJYF5T9DzqOij_m_rQ/photo.jpg', NULL, NULL, NULL, NULL, '2020-05-13 11:05:29', '2020-05-13 11:05:29', 'google', '101793656382438302632'),
(63, 2, 'Bobby Roy', 'bobbyroy02@gmail.com', 'users/default.png', NULL, '$2y$10$26CchHwTfuUxwe0VATcgL.WWw5f7xBh91A1OfmKVPytERu9wMmbJq', NULL, NULL, '2020-05-13 12:20:26', '2020-05-13 12:20:26', NULL, NULL),
(64, 2, 'Dipankar Sarmah', 'sarmahdipankar0@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14Gir6ofdRNVuD31SkoTXbIcofSJLXItMMRQPmzg', NULL, NULL, NULL, NULL, '2020-05-13 12:26:26', '2020-05-13 12:26:26', 'google', '105858987281029103640'),
(65, 2, 'Shahbaz Khan', 'shahbaz.444khan@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14Gi30dVlIAao7fFJAew9yOZH2GHBdTUk2--inQcH1YQ', NULL, NULL, NULL, NULL, '2020-05-13 12:33:14', '2020-05-13 12:33:14', 'google', '113650522920945495228'),
(66, 2, 'Siddharth Beriya', 'siddharthberiya@hotmail.com', 'https://graph.facebook.com/v3.3/3429937743687869/picture?type=normal', NULL, NULL, NULL, NULL, '2020-05-13 19:06:22', '2020-05-13 19:06:22', 'facebook', '3429937743687869'),
(67, 2, 'Monjeet Gogoi', 'monjeettez@gmail.com', 'https://lh3.googleusercontent.com/a-/AOh14GjozHE6M0BGatJzzG97XkBeRA9FCqcATyWWl_3Z', NULL, NULL, NULL, NULL, '2020-05-13 19:36:41', '2020-05-13 19:36:41', 'google', '103214349201015349953'),
(68, 2, 'Sonu Garg', 'ruchi97060@gmail.com', 'https://graph.facebook.com/v3.3/2618327648443838/picture?type=normal', NULL, NULL, NULL, NULL, '2020-05-13 20:28:51', '2020-05-13 20:28:51', 'facebook', '2618327648443838'),
(69, 2, 'Arbind singhania', 'aksinghania07@gmail.com', 'users/default.png', NULL, '$2y$10$tAino9bXerFC3xm4jIhfu./VVhnSkEN1eisi3N3/F6LzD9m6wLX0q', NULL, NULL, '2020-05-13 20:55:00', '2020-05-13 20:55:00', NULL, NULL),
(70, 2, 'GUEST', '9435095921', 'users/default.png', NULL, '846011673', NULL, NULL, '2020-05-13 21:53:46', '2020-05-13 21:53:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_roles`
--

CREATE TABLE `user_roles` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_rows_data_type_id_foreign` (`data_type_id`);

--
-- Indexes for table `data_types`
--
ALTER TABLE `data_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `data_types_name_unique` (`name`),
  ADD UNIQUE KEY `data_types_slug_unique` (`slug`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_name_unique` (`name`);

--
-- Indexes for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `menu_items_menu_id_foreign` (`menu_id`);

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
-- Indexes for table `otps`
--
ALTER TABLE `otps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payu_payments`
--
ALTER TABLE `payu_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permissions_key_index` (`key`);

--
-- Indexes for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_permission_id_index` (`permission_id`),
  ADD KEY `permission_role_role_id_index` (`role_id`);

--
-- Indexes for table `pincodes`
--
ALTER TABLE `pincodes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `settings_key_unique` (`key`);

--
-- Indexes for table `suborders`
--
ALTER TABLE `suborders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `temp_orders`
--
ALTER TABLE `temp_orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `translations_table_name_column_name_foreign_key_locale_unique` (`table_name`,`column_name`,`foreign_key`,`locale`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `user_roles_user_id_index` (`user_id`),
  ADD KEY `user_roles_role_id_index` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=139;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `menu_items`
--
ALTER TABLE `menu_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `otps`
--
ALTER TABLE `otps`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `payu_payments`
--
ALTER TABLE `payu_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `suborders`
--
ALTER TABLE `suborders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `temp_orders`
--
ALTER TABLE `temp_orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_rows`
--
ALTER TABLE `data_rows`
  ADD CONSTRAINT `data_rows_data_type_id_foreign` FOREIGN KEY (`data_type_id`) REFERENCES `data_types` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `menu_items`
--
ALTER TABLE `menu_items`
  ADD CONSTRAINT `menu_items_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `user_roles`
--
ALTER TABLE `user_roles`
  ADD CONSTRAINT `user_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `user_roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
