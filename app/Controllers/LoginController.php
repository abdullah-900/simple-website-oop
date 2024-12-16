<?php
declare (strict_types=1);
class LoginController{

    public function handleLogin() {
        
        if ($_SERVER['REQUEST_METHOD']==="POST") {
            try {
               $username=$_POST["username"];
               $password=$_POST["password"];
                $validator=new Validator($username,$password,"");
                if ($validator->validateLogin()) {
                    $_SESSION["is_Login_success"]=true;
                    $_SESSION["user_id"]= $validator->get_user_data()["id"];
                    header("Location: ../notes");
                }else{
                    $_SESSION["is_Login_success"]=false;
                    $_SESSION["Login_errors"]=$validator->geterrors();
                    header("Location: ../Login");
                }
            } catch (Exception $e) {
                die('Login failed' . $e->getMessage());
            }


        }else{
            header("Location: ../signup");
            die();
        }

    }

    
}