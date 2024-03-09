<?php

if(!empty($_GET["id"])){
    $id = $_GET['id'];
    try {
        $conn = mysqli_connect("localhost", "root", "", "eventos");
        $sql = "DELETE FROM PALESTRAS WHERE ID = {$id}";
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);        
        header("Location: listaPalestra.php");
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}