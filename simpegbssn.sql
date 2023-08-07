-- MariaDB dump 10.19  Distrib 10.4.24-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: simpegbssn
-- ------------------------------------------------------
-- Server version	10.4.24-MariaDB

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
-- Table structure for table `tb_dokter`
--

DROP TABLE IF EXISTS `tb_dokter`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_dokter` (
  `id_pegawai` varchar(80) NOT NULL,
  `nama_pegawai` varchar(30) NOT NULL,
  `golongan` varchar(30) NOT NULL,
  `Jabatan` text NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_pegawai`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_dokter`
--

LOCK TABLES `tb_dokter` WRITE;
/*!40000 ALTER TABLE `tb_dokter` DISABLE KEYS */;
INSERT INTO `tb_dokter` VALUES ('1e805d34-15e8-48ef-ad75-21dc59930c07','Dr. Charles Lim','IV/d','Wakil Kepala BSSN','086576754786'),('557d7c53-434e-4702-bae1-462c2ba45637','Rudolf Sihombing, M.pd','IV/a','Sekretaris Utama BSSN','08888476721');
/*!40000 ALTER TABLE `tb_dokter` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_obat`
--

DROP TABLE IF EXISTS `tb_obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_obat` (
  `id_obat` varchar(50) NOT NULL,
  `nama_obat` varchar(200) NOT NULL,
  `ket_obat` text NOT NULL,
  PRIMARY KEY (`id_obat`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_obat`
--

LOCK TABLES `tb_obat` WRITE;
/*!40000 ALTER TABLE `tb_obat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_pasien`
--

DROP TABLE IF EXISTS `tb_pasien`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_pasien` (
  `id_taruna` varchar(50) NOT NULL,
  `nomor_indentitas` varchar(30) NOT NULL,
  `nama_taruna` varchar(80) NOT NULL,
  `jenis_kelamin` enum('L','P') NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  PRIMARY KEY (`id_taruna`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_pasien`
--

LOCK TABLES `tb_pasien` WRITE;
/*!40000 ALTER TABLE `tb_pasien` DISABLE KEYS */;
INSERT INTO `tb_pasien` VALUES ('22327d5e-b8d6-4360-aee3-7e9592f7ecbe','1342346','Yudi','L','3'),('35169ab2-d94d-4a21-914e-65aba77060fa','201712343','Zaki','L','4'),('49865793-cde2-4d99-ac1b-13d72081893f','2342342','Harun','L','2'),('4f3168fb-0aba-4051-9bec-0029ad5cb095','201712341','Yani Sapitri','P','4'),('c9c2f872-fe25-4a89-a5fe-7cdfe97ab5d4','1345345','Yuni','P','2'),('ce901f74-0cf1-45a2-820f-7d81aabc2f94','201712342','Rizki','L','1'),('e34c588f-dd8d-41dd-b8cc-92c87cb4d785','123453312','Sunsun','L','34232413413');
/*!40000 ALTER TABLE `tb_pasien` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_poliklinik`
--

DROP TABLE IF EXISTS `tb_poliklinik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_poliklinik` (
  `id_kantor` varchar(50) NOT NULL,
  `nama_kantor` varchar(50) NOT NULL,
  `jumlah_pegawai` int(50) NOT NULL,
  PRIMARY KEY (`id_kantor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_poliklinik`
--

LOCK TABLES `tb_poliklinik` WRITE;
/*!40000 ALTER TABLE `tb_poliklinik` DISABLE KEYS */;
INSERT INTO `tb_poliklinik` VALUES ('1fe93eb0-e9f0-435b-926d-f3896b158f6f','BSSN Sawangan',700),('4d66717b-a7f2-4556-b008-d41c9ce0aa79','BSSN Ragunan',200),('a976bacc-a6e5-44b0-b29a-962912b281ac','Politeknik SSN',400);
/*!40000 ALTER TABLE `tb_poliklinik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_rekammedis`
--

DROP TABLE IF EXISTS `tb_rekammedis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_rekammedis` (
  `id_rm` varchar(50) NOT NULL,
  `id_dokter` varchar(50) NOT NULL,
  `diagnosa` varchar(50) NOT NULL,
  `id_poli` varchar(50) NOT NULL,
  `obat` int(11) NOT NULL,
  PRIMARY KEY (`id_rm`),
  KEY `id_poli` (`id_poli`),
  KEY `tb_rekammedis_ibfk_2` (`id_dokter`),
  CONSTRAINT `tb_rekammedis_ibfk_2` FOREIGN KEY (`id_dokter`) REFERENCES `tb_dokter` (`id_pegawai`),
  CONSTRAINT `tb_rekammedis_ibfk_3` FOREIGN KEY (`id_poli`) REFERENCES `tb_poliklinik` (`id_kantor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rekammedis`
--

LOCK TABLES `tb_rekammedis` WRITE;
/*!40000 ALTER TABLE `tb_rekammedis` DISABLE KEYS */;
INSERT INTO `tb_rekammedis` VALUES ('65cbc77d-3322-4114-90da-39b1defb9243','1e805d34-15e8-48ef-ad75-21dc59930c07','','a976bacc-a6e5-44b0-b29a-962912b281ac',4),('ae42b25d-9549-49f7-b350-585c4a31003f','557d7c53-434e-4702-bae1-462c2ba45637','','a976bacc-a6e5-44b0-b29a-962912b281ac',1),('e7fea9dd-41df-47a5-aebb-0d13626f2565','557d7c53-434e-4702-bae1-462c2ba45637','','a976bacc-a6e5-44b0-b29a-962912b281ac',5000000);
/*!40000 ALTER TABLE `tb_rekammedis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_rm_obat`
--

DROP TABLE IF EXISTS `tb_rm_obat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_rm_obat` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `id_rm` varchar(50) NOT NULL,
  `id_obat` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_rm` (`id_rm`),
  KEY `id_obat` (`id_obat`),
  CONSTRAINT `tb_rm_obat_ibfk_1` FOREIGN KEY (`id_rm`) REFERENCES `tb_rekammedis` (`id_rm`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tb_rm_obat_ibfk_2` FOREIGN KEY (`id_obat`) REFERENCES `tb_obat` (`id_obat`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_rm_obat`
--

LOCK TABLES `tb_rm_obat` WRITE;
/*!40000 ALTER TABLE `tb_rm_obat` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_rm_obat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_user`
--

DROP TABLE IF EXISTS `tb_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(50) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` enum('1','2','3','4','5') NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_user`
--

LOCK TABLES `tb_user` WRITE;
/*!40000 ALTER TABLE `tb_user` DISABLE KEYS */;
INSERT INTO `tb_user` VALUES (3,'akun super','super','8451ba8a14d79753d34cb33b51ba46b4b025eb81','1'),(4,'akun hrd','hrd','9d2878abdd504d16fe6262f17c80dae5cec34440','2'),(5,'akun apoteker','apoteker','8e30c3e6d50e5d7c02e7eaffa5954b04d4a3afaf','3'),(6,'akun admin','admin','d033e22ae348aeb5660fc2140aec35850c4da997','4'),(7,'akun registrasi','regis','c2bf536a10d9f2530c38e4e8da517718be8c39ce','5');
/*!40000 ALTER TABLE `tb_user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-08-07 21:54:02
