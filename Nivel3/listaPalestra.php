<?php
try {
    $conn = mysqli_connect("localhost", "root", "", "eventos");

    if(!empty($_GET["action"]) and ($_GET["action"] ==  "remove")){
        if(!empty($_GET['id'])){
            $id = $_GET['id'];
                $sql = "DELETE FROM PALESTRAS WHERE ID = {$id}";
                $result = mysqli_query($conn, $sql);
        }                
    }

    $sql = "SELECT * FROM PALESTRAS ORDER BY ID";
    $result = mysqli_query($conn, $sql);
    $bodyTable = "";
    while ($row = mysqli_fetch_assoc($result)){

        $rowTable = file_get_contents("html/templateRowTable.html");

        $sql = "SELECT * FROM MINISTRANTE WHERE ID = {$row['ministrante']}";
        $rm = mysqli_query($conn, $sql);
        $ministrante = mysqli_fetch_assoc($rm);            

        $rowTable = str_replace("{id}",              $row['id'],           $rowTable);
        $rowTable = str_replace("{nome}",            $row['nome'],         $rowTable);
        $rowTable = str_replace("{data}",            $row['data'],         $rowTable);
        $rowTable = str_replace("{turno}",           $row['turno'],        $rowTable);
        $rowTable = str_replace("{duracao}",         $row['duracao'],      $rowTable);
        $rowTable = str_replace("{tema}",            $row['tema'],         $rowTable);
        $rowTable = str_replace("{sala}",            $row['sala'],         $rowTable);
        $rowTable = str_replace("{nomeMinistrante}", $ministrante['nome'], $rowTable);

        $bodyTable .= $rowTable;
    }        
    mysqli_close($conn);     
} catch(Exception $e){
    echo $e->getMessage();
}

$index = file_get_contents("html/templatePalestraList.html");
$index = str_replace("{rowTablePalestra}", $bodyTable, $index);
echo $index;