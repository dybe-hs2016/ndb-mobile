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

			
			if (strpos($_SERVER['HTTP_REFERER'],'nErfassen') !== false )  {
				echo "insert";

			} elseif (strpos($_SERVER['HTTP_REFERER'],'detail') || (strpos($_SERVER['HTTP_REFERER'],'nErfasst') !== false )) {
				echo "update";

			} else {
				echo "there must be a mistake in our cod %-o so sorry for that. please let us know about it with a short message to emailadress@supprt.web";
			}
					
			?>
				
				<!-- SEARCH FORM -->
				<!-- just include if you're not on page expsrc -->
				<?php 
					if ($_GET['varname'] !=="bdy.02.expsrc.php") {
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
			<div class="col-sm-3">				
				<?php include("incl.03.li.php"); ?>		
			</div>
		</div>
	</div>

	<?php include("incl.00.scripts.php"); ?>

</body>
</html>