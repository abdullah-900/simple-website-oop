<?php
$Routes=require_once "config.php";
require_once "Router.php";
$router=new Router($Routes);
$router->Route();