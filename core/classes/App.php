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
        
        echo $this->controller;
    }
}