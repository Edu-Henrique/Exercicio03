<?php

class Palestra
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
        $result = $conn->prepare("SELECT * FROM PALESTRAS WHERE ID = :id");
        $result->execute([":id" => $id]);
        return $result->fetch();
    }

    public function delete($id)
    {
        $conn = self::getInstance();
        $result = $conn->prepare("DELETE FROM PALESTRAS WHERE ID = :id");
        $result->execute([":id" => $id]);
        return $result;
    }

    public function all()
    {
        $conn = self::getInstance();
        $result = $conn->query("SELECT * FROM PALESTRAS ORDER BY ID");
        return $result->fetchAll();
    }

    public function save($palestra)
    {
        $conn = self::getInstance();
        
        if(empty($palestra["id"])){
            $sql = "INSERT INTO PALESTRAS (ID, NOME, `DATA`, TURNO, DURACAO, TEMA, SALA, MINISTRANTE)
                    VALUES (:id, :nome, :data, :turno, :duracao, :tema, :sala, :ministrante)";
            $palestra["id"] = "DEFAULT";
        } else{
            $sql = "UPDATE PALESTRAS SET NOME       = :nome,
                                        `DATA`      = :data,
                                        TURNO       = :turno, 
                                        DURACAO     = :duracao, 
                                        TEMA        = :tema, 
                                        SALA        = :sala, 
                                        MINISTRANTE = :ministrante WHERE ID = :id";
        }
        
        $result = $conn->prepare($sql);
        return $result->execute([
            ":id"          => $palestra["id"],
            ":nome"        => $palestra["nome"],
            ":data"        => $palestra["data"],
            ":duracao"     => $palestra["duracao"],
            ":turno"       => $palestra["turno"],
            ":tema"        => $palestra["tema"],
            ":sala"        => $palestra["sala"],
            ":ministrante" => $palestra["ministrante"]
        ]);
    }
}