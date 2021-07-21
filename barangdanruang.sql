-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2021 pada 04.58
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `barangdanruang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kode_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `merk` varchar(255) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `foto_barang` varchar(100) NOT NULL,
  `qr_code` varchar(255) NOT NULL,
  `id_jenis_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `kode_barang`, `nama_barang`, `merk`, `jumlah`, `keterangan`, `foto_barang`, `qr_code`, `id_jenis_barang`) VALUES
(11, 'BRG0009', 'Microphone', 'Sony', 1, '<p>Mic wireless</p>', 'BarangDinas1625570845.png', 'Microphone.png', 9),
(13, 'BRG0013', 'Calculating machine', 'Casio', 20, '<p>-<br></p>', 'BarangDinas1625570793.png', 'Calculating machine.png', 5),
(15, 'BRG0014', 'Meja', 'Ikea', 9, '<p>Meja</p>', 'BarangDinas1626181902.jpg', 'Meja.png', 6),
(16, 'BRG0016', 'Sound', 'Camac', 12, '<p>wireless<br></p>', 'BarangDinas1626441855.jpg', 'Sound.png', 9),
(17, 'BRG0017', 'televisi', 'LG', 11, '<p>SmartTV<br></p>', 'BarangDinas1626441999.jpg', 'televisi.png', 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_barang`
--

CREATE TABLE `jenis_barang` (
  `id_jenis_barang` int(11) NOT NULL,
  `jenis_barang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_barang`
--

INSERT INTO `jenis_barang` (`id_jenis_barang`, `jenis_barang`) VALUES
(5, 'Mesin-mesin kantor (office machine)'),
(6, 'Perabot kantor (office furniture)'),
(7, 'Hiasan kantor (office ornament) '),
(8, 'Perabot kantor tempelan (office fixture) '),
(9, 'Alat bantu peraga (LCD, OHP, Microphone, Video, Televisi)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kembali_barang`
--

CREATE TABLE `kembali_barang` (
  `id_kembali_barang` int(11) NOT NULL,
  `kondisi_barang` text NOT NULL,
  `id_pinjam_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kembali_barang`
--

INSERT INTO `kembali_barang` (`id_kembali_barang`, `kondisi_barang`, `id_pinjam_barang`) VALUES
(5, '<p>okee<br></p>', 31),
(6, '<p>tegkyu</p>', 31),
(7, '<p><br></p>', 33);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif`
--

CREATE TABLE `notif` (
  `id` int(100) NOT NULL,
  `judul` varchar(126) NOT NULL,
  `pesan` text NOT NULL,
  `is_read` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notif`
--

INSERT INTO `notif` (`id`, `judul`, `pesan`, `is_read`) VALUES
(74, 'Pengajuan Ditambahkan', 'Pengajuan oleh ID pinjam  : \"10\" - \"Lofi\" dengan Ruang : \"Upakari 1\" dan Sesi : \"07:00 AM - 08:00 AM\" ditambahkan pada Fri, 16-Jul-2021 13:35.', 1),
(75, 'Pengajuan Ditambahkan', 'Pengajuan oleh ID pinjam  : \"11\" - \"Lofi\" dengan Ruang : \"Upakari 1\" dan Sesi : \"07:00 AM - 08:00 AM\" ditambahkan pada Fri, 16-Jul-2021 13:39.', 0),
(76, 'Pengajuan Diperpanjang', 'Pengajuan Perpanjangan dengan ID Pinjam : \"11\" Nama Peminjam: \"Lofi\" menjadi ID Ruang : \"48\" -  \"Upakari 2\" & Sesi : \"10:00 AM - 11:00 AM\" diganti pada Sat, 17-Jul-2021 10:25.', 0),
(77, 'Pengajuan Ditambahkan', 'Pengajuan oleh ID pinjam  : \"12\" - \"Lofi\" dengan Ruang : \"Upakari 1\" dan Sesi : \"07:00 AM - 08:00 AM\" ditambahkan pada Mon, 19-Jul-2021 09:26.', 1),
(78, 'Pengajuan Ditambahkan', 'Pengajuan oleh ID pinjam  : \"13\" - \"Lofi\" dengan Ruang : \"Upakari 1\" dan Sesi : \"08:00 PM - 09:00 AM\" ditambahkan pada Mon, 19-Jul-2021 10:14.', 0),
(79, 'Pengajuan Ditambahkan', 'Pengajuan oleh ID pinjam  : \"14\" - \"Lofi\" dengan Ruang : \"Upakari 2\" dan Sesi : \"07:00 AM - 08:00 AM\" ditambahkan pada Mon, 19-Jul-2021 10:17.', 0),
(80, 'Data Pengajuan Dihapus', 'Pengajuan dengan ID Pinjam : \"14\" Peminjam : \"Lofi\" dengan Ruang : \"Upakari 2\" Sesi : \"07:00 AM - 08:00 AM\" dihapus pada Mon, 19-Jul-2021 11:29. Dikarenakan tidak memenuhi syarat untuk peminjaman ruang.', 0),
(81, 'Pengajuan Ditambahkan', 'Pengajuan oleh ID pinjam  : \"15\" - \"Lofi\" dengan Ruang : \"Upakari 2\" dan Sesi : \"07:00 AM - 08:00 AM\" ditambahkan pada Mon, 19-Jul-2021 12:34.', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notif_barang`
--

CREATE TABLE `notif_barang` (
  `id` int(100) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pesan` text NOT NULL,
  `is_read` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `notif_barang`
--

INSERT INTO `notif_barang` (`id`, `judul`, `pesan`, `is_read`) VALUES
(53, 'Pengajuan Pinjam Barang Ditambahkan', 'Pengajuan oleh peminjam ber-ID User : \"\" dengan Nama Barang : \"\" - \"\" ditambahkan pada Sat, 17-Jul-2021 09:50.', 0),
(54, 'Pengajuan Pinjam Barang Ditambahkan', 'Pengajuan oleh peminjam ber-ID User : \"31\" - \"Lofi\" dengan Nama Barang : \"televisi\" - \"LG\" ditambahkan pada Sat, 17-Jul-2021 09:55.', 0),
(55, 'Pengajuan Pinjam Barang Diperpanjang', 'Pengajuan Perpanjangan Pinjam Barang dengan ID Pinjam : \"31\" menjadi sampai tanggal : \"2021-07-18\" diganti pada Sat, 17-Jul-2021 10:07.', 0),
(56, 'Pengajuan Pinjam Barang Diperpanjang', 'Pengajuan Perpanjangan Pinjam Barang dengan ID Pinjam : \"31\" Nama : \"Lofi\" menjadi sampai tanggal : \"2021-07-18\" diganti pada Sat, 17-Jul-2021 10:18.', 0),
(57, 'Pengajuan Pinjam Barang Diperpanjang', 'Pengajuan Perpanjangan Pinjam Barang dengan ID Pinjam : \"31\" Nama Peminjam: \"Lofi\" Barang dipinjam : \"televisi\" - \"LG\" menjadi sampai tanggal : \"2021-07-18\" diganti pada Sat, 17-Jul-2021 10:20.', 0),
(58, 'Pengajuan Pinjam Barang Ditambahkan', 'Pengajuan oleh peminjam ber-ID User : \"31\" - \"Lofi\" dengan Nama Barang : \"Sound\" - \"Camac\" ditambahkan pada Mon, 19-Jul-2021 09:51.', 0),
(59, 'Pengajuan Pinjam Barang Ditambahkan', 'Pengajuan oleh peminjam ber-ID User : \"32\" - \"Lofi\" dengan Nama Barang : \"Microphone\" - \"Sony\" ditambahkan pada Mon, 19-Jul-2021 09:52.', 0),
(60, 'Pengajuan Pinjam Barang Ditambahkan', 'Pengajuan oleh peminjam ber-ID User : \"33\" - \"Lofi\" dengan Nama Barang : \"Meja\" - \"Ikea\" ditambahkan pada Mon, 19-Jul-2021 09:53.', 0),
(61, 'Pengajuan Ditolak', 'Pengajuan dengan ID Pinjam : \"32\" Peminjam : \"Lofi\" Nama Barang : \"Sound\" - \"Camac\" Jumlah Pinjam : \"1\" dihapus pada Mon, 19-Jul-2021 12:07. Dikarenakan tidak memenuhi syarat untuk peminjaman barang.', 0),
(62, 'Pengajuan Pinjam Barang Ditambahkan', 'Pengajuan oleh peminjam ber-ID User : \"34\" - \"Lofi\" dengan Nama Barang : \"Meja\" - \"Ikea\" ditambahkan pada Mon, 19-Jul-2021 12:49.', 0),
(63, 'Pengajuan Pinjam Barang Diperpanjang', 'Pengajuan Perpanjangan Pinjam Barang dengan ID Pinjam : \"34\" Nama Peminjam: \"Lofi\" Barang dipinjam : \"Meja\" - \"Ikea\" menjadi sampai tanggal : \"2021-07-20\" diganti pada Mon, 19-Jul-2021 13:48.', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `opd`
--

CREATE TABLE `opd` (
  `id_opd` int(20) NOT NULL,
  `nama_opd` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `opd`
--

INSERT INTO `opd` (`id_opd`, `nama_opd`) VALUES
(1, 'Dinas Kominfo SP '),
(2, 'Dinas Kesehatan '),
(3, 'Dinas Pariwisata'),
(4, 'Dinas Perikanan'),
(5, 'Dinas Perpustakaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(20) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `nama_kegiatan` varchar(128) NOT NULL,
  `no_hp_peminjam` int(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `surat` varchar(50) NOT NULL,
  `id_ruang` int(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_dibuat` bigint(20) NOT NULL,
  `judul_notif` varchar(100) NOT NULL,
  `pesan_notif` text NOT NULL,
  `status_pinjam` int(2) NOT NULL,
  `status_baca` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `tgl_pinjam`, `tgl_selesai`, `nama_kegiatan`, `no_hp_peminjam`, `email`, `surat`, `id_ruang`, `id_user`, `tanggal_dibuat`, `judul_notif`, `pesan_notif`, `status_pinjam`, `status_baca`) VALUES
(11, '2021-07-16', '2021-07-19', 'bismillah ya allah', 1223198, 'kazucan.candra@gmail.com', 'berhasik_registerasi2.pdf', 48, 4, 1626517503, 'Pengajuan Disetujui', 'Pengajuan oleh \" Lofi \" Ruang :  \" Upakari 1 \" dan Sesi : 07:00 AM - 08:00 AM \" disetujui Admin sistem pada Fri, 16-Jul-2021 13:39.', 2, 2),
(12, '2021-07-19', '2021-07-20', 'Rapat A', 1223198, 'kazucan.candra@gmail.com', 'berhasik_registerasi3.pdf', 44, 4, 1626686816, 'Pengajuan Disetujui', 'Pengajuan oleh \" Lofi \" Ruang :  \" Upakari 1 \" dan Sesi : 07:00 AM - 08:00 AM \" disetujui Admin sistem pada Mon, 19-Jul-2021 09:26.', 1, 1),
(13, '2021-07-19', '2021-07-19', 'Rapat A lagi', 9238921, 'sulistyowatihernowo@gmail.com', 'KRS_SMT_6_Candra_Angujiwati.pdf', 45, 4, 1626689686, 'Pengajuan Disetujui', 'Pengajuan oleh \" Lofi \" Ruang :  \" Upakari 1 \" dan Sesi : 08:00 PM - 09:00 AM \" disetujui Admin sistem pada Mon, 19-Jul-2021 10:14.', 1, 1),
(14, '2021-07-19', '2021-07-20', 'Rapat B', 1223198, 'kazucan.candra@gmail.com', 'kwitansi_pendidikan_4_feb.pdf', 46, 4, 1626689840, 'Ditolak', 'Peminjaman Ditolak dikarenakan tidak memenuhi syarat untuk peminjaman barang.', 3, 1),
(15, '2021-07-19', '2021-07-20', 'Rapat besar', 2147483647, 'kazucan.candra@gmail.com', 'berhasik_registerasi4.pdf', 46, 4, 1626698072, 'Sedang Proses', '', 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam_barang`
--

CREATE TABLE `pinjam_barang` (
  `id_pinjam_barang` int(11) NOT NULL,
  `tgl_pinjam_barang` date NOT NULL,
  `tgl_kembali_barang` date NOT NULL,
  `no_hp_peminjam_barang` varchar(255) NOT NULL,
  `email_peminjam_barang` varchar(255) NOT NULL,
  `surat_pinjam_barang` varchar(255) NOT NULL,
  `jumlah_pinjam` int(255) NOT NULL,
  `keperluan` varchar(255) NOT NULL,
  `status_pinjam_barang` int(11) NOT NULL,
  `tanggal_buat_pinjam_barang` bigint(20) NOT NULL,
  `judul_notif_barang` varchar(255) NOT NULL,
  `pesan_notif_barang` text NOT NULL,
  `status_baca_notif_barang` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam_barang`
--

INSERT INTO `pinjam_barang` (`id_pinjam_barang`, `tgl_pinjam_barang`, `tgl_kembali_barang`, `no_hp_peminjam_barang`, `email_peminjam_barang`, `surat_pinjam_barang`, `jumlah_pinjam`, `keperluan`, `status_pinjam_barang`, `tanggal_buat_pinjam_barang`, `judul_notif_barang`, `pesan_notif_barang`, `status_baca_notif_barang`, `id_barang`, `id_user`) VALUES
(31, '2021-07-17', '2021-07-17', '1223198', 'kazucan.candra@gmail.com', '', 1, 'Acara HUT', 2, 1626517252, 'Pengajuan Disetujui', 'Pengajuan oleh \" Lofi \" NIP : \" 123456789 \" ID Barang :  \" televisi \" disetujui Admin sistem pada Sat, 17-Jul-2021 10:07.', 2, 17, 4),
(32, '2021-07-19', '2021-07-19', '1223198', 'kazucan.candra@gmail.com', 'Bukti_Pembantu_Pembayaran_Biaya_Pendidikan.pdf', 1, 'Rapat ', 3, 1626688306, 'Ditolak', 'Peminjaman Ditolak dikarenakan tidak memenuhi syarat untuk peminjaman barang.', 1, 16, 4),
(33, '2021-07-19', '2021-07-19', '81221122', 'kazucan.candra@gmail.com', 'KRS_SMT_6_Candra_Angujiwati.pdf', 1, 'Rapat', 1, 1626688345, 'Pengajuan Disetujui', 'Pengajuan oleh \" Lofi \" NIP : \" 123456789 \" ID Barang :  \" Microphone \" disetujui Admin sistem pada Mon, 19-Jul-2021 09:52.', 1, 11, 4),
(34, '2021-07-19', '2021-07-20', '1223198', 'kazucan.candra@gmail.com', '', 1, 'Rapat', 1, 1626702518, 'Pengajuan Disetujui', 'Pengajuan oleh \" Lofi \" NIP : \" 123456789 \" ID Barang :  \" Meja \" disetujui Admin sistem pada Mon, 19-Jul-2021 09:53.', 1, 15, 4),
(35, '2021-07-19', '2021-07-20', '098765432', 'kazucan.candra@gmail.com', 'KRS_SMT_6_Candra_Angujiwati1.pdf', 2, 'Pendaftaran xxx', 0, 1626698941, 'Sedang Proses', '', 0, 15, 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjam_ruang`
--

CREATE TABLE `pinjam_ruang` (
  `id_pinjam_ruang` int(20) NOT NULL,
  `id_peminjaman` int(20) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pinjam_ruang`
--

INSERT INTO `pinjam_ruang` (`id_pinjam_ruang`, `id_peminjaman`, `keterangan`) VALUES
(1, 11, 'baik');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(20) NOT NULL,
  `nama_ruang` varchar(50) NOT NULL,
  `kapasitas` int(10) NOT NULL,
  `fasilitas_ruang` text NOT NULL,
  `area` bigint(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `status_ruang` int(2) NOT NULL,
  `id_sesi` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nama_ruang`, `kapasitas`, `fasilitas_ruang`, `area`, `gambar`, `status_ruang`, `id_sesi`) VALUES
(44, 'Upakari 1', 30, '<p>Ac, Meja, Kursi, Mic, LCD<br></p>', 35, 'RuangDinas1626290632.jpeg', 1, 11),
(45, 'Upakari 1', 20, '<p>Ac, Meja, Kursi, Mic, LCD<br></p>', 25, 'RuangDinas1626287159.jpg', 1, 12),
(46, 'Upakari 2', 15, '<p>-<br></p>', 20, 'RuangDinas1626349418.jpg', 0, 11),
(47, 'Upakari 2', 15, '<p>-<br></p>', 20, 'RuangDinas1626349418.jpg', 0, 12),
(48, 'Upakari 2', 15, '<p>-<br></p>', 20, 'RuangDinas1626349418.jpg', 0, 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `sesi`
--

CREATE TABLE `sesi` (
  `id_sesi` int(20) NOT NULL,
  `waktu_sesi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sesi`
--

INSERT INTO `sesi` (`id_sesi`, `waktu_sesi`) VALUES
(11, '07:00 AM - 08:00 AM'),
(12, '08:00 PM - 09:00 AM'),
(13, '10:00 AM - 11:00 AM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nip` varchar(255) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date_created` int(11) NOT NULL,
  `id_user_grup` int(11) NOT NULL,
  `id_opd` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `nip`, `jk`, `username`, `password`, `date_created`, `id_user_grup`, `id_opd`) VALUES
(1, 'Jungkook', '2147483647', 'L', 'jk123', '4519ae61ad4460c2cc04e56ef30512b2', 1624297169, 1, 1),
(2, 'Bonboncabe', '2147483647', 'L', 'bonbon', 'bb4391df78096e6ffe4098a6f90aa37e', 1624330607, 2, 3),
(3, 'Admin Sistem ini', '3118020', 'P', 'admin', '21232f297a57a5a743894a0e4a801fc3', 1624736330, 1, 1),
(4, 'Lofi', '19991113202107192004', 'P', 'user1', '24c9e15e52afc47c225b757e7bee1f9d', 1626823228, 2, 1),
(5, 'Candra Angujiwati', '311802020', 'P', 'user2', '7e58d63b60197ceb55a1c487989a3720', 1625297108, 2, 3),
(6, 'day6', '6666666', 'L', 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 1625418454, 2, 1),
(7, '', '', '', '', '24c9e15e52afc47c225b757e7bee1f9d', 0, 1, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_grup`
--

CREATE TABLE `user_grup` (
  `id_user_grup` int(11) NOT NULL,
  `nama_user_grup` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user_grup`
--

INSERT INTO `user_grup` (`id_user_grup`, `nama_user_grup`) VALUES
(1, 'Admin Sistem'),
(2, 'User atau Pegawai');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_jenis_barang` (`id_jenis_barang`);

--
-- Indeks untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  ADD PRIMARY KEY (`id_jenis_barang`);

--
-- Indeks untuk tabel `kembali_barang`
--
ALTER TABLE `kembali_barang`
  ADD PRIMARY KEY (`id_kembali_barang`),
  ADD KEY `id_pinjam_barang` (`id_pinjam_barang`);

--
-- Indeks untuk tabel `notif`
--
ALTER TABLE `notif`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notif_barang`
--
ALTER TABLE `notif_barang`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `opd`
--
ALTER TABLE `opd`
  ADD PRIMARY KEY (`id_opd`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD KEY `id_ruang` (`id_ruang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD PRIMARY KEY (`id_pinjam_barang`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user_barang` (`id_user`);

--
-- Indeks untuk tabel `pinjam_ruang`
--
ALTER TABLE `pinjam_ruang`
  ADD PRIMARY KEY (`id_pinjam_ruang`),
  ADD KEY `id_peminjaman` (`id_peminjaman`);

--
-- Indeks untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD KEY `id_sesi` (`id_sesi`);

--
-- Indeks untuk tabel `sesi`
--
ALTER TABLE `sesi`
  ADD PRIMARY KEY (`id_sesi`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_grup` (`id_user_grup`),
  ADD KEY `id_opd` (`id_opd`);

--
-- Indeks untuk tabel `user_grup`
--
ALTER TABLE `user_grup`
  ADD PRIMARY KEY (`id_user_grup`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jenis_barang`
--
ALTER TABLE `jenis_barang`
  MODIFY `id_jenis_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kembali_barang`
--
ALTER TABLE `kembali_barang`
  MODIFY `id_kembali_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `notif`
--
ALTER TABLE `notif`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT untuk tabel `notif_barang`
--
ALTER TABLE `notif_barang`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT untuk tabel `opd`
--
ALTER TABLE `opd`
  MODIFY `id_opd` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  MODIFY `id_pinjam_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `pinjam_ruang`
--
ALTER TABLE `pinjam_ruang`
  MODIFY `id_pinjam_ruang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT untuk tabel `sesi`
--
ALTER TABLE `sesi`
  MODIFY `id_sesi` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `user_grup`
--
ALTER TABLE `user_grup`
  MODIFY `id_user_grup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_jenis_barang`) REFERENCES `jenis_barang` (`id_jenis_barang`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kembali_barang`
--
ALTER TABLE `kembali_barang`
  ADD CONSTRAINT `kembali_barang_ibfk_1` FOREIGN KEY (`id_pinjam_barang`) REFERENCES `pinjam_barang` (`id_pinjam_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD CONSTRAINT `peminjaman_ibfk_1` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `peminjaman_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pinjam_barang`
--
ALTER TABLE `pinjam_barang`
  ADD CONSTRAINT `pinjam_barang_ibfk_2` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pinjam_barang_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Ketidakleluasaan untuk tabel `pinjam_ruang`
--
ALTER TABLE `pinjam_ruang`
  ADD CONSTRAINT `pinjam_ruang_ibfk_1` FOREIGN KEY (`id_peminjaman`) REFERENCES `peminjaman` (`id_peminjaman`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `ruang`
--
ALTER TABLE `ruang`
  ADD CONSTRAINT `ruang_ibfk_2` FOREIGN KEY (`id_sesi`) REFERENCES `sesi` (`id_sesi`);

--
-- Ketidakleluasaan untuk tabel `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_grup`) REFERENCES `user_grup` (`id_user_grup`),
  ADD CONSTRAINT `user_ibfk_2` FOREIGN KEY (`id_opd`) REFERENCES `opd` (`id_opd`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
