<?php

include('../../protected.php');
protect();

if(
    isset($_POST['nome']) && !empty($_POST['nome']) &&
	isset($_POST['id']) && !empty($_POST['id'])
) {
	require('../../../bd/conexao.php');
	require('../../../class/Categoria.class.php');
	require('../../../class/Log.class.php');

	$c = new Categoria();
	$l = new Log();
	
	$nome = addslashes($_POST['nome']);
    $situacao = addslashes($_POST['situacao']);
    $id = addslashes($_POST['id']);


	if($c->update($nome, $situacao, $id)){
		$l->insert($id, 'categorias', 'Categoria "' . $nome . '" alterada com sucesso');
		header('location: ../../categorias');
	}else{
		echo 'Ocorreu um erro ao atualizar';
	}
}
?>