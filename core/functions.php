<?php
namespace Core;
function base_path($path) {
return str_replace("\\","/",BASE_PATH . $path );
}
function abort($response=404) {
    http_response_code($response);
    if ($response===404) {
        require_once base_path("./app/Views/notfound.php");
    }
    die();
}