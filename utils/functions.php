<?php
function abort($response=404) {
    http_response_code($response);
    if ($response===404) {
        require_once "./app/Views/notfound.php";
    }
    die();
}