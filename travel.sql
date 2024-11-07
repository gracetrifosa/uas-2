-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2023 at 05:25 PM
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
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `nama` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `alamat` varchar(160) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `destinasi` varchar(120) COLLATE utf8mb4_general_ci NOT NULL,
  `namaresto` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `fotoFILE` varchar(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`nama`, `alamat`, `tanggal`, `destinasi`, `namaresto`, `fotoFILE`) VALUES
('Galaxy Travel Center', 'Palembang', '2023-02-02', 'Pantai Anyer', 'Sofia at The Gunawarman', ''),
('Golden Travel', 'Makasar', '2023-04-30', 'Bali', 'Alba', ''),
('Horizon Travel', 'Grogol', '2023-07-07', 'Pulau Komodo', 'Monsieur Spoon', ''),
('Space Travel', 'Kebayoran Lama', '2023-02-08', 'Pulau Seribu', 'Osteria Gia', ''),
('Travel Gold', 'Karawang', '2021-02-08', 'Jakarta', 'Cold Moo', ''),
('Travel Star', 'Padang', '2023-09-09', 'Lampung', 'Union', ''),
('Xtravel', 'Palembang', '2023-12-12', 'Danau Toba', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
