-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 28, 2019 at 09:44 PM
-- Server version: 5.6.34-log
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `videoteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `IdFilm` int(10) NOT NULL,
  `Titolo` varchar(50) DEFAULT NULL,
  `Regista` varchar(30) DEFAULT NULL,
  `IdGenere` int(10) DEFAULT NULL,
  `Url_Locandina` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`IdFilm`, `Titolo`, `Regista`, `IdGenere`, `Url_Locandina`) VALUES
(1, 'Fat and Furios', 'PinoLongino', 2, 'fat.jpg'),
(2, 'Grimsby - Attenti a quell altro', 'LouisLeterrier', 2, 'grimsby.jpg'),
(3, 'Kung Fury', 'Orion', 2, 'kungfury.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `genere`
--

CREATE TABLE `genere` (
  `IdGenere` int(10) NOT NULL,
  `Descrizione` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genere`
--

INSERT INTO `genere` (`IdGenere`, `Descrizione`) VALUES
(1, 'Horror'),
(2, 'Azione'),
(3, 'Commedia'),
(4, 'Horror'),
(5, 'Azione'),
(6, 'Commedia');

-- --------------------------------------------------------

--
-- Table structure for table `prestito`
--

CREATE TABLE `prestito` (
  `IdPrestito` int(10) NOT NULL,
  `IdFilm` int(10) DEFAULT NULL,
  `Richiedente` varchar(30) DEFAULT NULL,
  `Inizio_Prestito` datetime DEFAULT NULL,
  `Giorni_Prestito` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `prestito`
--

INSERT INTO `prestito` (`IdPrestito`, `IdFilm`, `Richiedente`, `Inizio_Prestito`, `Giorni_Prestito`) VALUES
(5, 1, 'Pino', '2019-04-17 15:32:53', 23);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`IdFilm`),
  ADD KEY `IdGenere` (`IdGenere`);

--
-- Indexes for table `genere`
--
ALTER TABLE `genere`
  ADD PRIMARY KEY (`IdGenere`);

--
-- Indexes for table `prestito`
--
ALTER TABLE `prestito`
  ADD PRIMARY KEY (`IdPrestito`),
  ADD KEY `IdFilm` (`IdFilm`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `IdFilm` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `genere`
--
ALTER TABLE `genere`
  MODIFY `IdGenere` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `prestito`
--
ALTER TABLE `prestito`
  MODIFY `IdPrestito` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `film`
--
ALTER TABLE `film`
  ADD CONSTRAINT `film_ibfk_1` FOREIGN KEY (`IdGenere`) REFERENCES `genere` (`IdGenere`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prestito`
--
ALTER TABLE `prestito`
  ADD CONSTRAINT `prestito_ibfk_1` FOREIGN KEY (`IdFilm`) REFERENCES `film` (`IdFilm`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
