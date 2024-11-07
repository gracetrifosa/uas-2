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
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `nama` varchar(150) COLLATE utf8mb4_general_ci NOT NULL,
  `namaresto` varchar(160) COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal` date NOT NULL,
  `waktu` time NOT NULL,
  `fotoFILE` varchar(120) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`nama`, `namaresto`, `tanggal`, `waktu`, `fotoFILE`) VALUES
('Dennis', 'Union', '2023-09-12', '12:00:00', 'barbie.jpg'),
('Gabby', 'Alba', '2023-12-12', '11:00:00', 'barbie.jpg'),
('Hana', 'Cold Moo', '2023-03-22', '19:00:00', 'barbie.jpg'),
('Lauren', 'Sofia at The Gunawarman', '2023-05-07', '16:00:00', 'barbie.jpg'),
('Nathan', 'Monsieur Spoon', '2023-09-12', '19:00:00', 'pempek.jpg'),
('Tiara', 'Osteria Gia', '2023-09-21', '17:00:00', 'pempek.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`nama`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
