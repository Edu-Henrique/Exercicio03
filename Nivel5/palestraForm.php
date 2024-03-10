<?php

require_once __DIR__ . "/lista_combo_ministrante.php";
require_once __DIR__ . "/db/palestra_db.php";

$id = "";
$nome = "";
$data = "";
$turno = "";
$duracao = "";
$tema = "";
$sala = "";

try{    
    if(!empty($_REQUEST["action"]) and ($_REQUEST["action"] == "edit")){
        if(isset($_GET["id"])){
                $id = $_GET["id"];                            
                $dados = getPalestra($id);
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
            updatePalestra($data);
            
        } else{            
            insertPalestra($data);
        }
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