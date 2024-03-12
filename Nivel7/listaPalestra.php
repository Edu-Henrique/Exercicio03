<?php

require_once __DIR__ . "/db/palestra_db.php";
require_once __DIR__ . "/db/ministrante_db.php";
require_once __DIR__ . "/class/Palestra.php";

class ListaPalestra
{
    private $html;    

    public function __construct()
    {
        $this->html = file_get_contents("html/templatePalestraList.html");

    }

    public function delete($param)
    {
        try{
            $id = (int) $param["id"];
            Palestra::delete($id);
            header("Lacation: index.php?class=ListaPalestra");
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function load()
    {
        try{
            $palestras = Palestra::all();

            $bodyTable = "";    
            foreach($palestras as $row){

                $rowTable = file_get_contents("html/templateRowTable.html");

                $ministrante = getMinistrante($row[7]);

                $rowTable = str_replace("{id}",              $row[0],           $rowTable);
                $rowTable = str_replace("{nome}",            $row[1],         $rowTable);
                $rowTable = str_replace("{data}",            $row[2],         $rowTable);
                $rowTable = str_replace("{turno}",           $row[3],        $rowTable);
                $rowTable = str_replace("{duracao}",         $row[4],      $rowTable);
                $rowTable = str_replace("{tema}",            $row[5],         $rowTable);
                $rowTable = str_replace("{sala}",            $row[6],         $rowTable);
                $rowTable = str_replace("{nomeMinistrante}", $ministrante['nome'], $rowTable);

                $bodyTable .= $rowTable;
            }
            $this->html = str_replace("{rowTablePalestra}", $bodyTable, $this->html);
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function show(){
        $this->load();
        echo $this->html;
    }
}