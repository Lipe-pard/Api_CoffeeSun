<?php
class Session{
    public $idUser;
    public $token;
    public $desciption;

    function __construct($idUser, $token, $desciption){
        $this->idUser = $idUser;
        $this->token = $token;
        $this->description = $desciption;
    }

    //Cria uma nova Session Quando o usuario estiver logado
    function create(){
        $db = new Database();
        try{
            $stmt = $db->conn->prepare("INSERT INTO sessions (id_user, token, description, create_at)
            VALUES (:id_user, :token, :description, NOW());");
            $stmt->bindParam(':id_user', $this->idUser);
            $stmt->bindParam(':token', $this->token);
            $stmt->bindParam(':description', $this->description);
            $stmt->execute();
            return true;
        }catch(PDOExeption $e){
            $result['message'] = "Error Create Session" . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }

    //Deleta a session assim que o usuario fazer o log out
    function delete(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("DELETE FROM sessions WHERE token = :token;");
            $stmt->bindParam(':token', $this->token);
            $stmt->execute();
            return $stmt->rowCount();
        }catch(PDOException $e) {
            $result['message'] = "Error Delete Session: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }

    //Verifica se existe uma session criada
    function checkSessionRoles(){
        $db = new Database();
        try {
            $stmt = $db->conn->prepare("SELECT s.id_user, u.roles FROM
            sessions as s
            JOIN users as u ON s.id_user = u.id
            WHERE s.token = :token;");
            $stmt->bindParam(':token', $this->token);
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
        }catch(PDOException $e) {
            $result['message'] = "Error Check Session Roles: " . $e->getMessage();
            $response = new Output();
            $response->out($result, 500);
        }
    }
}

?>