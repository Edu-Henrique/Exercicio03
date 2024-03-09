<?php

function lista_combo_ministrante()
{
    try{
        $conn = mysqli_connect("localhost", "root", "", "eventos");
        $sql = "SELECT * FROM MINISTRANTE ORDER BY ID";
        $result = mysqli_query($conn, $sql);
        $output = "";
        while ($row = mysqli_fetch_assoc($result)){
            $output .= "<option value='{$row['id']}'>{$row['nome']}</option> \n";
        }        
        mysqli_close($conn);
        return $output;        
    } catch(Exception $e){
        echo $e->getMessage();
    }
}