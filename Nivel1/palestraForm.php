<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palestra</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <form enctype="multipart/form-data" action="insertPalestra.php" method="post">
        <label for="id">
            Codigo
            <input type="number" name="id" id="id" readonly>
        </label>
        <label for="nome">
            Nome
            <input type="text" name="nome" id="nome" >
        </label>
        <label for="data">
            Data
            <input type="date" name="data" id="data" >
        </label>
        <label for="turno">
            turno
            <input type="text" name="turno" id="turno" >
        </label>
        <label for="duracao">
            Duração
            <input type="text" name="duracao" id="duracao" >
        </label>
        <label for="tema">
            Tema
            <input type="text" name="tema" id="tema" >
        </label>
        <label for="sala">
            Sala
            <input type="text" name="sala" id="sala" >
        </label>
        <label for="ministrante">
            Ministrante
            <select name="ministrante" id="ministrante">
                <option value="1">Eduardo</option>
                <option value="2">Henrique</option>
                <option value="3">Pedro</option>
            </select>
        </label>

        <input type="submit" value="Cadastrar">
    </form>
</body>
</html>