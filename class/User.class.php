<?php

class User
{
    public function listAll()
    {
        global $pdo;
        $query = 'SELECT * FROM usuarios';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $usuario['id'] = $row['id'];
            $usuario['nome'] = $row['nome'];
            $usuario['usuario'] = $row['usuario'];
            $usuario['senha'] = $row['senha'];
            $usuario['data_hora_criacao'] = $row['data_hora_criacao'];
            $usuario['data_hora_atualizacao'] = $row['data_hora_atualizacao'];
            //Adiciona o objeto usuario na lista de usuarios
            $usuarios[] = $usuario;
        }
        if(isset($usuarios)) return $usuarios;
    }

    public function listById($id)
    {
        global $pdo;

		$query = 'SELECT * FROM usuarios WHERE id = :id';
		$query = $pdo->prepare($query);
		$query->bindValue("id", $id);
		$query->execute();

		if($query->rowCount() > 0){
            //Retorna o objeto de usuario
			$data = $query->fetch();
            return $data;
		}else{
			return null;
		}
    }

    public function insert($nome, $usuario, $senha){
        try{
            global $pdo;
            $stmt = $pdo->prepare('INSERT INTO usuarios (nome, usuario, senha, data_hora_criacao, data_hora_atualizacao) VALUES (:nome, :usuario, :senha, NOW(), NOW())');
            $stmt->execute(array(
                ':nome' => $nome,
                ':usuario' => $usuario,
                ':senha' => $senha
            ));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function selectscalar(){
        global $pdo;
		$query = 'SELECT max(id) as id FROM usuarios';
		$query = $pdo->prepare($query);
		$query->execute();

		if($query->rowCount() > 0){
			$data = $query->fetch();
            return $data;
		}else{
			return 0;
		}
    }

    public function update($nome, $usuario, $id){
        try{
            global $pdo;
            $stmt = $pdo->prepare('UPDATE usuarios SET nome = :nome, usuario = :usuario, data_hora_atualizacao = NOW() WHERE id = :id');
            $stmt->execute(array(
                ':nome' => $nome,
                ':usuario' => $usuario,
                ':id' => $id
            ));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }

    public function updatepass($senha, $id){
        try{
            global $pdo;
            $stmt = $pdo->prepare('UPDATE usuarios SET senha = :senha, data_hora_atualizacao = NOW() WHERE id = :id');
            $stmt->execute(array(
                ':senha' => $senha,
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
            $stmt = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
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