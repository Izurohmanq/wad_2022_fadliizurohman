-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3308
-- Generation Time: Dec 08, 2022 at 02:17 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbsaddlebags`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_db`
--

CREATE TABLE `admin_db` (
  `id_admin` bigint(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tgl_buat` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_db`
--

INSERT INTO `admin_db` (`id_admin`, `nama`, `email`, `nohp`, `password`, `tgl_buat`) VALUES
(7, 'luqman', 'testing@gmail.com', '123123123123', '$2y$10$eI975cjR7VOu/acbFoUUOupOx8tGG1VrEKwxql2RPumeVOEFKREwe', '2022-12-03 07:37:05');

-- --------------------------------------------------------

--
-- Table structure for table `checkout`
--

CREATE TABLE `checkout` (
  `id_checkout` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `invoice` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_tas` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `totalHarga` int(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `status` varchar(255) DEFAULT 'dibungkus'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `checkout`
--

INSERT INTO `checkout` (`id_checkout`, `id_user`, `invoice`, `gambar`, `nama_tas`, `qty`, `totalHarga`, `alamat`, `status`) VALUES
(34, 2, 0, 'IMG_0033.JPG', 'MONTANA', 3, 375000, 'bandung banget', 'Dikirim'),
(35, 2, 0, 'IMG_0033.JPG', 'MONTANA', 3, 375000, 'bandung banget', 'Dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `curhatan_user`
--

CREATE TABLE `curhatan_user` (
  `id_curhatan` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `curhatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `curhatan_user`
--

INSERT INTO `curhatan_user` (`id_curhatan`, `email`, `curhatan`) VALUES
(3, 'testing@gmail.com', 'aowdkaokwdoakwoakwdk'),
(4, 'wannaseehim@gmail.com', 'bikin fitur AI dong biar maniezzzz'),
(5, 'testing@gmail.com', 'KAU BEGITU SEMPURNA'),
(6, 'asiapsantuy@gmai.com', 'semoga yang bagus makin bagus\r\n'),
(7, 'apaaja@gmail.com', 'iya deh boleh begitu'),
(8, 'testing@gmail.com', '123123131');

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `id_tas` bigint(20) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `nama_tas` varchar(255) NOT NULL,
  `qty` int(255) NOT NULL,
  `totalHarga` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `produk_tas`
--

CREATE TABLE `produk_tas` (
  `id_tas` int(255) NOT NULL,
  `nama_tas` varchar(255) NOT NULL,
  `bahan_tas` varchar(255) NOT NULL,
  `harga` int(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `qty` int(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk_tas`
--

INSERT INTO `produk_tas` (`id_tas`, `nama_tas`, `bahan_tas`, `harga`, `deskripsi`, `qty`, `gambar`) VALUES
(34, 'MONTANA', 'Cordura Jansport, Black', 125000, 'Bahan cordura Jansport Lapis busa tebal heavy oz Lapis fooring anti air. satu kantong seleting utama 3 belt loop kaitan ke rangka behel dan shock breaker Dimensi: 22cm x 10cm 15cm Harga tercantum adalah harga 1 pcs / 1 tas', 50, 'IMG_0033.JPG'),
(35, 'Postman', 'Cordura Jansport, Black', 125000, 'lorem ipsum dolor sit amet', 123, 'postman.jpg'),
(36, 'BROWNCO', 'Cordura', 125000, 'Tas motor / sidebag motor klasik termurah di Indonesia\r\n\r\nREADY STOCK! BROWNCO series II (warna coklat tua)\r\n\r\nSpek:\r\n\r\nBahan cordura\r\nLapis busa heavy oz\r\nLapis fooring anti air.\r\n2 seleting dalam\r\n3 belt loop kaitan ke rangka / behel dan shock breaker\r\nmuat jas hujan atau untuk kunci\r\n\r\n+ Bisa jadi sidebag\r\n+ Bisa jadi Sling bag (selempang)\r\n+ bisa jadi handbag (jinjing)\r\n\r\nDimensi: 27cm x 12cm 17cm\r\n\r\nHarga tercantum adalah harga 1 pcs / 1 tas\r\nLokasi cinunuk, bandung timur.', 123, 'IMG_20191102_135732.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user_db`
--

CREATE TABLE `user_db` (
  `id_user` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `nohp` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_db`
--

INSERT INTO `user_db` (`id_user`, `email`, `password`, `nama`, `tgl_lahir`, `nohp`, `alamat`) VALUES
(2, 'testing@gmail.com', '$2y$10$D6wp/pwv7nsZvI8JBMZzROoNzEMY4I6/R886x7.FyrPM8XW3ZtVxu', 'luqman saepulloh', '2022-12-04', '123123123', 'bandung banget');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_db`
--
ALTER TABLE `admin_db`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `checkout`
--
ALTER TABLE `checkout`
  ADD PRIMARY KEY (`id_checkout`);

--
-- Indexes for table `curhatan_user`
--
ALTER TABLE `curhatan_user`
  ADD PRIMARY KEY (`id_curhatan`);

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `produk_tas`
--
ALTER TABLE `produk_tas`
  ADD PRIMARY KEY (`id_tas`);

--
-- Indexes for table `user_db`
--
ALTER TABLE `user_db`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_db`
--
ALTER TABLE `admin_db`
  MODIFY `id_admin` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `checkout`
--
ALTER TABLE `checkout`
  MODIFY `id_checkout` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `curhatan_user`
--
ALTER TABLE `curhatan_user`
  MODIFY `id_curhatan` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produk_tas`
--
ALTER TABLE `produk_tas`
  MODIFY `id_tas` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user_db`
--
ALTER TABLE `user_db`
  MODIFY `id_user` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
