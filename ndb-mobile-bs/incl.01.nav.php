<!-- NAV BAR that will collapse on small screens to the top right corner -->
<nav class="navbar navbar-default">
	<div class="container-fluid">

		<div class="navbar-header">

			<div class="navbar-left">
				<!-- this link is simple on purpose as a fallback -->
				<a href="<?php echo trim($home["url"]); ?>">
				<img src="images/ndb-logo-xs.png"></a>
			</div>

			<div class="nav-button">
				<button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#collapseNavbar">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				</button>				
			</div>

		</div>

		<div class="collapse navbar-collapse" id="collapseNavbar"> <!-- Everything you want hidden at 940px or less, place within here -->

			<ul class="nav navbar-nav">

			<!--  -->

			<li class="active"><a href="<?php echo trim($home["url"]).$home['varname']; ?>"><?php echo $home["name"]; ?></a></li>
			<li><a href="<?php echo trim($home["url"]).$expSuche['varname']; ?>"><?php echo $expSuche["name"]; ?></a></li>
			<li><a href="<?php echo trim($home["url"]).$sammlung['varname']; ?>"><?php echo $sammlung["name"]; ?></a></li>
			<li><a href="<?php echo trim($home["url"]).$zfTreffer['varname']; ?>"><?php echo $zfTreffer["name"]; ?></a></li>
			<li><a href="<?php echo trim($home["url"]).$nErfassen['varname']; ?>"><?php echo $nErfassen["name"]; ?></a></li>
			<li><a href="<?php echo trim($home["url"]).$benEinst['varname']; ?>"><?php echo $benEinst["name"]; ?></a></li>
			<li><a href="<?php echo trim($gitHub["url"]); ?>"><?php echo $gitHub["name"]; ?></a></li>
			<li><a href="<?php echo trim($home["url"]).$impr['varname']; ?>"><?php echo $impr["name"]; ?></a></li>
			
			</ul>
			<!-- <ul class="nav navbar-nav navbar-right">
			<li><a href="#"><span class="glyphicon glyphicon-user"></span> Log Out</a></li>
			</ul> -->
		</div>
	</div>
</nav> 
