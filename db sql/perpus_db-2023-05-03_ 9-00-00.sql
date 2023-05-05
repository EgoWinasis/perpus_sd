-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: perpus_db
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbl_alat`
--

DROP TABLE IF EXISTS `tbl_alat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_alat` (
  `id_alat` int(11) NOT NULL AUTO_INCREMENT,
  `kode_alat` varchar(10) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_alat` varchar(255) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_alat`),
  UNIQUE KEY `kode_alat` (`kode_alat`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_alat`
--

LOCK TABLES `tbl_alat` WRITE;
/*!40000 ALTER TABLE `tbl_alat` DISABLE KEYS */;
INSERT INTO `tbl_alat` VALUES (8,'AP01005',1,'KIT Bentang Alam',1,'2023-03-18 09:20:34'),(9,'AP01008',1,'KIT Bentang Alam',1,'2023-03-20 22:13:59'),(10,'AP01007',1,'KIT Gejala Alam',1,'2023-03-20 22:10:40'),(11,'AP01004',1,'KIT Gejala Alam',1,'2023-03-18 08:58:53'),(12,'AP02001',4,'Matematika Pemula',1,'2023-03-18 09:01:34'),(13,'AP02002',4,'Matematika Pemula',1,'2023-03-18 09:01:56'),(14,'AP02003',4,'MAPER Membuat Koordinat',1,'2023-03-18 09:09:02'),(15,'AP02004',4,'MAPER Permainan Pecahan',1,'2023-03-18 09:10:09'),(16,'AP02005',4,'MAPER Menghitung Massa',1,'2023-03-18 09:10:33'),(17,'AP02006',4,'MAPER Membuat Koordinat',1,'2023-03-18 09:11:09'),(18,'AP02007',4,'MAPER Permainan Pecahan',1,'2023-03-18 09:11:39'),(19,'AP02008',4,'MAPER Menghitung Waktu &amp; Jarak ',1,'2023-03-18 09:12:18'),(20,'AP02009',4,'MAPER Menghitung Massa',1,'2023-03-18 09:12:55'),(21,'AP02010',4,'MAPER Menghitung Waktu &amp; Jarak',1,'2023-03-18 09:13:36'),(22,'AP03001',5,'Alat Peraga Bahasa Inggris',1,'2023-03-18 09:23:22'),(23,'AP03002',5,'Alat Peraga Bahasa Inggris',1,'2023-03-18 09:23:39'),(24,'AP03003',5,'Alat Peraga Bahasa Indonesia',1,'2023-03-18 09:24:14'),(25,'AP03004',5,'Alat Peraga Bahasa Indonesia',1,'2023-03-20 22:38:50'),(26,'AP01009',1,'Poster KIT Gejala Alam',1,'2023-03-20 22:31:52'),(27,'AP01006',1,'Alat Peraga Simulasi Fase Bulan',1,'2023-03-21 07:24:36'),(30,'AP01010',1,'Poster KIT Gejala Alam',1,'2023-03-21 07:32:48'),(31,'AP01011',1,'Poster KIT Bentang Alam',1,'2023-03-25 10:01:13'),(32,'AP01012',1,'Poster KIT Bentang Alam',1,'2023-03-25 10:01:37');
/*!40000 ALTER TABLE `tbl_alat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_biaya_denda`
--

DROP TABLE IF EXISTS `tbl_biaya_denda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_biaya_denda` (
  `id_biaya_denda` int(11) NOT NULL AUTO_INCREMENT,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL,
  PRIMARY KEY (`id_biaya_denda`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_biaya_denda`
--

LOCK TABLES `tbl_biaya_denda` WRITE;
/*!40000 ALTER TABLE `tbl_biaya_denda` DISABLE KEYS */;
INSERT INTO `tbl_biaya_denda` VALUES (1,'1000','Aktif','2023-03-27');
/*!40000 ALTER TABLE `tbl_biaya_denda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_buku`
--

DROP TABLE IF EXISTS `tbl_buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_buku` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(10) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `id_rak` int(11) NOT NULL,
  `isbn` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `pengarang` varchar(255) DEFAULT NULL,
  `thn_buku` varchar(255) DEFAULT NULL,
  `jml` int(11) DEFAULT NULL,
  `tgl_masuk` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_buku`),
  UNIQUE KEY `kode_buku` (`kode_buku`),
  UNIQUE KEY `kode_buku_2` (`kode_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=280 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_buku`
--

LOCK TABLES `tbl_buku` WRITE;
/*!40000 ALTER TABLE `tbl_buku` DISABLE KEYS */;
INSERT INTO `tbl_buku` VALUES (34,'BK04001',11,1,'978-979-052-155-1','Aku Bangga menjadi Warga Negara Indonesia','PT Armandelta Selaras','Widodo','2010',1,'2023-03-16 07:19:41'),(35,'BK04002',11,1,'978-602-8257-41-1','Aku Bangga menjadi Anak Indonesia','PT Armandelta Selaras','Kardono','2017',1,'2023-03-16 07:22:08'),(36,'BK04003',11,1,'979-534-430-8','Potensi Laut dan Samudra Kita','PT Intan Sejati','Iswanto','2007',1,'2023-03-16 07:46:09'),(37,'BK04004',11,1,'','KI GEDE SEBAYU PENDIRI PEMERINTAHAN TEGAL (TAHUN 1585-1625)','PENERBIT CITRA BAHARI ANIMASI TEGAL','Soetjiptoni','2007',1,'2023-03-16 07:27:32'),(38,'BK04005',11,1,'978-979-050-181-0','Budaya Dayak yang Kukenal','Armandelta Selaras','Fidelara','2010',1,'2023-03-16 07:29:21'),(39,'BK04006',11,1,'978-979-050-056-3','Budaya Betawi yang Kukenal','Armandelta Selaras','Fidelara','2017',1,'2023-03-16 07:31:02'),(40,'BK04007',11,1,'979-662-322-8','Peninggalan Sejarah di Indonesia','Penerbit Cempaka Putih','Wahjudi Djaja','2008',1,'2023-03-16 07:32:59'),(41,'BK04008',11,1,'979-662-320-4','Transportasi di Indonesia dari Masa ke Masa','Penerbit Cempaka Putih','Endar Wismulyani','2017',1,'2023-03-16 07:34:19'),(42,'BK04009',11,1,'979-662-491-1','Ayo, Hidup Berdisiplin','Penerbit Cempaka Putih','Amin Suprihatini','2010',1,'2023-03-16 07:35:46'),(43,'BK04010',11,1,'602-8567-05-3','Potret Pendidikan pada Era Global','JP Books','Indah Suraningtyas, Bima Syahab Hifmawan','2017',1,'2023-03-16 07:38:10'),(44,'BK04011',11,1,'602-8226-84-4','Belajar dari Pengalaman','Saka Mitra Kompetensi','Endar Wismulyani','2013',1,'2023-03-16 07:39:39'),(45,'BK04012',11,1,'979-662-470-6','Memberdayakan Potensi Kaum Muda','Penerbit Cempaka Putih','Sugiyarto','2017',1,'2023-03-16 07:41:04'),(46,'BK04013',11,1,'979-662-396-9','Muda dan Berprestasi','Penerbit Cempaka Putih','Karmila','2017',1,'2023-03-16 07:47:20'),(47,'BK04014',11,1,'979-781-104-2','Topik Paling Seru: Dinosaurus','Penerbit Erlangga','John Cooper','2003',1,'2023-03-16 07:50:58'),(48,'BK04015',11,1,'978-602-241-510-7','Aktivitas Pramuka untuk Penggalang Ramu','Penerbit Erlangga','Elly Sumarsih, dkk.','2013',1,'2023-03-16 07:53:49'),(49,'BK04016',11,1,'978-602-241-510-7','Aktivitas Pramuka untuk Siaga Mula','Penerbit Erlangga','Elly Sumarsih, dkk.','2013',1,'2023-03-16 11:27:06'),(50,'BK04017',11,1,'978-602-234-008-9','Pendidikan karakter dan Kepramukaan','PT Citra Aji Parama','Novan Ardy Wiyani','2015',1,'2023-03-16 07:57:16'),(51,'BK04018',11,1,'602-8712-69-9','Memecah Kebekuan dalam Permainan Pramuka','Penerbit Puri Pustaka','P.C. Kahono, dkk.','2010',1,'2023-03-16 07:58:58'),(52,'BK04019',11,1,'602-8712-70-5','Pembina Pramuka: Memimpin dengan Hati','PT Puri Pustaka','P.C. Kahono','2010',1,'2023-03-16 08:00:35'),(53,'BK04020',11,1,'602-8712-71-2','Menarik dan Menantang dalam Permainan Pramuka','Penerbit Puri Pustaka','P.C. Kahono, dkk.','2017',1,'2023-03-16 08:01:57'),(54,'BK04021',11,1,'602-8712-67-5','Pramuka Membentuk Karakter Generasi Muda','Penerbit Puri Pustaka','P.C. Kahono','2010',1,'2023-03-16 08:03:30'),(55,'BK04022',11,1,'979-28-0207-8','Mengenal Simbol Instansi','PT Intan Pariwara','Kuswilono','2016',1,'2023-03-16 08:05:05'),(56,'BK04023',11,1,'979-28-0205-4','Mengenal Simbol Daerah','PT Intan Pariwara','Kuswilono','2017',1,'2023-03-16 08:06:14'),(57,'BK04024',11,1,'979-28-0112-5','Pesona Wisata Sulawesi Selatan','PT Intan Pariwara','Iswanto','2007',1,'2023-03-16 08:07:36'),(58,'BK04025',11,1,'978-979-690-325-3','Pencegahan dan Penanggulangan Penyalahgunaan Narkoba Berbasis Sekolah','PT Balai Pustaka','Lydua Harlina Martono, Satya Joewana','2017',1,'2023-03-16 08:09:39'),(59,'BK04026',11,1,'979-534-224-X','Narkoba: Perlukah Mengenalnya?','PT Pakar Raya','Ida Listyarin Handoyo','2006',1,'2023-03-16 08:11:19'),(60,'BK04027',11,1,'602856783-1','Terjerat Narkoba','JP Books','Nur Farida','2017',1,'2023-03-16 08:12:25'),(61,'BK04028',11,1,'979-3632-43-8','Stop Mirasantika','PT Sunda Kelapa Pustaka','dr. Widharto','2007',1,'2023-03-16 08:14:01'),(62,'BK04029',11,1,'978-979-052-158-6','Aku Bangga Menjadi Anggota Polisi Republik Indonesia','PT Armandelta Selaras','Hamzah','2010',1,'2023-03-16 08:16:07'),(63,'BK04030',11,1,'','Modul Pembelajaran Lalu Lintas Tingkat SD/MI','Direktorat lalu Lintas Polda Jateng','Agung Arisatyawan Adhi, dkk.','2016',1,'2023-03-16 08:21:26'),(64,'BK04031',11,1,'602-8227-36-0','Pemuda &amp; Kelautan: Pariwisata Bahari Nusantara','PT Citra Aji Parama','Adhyaksa Dault','2009',1,'2023-03-16 08:23:53'),(65,'BK04032',11,1,'602-8227-42-1','Pemuda &amp; Kelautan: Pemanasan Global dan Perubahan Garis Pantai','PT Intan Sejati','Adhyaksa Dault','2013',1,'2023-03-16 08:25:28'),(66,'BK04033',11,1,'602-8227-38-4','Pemuda &amp; Kelautan: Berlayar dari Pulau ke Pulau','PT Intan Sejati','Adhyaksa Dault','2013',1,'2023-03-16 08:26:47'),(67,'BK04034',11,1,'602-8227-41-4','Pemuda &amp; Kelautan: Industri Perikanan Nusantara','PT Intan Sejati','Adhyaksa Dault','2013',1,'2023-03-16 08:28:04'),(68,'BK04035',11,1,'602-8227-39-1','Pemuda &amp; Kelautan: Masyarakat Pesisir Menatap Masa Depan','PT Intan Sejati','Adhyaksa Dault','2009',1,'2023-03-16 08:29:17'),(69,'BK04036',11,1,'602-8227-45-2','Pemuda &amp; Kelautan: Laut Sebagai Pemersatu Bangsa','PT Intan Sejati','Adhyaksa Dault','2009',1,'2023-03-16 08:30:34'),(70,'BK04037',11,1,'602-8227-43-8','Pemuda &amp; Kelautan: Terumbu Karang','PT Intan Sejati','Adhyaksa Dault','2013',1,'2023-03-16 08:31:42'),(71,'BK04038',11,1,'602-8227-44-5','Pemuda &amp; Kelautan: Bangsa Bahari','PT Intan Sejati','Adhyaksa Dault','2009',1,'2023-03-16 08:33:08'),(72,'BK04039',11,1,'978-602-241-366-0','Atlas Pelajar Indonesia dan Dunia','Penerbit Erlangga','Win Bale','2013',1,'2023-03-16 11:26:49'),(73,'BK04040',11,1,'978-979-3535-47-0','Ensiklopedia Sejarah dan Budaya Kepulauan Nusantara Awal','PT Lentera Abadi','Nino Oktorino','2009',1,'2023-03-16 11:32:27'),(74,'BK04041',11,1,'978-602-241-366-0','Atlas Pelajar Indonesia dan Dunia','Penerbit Erlangga','Win Bale','2013',1,'2023-03-16 11:34:29'),(75,'BK04042',11,1,'978-602-241-366-0','Atlas Pelajar Indonesia dan Dunia','Penerbit Erlangga','Win Bale','2013',1,'2023-03-16 11:36:02'),(76,'BK05001',12,4,'979-662-342-6','Indonesia di Pertemuan 3 Lempeng Tektonik','Penerbit Cempaka Putih','Eni Anjayani','2010',1,'2023-03-16 11:43:53'),(77,'BK05002',12,4,'979-662-386-0','Dampak Globalisasi bagi Kepribadian Kita','Penerbit Cempaka Putih','Ilman Soleh','2009',1,'2023-03-16 11:45:37'),(78,'BK05003',12,4,'979-662-344-0','Mengenal Situs Sangiran','Penerbit Cempaka Putih','Wahjudi Djaja','2008',1,'2023-03-16 11:47:56'),(79,'BK05004',12,4,'602-8226-77-6','Gotong Royong sebagai Budaya Bangsa Indonesia','Saka Mitra Kompetensi','Winarti','2011',1,'2023-03-16 11:49:21'),(80,'BK05005',12,4,'979-16367-1-0','Waspadai Kekerasan di Sekitar Kita','PT Marga Borneo Tarigas','Tammi Prastowo','2007',1,'2023-03-16 11:57:55'),(84,'BK05006',12,4,'978-979-052-186-5','Aku Bangga Pahlawanku','Armandelta Selaras','Fidelara','2009',1,'2023-03-16 12:04:55'),(85,'BK05007',12,4,'979-662-390-7','Wawasan Nusantara','Penerbit Cempaka Putih','Yudi Suparyanto','2017',1,'2023-03-16 12:06:27'),(86,'BK05008',12,4,'602-8567-03-9','Masyarakat: Sendi Dasar Kehidupan Berbangsa','JP Books','Vina Dwi Laning, Endar Wismulyani','2017',1,'2023-03-16 12:08:03'),(87,'BK05009',12,4,'602-8921-11-4','Membentuk Generasi Cerdas &amp; Berkarakter','PT Marga Borneo Tarigas','Wahjudi Djaja','2011',1,'2023-03-16 12:09:55'),(88,'BK05010',12,4,'979-662-383-9','Bela Negara','Penerbit Cempaka Putih','Yudi Suparyanto','2009',1,'2023-03-16 12:11:07'),(89,'BK05011',12,4,'602-8961-01-1','Aku Bangga Menjadi Bangsa Indonesia','Penerbit Sunda Kelapa Pustaka','Wahjudi Djaja','2010',1,'2023-03-16 12:13:07'),(90,'BK05012',12,4,'979-662-377-8','Mengapa Harus Demo?','Penerbit Cempaka Putih','Novia Nuryany','2008',1,'2023-03-16 12:14:18'),(91,'BK05013',12,4,'979-662-381-5','Musyawarah untuk Mufakat','Penerbit Cempaka Putih','Yudi Suparyanto','2008',1,'2023-03-16 12:15:37'),(92,'BK05014',12,4,'979-16367-0-2','Mengenal Pemerintahan Daerah','PT Marga Borneo Tarigas','Widada','2007',1,'2023-03-16 12:16:47'),(93,'BK05015',12,4,'979-662-393-8','Warga Negara Harapan Bangsa','Penerbit Cempaka Putih','Yudi Suparyanto','2009',1,'2023-03-16 12:17:53'),(94,'BK05016',12,4,'978-602-8257-56-5','Sejarah Hukum dan Konstitusi di Indonesia','Armandelta Selaras','Fidelara','2010',1,'2023-03-16 12:19:35'),(98,'BK05017',12,4,'979-662-284-9','Hidup Berbhinneka Tunggal Ika','Penerbit Cempaka Putih','Vina Dwi Laning','2017',1,'2023-03-18 07:12:42'),(99,'BK05018',12,4,'978-979-052-156-8','Aku Bangga Menjadi Anggota DPR','Armandelta Selaras','Asrofuddin Nur Widodo','2017',1,'2023-03-18 07:14:51'),(100,'BK05019',12,4,'978-979-052-157-5','Aku Bangga Menjadi Anggota MPR','Armandelta Selaras','Asrofuddin Nur Widodo','2017',1,'2023-03-18 07:16:08'),(101,'BK05020',12,4,'979-662-384-6','Peran Masyarakat dalam Otonomi Daerah','Penerbit Cempaka Putih','Moh. Rofii Adji Sayekti','2008',1,'2023-03-18 07:17:38'),(102,'BK05021',12,4,'979-662-369-3','Perubahan Sosial Masyarakat Masa Reformasi','Penerbit Cempaka Putih','Vina Dwi Laning','2017',1,'2023-03-18 07:19:14'),(103,'BK05022',12,4,'979-662-382-2','Demokrasi di Indonesia','Penerbit Cempaka Putih','Yudi Suparyanto','2008',1,'2023-03-18 07:21:21'),(104,'BK05023',12,4,'979-662-378-5','Pancasila di antara Ideologi Besar Dunia','Penerbit Cempaka Putih','Wahjudi Djaja','2009',1,'2023-03-18 07:22:31'),(105,'BK05024',12,4,'979-662-371-6','Bebebrapa Norma di Indonesia','Penerbit Cempaka Putih','Yudi Suparyanto','2008',1,'2023-03-18 07:23:30'),(106,'BK05025',12,4,'978-602-8257-44-2','Rasa Kemanusiaan','Armandelta Selaras','Nunung Dwi Verawati','2017',1,'2023-03-18 07:25:49'),(107,'BK04043',11,1,'602-8712-68-2','Bela Negara dalam Permainan Pramuka','PT Puri Pustaka','P.C. Kahono, dkk.','2010',1,'2023-03-18 07:29:04'),(108,'BK04044',11,1,'978-979-052-162-9','Aku Bangga Menjadi Hakim','Armandelta Selaras','Widodo','2017',1,'2023-03-18 07:30:45'),(109,'BK04045',11,1,'978-979-052-158-2','Aku Bangga Menjadi Anggota Tentara Nasional Indonesia (TNI)','Armandelta Selaras','Asrofuddin Nur Widodo','2017',1,'2023-03-18 07:32:14'),(110,'BK06001',13,5,'979-9943-34-','Buku Pintar Bahasa &amp; Sastra Indonesia','Lingkar Media','Moh. Kusnadi Wasrie','2014',1,'2023-03-18 07:46:18'),(112,'BK06002',13,5,'979-9943-34-','Buku Pintar Bahasa &amp; Sastra Indonesia','Lingkar Media','Moh. Kusnadi Wasrie','2014',1,'2023-03-18 07:47:21'),(113,'BK06003',13,5,'978979250529','Kompas Bahasa Indonesia','PT Grasindo','Abdul Gaffar Ruskhan','2007',1,'2023-03-18 07:48:12'),(114,'BK06004',13,5,'978979250529','Kompas Bahasa Indonesia','PT Grasindo','Abdul Gaffar Ruskhan','2007',1,'2023-03-18 07:48:55'),(115,'BK06005',13,5,'978-979-077-923-5','Ihwal Kalimat Bahasa Indonesia dan Problematik Penggunaannya','Penerbit Yrama Widya','Iyo Mulyono','2012',1,'2023-03-18 07:50:25'),(116,'BK06006',13,5,'','Madu Sari Kawruh Wayang Purwa','CV Cendrawasih','Irwan Sudjono','2001',1,'2023-03-18 07:51:29'),(117,'BK06007',13,5,'','Wasis Basa','Widya Duta','Drs. Soeparto D., Drs. Soetarno','1989',1,'2023-03-18 07:53:02'),(118,'BK06008',13,5,'','Tuntunan Sekar Macapat','PT Tiga Serangkai','Muh. Mawardi, Marwanto','1992',1,'2023-03-18 07:54:16'),(119,'BK06009',13,5,'979-9187-18-X','Musthika Basa Jawa','CV Redijaya','Tim Bakti Guru','1997',1,'2023-03-18 07:55:22'),(120,'BK06010',13,5,'602-8567-86-2','Berbahasa dengan Santun','JP Books','Wendi Widya Ratna Dewi','2017',1,'2023-03-18 07:56:35'),(121,'BK06011',13,5,'979-9101-21-2','Basa Jawa','Pustaka Baru','DR. M.A. Sudi Yatmana, Drs. Sudharto, M.A., dkk.','2001',1,'2023-03-18 07:58:37'),(122,'BK06012',13,5,'','Practical English Grammar','Multi Media Metropolitan','','2005',1,'2023-03-18 08:00:02'),(123,'BK06013',13,5,'978-979-015-243-4','OXFORD kamus junior Berganbar Inggris-Indonesia','Penerbit Erlangga','','2000',1,'2023-03-18 08:01:49'),(124,'BK04046',11,1,'9786020334035','Bersepeda Melintasi Benua, Merambah Dunia','PT Gramedia Pustaka Utama','Bambang &quot;Paimo&quot; Hertadi Mas','2016',1,'2023-03-18 08:06:07'),(125,'BK04047',11,1,'9786020334035','Bersepeda Melintasi Benua, Merambah Dunia','PT Gramedia Pustaka Utama','Bambang &quot;Paimo&quot; Hertadi Mas','2016',1,'2023-03-18 08:07:39'),(126,'BK04048',11,1,'978-602-249-531-4','Don\'t Worry be Healthy','PT Bhuana Ilmu Populer','dr. Djony Lisman','2014',1,'2023-03-18 08:14:56'),(127,'BK04049',11,1,'978-602-249-531-4','Don\'t Worry be Healthy','PT Bhuana Ilmu Populer','dr. Djony Lisman','2014',1,'2023-03-18 08:14:40'),(128,'BK04050',11,1,'978-602-249-531-4','Don\'t Worry be Healthy','PT Bhuana Ilmu Populer','dr. Djony Lisman','2014',1,'2023-03-18 08:16:24'),(129,'BK04051',11,1,'978-602-02-6986-3','School Quiz Bumi &amp; Antariksa','PT Elex Media Komputindo','Yeong-jin Kim','2015',1,'2023-03-18 08:19:22'),(130,'BK04052',11,1,'978-602-02-6986-3','School Quiz Bumi &amp; Antariksa','PT Elex Media Komputindo','Yeong-jin Kim','2015',1,'2023-03-18 08:33:04'),(131,'BK04053',11,1,'978-602-02-6986-3','School Quiz Bumi &amp; Antariksa','PT Elex Media Komputindo','Yeong-jin Kim','2015',1,'2023-03-18 08:21:34'),(132,'BK04054',11,1,'978-602-02-6986-3','School Quiz Bumi &amp; Antariksa','PT Elex Media Komputindo','Yeong-jin Kim','2015',1,'2023-03-18 08:22:24'),(133,'BK04055',11,1,'978-602-02-6986-3','School Quiz Bumi &amp; Antariksa','PT Elex Media Komputindo','Yeong-jin Kim','2015',1,'2023-03-18 08:23:16'),(134,'BK04056',11,1,'978-602-02-6986-3','School Quiz Bumi &amp; Antariksa','PT Elex Media Komputindo','Yeong-jin Kim','2015',1,'2023-03-18 08:24:53'),(135,'BK04057',11,1,'978-602-02-6986-3','School Quiz Bumi &amp; Antariksa','PT Elex Media Komputindo','Yeong-jin Kim','2015',1,'2023-03-18 08:25:53'),(136,'BK04058',11,1,'978-602-02-6986-3','School Quiz Bumi &amp; Antariksa','PT Elex Media Komputindo','Yeong-jin Kim','2015',1,'2023-03-18 08:27:06'),(137,'BK04059',11,1,'978-602-02-6986-3','School Quiz Bumi &amp; Antariksa','PT Elex Media Komputindo','Yeong-jin Kim','2015',1,'2023-03-18 08:31:52'),(138,'BK04060',11,1,'978-602-02-6986-3','School Quiz Bumi &amp; Antariksa','PT Elex Media Komputindo','Yeong-jin Kim','2015',1,'2023-03-18 08:35:07'),(139,'BK04061',11,1,'978-979-91-0945-3','Percikan Pemikiran Menuju Kemandirian Bangsa','KPG (Kepustakaan Populer Gramedia)','Ben Mboi ','2015',1,'2023-03-18 08:39:57'),(140,'BK04062',11,1,'9786232163058','Mendongeng Kreatif untuk Anak Usia Dini','PT Bhuana Ilmu Populer','DR. Heru Kurniawan','2019',1,'2023-03-18 08:41:39'),(141,'BK04063',11,1,'9786232163058','Mendongeng Kreatif untuk Anak Usia Dini','PT Bhuana Ilmu Populer','DR. Heru Kurniawan','2019',1,'2023-03-18 08:45:21'),(142,'BK04064',11,1,'9786232163058','Mendongeng Kreatif untuk Anak Usia Dini','PT Bhuana Ilmu Populer','DR. Heru Kurniawan','2019',1,'2023-03-18 08:43:45'),(143,'BK04065',11,1,'9786232163058','Mendongeng Kreatif untuk Anak Usia Dini','PT Bhuana Ilmu Populer','DR. Heru Kurniawan','2019',1,'2023-03-18 08:44:48'),(144,'BK04066',11,1,'9786232163058','Mendongeng Kreatif untuk Anak Usia Dini','PT Bhuana Ilmu Populer','DR. Heru Kurniawan','2019',1,'2023-03-18 08:47:34'),(145,'BK04067',11,1,'9786232163058','Mendongeng Kreatif untuk Anak Usia Dini','PT Bhuana Ilmu Populer','DR. Heru Kurniawan','2019',1,'2023-03-18 08:48:50'),(146,'BK04068',11,1,'9786232163058','Mendongeng Kreatif untuk Anak Usia Dini','PT Bhuana Ilmu Populer','DR. Heru Kurniawan','2019',1,'2023-03-18 08:50:08'),(147,'BK04069',11,1,'9786232163058','Mendongeng Kreatif untuk Anak Usia Dini','PT Bhuana Ilmu Populer','DR. Heru Kurniawan','2019',1,'2023-03-18 08:50:58'),(150,'BK07001',14,6,'978-602-00-1859-1','Magic math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:25:34'),(151,'BK07002',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:26:11'),(152,'BK07003',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:26:35'),(153,'BK07004',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:27:00'),(154,'BK07005',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:27:26'),(155,'BK07006',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:27:53'),(156,'BK07007',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:29:29'),(157,'BK07008',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:36:20'),(158,'BK07009',14,6,'','IPA SD 2b Kelas 4','PT Intan Pariwara','','1993',1,'2023-03-20 09:37:54'),(159,'BK07010',14,6,'','Ilmu Pengetahua Alam (Sains) 4','PT Intan Pariwara','','1988',1,'2023-03-20 09:39:02'),(160,'BK07011',14,6,'','Ilmu-Ilmu Pengetahuan Alam (IPA) ~ Model CBSA','PT Pabelan','Drs. Muzahit, dkk.','1988',1,'2023-03-20 09:43:12'),(161,'BK07012',14,6,'','Ilmu Pengetahuan Alam (IPA) - CBSA','CV Aneka Ilmu','','1988',1,'2023-03-20 09:44:23'),(162,'BK07013',14,6,'','REIPA Rangkuman dan Evaluasi Ilmu Pengetahuan Alam 5','CV Gema Nusa','Untung Joko P., Drs. Djemadi','1996',1,'2023-03-20 09:45:58'),(163,'BK07014',14,6,'978-979-074-834-7','Maths Genius','PT Bhuana Ilmu Populer','Bobby Sajutie, M. Arch','2011',1,'2023-03-20 09:50:53'),(164,'BK07015',14,6,'979-662-357-0','Mengenal Bentuk-Bentuk Konservasi Alam','Penerbit Cempaka Putih','Winarti','2008',1,'2023-03-20 09:51:57'),(165,'BK07016',14,6,'979-1464-44-4','Pencemaran Lingkungan dan Penanganannya','PT Citra Aji Parama','Kus Dwiyatmo B.','2007',1,'2023-03-20 09:53:15'),(166,'BK07017',14,6,'979-662-301-3','Mengenal Organisasi Pelestarian Lingkungan','Penerbit Cempaka Putih','Eni Anjayani','2008',1,'2023-03-20 09:54:20'),(167,'BK07018',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:55:30'),(168,'BK07019',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:56:12'),(169,'BK07020',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:56:37'),(170,'BK07021',14,6,'978-602-00-1859-1','Magic Math 100','PT Elex Media Komputindo','','2010',1,'2023-03-20 09:57:15'),(171,'BK07022',14,6,'978-602-7597-09-9','Segala hal tentang: Energi','Penerbit Erlangga','Chris Woodford','2007',1,'2023-03-20 09:59:09'),(172,'BK07023',14,6,'978-602-7597-09-9','Segala hal tentang: Energi','Penerbit Erlangga','Chris Woodford','2007',1,'2023-03-20 10:00:46'),(175,'BK03001',6,7,'978-602-00-1745-7','The Magic Notebook to Raise Investors','PT Elex Media Komputindo','Rintaro Ishikawa, Michio Teraoka','2011',1,'2023-03-21 07:51:20'),(176,'BK03002',6,7,'978-602-03-3107-2','Soul Models: Kisah-Kisah Keberanian','PT Gramedia Pustaka Utama','Elizabeth Bryan, Angela Daffron','2016',1,'2023-03-21 07:54:38'),(177,'BK03003',6,7,'978-602-1659-34-2','Lalat Cinta Indonesia','Charissa Publisher','Retagalih.pHe','2014',1,'2023-03-21 08:00:10'),(178,'BK03004',6,7,'-','Rubah Ingin Berubah','Lingkar Media','Kak Norma dan Kak Siti','2020',1,'2023-03-21 08:05:32'),(179,'BK03005',6,7,'-','Kerbau Dikagumi Katak','HNH','Filyan Alhazza','2020',1,'2023-03-21 08:08:23'),(180,'BK03006',6,7,'-','Landak yang Kesepian','HNH','Filyan Alhazza','2020',1,'2023-03-21 08:08:07'),(181,'BK03007',6,7,'-','Lebah dan Semut','HNH','Filyan Alhazza','2020',1,'2023-03-21 08:10:44'),(182,'BK03008',6,7,'-','Beruang dan Anaknya','HNH','Filyan Alhazza','2020',1,'2023-03-21 08:10:18'),(183,'BK03009',6,7,'978-979-052-220-6','Cerita dan Budaya Toraja','BSD','Fidelara','2017',1,'2023-03-21 08:14:50'),(184,'BK03010',6,7,'978-979-033-333-8','Diam!','Erlangga For Kids','Paul Bright, Guy Parker-Rees','2008',1,'2023-03-21 08:45:21'),(185,'BK03011',6,7,'978-979-033-372-7','Di Bawah Tempat Tidur','Erlangga For Kids','Paul Bright, Ben Cort','2008',1,'2023-03-21 08:54:45'),(186,'BK03012',6,7,'978-979-033-322-2','One Great Day: Hari yang Hebat','Erlangga For Kids','Merlinda Lesmana','2008',1,'2023-03-21 08:56:48'),(187,'BK03013',6,7,'978-979-033-322-2','One Great Day: Hari yang Hebat','Erlangga For Kids','Merlinda Lesmana','2008',1,'2023-03-21 08:58:08'),(188,'BK03014',6,7,'9781444917482','Petualangan Si Kembar Treetop : Si Kembar Bertemu Dinosaurus Misterius','Hodder Children\'s Books','Cressida Cowell','2019',1,'2023-03-25 08:14:01'),(189,'BK03015',6,7,'978-979-015-646-3','Aku Ingin Menjadi Apoteker','Esensi Erlangga Group','Niquen Hananti','2010',1,'2023-03-25 08:17:10'),(190,'BK03016',6,7,'978-979-052-219-0','Misteri Teka-Teki dari Minangkabau','Bina Sumber Daya Mipa','Fidelara','2017',1,'2023-03-25 08:18:55'),(191,'BK03017',6,7,'-','Raden Purbaya: Syekh Abdul Ghofar','CV. Litera Aksara Tegal','Tim Litera Aksara','2008',1,'2023-03-25 08:20:47'),(192,'BK03018',6,7,'978-979-075-235-1','Kecupan','Erlangga for Kids','Selma Mandine','2008',1,'2023-03-25 08:22:37'),(193,'BK03019',6,7,'9789790755680','Dongeng Para Putri','Erlangga for Kids','Ayu Prameswary','2017',1,'2023-03-25 08:24:48'),(194,'BK03020',6,7,'978-602-6847-73-7','Seri Aku Ingin Menjadi: Model','Esensi Erlangga Group','Rezah R','2018',1,'2023-03-25 08:26:39'),(195,'BK03021',6,7,'978-979-1349-63-5','Soichiro Honda','Wortel Book Publishing','G. Wu','2019',1,'2023-03-25 08:28:37'),(196,'BK03022',6,7,'978-602-6847-40-9','Seri Aku Ingin Menjadi: Arsitek','Esensi Erlangga Group','Dewi','2017',1,'2023-03-25 08:29:47'),(197,'BK03023',6,7,'978-602-252-796-1','Si Leungli: Pohon Ajaib untuk Rarang','Erlangga for kids','Aldora &amp; Andina Subarjo','2009',1,'2023-03-25 08:32:05'),(198,'BK03024',6,7,'978-979-075-235-1','Kecupan','Erlangga for Kids','Selma Mandine','2008',1,'2023-03-25 08:34:18'),(199,'BK03025',6,7,'978-979-075-260-3','Zoe dan Harpa Ajaib','Erlangga for Kids','Jane Andrews','2009',1,'2023-03-25 08:35:29'),(200,'BK03026',6,7,'978-602-6847-42-3','Seri Aku Ingin Menjadi: TNI AD','Esensi Erlangga Group','Irebella','2017',1,'2023-03-25 08:37:13'),(201,'BK03027',6,7,'978-602-6847-41-6','Seri Aku Ingin Menjadi: Pramugari','Esensi Erlangga Group','Rizki','2017',1,'2023-03-25 08:39:27'),(202,'BK03028',6,7,'978-602-6847-36-2','Seri Aku Ingin Menjadi: Sutradara','Esensi Erlangga Group','Dina Alfiyanti','2017',1,'2023-03-25 08:40:40'),(203,'BK03029',6,7,'978-602-6847-72-0','Seri Aku Ingin Menjadi: Pemilik Butik','Esensi Erlangga Group','Rezah R','2018',1,'2023-03-25 08:41:42'),(204,'BK03030',6,7,'978-602-252-794-7','Bawang Merah Bawang Putih','Erlangga for Kids','Aldora &amp; Andina Subarjo','2013',1,'2023-03-25 08:43:54'),(205,'BK03031',6,7,'979-672-834-6','Feelings Brave','Cherrytree','Janine Amos','2000',1,'2023-03-25 08:45:44'),(206,'BK03032',6,7,'978-602-6847-37-9','Seri Aku Ingin Menjadi: Penulis','Esensi Erlangga Group','Dina Alfiyanti','2017',1,'2023-03-25 08:47:08'),(207,'BK03033',6,7,'978-602-6847-44-7','Seri Aku Ingin Menjadi: TNI AU','Esensi Erlangga Group','Irebella','2017',1,'2023-03-25 08:48:03'),(208,'BK03034',6,7,'978-602-252-824-1','Timun Mas: Bermain dengan Raksasa','Erlangga for Kids','Aldora &amp; Andina Subarjo','2016',1,'2023-03-25 08:49:22'),(209,'BK03035',6,7,'978-979-075-234-4','Pulau Harta Karun','Erlangga for Kids','Robert Louis S','2009',1,'2023-03-25 08:50:41'),(210,'BK03036',6,7,'978-602-6847-39-3','Seri Aku Ingin Menjadi: Pengacara','Esensi Erlangga Group','Lusiana Rumintang','2017',1,'2023-03-25 08:52:09'),(211,'BK03037',6,7,'978-602-6847-68-3','Seri Aku Ingin Menjadi: Blogger','Esensi Erlangga Group','Yuki Anggia','2018',1,'2023-03-25 08:53:17'),(212,'BK03038',6,7,'978-979-075-505-5','I Can Speak English','Erlangga for Kids','Afrin Aulia','2010',1,'2023-03-25 08:54:31'),(213,'BK03039',6,7,'978-979-075-505-5','I Can Speak English','Erlangga for Kids','Afrin Aulia','2010',1,'2023-03-25 08:55:33'),(214,'BK02001',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:01:01'),(215,'BK02002',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:01:50'),(216,'BK02003',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:02:43'),(217,'BK02004',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:03:22'),(218,'BK02005',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:04:00'),(219,'BK02006',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:04:39'),(220,'BK02007',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:05:11'),(221,'BK02008',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:05:47'),(222,'BK02009',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo	','Yoo Eun Gi','2015',1,'2023-03-25 09:06:24'),(223,'BK02010',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:52:52'),(224,'BK02011',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:53:47'),(225,'BK02012',10,8,'978-602-252-7161-3','Minder? NO WAY','Elex Media Komputindo','Yoo Eun Gi','2015',1,'2023-03-25 09:54:38'),(226,'BK02013',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:07:56'),(227,'BK02014',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:08:27'),(228,'BK02015',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:08:58'),(229,'BK02016',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:09:19'),(230,'BK02017',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:09:41'),(231,'BK02018',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:09:57'),(232,'BK02019',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:10:18'),(233,'BK02020',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:10:36'),(234,'BK02021',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:11:00'),(235,'BK02022',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:11:18'),(236,'BK02023',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:11:48'),(237,'BK02024',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:12:04'),(238,'BK02025',10,8,'978-602-02-2687-3','Kasus Terakhir','Elex Media Komputindo','Lee Kang-an','2013',1,'2023-03-25 10:12:27'),(239,'BK03040',6,7,'602-8226-','Belajar Berempati','Saka Mitra Kompetrensi','Agung Feryanto','2017',1,'2023-03-25 10:17:48'),(240,'BK04070',11,4,'978-602-02-0863-3','Siap Ulangan Harian','Elex Media Komputindo','','2013',1,'2023-03-25 10:19:49'),(241,'BK01001',1,10,'978-602-6363-82-4','Microsoft Office 365','CV. INDOTAMA SOLO','Pangarso Yuliatmoko','2020',1,'2023-04-04 09:54:50'),(242,'BK01002',1,10,'978-979-033-235-5','Penemuan Informasi di dalam Genggamanmu','Erlangga for kids','Dee Philips, dkk.','2006',1,'2023-04-04 09:54:39'),(243,'BK01003',1,10,'-','JAGO JUALAN DI Instagram','Metta Mini','@Trik photoshop id dan @Bisnis anak muda','2014',1,'2023-04-04 09:59:27'),(244,'BK01004',1,10,'978-602-02-2585-2','Mengenal &amp; Menguasai Mobile Photography Dengan Smartphone Android','Elex Media Komputindo','id.andrography','2014',1,'2023-04-08 08:32:48'),(245,'BK06014',13,5,'979-688-489-5','OXFORD kamus junior Berganbar Inggris-Indonesia','Erlangga','Rosemary Sansome, Dee Reid, Alan Sponner','2002',1,'2023-04-08 08:38:17'),(246,'BK04071',11,1,'978-602-61228-9-6','Buku Pintar Mengenal Pahlawan Indonesia','Cemerlang','Suryadi Pratama','2019',1,'2023-04-08 08:42:45'),(247,'BK04072',11,1,'602-17535-7-7','Budidaya Cabai  di Lahan Sempit','Infra Pustaka','Neti Suriana','2013',1,'2023-04-08 08:47:40'),(248,'BK08001',15,11,'978-602-60085-4-1','Kisah Keteladanan dan Inspiratif 25 Nabi dan Rasul','Bintang Ilmu','Kak Muchtam','2016',1,'2023-04-27 08:08:51'),(249,'BK08002',15,11,'978-602-53592-2-4','Kisah 25 Nabi &amp; Rasul','Bintang Ilmu','Kak Muchtam','2019',1,'2023-04-27 08:09:45'),(250,'BK04073',11,6,'978-797-27-6923-4','7 Keajaiban Rezeki','Elex Media Komputindo','Ippho Santosa','2010',1,'2023-04-27 08:12:00'),(251,'BK08003',15,11,'979-964-564-6','Aku Cinta Islam','Integral Media','A. Rofiq','2010',1,'2023-04-27 08:13:10'),(252,'BK08004',15,11,'-','Do\'a Do\'a Rasulullah SAW','Sandrojaya','Ust. Abdurrahim ','2008',1,'2023-04-27 08:14:29'),(253,'BK08005',15,11,'-','Risalah Tuntunan Lengkap Shalat','PT Karya Toha Putra','Drs. Moh. Rifa\'i','2011',1,'2023-04-27 08:15:32'),(254,'BK09001',16,12,'979-28-0745-5','Kesenia Tradisional Pulau Sulawesi ','PT Intan Pariwara','M. Purwati','2017',1,'2023-04-27 08:17:37'),(255,'BK09002',16,12,'978-979-021-413-2','Ondel-Ondel','PT Bengawan Ilmu','Kustopo','2017',1,'2023-04-27 08:18:24'),(256,'BK09003',16,12,'979-17030-5-5','Olahraga Tradisional Indonesia','PT Maraga Borneo Tarigan','Ajun Khamdani','2010',1,'2023-04-27 08:19:35'),(257,'BK09004',16,12,'979-28-1547-4','Seni Rupa Terapan Nusantara','PT Intan Pariwara','Rantinah','2017',1,'2023-04-27 08:20:21'),(258,'BK09005',16,12,'978-979-070-131-1','Mengenal Teater di Indonesia','Aneka Ilmu','M. Noor Said','2017',1,'2023-04-27 08:22:21'),(259,'BK09006',16,12,'979-1456-17-3','Membatik','KTSP','Destin Huru Setiati dan Joko Dwi Handoyo','2008',1,'2023-04-27 08:23:51'),(260,'BK09007',16,12,'979-453-780-2','Kerajinan Tangan dan Kesenian','Balai Aksara ','Drs. A. Hamid','1994',1,'2023-04-27 08:24:45'),(261,'BK09008',16,12,'-','Seni Kerajinan Tangan','Yayasan Rieka\'s Atelier','Rieka Suatan','2002',1,'2023-04-27 08:25:55'),(262,'BK09009',16,12,'978-602-6559-418','Keterampilan Kain Flanel','Indo Publika','Noni Anggraeni','2017',1,'2023-04-27 08:26:47'),(263,'BK04074',11,1,'-','Belajar Membaca Notasi dan Syair Lagu Kebangsaan dan Bela Negara','Asyhari entertain ','Irianto dan Stay','2011',1,'2023-04-27 08:58:47'),(264,'BK09010',16,12,'979-28-0338-9','Keragaman Tari Nusantara','PT Intan Pariwara','Ari Subekti','2008',1,'2023-04-27 08:29:53'),(265,'BK04075',11,1,'979-1136-594','Sampah Jadi Uang','Saka Mitra Kompetensi','Endang Purwanti','2007',1,'2023-04-27 08:30:57'),(266,'BK05026',12,4,'978-602-481-675-9','Jejak Listrik di Tanah Raja','PT Gramedia ','Eko Sulistyo','2021',1,'2023-04-27 08:32:51'),(267,'BK07024',14,8,'979-666-295-7','Kamus Matematika','Balai Pustaka','Djati Karami','1999',1,'2023-04-27 08:34:07'),(268,'BK06015',13,5,'-','menulis tegak bersambung','Utama Makmur Jakarta','Sumiyem','2010',1,'2023-04-27 08:35:24'),(269,'BK01005',1,6,'978-979-655-927-5','Rich Dad, Poor Dad','PT Centro Inti Media','Robert T. Kiyosaki','1997',1,'2023-04-27 08:36:55'),(270,'BK07025',14,8,'979-666-295-7','Kamus Matematika','Balai Pustaka','Djati Karami','1999',1,'2023-04-27 08:38:14'),(271,'BK04076',11,1,'979-28-2286-1','Bank Soal Kelas IV','PT Intan Pariwara','Muhammad Mukti Aji','2017',1,'2023-04-27 08:39:32'),(272,'BK04077',11,1,'978-623-216-444-4','Soal Tematik Terpadu Kelas V','Bhuana Ilmu Populer','Cucu Wijayanto','2019',1,'2023-04-27 08:40:50'),(273,'BK04078',11,1,'571660041','Taktik Jitu Lolos US SD','PT Grasindo','Tim Smart Nusantara','2016',1,'2023-04-27 08:42:25'),(274,'BK04079',11,1,'571660042','Smart Solution Lulus US','PT Grasindo','Tim Primagama','2017',1,'2023-04-27 08:43:57'),(275,'BK06016',13,5,'-','menulis tegak bersambung','Utama Makmur Jakarta','-','2010',1,'2023-04-27 08:44:56'),(276,'BK10001',17,13,'2723-6811','Putra Cendekia','CV Cahaya Putra Cendekia','-','2020',1,'2023-04-27 08:47:45'),(277,'BK10002',17,13,'2723-6811','Putra Cendekia','CV Cahaya Putra Cendekia	','-','2020',1,'2023-04-27 08:49:15'),(278,'BK10003',17,13,'2723-6811','Putra Cendekia','CV Cahaya Putra Cendekia','-','2020',1,'2023-04-27 08:50:03'),(279,'BK02026',10,9,'979-1464-64-2','Menembus Belantara Irian Barat','PT Citra Aji Parama','Daniel Agus Maryanto','2009',1,'2023-04-27 08:52:57');
/*!40000 ALTER TABLE `tbl_buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_buku_digital`
--

DROP TABLE IF EXISTS `tbl_buku_digital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_buku_digital` (
  `id_buku` int(11) NOT NULL AUTO_INCREMENT,
  `kode_buku` varchar(10) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `isbn` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `pengarang` varchar(255) NOT NULL,
  `thn_buku` varchar(255) NOT NULL,
  `lampiran` varchar(255) NOT NULL,
  `total_hal` int(11) NOT NULL,
  `tgl_masuk` varchar(255) NOT NULL,
  PRIMARY KEY (`id_buku`),
  UNIQUE KEY `kode_buku` (`kode_buku`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_buku_digital`
--

LOCK TABLES `tbl_buku_digital` WRITE;
/*!40000 ALTER TABLE `tbl_buku_digital` DISABLE KEYS */;
INSERT INTO `tbl_buku_digital` VALUES (1,'BD02001',10,'978-623-307-040-9','Danis Sang Pemenang','Badan Pengembangan dan Pembinaan Bahasa Kemendikbud-Ristek','M. Sanjaya, Slamet Karlis','2021','9836020230417',36,'2023-04-17 09:55:06'),(2,'BD02002',10,'978-623-307-038-6','Teladan 1 Maninrori dan Karaeng Pattingaloang','Badan Pengembangan dan Pembinaan Bahasa Kemendikbud-Ristek','Wena Wiraksih, Aditya Maulana R.','2021','1649520230417',36,'2023-04-17 10:06:03'),(3,'BD02003',10,'978-602-437-762-5','Bola Diamlah!','Badan Pengembangan dan Pembinaan Bahasa Kemendikbud-Ristek','Tuti Adhayati','2019','7980320230417',24,'2023-04-17 10:11:33'),(4,'BD03001',6,'978-979-069-293-0','Kalah Oleh Si Cerdik','Badan Pengembangan dan Pembinaan Bahasa Kemendikbud-Ristek','Atisah','2017','5309720230417',65,'2023-04-17 10:14:33'),(5,'BD03002',6,'978-602-244-939-3','Apa Itu?','Kemendikbud-Ristek','Laksmi Manohara','2022','3648120230418',40,'2023-04-18 08:29:56'),(6,'BD03003',6,'978-602-244-935-5','Dimana Kacang Sipet','Kemendikbud-Ristek','Aris Hartanti','2022','2501820230418',40,'2023-04-18 08:39:35'),(7,'BD02004',10,'-','Karena Anggrek Ibu','Badan Pengembangan dan Pembinaan Bahasa Kemendikbud-Ristek','-','2022','5621320230427',64,'2023-04-27 09:44:13'),(8,'BD03004',6,'978-602-244-930-0','Aku Sudah Besar','Kemendikbud-Ristek','Futri Wijayanti','2022','9642820230502',32,'2023-05-02 08:51:34'),(9,'BD03005',6,'978-602-244-926-3','Biji Merah Luna','Kemendikbud-Ristek','Ammy kUDO','2022','3152420230502',32,'2023-05-02 08:54:10'),(10,'BD03006',6,'978-602-244-936-2','Gambar Lucu Mika','Kemendikbud-Ristek','Tiyas Widjanti','2022','2018520230502',32,'2023-05-02 08:58:54'),(11,'BD03007',6,'978-602-244-938-6','Kue Kimu','Kemendikbud-Ristek','Lia Herliana','2022','9867420230502',32,'2023-05-02 09:01:24'),(12,'BD03008',6,'978/-602-244-937-9','Naik-Naik Ke Puncak Bukit','Kemendikbud-Ristek','Sarah Fauziah','2022','2395620230502',40,'2023-05-02 09:03:36'),(13,'BD03009',6,'978-602-427-921-9','Namaku Kali','Kemendikbud-Ristek','Anna Farida','2022','2196520230502',40,'2023-05-02 09:06:16'),(14,'BD03010',6,'978-602-244-943-0','Pilus Rumput Laut Untuk Rasi','Kemendikbud-Ristek','Nabila Adani','2022','4150220230502',64,'2023-05-02 09:08:51'),(15,'BD03011',6,'978-602-244-940-9','Putri Di Dalam Hutan','Kemendikbud-Ristek','Witaru Emi','2022','8479520230502',72,'2023-05-02 09:12:03'),(16,'BD03012',6,'978-602-244-924-9','Rumah Wortel','Kemendikbud-Ristek','Helga. K','2022','1802720230502',40,'2023-05-02 09:14:55'),(17,'BD03013',6,'978-602-244-945-4','Tidak Bisa Tidak','Kemendikbud-Ristek','Lenny Puspita Ekawaty','2022','0135420230502',48,'2023-05-02 09:18:31'),(18,'BD03014',6,'978-602-244-928-7','Tiup-Tiup','Kemendikbud-Ristek','Ana Falesthein T. A','2022','2615320230502',40,'2023-05-02 09:21:57'),(19,'BD06001',13,'-','Kumpulan Pantun','UPI Kampus Sumedang','-','2020','1942720230502',30,'2023-05-02 09:28:48'),(21,'BD03015',6,'978-602-244-947-8','Selamatkan Dirimu!','Kemendikbud-Ristek','Dewi Cholidatul ','2022','7950120230502',40,'2023-05-02 10:03:32'),(22,'BD03016',6,' 978-602-244-922-5','Si Cemong Coak','Kemendikbud-Ristek','Iwok Abqary','2022','7143520230502',72,'2023-05-02 10:06:20'),(23,'BD08001',15,'-','Ummu Mahjan','muslimkecil.com','Noli dan Nida','2022','4792620230503',12,'2023-05-03 08:03:09'),(24,'BD08002',15,'-','Buah Untuk Maryam dan Doa Nabi Zakaria','muslimkecil.com','Nandika Yogamaya','2022','7605420230503',5,'2023-05-03 08:06:08'),(25,'BD08003',15,'-','Nabi Danial dan Singa-Singa','muslimkecil.com','Nida','2022','7148220230503',18,'2023-05-03 08:08:19'),(26,'BD08004',15,'-','Kertas dan Benang Syaikh Albani Ra','muslimkecil.com','Nida','2022','2475020230503',12,'2023-05-03 08:11:11'),(27,'BD08005',15,'-','Kisah Imam Ahmad dan Tukang Roti','muslimkecil.com','Nida','2022','9724120230503',14,'2023-05-03 08:13:30'),(28,'BD08006',15,'-','Kisah Si Belang, Si Botak, dan Si Buta','muslimkecil.com','Noli','2022','2810720230503',16,'2023-05-03 08:17:10'),(29,'BD08007',15,'-','Ketika Uhud Bergetar','muslimkecil.com','Nida','2022','8420520230503',16,'2023-05-03 08:19:17'),(30,'BD08008',15,'978-623-307-000-3','Festival Cap Gomeh di Kota Seribu Kelenteng','Badan Pengembangan dan Pembinaan Bahasa Kemendikbud-Ristek','Dewi Cholidatul','2019','0936520230503',45,'2023-05-03 08:23:31'),(31,'BD04001',11,'978-623-307-004-1','Candiku Yang Terhebat','Badan Pengembangan dan Pembinaan Bahasa Kemendikbud-Ristek','Iwok Abqary','2020','0956220230503',58,'2023-05-03 08:30:13'),(32,'BD04002',11,'978-623-307-019-5','Cerita dari Suku Baduy','Badan Pengembangan dan Pembinaan Bahasa Kemendikbud-Ristek','Tuti Adhayati','2020','2507920230503',45,'2023-05-03 08:34:57');
/*!40000 ALTER TABLE `tbl_buku_digital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_denda`
--

DROP TABLE IF EXISTS `tbl_denda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_denda` (
  `id_denda` int(11) NOT NULL AUTO_INCREMENT,
  `pinjam_id` varchar(255) NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int(11) NOT NULL,
  `tgl_denda` varchar(255) NOT NULL,
  PRIMARY KEY (`id_denda`)
) ENGINE=InnoDB AUTO_INCREMENT=202 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_denda`
--

LOCK TABLES `tbl_denda` WRITE;
/*!40000 ALTER TABLE `tbl_denda` DISABLE KEYS */;
INSERT INTO `tbl_denda` VALUES (6,'PJ0011','0',0,'2023-03-18'),(7,'PJ0032','0',0,'2023-03-18'),(8,'PJ0034','0',0,'2023-03-18'),(9,'PJ0035','0',0,'2023-03-18'),(11,'PJ0036','0',0,'2023-03-18'),(16,'PJ0043','0',0,'2023-03-21'),(17,'PJ0044','0',0,'2023-03-21'),(18,'PJ0045','20000',5,'2023-03-27'),(19,'PJ0054','0',0,'2023-03-27'),(20,'PJ0050','0',0,'2023-03-27'),(21,'PJ0051','0',0,'2023-03-27'),(22,'PJ0052','0',0,'2023-03-27'),(23,'PJ0053','0',0,'2023-03-27'),(24,'PJ0048','0',0,'2023-03-27'),(25,'PJ0049','0',0,'2023-03-27'),(26,'PJ0047','0',0,'2023-03-27'),(27,'PJ0046','0',0,'2023-03-27'),(28,'PJ0055','0',0,'2023-03-28'),(29,'PJ0062','0',0,'2023-03-28'),(30,'PJ0058','0',0,'2023-03-28'),(31,'PJ0063','0',0,'2023-03-28'),(32,'PJ0061','0',0,'2023-03-28'),(33,'PJ0060','0',0,'2023-03-28'),(34,'PJ0059','0',0,'2023-03-28'),(35,'PJ0057','0',0,'2023-03-28'),(37,'PJ0075','0',0,'2023-03-29'),(38,'PJ0064','0',0,'2023-03-29'),(39,'PJ0072','0',0,'2023-03-29'),(40,'PJ0065','0',0,'2023-03-29'),(41,'PJ0069','0',0,'2023-03-29'),(42,'PJ0068','0',0,'2023-03-29'),(43,'PJ0067','0',0,'2023-03-29'),(44,'PJ0070','0',0,'2023-03-29'),(45,'PJ0066','0',0,'2023-03-29'),(46,'PJ0071','0',0,'2023-03-29'),(47,'PJ0073','0',0,'2023-03-29'),(48,'PJ0074','0',0,'2023-03-29'),(49,'PJ0077','0',0,'2023-03-29'),(50,'PJ0080','0',0,'2023-03-29'),(51,'PJ0079','0',0,'2023-03-29'),(52,'PJ0089','0',0,'2023-03-29'),(53,'PJ0078','0',0,'2023-03-29'),(54,'PJ0097','0',0,'2023-03-29'),(55,'PJ0098','0',0,'2023-03-29'),(56,'PJ0096','0',0,'2023-03-29'),(57,'PJ0094','0',0,'2023-03-29'),(58,'PJ0095','0',0,'2023-03-29'),(59,'PJ0090','0',0,'2023-03-29'),(60,'PJ0083','0',0,'2023-03-29'),(61,'PJ0092','0',0,'2023-03-29'),(62,'PJ0087','0',0,'2023-03-29'),(63,'PJ0081','0',0,'2023-03-29'),(64,'PJ0093','0',0,'2023-03-29'),(65,'PJ0082','0',0,'2023-03-29'),(66,'PJ0088','0',0,'2023-03-29'),(67,'PJ0085','0',0,'2023-03-29'),(68,'PJ0086','0',0,'2023-03-29'),(69,'PJ0084','0',0,'2023-03-29'),(70,'PJ0091','0',0,'2023-03-29'),(71,'PJ0099','0',0,'2023-03-29'),(72,'PJ0076','0',0,'2023-03-29'),(73,'PJ00100','0',0,'2023-03-30'),(74,'PJ00109','0',0,'2023-03-30'),(75,'PJ00107','0',0,'2023-03-30'),(76,'PJ00106','0',0,'2023-03-30'),(77,'PJ00103','0',0,'2023-03-30'),(78,'PJ00101','0',0,'2023-03-30'),(79,'PJ00104','0',0,'2023-03-30'),(80,'PJ00102','0',0,'2023-03-30'),(81,'PJ00111','0',0,'2023-03-30'),(82,'PJ00112','0',0,'2023-03-30'),(83,'PJ00113','0',0,'2023-03-30'),(84,'PJ00110','0',0,'2023-03-30'),(85,'PJ00105','0',0,'2023-03-30'),(86,'PJ00108','0',0,'2023-03-30'),(87,'PJ00115','0',0,'2023-03-31'),(88,'PJ00120','0',0,'2023-03-31'),(89,'PJ00122','0',0,'2023-03-31'),(90,'PJ00128','0',0,'2023-03-31'),(91,'PJ00118','0',0,'2023-03-31'),(92,'PJ00121','0',0,'2023-03-31'),(93,'PJ00126','0',0,'2023-03-31'),(94,'PJ00127','0',0,'2023-03-31'),(95,'PJ00117','0',0,'2023-03-31'),(96,'PJ00132','0',0,'2023-03-31'),(97,'PJ00130','0',0,'2023-03-31'),(98,'PJ00129','0',0,'2023-03-31'),(99,'PJ00139','0',0,'2023-03-31'),(100,'PJ00131','0',0,'2023-03-31'),(101,'PJ00116','0',0,'2023-03-31'),(102,'PJ00119','0',0,'2023-03-31'),(103,'PJ00125','0',0,'2023-03-31'),(104,'PJ00124','0',0,'2023-03-31'),(105,'PJ00123','0',0,'2023-03-31'),(109,'PJ00145','0',0,'2023-03-31'),(113,'PJ00138','0',0,'2023-03-31'),(114,'PJ00136','0',0,'2023-03-31'),(115,'PJ00142','0',0,'2023-03-31'),(116,'PJ00143','0',0,'2023-03-31'),(117,'PJ00144','0',0,'2023-03-31'),(118,'PJ00114','0',0,'2023-03-31'),(119,'PJ00157','0',0,'2023-04-01'),(120,'PJ00165','0',0,'2023-04-01'),(121,'PJ00166','0',0,'2023-04-01'),(122,'PJ00161','0',0,'2023-04-01'),(123,'PJ00164','0',0,'2023-04-01'),(124,'PJ00155','0',0,'2023-04-01'),(125,'PJ00156','0',0,'2023-04-01'),(126,'PJ00158','0',0,'2023-04-01'),(127,'PJ00159','0',0,'2023-04-01'),(128,'PJ00160','0',0,'2023-04-01'),(129,'PJ00162','0',0,'2023-04-01'),(131,'PJ00149','0',0,'2023-04-01'),(132,'PJ00146','0',0,'2023-04-01'),(133,'PJ00147','0',0,'2023-04-01'),(134,'PJ00150','0',0,'2023-04-01'),(135,'PJ00148','0',0,'2023-04-01'),(136,'PJ00152','0',0,'2023-04-01'),(137,'PJ00163','0',0,'2023-04-01'),(138,'PJ00167','0',0,'2023-04-01'),(139,'PJ00170','0',0,'2023-04-03'),(140,'PJ00172','0',0,'2023-04-03'),(141,'PJ00173','0',0,'2023-04-03'),(142,'PJ00168','0',0,'2023-04-03'),(143,'PJ00171','0',0,'2023-04-03'),(144,'PJ00174','0',0,'2023-04-03'),(145,'PJ00169','0',0,'2023-04-03'),(146,'PJ00178','0',0,'2023-04-03'),(147,'PJ00175','0',0,'2023-04-03'),(148,'PJ00176','0',0,'2023-04-03'),(149,'PJ00177','0',0,'2023-04-03'),(150,'PJ00179','0',0,'2023-04-03'),(151,'PJ00182','0',0,'2023-04-04'),(152,'PJ00181','0',0,'2023-04-04'),(153,'PJ00183','0',0,'2023-04-04'),(154,'PJ00184','0',0,'2023-04-04'),(155,'PJ00185','0',0,'2023-04-04'),(156,'PJ00189','0',0,'2023-04-04'),(157,'PJ00187','0',0,'2023-04-04'),(158,'PJ00186','0',0,'2023-04-04'),(159,'PJ00180','0',0,'2023-04-04'),(160,'PJ00188','0',0,'2023-04-04'),(161,'PJ00190','0',0,'2023-04-04'),(162,'PJ00191','0',0,'2023-04-04'),(163,'PJ00192','0',0,'2023-04-04'),(164,'PJ00196','0',0,'2023-04-05'),(165,'PJ00195','0',0,'2023-04-05'),(166,'PJ00197','0',0,'2023-04-05'),(167,'PJ00194','0',0,'2023-04-05'),(168,'PJ00193','0',0,'2023-04-05'),(169,'PJ00198','0',0,'2023-04-05'),(170,'PJ00199','0',0,'2023-04-05'),(171,'PJ00200','0',0,'2023-04-05'),(172,'PJ00201','0',0,'2023-04-05'),(173,'PJ00203','0',0,'2023-04-05'),(174,'PJ00204','0',0,'2023-04-05'),(175,'PJ00202','0',0,'2023-04-05'),(176,'PJ00205','0',0,'2023-04-08'),(177,'PJ00208','0',0,'2023-04-08'),(178,'PJ00210','0',0,'2023-04-08'),(179,'PJ00206','0',0,'2023-04-08'),(180,'PJ00207','0',0,'2023-04-08'),(181,'PJ00209','0',0,'2023-04-08'),(182,'PJ00211','0',0,'2023-04-08'),(183,'PJ00213','0',0,'2023-04-10'),(184,'PJ00212','0',0,'2023-04-10'),(185,'PJ00214','0',0,'2023-04-10'),(186,'PJ00215','0',0,'2023-04-10'),(187,'PJ00217','0',0,'2023-04-17'),(188,'PJ00218','0',0,'2023-04-17'),(189,'PJ00220','0',0,'2023-04-17'),(190,'PJ00216','0',0,'2023-04-17'),(191,'PJ00223','0',0,'2023-04-17'),(192,'PJ00219','0',0,'2023-04-17'),(193,'PJ00222','0',0,'2023-04-17'),(194,'PJ00221','0',0,'2023-04-17'),(195,'PJ00224','0',0,'2023-04-18'),(196,'PJ00225','0',0,'2023-04-18'),(197,'PJ00226','0',0,'2023-04-18'),(198,'PJ00227','0',0,'2023-04-18'),(199,'PJ00229','0',0,'2023-04-18'),(200,'PJ00228','0',0,'2023-04-18'),(201,'PJ00230','0',0,'2023-04-18');
/*!40000 ALTER TABLE `tbl_denda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kategori`
--

DROP TABLE IF EXISTS `tbl_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kategori`
--

LOCK TABLES `tbl_kategori` WRITE;
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
INSERT INTO `tbl_kategori` VALUES (1,'01','Teknologi , Informasi dan Komunikasi'),(6,'03','Fiksi'),(10,'02','Komik'),(11,'04','Umum'),(12,'05','Ilmu Sosial'),(13,'06','Bahasa'),(14,'07','Matematika dan sains'),(15,'08','Agama'),(16,'09','Kesenian dan Olahraga'),(17,'10','Majalah');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kategori_alat`
--

DROP TABLE IF EXISTS `tbl_kategori_alat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kategori_alat` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `kode_kategori` varchar(5) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kategori_alat`
--

LOCK TABLES `tbl_kategori_alat` WRITE;
/*!40000 ALTER TABLE `tbl_kategori_alat` DISABLE KEYS */;
INSERT INTO `tbl_kategori_alat` VALUES (1,'01','IPAS'),(4,'02','Matematika'),(5,'03','Bahasa');
/*!40000 ALTER TABLE `tbl_kategori_alat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kehadiran`
--

DROP TABLE IF EXISTS `tbl_kehadiran`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kehadiran` (
  `id_kehadiran` int(11) NOT NULL AUTO_INCREMENT,
  `tgl_kehadiran` varchar(100) NOT NULL,
  `siswa_id` varchar(255) NOT NULL,
  PRIMARY KEY (`id_kehadiran`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kehadiran`
--

LOCK TABLES `tbl_kehadiran` WRITE;
/*!40000 ALTER TABLE `tbl_kehadiran` DISABLE KEYS */;
INSERT INTO `tbl_kehadiran` VALUES (5,'2023-03-19','3,5,6,7,8,9'),(6,'2023-03-19','10'),(10,'2023-03-19','11'),(11,'2023-03-18','11'),(12,'2023-03-21','17,15,14,13,18'),(13,'2023-03-20','18'),(14,'2023-03-24','18,13,14,15,17,19,20,21,22,23,24'),(15,'2023-03-25','18'),(16,'2023-03-25','39,42,44,45,46,47,49'),(17,'2023-03-25','20,21,23,24,26,27,29,30,32,35,38,41,44,47,50,53'),(19,'2023-03-25','18,13,14,15,17,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33'),(20,'2023-03-25','18,13,14,15,17,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33'),(21,'2023-03-27','18,13,14,15,17,19,20,21,22,23,24,25'),(22,'2023-03-27','26,27,28,29,30,31,32,33,34,35,36,37,38'),(23,'2023-03-27','39,40,41,42,43,44,45,46,47,48,49,50,51,52,53'),(24,'2023-03-27','54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73'),(25,'2023-03-27','74,75,76,77,78,79,80,81,82,83'),(26,'2023-03-27','40,51'),(27,'2023-03-27','18,13,14,15,17,19,20,21,23'),(28,'2023-03-29','134,135,136,138,139,140,141,142,143,145,149'),(29,'2023-04-08','100,101,104,107,110,112'),(30,'2023-04-17','18'),(31,'2023-04-18','59'),(32,'2023-04-27','18');
/*!40000 ALTER TABLE `tbl_kehadiran` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_login`
--

DROP TABLE IF EXISTS `tbl_login`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
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
  `foto` varchar(255) NOT NULL,
  PRIMARY KEY (`id_login`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_login`
--

LOCK TABLES `tbl_login` WRITE;
/*!40000 ALTER TABLE `tbl_login` DISABLE KEYS */;
INSERT INTO `tbl_login` VALUES (1,'AG001','Admin','b336be0132c8ed7f206fcc0542897149','Petugas','Admin','Tegal','2000-08-08','Laki-Laki','Desa Getaskerep','089694589234','admin@gmail.com','2023-03-10','user-admin.png');
/*!40000 ALTER TABLE `tbl_login` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pinjam`
--

DROP TABLE IF EXISTS `tbl_pinjam`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pinjam` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=231 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pinjam`
--

LOCK TABLES `tbl_pinjam` WRITE;
/*!40000 ALTER TABLE `tbl_pinjam` DISABLE KEYS */;
INSERT INTO `tbl_pinjam` VALUES (42,'PJ001','0001','BK03013','Di Kembalikan','2023-03-21',2,'2023-03-23','2023-03-21'),(43,'PJ0043','0001','BK03013','Di Kembalikan','2023-03-21',1,'2023-03-22','2023-03-21'),(44,'PJ0044','0001','BK03013','Di Kembalikan','2023-03-21',1,'2023-03-22','2023-03-21'),(45,'PJ0045','0001','BK03010','Di Kembalikan','2023-03-21',1,'2023-03-22','2023-03-27'),(46,'PJ0046','0136','BK02023','Di Kembalikan','2023-03-27',2,'2023-03-29','2023-03-27'),(47,'PJ0047','0136','BK03040','Di Kembalikan','2023-03-27',1,'2023-03-28','2023-03-27'),(48,'PJ0048','0136','BK02025','Di Kembalikan','2023-03-27',2,'2023-03-29','2023-03-27'),(49,'PJ0049','0135','BK02024','Di Kembalikan','2023-03-27',1,'2023-03-28','2023-03-27'),(50,'PJ0050','0014','BK03002','Di Kembalikan','2023-03-27',1,'2023-03-28','2023-03-27'),(51,'PJ0051','0013','BK02017','Di Kembalikan','2023-03-27',1,'2023-03-28','2023-03-27'),(52,'PJ0052','0008','BK02012','Di Kembalikan','2023-03-27',1,'2023-03-28','2023-03-27'),(53,'PJ0053','0011','BK02014','Di Kembalikan','2023-03-27',1,'2023-03-28','2023-03-27'),(54,'PJ0054','0038','BK06001','Di Kembalikan','2023-03-27',1,'2023-03-28','2023-03-27'),(55,'PJ0055','0013','BK03002','Di Kembalikan','2023-03-28',1,'2023-03-29','2023-03-28'),(57,'PJ0057','0071','BK02001','Di Kembalikan','2023-03-28',1,'2023-03-29','2023-03-28'),(58,'PJ0058','0075','BK04065','Di Kembalikan','2023-03-28',1,'2023-03-29','2023-03-28'),(59,'PJ0059','0060','BK02023','Di Kembalikan','2023-03-28',1,'2023-03-29','2023-03-28'),(60,'PJ0060','0064','BK02009','Di Kembalikan','2023-03-28',1,'2023-03-29','2023-03-28'),(61,'PJ0061','0061','BK03040','Di Kembalikan','2023-03-28',1,'2023-03-29','2023-03-28'),(62,'PJ0062','0070','BK03017','Di Kembalikan','2023-03-28',1,'2023-03-29','2023-03-28'),(63,'PJ0063','0069','BK02016','Di Kembalikan','2023-03-28',1,'2023-03-29','2023-03-28'),(64,'PJ0064','0121','BK02019','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(65,'PJ0065','0126','BK02021','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(66,'PJ0066','0123','BK03004','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(67,'PJ0067','0136','BK02017','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(68,'PJ0068','0128','BK02022','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(69,'PJ0069','0129','BK03030','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(70,'PJ0070','0125','BK02015','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(71,'PJ0071','0122','BK02018','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(72,'PJ0072','0127','BK03035','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(73,'PJ0073','0130','BK03007','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(74,'PJ0074','0132','BK02020','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(75,'PJ0075','0135','BK03006','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(76,'PJ0076','0134','BK02023','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(77,'PJ0077','0137','BK02025','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(78,'PJ0078','0131','BK02013','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(79,'PJ0079','0057','BK02024','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(80,'PJ0080','0060','BK02005','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(81,'PJ0081','0058','BK02003','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(82,'PJ0082','0063','BK02008','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(83,'PJ0083','0073','BK02006','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(84,'PJ0084','0064','BK02009','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(85,'PJ0085','0054','BK02012','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(86,'PJ0086','0068','BK02010','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(87,'PJ0087','0070','BK02011','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(88,'PJ0088','0051','BK02007','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(89,'PJ0089','0056','BK02016','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(90,'PJ0090','0071','BK02001','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(91,'PJ0091','0072','BK02004','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(92,'PJ0092','0059','BK02002','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(93,'PJ0093','0074','BK02014','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(94,'PJ0094','0062','BK03001','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(95,'PJ0095','0052','BK03021','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(96,'PJ0096','0060','BK03014','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(97,'PJ0097','0050','BK02018','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(98,'PJ0098','0065','BK02020','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(99,'PJ0099','0075','BK02025','Di Kembalikan','2023-03-29',1,'2023-03-30','2023-03-29'),(100,'PJ00100','0071','BK02009','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(101,'PJ00101','0063','BK02014','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(102,'PJ00102','0051','BK02012','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(103,'PJ00103','0073','BK02023','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(104,'PJ00104','0075','BK02002','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(105,'PJ00105','0059','BK02006','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(106,'PJ00106','0057','BK02007','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(107,'PJ00107','0052','BK03014','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(108,'PJ00108','0086','BK02024','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(109,'PJ00109','0050','BK03019','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(110,'PJ00110','0069','BK02016','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(111,'PJ00111','0059','BK03005','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(112,'PJ00112','0062','BK03001','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(113,'PJ00113','0065','BK03007','Di Kembalikan','2023-03-30',1,'2023-03-31','2023-03-30'),(114,'PJ00114','0109','BK02004','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(115,'PJ00115','0108','BK02011','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(116,'PJ00116','0056','BK03026','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(117,'PJ00117','0055','BK04051','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(118,'PJ00118','0061','BK02007','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(119,'PJ00119','0064','BK02019','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(120,'PJ00120','0058','BK02014','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(121,'PJ00121','0059','BK02006','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(122,'PJ00122','0067','BK02001','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(123,'PJ00123','0074','BK02020','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(124,'PJ00124','0069','BK02002','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(125,'PJ00125','0068','BK02010','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(126,'PJ00126','0063','BK03030','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(127,'PJ00127','0073','BK03023','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(128,'PJ00128','0075','BK03008','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(129,'PJ00129','0052','BK02016','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(130,'PJ00130','0062','BK02023','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(131,'PJ00131','0065','BK02018','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(132,'PJ00132','0117','BK02024','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(136,'PJ00136','0104','BK02013','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(138,'PJ00138','0118','BK02015','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(139,'PJ00139','0057','BK03006','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(142,'PJ00142','0114','BK02021','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(143,'PJ00143','0116','BK02022','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(144,'PJ00144','0036','BK03007','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(145,'PJ00145','0112','BK02018','Di Kembalikan','2023-03-31',1,'2023-04-01','2023-03-31'),(146,'PJ00146','0020','BK04002','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(147,'PJ00147','0047','BK02002','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(148,'PJ00148','0038','BK02003','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(149,'PJ00149','0022','BK02006','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(150,'PJ00150','0110','BK02022','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(152,'PJ00152','0114','BK02017','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(155,'PJ00155','0109','BK03023','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(156,'PJ00156','0138','BK03006','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(157,'PJ00157','0103','BK03021','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(158,'PJ00158','0107','BK02011','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(159,'PJ00159','0105','BK02008','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(160,'PJ00160','0111','BK02001','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(161,'PJ00161','0087','BK02007','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(162,'PJ00162','0088','BK02018','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(163,'PJ00163','0098','BK03026','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(164,'PJ00164','0099','BK02021','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(165,'PJ00165','0096','BK03022','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(166,'PJ00166','0094','BK02025','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(167,'PJ00167','0093','BK02005','Di Kembalikan','2023-04-01',1,'2023-04-02','2023-04-01'),(168,'PJ00168','0120','BK02006','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(169,'PJ00169','0115','BK02020','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(170,'PJ00170','0109','BK03023','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(171,'PJ00171','0075','BK03007','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(172,'PJ00172','0073','BK03006','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(173,'PJ00173','0063','BK03005','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(174,'PJ00174','0069','BK03030','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(175,'PJ00175','0105','BK02002','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(176,'PJ00176','0111','BK02004','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(177,'PJ00177','0106','BK02010','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(178,'PJ00178','0117','BK02012','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(179,'PJ00179','0109','BK03034','Di Kembalikan','2023-04-03',1,'2023-04-04','2023-04-03'),(180,'PJ00180','0115','BK02015','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(181,'PJ00181','0120','BK05003','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(182,'PJ00182','0118','BK03026','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(183,'PJ00183','0035','BK06013','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(184,'PJ00184','0021','BK04040','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(185,'PJ00185','0041','BK04002','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(186,'PJ00186','0027','BK02010','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(187,'PJ00187','0043','BK02009','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(188,'PJ00188','0111','BK04063','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(189,'PJ00189','0023','BK04001','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(190,'PJ00190','0077','BK02007','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(191,'PJ00191','0101','BK02012','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(192,'PJ00192','0102','BK02004','Di Kembalikan','2023-04-04',1,'2023-04-05','2023-04-04'),(193,'PJ00193','0064','BK03027','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(194,'PJ00194','0074','BK02025','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(195,'PJ00195','0070','BK03020','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(196,'PJ00196','0059','BK03030','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(197,'PJ00197','0067','BK03029','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(198,'PJ00198','0054','BK03034','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(199,'PJ00199','0068','BK03023','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(200,'PJ00200','0109','BK03032','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(201,'PJ00201','0107','BK02001','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(202,'PJ00202','0106','BK02007','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(203,'PJ00203','0105','BK02006','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(204,'PJ00204','0111','BK02018','Di Kembalikan','2023-04-05',1,'2023-04-06','2023-04-05'),(205,'PJ00205','0115','BK02006','Di Kembalikan','2023-04-08',1,'2023-04-09','2023-04-08'),(206,'PJ00206','0094','BK02020','Di Kembalikan','2023-04-08',1,'2023-04-09','2023-04-08'),(207,'PJ00207','0087','BK02005','Di Kembalikan','2023-04-08',1,'2023-04-09','2023-04-08'),(208,'PJ00208','0088','BK03021','Di Kembalikan','2023-04-08',1,'2023-04-09','2023-04-08'),(209,'PJ00209','0099','BK02025','Di Kembalikan','2023-04-08',1,'2023-04-09','2023-04-08'),(210,'PJ00210','0097','BK02007','Di Kembalikan','2023-04-08',1,'2023-04-09','2023-04-08'),(211,'PJ00211','0091','BK02013','Di Kembalikan','2023-04-08',1,'2023-04-09','2023-04-08'),(212,'PJ00212','0075','BK03030','Di Kembalikan','2023-04-10',1,'2023-04-11','2023-04-10'),(213,'PJ00213','0058','BK03028','Di Kembalikan','2023-04-10',1,'2023-04-11','2023-04-10'),(214,'PJ00214','0064','BK03023','Di Kembalikan','2023-04-10',1,'2023-04-11','2023-04-10'),(215,'PJ00215','0040','BK02007','Di Kembalikan','2023-04-10',1,'2023-04-11','2023-04-10'),(216,'PJ00216','0120','BK02006','Di Kembalikan','2023-04-17',1,'2023-04-18','2023-04-17'),(217,'PJ00217','0119','BK03010','Di Kembalikan','2023-04-17',1,'2023-04-18','2023-04-17'),(218,'PJ00218','0110','BK02017','Di Kembalikan','2023-04-17',1,'2023-04-18','2023-04-17'),(219,'PJ00219','0116','BK02014','Di Kembalikan','2023-04-17',1,'2023-04-18','2023-04-17'),(220,'PJ00220','0103','BK03006','Di Kembalikan','2023-04-17',1,'2023-04-18','2023-04-17'),(221,'PJ00221','0108','BK02012','Di Kembalikan','2023-04-17',1,'2023-04-18','2023-04-17'),(222,'PJ00222','0105','BK02009','Di Kembalikan','2023-04-17',1,'2023-04-18','2023-04-17'),(223,'PJ00223','0114','BK02018','Di Kembalikan','2023-04-17',1,'2023-04-18','2023-04-17'),(224,'PJ00224','0104','BK02023','Di Kembalikan','2023-04-18',1,'2023-04-19','2023-04-18'),(225,'PJ00225','0115','BK06003','Di Kembalikan','2023-04-18',1,'2023-04-19','2023-04-18'),(226,'PJ00226','0113','BK03034','Di Kembalikan','2023-04-18',1,'2023-04-19','2023-04-18'),(227,'PJ00227','0110','BK03026','Di Kembalikan','2023-04-18',1,'2023-04-19','2023-04-18'),(228,'PJ00228','0119','BK03007','Di Kembalikan','2023-04-18',1,'2023-04-19','2023-04-18'),(229,'PJ00229','0118','BK03033','Di Kembalikan','2023-04-18',1,'2023-04-19','2023-04-18'),(230,'PJ00230','0083','BK03022','Di Kembalikan','2023-04-18',1,'2023-04-19','2023-04-18');
/*!40000 ALTER TABLE `tbl_pinjam` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pinjam_alat`
--

DROP TABLE IF EXISTS `tbl_pinjam_alat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pinjam_alat` (
  `id_pinjam` int(11) NOT NULL AUTO_INCREMENT,
  `pinjam_id` varchar(255) NOT NULL,
  `anggota_id` varchar(255) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int(11) NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) NOT NULL,
  PRIMARY KEY (`id_pinjam`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pinjam_alat`
--

LOCK TABLES `tbl_pinjam_alat` WRITE;
/*!40000 ALTER TABLE `tbl_pinjam_alat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_pinjam_alat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_pinjam_digital`
--

DROP TABLE IF EXISTS `tbl_pinjam_digital`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_pinjam_digital` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_siswa` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tgl_baca` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_pinjam_digital`
--

LOCK TABLES `tbl_pinjam_digital` WRITE;
/*!40000 ALTER TABLE `tbl_pinjam_digital` DISABLE KEYS */;
INSERT INTO `tbl_pinjam_digital` VALUES (1,18,1,'2023-04-17 10:09:01'),(2,18,3,'2023-04-17 10:17:51'),(3,18,4,'2023-04-17 10:18:07'),(4,18,1,'2023-04-17 10:21:12'),(5,18,4,'2023-04-17 10:22:37'),(6,18,4,'2023-04-17 10:28:09'),(7,18,4,'2023-04-17 10:29:21'),(8,18,4,'2023-04-17 10:29:38'),(9,18,4,'2023-04-17 10:31:20'),(10,18,4,'2023-04-17 10:32:54'),(11,18,4,'2023-04-17 10:33:25'),(12,18,1,'2023-04-17 10:37:47'),(13,18,1,'2023-04-17 10:41:57'),(14,18,4,'2023-04-17 10:42:04'),(15,18,4,'2023-04-17 10:43:05'),(16,18,4,'2023-04-17 10:43:47'),(17,18,4,'2023-04-17 10:44:35'),(18,18,4,'2023-04-17 10:45:13'),(19,18,4,'2023-04-17 10:52:17'),(20,18,4,'2023-04-17 10:57:06'),(21,18,1,'2023-04-17 10:59:25'),(22,59,1,'2023-04-18 08:43:50'),(23,18,7,'2023-04-27 09:47:30');
/*!40000 ALTER TABLE `tbl_pinjam_digital` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_rak`
--

DROP TABLE IF EXISTS `tbl_rak`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_rak` (
  `id_rak` int(11) NOT NULL AUTO_INCREMENT,
  `nama_rak` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rak`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_rak`
--

LOCK TABLES `tbl_rak` WRITE;
/*!40000 ALTER TABLE `tbl_rak` DISABLE KEYS */;
INSERT INTO `tbl_rak` VALUES (1,'Rak Buku 1'),(4,'Rak Buku 2'),(5,'Rak Buku 3'),(6,'Rak Buku 4'),(7,'Rak Buku 5'),(8,'Rak Buku 6'),(9,'Rak Buku 7'),(10,'Rak Buku 8'),(11,'Rak Buku 9'),(12,'Rak Buku 10'),(13,'Rak Buku 11');
/*!40000 ALTER TABLE `tbl_rak` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_siswa`
--

DROP TABLE IF EXISTS `tbl_siswa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_siswa` (
  `id_siswa` int(11) NOT NULL AUTO_INCREMENT,
  `kode_anggota` varchar(20) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `jenkel` varchar(255) NOT NULL,
  `tgl_bergabung` varchar(255) NOT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `nis` (`kode_anggota`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_siswa`
--

LOCK TABLES `tbl_siswa` WRITE;
/*!40000 ALTER TABLE `tbl_siswa` DISABLE KEYS */;
INSERT INTO `tbl_siswa` VALUES (13,'0002','Winda','Perempuan','2023-03-21'),(14,'0003','Syifa','Perempuan','2023-03-21'),(15,'0004','Dona','Perempuan','2023-03-21'),(17,'0005','Wina','Perempuan','2023-03-21'),(18,'0001','Ego','Laki-laki','2023-03-21'),(19,'0006','AZKA AUFA MUSYAFA','Laki-Laki','2023-03-24'),(20,'0007','DITA FERYANA DEWI','Perempuan','2023-03-24'),(21,'0008','EVITA NURHALIZA ARTIFA','Perempuan','2023-03-24'),(22,'0009','FADHIL AMIN','Laki-Laki','2023-03-24'),(23,'0010','HAIFA SHOBRINA','Perempuan','2023-03-24'),(24,'0011','KHUNIZA ALFIANAH','Perempuan','2023-03-24'),(25,'0012','M. MISBAHUSHUDURI','Laki-laki','2023-03-24'),(26,'0013','NIKE AYU RAMADHANI','Perempuan','2023-03-24'),(27,'0014','NISFIA SAYLA APRILIANA','Perempuan','2023-03-24'),(28,'0015','NOVAN AEBEN SETIAWAN','Laki-Laki','2023-03-24'),(29,'0016','RAFA ZIKRI SYAHPUTRA','Laki-Laki','2023-03-24'),(30,'0017','VIVIAN PUTRI SABRINA','Perempuan','2023-03-24'),(31,'0018','ADE VIKA FITRIANA','Perempuan','2023-03-24'),(32,'0019','ADIT SAPUTRA','Laki-Laki','2023-03-24'),(33,'0020','ALIYACH SULISTIA WATI','Perempuan','2023-03-24'),(34,'0021','ANNISA LUTFIATI','Perempuan','2023-03-24'),(35,'0022','ASYA SAHRISYAH','Perempuan','2023-03-24'),(36,'0023','DWI SEPTIANIGSIH','Perempuan','2023-03-24'),(37,'0024','FADILLAH RAMADHANI','Perempuan','2023-03-24'),(38,'0025','FARAHDINA AULIYA FITRI','Perempuan','2023-03-24'),(39,'0026','FINO MEI DWI PURNOMO','Laki-Laki','2023-03-24'),(40,'0027','GINA MAULIDAH','Perempuan','2023-03-24'),(41,'0028','IBAS MAULANA IBRAHIM','Laki-Laki','2023-03-24'),(42,'0029','ILHAM DWI AJI SAPUTRA','Laki-Laki','2023-03-24'),(43,'0030','LIYANA ROMAEDI','Perempuan','2023-03-24'),(44,'0031','M. ARYA FIZAN PRATAMA','Laki-Laki','2023-03-24'),(45,'0032','M. NUR RAMADHONI','Laki-Laki','2023-03-24'),(46,'0033','M. ZIDAN PRATAMA','Laki-Laki','2023-03-24'),(47,'0034','MOH. DIKI SETIYAWAN','Laki-Laki','2023-03-24'),(48,'0035','MOHAMMAD NAIZAR SHAFI','Laki-Laki','2023-03-24'),(49,'0036','MUHAMMAD ABDUL MUBAROK','Laki-Laki','2023-03-24'),(50,'0037','MUHAMMAD FITZAL ASFA. M','Laki-Laki','2023-03-24'),(51,'0038','NABILA DWI AULIA','Perempuan','2023-03-24'),(52,'0039','NISFATUL AISYAH ATSANI','Perempuan','2023-03-24'),(53,'0040','PUTRI AFIKA SARI','Perempuan','2023-03-24'),(54,'0041','RINDIYANI PUTRI','Perempuan','2023-03-24'),(55,'0042','SHIFA KHAERUN NADA','Perempuan','2023-03-24'),(56,'0043','SITI NUR AZIZAH','Perempuan','2023-03-24'),(57,'0044','SITI NURFAUZIAH','Perempuan','2023-03-24'),(58,'0045','TRI SEPTI ANGGREINI','Perempuan','2023-03-24'),(59,'0046','WILDAN DZIKRI ABDILLAH','Laki-Laki','2023-03-24'),(60,'0047','WINDA RIZKI ZAKIYAH','Perempuan','2023-03-24'),(61,'0048','ZAHROTUS SALAMAH','Perempuan','2023-03-24'),(62,'0049','ZILVIANA LUTFI','Perempuan','2023-03-24'),(63,'0050','ADAM KURNIAWAN','Laki-Laki','2023-03-25'),(64,'0051','AFIKA NUR AMALIA','Perempuan','2023-03-25'),(65,'0052','AHMAD RIYANTO','Laki-Laki','2023-03-25'),(66,'0053','AHMAD RIYANTO','Laki-Laki','2023-03-25'),(67,'0054','AMELIA PUTRI SA\'BANI','Perempuan','2023-03-25'),(68,'0055','DEVI AZARIA','Perempuan','2023-03-25'),(69,'0056','ERLANGGA YUSUF W.','Laki-laki','2023-03-25'),(70,'0057','FAQIH FARIS SAPUTRA','Laki-Laki','2023-03-25'),(71,'0058','FRISKA YUSTIANA AQILLAH','Perempuan','2023-03-25'),(72,'0059','ISTI QOMAH','Perempuan','2023-03-25'),(73,'0060','M. SYAFIQ RAMADHAN','Laki-Laki','2023-03-25'),(74,'0061','MASRUROH SEPTYANI','Perempuan','2023-03-25'),(75,'0062','MUKHAMMAD AREL SAPUTRA','Laki-Laki','2023-03-25'),(76,'0063','NABILA DWI RAMADHANI','Perempuan','2023-03-25'),(77,'0064','NADIA PRIMADIFA','Perempuan','2023-03-25'),(78,'0065','RADITYA IBROHIM','Laki-Laki','2023-03-25'),(79,'0066','REFHAN MAULID MAWARDI','Laki-Laki','2023-03-25'),(80,'0067','REVANIKA ANGGREANY','Perempuan','2023-03-25'),(81,'0068','SAFANA MAULIDIA','Perempuan','2023-03-25'),(82,'0069','SALWA RIZQI AFIAH','Perempuan','2023-03-25'),(83,'0070','SHELMA ASY SYIFA','Perempuan','2023-03-25'),(84,'0071','SYABILLAH','Perempuan','2023-03-25'),(85,'0072','TASYA HIKMATUL AZIZAH','Perempuan','2023-03-25'),(86,'0073','ZAHWA NAURAH AZALIA','Perempuan','2023-03-25'),(87,'0074','ZELTIA PUTRI ABIDIN','Perempuan','2023-03-25'),(88,'0075','RILA ASTRIANI','Perempuan','2023-03-25'),(89,'0076','ABDUL AZIZ ISLAMADINAH','Laki-Laki','2023-03-25'),(90,'0077','ADE PUJI LESTARI','Perempuan','2023-03-25'),(91,'0078','AFANIA NAJATI','Perempuan','2023-03-25'),(92,'0079','AINUNKHASANAH','Perempuan','2023-03-25'),(93,'0080','AKHMAD FAKHRI MAULANA','Perempuan','2023-03-25'),(94,'0081','AKHMAD HAFIDZ AMARDAN','Laki-laki','2023-03-25'),(95,'0082','ASARO NUR MAULIDA','Perempuan','2023-03-25'),(96,'0083','CHELSA DWI ARTANTY','Perempuan','2023-03-25'),(97,'0084','DWI TEGAR SAPUTRA','Laki-Laki','2023-03-25'),(98,'0085','KAILA SARIFAH RAMADINI','Perempuan','2023-03-25'),(99,'0086','LAELATUL FITRI RAMADANI','Perempuan','2023-03-25'),(100,'0087','MA\'RIFATIN ALIYA','Perempuan','2023-03-25'),(101,'0088','MISBAKHUL RAMADAN','Laki-Laki','2023-03-25'),(102,'0089','MOH. DIMAS KHOERUL ADITYA','Laki-Laki','2023-03-25'),(103,'0090','MOH. NOVAL DWI SAPUTRA','Laki-Laki','2023-03-25'),(104,'0091','MUHAMMAD AZKA ARDILLAH','Laki-Laki','2023-03-25'),(105,'0092','MUKHAMMAD SULTAN SYAHRIR','Laki-Laki','2023-03-25'),(106,'0093','NAILA MUZARO ULFA','Perempuan','2023-03-25'),(107,'0094','RAFI ARSYIL ANAFIS','Laki-Laki','2023-03-25'),(108,'0095','REZA SAPUTRA','Laki-Laki','2023-03-25'),(109,'0096','RIA AMALIA ','Perempuan','2023-03-25'),(110,'0097','SALVA KURNIASIH','Perempuan','2023-03-25'),(111,'0098','SEPTIANI DWI ARDITA','Perempuan','2023-03-25'),(112,'0099','SINGGIH PRASETIO KESUMA','Laki-Laki','2023-03-25'),(113,'0100','WAHYU ADHI PERMANA','Laki-Laki','2023-03-25'),(114,'0101','WINDA APRIL RIYANA','Perempuan','2023-03-25'),(115,'0102','WINDI APRIL RIYANA','Perempuan','2023-03-25'),(116,'0103','ADITYA RIFQI HAMIZAN','Laki-Laki','2023-03-25'),(117,'0104','AHMAD HANIF BAIHAQI','Laki-Laki','2023-03-25'),(118,'0105','ALVINA DWI PUTRI','Perempuan','2023-03-25'),(119,'0106','APRIL NAJAH ASY\'AHBIYAH','Perempuan','2023-03-25'),(120,'0107','AQILA AGISTARI','Perempuan','2023-03-25'),(121,'0108','AULIA IZZATUNNISA','Perempuan','2023-03-25'),(122,'0109','CAHYA FATKHURIZQIYAH','Perempuan','2023-03-25'),(123,'0110','FATHAN AL MAISAN ZHAFAR','Laki-Laki','2023-03-25'),(124,'0111','LASMA SAPITRI','Perempuan','2023-03-25'),(125,'0112','M. ANANDA FAKHRUR R.','Laki-laki','2023-03-25'),(126,'0113','M. AS\'ADUN NAJIB','Laki-laki','2023-03-25'),(127,'0114','M. HAMDANI SAPUTRA','Laki-laki','2023-03-25'),(128,'0115','M. AQIL HIRZI RIZQI N.','Laki-laki','2023-03-25'),(129,'0116','M. AMIRUL MU\'MININ','Laki-laki','2023-03-25'),(130,'0117','NISFATUL MAGHFIROH','Perempuan','2023-03-25'),(131,'0118','RAYYAN HAMDI RAHAGI','Laki-Laki','2023-03-25'),(132,'0119','ROMADHONI','Laki-Laki','2023-03-25'),(133,'0120','ZAFFRAN MAULANA','Laki-Laki','2023-03-25'),(134,'0121','AISYAH AMBAR. M','Perempuan','2023-03-25'),(135,'0122','DAFINA ALVIAN. M','Perempuan','2023-03-25'),(136,'0123','DINDA FEBRIANA. P','Perempuan','2023-03-25'),(137,'0124','FARKHAN JANUAREZA','Laki-Laki','2023-03-25'),(138,'0125','FATIHATUL RISKIYAH','Perempuan','2023-03-25'),(139,'0126','FINA KHASANAH','Perempuan','2023-03-25'),(140,'0127','HAMDANI PRATAMA','Laki-Laki','2023-03-25'),(141,'0128','KIRANA IDURA. A','Perempuan','2023-03-25'),(142,'0129','KEISHA AQILA. Z','Perempuan','2023-03-25'),(143,'0130','MOH. KENZU. R','Laki-Laki','2023-03-25'),(144,'0131','MUH. RAFFA AZKA','Laki-Laki','2023-03-25'),(145,'0132','RAHMAH NUR. K','Perempuan','2023-03-25'),(146,'0133','RIFAL ARSYA. R','Laki-Laki','2023-03-25'),(147,'0134','SYEKH MAULANA. I','Laki-Laki','2023-03-25'),(148,'0135','TIARA FAHRANI','Perempuan','2023-03-25'),(149,'0136','VALENA. K','Perempuan','2023-03-25'),(150,'0137','M. ROMADONI','Laki-Laki','2023-03-25'),(151,'0138','Kartu Sementara','Laki-Laki','2023-03-30');
/*!40000 ALTER TABLE `tbl_siswa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping routines for database 'perpus_db'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-05-03  9:00:01
