<!-- ENTRY METADATA TABLE -->

<?php
	ini_set('display_errors', 'On');
	error_reporting(E_ALL);
?>

<?php
	$getData = file_get_contents("db-entry-dummy.json");
	$parsData = json_decode($getData, true);

	echo '<h2> $getData </h2>'.var_dump($getData).'<br>';
	echo '<h2> $parsData </h2>'.var_dump($parsData).'<br>';
?>

<?php 
	echo '<h1>'.$parsData['Titel'].'</h1>';
?>

<div class="table">
	<table class="table">

		<!-- <tr> ID BEZEICHNUNG METADATENFELD
			<th class="key">BEZEICHUNG</th>
			<th class="val">INHALT</th>
		</tr> -->

		<?php 
			foreach ($parsData as $key => $val) {
				echo '<tr> 
					<th class="key">'.$key.'</th>
					<th class="val">'.$val.'</th> 
				</tr>';
			}
		?>

	</table>
</div>

		<?php 
			echo '<h1>'.$parsData['Titel'].'</h1>';
		?>

<div class="table">
	<table class="table">

	<?php
		/*var_dump($val['Komponist']);*/

		foreach ($parsData as $key => $val) {

			switch ($key) {
				case 'Komponist':
					echo '<tr> 
						<th class="key">'.$key.'</th>
						<th class="val">'.$val['name'].'</th> 
					</tr>';
					break;

				case 'Instrumente':
					echo '<tr> 
						<th class="key">'.$key.'</th>
						<th class="val">'.$val['name'].'</th> 
					</tr>';
					break;

				case 'Link zu Aufnahme':
					echo '<tr> 
						<th class="key">'.$key.'</th>
						<th class="val">'.$val['name'].' '.$val['link'].'</th> 
					</tr>';
					break;

				case 'Link zu Noten':
					echo '<tr> 
						<th class="key">'.$key.'</th>
						<th class="val">'.$val['name'].' '.$val['link'].'</th> 
					</tr>';
					break;
				
				default:
					echo '<tr> 
						<th class="key">'.$key.'</th>
						<th class="val">'.$val.'</th> 
					</tr>';
					break;
			}
		}
	?>

	</table>
</div>