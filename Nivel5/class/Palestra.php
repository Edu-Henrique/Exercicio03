<?php

class Palestra
{
    public function find($id)
    {        
        $conn = new PDO("mysql:dbname=eventos;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM PALESTRAS WHERE ID = {$id}");
        return $result->fetch();
    }

    public function delete($id)
    {
        $conn = new PDO("mysql:dbname=eventos;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("DELETE FROM PALESTRAS WHERE ID = {$id}");
        return $result;
    }

    public function all()
    {
        $conn = new PDO("mysql:dbname=eventos;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $result = $conn->query("SELECT * FROM PALESTRAS ORDER BY ID");
        return $result->fetchAll();
    }

    public function save($palestra)
    {
        $conn = new PDO("mysql:dbname=eventos;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        if(empty($palestra["id"])){
            $sql = "INSERT INTO PALESTRAS (ID, NOME, `DATA`, TURNO, DURACAO, TEMA, SALA, MINISTRANTE)
                    VALUES (DEFAULT, '{$palestra['nome']}', '{$palestra['data']}', '{$palestra['turno']}', '{$palestra['duracao']}', '{$palestra['tema']}', '{$palestra['sala']}', {$palestra['ministrante']})";
        } else{
            $sql = "UPDATE PALESTRAS SET NOME        = '{$palestra['nome']}',
                                        `DATA`      = '{$palestra['data']}',
                                        TURNO       = '{$palestra['turno']}', 
                                        DURACAO     = '{$palestra['duracao']}', 
                                        TEMA        = '{$palestra['tema']}', 
                                        SALA        = '{$palestra['sala']}', 
                                        MINISTRANTE = {$palestra['ministrante']} WHERE ID = {$palestra['id']}";
        }
        
        return $conn->query($sql);
    }
}