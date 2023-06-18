-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 10, 2023 at 08:55 PM
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
-- Database: `raport_sd`
--

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id_guru` int(11) NOT NULL,
  `nama_guru` varchar(100) NOT NULL,
  `nip_guru` int(11) NOT NULL,
  `jk_guru` varchar(11) NOT NULL,
  `status_guru` varchar(25) NOT NULL,
  `status_kepegawaian_guru` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id_guru`, `nama_guru`, `nip_guru`, `jk_guru`, `status_guru`, `status_kepegawaian_guru`) VALUES
(1, 'Apip, S.Ag', 12345678, 'L', 'WALI KELAS', 'GTT'),
(2, 'Suka', 11111, 'L', 'WALI KELAS', 'PNS'),
(6, 'Sopan', 123456, 'L', 'GURU AKTIF', 'PNS');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id_kelas` int(11) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL,
  `nama_wali_kelas` varchar(50) NOT NULL,
  `nip_guru` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `nama_kelas`, `nama_wali_kelas`, `nip_guru`) VALUES
(1, '1', 'Apip, S.Ag', 12345678),
(2, '2', 'Suka', 11111),
(3, '3', '', 0),
(4, '4', '', 0),
(6, '5', 'A', 0),
(9, '6', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id_mapel` int(11) NOT NULL,
  `nama_mapel` varchar(50) NOT NULL,
  `kode_mapel` varchar(25) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `nama_guru` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id_mapel`, `nama_mapel`, `kode_mapel`, `id_semester`, `nama_guru`) VALUES
(1, 'Pendidikan Agama dan Budi Pekerti', 'A', 1, 'Suka'),
(3, 'Pendidikan Pancasila dan Kewarganegaraan', 'A', 2, 'ABC');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `nama_siswa` varchar(50) NOT NULL,
  `nisn` int(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `id_semester` int(11) NOT NULL,
  `tahun_ajar` varchar(25) NOT NULL,
  `nama_mapel` varchar(150) NOT NULL,
  `spiritual` text NOT NULL,
  `sosial` text NOT NULL,
  `nilai_pengetahuan` int(3) NOT NULL,
  `ket_pengetahuan` text NOT NULL,
  `nilai_ketrampilan` int(3) NOT NULL,
  `ket_ketrampilan` text NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `tinggi2` int(3) NOT NULL,
  `berat2` int(3) NOT NULL,
  `penglihatan` varchar(50) NOT NULL,
  `pendengaran` varchar(50) NOT NULL,
  `gigi` varchar(50) NOT NULL,
  `kesenian` varchar(50) NOT NULL,
  `olahraga` varchar(50) NOT NULL,
  `saran` text NOT NULL,
  `ekstra` varchar(50) NOT NULL,
  `ktrg_nekstra` text NOT NULL,
  `sakit` int(2) NOT NULL,
  `izin` int(2) NOT NULL,
  `alfa` int(2) NOT NULL,
  `keputusan` varchar(50) NOT NULL,
  `kd_raport` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `nama_siswa`, `nisn`, `nis`, `nama_kelas`, `id_semester`, `tahun_ajar`, `nama_mapel`, `spiritual`, `sosial`, `nilai_pengetahuan`, `ket_pengetahuan`, `nilai_ketrampilan`, `ket_ketrampilan`, `tinggi`, `berat`, `tinggi2`, `berat2`, `penglihatan`, `pendengaran`, `gigi`, `kesenian`, `olahraga`, `saran`, `ekstra`, `ktrg_nekstra`, `sakit`, `izin`, `alfa`, `keputusan`, `kd_raport`) VALUES
(236, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'b', 'b', 90, 'a', 80, 'b', 1, 1, 0, 0, 'b', 'a', 'c', 'd', 'e', 'asddfgf', 'e', 'f', 0, 0, 0, 'Naik', '1543'),
(237, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'b', 'b', 60, 'c', 70, 'd', 1, 1, 0, 0, 'b', 'a', 'c', 'd', 'e', 'asddfgf', 'e', 'f', 0, 0, 0, 'Naik', '1543'),
(238, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'a', 'b', 90, '', 80, '', 1, 1, 0, 0, 'a', 'a', 'a', 'b', 'b', 'asdas', 'a', 'b', 0, 0, 0, 'Naik', '1948'),
(239, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'a', 'b', 70, '', 60, '', 1, 1, 0, 0, 'a', 'a', 'a', 'b', 'b', 'asdas', 'a', 'b', 0, 0, 0, 'Naik', '1948'),
(244, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'a', 'b', 90, '', 80, '', 1, 1, 0, 0, 'a', 'a', 'a', 'b', 'b', 'asdas', 'a', 'b', 0, 0, 0, 'Naik', '1549'),
(245, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'a', 'b', 70, '', 60, '', 1, 1, 0, 0, 'a', 'a', 'a', 'b', 'b', 'asdas', 'a', 'b', 0, 0, 0, 'Naik', '1549'),
(246, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'a', 'b', 90, '', 80, '', 1, 1, 0, 0, 'a', 'a', 'a', 'b', 'b', 'asdas', 'a', 'b', 0, 0, 0, 'Naik', '1922'),
(247, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'a', 'b', 70, '', 60, '', 1, 1, 0, 0, 'a', 'a', 'a', 'b', 'b', 'asdas', 'a', 'b', 0, 0, 0, 'Naik', '1922'),
(248, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'a', 'b', 90, '', 80, '', 1, 1, 0, 0, 'a', 'a', 'a', 'b', 'b', 'asdas', 'a', 'b', 0, 0, 0, 'Naik', '1569'),
(249, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'a', 'b', 70, '', 60, '', 1, 1, 0, 0, 'a', 'a', 'a', 'b', 'b', 'asdas', 'a', 'b', 0, 0, 0, 'Naik', '1569'),
(260, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'a', 'b', 90, '', 80, '', 1, 1, 0, 0, 'a', 'a', 'a', 'b', 'b', 'asdas', 'a', 'b', 0, 0, 0, 'Naik', '1686'),
(261, 'Ade Heri', 22221, '1234567', '1', 2, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'a', 'b', 70, '', 60, '', 1, 1, 0, 0, 'a', 'a', 'a', 'b', 'b', 'asdas', 'a', 'b', 0, 0, 0, 'Naik', '1686'),
(262, 'Ahmad', 22221, '1122334', '4', 2, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'baik', 'baik', 90, '', 60, '', 145, 46, 0, 0, 'baik', 'Baik', 'baik', 'tari', 'bola', 'perbaiki', 'Pramuka', 'kurang', 0, 0, 0, 'Tingal Kelas', '1501'),
(263, 'Ahmad', 22221, '1122334', '4', 2, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'baik', 'baik', 40, '', 20, '', 145, 46, 0, 0, 'baik', 'Baik', 'baik', 'tari', 'bola', 'perbaiki', 'Pramuka', 'kurang', 0, 0, 0, 'Tingal Kelas', '1501'),
(264, 'Ahmad', 22221, '1122334', '4', 1, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'baik', 'baik', 90, 'baik', 40, 'kurang', 140, 38, 0, 0, 'baik', 'baik', 'baik', 'tari', 'bola', 'tingkatkan', 'osis', 'baik', 0, 0, 0, '', '1492'),
(265, 'Ahmad', 22221, '1122334', '4', 1, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'baik', 'baik', 20, 'baik', 0, 'kurang', 140, 38, 0, 0, 'baik', 'baik', 'baik', 'tari', 'bola', 'tingkatkan', 'osis', 'baik', 0, 0, 0, '', '1492'),
(266, 'Ahmad', 22221, '1122334', '4', 1, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'baik', 'baik', 90, 'baik', 40, 'kurang', 140, 38, 0, 0, 'baik', 'baik', 'baik', 'tari', 'bola', 'tingkatkan', 'osis', 'baik', 0, 0, 0, '', '1315'),
(267, 'Ahmad', 22221, '1122334', '4', 1, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'baik', 'baik', 20, 'baik', 0, 'kurang', 140, 38, 0, 0, 'baik', 'baik', 'baik', 'tari', 'bola', 'tingkatkan', 'osis', 'baik', 0, 0, 0, '', '1315'),
(268, 'Ahmad', 22221, '1122334', '4', 2, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'baik', 'baik', 90, 'baik', 80, 'baik', 139, 49, 140, 47, 'baik', 'baik', 'baik', 'tari', 'bulutangkis', 'baik', 'osis', 'baik', 0, 0, 0, 'Naik', '1822'),
(269, 'Ahmad', 22221, '1122334', '4', 2, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'baik', 'baik', 80, 'baik', 80, 'baik', 139, 49, 140, 47, 'baik', 'baik', 'baik', 'tari', 'bulutangkis', 'baik', 'osis', 'baik', 0, 0, 0, 'Naik', '1822'),
(270, 'Ahmad', 22221, '1122334', '4', 2, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'baik', 'baik', 90, 'baik', 80, 'baik', 139, 49, 140, 47, 'baik', 'baik', 'baik', 'tari', 'bulutangkis', 'baik', 'osis', 'baik', 0, 0, 0, 'Naik', '1878'),
(271, 'Ahmad', 22221, '1122334', '4', 2, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'baik', 'baik', 80, 'baik', 80, 'baik', 139, 49, 140, 47, 'baik', 'baik', 'baik', 'tari', 'bulutangkis', 'baik', 'osis', 'baik', 0, 0, 0, 'Naik', '1878'),
(272, 'Ahmad', 22221, '1122334', '2', 2, '2022/2023', ' Pendidikan Agama dan Budi Pekerti', 'b', 'b', 90, 'baik', 70, 'baik', 144, 45, 145, 44, 'b', 'b', 'b', 'tari', 'bola', 'c', 'a', 'b', 0, 0, 0, 'Naik', '1440'),
(273, 'Ahmad', 22221, '1122334', '2', 2, '2022/2023', ' Pendidikan Pancasila dan Kewarganegaraan', 'b', 'b', 70, 'baik', 70, 'baik', 144, 45, 145, 44, 'b', 'b', 'b', 'tari', 'bola', 'c', 'a', 'b', 0, 0, 0, 'Naik', '1440');

-- --------------------------------------------------------

--
-- Table structure for table `profil`
--

CREATE TABLE `profil` (
  `id_profil` int(11) NOT NULL,
  `nama_sekolah` varchar(50) NOT NULL,
  `npsn` int(11) NOT NULL,
  `jenjang` varchar(25) NOT NULL,
  `akreditasi` varchar(2) NOT NULL,
  `alamat` text NOT NULL,
  `nama_kepsek` varchar(50) NOT NULL,
  `nip_kepsek` varchar(25) NOT NULL,
  `pangkat_kepsek` varchar(25) NOT NULL,
  `jabatan_kepsek` varchar(25) NOT NULL,
  `alamat_kepsek` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `profil`
--

INSERT INTO `profil` (`id_profil`, `nama_sekolah`, `npsn`, `jenjang`, `akreditasi`, `alamat`, `nama_kepsek`, `nip_kepsek`, `pangkat_kepsek`, `jabatan_kepsek`, `alamat_kepsek`) VALUES
(1, 'SDN 2 Pringanom', 1234567, 'SD', 'C', 'Sragen', 'Alucard, S.Pd, MM', '112233445566', 'Pembina/ IVa', 'Kepala Sekolah', 'Sragen');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id_siswa` int(11) NOT NULL,
  `nama_siswa` varchar(100) NOT NULL,
  `alamat_siswa` varchar(250) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `kerja_ayah` varchar(25) NOT NULL,
  `kerja_ibu` varchar(25) NOT NULL,
  `agama_siswa` varchar(20) NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `nisn` int(15) NOT NULL,
  `nis` int(11) NOT NULL,
  `tempat_lahir_siswa` varchar(50) NOT NULL,
  `tanggal_lahir_siswa` date NOT NULL,
  `nama_kelas` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id_siswa`, `nama_siswa`, `alamat_siswa`, `nama_ayah`, `nama_ibu`, `kerja_ayah`, `kerja_ibu`, `agama_siswa`, `jenis_kelamin`, `nisn`, `nis`, `tempat_lahir_siswa`, `tanggal_lahir_siswa`, `nama_kelas`) VALUES
(2, 'Ade Heri', 'kono', 'a', 'b', 'b', 'd', 'Islam', 'L', 22221, 1234567, 'byl', '2022-10-06', '1'),
(3, 'Ahmad', 'sini', 'a', 'b', 'c', 'd', 'Islam', 'L', 22221, 1122334, 'Byl', '2022-10-13', '2');

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajar`
--

CREATE TABLE `tahun_ajar` (
  `id` int(11) NOT NULL,
  `tahun_ajar` varchar(25) NOT NULL,
  `semester` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tahun_ajar`
--

INSERT INTO `tahun_ajar` (`id`, `tahun_ajar`, `semester`) VALUES
(1, '2022/2023', 1),
(4, '2022/2023', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `kelas` varchar(3) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `username`, `password`, `level`, `nama`, `foto`, `kelas`, `id`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, 'Administrator', '', '', 0),
(2, 'apip', '5afc731a4d5274f52c9bf71be129b609', 2, 'Apip, S.Ag', 'Foto_formal_merah-min.jpg', '1', 0),
(5, 'ade', 'a562cfa07c2b1213b3a5c99b756fc206', 3, 'Ade Heri', '', '3', 0),
(6, 'suka', '202cb962ac59075b964b07152d234b70', 2, 'suka', '', '2', 11111),
(7, 'ahmad', '202cb962ac59075b964b07152d234b70', 3, 'Ahmad', '', '4', 1122334);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id_guru`),
  ADD UNIQUE KEY `nip_guru` (`nip_guru`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id_mapel`),
  ADD KEY `id_semester` (`id_semester`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `nama_kelas` (`nama_kelas`);

--
-- Indexes for table `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id_guru` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id_mapel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=274;

--
-- AUTO_INCREMENT for table `profil`
--
ALTER TABLE `profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tahun_ajar`
--
ALTER TABLE `tahun_ajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
