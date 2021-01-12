-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2020 at 01:56 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `employer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `email`, `password`, `image`, `phone`, `level`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Test', 'test@test.com', '$2y$10$P1rIuyQruoSvPKazMcaNrO.4TKoQgYu1FOVBqrGzWwRP7e9xvaD4S', NULL, '011111111111', 2, 'sczshhDxW79Gq6MY5cpUqfmqZPZY0ucjH2zcCTxikrU4pdIDPeAugqPDlakh', '2018-11-29 18:37:01', '2018-11-29 18:37:01'),
(2, 'test2', 'test2@mail.com', '$2y$10$kchj3nwdUfyqnWU1RRLxB.K3t0S66vxg1U.lZljAqJWTfTyLianWG', NULL, '011142255656', 1, NULL, '2018-12-14 21:30:09', '2018-12-14 21:30:09'),
(3, 'araby', 'araby@mail.com', '$2y$10$oJFxaBbeJg9NzQWA2Iz0O.UiIbXrUQxjWf8mSpxn1AR5g4ydb/XgS', NULL, '13225356', 1, '5A49AhkUvo1rGqKGQHZ6qrjGk6VgQ6aMNWRc28QQb8ySyuGfatlVwN8sfas3', '2018-12-14 21:30:42', '2018-12-14 21:30:42');

-- --------------------------------------------------------

--
-- Table structure for table `apply_for_jobs`
--

CREATE TABLE `apply_for_jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `job_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `apply_for_jobs`
--

INSERT INTO `apply_for_jobs` (`id`, `job_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `title`, `created_at`, `updated_at`) VALUES
(1, 'Cairo', '2018-12-07 22:00:00', '2018-12-07 22:00:00'),
(2, 'Giza', NULL, NULL),
(3, 'Alexandria', NULL, NULL),
(4, 'Aswan', NULL, NULL),
(5, 'Asyut', NULL, NULL),
(6, 'Beheira', NULL, NULL),
(7, 'Beni Suef', NULL, NULL),
(8, 'Dakahlia', NULL, NULL),
(9, 'Damietta', NULL, NULL),
(10, 'Faiyum', NULL, NULL),
(11, 'Gharbia', NULL, NULL),
(12, 'Ismailia', NULL, NULL),
(13, 'Kafr El_Sheikh', NULL, NULL),
(14, 'Luxor', NULL, NULL),
(15, 'Matrouh', NULL, NULL),
(16, 'Minya', NULL, NULL),
(17, 'Monufia', NULL, NULL),
(18, 'New Valley', NULL, NULL),
(19, 'North Sinai', NULL, NULL),
(20, 'Port Said', NULL, NULL),
(21, 'Qalyubia', NULL, NULL),
(22, 'Qena', NULL, NULL),
(23, 'Red Sea', NULL, NULL),
(24, 'Sharqia', NULL, NULL),
(25, 'Sohag', NULL, NULL),
(26, 'South Sinai', NULL, NULL),
(27, 'Suez', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_company` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `employment_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `employments`
--

CREATE TABLE `employments` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `employments`
--

INSERT INTO `employments` (`id`, `title`, `icon`, `created_at`, `updated_at`) VALUES
(1, 'Accounting and Auditing', 'la-calculator', NULL, '2018-12-15 18:16:48'),
(2, 'Administration', 'la-adjust', NULL, '2018-12-15 18:18:47'),
(3, 'Architecture', 'la-anchor', NULL, '2018-12-15 18:18:54'),
(4, 'Banking', 'la-area-chart', NULL, '2018-12-15 18:19:02'),
(5, 'Beauty and Fashion', 'la-asterisk', NULL, '2018-12-15 18:19:12'),
(6, 'Cleaning Services', 'la-automobile', NULL, '2018-12-15 18:19:29'),
(7, 'Community Services', 'la-balance-scale', NULL, '2018-12-15 18:19:38'),
(8, 'Construction and Building', 'la-bank', NULL, '2018-12-15 18:19:51'),
(9, 'Consulting', 'la-bar-chart', NULL, '2018-12-15 18:20:05'),
(10, 'Customer Service and Call Center', 'la-beer', NULL, '2018-12-15 18:20:20'),
(11, 'Design, Creative, and Arts', 'la-briefcase', NULL, '2018-12-15 18:21:49'),
(12, 'Engineering', 'la-certificate', NULL, '2018-12-15 18:21:59'),
(13, 'Chemical Engineering', 'la-cab', NULL, '2018-12-15 18:24:01'),
(14, 'Civil Engineering', 'la-cart-plus', NULL, '2018-12-15 18:24:17'),
(15, 'Electrical Engineering', 'la-check-circle', NULL, '2018-12-15 18:24:35'),
(16, 'Mechanical Engineering', 'la-television', NULL, '2018-12-15 18:27:20'),
(17, 'Farming and Agriculture', 'la-code', NULL, '2018-12-15 18:24:56'),
(18, 'Finance and Investment', 'la-dashboard', NULL, '2018-12-15 18:25:09'),
(19, 'Hospitality and Tourism', 'la-cutlery', NULL, '2018-12-15 18:25:22'),
(20, 'Human Resources and Recruitment', 'la-female', NULL, '2018-12-15 18:25:47'),
(21, 'Information Technology', 'la-database', NULL, '2018-12-15 18:26:01'),
(22, 'Legal', 'la-crop', NULL, '2018-12-15 18:26:10'),
(23, 'Logistics and Transportation', 'la-diamond', NULL, '2018-12-15 18:26:26'),
(24, 'Maintenance, Repair, and Technician', 'la-edit', NULL, '2018-12-15 18:26:42'),
(25, 'Management', 'la-eye', NULL, '2018-12-15 18:26:51'),
(26, 'Manufacturing', 'la-cogs', NULL, '2018-12-15 18:27:01'),
(27, 'Marketing and PR', 'la-folder', NULL, '2018-12-15 18:27:12'),
(28, 'Medical, Healthcare, and Nursing', 'la-group', NULL, '2018-12-15 18:27:28'),
(29, 'Oil and Gas', 'la-lightbulb-o', NULL, '2018-12-15 18:27:38'),
(30, 'Purchasing and Procurement', 'la-tv', NULL, '2018-12-15 18:27:58'),
(31, 'Quality Control', 'la-search', NULL, '2018-12-15 18:28:07'),
(32, 'Research and Development', 'la-university', NULL, '2018-12-15 18:28:17'),
(33, 'Safety', 'la-television', NULL, '2018-12-15 18:28:26'),
(34, 'Sales', 'la-tags', NULL, '2018-12-15 18:28:36'),
(35, 'Secretarial', 'la-film', NULL, '2018-12-15 18:28:49'),
(36, 'Security', 'la-mobile', NULL, '2018-12-15 18:28:59'),
(37, 'Support Services', 'la-fire', NULL, '2018-12-15 18:29:07'),
(38, 'Teaching and Academics', 'la-futbol-o', NULL, '2018-12-15 18:36:15'),
(39, 'Training and Development', 'la-dashboard', NULL, '2018-12-15 18:36:30'),
(40, 'Translation', 'la-glass', NULL, '2018-12-15 18:36:41'),
(41, 'Writing and Journalism', 'la-gavel', NULL, '2018-12-15 18:36:52'),
(42, 'Hello', 'la-archive', '2018-12-15 17:46:18', '2018-12-15 17:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(10) UNSIGNED NOT NULL,
  `years_of_experience` enum('1 Year','2 Year','3 Year','4 Year','More than 5 year') COLLATE utf8mb4_unicode_ci NOT NULL,
  `computer` enum('Excellent','Very Good','Good','Acceptable','Not Required') COLLATE utf8mb4_unicode_ci NOT NULL,
  `gander` enum('Male','Female','Males and females') COLLATE utf8mb4_unicode_ci NOT NULL,
  `qualification` enum('Higher education','Above average education','Intermediate Education (Diploma)','Masters','Doctor','Without education') COLLATE utf8mb4_unicode_ci NOT NULL,
  `english_language` enum('Excellent','Very Good','Good','Acceptable','Not Required') COLLATE utf8mb4_unicode_ci NOT NULL,
  `microsoft_office` enum('Excellent','Very Good','Good','Acceptable','Not Required') COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` enum('18 - 25 year','26 - 35 year','36 - 55 year','All Ages') COLLATE utf8mb4_unicode_ci NOT NULL,
  `other_conditions` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `basic_salary` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Job_type` enum('Full Time','Part Time','Freelancer') COLLATE utf8mb4_unicode_ci NOT NULL,
  `Job_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `employments_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `job_details` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `years_of_experience`, `computer`, `gander`, `qualification`, `english_language`, `microsoft_office`, `age`, `other_conditions`, `basic_salary`, `Job_type`, `Job_title`, `city_id`, `employments_id`, `user_id`, `job_details`, `accept`, `created_at`, `updated_at`) VALUES
(1, '1 Year', 'Very Good', 'Male', 'Higher education', 'Very Good', 'Very Good', '26 - 35 year', 'fsdajfsajk', 'sdasadas', 'Part Time', 'sadasda', 14, 3, 1, 'sadfsaas', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_06_10_235902_create_admins_table', 1),
(4, '2018_06_11_132956_create_settings_table', 1),
(6, '2018_12_08_165319_create_employments_table', 2),
(8, '2018_12_08_170211_create_cities_table', 3),
(16, '2014_10_12_000000_create_users_table', 4),
(18, '2018_12_16_230921_create_user_info_table', 5),
(19, '2018_12_08_170301_create_companies_table', 6),
(21, '2019_01_19_154951_create_jobs_table', 7),
(22, '2019_02_05_205056_create_apply_for_jobs_table', 8);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(10) UNSIGNED NOT NULL,
  `site_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_1` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_2` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lang` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telephone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_name`, `logo`, `favicon`, `email`, `phone_1`, `phone_2`, `address`, `lat`, `lang`, `file`, `keywords`, `description`, `facebook`, `linkedin`, `instagram`, `telephone`, `created_at`, `updated_at`) VALUES
(1, 'Josbseekers', 'lkf', 'lkj', 'info@Josbseekers.com', 'lkjh', 'kjhg', 'lkjhgfc', 'kjhg', NULL, 'kjh', 'kj', 'h', 'https://www.facebook.com/', 'https://www.facebook.com/', NULL, NULL, '2018-12-01 22:00:00', '2019-02-16 19:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `first_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `birthday` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gander` enum('Male','Female') COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` enum('candidate','employer') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'candidate',
  `player_id` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `api_token` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `accept` int(2) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `first_name`, `last_name`, `email`, `password`, `phone`, `image`, `birthday`, `gander`, `level`, `player_id`, `api_token`, `accept`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Araby Mohamed', 'Araby', 'Mohamed', 'araby@mail.com', '$2y$10$BIRz./1dCTRkLwgtebIF3uVUw9Y2pXBaxdbYYSnUjk70qEhJV5ztG', '01114226509', '181219110638769906.png', '03/22/1995', 'Male', 'candidate', NULL, '9321f6c950531337e5501fca4d2b7978d5d78cfb', 0, 'RhVoO0Sdgw9k2U7yK67J8L0A2MKWdBvEO60zpLVbqhTaylhxIDFqY3vuX7Wq', NULL, '2019-06-02 21:25:22'),
(9, 'Ahmed Nage', 'Ahmed', 'Nage', 'ahmed@mail.com', '$2y$10$O0eYag7AHwmT0UT/DadlHO6w9DLDxCAqhklwo4WQbfDBU0l4ul1S6', '123456789', NULL, '12/20/2018', 'Male', 'candidate', NULL, '6e5461f9a64abb045594e3c7995d4cb3794795a3', 0, NULL, '2018-12-19 22:32:49', '2018-12-19 22:42:02');

-- --------------------------------------------------------

--
-- Table structure for table `user_info`
--

CREATE TABLE `user_info` (
  `id` int(10) UNSIGNED NOT NULL,
  `jop_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `education_levels` enum('Student','Diploma','Bachelor','Graduate') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `twitter` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `website` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cv` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_info`
--

INSERT INTO `user_info` (`id`, `jop_title`, `education_levels`, `Description`, `facebook`, `twitter`, `linkedin`, `website`, `cv`, `city_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Web Developer', 'Bachelor', 'Spent several years working on sheep on Wall Street. Had moderate success investing in Yugos on Wall Street. Managed a small team buying and selling pogo sticks for farmers. Spent several years licensing licorice in West Palm Beach, FL. Developed severalnew methods for working with banjos in the aftermarket. Spent a weekend importing banjos in West Palm Beach, FL.In this position, the Software Engineer ollaborates with Evention\'s Development team to continuously enhance our current software solutions as well as create new solutions to eliminate the back-office operations and management challenges present', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', 'https://www.facebook.com/', '27Thursdayk27f2523262.4000_Essential_English_Words_1.pdf', 1, 1, NULL, '2019-06-02 21:25:22'),
(4, 'Teacher', 'Bachelor', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', NULL, NULL, NULL, NULL, NULL, 17, 9, '2018-12-19 22:32:49', '2019-02-13 22:33:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `apply_for_jobs`
--
ALTER TABLE `apply_for_jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `apply_for_jobs_job_id_foreign` (`job_id`),
  ADD KEY `apply_for_jobs_user_id_foreign` (`user_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `companies_title_unique` (`title`),
  ADD UNIQUE KEY `email_company` (`email_company`),
  ADD KEY `companies_city_id_foreign` (`city_id`),
  ADD KEY `companies_employment_id_foreign` (`employment_id`),
  ADD KEY `companies_user_id_foreign` (`user_id`);

--
-- Indexes for table `employments`
--
ALTER TABLE `employments`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employments_title_unique` (`title`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_city_id_foreign` (`city_id`),
  ADD KEY `jobs_employments_id_foreign` (`employments_id`),
  ADD KEY `jobs_user_id_foreign` (`user_id`);

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
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_info`
--
ALTER TABLE `user_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userinfo_city_id_foreign` (`city_id`),
  ADD KEY `userinfo_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `apply_for_jobs`
--
ALTER TABLE `apply_for_jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employments`
--
ALTER TABLE `employments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_info`
--
ALTER TABLE `user_info`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apply_for_jobs`
--
ALTER TABLE `apply_for_jobs`
  ADD CONSTRAINT `apply_for_jobs_job_id_foreign` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_for_jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `companies`
--
ALTER TABLE `companies`
  ADD CONSTRAINT `companies_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `companies_employment_id_foreign` FOREIGN KEY (`employment_id`) REFERENCES `employments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `companies_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_employments_id_foreign` FOREIGN KEY (`employments_id`) REFERENCES `employments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jobs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_info`
--
ALTER TABLE `user_info`
  ADD CONSTRAINT `userinfo_city_id_foreign` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userinfo_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
