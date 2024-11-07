-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2023 at 02:36 AM
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
-- Table structure for table `grace1`
--

CREATE TABLE `grace1` (
  `graceID` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `graceKOTA` varchar(160) COLLATE utf8mb4_general_ci NOT NULL,
  `destinasiKODE` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `fotoFILE` varchar(150) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `grace1`
--

INSERT INTO `grace1` (`graceID`, `graceKOTA`, `destinasiKODE`, `fotoFILE`) VALUES
('Dennis', 'Grogol', 'D107', 'merbabu.jpg'),
('Nathan', 'Pondok Indah', 'D987', 'gunung.jpg'),
('Sultan', 'BSD', 'D107', 'pantai.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `grace1`
--
ALTER TABLE `grace1`
  ADD PRIMARY KEY (`graceID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
