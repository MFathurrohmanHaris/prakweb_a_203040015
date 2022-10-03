-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2022 at 08:36 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prakweb_a_203040015_pw`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(11) NOT NULL,
  `buku_judul` varchar(80) NOT NULL,
  `buku_jenis` varchar(50) NOT NULL,
  `buku_penulis` varchar(50) NOT NULL,
  `buku_tahun_terbit` varchar(50) NOT NULL,
  `buku_gambar` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`buku_id`, `buku_judul`, `buku_jenis`, `buku_penulis`, `buku_tahun_terbit`, `buku_gambar`) VALUES
(1, 'Si Anak Kuat', 'Novel', 'Tere Liye', '2018', 'buku1_siAnakKuat.jpg'),
(2, 'Pulang', 'Novel', 'Tere Liye', '2021', 'buku2_pulang.jpeg'),
(3, 'Si Anak Pintar', 'Novel', 'Tere Liye', '2018', 'buku3_siAnakPintar.jpg'),
(4, 'Si Anak Cahaya', 'Novel', 'Tere Liye', '2018', 'buku4_siAnakCahaya.jpg'),
(5, 'Si Anak Pemberani', 'Novel', 'Tere Liye', '2018', 'buku5_siAnakPemberani.jpg'),
(6, 'Hujan', 'Novel', 'Tere Liye', '2022', 'buku6_hujan.jpg'),
(7, 'Si Anak Spesial', 'Novel', 'Tere Liye', '2018', 'buku7_siAnakSpesial.jpg'),
(8, 'Bumi', 'Novel', 'Tere Liye', '2022', 'buku8_bumi.jpg'),
(9, 'Matahari', 'Novel', 'Tere Liye', '2022', 'buku9_matahari.jpg'),
(10, 'Bulan', 'Novel', 'Tere Liye', '2022', 'buku10_bulan.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
