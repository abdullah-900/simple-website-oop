<?php
require_once "./utils/Responses.php";
require_once "./utils/functions.php";
include_once "./utils/Validator.php";
require_once "config/config_session.php";
$Routes=require_once "config.php";
require_once "Router.php";
$router=new Router($Routes);
$router->Route();