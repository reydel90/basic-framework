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
        echo 'works app!!';
    }
}