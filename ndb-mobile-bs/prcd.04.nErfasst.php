 <?php
 /*
 * TITLE: Noten Erfasst
 * AUTHOR: tbu
 * CREATION DATEN: 2016.01.13
 * CONTENT: Procedure to insert form data form nErfassen.php into
 * DB. Display feedback (success / failior).
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
			$sql_noten = "INSERT INTO tbl_noten ($sql_noten_key) VALUES ($sql_noten_val);";

	// SEND sql statementn to db
	// set last_id var
	// check insert into tbl_noten
		if ($verb->query($sql_noten) === TRUE) {
				// get last inserted id and save in post
				$last_id = $verb->insert_id;
				$_GET['id'] = $last_id;
				echo '<h2> '.$_POST['title'].' (ID: '.$_GET['id'].') wurde erfolgreig erfasst! </h2>';
			} else {
				echo '<h1>Wir Bitten um Verzeihung!</h1> Unsere Datenbank scheint zur Zeit nicht korrekt zu funktionieren. Bitte versuchen Sie zu einem Späteren Zeitpunkt erneut, den Eintrag '.$_POST['title'].' zu erfassen. <br> Sollte der Fehler länger als 24 Stunden bestehen, wenden Sie sich bitte an <a href="mailto:does-not-actually-exist.support@ndb-dummymail.net"> does-not-actually-exist.support@ndb-dummymail.net </a>.';
				echo "Error: ".$sql_noten."<br>".$verb->error;
			}

// Write INSTRUMENT int db
	// PREPART prepare sql statement
		// separate POST key-val-pairs
		// set val to last inserted key
			foreach ($post_instrument as $key => $value) {
				$post_instrument_val[] = $value."', '".$last_id;
			}

	// check if istruments have been chosen
		if (isset($post_instrument_val)){
			// IMPLODE sql statement (id_instrument, id_noten)
			$sql_noten_instrument =  "'".implode("'), ('",$post_instrument_val)."'";
			// write SQL STATEMENT
			$sql_insert_instrument = "INSERT INTO noten_instrument (id_instrument, id_noten) VALUES ($sql_noten_instrument)";

			// SEND sql statement to db
			// check insert into noten-instrument
				if ($verb->query($sql_insert_instrument) === TRUE) {
				} else {
			    	echo '<h1>Wir Bitten um Verzeihung!</h1> Unsere Datenbank scheint zur Zeit nicht korrekt zu funktionieren. Bitte versuchen Sie zu einem Späteren Zeitpunkt erneut, den Eintrag '.$_POST['title'].' zu erfassen. <br> Sollte der Fehler länger als 24 Stunden bestehen, wenden Sie sich bitte an <a href="mailto:does-not-actually-exist.support@ndb-dummymail.net"> does-not-actually-exist.support@ndb-dummymail.net </a>.';
			    	echo "Error: ".$sql_noten."<br>".$verb->error;
			    }
		}

// get detailed view
require_once("bdy.05.detail.php");

// debug
	/*GENERAL error report*/
		/*error_reporting(E_ALL);
		ini_set('display_errors', '1');*/

		/*form data through post*/
			/*echo '<h1> form data through post</h1>';
			echo '<h2> form data noten </h2>';
			var_dump($post_noten);
			echo '<h2> post instrument </h2>';
			var_dump($post_instrument);
			echo '<br>';*/

		/*sql insert statement*/
			/*echo '<h1> sql insert</h1>';
			echo '<h2> insert noten </h2>';
			var_dump($sql_noten);
			echo '<h2> insert instrumnet </h2>';
			if (isset($sql_insert_instrument)) {
				var_dump($sql_insert_instrument);
			} else {
				echo 'is not set?';
			}
		
			echo '<br>';*/
 ?>