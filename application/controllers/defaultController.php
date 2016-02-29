<?php 
use core\classes\Controller as Controller;

class defaultController extends Controller{
    public function index(){
        echo 'default/controller';
    }
    public function contact(){
    	echo 'default/contact';
    }
}