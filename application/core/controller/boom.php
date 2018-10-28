<?php

class Boom extends Controller
{
    public function index(){
        // load views
        require APP . 'view/_templates/header.php';
        require APP . 'view/boom/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
}
