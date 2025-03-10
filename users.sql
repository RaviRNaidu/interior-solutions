-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2025 at 05:34 AM
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
-- Database: `interior_solutions`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `otp` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `otp`) VALUES
(1, 'Ravi R', 'rarrvr66@gmail.com', '$2y$10$InZsdLkCt7bR8My22GDdeeruiajXcnkNn1Egflkm3R1YVwlsTScHm', '2025-01-10 02:19:57', 0),
(2, 'tejas', 'ttjs@gmail.com', '$2y$10$C68ZW.453indLPY9CtDj4eATyTRUwpcQrnvx.TdbSjMe5FjoeFmIm', '2025-01-10 03:53:59', 0),
(3, 'krishna', 'krishna123@gmail.com', '$2y$10$4YKgdUW.v.5zx6ZUutXgKOhQaEso2mLlAxUKcZKGzNSezjxNPQg.K', '2025-01-14 02:58:37', 0),
(4, 'ravir', 'rar6@gmail.com', '$2y$10$tEPpSLreex9ZUkksGbwjHudjRkSs0E3/WzeceaMUEwFHhXffrVzCe', '2025-01-14 03:39:44', 0),
(5, 'pursha', 'pursha@gmail.com', '$2y$10$WsBU2.dYNzq/d4vHSKM0S.ZGYi20f5aIYDZ2Uu6/XSC5xMekGn5N.', '2025-01-14 05:35:01', 0),
(6, 'suraj', 'suraj123@gmail.com', '$2y$10$s0qxOFVPwhmpIszZKkHMXurS8EAHEWw7Jdmyk4J1VNBuAEUL.u1XC', '2025-01-16 20:32:46', 0),
(7, 'sanathan', 'sanathan@gmail.com', '$2y$10$/398Jy0/0rkMDXd3UddGauEU8D5k1659Kfmube3K2WHtC/EXF.wxq', '2025-01-17 19:08:44', 0),
(8, 'anirudh s rso', 'anirudh30082006@gmail.com', '$2y$10$R9hh6EPNFD8x82w4Btegf.3V/4F6sYmmENFUupCNw4LMOUyNBktvG', '2025-01-22 00:19:14', 0);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
