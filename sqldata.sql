-- MySQL dump 10.13  Distrib 5.5.44, for debian-linux-gnu (x86_64)
--
-- Host: 0.0.0.0    Database: Shop
-- Dumping data for table `shop_product`
--

LOCK TABLES `shop_product` WRITE;
/*!40000 ALTER TABLE `shop_product` DISABLE KEYS */;
INSERT INTO `shop_product` VALUES (1,'りんご2',150,''),(2,'ぶどう',200,'search-2.jpg'),(8,'みかん',100,'mikan.jpg'),(9,'マスカット',900,'mascat.gif');
/*!40000 ALTER TABLE `shop_product` ENABLE KEYS */;
UNLOCK TABLES;

-- Dumping data for table `shop_staff`
--

LOCK TABLES `shop_staff` WRITE;
/*!40000 ALTER TABLE `shop_staff` DISABLE KEYS */;
INSERT INTO `shop_staff` VALUES (2,'kame3','902b80d36f815b0395cef825e760705d'),(3,'mikan3','5401399df84c65529d31b20e359511bd');
/*!40000 ALTER TABLE `shop_staff` ENABLE KEYS */;
UNLOCK TABLES;
-- Dump completed on 2017-02-06  5:50:58
