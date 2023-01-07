-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 01:07 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oto_sadzonki`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `seedling_id` int(10) UNSIGNED NOT NULL,
  `order_quantity` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `seedling_id`, `order_quantity`, `created_at`, `status`) VALUES
(7, 9, 3, '2023-01-06 22:09:34', 'sent'),
(8, 2, 3, '2023-01-06 22:10:07', 'sent'),
(9, 3, 4, '2023-01-06 22:10:07', 'placed'),
(10, 8, 4, '2023-01-07 10:09:07', 'placed'),
(11, 8, 4, '2023-01-07 10:19:25', 'placed'),
(12, 2, 3, '2023-01-07 10:19:42', 'placed'),
(13, 2, 3, '2023-01-07 10:20:56', 'placed'),
(14, 2, 3, '2023-01-07 10:23:29', 'placed'),
(15, 2, 3, '2023-01-07 10:23:56', 'placed'),
(16, 2, 3, '2023-01-07 10:28:01', 'placed'),
(17, 9, 3, '2023-01-07 10:28:15', 'sent'),
(18, 8, 2, '2023-01-07 10:31:18', 'placed'),
(19, 8, 2, '2023-01-07 10:31:27', 'placed'),
(20, 8, 2, '2023-01-07 10:31:51', 'placed'),
(21, 8, 2, '2023-01-07 10:32:16', 'placed'),
(22, 8, 2, '2023-01-07 10:34:25', 'placed'),
(23, 8, 2, '2023-01-07 10:35:07', 'placed'),
(24, 8, 2, '2023-01-07 10:35:50', 'placed'),
(25, 8, 2, '2023-01-07 10:37:27', 'placed'),
(26, 8, 2, '2023-01-07 10:37:49', 'placed'),
(27, 8, 2, '2023-01-07 10:38:13', 'placed'),
(28, 8, 2, '2023-01-07 11:26:33', 'placed'),
(29, 9, 3, '2023-01-07 11:30:33', 'placed'),
(30, 10, 4, '2023-01-07 11:30:33', 'sent'),
(31, 9, 4, '2023-01-07 12:10:18', 'placed'),
(32, 3, 3, '2023-01-07 12:18:36', 'placed'),
(33, 4, 4, '2023-01-07 12:19:00', 'placed'),
(34, 4, 2, '2023-01-07 12:21:49', 'placed'),
(35, 9, 2, '2023-01-07 12:24:19', 'placed'),
(36, 4, 3, '2023-01-07 12:51:04', 'placed'),
(37, 8, 3, '2023-01-07 12:51:04', 'placed'),
(38, 9, 0, '2023-01-07 12:52:43', 'placed'),
(39, 2, 2, '2023-01-07 12:54:15', 'placed'),
(40, 3, 3, '2023-01-07 12:57:39', 'placed'),
(41, 9, 2, '2023-01-07 12:58:20', 'placed'),
(42, 3, 4, '2023-01-07 13:04:55', 'placed');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(10) UNSIGNED NOT NULL,
  `user` varchar(255) NOT NULL,
  `full_price` float NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `user`, `full_price`, `created_at`) VALUES
(1, 'c@wp.pl', 3, '2023-01-07 10:20:56'),
(2, 'c@wp.pl', 3, '2023-01-07 10:23:29'),
(4, 'c@wp.pl', 3, '2023-01-07 10:28:01'),
(5, 'a@wp.pl', 12, '2023-01-07 10:28:15'),
(6, 'c@wp.pl', 222, '2023-01-07 10:31:18'),
(7, 'c@wp.pl', 222, '2023-01-07 10:31:27'),
(8, 'c@wp.pl', 222, '2023-01-07 10:31:51'),
(9, 'c@wp.pl', 222, '2023-01-07 10:32:16'),
(10, 'c@wp.pl', 222, '2023-01-07 10:34:25'),
(11, 'c@wp.pl', 222, '2023-01-07 10:35:07'),
(12, 'c@wp.pl', 222, '2023-01-07 10:35:50'),
(13, 'c@wp.pl', 222, '2023-01-07 10:37:27'),
(14, 'c@wp.pl', 222, '2023-01-07 10:37:49'),
(15, 'c@wp.pl', 222, '2023-01-07 10:38:13'),
(16, 'c@wp.pl', 222, '2023-01-07 11:26:33'),
(17, 'c@wp.pl', 24, '2023-01-07 11:30:33'),
(18, 'c@wp.pl', 16, '2023-01-07 12:10:18'),
(19, 'c@wp.pl', 21.96, '2023-01-07 12:18:36'),
(20, 'c@wp.pl', 6.28, '2023-01-07 12:19:00'),
(21, 'c@wp.pl', 3.14, '2023-01-07 12:21:49'),
(22, 'c@wp.pl', 8, '2023-01-07 12:24:19'),
(23, 'c@wp.pl', 337.71, '2023-01-07 12:51:04'),
(24, 'c@wp.pl', 4.71, '2023-01-07 12:52:43'),
(25, 'c@wp.pl', 2, '2023-01-07 12:54:15'),
(26, 'c@wp.pl', 21.96, '2023-01-07 12:57:39'),
(27, 'c@wp.pl', 8, '2023-01-07 12:58:20'),
(28, 'c@wp.pl', 29.28, '2023-01-07 13:04:55');

-- --------------------------------------------------------

--
-- Table structure for table `seedlings`
--

CREATE TABLE `seedlings` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  `quantity` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `seedlings`
--

INSERT INTO `seedlings` (`id`, `name`, `price`, `description`, `quantity`) VALUES
(1, 'Sadzonka nr 1', '2.00', 'Zwyczajna sadzonka nr 1', 15),
(2, 'Sadzonka nr 2', '1.00', NULL, 3),
(3, 'Sadzonka nr 3', '7.32', 'Nadzwyczajna sadzonka nr 3', 5),
(4, 'Sadzonka nr 4', '1.57', NULL, 13),
(8, 'aaaa', '111.00', 'aaa', 111),
(9, '4', '4.00', '4', 4),
(10, '3', '3.00', '3', 34);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `role` set('user','admin','employee') NOT NULL DEFAULT 'user',
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `role`, `email`, `pass`) VALUES
(1, 'Bob', 'user', 'bob@wp.pl', '123'),
(3, 'b', 'admin', 'b@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$dU5tTkl1ZDZ6QXdKVzhlRA$5FXg1HjbnH0Tc+YhZF/v48b0JrotAKMa0CkyIYY1/Ik'),
(13, 'aa', 'user', 'aa@a.com', '$argon2id$v=19$m=65536,t=4,p=1$MWszczZiL2ZxMi5JVUlFTA$29NPmDUgXQUIkrp8Z3MXtIrkpvD9SyBgbX5/xAj0PdE'),
(14, 'asd', 'user', 'asd@asd.com', '$argon2id$v=19$m=65536,t=4,p=1$YjZiekczTmVjN3JGTFZvcg$ZxSj0MG7os14ndJ6XBGqJpA6Wpq9W/sCbw+KngjoeGk'),
(15, 'bhb', 'user', 'bab@bb.com', '$argon2id$v=19$m=65536,t=4,p=1$cHFJd3NZM0o4WEhIVnVwLg$d34kukkOC7OYtkZG04zwv8UWav5OHX6JXtkWw7uD9nM'),
(21, 'a', 'employee', 'a@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$RnBKeFAvbFRETVZjN1V1Sg$NSmTLkGayqAP1R410oCW8xG4e/SEfQAg8EssbHhlLHo'),
(22, 'c', 'user', 'c@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$UXNleWZLQXdnNlQ2M1lVeQ$zf0v2ahq/q62q1T/qe7ru7fNd0Q0XggXmN9zzmSVZXE');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `seedling_id` (`seedling_id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seedlings`
--
ALTER TABLE `seedlings`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `seedlings`
--
ALTER TABLE `seedlings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
