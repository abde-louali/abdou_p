-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.4.32-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win64
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Dumping structure for table project.model
CREATE TABLE IF NOT EXISTS `model` (
  `Nmodul` varchar(80) NOT NULL,
  PRIMARY KEY (`Nmodul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table project.model: ~2 rows (approximately)
INSERT INTO `model` (`Nmodul`) VALUES
	('php'),
	('python'),
	('sql');

-- Dumping structure for table project.notes
CREATE TABLE IF NOT EXISTS `notes` (
  `cin` varchar(30) DEFAULT NULL,
  `Nmodul` varchar(80) DEFAULT NULL,
  `note1` float DEFAULT 0,
  `note2` float DEFAULT NULL,
  `note3` float DEFAULT NULL,
  `notef` float DEFAULT truncate((`note1` + `note2` + `note3`) / 3,2),
  KEY `cin` (`cin`),
  KEY `Nmodul` (`Nmodul`),
  CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`cin`) REFERENCES `student` (`cin`),
  CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`Nmodul`) REFERENCES `model` (`Nmodul`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table project.notes: ~0 rows (approximately)

-- Dumping structure for table project.student
CREATE TABLE IF NOT EXISTS `student` (
  `cin` varchar(30) NOT NULL,
  `fname` varchar(60) DEFAULT NULL,
  `lname` varchar(60) DEFAULT NULL,
  `email` varchar(70) DEFAULT NULL,
  `pasword` varchar(60) DEFAULT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cin`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table project.student: ~0 rows (approximately)

-- Dumping structure for table project.teacher
CREATE TABLE IF NOT EXISTS `teacher` (
  `username` varchar(80) DEFAULT NULL,
  `PASSWORD` varchar(80) DEFAULT NULL,
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table project.teacher: ~2 rows (approximately)
INSERT INTO `teacher` (`username`, `PASSWORD`) VALUES
	('elheyyani', 'elheyyani123'),
	('elghazi', 'elghazi123');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
