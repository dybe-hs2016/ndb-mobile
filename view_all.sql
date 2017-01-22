-- phpMyAdmin SQL Dump
-- version 4.2.7
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Erstellungszeit: 22. Jan 2017 um 17:56
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
-- Struktur des Views `view_all`
--

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_all` AS select `tbl_noten`.`id` AS `id`,`tbl_noten`.`title` AS `title`,`tbl_noten`.`signature` AS `signature`,`tbl_noten`.`linktomusic` AS `linktomusic`,`tbl_noten`.`linktosheet` AS `linktosheet`,`tbl_noten`.`comment` AS `comment`,`tbl_levels`.`level` AS `level`,`tbl_occasion`.`occasion` AS `occasion`,`tbl_epoch`.`name` AS `epochName`,`tbl_musicstyle`.`name` AS `musicstyleName`,`tbl_publisher`.`name` AS `publisherName`,group_concat(`tbl_instrument`.`name` separator ', ') AS `instruments`,concat(`tbl_composer`.`firstname`,' ',`tbl_composer`.`name`) AS `composerFullname` from ((((((((`tbl_noten` left join `tbl_composer` on((`tbl_noten`.`id_composer` = `tbl_composer`.`id`))) left join `tbl_epoch` on((`tbl_noten`.`id_epoch` = `tbl_epoch`.`id`))) left join `tbl_levels` on((`tbl_noten`.`id_levels` = `tbl_levels`.`id`))) left join `tbl_musicstyle` on((`tbl_noten`.`id_musicstyle` = `tbl_musicstyle`.`id`))) left join `tbl_occasion` on((`tbl_noten`.`id_occasion` = `tbl_occasion`.`id`))) left join `tbl_publisher` on((`tbl_noten`.`id_publisher` = `tbl_publisher`.`id`))) join `noten_instrument` on((`tbl_noten`.`id` = `noten_instrument`.`id_noten`))) left join `tbl_instrument` on((`noten_instrument`.`id_instrument` = `tbl_instrument`.`id`))) group by `tbl_noten`.`id`;

--
-- VIEW  `view_all`
-- Daten: keine
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
