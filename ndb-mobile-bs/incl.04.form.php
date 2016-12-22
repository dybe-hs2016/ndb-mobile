<!-- SQL-Befehle -->


<!-- Einfache Suche -->
<!-- Durchsucht nur die Tabellen Noten, Komponist und Instrument. Der Rest kann in der Expertensuche angewählt werden-->
<!-- Instrument nocht nicht gemacht... da dies mit einer Zwischentabelle funktioniert. -->
<?php
	// Suche ausführen, falls kein Freitext, nichts tun
	if(isset($_POST['freitext'])) {
    $sql_freitext = "SELECT * FROM `tbl_noten` ";
    $sql_freitext .= "LEFT JOIN `tbl_composer` ON `tbl_noten`.`id_composer`=`tbl_composer`.`id` ";
	$sql_freitext .= "WHERE `title` LIKE '%".$_POST['freitext']."%' OR `name` LIKE '%".$_POST['freitext']."%' OR `firstname` LIKE '%".$_POST['freitext']."%' ";
	$query_freitext = mysqli_query($verb, $sql_freitext) or die("Fehler:".mysqli_error($verb));
	$suche_freitext = mysqli_fetch_assoc($query_freitext);
	
	// Verbindungsprobleme anzeigen
	echo mysqli_error($verb);
	}
?>




<!-- Expertensuche -->
<!--
    // $sql_freitext = "SELECT * FROM ".$tbl_noten." "; 
	// $sql_freitext .= "LEFT JOIN ".$tbl_komponist." ON ".$tbl_noten.".id_komponist=".$tbl_komponist.".id_komponist " ;	
	// $sql_freitext .= "LEFT JOIN ".$tbl_verlag." ON ".$tbl_noten.".id_verlag=".$tbl_verlag.".id_verlag " ;
	// $sql_freitext .= "LEFT JOIN ".$tbl_instrument." ON ".$tbl_noten.".id_instrument=".$tbl_instrument.".id_instrument " ;
	// $sql_freitext .= "WHERE titel LIKE '%".$_POST['freitext']."%' OR kommentarfeld LIKE '%".$_POST['freitext']."%' OR vorname LIKE '%".$_POST['freitext']."%'
	// 			   OR name LIKE '%".$_POST['freitext']."%' OR instrument LIKE '%".$_POST['freitext']."%' OR verlagsname LIKE '%".$_POST['freitext']."%' 
	// 			   ORDER BY titel ASC LIMIT ".$start.",".$zeilen."; ";
-->




<!-- Insert-Befehle -->

<!-- Update-Befehle -->

<!-- Delete-Befehl -->