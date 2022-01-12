-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2022 pada 14.24
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.3.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_pgascom`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_boking_tiket`
--

CREATE TABLE `tb_boking_tiket` (
  `id` varchar(100) NOT NULL,
  `id_rute` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `token` varchar(100) DEFAULT NULL,
  `token_verifikasi` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `status_boking` enum('proses','valid','unvalid') NOT NULL,
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_boking_tiket`
--

INSERT INTO `tb_boking_tiket` (`id`, `id_rute`, `id_user`, `token`, `token_verifikasi`, `created_at`, `status_boking`, `updated_at`) VALUES
('BTKT-00001', 2, 1, 'Csgd2', 'Csgd2', '2022-01-11 08:09:18', 'valid', '2022-01-11 15:32:06'),
('BTKT-00002', 3, 2, 'asdada', NULL, '2022-01-11 21:08:34', 'proses', '2022-01-11 21:29:16'),
('BTKT-00003', 2, 2, '6a0ed9b8', NULL, '2022-01-12 11:49:02', 'proses', '2022-01-12 11:49:02'),
('BTKT-00004', 2, 2, '8f1072cb', NULL, '2022-01-12 12:20:37', 'proses', '2022-01-12 12:20:37'),
('BTKT-00005', 3, 2, 'a69d3f06', NULL, '2022-01-12 12:59:23', 'valid', '2022-01-12 12:59:23'),
('BTKT-00006', 3, 2, 'f5ab5d7b', NULL, '2022-01-12 01:09:14', 'proses', '2022-01-12 01:09:14'),
('BTKT-00007', 3, 2, '5f5204c6', NULL, '2022-01-12 01:14:10', 'proses', '2022-01-12 01:14:10'),
('BTKT-00008', 3, 2, '0baf86b9', NULL, '2022-01-12 01:14:55', 'valid', '2022-01-12 13:35:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_boking`
--

CREATE TABLE `tb_detail_boking` (
  `id` varchar(100) NOT NULL,
  `id_boking_tiket` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` enum('laki-laki','perempuan') NOT NULL,
  `status_tiket` enum('istri','anak','rekan_kerja','pribadi','suami') NOT NULL,
  `status_boking` enum('valid','proses','unvalid') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_boking`
--

INSERT INTO `tb_detail_boking` (`id`, `id_boking_tiket`, `nama`, `alamat`, `jenis_kelamin`, `status_tiket`, `status_boking`) VALUES
('TKT-00001', 'BTKT-00001', 'Rani', 'Bandung', 'perempuan', 'rekan_kerja', 'proses'),
('TKT-00002', 'BTKT-00001', 'Usep Gunawan', 'Bandung', 'laki-laki', 'pribadi', 'proses'),
('TKT-00003', 'BTKT-00002', 'Oktaviani', 'Bandung', 'perempuan', 'pribadi', 'proses'),
('TKT-16419862152476', 'BTKT-00004', 'sds', 'sds', 'laki-laki', 'pribadi', 'proses'),
('TKT-16419862152503', 'BTKT-00004', 'ss', 'ssw', 'perempuan', 'pribadi', 'proses'),
('TKT-16419887631811', 'BTKT-00005', 'beto', 'hah', 'perempuan', 'suami', 'valid'),
('TKT-16419893540545', 'BTKT-00006', 'Afa', 'fafs', 'laki-laki', 'rekan_kerja', 'valid'),
('TKT-16419893540592', 'BTKT-00006', 'gaaga', 'adsf', 'laki-laki', 'rekan_kerja', 'valid'),
('TKT-16419896505843', 'BTKT-00007', 'ahahah', 'gagaga', 'laki-laki', 'pribadi', 'valid'),
('TKT-16419896959211', 'BTKT-00008', 'fgdg', 'fdfd', 'perempuan', 'pribadi', 'valid');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kota`
--

CREATE TABLE `tb_kota` (
  `id` int(11) NOT NULL,
  `nama_kota` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_kota`
--

INSERT INTO `tb_kota` (`id`, `nama_kota`) VALUES
(1, 'Surabaya'),
(4, 'Jakarta'),
(5, 'Bandung'),
(6, 'Banyuwangi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_moda_transportasi`
--

CREATE TABLE `tb_moda_transportasi` (
  `id` int(11) NOT NULL,
  `nama_transportasi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_moda_transportasi`
--

INSERT INTO `tb_moda_transportasi` (`id`, `nama_transportasi`) VALUES
(1, 'Bus'),
(3, 'Kereta'),
(4, 'Kapal Laut');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rute`
--

CREATE TABLE `tb_rute` (
  `id` int(11) NOT NULL,
  `id_mode_transportasi` int(11) NOT NULL,
  `id_kota_asal` int(11) NOT NULL,
  `id_kota_tujuan` int(11) NOT NULL,
  `tanggal_keberangkatan` datetime NOT NULL DEFAULT current_timestamp(),
  `tanggal_sampai` datetime NOT NULL DEFAULT current_timestamp(),
  `slot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rute`
--

INSERT INTO `tb_rute` (`id`, `id_mode_transportasi`, `id_kota_asal`, `id_kota_tujuan`, `tanggal_keberangkatan`, `tanggal_sampai`, `slot`) VALUES
(2, 3, 5, 1, '2022-01-12 07:53:00', '2022-01-12 09:54:00', 3),
(3, 4, 4, 6, '2022-01-01 08:07:00', '2023-02-13 08:05:00', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `password` longtext NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `foto` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `email`, `nip`, `nama`, `alamat`, `password`, `level`, `foto`) VALUES
(1, 'usepgnwan@gmail.com', '123456', 'usep gunawan', 'bandung', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'admin', NULL),
(2, 'rani@gmail.com', '123456', 'rani', 'bandung', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'user', NULL),
(3, 'Aju@gmail.com', '12345353', 'AJU', 'Bandung', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'user', NULL),
(4, 'arial@gmail.com', '1323232', 'arial', 'jakarta', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'user', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_boking_tiket`
--
ALTER TABLE `tb_boking_tiket`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_detail_boking`
--
ALTER TABLE `tb_detail_boking`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_kota`
--
ALTER TABLE `tb_kota`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_moda_transportasi`
--
ALTER TABLE `tb_moda_transportasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_rute`
--
ALTER TABLE `tb_rute`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kota`
--
ALTER TABLE `tb_kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_moda_transportasi`
--
ALTER TABLE `tb_moda_transportasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_rute`
--
ALTER TABLE `tb_rute`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
