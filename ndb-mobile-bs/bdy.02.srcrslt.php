<!-- Suchergebnisse werden aufgelistet-->

<h1> Suchergebnisse </h1>
<!-- Klick auf Link, dann Detailansicht in entry -->
<?php
	$suche_expert = NULL;
	$suche_freitext = NULL;
?>

<?php include("incl.04.form.php"); ?>

<?php if ($suche_freitext !== NULL) {
			// Wenn die einfache Suche Treffer erzielt, Treffer ausgeben
				do { ?>
					<div class="table">
						<table class="table">
						<!-- Titel -->
						<h2><?php if(isset($suche_freitext)) {echo $suche_freitext['title'];} else { echo "-"; } ?></h2>
					
						<!-- Komponist und Instrumente -->
						<tr>
						<td>Komponist</td>
						<td><?php if(isset($suche_freitext)) {echo $suche_freitext['firstname']." ".$suche_freitext['name'];} else { echo "-"; } ?></td>
						</tr>
						
						<!-- Instrumente -->
						<tr> 
						<td>Instrument(e)</td>
						<td><?php if(isset($suche_freitext)) {echo $suche_freitext['instrument'];} else { echo "-"; } ?></td>
						</tr>
					<? }
				while($suche_freitext = mysqli_fetch_assoc($query_freitext)); ?>
						</table>
		</div> <?
		} elseif ($suche_expert !== NULL) {
			// Wenn die Experten-Suche Treffer erzielt, Treffer ausgeben
			do { ?>
				<div class="table">
					<table class="table">
					<!-- Titel -->
					<h2><?php if(isset($suche_expert)) {echo $suche_expert['title'];} else { echo "-"; } ?></h2>
				
					<!-- Komponist und Instrumente -->
					<tr>
					<td>Komponist</td>
					<td><?php if(isset($suche_expert)) {echo $suche_expert['firstname']." ".$suche_expert['name'];} else { echo "-"; } ?></td>
					</tr>
					
					<!-- Instrumente -->
					<tr> 
					<td>Instrument(e)</td>
					<td><?php if(isset($suche_expert)) {echo $suche_expert['instrument'];} else { echo "-"; } ?></td>
					</tr>
				<? }
			while($suche_expert = mysqli_fetch_assoc($query_expert)); ?>
					</table>
				</div> <?
		} else { 
			//Wenn die Suche keine Treffer erzielt, nachfolgendes ausgeben
			include("incl.05.noresult.php");
		}
?>


<button onclick='history.back()'>Zur&uuml;ck zur Suche</button>

	
	
<!-- Lösung mit foreach, macht aber bei der Ausgabe von drei Feldern nicht so viel Sinn... -->	
<?php /*
	if ($suche_freitext == NULL) {
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
*/	



