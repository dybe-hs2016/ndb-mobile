<?php
// Wichtigste Verbindungsparameter als Variablen für lokalen Gebrauch
$host = "localhost";
$db = "313563_4_1";
$user = "313563_4_1";
$pwd = "zBYnZge5RLFt";
$tbl = "tbl_noten";

$verb = mysqli_connect($host, $user, $pwd, $db);

// Fehler ausgeben
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Zeichensatz utf8
mysqli_query($verb,"SET NAMES 'utf8' COLLATE'utf8_general_ci'") or die("Fehler:".mysqli_connect_error());
// Keine Enter unterhalb letzter Zeile!
?>