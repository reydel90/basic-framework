<?php 
use core\classes\Parse as Parse;

require_once VENDOR . 'autoload.php';

$parse = new Parse();
$url = $parse->url();
print_r($url);
