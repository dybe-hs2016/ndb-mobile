<!-- Noten Bearbeiten -->

<?php
	require_once("incl.04.form.php");

	var_dump($_POST);

/*	if (strpos($_SERVER['HTTP_REFERER'],'nErfassen') !== false )  {
		echo "insert";

	} elseif (strpos($_SERVER['HTTP_REFERER'],'detail') || (strpos($_SERVER['HTTP_REFERER'],'nErfasst') !== false )) {
		echo "update";

	} else {
		echo "there must be a mistake in our cod %-o so sorry for that. please let us know about it with a short message to emailadress@supprt.web";
	}*/


// EDIT ENTRY GET[id] is set
		// setselect values form db view_all with id GET[id]
		$save_id = mysqli_real_escape_string($verb, $_GET['id']);
		$sql_view_all = "SELECT id, title, composerFullname, publisherName, epochName, musicstyleName, instruments, level, occasion, signature, linktomusic, linktosheet, comment FROM view_all WHERE id = '".$save_id."'";

		$query_view_all = mysqli_query($verb, $sql_view_all) or die("<br> Fehler query_view_all:table: ".mysqli_error($verb));

		$result_view_all = mysqli_fetch_assoc($query_view_all);
		echo "<br> result_view_all: <br>";
		var_dump($result_view_all);

		// TBL HEADINGS
			$tbl_heading_title = "Titel";
			$tbl_heading_composer = "Komponist";
			$tbl_heading_publisher = "Verlag";
			$tbl_heading_epoch = "Epoche";
			$tbl_heading_musicstyle = "Stil";
			$tbl_heading_instrument = "Instrument(e)";
			$tbl_heading_levels = "Schwierigkeitsgrad";
			$tbl_heading_occasion = "Anlass";
			$tbl_heading_signature = "Signatur";
			$tbl_heading_linktomusic = "Link zu Musikstück";
			$tbl_heading_linktosheet = "Link zu Noten";
			$tbl_heading_comment = "Kommentar";

		// define arrays for loops
		// <h1>
			$tbl_title = array(
				'title' => $result_view_all['title'],
				);

		// <input>
			$tbl_input = array(
				'signature' => $result_view_all['signature'],
				'linktomusic' => $result_view_all['linktomusic'],
				'linktosheet' => $result_view_all['linktosheet'],
				'comment' => $result_view_all['comment'],
				);
				echo '<br> tbl_input <br>';
				var_dump($tbl_input);

		// <select>
			$tbl_select = array(
				'composer' => $result_view_all['composerFullname'],
				'publisher' => $result_view_all['publisherName'],
				'epoch' => $result_view_all['epochName'],
				'musicstyle' => $result_view_all['musicstyleName'],
				'levels' => $result_view_all['level'],
				'occasion' => $result_view_all['occasion'],
				);
				echo '<br> tbl_select <br>';
				var_dump($tbl_select);

		// <checkbox>
			$title_checkbox = "Instrument(e)";
			$label_checkbox = explode(", ", $result_view_all['instruments']);
		
			echo '<br> tbl_instrument <br>';
			var_dump($label_checkbox);


echo '
<form class="form-horizontal" action="page.00.index.php?varname=prcd.04.nBearbeitet.php&id='.$_GET['id'].'" method="post">';


	// EDIT ENTRY : GET[id] is not set
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
				echo '<!-- '.${"tbl_heading_".$key}.' -->
					<div class="form-group">
						<label class="col-sm-3 control-label" for="title">'.${"tbl_heading_".$key}.'</label>
						<div class="col-sm-8">
							<input class="form-control" type="text" name="title" id="title" required="" value="'.$value.'">
						</div>
					</div>';}

		// prefilled SELECT

			// Stil & Schwierigkeitsgrad NOT NULL fallen noch raus
			// -> mit SWITCH ($value) lösen
			foreach ($tbl_select as $key => $value) {

				// See if Value is set
				if ($value !== NULL) {
					echo $key.' : '.$value.'<br>';
					echo '
						<div class="form-group">
							<label class="col-sm-3 control-label" for="'.$key.'">'.${"tbl_heading_".$key}.'</label>
							<div class="col-sm-8">
								<select class="form-control" id="'.$key.'" name="'.$key.'" value="'.$value.'">';							
								echo '<option value="'.$key.'">'.$value.'</option>';
								switch ($key) {
									case 'occasion':
										while (${"row_".$key}['id'] = mysqli_fetch_assoc(${'result_'.$key}))
										{
											echo '<option value="'.$row_occasion['id'].'">'.${"row_".$key}['id']['occasion'].'</option>';
											echo $row_occasion['id'];
										};
										break;
										// vs levels ???
									case 'levels':
											while (${"row_".$key} = mysqli_fetch_assoc(${"result_".$key}))
											{
												echo '<option value="'.${"row_".$key}['id'].'">'.${"row_".$key}['level'].'</option>';
											};
										break;
									
									default:
										// 
										while (${"row_".$key} = mysqli_fetch_assoc(${"result_".$key}))
										{
											echo '<option value="'.${"row_".$key}['id'].'">'.${"row_".$key}['name'].'</option>';
										};
										break;
								}
									while (${"row_".$key} = mysqli_fetch_assoc(${"result_".$key}))
									{
										echo '<option value="'.${"row_".$key}['id'].'">'.${"row_".$key}['name'].'</option>';
									}
									echo'
								</select>
							</div>
						</div>
					';
				}
				// if no input
						else {
							echo $key.' : is NULL <br>';

							echo '
								<div class="form-group">
									<label class="col-sm-3 control-label" for="'.$key.'">'.${"tbl_heading_".$key}.'</label>
									<div class="col-sm-8">
										<select class="form-control" id="'.$key.'" name="'.$key.'" value="'.$value.'">';

												//insert while

							echo'
										</select>
									</div>
								</div>
							';
						}
					}
					
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

 echo '
	<!-- button -->
	<div class="form-group">
		<div class="col-sm-3">
		</div>
		<div class="col-sm-8">
			<button class="btn btn-primary btn-li" type="submit" value="Insert Button">Eintrag aktualisieren</button>
		</div>
	</div>

	<label class="col-sm-3 control-label" for="disclaimer">Disclaimer</label>
		<div class="col-sm-8" id="disclaimer">
			<small id="disclaimer">Auf grund der international unterschiedlichen Rechtslage bezüglich des Urhebereichts hostet die ndb keine Musikdateien. Als Kompromiss bieten wir die Möglichkeit, Musiksücke zu verlinken, die von anderen Diensten gehostet werden.</small>
			<p></p>		
		</div>

</form>
';
?>
