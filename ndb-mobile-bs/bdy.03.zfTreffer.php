<!-- ENTRY METADATA TABLE -->

<?php
	$getData = file_get_contents("db-entry-dummy.json");
	$parsData = json_decode($getData, true);

	/*echo the variables to see how they look like*/

	echo '<h2> $getData </h2>'.var_dump($getData).'<br>';
	echo '<h2> $parsData </h2>'.var_dump($parsData).'<br>';
?>

<?php 
	echo '<h1>'.$parsData['Titel'].'</h1>';
?>

<!-- db endtry as simple foreach loop -->

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

<!-- db entry as foreach loop, where we tryed to enter the nested arrays rather unsuccessfully -->

<div class="table">
	<table class="table">


	<!-- <tr> ID BEZEICHNUNG METADATENFELD
		<th class="key">BEZEICHUNG</th>
		<th class="val">INHALT</th>
	</tr> -->

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

<!-- as html plain test table -->
<div class="table">
	<table class="table">

		<!-- <tr> ID BEZEICHNUNG METADATENFELD
			<th class="key">BEZEICHUNG</th>
			<th class="val">INHALT</th>
		</tr> -->

		<tr> <!-- 02 SIGNATUR -->
			<th class="key">Signatur</th>
			<th class="val">OP-1926-ORCH</th>
		</tr>
		<tr> <!-- 03 TITEL -->
			<th class="key">Titel</th>
			<th class="val">Die Seeräuber Jenny</th>
		</tr> <!-- 04 KOMPONIST -->
			<th class="key">Komponist</th>
			<th class="val">Bert Brecht <br> Kurt Weill <br> Franz Brunier</th>
		<tr> <!-- 05 JAHR -->
			<th class="key"> Jahr </th>
			<th class="val">1926-1928</th>
		</tr>
		<tr> <!-- 0X OPUS -->
			<th class="key"> Opus </th>
			<th class="val"> Die Dreigroschenoper </th>
		</tr>
		<tr> <!-- 06 Epoche -->
			<th class="key">Epoche</th>
			<th class="val">Moderne</th>
		</tr>
		<tr> <!-- 07 Stil -->
			<th class="key">Stil</th>
			<th class="val">Oper</th>
		</tr>
		<tr> <!-- 08 Tonart -->
			<th class="key">Tonart</th>
			<th class="val">???</th>
		</tr>
		<tr> <!-- 09 Instrumente -->
			<th class="key">Instrumente</th>
			<th class="val">Gesang, Bläser, Pauke, Streicher</th>
		</tr>
		<tr> <!-- 10 Schwierigkeitsgrad -->
			<th class="key">Schwierigkeitsgrad</th>
			<th class="val">Fortgeschritten</th>
		</tr>
		<tr> <!-- 11 Anlass -->
			<th class="key">Anlass</th>
			<th class="val"></th>
		</tr>
		<tr> <!-- 12 Link zu Aufnahme -->
			<th class="key">[LINK ZU AUFNAHME]]</th>
			<th class="val"><a href="https://www.youtube.com/watch?v=Ec0clERjQ5A" target="_blank">YOUTUBE: Lotte Lenya Singing "Seeräuber Jenny" (Pirate Jenny)</a></th>
		</tr>
		<tr> <!-- 13 Link zu Noten -->
			<th class="key">[LINK ZU NOTEN]</th>
			<th class="val">Kurt Weill, Bert Brecht</th>
		</tr>
	</table>