<?php

class Abactis extends Auth{
	
	//pagin&'s
    public function index(){
		$personen = $this->model->getPersonen();
        require APP . 'view/_templates/header.php';
        require APP . 'view/abactis/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function peter(){
		$personen = $this->model->getPersonen();
		$peters = $this->model->getPeters();
        require APP . 'view/_templates/header.php';
        require APP . 'view/abactis/peter.php';
        require APP . 'view/_templates/footer.php';	
		
	}
	
	public function aanwezig(){
		$personen = $this->model->getPersonen();
		$Aanwezigheden = $this->model->getAanwezigheden();
        require APP . 'view/_templates/header.php';
        require APP . 'view/abactis/aanwezig.php';
        require APP . 'view/_templates/footer.php';	
	}
	
	public function titel(){
		$personen = $this->model->getPersonen();
		$titels = $this->model->getTitels();
		$houders = $this->model->getHouders();
        require APP . 'view/_templates/header.php';
        require APP . 'view/abactis/titel.php';
        require APP . 'view/_templates/footer.php';	
	}

	//persoon
	public function addPersoon(){
		$voornaam = $_POST['voornaam'];
		$naam = $_POST['naam'];
		$email = $_POST['email'];
		$this->model->addPersoon($voornaam,$naam,$email);
		header('Location: ' . URL . "abactis/index");
	}
	
	public function editPersoon($id){
		$voornaam = $_POST['voornaam'];
		$naam = $_POST['naam'];
		$email = $_POST['email'];
		$this->model->editPersoon($id,$voornaam,$naam,$email);
		header('Location: ' . URL . "abactis/");
	}
	
	public function deletePersoon($id){
		$this->model->deletePersoon($id);
		header('Location: ' . URL . "abactis/");
	}
	
	//peter
	public function addPeter(){
		$peter = $_POST['peter'];
		$kind = $_POST['kind'];
		$this->model->addPeter($peter,$kind);
		header('Location: ' . URL . "abactis/peter");
	}
	
	public function deletePeter($id){
		$this->model->deletePeter($id);
		header('Location: ' . URL . "abactis/peter");
	}
	
	public function editPeter($id){
		$peter = $_POST['peter'];
		$kind = $_POST['kind'];
		$this->model->editPeter($id,$peter,$kind);
		header('Location: ' . URL . "abactis/peter");
	}
	
	//titel
	public function addTitel(){
		$naam = $_POST['naam'];
		$this->model->addTitel($naam);
		header('Location: ' . URL . "abactis/titel");
	}
	
	public function deleteTitel($id){
		$this->model->deleteTitel($id);
		header('Location: ' . URL . "abactis/titel");
	}
	
	public function editTitel($id){
		$naam = $_POST['naam'];
		$this->model->editTitel($id,$naam);
		header('Location: ' . URL . "abactis/titel");
	}
	
	//houderschap
	public function editHouder($id){
		$houder = $_POST['houder'];
		$titel = $_POST['titel'];
		$jaar = $_POST['jaar'];
		$uitgedaan = $_POST['uitgedaan'];
		$this->model->editHouder($id,$houder,$titel,$jaar,$uitgedaan);
		header('Location: ' . URL . "abactis/titel");
	}
	
	public function addHouder(){
		$houder = $_POST['houder'];
		$titel = $_POST['titel'];
		$jaar = $_POST['jaar'];
		$this->model->addHouder($houder,$titel,$jaar);
		header('Location: ' . URL . "abactis/titel");
	}
	
	public function deleteHouder($id){
		$this->model->deleteHouder($id);
		header('Location: ' . URL . "abactis/titel");
	}
	
}