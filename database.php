-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 08, 2019 at 05:27 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `hurricane`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_id`, `tweet_id`, `comment`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Thanks Oprah you da best.', '2019-11-05 06:24:21', '2019-11-05 06:24:21'),
(2, 2, 2, 'Don\'t forget your shoes Cindy.', '2019-11-05 10:00:27', '2019-11-05 10:00:27'),
(3, 3, 3, 'AGREED SNOW IS DUMB', '2019-11-06 08:11:14', '2019-11-06 08:11:14'),
(4, 3, 4, 'Me! I strongly dislike snow.', '2019-11-06 09:45:58', '2019-11-06 09:45:58'),
(5, 3, 5, 'GIVE ME ALL THE GLUTEN', '2019-11-06 09:46:34', '2019-11-06 09:46:34'),
(6, 3, 6, 'It\'s a good life #blessed', '2019-11-06 09:47:44', '2019-11-06 09:47:44'),
(7, 3, 7, 'Try Aldo they said', '2019-11-06 09:48:29', '2019-11-06 09:48:29'),
(8, 3, 8, 'Dollar is not definitively $1. It can be all the moneys', '2019-11-06 09:49:24', '2019-11-06 09:49:24'),
(9, 3, 10, 'Same thing happened to me with cherry lip balm?!', '2019-11-06 09:51:22', '2019-11-06 09:51:22'),
(10, 3, 10, 'One time I ordered a Masala Chai and then started getting ads for the spice?!', '2019-11-06 09:51:53', '2019-11-06 09:51:53');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `follower_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `user_id`, `follower_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2019-11-05 06:23:40', '2019-11-05 06:23:40'),
(2, 2, 2, '2019-11-05 09:19:05', '2019-11-05 09:19:05'),
(3, 3, 2, '2019-11-06 06:20:21', '2019-11-06 06:20:21'),
(4, 4, 4, '2019-11-08 06:39:43', '2019-11-08 06:39:43'),
(5, 4, 1, '2019-11-08 06:39:46', '2019-11-08 06:39:46');

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
(39, '2014_10_12_000000_create_users_table', 1),
(40, '2014_10_12_100000_create_password_resets_table', 1),
(41, '2019_09_04_230557_create_followers_table', 1),
(42, '2019_09_04_230618_create_tweets_table', 1),
(43, '2019_09_04_230658_create_comments_table', 1);

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
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `tweet`, `created_at`, `updated_at`) VALUES
(1, 1, 'YOU GET A CAR AND YOU GET A CAR EVERYONE GETS A CAR', '2019-11-05 06:23:53', '2019-11-05 06:23:53'),
(2, 2, 'Gotta be home by midnight', '2019-11-05 09:23:35', '2019-11-05 09:23:35'),
(3, 3, 'I hate snow I\'m moving to Hawaii.', '2019-11-06 08:10:57', '2019-11-06 08:10:57'),
(4, 3, 'Who else doesn\'t like snow?!', '2019-11-06 09:45:39', '2019-11-06 09:45:39'),
(5, 3, 'Who made cauliflower pizza? Why?', '2019-11-06 09:46:24', '2019-11-06 09:46:24'),
(6, 3, 'I want to go to New Zealand and live the hobbit life.', '2019-11-06 09:47:22', '2019-11-06 09:47:22'),
(7, 3, 'Where can I find decent black chelsea boots?', '2019-11-06 09:48:13', '2019-11-06 09:48:13'),
(8, 3, 'Why are things at the Dollar Store more than a dollar?', '2019-11-06 09:48:45', '2019-11-06 09:48:45'),
(9, 3, 'Plan B life choice - go on the Bachelor, get to top 4, start influencer career, post about Fab Fit Fun Boxes 24/7', '2019-11-06 09:50:12', '2019-11-06 09:50:12'),
(10, 3, 'I was craving chicken wings and then I saw an ad for it on my phone - they\'re inside our brains now.', '2019-11-06 09:50:54', '2019-11-06 09:50:54');

-- --------------------------------------------------------

--
-- Table structure for table `tweet_likes`
--

CREATE TABLE `tweet_likes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tweet_likes`
--

INSERT INTO `tweet_likes` (`id`, `user_id`, `tweet_id`, `created_at`, `updated_at`) VALUES
(130, 2, 2, '2019-11-05 11:03:15', '2019-11-05 11:03:15'),
(133, 3, 2, '2019-11-06 08:10:37', '2019-11-06 08:10:37'),
(134, 3, 4, '2019-11-06 09:45:42', '2019-11-06 09:45:42');

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
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Oprah', 'winfry@gmail.com', NULL, '$2y$10$GCRih95svQAbjeIPWmAHgOp8FVJ6y4HWa4akWfcoWKpgPSXaBFWU6', NULL, '2019-11-05 06:23:38', '2019-11-05 06:23:38'),
(2, 'Cinderella', 'cindy@gmail.com', NULL, '$2y$10$rSmwhGsUnj731JowWkZ0ju9bAFy.3BuhQtzYrbMu0HkRYUgsMUUCq', NULL, '2019-11-05 09:19:01', '2019-11-05 09:19:01'),
(3, 'Ariana Grande', 'grande@gmail.com', NULL, '$2y$10$V.UBmq2.yT9y8mXwNMmyDe5cNoDJh/fbVVcz6GXcHFOFLPU2xW2uy', NULL, '2019-11-06 06:19:30', '2019-11-06 06:19:30'),
(4, 'Jonny Appleseed', 'appleseed@gmail.com', NULL, '$2y$10$QmfoIBsWe3fgcpgHLtA..uRwoYPkep1TfGRFGRQa8liGjjs1heBi6', NULL, '2019-11-08 06:39:34', '2019-11-08 06:39:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
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
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tweet_likes`
--
ALTER TABLE `tweet_likes`
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
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tweet_likes`
--
ALTER TABLE `tweet_likes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
