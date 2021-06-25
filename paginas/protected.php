<?php
if(!function_exists('protect')){
    function protect(){
        if(!isset($_SESSION)){
            session_start();
        }

        if(!isset($_SESSION["nome"])){
            header('Location: ../../login/formulario.php');
        }
    }
}