<?php

class Contato
{
    public function listAll()
    {
        global $pdo;
        $query = 'SELECT * FROM contatos';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $contato['id'] = $row['id'];
            $contato['nome'] = $row['nome'];
            $contato['telefone'] = $row['telefone'];
            $contato['email'] = $row['email'];
            $contato['mensagem'] = $row['mensagem'];
            $contato['data_hora'] = $row['data_hora'];
            $contatos[] = $contato;
        }
        if(isset($contatos)) return $contatos;
    }
}

?>