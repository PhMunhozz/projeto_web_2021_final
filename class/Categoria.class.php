<?php

class Categoria
{
    public function listAll()
    {
        global $pdo;
        $query = 'SELECT C.*, (SELECT MAX(P.id) FROM produtos P WHERE P.idcategoria = C.id) AS hasProduto FROM categorias C';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categoria['id'] = $row['id'];
            $categoria['nome'] = $row['nome'];
            $categoria['situacao'] = $row['situacao'];
            $categoria['hasProduto'] = $row['hasProduto'];
            $categorias[] = $categoria;
        }
        if(isset($categorias)) return $categorias;
        else return [];
    }

    public function listAllActive()
    {
        global $pdo;
        $query = 'SELECT * FROM categorias WHERE situacao = 1';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categoria['id'] = $row['id'];
            $categoria['nome'] = $row['nome'];
            $categoria['situacao'] = $row['situacao'];
            $categorias[] = $categoria;
        }
        if(isset($categorias)) return $categorias;
        else return [];
    }

    public function listById($id)
    {
        global $pdo;

		$query = 'SELECT * FROM categorias WHERE id = :id';
		$query = $pdo->prepare($query);
		$query->bindValue("id", $id);
		$query->execute();

		if($query->rowCount() > 0){
			$data = $query->fetch();
            return $data;
		}else{
			return null;
		}
    }

    public function insert($nome, $situacao){
        try{
            global $pdo;
            $stmt = $pdo->prepare('INSERT INTO categorias (nome, situacao, data_hora_criacao, data_hora_atualizacao) VALUES (:nome, :situacao, NOW(), NOW())');
            $stmt->execute(array(
                ':nome' => $nome,
                ':situacao' => $situacao            ));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function selectscalar(){
        global $pdo;
		$query = 'SELECT max(id) as id FROM categorias';
		$query = $pdo->prepare($query);
		$query->execute();

		if($query->rowCount() > 0){
			$data = $query->fetch();
            return $data;
		}else{
			return 0;
		}
    }

    public function update($nome, $situacao, $id){
        try{
            global $pdo;
            $stmt = $pdo->prepare('UPDATE categorias SET nome = :nome, situacao = :situacao, data_hora_atualizacao = NOW() WHERE id = :id');
            $stmt->execute(array(
                ':nome' => $nome,
                ':situacao' => $situacao,
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
            $stmt = $pdo->prepare('DELETE FROM categorias WHERE id = :id');
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