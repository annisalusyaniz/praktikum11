-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jun 2022 pada 23.45
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_chartcvd`
--
CREATE DATABASE IF NOT EXISTS `db_chartcvd` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_chartcvd`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_country`
--

CREATE TABLE `tb_country` (
  `id_country` int(11) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_country`
--

INSERT INTO `tb_country` (`id_country`, `country`) VALUES
(1, 'India'),
(2, 'South Korea'),
(3, 'Turkey'),
(4, 'Vietnam'),
(5, 'Japan'),
(6, 'Iran'),
(7, 'Indonesia'),
(8, 'Malaysia'),
(9, 'Thailand'),
(10, 'Israel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_total`
--

CREATE TABLE `tb_total` (
  `id_total` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `total_cases` int(25) NOT NULL,
  `total_deaths` int(25) NOT NULL,
  `total_recovered` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_total`
--

INSERT INTO `tb_total` (`id_total`, `id_country`, `total_cases`, `total_deaths`, `total_recovered`) VALUES
(1, 1, 43185049, 524708, 42633365),
(2, 2, 18168708, 24279, 17865591),
(3, 3, 15072747, 98965, 14971256),
(4, 4, 10726045, 43081, 9513981),
(5, 5, 8945784, 30752, 8711289),
(6, 6, 7232790, 141332, 7056206),
(7, 7, 6057142, 156622, 5897022),
(8, 8, 4516319, 35690, 4458999),
(9, 9, 4468955, 30201, 4409248),
(10, 10, 4154566, 10864, 4124933);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_new`
--

CREATE TABLE `tb_new` (
  `id_new` int(11) NOT NULL,
  `id_country` int(11) NOT NULL,
  `new_cases` int(25) NOT NULL,
  `new_deaths` int(25) NOT NULL,
  `new_recovered` int(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_new`
--

INSERT INTO `tb_new` (`id_new`, `id_country`, `new_cases`, `new_deaths`, `new_recovered`) VALUES
(1, 1, 3714, 7, 2513),
(2, 2, 5022, 21, 28085),
(3, 3, 0, 0, 0),
(4, 4, 806, 1, 9026),
(5, 5, 16130, 17, 24361),
(6, 6, 59, 1, 713),
(7, 7, 342, 7, 270),
(8, 8, 1330, 2, 1881),
(9, 9, 2162, 27, 4879),
(10, 10, 2580, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_country`
--
ALTER TABLE `tb_country`
  ADD PRIMARY KEY (`id_country`);

--
-- Indeks untuk tabel `tb_total`
--
ALTER TABLE `tb_total`
  ADD PRIMARY KEY (`id_total`);

--
-- Indeks untuk tabel `tb_new`
--
ALTER TABLE `tb_new`
  ADD PRIMARY KEY (`id_new`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_country`
--
ALTER TABLE `tb_country`
  MODIFY `id_country` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_total`
--
ALTER TABLE `tb_total`
  MODIFY `id_total` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_new`
--
ALTER TABLE `tb_new`
  MODIFY `id_new` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;