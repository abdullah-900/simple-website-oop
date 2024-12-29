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

 public function getter() {
    return $this->routes;
 }
public function get($uri,$controller,$allowedfor,$function='') {
$this->addRoute($uri,$controller,'GET',$function,$allowedfor);
}
public function post($uri,$controller,$allowedfor,$function) {
    $this->addRoute($uri,$controller,'POST',$function,$allowedfor);
    }
    public function delete($uri,$controller,$allowedfor,$function) {
        $this->addRoute($uri,$controller,'DELETE',$function,$allowedfor);
        }
        public function put($uri,$controller,$allowedfor,$function) {
            $this->addRoute($uri,$controller,'PUT',$function,$allowedfor);
            }
            public function patch($uri,$controller,$allowedfor,$function) {
                $this->addRoute($uri,$controller,'PATCH',$function,$allowedfor);
                }
             



public function addRoute($uri,$controller,$method,$function='',$allowedfor='') {
    $this->routes[]= [
              "uri"=>$uri,
              "controller"=>$controller,
              "method"=>$method,
              "function"=>$function,
              "allowedfor"=>$allowedfor,
             
      ];
}




private function nav ($controller,$function='') {
    require_once  base_path($controller);
    $info=pathinfo($controller);
    $classname=$info["filename"];
    $class=new $classname();
    call_user_func([ $class, $function]);
}


public function Route() {
    foreach ($this->routes as $route) {
        $checkuriandmethod=$this->uri===$route['uri'] && $route['method']===$this->method;
        if (isset($this->sessionid) && $checkuriandmethod && $route['allowedfor']==='user') {
            $this->nav($route['controller'],$route['function']);
        }elseif(isset($this->sessionid) && $checkuriandmethod && $route['allowedfor']==='guest') {
            header("Location: ../notes");
        }
        
        if($checkuriandmethod && !isset($this->sessionid) && $route['allowedfor']==='guest') {
            if ($route['function']) {
                $this->nav($route['controller'],$route['function']);
            }else{
                require_once  base_path($route["controller"]);
            }
        }elseif($checkuriandmethod && !isset($this->sessionid) && $route['allowedfor']==='user') {
            header("Location: ../");
        }
    }
}



}

