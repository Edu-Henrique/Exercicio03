<?php

require_once __DIR__ . "/lista_combo_cidades.php";
require_once __DIR__ . "/db/participante_db.php";
require_once __DIR__ . "/class/Participante.php";

class ParticipanteForm
{
    private $html;

    public function __construct()
    {
        $this->html = file_get_contents("html/templateParticipanteForm.html");
        $cidades = lista_combo_cidades();
        $this->html = str_replace("{cidades}", $cidades, $this->html);
    }

    public function save($param)
    {
        try {
            Participante::save($param);
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