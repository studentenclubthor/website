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
				<div class="col  col-sm-10 offset-sm-1 col-md-6 offset-md-3 Nshows myPopup add" id="add">
					<h3>Add Stemming</h3>
					<br>
					<form action="<?php echo URL . 'stem\addStemming'; ?>" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-6 offset-sm-1 col-md-4 offset-md-3">
								<input class="autocomplete" id="persoon" name="persoon" type="text" placeholder="Persoon" >
								<input class="autocomplete" id="titel" name="titel" type="text" placeholder="titel" >
								<input name="start" type="text" value="<?php echo date("Y-m-d H:i:s"); ?>" >
								<input name="eind" type="text" value="<?php echo date("Y-m-d H:i:s"); ?>" >
								</div>
							<div class="col col-xs-4 col-md-4">
								<label for="voornaam">Persoon</label>
								<label for="naam">Titel</label>
								<label for="naam">start</label>
								<label for="naam">eind</label>
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
				<div class="popup Nshows" id="approve" onclick="popItUp('approve')">
				</div>
				<div class="col  col-xs-10 offset-sm-1 col-md-6 offset-md-3 Nshows myPopup approve" id="approve">
					<h3>Approve request ?</h3>
					<br>
					<form class="link approve" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-4 offset-sm-4 approve">
								<p>Accept </p><p class="link approve"></p>
							</div>
							<div class="col col-xs-4 offset-sm-4">
								<button class="btn waves-effect waves-light light-blue darken-4 link approve" style="margin-top: 20px;">
									<i class="material-icons right">yes</i>
								</button>
								<button type="button" class="btn waves-effect waves-light light-blue darken-4" onclick="popItUp('approve')" style="margin-top: 20px;">
									<i class="material-icons right">no</i>
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
			<div class="row">
				<div class="recuringTable col col-md-8 offset-md-2">
					<h1>jou open stemmen</h1>
					<table>
						<tr>
							<th>Voornaam</th>
							<th>Naam</th>
							<th>titel</th>
						</tr>
						<?php 
							// var_dump($stemmingen);
							// exit;
							foreach($stemmingen as $stemming ){
							echo "<tr id='stemming" . $stemming->id ."'>" ;
							echo "	<td>" . $stemming->voornaam . "</td>";
							echo "	<td>" . $stemming->achternaam . "</td>";
							echo "	<td>" . $stemming->doel . "</td>";
							echo "	<td class='icon'><img class='icon' onclick='fill(" . '"' . "approve" . '",' . $stemming->id . ")'src='" . URL . "img/svg/bin.svg' /></a></td>";
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
	if(name == "approve"){
		links[0].action = ('<?PHP echo URL ; ?>' + '\\stem\\addStem\\' + id + '\\1');
		var info = document.getElementById(("stemming" + id));
		links[1].value = (info.cells[0].innerHTML + " " +info.cells[1].innerHTML);
	}
	popItUp(name);
}
</script>
<script type="text/javascript" src="<?php echo URL; ?>js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>js/popItUp.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>js/jquery.autocomplete.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>js/autocomplete.js"></script>
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
	searcher = [
	<?php foreach($titels as $titel){
		echo '{ "value": "'. $titel->naam .'" },';
	}
	?>
	];
	searches['titel'] = searcher;
</script>
 