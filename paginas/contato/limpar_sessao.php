<?php
   require("../../bd/conexao.php");

$sql = "TRUNCATE contatos";

mysqli_query($conn, $sql);

header('Location: formulario.php');

?>