-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2024 at 08:50 PM
-- Server version: 8.3.0
-- PHP Version: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `poliklinikavinca_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

DROP TABLE IF EXISTS `doctors`;
CREATE TABLE IF NOT EXISTS `doctors` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `area` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `content` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `education` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `experience` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `slug`, `area`, `image_id`, `content`, `education`, `experience`, `email`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Srdjan Kordic', 'srdjan-kordic', 'Expert in different stuff', 2, '<p>This is some content for doctor</p>', NULL, NULL, 'srdjank90@gmail.com', '0655264567', '2024-09-25 19:01:27', '2024-09-25 19:02:39');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faqs`
--

DROP TABLE IF EXISTS `faqs`;
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `question` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

DROP TABLE IF EXISTS `files`;
CREATE TABLE IF NOT EXISTS `files` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `size` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mime_type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `media_type` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `files_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`id`, `name`, `path`, `size`, `mime_type`, `extension`, `media_type`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'ginekologija', '2024/09/ginekologija.webp', '47596', 'image/webp', 'webp', 'image', 1, NULL, '2024-09-24 20:15:51', '2024-09-24 20:15:51'),
(2, 'apple-programming', '2024/09/apple-programming.jpg', '590941', 'image/jpeg', 'jpg', 'image', 1, NULL, '2024-09-25 19:02:39', '2024-09-25 19:02:39'),
(3, 'sequoia', '2024/09/sequoia.jpeg', '255251', 'image/jpeg', 'jpeg', 'image', 1, NULL, '2024-09-26 18:43:32', '2024-09-26 18:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
CREATE TABLE IF NOT EXISTS `menus` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `menus_user_id_foreign` (`user_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `menu_items`
--

DROP TABLE IF EXISTS `menu_items`;
CREATE TABLE IF NOT EXISTS `menu_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(43, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(44, '2024_01_16_000000_create_permissions_table', 1),
(45, '2024_01_16_010000_create_roles_table', 1),
(46, '2024_01_16_010001_role_permission', 1),
(47, '2024_01_16_020000_create_users_table', 1),
(48, '2024_01_16_030000_create_password_reset_tokens_table', 1),
(49, '2024_01_16_040000_create_password_resets_table', 1),
(50, '2024_01_16_050000_create_failed_jobs_table', 1),
(51, '2024_01_16_070000_create_files_table', 1),
(52, '2024_01_16_080000_create_pages_table', 1),
(53, '2024_01_16_090000_create_posts_table', 1),
(54, '2024_01_16_090001_create_post_categories_table', 1),
(55, '2024_01_16_090002_post_post_category', 1),
(56, '2024_01_16_090003_create_post_tags_table', 1),
(57, '2024_01_16_090004_post_post_tag', 1),
(58, '2024_01_16_850000_create_faqs_table', 1),
(59, '2024_01_16_960000_create_subscribers_table', 1),
(60, '2024_01_16_970000_create_menus_table', 1),
(61, '2024_01_16_970001_create_menu_items_table', 1),
(62, '2024_01_16_980000_create_seo_meta_tags_table', 1),
(63, '2024_01_16_990000_create_options_table', 1),
(70, '2024_01_16_100000_create_services_table', 2),
(71, '2024_01_16_100001_create_service_items_table', 2),
(72, '2024_01_16_110000_create_doctors_table', 2),
(73, '2024_01_16_100002_create_service_faqs_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

DROP TABLE IF EXISTS `options`;
CREATE TABLE IF NOT EXISTS `options` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `key` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `key`, `value`, `created_at`, `updated_at`) VALUES
(1, 'theme_active_opt', 'medical', NULL, '2024-09-26 17:42:43'),
(2, 'service_per_page_opt', '8', '2024-09-24 20:00:34', '2024-09-24 20:00:34'),
(3, 'doctor_per_page_opt', '5', '2024-09-25 18:53:45', '2024-09-25 18:53:45');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

DROP TABLE IF EXISTS `pages`;
CREATE TABLE IF NOT EXISTS `pages` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `template` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'default',
  `status` enum('draft','published','auto-draft','trashed','future') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `pages_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `slug`, `content`, `template`, `status`, `user_id`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Testiranje', 'testiranje', NULL, 'default', 'draft', 1, NULL, '2024-09-17 19:14:45', '2024-09-17 19:14:45');

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
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'USER_READ', 'Read users', NULL, NULL),
(2, 'USER_CREATE', 'Create users', NULL, NULL),
(3, 'USER_UPDATE', 'Update users', NULL, NULL),
(4, 'USER_DELETE', 'Delete users', NULL, NULL),
(5, 'PAGE_READ', 'Read pages', NULL, NULL),
(6, 'PAGE_CREATE', 'Create pages', NULL, NULL),
(7, 'PAGE_UPDATE', 'Update pages', NULL, NULL),
(8, 'PAGE_DELETE', 'Delete pages', NULL, NULL),
(9, 'PRODUCT_READ', 'Read products', NULL, NULL),
(10, 'PRODUCT_CREATE', 'Create products', NULL, NULL),
(11, 'PRODUCT_UPDATE', 'Update products', NULL, NULL),
(12, 'PRODUCT_DELETE', 'Delete products', NULL, NULL),
(13, 'POST_READ', 'Read posts', NULL, NULL),
(14, 'POST_CREATE', 'Create posts', NULL, NULL),
(15, 'POST_UPDATE', 'Update posts', NULL, NULL),
(16, 'POST_DELETE', 'Delete posts', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

DROP TABLE IF EXISTS `personal_access_tokens`;
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `toc` text COLLATE utf8mb4_unicode_ci,
  `highlighted` tinyint(1) NOT NULL DEFAULT '0',
  `footer_display` tinyint(1) NOT NULL DEFAULT '0',
  `menu_display` tinyint(1) NOT NULL DEFAULT '0',
  `product_single_display` tinyint(1) NOT NULL DEFAULT '0',
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `excerpt` text COLLATE utf8mb4_unicode_ci,
  `status` enum('draft','published','auto-draft','trashed','future') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `expiry_date` timestamp NULL DEFAULT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `posts_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `slug`, `image_id`, `toc`, `highlighted`, `footer_display`, `menu_display`, `product_single_display`, `content`, `excerpt`, `status`, `user_id`, `expiry_date`, `published_at`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'TEsting post', 'testing-post', NULL, NULL, 0, 0, 0, 0, NULL, NULL, 'draft', 1, NULL, NULL, '2024-09-26 18:40:51', '2024-09-24 19:41:53', '2024-09-26 18:40:51'),
(2, 'Things Most People Don\'t Know About Medical Clinic', 'things-most-people-dont-know-about-medical-clinic', 3, 'No headings found', 0, 0, 0, 0, '<p class=\"card-text mb-0\">2Adaptive height of each card this text is a bit longer to illustrate the. Some quick example text to build on the card title bulk of the card\'s content and make up the.</p>', NULL, 'published', 1, NULL, NULL, NULL, '2024-09-26 18:41:56', '2024-09-26 18:43:32');

-- --------------------------------------------------------

--
-- Table structure for table `post_categories`
--

DROP TABLE IF EXISTS `post_categories`;
CREATE TABLE IF NOT EXISTS `post_categories` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `user_id` bigint UNSIGNED NOT NULL,
  `order` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_categories_user_id_foreign` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_categories`
--

INSERT INTO `post_categories` (`id`, `name`, `slug`, `description`, `user_id`, `order`, `created_at`, `updated_at`) VALUES
(1, 'Uncategorized', 'uncategorized', 'Default category for posts', 1, NULL, NULL, NULL),
(2, 'Novosti', 'novosti', NULL, 1, NULL, '2024-09-26 18:41:09', '2024-09-26 18:41:09'),
(3, 'Saveti', 'saveti', NULL, 1, NULL, '2024-09-26 18:41:14', '2024-09-26 18:41:14');

-- --------------------------------------------------------

--
-- Table structure for table `post_post_category`
--

DROP TABLE IF EXISTS `post_post_category`;
CREATE TABLE IF NOT EXISTS `post_post_category` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `post_id` bigint UNSIGNED NOT NULL,
  `post_category_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `post_post_category_post_id_foreign` (`post_id`),
  KEY `post_post_category_post_category_id_foreign` (`post_category_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_post_category`
--

INSERT INTO `post_post_category` (`id`, `post_id`, `post_category_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(3, 2, 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `post_post_tag`
--

DROP TABLE IF EXISTS `post_post_tag`;
CREATE TABLE IF NOT EXISTS `post_post_tag` (
  `post_id` bigint UNSIGNED NOT NULL,
  `post_tag_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `post_post_tag_post_id_foreign` (`post_id`),
  KEY `post_post_tag_post_tag_id_foreign` (`post_tag_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `post_tags`
--

DROP TABLE IF EXISTS `post_tags`;
CREATE TABLE IF NOT EXISTS `post_tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Developer', 'Developers life SK!', NULL, NULL),
(2, 'Admin', 'Administrator has all access', NULL, NULL),
(3, 'Editor', 'Moderator of webshop', NULL, NULL),
(4, ' User', 'Registered user of webshop', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `role_permission`
--

DROP TABLE IF EXISTS `role_permission`;
CREATE TABLE IF NOT EXISTS `role_permission` (
  `role_id` bigint UNSIGNED NOT NULL,
  `permission_id` bigint UNSIGNED NOT NULL,
  KEY `role_permission_role_id_foreign` (`role_id`),
  KEY `role_permission_permission_id_foreign` (`permission_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `seo_meta_tags`
--

DROP TABLE IF EXISTS `seo_meta_tags`;
CREATE TABLE IF NOT EXISTS `seo_meta_tags` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` int NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `keywords` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `seo_meta_tags`
--

INSERT INTO `seo_meta_tags` (`id`, `model`, `model_id`, `title`, `description`, `keywords`, `created_at`, `updated_at`) VALUES
(1, 'Doctor', 1, 'Srdjan Kordic', 'Ovo je srdjan kordic', 'srdjan,kordic,programmer,seo', '2024-09-25 19:31:41', '2024-09-25 19:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

DROP TABLE IF EXISTS `services`;
CREATE TABLE IF NOT EXISTS `services` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `appointment` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci,
  `image_id` bigint UNSIGNED DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `name`, `slug`, `title`, `description`, `appointment`, `content`, `image_id`, `discount`, `created_at`, `updated_at`) VALUES
(1, 'Ginekologija', 'ginekologija', 'Redovni pregledi su ključ zdravlja! 🤰🩺 Brinite o svom zdravlju, zakažite pregled na vreme. 🌸', 'Ginekologija je grana medicine koja se bavi zdravljem ženskog reproduktivnog sistema, pružajući ključne usluge poput preventivnih pregleda, dijagnostike i tretmana različitih stanja. Redovni ginekološki pregledi su od vitalnog značaja za očuvanje zdravlja, rano otkrivanje bolesti i pravovremenu terapiju. Naši stručnjaci pružaju personalizovanu negu, osiguravajući da se svaka pacijentkinja oseća sigurno i zbrinuto. Od savetovanja o reproduktivnom zdravlju do naprednih procedura, tu smo da vas podržimo na svakom koraku. Zakazivanje pregleda je prvi korak ka brizi o sebi i svom zdravlju.', NULL, '<p>Ginekolo&scaron;ki pregledi su neophodni za očuvanje va&scaron;eg zdravlja. Na&scaron;a klinika nudi &scaron;irok spektar usluga po pristupačnim cenama, uključujući preventivne preglede, ultrazvuk, hormonalne analize i druge specijalizovane tretmane.</p>', 1, NULL, '2024-09-24 20:10:22', '2024-09-26 18:09:13'),
(2, 'Radiologija', 'radiologija', 'Brzi rezultati, precizna analiza. 🖥️ Naša tehnologija omogućava brzo i tačno postavljanje dijagnoze.', NULL, NULL, NULL, NULL, NULL, '2024-09-26 18:08:43', '2024-09-26 18:08:57'),
(3, 'Estetska medicina', 'estetska-medicina', 'Želite izgled iz snova? ✨ Naši tretmani estetske medicine ističu vašu prirodnu lepotu!💙', NULL, NULL, NULL, NULL, NULL, '2024-09-26 18:11:07', '2024-09-26 18:11:21'),
(5, 'Kardiologija', 'kardiologija', 'Vaše srce zaslužuje najbolju brigu! ❤️ Redovni pregledi su ključ za dug i zdrav život.', NULL, NULL, NULL, NULL, NULL, '2024-09-26 18:12:20', '2024-09-26 18:12:25');

-- --------------------------------------------------------

--
-- Table structure for table `service_faqs`
--

DROP TABLE IF EXISTS `service_faqs`;
CREATE TABLE IF NOT EXISTS `service_faqs` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint UNSIGNED NOT NULL,
  `question` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answer` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_faqs`
--

INSERT INTO `service_faqs` (`id`, `service_id`, `question`, `answer`, `created_at`, `updated_at`) VALUES
(1, 1, 'Sta je to ginekologija?', 'Ginekologija je grana medicine koja se bavi zdravljem žena, posebno reproduktivnim sistemom. To uključuje dijagnostiku, lečenje i prevenciju bolesti i stanja koja utiču na žene, kao što su menstrualni problemi, trudnoća, menopauza, infekcije, kao i razne bolesti kao što su ciste, miomi ili karcinomi. Ginekolozi obavljaju i redovne preglede, kao što su PAPA testovi i ultrazvuk, kako bi osigurali zdravlje žena tokom različitih faza života.', '2024-09-25 19:27:23', '2024-09-25 19:28:10'),
(2, 1, 'Koje su podgrane Ginekologije?', 'Obstetricija: Fokusira se na trudnoću, porođaj i postpartalnu negu.\r\nReproduktivna endokrinologija: Bavi se hormonalnim poremećajima i problemima plodnosti.\r\nGinekološka onkologija: Proučava i leči karcinome reproduktivnog sistema, poput raka materice, jajnika i grlića materice.\r\nPediatrička i adolescentna ginekologija: Fokusira se na ginekološke probleme kod devojčica i mladih žena.\r\nGinekološka urologija: Bavi se problemima vezanim za mokraćni sistem kod žena, kao što su urinarna inkontinencija.\r\nPerinatologija: Specijalizuje se za visokorizične trudnoće i brigu o fetusu.\r\nMinimálně invazivna hirurgija: Uključuje laparoskopiju i histeroskopiju za lečenje raznih stanja.', '2024-09-25 19:29:16', '2024-09-25 19:29:50');

-- --------------------------------------------------------

--
-- Table structure for table `service_items`
--

DROP TABLE IF EXISTS `service_items`;
CREATE TABLE IF NOT EXISTS `service_items` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `service_id` bigint UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int DEFAULT NULL,
  `discount` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `service_items`
--

INSERT INTO `service_items` (`id`, `service_id`, `name`, `description`, `price`, `discount`, `created_at`, `updated_at`) VALUES
(2, 1, 'Specijalisticki pregled', 'Pregled dr specijaliste', 5000, '5', '2024-09-25 18:40:08', '2024-09-25 18:40:20');

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

DROP TABLE IF EXISTS `subscribers`;
CREATE TABLE IF NOT EXISTS `subscribers` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `unsubscribe` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `first_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` bigint UNSIGNED NOT NULL,
  `additional_permissions` text COLLATE utf8mb4_unicode_ci,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `users_role_id_foreign` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `dob`, `gender`, `country`, `avatar`, `phone`, `email`, `email_verified_at`, `role_id`, `additional_permissions`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 'Srdjan', 'Kordic', NULL, NULL, NULL, NULL, NULL, 'srdjank90@gmail.com', NULL, 1, NULL, '$2y$10$LLwriR/pXVwKjVoMh599w.vVjsaAZTSun3VgLJ/P2InGFRC/JPnMe', NULL, NULL, NULL, NULL),
(2, 'Liljana', 'Kordic', NULL, NULL, NULL, NULL, NULL, 'likaciric90@gmail.com', NULL, 2, NULL, '$2y$10$g/v8R4B1kUjA.ja.O.wue.VPIgPf3s3Fmh6agHcvAr1yrO0d4upKW', NULL, NULL, NULL, NULL),
(3, 'Sofija', 'Kordic', NULL, NULL, NULL, NULL, NULL, 'sofija.kordic@gmail.com', NULL, 4, NULL, '$2y$10$75NB0txk2skQw0csQIZC0ORcrzhj9Uk6OY5RR6HMY4qNmK2i8Fqra', NULL, NULL, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
