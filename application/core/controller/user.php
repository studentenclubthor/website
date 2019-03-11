<?php

class User extends Auth{
	
	//pagin&'s
    public function index(){
		$stemmen = $this->model->getMyStem();
        require APP . 'view/_templates/header.php';
        require APP . 'view/User/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
}