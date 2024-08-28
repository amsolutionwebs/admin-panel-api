-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 28, 2024 at 12:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminapi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `age` varchar(255) NOT NULL,
  `gender` enum('male','female') NOT NULL,
  `employee_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `alternate_mobile_number` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `marital_status` varchar(255) DEFAULT NULL,
  `qualification` varchar(255) DEFAULT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `blood_group` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `country_id` int(11) DEFAULT NULL,
  `state_id` int(11) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `pincode` varchar(255) DEFAULT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `adhar_card_front_side` varchar(255) DEFAULT NULL,
  `adhar_card_back_side` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `usertype` varchar(255) DEFAULT NULL,
  `company_name` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `first_name`, `last_name`, `age`, `gender`, `employee_id`, `email`, `mobile_number`, `alternate_mobile_number`, `whatsapp_number`, `marital_status`, `qualification`, `designation`, `blood_group`, `address`, `country_id`, `state_id`, `city`, `pincode`, `profile_picture`, `adhar_card_front_side`, `adhar_card_back_side`, `bio`, `usertype`, `company_name`, `username`, `password`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Aman', 'Kumar', '15-03-1995', 'male', '15395', 'admin2@gmail.com', '7052416398', '7607046985', '7052416399', 'single', 'other', 'manger', 'ba', 'azamgarh', 101, 38, '58', '276303', NULL, NULL, NULL, 'nn', 'admin', 'mwb', 'admin2', '$2y$12$s4VC/jiuyiyMWTC8ob68pOKA5UpO0s3hr8J5kCXIVm7CGYMmDUIki', 'pending', '', '2024-08-12 06:08:42', '2024-08-12 06:08:42'),
(2, 'Aman', 'Kumar', '15-03-1995', 'male', '15395', 'admin4@gmail.com', '7052416394', '7607046985', '7052416399', 'single', 'other', 'manger', 'ba', 'azamgarh', 101, 38, '58', '276303', NULL, NULL, NULL, 'nn', 'admin', 'mwb', 'admin4', '$2y$12$JPOqGySO0sP34wS7FgHdW.6rgPA0ua30rrZrukF/T2PVfypoRMrMO', 'pending', '', '2024-08-12 06:09:21', '2024-08-12 06:09:21'),
(3, 'Aman', 'Kumar', '15-03-1995', 'male', '15395', 'admin@gmail.com', '7052416399', '7607046985', '7052416399', 'single', 'other', 'manger', 'ba', 'azamgarh', 101, 38, '58', '276303', NULL, NULL, NULL, 'nn', 'admin', 'mwb', 'admin', '$2y$12$Xr956HCCeAe4esIZf4.m7uEtz4mjZFtaUJ5RXfVp0qZeYYe1jsBS2', 'pending', '', '2024-08-12 06:10:42', '2024-08-12 06:10:42');

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `banner_title` varchar(200) DEFAULT NULL,
  `banner_url` varchar(255) DEFAULT NULL,
  `banner_image` varchar(200) DEFAULT NULL,
  `page_type` varchar(200) DEFAULT NULL,
  `banner_type` varchar(200) DEFAULT NULL,
  `banner_content` varchar(255) DEFAULT NULL,
  `sort_order` varchar(200) DEFAULT NULL,
  `banner_status` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `banner_title`, `banner_url`, `banner_image`, `page_type`, `banner_type`, `banner_content`, `sort_order`, `banner_status`, `created_at`, `updated_at`) VALUES
(1, 'get more', 'abcd.com', 'banner-1724837856.jpg', 'homepage', 'offers', '10% off every products', '1', 'enable', '2024-08-28 04:07:36', '2024-08-28 04:07:36'),
(2, 'get more', 'abcd.com', 'banner-1724837996.jpg', 'homepage', 'offers', '10% off every products', '1', 'enable', '2024-08-28 04:09:56', '2024-08-28 04:09:56'),
(3, 'get more', 'abcd.com', 'banner-1724837999.jpg', 'homepage', 'offers', '10% off every products', '1', 'enable', '2024-08-28 04:09:59', '2024-08-28 04:09:59');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) DEFAULT NULL,
  `cat_seo_url` varchar(255) DEFAULT NULL,
  `cat_content` varchar(255) DEFAULT NULL,
  `cat_seo_title` varchar(255) DEFAULT NULL,
  `meta_keywords` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `cat_image` varchar(255) DEFAULT NULL,
  `sort_order` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `contactuses`
--

CREATE TABLE `contactuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `intrest_in` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `whatsapp_number` varchar(255) DEFAULT NULL,
  `about_project` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contactuses`
--

INSERT INTO `contactuses` (`id`, `name`, `email`, `phone`, `intrest_in`, `location`, `whatsapp_number`, `about_project`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aman', 'aman@gmail.com', '7052416399', 'java', 'azamgarh', '7052416399', 'get ecommerce website', 'enable', '2024-08-14 03:52:49', '2024-08-14 03:52:49'),
(2, 'aman', 'aman@gmail.com', '7052416399', 'java', 'azamgarh', '7052416399', 'get ecommerce website', 'enable', '2024-08-14 03:52:51', '2024-08-14 03:52:51');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sortname` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phonecode` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employeesids`
--

CREATE TABLE `employeesids` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `employee_id` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `getquets`
--

CREATE TABLE `getquets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `messsage` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `getquets`
--

INSERT INTO `getquets` (`id`, `name`, `email`, `phone`, `subject`, `messsage`, `status`, `created_at`, `updated_at`) VALUES
(1, 'aman', 'aman@gmail.com', '8978789455', 'message', 'abc', 'enable', '2024-08-14 04:07:58', '2024-08-14 04:07:58');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2024_08_12_103247_create_countries_table', 1),
(6, '2024_08_12_103334_create_states_table', 1),
(7, '2024_08_12_103406_create_employeesids_table', 1),
(8, '2024_08_12_103507_create_userotps_table', 1),
(9, '2024_08_12_103550_create_admins_table', 1),
(10, '2024_08_12_103617_create_banners_table', 1),
(11, '2024_08_12_103647_create_categories_table', 1),
(12, '2024_08_12_103709_create_contactuses_table', 1),
(13, '2024_08_12_103746_create_getquets_table', 1),
(14, '2024_08_12_103833_create_pages_table', 1),
(15, '2024_08_12_103908_create_sociallinks_table', 1),
(16, '2024_08_12_103943_create_subscribers_table', 1),
(17, '2024_08_12_104009_create_testimonials_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_title_seo_url` varchar(200) NOT NULL,
  `post_content` varchar(200) DEFAULT NULL,
  `post_type` varchar(200) DEFAULT NULL,
  `seo_title` varchar(200) NOT NULL,
  `meta_keywords` varchar(200) NOT NULL,
  `meta_description` varchar(200) NOT NULL,
  `post_status` varchar(200) NOT NULL,
  `post_image` varchar(200) DEFAULT NULL,
  `sort_order` varchar(55) NOT NULL DEFAULT '0',
  `post_id` varchar(55) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `post_title`, `post_title_seo_url`, `post_content`, `post_type`, `seo_title`, `meta_keywords`, `meta_description`, `post_status`, `post_image`, `sort_order`, `post_id`, `created_at`, `updated_at`) VALUES
(1, 'home', 'home', 'home', 'home page content', 'best company', 'keywords', 'description', 'enable', 'post-1724839247.jpg', '1', NULL, '2024-08-28 04:30:47', '2024-08-28 04:30:47');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\Admins', 3, 'API_TOKEN', '342666e539875336405259caae748330dccba4b4306a532f23d052595fa090f8', '[\"*\"]', NULL, NULL, '2024-08-28 03:25:03', '2024-08-28 03:25:03'),
(2, 'App\\Models\\Admins', 3, 'API_TOKEN', '1d6f92ebaa5338cd74a99034bb78c26668f63de75734fff3f6304054bacd49b9', '[\"*\"]', NULL, NULL, '2024-08-28 03:31:01', '2024-08-28 03:31:01'),
(3, 'App\\Models\\Admins', 3, 'API_TOKEN', '766c753823fa87133a098c98fd971a92be316418f225baf77a499c1f72fc9e4d', '[\"*\"]', NULL, NULL, '2024-08-28 03:34:15', '2024-08-28 03:34:15'),
(4, 'App\\Models\\Admins', 3, 'API_TOKEN', 'b4a03b00a555a821e2b1cf8502470986d3e73c1d0d5fac8a95713c5f380b0b9f', '[\"*\"]', NULL, NULL, '2024-08-28 03:35:39', '2024-08-28 03:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `sociallinks`
--

CREATE TABLE `sociallinks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `secondary_phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `secondary_email` varchar(255) DEFAULT NULL,
  `whatsapp` varchar(255) DEFAULT NULL,
  `google_map` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `linkdin` varchar(255) DEFAULT NULL,
  `main_address` varchar(255) DEFAULT NULL,
  `branch_address` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sociallinks`
--

INSERT INTO `sociallinks` (`id`, `user_id`, `logo`, `phone`, `secondary_phone`, `email`, `secondary_email`, `whatsapp`, `google_map`, `facebook`, `youtube`, `instagram`, `twitter`, `linkdin`, `main_address`, `branch_address`, `status`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, '7052416399', '7887005983', 'eraman047@gmail.com', 'amp@gmail.com', NULL, 'map', NULL, 'youtube', NULL, 'twitter', NULL, 'address', 'branchaddress', 'enable', '2024-08-28 04:59:40', '2024-08-28 04:59:40'),
(2, '1', 'logo-1724841016.jpg', '7052416399', '7887005983', 'eraman047@gmail.com', 'amp@gmail.com', NULL, 'map', NULL, 'youtube', NULL, 'twitter', NULL, 'address', 'branchaddress', 'enable', '2024-08-28 05:00:16', '2024-08-28 05:00:16'),
(3, '1', 'logo-1724841386.jpg', '7052416399', '7887005983', 'eraman047@gmail.com', 'amp@gmail.com', '75846984555', 'map', 'facebook', 'youtube', 'instagram', 'twitter', NULL, 'address', 'branchaddress', 'enable', '2024-08-28 05:06:26', '2024-08-28 05:06:26');

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `country_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subscribers_email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`id`, `subscribers_email`, `status`, `created_at`, `updated_at`) VALUES
(2, 'email@gmail.com', 'enable', '2024-08-12 06:32:14', '2024-08-12 06:32:37');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `testimonials_name` varchar(255) DEFAULT NULL,
  `testimonials_position` varchar(255) DEFAULT NULL,
  `testimonials_content` varchar(255) DEFAULT NULL,
  `testimonials_image` varchar(255) DEFAULT NULL,
  `sort_order` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `testimonials_name`, `testimonials_position`, `testimonials_content`, `testimonials_image`, `sort_order`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Aman', 'Laravel Developer', 'letd do that', '1723626174testimonials_image.jpg', '1', 'enable', '2024-08-14 03:32:54', '2024-08-14 03:32:54'),
(3, 'Aman', 'Laravel Developer', 'letd do that', '1723626176testimonials_image.jpg', '1', 'enable', '2024-08-14 03:32:56', '2024-08-14 03:32:56'),
(4, 'Aman', 'Laravel Developer', 'letd do that', '1723626178testimonials_image.jpg', '1', 'enable', '2024-08-14 03:32:58', '2024-08-14 03:32:58'),
(5, 'Aman', 'Laravel Developer', 'letd do that', '1723626181testimonials_image.jpg', '1', 'enable', '2024-08-14 03:33:01', '2024-08-14 03:33:01'),
(6, 'Aman', 'Laravel Developer', 'letd do that', '1723626182testimonials_image.jpg', '1', 'enable', '2024-08-14 03:33:02', '2024-08-14 03:33:02'),
(7, 'Aman', 'Laravel Developer', 'letd do that', '1723626184testimonials_image.jpg', '1', 'enable', '2024-08-14 03:33:04', '2024-08-14 03:33:04'),
(8, 'Aman', 'Laravel Developer', 'letd do that', '1723626185testimonials_image.jpg', '1', 'enable', '2024-08-14 03:33:05', '2024-08-14 03:33:05'),
(9, 'Aman', 'Laravel Developer', 'letd do that', '1723626187testimonials_image.jpg', '1', 'enable', '2024-08-14 03:33:07', '2024-08-14 03:33:07');

-- --------------------------------------------------------

--
-- Table structure for table `userotps`
--

CREATE TABLE `userotps` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_type` varchar(255) DEFAULT NULL,
  `users_id` bigint(20) UNSIGNED DEFAULT NULL,
  `otp` varchar(255) DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_mobile_number_unique` (`mobile_number`),
  ADD UNIQUE KEY `admins_username_unique` (`username`);

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contactuses`
--
ALTER TABLE `contactuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employeesids`
--
ALTER TABLE `employeesids`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `getquets`
--
ALTER TABLE `getquets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `sociallinks`
--
ALTER TABLE `sociallinks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`),
  ADD KEY `states_country_id_foreign` (`country_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userotps`
--
ALTER TABLE `userotps`
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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contactuses`
--
ALTER TABLE `contactuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `countries`
--
ALTER TABLE `countries`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employeesids`
--
ALTER TABLE `employeesids`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `getquets`
--
ALTER TABLE `getquets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sociallinks`
--
ALTER TABLE `sociallinks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `userotps`
--
ALTER TABLE `userotps`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `states`
--
ALTER TABLE `states`
  ADD CONSTRAINT `states_country_id_foreign` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
