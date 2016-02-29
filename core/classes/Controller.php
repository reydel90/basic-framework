<?php 
namespace base\core\classes;
class Controller{
    protected $template = 'default';
    
    public function view($view, $data = []){
        //require_once VIEWS . 'templates' . DS . $this->template . DS . 'main.php';
        require_once VIEWS . $view . '.php'; 
        //require_once VIEWS . 'templates' . DS . $this->template . DS . 'end.php';        
    }
}