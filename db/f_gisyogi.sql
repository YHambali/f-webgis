-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Mar 2023 pada 13.45
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `f_gisyogi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bencana`
--

CREATE TABLE `tb_bencana` (
  `id_bencana` varchar(10) NOT NULL,
  `nm_bencana` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_bencana`
--

INSERT INTO `tb_bencana` (`id_bencana`, `nm_bencana`) VALUES
('KT004', 'Banjir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_daerah_rawan_bencana`
--

CREATE TABLE `tb_daerah_rawan_bencana` (
  `id_rawan_bencana` varchar(10) NOT NULL,
  `id_desa` varchar(10) NOT NULL,
  `ket_wilayah` text,
  `ket_rawan_bencana` text,
  `status_rawan_bencana` varchar(20) NOT NULL,
  `latitude` text,
  `longitude` text,
  `tgl_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_daerah_rawan_bencana`
--

INSERT INTO `tb_daerah_rawan_bencana` (`id_rawan_bencana`, `id_desa`, `ket_wilayah`, `ket_rawan_bencana`, `status_rawan_bencana`, `latitude`, `longitude`, `tgl_update`) VALUES
('20220001', 'KC001DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.171053', '-6.053407', '2022-05-19'),
('20220003', 'KC002DS002', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.407609', '-6.311412', '2022-05-19'),
('20220004', 'KC003DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.275228', '-6.104507', '2022-05-19'),
('20220005', 'KC004DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.232298', '-6.052214', '2022-05-19'),
('20220006', 'KC005DS003', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.290115', '-6.127078', '2022-05-19'),
('20220007', 'KC005DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.300623', '-6.137199', '2022-05-19'),
('20220008', 'KC006DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.254104', '-6.320116', '2022-05-19'),
('20220009', 'KC007DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.497577', '-6.230624', '2022-05-19'),
('20220010', 'KC008DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.616589', '-6.216437', '2022-05-19'),
('20220011', 'KC004DS002', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.220925', '-6.003303', '2022-05-19'),
('20220012', 'KC009DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.437226', '-6.391989', '2022-05-19'),
('20220013', 'KC004DS003', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.261915', '-6.001777', '2022-05-19'),
('20220014', 'KC005DS002', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.291765', '-6.155139', '2022-05-19'),
('20220015', 'KC005DS004', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.297168', '-6.191836', '2022-05-19'),
('20220016', 'KC005DS005', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.293534', '-6.171543', '2022-05-19'),
('20220017', 'KC005DS006', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.299609', '-6.212365', '2022-05-19'),
('20220018', 'KC006DS002', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.226727', '-6.315766', '2022-05-19'),
('20220019', 'KC008DS002', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.574115', '-6.260601', '2022-05-19'),
('20220020', 'KC008DS003', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.578548', '-6.235274', '2022-05-19'),
('20220021', 'KC009DS002', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.426839', '-6.390312', '2022-05-19'),
('20220022', 'KC010DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.355704', '-5.995835', '2022-05-19'),
('20220023', 'KC011DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.280405', '-6.254072', '2022-05-19'),
('20220024', 'KC012DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.490109', '-6.391486', '2022-05-19'),
('20220025', 'KC013DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.501421', '-6.295340', '2022-05-19'),
('20220026', 'KC014DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.353873', '-6.203616', '2022-05-19'),
('20220027', 'KC015DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.328289', '-6.143865', '2022-05-19'),
('20220028', 'KC016DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.276134', '-6.310322', '2022-05-19'),
('20220029', 'KC017DS001', '<p>Kabupaten Karawang</p>', '<p>Banjir</p>', 'Rawan', '107.391393', '-6.036471', '2022-05-19'),
('20220030', 'KC018DS001', '<p>Kabupaten Karawang</p>', '<p>-</p>', 'Tidak Rawan', '107.454522', '-6.325372', '2022-05-19'),
('20220031', 'KC019DS001', '<p>Kabupaten Karawang</p>', '<p>-</p>', 'Tidak Rawan', '107.392174', '-6.226193', '2022-05-19'),
('20220032', 'KC017DS002', '<p>Kabupaten Karawang</p>', '<p>-</p>', 'Tidak Rawan', '107.340799', '-6.092132', '2022-05-19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_desa`
--

CREATE TABLE `tb_desa` (
  `id_desa` varchar(10) NOT NULL,
  `id_kecamatan` varchar(10) NOT NULL,
  `nm_desa` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_desa`
--

INSERT INTO `tb_desa` (`id_desa`, `id_kecamatan`, `nm_desa`) VALUES
('KC001DS001', 'KC001', 'Teluk Buyung'),
('KC002DS001', 'KC002', 'Tegalsari'),
('KC002DS002', 'KC002', 'Darawolong '),
('KC003DS001', 'KC003', 'Medangasem'),
('KC004DS001', 'KC004', 'Medankarya'),
('KC004DS002', 'KC004', 'Tambaksari'),
('KC004DS003', 'KC004', 'Tambaksumur'),
('KC005DS001', 'KC005', 'Rengasdengklok Utara'),
('KC005DS002', 'KC005', 'Rengasdengklok Selatan'),
('KC005DS003', 'KC005', 'Kertasari'),
('KC005DS004', 'KC005', 'Karyasari'),
('KC005DS005', 'KC005', 'Amansari'),
('KC005DS006', 'KC005', 'Kalangsari'),
('KC006DS001', 'KC006', 'Karangligar'),
('KC006DS002', 'KC006', 'Mekarmulya'),
('KC007DS001', 'KC007', 'Langensari'),
('KC008DS001', 'KC008', 'Muara'),
('KC008DS002', 'KC008', 'Tegalwaru'),
('KC008DS003', 'KC008', 'Rawagempol Wetan'),
('KC009DS001', 'KC009', 'Dawuan Tengah'),
('KC009DS002', 'KC009', 'Dawuan Barat'),
('KC010DS001', 'KC010', 'Cemarajaya'),
('KC011DS001', 'KC011', 'Tunggakjati'),
('KC012DS001', 'KC012', 'Pangulah Utara'),
('KC013DS001', 'KC013', 'Sukamekar'),
('KC014DS001', 'KC014', 'Panyingkiran'),
('KC015DS001', 'KC015', 'Kutajaya'),
('KC016DS001', 'KC016', 'Sukamakmur'),
('KC017DS001', 'KC017', 'Sungaibuntu'),
('KC017DS002', 'KC017', 'Malangsari'),
('KC018DS001', 'KC018', 'Bojongsari'),
('KC019DS001', 'KC019', 'Pasirkamuning'),
('KC020DS001', 'KC020', 'Bojongsarii');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kecamatan`
--

CREATE TABLE `tb_kecamatan` (
  `id_kecamatan` varchar(10) NOT NULL,
  `nm_kecamatan` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kecamatan`
--

INSERT INTO `tb_kecamatan` (`id_kecamatan`, `nm_kecamatan`) VALUES
('KC001', 'Pakisjaya'),
('KC002', 'Purwasari'),
('KC003', 'Jayakerta'),
('KC004', 'Tirtajaya'),
('KC005', 'Rengasdengklok'),
('KC006', 'Telukjambe Barat'),
('KC007', 'Cilamaya Kulon'),
('KC008', 'Cilamaya Wetan'),
('KC009', 'Cikampek'),
('KC010', 'Cibuaya'),
('KC011', 'Karawang Barat'),
('KC012', 'Kota Baru'),
('KC013', 'Jatisari'),
('KC014', 'Rawamerta'),
('KC015', 'Kutawaluya'),
('KC016', 'Telukjambe Timur'),
('KC017', 'Pedes'),
('KC018', 'Tirtamulya'),
('KC019', 'Telagasari'),
('KC020', 'Jayakertaa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekam_bencana`
--

CREATE TABLE `tb_rekam_bencana` (
  `id_rekam_bencana` varchar(10) NOT NULL,
  `id_desa` varchar(10) NOT NULL,
  `id_bencana` varchar(10) NOT NULL,
  `tgl_bencana` date DEFAULT NULL,
  `ket_bencana` text,
  `file_dokumentasi` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rekam_bencana`
--

INSERT INTO `tb_rekam_bencana` (`id_rekam_bencana`, `id_desa`, `id_bencana`, `tgl_bencana`, `ket_bencana`, `file_dokumentasi`) VALUES
('20190001', 'KC006DS001', 'KT004', '2019-12-28', '<p>Merendam 30 rumah</p>', '201900011.pdf'),
('20190002', 'KC006DS002', 'KT004', '2019-04-19', '<p>Merendam 148 rumah<br />Merusak 5 fasum</p>', '201900022.pdf'),
('20190003', 'KC006DS001', 'KT004', '2019-04-19', '<p>Merendam 148 rumah<br />Merusak 5 fasum</p>', '20190003.pdf'),
('20190004', 'KC004DS003', 'KT004', '2019-01-30', '<p>Merendam 70 rumah</p>', '20190004.pdf'),
('20190005', 'KC017DS001', 'KT004', '2019-01-30', '<p>Merendam 70 rumah</p>', '201900051.pdf'),
('20200001', 'KC005DS001', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '202000012.pdf'),
('20200002', 'KC006DS001', 'KT004', '2020-02-20', '<p>Merendam 318 rumah</p>', '20200002.pdf'),
('20200003', 'KC006DS002', 'KT004', '2020-02-20', '<p>Merendam 318 rumah</p>', '202000032.pdf'),
('20200004', 'KC016DS001', 'KT004', '2020-02-20', '<p>Merendam 318 rumah</p>', '202000044.pdf'),
('20200005', 'KC014DS001', 'KT004', '2020-02-20', '<p>Merendam 318 rumah</p>', '202000053.pdf'),
('20200006', 'KC015DS001', 'KT004', '2020-02-20', '<p>Merendam 318 rumah</p>', '20200006.pdf'),
('20200007', 'KC006DS001', 'KT004', '2020-02-16', '<p>Merendam 1291 rumah</p>', '20200007.pdf'),
('20200008', 'KC009DS002', 'KT004', '2020-02-16', '<p>Merendam 1291 rumah</p>', '202000083.pdf'),
('20210001', 'KC006DS001', 'KT004', '2021-12-29', '<p>Merendam 5 rumah</p>', '202100012.pdf'),
('20210002', 'KC006DS001', 'KT004', '2021-12-28', '<p>Merendam 60 rumah</p>', '20210002.pdf'),
('20210003', 'KC006DS001', 'KT004', '2021-12-15', '<p>Merendam 25 rumah</p>', '20210003.pdf'),
('20210004', 'KC006DS001', 'KT004', '2021-12-11', '<p>Merendam 227 rumah</p>', '20210004.pdf'),
('20210005', 'KC007DS001', 'KT004', '2021-11-27', '<p>Merendam 11 rumah</p>', '202100051.pdf'),
('20210006', 'KC008DS001', 'KT004', '2021-11-27', '<p>Merendam 11 rumah</p>', '2021000613.pdf'),
('20210007', 'KC009DS001', 'KT004', '2021-11-25', '<p>Merendam 140 rumah</p>', '202100072.pdf'),
('20210008', 'KC006DS001', 'KT004', '2021-11-08', '<p>Merendam 216 rumah</p>', '20210008.pdf'),
('20210009', 'KC004DS002', 'KT004', '2021-11-07', '<p>Merendam 65 rumah</p>', '20210009.pdf'),
('20210010', 'KC008DS002', 'KT004', '2021-11-02', '<p>Merendam 239 rumah</p>', '202100101.pdf'),
('20210011', 'KC010DS001', 'KT004', '2021-08-16', '<p>Merusak 199 rumah</p>', '20210011.pdf'),
('20210012', 'KC006DS001', 'KT004', '2021-05-25', '<p>Merendam 15 rumah</p>', '20210012.pdf'),
('20210013', 'KC008DS003', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '20210013.pdf'),
('20210014', 'KC005DS002', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '20210014.pdf'),
('20210015', 'KC005DS003', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '20210015.pdf'),
('20210016', 'KC005DS004', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '202100162.pdf'),
('20210017', 'KC005DS005', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '202100173.pdf'),
('20210018', 'KC005DS006', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '202100181.pdf'),
('20210019', 'KC006DS001', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '20210019.pdf'),
('20210020', 'KC011DS001', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '202100201.pdf'),
('20210021', 'KC012DS001', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '202100211.pdf'),
('20210022', 'KC013DS001', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '20210022.pdf'),
('20210023', 'KC009DS002', 'KT004', '2021-02-07', '<p>Merendam 13585 rumah<br />Merusak 57 fasum<br />1 orang meningal</p>', '202100231.pdf'),
('20220001', 'KC001DS001', 'KT004', '2022-01-18', '<p>Merendam 2560 rumah</p>', '202200011.pdf'),
('20220002', 'KC002DS002', 'KT004', '2022-01-18', '<p>Merendam 2560 rumah</p>', '202200022.pdf'),
('20220003', 'KC003DS001', 'KT004', '2022-01-18', '<p>Merendam 2560 rumah</p>', '202200032.pdf'),
('20220004', 'KC004DS001', 'KT004', '2022-01-18', '<p>Merendam 2560 rumah</p>', '202200042.pdf'),
('20220005', 'KC005DS003', 'KT004', '2022-01-18', '<p>Merendam 2560 rumah</p>', '202200053.pdf'),
('20220006', 'KC005DS001', 'KT004', '2022-01-18', '<p>Merendam 2560 rumah</p>', '20220006.pdf'),
('20220007', 'KC006DS001', 'KT004', '2022-01-13', '<p>Merendam 398 rumah</p>', '202200071.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` varchar(10) NOT NULL,
  `usr` varchar(20) DEFAULT NULL,
  `pswd` text,
  `status_aktif` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `usr`, `pswd`, `status_aktif`) VALUES
('US002', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1),
('US003', 'yogi', '938e14c074c45c62eb15cc05a6f36d79', 1),
('US004', 'ogoy', '3a2d58ecb38979ad75dde8b2c8e9c591', 1);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_daerah_rawan_bencana`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_daerah_rawan_bencana` (
`id_rawan_bencana` varchar(10)
,`id_desa` varchar(10)
,`nm_desa` varchar(200)
,`id_kecamatan` varchar(10)
,`nm_kecamatan` varchar(200)
,`ket_wilayah` text
,`ket_rawan_bencana` text
,`status_rawan_bencana` varchar(20)
,`latitude` text
,`longitude` text
,`tgl_update` date
,`total_bencana` bigint(21)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_desa`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_desa` (
`id_desa` varchar(10)
,`id_kecamatan` varchar(10)
,`nm_desa` varchar(200)
,`nm_kecamatan` varchar(200)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `v_rekam_bencana`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `v_rekam_bencana` (
`id_rekam_bencana` varchar(10)
,`id_desa` varchar(10)
,`id_bencana` varchar(10)
,`tgl_bencana` date
,`ket_bencana` text
,`file_dokumentasi` text
,`id_kecamatan` varchar(10)
,`nm_kecamatan` varchar(200)
,`nm_desa` varchar(200)
,`nm_bencana` varchar(200)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `v_daerah_rawan_bencana`
--
DROP TABLE IF EXISTS `v_daerah_rawan_bencana`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_daerah_rawan_bencana`  AS  select `a`.`id_rawan_bencana` AS `id_rawan_bencana`,`a`.`id_desa` AS `id_desa`,`c`.`nm_desa` AS `nm_desa`,`c`.`id_kecamatan` AS `id_kecamatan`,`c`.`nm_kecamatan` AS `nm_kecamatan`,`a`.`ket_wilayah` AS `ket_wilayah`,`a`.`ket_rawan_bencana` AS `ket_rawan_bencana`,`a`.`status_rawan_bencana` AS `status_rawan_bencana`,`a`.`latitude` AS `latitude`,`a`.`longitude` AS `longitude`,`a`.`tgl_update` AS `tgl_update`,count(`b`.`id_rekam_bencana`) AS `total_bencana` from ((`tb_daerah_rawan_bencana` `a` left join `tb_rekam_bencana` `b` on((`b`.`id_desa` = `a`.`id_desa`))) left join `v_desa` `c` on((`c`.`id_desa` = `a`.`id_desa`))) group by `a`.`id_rawan_bencana` ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_desa`
--
DROP TABLE IF EXISTS `v_desa`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_desa`  AS  select `a`.`id_desa` AS `id_desa`,`a`.`id_kecamatan` AS `id_kecamatan`,`a`.`nm_desa` AS `nm_desa`,`b`.`nm_kecamatan` AS `nm_kecamatan` from (`tb_desa` `a` left join `tb_kecamatan` `b` on((`b`.`id_kecamatan` = `a`.`id_kecamatan`))) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `v_rekam_bencana`
--
DROP TABLE IF EXISTS `v_rekam_bencana`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_rekam_bencana`  AS  select `a`.`id_rekam_bencana` AS `id_rekam_bencana`,`a`.`id_desa` AS `id_desa`,`a`.`id_bencana` AS `id_bencana`,`a`.`tgl_bencana` AS `tgl_bencana`,`a`.`ket_bencana` AS `ket_bencana`,`a`.`file_dokumentasi` AS `file_dokumentasi`,`b`.`id_kecamatan` AS `id_kecamatan`,`b`.`nm_kecamatan` AS `nm_kecamatan`,`b`.`nm_desa` AS `nm_desa`,`c`.`nm_bencana` AS `nm_bencana` from ((`tb_rekam_bencana` `a` left join `v_desa` `b` on((`b`.`id_desa` = `a`.`id_desa`))) left join `tb_bencana` `c` on((`c`.`id_bencana` = `a`.`id_bencana`))) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_bencana`
--
ALTER TABLE `tb_bencana`
  ADD PRIMARY KEY (`id_bencana`) USING BTREE;

--
-- Indeks untuk tabel `tb_daerah_rawan_bencana`
--
ALTER TABLE `tb_daerah_rawan_bencana`
  ADD PRIMARY KEY (`id_rawan_bencana`) USING BTREE;

--
-- Indeks untuk tabel `tb_desa`
--
ALTER TABLE `tb_desa`
  ADD PRIMARY KEY (`id_desa`) USING BTREE;

--
-- Indeks untuk tabel `tb_kecamatan`
--
ALTER TABLE `tb_kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`) USING BTREE;

--
-- Indeks untuk tabel `tb_rekam_bencana`
--
ALTER TABLE `tb_rekam_bencana`
  ADD PRIMARY KEY (`id_rekam_bencana`) USING BTREE;

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`) USING BTREE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
