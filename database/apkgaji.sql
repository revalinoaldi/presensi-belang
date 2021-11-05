-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Okt 2021 pada 13.31
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apkgaji`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_detil_tunjangan_setting`
--

CREATE TABLE `tbl_detil_tunjangan_setting` (
  `id_detil` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `id_tunjangan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_detil_tunjangan_setting`
--

INSERT INTO `tbl_detil_tunjangan_setting` (`id_detil`, `id_jabatan`, `id_tunjangan`) VALUES
(1, 1, 3),
(2, 1, 2),
(3, 1, 1),
(4, 2, 6),
(5, 2, 3),
(6, 2, 2),
(7, 2, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_gaji_kotor`
--

CREATE TABLE `tbl_gaji_kotor` (
  `id_gaji` int(11) NOT NULL,
  `id_pendapatan` int(11) NOT NULL,
  `tgl_terima_gaji` int(11) NOT NULL,
  `gp` int(11) NOT NULL,
  `total_gaji` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_jns_tunjangan`
--

CREATE TABLE `tbl_jns_tunjangan` (
  `id_tunjangan` int(11) NOT NULL,
  `jns_tunjangan` varchar(20) NOT NULL,
  `tipe_tunjangan` enum('tetap','opsional') NOT NULL,
  `total_tunjangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_jns_tunjangan`
--

INSERT INTO `tbl_jns_tunjangan` (`id_tunjangan`, `jns_tunjangan`, `tipe_tunjangan`, `total_tunjangan`) VALUES
(1, 'Tunjangan Jabatan', 'tetap', 300000),
(2, 'Tunjangan Rumah', 'tetap', 75000),
(3, 'Tunjangan kerjapenuh', 'opsional', 30000),
(4, 'Tunjangan shift2', 'opsional', 14000),
(5, 'Tunjangan shift3', 'opsional', 17000),
(6, 'Tunjangan Transporta', 'opsional', 50000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_lemburan`
--

CREATE TABLE `tbl_lemburan` (
  `id_lembur` int(11) NOT NULL,
  `id_lemburan` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  `total_jam` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pendapatan_karyawan`
--

CREATE TABLE `tbl_pendapatan_karyawan` (
  `id_pendapatan` int(11) NOT NULL,
  `nip` char(14) NOT NULL,
  `total_gp` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_tunjangan_karyawan`
--

CREATE TABLE `tbl_tunjangan_karyawan` (
  `id_tk` int(11) NOT NULL,
  `id_gaji` int(11) NOT NULL,
  `id_tunjangan` int(11) NOT NULL,
  `total_tunjangan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `username` varchar(64) NOT NULL,
  `password` varchar(225) NOT NULL,
  `avatar` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `email`, `username`, `password`, `avatar`, `created_at`, `last_login`) VALUES
(1, 'via', 'viaardiani507@gmail.com', 'viaardiani507', '$2y$10$BMNra/uQGHE7IC00W/oVgesSM6Vevlp88Nb0G5A1Y0ZmTdg/do88i', '', '2021-10-05 06:14:21', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_detil_tunjangan_setting`
--
ALTER TABLE `tbl_detil_tunjangan_setting`
  ADD PRIMARY KEY (`id_detil`),
  ADD KEY `id_tunjangan` (`id_tunjangan`),
  ADD KEY `id_jabatan` (`id_jabatan`);

--
-- Indeks untuk tabel `tbl_gaji_kotor`
--
ALTER TABLE `tbl_gaji_kotor`
  ADD PRIMARY KEY (`id_gaji`),
  ADD KEY `id_pendapatan` (`id_pendapatan`);

--
-- Indeks untuk tabel `tbl_jns_tunjangan`
--
ALTER TABLE `tbl_jns_tunjangan`
  ADD PRIMARY KEY (`id_tunjangan`);

--
-- Indeks untuk tabel `tbl_lemburan`
--
ALTER TABLE `tbl_lemburan`
  ADD PRIMARY KEY (`id_lembur`),
  ADD KEY `id_gaji` (`id_gaji`);

--
-- Indeks untuk tabel `tbl_pendapatan_karyawan`
--
ALTER TABLE `tbl_pendapatan_karyawan`
  ADD PRIMARY KEY (`id_pendapatan`);

--
-- Indeks untuk tabel `tbl_tunjangan_karyawan`
--
ALTER TABLE `tbl_tunjangan_karyawan`
  ADD PRIMARY KEY (`id_tk`),
  ADD KEY `id_gaji` (`id_gaji`),
  ADD KEY `id_tunjangan` (`id_tunjangan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_detil_tunjangan_setting`
--
ALTER TABLE `tbl_detil_tunjangan_setting`
  MODIFY `id_detil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_gaji_kotor`
--
ALTER TABLE `tbl_gaji_kotor`
  MODIFY `id_gaji` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_jns_tunjangan`
--
ALTER TABLE `tbl_jns_tunjangan`
  MODIFY `id_tunjangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tbl_lemburan`
--
ALTER TABLE `tbl_lemburan`
  MODIFY `id_lembur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_pendapatan_karyawan`
--
ALTER TABLE `tbl_pendapatan_karyawan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_tunjangan_karyawan`
--
ALTER TABLE `tbl_tunjangan_karyawan`
  MODIFY `id_tk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_detil_tunjangan_setting`
--
ALTER TABLE `tbl_detil_tunjangan_setting`
  ADD CONSTRAINT `tbl_detil_tunjangan_setting_ibfk_1` FOREIGN KEY (`id_tunjangan`) REFERENCES `tbl_jns_tunjangan` (`id_tunjangan`);

--
-- Ketidakleluasaan untuk tabel `tbl_gaji_kotor`
--
ALTER TABLE `tbl_gaji_kotor`
  ADD CONSTRAINT `tbl_gaji_kotor_ibfk_1` FOREIGN KEY (`id_pendapatan`) REFERENCES `tbl_pendapatan_karyawan` (`id_pendapatan`);

--
-- Ketidakleluasaan untuk tabel `tbl_lemburan`
--
ALTER TABLE `tbl_lemburan`
  ADD CONSTRAINT `tbl_lemburan_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `tbl_gaji_kotor` (`id_gaji`);

--
-- Ketidakleluasaan untuk tabel `tbl_tunjangan_karyawan`
--
ALTER TABLE `tbl_tunjangan_karyawan`
  ADD CONSTRAINT `tbl_tunjangan_karyawan_ibfk_1` FOREIGN KEY (`id_gaji`) REFERENCES `tbl_gaji_kotor` (`id_gaji`),
  ADD CONSTRAINT `tbl_tunjangan_karyawan_ibfk_2` FOREIGN KEY (`id_tunjangan`) REFERENCES `tbl_jns_tunjangan` (`id_tunjangan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
