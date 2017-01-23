<!-- incl.02.srcFacetten.php -->

<php?

<?php
	require_once("incl.04.form.php");
	mysqli_data_seek($result_instrument, 0);
	mysqli_data_seek($result_epoch, 0);
	mysqli_data_seek($result_levels, 0);
	mysqli_data_seek($result_musicstyle, 0);
	mysqli_data_seek($result_occasion, 0);
?>

?>

<!-- Rechte Spalte -->
<div class="row">
	<div class="col hidden-lg">
	<h2> Suchfacetten </h2>
		<!-- Sortiermöglichkeit -->
		<div class="btn-group btn-block">
		  <button type="button" class="btn btn-src btn-li dropdown-toggle btn-block" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				Sortieren nach <span class="caret"></span>
		  </button>
		  <ul class="dropdown-menu">
			<li><a href="#">Titel</a></li>
			<li><a href="#">Komponist</a></li>
			<li><a href="#">Instrument</a></li>
		  </ul>
		</div>
		
		<!-- Einschränkungen/Filtermöglichkeiten -->
		<!-- Einschränkung Instrument -->
		<div class="panel panel-default">
			<div class="panel-heading">Instrument</div>
			<div class="panel-body">
				<?php 
					while ($row_instrument = mysqli_fetch_assoc($result_instrument)) 
					{
						echo '<a href="#"><option value="'.$row_instrument['name'].'">'.$row_instrument['name'].'</option></a>';
					} 
				?>
			</div>
		</div>
		<!-- Einschränkung Epoche -->
		<div class="panel panel-default">
			<div class="panel-heading">Epoche</div>
			<div class="panel-body">
				<?php 
					while ($row_epoch = mysqli_fetch_assoc($result_epoch))
					{
						echo '<a href="#"><option value="'.$row_epoch['name'].'">'.$row_epoch['name'].'</option></a>';
					} 
				?>
			</div>
		</div>
		<!-- Einschränkung Schwierigkeitsgrad -->
		<div class="panel panel-default">
			<div class="panel-heading">Schwierigkeitsgrad</div>
			<div class="panel-body">
				<?php 
					while ($row_levels = mysqli_fetch_assoc($result_levels))
					{
						echo '<a href="#"><option value="'.$row_levels['level'].'">'.$row_levels['level'].'</option></a>';
					}
				?>
			</div>
		</div>
		<!-- Einschränkung Stil -->
		<div class="panel panel-default">
			<div class="panel-heading">Stil</div>
			<div class="panel-body">
				<?php 
					while ($row_musicstyle = mysqli_fetch_assoc($result_musicstyle)) 
					{
						echo '<a href="#"><option value="'.$row_musicstyle['name'].'">'.$row_musicstyle['name'].'</option></a>'; 
					} 
				?>
			</div>
		</div>
		<!-- Einschränkung Anlass -->
		<div class="panel panel-default">
			<div class="panel-heading">Anlass</div>
			<div class="panel-body">
				<?php 
					while ($row_occasion = mysqli_fetch_assoc($result_occasion))
					{	
						echo '<a href="#"><option value="'.$row_occasion['occasion'].'">'.$row_occasion['occasion'].'</option></a>'; 
					} 
				?>
			</div>
		</div>	
	</div>	<!-- Rechte Spalte -->	
</div>