<!-- SQL-Befehle -->


<!-- Einfache Suche -->
<!-- Durchsucht nur die Tabellen Noten, Komponist und Instrument. Der Rest kann in der Expertensuche angewählt werden-->
<!-- Instrument nocht nicht gemacht... da dies mit einer Zwischentabelle funktioniert. -->
<!-- Diesen Teil verwende ich im Moment auch für die Expertensuche... Wird dann noch anders. -->
<?php
	// Suche ausführen, falls kein Freitext, nichts tun
	if(isset($_POST['freitext'])) {
    $sql_freitext = "SELECT * FROM `tbl_noten` ";
    $sql_freitext .= "LEFT JOIN `tbl_composer` ON `tbl_noten`.`id_composer`=`tbl_composer`.`id` ";
	$sql_freitext .= "WHERE `title` LIKE '%".$_POST['freitext']."%' OR `name` LIKE '%".$_POST['freitext']."%' OR `firstname` LIKE '%".$_POST['freitext']."%' ";
	$query_freitext = mysqli_query($verb, $sql_freitext) or die("Fehler:".mysqli_error($verb));
	$suche_freitext = mysqli_fetch_assoc($query_freitext);
		
	/* var_dump($sql_freitext); ergibt folgendes
	array(15) { ["id"]=> string(1) "1" ["title"]=> string(8) "Sinfonie" ["signature"]=> string(4) "HA 1" 
	/["linktomusic"]=> NULL ["linktosheet"]=> NULL ["comment"]=> string(10) "Super Sach" ["id_composer"]=> string(1) "1" 
	["id_publisher"]=> string(1) "2" ["id_epoch"]=> string(1) "3" ["id_musicstyle"]=> string(1) "4" ["id_tonality"]=> string(2) "35" 
	["id_levels"]=> string(1) "1" ["id_occasion"]=> string(1) "4" ["name"]=> string(5) "Pärt" ["firstname"]=> string(4) "Arvo" }
	*/
	
	// Verbindungsprobleme anzeigen
	echo mysqli_error($verb);
	}
?>


<!-- Expertensuche -->
<?php
	// Feld Titel
	if(isset($_POST['suche_title'])) {
		$sql_freitext = "SELECT `title` FROM ".$tbl_noten." WHERE `title` LIKE '%".$_POST['suche_title']."%' ";
		$query_freitext = mysqli_query($verb, $sql_freitext) or die("Fehler:".mysqli_error($verb));
		$suche_freitext = mysqli_fetch_assoc($query_freitext);
		} 
		elseif(isset($_POST['suche_composer'])) {
		$sql_freitext = "SELECT `name` FROM ".$tbl_composer." WHERE `name` LIKE '%".$_POST["suche_composer"]."%' OR `firstname` LIKE '%".$_POST['suche_composer']."%' ";	
		$query_freitext = mysqli_query($verb, $sql_freitext) or die("Fehler:".mysqli_error($verb));
		$suche_freitext = mysqli_fetch_assoc($query_freitext);
		}
		elseif(isset($_POST['suche_publisher'])) {
		$sql_freitext = "SELECT `name` FROM ".$tbl_composer." WHERE `name` LIKE '%".$_POST["suche_composer"]."%' OR `firstname` LIKE '%".$_POST['suche_composer']."%' ";	
		$query_freitext = mysqli_query($verb, $sql_freitext) or die("Fehler:".mysqli_error($verb));
		$suche_freitext = mysqli_fetch_assoc($query_freitext);
		}
		

	echo mysqli_error($verb);
?>	

<?php
	// Instrumenten-Auswahl mit Checkboxen
	$sql_instrument = "SELECT id, name FROM ".$tbl_instrument." ORDER BY id";	
	$result_instrument = mysqli_query($verb, $sql_instrument) or die("Fehler:".mysqli_error($verb));
?>

<?php
	// Epoche-Dropdown
	$sql_epoch = "SELECT id, name FROM ".$tbl_epoch." ORDER BY id DESC";	
	$result_epoch = mysqli_query($verb, $sql_epoch) or die("Fehler:".mysqli_error($verb));
?>

<?php
	// Level-Dropdown
	$sql_levels = "SELECT id, level FROM ".$tbl_levels." ORDER BY id DESC";	
	$result_levels = mysqli_query($verb, $sql_levels) or die("Fehler:".mysqli_error($verb));
?>

<?php
	// Musicstyle-Dropdown
	$sql_musicstyle = "SELECT id, name FROM ".$tbl_musicstyle." ORDER BY id DESC";	
	$result_musicstyle = mysqli_query($verb, $sql_musicstyle) or die("Fehler:".mysqli_error($verb));
?>

<?php
	// Occaion-Dropdown
	$sql_occasion = "SELECT id, occasion FROM ".$tbl_occasion." ORDER BY id DESC";	
	$result_occasion = mysqli_query($verb, $sql_occasion) or die("Fehler:".mysqli_error($verb));
?>

<!--	
	   $sql_titel = "SELECT 'title' FROM ".$tbl_noten." "; 
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

<!-- Random-Befehl für Zufallstreffer -->
<?php
	$sql_random = "SELECT * FROM `tbl_noten` ORDER BY RAND() LIMIT 1";
	$query_random = mysqli_query($verb, $sql_random) or die("Fehler:".mysqli_error($verb));
	$random = mysqli_fetch_assoc($query_random);
	echo mysqli_error($verb);
?>