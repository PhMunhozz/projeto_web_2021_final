<?php

include('../../protected.php');
protect();


if(
    isset($_POST['nome']) && !empty($_POST['nome']) &&
    isset($_POST['situacao']) && !empty($_POST['situacao'])
) {
	require('../../../bd/conexao.php');
	require('../../../class/Categoria.class.php');
	require('../../../class/Log.class.php');

	$c = new Categoria();
	$l = new Log();

	$nome = addslashes($_POST['nome']);
    $situacao = addslashes($_POST['situacao']);


	if($c->insert($nome, $situacao)){
		$data = $c->selectscalar();
		$l->insert($data['id'], 'categorias', 'Categoria "'. $nome. '" criada com sucesso');
		header('location: ../../categorias');
	}else{
		echo 'Ocorreu um erro ao inserir';
	}
}


?>