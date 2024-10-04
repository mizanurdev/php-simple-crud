-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 09:56 PM
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
-- Database: `php_simple_crud`
--

-- --------------------------------------------------------

--
-- Table structure for table `admissions`
--

CREATE TABLE `admissions` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `courseChoice` text DEFAULT NULL,
  `courseFee` decimal(10,2) DEFAULT NULL,
  `socialUrl` varchar(255) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `gender` enum('male','female','other') DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `ip` varchar(50) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `certificates` text DEFAULT NULL,
  `description` longtext DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admissions`
--

INSERT INTO `admissions` (`id`, `fullname`, `username`, `email`, `phone`, `password`, `courseChoice`, `courseFee`, `socialUrl`, `city`, `gender`, `dob`, `ip`, `image`, `certificates`, `description`, `created_at`, `updated_at`) VALUES
(11, 'Md. Mizanur Rahman', 'mizan', 'mizancse2018@gmail.com', '01521422807', '$2y$10$DqKiJW/llvnUdV3wbjEw4.kjVQWBvdUWDNVjASFzY5dcbWXT/8PmC', 'HTML,CSS,JS,PHP', 20000.00, 'https://www.linkedin.com/in/mizancse2018/', 'Dhaka', 'male', '1999-09-05', '7104', 'assets/images/uploads/mizan_300x300.jpg', 'assets/images/uploads/Md. Mizanur Rahman-php laravel fundamentals 1-C13615.pdf', 'I am a Computer Science Engineer with a Bachelor of Science from Stamford University, Bangladesh. As a full-stack web developer, I specialize in both front-end and back-end development. My skills allow me to create dynamic and interactive web applications.', '2024-06-03 19:18:52', '2024-06-03 19:18:52');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admissions`
--
ALTER TABLE `admissions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admissions`
--
ALTER TABLE `admissions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
