<?php

function lista_table_palestras()
{
    try{
        $conn = mysqli_connect("localhost", "root", "", "eventos");
        $sql = "SELECT * FROM PALESTRAS ORDER BY ID";
        $result = mysqli_query($conn, $sql);
        $output = "";
        while ($row = mysqli_fetch_assoc($result)){

            $sql = "SELECT * FROM MINISTRANTE WHERE ID = {$row['ministrante']}";
            $rm = mysqli_query($conn, $sql);
            $ministrante = mysqli_fetch_assoc($rm);            

            $output .= "<tr>";
            $output .= "<td>{$row['id']}</td>";
            $output .= "<td>{$row['nome']}</td>";
            $output .= "<td>{$row['data']}</td>";
            $output .= "<td>{$row['turno']}</td>";
            $output .= "<td>{$row['duracao']}</td>";
            $output .= "<td>{$row['tema']}</td>";
            $output .= "<td>{$row['sala']}</td>";
            $output .= "<td>{$ministrante['nome']}</td>";
            $output .= "<td class='icon-table'><a href='inscricaoForm.php?id={$row['id']}'><img class='icon' src='./img/icon_insert.svg' alt='Inscrever-se'></a></td>";
            $output .= "<td class='icon-table'><a href='palestraForm.php?id={$row['id']}'><img class='icon' src='./img/icon_edit.svg' alt='alterar'></a></td>";
            $output .= "<td class='icon-table'><a href='removePalestra.php?id={$row['id']}'><img class='icon' src='./img/icon_remove.svg' alt='Remover'></a></td>";
            $output .= "</tr> \n";
        }        
        mysqli_close($conn);
        return $output;        
    } catch(Exception $e){
        echo $e->getMessage();
    }
}