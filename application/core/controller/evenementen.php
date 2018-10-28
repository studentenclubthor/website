<?php

class Evenementen extends Controller
{
    public function index(){
        // load views
		$events = $this->model->getEvents();
        require APP . 'view/_templates/header.php';
        require APP . 'view/evenementen/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function fotos(){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/evenementen/fotos.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function thorDeLouvain(){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/evenementen/thorDeLouvain.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function addEvent(){
		$naam = $_POST['naam'];
		$locatie = $_POST['locatie'];
		$start = $_POST['start'];
		$eind = $_POST['eind'];
		$banner = $_POST['banner'];
		$tekst = $_POST['tekst'];
		$this->model->addEvent($naam,$locatie,$start,$eind,$banner,$tekst);
		$this->index();
	}
	
	public function editEvent($id){
		$naam = $_POST['naam'];
		$locatie = $_POST['locatie'];
		$start = $_POST['start'];
		$eind = $_POST['eind'];
		$banner = $_POST['banner'];
		$tekst = $_POST['tekst'];
		$this->model->editEvent($id,$naam,$locatie,$start,$eind,$banner,$tekst);
		$this->index();
	}

	public function deleteEvent($id){
		$this->model->deleteEvent($id);
		$this->index();
	}
	
}
