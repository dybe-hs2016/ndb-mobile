 <?php
	require_once('verbindung.php');
	
	//Suchabfrage für die Felder der Tabelle Noten
	$sql_n = "SELECT * FROM ".$tbl_noten." WHERE id_noten=".$_GET["id_noten"]."; ";	
	$query_n = mysqli_query($verb, $sql_n) or die("Fehler:".mysqli_error($verb));
	$detail_n = mysqli_fetch_assoc($query_n);
	
	//Suchabfragen für die Felder der Tabelle Komponist, Instrument und Verlag
	//Diese Felder werden nur angezeigt, wenn sie auch einen Wert enthalten
	if($detail_n["id_komponist"]) {
		$sql_k = "SELECT * FROM ".$tbl_komponist." WHERE id_komponist=".$detail_n["id_komponist"]."; ";
		$query_k = mysqli_query($verb, $sql_k) or die("Fehler:".mysqli_error($verb));
		$detail_k = mysqli_fetch_assoc($query_k);
	}
	if($detail_n["id_instrument"]) {
		$sql_i = "SELECT * FROM ".$tbl_instrument." WHERE id_instrument=".$detail_n["id_instrument"]."; ";		
		$query_i = mysqli_query($verb, $sql_i) or die("Fehler:".mysqli_error($verb));
		$detail_i = mysqli_fetch_assoc($query_i);
	}
	if($detail_n["id_verlag"]) {
		$sql_v = "SELECT * FROM ".$tbl_verlag." WHERE id_verlag=".$detail_n["id_verlag"]."; ";		
		$query_v = mysqli_query($verb, $sql_v) or die("Fehler:".mysqli_error($verb));
		$detail_v = mysqli_fetch_assoc($query_v);
	}
	// Verbindungsprobleme anzeigen
	echo mysqli_error($verb);
?>


<div class="table">
	<table class="table">
		<tr>
			<td>Komponist</td>
			<td><?php if(isset($detail_k)) {echo $detail_k ['vorname']." ".$detail_k ['name'];} else { echo "-"; } ?></td>
			</tr>
	</table>
</div>
