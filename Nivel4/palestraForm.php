<?php

require_once __DIR__ . "/lista_combo_ministrante.php";

$id = "";
$nome = "";
$data = "";
$turno = "";
$duracao = "";
$tema = "";
$sala = "";

try{
    $conn = mysqli_connect("localhost", "root", "", "eventos");
    if(!empty($_REQUEST["action"]) and ($_REQUEST["action"] == "edit")){
        if(isset($_GET["id"])){
            $id = $_GET["id"];            
                $sql = "SELECT * FROM PALESTRAS WHERE ID = {$id}";
                $result = mysqli_query($conn, $sql);
                $dados = mysqli_fetch_assoc($result);
                $nome = $dados['nome'];
                $data = $dados['data'];
                $turno = $dados['turno'];
                $duracao = $dados['duracao'];
                $tema = $dados['tema'];
                $sala = $dados['sala'];            
        }
    }

    if(!empty($_REQUEST["action"]) and ($_REQUEST["action"] == "save")){
        
        $data = $_POST;

        $conn = mysqli_connect("localhost", "root", "", "eventos");
        if(!empty($_GET['edit'])){
            $sql = "UPDATE PALESTRAS SET NOME = '{$data['nome']}',
                                        `DATA` = '{$data['data']}',
                                        TURNO = '{$data['turno']}', 
                                        DURACAO = '{$data['duracao']}', 
                                        TEMA = '{$data['tema']}', 
                                        SALA = '{$data['sala']}', 
                                        MINISTRANTE = {$data['ministrante']} WHERE ID = {$data['id']}";
            $result = mysqli_query($conn, $sql);                            
        } else{
            $sql = "INSERT INTO PALESTRAS (ID, NOME, `DATA`, TURNO, DURACAO, TEMA, SALA, MINISTRANTE)
                    VALUES (DEFAULT, '{$data['nome']}', '{$data['data']}', '{$data['turno']}', '{$data['duracao']}', '{$data['tema']}', '{$data['sala']}', {$data['ministrante']})";
            $result = mysqli_query($conn, $sql);                    
        }
        mysqli_close($conn);
        header("Location: listaPalestra.php");    
    }
} catch(Exception $e){
    echo "Erro: " . $e->getMessage();
}



$comboMinistrante = lista_combo_ministrante();


$index = file_get_contents("html/templatePalestraForm.html");
$index = str_replace("{id}", $id, $index);
$index = str_replace("{nome}", $nome, $index);
$index = str_replace("{data}", $data, $index);
$index = str_replace("{turno}", $turno, $index);
$index = str_replace("{duracao}", $duracao, $index);
$index = str_replace("{tema}", $tema, $index);
$index = str_replace("{sala}", $sala, $index);
$index = str_replace("{optMinistrante}", $comboMinistrante, $index);


echo $index;