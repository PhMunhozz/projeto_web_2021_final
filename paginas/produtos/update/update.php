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

			$nome = addslashes($_POST['nome']);
			$descricao = addslashes($_POST['descricao']);
			$foto = addslashes($_POST['foto']);
			$idcategoria = addslashes($_POST['idcategoria']);
			$id = addslashes($_POST['id']);

			$p = new Produto();
			$l = new Log();

            $nomeAnexo = "foto_produto_" . $id;
            $destino = $nomeAnexo . '.' . $extensao;

			$produto = $p->listById($id);
			$filename_delete ='../fotos/'.$produto['foto'].'.'.$produto['ext'];
			unlink($filename_delete);
			
			move_uploaded_file($arquivo['tmp_name'], "../fotos/$destino");
		
			

			if($p->update($nome, $descricao, $nomeAnexo, $extensao, $idcategoria, $id)){
				$l->insert($id, 'produtos', 'Produto "'. $nome. '" alterado com sucesso');
				header('location: ../../produtos');
			}else{
				echo 'Ocorreu um erro ao atualizar';
			}
        }
    }
}







// include('../../protected.php');
// protect();

// if(
//     isset($_POST['nome']) && !empty($_POST['nome']) &&
//     isset($_POST['descricao']) && !empty($_POST['descricao']) &&
//     isset($_POST['foto']) && !empty($_POST['foto']) &&
//     isset($_POST['idcategoria']) && !empty($_POST['idcategoria']) &&
// 	isset($_POST['id']) && !empty($_POST['id'])
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
//     $id = addslashes($_POST['id']);

// 	if($p->update($nome, $descricao, $foto, $idcategoria, $id)){
// 		$l->insert($id, 'produtos', 'Produto "' . $nome . '" alterado com sucesso');
// 		header('location: ../../produtos');
// 	}else{
// 		echo 'Ocorreu um erro ao atualizar';
// 	}
// }
?>