<?php
declare (strict_types=1);
namespace Core;
use PDO;
use PDOException;
class Dbh{
private $host="localhost";
private $dbname="myfirstdb";
private $dbusername = "root";
private $dbpass='';

protected function connect() {
try {
    $pdo = new PDO ("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->dbusername, $this->dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $pdo;
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
}
protected function query($query,$params) { 
$stmt=$this->connect()->prepare($query);
$stmt->execute($params);
return $stmt;
}


}
