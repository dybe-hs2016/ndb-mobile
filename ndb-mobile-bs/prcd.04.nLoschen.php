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
				echo "<h1>vardump foreach sql_delete_noten</h1>";
				var_dump($sql_delete_noten);
			if ($verb->query($sql_delete_noten) === TRUE) {
				//DEBUG delet instrumente
				echo "we successfully deleted those noten";
			    }
			  else {
			  	echo "<br> sorry, those noten could somehow not be deleted.";
			    echo "Error: ".$sql_noten."<br>".$verb->error;
			   }


// DELETE instruments entrys
		$sql_delete_instrument = 'DELETE FROM noten_instrument WHERE id_noten = "'.$_GET['id'].'";';
			// DEBUG sql delet query
				echo "<h1>vardump foreach sql_delete_instrument</h1>";
				var_dump($sql_delete_instrument);
			if ($verb->query($sql_delete_instrument) === TRUE) {
				//DEBUG delet instrumente
				echo "we successfully deleted those instruments";
			    }
			  else {
			  	echo "<br> sorry, those instruments could somehow not be deleted.";
			    echo "Error: ".$sql_noten."<br>".$verb->error;
			   }

?>