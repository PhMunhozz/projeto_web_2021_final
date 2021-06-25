<?php

include('../../protected.php');
protect();

if(
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['descricao']) && !empty($_POST['descricao']) &&
    isset($_POST['foto']) && !empty($_POST['foto'])
) {
	require('../../../bd/conexao.php');
	require('../../../class/Produto.class.php');
	require('../../../class/Log.class.php');

	$p = new Produto();
	$l = new Log();

	$nome = addslashes($_POST['nome']);
    $descricao = addslashes($_POST['descricao']);
    $foto = addslashes($_POST['foto']);

	if($p->insert($nome, $descricao, $foto)){
		$data = $p->selectscalar();
		$l->insert($data['id'], 'produtos', 'Produto "'. $descricao. '" criado com sucesso');
		header('location: ../../produtos');
	}else{
		echo 'Ocorreu um erro ao inserir';
	}
}


?>