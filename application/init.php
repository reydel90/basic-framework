<?php 
use core\classes\App as App;
use core\classes\Parse as Parse;
use core\classes\Config as Config;
use core\classes\Controller as Controller;

require_once VENDOR . 'autoload.php';

$config = new Config;

$app = new App();

echo $config->status('status.mode');
