-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Apr 2021 pada 18.45
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ukom_esurat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kelas`
--

CREATE TABLE `tbl_kelas` (
  `id_kelas` int(11) NOT NULL,
  `jenjang` enum('XII','XI','X') NOT NULL,
  `jurusan` varchar(50) NOT NULL,
  `jmlh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `nis` decimal(10,0) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `id_kelas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_cetak`
--

CREATE TABLE `tbl_surat_cetak` (
  `IdCetak` int(11) NOT NULL,
  `nomor` varchar(80) NOT NULL,
  `lampiran` varchar(10) NOT NULL,
  `perihal` varchar(100) NOT NULL,
  `tgl_surat` varchar(30) NOT NULL,
  `perusahaan` varchar(200) NOT NULL,
  `almt_perusahaan` varchar(250) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_surat_cetakdetail`
--

CREATE TABLE `tbl_surat_cetakdetail` (
  `id` int(11) NOT NULL,
  `idCetak` int(11) NOT NULL,
  `id_Siswa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(150) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `akses` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tbl_surat_cetak`
--
ALTER TABLE `tbl_surat_cetak`
  ADD PRIMARY KEY (`IdCetak`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tbl_surat_cetakdetail`
--
ALTER TABLE `tbl_surat_cetakdetail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idCetak` (`idCetak`),
  ADD KEY `id_Siswa` (`id_Siswa`);

--
-- Indeks untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_kelas`
--
ALTER TABLE `tbl_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_surat_cetak`
--
ALTER TABLE `tbl_surat_cetak`
  MODIFY `IdCetak` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_surat_cetakdetail`
--
ALTER TABLE `tbl_surat_cetakdetail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD CONSTRAINT `tbl_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tbl_kelas` (`id_kelas`);

--
-- Ketidakleluasaan untuk tabel `tbl_surat_cetak`
--
ALTER TABLE `tbl_surat_cetak`
  ADD CONSTRAINT `tbl_surat_cetak_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `tbl_surat_cetakdetail`
--
ALTER TABLE `tbl_surat_cetakdetail`
  ADD CONSTRAINT `tbl_surat_cetakdetail_ibfk_1` FOREIGN KEY (`idCetak`) REFERENCES `tbl_surat_cetak` (`IdCetak`),
  ADD CONSTRAINT `tbl_surat_cetakdetail_ibfk_2` FOREIGN KEY (`id_Siswa`) REFERENCES `tbl_siswa` (`id_siswa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
