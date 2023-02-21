<?php

namespace Bank\Login;

use App\DB\DataBase;
use PDO;

class Maria implements DataBase {

  private static $dbObj;
  private $pdo;

  public static function getMaria() {
    return self::$dbObj ?? self::$dbObj = new self; 
  }

  private function __construct() {
    $host = '127.0.0.1';
    $db   = 'bankas';
    $user = 'root';
    $pass = '';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $this->pdo = new PDO($dsn, $user, $pass, $options);
  }
  
  public function create(array $users) : void {
    foreach($users as $user) {
      
      $sql = "INSERT INTO users
      (`name`, email, pass)
      VALUES (?, ?, ?) 
      ";
      
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$user['name'], $user['email'], $user['pass']]);
    }
  }

  public function update(int
 $accId, array $accData) : void {}


    public function delete(int
 $accId) : void {}
    
 
 public function show(int $userId) : array {
    $sql = "SELECT id, `name`, email, pass FROM users
    WHERE id = ?
    ";
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$userId]);
    $row = $stmt->fetch();
    return $row;
  }

  public function showAll() : array {}

  public function getUser(string $email, string $pass) : array {
    $sql = "SELECT id, `name`, email, pass FROM users
    WHERE email = ? AND pass = ?
    ";
    
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$email, $pass]);
    $user = $stmt->fetch();
    return false === $user ? [] : $user;
  }

}