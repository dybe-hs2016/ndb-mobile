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
			'Titel' => $result_view_all['title'],
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

		// prefilled CHECKBOX
			

		// prefilled INPUT

			foreach ($tbl_input as $key => $value) {
				echo '<!-- '.$key.' -->
						<div class="form-group">
							<label class="col-sm-3 control-label" for="'.$key.'">'.$key.'</label>
							<div class="col-sm-8">
								<input class="form-control" type="text" name="'.$key.'" id="'.$key.'" required="" value="'.$value.'">
							</div>
						</div>';}
	}
	?>


<h2>fix input</h2>

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
			<?php
				while ($row_composer = mysqli_fetch_assoc($result_composer))
				{
					echo '<option value="'.$row_composer['id'].'">'.$row_composer['name'].'</option>';
				}
			?>
			</select>
		</div>
	</div>

	<!-- publisher -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="publisher">Verlag</label>
		<div class="col-sm-8">
			<select class="form-control" id="publisher" name="id_composer">
			<?php
				while ($row_publisher = mysqli_fetch_assoc($result_publisher))
				{
					echo '<option value="'.$row_publisher['id'].'">'.$row_publisher['name'].'</option>';
				}
			?>
			</select>
		</div>
	</div>

	<!-- epoch -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="epoch">Epoche</label>
		<div class="col-sm-8">
			<select class="form-control" id="epoch" name="id_epoch">
			<?php
				while ($row_epoch = mysqli_fetch_assoc($result_epoch))
				{
					echo '<option value="'.$row_epoch['id'].'">'.$row_epoch['name'].'</option>';
				}
			?>
			</select>
		</div>
	</div>

	<!-- style -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="musicstyle">Stil</label>
		<div class="col-sm-8">
			<select class="form-control" id="musicstyle" name="id_musicstyle">
			<?php
				while ($row_musicstyle = mysqli_fetch_assoc($result_musicstyle))
				{
					echo '<option value="'.$row_musicstyle['id'].'">'.$row_musicstyle['name'].'</option>';
				}
			?>
			</select>
		</div>		
	</div>

	<!-- instrument -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="instrument">Instrument</label>
		<div class="col-sm-8 checkbox">
			<label>
				<?php
					while ($row_instrument = mysqli_fetch_assoc($result_instrument))
					{
						echo '<label class="checkbox col-sm-3">';
						echo '<input type="checkbox" name="'.$row_instrument['name'].'" value="'.$row_instrument['id'].'">'.$row_instrument['name'].' ';
						echo '</label>';
					}
				?>
			</label>		
		</div>
	</div>

	<!-- levels -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="levels">Schwierigkeitsgrad</label>
		<div class="col-sm-8">
			<select class="form-control" id="levels" name="id_levels">
			<?php 
				while ($row_levels = mysqli_fetch_assoc($result_levels))
				{
					echo '<option value="'.$row_levels['id'].'">'.$row_levels['level'].'</option>';
				}
			?>
			</select>
		</div>
	</div>


	<!-- occation -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="occasion">Anlass</label>
		<div class="col-sm-8">
			<select class="form-control" id="occasion" name="id_occasion">
			<?php 
				while ($row_occasion = mysqli_fetch_assoc($result_occasion))
				{
					echo '<option value="'.$row_occasion['id'].'">
					'.$row_occasion['occasion'].'</option>';
				}
			?>
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
		</div>
</form>