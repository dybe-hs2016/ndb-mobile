<!-- Noten Erfassen -->

<?php
	require_once("incl.04.form.php");
?>

<!-- Noten Erfassen -->
<h1>Noten erfassen</h1>

<h2>Neuen Datenbankeintrag erfassen</h2>

<form class="form-horizontal" action="page.00.index.php?varname=prcd.04.nErfasst.php" method="post">

<!-- title -->
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
				echo '<label class="checkbox col-sm-4 col-md-4 col-lg-3">';
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
		<input class="form-control" type="text" name="signature" id="signature">
	</div>
	</div>

	<!-- linktomusic -->
	<div class="form-group">
	<label class="col-sm-3 control-label" for="linktomusic">Link zu Musiksück</label>
	<div class="col-sm-8">
		<input class="form-control" type="text" name="linktomusic" id="linktomusic" aria-describedby="hint-musik" placeholder="http://www... bitte gesamte URL hinterlegen.">
		<small id="hint-musik"> Es gibt eine Vielzahl guter Quellen, die Musikstücke und Vieos hosten. Hier sind ein paar Vorschläge: <br> <a href="http://www.last.fm/">last.fm</a>, <a href="https://vimeo.com/">vimeo</a>, <a href="https://www.youtube.com/">youtube</a>, <a href="https://soundcloud.com/">soundcloud</a>, <a href="https://www.discogs.com/">discogs</a> </small>
	</div>
</div>

<!-- linktosheet -->
<div class="form-group">
<label class="col-sm-3 control-label" for="linktosheet">Link zu Noten</label>
	<div class="col-sm-8">
		<input class="form-control" type="text" name="linktosheet" id="linktosheet" aria-describedby="hint-noten" placeholder="http://www... bitte gesamte URL hinterlegen.">
		<small id="hint-noten"> Es gibt eine vielzahl guter Quellen, die lizenzfreie Noten hosten. Hier sind ein paar vorschläge: <br> <a href="https://musopen.org/">musopen.org</a>, <a href="http://imslp.org/">imslp.org</a>, <a href="http://www.mutopiaproject.org/">mutopiaproject.org</a>, <a href="http://cpdl.org/">cpdl.org</a> </small>
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
	<div class="col-sm-3"> <!-- empty placeohlder --> </div>
	<div class="col-sm-8">
		<button class="btn btn-primary btn-li pull-right" type="submit" value="Insert Button">Eintrag erfassen</button>
	</div>
</div>

<!-- disclaimer -->
<label class="col-sm-3 control-label" for="disclaimer">Disclaimer</label>
<div class="col-sm-8" id="disclaimer">
<small id="disclaimer">Auf grund der international unterschiedlichen Rechtslage bezüglich des Urhebereichts hostet die ndb keine Musikdateien. Als Kompromiss bieten wir die Möglichkeit, Musiksücke zu verlinken, die von anderen Diensten gehostet werden.</small>			
</div>
</form>