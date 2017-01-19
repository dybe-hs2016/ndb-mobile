<!-- SQL-Befehle -->
<?php
/* EINFACHE SUCHE */
	/* Durchsucht nur die Tabellen Noten, Komponist. Der Rest kann in der Expertensuche angewählt werden */

	// Suche ausführen, falls kein Freitext, nichts tun
	if(isset($_POST['freitext'])) {
		$sql_freitext = "SELECT * FROM `view_all` ";
		$sql_freitext .= "WHERE `title` LIKE '%".$_POST['freitext']."%' OR `signature` LIKE '%".$_POST['freitext']."%' OR`linktomusic` LIKE '%".$_POST['freitext']."%' OR `linktosheet` LIKE '%".$_POST['freitext']."%' OR `comment` LIKE '%".$_POST['freitext']."%' OR `level` LIKE '%".$_POST['freitext']."%' OR`occasion` LIKE '%".$_POST['freitext']."%' OR `epochName` LIKE '%".$_POST['freitext']."%' OR `musicstyleName` LIKE '%".$_POST['freitext']."%' OR
		`publisherName` LIKE '%".$_POST['freitext']."%' OR `instruments` LIKE '%".$_POST['freitext']."%' OR `composerFullname` LIKE '%".$_POST['freitext']."%' 
		ORDER BY `title` ASC ";
		$query_freitext = mysqli_query($verb, $sql_freitext) or die("Fehler:".mysqli_error($verb));
		$suche_freitext = mysqli_fetch_assoc($query_freitext);
	}

	// Verbindungsprobleme anzeigen
	echo mysqli_error($verb);	

/* EXPERTENSUCH */
	// Feld Titel
	if(isset($_POST['suche_title'])) {
		$sql_expert = "SELECT * FROM `view_all` ";
		$sql_expert.= "WHERE `title` LIKE '%".$_POST['suche_title']."%' ORDER BY `title` ASC ";
		$query_expert = mysqli_query($verb, $sql_expert) or die("Fehler:".mysqli_error($verb));
		$suche_expert = mysqli_fetch_assoc($query_expert);
		}
		// Feld Komponist
		elseif(isset($_POST['suche_composer'])) {
		$sql_expert = "SELECT * FROM `view_all` ";
		$sql_expert.= "WHERE `composerFullname` LIKE '%".$_POST['suche_composer']."%' ORDER BY `title` ASC ";
		$query_expert = mysqli_query($verb, $sql_expert) or die("Fehler:".mysqli_error($verb));
		$suche_expert = mysqli_fetch_assoc($query_expert);
		}
		elseif(isset($instrument_POST['suche_publisher'])) {
		$sql_expert = "SELECT * FROM `view_all` ";
		$sql_expert.= "WHERE `publisherName` LIKE '%".$_POST['suche_publisher']."%' ORDER BY `title` ASC ";
		$query_expert = mysqli_query($verb, $sql_expert) or die("Fehler:".mysqli_error($verb));
		$suche_expert = mysqli_fetch_assoc($query_expert);
		}
	// Verbindungsprobleme anzeigen
	echo mysqli_error($verb);


/* CHECKBOXEN */
	// Instrumenten-Auswahl mit Checkboxen
	$sql_instrument = "SELECT id, name FROM ".$tbl_instrument." ORDER BY name ASC";	
	$result_instrument = mysqli_query($verb, $sql_instrument) or die("Fehler:".mysqli_error($verb));

/* AUSWAHLLISTEN */
	// Komponist-Dropdown
		$sql_composer = "SELECT id, name FROM ".$tbl_composer." ORDER BY name ASC";	
		$result_composer = mysqli_query($verb, $sql_composer) or die("Fehler:".mysqli_error($verb));
		
		// DEBUG row_composer
		/*echo '<h2> row_composer [id] : [name]</h2>';
		while ($row_composer = mysqli_fetch_assoc($result_composer)) {
			echo $row_composer['id'].' : '.$row_composer['name'].'<br>';}*/

	// Verlag-Dropdown
		$sql_publisher = "SELECT id, name FROM ".$tbl_publisher." ORDER BY name ASC";
		$result_publisher = mysqli_query($verb, $sql_publisher) or die("Fehler:".mysqli_error($verb));

		// DEBUG row_publisher
		/*echo '<h2> row_phblisher [id] : [name]</h2>';
		while ($row_publisher = mysqli_fetch_assoc($result_publisher)) {
			echo $row_publisher['id'].' : '.$row_publisher['name'].'<br>';
		}*/

	// Epoche-Dropdown
		$sql_epoch = "SELECT id, name FROM ".$tbl_epoch." ORDER BY id ASC";	
		$result_epoch = mysqli_query($verb, $sql_epoch) or die("Fehler:".mysqli_error($verb));

	// Level-Dropdown
		$sql_levels = "SELECT id, level FROM ".$tbl_levels." ORDER BY id ASC";	
		$result_levels = mysqli_query($verb, $sql_levels) or die("Fehler:".mysqli_error($verb));
		
		// DEBUG row_levels
		/*echo '<h2> row_levels [id] : [level]</h2>';
		while ($row_levels = mysqli_fetch_assoc($result_levels)) {
			echo $row_levels['id'].' : '.$row_levels['level'].'<br>';}
*/

	// Musicstyle-Dropdown
		$sql_musicstyle = "SELECT id, name FROM ".$tbl_musicstyle." ORDER BY id ASC";	
		$result_musicstyle = mysqli_query($verb, $sql_musicstyle) or die("Fehler:".mysqli_error($verb));


	// Occasion-Dropdown
		$sql_occasion = "SELECT id, occasion FROM ".$tbl_occasion." ORDER BY id ASC";	
		$result_occasion = mysqli_query($verb, $sql_occasion) or die("Fehler:".mysqli_error($verb));

		// DEBUG row_occasion
		/*echo '<h2> row_occasion [id] : [occasion]</h2>';
		while ($row_occasion = mysqli_fetch_assoc($result_occasion)) {
			echo $row_occasion['id'].' : '.$row_occasion['occasion'].'<br>';}*/


/*Random-Befehl für Zufallstreffer*/
	$sql_random = "SELECT * FROM `view_all` ORDER BY RAND() LIMIT 1";
	$query_random = mysqli_query($verb, $sql_random) or die("Fehler:".mysqli_error($verb));
	$random = mysqli_fetch_assoc($query_random);
	echo mysqli_error($verb);

/* DATENBANK MANIPULATION */

	/* INSERT */

	/* UPDATE */

	/* DELETE */

/* WHITELISTS */

	/* INSTRUMENTE */
	$sql_instrument_wl = "SELECT id, name FROM ".$tbl_instrument." ORDER BY name ASC";	
	$result_instrument_wl = mysqli_query($verb, $sql_instrument_wl) or die("Fehler:".mysqli_error($verb));

	while ($row_instrument_wl = mysqli_fetch_assoc($result_instrument_wl)) {
		$whitelist_instrument[] = $row_instrument_wl['name'];
	}

	/* NOTEN */
		// DB Abfrage Noten
		$sql_noten = "SELECT * FROM ".$tbl_noten;	
		$result_noten = mysqli_query($verb, $sql_noten) or die("Fehler:".mysqli_error($verb));
	
	$fn_noten = mysqli_fetch_fields($result_noten);
	foreach ($fn_noten as $val) {
		$whitelist_noten[] = $val->name;
	}
	?>