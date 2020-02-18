-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Feb 2020 pada 11.28
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
-- Database: `kantoran`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `kode_divisi` int(11) NOT NULL,
  `desk_divisi` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`kode_divisi`, `desk_divisi`) VALUES
(1, 'HRD'),
(2, 'Administrasi Keuangan'),
(3, 'Marketing'),
(4, 'Produksi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `karyawan`
--

CREATE TABLE `karyawan` (
  `idkaryawan` int(11) NOT NULL,
  `namakaryawan` varchar(255) NOT NULL,
  `tanggallahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL,
  `lamabekerja` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `karyawan`
--

INSERT INTO `karyawan` (`idkaryawan`, `namakaryawan`, `tanggallahir`, `alamat`, `jabatan`, `lamabekerja`) VALUES
(3, 'farhan', '2020-01-01', 'Biawu', 'Project Manager', '3 bulan'),
(8, 'cek', '2020-01-01', 'najds', 'ewrfif', 'njfdkv'),
(9, 'kopi', '2023-02-02', 'taman siswa', 'Terserah', 'terserah'),
(10, 'Enno', '2023-02-02', 'taman siswa', 'Chef', '3 minggu'),
(11, 'Ucup', '2004-09-21', 'Burangrang', 'IT', '2 bulan'),
(12, '', '0000-00-00', '', '', ''),
(13, '', '0000-00-00', '', '', ''),
(14, '', '0000-00-00', '', '', ''),
(15, 'yayan', '2020-02-12', 'taman siswa', 'Project Manager', '3 tahun'),
(16, 'ucok', '2020-02-12', 'taman siswa', 'Project Manager', '3 tahun');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `nik` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempattinggal` varchar(40) NOT NULL,
  `jenis_kelamin` varchar(40) NOT NULL,
  `agama` varchar(40) NOT NULL,
  `alamat` varchar(40) NOT NULL,
  `notelp` varchar(40) NOT NULL,
  `desk_divisi` varchar(255) NOT NULL,
  `foto` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`nik`, `nama`, `tempattinggal`, `jenis_kelamin`, `agama`, `alamat`, `notelp`, `desk_divisi`, `foto`) VALUES
(34, 'Fin', 'Tidak Diketahui', 'PRIA', 'Kristen', 'Tidak Diketahui', '555555555', 'Manajer Naura', 'sample.jpg'),
(38, 'cek', 'cek', 'PRIA', 'Islam', 'cek', '8555', 'Administrasi Keuangan', 'sample.jpg'),
(39, 'cek', 'cek', 'WANITA', 'Islam', 'cek', '8555', 'Administrasi Keuangan', 'sample.jpg'),
(53, 'cek', 'cek', 'PRIA', 'Islam', 'cek', '8555', 'Administrasi Keuangan', 'sample.jpg'),
(62, 'cek', 'cek', 'PRIA', 'Islam', 'cek', '8555', 'Administrasi Keuangan', 'sample.jpg'),
(63, 'cek', 'cek', 'PRIA', 'Islam', 'cek', '8555', 'Administrasi Keuangan', 'sample.jpg'),
(64, 'cek', 'cek', 'WANITA', 'Kristen', 'cek', '8555', 'Marketing', 'sample.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_login`
--

CREATE TABLE `user_login` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pasword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_login`
--

INSERT INTO `user_login` (`id`, `username`, `pasword`) VALUES
(1, 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`idkaryawan`);

--
-- Indeks untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `user_login`
--
ALTER TABLE `user_login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `idkaryawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  MODIFY `nik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT untuk tabel `user_login`
--
ALTER TABLE `user_login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
