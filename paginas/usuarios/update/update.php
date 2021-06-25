<?php

include('../../protected.php');
protect();

if(
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['usuario']) && !empty($_POST['usuario']) &&
    isset($_POST['senha']) && !empty($_POST['senha']) &&
	isset($_POST['id']) && !empty($_POST['id'])
) {
	require('../../../bd/conexao.php');
	require('../../../class/User.class.php');
	require('../../../class/Log.class.php');

	$u = new User();
	$l = new Log();
	
	$nome = addslashes($_POST['nome']);
    $usuario = addslashes($_POST['usuario']);
    $senha = addslashes($_POST['senha']);
    $id = addslashes($_POST['id']);

	if($senha != "******"){
		$u->updatepass(md5($senha), $id);
	}

	if($u->update($nome, $usuario, $id)){
		$l->insert($id, 'usuarios', 'Usuário "' . $usuario . '" alterado com sucesso');
		header('location: ../../usuarios');
	}else{
		echo 'Ocorreu um erro ao atualizar';
	}
}
?>