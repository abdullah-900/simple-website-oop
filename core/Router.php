<?php
declare(strict_types=1);
namespace Core;
use Exception;
class Router {
    private $uri;
    private $method;
    private $routes=[];
    private $sessionid;
    public function __construct() {
        $this->uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method = $_POST["_method"]?? $_SERVER['REQUEST_METHOD'];
        if (isset($_SESSION["user_id"])) {
            $this->sessionid=$_SESSION["user_id"];
        }
    }



public function get($uri,$controller,$function='') {
$this->addRoute($uri,$controller,'GET',$function);
}
public function post($uri,$controller,$function) {
    $this->addRoute($uri,$controller,'POST',$function);
    }
    public function delete($uri,$controller,$function) {
        $this->addRoute($uri,$controller,'DELETE',$function);
        }
        public function put($uri,$controller,$function) {
            $this->addRoute($uri,$controller,'PUT',$function);
            }
            public function patch($uri,$controller,$function) {
                $this->addRoute($uri,$controller,'PATCH',$function);
                }
             



public function addRoute($uri,$controller,$method,$function) {
    $this->routes[]= [
              "uri"=>$uri,
              "controller"=>$controller,
              "method"=>$method,
              "function"=>$function,
      ];
}

public function Route() {
    foreach ($this->routes as $route) {
        if($this->uri===$route['uri'] && $route['method']===$this->method && $route["function"]!=='') {
            require_once  base_path($route['controller']);
            $info=pathinfo($route['controller']);
            $classname=$info["filename"];
            $class=new $classname();
            call_user_func([ $class, $route["function"]]);
        }elseif ($this->uri===$route['uri'] && $route['method']===$this->method) {
            require_once  base_path($route['controller']);
        }elseif($this->uri===$route['uri'] && $route['method']===$this->method) {
            require_once  base_path($route['controller']);
            $info=pathinfo($route['controller']);
            $classname=$info["filename"];
            $class=new $classname();
            call_user_func([ $class, $route["function"]]);
        }
    }
}










}

