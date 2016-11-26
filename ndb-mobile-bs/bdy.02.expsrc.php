<?php
	require_once('verbindung.php');
	
	// Wenn kein "freitext" eingegeben wurde, dann wird die Variable auf "" gesetzt
	if(!isset($_GET['freitext'])) {
		$_GET['freitext'] = "";
	}
	
	// SQL-Abfrage für Freitextsuche, packt die Ergebnisse in $suche_freitext
	$sql_freitext = "SELECT * FROM ".$tbl_noten." "; 
	$sql_freitext .= "WHERE titel LIKE '%".$_GET['freitext']." ORDER BY titel ASC LIMIT; ";
	$query_freitext = mysqli_query($verb, $sql_freitext) or die("Fehler:".mysqli_error($verb));
	$suche_freitext = mysqli_fetch_assoc($query_freitext);
	
	// Verbindungsprobleme anzeigen
	echo mysqli_error($verb);
?>


<h1>Expertensuche</h1>

<div class="container"> <!-- content container no 3 -->
  <div class="row">
      <section class="col-xs-12">     
		
        <form class="form-horizontal" action="bdy.02.srcrslt.php" method="get" name="form" id="form">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="inputTitle">Titel der Noten</label>
            <div class="col-sm-10"><input class="form-control" type="text" id="inputTitle" name="freitext" value="<?php echo isset($_GET['freitext']) ? htmlentities($_GET['freitext']) : "" ; ?>">
            </div>
        </div>
		
		<!--
        <div class="form-group">
            <label class="col-sm-2 control-label" for="inputSignature">Signatur</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputSignature" placeholder="Signatur">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputFirstName">Vorname des Komponisten</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputFirstName" placeholder="Vorname des Komponisten">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputName">Nachname des Komponisten</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputName" placeholder="Nachname des Komponisten">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputPublisher">Verlag</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputPublisher" placeholder="Verlag">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputInstrument">Instrument</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputInstrument" placeholder="XXX Dropdown">
            </div>
        </div>
		
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputEmail">Epoche</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputEmail" placeholder="XXX Dropdown">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputEmail">Stil</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputEmail" placeholder="XXX Dropdown">
            </div>
        </div>
        
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputEmail">Tonart</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputEmail" placeholder="XXX Dropdown">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputEmail">Schwierigkeitsgrad</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputEmail" placeholder="XXX Dropdown">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputEmail">Anlass</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputEmail" placeholder="XXX Dropdown">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputEmail">Kommentar</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputEmail" placeholder="Kommentarfeld">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputEmail">Link zur Aufnahme</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputEmail" placeholder="Link zur Aufnahme, z.B. youtube">
            </div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputEmail">Link zum Notenblatt</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputEmail" placeholder="Link zum Notenblatt, z.B. sheetmusic">
            </div>
        </div>
		-->
		
		<!-- pull-right - Knopf ist auf der echten Seite -->	
        <div class="form-group">
        <div class="col-sm-10 col-sm-offset_2">
             <input class="btn btn-alert pull-right" type="submit" value="Los">           
        </div>
        </div>
            
        
        </form>
     </section>
  </div><!-- row -->   
</div><!-- content container -->    

