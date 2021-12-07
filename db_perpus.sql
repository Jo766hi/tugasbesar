-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2021 pada 16.51
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpus`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `buku_id` int(10) UNSIGNED NOT NULL,
  `buku_judul` varchar(50) NOT NULL,
  `kategori_id` int(11) UNSIGNED NOT NULL,
  `buku_deskripsi` text DEFAULT NULL,
  `buku_jumlah` int(11) UNSIGNED NOT NULL,
  `buku_cover` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`buku_id`, `buku_judul`, `kategori_id`, `buku_deskripsi`, `buku_jumlah`, `buku_cover`) VALUES
(9, 'Narnia', 1, 'Author : C.S Lewis', 27, 'pict5.jpg'),
(10, 'The Two Towers', 1, 'Author : J.R.R Tolkien', 14, 'pict6.jpg'),
(11, 'Harry Potter', 1, 'Author : J.K Rowling', 30, 'pict7.jpg'),
(13, 'Milk and Honey', 1, 'Author : Rupi Kaur', 9, 'pict8.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(10) UNSIGNED NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_nama`) VALUES
(1, 'Fiksi'),
(12, 'Non Fiksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali`
--

CREATE TABLE `kembali` (
  `kembali_id` int(11) UNSIGNED NOT NULL,
  `pinjam_id` int(11) UNSIGNED NOT NULL,
  `tgl_kembali` date NOT NULL,
  `denda` double UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam`
--

CREATE TABLE `pinjam` (
  `pinjam_id` int(10) UNSIGNED NOT NULL,
  `buku_id` int(11) UNSIGNED NOT NULL,
  `anggota_id` int(11) UNSIGNED NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_jatuh_tempo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jk` varchar(50) NOT NULL,
  `telp` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('petugas','anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `nama`, `jk`, `telp`, `password`, `level`) VALUES
(9, 'dywdgyew', 'hbddweyi@gmail.com', 'jkhsdcuigf', 'L', '72376', 'wkbffuiwe', 'petugas'),
(10, 'lapet', 'lapet@gmail.com', 'lapet', 'L', '1234567', 'lapet', 'anggota'),
(11, 'melati', 'melati@gmail.com', 'melati', 'P', '12345678', '27e80ebc907bd57004986be9e6f2dd83', 'petugas');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`buku_id`),
  ADD KEY `kategori_id` (`kategori_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Indeks untuk tabel `kembali`
--
ALTER TABLE `kembali`
  ADD PRIMARY KEY (`kembali_id`),
  ADD KEY `pinjam_id` (`pinjam_id`);

--
-- Indeks untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  ADD PRIMARY KEY (`pinjam_id`),
  ADD KEY `anggota_id` (`anggota_id`),
  ADD KEY `buku_id` (`buku_id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `buku_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kembali`
--
ALTER TABLE `kembali`
  MODIFY `kembali_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pinjam`
--
ALTER TABLE `pinjam`
  MODIFY `pinjam_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
