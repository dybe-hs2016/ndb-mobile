<!-- Detailseite -->


<?php include("incl.04.form.php"); ?>

<?php 
	echo '<h1>'.$freitext['title'].'</h1>';
?>

	<div class="table">
		<table class="table">
			<!-- <tr> ID BEZEICHNUNG METADATENFELD
				<th class="key">BEZEICHUNG</th>
				<th class="val">INHALT</th>
			</tr> -->

			<?php 
				foreach ($freitext as $key => $val) {			
					echo '<tr> 
						<th class="key">'.$key.'</th>
						<th class="val">'.$val.'</th> 
					</tr>';
				}
			?>
		</table>
	</div>	

	
