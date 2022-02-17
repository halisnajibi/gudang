-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Feb 2022 pada 14.07
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gudang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `brg_keluar`
--

CREATE TABLE `brg_keluar` (
  `id_bk` int(11) NOT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `id_karyawan` int(11) NOT NULL,
  `tanggal` timestamp NULL DEFAULT current_timestamp(),
  `qty_keluar` varchar(10) DEFAULT NULL,
  `penerima` varchar(50) DEFAULT NULL,
  `keterangan_keluar` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `brg_masuk`
--

CREATE TABLE `brg_masuk` (
  `id_bm` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `tanggal` datetime DEFAULT current_timestamp(),
  `qty_masuk` varchar(10) NOT NULL,
  `keterangan_masuk` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_gudang`
--

CREATE TABLE `data_gudang` (
  `id_gudang` int(11) NOT NULL,
  `kd_gudang` char(10) DEFAULT NULL,
  `nama_gudang` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `id_karyawan` int(11) NOT NULL,
  `kd_karyawan` char(10) DEFAULT NULL,
  `nama_karyawan` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telepon` char(12) DEFAULT NULL,
  `alamat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasok`
--

CREATE TABLE `pemasok` (
  `id_pemasok` int(11) NOT NULL,
  `kd_pemasok` char(10) DEFAULT NULL,
  `nama_pemasok` varchar(50) DEFAULT NULL,
  `telepon_pemasok` char(12) DEFAULT NULL,
  `alamat_pemasok` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) NOT NULL,
  `nama_Satuan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok`
--

CREATE TABLE `stok` (
  `id_barang` int(11) NOT NULL,
  `id_gudang` int(11) DEFAULT NULL,
  `id_pemasok` int(11) DEFAULT NULL,
  `id_satuan` int(11) DEFAULT NULL,
  `kode_barang` varchar(10) DEFAULT NULL,
  `nama_barang` varchar(50) DEFAULT NULL,
  `jumlah` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD PRIMARY KEY (`id_bk`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `brg_keluar_ibfk_2` (`id_karyawan`);

--
-- Indeks untuk tabel `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD PRIMARY KEY (`id_bm`),
  ADD KEY `t_brg` (`id_barang`);

--
-- Indeks untuk tabel `data_gudang`
--
ALTER TABLE `data_gudang`
  ADD PRIMARY KEY (`id_gudang`);

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indeks untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  ADD PRIMARY KEY (`id_pemasok`);

--
-- Indeks untuk tabel `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indeks untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_gudang` (`id_gudang`),
  ADD KEY `id_pemasok` (`id_pemasok`),
  ADD KEY `id_satuan` (`id_satuan`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `brg_keluar`
--
ALTER TABLE `brg_keluar`
  MODIFY `id_bk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `brg_masuk`
--
ALTER TABLE `brg_masuk`
  MODIFY `id_bm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT untuk tabel `data_gudang`
--
ALTER TABLE `data_gudang`
  MODIFY `id_gudang` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id_karyawan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pemasok`
--
ALTER TABLE `pemasok`
  MODIFY `id_pemasok` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stok`
--
ALTER TABLE `stok`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `brg_keluar`
--
ALTER TABLE `brg_keluar`
  ADD CONSTRAINT `brg_keluar_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `stok` (`id_barang`),
  ADD CONSTRAINT `brg_keluar_ibfk_2` FOREIGN KEY (`id_karyawan`) REFERENCES `karyawan` (`id_karyawan`);

--
-- Ketidakleluasaan untuk tabel `brg_masuk`
--
ALTER TABLE `brg_masuk`
  ADD CONSTRAINT `k_stok` FOREIGN KEY (`id_barang`) REFERENCES `stok` (`id_barang`);

--
-- Ketidakleluasaan untuk tabel `stok`
--
ALTER TABLE `stok`
  ADD CONSTRAINT `stok_ibfk_1` FOREIGN KEY (`id_gudang`) REFERENCES `data_gudang` (`id_gudang`),
  ADD CONSTRAINT `stok_ibfk_2` FOREIGN KEY (`id_pemasok`) REFERENCES `pemasok` (`id_pemasok`),
  ADD CONSTRAINT `stok_ibfk_3` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
