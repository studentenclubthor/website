<?php

class Model
{
    /**
     * @param object $db A PDO database connection
     */
    function __construct($db){
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
	
	public function checkSession($cookie){
		if(isset($cookie)){
			$query = $this->db->prepare("select * from sessie WHERE cookie = '$cookie' ");
			$query->execute();
			$result = $query->fetchAll();
			if($result){
				$result = $result[0];
				if($result->cookie != $cookie){
					unset($_COOKIE['thorsessionid']);
					$result = $null;
				}
			}
			else{
				unset($_COOKIE['thorsessionid']);
			}
		}
		return $result;
	}
	
	public function login($email, $password, $remember){
		$sessionid = substr(md5(microtime()),rand(0,26),15);
		$query = $this->db->prepare("select * from persoon WHERE email='$email' && paswoord='$password'");
        $query->execute();
		$result = $query->fetchAll();
		if($result){
			if($result['0']->confirmed == '1'){
				session_start();
				$result = $result[0];
				// $data = array('sessionid' => $sessionid, 'user_id' => $result->id, 'device' => $_SERVER['HTTP_USER_AGENT'], 'ip' => $_SERVER['REMOTE_ADDR']);
				$_SESSION["DBSesionId"] = $sessionid;
				if(true/*$remember == "0"*/) {
					$cookie_name = "thorsessionid";
					$cookie_value = $sessionid;
					$device = $_SERVER['HTTP_USER_AGENT'];
					$ip = $_SERVER['REMOTE_ADDR'];
					setcookie($cookie_name, $cookie_value, time() + (7*24*60*60), "/");
					$device = $_SERVER['HTTP_USER_AGENT'];
					$ip = $_SERVER['REMOTE_ADDR'];
					$query = $this->db->prepare('INSERT INTO `sessie` (`cookie`, `idPersoon`, `device`, `ip`) VALUES (:cookie, :id, :device, :ip) ON DUPLICATE KEY UPDATE `cookie` = :cookie, `device` = :device, `ip` = :ip');
					$parameters = array(':cookie' => $cookie_value, ':id' => $result->id, ':device' => $device, ':ip' => $ip);
					$query->execute($parameters);
					var_dump($parameters);
					var_dump($query);
					$result = $query->fetchAll();
				}
			}
			return $result;
		}
	}
	
	public function getSession($cookie){
		$sql = "SELECT * FROM sessie where cookie = ".'"' . $cookie .'"';
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function getPersSess(){
		if($_SESSION){
			$ses = $this->getSession($_SESSION['DBSesionId']);
			return $this->getPersById($ses['0']->idPersoon);
		}
		else{ return false;}
	}
	
	public function getPersCookie(){
		$ses = $this->getSession($_COOKIE['thorsessionid']);
		if($ses){
			return $this->getPersById($ses['0']->idPersoon);
		}
		else{ return false;}
	}
	
	
	//persoon
	
	public function IsPraesidium(){
		$return = false;
		if(isset($_COOKIE['thorsessionid'])){
			$id = $this->getPersCookie();
			$praesidia = $this->getCurrentPraesidia();
			if($id && $praesidia){
				if($praesidia['0']->id == $id['0']->id){
					$return = true;
				}
			}
			else{
				return false;
			}
		}
		return $return;
	}
	
	public function getPersoon($name){
		$sql = "SELECT * FROM Persoon where CONCAT(voornaam , ' ', achternaam) = ".'"' . $name .'"';
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function getPersById($id){
		$sql = "SELECT * FROM Persoon where id = ". $id;
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	
	public function getPersonen(){
		$sql = "SELECT id,voornaam,achternaam,email FROM persoon";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}	
	
	public function addPersoon($voornaam,$naam,$email){
		$sql = "INSERT INTO Persoon (voornaam,achternaam,email) VALUES (:voornaam, :naam, :email)";
        $query = $this->db->prepare($sql);
        $parameters = array(':voornaam' => $voornaam, ':naam' => $naam, ':email' => $email);
		$query->execute($parameters);
	}	
	
	public function editPersoon($id,$voornaam,$naam,$email,$password,$confirmed){
		$sql = "UPDATE persoon SET voornaam = :voornaam, achternaam = :naam, email = :email, paswoord = :password, confirmed = :confirmed WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':voornaam' => $voornaam, ':naam' => $naam ,':email' => $email ,':id' => $id, ':password' => $password, ':confirmed' => $confirmed);
		var_dump($query->execute($parameters));
	}
	
	public function deletePersoon($id){
		$sql = "DELETE FROM persoon WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
	}
	
	public function editRequest($id,$confirmed){
		$sql = "UPDATE persoon SET  confirmed = :confirmed WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id, ':confirmed' => $confirmed);
		var_dump($query->execute($parameters));
	}
	
	//peter
	public function getPeters(){
		$sql = "SELECT pet.id, p.voornaam,p.achternaam,k.voornaam as kind ,k.achternaam as kindNaam
				FROM persoon p join peter pet join persoon k
				where p.id = pet.idpeter and k.id = pet.idKind";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function addPeter($peter,$kind){
		$idPeter = $this->getPersoon($peter);
		$idKind = $this->getPersoon($kind);
		$sql = "INSERT INTO Peter (idPeter,idKind) VALUES (:idPeter,:idKind)";
		$query = $this->db->prepare($sql);
        $parameters = array(":idPeter" => $idPeter[0]->id, ":idKind" => $idKind[0]->id);
		$query->execute($parameters);
	}
	
	public function deletePeter($id){
        $sql = "DELETE FROM peter WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
	}
	
	public function editPeter($id,$peter,$kind){
		$peter = $this->getPersoon($peter);
		$kind = $this->getPersoon($kind);
		$sql = "UPDATE peter SET idPeter = :peter, idKind = :kind WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':peter' => $peter[0]->id, ':kind' => $kind[0]->id,':id' => $id);
		$query->execute($parameters);
	}
	
	
	//aanwezig
	public function getAanwezigheden(){
		$sql = "SELECT * from aanwezigheid";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	//event
	public function getEvents(){
		$sql = "SELECT * FROM event";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}	
	
	public function addEvent($naam,$locatie,$start,$eind,$banner,$tekst){
		$sql = "INSERT INTO Event (naam,locatie,start,eind,banner,tekst) VALUES (:naam,:locatie,:start,:eind,:banner,:tekst)";
		$query = $this->db->prepare($sql);
        $parameters = array(":naam" => $naam,  ":locatie" => $locatie, ":start" => $start, ":eind" => $eind, ":banner" => $banner, ":tekst" => $tekst);
		$query->execute($parameters);
	}
	
	public function deleteEvent($id){
        $sql = "DELETE FROM event WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
	}
	
	public function editEvent($id,$naam,$locatie,$start,$eind,$banner,$tekst){
		$sql = "UPDATE Event SET naam = :naam, locatie = :locatie, start =:start, eind = :eind, banner = :banner, tekst = :tekst WHERE id = :id";
		$query = $this->db->prepare($sql);
        $parameters = array(":id" => $id, ":naam" => $naam,  ":locatie" => $locatie, ":start" => $start, ":eind" => $eind, ":banner" => $banner, ":tekst" => $tekst);
		$query->execute($parameters);
	}
	
	
	//titel
	public function addTitel($naam){
		$sql = "INSERT INTO Titel (naam) VALUES (:naam)";
		$query = $this->db->prepare($sql);
        $parameters = array(":naam" => $naam);
		$query->execute($parameters);
	}
	
	public function getTitel($naam){
		$sql = "SELECT * FROM titel Where naam = :naam";
		$query = $this->db->prepare($sql);
        $parameters = array(":naam" => $naam);
		$query->execute($parameters);
		return $query->fetchAll();
	}
	
	public function getTitels(){
		$sql = "SELECT * FROM titel";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function deleteTitel($id){
        $sql = "DELETE FROM Titel WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
	}
	
	public function editTitel($id,$naam){
		$sql = "UPDATE Event SET naam = :naam WHERE id = :id";
		$query = $this->db->prepare($sql);
        $parameters = array(":id" => $id, ":naam" => $naam);
		$query->execute($parameters);
	}
	
	//houderschap
	public function getHouders(){
		$sql = "SELECT th.id,th.verkregen,th.uitgedaan,p.voornaam,p.achternaam,t.naam FROM houderschap th join persoon p join titel t
				WHERE th.idpersoon = p.id and th.idtitel = t.id
				ORDER BY th.verkregen DESC, rang DESC";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function addHouder($houder,$titel,$jaar){
		$persoon = $this->getPersoon($houder);
		$titelid = $this->getTitel($titel);
		$sql = "INSERT INTO Houderschap (idPersoon,idTitel,verkregen) VALUES (:id,:idtitel,:jaar)";
		$query = $this->db->prepare($sql);
        $parameters = array(":id" => $persoon[0]->id,":idtitel" => $titelid[0]->id, ":jaar" => $jaar);
		$query->execute($parameters);
	}
	
	public function deleteHouder($id){
        $sql = "DELETE FROM houderschap WHERE id = :id";
        $query = $this->db->prepare($sql);
        $parameters = array(':id' => $id);
        $query->execute($parameters);
	}
	
	public function editHouder($id,$houder,$titel,$jaar,$uitgedaan){
		$houder = $this->getPersoon($houder);
		$titel = $this->getTitel($titel);
		if($uitgedaan == "on"){
			$uitgedaan = 1;
		}
		else{
			$uitgedaan = 0;
		}
		$sql = "UPDATE houderschap SET idPersoon = :houder, idtitel = :titel, verkregen = :jaar, uitgedaan = :uitgedaan WHERE id = :id";
		$query = $this->db->prepare($sql);
        $parameters = array(":id" => $id, ":houder" => $houder[0]->id, ":titel" => $titel[0]->id, ":jaar" => $jaar, ":uitgedaan" => $uitgedaan);
		$query->execute($parameters);
	}
	
	//schachten
	public function getSchachten(){
		$sql = "SELECT h.*,t.*,p.voornaam,p.achternaam
FROM houderschap h inner join titel t on h.idtitel = t.id inner join persoon p on h.idpersoon = p.id
inner join
	(SELECT idpersoon,min(rang) as r
	FROM houderschap h inner join titel t on h.idtitel = t.id
	group by idpersoon) as i on i.idpersoon = h.idpersoon and i.r = t.rang
where uitgedaan = 1
AND t.naam IN ('Preut','Schacht')
order by rang, verkregen DESC"
				
				/* old query "SELECT th.id,th.verkregen,th.uitgedaan,p.voornaam,p.achternaam,t.naam 
				FROM houderschap th join persoon p join titel t
				WHERE th.idpersoon = p.id and th.idtitel = t.id
				AND th.id IN (SELECT MAX(verkregen)
					FROM houderschap
					GROUP BY idpersoon)
				AND uitgedaan = 1
				AND t.naam IN ('Preut','Schacht')
				GROUP BY th.idpersoon
				ORDER BY th.verkregen DESC, th.id"*/;
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	//praesidium
	public function getPraesidia(){
		$sql = "SELECT verkregen,voornaam,achternaam,naam,cleanName
				FROM houderschap h 
				inner join persoon p on h.idpersoon = p.id
				inner join titel t on h.idtitel = t.id
				where t.functie = 1
				order by verkregen desc,rang";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function getCurrentPraesidia(){
		$sql = "SELECT p.id,verkregen,voornaam,achternaam,naam,cleanName
				FROM houderschap h 
				inner join persoon p on h.idpersoon = p.id
				inner join titel t on h.idtitel = t.id
				WHERE t.functie = 1
				AND verkregen = (SELECT max(verkregen)
								FROM houderschap h 
								inner join titel t on h.idtitel = t.id
								WHERE t.functie = 1
								GROUP BY t.functie)
				order by verkregen desc,rang";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	public function getRequests(){
		$sql = "select * from Persoon where confirmed = 0 and paswoord is not null";
		$query = $this->db->prepare($sql);
		$query->execute();
		return $query->fetchAll();
	}
	
	//stem
	
	public function addStem($stemming,$keuze){
		$boltz = 1 ; //return boltz
		$persoon = $this->getPersSess()['0']->id;
		$sql = "INSERT INTO stem (idstemming,idpersoon,keuze,boltz) VALUES (:stemming,:persoon,:keuze,:boltz)";
        $query = $this->db->prepare($sql);
        $parameters = array(':stemming' => $stemming, ':persoon' => $persoon, ':keuze' => $keuze, ':boltz' => $boltz);
        $query->execute($parameters);
	}
	
	public function getOpenStem(){
		if($id = $this->getPersSess()){
			$id = $id['0']->id;
			$sql = "select st.id,doel,voornaam,achternaam
	from stemming st left join persoon p on st.idpersoon = p.id
	where st.id not in (select st.id from stem s left join stemming st on s.idstemming = st.id
						where s.idpersoon = :id)
	and eind > now()";
			$query = $this->db->prepare($sql);
			$parameters = array(':id' => $id,);
			$query->execute($parameters);
			return $query->fetchAll();
		}
		else{ return false;}
	}
	
	public function getMyStem(){
		$id = $this->getPersSess()['0']->id;
		$sql = "SELECT *
FROM stem s left join stemming st on s.idstemming = st.id
left join persoon p on p.id = st.idpersoon
left join (select idstemming,sum(boltz) as totaal
		from stem
		group by idstemming) tot on st.id = tot.idstemming
where s.idpersoon = :id";
		$query = $this->db->prepare($sql);
        $parameters = array(':id' => $id,);
        $query->execute($parameters);
		return $query->fetchAll();
	}
	
	public function editStem(){
		
	}
	
	
	//stemming
	
	public function addStemming($idpers,$doel,$start,$eind){
		$sql = "INSERT INTO stemming (idpersoon,doel, start, eind) VALUES (:idpers, :doel, :start, :eind)";
        $query = $this->db->prepare($sql);
        $parameters = array(':idpers'=> $idpers, ':doel' => $doel, ':start' => $start, ':eind' => $eind);
        $query->execute($parameters);
	}
	
	
	public function test(){
		/*$sql = "SELECT max(verkregen)
								FROM houderschap h 
								inner join titel t on h.idtitel = t.id
								WHERE t.functie = 1
								GROUP BY t.functie";*/
		$sql = "SELECT verkregen,voornaam,achternaam,naam,cleanName
				FROM houderschap h 
				inner join persoon p on h.idpersoon = p.id
				inner join titel t on h.idtitel = t.id
				WHERE t.functie = 1
				AND verkregen in (SELECT max(verkregen)
								FROM houderschap h 
								inner join titel t on h.idtitel = t.id
								WHERE t.functie = 1
								GROUP BY verkregen
								order by verkregen desc limit 2,5)
				order by verkregen desc,rang";
		$query = $this->db->prepare($sql);
		$query->execute();
		print_r( $query->fetchAll());
	}
	
    /**
     * Get all songs from database
     */
    public function getAllSongs()
    {
        $sql = "SELECT id, artist, track, link FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetchAll() is the PDO method that gets all result rows, here in object-style because we defined this in
        // core/controller.php! If you prefer to get an associative array as the result, then do
        // $query->fetchAll(PDO::FETCH_ASSOC); or change core/controller.php's PDO options to
        // $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC ...
        return $query->fetchAll();
    }

    /**
     * Add a song to database
     * TODO put this explanation into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     */
    public function addSong($artist, $track, $link)
    {
        $sql = "INSERT INTO song (artist, track, link) VALUES (:artist, :track, :link)";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Delete a song in the database
     * Please note: this is just an example! In a real application you would not simply let everybody
     * add/update/delete stuff!
     * @param int $song_id Id of song
     */
    public function deleteSong($song_id)
    {
        $sql = "DELETE FROM song WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get a song from database
     */
    public function getSong($song_id)
    {
        $sql = "SELECT id, artist, track, link FROM song WHERE id = :song_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);

        // fetch() is the PDO method that get exactly one result
        return $query->fetch();
    }

    /**
     * Update a song in database
     * // TODO put this explaination into readme and remove it from here
     * Please note that it's not necessary to "clean" our input in any way. With PDO all input is escaped properly
     * automatically. We also don't use strip_tags() etc. here so we keep the input 100% original (so it's possible
     * to save HTML and JS to the database, which is a valid use case). Data will only be cleaned when putting it out
     * in the views (see the views for more info).
     * @param string $artist Artist
     * @param string $track Track
     * @param string $link Link
     * @param int $song_id Id
     */
    public function updateSong($artist, $track, $link, $song_id)
    {
        $sql = "UPDATE song SET artist = :artist, track = :track, link = :link WHERE id = :song_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':artist' => $artist, ':track' => $track, ':link' => $link, ':song_id' => $song_id);

        // useful for debugging: you can see the SQL behind above construction by using:
        // echo '[ PDO DEBUG ]: ' . Helper::debugPDO($sql, $parameters);  exit();

        $query->execute($parameters);
    }

    /**
     * Get simple "stats". This is just a simple demo to show
     * how to use more than one model in a controller (see application/controller/songs.php for more)
     */
    public function getAmountOfSongs()
    {
        $sql = "SELECT COUNT(id) AS amount_of_songs FROM song";
        $query = $this->db->prepare($sql);
        $query->execute();

        // fetch() is the PDO method that get exactly one result
        return $query->fetch()->amount_of_songs;
    }
}