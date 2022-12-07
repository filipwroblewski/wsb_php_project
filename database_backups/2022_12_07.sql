-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 08:17 PM
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
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`) VALUES
(1, 'Bob', 'bob@wp.pl', '123'),
(2, 'a', 'a@wp.pl', 'a'),
(3, 'b', 'b@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$dU5tTkl1ZDZ6QXdKVzhlRA$5FXg1HjbnH0Tc+YhZF/v48b0JrotAKMa0CkyIYY1/Ik'),
(4, 'c', 'c@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$YlltdE1lYjRncG5FTVFjcw$VDIWYIKqSawbVRk31rFUrlOb30jALMpXcrRwrlRpVOQ'),
(5, 'd', 'd@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$VUh2UVpKa2p5ZEZtV0J3Tg$gp/FEe1GRYCS4e/UKNptIKcN6IRIBEWz+Tb5p4cDImA'),
(6, 'd', 'd@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$WDh3U2dNQ2xVN3hhVEgyYg$44SCOi1nL07HN5zLivDpi1o+so+HP1YnTC9jq3cRUIA');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
