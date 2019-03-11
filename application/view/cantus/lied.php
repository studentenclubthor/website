 <div class="container">
	<div class="row"  style="height:30px">
		<div id="catcher"></div>
		<div class="col-xs-12">
			<div class="col-xs-12 white-bg  stopTop" style="z-index:1">
				<div class="col col-xs-4">
					<br />
					<input class="autocomplete" id="lied" name="lied" type="lied" placeholder="Zoek lied" />
				</div>
				<div class="col-xs-1" style="position: absolute;left: 0;top: 50px;">
					<ul>
						<a href="<?php echo URL; ?>cantus/liederen/#0"><li>0</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#A"><li>A</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#B"><li>B</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#C"><li>C</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#D"><li>D</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#E"><li>E</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#F"><li>F</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#G"><li>G</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#H"><li>H</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#I"><li>I</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#J"><li>J</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#K"><li>K</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#L"><li>L</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#M"><li>M</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#N"><li>N</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#O"><li>O</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#P"><li>P</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#Q"><li>Q</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#R"><li>R</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#S"><li>S</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#T"><li>T</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#U"><li>U</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#V"><li>V</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#W"><li>W</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#X"><li>X</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#Y"><li>Y</li></a>
						<a href="<?php echo URL; ?>cantus/liederen/#Z"><li>Z</li></a>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div class="row" style="position:relative">
		<div class="col-xs-11 offset-xs-1 col-md-6 offset-md-3 text-center">
			<?php 
			if(isset($naam)){
				$myfile = fopen("files/text/". $naam .".txt", "r") or die("Unable to open file!");
				$start = 0;
				while(!feof($myfile)) {
					$line = utf8_encode(fgets($myfile));
					if($start == 0){
						echo "<h3>". $line ."</h3>";
						$start = 1;
						echo "<pre class='liedtekst'>";
					}
					else{
						echo $line;
					}
				}
				echo "</pre>";
				fclose($myfile);
			}
			?>
		</div>
		<div class="col-xs-11 offset-xs-1 col-md-4 offset-xs-5 text-center liedinfo">
			<?php
				echo "<img src=".'"'. URL ."img/schild/". $naam .".png".'"'." class='schild' />";
			?>
			<p>"Auteur: de kixskes"</p>
			<p>"Muziek: Urbanus"</p>
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