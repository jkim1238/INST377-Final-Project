-- MySQL dump 10.13 Distrib 8.0.23, for Win64 (x86_64)
--
-- Host: localhost Database: myspotify
-- ------------------------------------------------------
-- Server version 8.0.23
CREATE DATABASE IF NOT EXISTS myspotify;
USE myspotify;
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
-- Table structure for table `artists`
--
DROP TABLE IF EXISTS `artists`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `artists` (
 `artist_id` int NOT NULL AUTO_INCREMENT,
 `artist_first_name` varchar(45) NOT NULL,
 `artist_last_name` varchar(45) DEFAULT NULL,
 `gender` varchar(45) DEFAULT NULL,
 `age` int DEFAULT NULL,
 `birthday` datetime DEFAULT NULL,
 `net_worth` decimal(12,0) DEFAULT NULL,
 PRIMARY KEY (`artist_id`),
 UNIQUE KEY `artist_id_UNIQUE` (`artist_id`)
) ENGINE=InnoDB AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `artists`
--
LOCK TABLES `artists` WRITE;
/*!40000 ALTER TABLE `artists` DISABLE KEYS */;
INSERT INTO `artists` VALUES (1,'Shawn','Mendez','male',20,'1998-08-08
00:00:00',170000000),(2,'Annuel AA','','male',26,'1992-11-26 00:00:00',20000000),
(3,'Ariana','Grande','female',25,'1993-06-26 00:00:00',150000000),
(4,'Ed','Sheeran','male',28,'1991-02-17 00:00:00',160000000),(5,'Lil
Tecca','','male',16,'2002-08-01 00:00:00',1500000),
(6,'Sam','Smith','male',26,'1992-05-19 00:00:00',45000000),(7,'Lil Nas
X','','male',20,'1999-04-09 00:00:00',41000000),
(8,'Billie','Eilish','female',17,'2001-12-18 00:00:00',25000000),(9,'Bad
Bunny','','male',25,'1994-03-10 00:00:00',8000000),(10,'DJ
Snake','','male',32,'1986-06-13 00:00:00',8000000),
(11,'Lewis','Calpadi','female',22,'1996-10-07 00:00:00',10000000),
(12,'Drake','','male',32,'1986-10-24 00:00:00',150000000),
(13,'Chris','Brown','male',29,'1989-05-05 00:00:00',50000000),
(14,'J','Balvin','male',32,'1985-05-07 00:00:00',35500000),
(15,'Post','Malone','male',23,'1995-07-04 00:00:00',30000000),
(16,'Y2K','','male',24,'1994-07-27 00:00:00',750000),
(17,'Lizzo','','female',30,'1988-04-27 00:00:00',10000000),(18,'MEDUZA','
','male',NULL,NULL,873000),(19,'Jhay','Cortez','male',26,'1993-04-09
00:00:00',1500000),(20,'Lunay','','male',18,'2000-10-04 00:00:00',1500000),
(21,'Tones and I','','female',19,'2000-08-15 00:00:00',1000000),
(22,'Ali','Gatie','male',21,'1997-05-31 00:00:00',500000),
(23,'Daddy','Yankee','male',43,'1976-02-03 00:00:00',40000000),(24,'The
Chainsmoker',' ','male',NULL,NULL,65000000),(25,'Maluma','','male',25,'1994-01-28
00:00:00',12000000),(26,'Young Thug','','male',27,'1991-08-16 00:00:00',8000000),
(27,'Katy Perry','Perry','female',34,'1984-10-25 00:00:00',310000000),
(28,'Martin','Garrix','male',22,'1996-05-14 00:00:00',20000000),
(29,'Sech','','male',25,'1993-12-03 00:00:00',3000000),(30,'Jonas Brothers','
','male',NULL,NULL,150000000),(31,'Lauv','','male',24,'1994-08-08
00:00:00',2000000),(32,'Kygo','','male',27,'1991-09-11 00:00:00',25000000),
(33,'Taylor','Swift','female',29,'1989-12-13 00:00:00',360000000),(34,'Lady
Gaga','','female',33,'1986-03-28 00:00:00',275000000),
(35,'Khalid','','male',21,'1998-02-11 00:00:00',6000000),
(36,'Rosalia','','female',25,'1993-09-25 00:00:00',5000000),
(37,'Marshmello','','male',26,'1992-05-19 00:00:00',40000000),
(38,'Nicky','Jam','male',38,'1981-03-17 00:00:00',6000000),(39,'Karol
G','Ozuna','female',28,'1991-03-14 00:00:00',8000000),
(40,'Camila','Cabello','female',22,'1997-03-03 00:00:00',185000000),(41,'Social
House',' ','male',NULL,NULL,211100),(42,'Justin','Bieber','male',25,'1994-03-01
00:00:00',265000000),(43,'Billy Ray','Cyrus','male',57,'1961-08-25
00:00:00',200000000),(44,'Tainy','','male',29,'1989-08-09 00:00:00',NULL),
(45,'Tyga','','male',29,'1989-11-19 00:00:00',3000000),
(46,'Rick','Ross','male',43,'1976-01-28 00:00:00',400000000),
(47,'Swae','Lee','male',25,'1993-06-07 00:00:00',9000000),
(48,'Prince','Royce','male',29,'1989-05-11 00:00:00',14000000),
(49,'bbno$','','male',23,'1995-06-30 00:00:00',750000),
(50,'Illenium','','male',28,'1990-12-26 00:00:00',2000000),
(51,'Lennon','Stella','female',19,'1999-08-13 00:00:00',127000),
(52,'Travis','Scott','male',27,'1991-04-30 00:00:00',39500000),(53,'J.
Cole','','male',34,'1985-01-28 00:00:00',355000000),
(54,'Macklemore','','male',35,'1983-06-19 00:00:00',32000000),(55,'Fall Out Boy','
','male',NULL,NULL,35000000),(56,'Patrick','Stump','male',34,'1984-04-27
00:00:00',16000000),(57,'Anne-Marie','','female',28,'1991-04-07 00:00:00',600000),
(58,'Bradley','Cooper','male',44,'1975-01-05 00:00:00',100000000),
(59,'Rosala','','female',25,'1993-09-25 00:00:00',NULL),
(60,'El','Guincho','male',35,'1983-11-17 00:00:00',NULL),
(61,'Kane','Brown','male',25,'1993-10-21 00:00:00',6000000),
(62,'Ozuna','','male',27,'1992-03-13 00:00:00',15000000),
(63,'Bebe','Rexha','female',29,'1989-08-30 00:00:00',5000000),
(64,'PnB','Rock','male',27,'1991-12-09 00:00:00',3000000),(65,'Chance the
Rapper','','male',26,'1993-04-16 00:00:00',25000000);
/*!40000 ALTER TABLE `artists` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Temporary view structure for view `female_artists_song`
--
DROP TABLE IF EXISTS `female_artists_song`;
/*!50001 DROP VIEW IF EXISTS `female_artists_song`*/;
SET @saved_cs_client = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `female_artists_song` AS SELECT
 1 AS `Track No.`,
 1 AS `Track Name`,
 1 AS `Artist Name`,
 1 AS `Spotify Song Rank`,
 1 AS `Gender`*/;
SET character_set_client = @saved_cs_client;
--
-- Table structure for table `genre`
--
DROP TABLE IF EXISTS `genre`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `genre` (
 `genre_id` int NOT NULL AUTO_INCREMENT,
 `genre_name` varchar(45) NOT NULL,
 `description` varchar(1000) NOT NULL,
 PRIMARY KEY (`genre_id`),
 UNIQUE KEY `genre_id_UNIQUE` (`genre_id`),
 UNIQUE KEY `genre_name_UNIQUE` (`genre_name`),
 UNIQUE KEY `description_UNIQUE` (`description`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `genre`
--
LOCK TABLES `genre` WRITE;
/*!40000 ALTER TABLE `genre` DISABLE KEYS */;
INSERT INTO `genre` VALUES (1,'canadian rock','Canadian rock describes a wide and
diverse variety of music produced by Canadians.'),(2,'reggaeton','Reggaeton blends
Jamaican music influences of reggae and dancehall with those of Latin America, such
as bomba and plena, as well as that of hip hop.'),(3,'dance pop','Dance pop is
uptempo music intended for nightclubs with the intention of being danceable'),
(4,'pop','Pop is contemporary music and a common type of popular music'),(5,'dfw
rap','DFW stands for Dalls Forth Worth. It is rap music coming out of Dallas.'),
(6,'electropop','Electropop is combining elements of electronic and pop genres'),
(7,'trap music','Trap music uses synthesized drums and is characterized by
complicated hi-hat patterns, tuned kick drums with a long decay, atmospheric
synths, and lyrical content that often focuses on drug use and urban violence.'),
(8,'panamanian pop','Panamanian Pop is pop music that originates in Panama from
Panama Artists.'),(9,'country rap','Country rap (or country hip hop) is a fusion
genre of popular music blending country music with hip hop style rapping.'),
(10,'canadian hip hop','Canadian Hip Hop is Hip Hop music that originates from
Canada from Candanian Artists.'),(11,'latin','Latin music is a term used by the
music industry as a catch all genre for various styles of music from Latin America,
Spain, Portugal, and the United States'),(12,'escape room','Escape Room is to label
a cluster of artists who feel \"connected to trap sonically'),(13,'pop
house','House-Pop is a loosely defined Dance Pop or House sub genre, that is
constituted, primarily, of Dance-Pop songs which proeminently uses House
production'),(14,'canadian pop','Canadian Pop is Pop music that originates from
Canada from Candanian Artists.'),(15,'australian pop','Australian Pop is Pop music
that originates from Australia from Australian Artists.'),(16,'EDM','EDM is a broad
range of percussive electronic music genres made largely for nightclubs, raves, and
festivals.'),(17,'brostep','Brostep is a form of dubstep, popularized in the US. It
is characterized by its lurching and aggressive wubby bass.'),(18,'R&B','R&B, which
stands for Rhythm and Blues, is just that music that is rhythmic and has the
soulful achings of the blues.'),(19,'boy band','Boy Band music is small ensemble of
males in their teens or twenties who play pop songs geared especially to a young 
female audience.'),(20,'atl hip hop','Hip-Hop music that comes from Atlanta.'),
(21,'big room','Big Room is a subgenre of electro house that gained popularity in
the early 2010s');
/*!40000 ALTER TABLE `genre` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Temporary view structure for view `male_artists_song`
--
DROP TABLE IF EXISTS `male_artists_song`;
/*!50001 DROP VIEW IF EXISTS `male_artists_song`*/;
SET @saved_cs_client = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `male_artists_song` AS SELECT
 1 AS `Track No.`,
 1 AS `Track Name`,
 1 AS `Artist Name`,
 1 AS `Spotify Song Rank`,
 1 AS `Gender`*/;
SET character_set_client = @saved_cs_client;
--
-- Table structure for table `mood`
--
DROP TABLE IF EXISTS `mood`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `mood` (
 `mood_id` int NOT NULL AUTO_INCREMENT,
 `mood_name` varchar(45) NOT NULL,
 `mood_description` varchar(500) NOT NULL,
 PRIMARY KEY (`mood_id`),
 UNIQUE KEY `mood_id_UNIQUE` (`mood_id`),
 UNIQUE KEY `mood_name_UNIQUE` (`mood_name`),
 UNIQUE KEY `mood_description_UNIQUE` (`mood_description`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `mood`
--
LOCK TABLES `mood` WRITE;
/*!40000 ALTER TABLE `mood` DISABLE KEYS */;
INSERT INTO `mood` VALUES (1,'Mood Booster','Get happy with today\'s dose of feelgood songs!'),(2,'Swagger','You\'ve got style, coolness, and confidence!'),
(3,'Happy Beats','Feel-good dance music!'),(4,'Happy Hits!','Hits to boost your
mood and fill you with happiness!'),(5,'All The Feels','All the feels. All the
feels.'),(6,'Young & Free','Bring you good enery and good vibes.'),(7,'internet
rewind','Viral classics. Yep, we\'re at that stage.'),(8,'Life Sucks','Feeling like
everything just plain sucks? We\'ve all been there.'),(9,'Songs to Sing to In The
Car','Sing along and enjoy the drive...'),(10,'Some Kinda Way','The feelings you
can\'t put into words...only songs.'),(11,'Fiesta','Party mode ON!'),(12,'Just
Smile','Come on, man. Just smile!'),(13,'The Stress Buster','Breathe deep and
release that pressure.'),(14,'Creativity Boost','Let these innovative tracks spark
your creativity and inspiration.'),(15,'You & Me','It\'s just us - and this
soundtrack.');
/*!40000 ALTER TABLE `mood` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Temporary view structure for view `more_than_100_million_artists_songs`
--
DROP TABLE IF EXISTS `more_than_100_million_artists_songs`;
/*!50001 DROP VIEW IF EXISTS `more_than_100_million_artists_songs`*/;
SET @saved_cs_client = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `more_than_100_million_artists_songs` AS SELECT
 1 AS `CONCAT( artist_first_name, ' ',artist_last_name)`,
 1 AS `Number of Songs`,
 1 AS `net_worth`*/;
SET character_set_client = @saved_cs_client;
--
-- Temporary view structure for view `most_birthday`
--
DROP TABLE IF EXISTS `most_birthday`;
/*!50001 DROP VIEW IF EXISTS `most_birthday`*/;
SET @saved_cs_client = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `most_birthday` AS SELECT
 1 AS `Birthday`,
 1 AS `Number of Artists`*/;
SET character_set_client = @saved_cs_client;
--
-- Temporary view structure for view `songs_30`
--
DROP TABLE IF EXISTS `songs_30`;
/*!50001 DROP VIEW IF EXISTS `songs_30`*/;
SET @saved_cs_client = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `songs_30` AS SELECT
 1 AS `Artist Name`,
 1 AS `Number of Songs`,
 1 AS `Age`*/;
SET character_set_client = @saved_cs_client;
--
-- Table structure for table `spotify_songs`
--
DROP TABLE IF EXISTS `spotify_songs`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `spotify_songs` (
 `track_no` int NOT NULL AUTO_INCREMENT,
 `track_name` varchar(45) NOT NULL,
 `length` int NOT NULL,
 `beats_per_minute` int NOT NULL,
 `spotify_rank` int NOT NULL,
 `energy` int NOT NULL,
 `danceability` int NOT NULL,
 `loudness` int NOT NULL,
 `liveness` int NOT NULL,
 `valence` int NOT NULL,
 PRIMARY KEY (`track_no`),
 UNIQUE KEY `track_no_UNIQUE` (`track_no`),
 UNIQUE KEY `spotify_rank_UNIQUE` (`spotify_rank`)
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `spotify_songs`
--
LOCK TABLES `spotify_songs` WRITE;
/*!40000 ALTER TABLE `spotify_songs` DISABLE KEYS */;
INSERT INTO `spotify_songs` VALUES (1,'Senorita',191,117,1,55,76,-6,8,75),
(2,'China',302,105,2,81,79,-4,8,61),(3,'boyfriend',186,190,3,80,40,-4,16,70),
(4,'Beautiful People',198,93,4,65,64,-8,8,55),(5,'Goodbyes',175,150,5,65,58,-
4,11,18),(6,'I Don\'t Care',220,102,6,68,80,-5,9,84),(7,'Ransom',131,180,7,64,75,-
6,7,23),(8,'How Do You Sleep?',202,111,8,68,48,-5,8,35),(9,'Old Town Road -
Remix',157,136,9,62,88,-6,11,64),(10,'bad guy',194,135,10,43,70,-11,10,56),
(11,'Callaita',251,176,11,62,61,-5,24,24),(12,'Loco Contigo',185,96,12,71,82,-
4,15,38),(13,'Someone You Loved',182,110,13,41,50,-6,11,45),(14,'Otro Trago -
Remix',288,176,14,79,73,-2,6,76),(15,'Money In The Grave',205,101,15,50,83,-
4,12,10),(16,'No Guidance',261,93,16,45,70,-7,16,14),(17,'LA
CANCION',243,176,17,65,75,-6,11,43),(18,'Sunflower',158,90,18,48,76,-6,7,91),
(19,'Lalala',161,130,19,39,84,-8,14,50),(20,'Truth Hurts',173,158,20,62,72,-
3,12,41),(21,'Piece Of Your Heart',153,124,21,74,68,-7,7,63),
(22,'Panini',115,154,22,59,70,-6,12,48),(23,'No Me Conoce -
Remix',309,92,23,79,81,-4,9,58),(24,'Soltera - Remix',266,92,24,78,80,-4,44,80),
(25,'bad guy (with Justin Bieber)',195,135,25,45,67,-11,12,68),(26,'If I Can\'t
Have You',191,124,26,82,69,-4,13,87),(27,'Dance Monkey',210,98,27,59,82,-6,18,54),
(28,'It\'s You',213,96,28,46,73,-7,19,40),(29,'Con Calma',193,94,29,86,74,-3,6,66),
(30,'QUE PRETENDES',222,93,30,79,64,-4,36,94),(31,'Takeaway',210,85,31,51,29,-
8,10,36),(32,'7 rings',179,140,32,32,78,-11,9,33),(33,'11:00 PM',176,96,33,71,78,-
5,9,68),(34,'The London',200,98,34,59,80,-7,13,18),(35,'Never Really
Over',224,100,35,88,77,-5,32,39),(36,'Summer Days',164,114,36,72,66,-7,14,32),
(37,'Otro Trago',226,176,37,70,75,-5,11,62),(38,'Antisocial',162,152,38,82,72,-
5,36,91),(39,'Sucker',181,138,39,73,84,-5,11,95),(40,'fuck, i\'m
lonely',199,95,40,56,81,-6,6,68),(41,'Higher Love',228,104,41,68,69,-7,10,40),
(42,'You Need To Calm Down',171,85,42,68,77,-6,7,73),
(43,'Shallow',216,96,43,39,57,-6,23,32),(44,'Talk',198,136,44,40,90,-9,6,35),
(45,'Con Altura',162,98,45,69,88,-4,5,75),(46,'One Thing Right',182,88,46,62,66,-
2,58,44),(47,'Te Robar?',202,176,47,75,67,-4,8,80),(48,'Happier',214,100,48,79,69,-
3,17,67),(49,'Call You Mine',218,104,49,70,59,-6,41,50),(50,'Cross
Me',206,95,50,79,75,-6,7,61);
/*!40000 ALTER TABLE `spotify_songs` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Temporary view structure for view `top_10_mood_view`
--
DROP TABLE IF EXISTS `top_10_mood_view`;
/*!50001 DROP VIEW IF EXISTS `top_10_mood_view`*/;
SET @saved_cs_client = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `top_10_mood_view` AS SELECT
 1 AS `Mood ID`,
 1 AS `Mood Name`,
 1 AS `Mood Description`,
 1 AS `Count`*/;
SET character_set_client = @saved_cs_client;
--
-- Table structure for table `track_artists`
--
DROP TABLE IF EXISTS `track_artists`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `track_artists` (
 `track_no` int NOT NULL,
 `artist_id` int NOT NULL,
 PRIMARY KEY (`track_no`,`artist_id`),
 KEY `fk_SPOTIFY_SONGS_has_ARTISTS_ARTISTS1_idx` (`artist_id`),
 KEY `fk_SPOTIFY_SONGS_has_ARTISTS_SPOTIFY_SONGS1_idx` (`track_no`),
 CONSTRAINT `fk_SPOTIFY_SONGS_has_ARTISTS_ARTISTS1` FOREIGN KEY (`artist_id`)
REFERENCES `artists` (`artist_id`),
 CONSTRAINT `fk_SPOTIFY_SONGS_has_ARTISTS_SPOTIFY_SONGS1` FOREIGN KEY (`track_no`)
REFERENCES `spotify_songs` (`track_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `track_artists`
--
LOCK TABLES `track_artists` WRITE;
/*!40000 ALTER TABLE `track_artists` DISABLE KEYS */;
INSERT INTO `track_artists` VALUES (1,1),(26,1),(2,2),(3,3),(32,3),(4,4),(6,4),
(38,4),(50,4),(7,5),(8,6),(9,7),(22,7),(10,8),(25,8),(11,9),(17,9),(23,9),(30,9),
(12,10),(13,11),(15,12),(16,12),(16,13),(2,14),(12,14),(17,14),(23,14),(24,14),
(30,14),(45,14),(5,15),(18,15),(19,16),(20,17),(21,18),(23,19),(24,20),(27,21),
(28,22),(2,23),(24,23),(29,23),(31,24),(49,24),(33,25),(5,26),(34,26),(29,27),
(35,27),(36,28),(14,29),(37,29),(39,30),(40,31),(41,32),(42,33),(43,34),(4,35),
(44,35),(46,37),(48,37),(18,38),(47,38),(2,39),(1,40),(3,41),(6,42),(25,42),(9,43),
(11,44),(12,45),(15,46),(18,47),(18,48),(19,49),(31,50),(31,51),(34,52),(38,52),
(34,53),(36,54),(36,55),(36,56),(40,57),(43,58),(45,59),(45,60),(46,61),(48,63),
(49,63),(50,64),(50,65);
/*!40000 ALTER TABLE `track_artists` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Table structure for table `track_genre`
--
DROP TABLE IF EXISTS `track_genre`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `track_genre` (
 `track_no` int NOT NULL,
 `genre_id` int NOT NULL,
 PRIMARY KEY (`track_no`,`genre_id`),
 KEY `fk_SPOTIFY_SONGS_has_GENRE_GENRE1_idx` (`genre_id`),
 KEY `fk_SPOTIFY_SONGS_has_GENRE_SPOTIFY_SONGS1_idx` (`track_no`),
 CONSTRAINT `fk_SPOTIFY_SONGS_has_GENRE_GENRE1` FOREIGN KEY (`genre_id`)
REFERENCES `genre` (`genre_id`),
 CONSTRAINT `fk_SPOTIFY_SONGS_has_GENRE_SPOTIFY_SONGS1` FOREIGN KEY (`track_no`)
REFERENCES `spotify_songs` (`track_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `track_genre`
--
LOCK TABLES `track_genre` WRITE;
/*!40000 ALTER TABLE `track_genre` DISABLE KEYS */;
INSERT INTO `track_genre` VALUES (1,1),(2,2),(11,2),(23,2),(33,2),(3,3),(12,3),
(16,3),(32,3),(35,3),(40,3),(42,3),(43,3),(4,4),(6,4),(8,4),(13,4),(38,4),(44,4),
(45,4),(50,4),(5,5),(18,5),(10,6),(25,6),(7,7),(14,8),(37,8),(9,9),(22,9),(15,10),
(19,10),(28,10),(17,11),(24,11),(29,11),(30,11),(47,11),(20,12),(21,13),(26,14),
(27,15),(2,16),(21,16),(31,16),(36,16),(41,16),(49,16),(46,17),(48,17),(45,18),
(39,19),(34,20),(36,21);
/*!40000 ALTER TABLE `track_genre` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Temporary view structure for view `track_genre_view`
--
DROP TABLE IF EXISTS `track_genre_view`;
/*!50001 DROP VIEW IF EXISTS `track_genre_view`*/;
SET @saved_cs_client = @@character_set_client;
/*!50503 SET character_set_client = utf8mb4 */;
/*!50001 CREATE VIEW `track_genre_view` AS SELECT
 1 AS `track_no`,
 1 AS `track_name`,
 1 AS `genre_name`,
 1 AS `genre_id`,
 1 AS `spotify_rank`*/;
SET character_set_client = @saved_cs_client;
--
-- Table structure for table `track_mood`
--
DROP TABLE IF EXISTS `track_mood`;
/*!40101 SET @saved_cs_client = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `track_mood` (
 `track_no` int NOT NULL,
 `mood_id` int NOT NULL,
 PRIMARY KEY (`track_no`,`mood_id`),
 KEY `fk_SPOTIFY_SONGS_has_MOOD_MOOD1_idx` (`mood_id`),
 KEY `fk_SPOTIFY_SONGS_has_MOOD_SPOTIFY_SONGS1_idx` (`track_no`),
 CONSTRAINT `fk_SPOTIFY_SONGS_has_MOOD_MOOD1` FOREIGN KEY (`mood_id`) REFERENCES
`mood` (`mood_id`),
 CONSTRAINT `fk_SPOTIFY_SONGS_has_MOOD_SPOTIFY_SONGS1` FOREIGN KEY (`track_no`)
REFERENCES `spotify_songs` (`track_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;
--
-- Dumping data for table `track_mood`
--
LOCK TABLES `track_mood` WRITE;
/*!40000 ALTER TABLE `track_mood` DISABLE KEYS */;
INSERT INTO `track_mood` VALUES (1,1),(7,1),(11,1),(17,1),(19,1),(21,1),(22,1),
(26,1),(30,1),(34,1),(42,1),(45,1),(48,1),(7,2),(9,2),(15,2),(20,2),(32,2),(34,2),
(38,2),(42,2),(50,2),(2,3),(3,3),(9,3),(10,3),(12,3),(23,3),(25,3),(27,3),(29,3),
(33,3),(37,3),(39,3),(42,3),(47,3),(1,4),(18,4),(19,4),(23,4),(34,4),(41,4),(47,4),
(5,5),(8,5),(14,5),(16,5),(17,5),(28,5),(35,5),(43,5),(44,5),(46,5),(2,6),(3,6),
(5,6),(15,6),(18,6),(29,6),(31,6),(35,6),(36,6),(38,6),(42,6),(44,6),(9,7),(10,7),
(18,7),(20,7),(22,7),(25,7),(27,7),(32,7),(39,7),(48,7),(8,8),(13,8),(15,8),(38,8),
(40,8),(9,9),(10,9),(16,9),(25,9),(26,9),(31,9),(40,9),(46,9),(49,9),(50,9),
(15,10),(21,10),(28,10),(43,10),(1,11),(11,11),(12,11),(14,11),(17,11),(23,11),
(24,11),(29,11),(30,11),(33,11),(37,11),(45,11),(47,11),(4,12),(6,12),(19,12),
(37,12),(41,12),(45,12),(48,12),(4,13),(6,13),(20,13),(30,13),(33,13),(36,13),
(40,13),(49,13),(10,14),(22,14),(27,14),(32,14),(36,14),(41,14),(3,15),(5,15),
(13,15),(21,15),(24,15),(26,15),(28,15),(31,15),(35,15),(39,15),(43,15),(44,15),
(46,15),(49,15),(50,15);
/*!40000 ALTER TABLE `track_mood` ENABLE KEYS */;
UNLOCK TABLES;
--
-- Final view structure for view `female_artists_song`
--
/*!50001 DROP VIEW IF EXISTS `female_artists_song`*/;
/*!50001 SET @saved_cs_client = @@character_set_client */;
/*!50001 SET @saved_cs_results = @@character_set_results */;
/*!50001 SET @saved_col_connection = @@collation_connection */;
/*!50001 SET character_set_client = utf8mb4 */;
/*!50001 SET character_set_results = utf8mb4 */;
/*!50001 SET collation_connection = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `female_artists_song` AS select `spotify_songs`.`track_no` AS `Track
No.`,`spotify_songs`.`track_name` AS `Track
Name`,concat(`artists`.`artist_first_name`,' ',`artists`.`artist_last_name`) AS
`Artist Name`,`spotify_songs`.`spotify_rank` AS `Spotify Song
Rank`,`artists`.`gender` AS `Gender` from ((`spotify_songs` join `track_artists`
on((`spotify_songs`.`track_no` = `track_artists`.`track_no`))) join `artists`
on((`track_artists`.`artist_id` = `artists`.`artist_id`))) where
(`artists`.`gender` = 'female') order by `spotify_songs`.`track_no` */;
/*!50001 SET character_set_client = @saved_cs_client */;
/*!50001 SET character_set_results = @saved_cs_results */;
/*!50001 SET collation_connection = @saved_col_connection */;
--
-- Final view structure for view `male_artists_song`
--
/*!50001 DROP VIEW IF EXISTS `male_artists_song`*/;
/*!50001 SET @saved_cs_client = @@character_set_client */;
/*!50001 SET @saved_cs_results = @@character_set_results */;
/*!50001 SET @saved_col_connection = @@collation_connection */;
/*!50001 SET character_set_client = utf8mb4 */;
/*!50001 SET character_set_results = utf8mb4 */;
/*!50001 SET collation_connection = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `male_artists_song` AS select `spotify_songs`.`track_no` AS `Track 
No.`,`spotify_songs`.`track_name` AS `Track
Name`,concat(`artists`.`artist_first_name`,' ',`artists`.`artist_last_name`) AS
`Artist Name`,`spotify_songs`.`spotify_rank` AS `Spotify Song
Rank`,`artists`.`gender` AS `Gender` from ((`spotify_songs` join `track_artists`
on((`spotify_songs`.`track_no` = `track_artists`.`track_no`))) join `artists`
on((`track_artists`.`artist_id` = `artists`.`artist_id`))) where
(`artists`.`gender` = 'male') order by `spotify_songs`.`track_no` */;
/*!50001 SET character_set_client = @saved_cs_client */;
/*!50001 SET character_set_results = @saved_cs_results */;
/*!50001 SET collation_connection = @saved_col_connection */;
--
-- Final view structure for view `more_than_100_million_artists_songs`
--
/*!50001 DROP VIEW IF EXISTS `more_than_100_million_artists_songs`*/;
/*!50001 SET @saved_cs_client = @@character_set_client */;
/*!50001 SET @saved_cs_results = @@character_set_results */;
/*!50001 SET @saved_col_connection = @@collation_connection */;
/*!50001 SET character_set_client = utf8mb4 */;
/*!50001 SET character_set_results = utf8mb4 */;
/*!50001 SET collation_connection = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `more_than_100_million_artists_songs` AS select
concat(`artists`.`artist_first_name`,' ',`artists`.`artist_last_name`) AS
`CONCAT( artist_first_name, '
',artist_last_name)`,count(`spotify_songs`.`track_no`) AS `Number of
Songs`,`artists`.`net_worth` AS `net_worth` from ((`spotify_songs` join
`track_artists` on((`spotify_songs`.`track_no` = `track_artists`.`track_no`))) join
`artists` on((`track_artists`.`artist_id` = `artists`.`artist_id`))) where
(`artists`.`net_worth` > 100000000) group by concat(`artists`.`artist_first_name`,'
',`artists`.`artist_last_name`) order by count(`spotify_songs`.`track_no`) */;
/*!50001 SET character_set_client = @saved_cs_client */;
/*!50001 SET character_set_results = @saved_cs_results */;
/*!50001 SET collation_connection = @saved_col_connection */;
--
-- Final view structure for view `most_birthday`
--
/*!50001 DROP VIEW IF EXISTS `most_birthday`*/;
/*!50001 SET @saved_cs_client = @@character_set_client */;
/*!50001 SET @saved_cs_results = @@character_set_results */;
/*!50001 SET @saved_col_connection = @@collation_connection */;
/*!50001 SET character_set_client = utf8mb4 */;
/*!50001 SET character_set_results = utf8mb4 */;
/*!50001 SET collation_connection = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `most_birthday` AS select date_format(`artists`.`birthday`,'%M') AS
`Birthday`,count(0) AS `Number of Artists` from `artists` where
(`artists`.`birthday` is not null) group by date_format(`artists`.`birthday`,'%M')
*/;
/*!50001 SET character_set_client = @saved_cs_client */;
/*!50001 SET character_set_results = @saved_cs_results */;
/*!50001 SET collation_connection = @saved_col_connection */;
--
-- Final view structure for view `songs_30`
--
/*!50001 DROP VIEW IF EXISTS `songs_30`*/;
/*!50001 SET @saved_cs_client = @@character_set_client */;
/*!50001 SET @saved_cs_results = @@character_set_results */;
/*!50001 SET @saved_col_connection = @@collation_connection */;
/*!50001 SET character_set_client = utf8mb4 */;
/*!50001 SET character_set_results = utf8mb4 */;
/*!50001 SET collation_connection = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `songs_30` AS select concat(`artists`.`artist_first_name`,'
',`artists`.`artist_last_name`) AS `Artist Name`,count(`spotify_songs`.`track_no`)
AS `Number of Songs`,`artists`.`age` AS `Age` from ((`spotify_songs` join
`track_artists` on((`spotify_songs`.`track_no` = `track_artists`.`track_no`))) join
`artists` on((`track_artists`.`artist_id` = `artists`.`artist_id`))) where
(`artists`.`age` < 30) group by concat(`artists`.`artist_first_name`,'
',`artists`.`artist_last_name`) order by count(`spotify_songs`.`track_no`) */;
/*!50001 SET character_set_client = @saved_cs_client */;
/*!50001 SET character_set_results = @saved_cs_results */;
/*!50001 SET collation_connection = @saved_col_connection */;
--
-- Final view structure for view `top_10_mood_view`
--
/*!50001 DROP VIEW IF EXISTS `top_10_mood_view`*/;
/*!50001 SET @saved_cs_client = @@character_set_client */;
/*!50001 SET @saved_cs_results = @@character_set_results */;
/*!50001 SET @saved_col_connection = @@collation_connection */;
/*!50001 SET character_set_client = utf8mb4 */;
/*!50001 SET character_set_results = utf8mb4 */;
/*!50001 SET collation_connection = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `top_10_mood_view` AS select `track_mood`.`mood_id` AS `Mood
ID`,`mood`.`mood_name` AS `Mood Name`,`mood`.`mood_description` AS `Mood
Description`,count(`track_mood`.`mood_id`) AS `Count` from (`track_mood` join
`mood` on((`track_mood`.`mood_id` = `mood`.`mood_id`))) group by
`track_mood`.`mood_id` order by `Count` desc limit 10 */;
/*!50001 SET character_set_client = @saved_cs_client */;
/*!50001 SET character_set_results = @saved_cs_results */;
/*!50001 SET collation_connection = @saved_col_connection */;
--
-- Final view structure for view `track_genre_view`
--
/*!50001 DROP VIEW IF EXISTS `track_genre_view`*/;
/*!50001 SET @saved_cs_client = @@character_set_client */;
/*!50001 SET @saved_cs_results = @@character_set_results */;
/*!50001 SET @saved_col_connection = @@collation_connection */;
/*!50001 SET character_set_client = utf8mb4 */;
/*!50001 SET character_set_results = utf8mb4 */;
/*!50001 SET collation_connection = utf8mb4_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`root`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `track_genre_view` AS select `spotify_songs`.`track_no` AS 
`track_no`,`spotify_songs`.`track_name` AS `track_name`,`genre`.`genre_name` AS
`genre_name`,`track_genre`.`genre_id` AS `genre_id`,`spotify_songs`.`spotify_rank`
AS `spotify_rank` from ((`spotify_songs` join `track_genre`
on((`spotify_songs`.`track_no` = `track_genre`.`track_no`))) join `genre`
on((`track_genre`.`genre_id` = `genre`.`genre_id`))) order by
`spotify_songs`.`track_no` */;
/*!50001 SET character_set_client = @saved_cs_client */;
/*!50001 SET character_set_results = @saved_cs_results */;
/*!50001 SET collation_connection = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
-- Dump completed on 2021-05-14 10:15:22