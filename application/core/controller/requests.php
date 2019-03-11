<?php

class Requests extends Auth{
	
	//pagin&'s
    public function index(){
		$requests = $this->model->getRequests();
        require APP . 'view/_templates/header.php';
        require APP . 'view/Requests/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function editRequest($id,$confirmed){
		$this->model->editRequest($id,$confirmed);
		header('Location: ' . URL . "Requests");
	}
	
}