<?php

require_once __DIR__ . "/db/inscricao_db.php";
require_once __DIR__ . "/class/Inscricao.php";

try{       
    $incricoes = (new Inscricao)->all();
    $output = "";
    $i = 0;    
    foreach($incricoes as $row){
        $groupSection[] = $row[5];                        
        
        if($i == 0){
            $output .= "<section> \n"; 
            $output .= "<header> \n";
            $output .= "<h2>{$row[6]}</h2> \n";
            $output .= "</header> \n";
        }
        
        if(!empty($groupSection[$i-1])){
            if(!($groupSection[$i] == $groupSection[$i-1])){
                $output .= "</section> \n";
                $output .= "<section> \n"; 
                $output .= "<header> \n";
                $output .= "<h2>{$row[6]}</h2> \n";
                $output .= "</header> \n";
            }
        }
        

        $output .= "<article> \n";
        $output .= "<ul> \n";
        $output .= "<li><b>Codigo:</b> {$row[1]}</li> \n";                        
        $output .= "<li><b>Nome:</b> {$row[2]}</li> \n";                        
        $output .= "<li><b>Telefone:</b> {$row[3]}</li> \n";                        
        $output .= "<li><b>Email:</b> {$row[4]}</li> \n";                        
        $output .= "</ul> \n";
        $output .= "</article> \n";

        $i++;
    }        
    $output .= "</section>";    
} catch(Exception $e){
    echo $e->getMessage();
}

$index = file_get_contents("html/templateInscricaoList.html");
$index = str_replace("{output}", $output, $index);
echo $index;