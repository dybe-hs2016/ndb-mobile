<?php
	require_once('../../../private/verbindung.php');
	
        // Definition der Fehlervariablen
        $fehler_title = "";

        // Variablen leer einfügen
        $title = "";
        //$name = "";
        //$signature = "";
        
        if (isset($_REQUEST['submit'])) {
	// Formular zur Überprüfung wird aufgerufen
	// URL Parameter in Variablen schreiben
	$title = $_REQUEST['title'];
        
        $freigabe = true;
        
        // Formularüberprüfung
        // Titel überprüfen
	if (strlen($title) == 0) {
		$freigabe = false; // Freigabe stoppen
		$fehler_title = " Bitte Titel ausf&uuml;llen";
	}
        
        // Hackersicherheit gewährleisten
        if ($freigabe == true) {
            $title = trim($title);
            $title = strip_tags($title);
            $title = mysqli_real_escape_string($verb, $title);
            
        // Werte für die Tabelle Komponist werden in der letztenID_k gespeichert
	 //	$sql = "INSERT INTO ".$tbl_komponist;
	 //	$sql .= " (name, vorname, geburtsdatum, todesdatum) ";
	 //	$sql .= " VALUES (";
	 //	$sql .= "'".$name."', ";
	 //	$sql .= "'".$vorname."', ";
	 //	$sql .= "'".$geburtsdatum."', ";
	 //	$sql .= "'".$todesdatum."');";
		// SQL Abfrage an DB schicken
	 //	$query = mysqli_query($verb,$sql);
		// letzte ID wieder angeben für Datenbank
	 //	$letzteID_k= mysqli_insert_id($verb);
        
	// Tabelle Noten in der DB eingetragen.
		$sql = "INSERT INTO ".$tbl_noten;
                $sql .= " (title) ";
                $sql .= " VALUES (";
                $sql .= "'".$title."');";
		// SQL Abfrage an DB schicken
		$query = mysqli_query($verb,$sql);  
		// Nach dem Ausführen der SQL-Befehle "bdy.03-01.entry.tbl.php" mit dem zuletzt eingetragenen Eintrag (mysli_insert_id) öffnen
                // header("location: bdy.03-01.entry.tbl.php?id=".mysqli_insert_id($verb));
	}  
    }
?>


<h1>Noten erfassen</h1>
<div class="container"> <!-- content container no 3 -->
  <div class="row">
      <section class="col-xs-12"> <!-- why section not col? -->
          
          <form class="form-horizontal" action="verarbeitung.php" method="post" enctype="multipart/form-data" name="form" id="form">
        <div class="form-group">
            <label class="col-sm-2 control-label" for="title">Titel der Noten</label>
            <div class="col-sm-6"><input class="form-control" type="text" name="title" id="title" placeholder="Titel der Noten" value="<?php echo $title; ?>" />
            <?php echo $fehler_title; ?>
            </div>
            <div class="col-sm-4"></div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label" for="inputSignature">Signatur</label>
            <div class="col-sm-6"><input class="form-control" type="email" id="inputSignature" placeholder="Signatur">
            </div>
            <div class="col-sm-4"></div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputFirstName">Vorname des Komponisten</label>
            <div class="col-sm-6"><input class="form-control" type="email" id="inputFirstName" placeholder="Vorname des Komponisten">
            </div>
            <div class="col-sm-4"></div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputName">Nachname des Komponisten</label>
            <div class="col-sm-6"><input class="form-control" type="email" id="inputName" placeholder="Nachname des Komponisten">
            </div>
            <div class="col-sm-4"></div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputPublisher">Verlag</label>
            <div class="col-sm-6"><input class="form-control" type="email" id="inputPublisher" placeholder="Verlag">
            </div>
            <div class="col-sm-4"></div>
        </div>
		
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputInstrument">Instrument</label>
            <div class="col-sm-6"><input class="form-control" type="email" id="inputInstrument" placeholder="XXX Dropdown">
            </div>
            <div class="col-sm-4"></div>
        </div>
		
		<!--
		<div class="form-group">
            <label class="col-sm-2 control-label" for="inputEmail">Epoche</label>
            <div class="col-sm-10"><input class="form-control" type="email" id="inputEmail" placeholder="XXX Dropdown">
            </div>
            <div class="col-sm-4"></div>
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
        <div class="col-sm-3">
             <input class="btn btn-alert pull-right" type="submit" name="submit" id="submit" value="submit">           
        </div>
            <div class="col-sm-9"></div>
        </div>
           
        
        </form>

     </section>
  </div><!-- row -->   
</div><!-- content container -->    

