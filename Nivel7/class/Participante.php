<?php

class Participante
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

    public static function save($participante)
    {
        $conn = self::getInstance();

        if(empty($ministrante["id"])){
            $sql = "INSERT INTO PARTICIPANTE (ID, NOME, ENDERECO, BAIRRO, CIDADE, TELEFONE, EMAIL)
                VALUES (DEFAULT, :nome, :endereco, :bairro, :cidade, :telefone, :email)";
        }

        $result = $conn->prepare($sql);
        return $result->execute([
            ":nome"     => $participante["nome"],
            ":endereco" => $participante["endereco"],
            ":bairro"   => $participante["bairro"],
            ":cidade"   => $participante["cidade"],
            ":telefone" => $participante["telefone"],
            ":email"    => $participante["email"]
        ]);
    }
}