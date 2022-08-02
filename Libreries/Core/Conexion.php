<?php
class Conexion{
  private $conect;
  public function __construct(){
    $connectionString="mysql:hos=".HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
    try {
      $this->conect = new PDO($connectionString,USER,PASSWORD);
      $this->conect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
      $this->conect="Error de conexíon";
      echo "ERROR: ".$e->getMessage();

    }
  }
  public function connect(){
    return $this->conect;
  }

}
  