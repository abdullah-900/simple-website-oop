<?php
declare (strict_types=1);
require_once "./config/Dbh.php";
class User extends Dbh {
    protected $username;
    protected $password;
    protected $email;
    public function __construct(string $username, string $password,string $email){
        $this->username=$username;
        $this->password=$password;
        $this->email=$email;
    }
public function get_user_data() {
$query='SELECT * from users where username=:username;';
$stmt=$this->query($query,[":username"=>$this->username]);
$result=$stmt->fetch(PDO::FETCH_ASSOC);
return $result;
}

public function Signup():bool {
  try {
    $pdo=$this->connect();
    $Query='INSERT INTO users (username,pwd,email) VALUES (:username,:pwd,:email)';
    $stmt=$pdo->prepare($Query);
    $hased=password_hash($this->password,PASSWORD_DEFAULT);
   return $stmt->execute([
    ":username"=>$this->username,
    ":pwd" => $hased,
    ":email" => $this->email
   ]);
  } catch(PDOException $e){ 
    return false;
}
    }

}







