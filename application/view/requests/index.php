<div class="container">
	<div class="row">
		<div class="col col-md-12 text-center">
			<div class="row">
				<div class="popup Nshows" id="remove" onclick="popItUp('remove')">
				</div>
				<div class="col  col-xs-10 offset-sm-1 col-md-6 offset-md-3 Nshows myPopup remove" id="remove">
					<h3>Approve request ?</h3>
					<br>
					<form class="link remove" action="" method="post" class="col-s12">
						<div class="input-field row">
							<div class="col col-xs-4 offset-sm-4 remove">
								<p>Accept </p><p class="link remove"></p>
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
					<h1>alle requests</h1>
					<table>
						<tr>
							<th>Voornaam</th>
							<th>Naam</th>
						</tr>
						<?php foreach($requests as $request ){
							echo "<tr id='request" . $request->id ."'>" ;
							echo "	<td>" . $request->voornaam . "</td>";
							echo "	<td>" . $request->achternaam . "</td>";
							echo "	<td class='icon'><img class='icon' onclick='fill(" . '"' . "remove" . '",' . $request->id .")'src='" . URL . "img/svg/bin.svg' /></a></td>";
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
		links[0].action = ('<?PHP echo URL ; ?>' + '\\requests\\editRequest\\' + id + '\\1');
		var info = document.getElementById(("request" + id));
		links[1].value = (info.cells[0].innerHTML + " " +info.cells[1].innerHTML);
	}
	else if(name == "remove"){
		links[0].action = ('<?PHP echo URL ; ?>' + '\\requests\\editRequest\\' + id + '\\1');
		var info = document.getElementById(("request" + id));
		links[1].innerHTML = (info.cells[0].innerHTML + " " +info.cells[1].innerHTML);
	}
	popItUp(name);
}
</script>
<script type="text/javascript" src="<?php echo URL; ?>js/jquery-1.12.4.min.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>js/popItUp.js"></script>
