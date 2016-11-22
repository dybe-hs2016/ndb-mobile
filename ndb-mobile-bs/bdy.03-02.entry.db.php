<!-- ENTRY METADATA TABLE -->
<h1>Die Seeräuber Jenny</h1>

<?php
	$json = '{"a":1,"b":2,"c":3,"d":4,"e":5}';
?>

<?php
		var_dump(json_decode($json));
		var_dump(json_decode($json, true));
?>

<?php
	$getData = file_get_contents("db-entry-dummy.json");
	$parsData = json_decode($getData, true);
?>

<?php
	foreach ($parsData as $key => $val) {
		echo $key." : ".$val."<br>";
	}

?>

<div class="table">
	<table class="table">

		<!-- <tr> ID BEZEICHNUNG METADATENFELD
			<th class="key">BEZEICHUNG</th>
			<th class="val">INHALT</th>
		</tr> -->

	</table>
</div>  
