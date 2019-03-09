<div class="container">
	<div class="row">
		<div class="col col-md-12 text-center">
			<div class="row">
				<div class ="col col-1 offset-sm-8">
					<button class="btn waves-effect waves-light light-blue darken-4" onclick="popItUp('link')" style="margin-top: 20px;">
						<i class="material-icons right">link</i>
					</button>
					<button class="btn waves-effect waves-light light-blue darken-4" onclick="popItUp('add')" style="margin-top: 20px;">
						<i class="material-icons right">add</i>
					</button>
					<button class="btn waves-effect waves-light light-blue darken-4" onclick="popItUp('editTitel')" style="margin-top: 20px;">
						<i class="material-icons right">edit</i>
					</button>
				</div>
			</div>
			
			<div class="row">
				<div class="popup Nshows" id="link" onclick="popItUp('link')">
				</div>
				<div class="col  col-xs-10 offset-sm-1 col-md-7 offset-md-1 Nshows myPopup link" id="link">
					<h3>Link houder</h3>
					<br>
					<form action="<?php echo URL . 'abactis\addHouder'; ?>" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-sm-1 col-md-4 offset-md-3">
								<input class="autocomplete" id="persoon" name="houder" type="text" placeholder="houder" >
								<input class="autocomplete" id="titel" name="titel" type="text" placeholder="titel">
								<input name="jaar" type="text" placeholder="jaar" value="<?php echo date("Y"); ?>">
								</div>
							<div class="col col-xs-4 col-md-4">
								<label for="houder">Houder *</label>
								<label for="titel">Titel *</label>
								<label for="jaar">Jaar *</label>
							</div>
						</div>
						<div class="input-field col col-xs-12">
						<p>* Required</p>
							<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">
								<i class="material-icons right">send</i>
							</button>
						</div>
					</form>
				</div>
				<div class="popup Nshows" id="add" onclick="popItUp('add')">
				</div>
				<div class="col  col-xs-10 offset-sm-1 col-md-6 offset-md-3 Nshows myPopup add" id="add">
					<h3>Add titel</h3>
					<br>
					<form action="<?php echo URL . 'abactis\addTitel'; ?>" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-sm-1 col-md-4 offset-md-3">
								<input class="autocomplete" name="naam" type="text" placeholder="naam" >
								</div>
							<div class="col col-xs-4 col-md-4">
								<label for="naam">naam *</label>
							</div>
						</div>
						<div class="input-field col col-xs-12">
						<p>* Required</p>
							<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">
								<i class="material-icons right">send</i>
							</button>
						</div>
					</form>
				</div>
				<div class="popup Nshows" id="editTitel" onclick="popItUp('editTitel')">
				</div>
				<div class="col  col-xs-10 offset-sm-1 col-md-6 offset-md-3 Nshows myPopup editTitel" id="editTitel">
					<h3>Edit titel</h3>
					<br>
					<form action="<?php echo URL . 'abactis\editTitel'; ?>" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-sm-1 col-md-4 offset-md-3">
								<input class="autocomplete" id="titel" name="naam" type="text" placeholder="naam" >
								</div>
							<div class="col col-xs-4 col-md-4">
								<label for="naam">naam *</label>
							</div>
						</div>
						<div class="input-field col col-xs-12">
						<p>* Required</p>
							<button class="btn waves-effect waves-light light-blue darken-4" type="submit" style="margin-top: 20px;">
								<i class="material-icons right">send</i>
							</button>
						</div>
					</form>
				</div>
				<div class="popup Nshows" id="edit" onclick="popItUp('edit')">
				</div>
				<div class="col  col-xs-10 offset-sm-1 col-md-6 offset-md-3 Nshows myPopup edit" id="edit">
					<h3>Edit Houder</h3>
					<br>
					<form class="link edit" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-sm-1 col-md-4 offset-md-3">
								<input class="autocomplete link edit" id="persoon" name="houder" type="text" placeholder="houder" >
								<input class="autocomplete link edit" id="titel" name="titel" type="text" placeholder="titel">
								<input class="link edit" name="jaar" type="text" placeholder="jaar">
								<input class="link edit" name="uitgedaan" type="checkbox" placeholder="uitgedaan">
								</div>
							<div class="col col-xs-4 col-md-4">
								<label for="houder">Houder *</label>
								<label for="titel">Titel *</label>
								<label for="jaar">Jaar *</label>
								<label for="jaar">Uitgedaan *</label>
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
				<div class="col col-xs-10 offset-sm-1 col-md-6 offset-md-2 Nshows myPopup remove" id="remove">
					<h3>Remove titel ?</h3>
					<br>
					<form class="link remove" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-sm-3 remove">
								<p>remove </p><p class="link remove"></p><p> van </p><p class="link remove"></p>
							</div>
							<div class="col col-xs-4 offset-sm-4">
								<button class="btn waves-effect waves-light light-blue darken-4" style="margin-top: 20px;">
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
					<h1>alle titel houders</h1>
					<table>
						<?php foreach($houders as $houder ){
							echo "<tr id='" . $houder->id ."'>" ;
							echo "	<td>" . $houder->voornaam . "</td>";
							echo "	<td>" . $houder->achternaam . "</td>";
							echo "	<td>" . $houder->naam . "</td>";
							echo "	<td>" . $houder->verkregen . " - ". ($houder->verkregen +1) ."</td>";
							echo "	<td>" . $houder->uitgedaan ."</td>";
							echo "	<td class='icon'><img class='icon' onclick='fill(" . '"' . "remove" . '",' . $houder->id .")'src='" . URL . "img/svg/bin.svg' /></a></td>";
							echo "	<td class='icon'><img class='icon' onclick='fill(" . '"' . "edit" . '",' . $houder->id .")' src='" . URL . "img/svg/gear.svg' /></td>";
							echo "</tr>" ;
						}
						?>
					</table>
				</div>
			</div>
		<div>
	</div>
</div>
<script>titel
function fill(name,id){
	var links = document.querySelectorAll(".link" + ("."+name));
	if(name == "edit"){
		links[0].action = ('<?PHP echo URL ; ?>\' + 'abactis\\editHouder\\' + id);
		var info = document.getElementById(id);
		
		console.log(links);
		console.log(info.cells);
		links[1].value = (info.cells[0].innerHTML + " " +info.cells[1].innerHTML);
		links[2].value = (info.cells[2].innerHTML);
		links[3].value = (info.cells[3].innerHTML).substr(0,4);
		if((info.cells[4].innerHTML) == 1){
			links[4].checked = true;
		}
		else{
			links[4].checked = false;
		}
	}
	else if(name == "remove"){
		links[0].action = ('<?PHP echo URL ; ?>\' + 'abactis\\deleteHouder\\' + id);
		var info = document.getElementById(id);
		links[1].innerHTML = (info.cells[2].innerHTML);
		links[2].innerHTML = (info.cells[0].innerHTML + " " +info.cells[1].innerHTML);
	}
	popItUp(name);
}
</script>
<script type="text/javascript" src="<?php echo URL; ?>js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>js/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>js/autocomplete.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>js/popItUp.js"></script>
<script>
	var search = [];
	var searches = [];
	var searcher = [
	<?php foreach($personen as $persoon){
		echo '{ "value": "'. $persoon->voornaam ." ". $persoon->achternaam .'" },';
	}
	?>
	];
	searches['persoon'] = searcher;
	var searcher = [
	<?php foreach($titels as $titel){
		echo '{ "value": "'. $titel->naam .'"},';
	}
	?>
	];
	searches['titel'] = searcher;
</script>
 
 