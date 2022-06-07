<?php 

class User{
   //propriedades
   public $id;
   public $name;
   public $email;
   public $pass;
   //Contruct
   function __construct($id, $name, $email, $pass){
       $this->id = $id;
       $this->name = $name;
       $this->email = $email;
       $this->pass = $pass;
   }
   //Métodos
   function create(){
      $db = new Database();
      try {
        $stmt = $db->conn->prepare("INSERT INTO users (name, email, pass, roles) VALUES (:name, :email, :pass, 'client')");
        $stmt->bindParam(":name", $this->name);
        $stmt->bindParam(":email", $this->email);
        $stmt->bindParam(":pass", $this->pass);
        $stmt->execute();
        $id = $db->conn->lastInsertId();
        return $id;
      } 
      catch(PDOException $e) {
        $result['Mensage'] = "Erro Create" . $e->getMessage();
        $response = new Output();
        $response->out($result, 500);
      }
   }

   function delete(){
    $db = new Database();
    try {
      $stmt = $db->conn->prepare("DELETE FROM users WHERE id = :id;");
      $stmt->bindParam(":id", $this->id);
      $stmt->execute();
      return true;
    } 
    catch(PDOException $e) {
      $result['Mensage'] = "Erro no Delete" . $e->getMessage();
      $response = new Output();
      $response = out($result, 500);
    }
   }

   function update(){
    $db = new Database();
    try {
      $stmt = $db->conn->prepare("UPDATE users SET name=:name, email=:email, pass=:pass WHERE id=:id;");
      $stmt->bindParam(':id', $this->id);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':email', $this->email);
      $stmt->bindParam(':pass', $this->pass);
      $stmt->execute();
      return true;
    } 
    catch(PDOException $e) {
      $result['Mensage'] = "Erro de Update" . $e->getMessage();
      $response = new Output();
      $reaponse = out($result, 500);
    }
   }

   function selectAll(){
    $db = new Database();
    try {
      $stmt = $db->conn->prepare("SELECT * FROM users");
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;

    } 
    catch(PDOException $e) {
      $result['Mensage'] = "Erro de Select" . $e->getMessage();
      $response = new Output();
      $reaponse = out($result, 500);
    }
   }

   function selectId(){
    $db = new Database();
    try {
      $stmt = $db->conn->prepare("SELECT name, email, pass, roles FROM users WHERE id = :id");
      $stmt->bindParam(":id", $this->id);
      $stmt->execute();
      $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
      return $result;
    } 
    catch(PDOException $e) {
      $result['Mensage'] = "Erro Select id" . $e->getMessage();
      $response = new Output();
      $reaponse = out($result, 500);
    }
   }

   function login(){
    $db = new Database();
    try {
        $stmt = $db->conn->prepare("SELECT id, name, email, roles FROM users WHERE email = :email AND pass = :pass; ");
        $stmt->bindParam(':email', $this->email);
        $stmt->bindParam(':pass', $this->pass);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }catch(PDOException $e) {
        $result['Mensage'] = "Error User Login:" . $e->getMessage();
        $response = new Output();
        $response->out($result, 500);
    }
}
}

?>