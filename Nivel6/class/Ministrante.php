<?php

class Ministrante
{
    public function save($ministrante){
        $conn = new PDO("mysql:dbname=eventos;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(empty($ministrante["id"])){
            $sql = "INSERT INTO MINISTRANTE (ID, NOME, TELEFONE, EMAIL)
                VALUES (DEFAULT, '{$ministrante['nome']}', '{$ministrante['telefone']}', '{$ministrante['email']}')";
        }

        return $conn->query($sql);
    }
}