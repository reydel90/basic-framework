<?php 
use core\classes\Controller as Controller;
use core\classes\Input as Input;
use core\classes\Config as Config;

class installerController extends Controller{
    protected $appname = '',
              $username = '',
              $password = '';

    public function index(){
        self::check();
        echo 'Hello.. installer for this app'; 
        if(Input::exists()){
            if(!empty(Input::get('appname'))){
                $this->appname = Input::get('appname');
            }
            if(!empty(Input::get('username'))){
                $this->username = Input::get('username');
            }
            if(!empty(Input::get('password'))){
                $this->password = Input::get('password');
            }            
        }
        echo $this->appname  . '<br>';
        echo $this->username . '<br>';
        echo $this->password . '<br>';



        $this->view('installer/index'); 
    }
    public function check(){ // si esta instalada la app redirecciona a la pagina principal!!
        $config = new Config;
        if($config->status('status.installed')){
            header('location: http://application-test.no-ip.org/'); 
        }
    }

    public function read(){
        $myfile = fopen(ENV . 'production.php', 'r') or die('Unable to open file!');
        echo fread($myfile,filesize(ENV . 'production.php'));
        fclose($myfile);
    }
}