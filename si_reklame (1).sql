-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Agu 2019 pada 02.42
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_reklame`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_reklame`
--

CREATE TABLE `jenis_reklame` (
  `id_jenis` int(11) NOT NULL,
  `nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_reklame`
--

INSERT INTO `jenis_reklame` (`id_jenis`, `nama`) VALUES
(1, 'videotron/LED/Megatron'),
(2, 'Bilbord/papan reklame pada JPO/Bando'),
(3, 'Bilbord/papan reklame dengan penerangan'),
(4, 'Bilbord/papan reklame tanpa penerangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketentuan`
--

CREATE TABLE `ketentuan` (
  `id_ketentuan` int(11) NOT NULL,
  `luas_bidang_a` int(10) NOT NULL,
  `luas_bidang_b` int(10) NOT NULL,
  `ketinggian` int(10) NOT NULL,
  `jenis_reklame` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ketentuan`
--

INSERT INTO `ketentuan` (`id_ketentuan`, `luas_bidang_a`, `luas_bidang_b`, `ketinggian`, `jenis_reklame`) VALUES
(1, 230000, 460000, 10000, 1),
(2, 46000, 92000, 10000, 2),
(3, 23000, 46000, 10000, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ketinggian`
--

CREATE TABLE `ketinggian` (
  `ketinggian` varchar(10) NOT NULL,
  `skor` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi_jalan`
--

CREATE TABLE `lokasi_jalan` (
  `klasifikasi_jalan` varchar(1) NOT NULL,
  `skor` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `lokasi_jalan`
--

INSERT INTO `lokasi_jalan` (`klasifikasi_jalan`, `skor`, `id`) VALUES
('A', 10, 1),
('B', 8, 2),
('C', 5, 3),
('D', 1, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyewa`
--

CREATE TABLE `penyewa` (
  `nama_perusahaan` varchar(100) NOT NULL,
  `kode_pos` int(6) NOT NULL,
  `lingkungan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `no_telp_kantor` varchar(16) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_penyewa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyewa`
--

INSERT INTO `penyewa` (`nama_perusahaan`, `kode_pos`, `lingkungan`, `kelurahan`, `rt`, `rw`, `kecamatan`, `no_telp_kantor`, `id_user`, `id_penyewa`) VALUES
('dandi pura', 121, 'dandi', 'dandi', 13, 321, 'dandi', '434029449', '432432432', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `reklame`
--

CREATE TABLE `reklame` (
  `id_reklame` int(4) NOT NULL,
  `id_jenis_reklame` int(3) NOT NULL,
  `jumlah_sisi` int(1) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `latitude` varchar(15) NOT NULL,
  `longitude` varchar(15) NOT NULL,
  `deskripsi` varchar(255) NOT NULL,
  `foto` varchar(30) NOT NULL,
  `panjang` int(4) NOT NULL COMMENT 'meter',
  `lebar` int(4) NOT NULL COMMENT 'meter',
  `ketinggian` int(4) NOT NULL COMMENT 'meter',
  `klasifikasi_jalan` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `reklame`
--

INSERT INTO `reklame` (`id_reklame`, `id_jenis_reklame`, `jumlah_sisi`, `alamat`, `latitude`, `longitude`, `deskripsi`, `foto`, `panjang`, `lebar`, `ketinggian`, `klasifikasi_jalan`) VALUES
(1, 1, 1, 'Jl. Bung Karno No.3 Pagesangan Tim. Kec. Mataram Kota Mataram', '-8.599946', '116.113886', '', 'rsud.jpg', 12, 10, 20, 'A'),
(2, 1, 1, 'Jl. Pejanggik Mataram', '-8.607190', '116.131815', '', '', 12, 10, 20, 'A'),
(3, 1, 1, 'Jl. Langko No.64, Pejeruk, Ampenan, Kota Mataram, Nusa Tenggara Bar. 83112', '-8.577035', '116.084210', '', 'rs.jpg', 12, 10, 20, 'A'),
(4, 1, 1, 'hhhh', '-8.580257', '116.109951', 'gdgfgh', 'wira bhakti.jpg', 12, 10, 20, 'A'),
(5, 1, 1, 'Jl. Ahmad Yani No.9, Selagalas, Mataram, Kota Mataram, Nusa Tenggara Bar. 83237', '-8.579098', '116.146835', '', 'rs.jpg', 12, 10, 20, 'A'),
(6, 1, 1, 'Jl. Pejanggik No. 115, Cakranegara, Cilinaya, Cakranegara, Kota Mataram', '-8.587076', '116.122802', '', 'risa.jpg', 12, 10, 20, 'A'),
(7, 1, 1, 'Jl. Caturwarga Mataram', '-8.587160', '116.114284', '', 'rs.jpg', 12, 10, 20, 'A'),
(8, 1, 1, 'Jl. Bung Karno No.143, Pagutan, Kec. Mataram, Kota Mataram, ', '-8.605262', '116.113488', '', 'rs.jpg', 12, 10, 20, 'A'),
(9, 1, 1, 'Jl. Koperasi', '-8.570184', '116.079318', '', 'rsk.jpg', 12, 10, 20, 'A'),
(10, 1, 1, 'Jl. Ahmad Yani Selagalas', '-8.576651', '116.147081', '', 'rs.jpg', 12, 10, 20, 'A'),
(11, 1, 1, 'Jl. Majapahit No 10 Pagesangan', '-8.593854', '116.098687', '', 'rs.jpg', 12, 10, 20, 'A'),
(12, 1, 1, 'Jl. Majapahit No 8 Mataram', '-8.585352', '116.087815', '', 'rs.jpg', 12, 10, 20, 'A'),
(13, 1, 1, 'Jl. Majapahit', '-8.589962', '116.093367', '', 'rs.jpg', 12, 10, 20, 'A'),
(14, 1, 1, 'Jl. Brawijaya, Mandalika, Sandubaya, Kota Mataram, ', '-8.594609', '116.145388', '', 'rs.jpg', 12, 10, 20, 'A'),
(15, 1, 1, 'Jl. Ade Irma Suryani, Karang Taliwang, Cakranegara, Kota Mataram,', '-8.577866', '116.125926', '', 'rs.jpg', 12, 10, 20, 'A'),
(16, 1, 1, 'Jl. Sultan Salahudin, Tj. Karang, Sekarbela, Kota Mataram,', '-8.600640', '116.083542', '', 'tanjung karang.jpg', 12, 10, 20, 'A'),
(17, 1, 1, 'Jl. Saleh Sungkar No.4, Dayan Peken, Ampenan, Kota Mataram,', '-8.569940', '116.076564', '', 'rs.jpg', 12, 10, 20, 'A'),
(18, 1, 1, 'Jl. Caturwarga No.29 A, Mataram Bar., Selaparang, Kota Mataram,', '-8.584147', '116.105742', '', 'rs.jpg', 12, 10, 20, 'A'),
(19, 1, 1, 'Jl. Gn. Merapi, Dasan Agung Baru, Selaparang, Kota Mataram,', '-8.577776', '116.092247', '', 'rs.jpg', 12, 10, 20, 'A'),
(20, 1, 1, 'Jl. Pinang Raya No.1B, Pejeruk, Ampenan, Kota Mataram,', '-8.568208', '116.093127', '', 'rs.jpg', 12, 10, 20, 'A'),
(21, 1, 1, '', '-8.594711', '116.100478', '', 'rs.jpg', 12, 10, 20, 'A'),
(22, 1, 1, 'Jl. Jend. Sudirman, Rembiga, Selaparang, Kota Mataram', '-8.564626', '116.122195', '', 'rs.jpg', 12, 10, 20, 'A'),
(23, 1, 1, 'Jl. Gajah Mada No.14, Jempong Baru, Sekarbela, Kota Mataram', '-8.612434', '116.099192', '', 'rs.jpg', 12, 10, 20, 'A'),
(24, 1, 1, '', '-8.6124449', '116.0970353', '', 'rs.jpg', 12, 10, 20, 'A'),
(25, 1, 1, 'Jl. Balam No 4 Cakranegara', '-8.584315', '116.115252', '', '', 12, 10, 20, 'A'),
(26, 1, 1, 'Jl. Pejanggik No 107 a-c Cakra', '-8.587113', '116.121185', '', '', 12, 10, 20, 'A'),
(27, 1, 1, 'Jl. Panca Usaha No.7D, Cilinaya, Cakranegara, Kota Mataram', '-8.589060', '116.118123', '', '', 12, 10, 20, 'A'),
(28, 1, 1, 'Jl. Majapahit No 70 Mataram', '-8.590660', '116.093914', '', '', 12, 10, 20, 'A'),
(29, 1, 1, 'Jl. Bung Hatta No 3A Mataram', '-8.585101', '116.118609', '', '', 12, 10, 20, 'A'),
(30, 1, 1, 'Jl. Caturwarga No 16 Mataram', '-8.585978', '116.113056', '', '', 12, 10, 20, 'A'),
(31, 1, 1, 'Jl. Catur Warga No 4 Mataram', '-8.588137', '116.117250', '', '', 12, 10, 20, 'A'),
(32, 1, 1, 'Jl. Catur Warga No 5 Mataram', '-8.585324', '116.111111', '', '', 12, 10, 20, 'A'),
(33, 1, 1, 'Jl. WR Supratman No 18 Mataram', '-8.585271', '116.108289', '', '', 12, 10, 20, 'A'),
(34, 1, 1, 'Jl. AR. Rahman Hakim no 16 Mataram', '-8.592473', '116.107444', '', 'rs.jpg', 12, 10, 20, 'A'),
(35, 1, 1, 'Jl. AA Gde Ngurah Cakranegara', '-8.594316', '116.129407', '', '', 12, 10, 20, 'A'),
(36, 1, 1, 'Jl. RA Kartini no 77 Monjok', '-8.577927', '116.116993', '', 'rs.jpg', 12, 10, 20, 'A'),
(37, 1, 1, 'Jl. Bung Karno no 2 Mataram', '-8.589362', '116.116713', '', 'rs.jpg', 12, 10, 20, 'A'),
(38, 1, 1, 'Jl. WR Supratman no 24 Mataram', '-8.586595', '116.108058', '', 'rs.jpg', 12, 10, 20, 'A'),
(39, 1, 1, 'Jl. Bung Hatta no 14 Mataram', '-8.584061', '116.118968', '', 'rs.jpg', 12, 10, 20, 'A'),
(40, 1, 1, 'Sandubaya Bertais', '-8.593348', '116.156383', '', 'rs.jpg', 12, 10, 20, 'A'),
(41, 1, 1, 'Jl. Sandubaya no 36 Bertais', '-8.593058', '116.156568', '', 'rs.jpg', 12, 10, 20, 'A'),
(42, 1, 1, 'Jl. Pandawa no 10 Cakranegara', '-8.590674', '116.127219', '', 'rs.jpg', 12, 10, 20, 'A'),
(43, 1, 1, 'Jl. Bung Hatta Mataram', '-8.580993', '116.118987', '', 'rs.jpg', 12, 10, 20, 'A'),
(44, 1, 1, 'Jl. Energi no 45 Ampenan Selatan', '-8.577244', '116.075587', '', 'rs.jpg', 12, 10, 20, 'A'),
(45, 1, 1, 'Jl. Sriwijaya 212 Pagesangan', '-8.594894', '116.101434', '', 'rs.jpg', 12, 10, 20, 'A'),
(46, 1, 1, '', '-8.583927', '116.119415', '', 'rs.jpg', 12, 10, 20, 'A'),
(47, 1, 1, '', '-8.591892', '116.113745', '', 'rs.jpg', 12, 10, 20, 'A'),
(48, 1, 1, 'Jl. Majapahit', '-8.583856', '116.095972', '', 'rs.jpg', 12, 10, 20, 'A'),
(49, 1, 1, 'Jl. Bung Hatta no 38 Mataram', '-8.581288', '116.119244', '', 'apotek.jpg', 12, 10, 20, 'A'),
(50, 1, 1, 'Jl. Sultan Hasanuddin No.10 Cakranegara', '-8.586811', '116.129584', '', 'apotek.jpg', 12, 10, 20, 'A'),
(51, 1, 1, 'Jl. Saleh Sungkar No.41 Ampenan', '-8.566678', '116.076194', '', 'apotek.jpg', 12, 10, 20, 'A'),
(52, 1, 1, 'Jl. Wage Rudolf Supratman No.4, Mataram', '-8.586441', '116.107795', '', 'apotek.jpg', 12, 10, 20, 'A'),
(53, 1, 1, 'Jl. Panca Usaha, Cilinaya, Cakranegara', '-8.589563', '116.128714', '', 'apotek.jpg', 12, 10, 20, 'A'),
(54, 1, 1, 'Jl. Jambu no 8 Pamotan', '-8.586066', '116.134512', '', 'apotek.jpg', 12, 10, 20, 'A'),
(55, 1, 1, 'Rumah Bersalin Ibunda', '-8.592141', '116.107556', '', 'apotek.jpg', 12, 10, 20, 'A'),
(56, 1, 1, 'Jl. Bung Karno No.60, Pagutan', '-8.610724', '116.114810', '', 'apotek.jpg', 12, 10, 20, 'A'),
(57, 1, 1, 'JL. Sriwijaya, No.17, Mataram', '-8.594769', ' 116.101678', '', 'apotek.jpg', 12, 10, 20, 'A'),
(58, 1, 1, 'Jl. KH. Ahmad Dahlan No 5b Pagesangan', '-8.600178', '116.101523', '', 'apotek.jpg', 12, 10, 20, 'A'),
(59, 1, 1, 'Jl. Pariwisata no 4 Mataram', '-8.581424', '116.111890', '', 'apotek.jpg', 12, 10, 20, 'A'),
(60, 1, 1, 'Jl. Sultan Hasanuddin no 99 cakranegara', '-8.584093', '116.129580', '', 'apotek.jpg', 12, 10, 20, 'A'),
(61, 1, 1, 'JL. Panji Tilar, No. 210 Mataram', '-8.597941', '116.085371', '', 'apotek.jpg', 12, 10, 20, 'A'),
(62, 1, 1, 'Jl. Bung Karno Mataram', '-8.592715', '116.113332', '', 'apotek.jpg', 12, 10, 20, 'A'),
(63, 1, 1, 'Jl. A. A Gede Ngurah Cakranegara', '-8.593547', '116.129129', '', 'apotek.jpg', 12, 10, 20, 'A'),
(64, 1, 1, 'Jalan Panca Usaha No. 26, Cakranegara', '-8.588879', '116.121619', '', 'apotek.jpg', 12, 10, 20, 'A'),
(65, 1, 1, 'Jl. Bung Karno', '-8.601586', '116.113542', '', 'apotek.jpg', 12, 10, 20, 'A'),
(66, 1, 1, 'Jl. Bung Karno no 51 Mataram', '-8.596340', '116.113118', '', 'apotek.jpg', 12, 10, 20, 'A'),
(67, 1, 1, 'Jl. Pejanggik Blok B no 48 Cakranegara', '-8.586341', '116.119294', '', 'apotek.jpg', 12, 10, 20, 'A'),
(68, 1, 1, 'Jl. Subak Cakranegara', '-8.586616', '116.124695', '', 'apotek.jpg', 12, 10, 20, 'A');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sewa`
--

CREATE TABLE `sewa` (
  `id_reklame` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_penyewa` int(11) NOT NULL,
  `lama_sewa` int(11) NOT NULL COMMENT 'dalam bulan',
  `id_sewa` int(11) NOT NULL,
  `status_pajak` enum('lunas','belum di bayar') NOT NULL,
  `status_sewa` enum('lunas','belum di bayar','slot ada') NOT NULL,
  `tanggal_mulai_sewa` date NOT NULL,
  `tanggal_akhir_sewa` date NOT NULL,
  `produk_rokok` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sewa`
--

INSERT INTO `sewa` (`id_reklame`, `id_user`, `id_penyewa`, `lama_sewa`, `id_sewa`, `status_pajak`, `status_sewa`, `tanggal_mulai_sewa`, `tanggal_akhir_sewa`, `produk_rokok`) VALUES
(48, 2147483647, 2, 12, 1, 'lunas', 'lunas', '2023-09-19', '2024-09-19', 0),
(18, 2147483647, 2, 6, 2, 'lunas', 'lunas', '2021-08-20', '2022-02-20', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sudut_pandang`
--

CREATE TABLE `sudut_pandang` (
  `arah` varchar(3) NOT NULL,
  `skor` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sudut_pandang`
--

INSERT INTO `sudut_pandang` (`arah`, `skor`, `id`) VALUES
('1', 2, 5),
('2', 4, 6),
('3', 6, 7),
('4', 8, 8),
('>4', 10, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `nama` varchar(100) NOT NULL,
  `no_ktp` varchar(16) NOT NULL,
  `tempat_lahir` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `lingkungan` varchar(255) NOT NULL,
  `kelurahan` varchar(255) NOT NULL,
  `rt` int(3) NOT NULL,
  `rw` int(3) NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `no_hp` varchar(16) NOT NULL,
  `jenis_user` varchar(7) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`nama`, `no_ktp`, `tempat_lahir`, `tanggal_lahir`, `lingkungan`, `kelurahan`, `rt`, `rw`, `pekerjaan`, `kecamatan`, `no_hp`, `jenis_user`, `username`, `password`) VALUES
('diana', '3958943532', 'diana', '2019-04-09', 'diana', 'diana', 12, 21, 'diana', 'diana', '42453252', 'admin', 'diana', '3a23bb515e06d0e944ff916e79a7775c'),
('dandi', '432432432', 'dandi', '2019-08-17', 'dandi', 'dandi', 2, 2, 'dandi', 'dandi', '241', 'user', 'dandi', '32408919e7c985cf5439ebda3e1eb0f5'),
('boy', '432532', 'mataram', '2019-01-06', 'mataram', 'mataram', 12, 12, 'direktur pt.adidaya', 'mataram', '43085358', 'user', 'boy', '6ff47661c8b81660a4d56a5c71cb1b45');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jenis_reklame`
--
ALTER TABLE `jenis_reklame`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indeks untuk tabel `ketentuan`
--
ALTER TABLE `ketentuan`
  ADD PRIMARY KEY (`id_ketentuan`);

--
-- Indeks untuk tabel `ketinggian`
--
ALTER TABLE `ketinggian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi_jalan`
--
ALTER TABLE `lokasi_jalan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  ADD PRIMARY KEY (`id_penyewa`);

--
-- Indeks untuk tabel `reklame`
--
ALTER TABLE `reklame`
  ADD PRIMARY KEY (`id_reklame`);

--
-- Indeks untuk tabel `sewa`
--
ALTER TABLE `sewa`
  ADD PRIMARY KEY (`id_sewa`);

--
-- Indeks untuk tabel `sudut_pandang`
--
ALTER TABLE `sudut_pandang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`no_ktp`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jenis_reklame`
--
ALTER TABLE `jenis_reklame`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `ketentuan`
--
ALTER TABLE `ketentuan`
  MODIFY `id_ketentuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `ketinggian`
--
ALTER TABLE `ketinggian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `lokasi_jalan`
--
ALTER TABLE `lokasi_jalan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `penyewa`
--
ALTER TABLE `penyewa`
  MODIFY `id_penyewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reklame`
--
ALTER TABLE `reklame`
  MODIFY `id_reklame` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `sewa`
--
ALTER TABLE `sewa`
  MODIFY `id_sewa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sudut_pandang`
--
ALTER TABLE `sudut_pandang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
