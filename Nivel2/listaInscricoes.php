<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Palestras</title>
    <link rel="stylesheet" href="./css/style.css">
</head>
<body>
    <main class="main">
        <h1>Inscrições</h1>        
            <?php
                try{
                    $conn = mysqli_connect("localhost", "root", "", "eventos");
                    $sql = "SELECT I.id,
                    P.id AS ID_PARTICIPANTE,
                    P.nome AS NOME_PARTICIPANTE,
                    P.telefone AS TELEFONE_PARTICIPANTE,
                    P.email AS EMAIL_PARTICIPANTE,
                    L.id AS ID_PALESTRA,
                    L.nome AS NOME_PALESTRA       
                     FROM inscricao I 
                     INNER JOIN participante P ON I.id_participante = P.id
                     INNER JOIN palestras L ON I.id_palestra = L.id ORDER BY L.ID";
                    $result = mysqli_query($conn, $sql);
                    $output = "";
                    $i = 0;
                    while ($row = mysqli_fetch_assoc($result)){ 
                        
                        $groupSection[] = $row['ID_PALESTRA'];                        
                        
                        if($i == 0){
                            $output .= "<section> \n"; 
                            $output .= "<header> \n";
                            $output .= "<h2>{$row['NOME_PALESTRA']}</h2> \n";
                            $output .= "</header> \n";
                        }
                        
                        if(!empty($groupSection[$i-1])){
                            if(!($groupSection[$i] == $groupSection[$i-1])){
                                $output .= "</section> \n";
                                $output .= "<section> \n"; 
                                $output .= "<header> \n";
                                $output .= "<h2>{$row['NOME_PALESTRA']}</h2> \n";
                                $output .= "</header> \n";
                            }
                        }
                        

                        $output .= "<article> \n";
                        $output .= "<ul> \n";
                        $output .= "<li><b>Codigo:</b> {$row['ID_PARTICIPANTE']}</li> \n";                        
                        $output .= "<li><b>Nome:</b> {$row['NOME_PARTICIPANTE']}</li> \n";                        
                        $output .= "<li><b>Telefone:</b> {$row['TELEFONE_PARTICIPANTE']}</li> \n";                        
                        $output .= "<li><b>Email:</b> {$row['EMAIL_PARTICIPANTE']}</li> \n";                        
                        $output .= "</ul> \n";
                        $output .= "</article> \n";

                        $i++;
                    }        
                    echo $output;
                    mysqli_close($conn);                                
                } catch(Exception $e){
                    echo $e->getMessage();
                }
            ?>
            </section>
            <div style="display: flex; justify-content: center; margin-bottom: 1rem;">
                <a class="button-cad" href="listaPalestra.php">Palestras</a>
            </div>
    </main>
</body>
</html>