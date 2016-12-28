<!-- Expertensuche -->

<h1>Expertensuche</h1>

<?php include("incl.04.form.php"); ?>

<h2>Suche in</h2>

<div class="container"> <!-- content container no 3 -->
  <div class="row">
      <section class="col-xs-12">     
		
        <form class="form-horizontal" action="page.00.index.php?varname=bdy.02.srcrslt.php" method="post" name="form" id="form">
			<!-- Titel der Noten -->
			<div class="form-group">¨
				<label class="col-sm-2 control-label" for="inputTitle">Titel der Noten</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" id="id" name="suche_title" value="<?php echo isset($_POST['suche_title']) ? htmlentities($_POST['suche_title']) : "" ; ?>">
				</div>
				<div class="col-sm-2">
				<!-- Dropdown zur Auswahl ob Boolean Operator "und" oder "oder" oder "nicht" ist ; ev. auslagern ? mit incl... -->
					<select class="form-control">
							<option>und</option>
							<option>oder</option>
							<option>nicht</option>
					</select>
				</div>
				<div class="col-sm-4"></div>
			</div>
			
			<!-- Komponist -->
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputTitle">Komponist</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" id="id" name="suche_composer" value="<?php echo isset($_POST['suche_composer']) ? htmlentities($_POST['suche_composer']) : "" ; ?>">
				</div>
				<div class="col-sm-2">und/oder/nicht</div>
				<div class="col-sm-4"></div>
			</div>
			
			<!-- Verlag -->
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputTitle">Verlag</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" id="id" name="suche_publisher" value="<?php echo isset($_POST['suche_publisher']) ? htmlentities($_POST['suche_publisher']) : "" ; ?>">
				</div>
				<div class="col-sm-2">und/oder/nicht</div>
				<div class="col-sm-4"></div>
			</div>
		
			<!-- Instrument , nicht fertig wäre gut mit Häkli-Dinger -->
			<div class="form-group">
				<label class="col-sm-2 control-label" for="inputTitle">Instrument</label>
				<div class="col-sm-4">
					<label class="checkbox-inline">
						<?php 
							while ($row_instrument = mysqli_fetch_assoc($result_instrument)) {
							echo '<input type="checkbox" id="inlineCheckbox'.$row_instrument['name'].'" value="'.$row_instrument['name'].'"'.($_POST['name'] == $row_instrument['id'] ? " selected": "").'>
							'.$row_instrument['name'].' '; } ?>
					</label>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-4"></div>
			</div>
			
			<!-- Epoche aus Dropdown auswählen -->
			<div class="form-group" name="epoch">
				<label class="col-sm-2 control-label" for="inputTitle">Epoche</label>
				<div class="col-sm-4">
					<!-- Dropdown zur Auswahl der Epoche -->
					<select class="form-control">
						<?php 
							while ($row_epoch = mysqli_fetch_assoc($result_epoch)) {
							echo '<option value="'.$row_epoch['name'].'"'.($_POST['name'] == $row_epoch['id'] ? " selected": "").'>
							'.$row_epoch['name'].'</option>'; } ?>
					</select>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-4"></div>
			</div>
					
			<!-- Level aus Dropdown auswählen -->
			<div class="form-group" name="levels">
				<label class="col-sm-2 control-label" for="inputTitle">Schwierigkeitsgrad</label>
				<div class="col-sm-4">
					<!-- Dropdown zur Auswahl der Epoche -->
					<select class="form-control">
						<?php 
							while ($row_levels = mysqli_fetch_assoc($result_levels)) {
							echo '<option value="'.$row_levels['level'].'"'.($_POST['level'] == $row_levels['id'] ? " selected": "").'>
							'.$row_levels['level'].'</option>'; } ?>
					</select>
				</div>
				<div class="col-sm-2"></div>
				<div class="col-sm-4"></div>
			</div>
					
					
		
		<!-- pull-right - Knopf ist auf der echten Seite -->	
        <div class="form-group">
        <div class="col-sm-8 col-sm-offset_2">
             <input class="btn btn-alert pull-left" type="submit" value="Los">           
        </div>
        </div>
            
        
        </form>
     </section>
  </div><!-- row -->   
</div><!-- content container -->    

