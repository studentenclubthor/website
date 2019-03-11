<div class="container">
	<div class="row">
		<div class="col col-md-12 text-center">
			<div class="row">
				<div class="recuringTable col col-md-8 offset-md-2">
					<h1>Stemmen door <?php echo $this->model->getPersCookie()['0']->voornaam ; ?> </h1>
					<table>
						<tr>
							<th>Voornaam</th>
							<th>Naam</th>
							<th>titel</th>
							<th>Boltz</th>
							<th>keuze</th>
							<th>totaal</th>
						</tr>
						<?php 
							foreach($stemmen as $stem){
							echo "<tr id='stemming" . $stem->id ."'>" ;
							echo "	<td>" . $stem->voornaam . "</td>";
							echo "	<td>" . $stem->achternaam . "</td>";
							echo "	<td>" . $stem->doel . "</td>";
							echo "	<td>" . $stem->boltz . "</td>";
							echo "	<td>" . $stem->keuze . "</td>";
							echo "	<td>" . $stem->totaal . "</td>";
							echo "	<td class='icon'><img class='icon' onclick='fill(" . '"' . "approve" . '",' . $stem->id . ")'src='" . URL . "img/svg/vote.png' /></a></td>";
							echo "</tr>" ;
						}
						?>
					</table>
				</div>
			</div>
		<div>
	</div>
</div>
 