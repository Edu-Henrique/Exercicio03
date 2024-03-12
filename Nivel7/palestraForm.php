<?php

require_once __DIR__ . "/lista_combo_ministrante.php";
require_once __DIR__ . "/db/palestra_db.php";
require_once __DIR__ . "/class/Palestra.php";

class PalestraForm
{
    private $html;
    private $data;
    private $comboMinistrante;
    
    public function __construct($param = null)
    {
        $this->html = file_get_contents("html/templatePalestraForm.html");
        $this->data = [
            "id" => null,
            "nome" => null,
            "data" => null,
            "turno" => null,
            "duracao" => null,
            "tema" => null,
            "sala" => null,
        ];

        $this->comboMinistrante = lista_combo_ministrante();
    }

    public function edit($param)
    {
        try {
            $id = (int) $param["id"];
            $this->data = Palestra::find($id);
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function save($param)
    {
        try{
            Palestra::save($param);
            $this->data = $param;
            header("Location: index.php?class=ListaPalestra");
        } catch (Exception $e){
            echo $e->getMessage();
        }
    }

    public function show()
    {
        $this->html = str_replace("{id}", $this->data["id"], $this->html);
        $this->html = str_replace("{nome}", $this->data["nome"], $this->html);
        $this->html = str_replace("{data}", $this->data["data"], $this->html);
        $this->html = str_replace("{turno}", $this->data["turno"], $this->html);
        $this->html = str_replace("{duracao}", $this->data["duracao"], $this->html);
        $this->html = str_replace("{tema}", $this->data["tema"], $this->html);
        $this->html = str_replace("{sala}", $this->data["sala"], $this->html);
        $this->html = str_replace("{optMinistrante}", $this->comboMinistrante, $this->html);

        echo $this->html;
    }
}