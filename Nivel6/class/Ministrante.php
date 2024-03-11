<?php

class Ministrante
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

    public function save($ministrante){
        $conn = self::getInstance();

        if(empty($ministrante["id"])){
            $sql = "INSERT INTO MINISTRANTE (ID, NOME, TELEFONE, EMAIL)
                VALUES (DEFAULT, :nome, :telefone, :email)";
        }

        $result = $conn->prepare($sql);
        return $result->execute([
            ":nome" => $ministrante["nome"],
            ":telefone" => $ministrante["telefone"],
            ":email" => $ministrante["email"]
        ]);
    }
}