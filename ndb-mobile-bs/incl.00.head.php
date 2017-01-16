<!-- set page properties -->
<!-- MUST COME FIRST IN HEAD -->
	<!-- set the correct CHARSET -->
	<meta charset="utf-8">

	<!-- ensure compability with IE -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<!-- set VIEWPOINT to scale content to the device size and set INITIAL ZOOM level to 1  -->		
	<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- embed custom fonts -->

	<!-- google fonts -->
	<link href="https://fonts.googleapis.com/css?family=Noto+Sans:400,400i,700|Source+Sans+Pro:300" rel="stylesheet">

<!-- embed tab icon -->

	<!-- f-key browser tab icon -->
	<link rel="icon" href="images/ndb-f-key-logo.ico">

<!-- embed CSS [choose local or MaxCND] -->

	<!-- MaxCND: Latest compiled and minified Bootstrap stylesheet -->
	<!-- W3C says, that MaxCND can improve page load performance -->
	<!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> -->

	<!-- Local: Current local Bootstrap stylesheet-->
	<link rel="stylesheet" href="css/bootstrap.min.css">

	<!-- Local: Our own stylesheets [must be extended] -->
	<link rel="stylesheet" href="css/generic.styles.css">

<!-- include PHP Variables -->
	<!-- Link Variables -->
	<?php require_once("strct.link.var.list.php"); ?>

<!-- include connection info to database -->
	<?php require_once("../../../private/verbindung.php"); ?>


<!-- embed some descriptive META tags -->
	<meta name="description" content="Database for musicians or ohter interested parties to store their sheet music or reserch for new sheet music.">
	<meta name="keywords" content="Noten, scheet music, Dantenbank, database, Musikbibliothek, music library, " >
	<meta name="author" content="Buchinger, Lehmann, Wanko">
	<meta name="date created" content="2016.11.10">