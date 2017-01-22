<?php
/*
* TITLE: Noten Bearbeitet
* AUTHOR: tbu
* CREATION DATEN: 2016.01.22
* CONTENT: Procedure to update form data form nbearbeiten.php into
* DB. Display feedback (success / failior).
*/

require_once("incl.04.form.php");

// Filter instruments & noten from POST
$post_noten_update = array_intersect_key($_POST,array_flip($whitelist_noten));
echo '<h1>post_noten_update</h1>';
			var_dump($post_noten_update);
			echo '<br>';
$post_instrument = array_intersect_key($_POST, array_flip($whitelist_instrument));

// Write NOTEN int db
	// PREPARE noten sql statement
		// SEPARATE $_Post key-value-pairs for noten
		function implodeArrayKeys($array) {
				echo "<h1>function</h1>";
		        $sql_noten_update = "".implode(", ",array_keys($array))."".implode("; ", $post_noten_update)."";
		}

		implodeArrayKeys($post_noten_update);

			foreach ($post_noten_update as $key => $value) {
				$sql_noten_update = "".$key."='".$value."', ";
			}
				echo '<h1>sql_noten_update arrayed</h1>';
				var_dump($sql_noten_update);
				echo '<br>';
		// IMOLODE noten key / val array to sql ready string
			$sql_noten_update = implode(", ", $post_noten_update);
			echo '<h1>sql_noten_update imploded</h1>';
			var_dump($sql_noten_update);
			echo '<br>';
		// write SQL STATEMENT
			$sql_noten_update = "UPDATE SET $sql_noten_update WHERE id=".$_GET['id']."";

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
?>