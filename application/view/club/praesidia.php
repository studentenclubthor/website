<div class="container">
	<div class="row">
		<div class="col col-md-12 text-center">
			<div class="row">
				<div class="recuringTable col col-md-8 offset-md-2">
					<h1>alle praesidia</h1>
					<table>
						<div class='row text-center' id='add-praesidia'>
						<?php 
						/*$x = 0;
						$years = array_count_values(array_column($praesidia,"verkregen"));
						foreach($years as $year => $yearCount ){
							echo "<div class='row text-center' id='add-praesidia'>";
							echo "<h1 class='font-bold light-blue-text my-3 col-12'>" . $year . "-" . ($year + 1) . "</h1>";
							for($i = 1; $i <= $yearCount; $i++){
								$p = $praesidia[$x + $i -1];
								echo "<div class='col-lg-2";
								if($i == 1){
									echo " offset-lg-" . (6 - ceil($yearCount / ceil($yearCount / 5)));
									if($yearCount == 4){
										echo " offset-2";
									}
								}
								elseif($yearCount == 4){
									if($i == 3){
										echo " offset-2 offset-lg-0";
									}
								}
								elseif($yearCount == 5){
									if($i == 4){
										echo " offset-2 offset-lg-0";
									}
								}
								elseif($yearCount == 7){
									if($i == 5){
										echo " offset-0 offset-lg-3";
									}
									if($i == 4 or $i == 6){
										echo " offset-2 offset-lg-0";
									}
								}
								elseif($yearCount == 6){
									if($i == 4){
										echo " offset-0 offset-lg-3";
									}
								}
								elseif($yearCount == 9){
									if($i == 6){
										echo " offset-0 offset-lg-2";
									}
								}
								echo " col-4'>";
									echo "<img class='profile' src='". URL . "img/personen/" . $p->voornaam . "_" . $p->achternaam . ".jpg' />";
									echo "<h4>" . $p->cleanName . "</h4>";
									echo "<div class='heading-line'></div>";
									echo "<p>" . $p->voornaam . " " . $p->achternaam . "</p>";
								echo "</div>";
							
								multiple lines
								echo "<div class='col-lg-2 ";
								if($i == 1){
									echo "offset-lg-" . (6 - $yearCount) . " ";
								}
								elseif($i == $yearCount / 2 or $i  == $yearCount / 2){
									echo "offset-" . (6 - ($yearCount - $i)) . " offset-lg-0 ";
								}
								echo "col-4'>";
									echo "<img class='profile' src='". URL . "img/personen/" . $p->voornaam . "_" . $p->achternaam . ".jpg' />";
									echo "<h4>" . $p->naam . "</h4>";
									echo "<div class='heading-line'></div>";
									echo "<p>" . $p->voornaam . " " . $p->achternaam . "</p>";
								echo "</div>";
							}
							echo "</div>";
							$x = $x + $i -1;
						}*/
						?>
					</table>
				</div>
			</div>
		<div>
	</div>
</div>

<script>
	var amount = 2;
	var offset = 0;
	var offsetTop = 0;
	var topBool = true;
	var botBool = false;
	var lastData = false;
	
	function wait(){
		
	}
	
	function addElements(parent,child){
		$(parent).append(child);
	}
	
	function removeFirstElement(parent){
		
	}
	
	function loadTop(){
		if(! topBool){
			console.log("top!");
			$.ajax({
				url: (window.location.origin + "/ajax/praesidiaTop/" + amount + "/" + offsetTop)
			})
			.done(function(html) {
				addElements('#add-praesidia',html);
				offsetTop += amount;
			});
		}
	}
	
	function loadBot(){
		if(! botBool){
			console.log("bot!");
			var result = $.ajax({
				url: (window.location.origin + "/ajax/praesidiaTop/" + amount + "/" + offset)
			})
			.done(function(html) {
				addElements('#add-praesidia',html);
				offset += amount;
			});
	   }
	}
	
	function check(){
		loadTop();
	    loadBot();
		if(topBool && $(window).scrollTop() > 500 && offsetTop != 0){
			topBool = false;
		}
		if(! topBool && $(window).scrollTop() < 500 && offsetTop != 0){
			topBool = true;
		}
		if(botBool && $(window).scrollTop() + $(window).height() > $(document).height() - 200){
			botBool = false;
		}
		if(! botBool && $(window).scrollTop() + $(window).height() < $(document).height() - 200){
			botBool = true;
		}
	}
	
	$(document).ready(check());
	
	var scrolling = false;

	$( window ).scroll( function() {
	  scrolling = true;
	});

	setInterval( function() {
	  if ( scrolling ) {
		scrolling = false;
		check();
	  }
	}, 250 );
</script>