Detailseite -->


<?php 
	$sql_view_all = "SELECT * FROM view_all WHERE id='".$_GET['id']."'";
			echo "<br> sql_view_all :";
			var_dump($sql_view_all);

		$query_view_all = mysqli_query($verb, $sql_view_all) or die("<br> Fehler query_view_all: ".mysqli_error($verb));
			echo "<br> querey_view_all :";
			var_dump($query_view_all);

		$result_view_all = mysqli_fetch_assoc($query_view_all);
			echo "<br> result_view_all :";
?>
<!-- composer -->
<table class="table">
<tr>
		<td class="tbl-key">
			
		</td>
		<td class="tbl-val">
			
		</td>
</tr>

	<?php
				echo '<br> result_view_all: <br>';
				foreach ($result_view_all as $key => $value) {
					echo '<tr> <td id="key">'.$key.'</td>';
					echo '<td id="val">'.$value.'</td> </tr>';
				}

		echo '<h1>'.$result_view_all['title'].'</h1>';
	?>
</table>



<div class="container"> <!-- content container no 3 -->
	<div class="row">
		<div class="col-xs-12 col-sm-6">
			<div class="table">
				<table class="table">
					<?php 
						do { ?>

						<!-- Komponist -->						
						<tr>
						<td>Komponist</td>
						<td><?php if(!empty($result_detail['composerFullname'])) {echo $result_detail['composerFullname'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Verlag -->
						<tr> 
						<td>Verlag</td>
						<td><?php if(!empty($result_detail['publisherName'])) {echo $suche_expert['publisherName'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Signatur -->
						<tr> 
						<td>Signatur</td>
						<td><?php if(!empty($result_detail['signature'])) {echo $suche_expert['signature'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Epoche -->
						<tr> 
						<td>Epoche</td>
						<td><?php if(!empty($result_detail['epochName'])) {echo $suche_expert['epochName'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Instrumente -->
						<tr> 
						<td>Instrument(e)</td>
						<td><?php if(!empty($result_detail['instruments'])) {echo $suche_expert['instruments'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Stil -->
						<tr> 
						<td>Stil</td>
						<td><?php if(!empty($result_detail['musicstyleName'])) {echo $suche_expert['musicstyleName'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Schwierigkeitsgrad -->
						<tr> 
						<td>Schwierigkeitsgrad</td>
						<td><?php if(!empty($result_detail['level'])) {echo $suche_expert['level'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Anlass -->
						<tr> 
						<td>Anlass</td>
						<td><?php if(!empty($result_detail['occasion'])) {echo $suche_expert['occasion'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Youtube-Video -->
						<tr> 
						<td>Link zu Musikstück</td>
						<td><?php
							if ($random['linktomusic'] == NULL) {
								echo "-";
							} else {
								echo "<a href='".$random['linktomusic']."' target='_blank'>Link</a>";
							}
						?></td>
						</tr>
						<!-- Link zu Sheetmusic -->
						<tr> 
						<td>Link zu Noten</td>
						<td><?php
							if ($random['linktosheet'] == NULL) {
								echo "-";
							} else {
								echo "<a href='".$random['linktosheet']."' target='_blank'>Link</a>";
							}
						?></td>
						</tr>
						<!-- Kommentar -->
						<tr> 
						<td>Kommentar</td>
						<td><?php if(!empty($result_detail['comment'])) {echo $suche_expert['comment'];} else { echo "-"; } ?></td>
						</tr>

						<?php	
						}
						while($result_detail = mysqli_fetch_assoc($query_detail));
						?>

				</table>
			</div>			
			<!-- Button um zu Bearbeiten -->
			<?php var_dump($_GET) ?>
			<form class="form-horizontal" action="page.00.index.php<?php echo $nErfassen['varname']; ?>&id=<?php echo $_GET['id'] ?>" method="post" name="form" id="form">
				<div class="input-group">								
					<button class="btn btn-primary pull-left btn-sm btn-block">Bearbeiten</button>
					<input name="id" type="hidden">
				</div>
			</form>
			
		</div> <!-- div col -->
	</div> <!-- div row -->
</div> <!-- div container