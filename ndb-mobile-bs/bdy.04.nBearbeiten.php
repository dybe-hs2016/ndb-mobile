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

?>

value="<?php echo $result_view_all['title']; ?>"

<h1>Noten aktualisieren</h1>

<h2>Vorhandenen Datenbankeintrag bearbeiten</h2>

<form class="form-horizontal" action="page.00.index.php?varname=prcd.04.nBearbeitet.php&id=<?php echo $_GET['id'];?>" method="post">

<!-- id -->
<div class="form-group"> <!-- ID read only -->
		<label class="col-sm-3 control-label" for="title">ID</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" name="title" id="title" required="" readonly="" placeholder="YOU ARE EDITING ENTRY ID <?php echo$_GET['id']; ?>">
		</div>
	</div>


<!-- title -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="title">Titel</label>
	<div class="col-sm-8">
		<input class="form-control" type="text" name="title" id="title" required="" value="<?php echo $result_view_all['title']; ?>">
	</div>
</div>

<!-- composer -->
<div class="form-group">
<label class="col-sm-3 control-label" for="composer">Komponist</label>
<div class="col-sm-8">
	<select class="form-control" id="composer" name="id_composer">
	<option value="ignore"> <?php echo $result_view_all['composerFullname']; ?> </option>
		<?php
			while ($row_composer = mysqli_fetch_assoc($result_composer)) {
				echo '<option value="'.$row_composer['id'].'">'.$row_composer['name'].'</option>';}
		?>
</select>
</div>
</div>

<!-- publisher -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="publisher">Verlag</label>
	<div class="col-sm-8">
		<select class="form-control" id="publisher" name="id_publisher">
			<option value="ignore"> <?php echo $result_view_all['publisherName']; ?> </option>
			<?php
				while ($row_publisher = mysqli_fetch_assoc($result_publisher)) {
					echo '<option value="'.$row_publisher['id'].'">'.$row_publisher['name'].'</option>';}
			?>
		</select>
	</div>
</div>

<!-- epoch -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="epoch">Epoche</label>
	<div class="col-sm-8">
		<select class="form-control" id="epoch" name="id_epoch">
		<option value="ignore"> <?php echo $result_view_all['epochName']; ?> </option>
		<?php
		while ($row_epoch = mysqli_fetch_assoc($result_epoch)) {
			echo '<option value="'.$row_epoch['id'].'">'.$row_epoch['name'].'</option>';}
		?>
		</select>
	</div>
</div>

<!-- style -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="musicstyle">Stil</label>
	<div class="col-sm-8">
		<select class="form-control" id="musicstyle" name="id_musicstyle">
		<option value="ignore"> <?php echo $result_view_all['musicstyleName']; ?> </option>
		<?php
		while ($row_musicstyle = mysqli_fetch_assoc($result_musicstyle)) {
			echo '<option value="'.$row_musicstyle['id'].'">'.$row_musicstyle['name'].'</option>';}
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
			while ($row_instrument = mysqli_fetch_assoc($result_instrument)) {
				echo '<label class="checkbox col-sm-3">';
				echo '<input type="checkbox" name="'.$row_instrument['name'].'" value="'.$row_instrument['id'].'">'.$row_instrument['name'].' ';
				echo '</label>';}
		?>
	</label>		
	</div>
</div>

<!-- levels -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="levels">Schwierigkeitsgrad</label>
	<div class="col-sm-8">
		<select class="form-control" id="levels" name="id_levels">
		<option value="ignore"> <?php echo $result_view_all['level']; ?> </option>
		<?php 
		while ($row_levels = mysqli_fetch_assoc($result_levels)) {
			echo '<option value="'.$row_levels['id'].'">'.$row_levels['level'].'</option>';}
		?>
		</select>
	</div>
</div>

<!-- occation -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="occasion">Anlass</label>
	<div class="col-sm-8">
		<select class="form-control" id="occasion" name="id_occasion">
		<option value="ignore"> <?php echo $result_view_all['occasion']; ?> </option>
		<?php 
		while ($row_occasion = mysqli_fetch_assoc($result_occasion)) {
			echo '<option value="'.$row_occasion['id'].'">
			'.$row_occasion['occasion'].'</option>';}
		?>
		</select>
	</div>		
</div>

<!-- signature -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="signature">Signatur</label>
	<div class="col-sm-8">
		<input class="form-control" type="text" name="signature" id="signature" value="<?php echo $result_view_all['signature']; ?>">
	</div>
	</div>

	<!-- linktomusic -->
	<div class="form-group">
	<label class="col-sm-3 control-label" for="linktomusic">Link zu Musiksück</label>
	<div class="col-sm-8">
		<input class="form-control" type="text" name="linktomusic" id="linktomusic" placeholder="soundcloud, last.fm, youtube, vimeo, etc." value="<?php echo $result_view_all['linktomusic']; ?>">
	</div>
</div>

<!-- linktosheet -->
<div class="form-group">
<label class="col-sm-3 control-label" for="linktosheet">Link zu Noten</label>
	<div class="col-sm-8">
		<input class="form-control" type="text" name="linktosheet" id="linktosheet" placeholder="musopen.org, imslp.org, mutopiaproject.org, cpdl.org" value="<?php echo $result_view_all['linktosheet']; ?>">
	</div>
</div>

<!-- comment -->
<div class="form-group">
<label class="col-sm-3 control-label" for="comment">Kommentar</label>
	<div class="col-sm-8">
		<textarea class="form-control" type="text-box" name="comment" id="comment"><?php echo $result_view_all['comment']; ?></textarea>			
	</div>		
</div>

<!-- button -->
<div class="form-group">
	<div class="col-sm-3"> <!-- empty placeohlder --> </div>
	<div class="col-sm-8">
		<button class="btn btn-primary btn-li" type="submit" value="Insert Button">Eintrag aktualisieren</button>
	</div>
</div>

<!-- disclaimer -->
<label class="col-sm-3 control-label" for="disclaimer">Disclaimer</label>
<div class="col-sm-8" id="disclaimer">
<small id="disclaimer">Auf grund der international unterschiedlichen Rechtslage bezüglich des Urhebereichts hostet die ndb keine Musikdateien. Als Kompromiss bieten wir die Möglichkeit, Musiksücke zu verlinken, die von anderen Diensten gehostet werden.</small>			
</div>
</form>