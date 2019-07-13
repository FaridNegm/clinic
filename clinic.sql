-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2019 at 05:33 AM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `departments`
--

CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'قسم العلاج الطبيعي', 'قسم يختص بالعلاج الطبيعي', 1, '2019-07-12 02:01:17', '2019-07-12 02:19:43'),
(3, 'قسم الباطنه', 'قسم يختص بعلاج الباطنه', 1, '2019-07-12 02:20:26', '2019-07-12 02:20:26'),
(5, 'قسم الروماتيزم', 'قسم يختص بعلاج الروماتيزم', 1, '2019-07-12 02:20:59', '2019-07-12 02:20:59'),
(6, 'قسم الاسنان', 'قسم يختص بعلاج الاسنان', 1, '2019-07-12 02:21:26', '2019-07-12 02:21:26');

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `department` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `name`, `email`, `password`, `phone`, `mobile`, `department`, `gender`, `image`, `address`, `status`, `created_at`, `updated_at`) VALUES
(6, 'Osama', 'ooooo@gmail.com', '$2y$10$zaBqBXWHSYqkQULwzJivMeZUvnGcSQiPN5Cd5b3yafd6dA5uYPjQ6', 14, 1117903055, 'السبت', 2, 'df_image.png', 'cairo el mokatem', 1, '2019-07-10 01:42:59', '2019-07-12 18:56:32'),
(7, 'El Sayed', 'aya@gmail.com', '1111111', 222222222, 1117903055, 'السبت', 1, 'df_image.png', 'cairo el mokatem', 1, '2019-07-10 02:06:44', '2019-07-11 02:16:49');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_appointment`
--

CREATE TABLE `doctor_appointment` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `sat_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `sat_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `sun` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `sun_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `sun_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `mon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `mon_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `mon_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `tue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `tue_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `tue_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `wen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `wen_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `wen_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `thu` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `thu_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `thu_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `fri` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `fri_from` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `fri_to` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT '---',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctor_appointment`
--

INSERT INTO `doctor_appointment` (`id`, `name`, `sat`, `sat_from`, `sat_to`, `sun`, `sun_from`, `sun_to`, `mon`, `mon_from`, `mon_to`, `tue`, `tue_from`, `tue_to`, `wen`, `wen_from`, `wen_to`, `thu`, `thu_from`, `thu_to`, `fri`, `fri_from`, `fri_to`, `created_at`, `updated_at`) VALUES
(7, '6', NULL, '12:00 AM', '2:00 AM', NULL, '---', '---', NULL, '---', '---', NULL, '---', '---', NULL, '4:00 AM', '11:00 AM', NULL, '---', '---', NULL, '12:30 AM', '7:30 AM', '2019-07-12 23:15:51', '2019-07-12 23:22:01'),
(8, '7', NULL, '---', '---', NULL, '---', '---', NULL, '10:30 PM', '11:30 PM', NULL, NULL, NULL, NULL, '---', '---', NULL, '12:00 AM', '1:00 AM', NULL, '---', '---', '2019-07-12 23:22:29', '2019-07-12 23:24:55');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_06_13_190716_create_settings_table', 1),
(4, '2019_06_27_195823_create_times_table', 1),
(5, '2019_07_09_201133_create_doctors_table', 2),
(6, '2019_07_10_201912_create_patients_table', 3),
(7, '2019_07_11_031439_create_patient_documents_table', 4),
(8, '2019_07_12_032402_create_departments_table', 5),
(9, '2019_07_12_054204_create_doctor_appointments_table', 6),
(10, '2019_07_12_055223_doctor_appointment', 7),
(11, '2019_07_12_203228_create_reserve_appointments_table', 8);

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
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `mobile` int(11) NOT NULL,
  `blood_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `birth_date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `name`, `email`, `password`, `phone`, `mobile`, `blood_group`, `birth_date`, `gender`, `image`, `address`, `status`, `created_at`, `updated_at`) VALUES
(2, 'farid negm', 'faridnegm44@gmail.com', '$2y$10$KdoLOOWpngysfKqODyuMZODfTjE5A4xyIqVxehNCk5RHvbFH0ub7i', NULL, 1117903055, 'AB+', '2019-08-13', 1, '14.jpg', 'cairo el mokatem', 2, '2019-07-10 18:48:02', '2019-07-10 19:08:45'),
(3, 'Aya El bialy', 'faridnegm44@gmail.com', '$2y$10$e8MsywxKZPIOkRZun8ZmA.J8aVgr7e4uiJXGiRiODxw1/3f/Mj4RK', NULL, 1117903055, 'B+', '2019-07-11', 1, 'df_image.png', 'cairo el mokatem', 1, '2019-07-11 02:15:48', '2019-07-11 02:15:48'),
(4, 'Asmaa Negm', 'faridnegm44@gmail.com', '$2y$10$XV9amVUD59ClY.Vuf0igi.As1MTSwe8nyuP5TJ2hHKzlw3gfeKTo.', NULL, 1117903055, 'AB+', '2019-07-11', 2, 'df_image.png', 'cairo el mokatem', 1, '2019-07-11 02:16:18', '2019-07-11 02:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `patient_documents`
--

CREATE TABLE `patient_documents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `document_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `files` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patient_documents`
--

INSERT INTO `patient_documents` (`id`, `date`, `patient`, `doctor`, `document_title`, `files`, `created_at`, `updated_at`) VALUES
(15, '2019-07-11', '3', '6', NULL, '[\"863098.png\",\"637036.accdb\"]', '2019-07-11 17:44:36', '2019-07-11 17:44:36'),
(19, '2019-07-11', '3', '7', NULL, '[\"logo.png\",\"New Microsoft Excel Worksheet.xlsx\",\"qqqq.txt\",\"resume.pdf\",\"\\u0645\\u0642\\u062f\\u0645\\u0647.docx\"]', '2019-07-11 18:19:49', '2019-07-11 18:19:49'),
(20, '2019-07-30', '4', '7', 'fimaly', '[\"Beginner-Acting-Resume.pdf\",\"New Microsoft Excel Worksheet.xlsx\",\"oscars-1920x1080.jpg\",\"qqqq.txt\",\"\\u0645\\u0642\\u062f\\u0645\\u0647.docx\"]', '2019-07-11 18:26:34', '2019-07-11 18:26:34');

-- --------------------------------------------------------

--
-- Table structure for table `reserve_appointments`
--

CREATE TABLE `reserve_appointments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `appointment_status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reserve_appointments`
--

INSERT INTO `reserve_appointments` (`id`, `patient`, `doctor`, `date`, `notes`, `appointment_status`, `created_at`, `updated_at`) VALUES
(1, '3', '6', '2019-07-19', 'Very Bad Health', '3', '2019-07-12 19:01:30', '2019-07-12 19:23:07'),
(2, '4', '7', '2019-08-05', 'bad bad', '1', '2019-07-12 23:36:20', '2019-07-12 23:36:20');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slogen` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `owner_name` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `times`
--

CREATE TABLE `times` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `from` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `to` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `matter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `times`
--

INSERT INTO `times` (`id`, `from`, `to`, `day`, `matter`, `gender`, `created_at`, `updated_at`) VALUES
(2, '12:00 AM', '12:30 AM', 'السبت', 'علوم', 'بنين', '2019-07-09 03:37:13', '2019-07-09 03:37:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
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
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient_documents`
--
ALTER TABLE `patient_documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reserve_appointments`
--
ALTER TABLE `reserve_appointments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `times`
--
ALTER TABLE `times`
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
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor_appointment`
--
ALTER TABLE `doctor_appointment`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `patient_documents`
--
ALTER TABLE `patient_documents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `reserve_appointments`
--
ALTER TABLE `reserve_appointments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `times`
--
ALTER TABLE `times`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
