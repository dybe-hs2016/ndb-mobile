<h1>Expertensuche</h1>

<h2>Suche in</h2>

<div class="container"> <!-- content container no 3 -->
  <div class="row">
      <section class="col-xs-12">     
		
        <form class="form-horizontal" action="page.00.index.php?varname=bdy.02.srcrslt.php" method="post" name="form" id="form">
			<div class="form-group">
				<!-- Titel der Noten -->
				<label class="col-sm-2 control-label" for="inputTitle">Titel der Noten</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" id="id" name="suche_title" value="<?php echo isset($_POST['suche_title']) ? htmlentities($_POST['suche_title']) : "" ; ?>">
				</div>
				<div class="col-sm-2">
				<!-- Dropdown zur Auswahl ob Boolean Operator "und" oder "oder" oder "nicht" ist ; ev. auslagern ? mit incl... -->
					<div class="dropdown">
						<button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
							Name?? <span class="caret"></span>
						</button>
						<ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
							<li><a href="#">und</a></li>
							<li><a href="#">oder</a></li>
							<li><a href="#">nicht</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-4"></div>
		
			<!-- Komponist -->	
				<label class="col-sm-2 control-label" for="inputTitle">Komponist</label>
				<div class="col-sm-4">
					<input class="form-control" type="text" id="id" name="freitext" value="<?php echo isset($_POST['freitext']) ? htmlentities($_POST['freitext']) : "" ; ?>">
				</div>
				<div class="col-sm-2">und/oder/nicht</div>
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

