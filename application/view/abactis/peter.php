<div class="container">
	<div class="row">
		<div class="col col-md-12 text-center">
			<div class="row">
				<div class ="col col-1 offset-sm-8">
					<button class="btn waves-effect waves-light light-blue darken-4" onclick="popItUp('add')" style="margin-top: 20px;">
						<i class="material-icons right">link</i>
					</button>
				</div>
			</div>
			<div class="row">
				<div class="popup Nshows" id="add" onclick="popItUp('add')">
				</div>
				<div class="col  col-xs-10 offset-sm-1 col-md-6 offset-md-3 Nshows myPopup add" id="add">
					<h3>Link peter / meter</h3>
					<br>
					<form action="<?php echo URL . 'abactis\addPeter'; ?>" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-sm-1 col-md-4 offset-md-3">
								<input class="autocomplete" id="persoon" name="peter" type="text" placeholder="Peter/Meter" >
								<input class="autocomplete" id="persoon" name="kind" type="text" placeholder="-Kind">
								</div>
							<div class="col col-xs-4 col-md-4">
								<label for="voornaam">Peter / Meter *</label>
								<label for="naam">Kind *</label>
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
					<h3>Edit peter / meter</h3>
					<br>
					<form class="link edit" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-sm-1 col-md-4 offset-md-3">
								<input class="autocomplete link edit" id="persoon" name="peter" type="text" value="" >
								<input class="autocomplete link edit" id="persoon" name="kind" type="text" value="">
								</div>
							<div class="col col-xs-4 col-md-4">
								<label for="peter">Peter / Meter *</label>
								<label for="kind">Kind *</label>
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
				<div class="col  col-xs-10 offset-sm-1 col-md-6 offset-md-3 Nshows myPopup remove" id="remove">
					<h3>Remove peter / meter ?</h3>
					<br>
					<form class="link remove" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-4 offset-sm-4 remove">
								<p>remove </p><p class="link remove"></p><p> peter van </p><p class="link remove"></p>
							</div>
							<div class="col col-xs-4 offset-sm-4">
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
					<h1>alle peter - meters</h1>
					<table>
						<tr>
							<th>Peter / Meter</th>
							<th></th>
							<th>Pete - Metekind</th>
						</tr>
						<?php foreach($peters as $peter ){
							echo "<tr id='peter" . $peter->id ."'>" ;
							echo "	<td>" . $peter->voornaam . "</td>";
							echo "	<td>" . $peter->achternaam . "</td>";
							echo "	<td>" . $peter->kind . "</td>";
							echo "	<td>" . $peter->kindNaam . "</td>";
							// echo "	<td><a href='" . URL . "abactis\deletePeter\\" . $peter->id . "'><img class='icon' src='" . URL . "img/svg/bin.svg' /></a></td>";
							echo "	<td class='icon'><img class='icon' onclick='fill(" . '"' . "remove" . '",' . $peter->id .")'src='" . URL . "img/svg/bin.svg' /></a></td>";
							echo "	<td class='icon'><img class='icon' onclick='fill(" . '"' . "edit" . '",' . $peter->id .")' src='" . URL . "img/svg/gear.svg' /></td>";
							echo "</tr>" ;
						}
						?>
					</table>
				</div>
			</div>
		<div>
	</div>
</div>
<script>
function fill(name,id){
	var links = document.querySelectorAll(".link" + ("."+name));
	if(name == "edit"){
		links[0].action = ('<?PHP echo URL ; ?>' + 'abactis\\editPeter\\' + id);
		var info = document.getElementById(("peter" + id));
		links[1].value = (info.cells[0].innerHTML + " " +info.cells[1].innerHTML);
		links[2].value = (info.cells[2].innerHTML + " " + info.cells[3].innerHTML);
	}
	else if(name == "remove"){
		links[0].action = ('<?PHP echo URL ; ?>' + 'abactis\\deletePeter\\' + id);
		var info = document.getElementById(("peter" + id));
		links[1].innerHTML = (info.cells[0].innerHTML + " " +info.cells[1].innerHTML);
		links[2].innerHTML = (info.cells[2].innerHTML + " " + info.cells[3].innerHTML);
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
</script>
 
 