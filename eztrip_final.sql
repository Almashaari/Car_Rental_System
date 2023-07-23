-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 05:03 PM
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
-- Database: `eztrip`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `line` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `zipCode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `line`, `city`, `state`, `zipCode`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'sdfsdf', '2', '2', '12334', 2, '2023-05-15 18:22:08', '2023-07-12 08:04:55'),
(2, 'Al bidda- street 43-bulding 5', '5', '1', '36000', 3, '2023-07-03 02:36:56', '2023-07-03 02:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `mycars`
--

CREATE TABLE `mycars` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `plate` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `colour` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `condition` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mycars`
--

INSERT INTO `mycars` (`id`, `user_id`, `image`, `plate`, `colour`, `condition`, `type`, `model`, `year`, `price`, `created_at`, `updated_at`) VALUES
(2, 1, '1689329417.jpg', '77584', 'Red', 'new', 'hatchback', 'Myvi', '2023', '110', '2023-05-06 16:51:31', '2023-07-16 06:57:22'),
(4, 1, 'carIcon.png', '78405', 'black', 'Good', 'seden', 'Toyota camry', '2013', '160', '2023-05-06 17:28:35', '2023-07-09 06:59:21');

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
('mazeed2011@gmail.com', 'gDEoeQfL82xz0oEqXj4cU1S8SY3aKCmQ36hButz7AaAdHFnvjZtgoslASFkHTDGK', '2023-05-05 18:35:37'),
('anwar.se19@gmail.com', 'nu4HBLP2oYC3mRlvFj01lXQ5D44KctrRUFgg5oKupjcGow06ZFRBf1UKVwyGRBIm', '2023-06-30 18:18:44'),
('anwar.se19@gmail.com', 'PEQh4L8EVw2hTVvKsYn26LyqsjOnQHn4EwEZVO8F8WxNDxmoflNl1dvHU21AbvH6', '2023-06-30 18:18:49'),
('janwn19@gmail.com', 'R3L1vCPszilVF8cLzudSBC89dqPXoWSVvrbkXxJywzqsaANgdxAwW63CfN6sARSt', '2023-06-30 18:21:26'),
('janwan19@gmail.com', 'l4F9EFYxI8TvCVXlsM4OfFEn3YlysmDn8ZICqGKVMpEg0eEMKmTBvnQRmA2cWfbU', '2023-07-04 23:29:46'),
('Mazeed2010@gmail.com', 'p8cIdCgzPWmKAxgyRhQbxGQXdY8kUjbcySTsu8KHLEnRCaruAyqlPxF28ExiJUoe', '2023-07-04 23:30:54');

-- --------------------------------------------------------

--
-- Table structure for table `renteds`
--

CREATE TABLE `renteds` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `dfrom` date NOT NULL,
  `dto` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `renteds`
--

INSERT INTO `renteds` (`id`, `car_id`, `user_id`, `dfrom`, `dto`, `created_at`, `updated_at`) VALUES
(6, 4, 2, '2023-09-01', '2023-09-07', '2023-05-19 11:33:54', '2023-07-16 06:58:10'),
(9, 2, 2, '2023-07-20', '2023-07-23', '2023-07-12 08:05:27', '2023-07-12 08:05:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'profile.png',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` int(11) NOT NULL DEFAULT 1 COMMENT '0 for admin \r\n1 for users',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `image`, `email`, `email_verified_at`, `phone`, `address`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'moha', '1689519388.jpg', 'anwar.se19@gmail.com', NULL, '77679856', 'https://goo.gl/maps/AhqpYVTmp42zWLna9', '$2y$10$pVVkMtOOQFckM0ZTzpIunOk9PxpJ/NIumCKBecBfpQ8u7robRiFie', 0, '5P3DdZ4xtRcba46YGA44lZzFF3icrze947Osgo9GJrrpm3YLJcpmYqCTmKBB', '2023-05-01 18:43:49', '2023-07-16 06:56:50'),
(2, 'ibrahim', '1689517513.png', 'Mazeed2010@gmail.com', NULL, '1321356', NULL, '$2y$10$BUNwMiwrJ2sa8I3q41I6UOIRUtSEGvfh2TNgEU.yiJqqhYGJpEWTS', 1, 'BUkR8reNY4N5WaenmzXwOHfDeUFgNuIpGipRgJ3UvsE8IgABOs1XSr7UvnlA', '2023-05-01 18:43:49', '2023-07-16 06:25:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mycars`
--
ALTER TABLE `mycars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `renteds`
--
ALTER TABLE `renteds`
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
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mycars`
--
ALTER TABLE `mycars`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `renteds`
--
ALTER TABLE `renteds`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
