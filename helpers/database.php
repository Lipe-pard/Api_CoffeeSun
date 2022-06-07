<?php 

class Database{
    //propriedades
   public $conn;
   
   function __construct(){
    try {
      $conn = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER_NAME, DB_PASSWORD);
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      $this->conn = $conn;
    } catch(PDOException $e) {
      $result['Mensage'] = "Erro Connect Database:" . $e->getMenssage();
      $response = new Output();
      $reaponse = out($result, 500);
    }
   }
}

?>