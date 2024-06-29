
--
-- Table structure for table `content`
--

DROP TABLE IF EXISTS `content`;

CREATE TABLE `content` (
  `id` varchar(40) NOT NULL,
  `description` longtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `content`
--

LOCK TABLES `content` WRITE;
INSERT INTO `content` VALUES ('aboutUs','about us'),('contactUs','contact Us');
UNLOCK TABLES;

