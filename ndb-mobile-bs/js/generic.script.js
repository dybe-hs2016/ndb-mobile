	
	var loadContent = function(name) {
		$("#home").on("click", function(){
			$("#pageContent").load("/dybe/ndb-mobile-bs/bdy.01.intro.php");
		});
		$("#erweiterteSuche").on("click", function(){
			$("#pageContent").load("/dybe/ndb-mobile-bs/bdy.0x.erwSrc.php");
		});
		$("#zufallstreffer").on("click", function(){
			$("#pageContent").load("/dybe/ndb-mobile-bs/bdy.03-01.entry.tbl.php");
		});
	};

