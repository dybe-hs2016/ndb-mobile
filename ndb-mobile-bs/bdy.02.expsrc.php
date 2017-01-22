<!-- Erweiterte Suche -->

<h1>Erweiterte Suche</h1>

<?php include("incl.04.form.php"); ?>

<h2>Suche in</h2>

<form class="form-horizontal" action="page.00.index.php?varname=bdy.02.srcrslt.php" method="post" name="form" id="form">
	<!-- Titel der Noten -->
	<div class="form-group">
		<label class="col-sm-3 col-md-3 control-label" for="suche_title">Titel der Noten</label>
		<div class="col-sm-8 col-md-8">
			<input class="form-control" type="text" id="suche_title" name="suche_title">
		</div>
		
	</div>
	
	<!-- Komponist -->
	<div class="form-group">
		<label class="col-sm-3 col-md-3 control-label" for="suche_composer">Komponist</label>
		<div class="col-sm-8 col-md-8">
			<input class="form-control" type="text" id="suche_composer" name="suche_composer">
		</div>
	</div>
	
	<!-- Verlag -->
	<div class="form-group">
		<label class="col-sm-3 col-md-3 control-label" for="suche_publisher">Verlag</label>
		<div class="col-sm-8 col-md-8">
			<input class="form-control" type="text" id="suche_publisher" name="suche_publisher">
		</div>
	</div>

	<!-- Weitere Möglichkeiten zum Ausklappen: Instrument und Anderes-->
	<div class="col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-3 col-lg-8 col-lg-offset-3">
		<div class="panel-group" id="accordionOne" role="tablist" aria-multiselectable="true">
		<!-- Möglichkeit 1: Instrument -->
			<div class="panel panel-default">
				<!-- Head -->
				<div class="panel-heading" role="tab" id="headingOne">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordionOne" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne">Instrumentenwahl</a>
					</h4>
				</div>
				<div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" aria-expanded="false">
					<!-- Body -->
					<div class="panel-body">
						<!-- Checkboxen zum Anwählen -->
						<div class="form-group">	
							<div class="col-sm-8 col-md-8 col-lg-8 checkbox">
								<label>
								<?php 
									while ($row_instrument = mysqli_fetch_assoc($result_instrument)) 
									{
										echo '<label class="checkbox col-sm-8 col-md-8 col-lg-4">';
										echo '<input type="checkbox" name="instrumentCheckbox'.$row_instrument['name'].'" value="'.$row_instrument['name'].'">
										'.$row_instrument['name'].' '; 
										echo '</label>'; 
									} 
								?>
								</label>
							</div>
						</div> <!-- form-group -->
					</div> <!-- panel-body -->
				</div> <!-- collapseOne -->
			</div> <!-- panel panel-default -->						
		</div> <!-- panel-group 1 --> 	
	</div> <!-- col -->

	
	<!-- Möglichkeit 2: Weitere Einschränkungen -->
	
	<div class="col-sm-8 col-sm-offset-3 col-md-8 col-md-offset-3 col-lg-8 col-lg-offset-3">
		<div class="panel-group" id="accordionTwo" role="tablist" aria-multiselectable="true">
			<div class="panel panel-default">
				<!-- Head -->
				<div class="panel-heading" role="tab" id="headingTwo">
					<h4 class="panel-title">
						<a role="button" data-toggle="collapse" data-parent="#accordionTwo" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Weitere Einschränkungen
						</a>
					</h4>
				</div>
				<!-- Body -->
				<div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo" aria-expanded="false">
					<div class="panel-body">
					<!-- Epoche aus Dropdown auswählen -->
					<div class="form-group" name="epoch">
						<label class="col-md-4 col-lg-4 control-label" for="suche_epoch">Epoche</label>
						<div class="col-md-7 col-lg-7">
							<!-- Dropdown zur Auswahl der Epoche -->
							<select class="form-control" id="suche_epoch" name="suche_epoch">
								<?php 
									while ($row_epoch = mysqli_fetch_assoc($result_epoch))
									{
										echo '<option value="'.$row_epoch['name'].'">'.$row_epoch['name'].'</option>';
									} 
								?>
							</select>
						</div>
					</div>
						
					<!-- Level aus Dropdown auswählen -->
					<div class="form-group" name="levels">
						<label class="col-md-4 col-lg-4 control-label" for="suche_levels">Schwierigkeitsgrad</label>
						<div class="col-md-7 col-lg-7">
							<!-- Dropdown zur Auswahl der Epoche -->
							<select class="form-control" id="suche_levels" name="suche_levels">
								<?php 
									while ($row_levels = mysqli_fetch_assoc($result_levels))
									{
										echo '<option value="'.$row_levels['level'].'">'.$row_levels['level'].'</option>';
									}
									?>
							</select>
						</div>
					</div>
						
					<!-- Musicstyle aus Dropdown auswählen -->
					<div class="form-group" name="musicstyle">
						<label class="col-md-4 col-lg-4 control-label" for="suche_musicstyle">Stil</label>
						<div class="col-md-7 col-lg-7">
							<!-- Dropdown zur Auswahl der Epoche -->
							<select class="form-control" id="suche_musicstyle" name="suche_musicstyle">
								<?php 
									while ($row_musicstyle = mysqli_fetch_assoc($result_musicstyle)) {
									echo '<option value="'.$row_musicstyle['name'].'">
									'.$row_musicstyle['name'].'</option>'; } ?>
							</select>
						</div>
					</div>	

					<!-- Occasion aus Dropdown auswählen -->
					<div class="form-group" name="occasion">
						<label class="col-md-4 col-lg-4 control-label" for="suche_occasion">Anlass</label>
						<div class="col-md-7 col-lg-7">
							<!-- Dropdown zur Auswahl der Epoche -->
							<select class="form-control" id="suche_occasion" name="suche_occasion">
								<?php 
									while ($row_occasion = mysqli_fetch_assoc($result_occasion)) {
									echo '<option value="'.$row_occasion['occasion'].'">
									'.$row_occasion['occasion'].'</option>'; } ?>
							</select>
						</div>
					</div>
					
					</div> <!-- panel-body -->
				</div> <!-- collapseTwo -->
			</div> <!-- panel-default -->			
		
			<div class="col-sm-2"></div>					
		</div> <!-- panel-group 2 -->
	</div> <!-- col -->
	
	<!-- Button "Los" -->	
	<div class="form-group">
		<div class="col-sm-4 col-sm-offset-3">
			<button class="btn btn-primary btn-li btn-block" type="submit">Los</button>					
		</div>
	</div>	
 
</form>
 

