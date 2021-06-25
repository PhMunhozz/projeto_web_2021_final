<?php

class Log
{
    public function listAll()
    {
        global $pdo;
        $query = 'SELECT * FROM logs';
        $stmt = $pdo->prepare($query);
        $stmt->execute();
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $log['id'] = $row['id'];
            $log['codigoid'] = $row['codigoid'];
            $log['tabela'] = $row['tabela'];
            $log['observacao'] = $row['observacao'];
            $log['data'] = $row['data'];
            $logs[] = $log;
        }
        if(isset($logs)) return $logs;
    }

    public function insert($codigoid, $tabela, $observacao){
        try{
            global $pdo;
            $stmt = $pdo->prepare('INSERT INTO logs (codigoid, tabela, observacao, data) VALUES (:codigoid, :tabela, :observacao, NOW())');
            $stmt->execute(array(
                ':codigoid' => $codigoid,
                ':tabela' => $tabela,
                ':observacao' => $observacao
            ));
            return true;
        }catch(PDOException $e){
            return false;
        }
    }
}

?>