<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("incl.00.head.php"); ?>
	<title><?php echo $_GET['varname']; ?></title>
</head>
<body>
	<!-- DEBUG  error_reporteing E_ALL -> active -->
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
							
				<!-- SEARCH FORM & BODY (if not expSrc) -->
				<!-- filter: only proceed if $_GET is part of strct.link.list.php to prevent mlicious inclusion -->

				<?php
					if (!isset($_GET['varname'])) {
						include("incl.02.src.php"); 
						include ("bdy.01.intro.php");
					} else {
						if ($_GET['varname'] !== 'bdy.02.expsrc.php') {
							include("incl.02.src.php"); 
						}
						include($_GET['varname']);
					}
				?>

			</div>

			<!-- SIDE VIEW LOG IN -->
			<!-- just include if you're not logged in -->
			<div class="col-sm-3">	
				<?php 
				if (!isset($_GET['varname'])) {
					include ("incl.03.li.php");
				} else {
					if ($_GET['varname'] =="bdy.01.intro.php") {
					include("incl.03.li.php");
					} else {
						include("incl.06.lo.php");
						}
					}
				?>		
			</div>
		</div>
	</div>

	<?php include("incl.00.scripts.php"); ?>

</body>
</html>