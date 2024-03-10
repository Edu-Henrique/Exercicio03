<?php

class Participante
{
    public function save($participante)
    {
        $conn = new PDO("mysql:dbname=eventos;host=localhost;user=root;password=");
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if(empty($ministrante["id"])){
            $sql = "INSERT INTO PARTICIPANTE (ID, NOME, ENDERECO, BAIRRO, CIDADE, TELEFONE, EMAIL)
                VALUES (DEFAULT, '{$participante['nome']}', '{$participante['endereco']}', '{$participante['bairro']}', {$participante['cidade']}, '{$participante['telefone']}', '{$participante['email']}')";
        }

        return $conn->query($sql);
    }
}