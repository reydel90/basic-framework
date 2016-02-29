<?php 
// AQUI SE DEFINEN LAS RUTAS PRINCIPALES//
define('DS', DIRECTORY_SEPARATOR);
define('ROOT', realpath(dirname(__FILE__)) . DS);
define('CORE',        ROOT . 'core'        . DS);
define('VENDOR',      ROOT . 'vendor'      . DS);
define('APP',         ROOT . 'application' . DS);
define('MODELS',      APP  . 'models'      . DS);
define('VIEWS',       APP  . 'views'       . DS);
define('CONTROLLERS', APP  . 'controllers' . DS);
define('ASSETS',      APP  . 'assets'      . DS);

echo 'routes is ready';
require_once APP . 'init.php';