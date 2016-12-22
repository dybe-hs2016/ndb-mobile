<!-- SEARCH FORM vs INPUT -->

<!-- include SQL -->
<?php include("incl.04.form.php"); ?>

<form class="form-horizontal" action="page.00.index.php?varname=bdy.02.srcrslt.php" method="post" name="form" id="form">
	<div class="input-group">									
		<!-- <form action="get"> -->
		<!-- <label class="sr-only" for="src"> search </label> -->
		
			<input type="search" class="form-control" id="src" placeholder="Suche..." action="page.00.index.php?varname=bdy.02.srcrslt.php" name="freitext" value="<?php echo isset($_POST['freitext']) ? htmlentities($_POST['freitext']) : "" ; ?>">
			<span class="input-group-btn">
				<button class="btn btn-default btn-src" type="button">
					<span class="glyphicon glyphicon-search"></span>
				</button>
			</span>
		
		<!-- </form> -->
	</div>
</form>

<!-- extended search form -->
<p> <a href="<?php echo trim($home["url"]).$expSuche['varname']; ?>"><?php echo $expSuche["name"]; ?></a> </p>