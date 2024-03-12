<?php

require_once __DIR__ . "/lista_combo_palestras.php";
require_once __DIR__ . "/lista_combo_participantes.php";
require_once __DIR__ . "/db/inscricao_db.php";
require_once __DIR__ . "/class/Inscricao.php";

class InscricaoForm
{
    private $html;
    private $data;

    public function __construct()
    {
        $this->html = file_get_contents("html/templateInscricaoForm.html");
        
        if(isset($_GET["id"])){
            $this->data["id_palestra"] = $_GET["id"];
        }
    }

    public function save($param)
    {
        try{
            Inscricao::save($param);
            header("Location: index.php?class=ListaPalestra");
        } catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function load()
    {
        $id = null;
        if(isset($_REQUEST["id"])){
            $id = (int) $_REQUEST["id"];
        }
        $listPalestra     = lista_combo_palestras($id);
        $listParticipante = lista_combo_participantes();

        $this->html = str_replace("{palestras}", $listPalestra, $this->html);
        $this->html = str_replace("{participantes}", $listParticipante, $this->html);

    }

    public function show()
    {
        $this->load();
        echo $this->html;
    }
}