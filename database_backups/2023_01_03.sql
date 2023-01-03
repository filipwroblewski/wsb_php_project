-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 03, 2023 at 06:41 PM
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
(4, 'Sadzonka nr 4', '1.57', NULL, 13);

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
(2, 'a', 'user', 'a@wp.pl', 'a'),
(3, 'b', 'employee', 'b@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$dU5tTkl1ZDZ6QXdKVzhlRA$5FXg1HjbnH0Tc+YhZF/v48b0JrotAKMa0CkyIYY1/Ik'),
(13, 'aa', 'user', 'aa@a.com', '$argon2id$v=19$m=65536,t=4,p=1$MWszczZiL2ZxMi5JVUlFTA$29NPmDUgXQUIkrp8Z3MXtIrkpvD9SyBgbX5/xAj0PdE'),
(14, 'asd', 'user', 'asd@asd.com', '$argon2id$v=19$m=65536,t=4,p=1$YjZiekczTmVjN3JGTFZvcg$ZxSj0MG7os14ndJ6XBGqJpA6Wpq9W/sCbw+KngjoeGk'),
(15, 'bb', 'user', 'bb@bb.com', '$argon2id$v=19$m=65536,t=4,p=1$cHFJd3NZM0o4WEhIVnVwLg$d34kukkOC7OYtkZG04zwv8UWav5OHX6JXtkWw7uD9nM');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `seedlings`
--
ALTER TABLE `seedlings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
