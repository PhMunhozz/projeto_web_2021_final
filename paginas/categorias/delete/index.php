<?php

include('../../protected.php');
protect();

if (
    isset($_GET['ref']) && !empty($_GET['ref'])
) {
    require('../../../bd/conexao.php');
	require('../../../class/Categoria.class.php');
    require('../../../class/Log.class.php');

    $c = new Categoria();
    $l = new Log();

    $id = addslashes($_GET['ref']);
    $categoria = $c->listById($id);

    if($categoria == null){
        header('location: ../../categorias');
    }else{
        $deletado = $categoria['nome'];
        $c->remove($id);
        $l->insert($id, 'categorias', 'Categoria "' . $deletado . '" deletada com sucesso');
        header('location: ../../categorias');
    }
}
?>