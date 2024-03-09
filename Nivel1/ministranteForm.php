<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestra</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form enctype="multipart/form-data" action="insertMinistrante.php" method="post">
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