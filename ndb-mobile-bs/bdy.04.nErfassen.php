<!-- Noten Erfassen -->

<?php
	require_once("incl.04.form.php");
	
	var_dump($_POST);

	if (strpos($_SERVER['HTTP_REFERER'],'nErfassen') !== false )  {
		echo "insert";

	} elseif (strpos($_SERVER['HTTP_REFERER'],'detail') || (strpos($_SERVER['HTTP_REFERER'],'nErfasst') !== false )) {
		echo "update";

	} else {
		echo "there must be a mistake in our cod %-o so sorry for that. please let us know about it with a short message to emailadress@supprt.web";
	}
// select values form db view_all with id GET[id]
	$sql_view_all = "SELECT id, title, composerFullname, publisherName, epochName, musicstyleName, instruments, level, occasion, signature, linktomusic, linktosheet, comment FROM view_all WHERE id='".$_GET['id']."'";

	$query_view_all = mysqli_query($verb, $sql_view_all) or die("<br> Fehler query_view_all:table: ".mysqli_error($verb));

	$result_view_all = mysqli_fetch_assoc($query_view_all);
	echo "<br> result_view_all: <br>";
	var_dump($result_view_all);

	// <h1>
		$tbl_title =array(
			'Titel' => $result_view_all,
			);

	// <input>
		$tbl_input = array(
			'Signatur' => $result_view_all['signature'],
			'Link zu Musiksück' => $result_view_all['linktomusic'],
			'Link zu Noten' => $result_view_all['linktosheet'],
			'Kommentar' => $result_view_all['comment'],
			);
			echo '<br> tbl_input <br>';
			var_dump($tbl_input);

	// <select>
		$tbl_select = array(
			'Komponist' => $result_view_all['composerFullname'],
			'Verlag' => $result_view_all['publisherName'],
			'Epoche' => $result_view_all['epochName'],
			'Stil' => $result_view_all['musicstyleName'],
			'Schwierigkeitsgrad' => $result_view_all['level'],
			'Anlass' => $result_view_all['occasion'],
			);
			echo '<br> tbl_select <br>';
			var_dump($tbl_select);

	// checkbox
		$title_checkbox = "Instrument(e)";
		$label_checkbox = explode(", ", $result_view_all['instruments']);
	
		echo '<br> tbl_instrument <br>';
		var_dump($label_checkbox);


// POST STUFF
	echo '<h2> post </h2>';

	if (isset($_POST['id'])){
		echo 'post[id] is set <br>';
		echo '<h1>Datenbankeintrag bearbeiten</h1>';
		echo '<h2>'.$tbl_title['Titel'].' ['.$_GET['id'].']</h2>';
	} else {
		echo 'post[id] is not set <br>';
		echo '<h1>Neuen Datenbankeintrag erfassen</h1>';
	}
?>


<form class="form-horizontal" action="page.00.index.php?varname=bdy.04.nErfasst.php" method="post">
<!-- UPDATE FORM -->
	<!-- ID -->
	<?php if (isset($_POST['id'])) {
		echo "update";
		// readonly ID
		echo '<div class="form-group"> <!-- ID read only -->
				<label class="col-sm-3 control-label" for="title">ID</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" name="title" id="title" required="" readonly="" placeholder="YOU ARE EDITING ENTRY ID '.$_GET['id'].'">
				</div>
			</div>';

		// prefilled TITLE
			foreach ($tbl_title as $key => $value) {
				echo '<!-- '.$key.' -->
					<div class="form-group">
						<label class="col-sm-3 control-label" for="title">'.$key.'</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="title" id="title" required="" value="'.$value.'">
						</div>
					</div>';}

		// prefilled SELECT
					foreach ($tbl_select as $key => $value) {
						if ($value !== NULL) {
							echo $key.' : '.$value.'<br>';
							echo '
								<div class="form-group">
									<label class="col-sm-3 control-label" for="'.$key.'">'.$key.'</label>
									<div class="col-sm-8">
										<select class="form-control" id="'.$key.'" name="'.$key.'" value="'.$value.'">';
							
							echo '<option value="'.$key.'">'.$value.'</option>';

							echo'
										</select>
									</div>
								</div>
							';
						}
						else {
							echo $key.' : is NULL <br>';

							echo '
								<div class="form-group">
									<label class="col-sm-3 control-label" for="'.$key.'">'.$key.'</label>
									<div class="col-sm-8">
										<select class="form-control" id="'.$key.'" name="'.$key.'" value="'.$value.'">';

						if ($key == 'Anlass'){
							while (${"row_".$key} = mysqli_fetch_assoc(${"result_".$key}))
							{
								echo '<option value="'.${"row_".$key}['id'].'">'.${"row_".$key}['occasion'].'</option>';
								var_dump(${"row_".$key});
							}
						}

						elseif ($key == 'Schwierigkeitsgrad'){
							while (${"row_".$key} = mysqli_fetch_assoc(${"result_".$key}))
							{
								echo '<option value="'.${"row_".$key}['id'].'">'.${"row_".$key}['level'].'</option>';
								var_dump(${"row_".$key});
							}
						}

						else{
							while (${"row_".$key} = mysqli_fetch_assoc(${"result_".$key}))
							{
								echo '<option value="'.${"row_".$key}['id'].'">'.${"row_".$key}['name'].'</option>';
								var_dump(${"row_".$key});
							}
						}

							echo'
										</select>
									</div>
								</div>
							';
						}
					}
					$var = array(
						1 => "bla");
					$row_ = "bla";
					$row_bla = "success!";
				/*echo $row_.$tbl_select['Komponist'].$var[1];*/
				echo ${"row_".$var[1]};

					


		// prefilled CHECKBOX
			

		// prefilled INPUT

			foreach ($tbl_input as $key => $value) {
				echo '<!-- '.$key.' -->
						<div class="form-group">
							<label class="col-sm-3 control-label" for="'.$key.'">'.$key.'</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" name="'.$key.'" id="'.$key.'" value="'.$value.'">
							</div>
						</div>';}
	}
	?>

	<!-- button -->
	<div class="form-group">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-8">
			<button class="btn btn-primary btn-li" type="submit" value="Insert Button">Eintrag erfassen</button>
		</div>
	</div>


	<label class="col-sm-3 control-label" for="disclaimer">Disclaimer</label>
		<div class="col-sm-8" id="disclaimer">
			<small id="disclaimer">Auf grund der international unterschiedlichen Rechtslage bezüglich des Urhebereichts hostet die ndb keine Musikdateien. Als Kompromiss bieten wir die Möglichkeit, Musiksücke zu verlinken, die von anderen Diensten gehostet werden.</small>			
		</div>
</form>