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

        <?php
            if(!empty($_GET["action"]) and ($_GET["action"] ==  "remove")){
                if(!empty($_GET['id'])){
                    $id = $_GET['id'];
                    try {
                        $conn = mysqli_connect("localhost", "root", "", "eventos");
                        $sql = "DELETE FROM PALESTRAS WHERE ID = {$id}";
                        $result = mysqli_query($conn, $sql);
                        mysqli_close($conn);        
                        // header("Location: listaPalestra.php");
                    } catch (Exception $e) {
                        echo $e->getMessage();
                    }
                }                
            }
        ?>


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
                    try{
                        $conn = mysqli_connect("localhost", "root", "", "eventos");
                        $sql = "SELECT * FROM PALESTRAS ORDER BY ID";
                        $result = mysqli_query($conn, $sql);
                        $output = "";
                        while ($row = mysqli_fetch_assoc($result)){
                
                            $sql = "SELECT * FROM MINISTRANTE WHERE ID = {$row['ministrante']}";
                            $rm = mysqli_query($conn, $sql);
                            $ministrante = mysqli_fetch_assoc($rm);            
                
                            $output .= "<tr>";
                            $output .= "<td>{$row['id']}</td>";
                            $output .= "<td>{$row['nome']}</td>";
                            $output .= "<td>{$row['data']}</td>";
                            $output .= "<td>{$row['turno']}</td>";
                            $output .= "<td>{$row['duracao']}</td>";
                            $output .= "<td>{$row['tema']}</td>";
                            $output .= "<td>{$row['sala']}</td>";
                            $output .= "<td>{$ministrante['nome']}</td>";
                            $output .= "<td class='icon-table'><a href='inscricaoForm.php?id={$row['id']}'><img class='icon' src='./img/icon_insert.svg' alt='Inscrever-se'></a></td>";
                            $output .= "<td class='icon-table'><a href='palestraForm.php?action=edit&id={$row['id']}'><img class='icon' src='./img/icon_edit.svg' alt='alterar'></a></td>";
                            $output .= "<td class='icon-table'><a href='listaPalestra.php?action=remove&id={$row['id']}'><img class='icon' src='./img/icon_remove.svg' alt='Remover'></a></td>";
                            $output .= "</tr> \n";
                        }        
                        mysqli_close($conn);
                        echo $output;        
                    } catch(Exception $e){
                        echo $e->getMessage();
                    }
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