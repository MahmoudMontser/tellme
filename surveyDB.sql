-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Apr 07, 2020 at 03:41 AM
-- Server version: 10.3.9-MariaDB
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `survey`
--

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

DROP TABLE IF EXISTS `groups`;
CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `created_at`, `updated_at`) VALUES
(2, 'فصل الابطال', '2020-03-30 09:42:18', '2020-04-07 01:29:46'),
(4, 'فصل الاقوياء', '2020-03-30 10:07:53', '2020-03-30 10:07:53');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_02_25_011448_create_cities_table', 1),
(2, '2020_02_25_011523_create_neighborhoods_table', 2),
(3, '2014_10_12_000000_create_users_table', 3),
(4, '2014_10_12_100000_create_password_resets_table', 3),
(5, '2020_02_05_103935_create_login_attempts_table', 3),
(6, '2020_02_25_010418_create_user_properties_table', 3),
(7, '2020_02_25_024850_create_categories_table', 4),
(8, '2020_03_06_133321_create_intrests_table', 5),
(9, '2020_03_06_230333_create_tasks_table', 6),
(10, '2020_03_06_231651_create_tasks_table', 7),
(11, '2020_03_08_191953_create_samples_categories_table', 8),
(12, '2020_03_08_192225_create_samples_table', 8),
(13, '2020_03_08_201756_create_tasks_table', 9),
(14, '2020_03_08_202011_create_places_table', 10),
(15, '2020_03_08_203053_create_tasks_table', 11),
(16, '2020_03_08_222325_create_reports_table', 12),
(17, '2020_03_08_231321_create_reports_table', 13),
(18, '2020_03_10_130456_create_notes_table', 14);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` enum('Admin','Employee') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) UNSIGNED DEFAULT NULL,
  `neighborhood_id` bigint(20) UNSIGNED DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_city_id_foreign` (`city_id`),
  KEY `users_neighborhood_id_foreign` (`neighborhood_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `phone`, `type`, `city_id`, `neighborhood_id`, `image`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'المشرف الاساسي', 'admin@admin.com', NULL, '$2y$10$Ctb3z0SOaT1t9dhD66CXoOiSbkfID8WSOyzeBlxj.E4j6r4wNSvye', '01013776377', 'Admin', 1, 1, '13cdb71f58255a6ba901942b03c8af3b.png', NULL, '2020-02-28 10:49:05', '2020-03-06 15:04:32'),
(21, 'موظف33', 'admin@example.com', NULL, '$2y$10$kkcb2oWNNPdAxvOnaTacEOpUoFl/GIY88b0on6DjlVG5i3IrOCEK6', '01013776377', 'Employee', NULL, NULL, '13cdb71f58255a6ba901942b03c8af3b.png', NULL, '2020-03-06 21:19:53', '2020-03-09 16:17:05'),
(22, 'موظف2', 'mhmoud@olmail.com', NULL, '$2y$10$NvEMVEsaVVC/gLZengilfu5q8fsnEFn8o5/2IkqiCJp3UYgEmSPke', '01013776388', 'Employee', NULL, NULL, '13cdb71f58255a6ba901942b03c8af3b.png', NULL, '2020-03-06 21:20:38', '2020-03-09 09:04:01'),
(23, 'test', '251622', NULL, '$2y$10$Zlxjmki5zMiYhZ4x86vfqOQd7scPpGQialN8WtmGhNLV6WYfHbMLe', '01013776377', 'Employee', NULL, NULL, 'fbe37354be9244126d62710c0fb3b78a.jpg', NULL, '2020-03-18 16:58:48', '2020-03-18 16:58:49'),
(24, 'Mahmoud Montser', '512332', NULL, '$2y$10$PbgLnSChZpgLKx/XSC7Gn.G4CeXNLh9DAgTKCpb/xIoKkNaWDCujS', '01013776377', 'Admin', NULL, NULL, '004b3d64c0a40f05a8d2a8136e110323.png', NULL, '2020-03-23 17:41:12', '2020-03-23 17:41:13');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
