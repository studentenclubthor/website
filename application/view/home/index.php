<div class="view intro hm-white-light jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(<?php echo URL; ?>/img/vriendschap.jpg);">
    <div class="full-bg-img">
        <div class="container">
            <div class="d-flex align-items-center d-flex justify-content-center">
                <div class="row mt-5">
                    <div class="col-md-12 wow fadeIn mb-3">
                        <div class="intro-info-content text-center">
                            <h1 class="mb-2">Studentenclub THOR</h1>
                            <h5 class="font-up mb-3 mt-1">Studentikoze vriendenclub sinds 2012</h5>
							<p>Om onszelf even kort voor te stellen, zouden wij u graag onze waarden en normen mee willen geven zodat u zo een beeld over ons kan maken.</p><p> We zijn een kleine exclusieve studentenclub van vrienden, waar iedereen elkaar al kent vanuit het studentikoze leven te leuven. We staan dan ook in om deze vriendschap door de club te bewaren doorheen de jaren, zelfs na onze studententijd. We houden het steeds op een klein bestuur dat zich wil inzetten om ellke maand toch minstens 1 maal samen te komen, dit door een recreationele activiteit of een cantus. Hier Gaan we dan ook steeds uit van een kleine opkomst omdat kleinere evenementen ook gezellig kunnen zijn.</p>
						</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
	<div class="row row-sm-12 text-center">
		<?php 
			$x = 0;
			$years = array_count_values(array_column($praesidia,"verkregen"));
			foreach($years as $year => $yearCount ){
				echo "<h1 class='font-bold light-blue-text my-3 col-12'>Het bestuur van " . $year . "-" . ($year + 1) . "</h1>";
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
				
					/*multiple lines
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
					echo "</div>";*/
				}
				echo "</div>";
				$x = $x + $i -1;
			}
			?>
    </div>
</div>

<div class="view intro hm-white-light jarallax" data-jarallax='{"speed": 0.2}' style="background-image: url(<?php echo URL; ?>/img/vriendschap.jpg);">
    <div class="full-bg-img">
        <div class="container">
            <div class="d-flex align-items-center d-flex justify-content-center" style="height: 300px">
                <div class="row mt-5">
                    <div class="col-md-12 wow fadeIn mb-3">
                        <div class="intro-info-content text-center">
                            <h1 class="display-1 mb-2 wow fadeInDown" data-wow-delay="0.3s"><a class="white-text font-bold"></a></h1>
                            <h5 class="font-up mb-3 mt-1 font-bold wow fadeIn" data-wow-delay="0.4s"></h5>
                            <a href="https://drive.google.com/open?id=1PvR7T7OF0PkzmNaQmLr2tF8prUuA1v8W" class="btn btn-elegant btn-lg wow fadeIn" data-wow-delay="0.4s">pdf test</a> <a class="btn btn-outline-white btn-lg wow fadeIn" data-wow-delay="0.4s"></a> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
