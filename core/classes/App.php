<?php
namespace core\classes;
use core\classes\Parse as Parse;
use core\classes\Config as Config;

class App{
    protected $controller = 'defaultController',
              $method = 'index',
              $params = [],
              $default = false,
              $status;
              
    public function __construct(){ 
        $parse = new Parse();
        $config = new Config;
        $url = $parse->url();
        //------- FIND AND SET THE CONTROLLER ----------//         
        if(empty($url[0])){
            unset($url[0]);
        }
        if(!$config->status('status.installed')){
            $this->controller = 'installerController';
        }       
        if(!empty($url[1])){
            if(file_exists(CONTROLLERS . $url[1] . 'Controller.php')){
                $this->controller = $url[1] . 'Controller';
                unset($url[1]);
            }else{
                $this->default = true;
            }
        }
        require_once CONTROLLERS . $this->controller . '.php';
        $this->controller = new $this->controller;
        
        //-------   FIND AND SET THE METHOD  ----------// 
        if($this->default){
            if(isset($url[1])){
                $this->method = $url[1];
                unset($url[1]);                                      
            }
        }else if(isset($url[2])){
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