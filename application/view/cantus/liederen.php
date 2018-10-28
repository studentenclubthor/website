 <div class="container">
	<div class="row offset-1">
		<div id="catcher"></div>
		<div class="col-12" style="height:30px">
			<div class="col-12 white-bg  stopTop" style="z-index:1">
				<div class="col-4">
					<br />
					<input class="autocomplete" id="lied" name="lied" type="lied" placeholder="Zoek lied" />
				</div>
				<div class="col-1" style="position: absolute;">
					<ul>
						<a href="#0" style="list-style-type:none"><li>0</li></a>
						<a href="#A" style="list-style-type:none"><li>A</li></a>
						<a href="#B"><li>B</li></a>
						<a href="#C"><li>C</li></a>
						<a href="#D"><li>D</li></a>
						<a href="#E"><li>E</li></a>
						<a href="#F"><li>F</li></a>
						<a href="#G"><li>G</li></a>
						<a href="#H"><li>H</li></a>
						<a href="#I"><li>I</li></a>
						<a href="#J"><li>J</li></a>
						<a href="#K"><li>K</li></a>
						<a href="#L"><li>L</li></a>
						<a href="#M"><li>M</li></a>
						<a href="#N"><li>N</li></a>
						<a href="#O"><li>O</li></a>
						<a href="#P"><li>P</li></a>
						<a href="#Q"><li>Q</li></a>
						<a href="#R"><li>R</li></a>
						<a href="#S"><li>S</li></a>
						<a href="#T"><li>T</li></a>
						<a href="#U"><li>U</li></a>
						<a href="#V"><li>V</li></a>
						<a href="#W"><li>W</li></a>
						<a href="#X"><li>X</li></a>
						<a href="#Y"><li>Y</li></a>
						<a href="#Z"><li>Z</li></a>
					</ul>
				</div>
			</div>
		</div>
		<div class="col-12">
			<br />
			<?php 
				$lied = "'t gastoees";
				$regex = "/[^a-z]/";
				echo '<br id="0"  />';
				echo '<br />';
				echo '<H2>0</H2>';
				if(true){
					if(preg_match($regex, $lied[0])){
						echo '<a href="'. URL .'cantus/lied/'. $lied .'">'. $lied .'</a>';
					}
					else{
						$char = $lied[0];
						echo '<br id="'. $char .'"  />';
						echo '<br />';
						echo '<H2>'. $char .'</H2>';
						echo '<a href="'. URL .'cantus/lied/'. $lied .'">'. $lied .'</a>';
						$regex = $lied[0];
					}
				}
				// echo '<br id="0"  />';
				// echo '<br />';
				// echo '<H2 style="padding-bottom:1560px">0</H2>';
				// echo '<a href="'. URL .'cantus/lied/gastoees">'."'t gastoees".'</a>';
				// echo '<br id="A"  />';
				// echo '<br />';
				// echo '<H2 style="padding-bottom:1560px">A</H2';	
				// echo '<br id="Z"  />';
				// echo '<br />';
				// echo '<H2 style="padding-bottom:1560px">Z</H2>';	
			?>
		</div>
	</div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>js/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>js/autocomplete.js"></script>
<script>
	var search = [];
	var searches = [];
	var searcher = [
	<?php if(isset($liederen)){
		foreach($liederen as $lied){
			echo '{ "value": "'. $lied->naam .'" },';
		}
	}
	?>
	];
	searches['lied'] = searcher;
</script>
<script>
	var fixed = false;
	var topTrigger = $('.stopTop').offset().top;
	$(document).scroll(function() {
		if( $(this).scrollTop() >= topTrigger ) {
			if( !fixed ) {
				fixed = true;
				$('.stopTop').css({'position':'fixed', 'top':($('.stopTop').position().top) + "px","margin-right":"-250px"});
			}
		} 
		else {
			if( fixed ) {
				fixed = false;
				$('.stopTop').css({'position':'relative','top':""});
			}
		}
	});
</script>