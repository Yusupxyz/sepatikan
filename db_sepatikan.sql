-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 15, 2019 at 11:45 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sepatikan`
--

-- --------------------------------------------------------

--
-- Table structure for table `alat_tangkapan_ikan`
--

CREATE TABLE `alat_tangkapan_ikan` (
  `id` int(11) NOT NULL,
  `id_stasiun` varchar(100) NOT NULL,
  `alat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bulan`
--

CREATE TABLE `bulan` (
  `id` int(2) NOT NULL,
  `bulan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bulan`
--

INSERT INTO `bulan` (`id`, `bulan`) VALUES
(1, 'Januari'),
(2, 'Februari'),
(3, 'Maret'),
(4, 'April'),
(5, 'Mei'),
(6, 'Juni'),
(7, 'Juli'),
(8, 'Agustus'),
(9, 'September'),
(10, 'Oktober'),
(11, 'Nopember'),
(12, 'Desember');

-- --------------------------------------------------------

--
-- Table structure for table `data_ekologis`
--

CREATE TABLE `data_ekologis` (
  `id_ekologis` int(11) NOT NULL,
  `id_stasiun` varchar(100) NOT NULL,
  `id_parameter` varchar(100) NOT NULL,
  `data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_sen`
--

CREATE TABLE `data_sen` (
  `id` int(11) NOT NULL,
  `id_stasiun` varchar(100) NOT NULL,
  `id_parameter` int(11) NOT NULL,
  `id_nilai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_tangkapan_ikan`
--

CREATE TABLE `data_tangkapan_ikan` (
  `id` int(3) NOT NULL,
  `id_stasiun` varchar(100) NOT NULL,
  `ikan` varchar(100) NOT NULL,
  `hasil` int(5) NOT NULL,
  `ukuran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_tangkapan_ikan`
--

INSERT INTO `data_tangkapan_ikan` (`id`, `id_stasiun`, `ikan`, `hasil`, `ukuran`) VALUES
(3, '5da4944c53523', 'sas', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deskripsi`
--

CREATE TABLE `deskripsi` (
  `id` int(11) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `deskripsi`
--

INSERT INTO `deskripsi` (`id`, `deskripsi`) VALUES
(1, '<ol type=\'a\'>\r\n<li>Deskripsi Umum\r\n<ul style=\"list-style-type: square;\">\r\n<li>Teori singkat tentang pemanfaatan data perikanan untuk pengelolaan perikanan</li>\r\n<li>Penjelasan tujuan dan misi dari aplikasi ini</li>\r\n<li>Pembatasan akses aplikasi</li>\r\n</ul>\r\n</li>\r\n<li>Input Data\r\n<ul style=\"list-style-type: square;\">\r\n<li>User dan password</li>\r\n<li>Jenis data yang dikumpulkan</li>\r\n<li>Sumber data</li>\r\n<li>Metode pengumpulan data</li>\r\n<li>Stasiun pengumpulan data</li>\r\n<li>Periode pengumpulan data</li>\r\n</ul>\r\n</li>\r\n<li>Output Data\r\n<ul style=\"list-style-type: square;\">\r\n<li>Jenis data yang disajikan</li>\r\n<li>Keterbatasan data yang disajikan</li>\r\n<li>Interprestasi data yang disajikan</li>\r\n</ul>\r\n</li>\r\n<li>Syarat dan Ketentuan\r\n<ul style=\"list-style-type: square;\">\r\n<li>Hak cipta</li>\r\n<li>Independensi pengelola aplikasi</li>\r\n<li>Batasan pemakaian data</li>\r\n<li>Syarat ketentuan lainnya</li>\r\n</ul>\r\n</li>\r\n</ol>');

-- --------------------------------------------------------

--
-- Table structure for table `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Table structure for table `groups_menu`
--

CREATE TABLE `groups_menu` (
  `id_groups` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `groups_menu`
--

INSERT INTO `groups_menu` (`id_groups`, `id_menu`) VALUES
(1, 1),
(2, 1),
(1, 40),
(1, 8),
(1, 89),
(1, 42),
(1, 43),
(1, 44),
(1, 102),
(1, 103),
(1, 104),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_data`
--

CREATE TABLE `jenis_data` (
  `id` int(3) NOT NULL,
  `jenis_data` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_data`
--

INSERT INTO `jenis_data` (`id`, `jenis_data`) VALUES
(1, 'Data Penangkapan Ikan'),
(2, 'Data Ekologis/Lingkungan'),
(3, 'Data Sosial Ekonomi Nelayan');

-- --------------------------------------------------------

--
-- Table structure for table `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `lokasi_tangkapan_ikan`
--

CREATE TABLE `lokasi_tangkapan_ikan` (
  `id` int(11) NOT NULL,
  `id_stasiun` varchar(100) NOT NULL,
  `lokasi` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `sort` int(11) NOT NULL DEFAULT '99',
  `level` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `icon` varchar(125) NOT NULL,
  `label` varchar(25) NOT NULL,
  `link` varchar(125) NOT NULL,
  `id` varchar(25) NOT NULL DEFAULT '#',
  `id_menu_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`id_menu`, `sort`, `level`, `parent_id`, `icon`, `label`, `link`, `id`, `id_menu_type`) VALUES
(1, 0, 1, 0, 'empty', 'MAIN NAVIGATION', '#', '#', 1),
(3, 2, 2, 1, 'fas fa-tachometer-alt', 'Dashboard', 'dashboard', '#', 1),
(8, 6, 2, 40, 'fas fa-bars', 'Menu', 'cms/menu/side-menu', 'navMenu', 1),
(40, 5, 1, 0, 'empty', 'DEV', '#', '#', 1),
(42, 8, 2, 40, 'fas fa-users-cog', 'User', '#', '1', 1),
(43, 9, 3, 42, 'fas fa-angle-double-right', 'Users', 'users', '1', 1),
(44, 10, 3, 42, 'fas fa-angle-double-right', 'Groups', 'groups', '2', 1),
(89, 7, 2, 40, 'fas fa-th-list', 'Menu Type', 'menu_type', 'menu_type', 1),
(102, 1, 2, 1, 'fab fa-500px', 'Sungai', 'sungai', '1', 1),
(103, 3, 2, 1, 'fab fa-accessible-icon', 'Jenis Data', 'jenis_data', '1', 1),
(104, 4, 2, 1, 'fab fa-accusoft', 'Tahun', 'tahun', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `menu_type`
--

CREATE TABLE `menu_type` (
  `id_menu_type` int(11) NOT NULL,
  `type` varchar(125) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `menu_type`
--

INSERT INTO `menu_type` (`id_menu_type`, `type`) VALUES
(1, 'Side menu');

-- --------------------------------------------------------

--
-- Table structure for table `nilai_sen`
--

CREATE TABLE `nilai_sen` (
  `id` int(11) NOT NULL,
  `nilai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai_sen`
--

INSERT INTO `nilai_sen` (`id`, `nilai`) VALUES
(1, 'kurang dari Rp 500 ribu dari UMR'),
(2, '± Rp 500 ribu dari UMR'),
(3, 'lebih dari Rp 500 ribu dari UMR');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_sen`
--

CREATE TABLE `parameter_sen` (
  `id` int(11) NOT NULL,
  `parameter` varchar(100) NOT NULL,
  `id_nilai_1` int(11) NOT NULL,
  `id_nilai_2` int(11) NOT NULL,
  `id_nilai_3` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameter_sen`
--

INSERT INTO `parameter_sen` (`id`, `parameter`, `id_nilai_1`, `id_nilai_2`, `id_nilai_3`) VALUES
(2, 'Pendapatan/bulan', 1, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `paramter_ekologis`
--

CREATE TABLE `paramter_ekologis` (
  `id` varchar(100) NOT NULL,
  `parameter` varchar(500) NOT NULL,
  `jenis` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paramter_ekologis`
--

INSERT INTO `paramter_ekologis` (`id`, `parameter`, `jenis`) VALUES
('1', 'Tingkat kerusakan vegetasi riparian (%)', '0'),
('2', 'Makrobenthos (jumlah jenis)', '0');

-- --------------------------------------------------------

--
-- Table structure for table `periode`
--

CREATE TABLE `periode` (
  `id` int(2) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `awal` int(2) NOT NULL,
  `akhir` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `periode`
--

INSERT INTO `periode` (`id`, `nama`, `awal`, `akhir`) VALUES
(1, 'Musim Hujan', 11, 4),
(2, 'Musim Kemarau', 5, 10);

-- --------------------------------------------------------

--
-- Table structure for table `rata_tangkapan_ikan`
--

CREATE TABLE `rata_tangkapan_ikan` (
  `id` int(100) NOT NULL,
  `id_stasiun` varchar(100) NOT NULL,
  `rata_rata` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rata_tangkapan_ikan`
--

INSERT INTO `rata_tangkapan_ikan` (`id`, `id_stasiun`, `rata_rata`) VALUES
(3, '5da4944c53523', 0);

-- --------------------------------------------------------

--
-- Table structure for table `stasiun`
--

CREATE TABLE `stasiun` (
  `id` varchar(100) NOT NULL,
  `id_jenis_data` int(11) NOT NULL,
  `stasiun` int(2) NOT NULL,
  `desa` varchar(500) NOT NULL,
  `koordinat` varchar(500) NOT NULL,
  `id_sungai` int(11) NOT NULL,
  `id_tahun` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stasiun`
--

INSERT INTO `stasiun` (`id`, `id_jenis_data`, `stasiun`, `desa`, `koordinat`, `id_sungai`, `id_tahun`, `id_periode`, `id_user`) VALUES
('5da4944c53523', 1, 1, 'as', 'sas', 1, 4, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `sungai`
--

CREATE TABLE `sungai` (
  `id` int(3) NOT NULL,
  `sungai` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sungai`
--

INSERT INTO `sungai` (`id`, `sungai`) VALUES
(1, 'Sungai Katingan'),
(2, 'Sungai Sebangau');

-- --------------------------------------------------------

--
-- Table structure for table `tahun`
--

CREATE TABLE `tahun` (
  `id` int(3) NOT NULL,
  `tahun` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tahun`
--

INSERT INTO `tahun` (`id`, `tahun`) VALUES
(1, 2022),
(2, 2021),
(3, 2020),
(4, 2019),
(5, 2018);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `password`, `salt`, `email`, `activation_code`, `forgotten_password_code`, `forgotten_password_time`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`) VALUES
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', 'm0vyKu2zW7L8PTG20bquF.707e055aeea8a30aca', 1541329145, 'WcHCQ5vcXwT1z99BvJUWnu', 1268889823, 1570428469, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'y@y.com', '$2y$08$tzbk5sdnMZsFD1.ruJ907./lh6m7rZvuoTYNaG4KnDwL0uFPJgVkK', NULL, 'y@y.com', NULL, NULL, NULL, NULL, 1569852596, 1571123627, 1, 'Yusuf', 'H', 'Ikan', '123');

-- --------------------------------------------------------

--
-- Table structure for table `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(3, 1, 1),
(4, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alat_tangkapan_ikan`
--
ALTER TABLE `alat_tangkapan_ikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stasiun` (`id_stasiun`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_ekologis`
--
ALTER TABLE `data_ekologis`
  ADD PRIMARY KEY (`id_ekologis`),
  ADD KEY `id_stasiun` (`id_stasiun`),
  ADD KEY `id_parameter` (`id_parameter`);

--
-- Indexes for table `data_sen`
--
ALTER TABLE `data_sen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_parameter` (`id_parameter`),
  ADD KEY `id_nilai` (`id_nilai`),
  ADD KEY `id_stasiun` (`id_stasiun`);

--
-- Indexes for table `data_tangkapan_ikan`
--
ALTER TABLE `data_tangkapan_ikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stasiun` (`id_stasiun`);

--
-- Indexes for table `deskripsi`
--
ALTER TABLE `deskripsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_data`
--
ALTER TABLE `jenis_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lokasi_tangkapan_ikan`
--
ALTER TABLE `lokasi_tangkapan_ikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stasiun` (`id_stasiun`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `menu_type`
--
ALTER TABLE `menu_type`
  ADD PRIMARY KEY (`id_menu_type`);

--
-- Indexes for table `nilai_sen`
--
ALTER TABLE `nilai_sen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parameter_sen`
--
ALTER TABLE `parameter_sen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_nilai_1` (`id_nilai_1`),
  ADD KEY `id_nilai_2` (`id_nilai_2`),
  ADD KEY `id_nilai_3` (`id_nilai_3`);

--
-- Indexes for table `paramter_ekologis`
--
ALTER TABLE `paramter_ekologis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `periode`
--
ALTER TABLE `periode`
  ADD PRIMARY KEY (`id`),
  ADD KEY `awal` (`awal`),
  ADD KEY `akhir` (`akhir`);

--
-- Indexes for table `rata_tangkapan_ikan`
--
ALTER TABLE `rata_tangkapan_ikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stasiun` (`id_stasiun`);

--
-- Indexes for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_periode` (`id_periode`),
  ADD KEY `id_tahun` (`id_tahun`),
  ADD KEY `id_sungai` (`id_sungai`),
  ADD KEY `id_jenis_data` (`id_jenis_data`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `sungai`
--
ALTER TABLE `sungai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun`
--
ALTER TABLE `tahun`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alat_tangkapan_ikan`
--
ALTER TABLE `alat_tangkapan_ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bulan`
--
ALTER TABLE `bulan`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `data_ekologis`
--
ALTER TABLE `data_ekologis`
  MODIFY `id_ekologis` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_sen`
--
ALTER TABLE `data_sen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `data_tangkapan_ikan`
--
ALTER TABLE `data_tangkapan_ikan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `deskripsi`
--
ALTER TABLE `deskripsi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_data`
--
ALTER TABLE `jenis_data`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lokasi_tangkapan_ikan`
--
ALTER TABLE `lokasi_tangkapan_ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nilai_sen`
--
ALTER TABLE `nilai_sen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parameter_sen`
--
ALTER TABLE `parameter_sen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rata_tangkapan_ikan`
--
ALTER TABLE `rata_tangkapan_ikan`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sungai`
--
ALTER TABLE `sungai`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tahun`
--
ALTER TABLE `tahun`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alat_tangkapan_ikan`
--
ALTER TABLE `alat_tangkapan_ikan`
  ADD CONSTRAINT `alat_tangkapan_ikan_ibfk_3` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id`);

--
-- Constraints for table `data_ekologis`
--
ALTER TABLE `data_ekologis`
  ADD CONSTRAINT `data_ekologis_ibfk_1` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id`),
  ADD CONSTRAINT `data_ekologis_ibfk_2` FOREIGN KEY (`id_parameter`) REFERENCES `paramter_ekologis` (`id`);

--
-- Constraints for table `data_sen`
--
ALTER TABLE `data_sen`
  ADD CONSTRAINT `data_sen_ibfk_1` FOREIGN KEY (`id_parameter`) REFERENCES `parameter_sen` (`id`),
  ADD CONSTRAINT `data_sen_ibfk_2` FOREIGN KEY (`id_nilai`) REFERENCES `nilai_sen` (`id`),
  ADD CONSTRAINT `data_sen_ibfk_3` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id`);

--
-- Constraints for table `data_tangkapan_ikan`
--
ALTER TABLE `data_tangkapan_ikan`
  ADD CONSTRAINT `data_tangkapan_ikan_ibfk_3` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id`);

--
-- Constraints for table `lokasi_tangkapan_ikan`
--
ALTER TABLE `lokasi_tangkapan_ikan`
  ADD CONSTRAINT `lokasi_tangkapan_ikan_ibfk_1` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id`);

--
-- Constraints for table `parameter_sen`
--
ALTER TABLE `parameter_sen`
  ADD CONSTRAINT `parameter_sen_ibfk_1` FOREIGN KEY (`id_nilai_1`) REFERENCES `nilai_sen` (`id`),
  ADD CONSTRAINT `parameter_sen_ibfk_2` FOREIGN KEY (`id_nilai_2`) REFERENCES `nilai_sen` (`id`),
  ADD CONSTRAINT `parameter_sen_ibfk_3` FOREIGN KEY (`id_nilai_3`) REFERENCES `nilai_sen` (`id`);

--
-- Constraints for table `periode`
--
ALTER TABLE `periode`
  ADD CONSTRAINT `periode_ibfk_1` FOREIGN KEY (`awal`) REFERENCES `bulan` (`id`),
  ADD CONSTRAINT `periode_ibfk_2` FOREIGN KEY (`akhir`) REFERENCES `bulan` (`id`);

--
-- Constraints for table `rata_tangkapan_ikan`
--
ALTER TABLE `rata_tangkapan_ikan`
  ADD CONSTRAINT `rata_tangkapan_ikan_ibfk_1` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id`);

--
-- Constraints for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD CONSTRAINT `stasiun_ibfk_1` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id`),
  ADD CONSTRAINT `stasiun_ibfk_2` FOREIGN KEY (`id_tahun`) REFERENCES `tahun` (`id`),
  ADD CONSTRAINT `stasiun_ibfk_3` FOREIGN KEY (`id_sungai`) REFERENCES `sungai` (`id`),
  ADD CONSTRAINT `stasiun_ibfk_4` FOREIGN KEY (`id_jenis_data`) REFERENCES `jenis_data` (`id`),
  ADD CONSTRAINT `stasiun_ibfk_5` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Constraints for table `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
