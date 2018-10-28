<?php

class Schachtenmeester extends Auth{
	
	//pagina's
    public function index(){
		$schachten = $this->model->getSchachten();
        require APP . 'view/_templates/header.php';
        require APP . 'view/schachtenmeester/index.php';
        require APP . 'view/_templates/footer.php';
    }

}