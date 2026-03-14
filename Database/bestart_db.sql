-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2026 at 10:14 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bestart_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `package_name`, `price`, `created_at`) VALUES
(1, 10, 'Minimal Grey Living Room', 45000, '2026-03-07 07:46:24'),
(16, 2, 'Luxury Wooden Interior', 72000, '2026-03-07 09:27:04'),
(17, 2, 'Luxury Wooden Interior', 72000, '2026-03-07 09:49:29'),
(18, 2, 'Marble Wall Master Suite', 145000, '2026-03-07 11:41:36'),
(19, 10, 'Luxury Hall Setup', 78000, '2026-03-07 11:44:10');

-- --------------------------------------------------------

--
-- Table structure for table `consultations`
--

CREATE TABLE `consultations` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultations`
--

INSERT INTO `consultations` (`id`, `name`, `email`, `phone`, `city`, `message`, `created_at`) VALUES
(1, 'Harman Harmanpreet Singh', 'pharmanjot786@gmail.com', '09592290249', 'Phillaur', 'Hlo\r\n', '2026-03-06 17:49:50');

-- --------------------------------------------------------

--
-- Table structure for table `contact_messages`
--

CREATE TABLE `contact_messages` (
  `id` int(11) NOT NULL,
  `full_name` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `message` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact_messages`
--

INSERT INTO `contact_messages` (`id`, `full_name`, `email`, `phone`, `message`, `created_at`) VALUES
(2, 'Harman', 'pharman909@gmail.com', '09592290249', 'This is very beautiful website and i have many benefites from this. ', '2026-03-07 12:01:09'),
(3, 'Harman', 'pharman909@gmail.com', '09592290249', 'Excellent Work ', '2026-03-07 13:03:48');

-- --------------------------------------------------------

--
-- Table structure for table `custom_requests`
--

CREATE TABLE `custom_requests` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `service` varchar(100) DEFAULT NULL,
  `details` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `custom_requests`
--

INSERT INTO `custom_requests` (`id`, `name`, `email`, `phone`, `service`, `details`, `created_at`) VALUES
(1, 'Harman', 'pharmanjot786@gmail.com', '9592290249', 'Wardrobe Design', 'Urgent', '2026-03-06 17:11:34'),
(2, 'Harman', 'pharmanjot786@gmail.com', '9592290249', 'Kitchen Upgrade', 'Good', '2026-03-06 17:48:02');

-- --------------------------------------------------------

--
-- Table structure for table `get`
--

CREATE TABLE `get` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `whatsapp_updates` tinyint(1) DEFAULT 0,
  `selected_design` varchar(150) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `homequote`
--

CREATE TABLE `homequote` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `whatsapp` varchar(10) DEFAULT NULL,
  `bhk` varchar(10) DEFAULT NULL,
  `size` varchar(20) DEFAULT NULL,
  `package` varchar(50) DEFAULT NULL,
  `living` int(11) DEFAULT NULL,
  `kitchen` int(11) DEFAULT NULL,
  `bedroom` int(11) DEFAULT NULL,
  `bathroom` int(11) DEFAULT NULL,
  `dining` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `homequote`
--

INSERT INTO `homequote` (`id`, `user_id`, `name`, `email`, `phone`, `city`, `whatsapp`, `bhk`, `size`, `package`, `living`, `kitchen`, `bedroom`, `bathroom`, `dining`, `created_at`, `status`) VALUES
(10, 2, 'Harmanpreet', 'pharman909@gmail.com', '9592290249', 'Ludhiana', 'yes', '2', 'Small', '', 1, 1, 3, 1, 1, '2026-03-07 15:53:54', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `layoutquote`
--

CREATE TABLE `layoutquote` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(100) NOT NULL,
  `whatsapp` varchar(10) DEFAULT NULL,
  `layout` varchar(20) NOT NULL,
  `package` varchar(100) DEFAULT NULL,
  `measurement_a` int(11) DEFAULT NULL,
  `measurement_b` int(11) DEFAULT NULL,
  `measurement_c` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `layoutquote`
--

INSERT INTO `layoutquote` (`id`, `user_id`, `name`, `email`, `phone`, `city`, `whatsapp`, `layout`, `package`, `measurement_a`, `measurement_b`, `measurement_c`, `created_at`, `status`) VALUES
(2, 2, 'Harman', 'pharman909@gmail.com', '9592290249', 'Gurgaon', 'yes', 'STRAIGHT', 'No package selected (STRAIGHT layout)', 4, NULL, NULL, '2026-03-05 20:20:55', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `quotes`
--

CREATE TABLE `quotes` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `city` varchar(50) NOT NULL,
  `package` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(120) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) DEFAULT 'user',
  `photo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `email`, `password`, `role`, `photo`, `created_at`) VALUES
(2, 'Harman', 'user@gmail.com', '$2y$10$93kqlAS4Bhb9r3ofQxI4Oeow7Amrhbd1NKlfMA0jULEmqG5zp.RHe', 'user', NULL, '2026-03-05 17:43:31'),
(5, 'Bestart', 'admin@gmail.com', '$2y$10$qV2RzReyZvQ6enbK/y5CyuSEbIJPh4QfUbGVMMySelvpsNtDxHVii', 'admin', NULL, '2026-03-05 18:01:51'),
(10, 'Gagan', 'gagan@gmail.com', '$2y$10$L8HG5c2tj0KzA1UgCMUwTOyEBjR33HSUJi0jatH4PK5ZgfafdP2pK', 'user', 'uploads/1772796349_user4.png', '2026-03-06 11:25:49');

-- --------------------------------------------------------

--
-- Table structure for table `user_designs`
--

CREATE TABLE `user_designs` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `package_name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_designs`
--

INSERT INTO `user_designs` (`id`, `user_id`, `package_name`, `price`, `created_at`) VALUES
(2, 2, 'Marble Wall Master Suite', 145000, '2026-03-07 11:41:37'),
(3, 10, 'Luxury Hall Setup', 78000, '2026-03-07 11:44:11');

-- --------------------------------------------------------

--
-- Table structure for table `wardrobe_quotes`
--

CREATE TABLE `wardrobe_quotes` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `height` varchar(20) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `finish` varchar(50) DEFAULT NULL,
  `material` varchar(50) DEFAULT NULL,
  `accessories` text DEFAULT NULL,
  `require_time` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wardrobe_quotes`
--

INSERT INTO `wardrobe_quotes` (`id`, `user_id`, `name`, `email`, `phone`, `city`, `height`, `type`, `finish`, `material`, `accessories`, `require_time`, `created_at`, `status`) VALUES
(1, 2, 'Harman', 'pharman909@gmail.com', '9592290249', 'Ludhiana', '6', 'Swing', 'Glass', 'HDF', '', 'After 6 months', '2026-03-07 15:24:58', 'approved'),
(2, 10, 'Harmanpreet', 'pharman909@gmail.com', '9592290249', 'Ludhiana', '6', 'Swing', 'Glass', 'HDF', '', 'After 6 months', '2026-03-08 08:14:39', 'approved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consultations`
--
ALTER TABLE `consultations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact_messages`
--
ALTER TABLE `contact_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `custom_requests`
--
ALTER TABLE `custom_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `get`
--
ALTER TABLE `get`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `homequote`
--
ALTER TABLE `homequote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `layoutquote`
--
ALTER TABLE `layoutquote`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `quotes`
--
ALTER TABLE `quotes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `user_designs`
--
ALTER TABLE `user_designs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wardrobe_quotes`
--
ALTER TABLE `wardrobe_quotes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `consultations`
--
ALTER TABLE `consultations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_messages`
--
ALTER TABLE `contact_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `custom_requests`
--
ALTER TABLE `custom_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `get`
--
ALTER TABLE `get`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `homequote`
--
ALTER TABLE `homequote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `layoutquote`
--
ALTER TABLE `layoutquote`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `quotes`
--
ALTER TABLE `quotes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user_designs`
--
ALTER TABLE `user_designs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `wardrobe_quotes`
--
ALTER TABLE `wardrobe_quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
