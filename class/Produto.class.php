<?php

class Produto
{
    public function listAll()
    {
        global $pdo;
        $query = 'SELECT P.*, C.nome AS categoria FROM produtos P INNER JOIN categorias C ON C.id = P.idcategoria';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $produto['id'] = $row['id'];
            $produto['nome'] = $row['nome'];
            $produto['descricao'] = $row['descricao'];
            $produto['categoria'] = $row['categoria'];
            $produto['foto'] = $row['foto'];
            $produto['ext'] = $row['ext'];
            $produto['data_hora_criacao'] = $row['data_hora_criacao'];
            $produto['data_hora_atualizacao'] = $row['data_hora_atualizacao'];
            //Adiciona o objeto produto na lista de produtos
            $produtos[] = $produto;
        }
        if(isset($produtos)) return $produtos;
    }

    public function listById($id)
    {
        global $pdo;

		$query = 'SELECT P.*, C.nome AS categoria FROM produtos P INNER JOIN categorias C ON C.id = P.idcategoria WHERE P.id = :id';
		$query = $pdo->prepare($query);
		$query->bindValue("id", $id);
		$query->execute();

		if($query->rowCount() > 0){
            //Retorna o objeto de produto
			$data = $query->fetch();
            return $data;
		}else{
			return null;
		}
    }

    public function insert($nome, $descricao, $foto, $ext, $idcategoria){
        try{
            global $pdo;
            $stmt = $pdo->prepare('INSERT INTO produtos (nome, descricao, foto, ext, idcategoria, data_hora_criacao, data_hora_atualizacao) VALUES (:nome, :descricao, :foto, :ext, :idcategoria, NOW(), NOW())');
            $stmt->execute(array(
                ':nome' => $nome,
                ':descricao' => $descricao,
                ':foto' => $foto,
                ':ext' => $ext,
                ':idcategoria' => $idcategoria
            ));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function selectscalar(){
        global $pdo;
		$query = 'SELECT max(id) as id FROM produtos';
		$query = $pdo->prepare($query);
		$query->execute();

		if($query->rowCount() > 0){
			$data = $query->fetch();
            return $data;
		}else{
			return 0;
		}
    }

    public function selectNextId(){
        global $pdo;
		$query = "SELECT auto_increment AS id FROM information_schema.tables WHERE table_name = 'produtos' AND table_schema = 'projeto_web_2021_1'";
		$query = $pdo->prepare($query);
		$query->execute();

		if($query->rowCount() > 0){
			$data = $query->fetch();
            return $data;
		}else{
			return 0;
		}
    }

    public function update($nome, $descricao, $foto, $ext, $idcategoria, $id){
        try{
            global $pdo;
            $stmt = $pdo->prepare('UPDATE produtos SET nome = :nome, descricao = :descricao, foto = :foto, ext = :ext, idcategoria = :idcategoria, data_hora_atualizacao = NOW() WHERE id = :id');
            $stmt->execute(array(
                ':nome' => $nome,
                ':descricao' => $descricao,
                ':foto' => $foto,
                ':ext' => $ext,
                ':idcategoria' => $idcategoria,
                ':id' => $id
            ));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function remove($id){
        try{
            global $pdo;
            $stmt = $pdo->prepare('DELETE FROM produtos WHERE id = :id');
            $stmt->execute(array(
                ':id' => $id
            ));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>