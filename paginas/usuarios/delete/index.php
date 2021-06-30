<?php

include('../../protected.php');
protect();

if (
    isset($_GET['ref']) && !empty($_GET['ref'])
) {
    require('../../../bd/conexao.php');
	require('../../../class/User.class.php');
    require('../../../class/Log.class.php');

    $u = new User();
    $l = new Log();

    $id = addslashes($_GET['ref']);
    $user = $u->listById($id);

    if($user == null){
        header('location: ../../usuarios');
    }else{
        $deletado = $user['nome'];
        $u->remove($id);
        $l->insert($id, 'usuarios', 'Usuário "' . $deletado . '" deletado com sucesso');
        header('location: ../../usuarios');
    }
}
?>