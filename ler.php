<?php

    include_once("conexao.php");

    $razao = $_POST['razao'];
    $cnpj = $_POST['cnpj'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $estado = $_POST['estado'];
    $cidade = $_POST['cidade'];

    if($estado == ""){
        include_once "index.html";
    }else{
        $sql = "insert into empresas (razaosocial,cnpj,cep,rua,bairro,estado,cidade) values ('$razao','$cnpj','$cep','$rua','$bairro','$estado','$cidade')";
        $salvar = mysqli_query($conexao,$sql);  
    }

    


   /* $sql = "insert into empresas (razaosocial,cnpj,cep,rua,bairro,estado,cidade) values ('$razao','$cnpj','$cep','$rua','$bairro','$estado','$cidade')";
    $salvar = mysqli_query($conexao,$sql);*/
    
    mysqli_close($conexao);

    include_once "index.html";

?>