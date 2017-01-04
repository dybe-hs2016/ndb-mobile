<!-- Funktionen für die Anzeige der Treffer -->

<?php include("incl.04.form.php"); ?>

<!-- Von der "normalen" Suche her -->
<?php
function simplesearch() {
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
		</div>
	<?php
} ?>


<!-- Von der Experten-Suche her -->
<?php
function expertsearch() {
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
		</div>
	<?php
} ?>