-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 10, 2022 at 06:28 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskjob`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2, '2022_11_09_172952_create_users_table', 1),
(3, '2022_11_09_173149_create_tasks_table', 1),
(4, '2022_11_09_173221_create_task_activities_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `due_date` date NOT NULL,
  `assign_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `assign_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `due_date`, `assign_to`, `assign_by`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Task 1', '2022-11-10', 'employee1', 'manager', 'Task Description 1', 'In Progress', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(3, 'Task Test', '2022-11-11', 'employee1', 'employee1', 'Test Description', 'Done', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(6, 'Task 2', '2022-11-11', 'employee1', 'manager', 'Task Description', 'To Do', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(7, 'Task 3', '2022-11-11', 'employee1', 'manager', 'Task Description 3', 'To Do', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(8, 'Task 4', '2022-11-11', 'employee2', 'manager', 'Task Description 4', 'To Do', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(9, 'Task 5', '2022-11-11', 'employee2', 'manager', 'Task Description 5', 'To Do', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(10, 'Task 6', '2022-11-11', 'employee1', 'employee1', 'Offer Client', 'To Do', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(11, 'Task Name 2', '2022-11-11', 'employee1', 'employee1', 'Description X', 'To Do', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(12, 'Demo Task', '2022-11-11', 'employee2', 'employee2', 'Task Description X', 'In Progress', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(13, 'New Task', '2022-11-12', 'employee2', 'employee2', 'Express JS', 'To Do', '2022-11-11 05:32:27', '2022-11-11 05:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `task_activities`
--

CREATE TABLE `task_activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `task_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `updated_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `task_activities`
--

INSERT INTO `task_activities` (`id`, `task_id`, `status`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 'To Do', 'manager', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(3, 1, 'In Progress', 'manager', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(6, 3, 'To Do', 'employee1', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(7, 3, 'In Progress', 'employee1', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(8, 3, 'In Progress', 'employee1', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(9, 3, 'In Progress', 'employee1', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(10, 3, 'Done', 'employee1', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(11, 3, 'Done', 'employee1', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(12, 1, 'To Do', 'employee1', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(15, 6, 'To Do', 'manager', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(16, 7, 'To Do', 'manager', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(17, 8, 'To Do', 'manager', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(18, 9, 'To Do', 'manager', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(19, 1, 'In Progress', 'manager', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(20, 10, 'To Do', 'employee1', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(21, 11, 'To Do', 'employee1', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(22, 12, 'To Do', 'employee2', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(23, 13, 'To Do', 'employee2', '2022-11-11 05:32:27', '2022-11-11 05:32:27'),
(24, 12, 'In Progress', 'employee2', '2022-11-11 05:32:27', '2022-11-11 05:32:27');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `password`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Manager', 'manager', '12345@m', 'MANAGER', NULL, NULL),
(2, 'Employee 1', 'employee1', '12345@1', 'EMPLOYEE', NULL, NULL),
(3, 'Employee 2', 'employee2', '12345@2', 'EMPLOYEE', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `task_activities`
--
ALTER TABLE `task_activities`
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
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `task_activities`
--
ALTER TABLE `task_activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
