-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2023 at 05:24 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesonajawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `oleholeh`
--

CREATE TABLE `oleholeh` (
  `olehKODE` int NOT NULL,
  `olehNAMA` varchar(160) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `olehJENIS` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `fotoolehFILE` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oleholeh`
--

INSERT INTO `oleholeh` (`olehKODE`, `olehNAMA`, `olehJENIS`, `fotoolehFILE`) VALUES
(343, 'chocomory', 'makanan', 'labuan.jpg'),
(659, 'pempek', 'makanan', 'pempek.jpg'),
(898, 'baso malang', 'makanan', 'barbie.jpg'),
(983, 'es cendol', 'minuman', 'labuan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `oleholeh`
--
ALTER TABLE `oleholeh`
  ADD PRIMARY KEY (`olehKODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
