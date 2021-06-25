<?php

include('../../protected.php');
protect();

if(
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['usuario']) && !empty($_POST['usuario']) &&
    isset($_POST['senha']) && !empty($_POST['senha'])
) {
	require('../../../bd/conexao.php');
	require('../../../class/User.class.php');
	require('../../../class/Log.class.php');

	$u = new User();
	$l = new Log();

	$nome = addslashes($_POST['nome']);
    $usuario = addslashes($_POST['usuario']);
    $senha = addslashes(md5($_POST['senha']));

	if($u->insert($nome, $usuario, $senha)){
		$data = $u->selectscalar();
		$l->insert($data['id'], 'usuarios', 'Usuário "'. $usuario. '" criado com sucesso');
		header('location: ../../usuarios');
	}else{
		echo 'Ocorreu um erro ao inserir';
	}
}


?>