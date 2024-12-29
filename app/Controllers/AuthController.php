<?php

class AuthController{
public function logout() {
    session_unset(); // Unset all session variables
    session_destroy(); // Destroy the session
    setcookie('PHPSESSID', "", time() - 3600, "/");
    header('Location: ../');
    exit;
}
}