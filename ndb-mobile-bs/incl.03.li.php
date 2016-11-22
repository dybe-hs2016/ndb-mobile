<h1> Benutzer Zone </h1>

<!-- Log In Form and Button -->
<form>
	<!-- EMAIL -->
	<div class="form-group">
		<label class="sr-only" for="email"> email address </label>
		<input type="email" class="form-control" id="email" placeholder="Benutzername...">
	</div>

	<!-- PASSWORD -->
	<div class="form-group">
		<label class="sr-only" for="pwd"> password </label>
		<input type="password" class="form-control" id="pwd" placeholder="Passwort...">
	</div>

	<!-- LOG IN -->
	<button type="submit" class="btn btn-default btn-li"> <?php echo $logIn["name"]; ?> </button>
</form>

<!-- Sign Up / Forgot Password Links -->
<p> <a href="<?php echo trim($nBen["url"]); ?>"> <?php echo $nBen["name"]; ?> </a> </p>
<p>	<a href="<?php echo trim($logIn["url"]); ?>"> <?php echo $logIn["name"]; ?> </a> </p> 
