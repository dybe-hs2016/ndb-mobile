<!-- Erweiterte Suche -->

<h1>Erweiterte Suche</h1>

<?php include("incl.04.form.php"); ?>

<h2>Suche in</h2>

<div class="container"> <!-- content container no 3 -->
  <div class="row">
      <section class="col-xs-12">     
		
        <form class="form-horizontal" action="page.00.index.php?varname=bdy.02.srcrslt.php" method="post" name="form" id="form">
			<!-- Titel der Noten -->
			<div class="form-group">
				<label class="col-sm-2 control-label" for="suche_title">Titel der Noten</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" id="suche_title" name="suche_title">
				</div>
				<div class="col-sm-2">
				<!-- Dropdown zur Auswahl ob Boolean Operator "und" oder "oder" oder "nicht" ist ; ev. auslagern ? mit incl... -->
					<select class="form-control">
							<option>und</option>
							<option>oder</option>
					</select>
				</div>
				<div class="col-sm-4"></div>
			</div>
			
			<!-- Komponist -->
			<div class="form-group">
				<label class="col-sm-2 control-label" for="suche_composer">Komponist</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" id="suche_composer" name="suche_composer">
				</div>
				<div class="col-sm-2">und/oder</div>
				<div class="col-sm-4"></div>
			</div>
			
			<!-- Verlag -->
			<div class="form-group">
				<label class="col-sm-2 control-label" for="suche_publisher">Verlag</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" id="suche_publisher" name="suche_publisher">
				</div>
				<div class="col-sm-2">und/oder</div>
				<div class="col-sm-4"></div>
			</div>
		
			<!-- Weitere Möglichkeiten zum Ausklappen: Instrument und Anderes-->
			<div class ="row no-gutter"> <!-- Ohne Padding -->
				<div class="col-sm-6 col-sm-offset-2">
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
										<label class="col-sm-3 control-label" for="instrument_instrument" id="suche_instrument" name="suche_instrument">Instrument</label>
											<div class="col-sm-8">
												<?php 
													while ($row_instrument = mysqli_fetch_assoc($result_instrument)) 
													{
														echo '<label class="checkbox-inline col-sm-5">';
														echo '<input type="checkbox" id="inlineCheckbox'.$row_instrument['instrument'].'" value="'.$row_instrument['instrument'].'">
														'.$row_instrument['instrument'].' '; 
														echo '</label>'; 
													} 
												?>
											</div>
									</div> <!-- form-group -->
								</div> <!-- panel-body -->
							</div> <!-- collapseOne -->
						</div> <!-- panel panel-default -->						
					</div> <!-- panel-group 1 --> 	
				</div> <!-- col -->
			</div> <!-- no-gutter -->
			
			<!-- Möglichkeit 2: Weitere Einschränkungen -->
			<div class ="row no-gutter"> <!-- Ohne Padding -->
				<div class="col-sm-6 col-sm-offset-2" padding="0px">
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
									<label class="col-sm-4 control-label" for="suche_epoch">Epoche</label>
									<div class="col-sm-7">
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
									<label class="col-sm-4 control-label" for="suche_levels">Schwierigkeitsgrad</label>
									<div class="col-sm-7">
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
									<label class="col-sm-4 control-label" for="suche_musicstyle">Stil</label>
									<div class="col-sm-7">
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
									<label class="col-sm-4 control-label" for="suche_occasion">Anlass</label>
									<div class="col-sm-7">
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
					</div> <!-- no-gutter -->
				
					<div class="col-sm-2"></div>					
				</div> <!-- panel-group 2 -->
			</div> <!-- col -->
			
			<!-- Button "Los" -->	
			<div class="form-group">
				<div class="col-sm-3 col-sm-offset-2">
					<button class="btn btn-primary pull-left btn-lg btn-block" type="submit">Los</button>					
				</div>
			</div>	
 
        </form>
     </section>
  </div><!-- row -->   
</div><!-- content container -->    

