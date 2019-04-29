<?php

class Stem extends Auth{
	
	//pagin&'s
    public function index(){
		$stemmingen = $this->model->getOpenStem();
		$personen = $this->model->getPersonen();
		$titels = $this->model->getTitels();
        require APP . 'view/_templates/header.php';
        require APP . 'view/stem/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function addStemming(){
		$persoon = $_POST['persoon'];
		$doel = $_POST['titel'];
		$start = $_POST['start'];
		$eind = $_POST['eind'];
		echo $persoon;
		$idpers = $this->model->getPersoon($persoon)['0']->id;
		$this->model->addstemming($idpers,$doel,$start,$eind);
		header('Location: ' . URL . "stem/index");
	}
	
	public function addStem($stemming,$keuze){
		$this->model->addstem($stemming,$keuze);
		header('Location: ' . URL . "stem/index");
	}
	
	public function editStemming(){
		
	}
	
	public function editStem($id,$idpersoon,$value){
		$this->model->editStem($id,$idpersoon,$value);
		header('Location: ' . URL . "stem/index");
	}
	
}