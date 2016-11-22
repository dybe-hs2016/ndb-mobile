<!-- SEARCH FORM vs INPUT -->
<div class="input-group">									
	<!-- <form action="get"> -->
	<!-- <label class="sr-only" for="src"> search </label> -->

		<input 	type="search" class="form-control" id="src" placeholder="Suche..." formaction="results.html">		

		<span class="input-group-btn">
			<button class="btn btn-default btn-src" type="button">
				<span class="glyphicon glyphicon-search"></span>
			</button>
		</span>

	<!-- </form> -->
</div>

<!-- extended search form -->
<p> <a href="<?php echo trim($expSuche["url"]); ?>"><?php echo $expSuche["name"]; ?></a> </p>