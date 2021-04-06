-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 06, 2021 at 11:32 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magebit_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `domain`
--

CREATE TABLE `domain` (
  `ID` int(11) NOT NULL,
  `Name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `domain`
--

INSERT INTO `domain` (`ID`, `Name`) VALUES
(1, 'gmail.com'),
(2, 'yahoo.com'),
(3, 'outlook.com'),
(5, 'hubspot.com'),
(6, 'inbox.lv'),
(10, 'xyz.com'),
(11, 'expert.io');

-- --------------------------------------------------------

--
-- Table structure for table `mail`
--

CREATE TABLE `mail` (
  `ID` int(11) NOT NULL,
  `Address` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `DomainID` int(11) NOT NULL,
  `Timestamp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mail`
--

INSERT INTO `mail` (`ID`, `Address`, `DomainID`, `Timestamp`) VALUES
(1, 'archa', 1, 1617203462),
(2, 'gacha', 1, 1617203462),
(3, 'john', 1, 1617203462),
(4, 'bruce', 1, 1617203462),
(5, 'terminator_pokemon', 1, 1617203462),
(6, 'japan.person.2005', 2, 1617203462),
(7, 'iAmNotSpaming', 2, 1617203462),
(8, 'coca-cola-inc', 2, 1617203462),
(9, 'maga', 3, 1617203462),
(10, 'putin-le-presidente', 3, 1617203462),
(11, 'yolo1998', 3, 1617203462),
(12, 'bill387', 3, 1617203462),
(13, 'anna1995', 3, 1617203462),
(14, 'haxor_1', 3, 1617203462),
(15, 'code.engineer', 5, 1617203462),
(16, 'ista.latviesha.paskaste', 6, 1617203462),
(17, 'udobnij-pacan', 6, 1617203462),
(29, 'chalis', 6, 1617611407),
(30, 'abc', 10, 1617612011),
(32, 'best_gamer', 1, 1617708156),
(33, 'better_be_free', 5, 1617708197),
(34, 'experts', 11, 1617708633);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `domain`
--
ALTER TABLE `domain`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `mail`
--
ALTER TABLE `mail`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `domain`
--
ALTER TABLE `domain`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `mail`
--
ALTER TABLE `mail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
