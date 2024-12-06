<?php
declare(strict_types=1);
class Router {
    private $uri;
    private $method;
    private $routes;

    public function __construct($Routes) {
        $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method = $_SERVER['REQUEST_METHOD'];
        $this->routes=$Routes["routes"];
    }
public function Route(){
    try {
// these are regular views only getting pages
if (array_key_exists($this->uri,$this->routes) && $this->method === "GET" ) {
require_once $this->routes[$this->uri];
// here i can instaniate controller classes and call methods on them
}elseif(array_key_exists($this->uri,$this->routes) && $this->method === "POST") {
    require_once $this->routes[$this->uri][0];
    $info=pathinfo($this->routes[$this->uri][0]);
    $classname=$info["filename"];
    $class=new $classname();
    call_user_func([ $class, $this->routes[$this->uri][1]]);
}
else{
    require_once "./app/Views/notfound.php";
}

    } catch (Exception $e) {
        error_log("exception:" . $e->getMessage(),3,'./logs/erros.log');
    }
   
}
}

