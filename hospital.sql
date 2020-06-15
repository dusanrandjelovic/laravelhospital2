-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 17, 2020 at 02:52 PM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id11164448_crudhosp`
--

-- --------------------------------------------------------

--
-- Table structure for table `dijagnozas`
--

CREATE TABLE `dijagnozas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naziv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `dijagnozas`
--

INSERT INTO `dijagnozas` (`id`, `naziv`, `created_at`, `updated_at`) VALUES
(1, 'Tahikardija', '2019-12-26 13:17:47', '2019-12-26 13:17:47'),
(2, 'Insuficijencija', '2019-12-26 13:18:09', '2019-12-26 13:18:09'),
(3, 'Bronhitis', '2020-01-01 19:15:11', '2020-01-01 19:15:11'),
(4, 'Psorijaza', '2020-01-01 19:15:21', '2020-01-01 19:15:21'),
(5, 'Prelom', '2020-01-01 19:15:30', '2020-01-01 19:15:30'),
(6, 'Sinus Pul', '2020-01-01 19:15:37', '2020-01-01 19:15:37'),
(7, 'Anemija', '2020-01-01 19:15:54', '2020-01-01 19:15:54'),
(8, 'Lupus', '2020-01-01 19:16:08', '2020-01-01 19:16:08'),
(9, 'Meningitis', '2020-01-01 19:16:23', '2020-01-01 19:16:23'),
(10, 'Grip', '2020-01-01 19:16:44', '2020-01-01 19:16:44'),
(11, 'Variola vera', '2020-01-01 19:16:55', '2020-01-01 19:16:55'),
(12, 'Demencija', '2020-01-01 19:17:41', '2020-01-01 19:17:41'),
(13, 'Alchajmer', '2020-01-01 19:17:56', '2020-01-01 19:17:56');

-- --------------------------------------------------------

--
-- Table structure for table `dijagnoza_karton`
--

CREATE TABLE `dijagnoza_karton` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `dijagnoza_id` bigint(20) UNSIGNED NOT NULL,
  `karton_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kartons`
--

CREATE TABLE `kartons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `opis` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `datum` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pacijent_id` int(11) NOT NULL,
  `lekovi` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dijagnoze` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kartons`
--

INSERT INTO `kartons` (`id`, `opis`, `datum`, `pacijent_id`, `lekovi`, `dijagnoze`, `created_at`, `updated_at`) VALUES
(1, 'Prvi pregled. Ima tahikardiju. Prepisan bilirubin i kardiopirin.', '29. Decembar 2019.', 1, 'Bilirubin,Kardiopirin', 'Tahikardija', '2019-12-26 13:20:35', '2019-12-29 23:01:27'),
(2, 'Totijev karton. prvi put. Prelom i grip. Kardiopirin i Minot. \r\nDrugi pregled: Sve u redu.\r\nTreci pregled: Bronhitis. Prepisan Inulin B i Amaril.', '1.1.2020.', 2, 'Inulin B,Amaril', 'Bronhitis', '2019-12-26 13:24:07', '2020-01-01 20:57:57'),
(3, NULL, NULL, 4, '0', 'Nema dijagnoze', '2019-12-29 22:51:24', '2019-12-29 22:51:24'),
(4, NULL, NULL, 3, '0', 'Nema dijagnoze', '2019-12-31 23:19:53', '2019-12-31 23:19:53');

-- --------------------------------------------------------

--
-- Table structure for table `karton_lek`
--

CREATE TABLE `karton_lek` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karton_id` bigint(20) UNSIGNED NOT NULL,
  `lek_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `leks`
--

CREATE TABLE `leks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `naziv` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kolicina` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `leks`
--

INSERT INTO `leks` (`id`, `naziv`, `kolicina`, `created_at`, `updated_at`) VALUES
(1, 'Bromazepam', '1', '2019-12-25 12:59:18', '2020-01-01 19:41:23'),
(2, 'Bilirubin', '1', '2019-12-26 13:11:12', '2020-01-01 19:41:15'),
(3, 'Andol IQ', '1', '2019-12-26 13:11:19', '2020-01-01 17:56:04'),
(4, 'Brufen', '1', '2019-12-26 13:11:26', '2020-01-01 17:55:56'),
(5, 'Inulin B', '1', '2019-12-26 13:11:33', '2020-01-01 19:41:07'),
(6, 'Minot', '1', '2019-12-26 13:11:39', '2020-01-01 17:55:42'),
(7, 'Ertrtt', '0', '2019-12-26 13:11:48', '2020-01-01 18:31:41'),
(8, 'Kardiopirin', '1', '2019-12-26 13:12:27', '2020-01-01 18:31:47'),
(9, 'Monk', '0', '2020-01-01 17:50:59', '2020-01-01 18:32:05'),
(10, 'Amaril', '1', '2020-01-01 19:41:31', '2020-01-01 19:41:31'),
(11, 'Bisolvon', '1', '2020-01-01 19:41:40', '2020-01-01 19:41:40'),
(12, 'Nitroglicerin', '1', '2020-01-01 19:41:51', '2020-01-01 19:41:51'),
(13, 'Glicerin', '1', '2020-01-01 19:42:00', '2020-01-01 19:42:00'),
(14, 'Dilacor', '1', '2020-01-01 19:46:38', '2020-01-01 19:46:38');

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
(3, '2019_12_24_133905_create_managements_table', 1),
(4, '2019_12_24_134548_create_roles_table', 1),
(5, '2019_12_25_125609_create_pacijents_table', 2),
(6, '2019_12_25_125733_create_kartons_table', 2),
(7, '2019_12_25_125853_create_leks_table', 2),
(8, '2019_12_25_130016_create_dijagnozas_table', 2),
(9, '2019_12_25_130415_create_dijagnoza_karton_table', 2),
(10, '2019_12_25_130513_create_karton_lek_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pacijents`
--

CREATE TABLE `pacijents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prezime` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pol` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum_rodjenja` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `adresa` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pacijents`
--

INSERT INTO `pacijents` (`id`, `ime`, `prezime`, `pol`, `datum_rodjenja`, `adresa`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Janko', 'Ilic', 'muski', '23. 5. 1987.', 'Beogradska 22', 2, NULL, NULL),
(2, 'Francesko', 'Toti', 'muski', '5. 6. 1985.', 'Rimska 32', 2, '2019-12-26 13:07:45', '2019-12-26 13:07:45'),
(3, 'Ana', 'Belic', 'zenski', '23. 7. 1984.', 'Bulevar 16', 9, '2019-12-29 22:13:33', '2019-12-29 22:13:33'),
(4, 'Fil', 'Jouns', 'muski', '23. 7. 1981.', 'Mancester 45', 5, '2019-12-29 22:49:41', '2019-12-29 22:49:41');

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
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'lekar', NULL, NULL),
(3, 'asistent', NULL, NULL);

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
  `role_id` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Dusan Real', 'admin1@mail.com', NULL, '$2y$10$78FUzrnr/2mlKscuX8juyOGtSWULJPC4rKLZjBuutYnY3siBBZ6BO', 1, NULL, NULL, NULL),
(2, 'Dusan Lekarevic', 'lekar@mail.com', NULL, '$2y$10$MtCciz5F7i9zq3lIctbUQ.k4zAGtyhW/SOZNfxhc7uDZYVETMCJo.', 2, NULL, '2019-12-24 22:57:18', '2019-12-26 12:59:45'),
(3, 'Dusan Asistent', 'asistent@mail.com', NULL, '$2y$10$.E44O8pNrpRDkJ.xNZ6m2.UcsSlthpD0O8nzTlUPcpVvVdojMjcPS', 3, NULL, '2019-12-25 10:55:02', '2019-12-29 21:53:11'),
(5, 'Mark Gasol', 'mgasol@mail.com', NULL, '$2y$10$UnskNX.FCFUReKLOptZLEORdD3.Pov5/y5qvk20EfLlcyQCyNdGS2', 2, NULL, '2019-12-26 12:41:46', '2019-12-26 12:41:46'),
(6, 'Ad Min', 'ad97@mail.com', NULL, '$2y$10$aOwy9lFDcdRqVBQMnoa/TeggJaZCSPZJscUDhMI5WtI3ZXuPeygWO', 1, NULL, '2019-12-29 21:35:19', '2019-12-29 21:35:19'),
(8, 'Asis Tent', 'ast34@mail.com', NULL, '$2y$10$7jiF5Zy9bG6nkuyM0cnZWeiAZyzfyQLR2xd.9K2vsppri2oiklfPO', 3, NULL, '2019-12-29 21:41:04', '2019-12-29 21:41:04'),
(9, 'Dok Lekar', 'lek256@mail.com', NULL, '$2y$10$Pr3ZEXcg3FlTf/IOkNYXZ.vbYL2iOI47YmVbMBIThhUFlZwZ/0LbG', 2, NULL, '2019-12-29 21:43:02', '2019-12-29 21:43:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dijagnozas`
--
ALTER TABLE `dijagnozas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dijagnoza_karton`
--
ALTER TABLE `dijagnoza_karton`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kartons`
--
ALTER TABLE `kartons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karton_lek`
--
ALTER TABLE `karton_lek`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leks`
--
ALTER TABLE `leks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pacijents`
--
ALTER TABLE `pacijents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
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
-- AUTO_INCREMENT for table `dijagnozas`
--
ALTER TABLE `dijagnozas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `dijagnoza_karton`
--
ALTER TABLE `dijagnoza_karton`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kartons`
--
ALTER TABLE `kartons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `karton_lek`
--
ALTER TABLE `karton_lek`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `leks`
--
ALTER TABLE `leks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pacijents`
--
ALTER TABLE `pacijents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
