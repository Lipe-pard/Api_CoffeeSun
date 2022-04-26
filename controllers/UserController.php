<?php 
class UserController{

   function create(){
        $response = new Output();
        $response->allowedMethod('POST');
        // Adiciona a variavel os atributos da classe
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        // Processamento
        $user = new User(NULL, $name, $email, $pass);
        $id = $user->create();  
        //Saída
        $result['Mensage'] = "Criado com sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] = $pass;
        $response = new Output();
        $response->out($result);
    }
    
    function delete(){
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $user = new User($id, NULL, NULL, NULL);
        $user->delete();  
        $result['Mensage'] = "Deletado com Sucesso";
        $result['user']['id'] = $id;
        $response = new Output();
        $response->out($result);
    }

    function update(){
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $user = new User($id, $name, $email, $pass);
        $user->update();
        $result['Mensage'] = "Editado com sucesso";
        $result['user']['id'] = $id;
        $result['user']['name'] = $name;
        $result['user']['email'] = $email;
        $result['user']['pass'] = $pass;
        $response = new Output();
        $response->out($result);
    }

    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');
        $user = new User(NULL, NULL, NULL, NULL);
        $result = $user->selectAll();
        $response = new Output();
        $response->out($result);
    }

    function selectId(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $user = new User($id, NULL, NULL, NULL);
        $result = $user->selectId();
        $response = new Output();
        $response->out($result);
    }
}
?>