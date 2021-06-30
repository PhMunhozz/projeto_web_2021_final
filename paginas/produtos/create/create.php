<?php

include('../../protected.php');
protect();


$arquivo = isset($_FILES['foto']) ? $_FILES['foto'] : FALSE;
if($arquivo['error'] == "0") {
    if($arquivo['tmp_name']){
        $extensao = explode(".", $arquivo['name']);
        $extensao = $extensao[1];

        if($extensao) {
			
			require('../../../bd/conexao.php');
			require('../../../class/Produto.class.php');
			require('../../../class/Log.class.php');

			$p = new Produto();
			$l = new Log();

			$nextId = $p->selectNextId();
            $nomeAnexo = "foto_produto_" . $nextId['id'];
            $destino = $nomeAnexo . '.' . $extensao;

            move_uploaded_file($arquivo['tmp_name'], "../fotos/$destino");

			$nome = addslashes($_POST['nome']);
			$descricao = addslashes($_POST['descricao']);
			$foto = addslashes($_POST['foto']);
			$idcategoria = addslashes($_POST['idcategoria']);

			if($p->insert($nome, $descricao, $nomeAnexo, $extensao, $idcategoria)){
				$data = $p->selectscalar();
				$l->insert($data['id'], 'produtos', 'Produto "'. $nome. '" criado com sucesso');
				header('location: ../../produtos');
			}else{
				echo 'Ocorreu um erro ao inserir';
			}
        }
    }
}
//final aqui
// if(
//     isset($_POST['nome']) && !empty($_POST['nome']) &&
//     isset($_POST['descricao']) && !empty($_POST['descricao']) &&
//     isset($_POST['foto']) && !empty($_POST['foto']) &&
//     isset($_POST['idcategoria']) && !empty($_POST['idcategoria'])
// ) {
// 	require('../../../bd/conexao.php');
// 	require('../../../class/Produto.class.php');
// 	require('../../../class/Log.class.php');

// 	$p = new Produto();
// 	$l = new Log();

// 	$nome = addslashes($_POST['nome']);
//     $descricao = addslashes($_POST['descricao']);
//     $foto = addslashes($_POST['foto']);
//     $idcategoria = addslashes($_POST['idcategoria']);

// 	if($p->insert($nome, $descricao, $foto, $idcategoria)){
// 		$data = $p->selectscalar();
// 		$l->insert($data['id'], 'produtos', 'Produto "'. $nome. '" criado com sucesso');
// 		header('location: ../../produtos');
// 	}else{
// 		echo 'Ocorreu um erro ao inserir';
// 	}
// }


?>