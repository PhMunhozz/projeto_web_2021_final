<?php
session_start();
unset($_SESSION["nome"]);

header('Location: formulario.php');

?>