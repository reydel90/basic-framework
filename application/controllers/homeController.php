<?php 
use core\classes\Controller as Controller;

class homeController extends Controller{
    public function index(){
        echo 'home/controller';
    }
    public function test(){
    	echo 'home/test';
    }
}