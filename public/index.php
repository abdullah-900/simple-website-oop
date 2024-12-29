<?php
const BASE_PATH = __DIR__ . '/../';
require_once BASE_PATH . 'vendor/autoload.php';
require_once BASE_PATH ."./core/functions.php";
use function Core\base_path;
require_once base_path("config/config_session.php");
use core\Router;

require_once base_path("./app/Models/Notes.php");
require_once base_path("./Core/Router.php");
$router=new Router();
require_once base_path("./Core/routes.php");
$router->Route();

