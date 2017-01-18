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
					<?php 
						do { ?>

						<!-- Komponist -->						
						<tr>
						<td>Komponist</td>
						<td><?php if(!empty($random['composerFullname'])) {echo $random['composerFullname'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Verlag -->
						<tr> 
						<td>Verlag</td>
						<td><?php if(!empty($random['publisherName'])) {echo $random['publisherName'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Signatur -->
						<tr> 
						<td>Signatur</td>
						<td><?php if(!empty($random['signature'])) {echo $random['signature'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Epoche -->
						<tr> 
						<td>Epoche</td>
						<td><?php if(!empty($random['epochName'])) {echo $random['epochName'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Instrumente -->
						<tr> 
						<td>Instrument(e)</td>
						<td><?php if(!empty($random['instruments'])) {echo $random['instruments'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Stil -->
						<tr> 
						<td>Stil</td>
						<td><?php if(!empty($random['musicstyleName'])) {echo $random['musicstyleName'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Schwierigkeitsgrad -->
						<tr> 
						<td>Schwierigkeitsgrad</td>
						<td><?php if(!empty($random['level'])){echo $random['level'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Anlass -->
						<tr> 
						<td>Anlass</td>
						<td><?php if(!empty($random['occasion'])) {echo $random['occasion'];} else { echo "-"; } ?></td>
						</tr>
						<!-- Youtube-Video -->
						<tr> 
						<td>Youtube-Video</td>
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
						<td>Link zu Sheetmusic</td>
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
						<td><?php if(!empty($random['comment'])) {echo $random['comment'];} else { echo "-"; } ?></td>
						</tr>

						<?php	
						}
						while($random = mysqli_fetch_assoc($query_random));	
					?>
				</table>
			</div>	

			<!-- Button für erneuten Treffer -->
			<form class="form-horizontal" action="javascript:location.reload()" method="post" name="random" id="random">
				<div class="input-group">									
					<button class="btn btn-src btn-li btn-sm btn-block">Neuer Vorschlag</button>
				</div>
			</form>
		
		</div> <!-- div col -->
	</div> <!-- div row -->
</div> <!-- div container -->