<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Palestras</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main>
        <table border="1">
            <thead>
                <tr>
                    <td>Código</td>
                    <td>Palestra</td>
                    <td>Data</td>
                    <td>Turno</td>
                    <td>Duração</td>
                    <td>Tema</td>
                    <td>Sala</td>
                    <td>Ministrante</td>
                    <td>Inscrição</td>
                    <td>Editar</td>
                    <td>Excluir</td>
                </tr>
            </thead>
            <tbody>                            
                <?php
                    require_once __DIR__ . "/lista_table_Palestras.php";
                    echo lista_table_palestras();
                ?>
            </tbody>
        </table>
        <a class="button-cad" href="palestraForm.php">Cadastrar Palestra</a>
        <a class="button-cad" href="ministranteForm.php">Cadastrar Ministrante</a>
        <a class="button-cad" href="participanteForm.php">Cadastrar Participante</a>
        <a class="button-cad" href="listaInscricoes.php">Lista Incrições</a>
    </main>
</body>
</html>