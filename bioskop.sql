-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2026 at 05:14 PM
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
-- Database: `bioskop`
--

-- --------------------------------------------------------

--
-- Table structure for table `daftarfilm`
--

CREATE TABLE `daftarfilm` (
  `FilmID` int(11) NOT NULL,
  `img` varchar(25) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `genre` varchar(50) NOT NULL,
  `durasi` varchar(10) NOT NULL,
  `jadwal` varchar(10) NOT NULL,
  `sinopsis` varchar(255) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `daftarfilm`
--

INSERT INTO `daftarfilm` (`FilmID`, `img`, `judul`, `genre`, `durasi`, `jadwal`, `sinopsis`, `harga`) VALUES
(1, 'GOAT.jpg', 'Goat', 'Animasi / Komedi / Keluarga / Olahraga', '100', '14.30', 'Kisah Will, seekor kambing kecil dengan mimpi besar menjadi pemain profesional \'roarball\' - olahraga penuh aksi di dunia binatang antropomorfik - yang harus membuktikan dirinya di tengah rintangan dan penolakan.', 80000),
(2, 'Sore.jpg', 'Sore: Istri dari Masa Depan', 'Romantis / Drama / Fantasi', '105', '19.00', 'Seorang wanita misterius datang dari masa depan dan mengaku sebagai istri seorang pria yang hidupnya berantakan. Ia berusaha mengubah takdir dengan memperbaiki kebiasaan dan pilihan hidup sang pria sebelum semuanya terlambat.', 65000),
(3, 'FNF.jpg', 'Five Night at Freddy\'s 2', 'Horor / Thriller', '110', '21.00', 'Teror animatronik kembali menghantui penjaga malam dengan misteri yang lebih gelap dan mematikan. Sekuel ini menghadirkan ketegangan lebih intens dari film pertamanya.', 70000),
(4, 'Jumbo.jpg', 'Jumbo', 'Animasi / Keluarga / Petualangan', '102', '11.00', 'Don, anak bertubuh besar yang sering diremehkan, ingin membuktikan kemampuannya melalui pertunjukan bakat. Film ini menyuguhkan cerita hangat tentang kepercayaan diri dan persahabatan.', 60000),
(5, 'R&C.jpg', 'Rangga & Cinta', 'Romantis / Musikal / Remaja', '119', '15.45', 'Versi musikal dari kisah cinta legendaris remaja SMA yang penuh puisi dan konflik perasaan. Nostalgia dipadukan dengan arasemen musik modern.', 70000);

-- --------------------------------------------------------

--
-- Table structure for table `pemesan`
--

CREATE TABLE `pemesan` (
  `PesanID` int(11) NOT NULL,
  `nama` varchar(25) DEFAULT NULL,
  `UserID` int(11) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `FilmID` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `kursi` varchar(255) DEFAULT NULL,
  `pembayaran` enum('Cash','Qris') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pemesan`
--

INSERT INTO `pemesan` (`PesanID`, `nama`, `UserID`, `email`, `FilmID`, `jumlah`, `kursi`, `pembayaran`) VALUES
(1, 'yuanita', 1, 'yuanita@gmail.com', 2, 2, 'B12, B13', 'Qris'),
(4, 'elsa', 3, 'elsa@gmail.com', 4, 2, 'C18, C19', 'Cash');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `username`, `email`, `password`) VALUES
(1, 'yuanita', 'yuanita@gmail.com', 124250117),
(2, 'sevina', 'sevina@gmail.com', 124250119),
(3, 'elsa', 'elsa@gmail.com', 124250103);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `daftarfilm`
--
ALTER TABLE `daftarfilm`
  ADD PRIMARY KEY (`FilmID`);

--
-- Indexes for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD PRIMARY KEY (`PesanID`),
  ADD KEY `fk_user_id` (`UserID`),
  ADD KEY `fk_film_id` (`FilmID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftarfilm`
--
ALTER TABLE `daftarfilm`
  MODIFY `FilmID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pemesan`
--
ALTER TABLE `pemesan`
  MODIFY `PesanID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pemesan`
--
ALTER TABLE `pemesan`
  ADD CONSTRAINT `fk_film_id` FOREIGN KEY (`FilmID`) REFERENCES `daftarfilm` (`FilmID`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
