<?php

if(!isset($_SESSION)){
  session_start();
}

$dsn = 'mysql:dbname=projeto_web_2021_1;host=localhost;charset=utf8';
$user = 'root';
$password = '';
global $pdo;

try{
  $conn = new PDO($dsn, $user, $password);
  $pdo = $conn;
}catch (PDOException $e){
  die('DB Error: ' . $e->getMessage());
}

?>