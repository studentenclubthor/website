<div class="container">
	<div class="row">
		<div class="col col-md-12 text-center">
			<div class="row">
				<div class ="col col-1 offset-xs-8">
					<button class="btn waves-effect waves-light light-blue darken-4" onclick="popItUp('add')" style="margin-top: 20px;">
						<i class="material-icons right">add</i>
					</button>
				</div>
			</div>
			<div class="row">
				<div class="popup Nshows" id="add" onclick="popItUp('add')">
				</div>
				<div class="col col-xs-6 offset-xs-3 myPopup Nshows add" id="add">
					<h3>add event</h3>
					<br>
					<form action="evenementen\addEvent" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-xs-1 col-md-4 offset-md-3">
								<input id="naam" name="naam" type="text" class="validate" value="">
								<input id="locatie" name="locatie" type="text" class="validate" value="">
								<input id="start" name="start" type="text" class="validate" value="">
								<input id="eind" name="eind" type="text" class="validate" value="">
								<input id="tekst" name="tekst" type="text" class="validate" value="">
								<input id="banner" name="banner" type="text" class="validate" value="">
						    </div>
							<div class="col col-xs-4 col-md-4">
								<label for="naam">Naam *</label>
								<label for="locatie">Locatie *</label>
								<label for="start">start</label>
								<label for="eind">eind</label>
								<label for="tekst">tekst</label>
								<label for="banner">banner</label>
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
				<div class="popup Nshows" id="edit" onclick="popItUp('edit')">
				</div>
				<div class="col  col-xs-10 offset-xs-1 col-md-6 offset-md-3 Nshows myPopup edit" id="edit">
					<h3>Edit event</h3>
					<br>
					<form class="link edit" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-xs-1 col-md-4 offset-md-3">
								<input id="naam" name="naam" type="text" class="validate link edit" value="">
								<input id="locatie" name="locatie" type="text" class="validate link edit" value="">
								<input id="start" name="start" type="text" class="validate link edit" value="">
								<input id="eind" name="eind" type="text" class="validate link edit" value="">
								<input id="tekst" name="tekst" type="text" class="validate link edit" value="">
								<input id="banner" name="banner" type="text" class="validate link edit" value="">
						    </div>
							<div class="col col-xs-4 col-md-4">
								<label for="naam">Naam *</label>
								<label for="locatie">Locatie *</label>
								<label for="start">start</label>
								<label for="eind">eind</label>
								<label for="tekst">tekst</label>
								<label for="banner">banner</label>
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
				<div class="popup Nshows" id="remove" onclick="popItUp('remove')">
				</div>
				<div class="col  col-xs-10 offset-xs-1 col-md-6 offset-md-3 Nshows myPopup remove" id="remove">
					<h3>Remove persoon?</h3>
					<br>
					<form class="link remove" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-4 offset-xs-4 remove">
								<p>remove </p><p class="link remove"></p>
							</div>
							<div class="col col-xs-4 offset-xs-4">
								<button class="btn waves-effect waves-light light-blue darken-4 link remove" style="margin-top: 20px;">
									<i class="material-icons right">yes</i>
								</button>
								<button type="button" class="btn waves-effect waves-light light-blue darken-4" onclick="popItUp('remove')" style="margin-top: 20px;">
									<i class="material-icons right">no</i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="recuringTable col col-md-8 offset-md-2">
					<h1>Data van onze evenementen</h1>
					<table>
						<?php foreach($events as $event ){
							var_dump($event);
						}
						?>
					</table>
				</div>
			</div>
		<div>
	</div>
</div>

<script type="text/javascript" src="<?php echo URL; ?>js/popItUp.js"></script>

<script>
function fill(name,id){
	var links = document.querySelectorAll(".link" + ("."+name));
	if(name == "edit"){
		links[0].action = ('<?PHP echo URL ; ?>\' + 'abactis\\editPersoon\\' + id);
		var info = document.getElementById(("peter" + id));
		links[1].value = info.cells[1].innerHTML;
		links[2].value = info.cells[2].innerHTML;
		links[3].value = info.cells[3].innerHTML;
	}
	else if(name == "remove"){
		links[0].action = ('<?PHP echo URL ; ?>\' + 'abactis\\deletePersoon\\' + id);
		var info = document.getElementById(("peter" + id));
		links[1].innerHTML = (info.cells[1].innerHTML + " " +info.cells[2].innerHTML);
	}
	popItUp(name);
}
</script>
