-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 24. Mar, 2019 22:50 PM
-- Tjener-versjon: 10.1.37-MariaDB
-- PHP Version: 7.3.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vm_ski`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `athlete`
--

CREATE TABLE `athlete` (
  `Id` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Zip` varchar(4) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Nationality` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `athlete`
--

INSERT INTO `athlete` (`Id`, `Firstname`, `Lastname`, `Address`, `Zip`, `City`, `Phone`, `Nationality`) VALUES
(2, 'Petter', 'Northug', 'Strindveien 12', '5660', 'Trondheim', '99955333', 'Norge'),
(3, 'Therese', 'Johaug', 'Holmenkollveien 18', '0787', 'Holmenkollen', '45454545', 'Norge'),
(4, 'Johannes', 'HÃ¸sfloth KlÃ¦bo', 'ByÃ¥svn 15', '7865', 'Trondheim', '41414234', 'Norge'),
(5, 'Stina', 'Nilsson', 'SkogsÃ¤tra 19', '8888', 'VÃ¤rmland', '98899889', 'Sverige'),
(6, 'Frida', 'Karlsson', 'Jamngatan 2', '7863', 'Malung', '91912341', 'Sverige'),
(7, 'BjÃ¸rn', 'DÃ¦hlie', 'Hagastuveien 17', '2910', 'Nannestad', '45672819', 'Norge');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `competition`
--

CREATE TABLE `competition` (
  `Id` int(11) NOT NULL,
  `Time` varchar(50) NOT NULL,
  `Type` varchar(50) NOT NULL,
  `Place` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `competition`
--

INSERT INTO `competition` (`Id`, `Time`, `Type`, `Place`) VALUES
(2, '14. Januar', '20km', 'Seefeld'),
(3, '23. Januar', '50km', 'Seefeld'),
(5, '12. Januar', 'Sprint', 'Seefeld'),
(15, '12. Januar', '10km', 'Seefeld'),
(17, '17. Januar', '30km - Skiathlon', 'Seefeld');

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `competitionAthlete`
--

CREATE TABLE `competitionAthlete` (
  `Id` int(11) NOT NULL,
  `competitionID` int(11) NOT NULL,
  `athleteID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `competitionAthlete`
--

INSERT INTO `competitionAthlete` (`Id`, `competitionID`, `athleteID`) VALUES
(37, 2, 2),
(38, 5, 2),
(39, 3, 2),
(40, 5, 3),
(41, 3, 3),
(42, 2, 4),
(43, 17, 4),
(44, 5, 4),
(45, 3, 5),
(46, 17, 5),
(47, 2, 5);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `competitionSpectator`
--

CREATE TABLE `competitionSpectator` (
  `Id` int(11) NOT NULL,
  `competitionID` int(11) NOT NULL,
  `spectatorID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `competitionSpectator`
--

INSERT INTO `competitionSpectator` (`Id`, `competitionID`, `spectatorID`) VALUES
(16, 2, 2),
(17, 2, 3),
(18, 15, 3),
(19, 3, 3),
(20, 5, 3),
(21, 17, 3),
(22, 5, 8),
(23, 3, 8),
(24, 2, 8);

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `spectator`
--

CREATE TABLE `spectator` (
  `Id` int(11) NOT NULL,
  `Firstname` varchar(50) NOT NULL,
  `Lastname` varchar(50) NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Zip` varchar(4) NOT NULL,
  `City` varchar(50) NOT NULL,
  `Phone` varchar(10) NOT NULL,
  `Ticket` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dataark for tabell `spectator`
--

INSERT INTO `spectator` (`Id`, `Firstname`, `Lastname`, `Address`, `Zip`, `City`, `Phone`, `Ticket`) VALUES
(2, 'Anne', 'Svendsen', 'Fiolvegen 12', '3425', 'TÃ¸nsberg', '45456565', 'Standard'),
(3, 'Mathias', 'Ahrn', 'Fjellstadvegen 31', '2009', 'Nordby', '90908565', 'VIP'),
(4, 'Ingrid', 'Bergersen', 'TrosterudhÃ¸gda 15', '4532', 'Vidda', '45132231', 'VIP'),
(5, 'Daniel', 'Gullerud', 'Solsikkeveien 33', '6765', 'Nannestad', '97675436', 'Standard'),
(7, 'Kaja', 'Pettersen', 'Granittgata 12', '4532', 'KlÃ¸fta', '41234132', 'Standard'),
(8, 'Kim', 'Hansen', 'Spurvlia 19', '2143', 'Sandefjord', '41324134', 'Standard'),
(9, 'Kirsten', 'Lund', 'Glitterhagen 74', '4510', 'DrÃ¸bak', '95443214', 'VIP');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `athlete`
--
ALTER TABLE `athlete`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `competition`
--
ALTER TABLE `competition`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `competitionAthlete`
--
ALTER TABLE `competitionAthlete`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `competitionSpectator`
--
ALTER TABLE `competitionSpectator`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `spectator`
--
ALTER TABLE `spectator`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `athlete`
--
ALTER TABLE `athlete`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `competition`
--
ALTER TABLE `competition`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `competitionAthlete`
--
ALTER TABLE `competitionAthlete`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `competitionSpectator`
--
ALTER TABLE `competitionSpectator`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `spectator`
--
ALTER TABLE `spectator`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
