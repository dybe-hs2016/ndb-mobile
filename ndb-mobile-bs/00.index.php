<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("incl.00.head.php"); ?>
	<title>Welcome to ndb-mobile</title>

	<!-- embed some descriptive META tags -->
		<meta name="description" content="Database for musicians or ohter interested parties to store their sheet music or reserch for new sheet music.">
		<meta name="keywords" content="Noten, scheet music, Dantenbank, database, Musikbibliothek, music library, " >
		<meta name="author" content="Buchinger, Lehmann, Wanko">
		<meta name="date created" content="2016.11.10">

</head>
<body>
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
			<div class="col-sm-9">
				<?php include("incl.02.src.php") ?>
				<!-- START PAGE -->	
					<h1> Über die ndb </h1>
						<p class="text"> Die ndb richtet sich an Musikerinnen und Musiker, die ihre Notensammlung digital verwalten möchten. Als registrierte Benutzerin oder registrierter Benutzer können Sie hier Noten erfassen und in ihrer persönlichen Sammlung verwalten. Haben Sie keinen Account, können Sie die in der dnb erfassten Noten durchsuchen. </p>
						<p class="text"> Die ndb entstand im Rahmen des Kurses Dynamische Benutzeroberflächen des Studienganges Informationswissenschaft der HTW Chur im Herbstsemester 2016. </p>
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
