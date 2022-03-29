-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 29, 2022 at 11:34 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_skill`
--

-- --------------------------------------------------------

--
-- Table structure for table `benefits`
--

CREATE TABLE `benefits` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `classrooms_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `benefits`
--

INSERT INTO `benefits` (`id`, `name`, `classrooms_id`, `created_at`, `updated_at`) VALUES
(1, 'Mendapatkan ilmu yang bermanfaat', 1, '2022-03-22 06:27:11', '2022-03-22 06:27:11'),
(2, 'Mendapatkan kompetensi Laravel', 1, '2022-03-22 06:27:32', '2022-03-22 06:27:32'),
(3, 'Mahir dalam bidang web development', 1, '2022-03-22 07:08:15', '2022-03-22 07:08:15'),
(5, 'Menjadi Backend Developer', 1, '2022-03-22 07:14:07', '2022-03-22 07:14:07');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `icon` text NOT NULL,
  `name` varchar(150) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `icon`, `name`, `created_at`, `updated_at`) VALUES
(22, '1647329478web.png', 'Web Development', '2022-03-08 07:18:44', '2022-03-15 07:31:18'),
(23, '1647329513mobile.png', 'Mobile Development', '2022-03-15 06:39:14', '2022-03-15 07:31:53');

-- --------------------------------------------------------

--
-- Table structure for table `classrooms`
--

CREATE TABLE `classrooms` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` text NOT NULL,
  `description` text NOT NULL,
  `is_visible` tinyint(1) NOT NULL DEFAULT 1,
  `slug` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `classrooms`
--

INSERT INTO `classrooms` (`id`, `category_id`, `title`, `thumbnail`, `description`, `is_visible`, `slug`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 22, 'Tutorial Laravel untuk pemula', '164786785316475162030_IsJ92LIMQGAM7kY7.png', 'Kelas Laravel untuk pemula update', 1, 'Tutorial-Laravel-untuk-pemula', 1, '2022-03-17 11:23:23', '2022-03-22 08:36:38'),
(7, 23, 'test kelas 2', '1648536884Success.jpg', 'test kelas 2', 1, 'test-kelas-2', 1, '2022-03-29 06:54:44', '2022-03-29 06:54:44');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE `modules` (
  `id` int(11) NOT NULL,
  `classrooms_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `thumbnail` text NOT NULL,
  `slug` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `classrooms_id`, `title`, `description`, `content`, `thumbnail`, `slug`, `created_at`, `updated_at`) VALUES
(1, 1, 'Instalasi Laravel dan Package pendukung', 'Dalam materi kali ini kita akan melakukan uji coba praktek secara langsung mengenai instalasi laravel beserta komponen dan package pendukungnya.', '<h1>Instalasi Composer</h1>\r\n\r\n<p><img alt=\"\" src=\"https://getcomposer.org/img/logo-composer-transparent.png\" style=\"height:356px; width:290px\" /></p>\r\n\r\n<p>pada materi kali ini kita akan melakukan instalasi composer. sebelumnya apa itu composer? mungkin dari kalian belum tau apa itu composer. Composer adalah package yang memungkinkan kita untuk menginstall sebuah library secara mudah</p>\r\n', '1648118517bf-left.jpg', 'Instalasi-Laravel-dan-Package-pendukung', '2022-03-22 08:37:19', '2022-03-22 08:37:19');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `invoice_id` char(50) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `invoice_id` char(50) NOT NULL,
  `classrooms_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `address` text DEFAULT NULL,
  `photo` text NOT NULL DEFAULT 'default.png',
  `role` enum('admin','public') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`, `name`, `phone_number`, `address`, `photo`, `role`, `created_at`, `updated_at`) VALUES
(1, 'yudasmalabi@gmail.com', '$2y$10$Y6qEXVl14Nk6hA8.8EnIHuQcaO0YDharkumtbr5a4ii2aw/5Az5Pa', 'Yudas Malabi', '6282257181297', 'Politeknik Negeri Malang', '163991487749679669.jpeg', 'admin', '2021-12-14 06:37:13', '2022-03-08 08:04:29'),
(2, 'welsonmario@gmail.com', '$2y$10$TxI2SFgQM4K6fK8kW8wP6OqqsMFxcL4CQLAfIcLyodWpnUjyKPttG', 'Welson Mario', '6281393456332', 'Politeknik Negeri Malang', 'default.png', 'public', '2021-12-15 06:01:45', '2021-12-20 09:43:15'),
(3, 'arya@gmail.com', '$2y$10$YGHS1ZaQ7F4b8SuIUsf1juOxTaYd02NTmdFE2aXappUW0VNm0qP5u', 'Arya Admaja', '6281253854754', 'Perum Permata Regency Malang', 'default.png', 'public', '2021-12-22 12:38:57', '2021-12-22 12:38:57'),
(4, 'silvia@gmail.com', '$2y$10$5rAcxJrFkV5yDHS4pg7cserSR/s5FS9NMCaS9zTEPAmsxV.Cd/dXC', 'Silvia', '6285785738278', 'Malang', 'default.png', 'public', '2021-12-23 17:24:09', '2021-12-23 17:24:09'),
(9, 'tester@gmail.com', '$2y$10$S1X2duevMglXK6vcoWZT4uO/egkzYOeoA6rSHU3NogRUBpcyiLDsO', 'tester', '6282153234523', 'Malang', 'default.png', 'public', '2022-03-06 05:47:01', '2022-03-06 05:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_classrooms`
--

CREATE TABLE `user_classrooms` (
  `id` int(11) NOT NULL,
  `classrooms_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_classrooms`
--

INSERT INTO `user_classrooms` (`id`, `classrooms_id`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 3, '2022-03-24 10:46:29', '2022-03-24 10:46:29'),
(2, 1, 2, '2022-03-29 06:55:02', '2022-03-29 06:55:02'),
(3, 7, 3, '2022-03-29 06:55:15', '2022-03-29 06:55:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `benefits`
--
ALTER TABLE `benefits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms_id` (`classrooms_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `created_by` (`created_by`);

--
-- Indexes for table `modules`
--
ALTER TABLE `modules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms_id` (`classrooms_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`invoice_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `invoice_id` (`invoice_id`),
  ADD KEY `classrooms_id` (`classrooms_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_classrooms`
--
ALTER TABLE `user_classrooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `classrooms_id` (`classrooms_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `benefits`
--
ALTER TABLE `benefits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `classrooms`
--
ALTER TABLE `classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `modules`
--
ALTER TABLE `modules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_classrooms`
--
ALTER TABLE `user_classrooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `benefits`
--
ALTER TABLE `benefits`
  ADD CONSTRAINT `benefits_ibfk_1` FOREIGN KEY (`classrooms_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `classrooms`
--
ALTER TABLE `classrooms`
  ADD CONSTRAINT `classrooms_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `classrooms_ibfk_2` FOREIGN KEY (`created_by`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `modules`
--
ALTER TABLE `modules`
  ADD CONSTRAINT `modules_ibfk_1` FOREIGN KEY (`classrooms_id`) REFERENCES `classrooms` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`invoice_id`) REFERENCES `orders` (`invoice_id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`classrooms_id`) REFERENCES `classrooms` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `user_classrooms`
--
ALTER TABLE `user_classrooms`
  ADD CONSTRAINT `user_classrooms_ibfk_1` FOREIGN KEY (`classrooms_id`) REFERENCES `classrooms` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_classrooms_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
