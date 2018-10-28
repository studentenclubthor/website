<?php

class Club extends Controller
{
    public function index(){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/club/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function praesidia(){
		$praesidia = $this->model->getPraesidia();
		require APP . 'view/_templates/header.php';
        require APP . 'view/club/praesidia.php';
        require APP . 'view/_templates/footer.php';
	}
	
	public function geschiedenis(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/club/geschiedenis.php';
        require APP . 'view/_templates/footer.php';
		
	}
	
	public function jaarboeken(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/club/jaarboeken.php';
        require APP . 'view/_templates/footer.php';
		
	}
	
	public function kiesboeken(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/club/kiesboeken.php';
        require APP . 'view/_templates/footer.php';
		
	}
	
}
