 <?php
 /*
 * TITLE: Noten Bearbeitet
 * AUTHOR: tbu
 * CREATION DATEN: 2016.01.22
 * CONTENT: Procedure to update form data form nbearbeiten.php into
 * DB. Display feedback (success / failior).
 */

 // DELETE noten entry

 $sql_delete_noten = 'DELETE FROM tbl_noten WHERE id = "'.$_GET['id'].'";';
			// DEBUG sql delet query
				/*echo "<h1>vardump foreach sql_delete_noten</h1>";
				var_dump($sql_delete_noten);*/
			if ($verb->query($sql_delete_noten) === TRUE) {
				//response SUCESS
				echo '<h1> '.$_GET['title'].' (ID: '.$_GET['id'].') wurde gelöscht </h1> <h2> Sie haben die Aufnahme "'.$_GET['title'].'" erfolgreich aus der Datenbank entfertn.</h2>';
			    }
			  // response FAILIOUR
			  else {
			  	echo '<h1>Wir Bitten um Verzeihung!</h1> <br> Unsere Datenbank scheint zur Zeit nicht korrekt zu funktionieren. Bitte versuchen Sie zu einem Späteren Zeitpunkt erneut, den Eintrag '.$_GET['title'].' zu löschen. <br> Sollte der Fehler länger als 24 Stunden bestehen, wenden Sie sich bitte an <a href="mailto:does-not-actually-exist.support@ndb-dummymail.net"> does-not-actually-exist.support@ndb-dummymail.net </a>.';
			    echo "Error: ".$sql_noten."<br>".$verb->error;
			   }


// DELETE instruments entrys
		$sql_delete_instrument = 'DELETE FROM noten_instrument WHERE id_noten = "'.$_GET['id'].'";';
			// DEBUG sql delet query
				/*echo "<h1>vardump foreach sql_delete_instrument</h1>";
				var_dump($sql_delete_instrument);*/
			if ($verb->query($sql_delete_instrument) === TRUE) {
				//DEBUG delet instrumente
				/*echo "we successfully deleted those instruments";*/
			    }
			  else {
			  	echo "<br> sorry, those instruments could somehow not be deleted.";
			    echo "Error: ".$sql_noten."<br>".$verb->error;
			   }

?>