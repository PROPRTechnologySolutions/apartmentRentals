-- phpMyAdmin SQL Dump
-- version 4.4.15.7
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 03, 2017 at 05:14 PM
-- Server version: 5.6.36
-- PHP Version: 5.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `loftyhts`
--

-- --------------------------------------------------------

--
-- Table structure for table `apartments`
--

CREATE TABLE IF NOT EXISTS `apartments` (
  `IDapt` int(3) NOT NULL,
  `apt` varchar(5) NOT NULL,
  `bdrms` int(3) NOT NULL,
  `baths` float NOT NULL,
  `rent` int(5) NOT NULL,
  `sqft` int(4) NOT NULL,
  `floor` int(2) NOT NULL,
  `isAvail` tinyint(1) NOT NULL,
  `bldgID` int(3) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apartments`
--

INSERT INTO `apartments` (`IDapt`, `apt`, `bdrms`, `baths`, `rent`, `sqft`, `floor`, `isAvail`, `bldgID`) VALUES
(1, '8C', 2, 1, 1900, 900, 8, 1, 4),
(2, '5A', 2, 1.5, 2100, 1100, 5, 1, 2),
(3, '2B', 1, 1, 1700, 560, 2, 0, 4),
(4, '6J', 0, 1, 1500, 585, 6, 1, 1),
(5, '9D', 1, 1, 2100, 875, 8, 0, 3),
(6, '8A', 3, 2, 3600, 1000, 12, 0, 2),
(7, '12K', 0, 1, 1300, 475, 12, 1, 4),
(8, '5F', 3, 1.5, 2900, 1285, 5, 1, 1),
(9, '410A', 3, 1, 1100, 1050, 4, 1, 5);

-- --------------------------------------------------------

--
-- Table structure for table `buildings`
--

CREATE TABLE IF NOT EXISTS `buildings` (
  `IDbldg` int(3) NOT NULL,
  `bldgName` varchar(50) NOT NULL,
  `floors` int(2) NOT NULL,
  `isPets` tinyint(1) NOT NULL,
  `isGym` tinyint(1) NOT NULL,
  `isDoorman` tinyint(1) NOT NULL,
  `isParking` tinyint(1) NOT NULL,
  `bldDesc` varchar(2500) NOT NULL,
  `hoodID` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `buildings`
--

INSERT INTO `buildings` (`IDbldg`, `bldgName`, `floors`, `isPets`, `isGym`, `isDoorman`, `isParking`, `bldDesc`, `hoodID`) VALUES
(1, 'Glenview Manor', 24, 0, 0, 1, 0, 'Glenview is Great.', 4),
(2, 'Evergreen Estates', 11, 1, 1, 1, 0, 'Evergreen has everything.', 1),
(3, 'Soho Lofts', 13, 0, 1, 1, 0, 'Soho is so cool.', 3),
(4, 'Breezy Corners', 6, 1, 0, 0, 0, 'Breezy is breath-taking.', 2),
(5, 'Lenox Avenue Apartments', 5, 1, 0, 0, 1, 'This is right in the hood. Dirty and nasty, but the rent is cheap.', 5);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `IDmbr` int(5) NOT NULL,
  `firstName` varchar(25) NOT NULL,
  `lastName` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(12) NOT NULL,
  `password` varchar(12) NOT NULL,
  `joinTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`IDmbr`, `firstName`, `lastName`, `email`, `username`, `password`, `joinTime`) VALUES
(1, 'Jay', 'Price', 'jay.price@pragmadox.com', 'pragmadox', 'paul2012', '2017-08-02 16:04:17'),
(2, 'Brian', 'McClain', 'brian.mcclain@codeimmersives.com', 'BMcC', 'Php$123', '2017-08-02 16:04:17');

-- --------------------------------------------------------

--
-- Table structure for table `neighborhoods`
--

CREATE TABLE IF NOT EXISTS `neighborhoods` (
  `IDhood` int(3) NOT NULL,
  `hoodName` varchar(50) NOT NULL,
  `hoodDesc` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `neighborhoods`
--

INSERT INTO `neighborhoods` (`IDhood`, `hoodName`, `hoodDesc`) VALUES
(1, 'Chelsea', 'Chelsea is located between Greenwich village and M'),
(2, 'Chinatown', 'New York City has one of the World''s largest China'),
(3, 'Soho', 'Soho means South of Houston. It is known as an art'),
(4, 'Tribeca', 'Tribeca means ''Triangle Between Broadway and Canal'),
(5, 'East Orange', 'Right on the outskirts of Newark, you are just as ');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apartments`
--
ALTER TABLE `apartments`
  ADD PRIMARY KEY (`IDapt`);

--
-- Indexes for table `buildings`
--
ALTER TABLE `buildings`
  ADD PRIMARY KEY (`IDbldg`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`IDmbr`);

--
-- Indexes for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  ADD PRIMARY KEY (`IDhood`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apartments`
--
ALTER TABLE `apartments`
  MODIFY `IDapt` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `buildings`
--
ALTER TABLE `buildings`
  MODIFY `IDbldg` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `IDmbr` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `neighborhoods`
--
ALTER TABLE `neighborhoods`
  MODIFY `IDhood` int(3) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
