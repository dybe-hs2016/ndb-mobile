<?php
/*
// Wichtigste Verbindungsparameter als Variablen für HTW-Webserver --> Tobias sollte das einfüllen...
$host = "localhost";
$db = "321006_1_1";
$user = "321006_1_1";
$pwd = "RNoJqKY9cave";
$tbl = "tbl_pokemon2";
$verb = mysqli_connect($host, $user, $pwd, $db);
*/

// Wichtigste Verbindungsparameter als Variablen für lokalen Gebrauch
$host = "localhost";
$db = "ndb";
$user = "root";
$pwd = "root";
$noten_instrument = "noten_instrument";
$tbl_epoch = "tbl_epoch";
$tbl_instrument = "tbl_instrument";
$tbl_composer = "tbl_composer";
$tbl_levels = "tbl_levels";
$tbl_musicstyle = "tbl_musicstyle";
$tbl_noten = "tbl_noten";
$tbl_occasion = "tbl_occasion";
$tbl_publisher = "tbl_publisher";
$tbl_tonality = "tbl_tonality";
$verb = mysqli_connect($host, $user, $pwd, $db);

// Fehler ausgeben
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Zeichensatz utf8
mysqli_query($verb,"SET NAMES 'utf8' COLLATE'utf8_general_ci'") or die("Fehler:".mysqli_connect_error());
// Keine Enter unterhalb letzter Zeile!
?>