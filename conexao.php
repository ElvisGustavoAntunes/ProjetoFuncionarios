<?php 
    $hostname = "localhost";
    $user = "root";
    $password = "";
    $database = "cadastroempresa";
    $conexao = mysqli_connect($hostname,$user,$password,$database);

    if(!$conexao){
        echo"Falha na Conexão com o Banco de Dados";
    }
?>