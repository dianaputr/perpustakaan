-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 22, 2017 at 09:19 AM
-- Server version: 5.6.21
-- PHP Version: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `perpustakaan-ppi`
--

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE IF NOT EXISTS `buku` (
`id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `id_jenis` int(11) DEFAULT NULL,
  `id_penulis` int(11) NOT NULL,
  `cover` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id`, `nama`, `id_jenis`, `id_penulis`, `cover`) VALUES
(128, 'Perahu kertas', 4, 3, 'dee.jpg'),
(130, 'Supernova', 4, 3, 'de.jpg'),
(131, 'Surga', 4, 6, 'sakinah_bersamamu.jpg'),
(132, 'Marmut Merah Jambu', 4, 2, 'marmut.jpg'),
(133, 'Assalamualaikum Beijing', 4, 6, 'assalamualaikum.jpg'),
(134, 'Edensor', 4, 5, 'edensor.jpg'),
(135, 'Dilan 1990 (Dia Adalah Dilanku)', 4, 4, 'dilan90.jpg'),
(136, 'Dilan 1991', 4, 4, 'dilan91.jpg'),
(137, 'Milea (Suara Dari Dilan)', 4, 4, 'Milea (1).jpg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE IF NOT EXISTS `jenis` (
`id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id`, `nama`) VALUES
(2, 'Pelajaran'),
(3, 'Fiksi'),
(4, 'Novel');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_kelamin`
--

CREATE TABLE IF NOT EXISTS `jenis_kelamin` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_kelamin`
--

INSERT INTO `jenis_kelamin` (`id`, `nama`) VALUES
(1, 'Pria'),
(2, 'Wanita\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE IF NOT EXISTS `peminjaman` (
`id` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `waktu_dipinjam` date NOT NULL,
  `waktu_pengembalian` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=75 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id`, `id_buku`, `id_user`, `waktu_dipinjam`, `waktu_pengembalian`) VALUES
(71, 128, 3, '2017-08-11', '2017-08-18'),
(73, 128, 4, '2017-08-11', '2017-08-18'),
(74, 130, 2, '2017-08-11', '2017-08-18');

-- --------------------------------------------------------

--
-- Table structure for table `penerbit`
--

CREATE TABLE IF NOT EXISTS `penerbit` (
`id` int(11) NOT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `lat` varchar(100) DEFAULT NULL,
  `lng` varchar(100) NOT NULL,
  `tahun_terbit` int(4) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama`, `alamat`, `lat`, `lng`, `tahun_terbit`) VALUES
(2, 'Balai Pustaka', 'Balai Pustaka, Jl. Gunung Sahari Raya No.4 Jakarta', '-6.171786', '106.840077', 2012),
(3, 'Grasindo', 'PT Grasindo, Gedung Kompas Gramedia Blok 1/lantai 3  Jalan Palmerah Barat No. 29-37  Jakarta, 10270', '-6.190074', '106.802795', 2010),
(5, 'Gramedia Pustaka Utama', 'PT Gramedia Pustaka Utama, Gedung Kompas-Gramedia Lantai 2, Jl. Palmerah Barat No. 29 - 32, Gelora, ', '-6.208097', '106.794496', 2002),
(6, 'Elex Media Komputindo', 'PT Elex Media Komputindo, Gedung Kompas Gramedia Lantai 2  Jalan Palmerah Barat 29 37  Jakarta Pusat', '-6.208097', '106.794496', 2003),
(7, 'Bentang Pustaka', 'PT Bentang Pustaka, Jalan Plemburan No. 1 Pogung Lor, RT 11 RW 48 SIA XV Mlati  Sleman, DIY, 55284.', '-7.751379', '110.377293', 2012),
(8, 'GagasMedia', 'Redaksi GagasMedia, jalan Haji Montong No. 57, Ciganjur Jagakarsa, Jakarta Selatan 12630', '-6.335762', '106.811832', 2011);

-- --------------------------------------------------------

--
-- Table structure for table `penulis`
--

CREATE TABLE IF NOT EXISTS `penulis` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `id_jenis_kelamin` int(11) NOT NULL,
  `alamat` text,
  `jml_buku` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penulis`
--

INSERT INTO `penulis` (`id`, `nama`, `id_jenis_kelamin`, `alamat`, `jml_buku`) VALUES
(2, 'Raditya Dika', 1, 'Jakarta', 2),
(3, 'Dewi Lestari', 2, 'Jakarta', 5),
(4, 'Pidi Baiq', 1, 'Bandung', 0),
(5, 'Andrea Hirata', 1, 'Belitung', 0),
(6, 'Asma Nadia', 2, 'Jakarta', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tes`
--

CREATE TABLE IF NOT EXISTS `tes` (
  `sd` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
`id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `role`) VALUES
(1, 'Diana admin', 'admin', 'admin', 1),
(2, 'Diana Putri', 'putri', 'putri', 1),
(3, 'Diana  Putri', 'diana', 'diana', 2),
(4, 'Yesha', 'Ayes', 'ayes', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penerbit`
--
ALTER TABLE `penerbit`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penulis`
--
ALTER TABLE `penulis`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=138;
--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jenis_kelamin`
--
ALTER TABLE `jenis_kelamin`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `penerbit`
--
ALTER TABLE `penerbit`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `penulis`
--
ALTER TABLE `penulis`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
