-- MariaDB dump 10.17  Distrib 10.4.14-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u304253687_domufinder
-- ------------------------------------------------------
-- Server version	10.4.14-MariaDB-cll-lve

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
-- Table structure for table `Admins`
--

DROP TABLE IF EXISTS `Admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Admins` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `FIRST_NAME` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LAST_NAME` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `USERNAME` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PASSWORD` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Admins`
--

/*!40000 ALTER TABLE `Admins` DISABLE KEYS */;
INSERT INTO `Admins` VALUES (1,'Nehmiya','Shikur','Nema','Nema');
/*!40000 ALTER TABLE `Admins` ENABLE KEYS */;

--
-- Table structure for table `Apartment_Images`
--

DROP TABLE IF EXISTS `Apartment_Images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Apartment_Images` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `IMAGE_DIR` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `APARTMENT_ID` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Apartment-Images` (`APARTMENT_ID`),
  CONSTRAINT `Apartment-Images` FOREIGN KEY (`APARTMENT_ID`) REFERENCES `Apartments` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=171 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Apartment_Images`
--

/*!40000 ALTER TABLE `Apartment_Images` DISABLE KEYS */;
INSERT INTO `Apartment_Images` VALUES (109,'../images/Apartment_images/Single Room-Bydgoszcz-Dworcowa 12 -1-image 0.jpeg',125),(110,'../images/Apartment_images/Single Room-Bydgoszcz-Dworcowa 12 -1-image 1.jpeg',125),(111,'../images/Apartment_images/Studio-Warsaw-Wola 14-image 0.jpeg',126),(112,'../images/Apartment_images/Studio-Warsaw-Wola 14-image 1.jpeg',126),(113,'../images/Apartment_images/Studio-Warsaw-Konarskiego 1-image 0.jpeg',127),(114,'../images/Apartment_images/Studio-Warsaw-Konarskiego 1-image 1.jpeg',127),(115,'../images/Apartment_images/Single Room-Poznan-Stare Miasto 25-image 0.jpeg',128),(116,'../images/Apartment_images/Single Room-Poznan-Stare Miasto 25-image 1.jpeg',128),(117,'../images/Apartment_images/Single Room-Poznan-Stare Miasto 25-image 2.jpeg',128),(120,'../images/Apartment_images/Studio-Łodz-Gdanska 12-image 0.png',130),(121,'../images/Apartment_images/Studio-Łodz-Gdanska 12-image 1.jpeg',130),(122,'../images/Apartment_images/Single Room-Wroclaw-Franciszkańska 8-image 0.png',132),(123,'../images/Apartment_images/Single Room-Wroclaw-Franciszkańska 8-image 1.png',132),(124,'../images/Apartment_images/Single Room-Wroclaw-Franciszkańska 8-image 2.jpeg',132),(125,'../images/Apartment_images/Single Room-Wroclaw-Franciszkańska 8-image 3.jpeg',132),(126,'../images/Apartment_images/Single Room-Poznan-Wielkopolskich 5-image 0.jpeg',133),(127,'../images/Apartment_images/Single Room-Poznan-Wielkopolskich 5-image 1.jpeg',133),(128,'../images/Apartment_images/Single Room-Poznan-Wielkopolskich 5-image 2.jpeg',133),(129,'../images/Apartment_images/1 Bedroom-Gdansk-Grundwalska 2-image 0.jpeg',134),(130,'../images/Apartment_images/1 Bedroom-Gdansk-Grundwalska 2-image 1.jpeg',134),(131,'../images/Apartment_images/1 Bedroom-Gdansk-Grundwalska 2-image 2.jpeg',134),(132,'../images/Apartment_images/1 Bedroom-Gdansk-Grundwalska 2-image 3.jpeg',134),(133,'../images/Apartment_images/Studio-Gdansk-Grundwalska 3-image 0.jpeg',135),(134,'../images/Apartment_images/Studio-Gdansk-Grundwalska 3-image 1.jpeg',135),(135,'../images/Apartment_images/Single Room-Bydgoszcz-Wilenska 4-image 0.jpeg',136),(136,'../images/Apartment_images/Single Room-Bydgoszcz-Wilenska 4-image 1.jpeg',136),(137,'../images/Apartment_images/Single Room-Bydgoszcz-Wilenska 4-image 2.jpg',136),(138,'../images/Apartment_images/Single Room-Bydgoszcz-Wilenska 4-image 3.jpeg',136),(141,'../images/Apartment_images/Studio-Bydgoszcz-Garbary 1-image 0.jpeg',138),(142,'../images/Apartment_images/Studio-Bydgoszcz-Garbary 1-image 1.jpg',138),(143,'../images/Apartment_images/1 Bedroom-Wroclaw-Stare Miasto 6-image 0.jpeg',139),(144,'../images/Apartment_images/1 Bedroom-Wroclaw-Stare Miasto 6-image 2.jpeg',139),(145,'../images/Apartment_images/Single Room-Krakow-Stare Miasto 16 A-image 0.jpeg',140),(146,'../images/Apartment_images/Single Room-Krakow-Stare Miasto 16 A-image 1.jpeg',140),(147,'../images/Apartment_images/Single Room-Krakow-Stare Miasto 16 A-image 2.jpeg',140),(148,'../images/Apartment_images/Single Room-Krakow-Stare Miasto 16 A-image 3.jpeg',140),(155,'../images/Apartment_images/Single Room-Bydgoszcz-DWORCOWA 7-6-image 0.jpeg',143),(156,'../images/Apartment_images/Single Room-Bydgoszcz-DWORCOWA 7-6-image 1.jpeg',143),(157,'../images/Apartment_images/Single Room-Bydgoszcz-DWORCOWA 7-6-image 2.jpeg',143),(160,'../images/Apartment_images/2 Bedroom-Poznan-Stare Miasto 32 A-image 0.jpeg',146),(161,'../images/Apartment_images/2 Bedroom-Poznan-Stare Miasto 32 A-image 1.jpeg',146),(162,'../images/Apartment_images/2 Bedroom-Poznan-Stare Miasto 32 A-image 2.jpeg',146),(163,'../images/Apartment_images/2 Bedroom-Poznan-Stare Miasto 32 A-image 3.jpeg',146),(170,'../images/Apartment_images/Single Room-Warsaw-Kasprzaka 10-image 0.jpeg',151);
/*!40000 ALTER TABLE `Apartment_Images` ENABLE KEYS */;

--
-- Table structure for table `Apartments`
--

DROP TABLE IF EXISTS `Apartments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Apartments` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `LANDLORD_ID` int(11) NOT NULL,
  `FLAT_TYPE_ID` int(11) NOT NULL,
  `CITY_ID` int(11) NOT NULL,
  `ADDRESS` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PRICE` int(11) NOT NULL,
  `UTILITIES_PRICE` int(11) NOT NULL,
  `PROPERTY_DETAILS` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `LISTING_TIME` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`ID`),
  KEY `Landlord` (`LANDLORD_ID`),
  KEY `Cities` (`CITY_ID`),
  KEY `Flat_Type` (`FLAT_TYPE_ID`),
  CONSTRAINT `Cities` FOREIGN KEY (`CITY_ID`) REFERENCES `Cities` (`ID`),
  CONSTRAINT `Flat_Type` FOREIGN KEY (`FLAT_TYPE_ID`) REFERENCES `Flat_Type` (`ID`),
  CONSTRAINT `Landlord` FOREIGN KEY (`LANDLORD_ID`) REFERENCES `Landlords` (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=152 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Apartments`
--

/*!40000 ALTER TABLE `Apartments` DISABLE KEYS */;
INSERT INTO `Apartments` VALUES (125,23,1,1,'Dworcowa 12 -1',750,150,'A single room for students in Dworcowa street which is a 2 minutes walk to the main center of Bydgoszcz .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-06 13:33:47'),(126,22,2,2,'Wola 14',1100,150,'Settle in a classy studio apartment located in the Wola district of warsaw overlooking the city, located on the first floor of a renovated building. The fully equipped kitchenette has been cleverly arranged in a recess that gives the feeling of independent zones. A modern bathroom has been equipped with a comfortable walk-in shower. Two large windows with a beautiful city view let the daylight in. At the entrance you’ll be welcomed by a spacious wardrobe with a mirror surface, additionally reflecting the light. A soft velvet sofa, curtains in grey-blue color, black lamps, and accessories give the interior an outstanding elegance','2021-09-06 13:44:07'),(127,22,2,2,'Konarskiego 1',1000,200,'Settle in a classy studio apartment overlooking the city, located on the first floor of a renovated building. The fully equipped kitchenette has been cleverly arranged in a recess that gives the feeling of independent zones. A modern bathroom has been equipped with a comfortable walk-in shower. Two large windows with a beautiful city view let the daylight in. At the entrance you’ll be welcomed by a spacious wardrobe with a mirror surface, additionally reflecting the light. A soft velvet sofa, curtains in grey-blue color, black lamps, and accessories give the interior an outstanding elegance','2021-09-06 13:49:46'),(128,13,1,4,'Stare Miasto 25',800,200,'A single room for students located in the beautiful town center of Poznan .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-06 13:56:59'),(130,13,2,9,'Gdanska 12',800,160,'A single room for students in Dworcowa street which is a 10 minutes walk to the main center of Lodz .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-06 14:05:59'),(132,14,1,7,'Franciszkańska 8',900,150,'A single room for students in Franciszkanska street which is a 3 minutes walk to the main center of Krakow .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-06 14:15:57'),(133,14,1,4,'Wielkopolskich 5',700,100,' A single room for students located in the beautiful Wielkopolskich area of Poznan where all facilities like supermarkets , tram stops are accessible within  500 meters range .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-06 14:23:47'),(134,24,3,3,'Grundwalska 2',1300,150,'A single room for students located in the beautiful Grundwalska area of Gdansk where all facilities like supermarkets , tram stops are accessible within 200 meters range .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-06 15:00:31'),(135,24,2,3,'Grundwalska 3',950,150,'A studio for students located in the beautiful Grundwalska area of Gdansk where all facilities like supermarkets , tram stops are accessible within 200 meters range .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-06 15:04:38'),(136,24,1,1,'Wilenska 4',600,100,'A single room for students in Wilenska street which is a 15 minutes walk to the main center of Bydgoszcz .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-06 15:10:34'),(138,24,2,1,'Garbary 1',780,120,'A single room for students in Garbary Street which is a 10 minutes walk to the main center of Bydgoszcz .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-06 15:41:39'),(139,24,3,7,'Stare Miasto 6',1300,200,'A single room for students located in the beautiful town center of Wroclaw .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-06 15:58:34'),(140,24,1,8,'Stare Miasto 16 A',900,200,' A single room for students located in the beautiful town center of Krakow .The flat is a 35 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-07 07:27:03'),(143,23,1,1,'DWORCOWA 7-6',900,150,' A single room for students in Dworcowa street which is a 2 minutes walk to the main center of Bydgoszcz .The flat is a 30 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-07 07:44:16'),(146,29,4,4,'Stare Miasto 32 A',2000,300,'A 2 bedroom apartment located in the beautiful town center of Poznan .The flat is a 110 square meter equipped with a bed , chair , lamp and other accessories and also it abides a newly furnished kitchen and bathroom which can host multiple people at a time','2021-09-07 08:40:34'),(151,13,1,2,'Kasprzaka 10',900,150,'Settle in a classy studio apartment located in the Kasprzaka street of warsaw overlooking the city, located on the first floor of a renovated building. The fully equipped kitchenette has been cleverly arranged in a recess that gives the feeling of independent zones. A modern bathroom has been equipped with a comfortable walk-in shower. Two large windows with a beautiful city view let the daylight in. At the entrance you’ll be welcomed by a spacious wardrobe with a mirror surface, additionally reflecting the light. A soft velvet sofa, curtains in grey-blue color, black lamps, and accessories give the interior an outstanding elegance','2021-09-07 09:10:29');
/*!40000 ALTER TABLE `Apartments` ENABLE KEYS */;

--
-- Temporary table structure for view `Apartments_View`
--

DROP TABLE IF EXISTS `Apartments_View`;
/*!50001 DROP VIEW IF EXISTS `Apartments_View`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8;
/*!50001 CREATE TABLE `Apartments_View` (
  `ID` tinyint NOT NULL,
  `LANDLORD_NAME` tinyint NOT NULL,
  `FLAT_TYPE` tinyint NOT NULL,
  `CITY` tinyint NOT NULL,
  `ADDRESS` tinyint NOT NULL,
  `PRICE` tinyint NOT NULL,
  `UTILITIES_PRICE` tinyint NOT NULL,
  `PROPERTY_DETAILS` tinyint NOT NULL,
  `LISTING_TIME` tinyint NOT NULL
) ENGINE=MyISAM */;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `Cities`
--

DROP TABLE IF EXISTS `Cities`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Cities` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Cities`
--

/*!40000 ALTER TABLE `Cities` DISABLE KEYS */;
INSERT INTO `Cities` VALUES (1,'Bydgoszcz'),(2,'Warsaw'),(3,'Gdansk'),(4,'Poznan'),(7,'Wroclaw'),(8,'Krakow'),(9,'Łodz'),(10,'Katowice');
/*!40000 ALTER TABLE `Cities` ENABLE KEYS */;

--
-- Table structure for table `Flat_Type`
--

DROP TABLE IF EXISTS `Flat_Type`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Flat_Type` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Flat_Type`
--

/*!40000 ALTER TABLE `Flat_Type` DISABLE KEYS */;
INSERT INTO `Flat_Type` VALUES (1,'Single Room'),(2,'Studio'),(3,'1 Bedroom'),(4,'2 Bedroom'),(5,'3 Bedroom');
/*!40000 ALTER TABLE `Flat_Type` ENABLE KEYS */;

--
-- Table structure for table `Landlords`
--

DROP TABLE IF EXISTS `Landlords`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `Landlords` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `NAME` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `EMAIL` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PHONE_NUMBER` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ROLE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PROFILE_PICTURE` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `Landlords`
--

/*!40000 ALTER TABLE `Landlords` DISABLE KEYS */;
INSERT INTO `Landlords` VALUES (13,'Peter Dunkan','Peterhomes@gmail.com','+48551290522','Real Estate Agent','Peter Dunkan-Real Estate Agent.jpeg'),(14,'Agnieszka Gosha','AgaGosha@byd.pl','+48729234134','Apartment Owner','Agnieszka Gosha-Apartment Owner.jpeg'),(22,'Marta Helen','martahelen@gmail.com','489324009','Real Estate Agent','Marta Helen-Real Estate Agent.jpeg'),(23,'Francis Gruse','FrancisGruse@gmail.com','829012642','Apartment Owner','Francis Gruse-Apartment Owner.jpeg'),(24,'Katarzyna Andrzej','KatarzynaAndrzej@gmail.com','+48739056890','Apartment Owner','Katarzyna Andrzej-Apartment Owner.jpeg'),(29,'Marcin Robert','MarcinRob@byd.pl','+48724577230','Real Estate Agent','Marcin Robert-Real Estate Agent.jpeg'),(32,'David Marcin','Davidmarcin@gmail.com','673565100','Real Estate Agent','David Marcin-Real Estate Agent.jpeg'),(33,'Ariana Mohler','Ariana@gmail.com','734578199','Real Estate Agent','Ariana Mohler-Real Estate Agent.jpeg');
/*!40000 ALTER TABLE `Landlords` ENABLE KEYS */;

--
-- Dumping routines for database 'u304253687_domufinder'
--

--
-- Final view structure for view `Apartments_View`
--

/*!50001 DROP TABLE IF EXISTS `Apartments_View`*/;
/*!50001 DROP VIEW IF EXISTS `Apartments_View`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8mb4_unicode_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50001 VIEW `Apartments_View` AS select `Apartments`.`ID` AS `ID`,`Landlords`.`NAME` AS `LANDLORD_NAME`,`Flat_Type`.`NAME` AS `FLAT_TYPE`,`Cities`.`NAME` AS `CITY`,`Apartments`.`ADDRESS` AS `ADDRESS`,`Apartments`.`PRICE` AS `PRICE`,`Apartments`.`UTILITIES_PRICE` AS `UTILITIES_PRICE`,`Apartments`.`PROPERTY_DETAILS` AS `PROPERTY_DETAILS`,`Apartments`.`LISTING_TIME` AS `LISTING_TIME` from (((`Apartments` join `Landlords` on(`Apartments`.`LANDLORD_ID` = `Landlords`.`ID`)) join `Flat_Type` on(`Apartments`.`FLAT_TYPE_ID` = `Flat_Type`.`ID`)) join `Cities` on(`Apartments`.`CITY_ID` = `Cities`.`ID`)) order by `Apartments`.`ID` */;
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

-- Dump completed on 2021-10-21 13:12:32
