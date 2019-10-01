-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Oct 01, 2019 at 04:45 PM
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
  `id_stasiun` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
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
-- Table structure for table `data_tangkapan_ikan`
--

CREATE TABLE `data_tangkapan_ikan` (
  `id` int(3) NOT NULL,
  `id_stasiun` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `ikan` varchar(100) NOT NULL,
  `hasil` int(5) NOT NULL,
  `ukuran` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, 3),
(1, 105),
(2, 105);

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
  `id_stasiun` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
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
(104, 4, 2, 1, 'fab fa-accusoft', 'Tahun', 'tahun', '2', 1),
(105, 1, 2, 1, 'fab fa-affiliatetheme', 'Input Penangkapan Ikan', 'input_ikan', '1', 1);

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
  `id` int(11) NOT NULL,
  `id_stasiun` int(11) NOT NULL,
  `id_periode` int(11) NOT NULL,
  `rata_rata` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `stasiun`
--

CREATE TABLE `stasiun` (
  `id` int(2) NOT NULL,
  `stasiun` int(2) NOT NULL,
  `desa` varchar(500) NOT NULL,
  `koordinat` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(1, '127.0.0.1', 'administrator', '$2a$07$SeBknntpZror9uyftVopmu61qg0ms8Qv1yV6FG.kQOSM.9QhmTo36', '', 'admin@admin.com', '', 'm0vyKu2zW7L8PTG20bquF.707e055aeea8a30aca', 1541329145, 'WcHCQ5vcXwT1z99BvJUWnu', 1268889823, 1569852987, 1, 'Admin', 'istrator', 'ADMIN', '0'),
(2, '::1', 'y@y.com', '$2y$08$tzbk5sdnMZsFD1.ruJ907./lh6m7rZvuoTYNaG4KnDwL0uFPJgVkK', NULL, 'y@y.com', NULL, NULL, NULL, NULL, 1569852596, 1569927554, 1, 'Yusuf', 'H', 'Ikan', '123');

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
  ADD KEY `id_stasiun` (`id_stasiun`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `bulan`
--
ALTER TABLE `bulan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_tangkapan_ikan`
--
ALTER TABLE `data_tangkapan_ikan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_stasiun` (`id_stasiun`),
  ADD KEY `id_periode` (`id_periode`);

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
  ADD KEY `id_stasiun` (`id_stasiun`),
  ADD KEY `id_periode` (`id_periode`);

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
  ADD KEY `id_stasiun` (`id_stasiun`),
  ADD KEY `id_periode` (`id_periode`);

--
-- Indexes for table `stasiun`
--
ALTER TABLE `stasiun`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `data_tangkapan_ikan`
--
ALTER TABLE `data_tangkapan_ikan`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `menu_type`
--
ALTER TABLE `menu_type`
  MODIFY `id_menu_type` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `periode`
--
ALTER TABLE `periode`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rata_tangkapan_ikan`
--
ALTER TABLE `rata_tangkapan_ikan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `stasiun`
--
ALTER TABLE `stasiun`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT;

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
  ADD CONSTRAINT `alat_tangkapan_ikan_ibfk_1` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id`),
  ADD CONSTRAINT `alat_tangkapan_ikan_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id`);

--
-- Constraints for table `data_tangkapan_ikan`
--
ALTER TABLE `data_tangkapan_ikan`
  ADD CONSTRAINT `data_tangkapan_ikan_ibfk_1` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id`),
  ADD CONSTRAINT `data_tangkapan_ikan_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id`);

--
-- Constraints for table `lokasi_tangkapan_ikan`
--
ALTER TABLE `lokasi_tangkapan_ikan`
  ADD CONSTRAINT `lokasi_tangkapan_ikan_ibfk_1` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id`),
  ADD CONSTRAINT `lokasi_tangkapan_ikan_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id`);

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
  ADD CONSTRAINT `rata_tangkapan_ikan_ibfk_1` FOREIGN KEY (`id_stasiun`) REFERENCES `stasiun` (`id`),
  ADD CONSTRAINT `rata_tangkapan_ikan_ibfk_2` FOREIGN KEY (`id_periode`) REFERENCES `periode` (`id`);

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
