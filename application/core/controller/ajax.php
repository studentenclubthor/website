<?php

class Ajax extends Controller
{
	public function loadModel(){
        require APP . 'model/ajax_model.php';
        // create new "model" (and pass the database connection)
        $this->model = new Ajax_model($this->db);
    }
	
	public function praesidiumLayout($praesidia){
		$x = 0;
		$result = "";
		$years = array_count_values(array_column($praesidia,"verkregen"));
		foreach($years as $year => $yearCount ){
			$result = $result . "<div class='row text-center'>";
			$result = $result . "<h1 class='font-bold light-blue-text my-3 col-12'>" . $year . "-" . ($year + 1) . "</h1>";
			for($i = 1; $i <= $yearCount; $i++){
				$p = $praesidia[$x + $i -1];
				$result = $result . "<div class='col-lg-2";
				if($i == 1){
					$result = $result . " offset-lg-" . (6 - ceil($yearCount / ceil($yearCount / 5)));
					if($yearCount == 4){
						$result = $result . " offset-2";
					}
				}
				elseif($yearCount == 4){
					if($i == 3){
						$result = $result . " offset-2 offset-lg-0";
					}
				}
				elseif($yearCount == 5){
					if($i == 4){
						$result = $result . " offset-2 offset-lg-0";
					}
				}
				elseif($yearCount == 7){
					if($i == 5){
						$result = $result . " offset-0 offset-lg-3";
					}
					if($i == 4 or $i == 6){
						$result = $result . " offset-2 offset-lg-0";
					}
				}
				elseif($yearCount == 6){
					if($i == 4){
						$result = $result . " offset-0 offset-lg-3";
					}
				}
				elseif($yearCount == 9){
					if($i == 6){
						$result = $result . " offset-0 offset-lg-2";
					}
				}
				$result = $result . " col-4'>";
					$result = $result . "<img class='profile' src='". URL . "img/personen/" . $p->voornaam . "_" . $p->achternaam . ".jpg' />";
					$result = $result . "<h4>" . $p->cleanName . "</h4>";
					$result = $result . "<div class='heading-line'></div>";
					$result = $result . "<p>" . $p->voornaam . " " . $p->achternaam . "</p>";
				$result = $result . "</div>";
			
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
			$result = $result . "</div>";
			$x = $x + $i -1;
		}
		return $result;
	}
	
	public function praesidia(){
		return ($this->model->select("SELECT verkregen,voornaam,achternaam,naam,cleanName
				FROM thor.houderschap h 
				inner join persoon p on h.idpersoon = p.id
				inner join titel t on h.idtitel = t.id
				where t.functie = 1
				order by verkregen desc,rang
				LIMIT 2"));
	}
	
	public function praesidiaTop($quantity,$offset){
		$parameters = array(':quantity' => (int)$quantity,':offset' => (int)$offset);
		//print_r($parameters);
		$result = ($this->model->selectParam("SELECT h.verkregen,voornaam,achternaam,naam,cleanName
				FROM thor.houderschap h 
				join persoon p on h.idpersoon = p.id
				join titel t on h.idtitel = t.id
                join (SELECT verkregen
								FROM thor.houderschap h 
								inner join titel t on h.idtitel = t.id
								WHERE t.functie = 1
								GROUP BY verkregen
								ORDER BY verkregen DESC
                                LIMIT :quantity offset :offset) A on A.verkregen = h.verkregen
				WHERE functie = 1
				order by h.verkregen desc, rang",$parameters));
		//print_r($result);
		$result = $this->praesidiumLayout($result);
		echo $result;
	}
	
}
