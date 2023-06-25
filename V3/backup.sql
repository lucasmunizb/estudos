-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: psicamila
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.22.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tbcliente`
--

DROP TABLE IF EXISTS `tbcliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbcliente` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) NOT NULL,
  `idade` int NOT NULL,
  `email` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tbcliente_nome_index` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbcliente`
--

LOCK TABLES `tbcliente` WRITE;
/*!40000 ALTER TABLE `tbcliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbcliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblogcliente`
--

DROP TABLE IF EXISTS `tblogcliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblogcliente` (
  `id` int NOT NULL,
  `id_objeto` int NOT NULL,
  `nome_campo` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `nome_campo_tela` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `valor_anterior` varchar(500) COLLATE utf8mb4_bin DEFAULT NULL,
  `valor_posterior` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `data_alteracao` date DEFAULT NULL,
  `hora_alteracao` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tblogcliente_data_alteracao_index` (`data_alteracao`),
  KEY `tblogcliente_id_objeto_index` (`id_objeto`),
  KEY `tblogcliente_nome_campo_index` (`nome_campo`),
  KEY `tblogcliente_nome_campo_tela_index` (`nome_campo_tela`),
  KEY `tblogcliente_valor_posterior_index` (`valor_posterior`),
  CONSTRAINT `tblogcliente_tbcliente_id_fk` FOREIGN KEY (`id_objeto`) REFERENCES `tbcliente` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblogcliente`
--

LOCK TABLES `tblogcliente` WRITE;
/*!40000 ALTER TABLE `tblogcliente` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblogcliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tblogusuario`
--

DROP TABLE IF EXISTS `tblogusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tblogusuario` (
  `id` int NOT NULL,
  `id_objeto` int NOT NULL,
  `nome_campo` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `nome_campo_tela` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `valor_anterior` varchar(500) COLLATE utf8mb4_bin DEFAULT NULL,
  `valor_posterior` varchar(500) COLLATE utf8mb4_bin NOT NULL,
  `data_alteracao` date DEFAULT NULL,
  `hora_alteracao` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tblogusuario_data_alteracao_index` (`data_alteracao`),
  KEY `tblogusuario_id_objeto_index` (`id_objeto`),
  KEY `tblogusuario_nome_campo_index` (`nome_campo`),
  KEY `tblogusuario_nome_campo_tela_index` (`nome_campo_tela`),
  KEY `tblogusuario_valor_posterior_index` (`valor_posterior`),
  CONSTRAINT `tblogusuario_tbusuario_id_fk` FOREIGN KEY (`id_objeto`) REFERENCES `tbusuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tblogusuario`
--

LOCK TABLES `tblogusuario` WRITE;
/*!40000 ALTER TABLE `tblogusuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `tblogusuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbusuario`
--

DROP TABLE IF EXISTS `tbusuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbusuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `usuario` varchar(45) DEFAULT NULL,
  `senha` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario_UNIQUE` (`usuario`),
  KEY `INDEX` (`usuario`,`nome`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbusuario`
--

LOCK TABLES `tbusuario` WRITE;
/*!40000 ALTER TABLE `tbusuario` DISABLE KEYS */;
INSERT INTO `tbusuario` VALUES (1,'admin','Lucas','123456');
/*!40000 ALTER TABLE `tbusuario` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-26  0:14:36
