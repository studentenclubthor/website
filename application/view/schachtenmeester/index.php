<div class="container">
	<div class="row">
		<div class="col col-md-12 text-center">
			<div class="row">
				<div class="popup Nshows" id="edit" onclick="popItUp('edit')">
				</div>
				<div class="col  col-xs-10 offset-xs-1 col-md-6 offset-md-3 Nshows myPopup edit" id="edit">
					<h3>Edit persoon</h3>
					<br>
					<form class="link edit" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-xs-1 col-md-4 offset-md-3">
								<input id="voornaam" name="voornaam" type="text" class="validate link edit" value="">
								<input id="naam" name="naam" type="text" class="validate link edit" value="">
								<input id="email" name="email" type="text" class="validate link edit" value="">
						    </div>
							<div class="col col-xs-4 col-md-4">
								<label for="voornaam">Voornaam *</label>
								<label for="naam">Naam *</label>
								<label for="email">Email</label>
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
			</div>
			<div class="row">
				<div class="recuringTable col col-md-8 offset-md-2">
					<h1>alle schachten</h1>
					<table>
						<?php foreach($schachten as $schacht ){
							echo "<tr id='schacht". $schacht->id ."'>" ;
							echo "	<td>" . $schacht->voornaam . "</td>";
							echo "	<td>" . $schacht->achternaam . "</td>";
							echo "	<td>" . $schacht->naam . "</td>";
							echo "	<td><img onclick='fill(" . '"' . "edit" . '",' . $schacht->id .")'  src='" . URL . "img/svg/gear.svg' /></a></td>";
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
