<!-- Suchergebnisse werden aufgelistet-->

<h1> Suchergebnisse </h1>
<!-- Klick auf Link, dann Detailansicht in entry -->

<?php include("incl.04.form.php"); ?>

<?php if ($suche_freitext == NULL) {
	//Wenn die Suche keine Treffer erzielt, nachfolgendes ausgeben
	include("incl.05.noresult.php"); 
	} else { ?>
	<!-- Wenn die Suche Treffer erzielt, Treffer ausgeben -->
	<div class="table">
		<table class="table">
		<tr>
		<td>Titel</td>
		<td><?php if(isset($suche_freitext)) {echo $suche_freitext ['title'];} else { echo "-"; } ?></td>
		</tr>
		
		<tr>
		<td>Komponist</td>
		<td><?php if(isset($suche_freitext)) {echo $suche_freitext ['name'];} else { echo "-"; } ?></td>
		<td><?php if(isset($suche_freitext)) {echo $suche_freitext ['firstname'];} else { echo "-"; } ?></td>
		</tr>
			
		<tr> 
		<td>Instrument</td>
		<td><?php if(isset($suche_freitext)) {echo $suche_freitext ['instrument'];} else { echo "-"; } ?></td>
		</tr>
			
		</table>
	</div>
	<? }
	?>


<?php if ($suche_freitext == NULL) {
	//Wenn die Suche keine Treffer erzielt, nachfolgendes ausgeben
	include("incl.05.noresult.php"); 
	} else { 
	echo '<h1>'.$suche_freitext['Titel'].'</h1>';
?>

<!-- For Array USE THIS SOLUTION -->
<!-- db endtry as simple foreach loop -->

	<div class="table">
		<table class="table">
			<!-- <tr> ID BEZEICHNUNG METADATENFELD
				<th class="key">BEZEICHUNG</th>
				<th class="val">INHALT</th>
			</tr> -->

			<?php 
				foreach ($suche_freitext as $key => $val) {
					
					
					echo '<tr> 
						<th class="key">'.$key.'</th>
						<th class="val">'.$val.'</th> 
					</tr>';
				}
			?>
		</table>
	</div>	
	<? } 
?>
	

<button onclick='history.back()'>Zur&uuml;ck zur Suche</button>
