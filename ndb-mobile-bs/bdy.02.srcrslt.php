<!-- Suchergebnisse werden aufgelistet-->

<h1> Suchergebnisse </h1>
<!-- Klick auf Link, dann Detailansicht in entry -->
<?php
	$suche_expert = NULL;
	$suche_freitext = NULL;
?>

<?php include("incl.04.form.php"); ?>

<div class="container"> <!-- content container no 3 -->
	<div class="row">
		<section class="col-xs-12">
			<div class="col-sm-6">
				<?php if ($suche_freitext !== NULL) {
					// Wenn die einfache Suche Treffer erzielt, Treffer ausgeben
					do { ?>
					<!-- Instrumente separat ausgeben/suchen, ['id'] welche sind in n/m drin -->
					<div class="table-responsive">
						<table class="table">
						<!-- Titel -->
						<h2><a href ="page.00.index.php?varname=bdy.03.zfTreffer.php">
							<?php if(isset($suche_freitext)) {echo $suche_freitext['title'];} else { echo "-"; } ?>
							</a></h2>
							
						<!-- Komponist und Instrumente -->
						<tr>
						<td>Komponist</td>
						<td><?php if(isset($suche_freitext)) {echo $suche_freitext['firstname']." ".$suche_freitext['name'];} else { echo "-"; } ?></td>
						</tr>
						
						<!-- Instrumente -->
						<tr> 
						<td>Instrument(e)</td>
						<td><?php if(isset($suche_freitext)) {echo $suche_freitext['name'];} else { echo "-"; } ?></td>
						</tr>
						
						<!-- Button um den Titel meiner Sammlung hinzuzufügen -->
						<tr>
						<td></td>
						<td><button class="btn btn-primary pull-right btn-xs" onclick=''>In meine Sammlung</button></td>
						</tr>
						
					<? }
					while($suche_freitext = mysqli_fetch_assoc($query_freitext)); ?>
						</table>
					</div> <?
					
					} elseif ($suche_expert !== NULL) {
					// Wenn die Experten-Suche Treffer erzielt, Treffer ausgeben
					do { ?>
						<div class="table-responsive">
							<table class="table">
							<!-- Titel -->
							<h2><a href ="page.00.index.php?varname=bdy.03.zfTreffer.php">
								<?php if(isset($suche_expert)) {echo $suche_expert['title'];} else { echo "-"; } ?>
								</a></h2>

							<!-- Komponist und Instrumente -->
							<tr>
							<td>Komponist</td>
							<td><?php if(isset($suche_expert)) {echo $suche_expert['firstname']." ".$suche_expert['name'];} else { echo "-"; } ?></td>
							</tr>
							
							<!-- Instrumente -->
							<tr> 
							<td>Instrument(e)</td>
							<td><?php if(isset($suche_expert)) {echo $suche_expert['name'];} else { echo "-"; } ?></td>
							</tr>
							
							<!-- Button um den Titel meiner Sammlung hinzuzufügen -->
							<tr>
							<td></td>
							<td><button class="btn btn-primary pull-right btn-xs" onclick=''>In meine Sammlung</button></td>
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
			
				<!-- Pagination -->
				<nav aria-label="Page navigation">
				  <ul class="pagination">
					<li class="disabled">
					  <a href="#" aria-label="Search results pages">
						<span aria-hidden="true">&laquo;</span>
					  </a>
					</li>
					<li><a href="#">1</a></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li>
					  <a href="#" aria-label="Next">
						<span aria-hidden="true">&raquo;</span>
					  </a>
					</li>
				  </ul>
				</nav>
				
				<!-- Zurück-Button -->
				<button onclick='history.back()'>Zur&uuml;ck</button>
				
			</div> <!-- Ergebnisse anzeigen auf der linken Seite -->
			
			<!-- Einschränkungen auf der rechten Seite-->
			<!-- Einschränkung Instrument -->
			<div class="col-sm-3">
				<div class="panel panel-default">
					<div class="panel-heading">Instrument</div>
					<div class="panel-body">
						<?php 
							while ($row_instrument = mysqli_fetch_assoc($result_instrument)) 
							{
								echo '<a href="#"><option value="'.$row_instrument['name'].'">'.$row_instrument['name'].'</option></a>';
							} 
						?>
					</div>
				</div>
				<!-- Einschränkung Epoche -->
				<div class="panel panel-default">
					<div class="panel-heading">Epoche</div>
					<div class="panel-body">
						<?php 
							while ($row_epoch = mysqli_fetch_assoc($result_epoch))
							{
								echo '<a href="#"><option value="'.$row_epoch['name'].'">'.$row_epoch['name'].'</option></a>';
							} 
						?>
					</div>
				</div>
				<!-- Einschränkung Schwierigkeitsgrad -->
				<div class="panel panel-default">
					<div class="panel-heading">Schwierigkeitsgrad</div>
					<div class="panel-body">
						<?php 
							while ($row_levels = mysqli_fetch_assoc($result_levels))
							{
								echo '<a href="#"><option value="'.$row_levels['level'].'">'.$row_levels['level'].'</option></a>';
							}
						?>
					</div>
				</div>
				<!-- Einschränkung Stil -->
				<div class="panel panel-default">
					<div class="panel-heading">Stil</div>
					<div class="panel-body">
						<?php 
							while ($row_musicstyle = mysqli_fetch_assoc($result_musicstyle)) 
							{
								echo '<a href="#"><option value="'.$row_musicstyle['name'].'">'.$row_musicstyle['name'].'</option></a>'; 
							} 
						?>
					</div>
				</div>
				<!-- Einschränkung Anlass -->
				<div class="panel panel-default">
					<div class="panel-heading">Anlass</div>
					<div class="panel-body">
						<?php 
							while ($row_occasion = mysqli_fetch_assoc($result_occasion)) 
							{
								echo '<a href="#"><option value="'.$row_occasion['occasion'].'">'.$row_occasion['occasion'].'</option></a>'; 
							} 
						?>
					</div>
				</div>	
			</div>	<!-- Einschränkungen -->
		</section>
	</div> <!-- row -->
</div> <!-- container -->	
	
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
	*/
?>
	