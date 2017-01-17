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
			var_dump($result_view_all);

		foreach ($result_view_all as $key => $value) {
			echo $key." : ".$value."<br>";
		}
?>

<h1> <?php echo $result_view_all['title']; ?></h1>

<table class="table"> <!-- table with view all -->

<!-- composer -->
	<tr>
			<td class="tbl-key"> Komponist </td>
			<td class="tbl-val">
				<?php echo $result_view_all['composerFullname']; ?>
			</td>
	</tr>

	<!-- publisherName -->
	<tr>
			<td class="tbl-key"> Verlag </td>
			<td class="tbl-val">
				<?php echo $result_view_all['publisherName']; ?>
			</td>
	</tr>

	<!-- signature -->
	<tr>
			<td class="tbl-key"> Signatur </td>
			<td class="tbl-val">
				<?php echo $result_view_all['signature']; ?>
			</td>
	</tr>

	<!-- epochName -->
	<tr>
			<td class="tbl-key"> Epoche </td>
			<td class="tbl-val">
				<?php echo $result_view_all['epochName']; ?>
			</td>
	</tr>

	<!-- instruments -->
	<tr>
			<td class="tbl-key"> Instrument(e) </td>
			<td class="tbl-val">
				<?php echo $result_view_all['instruments']; ?>
			</td>
	</tr>

	<!-- musicstyleName -->
	<tr>
			<td class="tbl-key"> Stil </td>
			<td class="tbl-val">
				<?php echo $result_view_all['musicstyleName']; ?>
			</td>
	</tr>

<!-- level -->
	<tr>
			<td class="tbl-key"> levle </td>
			<td class="tbl-val">
				<?php echo $result_view_all['level']; ?>
			</td>
	</tr>

	<!-- occasion -->
	<tr>
			<td class="tbl-key"> Anlass </td>
			<td class="tbl-val">
				<?php echo $result_view_all['occasion']; ?>
			</td>
	</tr>

	<!-- linktomusic -->
	<tr>
			<td class="tbl-key"> Link zu Musikstück </td>
			<td class="tbl-val">
				<a href=""<?php echo $result_view_all['linktomusic']; ?>> <?php echo $result_view_all['linktomusic']; ?> </a>
			</td>
	</tr>

	<!-- linktosheet -->
	<tr>
			<td class="tbl-key"> Link zu Noten </td>
			<td class="tbl-val">
				<a href=""<?php echo $result_view_all['linktosheet']; ?>> <?php echo $result_view_all['linktosheet']; ?> </a>
			</td>
	</tr>

	<!-- comment -->
	<tr>
			<td class="tbl-key"> Kommentar </td>
			<td class="tbl-val">
				<?php echo $result_view_all['comment']; ?>
			</td>
	</tr>
</table>

	<!-- Button um zu Bearbeiten -->
	<?php var_dump($_GET) ?>
		<form class="form-horizontal" action="page.00.index.php<?php echo $nErfassen['varname']; ?>&id=<?php echo $_GET['id'] ?>" method="post" name="form" id="form">
			<div class="input-group">								
				<button class="btn btn-primary pull-left btn-sm btn-block">Bearbeiten</button>
				<input name="id" type="hidden">
			</div>
	</form>