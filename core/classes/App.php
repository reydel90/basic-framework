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
        if(empty($url[0])){
            unset($url[0]);
        }
        if(!empty($url[1])){
            if(file_exists(CONTROLLERS . $url[1] . 'Controller.php')){
                $this->controller = $url[1] . 'Controller';
            }else{
                $this->controller = $this->controller . 'Controller';
            }
        }
        echo $this->controller;
    }
}