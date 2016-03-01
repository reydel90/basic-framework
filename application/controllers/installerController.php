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
            $file = ENV . 'development.php';
            $content = file_get_contents($file);
            $result = str_replace('app.name', $this->appname, $content);
            echo $result;                       
        }




        $this->view('installer/index'); 
    }
    public function check(){ // si esta instalada la app redirecciona a la pagina principal!!
        $config = new Config;
        if($config->status('status.installed')){
            header('location: http://application-test.no-ip.org/'); 
        }
    }

    public function read(){
        $file = ENV . 'development.php';
        $content = file_get_contents($file);
        $result = str_replace('app.name', 'testapplication', $content);
        echo $result;
    }
}