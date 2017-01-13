<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("incl.00.head.php"); ?>
	<title><?php echo $_GET['varname']; ?></title>
</head>
<body>
	<?php
		ini_set('display_errors', 'On');
		error_reporting(E_ALL);
	?>
	<?php include("incl.01.nav.php"); ?>

	<!-- responsive FULL width CONTAINER -->
	<!-- <div class="container-fluid"> -->

	<!-- responsive FIXED width CONTAINER -->
	<div class="container">
		<!-- GRID: rows + columns -->
		<!-- grid classes: xs / sm / md / ld -->
		<div class="row">
			<!-- col crate gutters (padding)  -->
			<!-- MAIN VIEW METADATA -->
			
			<div class="col-sm-9" id="pageContent">
				<!-- SEARCH FORM -->
				<?php include("incl.02.src.php"); ?>

				<!-- BODY -->

				<!-- filter: only proceed if $_GET is part of strct.link.list.php to prevent mlicious inclusion -->

				<?php
					if (empty($_GET)) {
						include ("bdy.01.intro.php");
					} else {
						include($_GET['varname']);
					}
				?>

			</div>

			<!-- SIDE VIEW LOG IN -->
			<div class="col-sm-3">				
				<?php include("incl.03.li.php"); ?>		
			</div>
		</div>
	</div>

	<?php include("incl.00.scripts.php"); ?>

</body>
</html>