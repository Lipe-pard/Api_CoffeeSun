<?php 

class Product{
    //prioridades
    public $id;
    public $name;
    public $description;
    public $value;
    public $amount;
    public $event;
    public $type;
    public $color;
    public $image;

    //Construct
    function __construct($id, $name, $discription, $value, $amount, $event, $type, $color, $image){
        $this->id = $id;
        $this->name = $name;
        $this->discription = $discription;
        $this->value = $value;
        $this->amount = $amount;
        $this->event = $event;
        $this->type = $type;
        $this->color = $color;
        $this->image = $image;
    }
    //Métodos
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO product (name, discription, value, amount, event, type, color, image) VALUES (:name, :discription, :value, :amount, :event, :type, :color, :image)");
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":discription", $this->discription);
            $stmt->bindParam(":value", $this->value);
            $stmt->bindParam(":amount", $this->amount);
            $stmt->bindParam(":event", $this->event);
            $stmt->bindParam(":type", $this->type);
            $stmt->bindParam(":color", $this->color);
            $stmt->bindParam(":image", $this->image);
            $stmt->execute();

            $id = $db->conn->lastInsertId();
            return $id;

        }catch(PDOException $e){
            $result['Mensage'] = "Erro Create" . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }

    function delete(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("DELETE FROM product WHERE id = :id;");
            $stmt->bindParam(":id", $this->id);
            $stmt->execute();
            return true; 
        }catch(PDOException $e) {
            $result['Mensage'] = "Erro no Delete" . $e->getMessage();
            $response = new Output();
            $response = out($result, 500);
          }
    }

    function update(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("UPDATE product SET name=:name, discription=:discription, value=:value, amount=:amount, event=:event, type=:type, color=:color, image=:image WHERE id=:id;");
            $stmt->bindParam(':id', $this->id);
            $stmt->bindParam(':name', $this->name);
            $stmt->bindParam(':discription', $this->discription);
            $stmt->bindParam(':value', $this->value);
            $stmt->bindParam(":amount", $this->amount);
            $stmt->bindParam(':event', $this->event);
            $stmt->bindParam(':type', $this->type);
            $stmt->bindParam(':color', $this->color);
            $stmt->bindParam(':image', $this->image);
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
        $stmt = $db->conn->prepare("SELECT * FROM product");
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
          $stmt = $db->conn->prepare("SELECT * FROM product WHERE id = :id");
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

    function selectIds($id){
        $arrayIds = array_map('intval', explode(',', $id));
        $arrayIds = implode(',', $arrayIds);
        $db = new DataBase();
        try{
            $stmt = $db->conn->prepare("SELECT * FROM product WHERE id IN($arrayIds);");
            $stmt->execute();
            $result= $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['Mensage'] = "Error Select By ID: " . $e->getMessage();
            $response= new Output();
            $response->out($result, 500); 
        }
    }
}

?>