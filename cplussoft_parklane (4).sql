-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2021 at 09:46 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cplussoft_parklane`
--

-- --------------------------------------------------------

--
-- Table structure for table `abouts`
--

CREATE TABLE `abouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `abouts`
--

INSERT INTO `abouts` (`id`, `name`, `text`, `created_at`, `updated_at`) VALUES
(1, 'About', 'Lorem ipsum dolor sit amet consectetur adipisicing. Commodi quisquam repellendus beatae molestiae neque iste blanditiis qui perferendis. Illum labore quam deleniti impedit facere to beatae, sapiente temporibus', NULL, '2021-07-02 14:47:35');

-- --------------------------------------------------------

--
-- Table structure for table `about_us`
--

CREATE TABLE `about_us` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `bg_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sub_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `main_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `descover_link` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `bg_image`, `sub_title`, `main_title`, `description`, `descover_link`, `image`, `created_at`, `updated_at`) VALUES
(1, 'storage/image/aboutus/bgimage/1625473447banner1.jpg', 'Welcome to conexi company', 'Company Description', 'There are many variations of passages of lorem ipsum available but the majority have suffered alteration in some form by injected humor or random words which don\'t look even slightly believable. If you are going to use a passage lorem ipsum you need to be sure there isn\'t anything embarrassing. There many variations of passages of lorem ipsum available but the majority have suffered alteration in some form by injected humor or random words which don\'t look even slightly believable.', '#', 'storage/1625492968about1.jpg', NULL, '2021-07-05 20:49:28');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `booking_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seat_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_price` int(20) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `bustrip_id` bigint(20) UNSIGNED NOT NULL,
  `confirmation_code` int(20) NOT NULL,
  `booking_date` date NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `guest_id` bigint(20) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `booking_no`, `seat_no`, `total_price`, `user_id`, `bustrip_id`, `confirmation_code`, `booking_date`, `status`, `active`, `created_at`, `updated_at`, `guest_id`) VALUES
(43, 'PK-58796333', '3', 168, NULL, 30, 534215, '2021-07-26', 1, 0, '2021-07-26 01:02:05', '2021-07-26 01:02:05', 33),
(44, 'RETURN-PK-85412433', '3', 2400, NULL, 29, 534215, '2021-07-26', 1, 0, '2021-07-26 01:02:05', '2021-07-26 01:02:05', 33),
(45, 'PK-47827337', '3', 168, NULL, 15, 807379, '2021-07-26', 1, 0, '2021-07-26 02:32:54', '2021-07-26 02:32:54', 37),
(46, 'RETURN-PK-46202437', '3', 2400, NULL, 31, 807379, '2021-07-26', 1, 0, '2021-07-26 02:32:54', '2021-07-26 02:32:54', 37),
(47, 'PK-76867737', '3', 168, NULL, 15, 807379, '2021-07-26', 1, 0, '2021-07-26 02:33:33', '2021-07-26 02:33:33', 37),
(48, 'RETURN-PK-33622237', '3', 2400, NULL, 31, 807379, '2021-07-26', 1, 0, '2021-07-26 02:33:33', '2021-07-26 02:33:33', 37),
(49, 'PK-15873937', '3', 168, NULL, 15, 807379, '2021-07-26', 1, 0, '2021-07-26 02:34:12', '2021-07-26 02:34:12', 37),
(50, 'RETURN-PK-74997037', '3', 2400, NULL, 31, 807379, '2021-07-26', 1, 0, '2021-07-26 02:34:12', '2021-07-26 02:34:12', 37),
(51, 'PK-62609837', '3', 168, NULL, 15, 807379, '2021-07-26', 1, 0, '2021-07-26 02:34:26', '2021-07-26 02:34:26', 37),
(52, 'RETURN-PK-51095837', '3', 2400, NULL, 31, 807379, '2021-07-26', 1, 0, '2021-07-26 02:34:26', '2021-07-26 02:34:26', 37),
(53, 'PK-99777637', '3', 168, NULL, 15, 807379, '2021-07-26', 1, 0, '2021-07-26 02:35:52', '2021-07-26 02:35:52', 37),
(54, 'RETURN-PK-96016637', '3', 2400, NULL, 31, 807379, '2021-07-26', 1, 0, '2021-07-26 02:35:52', '2021-07-26 02:35:52', 37),
(55, 'PK-50921537', '3', 168, NULL, 15, 807379, '2021-07-26', 1, 0, '2021-07-26 02:36:28', '2021-07-26 02:36:28', 37),
(56, 'RETURN-PK-68879937', '3', 2400, NULL, 31, 807379, '2021-07-26', 1, 0, '2021-07-26 02:36:28', '2021-07-26 02:36:28', 37),
(57, 'PK-94350741', '3', 168, NULL, 30, 195448, '2021-07-26', 1, 0, '2021-07-26 06:05:03', '2021-07-26 06:05:03', 41),
(58, 'RETURN-PK-80377141', '3', 2400, NULL, 29, 195448, '2021-07-26', 1, 0, '2021-07-26 06:05:03', '2021-07-26 06:05:03', 41),
(59, 'PK-91678430', '3', 168, 30, 30, 0, '2021-07-26', 1, 0, '2021-07-26 06:09:58', '2021-07-26 06:09:58', NULL),
(60, 'RETURN-PK-61020830', '3', 2400, 30, 29, 0, '2021-07-26', 1, 0, '2021-07-26 06:09:58', '2021-07-26 06:09:58', NULL),
(61, 'PK-68682030', '3', 168, 30, 30, 0, '2021-07-26', 1, 0, '2021-07-26 06:10:49', '2021-07-26 06:10:49', NULL),
(62, 'RETURN-PK-47071630', '3', 2400, 30, 29, 0, '2021-07-26', 1, 0, '2021-07-26 06:10:49', '2021-07-26 06:10:49', NULL),
(63, 'PK-40619430', '3', 168, 30, 30, 0, '2021-07-26', 1, 0, '2021-07-26 06:11:53', '2021-07-26 06:11:53', NULL),
(64, 'RETURN-PK-39779230', '3', 2400, 30, 29, 0, '2021-07-26', 1, 0, '2021-07-26 06:11:53', '2021-07-26 06:11:53', NULL),
(65, 'PK-19999930', '8', 448, 30, 30, 0, '2021-07-26', 1, 0, '2021-07-26 06:17:09', '2021-07-26 06:17:09', NULL),
(66, 'RETURN-PK-99626730', '8', 6400, 30, 29, 0, '2021-07-26', 1, 0, '2021-07-26 06:17:09', '2021-07-26 06:17:09', NULL),
(67, 'PK-26698930', '8', 448, 30, 30, 0, '2021-07-26', 1, 0, '2021-07-26 06:21:45', '2021-07-26 06:21:45', NULL),
(68, 'RETURN-PK-15319730', '8', 6400, 30, 29, 0, '2021-07-26', 1, 0, '2021-07-26 06:21:45', '2021-07-26 06:21:45', NULL),
(69, 'PK-52380030', '8', 448, 30, 30, 0, '2021-07-26', 1, 0, '2021-07-26 06:22:34', '2021-07-26 06:22:34', NULL),
(70, 'RETURN-PK-87555330', '8', 6400, 30, 29, 0, '2021-07-26', 1, 0, '2021-07-26 06:22:34', '2021-07-26 06:22:34', NULL),
(71, 'PK-72608130', '8', 448, 30, 30, 0, '2021-07-26', 1, 0, '2021-07-26 06:22:56', '2021-07-26 06:22:56', NULL),
(72, 'RETURN-PK-77209130', '8', 6400, 30, 29, 0, '2021-07-26', 1, 0, '2021-07-26 06:22:56', '2021-07-26 06:22:56', NULL),
(73, 'PK-68103030', '8', 448, 30, 30, 0, '2021-07-26', 1, 0, '2021-07-26 06:23:28', '2021-07-26 06:23:28', NULL),
(74, 'RETURN-PK-87435530', '8', 6400, 30, 29, 0, '2021-07-26', 1, 0, '2021-07-26 06:23:28', '2021-07-26 06:23:28', NULL),
(75, 'PK-36931130', '36', 2016, 30, 30, 0, '2021-07-26', 1, 0, '2021-07-26 07:25:31', '2021-07-26 07:25:31', NULL),
(76, 'RETURN-PK-84530030', '36', 28800, 30, 29, 0, '2021-07-26', 1, 0, '2021-07-26 07:25:31', '2021-07-26 07:25:31', NULL),
(79, 'PK-45545656', '3', 168, NULL, 30, 379768, '2021-08-16', 1, 0, '2021-08-16 08:07:08', '2021-08-16 08:07:08', 56),
(80, 'RETURN-PK-70506156', '4', 3200, NULL, 31, 379768, '2021-08-16', 1, 0, '2021-08-16 08:07:08', '2021-08-16 08:07:08', 56),
(81, 'PK-57844758', '3', 168, NULL, 30, 465607, '2021-08-17', 1, 0, '2021-08-17 00:26:49', '2021-08-17 00:26:49', 58),
(82, 'PK-80942158', '3', 168, NULL, 30, 465607, '2021-08-17', 1, 0, '2021-08-17 00:35:44', '2021-08-17 00:35:44', 58);

-- --------------------------------------------------------

--
-- Table structure for table `buses`
--

CREATE TABLE `buses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_of_seat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plate_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `base_rate` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `busType_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `buses`
--

INSERT INTO `buses` (`id`, `name`, `no_of_seat`, `plate_no`, `base_rate`, `image`, `busType_id`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Bus 9', '22', 'ssb-789', 56, 'storage/bus/image/1625643073Transpo_XcelsiorChargeCharging_TA.jpg', 1, 1, NULL, '2021-07-26 06:27:23'),
(2, 'Bus 2', '50', 'GDF-345', 800, 'storage/bus/image/1625473368bus-info.jpg', 2, 1, NULL, '2021-07-05 19:02:56'),
(15, 'Bus 3', '2', 'FGD-452', 200, 'storage/bus/image/1625486417aaa.jpg', 3, 1, NULL, '2021-07-05 19:03:12'),
(18, 'Bus 4', '23', '43353', 32, 'storage/bus/image/1625486439aaa.jpg', 4, 1, NULL, '2021-07-05 19:00:39'),
(20, 'Bus 5', '50', 'ATT-333', 450, 'storage/bus/image/1625486504aaa.jpg', 2, 1, NULL, NULL),
(21, 'Bus 6', '50', 'Att-343', 500, 'storage/bus/image/1625486544aaa.jpg', 2, 1, NULL, NULL),
(22, 'Bus 7', '50', 'GGG-877', 400, 'storage/bus/image/1625486632aaa.jpg', 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bus_trips`
--

CREATE TABLE `bus_trips` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pickup_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drop_off_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pickup_time` time NOT NULL,
  `drop_off_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `drop_off_time` time NOT NULL,
  `left_seat` int(20) NOT NULL,
  `bus_id` bigint(20) UNSIGNED NOT NULL,
  `active` tinyint(1) DEFAULT 1,
  `status` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_trips`
--

INSERT INTO `bus_trips` (`id`, `pickup_location`, `drop_off_location`, `pickup_date`, `pickup_time`, `drop_off_date`, `drop_off_time`, `left_seat`, `bus_id`, `active`, `status`, `created_at`, `updated_at`) VALUES
(15, 'Location A', 'Location B', '2021-07-05', '15:00:00', '2021-07-06', '18:00:00', 104, 1, 1, 0, '2021-07-05 21:07:07', '2021-07-26 02:36:28'),
(29, 'Location B', 'Location A', '2021-07-05', '12:00:00', '2021-07-06', '15:00:00', 29, 2, 1, 0, '2021-07-05 21:07:07', '2021-07-26 07:25:31'),
(30, 'Location A', 'Location B', '2021-07-05', '12:00:00', '2021-07-06', '15:00:00', 19, 1, 1, 0, '2021-07-05 21:07:07', '2021-08-17 00:35:44'),
(31, 'Location B', 'Location A', '2021-07-05', '15:00:00', '2021-07-06', '18:00:00', 96, 2, 1, 0, '2021-07-05 21:07:07', '2021-08-16 08:07:08'),
(34, 'Location A', 'Location B', '2021-07-05', '18:00:00', '2021-07-06', '12:00:00', 122, 1, 1, 0, '2021-07-05 21:07:07', '2021-07-16 08:41:44'),
(35, 'Location B', 'Location A', '2021-07-05', '18:00:00', '2021-07-06', '12:00:00', 120, 2, 1, 0, '2021-07-05 21:07:07', '2021-07-16 08:41:44'),
(36, 'Location A', 'Location B', '2021-07-05', '12:00:00', '2021-07-06', '18:00:00', 122, 1, 1, 0, '2021-07-05 21:07:07', '2021-07-16 08:41:44'),
(37, 'Location A', 'Location C', '2021-07-05', '15:00:00', '2021-07-06', '18:00:00', 17, 1, 1, 0, '2021-08-16 01:04:30', '2021-08-17 00:56:34'),
(38, 'Location B', 'Location C', '2021-07-05', '15:00:00', '2021-07-06', '18:00:00', 22, 1, 1, 0, '2021-08-16 01:06:10', NULL),
(39, 'Location A', 'Location C', '2021-07-05', '12:00:00', '2021-07-06', '15:00:00', 31, 1, 1, 0, '2021-07-05 21:07:07', '2021-07-26 07:25:31'),
(40, 'Location B', 'Location C', '2021-07-05', '12:00:00', '2021-07-06', '15:00:00', 29, 2, 1, 0, '2021-07-05 21:07:07', '2021-07-26 07:25:31'),
(41, 'Location A', 'Location C', '2021-07-05', '18:00:00', '2021-07-06', '12:00:00', 122, 1, 1, 0, '2021-07-05 21:07:07', '2021-07-16 08:41:44'),
(42, 'Location B', 'Location C', '2021-07-05', '18:00:00', '2021-07-06', '12:00:00', 120, 2, 1, 0, '2021-07-05 21:07:07', '2021-07-16 08:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `bus_types`
--

CREATE TABLE `bus_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bus_types`
--

INSERT INTO `bus_types` (`id`, `name`, `active`, `created_at`, `updated_at`) VALUES
(1, 'Hybrid Electric Buses', 1, '2021-07-05 22:07:56', NULL),
(2, 'Fuel Cell Buses', 1, '2021-07-05 22:07:56', NULL),
(3, 'Campaign Bus', 1, '2021-07-05 22:07:56', NULL),
(4, 'Low Floor Bus', 1, '2021-07-05 22:07:56', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `text`, `created_at`, `updated_at`) VALUES
(1, 'Contact', 'hello this is contact section of parklane xpress', NULL, '2021-06-12 03:14:21');

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
-- Table structure for table `faqs`
--

CREATE TABLE `faqs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answers` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faqs`
--

INSERT INTO `faqs` (`id`, `question`, `answers`, `active`, `created_at`, `updated_at`) VALUES
(1, 'How can you join SWAPD?', 'SWAPD is a simple community forum that facilities transactions of non-tangible items (we call them assets or properties) such as established websites, domain names, influential social profiles, rare @handles, unique services, access to websites, and anything else deemed valuable and virtual in nature.', 1, NULL, '2021-06-15 22:39:50'),
(2, 'How can you join SWAPD?', 'SWAPD is a simple community forum that facilities transactions of non-tangible items (we call them assets or properties) such as established websites, domain names, influential social profiles, rare @handles, unique services, access to websites, and anything else deemed valuable and virtual in nature.', 1, NULL, NULL),
(3, 'How can you join SWAPD?', 'SWAPD is a simple community forum that facilities transactions of non-tangible items (we call them assets or properties) such as established websites, domain names, influential social profiles, rare @handles, unique services, access to websites, and anything else deemed valuable and virtual in nature.', 1, NULL, NULL),
(4, 'Emma Barnett', 'Explicabo Voluptatu', 0, NULL, NULL),
(6, 'Gillian Jacobson', 'Rerum molestiae aut', 0, NULL, '2021-06-15 15:27:53'),
(7, 'What is FAQ?', 'FAQ stands for Frequently Asked Question', 1, NULL, '2021-07-05 21:03:02');

-- --------------------------------------------------------

--
-- Table structure for table `general_travel`
--

CREATE TABLE `general_travel` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mission_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `awards` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `awards_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principles` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `principles_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `history_desc` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `general_travel`
--

INSERT INTO `general_travel` (`id`, `heading`, `heading2`, `description`, `mission`, `mission_desc`, `awards`, `awards_desc`, `principles`, `principles_desc`, `history`, `history_desc`, `created_at`, `updated_at`) VALUES
(1, 'Welcome to conexi company', 'General Travel Information', 'Thanks to many years of experience, high professionalism of employees and mutual respect policy vis-à-vis clients and partners, the company has earned the trust and credibility among travel agencies, and private clients. the company has earned the trust and credibility among travel agencies, and private clients', 'Mission', 'mission description', 'Awards', 'Award description', 'Principles', 'Principles Desc', 'HIstory', 'History Desc', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`id`, `name`, `first_name`, `last_name`, `email`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`, `email_verified_at`) VALUES
(43, 'guest6100e98032554', 'guest6100e98032554', 'guest6100e98032554', 'mugheesansari888@gmail.com', '+923325554019', 'HOUSE#43/C Lane#5 Above Moon-General-Store Faisal Colony Near Gulzar-e-quaid', NULL, '2021-07-28 00:22:08', '2021-07-28 00:23:18', '2021-07-28 00:23:18'),
(44, 'guest6100eacac402b', 'guest6100eacac402b', 'guest6100eacac402b', 'mugheesansari888@gmail.com', '+923325554019', 'HOUSE#43/C Lane#5 Above Moon-General-Store Faisal Colony Near Gulzar-e-quaid', NULL, '2021-07-28 00:27:38', '2021-07-28 00:27:38', NULL),
(45, 'guest6100eae4a27eb', 'guest6100eae4a27eb', 'guest6100eae4a27eb', 'mugheesansari888@gmail.com', '+923325554019', 'HOUSE#43/C Lane#5 Above Moon-General-Store Faisal Colony Near Gulzar-e-quaid', NULL, '2021-07-28 00:28:04', '2021-07-28 00:28:04', NULL),
(46, 'guest6100eb15be905', 'guest6100eb15be905', 'guest6100eb15be905', 'asadd@g.com', '+923325554019', 'HOUSE#43/C Lane#5 Above Moon-General-Store Faisal Colony Near Gulzar-e-quaid', NULL, '2021-07-28 00:28:53', '2021-07-28 00:30:52', '2021-07-28 00:30:52'),
(47, 'guest6100eba2548f7', 'guest6100eba2548f7', 'guest6100eba2548f7', 'asadd@g.com', '+923325554019', 'HOUSE#43/C Lane#5 Above Moon-General-Store Faisal Colony Near Gulzar-e-quaid', NULL, '2021-07-28 00:31:14', '2021-07-28 00:31:14', NULL),
(48, 'guest6100ec5cb2bc9', 'guest6100ec5cb2bc9', 'guest6100ec5cb2bc9', 'mugheesansari888@gmail.com', '+923325554019', 'HOUSE#43/C Lane#5 Above Moon-General-Store Faisal Colony Near Gulzar-e-quaid', NULL, '2021-07-28 00:34:20', '2021-07-28 00:34:41', '2021-07-28 00:34:41'),
(49, 'guest6100ecea66d43', 'guest6100ecea66d43', 'guest6100ecea66d43', 'asad@gmail.com', '+923325554019', 'HOUSE#43/C Lane#5 Above Moon-General-Store Faisal Colony Near Gulzar-e-quaid', NULL, '2021-07-28 00:36:42', '2021-07-28 00:36:58', '2021-07-28 00:36:58'),
(50, 'guest6100ed95afa05', 'guest6100ed95afa05', 'guest6100ed95afa05', 'mugheesansari888@gmail.com', '+923325554019', 'HOUSE#43/C Lane#5 Above Moon-General-Store Faisal Colony Near Gulzar-e-quaid', NULL, '2021-07-28 00:39:33', '2021-07-28 00:39:48', '2021-07-28 00:39:48'),
(51, 'guest611a4edf25bdd', 'guest611a4edf25bdd', 'guest611a4edf25bdd', 'nudo@mailinator.com', '+923326655449', 'Et labore reprehende', NULL, '2021-08-16 06:41:19', '2021-08-16 06:41:19', NULL),
(52, 'guest611a51801d54a', 'guest611a51801d54a', 'guest611a51801d54a', 'cukoqi@mailinator.com', '+923526699885', 'Velit mollit ipsum', NULL, '2021-08-16 06:52:32', '2021-08-16 06:52:32', NULL),
(53, 'guest611a52f5ea111', 'guest611a52f5ea111', 'guest611a52f5ea111', 'qywave@mailinator.com', '+923356655443', 'Voluptates illum es', NULL, '2021-08-16 06:58:45', '2021-08-16 06:58:45', NULL),
(54, 'guest611a53e447986', 'guest611a53e447986', 'guest611a53e447986', 'xozana@mailinator.com', '+923345544996', 'Minim incidunt et e', NULL, '2021-08-16 07:02:44', '2021-08-16 07:02:44', NULL),
(55, 'guest611a5e990afbf', 'guest611a5e990afbf', 'guest611a5e990afbf', 'juxubisu@mailinator.com', '+923359988776', 'Reiciendis velit qui', NULL, '2021-08-16 07:48:25', '2021-08-16 07:48:51', '2021-08-16 07:48:51'),
(56, 'guest611a5ed924313', 'guest611a5ed924313', 'guest611a5ed924313', 'mugheesansari888@gmail.com', '+923325554019', 'HOUSE#43/C Lane#5 Above Moon-General-Store Faisal Colony Near Gulzar-e-quaid', NULL, '2021-08-16 07:49:29', '2021-08-16 07:49:46', '2021-08-16 07:49:46'),
(57, 'guest611b47fe5ce57', 'guest611b47fe5ce57', 'guest611b47fe5ce57', 'webetyqeva@mailinator.com', '+923365588992', 'Et in dignissimos qu', NULL, '2021-08-17 00:24:14', '2021-08-17 00:24:23', '2021-08-17 00:24:23'),
(58, 'guest611b484f0a99d', 'guest611b484f0a99d', 'guest611b484f0a99d', 'tylop@mailinator.com', '+923325554019', 'Consequatur tenetur', NULL, '2021-08-17 00:25:35', '2021-08-17 00:25:46', '2021-08-17 00:25:46');

-- --------------------------------------------------------

--
-- Table structure for table `health_concerns`
--

CREATE TABLE `health_concerns` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `health_concerns`
--

INSERT INTO `health_concerns` (`id`, `heading`, `heading2`, `description`, `image`, `created_at`, `updated_at`) VALUES
(2, 'Sunt maiores qui re', 'Sunt pariatur Ratio', 'Recusandae Commodo', 'storage/healthconcern/image/1625473578about1.jpg', NULL, '2021-07-05 15:26:18');

-- --------------------------------------------------------

--
-- Table structure for table `links`
--

CREATE TABLE `links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `make_your_bookings`
--

CREATE TABLE `make_your_bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subHeading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `make_your_bookings`
--

INSERT INTO `make_your_bookings` (`id`, `heading`, `heading1`, `subHeading`, `created_at`, `updated_at`) VALUES
(1, 'Lorem Ipsum is simply dummy text', 'Lets travel with us', 'have a good and sound full jounery', NULL, '2021-07-08 01:36:05');

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
(4, '2021_06_09_095932_create_bus_types_table', 1),
(5, '2021_06_10_072555_create_buses_table', 1),
(6, '2021_06_10_094042_create_permission_tables', 1),
(7, '2021_06_11_094813_create_navbars_table', 1),
(8, '2021_06_11_095235_create_sliders_table', 1),
(9, '2021_06_11_095904_create_make_your_bookings_table', 1),
(10, '2021_06_11_095948_create_abouts_table', 1),
(11, '2021_06_11_100014_create_links_table', 1),
(12, '2021_06_11_100033_create_contacts_table', 1),
(13, '2021_06_11_100051_create_newsletters_table', 1),
(14, '2021_06_12_082628_create_faqs_table', 2),
(15, '2021_06_12_082717_create_queries_table', 2),
(16, '2021_06_16_041954_create_about_us_table', 3),
(17, '2021_06_16_043732_create_social_links_table', 3),
(18, '2021_06_16_092924_create_bus_trips_table', 4),
(19, '2021_06_18_095908_create_bookings_table', 4),
(20, '2021_06_24_174546_create_personal_infos_table', 5),
(21, '2021_06_24_183727_create_travel_tip_images_table', 5),
(22, '2021_06_24_183807_create_general_travel__table', 5),
(23, '2021_06_24_183851_create_health_concerns__table', 5),
(24, '2021_06_24_183926_create_safety_measures__table', 5),
(25, '2021_06_24_183851_create_health_concerns_table', 6),
(26, '2021_06_24_183926_create_safety_measures_table', 7),
(27, '2021_06_25_064922_create_general_travels_table', 7),
(28, '2021_06_25_065701_create_general_travels_table', 8),
(29, '2021_06_25_065701_create_general_travel_table', 9),
(30, '2021_06_25_072500_create_health_concerns_table', 9),
(31, '2021_06_25_072600_create_safety_measures__table', 9),
(32, '2021_06_25_163331_create_ratings_table', 10),
(33, '2021_07_02_144929_create_news_updates_table', 11),
(34, '2021_07_15_061746_create_guests_table', 11),
(35, '2021_07_15_072426_create_guests_table', 12),
(36, '2021_07_15_091815_add_guest_id_to_bookings', 13),
(37, '2021_07_16_051003_email_verified_to_guests', 14),
(38, '2021_07_16_051237_email_verified_to_guests', 15),
(39, '2021_07_16_061442_create_verify_users_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1);

-- --------------------------------------------------------

--
-- Table structure for table `navbars`
--

CREATE TABLE `navbars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` bigint(20) NOT NULL,
  `link1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `link4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `navbars`
--

INSERT INTO `navbars` (`id`, `name`, `link`, `phone`, `link1`, `link2`, `link3`, `link4`, `image`, `created_at`, `updated_at`) VALUES
(1, 'admin@parklanetravels.com', 'admin@parklanetravels.com', 923051387510, NULL, NULL, NULL, NULL, 'storage/image/logo/1625460286logo.svg', NULL, '2021-07-05 21:03:56');

-- --------------------------------------------------------

--
-- Table structure for table `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `newsletters`
--

INSERT INTO `newsletters` (`id`, `email`, `created_at`, `updated_at`) VALUES
(1, 'shan59s@gmail.com', NULL, '2021-06-27 12:23:32'),
(2, 'meena@gmail.com', NULL, NULL),
(3, 'cplusoft@gmail.com', NULL, NULL),
(4, 'test@test.com', NULL, NULL),
(5, 'User1@gmail.com', NULL, NULL),
(6, 'admin@jamharah.net', NULL, NULL),
(7, 'bilawalbasheershah@gmail.com', NULL, NULL),
(8, 'itsmushii@gmail.com', NULL, NULL),
(9, 'itsmushii@gmail.com', NULL, NULL),
(10, 'asad@g.com', NULL, NULL),
(11, 'bilawalbasheershah@gmail.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_updates`
--

CREATE TABLE `news_updates` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripton` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripton2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `title3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `descripton3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news_updates`
--

INSERT INTO `news_updates` (`id`, `image`, `heading`, `heading1`, `title`, `descripton`, `title2`, `descripton2`, `title3`, `descripton3`, `created_at`, `updated_at`) VALUES
(1, 'storage/newsupdate/image/1625473637blog1.jpg', 'Welcome to conexi company', 'News & Update', 'We ensure you that your journey is comfortable and safe', NULL, NULL, NULL, 'We ensure you that your journey is comfortable and safe', NULL, '2021-07-05 10:27:17', '2021-07-05 10:27:17');

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
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_infos`
--

CREATE TABLE `personal_infos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `age` int(11) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Identity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `queries`
--

CREATE TABLE `queries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `queries`
--

INSERT INTO `queries` (`id`, `name`, `phone`, `email`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(1, 'Anne Luna', 83, 'qasago@mailinator.com', 'Quae consequatur pra', 'asdasdasd', NULL, '2021-06-30 20:27:24'),
(2, 'asad', 3325554019, 'asad@g.com', 'sub', 'message_asad', '2021-07-27 23:39:55', '2021-07-27 23:39:55');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `rateable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rateable_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'SuperAdmin', 'web', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `safety_measures`
--

CREATE TABLE `safety_measures` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `safety_measures`
--

INSERT INTO `safety_measures` (`id`, `heading`, `heading2`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Dolor maxime quaerat', 'Safety Measures', 'skardu beautifull', 'storage/safetMeasure/image/1625473598blog1.jpg', NULL, '2021-07-05 15:26:38');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `heading2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `heading`, `heading2`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bus Service', 'A Project of developer', 'storage/image/slider/1625603141aaa.jpg', NULL, '2021-07-07 03:25:41'),
(2, 'Cheap & Trusted', 'Cheap & Trusted', 'storage/image/slider/1625460368blog-2-1.jpg', NULL, '2021-07-05 11:46:08');

-- --------------------------------------------------------

--
-- Table structure for table `social_links`
--

CREATE TABLE `social_links` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `social_link1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_link4` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_description1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_description2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_description3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `social_description4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `heading` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `social_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social_links`
--

INSERT INTO `social_links` (`id`, `social_link1`, `social_link2`, `social_link3`, `social_link4`, `social_description1`, `social_description2`, `social_description3`, `social_description4`, `heading`, `social_title`, `created_at`, `updated_at`) VALUES
(1, 'Fugit excepturi occ', 'Molestiae id culpa', 'Id aut aspernatur ve', 'Accusantium est ea', 'In et quae nihil hic', 'Voluptate dicta illo', 'Eum sunt reprehender', 'In voluptas aut aspe', 'Eaque qui autem pari', 'Velit impedit nisi', NULL, '2021-06-16 09:39:09');

-- --------------------------------------------------------

--
-- Table structure for table `travel_tip_images`
--

CREATE TABLE `travel_tip_images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `travel_tip_images`
--

INSERT INTO `travel_tip_images` (`id`, `title`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Travel Tips and Info', 'storage/traveltip/bgimage/1625473529about1.jpg', NULL, '2021-07-05 15:25:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usertype` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dob` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_card` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isVerified` tinyint(1) NOT NULL DEFAULT 0,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `first_name`, `last_name`, `usertype`, `email`, `phone`, `address`, `city`, `state`, `dob`, `id_card`, `avatar`, `email_verified_at`, `password`, `isVerified`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'parklane Travel', 'parklane', 'express', 'SuperAdmin', 'admin@parklanetravels.com', 3325554017, 'Sherthang olding', 'Karachi', 'Sindh', '1997-06-26', NULL, 'storage/image/profile/1625643768Transpo_XcelsiorChargeCharging_TA.jpg', NULL, '$2y$10$3Qpab3xQYvPGK.yVKuoXAOakCRdFU22WEAHg/9forH.Y7cT9wuMpa', 1, 'HY21mTwAeNV7SGwGJQiMB5tDt3rG7F9jwIS3Lfy8SdjC0mPY0qyj2n3O1WiV', NULL, '2021-07-12 00:42:04'),
(21, 'Bilawal Basheer Shah', 'Bilawal', 'Shah ji', 'User', 'bilawalbasheershah@gmail.com', 3051387510, 'murree road Rawalpindi', 'Rawalpindi', 'Punjab', '2021-07-05', NULL, 'storage/image/profile/1625495435dp.JPG', NULL, '$2y$12$wA2GgM7dX0XIFTEfoGCzBOBim.UqHHAk9pITSIDU3RFtEsIpOFfKa', 1, NULL, '2021-07-05 16:06:14', '2021-07-05 21:32:06'),
(22, 'Myra Gilliam', 'Kiona', 'Mcmahon', 'User', 'bilawalb92@gmail.com', 923051387510, 'Deserunt ullamco et', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$12$wA2GgM7dX0XIFTEfoGCzBOBim.UqHHAk9pITSIDU3RFtEsIpOFfKa', 0, NULL, '2021-07-05 22:09:35', '2021-07-05 22:09:35'),
(23, 'Bilawal Shah', 'Bilawal', 'Shah', 'User', 'tytaped@mailinator.com', 923495096979, 'st 11', NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$0oMsDGt0pNkNs0ms6gbhA.1znrBG/a.lxaQ7L4hMCGZ5fNPybaYVW', 0, NULL, '2021-07-05 22:13:51', '2021-07-05 22:13:51'),
(29, 'Mushii', 'Mushtaq', 'Ahmad', 'User', 'itsmushii@gmail.com', 923405036487, 'Charsadda', NULL, NULL, NULL, NULL, 'storage/image/profile/1625659919195274886_3824628297649597_8504433087079026096_n.jpg', NULL, '$2y$10$BdEBiN61Mxc0citf/hbPDupMgKK6MTYcm.dhxSZVa5eA/.bhQTel.', 1, NULL, '2021-07-07 19:03:51', '2021-07-07 19:11:59'),
(30, 'asad', 'asad', 'ans', 'User', 'asad@g.com', 3325554018, 'rawalpindi', NULL, NULL, NULL, NULL, NULL, '2021-07-26 06:09:24', '$2y$10$PAS3vLR1Nxs2pE4NZ7fmduYPxHlBO//C8gdWUoUTj4KMbHLdsSVvO', 1, NULL, '2021-07-10 02:10:56', '2021-07-28 00:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `verify_users`
--

CREATE TABLE `verify_users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `guest_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `verify_users`
--

INSERT INTO `verify_users` (`id`, `token`, `user_id`, `guest_id`, `created_at`, `updated_at`) VALUES
(22, 'O73GQ5T0IlWp4leQa6DzNCrcBXXdq77wPtNk1WDjm0Zn4zF5fU7dHzgkfxXa', 63, NULL, '2021-07-16 05:32:26', '2021-07-16 05:32:26'),
(23, 'zmPQ1mvoWAgW1V0OpGtamFAoPJbF80zkI1DVD72wxRHcQGU8oMJ71D8HLpdD', NULL, 31, '2021-07-16 05:35:50', '2021-07-16 05:35:50'),
(24, 'gcrhy4GUhnNdCd4G7L2IalHF4DGWzwYqrsfAgEWNMFaOyhjeM5SGwSpkuc3K', 63, NULL, '2021-07-16 08:39:50', '2021-07-16 08:39:50'),
(25, 'X5sNYTOlV0jnB97tug4r3fLsk4EYwb16GiblPZdi1OQEH6z8ATbEdrqRoGI5', NULL, 32, '2021-07-26 00:52:39', '2021-07-26 00:52:39'),
(26, 'jrHpwvN7rXhF5nzfaRzZpPfCI7mZebtArefDW4dRsaEqLO01bJpSRvkZgIf4', NULL, 33, '2021-07-26 00:59:38', '2021-07-26 00:59:38'),
(27, 'xgHpEH2EuE5HdbILVNqtaUvHuLI4HlVCdUmJHxgCjx7HxwbAKBTcnyI4zbJl', NULL, 34, '2021-07-26 01:41:21', '2021-07-26 01:41:21'),
(28, 'L7UZ0BGZmarm32SkAgmLZQjtobxWjk5xjFynbEKvHpH7W2C9Y5oO8ZsEPFub', NULL, 35, '2021-07-26 02:29:30', '2021-07-26 02:29:30'),
(29, '5KJjWcmi5EXetPOZMorEPHyX7kQrXgcsWNaFujcdX4GH1Vou6X9kzlGQIWzR', NULL, 36, '2021-07-26 02:30:05', '2021-07-26 02:30:05'),
(30, 'y0psM8Bf112xw9KshtiblbMRVt55NKnE35fdvOVBPlapFv7Yv1oEMOUp7YVQ', NULL, 37, '2021-07-26 02:31:27', '2021-07-26 02:31:27'),
(31, 'pRBDuNmVtSbF0rpKfpfIQOaEusUBXKKPYo0fbg4ucZwRm2pyxqcO2rIUoSNW', NULL, 38, '2021-07-26 02:43:01', '2021-07-26 02:43:01'),
(32, 'diiEjxt0Ic66WHdYuWmLcCoQLfCpfxRrGGYTCiXFplxMJ6hbLyLecoqxEpj4', NULL, 39, '2021-07-26 02:45:24', '2021-07-26 02:45:24'),
(33, '5pPUQUb6PvYYxlHBx1QbN2gw7APoyWf9oK2N01A7nNl39IJ8YlxUGdcsCPdD', NULL, 40, '2021-07-26 04:01:58', '2021-07-26 04:01:58'),
(34, '9ffKFcy1TxfxvuFhEZHbKji3eo5X96g6cIyoDXdwtogn5mAcSmKYjkf1xBNk', 124, NULL, '2021-07-26 05:38:27', '2021-07-26 05:38:27'),
(35, 'HJbT4cE06UgOYyrNCYaM9Y8ZVJHbDgWxpJn1E5WBSulvzkdQsNoVSTZN0DjQ', NULL, 41, '2021-07-26 06:03:28', '2021-07-26 06:03:28'),
(36, 'ZFxkUR4tcRkBLoXw5XUyydFPTqCIoP9OMViaFIelE0VC08lT99cuJNulXT0d', 30, NULL, '2021-07-26 06:09:09', '2021-07-26 06:09:09'),
(37, 'yDP0GDRuPHXEh1UdSwfdPjj5B7Y5BvReDD5Z3Iu7p05336B3Wm1h3w2jcTXx', NULL, 42, '2021-07-28 00:16:27', '2021-07-28 00:16:27'),
(38, 'mV0vFgOl3saQZyFAcwNjOm6Znv44Uah6erAteJeDetV7PhT3qbjLtOSnfQdu', NULL, 43, '2021-07-28 00:22:08', '2021-07-28 00:22:08'),
(39, '9sfZ1nnyIVxFVmpg3unUg1HsHIuZD4uGQqO9rVr3mNrVd1DxDJN1cyDIO5Lp', NULL, 44, '2021-07-28 00:27:38', '2021-07-28 00:27:38'),
(40, 'RpCpvpky0hxXnksqL94a9533v9m6jkYwal5SxA5jobc9K5dtB26tJp5ql4RP', NULL, 45, '2021-07-28 00:28:04', '2021-07-28 00:28:04'),
(41, '1agnVa0qLg0edi1ZeOn4Vw7JxH96dkGxRhyM5cDv71qYiNlqZRWveUnswFAm', NULL, 46, '2021-07-28 00:28:53', '2021-07-28 00:28:53'),
(42, '4b1qOQZRQhzTXjZ1BnRDQayWr25hreDgS7EpYpklDUa8kntJ9l7CZYBIf0WI', NULL, 47, '2021-07-28 00:31:14', '2021-07-28 00:31:14'),
(43, 'JNOmPkIyAWS16g4ZaDZnOCPzLXX9JsVtCbtejBMxngHqmFZmqMR1Tua8oPat', NULL, 48, '2021-07-28 00:34:20', '2021-07-28 00:34:20'),
(44, '7zSUApvD7IcYT1rewEP2L1ItXnu9zabVylTPbywTCh1CM602hzTr2MWMQslx', NULL, 49, '2021-07-28 00:36:42', '2021-07-28 00:36:42'),
(45, 'ky9UwjmcLwTgLoiwwXtCKAZVslrj3PxpqjZTsNbIv5aSKb7tVXIobKq8R7M2', NULL, 50, '2021-07-28 00:39:33', '2021-07-28 00:39:33'),
(46, 'XEb8AAo0LlJbg0fFpZfMIJA5DBD5csEZ8lihoHFhEi7xd3TuqWA3Uf3qrQGS', NULL, 51, '2021-08-16 06:41:19', '2021-08-16 06:41:19'),
(47, 'C7yK1QUdSEb4R1pLnKjvb7kZkrnjhYnEUDmflb1OHjVWkBEq8PIoFR72ppQm', NULL, 52, '2021-08-16 06:52:32', '2021-08-16 06:52:32'),
(48, 'RpUCgNdhFjEKr9ALrWyhqrUrVuyJN7SZAwrjU67CkBiJcLbaUalMMNZt3NBz', NULL, 53, '2021-08-16 06:58:45', '2021-08-16 06:58:45'),
(49, 'XaR4y40d7GwBVLThrz8AbHwUuwJYXbl0NMxq6Hm8iwtuGHfqsxGm4Ub01ntU', NULL, 54, '2021-08-16 07:02:44', '2021-08-16 07:02:44'),
(50, 'NI9iboHwW5yxL4LuuwOEIX57y4PAYqdapJZGaXQxJiQyuhNr9hzLoiI69E88', NULL, 55, '2021-08-16 07:48:25', '2021-08-16 07:48:25'),
(51, '0voDEHCIwUWPxDh2bpycZM8h0F1xJsOtneVzHLBowHa9COWfG5dp0Pssgrs5', NULL, 56, '2021-08-16 07:49:29', '2021-08-16 07:49:29'),
(52, 'yQyR2y4AP9RhMD5A3Rvn3DVQCqdiB8X2EJczLfSZwoyU1dmpc82CCcS75D1Z', NULL, 57, '2021-08-17 00:24:14', '2021-08-17 00:24:14'),
(53, 'HEm1El4wqBM2tog508wIscdqBntV8r8wx4RSjgT0liTFHUuA8OBOsW3r5Khb', NULL, 58, '2021-08-17 00:25:35', '2021-08-17 00:25:35'),
(54, 'rFvtY01Vqa3KDqtHltwpPg3kmztu56GFh0CizBNYa3lA0dltiakQfYNJEmCj', 128, NULL, '2021-08-17 00:55:51', '2021-08-17 00:55:51');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `abouts`
--
ALTER TABLE `abouts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_bustrip_id_foreign` (`bustrip_id`);

--
-- Indexes for table `buses`
--
ALTER TABLE `buses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `buses_bustype_id_foreign` (`busType_id`);

--
-- Indexes for table `bus_trips`
--
ALTER TABLE `bus_trips`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bus_trips_bus_id_foreign` (`bus_id`);

--
-- Indexes for table `bus_types`
--
ALTER TABLE `bus_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faqs`
--
ALTER TABLE `faqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `general_travel`
--
ALTER TABLE `general_travel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_concerns`
--
ALTER TABLE `health_concerns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `make_your_bookings`
--
ALTER TABLE `make_your_bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indexes for table `navbars`
--
ALTER TABLE `navbars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news_updates`
--
ALTER TABLE `news_updates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `personal_infos`
--
ALTER TABLE `personal_infos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personal_infos_user_id_foreign` (`user_id`);

--
-- Indexes for table `queries`
--
ALTER TABLE `queries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ratings_rateable_type_rateable_id_index` (`rateable_type`,`rateable_id`),
  ADD KEY `ratings_rateable_id_index` (`rateable_id`),
  ADD KEY `ratings_rateable_type_index` (`rateable_type`),
  ADD KEY `ratings_user_id_foreign` (`user_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indexes for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indexes for table `safety_measures`
--
ALTER TABLE `safety_measures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_links`
--
ALTER TABLE `social_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `travel_tip_images`
--
ALTER TABLE `travel_tip_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `verify_users`
--
ALTER TABLE `verify_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `abouts`
--
ALTER TABLE `abouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `buses`
--
ALTER TABLE `buses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `bus_trips`
--
ALTER TABLE `bus_trips`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `bus_types`
--
ALTER TABLE `bus_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faqs`
--
ALTER TABLE `faqs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `general_travel`
--
ALTER TABLE `general_travel`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `health_concerns`
--
ALTER TABLE `health_concerns`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `make_your_bookings`
--
ALTER TABLE `make_your_bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `navbars`
--
ALTER TABLE `navbars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `news_updates`
--
ALTER TABLE `news_updates`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_infos`
--
ALTER TABLE `personal_infos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `queries`
--
ALTER TABLE `queries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `safety_measures`
--
ALTER TABLE `safety_measures`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `social_links`
--
ALTER TABLE `social_links`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `travel_tip_images`
--
ALTER TABLE `travel_tip_images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `verify_users`
--
ALTER TABLE `verify_users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_bustrip_id_foreign` FOREIGN KEY (`bustrip_id`) REFERENCES `bus_trips` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `buses`
--
ALTER TABLE `buses`
  ADD CONSTRAINT `buses_bustype_id_foreign` FOREIGN KEY (`busType_id`) REFERENCES `bus_types` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `bus_trips`
--
ALTER TABLE `bus_trips`
  ADD CONSTRAINT `bus_trips_bus_id_foreign` FOREIGN KEY (`bus_id`) REFERENCES `buses` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `personal_infos`
--
ALTER TABLE `personal_infos`
  ADD CONSTRAINT `personal_infos_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
