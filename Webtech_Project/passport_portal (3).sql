-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 20, 2025 at 12:16 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `passport_portal`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_care`
--

CREATE TABLE `customer_care` (
  `issue_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `issue_type` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_care`
--

INSERT INTO `customer_care` (`issue_id`, `user_id`, `full_name`, `email`, `phone`, `issue_type`, `description`, `created_at`) VALUES
(1, 1, 'Fardin', 'fardin.tayeebi.24@gmail.com', '01821503769', 'General', 'How do I apply?', '2025-01-19 17:49:36'),
(2, 1, 'Tayeebi', 'darkk4048@gmail.com', '01919206150', 'General', 'How long does it take to get the passport in hand?', '2025-01-19 17:56:17');

-- --------------------------------------------------------

--
-- Table structure for table `passport_apply`
--

CREATE TABLE `passport_apply` (
  `application_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `passport_type` varchar(255) DEFAULT NULL,
  `personal_info_first_name` varchar(255) DEFAULT NULL,
  `personal_info_last_name` varchar(255) DEFAULT NULL,
  `personal_info_dob` date DEFAULT NULL,
  `personal_info_gender` enum('male','female') DEFAULT NULL,
  `present_address_line1` varchar(255) DEFAULT NULL,
  `present_address_line2` varchar(255) DEFAULT NULL,
  `present_address_city` varchar(255) DEFAULT NULL,
  `present_address_postal_code` varchar(20) DEFAULT NULL,
  `present_address_country` varchar(100) DEFAULT NULL,
  `permanent_address_line1` varchar(255) DEFAULT NULL,
  `permanent_address_line2` varchar(255) DEFAULT NULL,
  `permanent_address_city` varchar(255) DEFAULT NULL,
  `permanent_address_postal_code` varchar(20) DEFAULT NULL,
  `permanent_address_country` varchar(100) DEFAULT NULL,
  `id_document_type` varchar(255) DEFAULT NULL,
  `id_document_number` varchar(255) DEFAULT NULL,
  `parental_info_parent_name` varchar(255) DEFAULT NULL,
  `spouse_info_spouse_name` varchar(255) DEFAULT NULL,
  `passport_options` varchar(100) DEFAULT NULL,
  `delivery_option` varchar(100) DEFAULT NULL,
  `appointment` date DEFAULT NULL,
  `comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `passport_apply`
--

INSERT INTO `passport_apply` (`application_id`, `user_id`, `passport_type`, `personal_info_first_name`, `personal_info_last_name`, `personal_info_dob`, `personal_info_gender`, `present_address_line1`, `present_address_line2`, `present_address_city`, `present_address_postal_code`, `present_address_country`, `permanent_address_line1`, `permanent_address_line2`, `permanent_address_city`, `permanent_address_postal_code`, `permanent_address_country`, `id_document_type`, `id_document_number`, `parental_info_parent_name`, `spouse_info_spouse_name`, `passport_options`, `delivery_option`, `appointment`, `comments`) VALUES
(1664121728, 1, 'Regular', 'shovan', 'roy', '2024-12-31', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', 'Approved', 'Normal', '2025-01-29', NULL),
(1853740496, 1, 'Diplomatic', 'shovan', 'roy', '2024-12-31', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', 'Pending', 'Normal', '2025-01-30', NULL),
(2852819899, 12, 'Regular', 'Fardin', 'Sami', '2024-12-31', 'male', 'sdfs', 'adwefd', 'dfe', 'dafsb', 'dafsgbd', 'dfasdg', 'erqwtge', 'fsgv', 'adsfdvc', 'dasfdv', 'nid', '1', 'sadfgb', '', 'Approved', 'Normal', '2025-01-31', NULL),
(3286907516, 1, 'Official', '', '', '2025-01-02', '', '', '', 'Chowmuhani', '', '', '', '', 'Chowmuhani', '', '', 'nid', '88888888888888', '', 'zxcvbn', 'Approved', 'Normal', '2025-01-31', NULL),
(5161168164, 1, 'Regular', 'shovan', 'roy', '2024-12-29', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-02-06', NULL),
(6061336553, 1, 'Regular', 'shovan', 'roy', '2024-12-29', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-02-06', NULL),
(6454464793, 12, 'Regular', 'Fardin', 'Sami', '2003-12-24', 'male', 'Savar', '', 'Dhaka', '1347', 'Bangladesh', 'Savar', '', 'Dhaka', '1347', 'Bangladesh', 'birth_certificate', '123456', 'Lurfot', '', '10 Years Validity', 'Normal', '2025-01-30', NULL),
(6753048864, 1, 'Regular', 'shovan', 'roy', '2024-12-31', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-01-29', NULL),
(7397973303, 1, 'Regular', 'shovan', 'roy', '2024-12-29', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-02-06', NULL),
(7586249820, 1, 'Regular', 'shovan', 'roy', '2024-12-29', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-02-06', NULL),
(7653458943, 12, 'Diplomatic', 'egrhtfj', 'sdesfrtghj', '2025-01-01', 'male', 'fdg', '', 'dsfgbg', 'dfg', 'fdsg', 'fsgd', '', 'fsgfd', 'dsf', 'fdgdg', 'nid', '23', 'sdf', '', '10 Years Validity', 'Express', '2025-01-31', NULL),
(7836971835, 1, 'Regular', 'shovan', 'roy', '2024-12-05', 'male', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-02-07', NULL),
(8418880103, 1, 'Regular', 'shovan', 'roy', '2025-01-01', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-01-31', NULL),
(8698837693, 1, 'Regular', 'shovan', 'roy', '2025-01-01', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-01-31', NULL),
(8939375273, 1, 'Regular', 'shovan', 'roy', '2024-12-31', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-01-29', NULL),
(9101554809, 1, 'Regular', 'shovan', 'roy', '2024-12-05', 'male', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-02-07', NULL),
(9663418771, 12, 'Regular', 'Fardin', 'Sami', '2024-12-31', 'male', 'sdfs', 'adwefd', 'dfe', 'dafsb', 'dafsgbd', 'dfasdg', 'erqwtge', 'fsgv', 'adsfdvc', 'dasfdv', 'nid', '1', 'sadfgb', '', '10 Years Validity', 'Normal', '2025-01-31', NULL),
(9826952940, 1, 'Diplomatic', 'shovan', 'roy', '2024-12-31', 'male', 'Noakhali - Cumilla Highway', '', 'Chowmuhani', '3821', 'Bangladesh', 'dhaka', '217', 'Chowmuhani', '3821', 'Bangladesh', 'nid', '88888888888888', '098765576879', 'zxcvbn', '10 Years Validity', 'Normal', '2025-01-30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `payment_method` enum('Card','Mobile') NOT NULL,
  `card_number` varchar(20) DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `cvv` varchar(4) DEFAULT NULL,
  `mobile_provider` enum('Bkash','Nagad','Rocket') DEFAULT NULL,
  `mobile_account` varchar(15) DEFAULT NULL,
  `mobile_password` varchar(255) DEFAULT NULL,
  `payable_amount` decimal(10,2) NOT NULL,
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `application_id`, `user_id`, `payment_method`, `card_number`, `expiry_date`, `cvv`, `mobile_provider`, `mobile_account`, `mobile_password`, `payable_amount`, `payment_date`) VALUES
(6, 9663418771, 1, 'Mobile', NULL, NULL, NULL, 'Bkash', '01821503769', '1234', 5000.00, '2025-01-19 22:50:30');

-- --------------------------------------------------------

--
-- Table structure for table `renew_passport`
--

CREATE TABLE `renew_passport` (
  `renew_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `current_passport_number` varchar(100) NOT NULL,
  `expiry_date` date NOT NULL,
  `reason` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `renew_passport`
--

INSERT INTO `renew_passport` (`renew_id`, `user_id`, `current_passport_number`, `expiry_date`, `reason`, `created_at`) VALUES
(1, 1, '123456', '2025-01-18', 'Expired', '2025-01-19 17:44:24'),
(2, 1, '521344', '2024-12-21', 'Expired', '2025-01-19 17:46:15'),
(3, 1, '521344', '2024-12-21', 'Expired', '2025-01-19 17:47:24'),
(4, 1, '565476534231243', '2029-11-21', 'lost', '2025-01-19 17:55:18');

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) NOT NULL,
  `application_id` bigint(20) NOT NULL,
  `status_type` enum('Passport','Payment') NOT NULL,
  `status_value` enum('Pending','Approved','Rejected','Paid','Canceled') NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `application_id`, `status_type`, `status_value`, `updated_at`) VALUES
(1, 1664121728, 'Passport', 'Rejected', '2025-01-19 22:33:04'),
(2, 1664121728, 'Passport', 'Approved', '2025-01-19 22:33:11'),
(3, 1664121728, 'Passport', 'Approved', '2025-01-19 22:33:16'),
(4, 1853740496, 'Passport', 'Rejected', '2025-01-19 22:33:19'),
(5, 1853740496, 'Passport', 'Rejected', '2025-01-19 22:33:24'),
(6, 2852819899, 'Passport', 'Rejected', '2025-01-19 22:33:29'),
(7, 1664121728, 'Passport', 'Approved', '2025-01-19 22:35:13'),
(8, 1853740496, 'Passport', 'Pending', '2025-01-19 22:35:20'),
(9, 2852819899, 'Passport', 'Approved', '2025-01-19 22:35:26'),
(12, 3286907516, 'Passport', 'Approved', '2025-01-19 23:04:14'),
(16, 9663418771, 'Payment', 'Paid', '2025-01-19 23:15:28');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `role` enum('user','admin') DEFAULT 'user',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `name`, `phone`, `role`, `created_at`) VALUES
(1, 'shovanroy404@gmail.com', '$2y$10$uZbmJ8ljUu08xsngpjY1UuCsZF/VP61M5picbK140gILdg2aT1xee', 'shovan', '01533505152', 'user', '2025-01-02 12:47:25'),
(2, 'shovanroy4041@gmail.com', '$2y$10$vBTHEqSxbyMviC7f1Kx6G.zBzWWJ/4kFN8ifU1WpUqU1GzDngTwgm', 'shakir', '01533505152', 'admin', '2025-01-02 13:08:12'),
(4, 'shovanroy40411@gmail.com', '$2y$10$Kvor8kZGQ75yvaiWQauMJevqxeQGxxLdXDYL73I1aQLwF/EHMc5nW', 'shakir', '01533505152', 'user', '2025-01-04 11:50:22'),
(5, 'shovanroy4404@gmail.com', '$2y$10$AYkxf68BG213WpOZkCVqhONUvjSx3SeAChroZl1b8uneSM9DLdL/.', 'roy', '01533505152', 'admin', '2025-01-04 16:36:32'),
(9, 'Rghtyt@111gfh.com', '$2y$10$OCognCEJot4HL.7H76.VLOu7eoc8oyvikdy29sUb0wAxXk31Xs9HO', 'RoyRo', '01533505152', 'admin', '2025-01-05 13:23:41'),
(10, 'Rghtyt@55gfh.com', '$2y$10$Mae2uWVEPRCtMDbJcaAAEO4248diJa5CHem.qN.znszhEm4XSOscS', 'RoyRo', '01533505152', 'user', '2025-01-16 15:21:47'),
(11, 'abc@gmail.com', '$2y$10$6vraS9IAuWHnnVUmgtl37uB5DdQkdZKzwRM/GfqnrRjrlYV6DWlTy', 'abc', '01786336429', 'admin', '2025-01-19 14:38:09'),
(12, 'fardin.tayeebi.24@gmail.com', '$2y$10$VYchYNqoiJWIOcl9XT/YZODwuAE.omQpNHqstME.QbJ3Tvnr7dGlK', 'sami', '01821503769', 'user', '2025-01-19 15:16:29'),
(13, 'darkk4048@gmail.com', '$2y$10$./2tDFmo5IYHxxDff7GCzuc8toBxiAoVVF1QueEgOZVUuozIDfSru', 'Tayeebi', '01919206150', 'admin', '2025-01-19 15:40:30'),
(14, 'admin@gmail.com', '$2y$10$aNoi8Zq3rIVn4mT2i5ehmu0vC1enk0iy2VwuQfmcWZpUraH.MSoFG', 'admin', '01634503769', 'admin', '2025-01-19 19:55:10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_care`
--
ALTER TABLE `customer_care`
  ADD PRIMARY KEY (`issue_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `passport_apply`
--
ALTER TABLE `passport_apply`
  ADD PRIMARY KEY (`application_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `fk_payment_application` (`application_id`),
  ADD KEY `fk_payment_user` (`user_id`);

--
-- Indexes for table `renew_passport`
--
ALTER TABLE `renew_passport`
  ADD PRIMARY KEY (`renew_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`),
  ADD KEY `application_id` (`application_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer_care`
--
ALTER TABLE `customer_care`
  MODIFY `issue_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `renew_passport`
--
ALTER TABLE `renew_passport`
  MODIFY `renew_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_care`
--
ALTER TABLE `customer_care`
  ADD CONSTRAINT `customer_care_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `passport_apply`
--
ALTER TABLE `passport_apply`
  ADD CONSTRAINT `passport_apply_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `fk_payment_application` FOREIGN KEY (`application_id`) REFERENCES `passport_apply` (`application_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_payment_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `renew_passport`
--
ALTER TABLE `renew_passport`
  ADD CONSTRAINT `renew_passport_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `status`
--
ALTER TABLE `status`
  ADD CONSTRAINT `status_ibfk_1` FOREIGN KEY (`application_id`) REFERENCES `passport_apply` (`application_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
