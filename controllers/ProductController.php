<?php 

class ProductController{
    function create(){
        $response = new Output();
        $response->allowedMethod('POST');
        //Adicionar a variavel os atributos da classe
        $name = $_POST['name'];
        $discription = $_POST['discription'];
        $value = $_POST['value'];
        $amount = $_POST['amount'];
        $event = $_POST['event'];
        $type = $_POST['type'];
        $color = $_POST['color'];
        $image = $_POST['image'];
        //Processamento
        $product = new Product(NULL, $name, $discription, $value, $amount, $event, $type, $color, $image);
        $id = $product->create();
        //Saida
        $result['Mensage'] = "Produto Criado com sucesso";
        $result['product']['id'] = $id;
        $result['product']['name'] = $name;
        $result['product']['discription'] = $discription;
        $result['product']['value'] = $value;
        $result['product']['amount'] = $amount;
        $result['product']['event'] = $event;
        $result['product']['type'] = $type;
        $result['product']['color'] = $color;
        $result['product']['image'] = $image;
        $response = new Output();
        $response->out($result);
    }

    function delete(){
        $response = new Output();
        $response->allowedMethod('POST');
        $id = $_POST['id'];
        $product = new Product($id, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
        $product->delete();  
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
        $discription = $_POST['discription'];
        $value = $_POST['value'];
        $amount = $_POST['amount'];
        $event = $_POST['event'];
        $type = $_POST['type'];
        $color = $_POST['color'];
        $image = $_POST['image'];
        $product = new Product($id, $name, $discription, $value, $amount, $event, $type, $color, $image);        
        $product->update();
        $result['Mensage'] = "Editado com sucesso";
        $result['product']['id'] = $id;
        $result['product']['name'] = $name;
        $result['product']['discription'] = $discription;
        $result['product']['value'] = $value;
        $result['product']['amount'] = $amount;
        $result['product']['event'] = $event;
        $result['product']['type'] = $type;
        $result['product']['color'] = $color;
        $result['product']['image'] = $image;
        $response = new Output();
        $response->out($result);
    }

    function selectAll(){
        $response = new Output();
        $response->allowedMethod('GET');
        $product = new Product(NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
        $result = $product->selectAll();
        $response = new Output();
        $response->out($result);
    }

    function selectId(){
        $response = new Output();
        $response->allowedMethod('GET');
        $id = $_GET['id'];
        $product = new Product($id, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
        $result = $product->selectId();
        $response = new Output();
        $response->out($result);
    }
}

?>