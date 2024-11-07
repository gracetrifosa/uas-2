-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 05, 2023 at 06:20 AM
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
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `destinasiKET` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `destinasiFOTO` varchar(120) NOT NULL,
  `kategoriKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `destinasiKET`, `destinasiFOTO`, `kategoriKODE`) VALUES
('D103', 'Embung Sriten', 'Embung Sriten merupakan salah satu embung buatan yang tertinggi di Gunungkidul dengan ketinggian sekitar 859 meter di atas permukaan laut, kabarnya juga merupakan embung tertinggi di wilayah Jawa Tengah dan Yogyakarta.', 'pantai.jpg\r\n', 'K001'),
('D107', 'Pantai Dadap', 'Pantai Dadap juga punya ceruk karang yang bisa Anda kunjungi. Ceruk-ceruk ini akan memberikan nuansa yang lebih sejuk di pantai yang cuacanya sedang panas. Jika Anda ingin beristirahat sejenak, luangkan waktu untuk duduk dan menikmati pemandangan di sana.', 'rajaampat.jpg', 'K101'),
('D987', 'Pantai Dreamland', 'Pantai Dreamland adalah sebuah tempat pariwisata yang terletak di sebelah selatan Bali di daerah bernama Pecatu. Pantai Dreamland dikelilingi oleh tebing-tebing yang menjulang tinggi, dan dikelilingi batu karang yang lumayan besar di sekitar pantai. Lokasi pantai ini berada dalam kompleks Bali Pecatu Graha.', 'maldives.jpg', 'K898'),
('T543', 'Pantai Kuta', 'Pantai Kuta adalah sebuah tempat pariwisata yang terletak di kecamatan Kuta sebelah selatan Kota Denpasar, Bali, Indonesia. Pantai Kuta terkenal memiliki ombak yang bagus untuk olahraga selancar (surfing),terutama bagi peselancar pemula.', 'pantai2.jpg', 'K100'),
('T987', 'Pantai Siung', 'Pantai Siung di kawasan Gunungkidul. Pantai ini begitu spesial karena lanskapnya yang dikelilingi oleh tebing-tebing tinggi. Pantai Siung berlokasi di Dusun Duwet, Desa Purwodadi, Kecamatan Tepus, Kabupaten Gunungkidul, Daerah Istimewa Yogyakarta. ', 'siung.jpg', 'K898');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
