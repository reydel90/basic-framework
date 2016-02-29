<?php 
use core\classes\Controller as Controller;

class defaultController extends Controller{
    public function index(){
        $this->view('index', ['title' => 'homepage']);
    }

}