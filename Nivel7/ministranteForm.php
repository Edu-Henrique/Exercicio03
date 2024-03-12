<?php
        
require_once __DIR__ . "/db/ministrante_db.php";
require_once __DIR__ . "/class/Ministrante.php";

class MinistranteForm
{
    private $html;
    
    public function __construct()
    {
        $this->html = file_get_contents("html/templateMinistranteForm.html");
    }

    public function save($param)
    {
        try {
            Ministrante::save($param);
            header("Location: index.php?class=ListaPalestra");
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function show()
    {
        echo $this->html;
    }
}

// if(!empty($_REQUEST["action"]) and ($_REQUEST["action"]) == "save"){
//     $data = $_POST;
//     try{        
//         (new Ministrante)->save($data);
//         header("Location: listaPalestra.php");                
//     } catch(Exception $e)
//     {
//         echo "Erro: " . $e->getMessage();
//     }   
// }

// $index = file_get_contents("html/templateMinistranteForm.html");

// echo $index;