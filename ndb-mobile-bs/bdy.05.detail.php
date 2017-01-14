<!-- Detailseite -->

<?php 
	$sql_detail = "SELECT * FROM `view_all` WHERE `id`='".$_GET['id']."' ";	
	$query_detail = mysqli_query($verb, $sql_detail) or die("Fehler:".mysqli_error($verb));
	$result_detail = mysqli_fetch_assoc($query_detail);
	echo mysqli_error($verb);
	?>

<?php 
	echo '<h1>'.$result_detail['title'].'</h1>';
?>

<div class="container"> <!-- content container no 3 -->
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="table">
				<table class="table">
					<!-- <tr> ID BEZEICHNUNG METADATENFELD
						<th class="key">BEZEICHUNG</th>
						<th class="val">INHALT</th>
					</tr> -->
					<?php 
						foreach ($result_detail as $key => $val) {
							if ($val !== NULL) {
								echo '<tr> 
									<th class="key">'.$key.'</th>
									<th class="val">'.$val.'</th>
									</tr>';
							} else {
								'<tr>
								<th class="key">'.$key.'</th>
								<th class="val">-</th>
								</tr>';
							}
						}
					?>
				</table>
			</div>
			
			<!-- Button um zu Bearbeiten -->
			<form class="form-horizontal" action="page.00.index.php?varname=bdy.04.nErfassen.php" method="post" name="form" id="form">
				<div class="input-group">									
					<button class="btn btn-primary pull-left btn-sm btn-block">Bearbeiten</button>
					<input name="id" type="hidden" value="<?php echo $_GET["id"]; ?>">					
				</div>
			</form>
			
		</div> <!-- div col -->
	</div> <!-- div row -->
</div> <!-- div container -->