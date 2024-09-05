-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 01 Sep 2024 pada 13.07
-- Versi server: 8.0.27
-- Versi PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `absen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

DROP TABLE IF EXISTS `absen`;
CREATE TABLE IF NOT EXISTS `absen` (
  `idabsen` int NOT NULL AUTO_INCREMENT,
  `id` int NOT NULL,
  `nis` int NOT NULL,
  `alfa` int NOT NULL,
  PRIMARY KEY (`idabsen`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `santri`
--

DROP TABLE IF EXISTS `santri`;
CREATE TABLE IF NOT EXISTS `santri` (
  `nis` varchar(5) NOT NULL,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(30) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(8) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `kelas` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(12) NOT NULL,
  PRIMARY KEY (`nis`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `santri`
--

INSERT INTO `santri` (`nis`, `nama`, `username`, `password`, `jenis_kelamin`, `kelas`, `alamat`, `no_telepon`) VALUES
('16001', 'Danang Kusuma', 'Bandar Lampung', '1990-02-', 'Laki-laki', 'Islam', 'Jalan Gatot Subroto No. 10, Bandar Lampung', '085758857775'),
('16002', 'Isyana Sarasvati', 'Jakarta', '1993-05-', 'Perempuan', 'Islam', 'Jalan Pagar Alam No. 15, Kedaton, Bandar Lampung', '085789892909'),
('16003', 'Indra Styawantoro', 'Purbolinggo', '1991-05-', 'Laki-laki', 'Islam', 'Perum Griya Gedung Meneng Blok C2 No. 2, Rajabasa, Bandar Lampung', '085669919769'),
('16004', 'Maudy Ayunda', 'Jakarta', '1994-12-', 'Perempuan', 'Islam', 'Jalan Radin Intan No. 77, Tanjung Karang, Bandar Lampung', '089977955772'),
('16005', 'Valentino Rossi', 'Metro', '1979-03-', 'Laki-laki', 'Islam', 'Jalan Zaenal Abidin Pagaralam No. 1, Bandar Lampung', '081922919212'),
('16006', 'Raisa Andriana', 'Jakarta', '1990-06-', 'Perempuan', 'Islam', 'Jalan Yos Sudarso No. 135, Bandar Lampung', '081388955767'),
('16007', 'sdfsdfsdfsdfsdfsdfsdfsdf', 'sdfsdsdfsdfsfsfdfsdf', 'sdfsdfsd', 'Laki-laki', '2D', 'Jalan Teuku Umar No. 52, Kedaton Bandar Lampung', '081269962201');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tanggal`
--

DROP TABLE IF EXISTS `tanggal`;
CREATE TABLE IF NOT EXISTS `tanggal` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NOT NULL,
  `hari` varchar(10) NOT NULL,
  `ket` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `tanggal`
--

INSERT INTO `tanggal` (`id`, `tanggal`, `hari`, `ket`) VALUES
(1, '2024-09-01', 'Ahad', 'iinininini');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
