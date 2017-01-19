<!-- Noten Erfassen -->

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
		$sql_view_all = "SELECT id, title, composerFullname, publisherName, epochName, musicstyleName, instruments, level, occasion, signature, linktomusic, linktosheet, comment FROM view_all";

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
<form class="form-horizontal" action="page.00.index.php?varname=bdy.04.nErfasst.php" method="post">
<!-- UPDATE FORM -->
	<!-- ID -->';


	// NEW ENTRY : GET[id] is not set
		echo "insert";

				
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
						else {
							echo $key.' : is NULL <br>';

							echo '
								<div class="form-group">
									<label class="col-sm-3 control-label" for="'.$key.'">'.${"tbl_heading_".$key}.'</label>
									<div class="col-sm-8">
										<select class="form-control" id="'.$key.'" name="'.$key.'" value="'.$value.'">';



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




else {
	echo '
	<!-- Title -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="title">Titel</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" name="title" id="title" required="">
		</div>
	</div>

	<!-- composer -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="composer">Komponist</label>
		<div class="col-sm-8">
			<select class="form-control" id="composer" name="id_composer">
			';
				while ($row_composer = mysqli_fetch_assoc($result_composer))
				{
					echo '<option value="'.$row_composer['id'].'">'.$row_composer['name'].'</option>';
				}
			echo '
			</select>
		</div>
	</div>

	<!-- publisher -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="publisher">Verlag</label>
		<div class="col-sm-8">
			<select class="form-control" id="publisher" name="id_composer">
			';
				while ($row_publisher = mysqli_fetch_assoc($result_publisher))
				{
					echo '<option value="'.$row_publisher['id'].'">'.$row_publisher['name'].'</option>';
				}
			echo '
			</select>
		</div>
	</div>

	<!-- epoch -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="epoch">Epoche</label>
		<div class="col-sm-8">
			<select class="form-control" id="epoch" name="id_epoch">
			';
				while ($row_epoch = mysqli_fetch_assoc($result_epoch))
				{
					echo '<option value="'.$row_epoch['id'].'">'.$row_epoch['name'].'</option>';
				}
			echo '
			</select>
		</div>
	</div>

	<!-- style -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="musicstyle">Stil</label>
		<div class="col-sm-8">
			<select class="form-control" id="musicstyle" name="id_musicstyle">
			';
				while ($row_musicstyle = mysqli_fetch_assoc($result_musicstyle))
				{
					echo '<option value="'.$row_musicstyle['id'].'">'.$row_musicstyle['name'].'</option>';
				}
			echo '
			</select>
		</div>		
	</div>

	<!-- instrument -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="instrument">Instrument</label>
		<div class="col-sm-8 checkbox">
			<label>
				';
					while ($row_instrument = mysqli_fetch_assoc($result_instrument))
					{
						echo '<label class="checkbox col-sm-3">';
						echo '<input type="checkbox" name="'.$row_instrument['name'].'" value="'.$row_instrument['id'].'">'.$row_instrument['name'].' ';
						echo '</label>';
					}
				echo '
			</label>		
		</div>
	</div>

	<!-- levels -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="levels">Schwierigkeitsgrad</label>
		<div class="col-sm-8">
			<select class="form-control" id="levels" name="id_levels">
			';
				while ($row_levels = mysqli_fetch_assoc($result_levels))
				{
					echo '<option value="'.$row_levels['id'].'">'.$row_levels['level'].'</option>';
				}
			echo '
			</select>
		</div>
	</div>


	<!-- occation -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="occasion">Anlass</label>
		<div class="col-sm-8">
			<select class="form-control" id="occasion" name="id_occasion">
			';
				while ($row_occasion = mysqli_fetch_assoc($result_occasion))
				{
					echo '<option value="'.$row_occasion['id'].'">
					'.$row_occasion['occasion'].'</option>';
				}
			echo '
			</select>
		</div>		
	</div>

	<!-- signature -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="signature">Signatur</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" name="signature" id="signature">
		</div>
	</div>

	<!-- linktomusic -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="linktomusic">Link zu Musiksück</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" name="linktomusic" id="linktomusic" placeholder="soundcloud, last.fm, youtube, vimeo, etc.">
		</div>
	</div>

	<!-- linktosheet -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="linktosheet">Link zu Noten</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" name="linktosheet" id="linktosheet" placeholder="musopen.org, imslp.org, mutopiaproject.org, cpdl.org">
		</div>
	</div>

	<!-- comment -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="comment">Kommentar</label>
		<div class="col-sm-8">
			<textarea class="form-control" type="text-box" name="comment" id="comment"></textarea>			
		</div>		
	</div>

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
			<p></p>		
		</div>

</form>
';}
?>
