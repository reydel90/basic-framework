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
            $fileRoute = ENV . 'development.php';
            $in_file = fopen($fileRoute, 'r');
            $fileContents = fgets($in_file, filesize($fileRoute));
            $fileContents = preg_replace(
                array('app.name','app.user','app.pass'),
                array($this->appname, $this->username, $this->password),
                $fileContents
            );
            fclose($in_file);
            $out_file = fopen($fileRoute, 'w');
            fwrite($out_file, $fileContents);
            fclose($out_file);
            
        }
        $fileRoute = ENV . 'development.php';
        $read = file_get_contents($fileRoute);
        echo $read;
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
        echo $content;
    }
}