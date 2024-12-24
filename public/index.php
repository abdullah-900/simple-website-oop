<?php
const BASE_PATH = __DIR__ . '/../';
require_once BASE_PATH ."./core/functions.php";
use function Core\base_path;
use core\Router;

spl_autoload_register(function ($class){
    require_once base_path( $class .".php");
    });

require_once base_path("./app/Models/Notes.php");
require_once base_path("config/config_session.php");
require_once base_path("./Core/Router.php");
$router=new Router();
require_once base_path("./Core/routes.php");
$router->Route();

