<?php 
declare (strict_types=1);
use Core\Validator;;
class SignupController{
 public function handleSignup(){
    if ($_SERVER['REQUEST_METHOD']==="POST"){
        try {
          $username =  $_POST["username"];
          $password = $_POST["password"];
          $email=$_POST["email"];
        $user=new User($username,$password,$email);
        $validator=new Validator($username,$password,$email);
        if ($validator->validateSignup() && $user->Signup()){
          $_SESSION["is_signup_success"]=true;
          header("Location: ../signup");
        }else{
          $_SESSION["is_signup_success"]=false;
          $_SESSION["errors"]=$validator->geterrors();
          header("Location: ../signup");
        }
       
        } catch(Exception $e){ 
            die('signup failed' . $e->getMessage());
        } 
            
        }else{
          header("Location: ../signup");
            die();
        }

       
        
 }   
 

}
    