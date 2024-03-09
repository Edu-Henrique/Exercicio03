<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Participante</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form enctype="multipart/form-data" action="insertParticipante.php" method="post">
        <label for="id">
            Codigo
            <input type="number" name="id" id="id" readonly>
        </label>
        <label for="nome">
            Nome
            <input type="text" name="nome" id="nome" >
        </label>
        <label for="endereco">
            Endereco
            <input type="text" name="endereco" id="endereco" >
        </label>
        <label for="bairro">
            Bairro
            <input type="text" name="bairro" id="bairro" >
        </label>
        <label for="cidade">
            Cidade            
            <select name="cidade" id="cidade">
                <?php 
                    require_once __DIR__ . "/lista_combo_cidades.php";
                    echo lista_combo_cidades();
                ?>
            </select>
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