SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Tabellstruktur for tabell `person`
--

CREATE TABLE
IF NOT EXISTS `person`
(
  `Id` int
(11) NOT NULL AUTO_INCREMENT,
  `Fornavn` varchar
(50) NOT NULL,
  `Etternavn` varchar
(50) NOT NULL,
  `Adresse` varchar
(50) NOT NULL,
  `Postnr` varchar
(4) NOT NULL,
  `Poststed` varchar
(50) NOT NULL,
  `Telefonnr` varchar
(10) NOT NULL,
  PRIMARY KEY
(`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;


CREATE TABLE
IF NOT EXISTS `athlete`
(
  `Id` int
(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar
(50) NOT NULL,
  `Lastname` varchar
(50) NOT NULL,
  `Address` varchar
(50) NOT NULL,
  `Zip` varchar
(4) NOT NULL,
  `City` varchar
(50) NOT NULL,
  `Phone` varchar
(10) NOT NULL,
  `Nationality` varchar
(50) NOT NULL,
  PRIMARY KEY
(`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE
IF NOT EXISTS `spectator`
(
  `Id` int
(11) NOT NULL AUTO_INCREMENT,
  `Firstname` varchar
(50) NOT NULL,
  `Lastname` varchar
(50) NOT NULL,
  `Address` varchar
(50) NOT NULL,
  `Zip` varchar
(4) NOT NULL,
  `City` varchar
(50) NOT NULL,
  `Phone` varchar
(10) NOT NULL,
  `Ticket` varchar
(50) NOT NULL,
  PRIMARY KEY
(`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

CREATE TABLE
IF NOT EXISTS `competition`
(
  `Id` int
(11) NOT NULL AUTO_INCREMENT,
  `Time` varchar
(50) NOT NULL,
  `Type` varchar
(50) NOT NULL,
  `Place` varchar
(50) NOT NULL,
  PRIMARY KEY
(`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dataark for tabell `person`
--

INSERT INTO `person` (`
Id`,
`Fornavn
`, `Etternavn`, `Adresse`, `Postnr`, `Poststed`, `Telefonnr`) VALUES
(1, 'Per', 'Hansen', 'Osloveien 82', '2211', 'Oslo', '12345678');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;