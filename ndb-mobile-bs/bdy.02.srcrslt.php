<!-- Suchergebnisse werden aufgelistet-->

<h1>Suchergebnisse                  
	<div class="btn-group">
		<button class="btn btn-default pull-right btn-xs" onclick='history.back()'>Suche ändern</button>
	</div>
</h1>


<?php
	$suche_expert = NULL;
	$suche_freitext = NULL;
?>

<?php include("incl.04.form.php"); ?>

<div class="container"> <!-- content container no 3 -->
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<?php if ($suche_freitext !== NULL) {
				// Wenn die einfache Suche Treffer erzielt, Treffer ausgeben
				do { ?>			
				<div class="table-responsive">
					<table class="table">
					<!-- Titel, id wird für Detailansicht mitgegeben -->
					<h2><a href ="page.00.index.php?varname=bdy.05.detail.php&id=<?php echo $suche_freitext['id']; ?>">
						<?php if(isset($suche_freitext)) {echo $suche_freitext['title'];} else { echo "-"; } ?></a></h2>
						
					<!-- Komponist und Instrumente -->
					<tr>
					<td>Komponist</td>
					<td><?php if(isset($suche_freitext)) {echo $suche_freitext['composerFullname'];} else { echo "-"; } ?></td>
					</tr>
					
					<!-- Instrumente -->
					<tr> 
					<td>Instrument(e)</td>
					<td><?php if(isset($suche_freitext)) {echo $suche_freitext['instruments'];} else { echo "-"; } ?></td>
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
						<h2><a href ="page.00.index.php?varname=bdy.05.detail.php&id=<?php echo $suche_expert['id']; ?>">
							<?php if(isset($suche_expert)) {echo $suche_expert['title'];} else { echo "-"; } ?>
							</a></h2>

						<!-- Komponist und Instrumente -->
						<tr>
						<td>Komponist</td>
						<td><?php if(isset($suche_expert)) {echo $suche_expert['composerFullname'];} else { echo "-"; } ?></td>
						</tr>
						
						<!-- Instrumente -->
						<tr> 
						<td>Instrument(e)</td>
						<td><?php if(isset($suche_expert)) {echo $suche_expert['instruments'];} else { echo "-"; } ?></td>
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
			
			
			
		</div> <!-- Ergebnisse anzeigen auf der linken Seite -->
		
		
		<!-- Rechte Spalte -->
		<div class="col-sm-3">
			<!-- Sortiermöglichkeit -->
			<div class="btn-group btn-block">
			  <button type="button" class="btn btn-default dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					Sortieren nach <span class="caret"></span>
			  </button>
			  <ul class="dropdown-menu">
				<li><a href="#">Titel</a></li>
				<li><a href="#">Komponist</a></li>
				<li><a href="#">Instrument</a></li>
			  </ul>
			</div>
			
			<!-- Einschränkungen/Filtermöglichkeiten -->
			<!-- Einschränkung Instrument -->
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
		</div>	<!-- Rechte Spalte -->	
	</div> <!-- row -->
</div> <!-- container -->	

	