-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2021 at 09:09 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3
SET
  SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET
  time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */
;

/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */
;

/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */
;

/*!40101 SET NAMES utf8mb4 */
;

--
-- Database: `spk_saw`
--
-- --------------------------------------------------------
--
-- Table structure for table `ijin`
--
CREATE TABLE `ijin` (
  `id` int(11) NOT NULL,
  `id_santri` int(11) NOT NULL,
  `tanggal_ijin` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `keterangan` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `level`
--
CREATE TABLE `level` (
  `lev_id` int(11) NOT NULL,
  `lev_nama` varchar(50) NOT NULL,
  `lev_keterangan` text NOT NULL,
  `lev_status` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table `level`
--
INSERT INTO
  `level` (
    `lev_id`,
    `lev_nama`,
    `lev_keterangan`,
    `lev_status`
  )
VALUES
  (2, 'Administrator', '-', 'Aktif');

-- --------------------------------------------------------
--
-- Table structure for table `menu`
--
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL,
  `menu_menu_id` int(11) NOT NULL,
  `menu_nama` varchar(50) NOT NULL,
  `menu_keterangan` text NOT NULL,
  `menu_index` int(11) NOT NULL,
  `menu_icon` varchar(50) NOT NULL,
  `menu_url` varchar(100) NOT NULL,
  `menu_status` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table `menu`
--
INSERT INTO
  `menu` (
    `menu_id`,
    `menu_menu_id`,
    `menu_nama`,
    `menu_keterangan`,
    `menu_index`,
    `menu_icon`,
    `menu_url`,
    `menu_status`
  )
VALUES
  (
    1,
    0,
    'Dashboard',
    '-',
    1,
    'fa fa-suitcase',
    'dashboard',
    'Aktif'
  ),
  (
    2,
    0,
    'Pengaturan',
    '-',
    10,
    'fa fa-cogs',
    '#',
    'Aktif'
  ),
  (
    3,
    2,
    'Hak Akses',
    '-',
    1,
    'fa fa-caret-right',
    'pengaturan/hakAkses',
    'Aktif'
  ),
  (
    4,
    2,
    'Menu',
    '-',
    2,
    'fa fa-caret-right',
    'pengaturan/menu',
    'Aktif'
  ),
  (
    5,
    2,
    'Level',
    '-',
    3,
    'fa fa-caret-right',
    'pengaturan/level',
    'Aktif'
  ),
  (
    6,
    2,
    'Pengguna',
    '-',
    4,
    'fa fa-caret-right',
    'pengaturan/pengguna',
    'Aktif'
  ),
  (
    15,
    0,
    'Santri',
    'menu santri',
    1,
    'fa fa-user',
    '#',
    'Aktif'
  ),
  (
    16,
    0,
    'Data Perizinan',
    'Data perizinan santri',
    3,
    'fa fa-envelope',
    '#',
    'Aktif'
  ),
  (
    17,
    15,
    'Santri',
    'Data Santri',
    0,
    'fa fa-caret-right',
    'santri/santri',
    'Aktif'
  ),
  (
    18,
    15,
    'Kelas',
    'Kelas santri',
    1,
    'fa fa-caret-right',
    'santri/kelas',
    'Aktif'
  ),
  (
    20,
    15,
    'Tahun Ajaran',
    'Tahun Ajaran Santri',
    2,
    'fa fa-caret-right',
    'santri/tahunajaran',
    'Aktif'
  ),
  (
    21,
    15,
    'Tingkat',
    'Tingkat Santri',
    3,
    'fa fa-caret-right',
    'santri/tingkat',
    'Aktif'
  ),
  (
    22,
    15,
    'Ruang',
    'Ruang Santri',
    4,
    'fa fa-caret-right',
    'santri/ruang',
    'Aktif'
  );

-- --------------------------------------------------------
--
-- Table structure for table `pengaturan`
--
CREATE TABLE `pengaturan` (
  `id` int(30) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `nama_aplikasi` varchar(100) NOT NULL,
  `copyright` varchar(100) NOT NULL,
  `deskripsi` varchar(250) NOT NULL,
  `batas_ijin` varchar(20) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

-- --------------------------------------------------------
--
-- Table structure for table `role_aplikasi`
--
CREATE TABLE `role_aplikasi` (
  `rola_id` int(11) NOT NULL,
  `rola_menu_id` int(11) NOT NULL,
  `rola_lev_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table `role_aplikasi`
--
INSERT INTO
  `role_aplikasi` (`rola_id`, `rola_menu_id`, `rola_lev_id`)
VALUES
  (2, 1, 2),
  (4, 3, 2),
  (5, 4, 2),
  (6, 5, 2),
  (7, 6, 2),
  (8, 2, 2),
  (17, 15, 2),
  (18, 16, 2),
  (19, 18, 2),
  (20, 17, 2),
  (21, 20, 2),
  (22, 22, 2),
  (23, 21, 2);

-- --------------------------------------------------------
--
-- Table structure for table `role_users`
--
CREATE TABLE `role_users` (
  `role_id` int(11) NOT NULL,
  `role_user_id` int(11) NOT NULL,
  `role_lev_id` int(11) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table `role_users`
--
INSERT INTO
  `role_users` (`role_id`, `role_user_id`, `role_lev_id`)
VALUES
  (1, 1, 2),
  (2, 2, 1);

-- --------------------------------------------------------
--
-- Table structure for table `santri`
--
CREATE TABLE `santri` (
  `id_santri` int(11) NOT NULL,
  `tingkat_id` int(11) DEFAULT NULL,
  `kelas_id` int(11) DEFAULT NULL,
  `ruang_id` int(11) DEFAULT NULL,
  `tahun_ajaran_id` int(11) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('laki-laki', 'perempuan') NOT NULL,
  `alamat` varchar(250) NOT NULL,
  `no_hp` int(14) NOT NULL,
  `status` enum('Aktif', 'Non Aktif') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_lahir` date DEFAULT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `santri`
--
INSERT INTO
  `santri` (
    `id_santri`,
    `tingkat_id`,
    `kelas_id`,
    `ruang_id`,
    `tahun_ajaran_id`,
    `nama`,
    `jenis_kelamin`,
    `alamat`,
    `no_hp`,
    `status`,
    `tanggal`,
    `tanggal_lahir`
  )
VALUES
  (
    1,
    1,
    1,
    1,
    1,
    'aa',
    'laki-laki',
    'where',
    343434,
    'Non Aktif',
    '2021-04-10 06:34:08',
    '2021-04-05'
  ),
  (
    3,
    3,
    18,
    2,
    1,
    'Din Syamsydub',
    'laki-laki',
    'Bandung',
    123,
    'Aktif',
    '2021-04-10 06:33:52',
    '2021-04-13'
  ),
  (
    4,
    1,
    20,
    1,
    1,
    'dfgf',
    'laki-laki',
    'fgdg',
    324234,
    'Aktif',
    '2021-04-10 06:56:57',
    '2021-04-12'
  ),
  (
    5,
    1,
    20,
    1,
    1,
    'sdfadssdfsdaf',
    'perempuan',
    'sfasdf',
    3244324,
    'Aktif',
    '2021-04-10 07:02:53',
    '2021-04-06'
  ),
  (
    6,
    1,
    20,
    1,
    1,
    'sdfsdfsdf',
    'laki-laki',
    'sdfsdfsdafsdaf',
    234234,
    'Aktif',
    '2021-04-10 07:07:34',
    '2021-04-13'
  ),
  (
    7,
    1,
    20,
    1,
    1,
    'sdfsdfsdf',
    'laki-laki',
    'sdfsdfsdafsdaf',
    234234,
    'Aktif',
    '2021-04-10 07:07:44',
    '2021-04-13'
  ),
  (
    8,
    1,
    20,
    1,
    1,
    'sdfsdaf',
    'perempuan',
    'sdfasdf',
    234234,
    'Aktif',
    '2021-04-10 07:08:36',
    '2021-04-06'
  );

-- --------------------------------------------------------
--
-- Table structure for table `santri_kelas`
--
CREATE TABLE `santri_kelas` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `santri_kelas`
--
INSERT INTO
  `santri_kelas` (`id`, `nama`)
VALUES
  (20, '12333'),
  (21, '12345'),
  (18, '123sdsa'),
  (17, 'asdasd'),
  (16, 'Bulog'),
  (11, 'cvzxvzcxv'),
  (14, 'dsdfds'),
  (6, 'fdgdfg'),
  (4, 'fdgfdsg'),
  (5, 'fdsggdsg'),
  (3, 'fsgfdg'),
  (2, 'Kaligrafi'),
  (19, 'sd'),
  (25, 'ssadsad'),
  (1, 'Tahfiz'),
  (26, 'Terbaik'),
  (9, 'xczxcxzcZ');

-- --------------------------------------------------------
--
-- Table structure for table `santri_ruang`
--
CREATE TABLE `santri_ruang` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `santri_ruang`
--
INSERT INTO
  `santri_ruang` (`id`, `nama`)
VALUES
  (1, 'Kaligrafi'),
  (4, 'kk'),
  (2, 'Tahfiz 2');

-- --------------------------------------------------------
--
-- Table structure for table `santri_tahun_ajaran`
--
CREATE TABLE `santri_tahun_ajaran` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `santri_tahun_ajaran`
--
INSERT INTO
  `santri_tahun_ajaran` (`id`, `nama`)
VALUES
  (1, '2021/202211'),
  (2, '2022/2023');

-- --------------------------------------------------------
--
-- Table structure for table `santri_tingkat`
--
CREATE TABLE `santri_tingkat` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

--
-- Dumping data for table `santri_tingkat`
--
INSERT INTO
  `santri_tingkat` (`id`, `nama`)
VALUES
  (1, 'A'),
  (2, 'B'),
  (3, 'Glosarium b');

-- --------------------------------------------------------
--
-- Table structure for table `users`
--
CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_nama` varchar(50) NOT NULL,
  `user_password` varchar(100) NOT NULL,
  `user_email` varchar(50) NOT NULL,
  `user_phone` varchar(15) NOT NULL,
  `user_status` varchar(50) NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = latin1;

--
-- Dumping data for table `users`
--
INSERT INTO
  `users` (
    `user_id`,
    `user_nama`,
    `user_password`,
    `user_email`,
    `user_phone`,
    `user_status`
  )
VALUES
  (
    1,
    'Administrator',
    'utqQiS/p4vWKh3E81QVNBONFqJt14hRtvAx446gYROkV8.8kh11eS',
    'administrator',
    '08123123',
    'Aktif'
  ),
  (
    2,
    'Petugas TU',
    'amPXcdHeGkuISXLhkffApu7xo6AwRIr8KoWb6xPc9F9ASBaoyiIZi',
    'petugas1',
    '08123123',
    'Aktif'
  );

--
-- Indexes for dumped tables
--
--
-- Indexes for table `ijin`
--
ALTER TABLE
  `ijin`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `level`
--
ALTER TABLE
  `level`
ADD
  PRIMARY KEY (`lev_id`);

--
-- Indexes for table `menu`
--
ALTER TABLE
  `menu`
ADD
  PRIMARY KEY (`menu_id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE
  `pengaturan`
ADD
  PRIMARY KEY (`id`);

--
-- Indexes for table `role_aplikasi`
--
ALTER TABLE
  `role_aplikasi`
ADD
  PRIMARY KEY (`rola_id`);

--
-- Indexes for table `role_users`
--
ALTER TABLE
  `role_users`
ADD
  PRIMARY KEY (`role_id`);

--
-- Indexes for table `santri`
--
ALTER TABLE
  `santri`
ADD
  PRIMARY KEY (`id_santri`),
ADD
  KEY `kelas_id` (`kelas_id`),
ADD
  KEY `ruang_id` (`ruang_id`),
ADD
  KEY `tingkat_id` (`tingkat_id`),
ADD
  KEY `tahun_ajaran_id` (`tahun_ajaran_id`);

--
-- Indexes for table `santri_kelas`
--
ALTER TABLE
  `santri_kelas`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `santri_ruang`
--
ALTER TABLE
  `santri_ruang`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `santri_tahun_ajaran`
--
ALTER TABLE
  `santri_tahun_ajaran`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `nama` (`nama`);

--
-- Indexes for table `santri_tingkat`
--
ALTER TABLE
  `santri_tingkat`
ADD
  PRIMARY KEY (`id`),
ADD
  UNIQUE KEY `nama` (`nama`);

--
-- AUTO_INCREMENT for dumped tables
--
--
-- AUTO_INCREMENT for table `ijin`
--
ALTER TABLE
  `ijin`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE
  `level`
MODIFY
  `lev_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE
  `menu`
MODIFY
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 23;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE
  `pengaturan`
MODIFY
  `id` int(30) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `role_aplikasi`
--
ALTER TABLE
  `role_aplikasi`
MODIFY
  `rola_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 24;

--
-- AUTO_INCREMENT for table `role_users`
--
ALTER TABLE
  `role_users`
MODIFY
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `santri`
--
ALTER TABLE
  `santri`
MODIFY
  `id_santri` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 9;

--
-- AUTO_INCREMENT for table `santri_kelas`
--
ALTER TABLE
  `santri_kelas`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 27;

--
-- AUTO_INCREMENT for table `santri_ruang`
--
ALTER TABLE
  `santri_ruang`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

--
-- AUTO_INCREMENT for table `santri_tahun_ajaran`
--
ALTER TABLE
  `santri_tahun_ajaran`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 4;

--
-- AUTO_INCREMENT for table `santri_tingkat`
--
ALTER TABLE
  `santri_tingkat`
MODIFY
  `id` int(11) NOT NULL AUTO_INCREMENT,
  AUTO_INCREMENT = 5;

--
-- Constraints for dumped tables
--
--
-- Constraints for table `santri`
--
ALTER TABLE
  `santri`
ADD
  CONSTRAINT `santri_ibfk_1` FOREIGN KEY (`kelas_id`) REFERENCES `santri_kelas` (`id`) ON DELETE
SET
  NULL ON UPDATE CASCADE,
ADD
  CONSTRAINT `santri_ibfk_2` FOREIGN KEY (`ruang_id`) REFERENCES `santri_ruang` (`id`) ON DELETE
SET
  NULL ON UPDATE CASCADE,
ADD
  CONSTRAINT `santri_ibfk_3` FOREIGN KEY (`tingkat_id`) REFERENCES `santri_tingkat` (`id`) ON DELETE
SET
  NULL ON UPDATE CASCADE,
ADD
  CONSTRAINT `santri_ibfk_4` FOREIGN KEY (`tahun_ajaran_id`) REFERENCES `santri_tahun_ajaran` (`id`) ON DELETE
SET
  NULL ON UPDATE CASCADE;

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */
;

/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */
;

/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */
;