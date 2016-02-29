<?php 
use core\classes\Controller as Controller;
use core\classes\Config as Config;

class installerController extends Controller{

    public function index(){
        self::check();
        echo 'Hello.. installer for this app'; 
        $this->view('installer/index'); 
    }
    public function check(){ // si esta instalada la app redirecciona a la pagina principal!!
        $config = new Config;
        if($config->status('status.installed')){
            header('location: http://application-test.no-ip.org/'); 
        }
    }
}