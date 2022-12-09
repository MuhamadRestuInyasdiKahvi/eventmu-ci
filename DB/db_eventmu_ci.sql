-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 23, 2022 at 02:21 PM
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
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id_admin` int(5) UNSIGNED NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id_admin`, `email`, `username`, `password`, `created_at`, `updated_at`) VALUES
(1, 'admin@admin.com', 'admin', '$2y$10$G3d0ErY9RO8p0CWDhN0XWOIaJ/VLi/RuNuz6CowV9nHmKOK9NiA/e', '2022-11-22 19:35:13', '2022-11-22 19:35:13');

-- --------------------------------------------------------

--
-- Table structure for table `cara_kerjasama`
--

CREATE TABLE `cara_kerjasama` (
  `id_cara_kerjasama` int(5) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `keterangan` text NOT NULL,
  `icon_cara_kerjasama` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cara_kerjasama`
--

INSERT INTO `cara_kerjasama` (`id_cara_kerjasama`, `title`, `keterangan`, `icon_cara_kerjasama`, `created_at`, `updated_at`) VALUES
(2, 'halo', '<p>halo</p>', '1668856090_299f1bd36ae234b2883e.jpg', '2022-11-19 05:08:10', '2022-11-19 05:08:10');

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
(47, 'Festival Lagu laguan', 'Test', '2022-11-18 00:00:00'),
(48, 'Test API', 'Halo', '2022-11-23 00:00:00'),
(49, 'Halo', 'Halo', '2022-11-30 00:00:00'),
(50, 'Beneran', 'Gandi The Cool eyes', '2022-11-30 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id_event` int(5) UNSIGNED NOT NULL,
  `slug_event` varchar(100) NOT NULL,
  `slug_kategori` varchar(100) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penyelenggara` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `img_event` varchar(100) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id_event`, `slug_event`, `slug_kategori`, `judul`, `penyelenggara`, `deskripsi`, `img_event`, `start_event`, `end_event`, `created_at`, `updated_at`) VALUES
(37, 'event-1', 'konser', 'Event 1', 'Event 1', '<p>Event 1</p>', '1669200338_0628e09809e14e8898d1.png', '2022-11-23 00:00:00', '0000-00-00 00:00:00', '2022-11-23 04:45:38', '2022-11-23 04:45:38'),
(38, 'event-2', 'konser', 'Event 2', 'Event 2', '<p>Event 2</p>', '1669200361_83140b678bbe88bfd329.png', '2022-11-24 00:00:00', '0000-00-00 00:00:00', '2022-11-23 04:46:01', '2022-11-23 04:46:01'),
(39, 'event-3', 'konser', 'Event 3', 'Event 3', '<p>Event 3</p>', '1669200381_38b4b7704a84b88a488a.png', '2022-11-24 00:00:00', '0000-00-00 00:00:00', '2022-11-23 04:46:21', '2022-11-23 04:46:21');

-- --------------------------------------------------------

--
-- Table structure for table `kategori_event`
--

CREATE TABLE `kategori_event` (
  `id_kategori` int(5) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `slug_kategori` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kategori_event`
--

INSERT INTO `kategori_event` (`id_kategori`, `nama_kategori`, `slug_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Konser', 'konser', '2022-11-18 01:03:23', '2022-11-18 01:03:23');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(18, '2022-11-15-041350', 'App\\Database\\Migrations\\Event', 'default', 'App', 1668680821, 1),
(19, '2022-11-15-044411', 'App\\Database\\Migrations\\KategoriEvent', 'default', 'App', 1668680821, 1),
(20, '2022-11-16-112535', 'App\\Database\\Migrations\\TentangWebsite', 'default', 'App', 1668680821, 1),
(21, '2022-11-17-100057', 'App\\Database\\Migrations\\CaraBayar', 'default', 'App', 1668680821, 1),
(22, '2022-11-22-121316', 'App\\Database\\Migrations\\Admin', 'default', 'App', 1669119640, 2),
(23, '2022-11-23-061340', 'App\\Database\\Migrations\\User', 'default', 'App', 1669184246, 3),
(24, '2022-11-23-081424', 'App\\Database\\Migrations\\Testimoni', 'default', 'App', 1669191356, 4);

-- --------------------------------------------------------

--
-- Table structure for table `tentang_website`
--

CREATE TABLE `tentang_website` (
  `id_tentang` int(5) UNSIGNED NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `img_samping` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tentang_website`
--

INSERT INTO `tentang_website` (`id_tentang`, `slogan`, `deskripsi`, `img_samping`, `created_at`, `updated_at`) VALUES
(1, 'Test Api tentang', '<p>haha</p>', '1668855893_bd14a5075b9dc80fe100.jpg', '2022-11-19 05:04:53', '2022-11-19 05:04:53');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_komen` int(5) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `pesan` text NOT NULL,
  `foto_profil` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_komen`, `username`, `alamat`, `pesan`, `foto_profil`, `created_at`, `updated_at`) VALUES
(1, 'kahvi', 'Jakarta', 'hmmm', '1669189404_0bf4f127899f2a42803a.png', '2022-11-23 15:20:59', '2022-11-23 15:20:59'),
(2, 'gandi', 'Padand', 'halo', '1669192501_8e4056fcdacf4ce85107.png', '2022-11-23 15:35:16', '2022-11-23 15:35:16'),
(3, 'gandi', 'Padand', 'test sweetalert', '1669192501_8e4056fcdacf4ce85107.png', '2022-11-23 16:16:08', '2022-11-23 16:16:08');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(5) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_profil` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `alamat`, `email`, `password`, `foto_profil`, `created_at`, `updated_at`) VALUES
(3, 'restu', 'Bogor', 'restu@gmail.com', '$2y$10$SEuFsebYy7FcTQGKYQI.eenR3hsjMKqPpe7uIQ0Mc8NslZx/x0UX.', '1669188615_ff2ed498c1b6a95e27fc.png', '2022-11-23 14:30:15', '2022-11-23 14:30:15'),
(4, 'kahvi', 'Jakarta', 'kahvi@gmail.com', '$2y$10$ff2p5ComHdytq2JVRNk5z.rL/qP4243tEWPksBUcJj./VUe4tdHD.', '1669189404_0bf4f127899f2a42803a.png', '2022-11-23 14:43:24', '2022-11-23 14:43:24'),
(5, 'gandi', 'Padand', 'gandi@gmail.com', '$2y$10$3a3EDnz4lxvZdRquJLpsauP7Mw.qgP7YeFimvBJflqle2/pKt49Ju', '1669192501_8e4056fcdacf4ce85107.png', '2022-11-23 15:35:01', '2022-11-23 15:35:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `cara_kerjasama`
--
ALTER TABLE `cara_kerjasama`
  ADD PRIMARY KEY (`id_cara_kerjasama`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id_event`);

--
-- Indexes for table `kategori_event`
--
ALTER TABLE `kategori_event`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tentang_website`
--
ALTER TABLE `tentang_website`
  ADD PRIMARY KEY (`id_tentang`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_komen`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id_admin` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cara_kerjasama`
--
ALTER TABLE `cara_kerjasama`
  MODIFY `id_cara_kerjasama` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id_event` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `kategori_event`
--
ALTER TABLE `kategori_event`
  MODIFY `id_kategori` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `tentang_website`
--
ALTER TABLE `tentang_website`
  MODIFY `id_tentang` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_komen` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
