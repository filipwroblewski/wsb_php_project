-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 07, 2023 at 05:31 PM
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
(43, 3, 2, '2023-01-07 13:59:50', 'placed'),
(44, 15, 2, '2023-01-07 17:09:29', 'placed'),
(45, 16, 8, '2023-01-07 17:09:29', 'collected'),
(46, 13, 3, '2023-01-07 17:11:27', 'placed'),
(47, 13, 3, '2023-01-07 17:12:27', 'sent'),
(48, 14, 2, '2023-01-07 17:12:27', 'placed'),
(49, 13, 1, '2023-01-07 17:27:48', 'placed'),
(50, 15, 1, '2023-01-07 17:28:55', 'placed'),
(51, 16, 27, '2023-01-07 17:29:45', 'placed');

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
(30, 'user1@wp.pl', 939.06, '2023-01-07 17:09:29'),
(31, 'user1@wp.pl', 56.97, '2023-01-07 17:11:27'),
(32, 'user2@wp.pl', 126.75, '2023-01-07 17:12:27'),
(33, 'user1@wp.pl', 18.99, '2023-01-07 17:27:48'),
(34, 'user1@wp.pl', 78.97, '2023-01-07 17:28:55'),
(35, 'user1@wp.pl', 2636.28, '2023-01-07 17:29:45');

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
(13, 'Ficus elastica Belize', '18.99', 'Fikus sprężysty', 34),
(14, 'Philodendron gloriosum', '34.89', 'Duże zielone liście', 13),
(15, 'Philodendron White Knight', '78.97', 'Biały rycerz', 15),
(16, 'Rhaphidophora decursiva', '97.64', 'Ładne zielone listki', 0);

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
(25, 'admin', 'admin', 'admin@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$dHNBZmJDMlRlNWI2ZmNiOQ$03ItbeKwizWDlm0EXIPvzD+G7gT2P2OISZcEKd4v2pQ'),
(26, 'employee', 'employee', 'employee@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$VG96ZVNFUFFONml2U0ZTMA$r2Urm45pYwVZgxR8peKS43MLrtzOkxKPV59hSKzrtoc'),
(28, 'user1', 'user', 'user1@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$M1Zad3dnOWYzUThycWVVcQ$DgTnAMXwWXHt+ShPokxXwPM646L9iDYbMJDFYM6GwsY'),
(29, 'user2', 'user', 'user2@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$QW54RlhXRUpDOFJ0RUtuLw$n4TjWkYe6Hv3JgunOcnCRx4wCBvZPJ0vOW8hHSiTB3o');

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `seedlings`
--
ALTER TABLE `seedlings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
