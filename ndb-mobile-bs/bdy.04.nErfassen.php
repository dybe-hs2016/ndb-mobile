<!-- Noten Erfassen -->

<h1>Noten erfassen</h1>

<?php require_once("incl.04.form.php"); ?>

<h2>Neuen Datenbankeintrag erfassen</h2>

<form class="form-horizontal" action="bdy.04nErfasst.php" method="post">

	<!-- Title -->
	<div class="form-group">
		<label class="col-sm-3 control-label" for="title">Titel</label>
		<div class="col-sm-8">
			<input class="form-control" type="text" name="title" id="title">
		</div>
	</div>

	<!-- composer -->

	<!-- publisher -->

	<!-- epoch -->

	<!-- epoch -->

	<!-- style -->

	<!-- tonality -->

	<!-- level -->

	<!-- occation -->

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

</form>