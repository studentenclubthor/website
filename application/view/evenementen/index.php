<div class="container">
	<div class="row">
		<div class="col col-xs-12 text-center">
			<?php if(isset($_COOKIE["thorsessionid"])){ echo
			'<div class="row">
				<div class ="col col-1 col-xs-offset-8">
					<button class="btn waves-effect waves-light light-blue darken-4" onclick="popItUp('."'add'".')" style="margin-top: 20px;">
						<i class="material-icons right">add</i>
					</button>
				</div>
			</div>
			<div class="row">
				<div class="popup Nshows" id="add" onclick="popItUp('."'add'".')">
				</div>
				<div class="col col-xs-8 col-xs-offset-2 myPopup Nshows add" id="add">
					<h3>add event</h3>
					<br>
					<form action="evenementen\addEvent" method="post">
						<div class="input-field row">
							<div class="col col-xs-8 col-xs-offset-1 col-md-6 col-md-offset-2">
								<input id="naam" name="naam" type="text" class="validate" value="">
								<input id="locatie" name="locatie" type="text" class="validate" value="">
								<input id="start" name="start" type="datetime-local" class="validate" value="2017-06-01T08:30">
								<input id="eind" name="eind" type="datetime-local" class="validate" value="2017-06-01T08:30">
								<input id="banner" name="banner" type="text" class="validate" value="">
								<textarea style="width:100%; height: 350px; resize: vertical;" id="tekst" name="tekst" type="text" class="validate" value=""></textarea>
								</div>
							<div class="col col-xs-3 col-md-4">
								<label for="naam">Naam *</label>
								<label for="locatie">Locatie *</label>
								<label for="start">start</label>
								<label for="eind">eind</label>
								<label for="banner">banner</label>
								<label for="tekst">tekst</label>
							</div>
						</div>
						<div class="input-field col xol-xs-12">
						<p>* Required</p>
							<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">
								<i class="material-icons right">send</i>
							</button>
						</div>
					</form>
				</div>
				<div class="popup Nshows" id="edit" onclick="popItUp('."'edit'".')">
				</div>
				<div class="col  col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 Nshows myPopup edit" id="edit">
					<h3>Edit event</h3>
					<br>
					<form class="link edit" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 col-xs-offset-1 col-md-4 col-md-offset-3">
								<input id="banner" name="banner" type="text" class="validate link edit" value="">
								<input id="naam" name="naam" type="text" class="validate link edit" value="">
								<input id="locatie" name="locatie" type="text" class="validate link edit" value="">
								<input id="start" name="start" type="text" class="validate link edit" value="">
								<input id="eind" name="eind" type="text" class="validate link edit" value="">
								<textarea style="width:100%; height: 150px; resize: vertical;" id="tekst" name="tekst" type="text" class="validate link edit" value=""></textarea>
							</div>
							<div class="col col-xs-4 col-md-4">
								<label for="banner">banner</label>
								<label for="naam">Naam *</label>
								<label for="locatie">Locatie *</label>
								<label for="start">start</label>
								<label for="eind">eind</label>
								<label for="tekst">tekst</label>
							</div>
						</div>
						<div class="input-field col col-xs-12">
						<p>* Required</p>
							<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">
								<i class="material-icons right">update</i>
							</button>
						</div>
					</form>
				</div>
				<div class="popup Nshows" id="remove" onclick="popItUp('."'remove'".')">
				</div>
				<div class="col  col-xs-10 col-xs-offset-1 col-md-6 col-md-offset-3 Nshows myPopup remove" id="remove">
					<h3>Remove Event?</h3>
					<br>
					<form class="link remove" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-4 col-xs-offset-4 remove">
								<p>remove </p><p class="link remove"></p>
							</div>
							<div class="col col-xs-4 col-xs-offset-4">
								<button class="btn waves-effect waves-light light-blue darken-4 link remove" style="margin-top: 20px;">
									<i class="material-icons right">yes</i>
								</button>
								<button type="button" class="btn waves-effect waves-light light-blue darken-4" onclick="popItUp('."'remove'".')" style="margin-top: 20px;">
									<i class="material-icons right">no</i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>';
			}
			?>
			<div class="row">
				<h1>Data van onze evenementen</h1>
				<br>
				<?php foreach($events as $event){
					echo "<div class='row' id='event". $event->id ."' style='position:relative;'>";
					// echo "<img class='banner' src='" . $event->banner . "' />";
					echo "<div class='col-12 col-md-6 col-lg-8'>";
					echo "<img class='banner' src='" . URL . "img\banner\mosselfest.jpg' />";
					echo "</div>";
					echo "<div class='col-12 col-md-6 col-lg-4'>";
					if(isset($_COOKIE["thorsessionid"])){
						echo "<div class='topLeft'>";
						echo "<img class='eventRemove' onclick='fill(" . '"' . "remove" . '",' . $event->id .")'  src='" . URL . "img/svg/bin.svg' />";
						echo "<img class='eventRemove' onclick='fill(" . '"' . "edit" . '",' . $event->id .")'  src='" . URL . "img/svg/gear.svg' />";
						echo "</div>";
					}
					echo "<p class='eventName'>" . $event->naam ."</p>";
					echo "<p class='eventLoc'>" . $event->locatie ."</p>";
					echo "<p class='eventStart'>" . $event->start ."</p>";
					echo "<p class='eventEnd'>" . $event->eind ."</p>";
					echo "<p class='eventTekst'>" . $event->tekst ."</p>";
					echo "</div></div><br>";
				}
				?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="<?php echo URL; ?>js/popItUp.js"></script>

<script>
function fill(name,id){
	var links = document.querySelectorAll(".link" + ("."+name));
	var info = document.getElementById(("event" + id)).children;
	if(name == "edit"){
		links[0].action = ('<?PHP echo URL ; ?>\' + 'evenementen\\editEvent\\' + id);
		console.log(links);
		links[1].value = info[0].src;
		links[2].value = info[2].innerHTML;
		links[3].value = info[3].innerHTML;
		links[4].value = info[4].innerHTML;
		links[5].value = info[5].innerHTML;
		links[6].value = info[6].innerHTML;
	}
	else if(name == "remove"){
		links[0].action = ('<?PHP echo URL ; ?>\' + 'evenementen\\deleteEvent\\' + id);
		links[1].innerHTML = info[2].innerHTML;
	}
	popItUp(name);
}
</script>
