<?php
namespace core\classes;
use core\classes\Parse as Parse;
//use core\classes\Config as Config;

class App{
    protected $controller = 'default',
              $method = 'index',
              $params = [],
              $default = false,
              $status;
              
    public function __construct(){
        $parse = new Parse();
        $url = $parse->url();
        
        //------- FIND AND SET THE CONTROLLER ----------// 
        /*
        $config = new Config;
        if(!$config->status('status.installed')){
            $this->controller = 'installer';
        }
        */
        if(empty($url[0])){
        	unset($url[0]);
        }
        if(empty($url[1])){
            $this->controller = $this->controller . 'Controller';
            $this->default = true;
        }else if(file_exists(CONTROLLERS . $url[1] . 'Controller.php')){
            $this->controller = $url[1] . 'Controller';
            unset($url[1]);
        }else{
            $this->controller = $this->controller . 'Controller'; 
            $this->default = true;
        }
        require_once CONTROLLERS . $this->controller . '.php';
        $this->controller = new $this->controller;
        //------- FIND AND SET THE METHOD ----------//         
        if($this->default){
            if(isset($url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }elseif(isset($url[2])){
            $this->method = $url[2];
            unset($url[2]);
        }
        if(method_exists($this->controller, $this->method)){
        }
        //------- FIND AND SET THE PARAMS ----------// 
        $this->params = $url ? array_values($url) : [];
        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}