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
            $file = ENV . 'development.php';
            $content = file_get_contents($file);
            if(!empty(Input::get('appname'))){
                $this->appname = Input::get('appname');
                $line1 = str_replace('app.name', $this->appname, $content);
            }
            if(!empty(Input::get('username'))){
                $this->username = Input::get('username');
                $line2 = str_replace('app.user', $this->username, $content);
            }
            if(!empty(Input::get('password'))){
                $this->password = Input::get('password');
                $line3 = str_replace('app.pass', $this->password, $content);
            }
            echo $line3 . '<br>'
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

    }
}