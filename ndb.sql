-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 11. Dez 2016 um 12:42
-- Server Version: 5.5.41-log
-- PHP-Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Datenbank: `ndb`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `noten_instrument`
--

CREATE TABLE IF NOT EXISTS `noten_instrument` (
  `id_instrument` int(11) NOT NULL,
  `id_noten` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_composer`
--

CREATE TABLE IF NOT EXISTS `tbl_composer` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `firstname` varchar(100) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `tbl_composer`
--

INSERT INTO `tbl_composer` (`id`, `name`, `firstname`) VALUES
(1, 'Pärt', 'Arvo'),
(2, 'Bach', 'Johann Sebastian'),
(3, 'Telemann', 'Georg Philipp'),
(4, 'Händel', 'Georg Friedrich'),
(5, 'Mozart', 'Wolfgang Amadeus'),
(6, 'Hafner', 'Märku');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_epoch`
--

CREATE TABLE IF NOT EXISTS `tbl_epoch` (
`id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Daten für Tabelle `tbl_epoch`
--

INSERT INTO `tbl_epoch` (`id`, `name`) VALUES
(1, 'Mittelalter (9.-13. Jh.)'),
(2, 'Renaissance (14.-16. Jh.)'),
(3, 'Barock (17.-18. Jh.)'),
(4, 'Vorklassik (1740-1770)'),
(5, 'Wiener Klassik (1760-1825)'),
(6, 'Romantik (1810-1910)'),
(7, 'Musik des 20./21. Jh.'),
(8, 'keine Angabe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_instrument`
--

CREATE TABLE IF NOT EXISTS `tbl_instrument` (
`id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Daten für Tabelle `tbl_instrument`
--

INSERT INTO `tbl_instrument` (`id`, `name`) VALUES
(1, 'Oboe'),
(2, 'Klavier'),
(3, 'Orgel'),
(4, 'Blockflöte'),
(5, 'Gitarre'),
(6, 'Orchester'),
(7, 'Violine'),
(8, 'Cello'),
(9, 'Kontrabass');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_levels`
--

CREATE TABLE IF NOT EXISTS `tbl_levels` (
`id` int(11) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `tbl_levels`
--

INSERT INTO `tbl_levels` (`id`, `level`) VALUES
(1, 'Anfänger'),
(2, 'Fortgeschritten'),
(3, 'Profi'),
(4, 'keine Angabe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_musicstyle`
--

CREATE TABLE IF NOT EXISTS `tbl_musicstyle` (
`id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `tbl_musicstyle`
--

INSERT INTO `tbl_musicstyle` (`id`, `name`) VALUES
(1, 'Blues, Jazz & Soul'),
(2, 'Country, Folkmusic & World'),
(3, 'Filmmusik & Musicals'),
(4, 'Klassik'),
(5, 'Pop & Rock'),
(6, 'Rap & Hip Hop'),
(7, 'Anderes');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_noten`
--

CREATE TABLE IF NOT EXISTS `tbl_noten` (
`id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `signature` varchar(50) DEFAULT NULL,
  `linktomusic` varchar(200) DEFAULT NULL,
  `linktosheet` varchar(200) DEFAULT NULL,
  `comment` varchar(1000) DEFAULT NULL,
  `id_composer` int(11) DEFAULT NULL,
  `id_publisher` int(11) DEFAULT NULL,
  `id_epoch` int(11) DEFAULT NULL,
  `id_musicstyle` int(11) DEFAULT NULL,
  `id_tonality` int(11) DEFAULT NULL,
  `id_levels` int(11) DEFAULT NULL,
  `id_occasion` int(11) DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Daten für Tabelle `tbl_noten`
--

INSERT INTO `tbl_noten` (`id`, `title`, `signature`, `linktomusic`, `linktosheet`, `comment`, `id_composer`, `id_publisher`, `id_epoch`, `id_musicstyle`, `id_tonality`, `id_levels`, `id_occasion`) VALUES
(1, 'Sinfonie', 'HA 1', NULL, NULL, 'Super Sach', 1, 2, 3, 4, 35, 1, 4),
(2, 'Sonate für Violine', 'Bu', 'https://www.youtube.com/watch?v=x7xPIyePmNk', NULL, NULL, 5, 1, 4, 1, 39, 3, 2),
(3, 'Fröhliche Weihnacht überall', 'O1', NULL, NULL, NULL, 2, 3, 4, 1, 43, 2, 3),
(4, 'Testtitel', 'DU', NULL, NULL, NULL, 3, NULL, NULL, 4, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_occasion`
--

CREATE TABLE IF NOT EXISTS `tbl_occasion` (
`id` int(11) NOT NULL,
  `occasion` varchar(30) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Daten für Tabelle `tbl_occasion`
--

INSERT INTO `tbl_occasion` (`id`, `occasion`) VALUES
(1, 'Advent'),
(2, 'Weihnachten'),
(3, 'Ostern'),
(4, 'Pfingsten'),
(5, 'Kasualien'),
(6, 'Hochzeiten'),
(7, 'Keine Angabe');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_publisher`
--

CREATE TABLE IF NOT EXISTS `tbl_publisher` (
`id` int(11) NOT NULL,
  `name` tinytext NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Daten für Tabelle `tbl_publisher`
--

INSERT INTO `tbl_publisher` (`id`, `name`) VALUES
(1, 'Schott'),
(2, 'G. Henle Verlag'),
(3, 'Universal Edition'),
(5, 'Maurizio Machella'),
(6, 'Zytglogge');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `tbl_tonality`
--

CREATE TABLE IF NOT EXISTS `tbl_tonality` (
`id` int(11) NOT NULL,
  `tonality` varchar(20) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=51 ;

--
-- Daten für Tabelle `tbl_tonality`
--

INSERT INTO `tbl_tonality` (`id`, `tonality`) VALUES
(26, 'C-Dur'),
(27, 'G-Dur'),
(28, 'D-Dur'),
(29, 'A-Dur'),
(30, 'E-Dur'),
(31, 'H-Dur'),
(32, 'Fis-Dur/Ges-Dur'),
(33, 'Des-Dur'),
(34, 'As-Dur'),
(35, 'Es-Dur'),
(36, 'B-Dur'),
(37, 'F-Dur'),
(38, 'a-moll'),
(39, 'e-moll'),
(40, 'h-moll'),
(41, 'fis-moll'),
(42, 'cis-moll'),
(43, 'gis-moll'),
(44, 'dis-moll/es-moll'),
(45, 'b-moll'),
(46, 'f-moll'),
(47, 'e-moll'),
(48, 'g-moll'),
(49, 'd-moll'),
(50, 'keine Angabe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `noten_instrument`
--
ALTER TABLE `noten_instrument`
 ADD PRIMARY KEY (`id_instrument`,`id_noten`), ADD KEY `id_instrument` (`id_instrument`), ADD KEY `id_noten` (`id_noten`);

--
-- Indexes for table `tbl_composer`
--
ALTER TABLE `tbl_composer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_epoch`
--
ALTER TABLE `tbl_epoch`
 ADD PRIMARY KEY (`id`), ADD KEY `id` (`id`);

--
-- Indexes for table `tbl_instrument`
--
ALTER TABLE `tbl_instrument`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_levels`
--
ALTER TABLE `tbl_levels`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_musicstyle`
--
ALTER TABLE `tbl_musicstyle`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_noten`
--
ALTER TABLE `tbl_noten`
 ADD PRIMARY KEY (`id`), ADD KEY `id_musicstyle` (`id_musicstyle`), ADD KEY `id_epoch` (`id_epoch`), ADD KEY `id_tonality` (`id_tonality`), ADD KEY `id_levels` (`id_levels`), ADD KEY `id_occasion` (`id_occasion`), ADD KEY `id_publisher` (`id_publisher`), ADD KEY `id_composer` (`id_composer`);

--
-- Indexes for table `tbl_occasion`
--
ALTER TABLE `tbl_occasion`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_tonality`
--
ALTER TABLE `tbl_tonality`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_composer`
--
ALTER TABLE `tbl_composer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_epoch`
--
ALTER TABLE `tbl_epoch`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_instrument`
--
ALTER TABLE `tbl_instrument`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `tbl_levels`
--
ALTER TABLE `tbl_levels`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_musicstyle`
--
ALTER TABLE `tbl_musicstyle`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_noten`
--
ALTER TABLE `tbl_noten`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_occasion`
--
ALTER TABLE `tbl_occasion`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tbl_publisher`
--
ALTER TABLE `tbl_publisher`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tbl_tonality`
--
ALTER TABLE `tbl_tonality`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
--
-- Constraints der exportierten Tabellen
--

--
-- Constraints der Tabelle `noten_instrument`
--
ALTER TABLE `noten_instrument`
ADD CONSTRAINT `noten_instrument_ibfk_1` FOREIGN KEY (`id_instrument`) REFERENCES `tbl_instrument` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
ADD CONSTRAINT `noten_instrument_ibfk_2` FOREIGN KEY (`id_noten`) REFERENCES `tbl_noten` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints der Tabelle `tbl_noten`
--
ALTER TABLE `tbl_noten`
ADD CONSTRAINT `tbl_noten_ibfk_1` FOREIGN KEY (`id_epoch`) REFERENCES `tbl_epoch` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_noten_ibfk_2` FOREIGN KEY (`id_musicstyle`) REFERENCES `tbl_musicstyle` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_noten_ibfk_3` FOREIGN KEY (`id_tonality`) REFERENCES `tbl_tonality` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_noten_ibfk_4` FOREIGN KEY (`id_levels`) REFERENCES `tbl_levels` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_noten_ibfk_5` FOREIGN KEY (`id_occasion`) REFERENCES `tbl_occasion` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_noten_ibfk_6` FOREIGN KEY (`id_publisher`) REFERENCES `tbl_publisher` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
ADD CONSTRAINT `tbl_noten_ibfk_7` FOREIGN KEY (`id_composer`) REFERENCES `tbl_composer` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
