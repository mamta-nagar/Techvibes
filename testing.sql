-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 27, 2023 at 08:50 PM
-- Server version: 8.0.31
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `id` int NOT NULL,
  `src` varchar(150) NOT NULL,
  `title` varchar(100) NOT NULL,
  `info` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `src`, `title`, `info`) VALUES
(25, 'images/i0.jpg', 'Dabotics', 'Internship letter for Web Development'),
(24, 'images/i1.jpg', 'Netcamp Solutions Pvt Ltd', 'Cetificate of Industrial Training'),
(23, 'images/i2.jpg', 'Netcamp Solutions Pvt Ltd', 'Certificate of Summer Training'),
(22, 'images/i3.jpg', 'Netcamp Solutions Pvt Ltd', 'Certificate in Android Development with Core java '),
(21, 'images/i4.jpg', 'Netcamp Solutions Pvt Ltd', 'Certificate in Network Management & Web Development'),
(20, 'images/i5.jpg', 'YBI Foundation', 'Certificate of Internship in Machine Learning'),
(19, 'images/i6.jpg', 'HackerRank', 'Certificate of Python Language'),
(18, 'images/i7.jpg', 'LUDIFU (let us do it for you)', 'Certificate of Workshop in Python Power'),
(17, 'images/i9.jpg', 'YBI Foundation', 'Certification of Ensemble ML Models Bootcamp'),
(16, 'images/i8.jpg', 'YBI Foundation', 'Certificate of Text Analytics & NLP Bootcamp '),
(15, 'images/i10.jpg', 'Cursa', 'Certificate of Web D for Beginners'),
(14, 'images/i12.jpg', 'LetsUpgrade', 'Certificate of DSA Essentials Bootcamp'),
(13, 'images/i13.jpg', 'Sololearn', 'Certificate of Python Intermediate'),
(12, 'images/i14.jpg', 'Microsoft Learn Student Ambassador', 'Certificate of Javascript and React.js'),
(11, 'images/i14a.jpg', 'DevTown', 'Certificate of Participation in Javascript Framework'),
(10, 'images/i15.jpg', 'YBI Foundation ', 'Scholarship Offer letter in Advance Artificial Intelligence'),
(9, 'images/i16.jpg', 'Skillup', 'Certificate of Ms-Excel'),
(8, 'images/i17.jpg', 'AlienSkill', 'Certificate of Introduction of Ethical Hacking'),
(7, 'images/i18.jpg', 'SoloLearn', 'Certificate of Python For Beginners \r\n'),
(6, 'images/i19.jpg', 'SoloLearn', 'Certificate of Responsive Web Design'),
(5, 'images/i20.jpg', ' E-Gain ', 'Certificate of MongoDB'),
(4, 'images/i21.jpg', 'Great Learning', 'Certificate of CSS Properties'),
(3, 'images/i22.jpg', 'Great Learning', ' Certificate of C language'),
(2, 'images/i2010.jpg', 'Banke Bihari Comp Edu Centre', 'Certification in Computer Application\r\n'),
(1, 'images/i2010a.jpg\r\n', 'Banke Bihari Comp Edu Centre', 'Certificate of Completing Examination in Comp. Application');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

DROP TABLE IF EXISTS `ratings`;
CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int NOT NULL AUTO_INCREMENT,
  `post_id` int NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `status` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `post_id`, `user_name`, `status`) VALUES
(112, 12, 'mamta00', 'like'),
(113, 16, 'mamta00', 'like'),
(114, 25, 'mamta00', 'like'),
(115, 24, 'mamta00', 'like'),
(116, 22, 'mamta00', 'like'),
(117, 17, 'mamta00', 'like');

-- --------------------------------------------------------

--
-- Table structure for table `registered_users`
--

DROP TABLE IF EXISTS `registered_users`;
CREATE TABLE IF NOT EXISTS `registered_users` (
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `ver_code` varchar(100) NOT NULL,
  `is_verified` int NOT NULL,
  `resettoken` varchar(225) DEFAULT NULL,
  `resettokenexpire` date DEFAULT NULL,
  PRIMARY KEY (`email`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `registered_users`
--

INSERT INTO `registered_users` (`full_name`, `user_name`, `email`, `password`, `ver_code`, `is_verified`, `resettoken`, `resettokenexpire`) VALUES
('jeetu', 'jeetu2', 'sundarnagar82@gmail.com', '$2y$10$H9tTKfzE94Ee0xRepZ3bZ.GdIRxkTYYcfJqk1x4MP17JoPhOd/6Du', 'c996aaa69dfecafd6199f32d9820b8a0', 1, NULL, NULL),
('new', 'mamta00', 'dearwork00@gmail.com', '$2y$10$51Mi12dcUGCNLVfjJfC/G.CkZ1oRCHngRzUFL2OelUz4cFcGgSbna', 'f4c8c1e977a1163af2a0e4caaf1be38d', 1, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
