<?php 
declare (strict_types=1);
require_once "./app/Models/User.php";
class Validator extends User {
    private array $errors=[];
    public function is_empty(array $requiredfields) {
        foreach ($requiredfields as $field) {
            if (empty($field)) {
                $this->errors[]="please fill all fields";
                return true;
            }else {
                return false;
            }
        }
    }
    
    private function is_username_taken() {
    $userdata=$this->get_user_data();
    if(is_array($userdata) && $userdata["username"]) {
   $this->errors[]="username already taken";
    }
    }
    private function is_username_registered() {
        $userdata=$this->get_user_data();
        if(!is_array($userdata) && $userdata["username"]) {
            $this->errors[]="username or password is not correct";
        }
        }
    private function is_email_correct() {
        if(!filter_var($this->email, FILTER_VALIDATE_EMAIL)) {
        $this->errors[]="email is incorrect";
        }
        }
    
        private function is_email_registered() {
            $userdata=$this->get_user_data();
            if ( is_array($userdata) && $userdata["email"]===$this->email ) {
                $this->errors[]="email already taken";
            }
            }

            private function is_password_correct():bool {
                $userdata=$this->get_user_data();
                error_log($userdata . PHP_EOL, 3, "errors.log");
                if (is_array($userdata) && password_verify($this->password,$userdata["pwd"])) {
                    return true;
                }else {
                    if (!in_array("username or password is not correct",$this->errors)){
                        $this->errors[]="username or password is not correct";
                    }
                   
                    return false;
                }
                }

                public static function checkStringLength($string ,$min ,$max) {
                    if (strlen($string)>=$min && strlen($string)<$max) {
                        return true;
                    }else {
                        return false;
                    }
                }
            public function geterrors() {
                return $this->errors;
            }
            public function validateSignup() {
                if (!$this->is_empty(["username"=>$this->username,"email"=>$this->email,"password"=>$this->password])){
                    $this->is_username_taken();
                    $this->is_email_correct();
                    $this->is_email_registered();
                }
                if (empty($this->errors)) {
                    return true;
                }else {
                    return false;
                }
            }

            public function validateLogin():bool {
                if (!$this->is_empty(["username"=>$this->username,"password"=>$this->password])){;
                   $this->is_password_correct();
                   $this->is_username_registered();
                }
                if (empty($this->errors)) {
                    return true;
                }else {
                    return false;
                }
            }


}