<?php 
use core\classes\Controller as Controller;
use core\classes\Config as Config;

class defaultController extends Controller{
    public function index(){
        $this->view('index', ['title' => 'homepage']);
    }

}