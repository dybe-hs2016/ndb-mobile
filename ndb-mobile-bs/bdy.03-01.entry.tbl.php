<?php
	require_once('verbindung.php');
	
	//Suchabfrage für die Felder der Tabelle Noten
	$sql_n = "SELECT * FROM `tbl_noten` WHERE `id`=`".$_GET['id']."` ";	
	$query_n = mysqli_query($verb, $sql_n) or die("Fehler:".mysqli_error($verb));
	$detail_n = mysqli_fetch_assoc($query_n);
	
	//Suchabfragen für die Felder der Tabelle Komponist, Instrument und Verlag
	//Diese Felder werden nur angezeigt, wenn sie auch einen Wert enthalten
	if($detail_n["id_komponist"]) {
		$sql_k = "SELECT * FROM ".$tbl_komponist." WHERE id_komponist=".$detail_n["id_komponist"]."; ";
		$query_k = mysqli_query($verb, $sql_k) or die("Fehler:".mysqli_error($verb));
		$detail_k = mysqli_fetch_assoc($query_k);
	}
	//if($detail_n["id_instrument"]) {
	//	$sql_i = "SELECT * FROM ".$tbl_instrument." WHERE id_instrument=".$detail_n["id_instrument"]."; ";		
	//	$query_i = mysqli_query($verb, $sql_i) or die("Fehler:".mysqli_error($verb));
	//	$detail_i = mysqli_fetch_assoc($query_i);
	//}
	//if($detail_n["id_verlag"]) {
	//	$sql_v = "SELECT * FROM ".$tbl_verlag." WHERE id_verlag=".$detail_n["id_verlag"]."; ";		
	//	$query_v = mysqli_query($verb, $sql_v) or die("Fehler:".mysqli_error($verb));
	//	$detail_v = mysqli_fetch_assoc($query_v);
	//}
        
	// Verbindungsprobleme anzeigen
	echo mysqli_error($verb);
?>



<!-- ENTRY METADATA TABLE -->
<h1><?php echo $title ;?></h1>$nErfassen

<div class="table">
	<table class="table">

		<!-- <tr> ID BEZEICHNUNG METADATENFELD
			<th class="key">BEZEICHUNG</th>
			<th class="val">INHALT</th>
		</tr> -->

		<tr> <!-- 02 SIGNATUR -->
			<th class="key">Signatur</th>
			<th class="val">OP-1926-ORCH</th>
		</tr>
		<tr> <!-- 03 TITEL -->
			<th class="key">Titel</th>
			<th class="val">Die Seeräuber Jenny</th>
		</tr> <!-- 04 KOMPONIST -->
			<th class="key">Komponist</th>
			<th class="val">Bert Brecht <br> Kurt Weill <br> Franz Brunier</th>
		<tr> <!-- 05 JAHR -->
			<th class="key"> Jahr </th>
			<th class="val">1926-1928</th>
		</tr>
		<tr> <!-- 0X OPUS -->
			<th class="key"> Opus </th>
			<th class="val"> Die Dreigroschenoper </th>
		</tr>
		<tr> <!-- 06 Epoche -->
			<th class="key">Epoche</th>
			<th class="val">Moderne</th>
		</tr>
		<tr> <!-- 07 Stil -->
			<th class="key">Stil</th>
			<th class="val">Oper</th>
		</tr>
		<tr> <!-- 08 Tonart -->
			<th class="key">Tonart</th>
			<th class="val">???</th>
		</tr>
		<tr> <!-- 09 Instrumente -->
			<th class="key">Instrumente</th>
			<th class="val">Gesang, Bläser, Pauke, Streicher</th>
		</tr>
		<tr> <!-- 10 Schwierigkeitsgrad -->
			<th class="key">Schwierigkeitsgrad</th>
			<th class="val">Fortgeschritten</th>
		</tr>
		<tr> <!-- 11 Anlass -->
			<th class="key">Anlass</th>
			<th class="val"></th>
		</tr>
		<tr> <!-- 12 Link zu Aufnahme -->
			<th class="key">[LINK ZU AUFNAHME]]</th>
			<th class="val"><a href="https://www.youtube.com/watch?v=Ec0clERjQ5A" target="_blank">YOUTUBE: Lotte Lenya Singing "Seeräuber Jenny" (Pirate Jenny)</a></th>
		</tr>
		<tr> <!-- 13 Link zu Noten -->
			<th class="key">[LINK ZU NOTEN]</th>
			<th class="val">Kurt Weill, Bert Brecht</th>
		</tr>
	</table>
</div>