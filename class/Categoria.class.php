<?php

class Categoria
{
    public function listAll()
    {
        global $pdo;
        $query = 'SELECT * FROM categorias';
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
}

?>