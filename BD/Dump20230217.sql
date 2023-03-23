-- MySQL dump 10.13  Distrib 8.0.32, for Linux (x86_64)
--
-- Host: localhost    Database: osteste
-- ------------------------------------------------------
-- Server version	8.0.32-0ubuntu0.20.04.2

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `tb_Itens_venda`
--

DROP TABLE IF EXISTS `tb_Itens_venda`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_Itens_venda` (
  `ItensID` int NOT NULL AUTO_INCREMENT,
  `ItensSubTotal` decimal(10,2) NOT NULL,
  `ItensQtd` decimal(10,2) NOT NULL,
  `ItensVendaID` int NOT NULL,
  `ItensProdID` int NOT NULL,
  `ItensEmpID` int NOT NULL,
  PRIMARY KEY (`ItensID`),
  KEY `fk_tb_Itens_venda_1_idx` (`ItensVendaID`),
  KEY `fk_tb_Itens_venda_2_idx` (`ItensProdID`),
  KEY `fk_tb_Itens_venda_3_idx` (`ItensEmpID`),
  CONSTRAINT `fk_tb_Itens_venda_1` FOREIGN KEY (`ItensVendaID`) REFERENCES `tb_vendas` (`VendaID`),
  CONSTRAINT `fk_tb_Itens_venda_2` FOREIGN KEY (`ItensProdID`) REFERENCES `tb_produto` (`ProdID`),
  CONSTRAINT `fk_tb_Itens_venda_3` FOREIGN KEY (`ItensEmpID`) REFERENCES `tb_empresa` (`EmpID`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_Itens_venda`
--

LOCK TABLES `tb_Itens_venda` WRITE;
/*!40000 ALTER TABLE `tb_Itens_venda` DISABLE KEYS */;
INSERT INTO `tb_Itens_venda` VALUES (29,200.00,1.00,25,6,18),(34,20.00,1.00,29,7,10),(35,20.00,2.00,32,2,10),(36,42.00,1.00,34,19,20);
/*!40000 ALTER TABLE `tb_Itens_venda` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_alocar`
--

DROP TABLE IF EXISTS `tb_alocar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_alocar` (
  `id` int NOT NULL AUTO_INCREMENT,
  `situacao` smallint NOT NULL,
  `data_alocacao` date NOT NULL,
  `data_remocao` date DEFAULT NULL,
  `equipamento_id` int NOT NULL,
  `setor_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_alocar_tb_setor1_idx` (`setor_id`),
  KEY `fk_tb_alocar_tb_equipamento1_idx` (`equipamento_id`),
  CONSTRAINT `fk_tb_alocar_tb_equipamento1` FOREIGN KEY (`equipamento_id`) REFERENCES `tb_equipamento` (`id`),
  CONSTRAINT `fk_tb_alocar_tb_setor1` FOREIGN KEY (`setor_id`) REFERENCES `tb_setor` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_alocar`
--

LOCK TABLES `tb_alocar` WRITE;
/*!40000 ALTER TABLE `tb_alocar` DISABLE KEYS */;
INSERT INTO `tb_alocar` VALUES (17,1,'2022-09-30',NULL,4,1),(18,2,'2022-12-27','2023-02-10',7,1),(19,2,'2022-12-30','2023-02-06',9,1),(20,1,'2022-12-30',NULL,6,1),(21,2,'2023-02-06','2023-02-06',11,15),(23,2,'2023-02-06','2023-02-06',12,10),(24,2,'2023-02-06','2023-02-06',11,1),(25,2,'2023-02-06','2023-02-06',12,15),(26,2,'2023-02-06','2023-02-06',11,15),(27,2,'2023-02-06','2023-02-06',11,31),(28,2,'2023-02-06','2023-02-10',9,15),(29,2,'2023-02-06','2023-02-06',11,1),(30,2,'2023-02-07','2023-02-07',12,1),(31,1,'2023-02-07',NULL,12,10),(32,1,'2023-02-07',NULL,11,31),(33,2,'2023-02-08','2023-02-10',13,1),(34,2,'2023-02-09',NULL,15,33),(35,1,'2023-02-09',NULL,15,33),(36,1,'2023-02-09',NULL,14,33),(37,1,'2023-02-09',NULL,16,33),(38,1,'2023-02-10',NULL,17,33),(39,3,'2023-02-10',NULL,18,33),(40,3,'2023-02-10',NULL,19,33),(41,3,'2023-02-10','2023-02-10',7,33),(42,3,'2023-02-10',NULL,7,33),(43,1,'2023-02-10',NULL,13,34),(44,1,'2023-02-10',NULL,9,31);
/*!40000 ALTER TABLE `tb_alocar` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_anexo`
--

DROP TABLE IF EXISTS `tb_anexo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_anexo` (
  `AnxID` int NOT NULL AUTO_INCREMENT,
  `AnxNome` varchar(45) DEFAULT NULL,
  `AnxUrl` varchar(100) DEFAULT NULL,
  `AnxPath` varchar(100) DEFAULT NULL,
  `AnxOsID` int NOT NULL,
  `AnxUserID` int NOT NULL,
  `AnxEmpID` int NOT NULL,
  PRIMARY KEY (`AnxID`),
  KEY `fk_tb_anexo_1_idx` (`AnxUserID`),
  KEY `fk_tb_anexo_2_idx` (`AnxEmpID`),
  CONSTRAINT `fk_tb_anexo_1` FOREIGN KEY (`AnxUserID`) REFERENCES `tb_usuario` (`id`),
  CONSTRAINT `fk_tb_anexo_2` FOREIGN KEY (`AnxEmpID`) REFERENCES `tb_empresa` (`EmpID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_anexo`
--

LOCK TABLES `tb_anexo` WRITE;
/*!40000 ALTER TABLE `tb_anexo` DISABLE KEYS */;
INSERT INTO `tb_anexo` VALUES (18,'dsfsdfds','logo.jpeg','arquivos/632614f6e91d1.jpeg',22,6,10);
/*!40000 ALTER TABLE `tb_anexo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_chamado`
--

DROP TABLE IF EXISTS `tb_chamado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_chamado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `data_abertura` datetime NOT NULL,
  `descricao_problema` varchar(500) NOT NULL,
  `data_atendimento` datetime DEFAULT NULL,
  `data_encerramento` datetime DEFAULT NULL,
  `laudo_tecnico` varchar(500) DEFAULT NULL,
  `funcionario_id` int NOT NULL,
  `tecnico_atendimento` int DEFAULT NULL,
  `tecnico_encerramento` int DEFAULT NULL,
  `alocar_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_chamado_tb_funcionario1_idx` (`funcionario_id`),
  KEY `fk_tb_chamado_tb_tecnico1_idx` (`tecnico_atendimento`),
  KEY `fk_tb_chamado_tb_tecnico2_idx` (`tecnico_encerramento`),
  KEY `fk_tb_chamado_1_idx` (`alocar_id`),
  CONSTRAINT `fk_tb_chamado_1` FOREIGN KEY (`alocar_id`) REFERENCES `tb_alocar` (`id`),
  CONSTRAINT `fk_tb_chamado_tb_funcionario1` FOREIGN KEY (`funcionario_id`) REFERENCES `tb_funcionario` (`funcionario_id`),
  CONSTRAINT `fk_tb_chamado_tb_tecnico1` FOREIGN KEY (`tecnico_atendimento`) REFERENCES `tb_tecnico` (`tecnico_id`),
  CONSTRAINT `fk_tb_chamado_tb_tecnico2` FOREIGN KEY (`tecnico_encerramento`) REFERENCES `tb_tecnico` (`tecnico_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_chamado`
--

LOCK TABLES `tb_chamado` WRITE;
/*!40000 ALTER TABLE `tb_chamado` DISABLE KEYS */;
INSERT INTO `tb_chamado` VALUES (1,'2022-12-28 00:00:00','teasdas','2023-02-09 07:54:00','2023-02-09 07:54:00','teste',31,32,38,18),(2,'2022-12-28 00:00:00','Em Concerto','2023-02-09 08:36:07','2023-02-09 13:16:42','',31,32,30,17),(8,'2023-02-07 00:00:00','Novo CHamado criado','2023-02-09 13:18:31','2023-02-09 13:18:47','',37,32,30,20),(9,'2023-02-07 00:00:00','Preciso que seja realizado um ajuste no meu Monitor que esta com problemas para ligar.','2023-02-09 13:20:43','2023-02-09 13:21:14','Não foi encontrado problema no aparelho.',20,32,30,32),(10,'2023-02-08 12:14:02','Chamado para o tecnico','2023-02-09 14:34:37','2023-02-09 14:34:50','FInalizado com sucesso \"\"asdasdasdasdas',39,32,32,33),(11,'2023-02-09 12:00:22','PEdro solicita ajuste no teclado que esta com BO','2023-02-09 12:00:45','2023-02-09 13:12:29','',40,32,30,31),(12,'2023-02-09 13:54:46','Cadeira Gammer esta com problemas, preciso de ajustes','2023-02-09 13:55:05','2023-02-09 13:56:08','Pedro, precisa levntar para poder fazer o ajustes, asidpoadopdposaipodiaspod pasidpaidp oas idpoasid poasi poasp ipodasipodipaosdpipipoiapsd oipoaidpoaidpoasidpo poiapodipaodiposad ipoaidpoaidp',40,32,32,34),(13,'2023-02-09 14:18:52','Novamente com problemas','2023-02-09 14:19:07','2023-02-09 14:19:26','Precisamos analisar melhor adasdasdad\"sdasdas',40,32,32,35),(14,'2023-02-09 14:37:03','asdasdsadasdasdasdasdasdasd','2023-02-09 14:37:11','2023-02-09 14:37:31','Finalizado com testes  asdasdasdas',40,32,32,36),(15,'2023-02-09 15:01:41','dadsadsadsadsadsad','2023-02-09 15:03:11','2023-02-10 10:37:44','Testado e ajustado',40,32,32,37),(16,'2023-02-10 07:56:47','asdasdadasdas','2023-02-10 10:54:43','2023-02-10 10:54:50','Finalizado',40,32,32,38),(17,'2023-02-10 07:58:09','dddddd','2023-02-10 10:54:53','2023-02-10 10:55:00','finalizado',40,32,32,39),(18,'2023-02-10 08:16:50','bbbbbbbbbbbbbbbbbbbbbb','2023-02-10 10:38:24','2023-02-10 10:54:31','Finalizado teste',40,32,32,40),(19,'2023-02-10 10:43:37','Analisar o laudo vazio','2023-02-10 10:44:09','2023-02-10 10:54:41','finalizado',40,32,32,41),(20,'2023-02-10 10:55:54','Vamos testar o laudo','2023-02-10 10:56:36','2023-02-10 11:04:38','Laudo finalizado para testarmos como ficou as aspas',40,32,32,42),(21,'2023-02-10 11:18:04','Mouse alocado para o setor Novo','2023-02-10 11:24:23','2023-02-10 11:27:16','Mouse devolvido onde foi ajustado',37,32,32,43),(22,'2023-02-10 11:28:54','Abertou chamado','2023-02-10 11:29:05','2023-02-10 11:29:18','Encerrado novamente',37,32,32,43),(23,'2023-02-10 11:35:43','analisar o equipamento','2023-02-10 11:37:08','2023-02-10 11:38:01','Aqui estou encerrando o chamado onde foi realizado o ajuste',40,32,32,42),(24,'2023-02-10 11:35:58','Ajustar o mouse',NULL,NULL,NULL,40,NULL,NULL,39),(25,'2023-02-10 12:09:21','dadasdasdasdsa','2023-02-10 13:21:06',NULL,NULL,40,32,NULL,41),(26,'2023-02-10 12:15:07','Carregando','2023-02-10 13:20:46','2023-02-10 13:20:55','Cadadasdasrersarasras',40,32,32,42),(27,'2023-02-10 12:18:42','Chamado aberto para testar o reload','2023-02-10 13:19:40','2023-02-10 13:20:19','Realizado o ajuste no campo para tratamentos',40,32,32,36),(28,'2023-02-10 16:51:04','asdasdasdasd',NULL,NULL,NULL,40,NULL,NULL,40),(29,'2023-02-14 12:48:35','tgeste','2023-02-14 12:52:57',NULL,NULL,40,32,NULL,42);
/*!40000 ALTER TABLE `tb_chamado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cidade`
--

DROP TABLE IF EXISTS `tb_cidade`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cidade` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_cidade` varchar(45) NOT NULL,
  `estado_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_cidade_tb_estado1_idx` (`estado_id`),
  CONSTRAINT `fk_tb_cidade_tb_estado1` FOREIGN KEY (`estado_id`) REFERENCES `tb_estado` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cidade`
--

LOCK TABLES `tb_cidade` WRITE;
/*!40000 ALTER TABLE `tb_cidade` DISABLE KEYS */;
INSERT INTO `tb_cidade` VALUES (6,'Londrina',1),(7,'teste',1),(8,'Jacarezinho',1),(9,'Andirá',1),(10,'Cambará',1),(11,'Ibiporã',1),(12,'Uberaba',3),(13,'Botuverá',4),(14,'Rio Grande Do Norte',5);
/*!40000 ALTER TABLE `tb_cidade` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_cliente`
--

DROP TABLE IF EXISTS `tb_cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_cliente` (
  `CliID` int NOT NULL AUTO_INCREMENT,
  `CliNome` varchar(150) NOT NULL,
  `CliDtNasc` date DEFAULT NULL,
  `CliTelefone` varchar(45) NOT NULL,
  `CliEmail` varchar(100) NOT NULL,
  `CliCep` varchar(45) NOT NULL,
  `CliEndereco` varchar(150) NOT NULL,
  `CliNumero` varchar(20) NOT NULL,
  `CliBairro` varchar(100) NOT NULL,
  `CliCidade` varchar(100) NOT NULL,
  `CliEstado` varchar(100) NOT NULL,
  `CliDescricao` text,
  `CliEmpID` int NOT NULL,
  `CliStatus` char(1) NOT NULL DEFAULT 'A',
  `CliUserID` int NOT NULL,
  `CliCpfCnpj` varchar(45) DEFAULT NULL,
  `CliTipo` char(1) DEFAULT NULL,
  PRIMARY KEY (`CliID`),
  KEY `fk_tb_cliente_1_idx` (`CliEmpID`),
  CONSTRAINT `fk_tb_cliente_1` FOREIGN KEY (`CliEmpID`) REFERENCES `tb_empresa` (`EmpID`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_cliente`
--

LOCK TABLES `tb_cliente` WRITE;
/*!40000 ALTER TABLE `tb_cliente` DISABLE KEYS */;
INSERT INTO `tb_cliente` VALUES (1,'Jose Tadeu','1987-06-03','(43) 9 9645-6338','jose.junior@acessorias.com','86.040-022','Rua Marize Benato Cruz Trento','702','Jardim Pequena Londres','Londrina','PR','asdasdas',10,'A',6,'010.273.869-62','C'),(4,'Keila','2022-01-01','(43) 9 6454-5565','josetadeu33217610@gmail.com','86.040-022','Rua Marize Benato Cruz Trento','50','Jardim Pequena Londres','Londrina','PR','asdasdsadsadsad',10,'A',6,NULL,NULL),(7,'Jonas','2021-01-01','(45) 6 4654-5646','josetadeu33217610@gmail.com','86.040-022','Rua Marize Benato Cruz Trento','123','Jardim Pequena Londres','Londrina','PR','5456456456',10,'A',6,NULL,NULL),(8,'Marcos','2022-08-10','(45) 6 4564-6545','josetadeu33217610@gmail.com','86.040-027','Rua Francisco Gonzales Donoso','456','Jardim Pequena Londres','Londrina','PR','asdasasdsadsa',10,'A',6,'232.223.323-23','C'),(9,'JOSE TADEU ROSA JUNIOR','2022-08-03','(55) 4 3996-4563','josetadeu33217610@gmail.com','86.040-022','Rua Marize Benato Cruz Trento','50','Jardim Pequena Londres','Londrina','PR','65655645646',10,'A',6,NULL,NULL),(14,'JOSE TADEU ROSA JUNIOR','2022-08-10','(43) 5 4564-6545','josetadeu33217610@gmail.com','86.040-022','Rua Marize Benato Cruz Trento','50','Jardim Pequena Londres','Londrina','a','asdadasd',8,'A',4,NULL,NULL),(15,'Pedro','2021-01-01','(45) 6 4564-6545','jiasjdiad@gmail.com','86.040-022','Rua Marize Benato Cruz Trento','50','Jardim Pequena Londres','Londrina','PR','TEste',10,'A',6,'',''),(16,'Enzo Caleb Novaes','1999-01-11','(31) 3 8701-384_','enzo-novaes75@casaarte.com.br','32.641-274','Rua Irmã Gioconda','178','Colônia Santa Isabel','Betim','MG','Testando',16,'A',12,NULL,NULL),(17,'Cliente para teste','2021-01-01','(43) 9 9645-6338','suporte@gmail.com','86.040-027','Rua Francisco Gonzales Donoso','702','Jardim Pequena Londres','Londrina','PR','',18,'A',14,'','C'),(18,'JOSE TADEU ROSA JUNIOR','2022-09-08','(55) 4 3996-4563','josetadeu33217610@gmail.com','86.040-022','Rua Marize Benato Cruz Trento','333','Jardim Pequena Londres','Londrina','PR','',10,'A',6,'32.423.423/4234-23','F'),(19,'JOSE TADEU ROSA JUNIOR','2022-09-21','(55) 4 3996-4563','josetadeu33217610@gmail.com','86.040-022','Rua Marize Benato Cruz Trento','444','Jardim Pequena Londres','Londrina','PR','',10,'A',6,'56.456.456/4564-56','C'),(21,'JOSE TADEU ROSA JUNIOR','2022-09-21','(55) 4 3996-4563','josetadeu33217610@gmail.com','86.040-022','Rua Marize Benato Cruz Trento','444','Jardim Pequena Londres','Londrina','PR','',10,'A',6,'56.456.456/4564-56','C'),(22,'JOSE TADEU ROSA JUNIOR','2022-09-21','(55) 4 3996-4563','josetadeu33217610@gmail.com','86.040-022','Rua Marize Benato Cruz Trento','444','Jardim Pequena Londres','Londrina','PR','',10,'A',6,'56.456.456/4564-56','C'),(23,'Junior','1987-06-03','(43) 9 9645-6338','josetadeu33217610@gmail.com','86040022','Rua Marize Benato Cruz Trento','50','Jardim Pequena Londres','Londrina','PR','',10,'A',6,'010.273.869-62','C'),(24,'Nubank','2021-01-01','(54) 5 4654-5646','','','','','','','','',10,'A',6,'21.231.321/3213-21','F'),(25,'CredCard','0000-00-00','(45) 6 6546-5465','','','','','','','','',10,'A',6,'16.556.456/4654-65','F'),(26,'JOSE ROBERTO','0000-00-00','(44) 9 9433-147','','87.820-000','','00','vila','Cidade Gaúcha','PR','',19,'A',15,'565.656.565-56','C'),(27,'miriam do santos teodorio','2022-09-09','(44) 9 9940-0537','','87.820-000','rua lagoa vermelha','1565','bairo boa vista','Cidade Gaúcha','PR','perto da pisina',19,'A',15,'023.058.229-01','C'),(29,'eliane rezende','2022-09-10','(44) 9 9951-5354','','87.820-000','','1479','vila','Cidade Gaúcha','PR','',19,'A',15,'082.311.909-29','C'),(30,'jean antoine','0000-00-00','(44) 9 9768-9680','','87.820-000','rua tolo da luz barbosa','1222','centro','Cidade Gaúcha','PR','',19,'A',15,'702.503.372-31','C'),(33,'jose edurado','0000-00-00','(44) 9 9951-4270','','87.820-000','','','','Cidade Gaúcha','PR','',19,'A',15,'84.646.646/4656','C'),(34,'lavinia costa','2022-09-12','(44) 9 9715-426','','87.820-000','rua cruz alta','02','vila','Cidade Gaúcha','PR','',19,'A',15,'088.074.275-59','C'),(35,'BRUNA VITORIA SILVIA PEREIRA','2022-09-07','(44) 9 9839-4153','','87.820-000','JARDIM PALMITA','1904','','Cidade Gaúcha','PR','',19,'A',15,'54.656.516/5454-5','C'),(36,'natannael ferreira do nacimento','0000-00-00','(44) 9 9115-1522','jovairmarques20@gmail.com','87.820-000','joa paizinho','1841','','Cidade Gaúcha','PR','',19,'A',15,'54.645.456/8545','C'),(37,'isabela','2022-09-15','(44) 9 9821-0078','','87.820-000','milthon','1045','centro','Cidade Gaúcha','PR','',19,'A',15,'844.545.486-45','C'),(38,'luana da silvia moraes','2022-09-17','(44) 9 9863-8016','','','rua santos dumont numero','6547','centro','cidade gaucha','parana','',19,'A',15,'636.464.646-46','C'),(39,'Tadeu','0000-00-00','(43) 9 8443-3066','','','','','','','','',20,'A',16,'529.280.399-53','C'),(40,'maria jose / mae do jean','2022-09-19','(44) 9 9935-4433','','87.820-000','','030,0','vila','Cidade Gaúcha','PR','',19,'A',15,'444.444.644-66','C'),(41,'roberta ratz','2022-09-19','(44) 9 9806-3570','','87.820-000','avenida piratinim','5250','alvorada','Cidade Gaúcha','PR','',19,'A',15,'65.985.454/4844-54','C'),(42,'aluguel','0000-00-00','(44) 9 9824-6309','','','','','','','','',19,'A',15,'65.462.561/5415-45','C');
/*!40000 ALTER TABLE `tb_cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_empresa`
--

DROP TABLE IF EXISTS `tb_empresa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_empresa` (
  `EmpID` int NOT NULL AUTO_INCREMENT,
  `EmpNome` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `EmpEnd` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `EmpCNPJ` varchar(18) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `EmpPlano` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `EmpStatus` char(1) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT 'A',
  `EmpDtCadastro` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin NOT NULL,
  `EmpDtRenovacao` datetime DEFAULT NULL,
  `EmpDtVencimento` datetime DEFAULT NULL,
  `EmpLogo` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `EmpLogoPath` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `EmpCep` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `EmpNumero` varchar(45) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  `EmpCidade` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_bin DEFAULT NULL,
  PRIMARY KEY (`EmpID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_empresa`
--

LOCK TABLES `tb_empresa` WRITE;
/*!40000 ALTER TABLE `tb_empresa` DISABLE KEYS */;
INSERT INTO `tb_empresa` VALUES (1,NULL,NULL,NULL,NULL,'A','2022-08-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(2,NULL,NULL,NULL,NULL,'A','2022-08-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,NULL,NULL,'A','2022-08-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,'A','2022-08-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(5,'Empresa de teste Ltda','Rua major pimpão, Londrina - PR','1082891956',NULL,'A','2022-08-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,NULL,NULL,'A','2022-08-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(7,NULL,NULL,NULL,NULL,'A','2022-08-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(8,NULL,NULL,NULL,NULL,'A','2022-08-04',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(9,NULL,NULL,NULL,NULL,'A','2022-08-05',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(10,'JRA Soluções Digital','Rua Marize Benato Cruz Trento','10.828.619/0001-32',NULL,'A','2022-08-05',NULL,NULL,'Assinatura_Junior.png','arquivos/6320bb233875c.png','86.040-022','50','Londrina'),(11,NULL,NULL,NULL,NULL,'A','2022-08-05',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(12,NULL,NULL,NULL,NULL,'A','2022-08-05',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(13,'Empresa Elite','Rua das alamedas','104545125451',NULL,'A','2022-08-17',NULL,NULL,'Assinatura_Junior.png','../dataview/arquivos/62fd0cecaee8f.png','86400022','133','Londrina'),(14,'renam utilitarios','jhkasdkasjd','78787878787',NULL,'A','2022-08-17',NULL,NULL,'Assinatura_Junior.png','../dataview/arquivos/62fd3340b09a5.png','8878978','877','Londrina'),(15,NULL,NULL,NULL,NULL,'A','2022-08-24',NULL,NULL,NULL,NULL,NULL,NULL,NULL),(16,'TopCell','Rua Marize Benato Cruz Trento','12.545.621/3212-31',NULL,'A','2022-09-01',NULL,NULL,'logoTopCell.jpg','arquivos/6310e9c933d89.jpg','86.040-022','50','Londrina'),(17,'Loja do BIE','Rua Marize Benato Cruz Trento','12.313.213/1321-32',NULL,'A','2022-09-05',NULL,NULL,'Captura de tela de 2022-02-23 10-46-57.png','arquivos/6315d37b52445.png','86.040-022','50','Londrina'),(18,'JOSE TADEU ROSA JUNIOR','Rua Marize Benato Cruz Trento','12.131.515/3135-15',NULL,'A','2022-09-06',NULL,NULL,'Assinatura_Junior.png','arquivos/631759ed6f7a1.png','86.040-022','50','Londrina'),(19,'TOPCELL ESPECIALIZADA','avenida comendador gentil geralde','33.345.461/0001-55',NULL,'A','2022-09-09',NULL,NULL,'WhatsApp Image 2022-05-11 at 09.17.12 (1).jpeg','arquivos/6320adf7c9e11.jpeg','87.820-000','2767','Cidade Gaúcha'),(20,'RONDONCELL','RUA JOSE PAVAN','43.225.798/0001-82',NULL,'A','2022-09-10',NULL,NULL,'WhatsApp Image 2022-09-17 at 12.45.18 (1).jpeg','arquivos/6325efb4d659d.jpeg','86.400-000','300','Jacarezinho');
/*!40000 ALTER TABLE `tb_empresa` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_endereco`
--

DROP TABLE IF EXISTS `tb_endereco`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_endereco` (
  `id` int NOT NULL AUTO_INCREMENT,
  `rua` varchar(45) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cep` varchar(8) NOT NULL,
  `cidade_id` int NOT NULL,
  `usuario_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_endereco_tb_cidade1_idx` (`cidade_id`),
  KEY `fk_tb_endereco_tb_usuario1_idx` (`usuario_id`),
  CONSTRAINT `fk_tb_endereco_tb_cidade1` FOREIGN KEY (`cidade_id`) REFERENCES `tb_cidade` (`id`),
  CONSTRAINT `fk_tb_endereco_tb_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_endereco`
--

LOCK TABLES `tb_endereco` WRITE;
/*!40000 ALTER TABLE `tb_endereco` DISABLE KEYS */;
INSERT INTO `tb_endereco` VALUES (1,'Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040022',6,18),(3,'Rua Francisco Gonzales Donoso502','Jardim Pequena Londres','86040027',6,20),(4,'Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040022',6,21),(5,'Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040022',6,22),(6,'Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040022',6,25),(8,'Minas Gerais','Centro','45484455',12,29),(9,'Rua 1','Centro','88295-00',13,30),(10,'Francisco gonzales Donoso, 702','','86400027',6,31),(12,'Rua 1','','8612154',14,32),(13,'Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040022',6,33),(14,'Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040022',6,34),(15,'Rua Marize Benato Cruz Trento','Jardim Pequena Londres','86040022',6,35),(16,'Rua Francisco Gonzales Donoso','Jardim Pequena Londres','86040027',6,36),(17,'Rua Francisco Gonzales Donoso,702','','86040027',6,37),(18,'Rua Jose Pavan','Centro','86400000',8,38),(19,'Rua Francisco Gonzales Donoso, 702','Jardim Pequena Londres','86040027',6,39),(20,'Rua Marize Benato Cruz Trento, 50','','86040022',6,40),(21,'Rua Francisco Gonzales Donoso','Jardim Pequena Londres','86040027',6,41),(22,'','','',6,42),(23,'','','',6,43);
/*!40000 ALTER TABLE `tb_endereco` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_equipamento`
--

DROP TABLE IF EXISTS `tb_equipamento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_equipamento` (
  `id` int NOT NULL AUTO_INCREMENT,
  `identificacao` varchar(20) NOT NULL,
  `descricao` varchar(90) NOT NULL,
  `tipoequip_id` int NOT NULL,
  `modeloequip_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_tb_equipamento_tb_tipoequip1_idx` (`tipoequip_id`),
  KEY `fk_tb_equipamento_tb_modeloequip1_idx` (`modeloequip_id`),
  CONSTRAINT `fk_tb_equipamento_tb_modeloequip1` FOREIGN KEY (`modeloequip_id`) REFERENCES `tb_modeloequip` (`id`),
  CONSTRAINT `fk_tb_equipamento_tb_tipoequip1` FOREIGN KEY (`tipoequip_id`) REFERENCES `tb_tipoequip` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_equipamento`
--

LOCK TABLES `tb_equipamento` WRITE;
/*!40000 ALTER TABLE `tb_equipamento` DISABLE KEYS */;
INSERT INTO `tb_equipamento` VALUES (4,'Mouse sem fio','Mouse sem fio',11,39),(6,'Monitor 28Polegadas','Monitor 28Polegadas',13,38),(7,'Novo Equipamento','Cadastrado agora',11,38),(9,'Novo Equipamento','Cadastrado agora',11,40),(11,'Monitor do Marketing','Monitor da Monica do Marketing',13,39),(12,'Teclado c220','Teclado novo com função SilentTouch',12,39),(13,'Mouse do Marketing','Mouse para o Marketing',11,38),(14,'Monitor para Junior','Monitor novo 32 Polegadas | teste',13,39),(15,'Cadeira xls Gammer','Cadeira para auxilio em jogos',14,44),(16,'Relogio Ponto','Relogio ponto',14,44),(17,'para testar redirect','para testar redirect',14,39),(18,'ddddd','ddddddd',12,40),(19,'vvvvvvvvvvvvvvvv','vvvvvvvvvvvvvvvvvvvvvvvv',13,40),(20,'dddd','ddd',11,39),(21,'teste','dddddddaaaaaaaaaaaaaaaaaaaaaaaa',12,40);
/*!40000 ALTER TABLE `tb_equipamento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_estado`
--

DROP TABLE IF EXISTS `tb_estado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_estado` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_estado` varchar(45) NOT NULL,
  `sigla_estado` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_estado`
--

LOCK TABLES `tb_estado` WRITE;
/*!40000 ALTER TABLE `tb_estado` DISABLE KEYS */;
INSERT INTO `tb_estado` VALUES (1,'Paraná','PR'),(3,'','MG'),(4,'','SC'),(5,'','RN');
/*!40000 ALTER TABLE `tb_estado` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_funcionario`
--

DROP TABLE IF EXISTS `tb_funcionario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_funcionario` (
  `funcionario_id` int NOT NULL,
  `setor_id` int NOT NULL,
  PRIMARY KEY (`funcionario_id`),
  KEY `fk_tb_funcionario_tb_setor1_idx` (`setor_id`),
  CONSTRAINT `fk_tb_funcionario_tb_setor1` FOREIGN KEY (`setor_id`) REFERENCES `tb_setor` (`id`),
  CONSTRAINT `fk_tb_funcionario_tb_usuario1` FOREIGN KEY (`funcionario_id`) REFERENCES `tb_usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_funcionario`
--

LOCK TABLES `tb_funcionario` WRITE;
/*!40000 ALTER TABLE `tb_funcionario` DISABLE KEYS */;
INSERT INTO `tb_funcionario` VALUES (31,1),(33,1),(39,1),(20,31),(40,33),(37,34);
/*!40000 ALTER TABLE `tb_funcionario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_lancamentos`
--

DROP TABLE IF EXISTS `tb_lancamentos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_lancamentos` (
  `LancID` int NOT NULL AUTO_INCREMENT,
  `LancDescricao` varchar(255) DEFAULT NULL,
  `LancValor` decimal(10,2) NOT NULL,
  `LancDtVencimento` date NOT NULL,
  `LancDtPagamento` date DEFAULT NULL,
  `LancBaixado` char(1) DEFAULT 'N',
  `LancFormPgto` char(2) DEFAULT NULL,
  `Tipo` char(1) NOT NULL,
  `LancClienteID` int DEFAULT NULL,
  `LancEmpID` int NOT NULL,
  `LancUserID` int NOT NULL,
  PRIMARY KEY (`LancID`),
  KEY `fk_tb_lancamentos_1_idx` (`LancClienteID`),
  CONSTRAINT `fk_tb_lancamentos_1` FOREIGN KEY (`LancClienteID`) REFERENCES `tb_cliente` (`CliID`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_lancamentos`
--

LOCK TABLES `tb_lancamentos` WRITE;
/*!40000 ALTER TABLE `tb_lancamentos` DISABLE KEYS */;
INSERT INTO `tb_lancamentos` VALUES (33,'Salario Empresa',2500.00,'2022-09-05','2022-09-08',NULL,'D','1',23,10,6),(34,'Rosangela',1000.00,'2022-09-11','2022-09-09',NULL,'D','1',23,10,6),(35,'Papai',500.00,'2022-09-11','2022-09-09',NULL,'D','1',23,10,6),(36,'Keila',2200.00,'2022-09-11','2022-09-09',NULL,'D','1',23,10,6),(37,'Cartão da Nubank',2556.59,'2022-09-13','0000-00-00',NULL,'','2',24,10,6),(38,'Cartão da CredCard',3149.44,'2022-09-11','0000-00-00',NULL,'','2',25,10,6),(39,'Estacionamento Keila',110.00,'2022-09-09','0000-00-00',NULL,'','2',18,10,6),(40,'Curso PHP',200.00,'2022-09-09','2022-09-09',NULL,'P','2',18,10,6),(41,'Receita da Venda:25',200.00,'2022-09-09','2022-09-09','N','D','1',17,18,14),(42,'Receita da OS:23',250.00,'2022-09-09','0000-00-00','N','','1',26,19,15),(44,'Receita da OS:26',260.00,'2022-09-09','2022-09-09','N','','1',27,19,15),(50,'Receita da Venda:29',20.00,'2022-09-13','2022-09-13','N','D','1',1,10,6),(51,'Receita da Venda:32',20.00,'2022-09-13','2022-09-13','N','D','1',4,10,6),(52,'Receita da OS:20',14.00,'2022-09-13','0000-00-00','N','','1',1,10,6),(53,'Receita da Venda:34',30.00,'2022-09-17','2022-09-17','N','','1',39,20,16),(54,'Receita da OS:37',600.00,'2022-09-19','0000-00-00','N','','1',40,19,15),(55,'Receita da OS:38',280.00,'2022-09-19','2022-09-20','N','','1',41,19,15),(57,'aluguel',650.00,'2022-09-10','2022-09-23',NULL,'D','1',42,19,15);
/*!40000 ALTER TABLE `tb_lancamentos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_log`
--

DROP TABLE IF EXISTS `tb_log`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_log` (
  `usuario_id` int NOT NULL,
  `data_log` date NOT NULL,
  `hora` time NOT NULL,
  `ip` varchar(20) NOT NULL,
  PRIMARY KEY (`usuario_id`,`data_log`,`hora`),
  CONSTRAINT `fk_tb_log_tb_usuario1` FOREIGN KEY (`usuario_id`) REFERENCES `tb_usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_log`
--

LOCK TABLES `tb_log` WRITE;
/*!40000 ALTER TABLE `tb_log` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_log` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_modeloequip`
--

DROP TABLE IF EXISTS `tb_modeloequip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_modeloequip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_modeloequip`
--

LOCK TABLES `tb_modeloequip` WRITE;
/*!40000 ALTER TABLE `tb_modeloequip` DISABLE KEYS */;
INSERT INTO `tb_modeloequip` VALUES (38,'Acer'),(39,'Logitech'),(40,'fortrek'),(41,'Logitech'),(44,'Cadeira de programador');
/*!40000 ALTER TABLE `tb_modeloequip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_os`
--

DROP TABLE IF EXISTS `tb_os`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_os` (
  `OsID` int NOT NULL AUTO_INCREMENT,
  `OsDtInicial` date NOT NULL,
  `OsDtFinal` varchar(45) DEFAULT NULL,
  `OsGarantia` varchar(100) DEFAULT NULL,
  `OsDescProdServ` text,
  `OsDefeito` text NOT NULL,
  `OsObs` text,
  `OsCliID` int NOT NULL,
  `OsTecID` varchar(50) NOT NULL,
  `OsStatus` char(2) NOT NULL DEFAULT 'O',
  `OsLaudoTec` text,
  `OsValorTotal` decimal(10,2) NOT NULL,
  `OsFaturado` char(1) NOT NULL DEFAULT 'N',
  `OsEmpID` int NOT NULL,
  `OsLancamentoID` int DEFAULT NULL,
  `OsDesconto` decimal(10,2) DEFAULT '0.00',
  PRIMARY KEY (`OsID`),
  KEY `fk_tb_os_1_idx` (`OsCliID`),
  KEY `fk_tb_os_3_idx` (`OsEmpID`),
  CONSTRAINT `fk_tb_os_1` FOREIGN KEY (`OsCliID`) REFERENCES `tb_cliente` (`CliID`),
  CONSTRAINT `fk_tb_os_3` FOREIGN KEY (`OsEmpID`) REFERENCES `tb_empresa` (`EmpID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_os`
--

LOCK TABLES `tb_os` WRITE;
/*!40000 ALTER TABLE `tb_os` DISABLE KEYS */;
INSERT INTO `tb_os` VALUES (20,'2022-09-08','','asdasasdsad','asdasd','asdasdasda','',1,'asdasdsadas','F','',20.00,'S',10,52,6.00),(22,'2022-09-08','','sadsad','asdasdsa','asdasda','',1,'asdas','F','',0.00,'N',10,0,0.00),(23,'2022-09-09','2022-09-09','90 DIAS','TROCA DE TELA \nMOTO G8 PAWER LITE','TELA TRICADA','',26,'JOVAIR','F','TROCA DE VIDRO',0.00,'S',19,42,0.00),(26,'2022-09-09','2022-09-09','90 dias','troca de tela','tela trincada','',27,'jovair marques','F','',0.00,'S',19,44,0.00),(28,'2022-09-10','2022-09-12','90','aparelho desliga','desligando','tela trocada resente em outra assistencia',29,'jovair','A','',0.00,'N',19,NULL,0.00),(29,'2022-09-10','2022-09-12','90 dia','nao carrega','nao carrega','',30,'jovair','C','',90.00,'N',19,NULL,0.00),(31,'2022-09-12','2022-09-16','90 dias','nao consegue grvar audio e nem escuta o mesmo','erro de gravaçao','iphone 7 / 250620',34,'jovair','C','',0.00,'N',19,NULL,0.00),(32,'2022-09-12','2022-09-12','90 dias','TELA j400','TELA QUEIMADA','TERMO DE GARANTIA TOPCELL\nNÃO ESTÃO INCLUSOS NESTA GARANTIA ALGUNS ACESSÓRIOS E TODAS AS PARTES EXTERNAS DO\nCELULAR TAIS COMO:\nLentes, antenas, carcaças, capas, cases, teclas, teclados e botões laterais se houver, tampas, películas protetoras, cabos\nde dados, fones de ouvido, cartão de memória, pendrive, suportes e partes que se desgastam com o uso.\nA GARANTIA É CANCELADA AUTOMATICAMENTE NOS SEGUINTES CASOS:\nEm ocasião de quedas, esmagamentos, sobrecarga elétrica; exposição do aparelho a altas temperaturas, umidade ou\nlíquidos; exposição do aparelho a poeira, pó e/ou limalha de metais, ou ainda quando constatado mau uso do aparelho,\ninstalações, modificações ou atualizações no seu sistema operacional; abertura do equipamento ou tentativa de conserto\ndeste por terceiros que não sejam os técnicos da Speedcell, mesmo que para realização de outros serviços; bem como\na violação do selo/lacre de garantia colocado pela topcell.\nE ainda:\nLENTE TOUCHSCREEN QUE APRESENTEM MAU USO, TRINCADOS OU QUEBRADOS, RISCADOS, MANCHADOS,\nDESCOLADOS ou COM CABO FLEX ROMPIDO.\nVale lembrar que:\n1) A GARANTIA DE 90 (NOVENTA) dias está de acordo com o artigo 26 inciso II do código de defesa do\nconsumidor.\n2) Funcionamento, instalação e atualização de aplicativos, bem como o sistema operacional do aparelho NÃO FAZEM\nparte desta garantia.\n3) Limpeza e conservação do aparelho NÃO FAZEM parte desta garantia.\n4) A não apresentação de documento (nota fiscal ou este termo) que comprove o serviço INVÁLIDA a garantia.\n5) Qualquer mal funcionamento APÓS ATUALIZAÇÕES do sistema operacional ou aplicativos NÃO FAZEM PARTE\nDESSA GARANTIA.\n6) A GARANTIA é válida somente para o item ou serviço descrito na nota fiscal, ordem de serviço ou neste termo\nde garantia, NÃO ABRANGENDO OUTRAS PARTES e respeitando as condições aqui descritas.\nData:_/_/___ Marca:________ Modelo____ __IMEI:____________ __\nCondição de entrada do equipamento (defeito s e aspectos)________________________\nServiço realizado:____________________________________\n 90 DIAS VISTO____ PEÇA ORIGINAL? SIM NÃO\n\nConfirmo que li este termo de garantia, fui orientado sobre o seu conteúdo e que testei o\naparelho, e este se encontra em perfeito estado estético e de funcionamento no ato da retirada.\nCliente:____________\nDe acordo:',33,'JOVAIR','F','',350.00,'N',19,NULL,0.00),(33,'2022-09-13','2022-09-14','90 DIAS','VERIFICA O DOC DE CARGA','APARELHO APRENTA ALTA TEMPERATURA E NAO  CARREGA','A30S',35,'JOVAIR','O','',150.00,'N',19,NULL,0.00),(34,'2022-09-14','2022-09-14','90 dias','tela','tela quebrada','com chip  1',36,'jovair','O','troca tela 350',0.00,'N',19,NULL,0.00),(35,'2022-09-15','2022-10-10','90','moto g7 play 290 /reais','tela quebrada','',37,'jovair','O','',0.00,'N',19,NULL,0.00),(36,'2022-09-17','2022-09-17','-------------------------','banho quimico','aparelho teve contato com liquido','aparelho nao liga\n aparelho teve contato com liquido desoxidação de placa com isso o aparelho tende a ligar serviço nao cobre a tela queimada ou microfone etc.......',38,'jovair','C','',150.00,'N',19,NULL,0.00),(37,'2022-09-16','2022-09-19','90 dia','tela queimada','tela quebrada','troca de tela',40,'jovair marques','F','tela queimada',650.00,'S',19,54,100.00),(38,'2022-09-19','2022-09-21','90 dias','tela','aparelho nao liga','sem chip',41,'jovair','F','',280.00,'S',19,55,0.00);
/*!40000 ALTER TABLE `tb_os` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produto`
--

DROP TABLE IF EXISTS `tb_produto`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produto` (
  `ProdID` int NOT NULL AUTO_INCREMENT,
  `ProdDescricao` varchar(100) NOT NULL,
  `ProdDtCriacao` date NOT NULL,
  `ProdCodBarra` varchar(100) NOT NULL,
  `ProdValorCompra` decimal(10,2) NOT NULL,
  `ProdValorVenda` decimal(10,2) NOT NULL,
  `ProdEstoqueMin` int NOT NULL,
  `ProdEstoque` int NOT NULL,
  `ProdImagem` varchar(100) DEFAULT NULL,
  `ProdImagemPath` varchar(100) DEFAULT NULL,
  `ProdEmpID` int NOT NULL,
  `ProdUserID` int NOT NULL,
  PRIMARY KEY (`ProdID`),
  KEY `fk_tb_produto_1_idx` (`ProdEmpID`),
  KEY `fk_tb_produto_2_idx` (`ProdUserID`),
  CONSTRAINT `fk_tb_produto_1` FOREIGN KEY (`ProdEmpID`) REFERENCES `tb_empresa` (`EmpID`),
  CONSTRAINT `fk_tb_produto_2` FOREIGN KEY (`ProdUserID`) REFERENCES `tb_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto`
--

LOCK TABLES `tb_produto` WRITE;
/*!40000 ALTER TABLE `tb_produto` DISABLE KEYS */;
INSERT INTO `tb_produto` VALUES (2,'Produto','2021-01-01','234567498',10.00,10.00,10,4,'Captura de tela de 2022-03-09 16-41-10.png','arquivos/63075d99536ea.png',10,6),(3,'asdasdasdsadsa','2022-01-01','123456',1.23,1.23,100,111,'Captura de tela de 2022-02-23 10-47-12.png','arquivos/63075b67f10f5.png',10,6),(4,'jasdiasdjai','2022-01-01','78979789',1000.00,2000.00,10000,8979,'Captura de tela de 2022-03-22 16-53-20.png','arquivos/63076806827ac.png',10,6),(5,'Produto','2022-09-01','789456564654',10.00,15.00,10,3,'Captura de tela de 2022-02-23 10-46-31.png','arquivos/6310e6df33e8a.png',16,12),(6,'Tela para Motorola G3','2021-01-01','4564984498',150.00,200.00,2,1,'Captura de tela de 2022-02-23 10-46-31.png','arquivos/63175982d46e3.png',18,14),(7,'Fivela Ouro Preto','2021-01-01','749864648',40.00,42.00,10,20,'Captura de tela de 2022-03-08 08-36-03.png','arquivos/6319cd3656e8c.png',10,6),(8,'SSD 960GB KINGSPEC','2022-09-10','6950509986159',100.00,515.00,1,1,'SSD KINGSPEC 128GB.JPG','arquivos/631c909a9b12a.jpg',20,16),(9,'SSD 128GB KINGSPEC','2022-09-10','6950509983554',100.00,120.00,1,1,'SSD KINGSPEC 128GB.JPG','arquivos/631c90b938488.jpg',20,16),(10,'SSD 120GB WEIJINTO','2022-09-10','5849325654674',100.00,120.00,1,1,'SSD WEJINTO 120GB.JPG','arquivos/631c916b5e369.jpg',20,16),(11,'SSD 1TB KINGSPEC','2022-09-10','6950509983301',100.00,720.00,1,2,'SSD KINGSPEC 128GB.JPG','arquivos/631c91d0aef01.jpg',20,16),(12,'PENDRIVE SANDISK 8GB','2022-09-10','619659067021',10.00,25.00,1,1,'Pendrive.JPG','arquivos/631c925d196c1.jpg',20,16),(13,'CABO P2XP2','2022-09-10','2000000000026',10.00,15.00,1,4,'CABO P2XP2.JPG','arquivos/631c937a4f8ae.jpg',20,16),(14,'PENDRIVE KINGSTON 64 GB','2022-09-10','0000000000001',10.00,65.00,1,1,'PENDRIVE KINGSTON 64 GB.JPG','arquivos/631c945316981.jpg',20,16),(15,'CARTÃO DE MEMÓRIA KINGSTON 16GB','2022-09-10','0000000000002',10.00,45.00,1,10,'CARTÃO DE MEMÓRIA KINGSTON 16GB.JPG','arquivos/631c97c50bbcd.jpg',20,16),(16,'PENDRIVE KINGSTON 1TB','2022-09-10','0000000000003',10.00,68.00,1,10,'PENDRIVE KINGSTON 1TB.JPG','arquivos/631c9d044cbc7.jpg',20,16),(17,'PENDRIVE KINGSTON 512GB','2022-09-10','0000000000004',10.00,42.00,1,3,'PENDRIVE KINGSTON 1TB.JPG','arquivos/631c9fd9bc31d.jpg',20,16),(18,'PENDRIVE KINGSTON 64GB','2022-09-10','0000000000005',10.00,42.00,1,3,'PENDRIVE KINGSTON 1TB.JPG','arquivos/631ca2d6c102a.jpg',20,16),(19,'PENDRIVE HP 16GB','2022-09-10','0000000000006',10.00,42.00,1,11,'PENDRIVE HP 16GB.JPG','arquivos/631ca3e6d65ce.jpg',20,16),(21,'TELA J400','2022-09-12','',130.00,350.00,0,3,'','arquivos/631f7e32274b0.',19,15),(22,'TELA K52  SEM ARO','2022-09-12','',120.00,350.00,0,3,'','arquivos/631f7e7f57068.',19,15),(23,'PENDRIVE HUAWEI 16GB','2022-09-17','0000000000008',10.00,42.00,1,6,'PENDRIVE HUAWEI 16GB.png','arquivos/6325ecbbcf2cc.png',20,16),(24,'SMART BRACELET','2022-09-17','0000000000009',20.00,70.00,1,6,'Smart bracelet redondo.png','arquivos/6325ed75e0f5a.png',20,16),(25,'FONE DE OUVIDO BLUETO KP-367','2022-09-17','7898594125703',25.00,60.00,1,4,'FONE DE OUVIDO BLUETO.png','arquivos/6325ee6e7c8f2.png',20,16),(26,'POWER BANK 6800mAh','2022-09-17','549768866928',15.00,60.00,1,2,'POWER BANK.png','arquivos/6325f0a5396fd.png',20,16),(27,'AMPLIADOR DE TELA PARA CELULAR E TABLET','2022-09-17','0000000000010',10.00,40.00,1,2,'AMPLIADOR DE TELA CELULAR TABLET.PNG','arquivos/6325f0595a80f.png',20,16),(28,'CADEADO PADO ASTE LONGA  LT-30','2022-09-17','7891065006129',20.00,39.90,1,3,'CADEADO HASTE LONGA 30MM.jpg','arquivos/6325f7faeedf2.jpg',20,16),(29,'CADEADO PADO LT-40','2022-09-17','7891065011635',20.00,37.90,1,3,'CADEADO 40MM.jpg','arquivos/6325f857bd501.jpg',20,16),(30,'CADEADO PADO LT-30','2022-09-17','7891065000165',20.00,25.90,1,3,'CADEADO 30MM.jpg','arquivos/6325f8b580d6f.jpg',20,16),(31,'CADEADO PADO LT-20','2022-09-17','7891065000141',15.00,25.00,1,3,'CADEADO 20MM.jpg','arquivos/6325f91349c5b.jpg',20,16),(32,'CONTROLE PARA PORTÃO PPA ZAP 2 POP','2022-09-17','7898481913277',15.00,35.00,1,3,'CONTROLE PPA.png','arquivos/6325f9e5cb677.png',20,16),(33,'CONTROLE PORTAO FX PRETO','2022-09-17','7898222600664',15.00,35.00,1,5,'CONTROLE PORTAL FX.png','arquivos/6325fa5549328.png',20,16),(34,'troca tela','2022-09-19','tela redmi not 10',210.00,650.00,0,1,'','arquivos/6328a0012ee09.',19,15),(35,'tela redmi9a','2022-09-19','tela 9a',150.00,280.00,0,3,'','arquivos/6328b25c80374.',19,15),(36,'caixa som','2022-09-19','2018032001726',40.00,85.00,0,2,'','arquivos/6328d9e731365.',19,15),(37,'SUPORTE UNIVERSAL PARA CELULAR LE-016','2022-09-19','7898605605309',15.00,43.00,1,3,'SUPORTE LE 016.PNG','arquivos/6328e5c3c6217.png',20,16),(38,'SUPORTE PARA CELULAR MOBILE PHONE STENTS','2022-09-19','0000000000012',10.00,33.00,1,1,'MOBILE PHONE STENTS.png','arquivos/6328e7eed46ab.png',20,16),(39,'SUPORTE DE CELULAR PARA CARRO SAIDA DE AR','2022-09-19','3236548680061',10.00,25.00,1,3,'Suporte Universal Veicular Carro Para Celular GPS Holder.PNG','arquivos/6328e90ad5326.png',20,16),(40,'SUPORTE DE CELULAR PARA CARRO SAIDA DE AR','2022-09-19','0000000000015',10.00,25.00,1,1,'Suporte Veicular Para Celular GPS Universal Anti Queda.PNG','arquivos/6328e950a15b4.png',20,16),(41,'RING LIGHT','2022-09-19','0000000000016',7.00,19.00,1,1,'Ring Light Selfie Para Celular Três Potências Anel De Luz.PNG','arquivos/6328e9e063a18.png',20,16);
/*!40000 ALTER TABLE `tb_produto` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_produto_os`
--

DROP TABLE IF EXISTS `tb_produto_os`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_produto_os` (
  `ProdOsID` int NOT NULL AUTO_INCREMENT,
  `ProdOsQtd` int NOT NULL,
  `ProdOs_osID` int NOT NULL,
  `ProdOsProdID` int NOT NULL,
  `ProdOsSubTotal` decimal(10,2) NOT NULL,
  `ProdOsEmpID` int NOT NULL,
  PRIMARY KEY (`ProdOsID`),
  KEY `fk_tb_produto_os_1_idx` (`ProdOs_osID`),
  KEY `fk_tb_produto_os_2_idx` (`ProdOsProdID`),
  CONSTRAINT `fk_tb_produto_os_1` FOREIGN KEY (`ProdOs_osID`) REFERENCES `tb_os` (`OsID`),
  CONSTRAINT `fk_tb_produto_os_2` FOREIGN KEY (`ProdOsProdID`) REFERENCES `tb_produto` (`ProdID`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_produto_os`
--

LOCK TABLES `tb_produto_os` WRITE;
/*!40000 ALTER TABLE `tb_produto_os` DISABLE KEYS */;
INSERT INTO `tb_produto_os` VALUES (28,1,20,2,10.00,10),(31,1,37,34,650.00,19),(32,1,38,35,280.00,19);
/*!40000 ALTER TABLE `tb_produto_os` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_servico`
--

DROP TABLE IF EXISTS `tb_servico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_servico` (
  `ServID` int NOT NULL AUTO_INCREMENT,
  `ServNome` varchar(100) NOT NULL,
  `ServValor` decimal(10,2) NOT NULL,
  `ServDescricao` text,
  `ServEmpID` int NOT NULL,
  `ServUserID` int NOT NULL,
  PRIMARY KEY (`ServID`),
  KEY `fk_tb_servico_1_idx` (`ServEmpID`),
  KEY `fk_tb_servico_2_idx` (`ServUserID`),
  CONSTRAINT `fk_tb_servico_1` FOREIGN KEY (`ServEmpID`) REFERENCES `tb_empresa` (`EmpID`),
  CONSTRAINT `fk_tb_servico_2` FOREIGN KEY (`ServUserID`) REFERENCES `tb_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_servico`
--

LOCK TABLES `tb_servico` WRITE;
/*!40000 ALTER TABLE `tb_servico` DISABLE KEYS */;
INSERT INTO `tb_servico` VALUES (2,'Trocar película',10.00,'Colocar nova película',10,6),(3,'Serviço Geral',100.00,'Serviço Em geral',10,6),(4,'Serviço de concerto em Celular',50.00,'Serviço a ser realizado para concerto de peça',16,12),(5,'Concerto em tela de celular',100.00,'',18,14),(6,'Concerto em Cinto',35.00,'concerto',10,6),(7,'troca de conector de carga',150.00,'doc de carga  completo',19,15),(8,'conector doc de carga',90.00,'',19,15),(9,'conector de carga',200.00,'sem risco de quebra tela',19,15),(10,'troca de tela',260.00,'tela a10s',19,15),(11,'TROCA DE TELA J400',350.00,'TELA',19,15),(12,'desoxidação de placa',150.00,'aparelho teve contato com liquido desoxidação de placa  com isso o aparelho tende a ligar \nserviço nao cobre  a tela queimada ou microfone etc.......',19,15);
/*!40000 ALTER TABLE `tb_servico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_servico_os`
--

DROP TABLE IF EXISTS `tb_servico_os`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_servico_os` (
  `ServOsID` int NOT NULL AUTO_INCREMENT,
  `ServOsQtd` int NOT NULL,
  `ServOs_osID` int NOT NULL,
  `ServOsServID` int NOT NULL,
  `ServOsSubTotal` decimal(10,2) NOT NULL,
  `ServOsEmpID` int NOT NULL,
  PRIMARY KEY (`ServOsID`),
  KEY `fk_tb_servico_os_1_idx` (`ServOs_osID`),
  KEY `fk_tb_servico_os_2_idx` (`ServOsServID`),
  CONSTRAINT `fk_tb_servico_os_1` FOREIGN KEY (`ServOs_osID`) REFERENCES `tb_os` (`OsID`),
  CONSTRAINT `fk_tb_servico_os_2` FOREIGN KEY (`ServOsServID`) REFERENCES `tb_servico` (`ServID`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_servico_os`
--

LOCK TABLES `tb_servico_os` WRITE;
/*!40000 ALTER TABLE `tb_servico_os` DISABLE KEYS */;
INSERT INTO `tb_servico_os` VALUES (27,1,20,2,10.00,10),(28,1,29,8,90.00,19),(29,1,32,11,350.00,19),(30,1,33,7,150.00,19),(31,1,36,12,150.00,19);
/*!40000 ALTER TABLE `tb_servico_os` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_setor`
--

DROP TABLE IF EXISTS `tb_setor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_setor` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome_setor` varchar(45) NOT NULL,
  `status` char(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_setor`
--

LOCK TABLES `tb_setor` WRITE;
/*!40000 ALTER TABLE `tb_setor` DISABLE KEYS */;
INSERT INTO `tb_setor` VALUES (1,'Desenvolvimento','1'),(10,'Homologação','1'),(15,'Financeiro','1'),(31,'Marketing','1'),(32,'novo Setor Alterado','0'),(33,'Gestão','1'),(34,'Novo Setor de testes','1'),(35,'Junior','1');
/*!40000 ALTER TABLE `tb_setor` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tecnico`
--

DROP TABLE IF EXISTS `tb_tecnico`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tecnico` (
  `tecnico_id` int NOT NULL,
  `empresa_tecnico` varchar(45) NOT NULL,
  PRIMARY KEY (`tecnico_id`),
  CONSTRAINT `fk_tb_tecnico_tb_usuario` FOREIGN KEY (`tecnico_id`) REFERENCES `tb_usuario` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tecnico`
--

LOCK TABLES `tb_tecnico` WRITE;
/*!40000 ALTER TABLE `tb_tecnico` DISABLE KEYS */;
INSERT INTO `tb_tecnico` VALUES (1,'Empresa 1'),(30,'Vidraçaria'),(32,'Osny sapataria do Centro'),(34,'Construbens'),(35,'Construbens'),(38,'RondonCell Celulares'),(41,'empresa1');
/*!40000 ALTER TABLE `tb_tecnico` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_tipoequip`
--

DROP TABLE IF EXISTS `tb_tipoequip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_tipoequip` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_tipoequip`
--

LOCK TABLES `tb_tipoequip` WRITE;
/*!40000 ALTER TABLE `tb_tipoequip` DISABLE KEYS */;
INSERT INTO `tb_tipoequip` VALUES (11,'Mouse'),(12,'Teclado'),(13,'Monitor'),(14,'Moveis');
/*!40000 ALTER TABLE `tb_tipoequip` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_usuario`
--

DROP TABLE IF EXISTS `tb_usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_usuario` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` smallint NOT NULL COMMENT '1 - Adm\n2 - funcionario\n3 - tecnico',
  `nome` varchar(50) NOT NULL,
  `login` varchar(45) NOT NULL,
  `senha` varchar(60) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_usuario`
--

LOCK TABLES `tb_usuario` WRITE;
/*!40000 ALTER TABLE `tb_usuario` DISABLE KEYS */;
INSERT INTO `tb_usuario` VALUES (1,1,'ju','4445445','123121321',1,'84848884'),(2,1,'Jose Tadeu Rosa Junior','teste@gmail.com','123456',0,'456456'),(3,2,'Gabriel Simoes','gabriel.simoes@acessorias.comsss','$2y$10$xTfJjP0EuDDZiUR43n3qbu9/lfnrnTzd8gNk2AWq7m2xz/OkIkeoO',1,'(43)58456-6888'),(4,1,'renan','renan@gmail.com','123456',1,'4654848654'),(5,1,'junior','josetadeu33217610@gmail.com','123465',1,'43996456338'),(6,1,'Jose Junior','josetadeu33217610@gmail.com','123456',1,'(43) 9 9645-6338'),(7,1,'werwerew','13265465','132456',1,'8448'),(8,1,'junior','josetadeu33217610@gmail.com','123456',1,'1121'),(9,1,'junior','jose.junior@acessorias.com','123456',1,'43996456338'),(10,1,'renan','renan@gmail.com','123456',1,'746375634534'),(11,1,'bla bla','bla@gmail.com','123456',1,'4333464666'),(12,1,'Jose Tadeu Rosa','josetadeu@gmail.com','123456',1,'(43) 9 9645-6338'),(13,1,'Bie','bie@gmail.com','123456',1,'(46) 5 4564-656_'),(14,1,'suporte','suporte@gmail.com','123456',1,'(43) 9 9645-6338'),(15,1,'TOPCELL ESPECIALIZADA','TOPCELLESPECIALIZADA@GMAIL.COM','TOPCELL2020',1,'44997218771'),(16,1,'JOSE TADEU ROSA','rondoncelljac@gmail.com','tadeu0306',1,'(43)9.8443-3066'),(17,1,'suporte','suporte@hotmail.com','123456',1,'43996456338'),(18,1,'Administrador Geral','Junim_jrsmtonhao@hotmail.com','$2y$10$F7WKGEe4DHXuN/LMbU0q0ufobc9ffiEUZ3J8S/HfYbAqCufQuLn6S',0,'4396456338'),(20,2,'Osny','osny@gmail.com','$2y$10$XYU5ur37IzR.nB0hltQL3e8xhf3Jy3ttkrN/jEBEsJK.U4WumZ.DK',1,'4364545555'),(21,1,'JOSE TADEU ROSA JUNIOR','josetadeu33217610@gmail.com','$2y$10$kkSTp6R369HrfR7Yqe25TuOMEXz5.zrta3zvEd2Yj0.oafjycM.f2',1,'+5543996456338'),(22,1,'Bie','bie@gmail.com','$2y$10$cYDQevzwNI1HDOvPKut9w.Ofi4G5JcwwDDS3vz8kqzCHl/U3jQJtC',1,'45654545454'),(25,1,'JOSE TADEU ROSA JUNIOR','josetadeu33217610@gmail.com','$2y$10$Rp7Q4rcZbVo2ViChL9MMQ.Lk2.0OBl.e.iKdNACuCdBfCksKjZNlm',1,'+5543996456338'),(29,1,'JUMG','jumg@gmail.com','$2y$10$sF4Avt5Eeq5mCaXnsaipZOiYln.4vB1RuIwrSZ.5hsMoRnj9dJihK',1,'(43)96456-338'),(30,3,'Ednei','ednei_goncalvesdasilva123456789@gmail.com','$2y$10$x89ONnaJgGe6h.KfLSkN/.Q9XSTqFt3XDYT2U4n7cEfPJcytSB4l6',1,'(43)54545-4554'),(31,2,'Jose Tadeu Rosa Junior','jose.junior@acessorias.com','$2y$10$vhu/ll1xRaXWt8mAPS9eTurgifG4MnuEMaNX5qFzIeJ5EPH9yQRoq',1,'43996456338'),(32,3,'Osny ','osn1@gmail.com','$2y$10$nD2QmgagsBkFmg8eTPaFy.Lyx7U6oEYcnEKr6hgAtzH1093nMhLzC',1,'5646565465'),(33,2,'Abner Cezar','abnercezar@gmail.com','$2y$10$xgJxxURv/sBGTcVmgrw/IO53OCQyM15VH7w9Id4Qu.QYw/3cVc3mm',1,'(43)99645-6338'),(34,3,'Arenildo','arenildo@gmail.com','$2y$10$sHFUB345IyOj3U61cX9G../Y0Hd3kvPmlKxU7o6Y2v6Th0ocVFW1i',1,'(43)99646-6338'),(35,3,'Arenildo','arenildo@gmail.com','$2y$10$uddBK6sIFp66GeyKTKABreDNzk1v0Cc4/Hi5I3UaCcx0tSqdiHg0m',0,'(43)99646-6338'),(36,1,'admin','admin@gmail.com','$2y$10$E.dYCoZDziTozbeF.WDlueqnfXZrliWfGGp4o1n3EN5yWYH//0COW',1,'(43)99645-6338'),(37,2,'Junior suporte','junim@gmail.com','$2y$10$xNT/Lq2Gib9YsZFnGBIs6..0Q9jXkaRfrKQJvy1Xq10cDr5NQ3LHK',1,'(42)33245-4554'),(38,3,'jose Tadeu Rosa Pai','joseteste@gmail.com','$2y$10$Wf4Ma9C9vsFBEmkVoNTwvegAaKsIcsdtCOyNfzJfA0vLfOldD.Feu',1,'(43)98430-1230'),(39,2,'Bie','bie2@gmail.com','$2y$10$c7r2xKkO3.i/TpbjfHhD...4r2PBW4Hw2yK5I5pK5Rlf.J7VcTilq',1,'(43)12356-6546'),(40,2,'Pedro teste','pedro@gmail.com','$2y$10$Bq2JkNaMrg7PqTO246sASeF9xkOekez4q5vz2AyDQm/TbbkvE/FIy',0,'(45)46546-5465'),(41,3,'joao','empresa@gmail.com','$2y$10$yjrtO56Jr2nJ83NGN3LjRO4PF3um.O5DBmW4C6NKyvGgZLCSfUOsa',1,'(44)65456-4564'),(42,1,'','','$2y$10$mI5MRryxOYwt2ErFZ1uaj.danGUVkH9r05n9cp74NBUpjyRuVHGdi',1,''),(43,1,'ddsdsadsadas','','$2y$10$b7QfeFOByMOX1fSan493Mu/uEcJQPnmK2c/snPcaA43codLNGp/7S',1,'');
/*!40000 ALTER TABLE `tb_usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tb_vendas`
--

DROP TABLE IF EXISTS `tb_vendas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tb_vendas` (
  `VendaID` int NOT NULL AUTO_INCREMENT,
  `VendaDT` date NOT NULL,
  `VendaValorTotal` decimal(10,2) DEFAULT '0.00',
  `VendaDesconto` decimal(10,2) DEFAULT '0.00',
  `VendaFaturado` char(1) DEFAULT 'N',
  `VendaCliID` int NOT NULL,
  `VendaEmpID` int NOT NULL,
  `VendaUserID` int NOT NULL,
  `VendaLancamentoID` int DEFAULT NULL,
  PRIMARY KEY (`VendaID`),
  KEY `fk_tb_vendas_1_idx` (`VendaCliID`),
  KEY `fk_tb_vendas_2_idx` (`VendaEmpID`),
  KEY `fk_tb_vendas_3_idx` (`VendaUserID`),
  CONSTRAINT `fk_tb_vendas_1` FOREIGN KEY (`VendaCliID`) REFERENCES `tb_cliente` (`CliID`),
  CONSTRAINT `fk_tb_vendas_2` FOREIGN KEY (`VendaEmpID`) REFERENCES `tb_empresa` (`EmpID`),
  CONSTRAINT `fk_tb_vendas_3` FOREIGN KEY (`VendaUserID`) REFERENCES `tb_usuario` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb3;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tb_vendas`
--

LOCK TABLES `tb_vendas` WRITE;
/*!40000 ALTER TABLE `tb_vendas` DISABLE KEYS */;
INSERT INTO `tb_vendas` VALUES (25,'2022-09-06',200.00,NULL,'S',17,18,14,41),(29,'2022-09-08',20.00,0.00,NULL,1,10,6,0),(32,'2022-09-13',20.00,0.00,'S',4,10,6,51),(34,'2022-09-17',42.00,36.00,'S',39,20,16,53);
/*!40000 ALTER TABLE `tb_vendas` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-02-17 12:06:05
