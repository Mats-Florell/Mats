-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 06. Mar, 2025 10:58 AM
-- Tjener-versjon: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dyrregister`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `kjeledyr`
--

CREATE TABLE `kjeledyr` (
  `dyreType` varchar(12) NOT NULL,
  `Navn` varchar(24) NOT NULL,
  `Rase` varchar(20) NOT NULL,
  `FodselsDato` date NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dataark for tabell `kjeledyr`
--

INSERT INTO `kjeledyr` (`dyreType`, `Navn`, `Rase`, `FodselsDato`, `ID`) VALUES
('Hund', 'Frodo', 'Gårdshund', '2014-07-09', 2),
('Katt', 'Milo', 'Svarting', '2024-05-07', 3),
('Hund', 'Fido', 'Mixed', '2022-05-17', 6),
('hest', 'Tyra', 'islandshest', '2025-01-15', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kjeledyr`
--
ALTER TABLE `kjeledyr`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kjeledyr`
--
ALTER TABLE `kjeledyr`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
