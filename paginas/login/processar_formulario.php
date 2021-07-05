<?php
    session_start();
    if(
        isset($_POST['usuario']) && !empty($_POST['usuario']) && 
        isset($_POST['senha']) && !empty($_POST['senha'])
    ) {
        if(isset($_SESSION["nome"])){
            header("Location: ../area_restrita.php");
        }
    
        require('../../bd/conexao.php');
        require('../../class/User.class.php');
    
        $u = new User();
        
    
        $usuario = addslashes($_POST['usuario']);
        $senha = addslashes(md5($_POST['senha']));
    
        $user = $u->login($usuario, $senha);
        if($user != NULL){
            $_SESSION['usuarioid'] = $user['id'];
            $_SESSION['usuarionome'] = $user['nome'];
            header('location: ../area_restrita.php');
        }else{
            header('location: ../contato/formulario.php');
        }
    }
?>