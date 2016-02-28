-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.6.12-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for question
CREATE DATABASE IF NOT EXISTS `question` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `question`;


-- Dumping structure for table question.answer
CREATE TABLE IF NOT EXISTS `answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `answer_value` text NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  `question_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`answer_id`),
  KEY `FK__question` (`question_id`),
  CONSTRAINT `FK__question` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=latin1;

-- Dumping data for table question.answer: ~143 rows (approximately)
/*!40000 ALTER TABLE `answer` DISABLE KEYS */;
INSERT INTO `answer` (`answer_id`, `answer_value`, `status`, `question_id`) VALUES
	(3, 'largest railway station', 1, 1),
	(4, 'highest railway station', 0, 1),
	(8, 'longest railway station', 0, 1),
	(9, 'None of the above', 0, 1),
	(10, 'Behavior of human beings', 0, 2),
	(11, 'Insects', 1, 2),
	(12, 'The origin and history of technical and scientific terms', 0, 2),
	(13, 'The formation of rocks', 0, 2),
	(14, 'Asia', 0, 3),
	(15, 'Africa', 1, 3),
	(16, 'Europe', 0, 3),
	(17, 'Australia', 0, 3),
	(18, '1000 bytes', 0, 4),
	(19, '100 bytes', 0, 4),
	(20, '1024 bytes', 1, 4),
	(21, '1023 bytes', 0, 4),
	(22, 'Windows 98', 0, 5),
	(23, 'BSD Unix', 0, 5),
	(24, 'Microsoft Office XP', 1, 5),
	(25, 'Red Hat Linux', 0, 5),
	(26, 'Internet', 1, 6),
	(27, 'Linux', 0, 6),
	(28, 'Unix', 0, 6),
	(29, 'Windows', 0, 6),
	(30, 'Syntax error', 1, 7),
	(31, 'Symantic error', 0, 7),
	(32, 'Logical error', 0, 7),
	(33, 'Internal error', 0, 7),
	(34, 'Feng Shui', 0, 8),
	(35, 'Ikebana', 2, 8),
	(36, 'Florabana', 0, 8),
	(37, 'None of the Above', 0, 8),
	(38, 'Australia', 0, 9),
	(39, 'Canada', 1, 9),
	(40, 'Great Britain', 0, 9),
	(41, 'Japan', 0, 9),
	(42, 'developed the telescope', 0, 10),
	(43, 'discovered four satellites of Jupiter', 0, 10),
	(44, 'discovered that the movement of pendulum produces a regular time measurement', 0, 10),
	(45, 'All of the above', 1, 10),
	(46, 'Visible light', 0, 11),
	(47, 'Infrared radiation', 0, 11),
	(48, 'X-rays and gamma rays', 0, 11),
	(49, 'Ultraviolet radiation', 1, 11),
	(50, 'New York, USA', 1, 12),
	(51, 'Haque (Netherlands)', 0, 12),
	(52, 'Geneva', 0, 12),
	(53, 'Paris', 0, 12),
	(54, 'a German Physicist', 0, 13),
	(55, 'developed the mercury thermometer in 1714', 0, 13),
	(56, 'devised temperature scale', 0, 13),
	(57, 'All of the above', 1, 13),
	(58, 'Graphite', 1, 14),
	(59, 'Silicon', 0, 14),
	(60, 'Charcoal', 0, 14),
	(61, 'Phosphorous', 0, 14),
	(62, 'hydrogen', 1, 15),
	(63, 'carbon', 0, 15),
	(64, 'sulphur', 0, 15),
	(65, 'oxygen', 0, 15),
	(66, 'Tubby', 0, 16),
	(67, 'Stodge', 0, 16),
	(68, 'Helium Bat', 0, 16),
	(69, 'Stumpy', 1, 16),
	(70, 'Canada', 0, 17),
	(71, 'Sri Lanka', 1, 17),
	(72, 'Zimbabwe', 0, 17),
	(73, 'East Africa', 0, 17),
	(74, 'Cactus Jack', 0, 18),
	(75, 'Mankind', 0, 18),
	(76, 'Dude Love', 1, 18),
	(77, 'Mick Foley', 0, 18),
	(78, 'The Rickster', 0, 19),
	(79, 'Ponts', 0, 19),
	(80, 'Ponter', 0, 19),
	(81, 'Punter', 1, 19),
	(82, '45 seconds', 1, 20),
	(83, '25 seconds', 0, 20),
	(84, '1 minute', 0, 20),
	(85, '2 minutes', 0, 20),
	(86, 'Owen Hart', 0, 21),
	(87, 'Bret Hart', 1, 21),
	(88, 'Edge', 0, 21),
	(89, 'Mabel', 0, 21),
	(90, 'A referee', 1, 22),
	(91, 'An umpire', 0, 22),
	(92, 'A spectator', 0, 22),
	(93, 'A goalkeeper', 0, 22),
	(94, 'New York Yankees', 0, 23),
	(95, 'Chicago White Sox', 0, 23),
	(96, 'Montreal Expos', 0, 23),
	(97, 'Boston Red Sox', 1, 23),
	(98, 'Triple H', 0, 24),
	(99, 'Stone Cold Steve Austin', 0, 24),
	(100, 'Mankind', 1, 24),
	(101, 'Bret Hart', 0, 24),
	(102, '1873', 0, 25),
	(103, '1877', 1, 25),
	(104, '1870', 0, 25),
	(105, '1788', 0, 25),
	(106, 'Shane Warne', 0, 26),
	(107, 'Brian Lara\r\n', 0, 26),
	(108, 'Courtney Walsh', 0, 26),
	(109, 'Muttiah Muralitharan', 1, 26),
	(110, 'Billabong', 0, 27),
	(111, 'Swampy', 0, 27),
	(112, 'Bacchus', 1, 27),
	(113, 'Lagoon', 0, 27),
	(114, 'Ooh Ahh', 0, 28),
	(115, 'Penguin', 1, 28),
	(116, 'Big Bird', 0, 28),
	(117, 'Pigeon', 0, 28),
	(118, '11', 0, 29),
	(119, '9', 0, 29),
	(120, '5', 0, 29),
	(121, '7', 1, 29),
	(122, 'Soccer - Football', 1, 30),
	(123, 'Golf - Polo', 0, 30),
	(124, 'Billiards - Carrom', 0, 30),
	(125, 'Volleyball - Squash', 0, 30),
	(126, 'Chuck Norris', 0, 31),
	(127, 'Charles Atlas', 0, 31),
	(128, 'Charlton Heston', 1, 31),
	(129, 'Jimmy Carter', 0, 31),
	(134, 'Gene Autry', 1, 33),
	(135, 'Hopalong Cassidy', 0, 33),
	(136, 'Tom Mix', 0, 33),
	(137, 'Roy Rogers', 0, 33),
	(138, 'Manville', 0, 34),
	(139, 'Melvin', 0, 34),
	(140, 'Mortimer ', 1, 34),
	(141, 'Murgatroyd', 0, 34),
	(142, 'best actor', 1, 35),
	(143, 'best actress', 0, 35),
	(144, 'best picture', 0, 35),
	(145, 'best supporting actor', 0, 35),
	(146, 'Callahan ', 1, 36),
	(147, 'Flint', 0, 36),
	(148, 'Harrigan', 0, 36),
	(149, 'Steele', 0, 36);
/*!40000 ALTER TABLE `answer` ENABLE KEYS */;


-- Dumping structure for table question.attemp
CREATE TABLE IF NOT EXISTS `attemp` (
  `attempt_id` int(10) NOT NULL AUTO_INCREMENT,
  `score` int(3) NOT NULL,
  `user_id` int(10) NOT NULL,
  `time` varchar(10) DEFAULT NULL,
  PRIMARY KEY (`attempt_id`),
  KEY `FK__user` (`user_id`),
  CONSTRAINT `FK__user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table question.attemp: ~3 rows (approximately)
/*!40000 ALTER TABLE `attemp` DISABLE KEYS */;
INSERT INTO `attemp` (`attempt_id`, `score`, `user_id`, `time`) VALUES
	(2, 60, 6, '00.00'),
	(3, 60, 6, '00.00'),
	(4, 40, 6, '00.00'),
	(5, 60, 6, '00.00');
/*!40000 ALTER TABLE `attemp` ENABLE KEYS */;


-- Dumping structure for table question.category
CREATE TABLE IF NOT EXISTS `category` (
  `categoryid` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` text NOT NULL,
  `imageurl` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table question.category: ~3 rows (approximately)
/*!40000 ALTER TABLE `category` DISABLE KEYS */;
INSERT INTO `category` (`categoryid`, `category_name`, `imageurl`) VALUES
	(1, 'Sport', 'assets/img/portfolio/5.jpg'),
	(2, 'Entertainment', 'assets/img/portfolio/2.jpg'),
	(3, 'General Knowledge', 'assets/img/portfolio/1.jpg');
/*!40000 ALTER TABLE `category` ENABLE KEYS */;


-- Dumping structure for table question.question
CREATE TABLE IF NOT EXISTS `question` (
  `question_id` int(11) NOT NULL AUTO_INCREMENT,
  `question_value` text NOT NULL,
  `category_id` int(11) NOT NULL,
  PRIMARY KEY (`question_id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `question_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`categoryid`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Dumping data for table question.question: ~35 rows (approximately)
/*!40000 ALTER TABLE `question` DISABLE KEYS */;
INSERT INTO `question` (`question_id`, `question_value`, `category_id`) VALUES
	(1, 'Grand Central Terminal, Park Avenue, New York is the world\'s', 3),
	(2, 'Entomology is the science that studies', 3),
	(3, 'Eritrea, which became the 182nd member of the UN in 1993, is in the continent of', 3),
	(4, 'One kilobyte is equal to', 3),
	(5, 'Which of the following is not an example of Operating System', 3),
	(6, 'Check the odd term out', 3),
	(7, 'The errors that can be pointed out by the compiler are', 3),
	(8, 'What is the art of Japanese flower arranging called?', 3),
	(9, 'Which country had the first Women\'s Institute, in 1897?', 3),
	(10, 'Galileo was an Italian astronomer who', 3),
	(11, 'The ozone layer restricts', 3),
	(12, 'Headquarters of UNO are situated at', 3),
	(13, 'Gabriel Daniel Fahrenheit was', 3),
	(14, 'Which of the following is used in pencils?', 3),
	(15, 'The element common to all acids is', 3),
	(16, 'Former Australian captain Mark Taylor has had several nicknames over his playing career. Which of the following was NOT one of them?', 1),
	(17, 'Which was the 1st non Test playing country to beat India in an international match?', 1),
	(18, 'Who did Stone Cold Steve Austin wrestle at the 1998 edition of "Over the Edge"?', 1),
	(19, 'Ricky Ponting is also known as what?', 1),
	(20, 'How long are professional Golf Tour players allotted per shot?', 1),
	(21, 'Who won the 1993 "King of the Ring"?', 1),
	(22, 'What is the name of the person that controls a football match?', 1),
	(23, 'Fenway Park is the home field of what Major League Baseball team?', 1),
	(24, 'Who did The Rock beat to win his first WWE Title?', 1),
	(25, 'When was the first cricket Test match played?', 1),
	(26, 'Who is the highest wicket taker in Test cricket?', 1),
	(27, 'The nickname of wicketkeeping great Rod Marsh was what?', 1),
	(28, 'The nickname of Glenn McGrath is what?', 1),
	(29, 'How many players are there in Kabbadi team?', 1),
	(30, 'Which of the following is a pair names of the same game?', 1),
	(31, 'Which actor has the real name of Charles Carter?', 2),
	(33, 'Whose autobiography was called Back In The Saddle Again?', 2),
	(34, 'What was Walt Disney\'s Mickey Mouse\'s original name?', 2),
	(35, 'Which one of these Academy Awards did Gone With the Wind not win?', 2),
	(36, 'In the Dirty Harry movies starring Clint Eastwood as Dirty Harry, what was Harry\'s last name?', 2);
/*!40000 ALTER TABLE `question` ENABLE KEYS */;


-- Dumping structure for table question.question_attempt
CREATE TABLE IF NOT EXISTS `question_attempt` (
  `question_id` int(11) NOT NULL,
  `attempt_id` int(10) NOT NULL,
  `isCorrect` tinyint(4) NOT NULL,
  PRIMARY KEY (`question_id`,`attempt_id`),
  KEY `FK_question_attempt_attemp` (`attempt_id`),
  CONSTRAINT `FK_question_attempt_attemp` FOREIGN KEY (`attempt_id`) REFERENCES `attemp` (`attempt_id`) ON UPDATE CASCADE,
  CONSTRAINT `FK_question_attempt_question` FOREIGN KEY (`question_id`) REFERENCES `question` (`question_id`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table question.question_attempt: ~35 rows (approximately)
/*!40000 ALTER TABLE `question_attempt` DISABLE KEYS */;
INSERT INTO `question_attempt` (`question_id`, `attempt_id`, `isCorrect`) VALUES
	(2, 4, 1),
	(4, 4, 1),
	(5, 4, 0),
	(7, 4, 1),
	(8, 4, 0),
	(9, 4, 0),
	(10, 4, 0),
	(11, 4, 0),
	(12, 4, 1),
	(15, 4, 0),
	(16, 2, 1),
	(16, 3, 1),
	(16, 5, 0),
	(17, 2, 1),
	(17, 3, 1),
	(17, 5, 1),
	(18, 2, 1),
	(18, 3, 1),
	(18, 5, 1),
	(19, 2, 0),
	(19, 3, 1),
	(20, 3, 0),
	(21, 2, 0),
	(21, 3, 0),
	(21, 5, 1),
	(22, 2, 1),
	(22, 5, 1),
	(23, 2, 0),
	(23, 3, 0),
	(23, 5, 0),
	(24, 2, 1),
	(24, 5, 0),
	(25, 2, 0),
	(25, 3, 0),
	(26, 3, 1),
	(26, 5, 1),
	(27, 5, 0),
	(28, 2, 1),
	(30, 3, 1),
	(30, 5, 1);
/*!40000 ALTER TABLE `question_attempt` ENABLE KEYS */;


-- Dumping structure for table question.role
CREATE TABLE IF NOT EXISTS `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table question.role: ~2 rows (approximately)
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` (`role_id`, `name`) VALUES
	(1, 'admin'),
	(2, 'derault');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;


-- Dumping structure for table question.user
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `privilages` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `FK_user_role` (`privilages`),
  CONSTRAINT `FK_user_role` FOREIGN KEY (`privilages`) REFERENCES `role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table question.user: ~4 rows (approximately)
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`id`, `email`, `name`, `password`, `privilages`) VALUES
	(1, 'khsushan@gmail.com', 'ushan', '$1$AS0.Jv0.$IQQnJ2o7FN28o.VboV6fW1', 1),
	(5, 'test@gmail.com', 'test', '$1$N/..SE5.$/4H7YcWFTb5lwKR8zbcLV0', 2),
	(6, 'ushan@gmail.com', 'khsushan', '$1$Bl0.0A..$72HXR1rG3iN6a9iq2Z6DU0', 2),
	(7, 'ershadisayri@gmail.com', 'ershadi', '$1$os2.RF3.$DZal6dQOwz4qguqLw.WBP1', 2);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
