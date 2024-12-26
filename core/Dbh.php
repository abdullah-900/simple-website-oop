<?php
declare (strict_types=1);
namespace Core;
use PDO;
use PDOException;
class Dbh{
private static $instance = null;
private $host="localhost";
private $dbname="myfirstdb";
private $dbusername = "root";
private $dbpass='';

protected function connect() {
    if (self::$instance===null) {
try {
    $pdo = new PDO ("mysql:host=" . $this->host . ";dbname=" . $this->dbname, $this->dbusername, $this->dbpass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    self::$instance=$pdo;
    return self::$instance;
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}}else {
    return self::$instance;
}
}
protected function query($query,$params) { 
$stmt=$this->connect()->prepare($query);
$stmt->execute($params);
return $stmt;
}


}
