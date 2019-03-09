<div class="container">
	<div class="row">
		<div class="col col-md-12 text-center">
			<div class="row">
				<div class ="col col-1 offset-sm-8">
					<button class="btn waves-effect waves-light light-blue darken-4" onclick="popItUp('add')" style="margin-top: 20px;">
						<i class="material-icons right">add</i>
					</button>
				</div>
			</div>
			<div class="row">
				<div class="popup Nshows" id="add" onclick="popItUp('add')">
				</div>
				<div class="col col-sm-5 offset-sm-2 myPopup Nshows add" id="add">
					<h3>add peroon</h3>
					<br>
					<form action="<?php echo URL . 'abactis\addPersoon\\'; ?>" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-sm-6 offset-sm-2">
								<input id="voornaam" name="voornaam" type="text" class="validate" placeholder="voornaam">
								<input id="naam" name="naam" type="text" class="validate" placeholder="naam">
								<input id="email" name="email" type="text" class="validate" placeholder="email">
						    </div>
							<div class="col col-sm-4">
								<label for="voornaam">Voornaam *</label>
								<label for="naam">Naam *</label>
								<label for="email">Email</label>
							</div>
						</div>
						<div class="input-field col xol-sm-12">
						<p>* Required</p>
							<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">
								<i class="material-icons right">send</i>
							</button>
						</div>
					</form>
				</div>
				<div class="popup Nshows" id="edit" onclick="popItUp('edit')">
				</div>
				<div class="col  col-sm-10 offset-sm-1 col-md-6 offset-md-3 Nshows myPopup edit" id="edit">
					<h3>Edit persoon</h3>
					<br>
					<form class="link edit" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-sm-6 offset-sm-1 col-md-4 offset-md-3">
								<input id="voornaam" name="voornaam" type="text" class="validate link edit" value="">
								<input id="naam" name="naam" type="text" class="validate link edit" value="">
								<input id="email" name="email" type="text" class="validate link edit" value="">
						    </div>
							<div class="col col-sm-4 col-md-4">
								<label for="voornaam">Voornaam *</label>
								<label for="naam">Naam *</label>
								<label for="email">Email</label>
							</div>
						</div>
						<div class="input-field col col-sm-12">
						<p>* Required</p>
							<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">
								<i class="material-icons right">update</i>
							</button>
						</div>
					</form>
				</div>
				<div class="popup Nshows" id="remove" onclick="popItUp('remove')">
				</div>
				<div class="col  col-sm-10 offset-sm-1 col-md-6 offset-md-3 Nshows myPopup remove" id="remove">
					<h3>Remove persoon?</h3>
					<br>
					<form class="link remove" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-sm-4 offset-sm-4 remove">
								<p>remove </p><p class="link remove"></p>
							</div>
							<div class="col col-sm-4 offset-sm-4">
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
					<h1>alle personen</h1>
					<table>
						<?php foreach($personen as $persoon ){
							echo "<tr id='peter". $persoon->id ."'>" ;
							echo "	<td>" . $persoon->id . "</td>";
							echo "	<td>" . $persoon->voornaam . "</td>";
							echo "	<td>" . $persoon->achternaam . "</td>";
							echo "	<td class='hide'>" . $persoon->email . "</td>";
							// echo "	<td><a href='" . URL . "abactis\deletePersoon\\" . $persoon->id . "'><img class='icon' src='" . URL . "img/svg/bin.svg' /></a></td>";
							echo "	<td><img onclick='fill(" . '"' . "remove" . '",' . $persoon->id .")'  src='" . URL . "img/svg/bin.svg' /></a></td>";
							echo "	<td><img onclick='fill(" . '"' . "edit" . '",' . $persoon->id .")'  src='" . URL . "img/svg/gear.svg' /></a></td>";
							echo "</tr>" ;
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
