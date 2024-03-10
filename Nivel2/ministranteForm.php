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
        
        if(!empty($_REQUEST["action"]) and ($_REQUEST["action"]) == "save"){
            $data = $_POST;
            try{
                $conn = mysqli_connect("localhost", "root", "", "eventos");
                $sql = "INSERT INTO MINISTRANTE (ID, NOME, TELEFONE, EMAIL)
                        VALUES (DEFAULT, '{$data['nome']}', '{$data['telefone']}', '{$data['email']}')";
                $result = mysqli_query($conn, $sql);
                mysqli_close($conn);
                header("Location: listaPalestra.php");                
            } catch(Exception $e)
            {
                echo "Erro: " . $e->getMessage();
            }   
        }        
    ?>

    <form enctype="multipart/form-data" action="ministranteForm.php?action=save" method="post">
        <label for="id">
            Codigo
            <input type="number" name="id" id="id" readonly>
        </label>
        <label for="nome">
            Nome
            <input type="text" name="nome" id="nome" >
        </label>
        <label for="telefone">
            Telefone
            <input type="text" name="telefone" id="telefone" >
        </label>
        <label for="email">
            Email
            <input type="email" name="email" id="email" >
        </label>

        <input type="submit" value="Cadastrar">
    </form>    
</body>
</html>