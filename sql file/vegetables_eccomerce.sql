-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 09, 2020 at 02:12 AM
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
(6, 1, 1, 100, '2020-05-07 15:24:59', '2020-05-07 15:24:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fruits', '2020-05-04 10:44:22', '2020-05-04 10:44:22'),
(2, 'Vegetables', '2020-05-04 10:44:34', '2020-05-04 10:44:34');

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
(1, 1, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(2, 1, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(3, 1, 'email', 'text', 'Email', 1, 1, 1, 1, 1, 1, NULL, 3),
(4, 1, 'password', 'password', 'Password', 1, 0, 0, 1, 1, 0, NULL, 4),
(5, 1, 'remember_token', 'text', 'Remember Token', 0, 0, 0, 0, 0, 0, NULL, 5),
(6, 1, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 0, 0, 0, NULL, 6),
(7, 1, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 7),
(8, 1, 'avatar', 'image', 'Avatar', 0, 1, 1, 1, 1, 1, NULL, 8),
(9, 1, 'user_belongsto_role_relationship', 'relationship', 'Role', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsTo\",\"column\":\"role_id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"roles\",\"pivot\":0}', 10),
(10, 1, 'user_belongstomany_role_relationship', 'relationship', 'Roles', 0, 1, 1, 1, 1, 0, '{\"model\":\"TCG\\\\Voyager\\\\Models\\\\Role\",\"table\":\"roles\",\"type\":\"belongsToMany\",\"column\":\"id\",\"key\":\"id\",\"label\":\"display_name\",\"pivot_table\":\"user_roles\",\"pivot\":\"1\",\"taggable\":\"0\"}', 11),
(11, 1, 'settings', 'hidden', 'Settings', 0, 0, 0, 0, 0, 0, NULL, 12),
(12, 2, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(13, 2, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(14, 2, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(15, 2, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(16, 3, 'id', 'number', 'ID', 1, 0, 0, 0, 0, 0, NULL, 1),
(17, 3, 'name', 'text', 'Name', 1, 1, 1, 1, 1, 1, NULL, 2),
(18, 3, 'created_at', 'timestamp', 'Created At', 0, 0, 0, 0, 0, 0, NULL, 3),
(19, 3, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, NULL, 4),
(20, 3, 'display_name', 'text', 'Display Name', 1, 1, 1, 1, 1, 1, NULL, 5),
(21, 1, 'role_id', 'text', 'Role', 1, 1, 1, 1, 1, 1, NULL, 9),
(22, 4, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(23, 4, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(24, 4, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 3),
(25, 4, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 4),
(26, 5, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(27, 5, 'name', 'text', 'Name', 0, 1, 1, 1, 1, 1, '{}', 4),
(28, 5, 'description', 'rich_text_box', 'Description', 0, 1, 1, 1, 1, 1, '{}', 5),
(29, 5, 'price_per_kg', 'number', 'Price Per Kg', 0, 1, 1, 1, 1, 1, '{}', 6),
(30, 5, 'minimum_quantity', 'number', 'Minimum Quantity In Grams', 0, 1, 1, 1, 1, 1, '{}', 7),
(31, 5, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 10),
(32, 5, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 11),
(33, 5, 'product_belongsto_category_relationship', 'relationship', 'categories', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Category\",\"table\":\"categories\",\"type\":\"belongsTo\",\"column\":\"category\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"categories\",\"pivot\":\"0\",\"taggable\":\"0\"}', 2),
(34, 5, 'category', 'text', 'Category', 0, 1, 1, 1, 1, 1, '{}', 3),
(35, 5, 'main_image', 'image', 'Main Image', 0, 1, 1, 1, 1, 1, '{}', 8),
(36, 5, 'other_images', 'multiple_images', 'Other Images', 0, 1, 1, 1, 1, 1, '{}', 9),
(37, 6, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 1),
(38, 6, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 2),
(39, 6, 'product_id', 'text', 'Product Id', 0, 1, 1, 1, 1, 1, '{}', 5),
(40, 6, 'quantity', 'number', 'Quantity in grams', 0, 1, 1, 1, 1, 1, '{}', 6),
(41, 6, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 7),
(42, 6, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 8),
(43, 6, 'cart_belongsto_product_relationship', 'relationship', 'products', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"product_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 4),
(44, 6, 'cart_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
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
(63, 8, 'payment_status', 'text', 'Payment Status', 0, 1, 1, 1, 1, 1, '{}', 17),
(64, 8, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 18),
(65, 8, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 19),
(66, 8, 'order_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 3),
(67, 8, 'order_belongsto_user_relationship_1', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_email\",\"key\":\"email\",\"label\":\"email\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 5),
(68, 8, 'sub_total', 'text', 'Sub Total', 0, 1, 1, 1, 1, 1, '{}', 14),
(69, 8, 'delivery_charge', 'text', 'Delivery Charge', 0, 1, 1, 1, 1, 1, '{}', 15),
(70, 8, 'transaction_id', 'text', 'Transaction Id', 0, 1, 1, 1, 1, 1, '{}', 18),
(71, 9, 'id', 'text', 'Id', 1, 0, 0, 0, 0, 0, '{}', 0),
(72, 9, 'item_name', 'text', 'Item Name', 0, 1, 1, 1, 1, 1, '{}', 2),
(73, 9, 'quantity', 'text', 'Quantity', 0, 1, 1, 1, 1, 1, '{}', 3),
(74, 9, 'price', 'text', 'Price', 0, 1, 1, 1, 1, 1, '{}', 4),
(75, 9, 'total', 'text', 'Total', 0, 1, 1, 1, 1, 1, '{}', 5),
(76, 9, 'category', 'text', 'Category', 0, 1, 1, 1, 1, 1, '{}', 6),
(77, 9, 'item_id', 'text', 'Item Id', 0, 1, 1, 1, 1, 1, '{}', 7),
(78, 9, 'user_id', 'text', 'User Id', 0, 1, 1, 1, 1, 1, '{}', 10),
(79, 9, 'user_email', 'text', 'User Email', 0, 1, 1, 1, 1, 1, '{}', 11),
(80, 9, 'order_id', 'text', 'Order Id', 0, 1, 1, 1, 1, 1, '{}', 13),
(81, 9, 'created_at', 'timestamp', 'Created At', 0, 1, 1, 1, 0, 1, '{}', 15),
(82, 9, 'updated_at', 'timestamp', 'Updated At', 0, 0, 0, 0, 0, 0, '{}', 16),
(83, 9, 'suborder_belongsto_user_relationship', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 8),
(84, 9, 'suborder_belongsto_user_relationship_1', 'relationship', 'users', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\User\",\"table\":\"users\",\"type\":\"belongsTo\",\"column\":\"user_email\",\"key\":\"email\",\"label\":\"email\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 12),
(85, 9, 'suborder_belongsto_product_relationship', 'relationship', 'products', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"item_name\",\"key\":\"name\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 9),
(86, 9, 'suborder_belongsto_product_relationship_1', 'relationship', 'products', 0, 1, 1, 1, 1, 1, '{\"model\":\"App\\\\Product\",\"table\":\"products\",\"type\":\"belongsTo\",\"column\":\"item_id\",\"key\":\"id\",\"label\":\"name\",\"pivot_table\":\"carts\",\"pivot\":\"0\",\"taggable\":\"0\"}', 14),
(87, 8, 'delivery_status', 'text', 'Delivery Status', 0, 1, 1, 1, 1, 1, '{}', 19);

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
(1, 'users', 'users', 'User', 'Users', 'voyager-person', 'TCG\\Voyager\\Models\\User', 'TCG\\Voyager\\Policies\\UserPolicy', 'TCG\\Voyager\\Http\\Controllers\\VoyagerUserController', '', 1, 0, NULL, '2020-05-02 13:23:27', '2020-05-02 13:23:27'),
(2, 'menus', 'menus', 'Menu', 'Menus', 'voyager-list', 'TCG\\Voyager\\Models\\Menu', NULL, '', '', 1, 0, NULL, '2020-05-02 13:23:28', '2020-05-02 13:23:28'),
(3, 'roles', 'roles', 'Role', 'Roles', 'voyager-lock', 'TCG\\Voyager\\Models\\Role', NULL, 'TCG\\Voyager\\Http\\Controllers\\VoyagerRoleController', '', 1, 0, NULL, '2020-05-02 13:23:28', '2020-05-02 13:23:28'),
(4, 'categories', 'categories', 'Category', 'Categories', NULL, 'App\\Category', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null}', '2020-05-04 10:32:48', '2020-05-04 10:32:48'),
(5, 'products', 'products', 'Product', 'Products', 'voyager-logbook', 'App\\Product', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-04 10:39:31', '2020-05-04 10:53:12'),
(6, 'carts', 'carts', 'Cart', 'Carts', 'voyager-credit-cards', 'App\\Cart', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-05 05:48:56', '2020-05-05 05:51:14'),
(7, 'pincodes', 'pincodes', 'Pincode', 'Pincodes', 'voyager-hammer', 'App\\Pincode', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-05 12:01:39', '2020-05-05 12:02:19'),
(8, 'orders', 'orders', 'Order', 'Orders', 'voyager-rum', 'App\\Order', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-07 01:55:25', '2020-05-08 15:31:11'),
(9, 'suborders', 'suborders', 'Suborder', 'Suborders', 'voyager-lab', 'App\\Suborder', NULL, NULL, NULL, 1, 0, '{\"order_column\":null,\"order_display_column\":null,\"order_direction\":\"asc\",\"default_search_key\":null,\"scope\":null}', '2020-05-07 02:23:36', '2020-05-07 02:26:48');

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
(5, 1, 'Tools', '', '_self', 'voyager-tools', NULL, NULL, 9, '2020-05-02 13:23:38', '2020-05-02 13:23:38', NULL, NULL),
(6, 1, 'Menu Builder', '', '_self', 'voyager-list', NULL, 5, 10, '2020-05-02 13:23:38', '2020-05-02 13:23:38', 'voyager.menus.index', NULL),
(7, 1, 'Database', '', '_self', 'voyager-data', NULL, 5, 11, '2020-05-02 13:23:38', '2020-05-02 13:23:38', 'voyager.database.index', NULL),
(8, 1, 'Compass', '', '_self', 'voyager-compass', NULL, 5, 12, '2020-05-02 13:23:38', '2020-05-02 13:23:38', 'voyager.compass.index', NULL),
(9, 1, 'BREAD', '', '_self', 'voyager-bread', NULL, 5, 13, '2020-05-02 13:23:39', '2020-05-02 13:23:39', 'voyager.bread.index', NULL),
(10, 1, 'Settings', '', '_self', 'voyager-settings', NULL, NULL, 14, '2020-05-02 13:23:39', '2020-05-02 13:23:39', 'voyager.settings.index', NULL),
(11, 1, 'Hooks', '', '_self', 'voyager-hook', NULL, 5, 13, '2020-05-02 13:23:58', '2020-05-02 13:23:58', 'voyager.hooks', NULL),
(12, 1, 'Categories', '', '_self', 'voyager-cannon', '#000000', NULL, 15, '2020-05-04 10:32:50', '2020-05-04 10:33:55', 'voyager.categories.index', 'null'),
(13, 1, 'Products', '', '_self', 'voyager-logbook', NULL, NULL, 16, '2020-05-04 10:39:31', '2020-05-04 10:39:31', 'voyager.products.index', NULL),
(14, 1, 'Carts', '', '_self', 'voyager-credit-cards', NULL, NULL, 17, '2020-05-05 05:48:57', '2020-05-05 05:48:57', 'voyager.carts.index', NULL),
(15, 1, 'Pincodes', '', '_self', 'voyager-hammer', '#000000', NULL, 18, '2020-05-05 12:01:40', '2020-05-05 12:02:48', 'voyager.pincodes.index', 'null'),
(16, 1, 'Orders', '', '_self', 'voyager-rum', NULL, NULL, 19, '2020-05-07 01:55:26', '2020-05-07 01:55:26', 'voyager.orders.index', NULL),
(17, 1, 'Suborders', '', '_self', 'voyager-lab', NULL, NULL, 20, '2020-05-07 02:23:37', '2020-05-07 02:23:37', 'voyager.suborders.index', NULL);

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
  `delivery_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'PENDING'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `user_email`, `name`, `mobile`, `landmark`, `town_city`, `pincode`, `address_type`, `total_items`, `order_id`, `total_price`, `payment_status`, `created_at`, `updated_at`, `sub_total`, `delivery_charge`, `transaction_id`, `delivery_status`) VALUES
(7, 1, 'admin@admin.com', 'Archit Singh', '07002088304', 'Assam', 'Tinsukia', 786171, 'Office', 1, '#AO93MFUW5', 77, 'Completed', '2020-05-07 06:32:53', '2020-05-07 06:32:53', 27, 50, 'MOJO0507305A82133521', 'PENDING'),
(8, 1, 'admin@admin.com', 'Archit Singh', '+917002088304', 'Assam', 'Tinsukia', 786171, 'Office', 1, '#JXWMEDROB', 77, 'Completed', '2020-05-07 09:10:00', '2020-05-07 09:10:00', 27, 50, 'MOJO0507L05A82133655', 'PENDING'),
(9, 1, 'admin@admin.com', 'Archit Singh', '7002088304', 'Assam', 'Tinsukia', 786171, 'Office', 1, '#BKM2EX96J', 77, 'Completed', '2020-05-07 15:09:44', '2020-05-07 15:09:44', 27, 50, 'MOJO0507A05A82133775', 'Delivered'),
(10, 1, 'admin@admin.com', 'Archit Singh', '07002088304', 'Assam', 'Tinsukia', 786171, 'Office', 1, '#S0V8MUABZ', 54, 'Completed', '2020-05-07 15:17:18', '2020-05-07 15:17:18', 4, 50, 'MOJO0507R05A82133776', 'Delivered');

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
('architsingh99@gmail.com', '$2y$10$YLDBtcoVUbd0k.nWtWlZVej1ZNCIXH8OM4eKl0PIQqqqmqvfgNvPW', '2020-05-03 11:24:13');

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
(56, 'delete_suborders', 'suborders', '2020-05-07 02:23:37', '2020-05-07 02:23:37');

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
(56, 1);

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
(1, 786171, 50, 60, '2020-05-05 12:03:13', '2020-05-05 12:03:13');

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
  `other_images` varchar(2000) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price_per_kg`, `minimum_quantity`, `created_at`, `updated_at`, `category`, `main_image`, `other_images`) VALUES
(1, 'Onion', '<p><span style=\"color: #4d5156; font-family: arial, sans-serif;\">The onion, also known as the bulb onion or common onion, is a vegetable that is the most widely cultivated species of the genus Allium. Its close relatives include the garlic, shallot, leek, chive, and Chinese onion</span></p>', 40, 100, '2020-05-04 10:45:00', '2020-05-04 10:53:57', 2, 'products\\May2020\\WSQocFZ8QC8hK4Mt1184.jpg', NULL),
(2, 'Potato', '<p><span style=\"color: #4d5156; font-family: arial, sans-serif;\">The onion, also known as the bulb onion or common onion, is a vegetable that is the most widely cultivated species of the genus Allium. Its close relatives include the garlic, shallot, leek, chive, and Chinese onion</span></p>', 30, 100, '2020-05-04 10:46:00', '2020-05-04 10:53:45', 2, 'products\\May2020\\TVIxPIFF5WBWbhrz32x0.jpg', NULL);

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
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suborders`
--

INSERT INTO `suborders` (`id`, `item_name`, `quantity`, `price`, `total`, `category`, `item_id`, `user_id`, `user_email`, `order_id`, `created_at`, `updated_at`) VALUES
(1, 'Potato', 900, 30, 27000, 2, 2, 1, 'admin@admin.com', '#AO93MFUW5', '2020-05-07 06:39:53', '2020-05-07 06:39:53'),
(2, 'Potato', 900, 30, 27000, 2, 2, 1, 'admin@admin.com', '#BKM2EX96J', '2020-05-07 15:10:24', '2020-05-07 15:10:24'),
(3, 'Onion', 100, 40, 4000, 2, 1, 1, 'admin@admin.com', '#S0V8MUABZ', '2020-05-07 15:18:09', '2020-05-07 15:18:09');

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
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `settings` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `email`, `avatar`, `email_verified_at`, `password`, `remember_token`, `settings`, `created_at`, `updated_at`) VALUES
(1, 1, 'Admin', 'admin@admin.com', 'users/default.png', NULL, '$2y$10$RqKASZJOuIXOnOCa4pzF/uRvaijylff7cHw9WRzCxvOHUqhLciD2q', NULL, NULL, '2020-05-02 13:24:58', '2020-05-02 13:24:59'),
(16, 2, 'Archit Singh', 'architsingh99@gmail.com', 'users/default.png', NULL, '$2y$10$FNXrc9k5jMMo4eTAHDEu6ux/NUfZyWrHAMQip4k/N8h661YZWBtlW', NULL, NULL, '2020-05-03 09:42:59', '2020-05-03 09:42:59');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `data_rows`
--
ALTER TABLE `data_rows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `data_types`
--
ALTER TABLE `data_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payu_payments`
--
ALTER TABLE `payu_payments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `pincodes`
--
ALTER TABLE `pincodes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

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
