<?php 

class Auth{
    function allowedRole($role){
        $response = new Output();

        //Verifica se tem o token de acesso

        if(!isset($_SERVER['HTTP_ACCESS_TOKEN'])){
            $result['Mensage'] = 'ACCESS_TOKEN não informado!';
            $response->out($result, 403);
        }
        $token = $_SERVER['HTTP_ACCESS_TOKEN'];

        $session = new Session(null, $token, null);
        $user_session = $session->checkSessionRoles();

        //Verifica se possui a sessão  
        if(!$user_session){
            $result['Mensage'] = "Sessão não autorizada!";
            $response->out($result, 403);
        }

        //Verifica se possui a permisão de admin
        if(strpos($user_session['roles'], $role) === false){
            $result['Mensage'] = "Sessão não possui permissão de $role!";
            $response->out($result, 403);
        }

        return $user_session;
    }
}

?>