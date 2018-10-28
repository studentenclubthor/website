<?php

class Cantus extends Controller
{
    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/cantus/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
	public function liederen(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/cantus/liederen.php';
        require APP . 'view/_templates/footer.php';
    }
	
	
	public function lied($naam){
		$naam = $naam;
        require APP . 'view/_templates/header.php';
        require APP . 'view/cantus/lied.php';
        require APP . 'view/_templates/footer.php';
    }
	
}
