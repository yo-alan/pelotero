-- MySQL dump 10.13  Distrib 5.5.34, for debian-linux-gnu (i686)
--
-- Host: localhost    Database: pelotero
-- ------------------------------------------------------
-- Server version	5.5.34-0ubuntu0.12.04.1-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cliente`
--

DROP TABLE IF EXISTS `cliente`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nom_tel` (`nombre`,`telefono`)
) ENGINE=InnoDB AUTO_INCREMENT=391 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cliente`
--

LOCK TABLES `cliente` WRITE;
/*!40000 ALTER TABLE `cliente` DISABLE KEYS */;
INSERT INTO `cliente` VALUES (1,'Abdona','15433698'),(201,'Abilio','15216179'),(202,'Abundio','15387207'),(203,'Acacio','15287499'),(2,'Adolfina','15371183'),(204,'Agapito','15275875'),(3,'Agripina','15554820'),(4,'Aleja','15660553'),(5,'Altagracia','15638307'),(6,'Amadora','15209874'),(205,'Amalio','15516878'),(206,'Ambrosio','15756766'),(7,'Amelia','15134449'),(8,'Anastasia','1542623'),(9,'Anatolia','15809770'),(10,'Aniceta','15920980'),(207,'Aniceto','15233196'),(208,'Anselmo','15895681'),(209,'Antenor','15778820'),(11,'Antolina','15175591'),(210,'Apolinario','15207055'),(12,'Apolonia','15115016'),(211,'Apolonio','15698817'),(212,'Aquilino','15872919'),(13,'Arcadia','1548309'),(14,'Argimira','15896495'),(213,'Argimiro','15268146'),(214,'Arquimimo','15721974'),(215,'Arsenio','15805430'),(15,'Arundina','15337552'),(216,'Ascensio','15861231'),(217,'Asterio','15889865'),(16,'Atanasia','15998272'),(218,'Atanasio','15865631'),(219,'Atilano','15658563'),(17,'Áurea','15978705'),(220,'Áureo','15695922'),(221,'Avelino','15503919'),(18,'Babila','15898708'),(19,'Balbina','15557427'),(20,'Baltasara','1591010'),(222,'Bartolo','15431833'),(223,'Basilio','15647408'),(21,'Basilisa','15782772'),(224,'Baudilio','15941540'),(225,'Belarmino','15765475'),(226,'Benigno','152759'),(22,'Benilde','15640828'),(23,'Bercia','15855826'),(24,'Bernabea','15356645'),(25,'Bernarda','15215746'),(26,'Blacina','158799'),(27,'Blandina','15396757'),(28,'Blasina','15957386'),(30,'Bonifacia','15111155'),(227,'Bonifacio','15717369'),(29,'Brígida','15596663'),(228,'Buenaventura','15578567'),(31,'Calista','15765788'),(229,'Calisto','15740728'),(230,'Calixto','15967940'),(231,'Casiano','15617516'),(32,'Casilda','15495473'),(232,'Casildo','15183762'),(234,'Casimiro','15780020'),(233,'Castiano','1566261'),(33,'Castora','15180005'),(235,'Catarino','15701320'),(34,'Cayetana','15413604'),(236,'Cecilio','15166537'),(237,'Celdonio','15728728'),(35,'Celedonia','15528007'),(238,'Celedonio','15144029'),(36,'Celestina','15399223'),(37,'Celina','15412096'),(38,'Cesárea','15862809'),(239,'Cesáreo','15533961'),(240,'Cipriaco','15237718'),(241,'Cipriano','15586707'),(242,'Cipriniano','15220384'),(243,'Ciriaco','15341797'),(244,'Cirilo','1547833'),(39,'Clementa','1577761'),(245,'Clemente','15213778'),(40,'Cleofé','15800375'),(246,'Cleto','15925388'),(247,'Columbano','15985608'),(248,'Conrado','15151877'),(249,'Crescencio','15802563'),(41,'Crisanta','15768594'),(42,'Crisóstoma','15441845'),(250,'Crisóstomo','15557184'),(251,'Crispín','15378229'),(43,'Críspula','15903445'),(252,'Críspulo','15219597'),(44,'Cristeta','15191690'),(253,'Cruz','15963296'),(45,'Dámasa','15248117'),(46,'Demetria','15665515'),(254,'Deogracias','15157690'),(47,'Diega','15583223'),(48,'Dionisia','15919570'),(255,'Dionisio','15898561'),(256,'Domiciano','1519736'),(49,'Dominga','15848181'),(50,'Dominica','15482195'),(51,'Dorotea','15866434'),(257,'Doroteo','15402998'),(52,'Dosinda','15885587'),(53,'Edelmira','15828634'),(54,'Edicta','15486408'),(55,'Eduvigis','15946138'),(56,'Efigenia','15271468'),(57,'Eleuteria','15518925'),(258,'Eleuterio','15955783'),(58,'Eliboria','15780223'),(59,'Elicia','15344339'),(259,'Eliodoro','15569919'),(260,'Eliseo','15982249'),(60,'Emerenciana','15381029'),(261,'Emerico','15201488'),(61,'Emeteria','15872127'),(262,'Emeterio','1560691'),(263,'Emmanuel','15698995'),(264,'Epafrodito','15312901'),(62,'Epifania','15217549'),(265,'Epifanio','15467523'),(63,'Ermisinda','15471365'),(64,'Escolástica','15704179'),(266,'Escolástico','15398910'),(65,'Esmaragda','15106799'),(66,'Esmerencia','15421460'),(67,'Estanislá','15786902'),(267,'Estanislao','15591982'),(68,'Etelvina','15670132'),(69,'Eudosia','15989955'),(268,'Eufrasio','15763180'),(70,'Eulocadia','15939378'),(71,'Eulogia','15727025'),(269,'Eulogio','1539954'),(72,'Eustaquia','15816993'),(270,'Eutropio','15910230'),(74,'Evarista','1568481'),(271,'Evelio','15431291'),(73,'Ezequiela','15903892'),(272,'Fabriciano','15425764'),(75,'Facunda','15630728'),(76,'Fausta','15948199'),(273,'Faustina','15834947'),(96,'Felicia','15171555'),(77,'Felicia','15848811'),(79,'Feliciana','15450855'),(274,'Feliciano','15897442'),(78,'Felisa','15399457'),(97,'Fidela','15103265'),(275,'Florencio','15982372'),(276,'Floro','15219534'),(80,'Fredesvinda','1555903'),(277,'Froilán','15150553'),(98,'Froilana','151660'),(81,'Froilana','15926951'),(278,'Fructuoso','1594165'),(279,'Frutos','1519167'),(82,'Fulgencia','15467046'),(280,'Fulgencio','15813339'),(83,'Garicia','15554377'),(84,'Gaspara','15370749'),(85,'Gelsumina','15190613'),(86,'Genoveva','15840818'),(88,'Gertrudis','15638802'),(89,'Gervasia','15297256'),(87,'Getrudis','15632251'),(90,'Gliceria','15569878'),(91,'Gracia','15957620'),(92,'Graciana','1578467'),(93,'Gregoria','15519478'),(281,'Gregorio','159194'),(282,'Guadalupe','15605953'),(94,'Guillerma','15361987'),(95,'Gumersinda','15251503'),(283,'Gumersindo','152187'),(284,'Helimenas','15193073'),(99,'Hemetria','15698505'),(100,'Hermelinda','15487545'),(285,'Hermenegildo','15958805'),(101,'Herminia','15342213'),(286,'Herminio','15214808'),(287,'Hermógenes','15197624'),(288,'Higinio','15343699'),(102,'Hilaria','15248430'),(289,'Hilario','15125623'),(290,'Hilarión','15597018'),(103,'Hiltrudis','15215512'),(291,'Hipólito','15608220'),(104,'Humildad','15332269'),(105,'Ildefonsa','1514812'),(107,'Ilora','15341821'),(106,'Indalecia','1577251'),(292,'Indalecio','15250046'),(293,'Inocente','15425571'),(294,'Isabelo','15377718'),(108,'Isidora','15477352'),(295,'Isidoro','15611878'),(109,'Isidra','15361297'),(142,'Jacinta','15959525'),(110,'Jacoba','15374429'),(111,'Jerónima','15788254'),(143,'Jesusa','1531596'),(112,'Jesusa','15817983'),(113,'Jorja','15725154'),(114,'Juliana','15171820'),(296,'Juvernón','15926237'),(115,'Laureana','15683640'),(297,'Laureano','15795552'),(298,'Leandro','15199050'),(116,'Leocadia','15902738'),(299,'Leocadio','15608593'),(300,'León','15445815'),(117,'Leoncia','15462774'),(118,'Leovigilda','15605655'),(301,'Leovigildo','15403297'),(302,'Lesmes','15679039'),(119,'Liberata','15639954'),(303,'Liborio','15185307'),(120,'Librada','15382807'),(304,'Lisardo','15889420'),(305,'Longinos','15891176'),(121,'Lopa','15994173'),(306,'Lope','15787622'),(122,'Lorenza','15822444'),(123,'Luciana','15129703'),(124,'Lucrecia','15181181'),(307,'Lupicinio','15264581'),(308,'Macabeo','15960038'),(309,'Macario','156451'),(310,'Macedonio','15152142'),(312,'Magin','15250354'),(125,'Mamesa','15516796'),(126,'Marciala','1540437'),(127,'Marciana','15651800'),(311,'Margarito','15741356'),(128,'Matea','15137689'),(129,'Matiasa','15733047'),(313,'Mauro','1527704'),(130,'Máxima','15252169'),(314,'Maximino','15387459'),(315,'Medardo','15854185'),(131,'Melchora','1561703'),(316,'Melitón','15108546'),(132,'Melitona','15552009'),(317,'Melquiades','15980175'),(133,'Micaela','15574936'),(134,'Miguela','15218656'),(318,'Minervino','15575238'),(319,'Minervo','15935664'),(135,'Montserrate','15368470'),(320,'Natalio','15952609'),(136,'Nazaria','15186383'),(137,'Nemesia','15826506'),(321,'Nemesio','15956052'),(138,'Nestora','15573383'),(322,'Nicanor','15922435'),(139,'Nicanora','15387398'),(140,'Nicasia','15216841'),(323,'Niceto','15744019'),(324,'Nicomedes','15952790'),(141,'Nolasca','15922009'),(325,'Nolasco','15531893'),(326,'Norberto','15801097'),(144,'Obdulia','15279409'),(327,'Odón','15409808'),(145,'Olalla','15302255'),(146,'Olaya','15673049'),(328,'Orencio','15645746'),(147,'Orosia','15458480'),(329,'Pantaleón','15999309'),(148,'Parda','15273252'),(149,'Paspasia','15990822'),(332,'Patricio','15315121'),(150,'Patrocinia','15134354'),(330,'Paulilo','1559307'),(331,'Paulino','15298608'),(151,'Peregrina','15699304'),(333,'Perfecto','15679782'),(152,'Perpétua','1593460'),(153,'Petra','15369388'),(154,'Petrola','15566560'),(334,'Petrolino','15453547'),(155,'Petrona','15724639'),(156,'Petronila','15923513'),(335,'Petronilo','15228387'),(157,'Pia','15443651'),(336,'Pío','15781297'),(337,'Policarpo','15221326'),(158,'Polonia','15447713'),(338,'Polonio','15762737'),(159,'Pomposa','15907615'),(339,'Pomposo','15149707'),(340,'Ponciano','15460323'),(160,'Potencia','15194936'),(161,'Práxedes','15251835'),(162,'Preciosa','15674369'),(341,'Primitivo','15852498'),(163,'Prisca','15616339'),(164,'Priscila','1558588'),(342,'Protasio','15881520'),(343,'Prudencio','15850108'),(165,'Quintina','15443926'),(166,'Quiteria','1543863'),(344,'Radamés','15605982'),(167,'Ramira','15887541'),(345,'Regino','15479584'),(346,'Remigio','15579974'),(168,'Reparada','15306116'),(347,'Restituto','15461121'),(169,'Ricarda','15867959'),(348,'Rinaldo','15565683'),(349,'Robustiano','15445051'),(170,'Romualda','15421447'),(350,'Romualdo','15528208'),(351,'Rómulo','15305886'),(352,'Rosalino','15944806'),(171,'Rudesinda','15503356'),(172,'Rufa','15252440'),(173,'Rufina','15752133'),(354,'Rufino','15197458'),(355,'Rufo','15568165'),(353,'Ruperto','15806375'),(356,'Sabas','15248450'),(357,'Sabiniano','15537755'),(174,'Salvadora','153345'),(358,'Salvio','15943428'),(175,'Sancia','15760328'),(176,'Sandalia','15791606'),(359,'Sandalio','15103875'),(177,'Santas','15677046'),(178,'Santiaga','1510413'),(179,'Saturia','1520929'),(360,'Saturio','15689089'),(180,'Saturnina','1573406'),(361,'Saturnino','15133824'),(362,'Sauro','15601850'),(181,'Sebastiana','15304242'),(182,'Segunda','15300994'),(183,'Semproniana','15592242'),(184,'Serapia','1558231'),(363,'Serapio','15607780'),(365,'Serbando','15343419'),(185,'Sergia','15514431'),(364,'Servando','15233352'),(366,'Severo','1517042'),(367,'Silverio','1554952'),(186,'Silvestra','15397459'),(368,'Silvestre','15223635'),(369,'Silvio','15953319'),(370,'Simeón','1595693'),(187,'Simeona ','15444006'),(188,'Simona','1527652'),(371,'Sinforosio','15618506'),(372,'Sinforoso','15805450'),(189,'Socorro','15806242'),(373,'Sofío','15171736'),(374,'Sofronio','15442330'),(190,'Sotera','15948254'),(375,'Sotero','15696441'),(377,'Telesforo','15686760'),(191,'Teodomira','15322546'),(192,'Teodora','15767968'),(193,'Teodosia','15872201'),(376,'Teódulo','15155217'),(378,'Teopisto','15968150'),(379,'Tereso','15780472'),(194,'Tiburcia','1557105'),(380,'Tiburcio','15997910'),(195,'Timotea','15668920'),(381,'Timoteo','15648133'),(196,'Tomasa','15173284'),(197,'Toribia','15859663'),(382,'Toribio','15246936'),(383,'Trifón','15290281'),(384,'Trinitario','15710599'),(385,'Ulpiano','15682152'),(386,'Ursicino','15278964'),(198,'Úrsula','15778462'),(387,'Valeriano','15348365'),(199,'Venancia','15313323'),(388,'Venancio','15904932'),(200,'Veremunda','15231230'),(389,'Victoriano','15479566'),(390,'Zoilo','15683036');
/*!40000 ALTER TABLE `cliente` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `reserva`
--

DROP TABLE IF EXISTS `reserva`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `reserva` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` enum('9:00','13:00','15:00','17:00','19:00','21:00') NOT NULL,
  `vigente` tinyint(1) NOT NULL DEFAULT '1',
  `senia` decimal(11,2) DEFAULT '0.00',
  PRIMARY KEY (`id`),
  UNIQUE KEY `horario` (`fecha`,`hora`),
  KEY `fk_cliente` (`cliente_id`),
  CONSTRAINT `fk_cliente` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=333 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `reserva`
--

LOCK TABLES `reserva` WRITE;
/*!40000 ALTER TABLE `reserva` DISABLE KEYS */;
INSERT INTO `reserva` VALUES (1,197,'2013-12-29','15:00',1,249.00),(2,201,'2013-12-19','15:00',1,41.00),(3,20,'2013-12-25','15:00',1,222.00),(4,209,'2013-12-15','15:00',1,73.00),(5,13,'2013-11-25','15:00',1,5.00),(6,350,'2013-12-07','15:00',1,11.00),(7,305,'2014-01-12','15:00',1,294.00),(8,335,'2013-11-30','15:00',1,6.00),(9,174,'2013-12-08','15:00',1,287.00),(10,119,'2014-01-03','15:00',1,276.00),(11,181,'2014-01-04','15:00',1,92.00),(12,137,'2013-12-26','15:00',1,6.00),(14,72,'2014-01-19','15:00',1,269.00),(15,288,'2014-01-16','15:00',1,276.00),(16,97,'2013-12-13','15:00',1,269.00),(21,232,'2014-01-07','15:00',1,163.00),(22,83,'2013-12-09','15:00',1,116.00),(23,121,'2013-11-24','15:00',1,289.00),(24,289,'2014-01-17','15:00',1,230.00),(25,122,'2013-12-04','15:00',1,297.00),(26,350,'2014-01-18','15:00',1,236.00),(27,133,'2013-12-14','15:00',1,124.00),(28,3,'2014-01-21','15:00',1,145.00),(29,190,'2014-01-06','15:00',1,109.00),(30,166,'2013-12-21','15:00',1,161.00),(31,343,'2014-01-01','15:00',1,46.00),(32,334,'2014-01-08','15:00',1,76.00),(33,248,'2013-11-28','15:00',1,195.00),(34,275,'2014-01-15','15:00',1,22.00),(35,34,'2013-12-18','15:00',1,166.00),(36,90,'2013-12-17','15:00',1,149.00),(40,115,'2013-12-23','15:00',1,213.00),(43,275,'2014-01-11','15:00',1,293.00),(45,4,'2013-12-06','15:00',1,93.00),(46,94,'2013-12-12','15:00',1,127.00),(48,143,'2013-12-30','15:00',1,150.00),(49,331,'2013-12-27','15:00',1,147.00),(50,15,'2014-01-05','15:00',1,26.00),(52,259,'2013-12-01','15:00',1,55.00),(54,184,'2013-11-28','9:00',1,283.00),(55,71,'2013-12-18','9:00',1,292.00),(56,136,'2013-12-25','9:00',1,253.00),(57,11,'2014-01-21','9:00',1,12.00),(58,107,'2013-12-06','9:00',1,141.00),(59,7,'2014-01-01','9:00',1,155.00),(60,259,'2014-01-18','9:00',1,295.00),(61,133,'2014-01-14','9:00',1,135.00),(63,214,'2014-01-20','9:00',1,139.00),(64,216,'2013-12-01','9:00',1,35.00),(65,323,'2014-01-05','9:00',1,256.00),(66,365,'2013-12-17','9:00',1,199.00),(67,350,'2014-01-16','9:00',1,170.00),(68,151,'2013-11-24','9:00',1,142.00),(69,96,'2014-01-02','9:00',1,52.00),(70,352,'2013-12-31','9:00',1,99.00),(73,363,'2013-11-30','9:00',1,26.00),(74,304,'2014-01-17','9:00',1,73.00),(75,286,'2014-01-07','9:00',1,195.00),(76,300,'2013-12-28','9:00',1,63.00),(78,267,'2014-01-03','9:00',1,252.00),(79,23,'2014-01-13','9:00',1,60.00),(81,136,'2014-01-12','9:00',1,216.00),(82,231,'2013-12-30','9:00',1,236.00),(84,203,'2013-12-27','9:00',1,30.00),(87,223,'2014-01-08','9:00',1,25.00),(89,225,'2013-12-09','9:00',1,84.00),(90,317,'2013-12-15','9:00',1,277.00),(91,173,'2013-12-20','9:00',1,28.00),(93,7,'2013-12-04','9:00',1,135.00),(94,40,'2013-12-08','9:00',1,15.00),(97,328,'2013-12-19','9:00',1,277.00),(98,3,'2013-12-02','9:00',1,216.00),(99,271,'2013-12-07','9:00',1,133.00),(102,33,'2014-01-10','9:00',1,44.00),(105,357,'2014-01-18','17:00',1,51.00),(106,98,'2014-01-21','17:00',1,191.00),(107,98,'2013-11-23','17:00',1,299.00),(108,370,'2014-01-19','17:00',1,87.00),(109,285,'2014-01-14','17:00',1,73.00),(111,86,'2013-12-13','17:00',1,289.00),(112,312,'2013-11-27','17:00',1,86.00),(113,32,'2014-01-06','17:00',1,208.00),(114,30,'2013-12-02','17:00',1,166.00),(115,344,'2013-12-26','17:00',1,81.00),(116,18,'2013-12-21','17:00',1,132.00),(117,149,'2014-01-17','17:00',1,104.00),(118,100,'2013-12-07','17:00',1,166.00),(119,152,'2013-12-01','17:00',1,145.00),(120,240,'2013-12-31','17:00',1,153.00),(121,278,'2013-11-25','17:00',1,70.00),(122,371,'2013-12-05','17:00',1,270.00),(125,70,'2013-12-19','17:00',1,287.00),(126,53,'2014-01-11','17:00',1,241.00),(127,27,'2014-01-07','17:00',1,188.00),(129,328,'2013-12-14','17:00',1,66.00),(130,375,'2013-12-18','17:00',1,231.00),(131,127,'2013-12-12','17:00',1,64.00),(132,63,'2013-12-04','17:00',1,78.00),(133,97,'2013-12-09','17:00',1,84.00),(134,318,'2013-12-15','17:00',1,270.00),(135,135,'2013-11-26','17:00',1,118.00),(136,264,'2013-11-24','17:00',1,151.00),(139,261,'2014-01-13','17:00',1,183.00),(141,101,'2013-11-29','17:00',1,236.00),(142,134,'2013-12-17','17:00',1,278.00),(144,100,'2013-11-28','17:00',1,94.00),(146,282,'2013-12-30','17:00',1,163.00),(149,208,'2013-12-10','17:00',1,228.00),(151,81,'2014-01-12','17:00',1,116.00),(153,183,'2013-12-29','17:00',1,136.00),(154,254,'2014-01-08','17:00',1,9.00),(157,119,'2013-12-27','17:00',1,270.00),(159,131,'2014-01-01','17:00',1,151.00),(160,247,'2014-01-02','17:00',1,227.00),(162,316,'2013-12-16','17:00',1,171.00),(169,16,'2014-01-15','17:00',1,154.00),(170,97,'2014-01-16','17:00',1,276.00),(174,112,'2013-12-17','21:00',1,188.00),(175,279,'2014-01-03','21:00',1,197.00),(176,91,'2013-12-02','21:00',1,249.00),(177,117,'2013-11-28','21:00',1,223.00),(178,99,'2013-12-06','21:00',1,298.00),(179,276,'2014-01-12','21:00',1,214.00),(180,207,'2014-01-21','21:00',1,74.00),(181,142,'2013-12-03','21:00',1,134.00),(183,62,'2014-01-06','21:00',1,121.00),(184,233,'2013-12-25','21:00',1,11.00),(185,381,'2014-01-20','21:00',1,106.00),(186,375,'2014-01-18','21:00',1,38.00),(187,1,'2013-12-28','21:00',1,285.00),(188,94,'2013-11-24','21:00',1,21.00),(189,109,'2013-11-26','21:00',1,289.00),(190,194,'2014-01-07','21:00',1,208.00),(192,161,'2013-12-30','21:00',1,30.00),(193,305,'2014-01-15','21:00',1,274.00),(194,116,'2014-01-17','21:00',1,300.00),(195,176,'2013-12-20','21:00',1,244.00),(197,171,'2013-11-27','21:00',1,114.00),(198,201,'2013-12-11','21:00',1,230.00),(199,388,'2014-01-04','21:00',1,296.00),(200,282,'2013-12-26','21:00',1,154.00),(201,108,'2014-01-05','21:00',1,168.00),(202,208,'2014-01-02','21:00',1,199.00),(208,174,'2013-12-05','21:00',1,165.00),(215,46,'2013-12-27','21:00',1,278.00),(217,353,'2013-12-08','21:00',1,47.00),(219,4,'2013-12-04','21:00',1,182.00),(220,361,'2013-12-31','21:00',1,268.00),(222,136,'2013-12-12','21:00',1,28.00),(224,246,'2014-01-22','21:00',1,57.00),(226,174,'2014-01-03','19:00',1,295.00),(227,328,'2013-12-15','19:00',1,259.00),(228,60,'2013-12-05','19:00',1,155.00),(229,143,'2013-12-01','19:00',1,167.00),(230,373,'2013-12-14','19:00',1,26.00),(231,149,'2013-12-27','19:00',1,191.00),(232,323,'2013-12-13','19:00',1,211.00),(233,186,'2013-12-21','19:00',1,262.00),(234,214,'2013-12-22','19:00',1,132.00),(235,126,'2013-12-07','19:00',1,163.00),(236,103,'2014-01-12','19:00',1,59.00),(238,226,'2014-01-20','19:00',1,130.00),(239,149,'2014-01-19','19:00',1,222.00),(240,370,'2014-01-16','19:00',1,129.00),(241,287,'2013-12-16','19:00',1,180.00),(242,284,'2013-12-25','19:00',1,216.00),(243,175,'2013-11-24','19:00',1,279.00),(245,135,'2013-11-25','19:00',1,63.00),(247,268,'2013-12-20','19:00',1,93.00),(249,196,'2013-11-26','19:00',1,173.00),(250,214,'2013-12-06','19:00',1,38.00),(251,126,'2013-11-30','19:00',1,137.00),(253,128,'2013-12-19','19:00',1,61.00),(257,175,'2013-12-23','19:00',1,174.00),(258,352,'2013-12-29','19:00',1,184.00),(261,16,'2014-01-07','19:00',1,296.00),(262,152,'2014-01-15','19:00',1,280.00),(263,126,'2013-12-26','19:00',1,33.00),(264,83,'2013-12-24','19:00',1,282.00),(267,24,'2014-01-11','19:00',1,281.00),(268,292,'2014-01-04','19:00',1,55.00),(269,289,'2013-12-10','19:00',1,98.00),(271,6,'2014-01-09','19:00',1,82.00),(274,186,'2013-11-27','19:00',1,214.00),(275,71,'2013-12-31','19:00',1,29.00),(276,254,'2014-01-18','19:00',1,124.00),(278,384,'2014-01-14','13:00',1,147.00),(279,86,'2014-01-07','13:00',1,202.00),(280,322,'2013-11-24','13:00',1,258.00),(281,76,'2013-12-05','13:00',1,250.00),(282,369,'2013-12-03','13:00',1,291.00),(283,328,'2013-12-22','13:00',1,284.00),(287,47,'2013-11-25','13:00',1,128.00),(288,376,'2014-01-17','13:00',1,174.00),(289,142,'2013-12-02','13:00',1,96.00),(290,259,'2013-12-17','13:00',1,284.00),(291,127,'2014-01-20','13:00',1,90.00),(292,279,'2013-12-30','13:00',1,25.00),(293,296,'2014-01-04','13:00',1,137.00),(294,16,'2013-12-24','13:00',1,224.00),(297,23,'2013-12-12','13:00',1,24.00),(298,197,'2013-12-20','13:00',1,203.00),(299,259,'2013-12-07','13:00',1,127.00),(302,341,'2014-01-21','13:00',1,70.00),(304,331,'2013-12-18','13:00',1,100.00),(305,65,'2014-01-12','13:00',1,258.00),(306,112,'2014-01-05','13:00',1,166.00),(307,188,'2014-01-02','13:00',1,139.00),(308,108,'2013-12-26','13:00',1,174.00),(309,224,'2013-12-21','13:00',1,61.00),(310,106,'2014-01-19','13:00',1,68.00),(311,179,'2014-01-13','13:00',1,204.00),(312,113,'2013-11-27','13:00',1,137.00),(313,347,'2013-12-14','13:00',1,105.00),(317,269,'2014-01-16','13:00',1,34.00),(318,55,'2013-12-06','13:00',1,2.00),(319,296,'2014-01-10','13:00',1,208.00),(321,172,'2013-12-15','13:00',1,120.00),(322,321,'2013-12-25','13:00',1,200.00),(323,39,'2013-12-29','13:00',1,155.00),(325,195,'2013-12-28','13:00',1,200.00),(328,117,'2013-12-11','13:00',1,229.00),(330,224,'2013-11-30','13:00',1,188.00),(331,163,'2013-12-16','13:00',1,52.00),(332,234,'2013-12-10','13:00',1,145.00);
/*!40000 ALTER TABLE `reserva` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary table structure for view `reservasDeLaSemana`
--

DROP TABLE IF EXISTS `reservasDeLaSemana`;
/*!50001 DROP VIEW IF EXISTS `reservasDeLaSemana`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `reservasDeLaSemana` (
  `nombre` tinyint NOT NULL,
  `telefono` tinyint NOT NULL,
  `fecha` tinyint NOT NULL,
  `hora` tinyint NOT NULL,
  `senia` tinyint NOT NULL,
  `vigente` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `reservasDelDia`
--

DROP TABLE IF EXISTS `reservasDelDia`;
/*!50001 DROP VIEW IF EXISTS `reservasDelDia`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `reservasDelDia` (
  `nombre` tinyint NOT NULL,
  `telefono` tinyint NOT NULL,
  `fecha` tinyint NOT NULL,
  `hora` tinyint NOT NULL,
  `senia` tinyint NOT NULL,
  `vigente` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Temporary table structure for view `reservasDelMes`
--

DROP TABLE IF EXISTS `reservasDelMes`;
/*!50001 DROP VIEW IF EXISTS `reservasDelMes`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `reservasDelMes` (
  `nombre` tinyint NOT NULL,
  `telefono` tinyint NOT NULL,
  `fecha` tinyint NOT NULL,
  `hora` tinyint NOT NULL,
  `senia` tinyint NOT NULL,
  `vigente` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `telefono`
--

DROP TABLE IF EXISTS `telefono`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `telefono` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reserva_id` int(11) NOT NULL,
  `nom_padre` varchar(20) NOT NULL,
  `nom_hijo` varchar(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_reserva` (`reserva_id`),
  CONSTRAINT `fk_reserva` FOREIGN KEY (`reserva_id`) REFERENCES `reserva` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `telefono`
--

LOCK TABLES `telefono` WRITE;
/*!40000 ALTER TABLE `telefono` DISABLE KEYS */;
/*!40000 ALTER TABLE `telefono` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuario`
--

DROP TABLE IF EXISTS `usuario`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(20) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuario`
--

LOCK TABLES `usuario` WRITE;
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `reservasDeLaSemana`
--

/*!50001 DROP TABLE IF EXISTS `reservasDeLaSemana`*/;
/*!50001 DROP VIEW IF EXISTS `reservasDeLaSemana`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `reservasDeLaSemana` AS select `c`.`nombre` AS `nombre`,`c`.`telefono` AS `telefono`,`r`.`fecha` AS `fecha`,`r`.`hora` AS `hora`,`r`.`senia` AS `senia`,`r`.`vigente` AS `vigente` from (`reserva` `r` join `cliente` `c`) where ((`r`.`fecha` < (curdate() + interval 7 day)) and (`r`.`fecha` > curdate()) and (`r`.`cliente_id` = `c`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `reservasDelDia`
--

/*!50001 DROP TABLE IF EXISTS `reservasDelDia`*/;
/*!50001 DROP VIEW IF EXISTS `reservasDelDia`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `reservasDelDia` AS select `c`.`nombre` AS `nombre`,`c`.`telefono` AS `telefono`,`r`.`fecha` AS `fecha`,`r`.`hora` AS `hora`,`r`.`senia` AS `senia`,`r`.`vigente` AS `vigente` from (`reserva` `r` join `cliente` `c`) where ((`r`.`fecha` = curdate()) and (`r`.`cliente_id` = `c`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;

--
-- Final view structure for view `reservasDelMes`
--

/*!50001 DROP TABLE IF EXISTS `reservasDelMes`*/;
/*!50001 DROP VIEW IF EXISTS `reservasDelMes`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8 */;
/*!50001 SET character_set_results     = utf8 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `reservasDelMes` AS select `c`.`nombre` AS `nombre`,`c`.`telefono` AS `telefono`,`r`.`fecha` AS `fecha`,`r`.`hora` AS `hora`,`r`.`senia` AS `senia`,`r`.`vigente` AS `vigente` from (`reserva` `r` join `cliente` `c`) where ((`r`.`fecha` < (curdate() + interval 30 day)) and (`r`.`fecha` > curdate()) and (`r`.`cliente_id` = `c`.`id`)) */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-24 21:39:58
