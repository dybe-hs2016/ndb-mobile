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

			<?php
			echo "varname: ".$_GET['varname']."<br>";
			echo "last page :".$_SERVER['HTTP_REFERER']."<br>";
			echo "last page type :".gettype($_SERVER['HTTP_REFERER'])."<br>";					
			?>
				
				<!-- SEARCH FORM -->
				<!-- just include if you're not on page expsrc -->
				<?php 
					if (isset($_GET['varname'])) !=="bdy.02.expsrc.php") {
						include("incl.02.src.php"); 
					}
				?>
				
				<!-- BODY -->

				<!-- filter: only proceed if $_GET is part of strct.link.list.php to prevent mlicious inclusion -->

				<?php
					if (empty($_GET)) {
						include ("bdy.01.intro.php");
					} else {
						var_dump($_GET);
						include($_GET['varname']);
					}
				?>

			</div>

			<!-- SIDE VIEW LOG IN -->
			<!-- just include if you're not logged in -->
			<div class="col-sm-3">	
				<?php 
					if ($_GET['varname'] =="bdy.01.intro.php") {
					include("incl.03.li.php");
					} else {
						include("incl.06.lo.php");
						}
				?>		
			</div>
		</div>
	</div>

	<?php include("incl.00.scripts.php"); ?>

</body>
</html>