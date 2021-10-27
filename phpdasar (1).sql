-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Okt 2021 pada 08.27
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpdasar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `nim` char(10) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jurusan` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id`, `nama`, `nim`, `email`, `jurusan`, `gambar`) VALUES
(1, 'Gede Yuda Aditya', '2015051003', 'yuda.aditya@undiksha.ac.id', 'Teknik Informatika', '6032749527134.jpg'),
(2, 'Ketut Youngky', '1232421223', 'youngky@gmail.com', 'Teknik Informatika', '60327539dfc3a.jpg'),
(3, 'Anak Kecil', '2005051005', 'anak@gmail.com', 'Teknik Mesin', '6032757986ddb.gif'),
(4, 'Niko Nikoni', '1927129322', 'niko@gmail.com', 'Teknik Mesin', '603275a22b74a.jpg'),
(5, 'Asima', '1927129376', 'asima@gmail.com', 'Teknik Informatika', '603275d802b29.jpg'),
(10, 'Asima Soni C', '1111111111', 'akun9592@gmail.com', 'Teknik Informatika', '60e7e72ea8a75.png'),
(11, 'asd11', '1232421212', 'akun9592@gmail.com', 'Teknik Elekro', '60e7ea0656123.png'),
(12, 'Asima asas', '2015051333', 'akun9592@gmail.com', 'Teknik Mesin', '60e7eed7d8558.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'gede yuda aditya', '$2y$10$oM.hqfpY15TzcES.Qv9duOgAhBm3st5hLWPUw/xQ4u8Slc9h4UrFm'),
(2, 'admin', '$2y$10$ynZGUBnqGrCuNk331fkqLeqcjLMJ/9OiysYYsOGs5OT7P0OVT4nhW'),
(3, 'kenyot', '$2y$10$B3npBGNTQehr2cZBzecYX.x5RMhvF3psS5Nv7TwLXogH67dVXBchK'),
(4, 'integer', '$2y$10$16H5LnzrHq0.5cSbrhGGmeKEblpp5haAuImE1pz2j2N1vvJKSDZ4O');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
