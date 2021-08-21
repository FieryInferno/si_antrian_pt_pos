-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2021 pada 09.41
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 7.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `posku`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `gajipensiunan`
--

CREATE TABLE `gajipensiunan` (
  `idgajipensiunan` int(11) NOT NULL,
  `judul` text NOT NULL,
  `nip` text NOT NULL,
  `nama` text NOT NULL,
  `gaji` text NOT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` date NOT NULL,
  `kartutandapensiun` text NOT NULL,
  `waktubuat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gajipensiunan`
--

INSERT INTO `gajipensiunan` (`idgajipensiunan`, `judul`, `nip`, `nama`, `gaji`, `deskripsi`, `tanggal`, `kartutandapensiun`, `waktubuat`) VALUES
(1, 'sambless', '01', 'taufik', '10000', '<p>haha<br></p>', '2000-01-01', '1627528008kilang.jpeg', '2021-08-04'),
(2, 'sugeng', '4', 'tes', '111', 'tes', '2021-02-02', '1628049869a.jpg', '2021-08-04'),
(3, 'Gaji Bulanan', '99', 'Sugeng', '1000000', 'Gaji Bulanan', '2021-08-04', '16280587585574427-NZWJLZHW-7.jpg', '2021-08-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `iklantengah`
--

CREATE TABLE `iklantengah` (
  `id_slider` int(5) NOT NULL,
  `judul` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `pengupload` varchar(50) COLLATE latin1_general_ci NOT NULL,
  `foto` varchar(100) COLLATE latin1_general_ci NOT NULL,
  `tgl_posting` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data untuk tabel `iklantengah`
--

INSERT INTO `iklantengah` (`id_slider`, `judul`, `pengupload`, `foto`, `tgl_posting`) VALUES
(60, '2', 'operator', 'point-of-sale-5b331955bde57568686ba0a2.jpg', '2021-07-29 10:29:40'),
(59, '1', 'operator', '061736200-1599690829-pos_indonesia_231617_bigjpg.jpg', '2021-07-29 10:29:25'),
(61, 'b', 'Administrator', 'graha-bandara-insani-tampak-dari-dalam_20171214_171118.jpg', '2021-08-04 10:10:09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `idpembayaran` int(11) NOT NULL,
  `novirtual` text NOT NULL,
  `judul` text NOT NULL,
  `nama` text NOT NULL,
  `biaya` text NOT NULL,
  `tanggalpembayaran` date DEFAULT NULL,
  `waktubuat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`idpembayaran`, `novirtual`, `judul`, `nama`, `biaya`, `tanggalpembayaran`, `waktubuat`) VALUES
(1, '123', 'tes', 'sugeng', '100000', '2021-08-02', '2021-08-02'),
(2, '99', 'Pembayaran Token', 'Lord Uus', '10000', '2021-08-04', '2021-08-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `idpengiriman` int(11) NOT NULL,
  `noresi` varchar(255) NOT NULL,
  `namapengirim` text NOT NULL,
  `nohppengirim` text NOT NULL,
  `namapenerima` text NOT NULL,
  `nohppenerima` text NOT NULL,
  `alamatpenerima` text NOT NULL,
  `kota` text NOT NULL,
  `namabarang` text NOT NULL,
  `jenisbarang` text NOT NULL,
  `beratbarang` text NOT NULL,
  `jumlahbarang` text NOT NULL,
  `biaya` text NOT NULL,
  `tanggalpengiriman` date NOT NULL,
  `waktubuat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`idpengiriman`, `noresi`, `namapengirim`, `nohppengirim`, `namapenerima`, `nohppenerima`, `alamatpenerima`, `kota`, `namabarang`, `jenisbarang`, `beratbarang`, `jumlahbarang`, `biaya`, `tanggalpengiriman`, `waktubuat`) VALUES
(3, '1', 'sugeng', '123', 'hariyanto', '082319', 'nungcik', 'Tasikmalaya', 'popol', 'Barang', '10', '10', '99997', '2021-08-04', '2021-08-04'),
(4, '99', 'Yanto', '08932819', 'Dodi', '09823421412', 'Nungcik', 'Bandung', 'Remote', 'Barang', '10', '5', '100000', '2021-08-04', '2021-08-04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `jeniskelamin` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL,
  `foto` varchar(150) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `is_active` int(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `password`, `username`, `nama`, `jeniskelamin`, `jabatan`, `email`, `no_telp`, `foto`, `level`, `is_active`) VALUES
(403, '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Administrator', 'Laki - laki', 'Admin', 'admin@gmail.com', '123', 'LOGO_KOPERASI_KARTIKA.png', '2', 1),
(404, '21232f297a57a5a743894a0e4a801fc3', 'KPC', 'KPC', 'Laki - laki', 'KPC', 'kpc@gmail.com', '08988387271', 'a.jpg', '1', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wesel`
--

CREATE TABLE `wesel` (
  `idwesel` int(11) NOT NULL,
  `nowesel` text NOT NULL,
  `nama` text NOT NULL,
  `noktp` text NOT NULL,
  `biaya` text NOT NULL,
  `tanggalwesel` int(11) NOT NULL,
  `waktubuat` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `wesel`
--

INSERT INTO `wesel` (`idwesel`, `nowesel`, `nama`, `noktp`, `biaya`, `tanggalwesel`, `waktubuat`) VALUES
(2, '1', 'jordi', '123', '1000000', 2021, '2021-08-04'),
(3, '99', 'Budi', '123', '100000', 2021, '2021-08-04');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `gajipensiunan`
--
ALTER TABLE `gajipensiunan`
  ADD PRIMARY KEY (`idgajipensiunan`);

--
-- Indeks untuk tabel `iklantengah`
--
ALTER TABLE `iklantengah`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`idpembayaran`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`idpengiriman`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `wesel`
--
ALTER TABLE `wesel`
  ADD PRIMARY KEY (`idwesel`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `gajipensiunan`
--
ALTER TABLE `gajipensiunan`
  MODIFY `idgajipensiunan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `iklantengah`
--
ALTER TABLE `iklantengah`
  MODIFY `id_slider` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `idpembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  MODIFY `idpengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=405;

--
-- AUTO_INCREMENT untuk tabel `wesel`
--
ALTER TABLE `wesel`
  MODIFY `idwesel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
