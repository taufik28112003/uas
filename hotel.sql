-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 07:45 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fasilitas` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fasilitas`, `id_kamar`, `fasilitas`) VALUES
(1, 8, 'Kamar Mandi di Dalam\r\nFull AC\r\nKolam Renang'),
(3, 0, 'ac,sauna\r\n\r\n\r\n'),
(4, 11, 'BATHUP\r\n'),
(5, 10, 'Kolam Renang\r\n\r\n'),
(6, 14, 'SAUNA,AC');

-- --------------------------------------------------------

--
-- Table structure for table `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `keterangan`, `foto`) VALUES
(1, 'Kolam renang', '398-823c97c0d94e6b570a893e38e23c962e_crop_920x530.jpg'),
(2, 'Tempat Tidur', '448-5f081b41cc76c.jpeg'),
(5, 'Lobi', '417-Rayaburi_Hotel_Patong_-_Lobby.jpg'),
(6, 'Tempat Makan', '295-fairmont.jpg'),
(7, 'Gedung Hotel', '313-27677-hotel-tertinggi-di-dunia.jpg'),
(8, 'Resepsionis', '693-Resepsionis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `no_kamar` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `tipe_kamar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `no_kamar`, `foto`, `tipe_kamar`) VALUES
(1, '001', '372-HI556746387.jpg', 'VVIP'),
(2, '002', '675-377-5f081b41cc76c.jpeg', 'VVIP'),
(3, '003', '195-90-512-Desain Hotel Mewah Minimalis.jpg', 'VVIP'),
(4, '004', '574-134-281-fairmont.jpg', 'SUPERVISOR'),
(5, '005', '477-748-625-60c6.jpg', 'VVIP'),
(6, '006', '980-870-281-fairmont.jpg', 'SUPERVISOR'),
(7, '007', '470-417-Rayaburi_Hotel_Patong_-_Lobby.jpg', 'superior'),
(8, '008', '372-184-281-fairmont.jpg', 'VVIP');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `cek_in` varchar(255) DEFAULT NULL,
  `cek_out` varchar(255) DEFAULT NULL,
  `jml_kamar` varchar(255) DEFAULT NULL,
  `nama_pemesan` varchar(255) DEFAULT NULL,
  `email_pemesan` varchar(255) DEFAULT NULL,
  `hp_pemesan` varchar(255) DEFAULT NULL,
  `nama_tamu` varchar(255) DEFAULT NULL,
  `id_kamar` int(11) DEFAULT NULL,
  `FOTO` varchar(255) DEFAULT NULL,
  `status` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `cek_in`, `cek_out`, `jml_kamar`, `nama_pemesan`, `email_pemesan`, `hp_pemesan`, `nama_tamu`, `id_kamar`, `FOTO`, `status`) VALUES
(2, '2022-03-24', '2022-03-25', '1', 'KAKA MAHFUD', 'kaka@gmail.com', '0075664', 'kakamahfud', 1, 'ktpp.jpg', '2'),
(3, '2022-03-30', '2022-03-31', '1', 'ALDIYANSYAH', 'aldiyansyah@gmail.com', '0075664', 'aldi', 2, 'ktm.jpg', '2'),
(4, '2022-03-28', '2022-03-29', '1', 'RESMIATI', 'resmiati@gmail.com', '070600', 'resmi', 6, 'ktp.jpg', '2'),
(5, '2023-12-20', '2023-12-26', '1', 'TAUFIK HIDAYAT', 'taufikhidayat@gmail.com', '081379012923', 'taufik', 7, 'ktm.jpg', '2'),
(9, '2023-12-07', '2023-12-15', '2', 'AVANTIKA', 'W@GMAIL.COM', '0866297284', 'avantika', 3, 'ktp.jpg', '0'),
(10, '2023-12-13', '2023-12-14', '1', 'NANTA WAHYU', 'wahyudwiyuliananta@gmail.com', '082175182252', 'nanta', 4, 'ktpp.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `username`, `password`, `level`) VALUES
(3, 'Resepsionis', 'resepsionis', 'resepsionis', '2'),
(6, 'admin', 'admin', 'admin', '1'),
(8, 'Taufik Hidayat', 'pengguna', 'pengguna', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indexes for table `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indexes for table `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
