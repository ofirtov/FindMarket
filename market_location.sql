-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 24, 2018 at 01:38 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `markets`
--

-- --------------------------------------------------------

--
-- Table structure for table `market_location`
--

CREATE TABLE `market_location` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `street_number` int(10) NOT NULL,
  `city` varchar(256) NOT NULL,
  `zipcode` int(10) NOT NULL,
  `country` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `market_location`
--

INSERT INTO `market_location` (`id`, `name`, `address`, `street_number`, `city`, `zipcode`, `country`) VALUES
(1, 'mega', 'Shalom Ash St ', 9, 'Tel Aviv-Yafo', 0, 'Israel'),
(2, 'mega', 'Kaplan St ', 13, 'Petah Tikva', 0, 'Israel'),
(3, 'mega', 'Jerusalem St ', 35, 'Kiryat Ono', 0, 'Israel'),
(4, 'mega', 'Amirim St ', 1, 'Hertsliya', 0, 'Israel'),
(5, 'Shufersal', 'Tsahal St ', 71, 'Tel Aviv-Yafo', 0, 'Israel'),
(6, 'Shufersal', 'Derech Yitshak Rabin ', 17, 'Petah Tikva', 0, 'Israel'),
(7, 'Shufersal', 'Brazil St ', 15, 'Tel Aviv-Yafo', 0, 'Israel'),
(8, 'Shufersal', 'Sirkin St ', 17, 'Giv\'atayim', 0, 'Israel'),
(9, 'Victory', 'Bar Kochva St ', 16, 'Petah Tikva', 0, 'Israel'),
(10, 'Victory', 'Shiv\'at Hakohavim Blvd ', 8, 'Hertsliya\r\n', 0, 'Israel'),
(11, 'Victory', 'Tsvi Frank St ', 39, 'Rishon LeTsiyon', 0, 'Israel'),
(12, 'Victory', 'Pesakh Lev St ', 2, 'Lod', 0, 'Israel'),
(13, 'Rami Levy', 'Mivtsa Kadesh St ', 66, 'Ramat Gan', 0, 'Israel'),
(14, 'Rami Levy', 'Dvora HaNevi\'a St ', 126, 'Tel Aviv-Yafo', 0, 'Israel'),
(15, 'Rami Levy', 'HaHaroshet St ', 12, 'Ra\'anana', 0, 'Israel');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `market_location`
--
ALTER TABLE `market_location`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `market_location`
--
ALTER TABLE `market_location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
