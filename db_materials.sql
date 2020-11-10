-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 26, 2019 at 01:51 PM
-- Server version: 5.7.27-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-0ubuntu0.16.04.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_materials`
--

-- --------------------------------------------------------

--
-- Table structure for table `t_bank`
--

CREATE TABLE `t_bank` (
  `id_bank` int(11) NOT NULL,
  `bank` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_bank`
--

INSERT INTO `t_bank` (`id_bank`, `bank`) VALUES
(1, 'BRI'),
(2, 'BNI'),
(3, 'Mandiri'),
(4, 'BTI'),
(5, 'BCA');

-- --------------------------------------------------------

--
-- Table structure for table `t_biodata`
--

CREATE TABLE `t_biodata` (
  `id_biodata` int(11) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `photo_profil` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `kd_user` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `no_telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_biodata`
--

INSERT INTO `t_biodata` (`id_biodata`, `nama_lengkap`, `photo_profil`, `date_created`, `kd_user`, `alamat`, `no_telpon`) VALUES
(1, 'admin', 'default.jpg', '2019-06-10 04:45:55', '0101756074c15a959eb04abaea7b1d1c', '', ''),
(3, 'Toko', 'toko.png', '2019-06-10 05:29:28', '991cc78a2eb2446b5eae55f7de19a924', 'Telaga', ''),
(4, 'Tukang', 'tukang_ic.png', '2019-06-10 05:37:42', 'e100e849d4a26e18193a45ea80aa3043', 'Panggulo', ''),
(5, 'lidya ekel', 'logo.png', '2019-06-29 06:29:35', '0dbd4c9e667d2a0f532bac2ad0cda22c', 'kotamobagu', ''),
(12, 'troy', 'default.jpg', '2019-07-09 05:30:37', 'e2f32208d96eb2ed7a7f5bd712ca31e0', 'telaga', '081234563232'),
(14, 'Kurir Toko', 'default.jpg', '2019-07-15 06:24:37', 'ede1b999090cc9ff88b91ffc38e1d5f2', '', ''),
(15, 'Toko Materil', 'di_inkubator2.jpg', '2019-07-17 03:51:14', '09e254334115512fece9312c917d6c92', 'Panggulo', ''),
(16, 'Kurir Toko', 'default.jpg', '2019-07-17 04:02:39', 'e7aced5d7f0b77f9a205018e47bfb917', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `t_hak_akses`
--

CREATE TABLE `t_hak_akses` (
  `id_level` int(11) NOT NULL,
  `id_head_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_hak_akses`
--

INSERT INTO `t_hak_akses` (`id_level`, `id_head_menu`) VALUES
(0, 1),
(0, 2),
(0, 3),
(2, 2),
(3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_head_menu`
--

CREATE TABLE `t_head_menu` (
  `id_head_menu` int(11) NOT NULL,
  `caption` varchar(100) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '1',
  `level_sort` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_head_menu`
--

INSERT INTO `t_head_menu` (`id_head_menu`, `caption`, `status`, `level_sort`) VALUES
(1, 'Administrator', '1', 1),
(2, 'Tukang', '1', 2),
(3, 'Toko/Pabrik', '1', 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_kategori_material`
--

CREATE TABLE `t_kategori_material` (
  `id_kategori` int(11) NOT NULL,
  `kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kategori_material`
--

INSERT INTO `t_kategori_material` (`id_kategori`, `kategori`) VALUES
(0, 'none'),
(1, 'Aluminium, Baja dan Besi'),
(2, 'Atap'),
(3, 'Cat'),
(4, 'Kerikil, Batu dan Pasir'),
(5, 'Kayu dan Bahan Pelapis'),
(6, 'Pintu dan Jendela'),
(7, 'Semen'),
(8, 'Batubata dan Batako');

-- --------------------------------------------------------

--
-- Table structure for table `t_kurir`
--

CREATE TABLE `t_kurir` (
  `id_kurir` int(11) NOT NULL,
  `kd_user` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_kurir`
--

INSERT INTO `t_kurir` (`id_kurir`, `kd_user`) VALUES
(7, 'e7aced5d7f0b77f9a205018e47bfb917'),
(6, 'ede1b999090cc9ff88b91ffc38e1d5f2');

-- --------------------------------------------------------

--
-- Table structure for table `t_level`
--

CREATE TABLE `t_level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_level`
--

INSERT INTO `t_level` (`id_level`, `level`) VALUES
(0, 'Administrator'),
(1, 'Customer'),
(2, 'Tukang'),
(3, 'Toko/Pabrik'),
(4, 'Kurir');

-- --------------------------------------------------------

--
-- Table structure for table `t_material`
--

CREATE TABLE `t_material` (
  `id_material` int(11) NOT NULL,
  `nama_material` varchar(100) NOT NULL,
  `deskripsi` tinytext NOT NULL,
  `photo_material` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `id_kategori` int(11) NOT NULL,
  `id_satuan` int(11) NOT NULL,
  `harga` int(11) NOT NULL DEFAULT '0',
  `stok` int(11) NOT NULL DEFAULT '0',
  `id_penyedia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_material`
--

INSERT INTO `t_material` (`id_material`, `nama_material`, `deskripsi`, `photo_material`, `id_kategori`, `id_satuan`, `harga`, `stok`, `id_penyedia`) VALUES
(10, 'Pasir', 'pasir berkualitas, bisa nego!', 'sampel_pasir.jpg', 4, 1, 120000, 10, 7),
(15, 'Pasir', 'Pasir berkualitas, tidak boleh nego!', 'sampel_kerikil3.jpg', 4, 1, 100000, 20, 8),
(16, 'Semen 3 Rodaa', 'semen berkualitas, kokoh dan tangguh..', 'sampel_kerikil4.jpg', 7, 2, 80000, 10, 9);

-- --------------------------------------------------------

--
-- Table structure for table `t_pengiriman`
--

CREATE TABLE `t_pengiriman` (
  `id_pengiriman` int(11) NOT NULL,
  `alamat_pengiriman` varchar(100) NOT NULL,
  `nama_tujuan` varchar(50) NOT NULL,
  `no_telpon` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_penyedia`
--

CREATE TABLE `t_penyedia` (
  `id_penyedia` int(11) NOT NULL,
  `nama_penyedia` varchar(45) NOT NULL,
  `id_biodata` int(11) NOT NULL,
  `id_rating` int(11) NOT NULL DEFAULT '0',
  `rekening` varchar(50) NOT NULL,
  `id_bank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_penyedia`
--

INSERT INTO `t_penyedia` (`id_penyedia`, `nama_penyedia`, `id_biodata`, `id_rating`, `rekening`, `id_bank`) VALUES
(7, 'PT. Materil', 3, 0, '123456789', 1),
(8, 'Pt. serbuk', 5, 0, '3263535353', 3),
(9, 'PT. Materil barokah', 15, 0, '123456789', 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_privilege`
--

CREATE TABLE `t_privilege` (
  `id_privilege` int(11) NOT NULL,
  `privilege` varchar(45) DEFAULT NULL,
  `edit` tinyint(1) NOT NULL DEFAULT '0',
  `hapus` tinyint(1) NOT NULL DEFAULT '0',
  `view` tinyint(1) NOT NULL DEFAULT '0',
  `tambah` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_privilege`
--

INSERT INTO `t_privilege` (`id_privilege`, `privilege`, `edit`, `hapus`, `view`, `tambah`) VALUES
(0, 'Disable', 0, 0, 0, 0),
(1, 'Ubah Data', 1, 0, 1, 0),
(2, 'Hapus Data', 0, 1, 1, 0),
(3, 'Tampil Data', 0, 0, 1, 0),
(4, 'Tambah Data', 0, 0, 1, 1),
(5, 'Tambah dan Hapus Data', 0, 1, 1, 1),
(6, 'Ubah dan Hapus Data', 1, 1, 1, 0),
(7, 'Tambah dan Ubah Data', 1, 0, 1, 1),
(8, 'Tambah Ubah dan Hapus Data', 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `t_rating`
--

CREATE TABLE `t_rating` (
  `id_rating` int(11) NOT NULL,
  `rating` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_rating`
--

INSERT INTO `t_rating` (`id_rating`, `rating`) VALUES
(0, 'Belum ada rating'),
(1, 'Tidak Baik'),
(2, 'Kurang Baik'),
(3, 'Cukup Baik'),
(4, 'Baik'),
(5, 'Sangat Baik');

-- --------------------------------------------------------

--
-- Table structure for table `t_satuan`
--

CREATE TABLE `t_satuan` (
  `id_satuan` int(11) NOT NULL,
  `satuan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_satuan`
--

INSERT INTO `t_satuan` (`id_satuan`, `satuan`) VALUES
(1, 'M3'),
(2, 'Sak'),
(3, 'Biji');

-- --------------------------------------------------------

--
-- Table structure for table `t_spesialis`
--

CREATE TABLE `t_spesialis` (
  `id_spesialis` int(11) NOT NULL,
  `spesialis` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_spesialis`
--

INSERT INTO `t_spesialis` (`id_spesialis`, `spesialis`) VALUES
(1, 'Profesional'),
(2, 'Tukang batu, pasir, kerikil'),
(3, 'Tukang Cor'),
(4, 'Tukang Plumbing'),
(5, 'Tukang Kusen'),
(6, 'Tukang Cat'),
(7, 'Pasang Tegel');

-- --------------------------------------------------------

--
-- Table structure for table `t_spesial_hak_akses`
--

CREATE TABLE `t_spesial_hak_akses` (
  `kd_user` varchar(255) NOT NULL,
  `id_url` int(11) NOT NULL,
  `id_privilege` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_status_transaksi`
--

CREATE TABLE `t_status_transaksi` (
  `id_status` int(11) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_status_transaksi`
--

INSERT INTO `t_status_transaksi` (`id_status`, `status`) VALUES
(1, 'pending'),
(2, 'dikonfirmasi'),
(3, 'lunas'),
(4, 'batal');

-- --------------------------------------------------------

--
-- Table structure for table `t_transaksi`
--

CREATE TABLE `t_transaksi` (
  `kd_pemesanan` int(11) NOT NULL,
  `id_material` int(11) NOT NULL,
  `id_biodata` int(11) NOT NULL,
  `tgl_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `quantity` varchar(50) NOT NULL DEFAULT '0',
  `total_harga` varchar(50) NOT NULL DEFAULT '0',
  `id_status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_transaksi`
--

INSERT INTO `t_transaksi` (`kd_pemesanan`, `id_material`, `id_biodata`, `tgl_transaksi`, `quantity`, `total_harga`, `id_status`) VALUES
(1, 10, 12, '2019-07-16 04:47:07', '4', '480000', 3),
(3, 15, 12, '2019-07-16 04:52:16', '1', '100000', 2),
(4, 15, 12, '2019-07-16 05:31:44', '1', '100000', 1),
(5, 15, 12, '2019-07-16 08:35:36', '1', '100000', 1),
(6, 16, 12, '2019-07-17 04:00:55', '2', '160000', 3);

-- --------------------------------------------------------

--
-- Table structure for table `t_tukang`
--

CREATE TABLE `t_tukang` (
  `id_tukang` int(11) NOT NULL,
  `umur` int(11) NOT NULL,
  `pengalaman_kerja` int(11) NOT NULL,
  `no_telpon` varchar(15) NOT NULL,
  `status_kerja` enum('Bekerja','Tidak Bekerja') NOT NULL DEFAULT 'Tidak Bekerja',
  `id_spesialis` int(11) NOT NULL,
  `id_biodata` int(11) NOT NULL,
  `id_rating` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_tukang`
--

INSERT INTO `t_tukang` (`id_tukang`, `umur`, `pengalaman_kerja`, `no_telpon`, `status_kerja`, `id_spesialis`, `id_biodata`, `id_rating`) VALUES
(1, 21, 6, '089657261604', 'Bekerja', 2, 4, 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_url`
--

CREATE TABLE `t_url` (
  `id_url` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `deskripsi_url` varchar(255) NOT NULL,
  `title` varchar(50) NOT NULL,
  `level_sort_menu` int(11) NOT NULL,
  `status_menu` enum('1','0') NOT NULL DEFAULT '1',
  `icon_tipe` varchar(50) NOT NULL,
  `id_head_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_url`
--

INSERT INTO `t_url` (`id_url`, `url`, `deskripsi_url`, `title`, `level_sort_menu`, `status_menu`, `icon_tipe`, `id_head_menu`) VALUES
(1, 'home', 'halaman utama', 'halaman utama', 1, '1', 'fa fa-home', 1),
(2, 'menu', 'kelola Menu', 'kelola menu', 2, '1', 'fa fa-folder', 1),
(3, 'user', 'pengelolaan user material', 'kelola user', 3, '1', 'fa fa-users', 2);

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `kd_user` varchar(255) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` enum('1','0') NOT NULL DEFAULT '0',
  `id_level` int(11) NOT NULL DEFAULT '1',
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`kd_user`, `email`, `password`, `status`, `id_level`, `date_created`) VALUES
('0101756074c15a959eb04abaea7b1d1c', 'troymokoagow86@gmail.com', '$2y$10$dfpQ52lTHzXzjJZPytoavOHpz1VDP43.i5WiIMtIjh5VMI7slsPZS', '1', 0, '2019-06-10 04:47:52'),
('09e254334115512fece9312c917d6c92', 'salman@poligon.ac.id', '$2y$10$dQloQCgh8N4ZjPN1MkHlHexq4jQoCDS6e0ueQzjMcCHxm.V/S1bgW', '1', 3, '2019-07-17 03:53:57'),
('0dbd4c9e667d2a0f532bac2ad0cda22c', 'lidya.ekel2016@gmail.com', '$2y$10$zqdLaA1GQH.1dKoZB3xb4ePFGUsODkICaKl2EmyDjBOKuRpVrowiq', '1', 3, '2019-06-29 06:31:09'),
('1a2492ba4db2a07b205a510da72b11cf', 'fdfd@gmail.com', '$2y$10$Nyx5dRYas0etBUvSSQdwUupQtE4hu3fGDaefDpkz3OC.TQ.tr/pkq', '0', 1, '2019-07-15 09:31:10'),
('991cc78a2eb2446b5eae55f7de19a924', 'oakgosling200998@gmail.com', '$2y$10$.VNaKbvUKgsW5NqDDwEaL.Z4yKvcNBGf5JB/JTE/z1akKdeTILhaq', '1', 3, '2019-06-10 05:31:34'),
('e100e849d4a26e18193a45ea80aa3043', 'alvinmokoagow5@gmail.com', '$2y$10$FLs0LcqeV.TsEKzyXqOB0.0RWFpIRfGNqzfV5vp6oGK.kIwX4JlG6', '1', 2, '2019-06-10 05:38:04'),
('e2f32208d96eb2ed7a7f5bd712ca31e0', 'ruby@gmail.com', '$2y$10$D7JEuBGHUj6YziVt54VpFOXVUs7PuIERn1mZc.5J36YYtEvvz/BaW', '1', 1, '2019-07-09 05:31:36'),
('e7aced5d7f0b77f9a205018e47bfb917', 'kurir2@gmail.com', '$2y$10$/6FYd/nMjnRXeihA0dWWiu.Xsx3UXTVuf/77YK7Jn0s/CmdkG7/U6', '1', 4, '2019-07-17 04:02:39'),
('ede1b999090cc9ff88b91ffc38e1d5f2', 'kurir@gmail.com', '$2y$10$K3S6x3hCXyaqYO540MUQbOcBLd5CVtXw2WslnujegFhR.YcMmfuO6', '1', 4, '2019-07-15 06:24:37');

-- --------------------------------------------------------

--
-- Table structure for table `t_user_token`
--

CREATE TABLE `t_user_token` (
  `kd_token` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(100) NOT NULL,
  `date_created` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_profil_penyedia`
--
CREATE TABLE `v_profil_penyedia` (
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `v_profil_tukang`
--
CREATE TABLE `v_profil_tukang` (
);

-- --------------------------------------------------------

--
-- Structure for view `v_profil_penyedia`
--
DROP TABLE IF EXISTS `v_profil_penyedia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_profil_penyedia`  AS  select `u`.`email` AS `email`,`b`.`nama_lengkap` AS `nama_lengkap`,`b`.`alamat` AS `alamat`,`b`.`photo_profil` AS `photo_profil`,`p`.`nama_penyedia` AS `nama_penyedia`,`r`.`rating` AS `rating`,`rek`.`rekening` AS `rekening`,`bank`.`bank` AS `bank` from (((((`t_user` `u` join `t_biodata` `b`) join `t_penyedia` `p`) join `t_rating` `r`) join `t_rekening` `rek`) join `t_bank` `bank`) where ((`u`.`kd_user` = `b`.`kd_user`) and (`b`.`kd_biodata` = `p`.`kd_biodata`) and (`p`.`id_rating` = `r`.`id_rating`) and (`rek`.`id_rekening` = `p`.`id_rekening`) and (`rek`.`id_bank` = `bank`.`id_bank`)) ;

-- --------------------------------------------------------

--
-- Structure for view `v_profil_tukang`
--
DROP TABLE IF EXISTS `v_profil_tukang`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_profil_tukang`  AS  select `u`.`email` AS `email`,`b`.`nama_lengkap` AS `nama_lengkap`,`b`.`alamat` AS `alamat`,`b`.`photo_profil` AS `photo_profil`,`t`.`umur` AS `umur`,`t`.`pengalaman_kerja` AS `pengalaman_kerja`,`t`.`no_telpon` AS `no_telpon`,`t`.`status_kerja` AS `status_kerja`,`s`.`spesialis` AS `spesialis`,`r`.`rating` AS `rating` from ((((`t_user` `u` join `t_biodata` `b`) join `t_tukang` `t`) join `t_rating` `r`) join `t_spesialis` `s`) where ((`u`.`kd_user` = `b`.`kd_user`) and (`b`.`kd_biodata` = `t`.`kd_biodata`) and (`t`.`id_rating` = `r`.`id_rating`) and (`t`.`id_spesialis` = `s`.`id_spesialis`)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `t_bank`
--
ALTER TABLE `t_bank`
  ADD PRIMARY KEY (`id_bank`);

--
-- Indexes for table `t_biodata`
--
ALTER TABLE `t_biodata`
  ADD PRIMARY KEY (`id_biodata`),
  ADD KEY `kd_user` (`kd_user`);

--
-- Indexes for table `t_hak_akses`
--
ALTER TABLE `t_hak_akses`
  ADD KEY `id_level` (`id_level`,`id_head_menu`),
  ADD KEY `fk_id_head_menu` (`id_head_menu`);

--
-- Indexes for table `t_head_menu`
--
ALTER TABLE `t_head_menu`
  ADD PRIMARY KEY (`id_head_menu`);

--
-- Indexes for table `t_kategori_material`
--
ALTER TABLE `t_kategori_material`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `t_kurir`
--
ALTER TABLE `t_kurir`
  ADD PRIMARY KEY (`id_kurir`),
  ADD KEY `kd_user` (`kd_user`);

--
-- Indexes for table `t_level`
--
ALTER TABLE `t_level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `t_material`
--
ALTER TABLE `t_material`
  ADD PRIMARY KEY (`id_material`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_satuan` (`id_satuan`),
  ADD KEY `id_penyedia` (`id_penyedia`);

--
-- Indexes for table `t_pengiriman`
--
ALTER TABLE `t_pengiriman`
  ADD PRIMARY KEY (`id_pengiriman`);

--
-- Indexes for table `t_penyedia`
--
ALTER TABLE `t_penyedia`
  ADD PRIMARY KEY (`id_penyedia`),
  ADD KEY `kd_biodata` (`id_biodata`),
  ADD KEY `id_rating` (`id_rating`),
  ADD KEY `id_bank` (`id_bank`);

--
-- Indexes for table `t_privilege`
--
ALTER TABLE `t_privilege`
  ADD PRIMARY KEY (`id_privilege`);

--
-- Indexes for table `t_rating`
--
ALTER TABLE `t_rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Indexes for table `t_satuan`
--
ALTER TABLE `t_satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `t_spesialis`
--
ALTER TABLE `t_spesialis`
  ADD PRIMARY KEY (`id_spesialis`);

--
-- Indexes for table `t_spesial_hak_akses`
--
ALTER TABLE `t_spesial_hak_akses`
  ADD KEY `kd_user` (`kd_user`),
  ADD KEY `id_url` (`id_url`),
  ADD KEY `id_privilege` (`id_privilege`);

--
-- Indexes for table `t_status_transaksi`
--
ALTER TABLE `t_status_transaksi`
  ADD PRIMARY KEY (`id_status`);

--
-- Indexes for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD PRIMARY KEY (`kd_pemesanan`),
  ADD KEY `id_material` (`id_material`),
  ADD KEY `id_biodata` (`id_biodata`),
  ADD KEY `id_status` (`id_status`);

--
-- Indexes for table `t_tukang`
--
ALTER TABLE `t_tukang`
  ADD PRIMARY KEY (`id_tukang`),
  ADD KEY `id_spesialis` (`id_spesialis`),
  ADD KEY `kd_biodata` (`id_biodata`),
  ADD KEY `id_rating` (`id_rating`);

--
-- Indexes for table `t_url`
--
ALTER TABLE `t_url`
  ADD PRIMARY KEY (`id_url`),
  ADD KEY `id_head_menu` (`id_head_menu`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`kd_user`),
  ADD KEY `id_level` (`id_level`);

--
-- Indexes for table `t_user_token`
--
ALTER TABLE `t_user_token`
  ADD PRIMARY KEY (`kd_token`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `t_biodata`
--
ALTER TABLE `t_biodata`
  MODIFY `id_biodata` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `t_kurir`
--
ALTER TABLE `t_kurir`
  MODIFY `id_kurir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_material`
--
ALTER TABLE `t_material`
  MODIFY `id_material` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `t_pengiriman`
--
ALTER TABLE `t_pengiriman`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_penyedia`
--
ALTER TABLE `t_penyedia`
  MODIFY `id_penyedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  MODIFY `kd_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `t_tukang`
--
ALTER TABLE `t_tukang`
  MODIFY `id_tukang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `t_biodata`
--
ALTER TABLE `t_biodata`
  ADD CONSTRAINT `kd_user` FOREIGN KEY (`kd_user`) REFERENCES `t_user` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_hak_akses`
--
ALTER TABLE `t_hak_akses`
  ADD CONSTRAINT `fk_id_head_menu` FOREIGN KEY (`id_head_menu`) REFERENCES `t_head_menu` (`id_head_menu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_lvl` FOREIGN KEY (`id_level`) REFERENCES `t_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_kurir`
--
ALTER TABLE `t_kurir`
  ADD CONSTRAINT `kd_user_kurir` FOREIGN KEY (`kd_user`) REFERENCES `t_user` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_material`
--
ALTER TABLE `t_material`
  ADD CONSTRAINT `id_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `t_kategori_material` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_penyedia` FOREIGN KEY (`id_penyedia`) REFERENCES `t_penyedia` (`id_penyedia`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_satuan` FOREIGN KEY (`id_satuan`) REFERENCES `t_satuan` (`id_satuan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_penyedia`
--
ALTER TABLE `t_penyedia`
  ADD CONSTRAINT `id_bank` FOREIGN KEY (`id_bank`) REFERENCES `t_bank` (`id_bank`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_biodata_penyedia` FOREIGN KEY (`id_biodata`) REFERENCES `t_biodata` (`id_biodata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_rating` FOREIGN KEY (`id_rating`) REFERENCES `t_rating` (`id_rating`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_spesial_hak_akses`
--
ALTER TABLE `t_spesial_hak_akses`
  ADD CONSTRAINT `id_privilege_t_privilege` FOREIGN KEY (`id_privilege`) REFERENCES `t_privilege` (`id_privilege`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_url_t_url` FOREIGN KEY (`id_url`) REFERENCES `t_url` (`id_url`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `kd_user_t_spesial` FOREIGN KEY (`kd_user`) REFERENCES `t_user` (`kd_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_transaksi`
--
ALTER TABLE `t_transaksi`
  ADD CONSTRAINT `id_biodata_pemesanan` FOREIGN KEY (`id_biodata`) REFERENCES `t_biodata` (`id_biodata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_material_pemesanan` FOREIGN KEY (`id_material`) REFERENCES `t_material` (`id_material`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_status` FOREIGN KEY (`id_status`) REFERENCES `t_status_transaksi` (`id_status`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_tukang`
--
ALTER TABLE `t_tukang`
  ADD CONSTRAINT `id_biodata_tukang` FOREIGN KEY (`id_biodata`) REFERENCES `t_biodata` (`id_biodata`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_rating_tukang` FOREIGN KEY (`id_rating`) REFERENCES `t_rating` (`id_rating`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `id_spesialis` FOREIGN KEY (`id_spesialis`) REFERENCES `t_spesialis` (`id_spesialis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_url`
--
ALTER TABLE `t_url`
  ADD CONSTRAINT `id_head_menu` FOREIGN KEY (`id_head_menu`) REFERENCES `t_head_menu` (`id_head_menu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `t_user`
--
ALTER TABLE `t_user`
  ADD CONSTRAINT `id_level` FOREIGN KEY (`id_level`) REFERENCES `t_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
