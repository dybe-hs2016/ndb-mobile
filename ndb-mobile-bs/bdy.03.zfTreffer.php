<!-- Zufallstreffer -->


<?php include("incl.04.form.php"); ?>

<?php 
	echo '<h1>'.$random['title'].'</h1>';
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
						foreach ($random as $key => $val) {
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

			<!-- Button für erneuten Treffer -->
			<form class="form-horizontal" action="javascript:location.reload()" method="post" name="random" id="random">
				<div class="input-group">									
					<button class="btn btn-primary pull-left btn-sm btn-block">Neuer Zufallstreffer</button>
				</div>
			</form>
		
		</div> <!-- div col -->
	</div> <!-- div row -->
</div> <!-- div container -->