<?php

namespace Bank;

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
  
  public function create(array $accData) : void {
      $sql = "INSERT INTO accounts
      (Nr, vardas, pavarde, AK, likutis)
      VALUES (?, ?, ?, ?, ?) 
      ";
      
      $stmt = $this->pdo->prepare($sql);
      $stmt->execute([$accData['Nr'], $accData['vardas'], $accData['pavarde'], $accData['AK'], $accData['likutis']]);
  }

  public function update(int
 $accId, array $accData) : void {
  $sql ="UPDATE accounts
  SET Nr = ?, vardas = ?, pavarde = ?, AK = ?, likutis = ? 
  WHERE id = $accId
  ";

  $stmt = $this->pdo->prepare($sql);
  $stmt->execute([$accData['Nr'], $accData['vardas'], $accData['pavarde'], $accData['AK'], $accData['likutis']]);
 }


    public function delete(int
 $accId) : void {
  $sql = "DELETE FROM accounts
  WHERE id = ?
  ";

  $stmt = $this->pdo->prepare($sql);
  $stmt->execute([$accId]);
 }
    
 
 public function show(int $accId) : array {
    $sql = "SELECT id, Nr, vardas, pavarde, AK, likutis FROM accounts
    WHERE id = $accId
    ";
    
    $stmt = $this->pdo->query($sql);
    $row = $stmt->fetch();
    return $row;
  }

  public function showAll() : array {
    $sql = "SELECT id, Nr, vardas, pavarde, AK, likutis FROM accounts
        ";
        $all = [];
        $stmt = $this->pdo->query($sql);
        while ($row = $stmt->fetch())
        {
            $all[] = $row;
        }
        return $all;
  }

}