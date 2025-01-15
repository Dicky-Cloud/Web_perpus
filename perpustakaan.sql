-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 30, 2024 at 03:58 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kk` int(30) NOT NULL,
  `email` varchar(25) NOT NULL,
  `nomor_hp` varchar(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `nama`, `kk`, `email`, `nomor_hp`, `username`, `password`, `alamat`) VALUES
(3, 'Ahmad Subari m', 1223, 'admin@gmail.com', '123', '2234', '123', 'sini'),
(5, 'Ahmad ', 123, 'admin@gmail.com', '123', '2234', '123', 'peka'),
(6, 'beta', 1223, 'admin@gmail.com', '123', '2213', '123', 'akl'),
(7, 'demo', 1223, 'admin@gmail.com', '123', '34213', '2234', 'supra'),
(8, 'sahrul', 1223, 'admin@gmail.com', '123', '', '', 'm'),
(9, 'dicky afriansyah', 2147483647, 'vandicky@gmail.com', '08975956904', '', '', 'bugangan');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `gambar` varchar(225) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun_terbit` date NOT NULL,
  `isbn` int(11) NOT NULL,
  `kategori` varchar(255) NOT NULL,
  `stok` int(255) NOT NULL,
  `jml_halaman` int(11) NOT NULL,
  `deskripsi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `gambar`, `judul`, `penulis`, `penerbit`, `tahun_terbit`, `isbn`, `kategori`, `stok`, `jml_halaman`, `deskripsi`) VALUES
(5, '1729221868_toko-buku-sejarah-dunia-lengkap-indoliterasi.jpg', 'Niscaya m', 'joko bahdim', 'semarang', '2024-10-07', 2147483647, 'Fiksi', 2, 500, 'lorem'),
(6, '1729223584_it.jpg', 'informatika', 'joko bahdim', 'semarang', '2024-10-15', 2147483647, 'Fiksi', 99, 250, 'impsum'),
(9, 'it.jpg', 'Niscaya m', 'joko anwar', 'Jakarta', '2024-10-25', 2147483647, 'Fiksi', 23, 100, 'lorem'),
(10, 'profil.jpg', 'petani baru', 'joko anwar', 'Jakarta', '2024-10-25', 2147483647, 'Fiksi', 23, 70, 'lorem'),
(11, 'toko-buku-sejarah-dunia-lengkap-indoliterasi.jpg', 'petani baru', 'joko bahdim', 'Jakarta', '2024-10-29', 2147483647, 'Edukasi', 4, 100, 'lorem');

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_halaman`
--

CREATE TABLE `kriteria_halaman` (
  `id_kriteria` int(11) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_halaman`
--

INSERT INTO `kriteria_halaman` (`id_kriteria`, `pilihan_kriteria`, `bobot_kriteria`) VALUES
(1, 'Sangat Banyak', 1),
(2, 'Banyak', 0.75),
(3, 'Cukup', 0.25),
(4, 'Sedikit', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_peminjaman`
--

CREATE TABLE `kriteria_peminjaman` (
  `id_kriteria` int(11) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_peminjaman`
--

INSERT INTO `kriteria_peminjaman` (`id_kriteria`, `pilihan_kriteria`, `bobot_kriteria`) VALUES
(1, 'sangat banyak', 1),
(2, 'Banyak', 0.75),
(3, 'Sedikit', 0.25),
(4, 'Tidak ada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_rating`
--

CREATE TABLE `kriteria_rating` (
  `id_kriteria` int(11) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_rating`
--

INSERT INTO `kriteria_rating` (`id_kriteria`, `pilihan_kriteria`, `bobot_kriteria`) VALUES
(1, '4.5', 1),
(2, '4.0', 0.75),
(3, '3.5', 0.25),
(4, '3.0', 0);

-- --------------------------------------------------------

--
-- Table structure for table `kriteria_terbit`
--

CREATE TABLE `kriteria_terbit` (
  `id_kriteria` int(11) NOT NULL,
  `pilihan_kriteria` varchar(50) NOT NULL,
  `bobot_kriteria` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kriteria_terbit`
--

INSERT INTO `kriteria_terbit` (`id_kriteria`, `pilihan_kriteria`, `bobot_kriteria`) VALUES
(1, 'Terbaru', 1),
(2, 'Baru', 0.75),
(3, 'Terkini', 0.25),
(4, 'Lama', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id_nilai` int(11) NOT NULL,
  `id_karyawan` int(11) NOT NULL,
  `id_kriteria_pelayanan` int(11) NOT NULL,
  `id_kriteria_kesopanan` int(11) NOT NULL,
  `id_kriteria_ketelitian` int(11) NOT NULL,
  `id_kriteria_kedisiplinan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id_nilai`, `id_karyawan`, `id_kriteria_pelayanan`, `id_kriteria_kesopanan`, `id_kriteria_ketelitian`, `id_kriteria_kedisiplinan`) VALUES
(2, 2, 1, 3, 3, 1),
(3, 2, 1, 1, 1, 1),
(7, 0, 2, 2, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelayanan`
--

CREATE TABLE `pelayanan` (
  `id_penilaian` int(11) NOT NULL,
  `id_responden` int(11) NOT NULL,
  `ketersediaan_buku` int(11) NOT NULL,
  `kecepatan_pelayanan` int(11) NOT NULL,
  `kenyamanan_fasilitas` int(11) NOT NULL,
  `kesopanan_petugas` int(11) NOT NULL,
  `nilai_normalisasi` float NOT NULL,
  `hasil` float(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelayanan`
--

INSERT INTO `pelayanan` (`id_penilaian`, `id_responden`, `ketersediaan_buku`, `kecepatan_pelayanan`, `kenyamanan_fasilitas`, `kesopanan_petugas`, `nilai_normalisasi`, `hasil`) VALUES
(4, 101, 5, 5, 3, 2, 0, 3),
(5, 102, 2, 3, 4, 2, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `status` enum('dipinjam','dikembalikan','terlambat') NOT NULL,
  `total_pinjaman` int(100) NOT NULL,
  `tgl_dikembalikan` date NOT NULL,
  `denda` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `nama`, `tgl_pinjam`, `tgl_kembali`, `status`, `total_pinjaman`, `tgl_dikembalikan`, `denda`) VALUES
(15, 6, 'sahrul', '2024-10-01', '2024-10-31', 'dikembalikan', 1, '2024-10-30', '2000'),
(16, 5, 'sahrul', '2024-10-01', '2024-10-31', 'dipinjam', 1, '2024-10-20', '200000'),
(17, 5, 'Ahmad Subari', '2024-10-04', '2024-11-01', 'dipinjam', 2, '2024-11-07', '2000'),
(18, 6, 'Ahmad Subari', '2024-09-01', '2024-09-30', 'dipinjam', 2, '2024-10-01', '2000');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE `penilaian` (
  `id_penilaian` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_kriteria_rating` int(11) NOT NULL,
  `id_kriteria_peminjaman` int(11) NOT NULL,
  `id_kriteria_terbit` int(11) NOT NULL,
  `id_kriteria_halaman` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penilaian`
--

INSERT INTO `penilaian` (`id_penilaian`, `id_buku`, `id_kriteria_rating`, `id_kriteria_peminjaman`, `id_kriteria_terbit`, `id_kriteria_halaman`) VALUES
(14, 5, 1, 1, 1, 1),
(15, 6, 2, 3, 4, 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_login` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_login`, `username`, `password`) VALUES
(3, 'admin', '21232f297a57a5a743894a0e4a801fc3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `kriteria_halaman`
--
ALTER TABLE `kriteria_halaman`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_peminjaman`
--
ALTER TABLE `kriteria_peminjaman`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_rating`
--
ALTER TABLE `kriteria_rating`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `kriteria_terbit`
--
ALTER TABLE `kriteria_terbit`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id_nilai`);

--
-- Indexes for table `pelayanan`
--
ALTER TABLE `pelayanan`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id_penilaian`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `kriteria_halaman`
--
ALTER TABLE `kriteria_halaman`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria_peminjaman`
--
ALTER TABLE `kriteria_peminjaman`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria_rating`
--
ALTER TABLE `kriteria_rating`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kriteria_terbit`
--
ALTER TABLE `kriteria_terbit`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id_nilai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pelayanan`
--
ALTER TABLE `pelayanan`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id_penilaian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
