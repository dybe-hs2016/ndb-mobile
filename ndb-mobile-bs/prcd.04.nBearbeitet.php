<?php
/*
* TITLE: Noten Bearbeitet
* AUTHOR: tbu
* CREATION DATEN: 2016.01.22
* CONTENT: Procedure to update form data form nbearbeiten.php into
* DB. Display feedback (success / failior).
*/

// some MINOR SECURITY through escaping the user input form data 
/*foreach ($_POST as $key => $value) { 
  $_POST[$key] = strip_tags(trim(htmlspecialchars($_POST[$key]))); 
} 
*/
/*$save_id = strip_tags(trim(htmlspecialchars($_POST['id'])));*/
require_once("incl.04.form.php");

// Filter instruments & noten from POST
$post_noten_update = array_intersect_key($_POST,array_flip($whitelist_noten));
// DEBUG post_noten_update
echo '<h1>post_noten_update</h1>';
	var_dump($post_noten_update);
	echo '<br>';
$post_instrument_update = array_intersect_key($_POST, array_flip($whitelist_instrument));
// DEBUG post_instrument_update
echo '<h1>post_instrument_update</h1>';
	var_dump($post_instrument_update);
	echo '<br>';

// build sql update query
$sql_noten_update = 'UPDATE tbl_noten SET ';
	foreach ($post_noten_update as $key => $value) {
		// do not update unchnaged dropdowns, whiche have value="ignore"
		if ($value !== 'ignore'){
		$sql_noten_update .= $key." = '".$value."', ";
	}
} // abuse id_tonality to avoide syntax error
	$sql_noten_update .= 'id_tonality = "" WHERE id = "'.$_GET['id'].'";';
	// DEBUG sql update query
	echo "<h1>vardump foreach sql_noten_update</h1>";
	var_dump($sql_noten_update);

// SEND sql statementn to db
	// set last_id var
	// check insert into tbl_noten
		if ($verb->query($sql_noten_update) === TRUE) {
				// get last inserted id and save in post
/*				$last_id = $verb->insert_id;
				$_GET['id'] = $last_id;
				echo "id: ".$_GET['id']."<br>";*/
		    echo "<h2>NOTEN wurde aktualisiert!</h2>";
		    }
		  else {
		  	echo "it seems something went wrong and we coudl not insert your data into our databes.";
		    echo "Error: ".$sql_noten."<br>".$verb->error;
		}

// Write INSTRUMENT int db
		// DELETE old instruments
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
		

	// PREPART prepare sql statement
		// separate POST key-val-pairs
		// set val to last inserted key
		foreach ($post_instrument_update as $key => $value) {
			$post_instrument_val[] = $value."', '".$_GET['id'];}

	// check if istruments have been chosen
		if (isset($post_instrument_val)){

		// IMPLODE sql statement (id_instrument, id_noten)
			$sql_noten_instrument =  "'".implode("'), ('",$post_instrument_val)."'";
		// write SQL STATEMENT
			$sql_insert_instrument = "INSERT INTO noten_instrument (id_instrument, id_noten) VALUES ($sql_noten_instrument)";
		

	// SEND sql statement to db
	// check insert into noten-instrument
		if ($verb->query($sql_insert_instrument) === TRUE) {
		    }
		  else {
		  	echo "it seems something went wrong and we coudl not insert your data into our databes.";
		    echo "Error: ".$sql_noten."<br>".$verb->error;
		} 
	}

require_once("bdy.05.detail.php");
?>