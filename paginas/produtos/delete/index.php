<?php

include('../../protected.php');
protect();

if (
    isset($_GET['ref']) && !empty($_GET['ref'])
) {
    require('../../../bd/conexao.php');
	require('../../../class/Produto.class.php');
    require('../../../class/Log.class.php');

    $p = new Produto();
    $l = new Log();

    $id = addslashes($_GET['ref']);
    $produto = $p->listById($id);

    if($produto == null){
        header('location: ../../produtos');
    }else{
        $deletado = $produto['nome'];
        $local = '../fotos/' . $produto['foto'] . '.' . $produto['ext'];
        unlink($local);
        $p->remove($id);
        $l->insert($id, 'produtos', 'Produto "' . $deletado . '" deletado com sucesso');
        header('location: ../../produtos');
    }
}
?>