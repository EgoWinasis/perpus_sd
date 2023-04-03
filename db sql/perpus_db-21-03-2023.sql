-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Mar 2023 pada 16.12
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_biaya_denda`
--

CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_biaya_denda`
--

INSERT INTO `tbl_biaya_denda` (`id_biaya_denda`, `harga_denda`, `stat`, `tgl_tetap`) VALUES
(1, '4000', 'Aktif', '2023-03-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_buku`
--

CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_buku`
--

INSERT INTO `tbl_buku` (`id_buku`, `kode_buku`, `id_kategori`, `id_rak`, `isbn`, `title`, `penerbit`, `pengarang`, `thn_buku`, `jml`, `tgl_masuk`) VALUES
(34, 'BK04001', 11, 1, '978-979-052-155-1', 'Aku Bangga menjadi Warga Negara Indonesia', 'PT Armandelta Selaras', 'Widodo', '2010', 1, '2023-03-16 07:19:41'),
(35, 'BK04002', 11, 1, '978-602-8257-41-1', 'Aku Bangga menjadi Anak Indonesia', 'PT Armandelta Selaras', 'Kardono', '2017', 1, '2023-03-16 07:22:08'),
(36, 'BK04003', 11, 1, '979-534-430-8', 'Potensi Laut dan Samudra Kita', 'PT Intan Sejati', 'Iswanto', '2007', 1, '2023-03-16 07:46:09'),
(37, 'BK04004', 11, 1, '', 'KI GEDE SEBAYU PENDIRI PEMERINTAHAN TEGAL (TAHUN 1585-1625)', 'PENERBIT CITRA BAHARI ANIMASI TEGAL', 'Soetjiptoni', '2007', 1, '2023-03-16 07:27:32'),
(38, 'BK04005', 11, 1, '978-979-050-181-0', 'Budaya Dayak yang Kukenal', 'Armandelta Selaras', 'Fidelara', '2010', 1, '2023-03-16 07:29:21'),
(39, 'BK04006', 11, 1, '978-979-050-056-3', 'Budaya Betawi yang Kukenal', 'Armandelta Selaras', 'Fidelara', '2017', 1, '2023-03-16 07:31:02'),
(40, 'BK04007', 11, 1, '979-662-322-8', 'Peninggalan Sejarah di Indonesia', 'Penerbit Cempaka Putih', 'Wahjudi Djaja', '2008', 1, '2023-03-16 07:32:59'),
(41, 'BK04008', 11, 1, '979-662-320-4', 'Transportasi di Indonesia dari Masa ke Masa', 'Penerbit Cempaka Putih', 'Endar Wismulyani', '2017', 1, '2023-03-16 07:34:19'),
(42, 'BK04009', 11, 1, '979-662-491-1', 'Ayo, Hidup Berdisiplin', 'Penerbit Cempaka Putih', 'Amin Suprihatini', '2010', 1, '2023-03-16 07:35:46'),
(43, 'BK04010', 11, 1, '602-8567-05-3', 'Potret Pendidikan pada Era Global', 'JP Books', 'Indah Suraningtyas, Bima Syahab Hifmawan', '2017', 1, '2023-03-16 07:38:10'),
(44, 'BK04011', 11, 1, '602-8226-84-4', 'Belajar dari Pengalaman', 'Saka Mitra Kompetensi', 'Endar Wismulyani', '2013', 1, '2023-03-16 07:39:39'),
(45, 'BK04012', 11, 1, '979-662-470-6', 'Memberdayakan Potensi Kaum Muda', 'Penerbit Cempaka Putih', 'Sugiyarto', '2017', 1, '2023-03-16 07:41:04'),
(46, 'BK04013', 11, 1, '979-662-396-9', 'Muda dan Berprestasi', 'Penerbit Cempaka Putih', 'Karmila', '2017', 1, '2023-03-16 07:47:20'),
(47, 'BK04014', 11, 1, '979-781-104-2', 'Topik Paling Seru: Dinosaurus', 'Penerbit Erlangga', 'John Cooper', '2003', 1, '2023-03-16 07:50:58'),
(48, 'BK04015', 11, 1, '978-602-241-510-7', 'Aktivitas Pramuka untuk Penggalang Ramu', 'Penerbit Erlangga', 'Elly Sumarsih, dkk.', '2013', 1, '2023-03-16 07:53:49'),
(49, 'BK04016', 11, 1, '978-602-241-510-7', 'Aktivitas Pramuka untuk Siaga Mula', 'Penerbit Erlangga', 'Elly Sumarsih, dkk.', '2013', 1, '2023-03-16 11:27:06'),
(50, 'BK04017', 11, 1, '978-602-234-008-9', 'Pendidikan karakter dan Kepramukaan', 'PT Citra Aji Parama', 'Novan Ardy Wiyani', '2015', 1, '2023-03-16 07:57:16'),
(51, 'BK04018', 11, 1, '602-8712-69-9', 'Memecah Kebekuan dalam Permainan Pramuka', 'Penerbit Puri Pustaka', 'P.C. Kahono, dkk.', '2010', 1, '2023-03-16 07:58:58'),
(52, 'BK04019', 11, 1, '602-8712-70-5', 'Pembina Pramuka: Memimpin dengan Hati', 'PT Puri Pustaka', 'P.C. Kahono', '2010', 1, '2023-03-16 08:00:35'),
(53, 'BK04020', 11, 1, '602-8712-71-2', 'Menarik dan Menantang dalam Permainan Pramuka', 'Penerbit Puri Pustaka', 'P.C. Kahono, dkk.', '2017', 1, '2023-03-16 08:01:57'),
(54, 'BK04021', 11, 1, '602-8712-67-5', 'Pramuka Membentuk Karakter Generasi Muda', 'Penerbit Puri Pustaka', 'P.C. Kahono', '2010', 1, '2023-03-16 08:03:30'),
(55, 'BK04022', 11, 1, '979-28-0207-8', 'Mengenal Simbol Instansi', 'PT Intan Pariwara', 'Kuswilono', '2016', 1, '2023-03-16 08:05:05'),
(56, 'BK04023', 11, 1, '979-28-0205-4', 'Mengenal Simbol Daerah', 'PT Intan Pariwara', 'Kuswilono', '2017', 1, '2023-03-16 08:06:14'),
(57, 'BK04024', 11, 1, '979-28-0112-5', 'Pesona Wisata Sulawesi Selatan', 'PT Intan Pariwara', 'Iswanto', '2007', 1, '2023-03-16 08:07:36'),
(58, 'BK04025', 11, 1, '978-979-690-325-3', 'Pencegahan dan Penanggulangan Penyalahgunaan Narkoba Berbasis Sekolah', 'PT Balai Pustaka', 'Lydua Harlina Martono, Satya Joewana', '2017', 1, '2023-03-16 08:09:39'),
(59, 'BK04026', 11, 1, '979-534-224-X', 'Narkoba: Perlukah Mengenalnya?', 'PT Pakar Raya', 'Ida Listyarin Handoyo', '2006', 1, '2023-03-16 08:11:19'),
(60, 'BK04027', 11, 1, '602856783-1', 'Terjerat Narkoba', 'JP Books', 'Nur Farida', '2017', 1, '2023-03-16 08:12:25'),
(61, 'BK04028', 11, 1, '979-3632-43-8', 'Stop Mirasantika', 'PT Sunda Kelapa Pustaka', 'dr. Widharto', '2007', 1, '2023-03-16 08:14:01'),
(62, 'BK04029', 11, 1, '978-979-052-158-6', 'Aku Bangga Menjadi Anggota Polisi Republik Indonesia', 'PT Armandelta Selaras', 'Hamzah', '2010', 1, '2023-03-16 08:16:07'),
(63, 'BK04030', 11, 1, '', 'Modul Pembelajaran Lalu Lintas Tingkat SD/MI', 'Direktorat lalu Lintas Polda Jateng', 'Agung Arisatyawan Adhi, dkk.', '2016', 1, '2023-03-16 08:21:26'),
(64, 'BK04031', 11, 1, '602-8227-36-0', 'Pemuda &amp; Kelautan: Pariwisata Bahari Nusantara', 'PT Citra Aji Parama', 'Adhyaksa Dault', '2009', 1, '2023-03-16 08:23:53'),
(65, 'BK04032', 11, 1, '602-8227-42-1', 'Pemuda &amp; Kelautan: Pemanasan Global dan Perubahan Garis Pantai', 'PT Intan Sejati', 'Adhyaksa Dault', '2013', 1, '2023-03-16 08:25:28'),
(66, 'BK04033', 11, 1, '602-8227-38-4', 'Pemuda &amp; Kelautan: Berlayar dari Pulau ke Pulau', 'PT Intan Sejati', 'Adhyaksa Dault', '2013', 1, '2023-03-16 08:26:47'),
(67, 'BK04034', 11, 1, '602-8227-41-4', 'Pemuda &amp; Kelautan: Industri Perikanan Nusantara', 'PT Intan Sejati', 'Adhyaksa Dault', '2013', 1, '2023-03-16 08:28:04'),
(68, 'BK04035', 11, 1, '602-8227-39-1', 'Pemuda &amp; Kelautan: Masyarakat Pesisir Menatap Masa Depan', 'PT Intan Sejati', 'Adhyaksa Dault', '2009', 1, '2023-03-16 08:29:17'),
(69, 'BK04036', 11, 1, '602-8227-45-2', 'Pemuda &amp; Kelautan: Laut Sebagai Pemersatu Bangsa', 'PT Intan Sejati', 'Adhyaksa Dault', '2009', 1, '2023-03-16 08:30:34'),
(70, 'BK04037', 11, 1, '602-8227-43-8', 'Pemuda &amp; Kelautan: Terumbu Karang', 'PT Intan Sejati', 'Adhyaksa Dault', '2013', 1, '2023-03-16 08:31:42'),
(71, 'BK04038', 11, 1, '602-8227-44-5', 'Pemuda &amp; Kelautan: Bangsa Bahari', 'PT Intan Sejati', 'Adhyaksa Dault', '2009', 1, '2023-03-16 08:33:08'),
(72, 'BK04039', 11, 1, '978-602-241-366-0', 'Atlas Pelajar Indonesia dan Dunia', 'Penerbit Erlangga', 'Win Bale', '2013', 1, '2023-03-16 11:26:49'),
(73, 'BK04040', 11, 1, '978-979-3535-47-0', 'Ensiklopedia Sejarah dan Budaya Kepulauan Nusantara Awal', 'PT Lentera Abadi', 'Nino Oktorino', '2009', 1, '2023-03-16 11:32:27'),
(74, 'BK04041', 11, 1, '978-602-241-366-0', 'Atlas Pelajar Indonesia dan Dunia', 'Penerbit Erlangga', 'Win Bale', '2013', 1, '2023-03-16 11:34:29'),
(75, 'BK04042', 11, 1, '978-602-241-366-0', 'Atlas Pelajar Indonesia dan Dunia', 'Penerbit Erlangga', 'Win Bale', '2013', 1, '2023-03-16 11:36:02'),
(76, 'BK05001', 12, 4, '979-662-342-6', 'Indonesia di Pertemuan 3 Lempeng Tektonik', 'Penerbit Cempaka Putih', 'Eni Anjayani', '2010', 1, '2023-03-16 11:43:53'),
(77, 'BK05002', 12, 4, '979-662-386-0', 'Dampak Globalisasi bagi Kepribadian Kita', 'Penerbit Cempaka Putih', 'Ilman Soleh', '2009', 1, '2023-03-16 11:45:37'),
(78, 'BK05003', 12, 4, '979-662-344-0', 'Mengenal Situs Sangiran', 'Penerbit Cempaka Putih', 'Wahjudi Djaja', '2008', 1, '2023-03-16 11:47:56'),
(79, 'BK05004', 12, 4, '602-8226-77-6', 'Gotong Royong sebagai Budaya Bangsa Indonesia', 'Saka Mitra Kompetensi', 'Winarti', '2011', 1, '2023-03-16 11:49:21'),
(80, 'BK05005', 12, 4, '979-16367-1-0', 'Waspadai Kekerasan di Sekitar Kita', 'PT Marga Borneo Tarigas', 'Tammi Prastowo', '2007', 1, '2023-03-16 11:57:55'),
(84, 'BK05006', 12, 4, '978-979-052-186-5', 'Aku Bangga Pahlawanku', 'Armandelta Selaras', 'Fidelara', '2009', 1, '2023-03-16 12:04:55'),
(85, 'BK05007', 12, 4, '979-662-390-7', 'Wawasan Nusantara', 'Penerbit Cempaka Putih', 'Yudi Suparyanto', '2017', 1, '2023-03-16 12:06:27'),
(86, 'BK05008', 12, 4, '602-8567-03-9', 'Masyarakat: Sendi Dasar Kehidupan Berbangsa', 'JP Books', 'Vina Dwi Laning, Endar Wismulyani', '2017', 1, '2023-03-16 12:08:03'),
(87, 'BK05009', 12, 4, '602-8921-11-4', 'Membentuk Generasi Cerdas &amp; Berkarakter', 'PT Marga Borneo Tarigas', 'Wahjudi Djaja', '2011', 1, '2023-03-16 12:09:55'),
(88, 'BK05010', 12, 4, '979-662-383-9', 'Bela Negara', 'Penerbit Cempaka Putih', 'Yudi Suparyanto', '2009', 1, '2023-03-16 12:11:07'),
(89, 'BK05011', 12, 4, '602-8961-01-1', 'Aku Bangga Menjadi Bangsa Indonesia', 'Penerbit Sunda Kelapa Pustaka', 'Wahjudi Djaja', '2010', 1, '2023-03-16 12:13:07'),
(90, 'BK05012', 12, 4, '979-662-377-8', 'Mengapa Harus Demo?', 'Penerbit Cempaka Putih', 'Novia Nuryany', '2008', 1, '2023-03-16 12:14:18'),
(91, 'BK05013', 12, 4, '979-662-381-5', 'Musyawarah untuk Mufakat', 'Penerbit Cempaka Putih', 'Yudi Suparyanto', '2008', 1, '2023-03-16 12:15:37'),
(92, 'BK05014', 12, 4, '979-16367-0-2', 'Mengenal Pemerintahan Daerah', 'PT Marga Borneo Tarigas', 'Widada', '2007', 1, '2023-03-16 12:16:47'),
(93, 'BK05015', 12, 4, '979-662-393-8', 'Warga Negara Harapan Bangsa', 'Penerbit Cempaka Putih', 'Yudi Suparyanto', '2009', 1, '2023-03-16 12:17:53'),
(94, 'BK05016', 12, 4, '978-602-8257-56-5', 'Sejarah Hukum dan Konstitusi di Indonesia', 'Armandelta Selaras', 'Fidelara', '2010', 1, '2023-03-16 12:19:35'),
(98, 'BK05017', 12, 4, '979-662-284-9', 'Hidup Berbhinneka Tunggal Ika', 'Penerbit Cempaka Putih', 'Vina Dwi Laning', '2017', 1, '2023-03-18 07:12:42'),
(99, 'BK05018', 12, 4, '978-979-052-156-8', 'Aku Bangga Menjadi Anggota DPR', 'Armandelta Selaras', 'Asrofuddin Nur Widodo', '2017', 1, '2023-03-18 07:14:51'),
(100, 'BK05019', 12, 4, '978-979-052-157-5', 'Aku Bangga Menjadi Anggota MPR', 'Armandelta Selaras', 'Asrofuddin Nur Widodo', '2017', 1, '2023-03-18 07:16:08'),
(101, 'BK05020', 12, 4, '979-662-384-6', 'Peran Masyarakat dalam Otonomi Daerah', 'Penerbit Cempaka Putih', 'Moh. Rofii Adji Sayekti', '2008', 1, '2023-03-18 07:17:38'),
(102, 'BK05021', 12, 4, '979-662-369-3', 'Perubahan Sosial Masyarakat Masa Reformasi', 'Penerbit Cempaka Putih', 'Vina Dwi Laning', '2017', 1, '2023-03-18 07:19:14'),
(103, 'BK05022', 12, 4, '979-662-382-2', 'Demokrasi di Indonesia', 'Penerbit Cempaka Putih', 'Yudi Suparyanto', '2008', 1, '2023-03-18 07:21:21'),
(104, 'BK05023', 12, 4, '979-662-378-5', 'Pancasila di antara Ideologi Besar Dunia', 'Penerbit Cempaka Putih', 'Wahjudi Djaja', '2009', 1, '2023-03-18 07:22:31'),
(105, 'BK05024', 12, 4, '979-662-371-6', 'Bebebrapa Norma di Indonesia', 'Penerbit Cempaka Putih', 'Yudi Suparyanto', '2008', 1, '2023-03-18 07:23:30'),
(106, 'BK05025', 12, 4, '978-602-8257-44-2', 'Rasa Kemanusiaan', 'Armandelta Selaras', 'Nunung Dwi Verawati', '2017', 1, '2023-03-18 07:25:49'),
(107, 'BK04043', 11, 1, '602-8712-68-2', 'Bela Negara dalam Permainan Pramuka', 'PT Puri Pustaka', 'P.C. Kahono, dkk.', '2010', 1, '2023-03-18 07:29:04'),
(108, 'BK04044', 11, 1, '978-979-052-162-9', 'Aku Bangga Menjadi Hakim', 'Armandelta Selaras', 'Widodo', '2017', 1, '2023-03-18 07:30:45'),
(109, 'BK04045', 11, 1, '978-979-052-158-2', 'Aku Bangga Menjadi Anggota Tentara Nasional Indonesia (TNI)', 'Armandelta Selaras', 'Asrofuddin Nur Widodo', '2017', 1, '2023-03-18 07:32:14'),
(110, 'BK06001', 13, 5, '979-9943-34-', 'Buku Pintar Bahasa &amp; Sastra Indonesia', 'Lingkar Media', 'Moh. Kusnadi Wasrie', '2014', 1, '2023-03-18 07:46:18'),
(112, 'BK06002', 13, 5, '979-9943-34-', 'Buku Pintar Bahasa &amp; Sastra Indonesia', 'Lingkar Media', 'Moh. Kusnadi Wasrie', '2014', 1, '2023-03-18 07:47:21'),
(113, 'BK06003', 13, 5, '978979250529', 'Kompas Bahasa Indonesia', 'PT Grasindo', 'Abdul Gaffar Ruskhan', '2007', 1, '2023-03-18 07:48:12'),
(114, 'BK06004', 13, 5, '978979250529', 'Kompas Bahasa Indonesia', 'PT Grasindo', 'Abdul Gaffar Ruskhan', '2007', 1, '2023-03-18 07:48:55'),
(115, 'BK06005', 13, 5, '978-979-077-923-5', 'Ihwal Kalimat Bahasa Indonesia dan Problematik Penggunaannya', 'Penerbit Yrama Widya', 'Iyo Mulyono', '2012', 1, '2023-03-18 07:50:25'),
(116, 'BK06006', 13, 5, '', 'Madu Sari Kawruh Wayang Purwa', 'CV Cendrawasih', 'Irwan Sudjono', '2001', 1, '2023-03-18 07:51:29'),
(117, 'BK06007', 13, 5, '', 'Wasis Basa', 'Widya Duta', 'Drs. Soeparto D., Drs. Soetarno', '1989', 1, '2023-03-18 07:53:02'),
(118, 'BK06008', 13, 5, '', 'Tuntunan Sekar Macapat', 'PT Tiga Serangkai', 'Muh. Mawardi, Marwanto', '1992', 1, '2023-03-18 07:54:16'),
(119, 'BK06009', 13, 5, '979-9187-18-X', 'Musthika Basa Jawa', 'CV Redijaya', 'Tim Bakti Guru', '1997', 1, '2023-03-18 07:55:22'),
(120, 'BK06010', 13, 5, '602-8567-86-2', 'Berbahasa dengan Santun', 'JP Books', 'Wendi Widya Ratna Dewi', '2017', 1, '2023-03-18 07:56:35'),
(121, 'BK06011', 13, 5, '979-9101-21-2', 'Basa Jawa', 'Pustaka Baru', 'DR. M.A. Sudi Yatmana, Drs. Sudharto, M.A., dkk.', '2001', 1, '2023-03-18 07:58:37'),
(122, 'BK06012', 13, 5, '', 'Practical English Grammar', 'Multi Media Metropolitan', '', '2005', 1, '2023-03-18 08:00:02'),
(123, 'BK06013', 13, 5, '978-979-015-243-4', 'OXFORD kamus junior Berganbar Inggris-Indonesia', 'Penerbit Erlangga', '', '2000', 1, '2023-03-18 08:01:49'),
(124, 'BK04046', 11, 1, '9786020334035', 'Bersepeda Melintasi Benua, Merambah Dunia', 'PT Gramedia Pustaka Utama', 'Bambang &quot;Paimo&quot; Hertadi Mas', '2016', 1, '2023-03-18 08:06:07'),
(125, 'BK04047', 11, 1, '9786020334035', 'Bersepeda Melintasi Benua, Merambah Dunia', 'PT Gramedia Pustaka Utama', 'Bambang &quot;Paimo&quot; Hertadi Mas', '2016', 1, '2023-03-18 08:07:39'),
(126, 'BK04048', 11, 1, '978-602-249-531-4', 'Don\'t Worry be Healthy', 'PT Bhuana Ilmu Populer', 'dr. Djony Lisman', '2014', 1, '2023-03-18 08:14:56'),
(127, 'BK04049', 11, 1, '978-602-249-531-4', 'Don\'t Worry be Healthy', 'PT Bhuana Ilmu Populer', 'dr. Djony Lisman', '2014', 1, '2023-03-18 08:14:40'),
(128, 'BK04050', 11, 1, '978-602-249-531-4', 'Don\'t Worry be Healthy', 'PT Bhuana Ilmu Populer', 'dr. Djony Lisman', '2014', 1, '2023-03-18 08:16:24'),
(129, 'BK04051', 11, 1, '978-602-02-6986-3', 'School Quiz Bumi &amp; Antariksa', 'PT Elex Media Komputindo', 'Yeong-jin Kim', '2015', 1, '2023-03-18 08:19:22'),
(130, 'BK04052', 11, 1, '978-602-02-6986-3', 'School Quiz Bumi &amp; Antariksa', 'PT Elex Media Komputindo', 'Yeong-jin Kim', '2015', 1, '2023-03-18 08:33:04'),
(131, 'BK04053', 11, 1, '978-602-02-6986-3', 'School Quiz Bumi &amp; Antariksa', 'PT Elex Media Komputindo', 'Yeong-jin Kim', '2015', 1, '2023-03-18 08:21:34'),
(132, 'BK04054', 11, 1, '978-602-02-6986-3', 'School Quiz Bumi &amp; Antariksa', 'PT Elex Media Komputindo', 'Yeong-jin Kim', '2015', 1, '2023-03-18 08:22:24'),
(133, 'BK04055', 11, 1, '978-602-02-6986-3', 'School Quiz Bumi &amp; Antariksa', 'PT Elex Media Komputindo', 'Yeong-jin Kim', '2015', 1, '2023-03-18 08:23:16'),
(134, 'BK04056', 11, 1, '978-602-02-6986-3', 'School Quiz Bumi &amp; Antariksa', 'PT Elex Media Komputindo', 'Yeong-jin Kim', '2015', 1, '2023-03-18 08:24:53'),
(135, 'BK04057', 11, 1, '978-602-02-6986-3', 'School Quiz Bumi &amp; Antariksa', 'PT Elex Media Komputindo', 'Yeong-jin Kim', '2015', 1, '2023-03-18 08:25:53'),
(136, 'BK04058', 11, 1, '978-602-02-6986-3', 'School Quiz Bumi &amp; Antariksa', 'PT Elex Media Komputindo', 'Yeong-jin Kim', '2015', 1, '2023-03-18 08:27:06'),
(137, 'BK04059', 11, 1, '978-602-02-6986-3', 'School Quiz Bumi &amp; Antariksa', 'PT Elex Media Komputindo', 'Yeong-jin Kim', '2015', 1, '2023-03-18 08:31:52'),
(138, 'BK04060', 11, 1, '978-602-02-6986-3', 'School Quiz Bumi &amp; Antariksa', 'PT Elex Media Komputindo', 'Yeong-jin Kim', '2015', 1, '2023-03-18 08:35:07'),
(139, 'BK04061', 11, 1, '978-979-91-0945-3', 'Percikan Pemikiran Menuju Kemandirian Bangsa', 'KPG (Kepustakaan Populer Gramedia)', 'Ben Mboi ', '2015', 1, '2023-03-18 08:39:57'),
(140, 'BK04062', 11, 1, '9786232163058', 'Mendongeng Kreatif untuk Anak Usia Dini', 'PT Bhuana Ilmu Populer', 'DR. Heru Kurniawan', '2019', 1, '2023-03-18 08:41:39'),
(141, 'BK04063', 11, 1, '9786232163058', 'Mendongeng Kreatif untuk Anak Usia Dini', 'PT Bhuana Ilmu Populer', 'DR. Heru Kurniawan', '2019', 1, '2023-03-18 08:45:21'),
(142, 'BK04064', 11, 1, '9786232163058', 'Mendongeng Kreatif untuk Anak Usia Dini', 'PT Bhuana Ilmu Populer', 'DR. Heru Kurniawan', '2019', 1, '2023-03-18 08:43:45'),
(143, 'BK04065', 11, 1, '9786232163058', 'Mendongeng Kreatif untuk Anak Usia Dini', 'PT Bhuana Ilmu Populer', 'DR. Heru Kurniawan', '2019', 1, '2023-03-18 08:44:48'),
(144, 'BK04066', 11, 1, '9786232163058', 'Mendongeng Kreatif untuk Anak Usia Dini', 'PT Bhuana Ilmu Populer', 'DR. Heru Kurniawan', '2019', 1, '2023-03-18 08:47:34'),
(145, 'BK04067', 11, 1, '9786232163058', 'Mendongeng Kreatif untuk Anak Usia Dini', 'PT Bhuana Ilmu Populer', 'DR. Heru Kurniawan', '2019', 1, '2023-03-18 08:48:50'),
(146, 'BK04068', 11, 1, '9786232163058', 'Mendongeng Kreatif untuk Anak Usia Dini', 'PT Bhuana Ilmu Populer', 'DR. Heru Kurniawan', '2019', 1, '2023-03-18 08:50:08'),
(147, 'BK04069', 11, 1, '9786232163058', 'Mendongeng Kreatif untuk Anak Usia Dini', 'PT Bhuana Ilmu Populer', 'DR. Heru Kurniawan', '2019', 1, '2023-03-18 08:50:58'),
(150, 'BK07001', 14, 6, '978-602-00-1859-1', 'Magic math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:25:34'),
(151, 'BK07002', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:26:11'),
(152, 'BK07003', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:26:35'),
(153, 'BK07004', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:27:00'),
(154, 'BK07005', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:27:26'),
(155, 'BK07006', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:27:53'),
(156, 'BK07007', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:29:29'),
(157, 'BK07008', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:36:20'),
(158, 'BK07009', 14, 6, '', 'IPA SD 2b Kelas 4', 'PT Intan Pariwara', '', '1993', 1, '2023-03-20 09:37:54'),
(159, 'BK07010', 14, 6, '', 'Ilmu Pengetahua Alam (Sains) 4', 'PT Intan Pariwara', '', '1988', 1, '2023-03-20 09:39:02'),
(160, 'BK07011', 14, 6, '', 'Ilmu-Ilmu Pengetahuan Alam (IPA) ~ Model CBSA', 'PT Pabelan', 'Drs. Muzahit, dkk.', '1988', 1, '2023-03-20 09:43:12'),
(161, 'BK07012', 14, 6, '', 'Ilmu Pengetahuan Alam (IPA) - CBSA', 'CV Aneka Ilmu', '', '1988', 1, '2023-03-20 09:44:23'),
(162, 'BK07013', 14, 6, '', 'REIPA Rangkuman dan Evaluasi Ilmu Pengetahuan Alam 5', 'CV Gema Nusa', 'Untung Joko P., Drs. Djemadi', '1996', 1, '2023-03-20 09:45:58'),
(163, 'BK07014', 14, 6, '978-979-074-834-7', 'Maths Genius', 'PT Bhuana Ilmu Populer', 'Bobby Sajutie, M. Arch', '2011', 1, '2023-03-20 09:50:53'),
(164, 'BK07015', 14, 6, '979-662-357-0', 'Mengenal Bentuk-Bentuk Konservasi Alam', 'Penerbit Cempaka Putih', 'Winarti', '2008', 1, '2023-03-20 09:51:57'),
(165, 'BK07016', 14, 6, '979-1464-44-4', 'Pencemaran Lingkungan dan Penanganannya', 'PT Citra Aji Parama', 'Kus Dwiyatmo B.', '2007', 1, '2023-03-20 09:53:15'),
(166, 'BK07017', 14, 6, '979-662-301-3', 'Mengenal Organisasi Pelestarian Lingkungan', 'Penerbit Cempaka Putih', 'Eni Anjayani', '2008', 1, '2023-03-20 09:54:20'),
(167, 'BK07018', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:55:30'),
(168, 'BK07019', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:56:12'),
(169, 'BK07020', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:56:37'),
(170, 'BK07021', 14, 6, '978-602-00-1859-1', 'Magic Math 100', 'PT Elex Media Komputindo', '', '2010', 1, '2023-03-20 09:57:15'),
(171, 'BK07022', 14, 6, '978-602-7597-09-9', 'Segala hal tentang: Energi', 'Penerbit Erlangga', 'Chris Woodford', '2007', 1, '2023-03-20 09:59:09'),
(172, 'BK07023', 14, 6, '978-602-7597-09-9', 'Segala hal tentang: Energi', 'Penerbit Erlangga', 'Chris Woodford', '2007', 1, '2023-03-20 10:00:46'),
(175, 'BK03001', 6, 7, '978-602-00-1745-7', 'The Magic Notebook to Raise Investors', 'PT Elex Media Komputindo', 'Rintaro Ishikawa, Michio Teraoka', '2011', 1, '2023-03-21 07:51:20'),
(176, 'BK03002', 6, 7, '978-602-03-3107-2', 'Soul Models: Kisah-Kisah Keberanian', 'PT Gramedia Pustaka Utama', 'Elizabeth Bryan, Angela Daffron', '2016', 1, '2023-03-21 07:54:38'),
(177, 'BK03003', 6, 7, '978-602-1659-34-2', 'Lalat Cinta Indonesia', 'Charissa Publisher', 'Retagalih.pHe', '2014', 1, '2023-03-21 08:00:10'),
(178, 'BK03004', 6, 7, '-', 'Rubah Ingin Berubah', 'Lingkar Media', 'Kak Norma dan Kak Siti', '2020', 1, '2023-03-21 08:05:32'),
(179, 'BK03005', 6, 7, '-', 'Kerbau Dikagumi Katak', 'HNH', 'Filyan Alhazza', '2020', 1, '2023-03-21 08:08:23'),
(180, 'BK03006', 6, 7, '-', 'Landak yang Kesepian', 'HNH', 'Filyan Alhazza', '2020', 1, '2023-03-21 08:08:07'),
(181, 'BK03007', 6, 7, '-', 'Lebah dan Semut', 'HNH', 'Filyan Alhazza', '2020', 1, '2023-03-21 08:10:44'),
(182, 'BK03008', 6, 7, '-', 'Beruang dan Anaknya', 'HNH', 'Filyan Alhazza', '2020', 1, '2023-03-21 08:10:18'),
(183, 'BK03009', 6, 7, '978-979-052-220-6', 'Cerita dan Budaya Toraja', 'BSD', 'Fidelara', '2017', 1, '2023-03-21 08:14:50'),
(184, 'BK03010', 6, 7, '978-979-033-333-8', 'Diam!', 'Erlangga For Kids', 'Paul Bright, Guy Parker-Rees', '2008', 1, '2023-03-21 08:45:21'),
(185, 'BK03011', 6, 7, '978-979-033-372-7', 'Di Bawah Tempat Tidur', 'Erlangga For Kids', 'Paul Bright, Ben Cort', '2008', 1, '2023-03-21 08:54:45'),
(186, 'BK03012', 6, 7, '978-979-033-322-2', 'One Great Day: Hari yang Hebat', 'Erlangga For Kids', 'Merlinda Lesmana', '2008', 1, '2023-03-21 08:56:48'),
(187, 'BK03013', 6, 7, '978-979-033-322-2', 'One Great Day: Hari yang Hebat', 'Erlangga For Kids', 'Merlinda Lesmana', '2008', 1, '2023-03-21 08:58:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_denda`
--

CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_denda`
--

INSERT INTO `tbl_denda` (`id_denda`, `pinjam_id`, `denda`, `lama_waktu`, `tgl_denda`) VALUES
(5, 'PJ009', '0', 0, '2020-05-20'),
(6, 'PJ0011', '0', 0, '2023-03-18'),
(7, 'PJ0032', '0', 0, '2023-03-18'),
(8, 'PJ0034', '0', 0, '2023-03-18'),
(9, 'PJ0035', '0', 0, '2023-03-18'),
(11, 'PJ0036', '0', 0, '2023-03-18'),
(15, 'PJ001', '0', 0, '2023-03-21'),
(16, 'PJ0043', '0', 0, '2023-03-21'),
(17, 'PJ0044', '0', 0, '2023-03-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_kategori`
--

CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL,
  `kode_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_kategori`
--

INSERT INTO `tbl_kategori` (`id_kategori`, `kode_kategori`, `nama_kategori`) VALUES
(1, '01', 'Pemrograman'),
(6, '03', 'Fiksi'),
(10, '02', 'Komik'),
(11, '04', 'Umum'),
(12, '05', 'Ilmu Sosial'),
(13, '06', 'Bahasa'),
(14, '07', 'Matematika dan sains');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_login`
--

CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `user` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tgl_lahir` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(25) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tgl_bergabung` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_login`
--

INSERT INTO `tbl_login` (`id_login`, `anggota_id`, `user`, `pass`, `level`, `nama`, `tempat_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `telepon`, `email`, `tgl_bergabung`, `foto`) VALUES
(1, 'AG001', 'Admin', 'b336be0132c8ed7f206fcc0542897149', 'Petugas', 'Admin', 'Tegal', '2000-08-08', 'Laki-Laki', 'Desa Getaskerep', '089694589234', 'admin@gmail.com', '2023-03-10', 'user-admin.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pinjam`
--

CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_pinjam`
--

INSERT INTO `tbl_pinjam` (`id_pinjam`, `pinjam_id`, `anggota_id`, `kode`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali`) VALUES
(42, 'PJ001', '0001', 'BK03013', 'Di Kembalikan', '2023-03-21', 2, '2023-03-23', '2023-03-21'),
(43, 'PJ0043', '0001', 'BK03013', 'Di Kembalikan', '2023-03-21', 1, '2023-03-22', '2023-03-21'),
(44, 'PJ0044', '0001', 'BK03013', 'Di Kembalikan', '2023-03-21', 1, '2023-03-22', '2023-03-21'),
(45, 'PJ0045', '0001', 'BK03010', 'Dipinjam', '2023-03-21', 1, '2023-03-22', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_rak`
--

CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL,
  `nama_rak` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_rak`
--

INSERT INTO `tbl_rak` (`id_rak`, `nama_rak`) VALUES
(1, 'Rak Buku 1'),
(4, 'Rak Buku 2'),
(5, 'Rak Buku 3'),
(6, 'Rak Buku 4'),
(7, 'Rak Buku 5');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_siswa`
--

CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL,
  `kode_anggota` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `tgl_bergabung` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tbl_siswa`
--

INSERT INTO `tbl_siswa` (`id_siswa`, `kode_anggota`, `nama`, `jenkel`, `tgl_bergabung`) VALUES
(13, '0002', 'Winda', 'Perempuan', '2023-03-21'),
(14, '0003', 'Syifa', 'Perempuan', '2023-03-21'),
(15, '0004', 'Dona', 'Perempuan', '2023-03-21'),
(17, '0005', 'Wina', 'Perempuan', '2023-03-21'),
(18, '0001', 'Ego', 'Laki-laki', '2023-03-21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indeks untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  ADD PRIMARY KEY (`id_buku`),
  ADD UNIQUE KEY `kode_buku` (`kode_buku`),
  ADD UNIQUE KEY `kode_buku_2` (`kode_buku`);

--
-- Indeks untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indeks untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  ADD PRIMARY KEY (`id_rak`);

--
-- Indeks untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  ADD PRIMARY KEY (`id_siswa`),
  ADD UNIQUE KEY `nis` (`kode_anggota`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_biaya_denda`
--
ALTER TABLE `tbl_biaya_denda`
  MODIFY `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tbl_buku`
--
ALTER TABLE `tbl_buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT untuk tabel `tbl_denda`
--
ALTER TABLE `tbl_denda`
  MODIFY `id_denda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `tbl_kategori`
--
ALTER TABLE `tbl_kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tbl_pinjam`
--
ALTER TABLE `tbl_pinjam`
  MODIFY `id_pinjam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT untuk tabel `tbl_rak`
--
ALTER TABLE `tbl_rak`
  MODIFY `id_rak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_siswa`
--
ALTER TABLE `tbl_siswa`
  MODIFY `id_siswa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
