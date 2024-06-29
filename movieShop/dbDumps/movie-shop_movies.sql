
--
-- Table structure for table `movies`
--

DROP TABLE IF EXISTS `movies`;

CREATE TABLE `movies` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `description` longtext,
  `price` varchar(5) DEFAULT NULL,
  `image` varchar(45) DEFAULT NULL,
  `rating` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `movies`
--

LOCK TABLES `movies` WRITE;
INSERT INTO `movies` VALUES (1,'The Johnsons (1992)','According to an ancient Indian tale a giant monster embryo residing in a crystal vase is predetermined to fertilize a blue-eyed woman. She will give birth to something evil to unleash horror and destruction upon human kind. Ugly septuplet brothers reproduced within the framework of mysterious genetic experiments terrorize a young innocent girl who seems to be chosen for the sinister predestination.\r\n\r\n—Igor Shvetsov <igoryok&dialup.ptt.ru>\r\nTwenty-one years after the birth of seven siblings, Professor Keller is summoned by a government agency to give support to the treatment of the seven men that became killers since they were seven years old. Professor Keller finds a connection with an ancient Indian cult to bring evil to destroy Earth. Meanwhile the photographer Victoria Lucas is invited to take pictures in an isolated place and she travels with her fourteen-year-old daughter Emalee Lucas, who is under psychological treatment due to gruesome nightmares she has, and they camp nearby the facility where the seven brothers are. Out of the blue, the seven brothers escape and hunt Emalee. What is the connection among them?\r\n\r\n—Claudio Carvalho, Rio de Janeiro, Brazil','45','img3.jpg',6),(2,'Avengers: Age of Ultron','Avengers: Age of Ultron is a 2015 American superhero film based on the Marvel Comics superhero team the Avengers. Produced by Marvel Studios and distributed by Walt Disney Studios Motion Pictures, it is the sequel to The Avengers (2012) and the 11th film in the Marvel Cinematic Universe (MCU). Written and directed by Joss Whedon, the film features an ensemble cast including Robert Downey Jr., Chris Hemsworth, Mark Ruffalo, Chris Evans, Scarlett Johansson, Jeremy Renner, Don Cheadle, Aaron Taylor-Johnson, Elizabeth Olsen, Paul Bettany, Cobie Smulders, Anthony Mackie, Hayley Atwell, Idris Elba, Linda Cardellini, Stellan Skarsgård, Claudia Kim, Thomas Kretschmann, James Spader, and Samuel L. Jackson. In the film, the Avengers fight Ultron, an artificial intelligence accidentally created by Tony Stark (Downey) and Bruce Banner (Ruffalo) with the goal of causing human extinction.','3','avengers_age_of_ultron.jpg',8),(3,'mov3','98y oi8ioii8 oi8 oiu8 iuoh oiu ','32','img4.png',5),(4,'mov4','iu7y987 98yh98h 98y89 98y 89 98 y8','35','img.jpg',9),(6,'mov1',' ergrg fghfg gfhf','45','img.jpg',45);
UNLOCK TABLES;