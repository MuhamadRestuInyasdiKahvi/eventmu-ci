-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2022 at 01:14 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_eventmu_ci`
--

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `judul`, `deskripsi`, `penyelenggara`) VALUES
(26, 'ImersifA', 'Museum Nasional terus mengembangkan diri untuk menarik minat pengunjung dan memperluas peranannya dalam mengkomunikasikan budaya sesuai dengan kebutuhan zaman. Kali ini, Museum Nasional mengembangkan Ruang ImersifA yang memanfaatkan teknologi imersif', 'Museum Nasional'),
(27, 'Galeri Nasional', 'Galeri Nasional Indonesia adalah sebuah lembaga budaya negara yang berfungsi sebagai tempat pameran, dan perhelatan acara seni rupa Indonesia dan mancanegara. Galeri Nasional merupakan institusi milik pemerintah di bawah Direktorat Jenderal Kebudayaa', 'Museum Nasional'),
(28, 'Train To Apocalypse', 'Train to Apocalypse adalah sebuah wahana zombi di Jakarta yang memiliki banyak rintangan, teka-teki, dan juga puzle yang seru. Pengunjung harus berjuang dari titik awal hingga tujuan akhir, yakni safety zone dalam waktu 20 menit.', 'Pandora Box'),
(29, 'Festival Lagu Laguan', 'Festival LaguLaguan merupakan festival musik outdoor yang mengagkat tema tropical-forest. Festival ini akan menampilkan musisi musisi tanah air dari berbagai genre musik, pop, dangdut, edm, rock yang akan meramaikan festival musik ini.', 'HeyFest 2022'),
(30, 'Dufan Night', 'Dunia Fantasi (Dufan) kembali menghadirkan wisata Dufan at Night. Jadi untuk traveler yang rindu liburan ke Dufan saat malam hari bisa banget mampir saat gelaran Dufan at Night.', 'Ancol');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
