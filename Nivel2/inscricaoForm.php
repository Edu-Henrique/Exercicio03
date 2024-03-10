<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ministrante</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
        }

        if(!empty($_REQUEST["action"]) and ($_REQUEST["action"]) == "save"){
            
            $data = $_POST;        

            try{
                $conn = mysqli_connect("localhost", "root", "", "eventos");
                $sql = "INSERT INTO INSCRICAO (ID, id_participante, id_palestra)
                        VALUES (DEFAULT, '{$data['id_participante']}', '{$data['id_palestra']}')";            
                $result = mysqli_query($conn, $sql);
                mysqli_close($conn);
                header("Location: listaPalestra.php");
                // echo "Cadastrado com Sucesso! <a href='ministranteForm.php'>Voltar</a>";
            } catch(Exception $e)
            {
                echo "Erro: " . $e->getMessage();
            }
        }
    ?>
    <form enctype="multipart/form-data" action="inscricaoForm.php?action=save" method="post">
        <label for="id">
            Codigo
            <input type="number" name="id" id="id" readonly>
        </label>
        <label for="palestra">
            Palestras
            <select name="id_palestra" id="palestra" >
                <?php 
                    require_once __DIR__ . "/lista_combo_palestras.php";
                    echo lista_combo_palestras($id);
                ?>
            </select>
        </label>
        <label for="participante">
            Participantes
            <select name="id_participante" id="participante">
                <?php 
                    require_once __DIR__ . "/lista_combo_participantes.php";
                    echo lista_combo_participantes();
                ?>
            </select>
        </label>  
        <input type="submit" value="Inscrever">
    </form>    
</body>
</html>