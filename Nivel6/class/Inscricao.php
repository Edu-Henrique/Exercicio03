<?php

class Inscricao
{

    public static $conn;

    public static function getInstance()
    {
        if(empty(self::$conn)){
            $ini = parse_ini_file("config/config.ini");
            $host = $ini["host"];
            $name = $ini["name"];
            $user = $ini["user"];
            $pass = $ini["pass"];
            self::$conn = new PDO("mysql:dbname={$name};host={$host};user={$user};password={$pass}");
            self::$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        return self::$conn;
    }

    public function find($id)
    {
        $conn = self::getInstance();
        $result = $conn->query("SELECT * FROM INSCRICAO WHERE ID = {$id}");
        return $result->fetch();
    }

    public function all()
    {
        $conn = self::getInstance();
        
        $sql = "SELECT I.id,
                P.id AS ID_PARTICIPANTE,
                P.nome AS NOME_PARTICIPANTE,
                P.telefone AS TELEFONE_PARTICIPANTE,
                P.email AS EMAIL_PARTICIPANTE,
                L.id AS ID_PALESTRA,
                L.nome AS NOME_PALESTRA       
                    FROM inscricao I 
                    INNER JOIN participante P ON I.id_participante = P.id
                    INNER JOIN palestras L ON I.id_palestra = L.id ORDER BY L.ID";
        $result = $conn->query($sql);
        return $result->fetchAll();
    }

    public function save($inscricao)
    {
        $conn = self::getInstance();

        if(empty($ministrante["id"])){
            $sql = "INSERT INTO INSCRICAO (ID, id_participante, id_palestra)
                VALUES (DEFAULT, '{$inscricao['id_participante']}', '{$inscricao['id_palestra']}')";
        }

        return $conn->query($sql);
    }
}