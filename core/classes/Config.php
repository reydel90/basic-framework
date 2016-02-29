<?php 
namespace core\classes;
class Config{
    protected $data,
              $mode = 'development',
              $default;
    
    public function status($key){
        $file = ENV . 'status.php';
        $this->data = require $file;
        $segments = explode('.', $key);
        $data = $this->data;
        
        foreach($segments as $segment){
            if(isset($data[$segment])){
                $data = $data[$segment];
            }else{
                $data = $this->default;
                break;
            }    
        }
        return $data;        
    }

    public function get($key, $default = null){
        $mode = $this->status('status.mode');
        $file = ENV . $this->mode . '.php';
        $this->data = require $file;        
              
        $this->default = $default;
        $segments = explode('.', $key);
        $data = $this->data;
        
        foreach($segments as $segment){
            if(isset($data[$segment])){
                $data = $data[$segment];
            }else{
                $data = $this->default;
                break;
            }    
        }
        return $data;
    }
    public function exists($key){
        return $this->get($key) !== $this->default;
    }
}