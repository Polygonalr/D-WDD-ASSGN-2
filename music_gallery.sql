-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 17, 2018 at 04:49 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `music_gallery`
--

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE `genres` (
  `genre_id` int(11) NOT NULL,
  `description` varchar(127) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`genre_id`, `description`) VALUES
(4, 'Classical'),
(3, 'Jazz'),
(1, 'Pop'),
(2, 'Rock');

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE `songs` (
  `song_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `thumbnail` varchar(511) NOT NULL,
  `song_url` varchar(511) DEFAULT NULL,
  `price` decimal(5,2) DEFAULT NULL,
  `genre_id` int(11) NOT NULL,
  `artist_name` varchar(255) NOT NULL,
  `timeAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`song_id`, `title`, `thumbnail`, `song_url`, `price`, `genre_id`, `artist_name`, `timeAdded`) VALUES
(1, 'Seventeen', '17_823.jpg', 'Jeffrey_Philip_Nelson_-_Seventeen.mp3', '1.99', 1, 'Jeffrey Philip Nelson', '2018-03-03 04:35:28'),
(2, 'Crazy Glue', 'crazy_glue_78123.jpg', 'Melanie_Ungar_-_Crazy_Glue.mp3', '1.99', 3, 'Melanie Ungar', '2018-03-03 04:35:28'),
(3, 'Gone', 'gone1267.jpg', 'Michael_McEachern_-_Gone.mp3', '1.99', 1, 'Michael McEachern', '2018-03-03 04:35:28'),
(4, 'Fire', 'fire_7232.jpg', 'Seth_Power_-_Fire.mp3', '1.99', 4, 'Seth Power', '2018-03-03 04:35:28'),
(5, 'Two Kids', '2kids_7834.jpg', 'THE_DLX_-_Two_Kids.mp3', '0.99', 4, 'The DLX', '2018-03-03 04:35:28'),
(6, 'Fill the Space', 'fill_8232.jpg', 'Wordsmith_-_Fill_the_Space.mp3', '0.99', 2, 'Wordsmith', '2018-03-03 04:35:28'),
(7, 'Alive', 'alive_1652.jpg', 'Z-Major_-_Alive_feat._Leah_Loren_Koclanes.mp3', '0.99', 3, 'Z-Major feat. Leah Loren Koclanes', '2018-03-03 04:35:28');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genres`
--
ALTER TABLE `genres`
  ADD PRIMARY KEY (`genre_id`),
  ADD UNIQUE KEY `desc` (`description`);

--
-- Indexes for table `songs`
--
ALTER TABLE `songs`
  ADD PRIMARY KEY (`song_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genres`
--
ALTER TABLE `genres`
  MODIFY `genre_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `songs`
--
ALTER TABLE `songs`
  MODIFY `song_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
