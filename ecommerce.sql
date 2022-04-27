-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2022 at 11:29 PM
-- Server version: 5.7.33
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `password`, `phone`) VALUES
(8, 'Farija Akter', 'farufarija01@gmail.com', '1234', '1244678990098'),
(10, 'Farija Akter', 'faru01@gmail.com', '121', '12345567890');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` int(11) NOT NULL,
  `title` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `title`, `is_active`, `is_deleted`, `created_at`, `modified_at`, `picture`) VALUES
(34, 'Turbain', 1, 0, '2022-01-12 21:02:45', '2022-01-18 02:02:47', 'IMG_1641741257_IMG_1639478651_images.jfif'),
(35, 'banner 1', 1, 0, '2022-01-12 21:16:22', '2022-01-12 21:20:27', 'IMG_1642000827_IMG_1639479269_shopping-cart-icon-vector-eps-trolley-logo-web-icons-shop-button-182252657.jpg'),
(36, 'yyy', 1, 0, '2022-01-17 20:17:01', '2022-01-17 20:17:12', 'IMG_1642429021_IMG_1639478501_xmango-fruit-1.jpg.pagespeed.ic.kLd_EhWnA5.jpg'),
(37, 'microsoft', 1, 0, '2022-01-18 01:59:11', '2022-01-18 01:59:11', 'IMG_1642449551_IMG_1639478686_download.jfif'),
(38, 'z', 1, 0, '2022-01-18 21:49:49', '2022-01-18 21:50:02', 'IMG_1642521002_IMG_1639478651_images.jfif');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `sid` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `qty` int(11) DEFAULT NULL,
  `unite_price` int(55) DEFAULT NULL,
  `total_price` int(55) DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `sid`, `product_id`, `product_title`, `is_active`, `is_deleted`, `qty`, `unite_price`, `total_price`, `picture`) VALUES
(16, 1, 1, 'product 12', 1, 0, 101, 12, 1212, 'IMG_1642432159_IMG_1639478534_Hapus_Mango.jpg'),
(18, 3, 221, 'product 3', 1, 0, 10, 12, 120, 'IMG_1642432193_IMG_1639478686_download.jfif'),
(19, 12, 1, 'product 10', 0, 0, 10, 20, 200, 'IMG_1642450708_IMG_1639901710_download.jpg'),
(20, 2, 111, 'product 1', 1, 0, 10, 12, 120, 'IMG_1642451042_IMG_1639478534_Hapus_Mango.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_draft` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `link`, `is_draft`, `created_at`, `modified_at`) VALUES
(1, 'Farija Akter', 'ddff//', 1, '2022-01-17 12:30:42', '2022-01-17 12:30:56'),
(2, 'ftg', 'tyy676/', 1, '2022-01-18 09:14:06', '2022-01-18 09:14:18');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `email`, `phone`, `subject`) VALUES
(2, 'Farija Akter', 'faru01@gmail.com', '0152122222', 'ff'),
(3, 'Farija Akter', 'farufarija01@gmail.com', '123456', 'ffgggh'),
(4, 'Farija Akter', '1@gmail.com', '1257876542', 'ffgggh');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(55) COLLATE utf8_unicode_ci NOT NULL,
  `is_draft` tinyint(4) NOT NULL DEFAULT '0',
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '0',
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `is_draft`, `description`, `is_active`, `is_deleted`, `picture`, `created_at`, `modified_at`) VALUES
(38, 'jamjam1', 0, 'rrr this is a great one ho', 1, 0, 'IMG_1641999491_IMG_1639906942_images (1).jpg', '2022-01-12 20:57:55', '2022-01-18 02:13:50'),
(39, 'rr', 0, 'opps! this is a great one yes', 1, 1, 'IMG_1642001692_IMG_1639477169_Capture2.PNG', '2022-01-12 21:34:52', '2022-01-13 20:49:36'),
(40, 'fddd', 1, 'ddd', 1, 0, 'IMG_1642007224_IMG_1639478534_Hapus_Mango.jpg', '2022-01-12 23:07:04', '2022-01-12 23:07:04'),
(41, 'faru', 1, 'Beautiful Blue Flower', 1, 0, 'IMG_1642086841_IMG_1639910199_download (2).jpg', '2022-01-13 21:14:02', '2022-01-13 21:14:35'),
(42, 'dfff', 0, 'opps! this is a great one', 1, 1, 'IMG_1642448066_IMG_1639478651_images.jfif', '2022-01-18 01:34:26', '2022-01-18 01:34:26'),
(43, 'Lily', 0, 'opps! this is a great one', 1, 0, 'IMG_1642520090_IMG_1639477237_Capture.PNG', '2022-01-18 21:34:50', '2022-01-18 21:34:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(55) COLLATE utf8_unicode_ci DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `phone`, `password`, `is_deleted`, `created_at`, `modified_at`) VALUES
(2, 'Farija Akter', 'farija1', 'farufarija01@gmail.com', '12234567890', '12', 0, '2022-01-18 00:04:16', '2022-01-18 00:04:16'),
(3, 'Farija Akter', 'd1q1', 'faru01@gmail.com', '1234567', '1', 0, '2022-01-18 02:51:45', '2022-01-18 02:51:45'),
(10, 'farija', 'fari1', 'ff@gmail.com', '011521226424', '1234', 1, '2022-01-17 23:31:40', '2022-01-18 02:53:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
