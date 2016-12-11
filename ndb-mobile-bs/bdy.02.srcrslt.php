<?php
	require_once('../../../private/verbindung.php');
        
	// Wenn kein 'freitext" eingegeben wurde, dann wird die Variable auf "" gesetzt
	if(!isset($_GET['freitext'])) {
		$_GET['freitext'] = "";
	}
	
	// SQL-Abfrage für Freitextsuche, packt die Ergebnisse in $suche_freitext
        $sql_freitext = "SELECT * FROM `tbl_noten` ";
        $sql_freitext .= "LEFT JOIN `tbl_composer` ON `tbl_noten`.`id_composer`=`tbl_composer`.`id` ";
        $sql_freitext .= "WHERE `title` LIKE '%".$_GET['freitext']."%' OR `name` LIKE '%".$_GET['freitext']."%' OR `firstname` LIKE '%".$_GET['freitext']."%' ";
	$query_freitext = mysqli_query($verb, $sql_freitext) or die("Fehler:".mysqli_error($verb));
	$suche_freitext = mysqli_fetch_assoc($query_freitext);
	
        // $sql_freitext = "SELECT * FROM ".$tbl_noten." "; 
	// $sql_freitext .= "LEFT JOIN ".$tbl_komponist." ON ".$tbl_noten.".id_komponist=".$tbl_komponist.".id_komponist " ;	
	// $sql_freitext .= "LEFT JOIN ".$tbl_verlag." ON ".$tbl_noten.".id_verlag=".$tbl_verlag.".id_verlag " ;
	// $sql_freitext .= "LEFT JOIN ".$tbl_instrument." ON ".$tbl_noten.".id_instrument=".$tbl_instrument.".id_instrument " ;
	// $sql_freitext .= "WHERE titel LIKE '%".$_GET['freitext']."%' OR kommentarfeld LIKE '%".$_GET['freitext']."%' OR vorname LIKE '%".$_GET['freitext']."%'
	// 			   OR name LIKE '%".$_GET['freitext']."%' OR instrument LIKE '%".$_GET['freitext']."%' OR verlagsname LIKE '%".$_GET['freitext']."%' 
	// 			   ORDER BY titel ASC LIMIT ".$start.",".$zeilen."; ";
        
        
	// Verbindungsprobleme anzeigen
	echo mysqli_error($verb);
?>

<h1>Suchergebnisse aufgelistet</h1>
<h2>Klick auf Link, dann Detailansicht in entry</h2>



<div class="table">
    <table class="table">
	<tr>
	<td>Titel</td>
	<td><?php if(isset($suche_freitext)) {echo $suche_freitext ['title'];} else { echo "-"; } ?></td>
	</tr>
        
        <td>Komponist</td>
	<td><?php if(isset($suche_freitext)) {echo $suche_freitext ['name'];} else { echo "-"; } ?></td>
        <td><?php if(isset($suche_freitext)) {echo $suche_freitext ['firstname'];} else { echo "-"; } ?></td>
	</tr>
        
        <td>Instrument</td>
	<td><?php if(isset($suche_freitext)) {echo $suche_freitext ['instrument'];} else { echo "-"; } ?></td>
	</tr>
        
    </table>
</div>
