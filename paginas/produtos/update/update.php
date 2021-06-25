<?php

include('../../protected.php');
protect();

if(
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['descricao']) && !empty($_POST['descricao']) &&
    isset($_POST['foto']) && !empty($_POST['foto']) &&
	isset($_POST['id']) && !empty($_POST['id'])
) {
	require('../../../bd/conexao.php');
	require('../../../class/Produto.class.php');
	require('../../../class/Log.class.php');

	$p = new Produto();
	$l = new Log();
	
	$nome = addslashes($_POST['nome']);
    $descricao = addslashes($_POST['descricao']);
    $foto = addslashes($_POST['foto']);
    $id = addslashes($_POST['id']);

	if($p->update($nome, $descricao, $foto, $id)){
		$l->insert($id, 'produtos', 'Produto "' . $descricao . '" alterado com sucesso');
		header('location: ../../produtos');
	}else{
		echo 'Ocorreu um erro ao atualizar';
	}
}
?>