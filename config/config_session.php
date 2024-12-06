<?php
ini_set('session.use_only_cookies',1);
ini_set('session.use_strict_mode',1);
session_set_cookie_params([
'lifetime' => 1800,
'domain' => 'localhost',
'path' => '/',
'secure' => true,
'httponly' => true,
]);
session_start();
if (isset($_SESSION["user_id"])) {
    if (!isset($_SESSION['last_regeneration'])) {
        sessionRegnerateIdLoggedin();
        } else {
        $interval = 60 * 30;
        if (time() - $_SESSION['last_regeneration'] >= $interval)
        sessionRegnerateIdLoggedin();
        }
}else{
    if (!isset($_SESSION['last_regeneration'])) {
        sessionRegenerateId();
        } else {
        $interval = 60 * 30;
        if (time() - $_SESSION['last_regeneration'] >= $interval)
        sessionRegenerateId();
        }
}


    function sessionRegnerateIdLoggedin() {
        session_regenerate_id(true);
        $newSessionId=session_create_id();
        $userId=$_SESSION["user_id"];
        $sessionId=$newSessionId ."_". $userId;
        session_id($sessionId); 
        $_SESSION['last_regeneration'] = time();
    }

    function sessionRegenerateId() {
        session_regenerate_id(true);
        $_SESSION['last_regeneration'] = time();
    }

