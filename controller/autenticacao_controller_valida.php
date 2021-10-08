<?php

    session_start();

    $usuario_autenticado = false;

$usuario_app = array(
    array('id_usuario' => '3531805', 'senha_usuario' => '102030aa'),
    array('id_usuario' => '30627', 'senha_usuario' => '102030cc')
);
    
       
    
        foreach($usuario_app as $user){

            if($user['id_usuario'] == $_POST['id_usuario'] && $user['senha_usuario'] == $_POST['senha_usuario']){
                $usuario_autenticado = true;
            }
        }

        if($usuario_autenticado){
            
            $_SESSION['autenticado'] = 'SIM';
            header('Location: pagina-inicial.php');
        }else{
            $_SESSION['autenticado'] = 'NAO';
            header('Location: index.php?login=erro');
        }



?>