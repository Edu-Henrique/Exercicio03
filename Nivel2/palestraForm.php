<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestra</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>

    <?php
        $id = "";
        $nome = "";
        $data = "";
        $turno = "";
        $duracao = "";
        $tema = "";
        $sala = "";
        
        if(!empty($_REQUEST["action"]) and ($_REQUEST["action"] == "edit")){
            if(isset($_GET["id"])){
                $id = $_GET["id"];            
                try{
                    $conn = mysqli_connect("localhost", "root", "", "eventos");
                    $sql = "SELECT * FROM PALESTRAS WHERE ID = {$id}";
                    $result = mysqli_query($conn, $sql);
                    $dados = mysqli_fetch_assoc($result);
                    $nome = $dados['nome'];
                    $data = $dados['data'];
                    $turno = $dados['turno'];
                    $duracao = $dados['duracao'];
                    $tema = $dados['tema'];
                    $sala = $dados['sala'];
                    mysqli_close($conn);
                } catch (Exception $e){
                    echo $e->getMessage();
                }
            }
        }

        if(!empty($_REQUEST["action"]) and ($_REQUEST["action"] == "save")){
            
            $data = $_POST;

            try{
                $conn = mysqli_connect("localhost", "root", "", "eventos");
                if(!empty($_GET['edit'])){
                    $sql = "UPDATE PALESTRAS SET NOME = '{$data['nome']}',
                                                `DATA` = '{$data['data']}',
                                                TURNO = '{$data['turno']}', 
                                                DURACAO = '{$data['duracao']}', 
                                                TEMA = '{$data['tema']}', 
                                                SALA = '{$data['sala']}', 
                                                MINISTRANTE = {$data['ministrante']} WHERE ID = {$data['id']}";
                    $result = mysqli_query($conn, $sql);                            
                } else{
                    $sql = "INSERT INTO PALESTRAS (ID, NOME, `DATA`, TURNO, DURACAO, TEMA, SALA, MINISTRANTE)
                            VALUES (DEFAULT, '{$data['nome']}', '{$data['data']}', '{$data['turno']}', '{$data['duracao']}', '{$data['tema']}', '{$data['sala']}', {$data['ministrante']})";
                    $result = mysqli_query($conn, $sql);                    
                }
                mysqli_close($conn);
                header("Location: listaPalestra.php");
            } catch(Exception $e)
            {
                echo "Erro: " . $e->getMessage();
            }
        }
        
    ?>

    <form enctype="multipart/form-data" action="palestraForm.php?action=save&edit=<?= $id ?>" method="post">
        <label for="id">
            Codigo
            <input type="number" name="id" id="id" readonly value="<?= $id ?>">
        </label>
        <label for="nome">
            Nome
            <input type="text" name="nome" id="nome" value="<?= $nome ?>">
        </label>
        <label for="data">
            Data
            <input type="date" name="data" id="data" value="<?= $data ?>">
        </label>
        <label for="turno">
            turno
            <input type="text" name="turno" id="turno" value="<?= $turno ?>">
        </label>
        <label for="duracao">
            Duração
            <input type="text" name="duracao" id="duracao" value="<?= $duracao ?>">
        </label>
        <label for="tema">
            Tema
            <input type="text" name="tema" id="tema" value="<?= $tema ?>">
        </label>
        <label for="sala">
            Sala
            <input type="text" name="sala" id="sala" value="<?= $sala ?>">
        </label>
        <label for="ministrante">
            Ministrante
            <select name="ministrante" id="ministrante">                
                <?php 
                    require_once __DIR__ . "/lista_combo_ministrante.php";
                    echo lista_combo_ministrante();
                ?>
            </select>
        </label>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>