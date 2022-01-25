-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Sep 2019 pada 13.07
-- Versi server: 10.1.34-MariaDB
-- Versi PHP: 5.6.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_barang`
--

CREATE TABLE `tb_barang` (
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(120) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `kategori` varchar(60) NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(4) NOT NULL,
  `gambar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_barang`
--

INSERT INTO `tb_barang` (`id_brg`, `nama_brg`, `keterangan`, `kategori`, `harga`, `stok`, `gambar`) VALUES
(1, 'sepatu', 'allstar', 'pakaian pria', 350000, 10, 'sepatu.jpg'),
(5, 'jam', 'jam tangan ori', 'pakaian pria', 400000, 4, 'jam-tangan1.jpg'),
(6, 'kemeja', 'kemeja pria', 'pakaian pria', 250000, 15, 'kemeja1.jpg'),
(7, 'shirt', 'polo', 'pakaian pria', 200000, 2, 'polo1.jpg'),
(11, 'shirt', 'polo', 'pakaian pria', 250000, 5, 'polo2.jpg'),
(12, 'sepatu', 'adidas', 'pakaian pria', 400000, 19, 'adidas.jpg'),
(13, 'sepatu', 'sneakers', 'pakaian pria', 3500000, 4, 'sneakers.jpg'),
(14, 'shirt', 'polo', 'pakaian pria', 250000, 2, 'polo3.jpg'),
(15, 'kamera', 'canon', 'elektronik', 4500000, 1, 'cnn1.jpg'),
(16, 'laptop', 'asus ROG', 'elektronik', 10500000, 1, 'lp2.jpg'),
(17, 'laptop', 'acer', 'elektronik', 3600000, 2, 'lp1.jpg'),
(18, 'handpone', 'oppo', 'elektronik', 2500000, 1, 'hp1.jpg'),
(19, 'casual', 'polo', 'pakaian wanita', 4500000, 1, 'pw.jpg'),
(20, 'hijab', 'casual', 'pakaian wanita', 3500000, 5, 'pw1.jpg'),
(21, 'kemeja', 'casual', 'pakaian wanita', 4500000, 15, 'pw2.jpg'),
(22, 'bola ', 'basket', 'olahraga', 400000, 14, 'or1.jpg'),
(23, 'jersey', 'polo', 'olahraga', 200000, 2, 'or6.jpg'),
(25, 'sepatu', 'adidas', 'olahraga', 250000, 19, 'or4.jpg'),
(26, 'baju', 'anak', 'pakaian anak', 200000, 15, 'pa3.jpg'),
(27, 'baju', 'anak', 'pakaian anak', 250000, 2, 'pa1.jpg'),
(29, 'kemeja', 'kemeja pria', 'Pakaian Pria', 300000, 9, 'kemeja2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(30, 'budi', 'cirebon', '2019-09-24 17:36:20', '2019-09-25 17:36:20'),
(31, 'saputra', 'saputra', '2019-09-24 18:06:35', '2019-09-25 18:06:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_barang`, `nama_barang`, `jumlah`, `harga`, `pilihan`) VALUES
(10, 16, 3, 'Samsung Galaxy A20', 1, 3400000, ''),
(11, 17, 2, 'kamera', 2, 5900000, ''),
(12, 18, 3, 'Samsung Galaxy A20', 1, 3400000, ''),
(13, 18, 1, 'sepatu', 1, 350000, ''),
(18, 23, 22, 'bola ', 1, 400000, ''),
(19, 24, 13, 'sepatu', 1, 3500000, ''),
(20, 25, 25, 'sepatu', 1, 250000, ''),
(21, 26, 19, 'casual', 1, 4500000, ''),
(22, 28, 7, 'shirt', 1, 200000, ''),
(23, 29, 18, 'handpone', 1, 2500000, ''),
(24, 30, 16, 'laptop', 1, 10500000, ''),
(25, 31, 5, 'jam', 1, 400000, ''),
(26, 31, 12, 'sepatu', 1, 400000, ''),
(27, 31, 14, 'shirt', 1, 250000, ''),
(28, 31, 15, 'kamera', 1, 4500000, '');

--
-- Trigger `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET stok = stok-NEW.jumlah
    WHERE id_brg = NEW.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(5, 'admin', 'admin', 'admin', 1),
(9, 'budi', 'budi', 'budi', 2),
(10, 'saputra', 'saputra', 'saputra', 2);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`id_brg`);

--
-- Indeks untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
