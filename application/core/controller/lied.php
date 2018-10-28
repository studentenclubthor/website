<?php

class Lied extends Controller
{
    public function index(){
        require APP . 'view/_templates/header.php';
        require APP . 'view/boom/index.php';
        require APP . 'view/_templates/footer.php';
    }
	
}
