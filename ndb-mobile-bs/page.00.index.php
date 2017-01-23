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
	<!-- responsive FIxED width CONTAINER -->
	<!-- <div class="container"> -->

	<!-- responsive FULL width CONTAINER -->
	<div class="container-fluid">

	<!-- HEADER -->
	<div class="row">
		<div class="col-lg-1 visible-lg"> <!-- placeholder --> </div>

		<!-- NAV -->
		<div class="col-lg-10 col-md-12 col-sm-12">
			<?php include("incl.01.nav.php"); ?>
		</div>
	</div>


		<!-- GRID: rows + columns -->
		<!-- grid classes: xs / sm / md / ld -->
		<div class="row">
			<!-- col crate gutters (padding)  -->
			<!-- MAIN VIEW METADATA -->
			<div class="col-lg-1 visible-lg"> <!-- placeholder lg --> </div>
			
			<div class="col-lg-7 col-md-8 col-sm-8" id="pageContent">
							
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
			<div class="col-lg-3 col-md-4 col-sm-4">	
				<?php 
				if (!isset($_GET['varname'])) {
					include ("incl.03.li.php");
				} else {
					if ($_GET['varname'] == "bdy.01.intro.php") {
						include("incl.03.li.php");
					} else {
						include("incl.06.lo.php");
						if ($_GET['varname'] == "bdy.02.srcrslt.php") {
							include ("incl.02.srcFacetten.php");
						}
						}
					}
				?>		
			</div>
		</div>
		<div class="col-lg-1 visible-lg"> <!-- placeholder --></div>
	</div>

	<?php include("incl.00.scripts.php"); ?>

</body>
</html>