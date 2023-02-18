-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2022 at 02:41 PM
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
-- Database: `realstatemanagemensystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enable_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `admin_email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(111) COLLATE utf8_unicode_ci NOT NULL,
  `admin_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(22) COLLATE utf8_unicode_ci NOT NULL,
  `usertype` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `mobileNo` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `password`, `enable_password`, `admin_email`, `address`, `admin_image`, `gender`, `usertype`, `status`, `created_at`, `mobileNo`) VALUES
(1, 'Admin', '21232f297a57a5a743894a0e4a801fc3', '12345678', 'admin@gmail.com', 'Noida 58', '1663849670.png', 'Male', 0, 1, '2021-02-23 09:22:28', '1254876930'),
(35, 'sub-admin', '2ca9de922374990b5e65f2b832d9a643', 'subadmin@123', 'subadmin@gmail.com', 'Noida', '1663917541.png', 'Male', 1, 1, '2022-07-12 16:44:35', '9026992938'),
(36, 'Rohan Maurya', '41b046191358d2415a4bfd551656c061', 'rohan@123', 'rohanmaurya754@gmail.com', 'Mohammdalla', '1664518879.png', 'Male', 1, 1, '2022-07-12 16:46:32', '9170618798'),
(39, 'Dee', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'sh@gmail.com', 'Noida 50', '1664524223.png', 'Male', 1, 1, '2022-09-30 13:20:23', '9879879879'),
(43, 'CFDgd', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'dsbhnn@gmail.com', 'Noida 59', 'user.png', 'Male', 1, 1, '2022-09-30 14:26:00', '9879879887');

-- --------------------------------------------------------

--
-- Table structure for table `cheque_status`
--

CREATE TABLE `cheque_status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cheque_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `langauge`
--

CREATE TABLE `langauge` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `maintenance`
--

CREATE TABLE `maintenance` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `apartment_id` int(11) NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cheque_no` int(11) NOT NULL,
  `cheque_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `maintenance`
--

INSERT INTO `maintenance` (`id`, `staff_id`, `area_id`, `building_id`, `apartment_id`, `payment_mode`, `cheque_no`, `cheque_status`, `amount`, `description`, `created_at`, `updated_at`) VALUES
(1, '162', 1, 1, 1, 'Cheque', 258963, 'Cleared', 12000, 'Bulb', '2022-10-13 11:45:40', '2022-10-13 11:45:40');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(4, '2021_02_26_063042_create_social_facebook_accounts_table', 1),
(5, '2022_05_02_083500_create_model_settings_table', 2),
(6, '2022_05_16_050328_create_user_tyrpes_table', 3),
(49, '2022_10_13_103307_users_tables', 4),
(64, '2014_10_12_000000_create_users_table', 5),
(65, '2014_10_12_100000_create_password_resets_table', 5),
(66, '2019_08_19_000000_create_failed_jobs_table', 5),
(67, '2019_12_14_000001_create_personal_access_tokens_table', 5),
(68, '2022_10_04_121143_create_langauge_table', 5),
(69, '2022_10_04_121946_create_tbl_area_table', 5),
(70, '2022_10_04_122320_create_tbl_building_table', 5),
(71, '2022_10_04_122631_create_payment_table', 5),
(72, '2022_10_04_124116_create_cheque_status_table', 5),
(73, '2022_10_04_124513_create_tbl_appartment_table', 5),
(74, '2022_10_11_094236_drop_user_table', 5),
(75, '2022_10_11_094742_drop_users_table', 5),
(76, '2022_10_13_045732_create_maintenance_table', 5),
(77, '2022_10_13_095457_drop_payment_table', 5);

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
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `area_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `appartment_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cheque_no` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `cheque_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `maintenance_type` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `staff_id`, `user_id`, `area_code`, `building_code`, `appartment_code`, `payment_mode`, `cheque_no`, `amount`, `cheque_status`, `maintenance_type`, `created_at`, `updated_at`) VALUES
(1, 162, 1, 'Sector-57', 'Amrapali', '501', '2', 258741, 12000, 'cleared', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` int(11) NOT NULL,
  `sub_admin_id` int(11) NOT NULL,
  `city` varchar(255) NOT NULL COMMENT '0 -> No\r\n1 -> Yes\r\n\r\nCreate,View,Edit,Delete',
  `area` varchar(255) NOT NULL COMMENT '0 -> No\r\n1 -> Yes',
  `building` varchar(255) NOT NULL COMMENT '0 -> No\r\n1 -> Yes',
  `tenant` varchar(255) NOT NULL COMMENT '0 -> No\r\n1 -> Yes',
  `apartment` varchar(255) NOT NULL COMMENT '0 -> No\r\n1 -> Yes',
  `payment` varchar(255) NOT NULL COMMENT '0 -> No\r\n1 -> Yes',
  `maintenance_expense` varchar(255) NOT NULL COMMENT '0 -> No\r\n1 -> Yes',
  `report` varchar(255) NOT NULL COMMENT '0 -> No\r\n1 -> Yes'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `sub_admin_id`, `city`, `area`, `building`, `tenant`, `apartment`, `payment`, `maintenance_expense`, `report`) VALUES
(1, 35, '1,1,1,0', '0,0,1,0', '1,1,0,1', '0,1,1,0', '0,1,1,0', '1,0,1,1', '0,0,1,1', '1,1,1,0');

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
-- Table structure for table `staff_user`
--

CREATE TABLE `staff_user` (
  `id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmpassword` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `enable_password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `mobile` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_image` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `staff_status` int(11) DEFAULT 1,
  `permission` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `location` int(11) DEFAULT 0,
  `device_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `staff_user`
--

INSERT INTO `staff_user` (`id`, `name`, `password`, `confirmpassword`, `enable_password`, `email`, `mobile`, `staff_image`, `staff_status`, `permission`, `location`, `device_token`) VALUES
(151, 'Aanchal Srivastava', 'e10adc3949ba59abbe56e057f20f883e', 'd41d8cd98f00b204e9800998ecf8427e', '123456', 'aanchal@gmail.com', '56239874581', '1641557045.jpg', 1, '1,0,0,1', 1, 'elDaXLZ2TM-MQ7BPCoN9oW:APA91bGntIWdAtsUN2tmLaffpMu49eqbRI_7-LZYk_S5je7Xq8Y-TSNhQk_lzj416SJriUr1yjuS26AgkUoSQbJxls5_Jt48HbS99WOjD7EqYrJq2YC22Ae1ef0wuRG7tRGi0OWrv0lN'),
(156, 'sdfs', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'wuteuywt@gmail.com', '7788912', '1641809752.jpg', 0, '', 0, NULL),
(157, 'Ramesh Babu', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sdwiretywer@gmail.com', '2345678', '1641992070.PNG', 1, '', 0, NULL),
(159, 'eddy', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'sadadasdf@gmail.com', '1234581', '1641814465.jpg', 1, '', 0, NULL),
(160, 'Jai Sri Ram', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'jaisriram@gmail.com', '7894561', '1641992368.PNG', 1, '', 0, NULL),
(161, 'Sandeep Maurya', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'svf.sandeep12@gmail.com', '2312312', '1643258605.png', 1, '', 0, NULL),
(162, 'RAM SINGH', '25d55ad283aa400af464c76d713c07ad', 'd41d8cd98f00b204e9800998ecf8427e', '123456', 'ramsingh11@gmail.com', '1234567', '1658321148.jpg', 1, '1,1,1,1', 0, 'c3s_yWRUQDOjGA7GI0qzC2:APA91bE6t-br7WA2d7Rb2r4QZKqCiwwEAGN_flAZi3TaxjaNrdAfKo69G1uhPBHxhb0FP_WXu1mZXcmCVf_j-I_I9XcmZAXgZAzL7hVM2dn6JtR5TXjfIrNP7MSJbehXpLawxpPBBwKN'),
(177, 'hh', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin1@gmail.com', '1234567', '1644045760.png', 1, '', 0, 'cb1q3IUBS1yPmucvS8i50Q:APA91bFMYM8xlnXInBa69TLA92n0w4_vNOCSwGZ1SDLLd6MwGVnod8WWpbhYIfm8B5r8Rd3oL8XpraDd5jPxxG4UBw-Wu7eabg4SQvMAMTCSWk2JyeDDXeWVExZ1bF93cui1rZoRSxh3'),
(178, 'hh', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin2@gmail.com', '1234567', '1644046544.png', 0, '', 0, 'elDaXLZ2TM-MQ7BPCoN9oW:APA91bGntIWdAtsUN2tmLaffpMu49eqbRI_7-LZYk_S5je7Xq8Y-TSNhQk_lzj416SJriUr1yjuS26AgkUoSQbJxls5_Jt48HbS99WOjD7EqYrJq2YC22Ae1ef0wuRG7tRGi0OWrv0lN'),
(179, 'hhT', 'e10adc3949ba59abbe56e057f20f883e', 'd41d8cd98f00b204e9800998ecf8427e', '123456', 'admin3@gmail.com.IN', '1234567', '1644047128.jpg', 0, '', 0, NULL),
(180, 'hh', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin4@gmail.com', '1234567', '1644051209.jpg', 1, '', 0, NULL),
(181, 'hh', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin5@gmail.com', '8935871433', '1644052288.png', 1, '', 0, NULL),
(183, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin6@gmail.com', '8935871433', '1644053500.png', 1, '', 0, NULL),
(184, 'hh', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin7@gmail.com', '8935871433', '1644054018.png', 1, '', 0, NULL),
(186, 'David Smith', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'davidsmith@gmail.com', '9874563214', '1644559681.jpg', 1, '', 0, NULL),
(187, 'rakhi', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin8@gmail.com', '1234567', '1644837171.png', 1, '', 0, 'cb1q3IUBS1yPmucvS8i50Q:APA91bFMYM8xlnXInBa69TLA92n0w4_vNOCSwGZ1SDLLd6MwGVnod8WWpbhYIfm8B5r8Rd3oL8XpraDd5jPxxG4UBw-Wu7eabg4SQvMAMTCSWk2JyeDDXeWVExZ1bF93cui1rZoRSxh3'),
(188, 'neha', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin9@gmail.com', '1234567', '1644839600.jpg', 1, '', 0, NULL),
(189, 'Niraj', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'ketan@gmail.com', '8965412411', '1644841803.jpg', 1, '', 0, NULL),
(190, 'test', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin10@gmail.com', '12345671', '1644899159.jpg', 1, '', 0, NULL),
(191, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin11@gmail.com', '1234567', '1644899352.jpg', 1, '', 0, NULL),
(193, 'Amrit raj', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'amrit@gmail.com', '8956234147', '1644901086.jpg', 1, '', 0, NULL),
(194, 'kusum', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'admin12@gmail.com', '89358714331', '1644905385.jpg', 1, '', 0, NULL),
(195, 'hh', '$2y$10$SsQm415ziTtGw0qzXQpPJex6b.48.PZ32AcNXervg3cp6PnNO0SPa', '$2y$10$EQWGc8Iy14xbXyUNzLWbqOt4z1oXvage6MOs1V.oAsppkImZFKVUW', '1234', 'rakhi@gmail.com', '1234567', '1644908239.jpg', 1, '', 0, NULL),
(196, 'hh', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'kusum@gmail.com', '12345671', '1644908347.jpg', 1, '', 0, 'fC-Ko1EtQKSZfT-WWvXa6v:APA91bESZ5pSRtyaNJfs9H8PAv9K1ffxIGTTDlORmw0xOb54Mn3b1-2kkgDwjIYtDjPgEmRJH9LkOzcwGyT5VJe296nQ9Rl0EfsoZ7fNGiRits2GchIB5XATBsRi5FkGK1MHl2X6nqyv'),
(200, 'ram', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '123', 'adminss@gmail.com', '89358714331', '1644909382.png', 1, '', 0, NULL),
(222, 'Kirthiman', '912ec803b2ce49e4a541068d495ab570', '912ec803b2ce49e4a541068d495ab570', 'asdf', 'kirtiman@gmail.com', '8521003300', '1644915922.jpg', 1, '', 0, 'fC-Ko1EtQKSZfT-WWvXa6v:APA91bESZ5pSRtyaNJfs9H8PAv9K1ffxIGTTDlORmw0xOb54Mn3b1-2kkgDwjIYtDjPgEmRJH9LkOzcwGyT5VJe296nQ9Rl0EfsoZ7fNGiRits2GchIB5XATBsRi5FkGK1MHl2X6nqyv'),
(224, 'hh', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '123', 'admin22@gmail.com', '1234567', '1644916613.jpg', 1, '', 0, NULL),
(225, 'hh', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '123', 'adminlkjklj22@gmail.com', '1234567', '1644916647.jpg', 1, '', 0, NULL),
(226, 'hh', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '123', 'admin346456@gmail.com', '1234567', '1644916723.jpg', 1, '', 0, NULL),
(227, 'Kirtiman1', '912ec803b2ce49e4a541068d495ab570', 'd41d8cd98f00b204e9800998ecf8427e', 'asdf', 'kirtimaan1@gmail.com', '8524125410', '1644916951.jpg', 0, '', 0, NULL),
(228, 'RTS', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'rts123@gmail.com', '7088579857', '1645438793.jpg', 1, '', 0, NULL),
(229, 'Mark', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'Markbrd100000@gmail.com', '0987654321', '1645439098.png', 1, '', 0, 'c3s_yWRUQDOjGA7GI0qzC2:APA91bE6t-br7WA2d7Rb2r4QZKqCiwwEAGN_flAZi3TaxjaNrdAfKo69G1uhPBHxhb0FP_WXu1mZXcmCVf_j-I_I9XcmZAXgZAzL7hVM2dn6JtR5TXjfIrNP7MSJbehXpLawxpPBBwKN'),
(230, 'JC SINGH', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'jcsingh123@gmail.com', '8056987595', '1645686351.jpg', 1, '', 0, NULL),
(231, 'RTS', 'fcea920f7412b5da7be0cf42b8c93759', 'fcea920f7412b5da7be0cf42b8c93759', '1234567', 'rts1234@gmail.com', '8055698745', '1645686691.jpg', 1, '', 0, NULL),
(232, 'ADS', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'ads@gmail.com', '8095663598', '1645687436.jpg', 1, '', 0, NULL),
(233, 'ATR', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'atr123@gmail.com', '9870568790', '1645688045.jpg', 1, '', 0, NULL),
(234, 'ABS', 'fcea920f7412b5da7be0cf42b8c93759', 'fcea920f7412b5da7be0cf42b8c93759', '1234567', 'abs@gmail.com', '9856897890', '1645688118.jpg', 1, '', 0, NULL),
(235, 'ARS', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'ars@gmail.com', '8090905687', '1645688181.jpg', 1, '', 0, NULL),
(236, 'HSD', '6c44e5cd17f0019c64b042e4a745412a', '6c44e5cd17f0019c64b042e4a745412a', '987654', 'hsd@gmail.com', '7090546023', '1645688620.jpg', 1, '', 0, NULL),
(237, 'ASD', '7c51a5e6ea3214af970a86df89793b19', '7c51a5e6ea3214af970a86df89793b19', '9876543', 'asd@gmail.com', '7060908070', '1645688699.jpg', 1, '', 0, NULL),
(238, 'ARK', '81dc9bdb52d04dc20036dbd8313ed055', '81dc9bdb52d04dc20036dbd8313ed055', '1234', 'apk@gmail.com', '8090605040', '1645688780.jpg', 1, '', 0, NULL),
(239, 'abc', '202cb962ac59075b964b07152d234b70', '202cb962ac59075b964b07152d234b70', '123', 'ram@gmail.com', '123456789', '1645691664.jpg', 1, '', 0, NULL),
(240, 'Sam Maurya', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'iamsammaurya@gmail.com', '9625326569', '1646115081.jpg', 1, '', 0, NULL),
(241, 'kamal', '827ccb0eea8a706c4c34a16891f84e7b', '827ccb0eea8a706c4c34a16891f84e7b', '12345', 'kamal123@gmail.com', '9761173690', '1646117689.jpg', 1, '', 0, 'cFpLq_DZRnaV5_urpVFWoJ:APA91bH9BVLNWwhhYnVC4LLhQxg4t0__02dDUimUYm35HhG6F5Q9nB44zU-362MabwgY4Y6vvQXNyJJ4yzan2ZusdEU9k2N1QwFpYFdhNtH-VGojVUtHXjlg8NeCO3hdjNlJONnSGmRe'),
(242, 'ASHOK', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'ASHOK@GMAIL.COM', '9716524928', '1647935153.jpg', 1, '', 0, NULL),
(243, 'abc', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'abc@gmail.com', '9759641236', '1647941474.jpg', 1, '', 0, 'elDaXLZ2TM-MQ7BPCoN9oW:APA91bGntIWdAtsUN2tmLaffpMu49eqbRI_7-LZYk_S5je7Xq8Y-TSNhQk_lzj416SJriUr1yjuS26AgkUoSQbJxls5_Jt48HbS99WOjD7EqYrJq2YC22Ae1ef0wuRG7tRGi0OWrv0lN'),
(244, 'User2', 'a8698009bce6d1b8c2128eddefc25aad', 'a8698009bce6d1b8c2128eddefc25aad', '098765', 'user2@gmail.com', '00999999999', '1648103850.jpg', 1, '', 0, NULL),
(245, 'User3', 'a8698009bce6d1b8c2128eddefc25aad', 'a8698009bce6d1b8c2128eddefc25aad', '098765', 'user3@gmail.com', '00999999999', '1648104000.jpg', 1, '', 0, NULL),
(246, 'Manel', 'e10adc3949ba59abbe56e057f20f883e', 'e10adc3949ba59abbe56e057f20f883e', '123456', 'Manel.l@gmail.com', '099999911', '1648112249.png', 1, '', 0, 'cVzWosdwQvy-rej1G51PRy:APA91bFM_xhzIbi8uDerN37wd3clVo8ktv18OEbM4NIwPvcIOIC7WoVXr0RDTCAqyH_uiThTouke8CcPvSWrysqHWae-3RPcGuN4mICUUtrNBSFn1ry5wnMPiS4LR0OZti0qJZo-ZzmU'),
(247, 'ABHI', 'e8b156a776bb824346c2418f6ca07a38', 'e8b156a776bb824346c2418f6ca07a38', '14771477', 'Abhi@gmail.com', '9758641230', '1648197731.jpg', 1, '', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_appartment`
--

CREATE TABLE `tbl_appartment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_id` int(11) NOT NULL,
  `building_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_appartment`
--

INSERT INTO `tbl_appartment` (`id`, `area_id`, `building_id`, `language_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 121, '501', '2022-10-13 10:54:19', '2022-10-13 10:54:19'),
(2, 1, 1, 1, 121, '505', '2022-10-13 10:54:19', '2022-10-13 10:54:19');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_area`
--

CREATE TABLE `tbl_area` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `language_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_area`
--

INSERT INTO `tbl_area` (`id`, `language_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 121, 'Sector-57', '2022-10-13 10:49:59', '2022-10-13 10:49:59'),
(2, 1, 121, 'Sector-55', '2022-10-13 10:52:57', '2022-10-13 10:52:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_building`
--

CREATE TABLE `tbl_building` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `area_id` int(11) NOT NULL,
  `language_id` int(11) NOT NULL,
  `code` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tbl_building`
--

INSERT INTO `tbl_building` (`id`, `area_id`, `language_id`, `code`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 121, 'Amrapali', '2022-10-13 10:50:53', '2022-10-13 10:50:53'),
(2, 1, 1, 121, 'Emroled Apartment', '2022-10-13 10:50:53', '2022-10-13 10:50:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_city`
--

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL,
  `city_name_en` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city_name_ar` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_city`
--

INSERT INTO `tbl_city` (`id`, `city_name_en`, `city_name_ar`, `status`) VALUES
(1, 'Noida', 'Noida', 1),
(2, 'Lucknow', 'لكناو', 1),
(3, 'New Delhi', 'نيو دلهي', 1),
(4, 'Tama', 'Tama', 1),
(5, 'Yonago', 'Yonago', 1),
(7, 'RRsdgnb', 'RR', 1),
(8, 'FF', 'FF', 1),
(9, 'GG', '55', 1),
(11, 'RR', 'ee', 1),
(12, 'RR', 'GG', 1),
(13, 'gg', 'gg', 1),
(15, 'RR', 'GG', 1),
(16, 'RR', 'GG', 1),
(17, 'GG', 'GG', 1),
(18, 'GGrr', 'GG', 1),
(19, 'pp', 'GG', 1),
(20, 'RR', 'GG', 1),
(22, 'RR', 'RR', 1),
(23, 'RR', 'RR', 1),
(24, 'RR', 'GG', 1),
(25, 'RR', 'GG', 1),
(27, 'RR', 'RR', 1),
(28, 'GG', '55', 1),
(29, 'RR', 'GG', 1),
(30, 'RR', '55', 1),
(31, 'RR', 'RR', 1),
(32, 'GG', 'GG', 1),
(33, 'GG', 'GG', 1),
(34, 'RR', 'GG', 1),
(35, 'Sasaram', 'asadwd', 1),
(36, 'Patna', 'szdcsfsf', 1),
(37, 'Muzzafarpur', 'sadsadsad', 1),
(38, 'XYZ', 'XYZ', 1),
(39, 'Surat', 'hadgd', 1),
(40, 'Agra', 'jhjh', 1),
(41, 'Mathura', 'jkhjkhb', 1),
(42, 'Raipur', 'nvghh', 1),
(43, 'bathpur', 'jhgjh', 1),
(44, 'Jodhpur', 'hjkhj', 1),
(45, 'Greater Noida', 'ghdfdh', 1),
(46, 'Kolkata', 'hgjhygj', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` bigint(20) NOT NULL,
  `user_id` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `user_id2` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_name` varchar(111) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(111) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_mobile` varchar(111) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_status` int(11) DEFAULT 1,
  `user_created_at` datetime DEFAULT current_timestamp(),
  `user_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `device_token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aprove` int(11) NOT NULL DEFAULT 0,
  `userType` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `user_id`, `user_id2`, `user_image`, `user_name`, `user_email`, `password`, `user_mobile`, `user_status`, `user_created_at`, `user_address`, `device_token`, `aprove`, `userType`) VALUES
(83, '110414550695715747323', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-02-11 04:20:20', NULL, '', 0, 0),
(93, '102903705177619241099', NULL, '', 'Sandeep1', NULL, '', NULL, 0, '2022-02-14 12:26:45', NULL, '', 0, 0),
(94, '102903705177619241099', NULL, '', 'Sandeep1', NULL, '', NULL, 0, '2022-02-15 04:11:06', NULL, '', 0, 0),
(95, '102903705177619241099', NULL, '', 'Sandeep1', NULL, '', NULL, 0, '2022-02-15 11:24:35', NULL, '', 0, 0),
(96, '115632819487022407094', NULL, '', 'Sandeep1', NULL, '', NULL, 0, '2022-02-19 05:22:20', NULL, '', 0, 0),
(97, '113567768776511086577', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-02-22 10:58:10', NULL, 'elDaXLZ2TM-MQ7BPCoN9oW:APA91bGntIWdAtsUN2tmLaffpMu49eqbRI_7-LZYk_S5je7Xq8Y-TSNhQk_lzj416SJriUr1yjuS26AgkUoSQbJxls5_Jt48HbS99WOjD7EqYrJq2YC22Ae1ef0wuRG7tRGi0OWrv0lN', 0, 0),
(99, '112396640151051614187', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-03-16 08:41:30', NULL, '', 0, 0),
(100, '103370445966442334681', NULL, '', 'Sandeep1', NULL, '', NULL, 0, '2022-03-25 05:21:41', NULL, 'cb1q3IUBS1yPmucvS8i50Q:APA91bFMYM8xlnXInBa69TLA92n0w4_vNOCSwGZ1SDLLd6MwGVnod8WWpbhYIfm8B5r8Rd3oL8XpraDd5jPxxG4UBw-Wu7eabg4SQvMAMTCSWk2JyeDDXeWVExZ1bF93cui1rZoRSxh3', 1, 0),
(101, '1683010335412706', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-03-28 05:45:31', NULL, 'c3s_yWRUQDOjGA7GI0qzC2:APA91bE6t-br7WA2d7Rb2r4QZKqCiwwEAGN_flAZi3TaxjaNrdAfKo69G1uhPBHxhb0FP_WXu1mZXcmCVf_j-I_I9XcmZAXgZAzL7hVM2dn6JtR5TXjfIrNP7MSJbehXpLawxpPBBwKN', 1, 0),
(103, '100811033502264347562', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-03-31 08:54:09', NULL, '', 1, 0),
(104, '108961529573233729269', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-04-26 07:28:43', NULL, '', 1, 0),
(105, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-20 17:41:32', NULL, '', 0, 0),
(106, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-20 17:47:24', NULL, '', 0, 0),
(107, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-20 17:48:42', NULL, '', 0, 0),
(108, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-20 17:52:27', NULL, '', 0, 0),
(109, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-20 17:53:34', NULL, '', 0, 0),
(113, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 14:25:40', NULL, '', 0, 0),
(114, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 14:53:14', NULL, '', 0, 0),
(115, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 14:54:32', NULL, '', 0, 0),
(116, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 15:01:33', NULL, '', 0, 0),
(120, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 15:06:10', NULL, '', 0, 0),
(121, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 15:08:28', NULL, '', 0, 0),
(122, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 15:40:55', NULL, '', 0, 0),
(123, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 15:41:18', NULL, '', 0, 0),
(124, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 15:44:03', NULL, '', 0, 0),
(126, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 15:44:09', NULL, '', 0, 0),
(127, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 15:44:09', NULL, '', 0, 0),
(128, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 15:44:11', NULL, '', 0, 0),
(129, '', NULL, '', 'Sandeep1', NULL, '', NULL, 1, '2022-06-21 15:44:57', NULL, '', 0, 0),
(130, '', NULL, '1655806664.png', 'Ram Kumar Maurya', 'ram@gmail.com', '', '8090751172', 1, '2022-06-21 15:47:44', 'New Ashok Nagar', '', 0, 7),
(131, '', NULL, '', 'Sandeep3', NULL, '', NULL, 1, '2022-06-21 16:05:23', NULL, '', 0, 0),
(132, '', NULL, '1655813721.jpg', 'Ravi1', 'ravi1@gmail.com', '', '09098789889', 1, '2022-06-21 16:49:45', 'Noida 78', '', 0, 8),
(133, '', NULL, '1655811181.png', 'Sandeep12', NULL, '', NULL, 1, '2022-06-21 17:03:01', NULL, '', 0, 7),
(134, '', NULL, '1656565739.jpg', 'Chandan', 'chandan123@gamil.com', '', '2344332222', 1, '2022-06-30 10:38:59', '12/22', '', 0, 9),
(135, '', NULL, '1656572273.png', 'Rajiv Kumar', 'rajiv1232@gmail.com', 'rajiv@123', '4555899889', 1, '2022-06-30 12:27:53', 'New Delhi', '', 0, 11),
(136, '', NULL, '1656573928.jpg', 'Rajiv Khanna', 'rajiv1232@gmail.ocom', 'rajivkhanna@123', '1425369685', 1, '2022-06-30 12:55:28', 'Old Delhi', '', 0, 8),
(137, '', NULL, '1656649180.jpg', 'rtgf', 'qw12@gmail.com', '1234567890qwe!@#', '7896543210', 1, '2022-07-01 09:49:40', 'trewq', '', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `staff_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parmanent_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `building` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apartment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agreement_start_date` date NOT NULL,
  `agreement_end_date` date NOT NULL,
  `email_verified_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `staff_id`, `name`, `email`, `parmanent_address`, `contact`, `area`, `building`, `apartment`, `agreement_start_date`, `agreement_end_date`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 162, 'Ram', 'ram@gmail.com', 'Civil Lines Kanpur', '95874566', 'Sector-57', 'Amrapali', '501', '2022-10-13', '2023-10-13', '2022-10-13 10:42:30', '123456', NULL, '2022-10-13 10:42:30', '2022-10-13 10:42:30');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cheque_status`
--
ALTER TABLE `cheque_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `langauge`
--
ALTER TABLE `langauge`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `maintenance`
--
ALTER TABLE `maintenance`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `staff_user`
--
ALTER TABLE `staff_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tbl_appartment`
--
ALTER TABLE `tbl_appartment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_area`
--
ALTER TABLE `tbl_area`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_building`
--
ALTER TABLE `tbl_building`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_city`
--
ALTER TABLE `tbl_city`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
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
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `cheque_status`
--
ALTER TABLE `cheque_status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `langauge`
--
ALTER TABLE `langauge`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `maintenance`
--
ALTER TABLE `maintenance`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `staff_user`
--
ALTER TABLE `staff_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=248;

--
-- AUTO_INCREMENT for table `tbl_appartment`
--
ALTER TABLE `tbl_appartment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_area`
--
ALTER TABLE `tbl_area`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_building`
--
ALTER TABLE `tbl_building`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_city`
--
ALTER TABLE `tbl_city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
