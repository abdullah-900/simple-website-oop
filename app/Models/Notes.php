<?php
declare (strict_types=1);
require_once "./config/Dbh.php";
Class Notes extends Dbh{
    protected $userId;
 public function __construct(){
if (isset($_SESSION["user_id"])) {
    $this->userId=$_SESSION["user_id"];
}
 }

    protected function getNotes() {
        if (isset($this->userId)) {
            $query='SELECT * from notes where user_id=:user_id;';
           return  $this->query($query,[":user_id"=>$this->userId])->fetchall();
        }

    }

    
    
}