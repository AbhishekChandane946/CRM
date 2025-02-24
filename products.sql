-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 24, 2025 at 08:38 PM
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
-- Database: `products_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` enum('B2B','B2C') NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `type`, `price`, `description`, `created_at`) VALUES
(2, 'Product 2', 'B2C', 150.00, 'This is a sample product description 2', '2025-02-24 17:59:29'),
(3, 'Product 3', 'B2B', 200.00, 'This is a sample product description 3', '2025-02-24 17:59:29'),
(4, 'Product 4', 'B2C', 250.00, 'This is a sample product description 4', '2025-02-24 17:59:29'),
(5, 'Product 5', 'B2B', 300.00, 'This is a sample product description 5', '2025-02-24 17:59:29'),
(6, 'Product 6', 'B2C', 350.00, 'This is a sample product description 6', '2025-02-24 17:59:29'),
(16, 'Test', 'B2B', 11.00, 'Test Descr', '2025-02-24 19:27:06'),
(17, 'DDDD', 'B2B', 1111.00, 'DDDD', '2025-02-24 19:31:13'),
(18, 'CCCCCCCCCC', 'B2C', 11.00, 'CCCCCCCCCC', '2025-02-24 19:35:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
