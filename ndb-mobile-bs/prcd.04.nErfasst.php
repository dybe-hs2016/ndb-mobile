 <?php
 /*
 * TITLE: Noten Erfasst
 * AUTHOR: tbu
 * CREATION DATEN: 2016.01.13
 * CONTENT: Procedure to insert form data form nErfassen.php into
 * DB. Display feedback (success / failior).
 */

/*
* PROCEDURE to get the KEY->VALUE pairs of $_POST into sql query
* Steps:
* 	convert $_POST into ARAY $post_key & $post_val (foreach loop)
* 	convert $post_key & $post_val into STING $sql_key & $sql_val
* 		(implode)
* 	insert $sql_key & $sql_val into sql QUERY $sql
* 
* FORM DATA
* 	The form data we get through $_POST consists already only of
* 	the data, that well be written into tbl_noten.
*		The association of multiple instruments will probably need its
* 	own query.
* 
*/

// get neenet form stuff
require_once("incl.04.form.php");

// Filter instruments & noten from POST
$post_noten = array_intersect_key($_POST,array_flip($whitelist_noten));
$post_instrument = array_intersect_key($_POST, array_flip($whitelist_instrument));

// Write NOTEN int db
	// PREPARE noten sql statement
		// SEPARATE $_Post key-value-pairs for noten
			foreach ($post_noten as $key => $value) {
				$post_noten_key[] = $key;
				$post_noten_val[] = $value;}
		// IMOLODE noten key / val array to sql ready string
			$sql_noten_key = implode(", ",$post_noten_key);
			$sql_noten_val = "'".implode("', '",$post_noten_val)."'";
		// write SQL STATEMENT
			$sql_noten = "INSERT INTO tbl_noten ($sql_noten_key) VALUES ($sql_noten_val)";

	// SEND sql statementn to db
	// set last_id var
	// check insert into tbl_noten
		if ($verb->query($sql_noten) === TRUE) {
				// get last inserted id and save in post
				$last_id = $verb->insert_id;
				$_GET['id'] = $last_id;
				echo "id: ".$_GET['id']."<br>";
		    echo "<h2>NOTEN wurde erfasst!</h2>";
		    }
		  else {
		  	echo "it seems something went wrong and we coudl not insert your data into our databes.";
		    echo "Error: ".$sql_noten."<br>".$verb->error;
		}

// Write INSTRUMENT int db
	// PREPART prepare sql statement
		// separate POST key-val-pairs
		// set val to last inserted key
		foreach ($post_instrument as $key => $value) {
			$post_instrument_val[] = $value."', '".$last_id;}

	// check if istruments have been chosen
		if (isset($post_instrument_val)){

		// IMPLODE sql statement (id_instrument, id_noten)
			$sql_noten_instrument =  "'".implode("'), ('",$post_instrument_val)."'";
		// write SQL STATEMENT
			$sql_instrument = "INSERT INTO noten_instrument (id_instrument, id_noten) VALUES ($sql_noten_instrument)";

	// SEND sql statement to db
	// check insert into noten-instrument
		if ($verb->query($sql_instrument) === TRUE) {
		    }
		  else {
		  	echo "it seems something went wrong and we coudl not insert your data into our databes.";
		    echo "Error: ".$sql_noten."<br>".$verb->error;
		}
		


// if we want to update

} elseif (strpos($_SERVER['HTTP_REFERER'],'detail') !== false )  {
			echo "update";

			// update statement here!

		} else {
			echo "there must be a mistake in our cod %-o so sorry for that. please let us know about it with a short message to emailadress@supprt.web";
		}

// get detailed view
require_once("bdy.05.detail.php");

// debug
	/*GENERAL error report*/
		error_reporting(E_ALL);
		ini_set('display_errors', '1');

		/*form data through post*/
			echo '<h1> form data through post</>';
			echo '<h2> form data noten </h2>';
			var_dump($post_noten);
			echo '<h2> post instrument </h2>';
			var_dump($post_instrument);
			echo '<br>';

		/*sql insert statement*/
			echo '<h1> sql insert</>';
			echo '<h2> insert noten </h2>';
			var_dump($sql_noten);
			echo '<h2> insert instrumnet </h2>';
			var_dump($sql_instrument);
			echo '<br>';
 ?>