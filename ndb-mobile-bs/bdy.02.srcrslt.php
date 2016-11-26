
<?php
	require_once('verbindung.php');
        
	// Wenn kein "freitext" eingegeben wurde, dann wird die Variable auf "" gesetzt
	if(!isset($_GET['freitext'])) {
		$_GET['freitext'] = "";
	}
	
	// SQL-Abfrage für Freitextsuche, packt die Ergebnisse in $suche_freitext
        $sql_freitext = "SELECT * FROM `tbl_noten` WHERE `title` LIKE '%".$_GET['freitext']."%' ";
	$query_freitext = mysqli_query($verb, $sql_freitext) or die("Fehler:".mysqli_error($verb));
	$suche_freitext = mysqli_fetch_assoc($query_freitext);
	
	// Verbindungsprobleme anzeigen
	echo mysqli_error($verb);
?>



<div class="table">
    <table class="table">
	<tr>
	<td>Titel</td>
	<td><?php if(isset($suche_freitext)) {echo $suche_freitext ['title'];} else { echo "-"; } ?></td>
	</tr>
    </table>
</div>
